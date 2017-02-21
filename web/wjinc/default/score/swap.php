<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '活动中心-金币兑换'); $good=$args[0]; ?>
<script type="text/javascript">
function scoreBeforeSwapGood(){
	if(!this.address.value){davidInfo('请填写邮寄地址');return false;};
	if(!this.mobile.value) {davidInfo('请填写收件电话');return false;};
	if(!this.coinpwd.value) {davidInfo('请填写资金密码');return false;};
}
function scoreBeforeSwapGood2(){
	if(!this.number.value) {davidInfo('请填写兑换数量');return false;};
	if(isNaN(this.number.value)) {davidInfo('兑换数量必须为整数1');return false;};
	if(!this.coinpwd.value) {davidInfo('请填写资金密码');return false;};
}
function scoreSwapGood(err, data){
	if(err){
		davidError(err);
	}else{
		reloadMemberInfo();
		davidOk(data);
	}
}
</script>
</head> 
 <body>
<?php $this->display('inc_header.php'); ?>
<div id="rightcon">
            <div class="head-box">
                <div class="haed-box-wrapper">
                    <div class="head-box-bg1" id="transform"></div>
                    <div class="head-box-bg2" id="transform"></div>
                    <div class="head-box-bg3"></div>
                </div>
            </div>
            <div class="wrapper bigbox">
<div class="page-wrapper">
    <p id="page-title"><span class="fa fa-fire"></span>金币兑换</p>
    <div class="top_menu">
        <a class="act" href="<?= $this->basePath('Score-goods') ?>">金币兑换</a>
        <a></a>
    </div>
    <div class="page-info">
	 <div class="help"> 
	    <h4 class="fa fa-exclamation-circle"><span><?=$this->settings['scoreRule']?></span></h4>
	 </div>
	  <div class="page_list">
	 <div class="display biao-cont">
		<?php if($good['price']>0){ ?>
        <form action="<?=$this->basePath('Score-swapGood') ?>" method="post" target="ajax" onajax="scoreBeforeSwapGood2" call="scoreSwapGood">
        <input type="hidden" name="goodId" value="<?=$good['id']?>"/>
        
        <table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
        <tr class='table_b_th'>
        <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>请确认此次兑换</td> 
        </tr>
        <tr height=25 class='table_b_tr_b'>
        <td align="right" width="25%" style="font-weight:bold;"></td>
        <td align="left" width="75%" height="40"><div class="spn11">此次兑换：<span class="spn16"><?=$good['score']?></span>金币=<span class="spn16"><?=$good['price']?></span>元</div></td> 
        </tr> 
        <tr height=25 class='table_b_tr_b'>
        <td align="right" style="font-weight:bold;"></td>
        <td align="left"n height="40" ><div class="spn11">此次兑换将扣除您<span class="spn16"><?=$good['score']?></span>金币！</div></td> 
        </tr> 
        <tr height=25 class='table_b_tr_b'>
        <td align="right" style="font-weight:bold;">兑换数量：</td>
        <td align="left" ><input type="text" name="number" value="1" /></td> 
        </tr>  
        <tr height=25 class='table_b_tr_b'>
        <td align="right" style="font-weight:bold;">资金密码：</td>
        <td align="left" ><input type="password" name="coinpwd" value="" /></td> 
        </tr>  
        <tr height=25 class='table_b_tr_b'>
        <td align="right" style="font-weight:bold;"></td>
        <td align="left"><input type="submit" id='put_button_pass' class="btn btn-action" value="确认兑换" > 
        <input type="button" value="等等再说" onClick="history.back()"  class="btn btn-action"/> </td> 
        </tr> 
        </table> 
        </form>
        <?php }else{?>
        <form action="<?=$this->basePath('Score-swapGood') ?>" method="post" target="ajax" onajax="scoreBeforeSwapGood" call="scoreSwapGood">
        <input type="hidden" name="goodId" value="<?=$good['id']?>"/>
        <table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
        <tr class='table_b_th'>
        <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>请填写您的邮寄收件信息</td> 
        </tr>
        <tr height=25 class='table_b_tr_b'>
        <td align="right" width="25%" style="font-weight:bold;"></td>
        <td align="left" width="75%" height="60"><div class="spn11">此次兑换将扣除您<span class="spn16"><?=$good['score']?></span>金币！</div></td> 
        </tr> 
        <tr height=25 class='table_b_tr_b'>
        <td align="right" style="font-weight:bold;">邮寄地址：</td>
        <td align="left" ><input type="text" name="address" value="<?=$this->user['province'].$this->user['city'].$this->user['address']?>" /></td> 
        </tr> 
        <tr height=25 class='table_b_tr_b'>
        <td align="right" style="font-weight:bold;">收件电话：</td>
        <td align="left" ><input type="text" name="mobile" value="<?=$this->user['mobile']?>" /></td> 
        </tr> 
        <tr height=25 class='table_b_tr_b'>
        <td align="right" style="font-weight:bold;">资金密码：</td>
        <td align="left" ><input type="password" name="coinpwd" value="" /></td> 
        </tr>  
        <tr height=25 class='table_b_tr_b'>
        <td align="right" style="font-weight:bold;"></td>
        <td align="left">
		  <input type="submit" id='put_button_pass' class="btn btn-action" value="确认兑换" > 
		  <input type="button" value="等等再说" onClick="history.back()"  class="btn btn-action"/> </td> 
        </tr>
        </table> 
        </form>
        <?php }?>
    </div>
	  </div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>