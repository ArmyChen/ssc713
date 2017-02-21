<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->display('inc_skin_lr.php',0,'新用户注册'); ?>
</head>
<body>
<div id="xf_login_container">
            <div id="xf_login_top">
                <div class="xf_center">
                    <div class="xf_top_left"></div>
                    <div class="xf_top_right">
                        <ul>
                            <li><a href="javascript:void(0)" style="float:right;">忘记登录密码？</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- end.xf_login_top -->
			
<script type="text/javascript">
   function registerBefor(){
	var type=$('[name=type]:checked',this).val();
	if(!this.vcode.value){ 
	  davidError('请输入图片中的验证码');
	  return false;
	}else if(!this.username.value){ 
	  davidError('请输入用户名');
	}else if(!/^\w{4,16}$/.test(this.username.value)){
	  davidError('用户名由4到16位的字母、数字及下划线组成');
	}else if(!this.password.value){
	  davidError('请输入密码');
	}else if(this.password.value.length<6){
	  davidError('密码至少6位');
	}else if(!this.cpasswd.value){
	  davidError('请输入确认密码');
	}else if(this.cpasswd.value!=this.password.value){
	  davidError('两次输入密码不一样');
	}else{
	   return true;
	}
	return false;
}
function register(err,data){
	if(err){
		davidInfo(err);
		$('input[name=vcode]')
		.val('');
		$('#validate').click();
	}else{
		davidOk(data);
		location='/index.php?tnt=uln';
	}
}
</script>
       <?php if($args[0]){?>
		<form action="<?=$this->basePath('User-reg') ?>" method="post" onajax="registerBefor" enter="true" call="register" target="ajax">
        	<input type="hidden" name="codec" value="<?=$args[0]?>" />
    <div id="xf_login_mid">
        <div class="xf_center">
            <div class="xf_mid_left"></div>
            <div class="xf_mid_right register">
                <div class="xf_mid_right_b register_b">
                    <div class="login_form_title"><h2>自动注册</h2></div>
                    <div class="login_form_user">
                        <input class="chang user_input" name="username" type="text" id="username" value="" spellcheck="false" maxlength="5096" title="由0-9,a-z,A-Z组成的6-16个字符" placeholder="账号" >
                    </div>
                    <!--<div class="login_form_user">
                       <input class="chang user_input" aria-label="昵称：" type="text" name="nickname" id="nickname" value="" spellcheck="false" maxlength="5096" title="由2至8个字符组成" placeholder="昵称" >
                    </div>-->
                    <div class="login_form_password">
                        <input class="chang password_input" name="password" type="password" id="password" spellcheck="false" maxlength="50" placeholder="密码"  >
                    </div>
					<div class="login_form_password">
                        <input class="chang password_input" name="cpasswd" type="password" id="cpasswd" spellcheck="false" maxlength="50" placeholder="确认密码"  >
                    </div>
                    <div class="login_form_qq">
                        <input class="chang qq_input" type="text" name="qq" id="qq" spellcheck="false" maxlength="50" placeholder="QQ" title="请输入常用的腾讯帐号" >
                    </div>
                    <div class="login_form_veri">
                        <input class="duan veri_input"  aria-label="验证码：" type="text" name="vcode"  id="vcode" value="" spellcheck="false" maxlength="5096" title="请输入右边图片中的数字"  placeholder="验证码">
                    </div>
                    <div class="veri_pic">
                         <img width="103" id="validate" height="40" border="0" style="cursor:pointer;" align="absmiddle" src="<?=$this->basePath('User-vcode')."&t=".$this->time ?>" title="看不清楚，换一张图片" onclick="this.src='<?=$this->basePath('User-vcode') ?>'+(new Date()).getTime()"/>
                    </div>
                    <div class="xf_login_butt">
                        <input type="submit" value="注册"  class="login_a">
                        <a href="javascript:void(0)" class="login_down">下载客户端</a>
                    </div>
                </div>
            </div><!-- end.xf_mid_right -->
        </div><!-- end.xf_center -->
    </div><!-- end.xf_login_mid -->
</form>
<?php }else{?>
   <div style="text-align:center; line-height:50px; color:#FF0; font-size:20px; font-weight:bold;">链接失效！</div>
<?php }?>
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
</html>
