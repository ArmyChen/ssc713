<?php

$sql="select m.*, b.name bankName, b.logo bankLogo, b.home bankHost from {$this->prename}sysadmin_bank m, {$this->prename}bank_list b where b.id=m.bankId and b.isDelete=0 and m.admin=1";
$data=$this->getPage($sql,$this->page,$this->pageSize);
?>
<article class="module width_full">
	<header>
		<h3 class="tabs_involved">收款银行设置
			<div class="submit_link wz"><input type="submit" value="添加收款账号" onclick="sysModal('system/cardModal/0/add','添加收款账号',480)" class="alt_btn"></div>
		</h3>
	</header>
	<table class="tablesorter" cellspacing="0" width="100%">
		<thead>
			<tr>
				<td>ID</td>
				<td>银行</td>
				<td>标识</td>
				<td>账号</td>
				<td>持卡人</td>
				<td>充值赠送</td>
				<td>赠送比例</td>
				<td>状态(开/关)</td>
				<td>操作</td>
			</tr>
		</thead>
		<tbody>
		<?php if($data['data']) foreach($data['data'] as $var){ ?>
		<tr>
				<td><?=$var['id'] ?></td>
				<td><?=$var['bankName'] ?></td>
				<td><img onclick="window.open(\'<?=$var['bankHost'] ?>\')" class="pointer" src="/<?=$var['bankLogo'] ?>" width="139" height="38" border="0"/></td>
				<td><?=$var['account'] ?></td>
				<td><?=$var['username'] ?></td>
				<td><?=$this->iff($var['rechargeGift'],'赠送','不赠送') ?></td>
				<td><?=$var['gift'] ?></td>
				<td><?=$this->iff($var['enable'],'开','关') ?></td>
				<td>
					<a href="/admin778899.php/system/switchCardStatus/<?=$var['id'] ?>" target="ajax" call="sysReload"><?=$this->iff($var['enable'],'关闭','开启') ?></a> | 
					<a href="#" onclick="sysModal('system/cardModal/<?=$var['id'] ?>/update','修改收款账号',480)">修改</a> | 
					<a href="/admin778899.php/system/deleteCard/<?=$var['id'] ?>" target="ajax" call="sysReload">删除</a>
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
			$rel=get_class($this).'/card-{page}?'.http_build_query($_GET,'','&');
			$this->display('inc/page.php',0,$data['total'],$rel,'betLogSearchPageAction');
		?>
	</footer>
</article>