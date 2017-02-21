<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '投注记录－游戏报表'); ?>
<script type="text/javascript">
$(function(){
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
	
	$('.bottompage a[href]').live('click', function(){
		$('.tableList').load($(this).attr('href'));
		return false;
	});

});
function recordSearch(err, data){
	if(err){
		davidError(err);
	}else{
		$('.tableList').html(data);
	}
}

function recodeRefresh(){
	$('.tableList').load(
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
    <p id="page-title"><span class="fa fa-gamepad"></span>投注记录</p>
    <div class="top_menu">
        <a class="act" href="<?=$this->basePath('Record-search') ?>">投注记录</a>
        <a href="<?=$this->basePath('Report-coin') ?>" >帐变记录</a>
        <a href="<?=$this->basePath('Report-count') ?>" >盈亏报表</a>
    </div>
    <div class="page-info">
        <div class="page_search">
           <form action="<?=$this->basePath('Record-searchGameRecord', $this->userType) ?>" dataType="html" call="recordSearch" target="ajax"> 
		   <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            游戏时间：<input type="text" name="fromTime" class="datainput"  value="<?=$this->iff($_REQUEST['fromTime'],$_REQUEST['fromTime'],date('Y-m-d H:i:s',$GLOBALS['fromTime']))?>"/>至<input type="text" name="toTime"  class="datainput" value="<?=$this->iff($_REQUEST['toTime'],$_REQUEST['toTime'],date('Y-m-d H:i:s',$GLOBALS['toTime']))?>"/>&nbsp;&nbsp;
                            状态:
                            <select name="state" >
            <option value="0" selected>所有状态</option>
            <option value="1">已派奖</option>
            <option value="2">未中奖</option>
            <option value="3">未开奖</option>
            <option value="4">追号</option>
            <option value="5">撤单</option>
        </select>
                            <button name="submit" type="submit" width='69' height='26' class="btn_search btn btn-action" /><i class="fa fa-search"></i> 搜索 </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            游戏名称：<select name="type" id="lotteryid" style="width:100px;">
        	<option value="0" <?=$this->iff($_REQUEST['type']=='', 'selected="selected"')?> >全部彩种</option>
            <?php
                if($this->types) foreach($this->types as $var){ 
                    if($var['enable']){
            ?>
            <option value="<?=$var['id']?>" <?=$this->iff($_REQUEST['type']==$var['id'], 'selected="selected"')?>><?=$this->iff($var['shortName'], $var['shortName'], $var['title'])?></option>
            <?php }} ?>
           </select>
                            &nbsp;&nbsp;游戏模式:
                            <select name="mode" >
            <option value="" selected>全部模式</option>
            <option value="2.000">元</option>
            <option value="0.200">角</option>
            <option value="0.020">分</option>
            <option value="0.002">厘</option>
        </select>
                            注单编号：<input type="text" id="projectno" name="betId" value="" style="width:150px;" />
                                                                    &nbsp;&nbsp;<font color=#009900>温馨提示: 点击注单编号可以查看详细注单信息以及撤单.</font>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="clear"></div>
        <div class="page_list">
            <div class="tableList" style="text-align:center">
              <!--下注列表-->
                <?php $this->display('record/search-list.php'); ?>
              <!--下注列表 end -->
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
<?php $this->display('inc_footer.php'); ?>
</body>
</html>