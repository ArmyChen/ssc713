<?php
    $this->getSystemSettings();
	$sql="select r.*,u.username username from {$this->prename}member_recharge r, {$this->prename}members u where r.uid=u.uid and r.id=?";
	$rechargeData=$this->getRow($sql, $args[0]);
?>
<div class="bet-info popupModal">
<input type="hidden" value="<?=$this->user['username']?>" />
<form action="/admin778899.php/business/rechargeHandle"  target="ajax" method="post" call="rechargeSubmitCode" onajax="rechargeBeforeSubmit" dataType="html">
	<input type="hidden" name="id" value="<?=$args[0]?>"/>
<table cellpadding="0" cellspacing="0" width="320" class="layout">
	<tr>
		<th>用户名：</th>
		<td><input type="text" value="<?=$rechargeData['username']?>" /></td>
	</tr>
	<tr>
		<th>充值金额：</th>
		<td><input type="text" name="amount" readonly="readonly" value="<?=$rechargeData['amount']?>" /></td>
	</tr>
	<tr>
		<th>实际到账：</th>
		<td><input type="text" name="rechargeAmount" value="<?=$rechargeData['amount']?>"/></td>
	</tr>
	<tr>
		<th></th>
		<td><span style="color:#F00">同时到账赠送的 </span><?=$rechargeData['gift'] ?><span style="color:#F00"> 元！</span></td>
	</tr>
</table>
</form>
</div>