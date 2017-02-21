<table class="tablesorter" cellspacing="0"> 
	<thead> 
		<tr> 
          <th>编号</th>
          <th>会员编号</th>
          <th>会员名</th>
          <th>收益金额</th>
          <th>收益时长(分钟)</th>
          <th>收益利率(%)</th>
          <th>余额宝资金(当时)</th>
          <th>成功时间</th>
          <th>备注</th>
		</tr> 
	</thead> 
	<tbody> 
	 <?php
                // 用户限制
                if($_GET['username'] && $_GET['username']!="会员名"){
                    $_GET['username']=wjStrFilter($_GET['username']);
                if(!ctype_alnum($_GET['username'])) throw new Exception('会员名包含非法字符,请重新输入');
                    $userWhere=" and u.username like '%{$_GET['username']}%'";
                }
	
                $sql="select u.username,d.* from {$this->prename}deposit_log d left join {$this->prename}members u on u.uid=d.uid where ";
				if($_GET['fromTime'] && $_GET['toTime']){
                    $fromTime=strtotime($_GET['fromTime']);
                    $toTime=strtotime($_GET['toTime']);
                    $sql.=" actionTime between $fromTime and $toTime";
                }elseif($_GET['fromTime']){
                    $sql.=' actionTime>='.strtotime($_GET['fromTime']);
                }elseif($_GET['toTime']){
                    $sql.=' actionTime<'.(strtotime($_GET['toTime']));
                }else{
					$sql.=' actionTime>'.strtotime('00:00');
				}
				$sql.=$userWhere.' order by actionTime desc';
                
				 //echo  $sql;
                
                $list=$this->getPage($sql, $this->page, $this->pageSize);
                if($list['data']) foreach($list['data'] as $var){
            ?>
            <tr>
                <td><?=$var['id']?></td>
                <td><?=$var['uid']?></td>
                <td><?=$var['username']?></td>
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
	<footer>
	<?php
		$rel=get_class($this).'/deposit-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $list['total'], $rel, 'betLogSearchPageAction');
	?>
	</footer>