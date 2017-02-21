<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->display('inc_skin_lr.php',0,'忘记密码'); ?>
<script type="text/javascript">
//检测非法提交数据
function userBeforeForget(){
	var u=this.username.value;
	var p=this.password.value;
	var c=this.content.value;
	var q=this.qq.value;
	var v=this.vcode.value;
	if(!u){
	   davidInfo("请输入用户名");
	}else if(!c){
	   davidInfo("请输入备注内容，以便尽快申请重置密码！");
	}else if(!q){
	   davidInfo("请输入注册时的联系qq号码，以便与你取得联系！");
	}else if(!p){
	   davidInfo("请输入密码");
	}else if(!v){
	   davidInfo("请输入验证码");
	}else{
	   return true;
	}
	return false;
}
function userForget(err, data){
	if(err){
		davidError(err);
		$('input[name=vcode]')
		.val('');
		$('#validate').click();
	}else{
		davidOk(data);
		$('input[type=text]').val('');
		$('input[type=password]').val('');
		$('#content').val('');
	}
}
</script>
</head>
<body>
      <div id="xf_login_container">
            <div id="xf_login_top">
                <div class="xf_center">
                    <div class="xf_top_left"></div>
                    <div class="xf_top_right">
                        <ul>
                            <li><a href="<?=$this->basePath('User-forgetPwd') ?>" style="float:right;">忘记登录密码？</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- end.xf_login_top -->
 <form action="<?=$this->basePath('User-AddforgetPwd') ?>" method="post" onajax="userBeforeForget" enter="true" call="userForget" target="ajax">
    <div id="xf_login_mid">
        <div class="xf_center">
            <div class="xf_mid_left"></div>
            <div class="xf_mid_right forgetPwd">
                <div class="xf_mid_right_b forgetPwd_b">
                    <div class="login_form_title"><h2>忘记密码</h2></div>
                    <div class="login_form_user">
                        <input class="chang user_input" name="username" id="username" type="text" value="" placeholder="用户名" >
                    </div>
                    <div class="login_form_user">
                        <input class="chang user_input" name="password" id="password" type="password" value="" placeholder="曾经设置过的密码（忘记则可填大概密码）"  >
                    </div>
                    <div class="login_form_qq">
                        <input class="chang qq_input" type="text" name="qq" id="qq" maxlength="50" placeholder="注册时所填写的腾讯QQ帐号" title="注册时所填写的腾讯QQ帐号" >
                    </div>
                    <div style="margin-top:13px; margin-left:33px;">
					<textarea  name="content" id="content" style="width:415px; height:90px"></textarea>
					<p><span>*备注内容（请提交详细的备注内容！以便能够尽快审核信息！</span></p>
					<p><span>*备注范例（可为曾经使用过的密码、投注的订单、银行帐号、个人信息资料、</span></p>
					<p><span>注册日期、充值提现明细等等有效的信息证明！）</span></p>
                    </div>
                    <div class="login_form_veri">
                        <input class="duan veri_input" name="vcode" id="vcode" type="text" placeholder="验证码" >
                    </div>
                    <div class="veri_pic">
                        <img src="<?=$this->basePath('User-vcode')."&t=".$this->time ?>" name="validate" id="validate" onclick="this.src='<?=$this->basePath('User-vcode') ?>'+(new Date()).getTime()" height="38" width="105">                    
					</div>
                    <div class="xf_login_butt" style="margin-left:25%;">
                        <input value="提交信息" class="login_a" type="submit">           </div>
                </div>
            </div><!-- end.xf_mid_right -->
        </div><!-- end.xf_center -->
    </div><!-- end.xf_login_mid -->
</form>
<div class="xf_login_bot">
    <div class="xf_center">
        <div class="xf_bot_left">
            <div class="xf_login_copyright">
                <p>浏览器建议：首选FireFox浏览器,其次为360浏览器,请不要使用低版本IE。</p>
            </div>
            <div class="trust_web" style="display:none"></div>
        </div>
        <div class="xf_bot_right" style="display:none">
            <div class="two_code"></div>
        </div>
    </div><!-- end.xf_center -->
</div><!-- end.xf_login_bot -->
</div>
<!-- end.xf_login_container -->
</body>
</html>