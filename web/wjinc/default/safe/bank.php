<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '我的银行卡－账户中心'); ?>
<script type="text/javascript">
function safeBeforSetCBA(){
	if(!this.account.value){davidInfo("银行帐号没有填写");return false;}
	if(!this.username.value){davidInfo("银行开户名没有填写");return false;}
	if(!this.coinPassword.value){davidInfo("请输入资金密码");return false;}
	if(this.coinPassword.value<6){davidInfo("资金密码至少6位");return false;}
	return true;
}
function safeSetCBA(err, data){
	if(err){
		davidError(err);
	}else{
		davidOk(data);
		//设置为空
		$('input[type=password]').val('');
		//location.reload();
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
    <p id="page-title"><span class="fa fa-lock"></span>我的银行卡</p>
    <div class="clear"></div>
    <div class="top_menu">
        <a href="<?=$this->basePath('Safe-info') ?>" >账户信息</a>
        <a class="act" href="<?=$this->basePath('Safe-bank') ?>">我的银行卡</a>
        <a href="<?=$this->basePath('Safe-passwd') ?>">密码管理</a>
        <a href="<?=$this->basePath('Notice-info') ?>">站内公告</a>
        <a href="<?=$this->basePath('Letter-main') ?>">站内信</a>
    </div>
     <div class="page-info">
	 <?php if($this->user['coinPassword']){ ?>
        <div class="page_list">
            <div class="help">
                <h4 class="fa fa-exclamation-circle"><span>使用提示</span></h4>
                <p>1. 银行卡绑定成功后, 平台任何区域都 <span class="redts redtsb">不会</span> 出现您的完整银行账号, 开户姓名等信息。</p>
                <p>2. 每个游戏账号最多绑定<span class="redts redtsb">1</span> 张银行卡。</p>
                <p>3. 新绑定的提款银行卡需要绑定时间超过<span class="redts redtsb">6</span> 小时才能正常提款。</p>
                <p>4. 一个账户只能绑定同一个开户人姓名的银行卡。</p>
            </div>
            <div class="clear"></div>
  <form action="<?=$this->basePath('Safe-setCBAccount') ?>" method="post" target="ajax" onajax="safeBeforSetCBA" call="safeSetCBA">
   <table border="0" cellpadding="0" cellspacing="0">
    <tbody>
	 <tr>
       <td class="tdtitle"><font color="#FF0000">*</font>&nbsp;开户银行:</td>
       <td>
       <?php
          $myBank=$this->getRow("select * from {$this->prename}member_bank where uid=?", $this->user['uid']);
          $banks=$this->getRows("select * from {$this->prename}bank_list where isDelete=0 and tk=1 order by sort");
          $flag=($myBank['editEnable']!=1)&&($myBank);
       ?>
        <select name="bankId" style="width:170px;" <?=$this->iff($flag, 'disabled')?>>
        <?php foreach($banks as $bank){ ?>
            <option value="<?=$bank['id']?>" <?=$this->iff($myBank['bankId']==$bank['id'], 'selected')?>><?=$bank['name']?></option>
        <?php } ?>
        </select>&nbsp;&nbsp;&nbsp;<span id="bank_msg" style="color:#ff3300"></span>
       </td>
	 </tr>
	 <tr>
       <td class="tdtitle"><font color="#FF0000">*</font>&nbsp;开户人姓名:</td>
       <td>
       <input placeholder="由1至30个字符或汉字组成, 不能使用特殊字符" name="username" value="<?=$this->iff($myBank['username'],mb_substr($myBank['username'],0,1,'utf-8').'**')?>" <?=$this->iff($flag, 'readonly')?> size="15" type="text" />
       </td>
	 </tr>
	 <tr>
       <td class="tdtitle"><font color="#FF0000">*</font>&nbsp;<span id="banknameinfo_1">银行账号</span>:</td>
       <td style="position: relative;">
                            <input style="background: none repeat scroll 0% 0% rgb(238, 238, 238); border: 1px solid rgb(221, 221, 221);"  class="needdesc" maxlength="19" name="account" id="account" size="30" type="text" value="<?=preg_replace('/^.*(\w{4})$/', '***\1', $myBank['account'])?>" <?=$this->iff($flag, 'readonly')?> />
                       </td>
                    </tr>
					 <tr>
                        <td class="tdtitle"><font color="#FF0000">*</font>&nbsp;资金密码:</td>
                        <td>
                            <input type="password" name="coinPassword" <?=$this->iff($flag, 'readonly')?> />
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <button name="submit" type="submit" class="btn_next btn btn-action" <?=$this->iff($flag, 'disabled')?> ><i class="fa fa-chevron-right"></i> 绑定银行卡</button>
                        </td>
                    </tr>
                </tbody></table>
</form>
<?php }else{ ?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr height=25 class='table_b_tr_b'>
      <td align="right" width="25%" style="font-weight:bold;"><font color=#777777>温馨提示：</font></td>
      <td align="left" width="75%"><div class='font_line_2'>设置银行信息要用资金密码，您尚未设置资金密码！&nbsp;&nbsp;<a href="<?=$this->basePath('Safe-passwd') ?>" style="text-decoration:none; color:#f00">设置资金密码</a></div></td> 
    </tr> 
</table> 
<?php }?>
            <div class="clear"></div>
        </div>
    </div>
</div>
</div>
<?php $this->display('inc_footer.php'); ?>
</body>
</html>