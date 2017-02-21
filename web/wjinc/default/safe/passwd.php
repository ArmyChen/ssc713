<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '密码管理－账户中心'); ?>
<script type="text/javascript">
function safeBeforSetPwd(){
	if(!this.oldpassword.value){davidInfo("请输入原密码");return false;}
	if(this.oldpassword.value.length<6){davidInfo("原密码至少6位");return false;}
	if(!this.newpassword.value){davidInfo("请输入新密码");return false;}
	if(this.newpassword.value.length<6){davidInfo("密码至少6位");return false;}
	var confirmpwd=$(':password.confirm', this).val();
	if(confirmpwd!=this.newpassword.value){davidInfo("两次输入密码不一样");return false;}
	return true;
}
function safeBeforSetCoinPwd(){
	if(!this.newpassword.value){davidInfo("请输入新资金密码");return false;}
	if(this.newpassword.value.length<6){davidInfo("资金密码至少6位");return false;}
	var confirmpwd=$(':password.confirm', this).val();
	if(confirmpwd!=this.newpassword.value){davidInfo("两次输入资金密码不一样");return false;}
	return true;
}
function safeBeforSetCoinPwd2(){
	if(!this.oldpassword.value){davidInfo("请输入原资金密码");return false;}
	if(this.oldpassword.value.length<6){davidInfo("原资金密码至少6位");return false;}
	if(!this.newpassword.value){davidInfo("请输入新资金密码");return false;}
	if(this.newpassword.value.length<6){davidInfo("资金密码至少6位");return false;}
	var confirmpwd=$(':password.confirm', this).val();
	if(confirmpwd!=this.newpassword.value){davidInfo("两次输入资金密码不一样");return false;}
	return true;
}
function safeSetPwd(err, data){
	if(err){
		davidError(err);
	}else{
		this.reset();
		davidOk(data);
		//设置为空
		$('input[type=password]').val('');
		//location.reload();
	}
}
</script>
<!--<script type="text/javascript">
    $(function() {
        getKeyBoard($('#oldpass'));
        getKeyBoard($('#newpass'));
    });
</script>-->
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
    <p id="page-title"><span class="fa fa-lock"></span>密码管理</p>
    <div class="clear"></div>
    <div class="top_menu">
        <a href="<?=$this->basePath('Safe-info') ?>" >账户信息</a>
        <a href="<?=$this->basePath('Safe-bank') ?>">我的银行卡</a>
        <a class="act" href="<?=$this->basePath('Safe-passwd') ?>">密码管理</a>
        <a href="<?=$this->basePath('Notice-info') ?>">站内公告</a>
        <a href="<?=$this->basePath('Letter-main') ?>">站内信</a>
    </div>
    <div class="page-info">
        <div class="page_list">
            <div class="page-title">一、登录密码管理</div>
    	<form action="<?=$this->basePath('Safe-setPasswd') ?>" method="post" target="ajax" onajax="safeBeforSetPwd" call="safeSetPwd">
                <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                        <td class="tdtitle">输入旧登录密码: </td>
                        <td>
                            <input type="password" name="oldpassword"  id="oldpass" style="background-color:#FAFAFA"/>
                        </td>
                    </tr>
                                        <tr>
                        <td class="tdtitle">输入新登录密码: </td>
                        <td><input type="password" name="newpassword" id="newpass"/><span class="pop"><s class="pop-l"></s><span>( 由字母和数字组成6-16个字符；且必须包含数字和字母，不允许连续三位相同，不能和资金密码相同 ) </span><s class="pop-r"></s></span></td>
                    </tr>
                    <tr>
                        <td class="tdtitle">确认新登录密码: </td>
                        <td>
                            <input type="password" name="confirm" class="confirm" id="confirm_newpass"/></td></tr><tr><td></td><td>
                            <button name="submit" type="submit" class="btn_next btn btn-action"><i class="fa fa-send"></i> 提交</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="clear"></div>
                <div class="page_list">
<?php if($args[0]){ ?>
 <div class="page-title">二、修改资金密码</div>
<form action="<?=$this->basePath('Safe-setCoinPwd2') ?>" method="post" target="ajax" onajax="safeBeforSetCoinPwd2" call="safeSetPwd">
                <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                        <td class="tdtitle">输入旧资金密码: </td>
                        <td>
                            <input type="password" name="oldpassword"  id="oldpass" style="background-color:#FAFAFA"/>
                        </td>
                    </tr>
                                        <tr>
                        <td class="tdtitle">输入新资金密码: </td>
                        <td><input type="password" name="newpassword" id="newpass"/><span class="pop"><s class="pop-l"></s><span>( 由字母和数字组成6-16个字符；且必须包含数字和字母，不允许连续三位相同，不能和登录密码相同 ) </span><s class="pop-r"></s></span></td>
                    </tr>
                    <tr>
                        <td class="tdtitle">确认新资金密码: </td>
                        <td>
                            <input type="password" name="confirm" class="confirm" id="confirm_newpass"/></td></tr><tr><td></td><td>
                            <button name="submit" type="submit" class="btn_next btn btn-action"><i class="fa fa-send"></i> 提交</button>
                        </td>
                    </tr>
                </table>
            </form>
<?php }else{ ?>
 <div class="page-title">二、资金密码管理</div>
<form action="<?=$this->basePath('Safe-setCoinPwd') ?>" method="post" target="ajax" onajax="safeBeforSetCoinPwd" call="safeSetPwd">
                <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                        <td class="tdtitle">输入新资金密码: </td>
                        <td>
                            <input type="password" name="newpassword" id="securitynewpass"/><span class="pop"><s class="pop-l"></s><span> (由字母和数字组成6-16个字符；且必须包含数字和字母，不允许连续三位相同，不能和登录密码相同) </span><s class="pop-r"></s></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdtitle">确认新资金密码: </td>
                        <td>
                            <input type="password" name="confirm" class="confirm" id="confirm_securitynewpass"/></td></tr><tr><td></td><td>
                            <button name="submit" type="submit" class="btn_next btn btn-action"><i class="fa fa-send"></i> 提交</button>
                        </td>
                    </tr>
                </table>
            </form>
<?php } ?>
        </div>
                <div class="clear"></div>
    </div>
</div>
</div>
<?php $this->display('inc_footer.php'); ?>
</body>
</html>
 