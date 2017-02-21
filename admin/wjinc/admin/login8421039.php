<!doctype html>
<html>
<input type="hidden" value="<?=$this->user['username']?>" />
<head>
<meta NAME="robots" CONTENT="noindex,nofollow">
<meta name="robots" content="noarchive"> <!-- 屏蔽-->
<meta content="IE=EmulateIE8" http-equiv="X-UA-Compatible" />
<meta charset="utf-8"/>
<title>后台管理员登陆</title>
<!--[if IE]>
	<link rel="stylesheet" href="/skin/admin/ie.css" type="text/css" />
	<script src="/skin/js/html5.js"></script>
<![endif]-->
<script src="/skin/js/jquery-1.8.0.min.js"></script>
<script src="/skin/admin/onload.js"></script>
<script src="/skin/js/html5.js"></script>
<script>
function checkLogin(){
	if(!this.username.value) throw('用户名不能为空');
	if(!this.vcode.value) throw('验证码不能为空');
}

function doLogin(err, data){
	if(err){
		alert(err);
		$('#imgcode').click();
	}else{
		location='\x2f\x61\x64\x6d\x69\x6e\x37\x37\x38\x38\x39\x39\x2e\x70\x68\x70\x2f\x75\x73\x65\x72\x2f\x6c\x6f\x67\x69\x6e\x65\x64';
	}
}


//window.attachEvent("onload", correctPNG);
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
	top: 50%;
	left: 50%;
	z-index: 0;
	margin: -150px 0 0 -230px;
	padding: 30px;
	width: 400px;
	height: 240px;
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
<form id="login" target="ajax" onajax="checkLogin" call="doLogin" action="/admin778899.php/user/checkLogined" method="post" >
    <h1>后台管理系统</h1>
    <fieldset id="inputs">
        <input id="username" name="username" type="text" placeholder="管理员帐号" autofocus required>   
        <input id="vcode" name="vcode" type="text" placeholder="验证码" required>
		<div style="position:absolute; margin-top:-55px; margin-left:60% "><img id="imgcode" align="absmiddle" onClick="this.src='/admin778899.php/user/vcode/'+(new Date()).getTime()" title="看不清楚，换一张图片" src="/admin778899.php/user/vcode/<?=$this->time?>" width="120" height="43"/></div>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" style=" float:right" value="下一步">
    </fieldset>
</form>
</body>
</html>
<!--有什么好看的！I am DAVID  -->
