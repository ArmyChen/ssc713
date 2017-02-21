<!DOCTYPE HTML>
<html>
<head>
<?php $this->display('inc_skin.php', 0 , '平台提现－充值提现'); ?>
<script type="text/javascript">
function beforeToCash(){
	if(!this.amount.value) throw('请填写提现金额');
	if(!this.amount.value.match(/^[0-9]*[1-9][0-9]*$/)) throw('提现金额错误');
	showPaymentFee()
	var amount=parseInt(this.amount.value);
	if($('input[name=bankId]').val()==2||$('input[name=bankId]').val()==3){
		if(amount<parseFloat(<?=json_encode($this->settings['cashMin1'])?>)) throw('支付宝/财付通提现最小限额为<?=$this->settings['cashMin1']?>元');
		if(amount>parseFloat(<?=json_encode($this->settings['cashMax1'])?>)) throw('支付宝/财付通提现最大限额为<?=$this->settings['cashMax1']?>元');
		showPaymentFee()
	}else{
		if(amount<parseFloat(<?=json_encode($this->settings['cashMin'])?>)) throw('提现最小限额为<?=$this->settings['cashMin']?>元');
		if(amount>parseFloat(<?=json_encode($this->settings['cashMax'])?>)) throw('提现最大限额为<?=$this->settings['cashMax']?>元');
		showPaymentFee()
	}
	if(!this.coinpwd.value) throw('请输入资金密码');
	if(this.coinpwd.value<6) throw('资金密码至少6位');
	showPaymentFee()
}

function toCash(err, data){
	if(err){
		davidError(err);
	}else{    
		reloadMemberInfo();
		$(':password').val('');
		$('input[name=amount]').val('');
		window.location.href="<?=$this->basePath('Cash-toCashResult') ?>";
	}
}
$(function(){
	$('input[name=amount]').keypress(function(event){
		event.keyCode=event.keyCode||event.charCode;
		
		return !!(
			// 数字键
			(event.keyCode>=48 && event.keyCode<=57)
			|| event.keyCode==13
			|| event.keyCode==8
			|| event.keyCode==46
			|| event.keyCode==9
		)
	});
});
</script>
<script type="text/javascript">
function showPaymentFee() {
   $("#ContentPlaceHolder1_txtMoney").val($("#ContentPlaceHolder1_txtMoney").val().replace(/\D+/g, ''));
   jQuery("#chineseMoney").html(changeMoneyToChinese($("#ContentPlaceHolder1_txtMoney").val()));
        }
</script>
<?php
	$bank=$this->getRow("select m.*,b.logo logo, b.name bankName from {$this->prename}member_bank m, {$this->prename}bank_list b where m.bankId=b.id and b.isDelete=0 and m.uid=? limit 1", $this->user['uid']);
	$this->freshSession(); 
    $date=strtotime('00:00:00');
	$date2=strtotime('00:00:00');
	$time=strtotime(date('Y-m-d', $this->time));
	$cashAmout=0;
		$rechargeAmount=0;
		$rechargeTime=strtotime('00:00');
		if($this->settings['cashMinAmount']){
			$cashMinAmount=$this->settings['cashMinAmount']/100;
			$gRs=$this->getRow("select sum(case when rechargeAmount>0 then rechargeAmount else amount end) as rechargeAmount from {$this->prename}member_recharge where  uid={$this->user['uid']} and state in (1,2,9) and isDelete=0 and rechargeTime>=".$rechargeTime);
			if($gRs){
				$rechargeAmount=$gRs["rechargeAmount"];
			}
		}
	$cashAmout=$this->getValue("select sum(mode*beiShu*actionNum) from {$this->prename}bets where actionTime>={$rechargeTime} and uid={$this->user['uid']} and isDelete=0");
	$times=$this->getValue("select count(*) from {$this->prename}member_cash where actionTime>=$time and uid=?", $this->user['uid']);
?>
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
    <p id="page-title"><span class="fa fa-cny"></span>平台提现</p>
    <div class="top_menu">
        <a href="<?= $this->basepath('Cash-rechargeLog') ?>">充值记录</a>
        <a href="<?= $this->basepath('Cash-toCashLog') ?>">提现记录</a>
        <a class="act" href="<?= $this->basepath('Cash-toCash') ?>">平台提现</a>
        <a href="<?= $this->basepath('Cash-recharge') ?>">自动充值</a>
    </div>
    <div class="page-info">
       <div class="page_list">
            <?php if($bank['bankId']){?>
            <form action="<?=$this->basePath('Cash-ajaxToCash') ?>" method="post" target="ajax" datatype="json" onajax="beforeToCash" call="toCash">
                    <?php
                      $key='9cc1ab94e49d22ff';
                      $timess=md5(time());
                      $token=md5($key.$timess);
                    ?>
            <div class="help">
                <h4 class="fa fa-exclamation-circle"><span>提现须知</span></h4>
               <p>您是尊贵的&nbsp;&nbsp; <strong style="font-size:16px;color:red;">VIP<?=$this->user['grade']?></strong>&nbsp;&nbsp;客户，每天限提&nbsp;&nbsp;<strong style="font-size:16px;color:red;"><?=$this->getValue("select maxToCashCount from {$this->prename}member_level where level=?", $this->user['grade'])?></strong>&nbsp;&nbsp;次,今天您已经成功发起了&nbsp;&nbsp;<strong style="font-size:16px;color:green"><?=$times?></strong>&nbsp;&nbsp;次提现申请</p>
	                    <p>每天的提现处理时间为：<strong style="font-size:16px;color:red;" >
    早上 <?=$this->settings['cashFromTime']?> 至 晚上
    <?=$this->settings['cashToTime']?></strong></p>
	                    <p>提现3分钟内到账。(如遇高峰期，可能需要延迟到十分钟内到帐)</p>
	                    <p style="color:blue;">用户每次最小提现100元&nbsp;&nbsp;
    <strong style="color:green;font-size:16px;"><?=$this->settings['cashMin']?></strong>&nbsp;&nbsp;元，最大提现&nbsp;&nbsp; 
    <strong style="color:green;font-size:16px;"><?=$this->settings['cashMax']?></strong>&nbsp;&nbsp;元。
            </div>
			<div class="help">
                <h4 class="fa fa-exclamation-circle"><span>消费详情</span></h4>
                 <p>今日投注：&nbsp;&nbsp;<?=$this->iff($cashAmout,$cashAmout,0)?> &nbsp;&nbsp;今日充值：&nbsp;&nbsp;<?=$this->iff($rechargeAmount,$rechargeAmount,0)?> &nbsp;&nbsp;</p>
				 <p>(消费比例未达到系统设置的&nbsp;&nbsp;<strong style="color:red" id="sysbili"><?=$this->settings['cashMinAmount']?></strong>&nbsp;&nbsp;%，则不能提款.)&nbsp;&nbsp;&nbsp;&nbsp;计算公式：消费比例=投注量/充值额</p>
	          
            </div>
            <table border="0" cellpadding="0" cellspacing="0">
                    <input name="CANKIF_BOK" type="hidden" value="<?=$timess?>" />
                    <input name="TOLKEASF_ASH" type="hidden" value="<?=$token?>" />
                    <tbody>
					<tr>
                        <td class="tdtitle" style="padding-top: 9px;" width="150">可提现金额：</td>
                        <td><span style="margin-left:10px;"><?=$this->user['coin'] ?></span></td>
                    </tr>
                    <tr>
                        <td class="tdtitle">银行信息：</td>
                        <td><img class="bankimg" src="/<?=$bank['logo']?>" title="<?=$bank['bankName']?>" style="margin-left:10px;"/></td>
                    </tr>
                    <tr>
                        <td class="tdtitle">账户名：</td>
                        <td><input readonly value="<?=preg_replace('/^(\w).*$/', '\1**', $bank['username'])?>" type="text" /></td>
                    </tr>
                    <tr>
                        <td class="tdtitle">银行账号：</td>
                        <td><input  readonly value="<?=preg_replace('/^.*(\w{4})$/', '***\1', $bank['account'])?>" type="text"/></td>
                    </tr>
                    <tr>
                        <td class="tdtitle">提现金额：</td>
                        <td><span><input name="amount" class="spn9"  value="" id="ContentPlaceHolder1_txtMoney"  type="text" onkeyup="showPaymentFee();"/></span>&nbsp;&nbsp;<span> ( 单笔提现限额：最低：&nbsp;<strong style="color:red"><?=$this->settings['cashMin']?></strong>&nbsp;元， 最高：&nbsp;<strong style="color:red"><?=$this->settings['cashMax']?></strong>&nbsp;元 ) </span></td>
                    </tr>
                    <tr>
                        <td class="tdtitle" style="padding-top: 9px;">提现金额(大写)：</td>
                        <td>&nbsp;<strong style="color:red;margin-left:10px" id="chineseMoney"></strong></td>
                    </tr>
                    <tr>
                        <td class="tdtitle" style="padding-top: 9px;">资金密码：</td>
                        <td>&nbsp;<span id="chineseMoney"></span><input id="coinpwd" name="coinpwd" type="password"></td>
                    </tr>
                    <tr>
                        <td class="tdtitle"></td>
                        <td height="30"><br><button name="submit"  id='put_button_pass' type="submit" class="btn_next btn btn-action"><i class="fa fa-chevron-right"></i>提交申请</button><br><br></td>
                    </tr>
                
            </tbody></table>
            <div class="clear"></div>		
</form>
  		<?php }else{?>
            <div style=" margin-top:30px; text-align:center;">尚未设置您的银行账户！&nbsp;&nbsp;<a href="<?=$this->basePath('Safe-info') ?>" style="color:#F00; text-decoration:none;">马上设置</a></div>
        <?php }?>
        </div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>