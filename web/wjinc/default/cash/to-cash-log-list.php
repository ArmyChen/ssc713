 <table width="100%" class='table_b'>
            <thead>
	            <tr class="table_b_th">
	                <td>提现金额</td>
	                <td>申请时间</td>
	                <td>提现银行</td>
	                <td>银行尾号</td>
	                <td>状态</td>
	            </tr>
            </thead>
            <tbody class="table_b_tr">
            <?php
				$params=http_build_query($_GET, '', '&');
                $sql="select c.*, b.name bankName from {$this->prename}member_cash c, {$this->prename}bank_list b where c.bankId=b.id and uid={$this->user['uid']} and b.isDelete=0 and c.isDelete=0";
                if($_GET['fromTime'] && $_GET['toTime']){
                    $fromTime=strtotime($_GET['fromTime']);
                    $toTime=strtotime($_GET['toTime']);
                    $sql.=" and actionTime between $fromTime and $toTime";
                }elseif($_GET['fromTime']){
                    $sql.=' and actionTime>='.strtotime($_GET['fromTime']);
                }elseif($_GET['endTime']){
                    $sql.=' and actionTime<'.(strtotime($_GET['toTime']));
                }else{
					
					if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $sql.=' and actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
				}
                
                $stateName=array('已到帐', '正在办理', '已取消', '已支付', '失败');
				
                $list=$this->getPage($sql, $this->page, $this->pageSize);
                if($list['data']) foreach($list['data'] as $var){
            ?>
            <tr>
                <td><?=$var['amount']?></td>
                <td><?=date('m-d H:i:s', $var['actionTime'])?></td>
                <td><?=$var['bankName']?></td>
                <td><?=preg_replace('/^.*(.{4})$/', "$1", $var['account'])?></td>
                <td>
                <?php
                    if($var['state']==3){
                        echo '<div class="sure" id="', $var['id'], '"></div>';
                    }else if($var['state']==4){
                        echo '<span title="'.$var['info'].'" style="cursor:pointer; color:#f00;">'.$stateName[$var['state']].'</span>';
                    }else{
                        echo $stateName[$var['state']];
                    }
                ?>
                </td>
            </tr>
             <?php }else{ ?>
            <tr>
                <td colspan="5" align="center">没有符合条件的提现记录</td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
		<?php 
	$this->display('inc_page.php',0,$data['total'],$this->pageSize, $this->basePath('Cash-searchCashRecord','',true).'&txpgs={page}&'.$params);
?>