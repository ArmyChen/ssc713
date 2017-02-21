<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '团队统计－代理团队'); ?>
<script type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/js/comm/team.js"></script>
<?php 
$teamAll=$this->getRow("select sum(u.coin) coin, count(u.uid) count from {$this->prename}members u where u.isDelete=0 and concat(',', u.parents, ',') like '%,{$this->user['uid']},%'");
$teamAll2=$this->getRow("select count(u.uid) count from {$this->prename}members u where u.isDelete=0 and u.parentId={$this->user['uid']}");
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
    <p id="page-title"><span class="fa fa-users"></span>团队统计</p>
    <div class="top_menu">
        <a href="<?=$this->basePath('Team-memberList') ?>">会员管理</a>
        <a href="<?=$this->basePath('Team-gameRecord') ?>">游戏记录</a>
        <a href="<?=$this->basePath('Team-report') ?>">盈亏报表</a>
        <a class="act" href="<?=$this->basePath('Team-coinall') ?>">团队统计</a>
        <a href="<?=$this->basePath('Team-coin') ?>">帐变记录</a>
        <a href="<?=$this->basePath('Team-cashRecord') ?>">提现记录</a>
        <a href="<?=$this->basePath('Team-linkList') ?>">推广链接</a>
    </div>
    <div class="page-info">
	  <div class="page_list">
           <table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
        <tr height=25 class='table_b_tr_b'>
          <td align="right" style="font-weight:bold; padding-right: 10px;">账号类型：</td>
          <td align="left" style="padding-left: 10px;"><?=$this->iff($this->user['type'], '代理', '会员')?></td> 
        </tr>  
        <tr height=25 class='table_b_tr_b'>
          <td align="right" style="font-weight:bold; padding-right: 10px;">我的账号：</td>
          <td align="left" style="padding-left: 10px;"><?=$this->user['username']?></td> 
        </tr>  
         <tr height=25 class='table_b_tr_b'>
          <td align="right" style="font-weight:bold; padding-right: 10px;">可用余额：</td>
          <td align="left" style="padding-left: 10px;"><?=$this->user['coin']?> 元</td> 
        </tr> 
        <tr height=25 class='table_b_tr_b'>
          <td align="right" style="font-weight:bold; padding-right: 10px;">团队余额：</td>
          <td align="left" style="padding-left: 10px;"><?=$teamAll['coin']?> 元</td> 
        </tr>  
        <tr height=25 class='table_b_tr_b'>
          <td align="right" style="font-weight:bold; padding-right: 10px;">直属下级：</td>
          <td align="left" style="padding-left: 10px;"><?=$teamAll2['count']?> 个</td> 
        </tr>   
         <tr height=25 class='table_b_tr_b'>
          <td align="right" style="font-weight:bold; padding-right: 10px;">所有下级：</td>
          <td align="left" style="padding-left: 10px;"><?=($teamAll['count']-1)?> 个</td> 
        </tr>  
    </table> 
	  </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>
  
   
 