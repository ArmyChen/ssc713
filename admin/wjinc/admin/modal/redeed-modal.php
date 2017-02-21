<div class="bank-modal">
	<form action="/admin778899.php/member/payRedeed/<?=$args[1] ?>" method="post" target="ajax" call="sysReload">
	<?php
		if($args[0]){
			$uid=intval($args[0]);
			$usr=$this->getRow("select * from {$this->prename}members where uid=$uid");
		}
		//between 1423594800 and 1423681200
		$start = $usr['lastRedeed'];
		$stop = $this->time;
		$time = "between $start and $stop";
		
		
		$sql = "select sum(b.mode * b.beiShu * b.actionNum) betAmount, sum(b.bonus) zjAmount from ssc_members u left join ssc_bets b on u.uid=b.uid and b.isDelete=0 and actionTime $time and concat(',', u.parents, ',') like '%,{$usr['uid']},%'";
		$all=$this->getRow($sql);
		$all['fanDianAmount']=$this->getValue("select sum(l.coin) from ssc_coin_log l, ssc_members u where l.liqType between 2 and 3 and l.uid=u.uid and l.actionTime $time and concat(',', u.parents, ',') like '%,{$usr['uid']},%'");
		$all['brokerageAmount']=$this->getValue("select sum(l.coin) from ssc_coin_log l, ssc_members u where l.liqType in(50,51,52,53) and l.uid=u.uid and l.actionTime $time and concat(',', u.parents, ',') like '%,{$usr['uid']},%'");
		?>
		<input type="hidden" name="uid" value="<?=$usr['uid'] ?>"/>
		<input type="hidden" name="startTime" value="<?=$start ?>"/>
		<input type="hidden" name="stopTime" value="<?=$stop ?>"/>
		<table class="tablesorter left" cellspacing="0" width="100%">
			<?php if($usr){ ?>
				<tr> 
					<td class="title">UID</td> 
					<td><?=$usr['uid'] ?></td>
				</tr>
			<?php }?>
			<tr> 
				<td class="title">用户名</td> 
				<td><?=$usr['username'] ?></td>
			</tr>
			<tr> 
				<td class="title">上次分红时间</td>
				<td><?=$this->iff($usr['lastRedeed']>0,date("Y-m-d H:i:s",$usr['lastRedeed']), '无记录')?></td>
			</tr>
			<tr> 
				<td class="title"></td>
				<td>---------------------------</td>
			</tr>
			<tr> 
				<td class="title">本次团队总盈亏</td>
				<td><?=$yk=$this->ifs($all['zjAmount']-$all['betAmount']+$all['fanDianAmount']+$all['brokerageAmount'], '0.00') ?> 元</td>
			</tr>
			<tr> 
				<td class="title">分红比例</td>
				<td><?=$usr['red'] ?>%</td>
			</tr>
			<?php 
				$yk = abs($yk);
				$redAmount = $this->iff($yk>0, ($yk*$usr['red'])/100, '0.00');
				$redAmount = round($redAmount, 2);
			?>
			<tr> 
				<td class="title">本次应分红金额</td>
				<td><input type="text" name="redAmount" value="<?=$redAmount ?>"/>元</td>
			</tr>
			<tr> 
				<td class="title" colspan="2" style="text-align: center;">点击“提交”派发分红，点击“取消”关闭此窗口</td>
			</tr>
		</table>
		<input type="hidden" name="kuisun" value="-<?=$yk ?>"/>
	</form>
</div>