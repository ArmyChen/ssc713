<html>
<head>
<?php $this->display('inc_skin.php', 0 , '礼品中心－金币兑换'); ?>
<link type="text/css" rel="stylesheet" href="<?=$this->settings['templateurl'] ?>/template/css/score.css" />
<?php if($this->limittype=='current'){?>
<script type="text/javascript">
$(function(){
	$('.state-on').hover(function(){
		$(this).removeClass('state-on').addClass('state-complete').text('[确认收货]');
	},function(){
		$(this).removeClass('state-complete').addClass('state-on').text('正在发货');
	});
	$('.state-wait').hover(function(){
		$(this).removeClass('state-wait').addClass('state-off').text('[取消兑换]');
	},function(){
		$(this).removeClass('state-off').addClass('state-wait').text('等待发货');
	});
});

function scoreSetState(err, data){
	if(err){
		alert(err);
	}else{
		location.reload();
	}
}

function scoreBeforeSetState(){
	var state=$(this).attr('state');
	if(state==1){
		return confirm('取消兑换礼品只能返还<?=$this->payout * 100?>%金币，你确认要取消兑换嘛？');
	}else if(state==2){
		return confirm('你要确认收货嘛？');
	}
}
</script>
<?php } ?>
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
    <p id="page-title"><span class="fa fa-fire"></span>金币兑换</p>
    <div class="top_menu">
        <a class="act" href="<?= $this->basePath('Score-goods') ?>">金币兑换</a>
        <a></a>
    </div>
    <div class="page-info">
	  <div class="page_list">
	  <!-- begin -->
<div class="zzsc-list" style="margin-left:60px;margin-bottom:20px;">
            <?php
                if($args[0]) foreach($args[0]['data'] as $var){
            ?>
    <!-- 开始模块 -->
    <div class="dressing" style="width:210px; margin-top:30px;">    
      <div class="dressing_wrap">
        <div class="skinimg"><a href="javascript:void(0)"><img src="/<?=$var['picmax']?>" width="210" height="130" /></a></div>
        <div class="information_area">
          <div class="information_area_wrap">
            <div class="item clearfix">
              <h4  style="float:left">金币兑换</h4>
              <i class="W_vline" style="float:left">|</i>
              <div class="price" style="float:left"><span>＄<?=$var['score']?> 积分</span></div>
            </div>
            <div class="tipinfo clearfix">
              <div class="t_open" style="float:left; color:#810104"><?=Object::CsubStr($var['content'],0,40)?></div>
              <div class="t_open" style="float:left; margin-bottom:10px; margin-top:10px;"><span>剩余：</span>
			  <span class="W_textb"><?=$this->iff($var['sum']=='0', '不限', $var['sum']-$var['surplus'])?>份</span>
			  </div>
			  <div class="t_open" style="float:right;margin-bottom:10px; margin-top:10px; color:#810104"><?=$this->getValue("select count(distinct uid) from {$this->prename}score_swap where goodId=?", $var['id'])?>&nbsp;人已参与</div>
              <div  style="float:right">
			  <a <?=$this->iff($this->formatGoodTime($var['startTime'], $var['stopTime'])!='已结束','title="点击参与" href="'.$this->basePath('Score-swap',$var['id']).'"','')?> style="display:block;" class="buybtn"><span>兑换金币</span></a>
			  <?php
					if($var['state']){
						$state=array('1'=>'state-wait','2'=>'state-on');
			   ?>
			   <a href="<?=$this->basePath('Score-setSwapState', $var['swapId']) ?>" state="<?=$var['state']?>" target="ajax" onajax="scoreBeforeSetState" call="scoreSetState" class="buybtn" style="display:block;"><?=$this->iff($var['state']==1,'等待发货','正在发货')?></a>
			   <?php } ?>
			  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	 <!-- 结束模块 -->
	 <?php } $this->display('inc_page.php', 0, $args[0]['total'], $this->pageSize, $this->basePath('Score-goods','',true)."&txpgs={page}&scoretype={$this->scoretype}&limittype={$this->limittype}", 1); ?>
     <div style="clear:both"></div>
</div>
<!-- end-->
	  </div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>
  
   
 