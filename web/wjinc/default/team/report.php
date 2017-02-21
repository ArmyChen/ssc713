<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '盈亏报表-代理中心'); ?>
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

	$('.btn_search').click(function(){
		$(this).closest('form').submit();
	});
	
	//分页
	$('.bottompage a[href]').live('click', function(){
		$('.tableList').load($(this).attr('href'));
		return false;
	});


});
function searchData(err, data){
	if(err){
		davidError(err);
	}else{
		$('.page_list').html(data);
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
    <p id="page-title"><span class="fa fa-users"></span>盈亏报表</p>
    <div class="top_menu">
        <a href="<?=$this->basePath('Team-memberList') ?>">会员管理</a>
        <a href="<?=$this->basePath('Team-gameRecord') ?>">游戏记录</a>
        <a class="act" href="<?=$this->basePath('Team-report') ?>">盈亏报表</a>
        <a href="<?=$this->basePath('Team-coinall') ?>">团队统计</a>
        <a href="<?=$this->basePath('Team-coin') ?>">帐变记录</a>
        <a href="<?=$this->basePath('Team-cashRecord') ?>">提现记录</a>
        <a href="<?=$this->basePath('Team-linkList') ?>">推广链接</a>
    </div>
    <div class="page-info">
	 <div class="page_search">
  		<form action="<?=$this->basePath('Team-searchReport') ?>" target="ajax" call="searchData" dataType="html">
        <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
        <input type="text" height="20" value="用户名" name="username"/>
        <input type="text" name="fromTime" class="datainput"  value="<?=$this->iff($_REQUEST['fromTime'],$_REQUEST['fromTime'],date('Y-m-d H:i:s',$GLOBALS['fromTime']))?>"/>至<input type="text" name="toTime"  class="datainput" value="<?=$this->iff($_REQUEST['toTime'],$_REQUEST['toTime'],date('Y-m-d H:i:s',$GLOBALS['toTime']))?>"/>
      <input type="button" value="查 询" class="btn_search btn btn-action"/>
      </td>
	  </tr></table>
  </form> 
    </div>
	
        <div class="clear"></div>
	  <div class="page_list">
          <? $this->display('team/report-list.php');  ?>
	  </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>
  
   
 