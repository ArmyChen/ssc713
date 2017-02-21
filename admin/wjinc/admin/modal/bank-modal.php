<div class="bank-modal">
	<form action="/admin778899.php/system/<?=$args[1] ?>Bank<?=$this->iff($args[0],'/'.$args[0],''); ?>" method="post" target="ajax" call="sysReload">
	<?php
		if($args[0]){
			$bankId=intval($args[0]);
			$bank=$this->getRow("select * from {$this->prename}bank_list where id=$bankId");
		}
	?>
		<table class="tablesorter left" cellspacing="0" width="100%">
			<?php if($args[0]){ ?>
				<tr> 
					<td class="title">银行ID</td> 
					<td><input type="text" name="id" disabled value="<?=$args[0] ?>"/></td>
				</tr>
			<?php }?>
			<tr> 
				<td class="title">银行名称</td> 
				<td><input type="text" name="name" value="<?=$bank['name'] ?>"/></td>
			</tr>
			<tr> 
				<td class="title">logo路径</td>
				<td><input type="text" name="logo" value="<?=$bank['logo'] ?>"/></td>
			</tr>
			<tr> 
				<td class="title">银行网站</td>
				<td><input type="text" name="home" value="<?=$bank['home'] ?>"/></td>
			</tr>
			<tr> 
				<td class="title">状态</td>
				<td>
					<label><input type="radio" value="1" name="isDelete" <?=$this->iff($bank['isDelete'],'checked','') ?> />关闭</label>
					<label><input type="radio" value="0" name="isDelete" <?=$this->iff($bank['isDelete'],'','checked') ?> />开启</label>
				</td> 
			</tr>
			<tr> 
				<td class="title">排序位置</td>
				<td><input type="text" name="sort" value="<?=$bank['sort'] ?>"/></td>
			</tr>
			<tr> 
				<td class="title">绑定提款</td>
				<td>
					<label><input type="radio" value="1" name="tk" <?=$this->iff($bank['tk'],'checked','') ?> />允许</label>
					<label><input type="radio" value="0" name="tk" <?=$this->iff($bank['tk'],'','checked') ?> />不允许</label>
				</td> 
			</tr> 
			<tr> 
				<td class="title">绑定收款</td>
				<td>
					<label><input type="radio" value="1" name="sk" <?=$this->iff($bank['sk'],'checked','') ?> />允许</label>
					<label><input type="radio" value="0" name="sk" <?=$this->iff($bank['sk'],'','checked') ?> />不允许</label>
				</td> 
			</tr>
			<tr> 
				<td class="title">充值演示图片路径</td>
				<td><input type="text" name="rechargeDemo" value="<?=$bank['rechargeDemo'] ?>"/></td>
			</tr>
			<tr> 
				<td class="title">绑定赠送</td>
				<td>
					<label><input type="radio" value="1" name="zs" <?=$this->iff($bank['zs'],'checked','') ?> />赠送</label>
					<label><input type="radio" value="0" name="zs" <?=$this->iff($bank['zs'],'','checked') ?> />不赠送</label>
				</td> 
			</tr>
			<tr> 
				<td class="title">赠送金额</td>
				<td><input type="text" name="gift" value="<?=$this->iff($bank['gift'], $bank['gift'], '0.00') ?>"/></td>
			</tr>
		</table>
	</form>
</div>