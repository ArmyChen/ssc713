
<script type="text/javascript">
function BeforeAddLetter(){}
function AddLetter(err, data){
	if(err){
		error(err);
	}else{
		success(data);
		load('letter/addlettermain');
	}
}
</script>
<style type="text/css">
	.addlettermain{float:right; margin-right:100px; margin-bottom:20px;}
	.addletteruser{width:170px; height:300px; float:left; margin-left:100px; margin-right:30px; position:absolute}
	.txt{ width:500px;}
	.txt2{ width:500px; height:230px;}
</style>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
<header><h3 class="tabs_involved">编写站内信</h3></header>
<form action="/admin778899.php/letter/addletter" dataType="html" target="ajax" method="post" onajax="BeforeAddLetter" call="AddLetter">
         <div class="tableList">
			 <div style=" float:left; margin-top:20px; position:absolute;">
			 <?php 
			  if($args[0]==""){
			     $userWhere="";
			  }else{
			     $userWhere=" where uid={$args[0]}";
			  }?>
			 <select name="user" size="30" class="addletteruser" multiple="multiple">
			   <optgroup label="-------会员-------" style="font-style:normal; font-weight:normal"></optgroup>
			 <?php
			   $users=$this->getRows("select uid,username from {$this->prename}members $userWhere");
		     	 foreach($users as $user){ 
			 ?>
			   <option value="<?=$user['uid']?>" ><?=$user['username']?></option>
			 <?php } ?>
			 </select>
			 </div>
			<div class="addlettermain">
                <dl>
                	<dt>主题：</dt>
                    <dd><input name="title" type="text" value="" class="txt" /></dd>
                </dl>
                <dl>
                	<dt>内容：</dt>
                    <dd><textarea name="content" class="txt2"></textarea></dd>
                </dl>
                <dl class="pagemain">
                	<dt>&nbsp;</dt>
                    <dd><input type="submit" class="btn btn-action" value="发 送" /></dd>
                </dl>
            </div>
		</div>
</form>
</article>