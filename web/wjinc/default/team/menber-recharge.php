<?php 
	$sql="select * from {$this->prename}members where uid=?";
	$userData=$this->getRow($sql, $args[0]);
?>
<style type="text/css">
.modal-body {height:240px; font-size:14px;}
.modal-body ul{ position:absolute;width:800px;}
.modal-body li{ float:left; margin:10px 30px 10px 30px;}
</style>

<form action="<?=$this->basePath('Team-userUpdateed2') ?>" target="ajax" method="post" call="userCoinSubmitCode" onajax="userCoinBeforeSubmitCode" dataType="html">
	<input type="hidden" name="uid" value="<?=$args[0]?>"/>
<div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title" id="myModalLabel">团队会员充值</h4>
   </div>
   <div class="modal-body" >
    <ul>
	  <li>
	    <em>上级关系：</em><span class="red"><?=$this->getValue("select username from {$this->prename}members where uid={$userData['parentId']} ")?> > <?=$userData['username']?></span>
	  </li>
	 <li>
	    <em>用户名：</em><span class="red"><?=$userData['username']?></span>
	  </li>
	   <li>
	    <em>用户余额：</em><span><?=$userData['coin']?></span>
	  </li>
	   <li>
	    <em>我的余额：</em><span class="red"><?=$this->user['coin']?></span>
	  </li>
	  <br /><br />
	   <li>
	    <em>充值数：</em><input type="text" name="coin" value=""  style="width:80px;"></p><span class="red">*请认真核对充值金额，只能充值1-10000元</span>
	  </li>
    </ul>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-action" data-dismiss="modal">关闭</button>
	 <button type="sumbit" class="btn btn-action">提交更改</button>
   </div>  
</form>