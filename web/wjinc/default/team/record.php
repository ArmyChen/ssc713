<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '游戏记录-代理中心'); ?>
<script type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/js/comm/team.js"></script>
<script type="text/javascript">
$(function(){
	$('.page_search form input[name=username]')
	.focus(function(){
		if(this.value=='用户名') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='用户名';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});
	
	$('.page_search form input[name=betId]')
	.focus(function(){
		if(this.value=='输入单号') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='输入单号';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});
	
	$('.btn_search').click(function(){
		$(this).closest('form').submit();
	});
	//分页
	$('.bottompage a[href]').live('click', function(){
		$('.page_list').load($(this).attr('href'));
		return false;
	});

});
function recordSearch(err, data){
	if(err){
		davidError(err);
	}else{
		$('.page_list').html(data);
	}
}
function recodeRefresh(){
	$('.page_list').load(
		$('.bottompage .pagecurrent').attr('href')
	);
}
function deleteBet(err, code){
	if(err){
		davidError(err);
	}else{
		recodeRefresh();
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
    <p id="page-title"><span class="fa fa-users"></span>游戏记录</p>
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
<select name="type" >
        	<option value="0" <?=$this->iff($_REQUEST['type']=='', 'selected="selected"')?>>全部彩种</option>
            <?php
                if($this->types) foreach($this->types as $var){ 
                    if($var['enable']){
            ?>
            <option value="<?=$var['id']?>" <?=$this->iff($_REQUEST['type']==$var['id'], 'selected="selected"')?>><?=$this->iff($var['shortName'], $var['shortName'], $var['title'])?></option>

            <?php }} ?>
        </select>
       <select name="state" >
            <option value="0" selected>所有状态</option>
            <option value="1">已派奖</option>
            <option value="2">未中奖</option>
            <option value="3">未开奖</option>
            <option value="4">追号</option>
            <option value="5">撤单</option>
        </select>
		<select name="mode" >
            <option value="" selected>全部模式</option>
            <option value="2.000">元</option>
            <option value="0.200">角</option>
            <option value="0.020">分</option>
            <option value="0.002">厘</option>
        </select>
      
       <select name="utype" >
            <option value="0" selected>所有人</option>
            <option value="1">我自己</option>
            <option value="2">直属下线</option>
            <option value="3">所有下线</option>
        </select>
       
        <input height="20" value="用户名" name="username" type="text"/>
       <input height="20" value="输入单号" name="betId" type="text" />  </td>
	  </tr>
	  <tr><td>
      <input type="text" name="fromTime" class="datainput"  value="<?=$this->iff($_REQUEST['fromTime'],$_REQUEST['fromTime'],date('Y-m-d H:i:s',$GLOBALS['fromTime']))?>"/>至<input type="text" name="toTime"  class="datainput" value="<?=$this->iff($_REQUEST['toTime'],$_REQUEST['toTime'],date('Y-m-d H:i:s',$GLOBALS['toTime']))?>"/>
	          
      <input type="button" value="查 询" class="btn_search btn btn-action " />
	  </td></tr>
    </table>
  </form> 
    </div>
	
    <div class="clear"></div>
	  <div class="page_list">
        <!--下注列表-->
        <?php $this->display('team/record-list.php'); ?>
        <!--下注列表 end -->
	  </div>
    <div class="clear"></div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>
  
   
 