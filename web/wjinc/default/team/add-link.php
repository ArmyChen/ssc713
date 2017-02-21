<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '添加链接－代理中心'); ?>
<script type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/js/comm/team.js"></script>
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
    <p id="page-title"><span class="fa fa-users"></span>添加链接</p>
    <div class="top_menu">
        <a href="<?=$this->basePath('Team-memberList') ?>">会员管理</a>
        <a href="<?=$this->basePath('Team-gameRecord') ?>">游戏记录</a>
        <a href="<?=$this->basePath('Team-report') ?>">盈亏报表</a>
        <a href="<?=$this->basePath('Team-coinall') ?>">团队统计</a>
        <a href="<?=$this->basePath('Team-coin') ?>">帐变记录</a>
        <a href="<?=$this->basePath('Team-cashRecord') ?>">提现记录</a>
        <a class="act" href="<?=$this->basePath('Team-linkList') ?>">推广链接</a>
    </div>
    <div class="page-info">
	 <div class="page_search">
  		 <form action="<?=$this->basePath('Team-insertLink') ?>" method="post" target="ajax" onajax="teamBeforeAddLink" call="teamAddLink">
		 	<input name="uid" type="hidden" id="uid" value="<?=$this->user['uid']?>" />
		<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>新增注册链接</td> 
    </tr>
    
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">账号类型：</td>
      <td align="left" ><label><input type="radio" name="type" value="1" title="代理" style="width:auto;" />代理</label><label><input name="type"  type="radio" value="0" title="会员" style="margin-left:30px;width:auto;" checked="checked" />会员</label></td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">返点%：</td>
      <td align="left" ><input name="fanDian" type="text" max="<?=$this->user['fanDian']?>" value=""  fanDianDiff=<?=$this->settings['fanDianDiff']?> /><span style="color:#000; margin-left:10px;">0-<?=$this->user['fanDian']?>%</span></td> 
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">不定位返点%：</td>
      <td align="left" ><input name="fanDianBdw" type="text" max="<?=$this->user['fanDianBdw']?>" value="" /><span style="color:#000; margin-left:10px;">0-<?=$this->user['fanDianBdw']?>%</span></td> 
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;"></td>
      <td align="left"><input type="submit" id='put_button_pass' class="btn_search addbtn btn btn-action" value="增加链接" >
        <input type="reset" value="重置" class="btn btn-action"/> </td> 
    </tr> 
</table> 
  </form> 
    </div>
	
        <div class="clear"></div>
	  <div class="page_list">
          
	  </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>
  
   
 