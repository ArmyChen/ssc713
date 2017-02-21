<?php
	$sql="select r.* from {$this->prename}member_recharge r where r.id={$args[0]}";
	$rechargeInfo=$this->getRow($sql, $args[0]);
	if($rechargeInfo['mBankId']){
		$sql="select mb.username accountName, mb.account account, b.name bankName from {$this->prename}members u,{$this->prename}member_bank mb, {$this->prename}bank_list b where u.uid={$rechargeInfo['uid']} and mb.id={$rechargeInfo['mBankId']} and mb.bankId=b.id and b.isDelete=0";
		$bankInfo=$this->getRow($sql);
	}
?>
<style type="text/css">
.modal-body {height:170px; font-size:14px;}
.modal-body ul{ position:absolute;width:800px;}
.modal-body li{ float:left; margin:20px 30px 10px 30px;}
</style>
   <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title" id="myModalLabel">充值订单信息</h4>
   </div>
   <div class="modal-body" >
    <ul>
	  <li><em>用户：</em><span class="red"><?=$rechargeInfo['username']?></span></li>
	  <li><em>充值金额：</em><span class="red"><?=$rechargeInfo['amount']?></span></li>
	  <li><em>充值前资金：</em><span class="red"><?=number_format($rechargeInfo['coin'],2)?>元</span></li>
	  <li><em>充值银行：</em><span class="red"><?=$this->ifs($bankInfo['bankName'], '--')?></span></li>
	  <li><em>银行账号：</em><span class="red"><?=$this->ifs($bankInfo['account'], '--')?></span></li>
	  <li><em>开户名：</em><span class="red"><?=$this->ifs($bankInfo['accountName'], '--')?></span></li>
	  <li><em>充值时间：</em><span class="red"><?=date("Y-m-d H:i:s",$rechargeInfo['rechargeTime'])?></span></li>
    </ul>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-action" data-dismiss="modal">关闭</button>
	 <!--<button type="button" class="btn btn-primary">提交更改</button>-->
   </div>  