<?php
	$sql="select c.*, u.username user, u.coin coin, b.name bankName from {$this->prename}member_cash c,{$this->prename}members u, {$this->prename}bank_list b where b.id=c.bankId and c.uid=u.uid and b.isDelete=0 and c.id={$args[0]}";
	$cashInfo=$this->getRow($sql, $args[0]);
?>
<style type="text/css">
.modal-body {height:170px; font-size:14px;}
.modal-body ul{ position:absolute;width:800px;}
.modal-body li{ float:left; margin:20px 30px 10px 30px;}
</style>
   <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title" id="myModalLabel">提现订单信息</h4>
   </div>
   <div class="modal-body" >
    <ul>
	  <li><em>用户：</em><span class="red"><?=$cashInfo['user']?></span></li>
	  <li><em>提现金额：</em><span class="red"><?=$cashInfo['amount']?></span></li>
	  <li><em>提现前可用资金：</em><span class="red"><?=number_format($cashInfo['coin'])?>元</span></li>
	  <li><em>银行：</em><span class="red"><?=$this->ifs($cashInfo['bankName'], '--')?></span></li>
	  <li><em>银行账号：</em><span class="red"><?=$this->ifs($cashInfo['account'], '--')?></span></li>
	  <li><em>开户名：</em><span class="red"><?=$this->ifs($cashInfo['username'], '--')?></span></li>
	  <li><em>申请时间：</em><span class="red"><?=date("Y-m-d H:i:s",$cashInfo['rechargeTime'])?></span></li>
    </ul>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-action" data-dismiss="modal">关闭</button>
	 <!--<button type="button" class="btn btn-primary">提交更改</button>-->
   </div>  
