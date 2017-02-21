<?php
	$sql="select * from {$this->prename}member_red order by id desc";
	$data=$this->getPage($sql,$this->page,$this->pageSize);
?>
<article class="module width_full">
	<header>
		<h3 class="tabs_involved">分红记录</h3>
	</header>
	<table class="tablesorter" cellspacing="0" width="100%">
		<thead>
			<tr>
				<td>ID</td>
				<td>用户名</td>
				<td>分红比例</td>
				<td>亏损</td>
				<td>派发金额</td>
				<td>开始时间</td>
				<td>截止时间</td>
			</tr>
		</thead>
		<tbody>
		<?php if($data['data']) foreach($data['data'] as $var){ ?>
			<tr>
				<td><?=$var['id'] ?></td>
				<td><?=$var['username'] ?></td>
				<td><?=$var['red'] ?></td>
				<td><?=$var['kuisun'] ?></td>
				<td><?=$var['redAmount'] ?></td>
				<td><?=$this->iff($var['startTime']>0,date("Y-m-d H:i:s",$var['startTime']), '--') ?></td>
				<td><?=date("Y-m-d H:i:s",$var['stopTime']) ?></td>
			</tr>
		<?php }else{ ?>
			<tr>
				<td colspan="5">暂时没有银行信息，请点右上角按钮添加银行</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<footer>
		<?php 
			$rel=get_class($this).'/redList-{page}?'.http_build_query($_GET,'','&');
			$this->display('inc/page.php',0,$data['total'],$rel,'betLogSearchPageAction');
		?>
	</footer>
</article>
