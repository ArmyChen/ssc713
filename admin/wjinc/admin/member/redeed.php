<?php
	$sql="select * from {$this->prename}members where admin=0 and isDelete=0 and parentId is null and type=1 order by lastRedeed";
	$data=$this->getPage($sql,$this->page,$this->pageSize);
?>
<article class="module width_full">
	<header>
		<h3 class="tabs_involved">总代分红</h3>
	</header>
	<table class="tablesorter" cellspacing="0" width="100%">
		<thead>
			<tr>
				<td>UID</td>
				<td>用户名</td>
				<td>分红率</td>
				<td>上次分红时间</td>
				<td>操作</td>
			</tr>
		</thead>
		<tbody>
		<?php if($data['data']) foreach($data['data'] as $var){ ?>
			<tr>
				<td><?=$var['uid'] ?></td>
				<td><?=$var['username'] ?></td>
				<td><?=$var['red'] ?>%</td>
				<td><?=$this->iff($var['lastRedeed']>0,date("Y-m-d H:i:s",$var['lastRedeed']), '无记录')?></td>
				<td>
					<a href="#" onclick="sysModal('member/doRedeed/<?=$var['uid'] ?>','总代分红',480)">计算红利</a>
				</td>
			</tr>
		<?php }else{ ?>
			<tr>
				<td colspan="5">没有需要分发红利的会员信息！</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<footer>
		<?php 
			$rel=get_class($this).'/redeed-{page}?'.http_build_query($_GET,'','&');
			$this->display('inc/page.php',0,$data['total'],$rel,'betLogSearchPageAction');
		?>
	</footer>
</article>
