<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->display('inc_skin.php', 0 , '余额宝－活动中心'); ?>
<script type="text/javascript">
//余额宝存取利率
function pull(err,data){
	if(err){
		davidError(err);
	}else{
		davidOk(data);
		reloadMemberInfo();
	}
}
function checkDeposit(){
	if(!this.amount.value) throw('请填写转存金额');
	if(!this.amount.value.match(/^[0-9]*[1-9][0-9]*$/)) throw('转存金额错误');
	if(!this.vcode.value) throw('请输入验证码');
	if(this.vcode.value<4) throw('验证码至少4位');
	showPaymentFee();
}
function toDeposit(err, data){
 if(err){
		davidError(err);
	}else{
		davidOk(data);
		//reloadMemberInfo();
		window.location='<?=$this->basePath('Report-coin') ?>';
	}
}
function showPaymentFee() {
   $("#ContentPlaceHolder1_txtMoney").val($("#ContentPlaceHolder1_txtMoney").val().replace(/\D+/g, ''));
   jQuery("#chineseMoney").html(changeMoneyToChinese($("#ContentPlaceHolder1_txtMoney").val()));
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
    <p id="page-title"><span class="fa fa-bullhorn"></span>余额宝</p>
    <div class="top_menu">
        <a href="<?=$this->basePath('Event-huodong') ?>">优惠活动</a>
        <a class="act" href="<?= $this->basePath('Deposit-main') ?>">余额宝</a>
         <!--<a href="<?= $this->basePath('ChouJiang-main') ?>">抽奖</a>
        <a href="<?= $this->basePath('Event-shuiguoji') ?>">水果机</a>-->
    </div>
    <div class="page-info">
        <div class="page_search">
		<table><tr>
		<td>
		 <a href="<?=$this->basePath('Deposit-pull') ?>" dataType="json" call="pull" target="ajax" class="btn btn1 btn-action">领取收益</a>
		<a href="<?=$this->basePath('Deposit-recharge') ?>" class="btn btn1 btn-action">余额宝（存款）</a>
		<a href="<?=$this->basePath('Deposit-tocash') ?>" class="btn btn1 btn-action">余额宝（取款）</a>
		</td>
	  </tr>
	    </table> 
        </div>
        <div class="clear"></div>
	  <div class="page_list">
	   <div class="display biao-cont">     
	 <form action="<?=$this->basePath('Deposit-indeposit') ?>" method="post" target="ajax" onajax="checkDeposit" call="toDeposit">
      <input name="uid" type="hidden" id="uid" value="<?=$this->user['uid']?>" />
	<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>余额宝（存款）</td> 
    </tr>

	<tr height=25 class='table_b_tr_b' >
      <td align="center" class="copys" height="80"><b style="display:inline; color:#FF0000">余额宝说明：<b></td>
      <td align="left" >
	  <P>余额宝是平台打造的余额增值服务。把钱转入余额宝，每天有获收益。</P>
	  <p>收益效果为支付宝26倍，活期存款200倍以上，以存入余额宝余额为主</p>
	  <p>如何领取：存入时间超过1小时，即可在首页自助点击领取收益！</p>
      </td> 
    </tr>
	<tr height=25 class='table_b_tr_b' >
      <td align="center" class="copys" height="80"><b style="display:inline; color:#FF0000">余额宝收益计算：<b></td>
      <td align="left" >
	  <P>收益计算一：<span class="red">存款余额宝时间在于&nbsp;&nbsp;<span style="color:#FF0000;font-weight:bold"><?= $this->settings['deposittime1'] ?></span>-<span style="color:#FF0000;font-weight:bold"><?= $this->settings['deposittime2'] ?></span>&nbsp;&nbsp;分钟内，按实时余额宝余额：<span style="color:#FF0000;font-weight:bold"><?= $this->settings['depositll1'] ?>%</span>&nbsp;的利率计算收益奖励；</span></P>
	 <P>收益计算二：<span class="red">存款余额宝时间在于&nbsp;&nbsp;<span style="color:#FF0000;font-weight:bold"><?= $this->settings['deposittime2'] ?></span>-<span style="color:#FF0000;font-weight:bold"><?= $this->settings['deposittime3'] ?></span>&nbsp;&nbsp;分钟内，按实时余额宝余额：<span style="color:#FF0000;font-weight:bold"><?= $this->settings['depositll2'] ?>%</span>&nbsp;的利率计算收益奖励；</span></P>
	 <P>收益计算三：<span class="red">存款余额宝超过时间&nbsp;&nbsp;<span style="color:#FF0000;font-weight:bold"><?= $this->settings['deposittime3'] ?></span>&nbsp;&nbsp;分钟，按实时余额宝余额：<span style="color:#FF0000;font-weight:bold"><?= $this->settings['depositll3'] ?>%</span>&nbsp;的利率计算收益奖励；</span></P>
	  <p></p>
	  <p>填写转存的金额，点击[确认转入]后，转入余额宝</p>
      </td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="center" class="copys">当前余额宝存额：</td>
      <td align="left" ><b style="margin-left:12px;" class="green"><?= $this->user['deposit'] ?></b></td>
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="center" class="copys">当前账户可用余额：</td>
      <td align="left" ><b style="margin-left:12px;color:#FF0000;"><?= $this->user['coin'] ?></b></td>
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="center" class="copys">转入金额：</td>
      <td align="left" ><input name="amount" id="ContentPlaceHolder1_txtMoney" value="" type="text" onkeyup="showPaymentFee();"/></td>
    </tr>
	<tr height=25 class='table_b_tr_b'>
      <td align="center" class="copys">转入金额（大写）：</td>
      <td align="left" ><strong style="color:#FF0000;margin-left:10px" id="chineseMoney"></strong></td>
    </tr>
	<tr height=25 class='table_b_tr_b'>
      <td align="center" class="copys">验证码：</td>
      <td align="left" ><input name="vcode" type="text" style="ime-mode: disabled; width: 90px;" /><b class="yzmNum">
	  <img width="80" height="25" border="0" style="cursor:pointer;margin-bottom:0px;" id="vcode" alt="看不清？点击更换" align="absmiddle" src="<?=$this->basePath('User-vcode')."&t=".$this->time ?>" title="看不清楚，换一张图片" onclick="this.src='<?=$this->basePath('User-vcode') ?>'+(new Date()).getTime()"/></b></td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="center" style="font-weight:bold;"></td>
      <td align="left"><input type="button" id='put_button_pass' class="btn btn-action" value="确认转入" style="width:100px;"  onclick="$(this).closest('form').submit()"> </td> 
    </tr> 
</table> 
</form>
</div>
	  </div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>
  
   
 