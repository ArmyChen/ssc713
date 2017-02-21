<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '提现记录－充值提现'); ?>
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
        <a class="act" href="<?= $this->basepath('Cash-toCashLog') ?>">提现记录</a>
        <a href="<?= $this->basepath('Cash-toCash') ?>">平台提现</a>
        <a href="<?= $this->basepath('Cash-recharge') ?>">自动充值</a>
    </div>
    <div class="page-info">
	  <div class="page_list">
	  </div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>

<!-- 模板2 带表格 -->
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
    <p id="page-title"><span class="fa fa-cny"></span>游戏记录</p>
    <div class="top_menu">
        <a href="<?=$this->basePath('Team-memberList') ?>">会员管理</a>
        <a class="act" href="<?=$this->basePath('Team-gameRecord') ?>">游戏记录</a>
        <a href="<?=$this->basePath('Team-report') ?>">盈亏报表</a>
        <a href="<?=$this->basePath('Team-coinall') ?>">团队统计</a>
        <a href="<?=$this->basePath('Team-coin') ?>">帐变记录</a>
        <a href="<?=$this->basePath('Team-cashRecord') ?>">提现记录</a>
        <a href="<?=$this->basePath('Team-linkList') ?>">推广链接</a>
    </div>
    <div class="page-info">
	 <div class="page_search">
  		<form action="<?=$this->basePath('Team-searchGameRecord', $this->userType) ?>" dataType="html" call="recordSearch" target="ajax">
  		
		 <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>

      <input type="button" value="查 询" class="btn_search btn btn-action"/>
      </td>
	  </tr></table>
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
