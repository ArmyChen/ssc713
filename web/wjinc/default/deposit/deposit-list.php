        <!--下注列表-->
<table width="100%" class='table_b'>
        <thead>
            <thead>
            <tr class="table_b_th">
                <td>编号</td>
                <td>收益金额</td>
                <td>收益时长(分钟)</td>
                <td>收益利率(%)</td>
                <td>余额宝资金(当时)</td>
                <td>成功时间</td>
                <td>备注</td>
            </tr>
            </thead>
            <tbody class="table_b_tr">
            <?php
              
                $sql="select * from {$this->prename}deposit_log where uid={$this->user['uid']} ";
				
				if($_GET['fromTime'] && $_GET['toTime']){
                    $fromTime=strtotime($_GET['fromTime']);
                    $toTime=strtotime($_GET['toTime']);
                    $sql.=" and actionTime between $fromTime and $toTime";
                }elseif($_GET['fromTime']){
                    $sql.=' and actionTime>='.strtotime($_GET['fromTime']);
                }elseif($_GET['toTime']){
                    $sql.=' and actionTime<'.(strtotime($_GET['toTime']));
                }else{
					
					if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $sql.=' and actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
				}
                $sql.=' order by actionTime desc';
                //echo $_GET['fromTime'];
				//分页代码
                	$para=$_GET;
                	unset($para[$this->baseMethodKey()]);
                	unset($para['txpgs']);
                	$params=http_build_query($para, '', '&');
	
                $list=$this->getPage($sql, $this->page, $this->pageSize);
                if($list['data']) foreach($list['data'] as $var){
            ?>
            <tr>
                <td><?=$var['id']?></td>
                <td><?=$this->iff($var['depositCoin']>0, $var['depositCoin'], '--')?></td>
                <td><?=$var['CoinTime']?></td>
				<td><?=$var['lltype']?></td>
                <td><?=$this->iff($var['userDepositCoin']>0, $var['userDepositCoin'], '--')?></td>
                <td><?=date('Y-m-d H:i:s', $var['actionTime'])?></td>
                <td><?=$var['info']?></td>
            </tr>
            <?php }else{ ?>
            <tr>
                <td colspan="7" align="center">没有余额宝收益记录</td>
            </tr>
            <?php } ?>
            </tbody>
            
</table>
        <!--下注列表 end -->
<?php 
	$this->display('inc_page.php',0,$list['total'],$this->pageSize, $this->basePath($this->controller.'-'.$this->action,'',true)."&txpgs={page}&$params");
?>
