<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '帐变记录－游戏报表'); ?>
<script type="text/javascript">
$(function(){
	
	$('.btn_search').click(function(){
		$(this).closest('form').submit();
	});

	$('.bottompage a[href]').live('click', function(){
		$('.tableList').load($(this).attr('href'));
		return false;
	});
});
function searchCoinLog(err, data){
	if(err){
		davidError(err);
	}else{
		$('.tableList').html(data);
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
    <p id="page-title"><span class="fa fa-gamepad"></span>帐变记录</p>
    <div class="top_menu">
        <a href="<?=$this->basePath('Record-search') ?>">投注记录</a>
        <a class="act" href="<?=$this->basePath('Report-coin') ?>" >帐变记录</a>
        <a href="<?=$this->basePath('Report-count') ?>">盈亏报表</a>
    </div>
    <div class="page-info">
        <div class="page_search">
  <form action="<?=$this->basePath('Report-coinlog', $this->type) ?>" dataType="html" target="ajax" call="searchCoinLog">
   					  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            游戏时间：<input type="text" name="fromTime" class="datainput"  value="<?=$this->iff($_REQUEST['fromTime'],$_REQUEST['fromTime'],date('Y-m-d H:i:s',$GLOBALS['fromTime']))?>"/>至<input type="text" name="toTime"  class="datainput" value="<?=$this->iff($_REQUEST['toTime'],$_REQUEST['toTime'],date('Y-m-d H:i:s',$GLOBALS['toTime']))?>"/>&nbsp;&nbsp;
                            状态:
                           <select name="liqType">
            <option value="">所有帐变类型</option>
            <option value="1">账户充值</option>
            <option value="2">游戏返点</option>
            <option value="6">奖金派送</option>
            <option value="7">撤单返款</option>
            <option value="106">账户提现</option>
            <option value="8">提现失败</option>
            <option value="107">提现成功</option>
            <option value="9">系统充值</option>
            <option value="51">活动礼金</option>
            <option value="53">消费佣金</option>
            <option value="101">投注扣款</option>
            <option value="102">追号扣款</option>
            <option value="188">注册赠送</option>
            <option value="44">系统扣款</option>
            <option value="55">系统加款</option>
            <option value="87">达标赠送</option>
            <option value="88">充值赠送</option>
			<option value="189">绑定银行赠送</option>
            <option value="201">余额转入</option>
            <option value="202">余额转出</option>
            <option value="203">余额收益</option>
        </select>

     &nbsp;&nbsp;&nbsp;&nbsp;
        <button name="submit" type="submit" width='69' height='26' class="btn_search btn btn-action" /><i class="fa fa-search"></i> 搜索 </button>
                        </td>
                    </tr></table>
  </form> 
        </div>
        <div class="clear"></div>
        <div class="page_list">
            <div class="tableList" style="text-align:center">
              <!--下注列表-->
                <?php  $this->display('report/coin-log.php'); ?>
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