<!doctype html>
<html>
<input type="hidden" value="<?=$this->user['username']?>" />
<head>
<meta NAME="robots" CONTENT="noindex,nofollow">
<meta name="robots" content="noarchive"> <!-- 屏蔽-->
<meta content="IE=EmulateIE8" http-equiv="X-UA-Compatible" />
<meta charset="utf-8"/>
<title>后台管理员登陆</title>
<link rel="stylesheet" href="/skin/admin/layout.css" type="text/css" />
<!--[if IE]>
	<link rel="stylesheet" href="/skin/admin/ie.css" type="text/css" />
	<script src="/skin/js/html5.js"></script>
<![endif]-->
<!--<script src="/skin/js/jquery-1.7.2.min.js"></script>-->
<script type="text/javascript" src="/skin/js/jquery-1.8.0.min.js"></script>
<script src="/skin/admin/onload.js"></script>
<script src="/skin/admin/function.js"></script>
<script src="/skin/js/html5.js"></script>
<script type="text/javascript" src="/skin/js/Barrett.js"></script>
<script type="text/javascript" src="/skin/js/BigInt.js"></script>
<script type="text/javascript" src="/skin/js/RSA.js"></script>
<script>
function checkLogin(){
	if(!this.username.value) throw('用户名不能为空');
	if(!this.password.value) throw('密码不能为空');
}

function doLogin(err, data){
	if(err){
		alert(err);
	}else{
		//alert('验证成功');
		location='\x2f\x61\x64\x6d\x69\x6e\x37\x37\x38\x38\x39\x39\x2e\x70\x68\x70\x2f';
	}
}
//window.attachEvent("onload", correctPNG);
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#safepass").blur(function(){
  var SAFEPASS=$("#safepass").val();
  setMaxDigits(131);
  var key = new RSAKeyPair($("#ContentPlaceHolder1_hdstrPublicKeyExponent").val(), "", $("#ContentPlaceHolder1_hdstrPublicKeyModulus").val());
  var SAFEPASSS=encryptedString(key, SAFEPASS);
  $("#safepass").val(SAFEPASSS);
  });
});
</script>
<style type="text/css">
html,body {
	height: 100%;
	font-size:15px;
}
input{font-size:15px; font-family:"Verdana, Arial, Helvetica, sans-serif"}
body {
	margin: 0;
	background-color: #d9dee2;
	background-image: -webkit-gradient(linear,left top,left bottom,from(#ebeef2),to(#d9dee2));
	background-image: -webkit-linear-gradient(top,#ebeef2,#d9dee2);
	background-image: -moz-linear-gradient(top,#ebeef2,#d9dee2);
	background-image: -ms-linear-gradient(top,#ebeef2,#d9dee2);
	background-image: -o-linear-gradient(top,#ebeef2,#d9dee2);
	background-image: linear-gradient(top,#ebeef2,#d9dee2);
}

#login {
	position: absolute;
	top: 40%;
	left: 50%;
	z-index: 0;
	margin: -150px 0 0 -230px;
	padding: 30px;
	width: 400px;
	height: 300px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	background-color: #fff;
	background-image: -webkit-gradient(linear,left top,left bottom,from(#fff),to(#eee));
	background-image: -webkit-linear-gradient(top,#fff,#eee);
	background-image: -moz-linear-gradient(top,#fff,#eee);
	background-image: -ms-linear-gradient(top,#fff,#eee);
	background-image: -o-linear-gradient(top,#fff,#eee);
	background-image: linear-gradient(top,#fff,#eee);
	-webkit-box-shadow: 0 0 2px rgba(0,0,0,0.2),0 1px 1px rgba(0,0,0,.2),0 3px 0 #fff,0 4px 0 rgba(0,0,0,.2),0 6px 0 #fff,0 7px 0 rgba(0,0,0,.2);
	-moz-box-shadow: 0 0 2px rgba(0,0,0,0.2),1px 1px 0 rgba(0,0,0,.1),3px 3px 0 rgba(255,255,255,1),4px 4px 0 rgba(0,0,0,.1),6px 6px 0 rgba(255,255,255,1),7px 7px 0 rgba(0,0,0,.1);
	box-shadow: 0 0 2px rgba(0,0,0,0.2),0 1px 1px rgba(0,0,0,.2),0 3px 0 #fff,0 4px 0 rgba(0,0,0,.2),0 6px 0 #fff,0 7px 0 rgba(0,0,0,.2);
}
#login:before {
	position: absolute;
	top: 5px;
	right: 5px;
	bottom: 5px;
	left: 5px;
	z-index: -1;
	border: 1px dashed #ccc;
	-webkit-box-shadow: 0 0 0 1px #fff;
	-moz-box-shadow: 0 0 0 1px #fff;
	box-shadow: 0 0 0 1px #fff;
	content: '';
}
h1 {
	position: relative;
	margin: 0 0 30px 0;
	color: #666;
	text-align: center;
	text-transform: uppercase;
	letter-spacing: 4px;
	font: normal 26px/1 Verdana,Helvetica;
}

h1:after,h1:before {
	position: absolute;
	top: 15px;
	width: 120px;
	height: 1px;
	background-color: #777;
	content: "";
}

h1:after {
	right: 0;
	background-image: -webkit-gradient(linear,left top,right top,from(#777),to(#fff));
	background-image: -webkit-linear-gradient(left,#777,#fff);
	background-image: -moz-linear-gradient(left,#777,#fff);
	background-image: -ms-linear-gradient(left,#777,#fff);
	background-image: -o-linear-gradient(left,#777,#fff);
	background-image: linear-gradient(left,#777,#fff);
}

h1:before {
	left: 0;
	background-image: -webkit-gradient(linear,right top,left top,from(#777),to(#fff));
	background-image: -webkit-linear-gradient(right,#777,#fff);
	background-image: -moz-linear-gradient(right,#777,#fff);
	background-image: -ms-linear-gradient(right,#777,#fff);
	background-image: -o-linear-gradient(right,#777,#fff);
	background-image: linear-gradient(right,#777,#fff);
}

fieldset {
	margin: 0;
	padding: 0;
	border: 0;
}

#inputs input {
	margin: 0 0 10px 0;
	padding: 15px 15px 15px 30px;
	width: 353px;
	border: 1px solid #ccc;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	background: #f1f1f1 url(images/login-sprite.png) no-repeat;
	-webkit-box-shadow: 0 1px 1px #ccc inset,0 1px 0 #fff;
	-moz-box-shadow: 0 1px 1px #ccc inset,0 1px 0 #fff;
	box-shadow: 0 1px 1px #ccc inset,0 1px 0 #fff;
}

#username {
	background-position: 5px -2px !important;
}

#password {
	background-position: 5px -52px !important;
}

#inputs input:focus {
	outline: 0;
	border-color: #e8c291;
	background-color: #fff;
	-webkit-box-shadow: 0 0 0 1px #e8c291 inset;
	-moz-box-shadow: 0 0 0 1px #e8c291 inset;
	box-shadow: 0 0 0 1px #e8c291 inset;
}

#actions {
	margin: 25px 0 0 0;
}

#submit {
	float: left;
	padding: 0;
	width: 120px;
	height: 35px;
	border-color: #d69e31 #e3a037 #d5982d #e3a037;
	border-style: solid;
	border-width: 1px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	background-color: #ffb94b;
	background-image: -webkit-gradient(linear,left top,left bottom,from(#fddb6f),to(#ffb94b));
	background-image: -webkit-linear-gradient(top,#fddb6f,#ffb94b);
	background-image: -moz-linear-gradient(top,#fddb6f,#ffb94b);
	background-image: -ms-linear-gradient(top,#fddb6f,#ffb94b);
	background-image: -o-linear-gradient(top,#fddb6f,#ffb94b);
	background-image: linear-gradient(top,#fddb6f,#ffb94b);
	-webkit-box-shadow: 0 0 1px rgba(0,0,0,0.3),0 1px 0 rgba(255,255,255,0.3) inset;
	-moz-box-shadow: 0 0 1px rgba(0,0,0,0.3),0 1px 0 rgba(255,255,255,0.3) inset;
	box-shadow: 0 0 1px rgba(0,0,0,0.3),0 1px 0 rgba(255,255,255,0.3) inset;
	color: #8f5a0a;
	text-shadow: 0 1px 0 rgba(255,255,255,0.5);
	font: bold 15px Arial,Helvetica;
	cursor: pointer;
}

#submit:hover,#submit:focus {
	background-color: #fddb6f;
	background-image: -webkit-gradient(linear,left top,left bottom,from(#ffb94b),to(#fddb6f));
	background-image: -webkit-linear-gradient(top,#ffb94b,#fddb6f);
	background-image: -moz-linear-gradient(top,#ffb94b,#fddb6f);
	background-image: -ms-linear-gradient(top,#ffb94b,#fddb6f);
	background-image: -o-linear-gradient(top,#ffb94b,#fddb6f);
	background-image: linear-gradient(top,#ffb94b,#fddb6f);
}

#submit:active {
	outline: 0;
	-webkit-box-shadow: 0 1px 4px rgba(0,0,0,0.5) inset;
	-moz-box-shadow: 0 1px 4px rgba(0,0,0,0.5) inset;
	box-shadow: 0 1px 4px rgba(0,0,0,0.5) inset;
}

#submit::-moz-focus-inner {
	border: 0;
}
</style>
</head>
<body>
<!--<input type="hidden" name="ctl00$ContentPlaceHolder1$hdstrPublicKeyExponent" id="ContentPlaceHolder1_hdstrPublicKeyExponent" value="10001" />
<input type="hidden" name="ctl00$ContentPlaceHolder1$hdstrPublicKeyModulus" id="ContentPlaceHolder1_hdstrPublicKeyModulus" value="EA342DD43D8DFFD3B033555A96D81B453106A264DB8EF73F0D465A70518D057DA329AAA575292519D2C8A7F3EC1EEE9DEAFD5765939407C1697D1C3FBB1EAB1E290B095708A8B2D287BF08F705751F7F9C55A819E1C554453AB53853A612A6E11334A371343C088612B3958EC92A6BF3DC5D320D2F33E6AF452070B284E1BAA7" />-->
<form id="login" target="ajax" onajax="checkLogin" call="doLogin" action="/admin778899.php/user/checkLogin" method="post">
    <h1>后台管理系统</h1>
    <fieldset id="inputs">
        <input type="text" value="管理员：<?=$_COOKIE['username']?>" readonly="true">   
		<input id="username" name="username" value="<?=$_COOKIE['username']?>" type="hidden">
        <input id="password" name="password" type="password" placeholder="请输入密码" required autofocus>
		 <input id="safepass" name="safepass" type="password" placeholder="请输入安全码" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" style=" float:right" value="系统登录">
    </fieldset>
</form>
</body>
</html>
