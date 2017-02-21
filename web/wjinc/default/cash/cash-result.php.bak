<!DOCTYPE HTML>
<html>
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
        	<table><tr><td><p>提现正在处理中，目前排队人数&nbsp;&nbsp;<strong style="color:red;"><?=intval($txcount)+intval($this->settings['cashPersons'])?></strong>，请稍候留意购彩资金！</p></td></tr></table>
	  </div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>