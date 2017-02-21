<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->display('inc_skin_lr.php',0,'用户登录'); ?>
</head>
<script type="text/javascript">
//检测非法提交数据
function userBeforeLogin(){
	var u=this.username.value;
	var p=this.password.value;
	var v=this.vcode.value;
	if(!u || u=='帐号'){
	   davidInfo("请输入用户名！");
	}else if(!p || p=='xx@x@x.x'){
	   davidInfo("请输入密码！");
	}else if(!v || v=='验证码'){
	   davidInfo("请输入验证码！");
	}else{
	   return true;
	}
	return false;
}
function userLogin(err, data){
	if(err){
	     davidError(err);
	     $('#vcode').val('');
		 $('#password').val('');
	     $('#validate').click();
	}else{
		location='/';
	}
}
</script>
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
 <form action="<?=$this->basePath('User-logined') ?>" method="post" onajax="userBeforeLogin" enter="true" call="userLogin" target="ajax">
    <div id="xf_login_mid">
        <div class="xf_center">
            <div class="xf_mid_left"></div>
            <div class="xf_mid_right">
                <div class="xf_mid_right_b">
                    <div class="login_form_title"><h2>用户登录</h2></div>
                    <div class="login_form_user">
                        <input class="chang user_input" name="username" id="username" type="text" value="" placeholder="用户名" >
                    </div>
                    <div class="login_form_password">
                        <input class="chang password_input" name="password" id="password" type="password" value="" placeholder="密码"  >
                    </div>
                    <div class="login_form_veri">
                        <input class="duan veri_input" name="vcode" id="vcode" type="text" placeholder="验证码" >
                    </div>
                    <div class="veri_pic">
                        <img src="<?=$this->basePath('User-vcode')."&t=".$this->time ?>" name="validate" id="validate" onclick="this.src='<?=$this->basePath('User-vcode') ?>'+(new Date()).getTime()" height="38" width="105">                    
					</div>
                    <div class="xf_login_butt">
                        <input value="登录" class="login_a" type="submit">
                        <a href="javascript:void(0)" class="login_down" onclick="down()">下载客户端</a>                    </div>
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
<!--
取消了客服功能！如需请取消注释  js调用函数为 kf()
<script type='text/javascript'>
function kf(){
<?php if($this->settings['kefuStatus']){ ?> //客服是否开启
	var iTop = (window.screen.availHeight-30-570)/2; //获得窗口的垂直位置;
	var iLeft = (window.screen.availWidth-10-750)/2; //获得窗口的水平位置;
	var url = '<?=$this->settings['kefuGG']?>';
	var winOption = "height=570,width=750,top="+iTop+",left="+iLeft+",toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,fullscreen=1";
	var newWin = window.open(url,window, winOption);
	<?php }else{ ?>
     	alert("客服系统正在维护，程序猿在拼命打代码，请稍后访问！");
	<?php } ?>
	return false;
}
function down(){
    window.location="<?=$this->settings['templateurl'] ?>/template/down/inst.exe";
}
</script>-->