<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '站内信－账户中心'); ?>
<script type="text/javascript">
$(function(){
	$('#btn_search').click();
	//分页
	$('.bottompage a[href]').live('click', function(){
		$('.page_list').load($(this).attr('href'));
		return false;
	});
});
function BeforeSearchLetter(){}
function SearchLetter(err, data){
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
    <p id="page-title"><span class="fa fa-lock"></span>站内信</p>
    <div class="top_menu">
        <a href="<?=$this->basePath('Safe-info') ?>" >账户信息</a>
        <a href="<?=$this->basePath('Safe-bank') ?>">我的银行卡</a>
        <a href="<?=$this->basePath('Safe-passwd') ?>">密码管理</a>
        <a href="<?=$this->basePath('Notice-info') ?>">站内公告</a>
        <a class="act" href="<?=$this->basePath('Letter-main') ?>">站内信</a>
    </div>
     <div class="page-info">
       <div class="page_search">
  		<form action="<?=$this->basePath('Letter-searchLetter') ?>" dataType="html" target="ajax" method="post" onajax="BeforeSearchLetter" call="SearchLetter">
		 <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
  		<select name="type">
            <option value="1" selected>所有类型</option>
            <option value="2">发送列表</option>
            <option value="3">接收列表</option>
        </select>
      <input type="text" name="fromTime" class="datainput"  value="<?=$this->iff($_REQUEST['fromTime'],$_REQUEST['fromTime'],date('Y-m-d H:i:s',$GLOBALS['fromTime']))?>"/>至<input type="text" name="toTime"  class="datainput" value="<?=$this->iff($_REQUEST['toTime'],$_REQUEST['toTime'],date('Y-m-d H:i:s',$GLOBALS['toTime']))?>"/>         
      <input type="submit" value="查 询" id="btn_search" class="btn_search btn btn-action "/>
	   <?php if($this->settings['LetterStatus']==1 && $this->user['mLetterStatus']==1){ //总开关为1，用户配置为1则开启   ?> 
         <input type="button" value="发送站内信" class="btn_search btn btn-action"  onclick="window.location='<?=$this->basePath('Letter-addLetterMain') ?>'"/>
	  <?php } ?>
      </td>
	  </tr></table>
       </form> 
       </div>	
	  <div class="clear"></div>
	  <div class="page_list">
		   <?php $this->display('safe/letter-search-list.php'); ?>
	  </div>
	  <div class="clear"></div>
	  
</div>
</div>
</div>
<?php $this->display('inc_footer.php'); ?>
</body>
</html>