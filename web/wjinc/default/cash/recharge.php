<!DOCTYPE HTML>
<html>
<head>
<?php $this->display('inc_skin.php', 0 , '自动充值－充值提现'); ?>
<script type="text/javascript">
$(function(){
	$('form').trigger('reset');
	$(':radio').click(function(){
		var data=$(this).data('bank'),
		box=$('#display-dom');
		
		$('#bank-type-icon', box).attr('src', '/'+data.logo);
		
		if($.cookie('rechargeBank')!=data.id) $.cookie('rechargeBank', data.id, 360*24);
	});
	
	var bankId=$.cookie('rechargeBank')||$(':radio').attr('value');
	$(':radio[value='+bankId+']').click();
	
	$('.copy').click(function(){
		var text=document.getElementById($(this).attr('for')).value;
		if(!CopyToClipboard(text, function(){
			davidOk('复制成功');
		}));
	});
	
	$('.example2').click(function(){
		var src='/'+$(this).attr('rel');
		if(src) $('<div>').append($('<img>',{src:src,width:'640px',height:'480px'})).dialog({width:630,height:500,title:'充值演示'});
	});
});

function checkRecharge(){
	if(!this.amount.value) throw('请填写充值金额');
	showPaymentFee();
	//if(isNaN(amount)) throw('充值金额错误');
	//if(!this.amount.value.match(/^\d+(\.\d{0,2})?$/)) throw('充值金额错误');
	showPaymentFee();
	var amount=parseInt(this.amount.value),
	$this=$('input[name=amount]',this),
	min=parseInt($this.attr('min')),
	max=parseInt($this.attr('max'));
	min1=parseInt($this.attr('min1')),
	max1=parseInt($this.attr('max1'));
	
	if($('input[name=mBankId]').val()==2||$('input[name=mBankId]').val()==3){
		if(amount<min1) throw('支付宝/财付通充值金额最小为'+min1+'元');
		if(amount>max1) throw('支付宝/财付通充值金额最多限额为'+max1+'元');
		showPaymentFee();
	}else{
		if(amount<min) throw('充值金额最小为'+min+'元');
		if(amount>max) throw('充值金额最多限额为'+max+'元');
		showPaymentFee();
	}
	if(!this.vcode.value) throw('请输入验证码');
	if(this.vcode.value<4) throw('验证码至少4位');
	showPaymentFee();
}
function toCash(err, data){
	if(err){
		davidError(err);
		$("#vcode").trigger("click");
	}else{
		$(':password').val('');
		$('input[name=amount]').val('');
		$('#page_list').html(data);
	}
}
$(function(){
	$('input[name=amount]').keypress(function(event){
		//console.log(event);
		event.keyCode=event.keyCode || event.charCode;
		return !!(
			// 数字键
			(event.keyCode>=48 && event.keyCode<=57)
			|| event.keyCode==13
			|| event.keyCode==8
			|| event.keyCode==9
			|| event.keyCode==46
		)
	});
});
</script>
<!--
<script type="text/javascript">
$(function(){
	$('.example2').click(function(){
		var src='/'+$(this).attr('rel');
		if(src) $('<img>',{src:src}).css({width:'640px',height:'480px'}).dialog({width:660,height:500,title:'充值演示'});
	});
});
</script>
-->

<!--//复制程序 flash+js-->
<script language="JavaScript">
function Alert(msg) {
	davidOk(msg);
}
function thisMovie(movieName) {
	 if (navigator.appName.indexOf("Microsoft") != -1) {   
		 return window[movieName];   
	 } else {   
		 return document[movieName];   
	 }   
 } 
function copyFun(ID) {
	thisMovie(ID[0]).getASVars($("#"+ID[1]).attr('value'));
}
</script>
<script type="text/javascript" src="/skin/js/swfobject.js"></script>
<script type="text/javascript">
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
    <p id="page-title"><span class="fa fa-cny"></span>自动充值</p>
    <div class="top_menu">
        <a href="<?= $this->basepath('Cash-rechargeLog') ?>">充值记录</a>
        <a href="<?= $this->basepath('Cash-toCashLog') ?>">提现记录</a>
        <a href="<?= $this->basepath('Cash-toCash') ?>">平台提现</a>
        <a class="act" href="<?= $this->basepath('Cash-recharge') ?>">自动充值</a>
    </div>
    <div class="page-info">
            <div class="help">
                <h4 class="fa fa-exclamation-circle"><span>自动充值使用需知</span></h4>
                <p>1.每天的充值处理时间为：<span class="redts redtsb">早上 9:00 至 次日凌晨2:00</span>;</p>
                <p>2.充值金额低于<span class="redts redtsb">100</span>&nbsp;不享受“充值即返手续费”的优惠;</p>
                <p>3.充值后, <span class="redts">请手动刷新您的余额</span>及查看相关帐变信息,若超过1分钟未上分,请与客服联系;</p>
                <p>4.选择充值银行, 填写充值金额, 点击 <span class="yellowts">[下一步]</span> 后, 将有详细文字说明及<span class="redts">充值演示</span>;</p>
                <p>5.充值卡号会频繁更换，<span class="redts redtsb">请一定要复制最新卡号信息</span>,不可直接用上次充值的卡号信息,<span class="redts redtsb">否则充到错误的卡号而产生的损失平台一律不负责！</span>。</p>
            </div>
        <div class="page_list" id="page_list">
			<form action="<?=$this->basePath('Cash-inRecharge') ?>" method="post" target="ajax" onajax="checkRecharge" call="toCash" dataType="html" style="width:50%;margin:0 auto;">
			<?php
				$sql="select * from {$this->prename}bank_list b, {$this->prename}sysadmin_bank m where m.admin=1 and m.enable=1 and b.isDelete=0 and b.id=m.bankId";
				$banks=$this->getRows($sql);
				if($banks){
			?>
            <table border="0" cellpadding="0" cellspacing="0">
				  <img src="/68886580626480945.jpg" style="width: 48%;" />
				  
				  <img src="/60095265167646889.jpg" style="margin-left:2%;width: 48%;" />
				  
				  <tbody style="display:none"><tr>
                        <td class="tdtitle">充值银行: </td>
                        <td>
                                 <?php
								
								$set=$this->getSystemSettings();
								if($banks) foreach($banks as $bank){
							?>
							<div class="bankchoice">
								<label><input value="<?=$bank['id']?>" type="radio" name="mBankId" data-bank='<?=json_encode($bank)?>' style="width:auto;" />
								<img src="<?=$bank['logo']?>" width="130" height="52" /><span style="background:url(/<?=$bank['logo']?>);" ></span></label>
							</div>
							<?php } ?>
							 </td>
                    </tr> 
                    <tr id="display-dom">
                        <td class="tdtitle">银行类型：</td>
                        <td ><img id="bank-type-icon" class="bankimg" title=""/><div class="clear"></div></td> 
                    </tr>
					<tr>
                        <td class="tdtitle">充值金额: </td>
                        <td><input name="amount" type="text" id="ContentPlaceHolder1_txtMoney" min="<?=$set['rechargeMin']?>" max="<?=$set['rechargeMax']?>" min1="<?=$set['rechargeMin1']?>" max1="<?=$set['rechargeMax1']?>" value="" onkeyup="showPaymentFee();"/>
                          <div style="display:inline;" class="spn12">(  单笔充值限额   最低： <b style="color:#FF0000"><?=$set['rechargeMin']?></b>  元，最高：  <b style="color:#FF0000"><?=$set['rechargeMax']?></b>  元 )</div></td>
                    </tr>
                    <tr>
                        <td class="tdtitle">充值金额(大写): </td>
                        <td>&nbsp;<span id="chineseMoney"></span></td>
                    </tr>
                    <tr>
                        <td class="tdtitle">验证码:</td>
                        <td><input name="vcode" type="text" style="ime-mode: disabled; width: 75px;" /><b class="yzmNum"><img width="58" height="24" border="0" style="cursor:pointer;margin-bottom:0px;" id="vcode" alt="看不清？点击更换" align="absmiddle" src="<?=$this->basePath('User-vcode').'&t='.$this->time ?>" title="看不清楚，换一张图片" onclick="this.src='<?=$this->basePath('User-vcode') ?>'+(new Date()).getTime()"/></b></td>
                    </tr>
                    <tr>
                        <td class="tdtitle"></td>
                        <td><button name="submit" type="submit" class="btn_next btn btn-action"><i class="fa fa-chevron-right"></i> 下一步</button></td>
                    </tr>
               </tbody>
			   
			</table>
			 <?php }else{ ?>
			 <table><tr><td>由于系统原因，官方暂时关闭充值通道！如有疑问请联系在线客服！</td></tr></table>
                <?php }?>
			</form>
            <div class="clear"></div>
        </div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>