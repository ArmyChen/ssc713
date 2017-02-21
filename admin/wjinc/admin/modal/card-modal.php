<div class="card-modal">
	<form action="/admin778899.php/system/<?=$args[1] ?>Card<?=$this->iff($args[0],'/'.$args[0],'') ?>" method="post" target="ajax" call="sysReload">
	<?php 
		$banks=$this->getRows("select id, name from {$this->prename}bank_list where isDelete=0 and sk=1 order by sort");
		if($args[0]){
		$bankId=intval($args[0]);
		$bank=$this->getRow("select * from {$this->prename}sysadmin_bank where id=$bankId");
		}
	?>
		<table class="tablesorter left" cellspacing="0" width="100%">
			<?php if($args[0]){ ?>
				<tr> 
					<td class="title">ID</td> 
					<td><input type="text" name="id" disabled value="<?=$args[0] ?>"/></td>
				</tr>
			<?php }?>
			<tr> 
				<td class="title">银行名称</td> 
				<td>
					<select name="bankId">
					<?php if($banks) foreach($banks as $var){ ?>
						<option value="<?=$var['id'] ?>" <?=$this->iff($bank['bankId']==$var['id'],'selected') ?>><?=$var['name'] ?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr> 
				<td class="title">账号</td> 
				<td><input type="text" name="account" value="<?=$bank['account'] ?>"/></td>
			</tr>
			<tr> 
				<td class="title">持卡人</td> 
				<td><input type="text" name="username" value="<?=$bank['username'] ?>"/></td>
			</tr>
			<tr> 
				<td class="title">状态</td> 
				<td>
					<label><input type="radio" value="1" name="enable" <?=$this->iff($bank['enable'],'checked','') ?> />开启</label>
					<label><input type="radio" value="0" name="enable" <?=$this->iff($bank['enable'],'','checked') ?> />关闭</label>
				</td> 
			<tr> 
			<tr> 
				<td class="title">充值赠送</td> 
				<td>
					<label><input type="radio" value="1" name="rechargeGift" <?=$this->iff($bank['rechargeGift'],'checked','') ?> />开启</label>
					<label><input type="radio" value="0" name="rechargeGift" <?=$this->iff($bank['rechargeGift'],'','checked') ?> />关闭</label>
				</td> 
			<tr>
			<tr> 
				<td class="title">赠送比例</td> 
				<td><input type="text" name="gift" value="<?=$bank['gift'] ?>"/>%</td>
			</tr>
			<tr> 
				<td class="title">最小充值</td> 
				<td><input type="text" name="rechargeMin" value="<?=$this->iff($bank['rechargeMin'], $bank['rechargeMin'], 1.00) ?>"/>元</td>
			</tr>
			<tr> 
				<td class="title">最大充值</td> 
				<td><input type="text" name="rechargeMax" value="<?=$this->iff($bank['rechargeMax'], $bank['rechargeMax'], 99999.00) ?>"/>元</td>
			</tr>
		</table>
	</form>
</div>