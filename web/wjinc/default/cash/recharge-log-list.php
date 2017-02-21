 <table width="100%" class='table_b'>
            <thead>
            <tr class="table_b_th">
                <td>编号</td>
                <td>充值金额</td>
                <td>实际到账</td>
                <td>充值银行</td>
                <td>状态</td>
                <td>成功时间</td>
                <td>备注</td>
            </tr>
            </thead>
            <tbody class="table_b_tr">
            <?php
				$params=http_build_query($_GET, '', '&');
                $sql="select a.rechargeId,a.amount,a.rechargeAmount,a.info,a.state,a.actionTime,b.name as bankName from {$this->prename}member_recharge a left join {$this->prename}bank_list b on b.id=a.mBankId where a.uid={$this->user['uid']} and a.isDelete=0";
                if($_GET['fromTime'] && $_GET['endTime']){
                    $fromTime=strtotime($_GET['fromTime']);
                    $endTime=strtotime($_GET['endTime']);
                    $sql.=" and a.actionTime between $fromTime and $endTime";
                }elseif($_GET['fromTime']){
                    $sql.=' and a.actionTime>='.strtotime($_GET['fromTime']);
                }elseif($_GET['endTime']){
                    $sql.=' and a.actionTime<'.(strtotime($_GET['endTime']));
                }else{
					
					if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $sql.=' and a.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
				}
                $sql.=' order by a.id desc';
                
                $pageSize=10;
                
                $list=$this->getPage($sql, $this->page, $pageSize);
                if($list['data']) foreach($list['data'] as $var){
            ?>
            <tr>
                <td><?=$this->ifs($var['rechargeId'], '管理员充值')?></td>
                <td><?=$var['amount']?></td>
                <td><?=$this->iff($var['rechargeAmount']>0, $var['rechargeAmount'], '--')?></td>
                <td><?=$this->iff($var['bankName'], $var['bankName'], '--')?></td>
                <td><?=$this->iff($var['state'], '充值成功', '<span style="color:#b4ff00">正在处理</span>')?></td>
                <td><?=$this->iff($var['state'], date('m-d H:i:s', $var['actionTime']), '--')?></td>
                <td><?=$var['info']?></td>
            </tr>
            <?php }else{ ?>
            <tr>
                <td colspan="7" align="center">没有符合条件的充值记录</td>
            </tr>
            <?php } ?>
            </tbody>
            
        </table>
<?php
     $this->display('inc_page.php', 0, $list['total'], $this->pageSize, $this->basePath('Cash-rechargeLog','',true)."&txpgs={page}&fromTime={$_GET['fromTime']}&endTime={$_GET['endTime']}");
?>