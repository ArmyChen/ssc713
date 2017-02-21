<?php
	$sql="select * from {$this->prename}bank_list order by sort";
	$data=$this->getPage($sql,$this->page,$this->pageSize);
?>
<article class="module width_full">
	<header>
		<h3 class="tabs_involved">银行设置
			<div class="submit_link wz"><input type="submit" value="添加银行" onclick="sysModal('system/bankModal/0/add','添加银行',480)" class="alt_btn"></div>
		</h3>
	</header>
	<table class="tablesorter" cellspacing="0" width="100%">
		<thead>
			<tr>
				<td>ID</td>
				<td>银行名称</td>
				<td>状态(开/关)</td>
				<td>排序位置</td>
				<td>提款</td>
				<td>收款</td>
				<td>绑定赠送</td>
				<td>赠送金额</td>
				<td>操作</td>
			</tr>
		</thead>
		<tbody>
		<?php if($data['data']) foreach($data['data'] as $var){ ?>
			<tr>
				<td><?=$var['id'] ?></td>
				<td><?=$var['name'] ?></td>
				<td><?=$this->iff($var['isDelete'],'关','开') ?></td>
				<td><?=$var['sort'] ?></td>
				<td><?=$this->iff($var['tk'],'是','否') ?></td>
				<td><?=$this->iff($var['sk'],'是','否') ?></td>
				<td><?=$this->iff($var['zs'],'是','否') ?></td>
				<td><?=$var['gift'] ?></td>
				<td>
					<a href="/admin778899.php/system/switchBankStatus/<?=$var['id'] ?>" target="ajax" call="sysReload"><?=$this->iff($var['isDelete'],'开启','关闭') ?></a> | 
					<a href="#" onclick="sysModal('system/bankModal/<?=$var['id'] ?>/update','修改银行',480)">修改</a> | 
					<a href="/admin778899.php/system/deleteBank/<?=$var['id'] ?>" target="ajax" call="sysReload">删除</a>
				</td>
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
			$rel=get_class($this).'/bankList-{page}?'.http_build_query($_GET,'','&');
			$this->display('inc/page.php',0,$data['total'],$rel,'betLogSearchPageAction');
		?>
	</footer>
</article>
