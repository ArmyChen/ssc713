 <?php
   //调用开奖信息 
	$lastNo=$this->getGameLastNo($this->type);
	$kjHao=$this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'");
	if($kjHao) $kjHao=explode(',', $kjHao);
	
	$actionNo=$this->getGameNo($this->type);
	$types=$this->getTypes();
	$kjdTime=$types[$this->type]['data_ftime'];
	$diffTime=strtotime($actionNo['actionTime'])-$this->time-$kjdTime;
	$kjDiffTime=strtotime($lastNo['actionTime'])-$this->time;
?>
<div id="kaijiang" type="<?=$this->type?>" ctype="<?=$types[$this->type]['type']?>">
                    <div class="game_top">
                        <div class="gm_con">
                            <div class="gm_con_to">
                                <div class="gct_l">
                                    <div class="game-icon2 game_<?=$types[$this->type]['id']?>"></div>
                                    <p class="time-title"><span class="wjtips">正在销售...</span>&nbsp;&nbsp;&nbsp;<span id="current_endtime"><?=$actionNo['actionTime']?></span></p>
                                    <div class="gct_time">
                                        <div class="gct_time_now">
                                            <div class="gct_time_now_l" action="<?=$this->basePath('Display-freshKanJiang', $this->type) ?>" id="count_down">00:00:00
                                            </div>
                                        </div>
                                    </div>
                                    <h3></h3>
                                    <div class="gct_now">
									<strong class="kj-title">第&nbsp;&nbsp;<span class="color-blue"><?=$actionNo['actionNo']?></span>&nbsp;&nbsp;期</strong>
									 <br>总共:&nbsp;&nbsp;<strong><span id="current_sale" class="color-blue"><?=$types[$this->type]['num']?></span></strong>&nbsp;&nbsp;期<br>
										<img id="voice" class="voice-on"  title="声音开启，点击关闭" onclick="voiceKJ()">
										<?php
										  $x115 = array(6,7,15,16);
										  $ssc = array(1,3,5,12,14);
										  if(in_array($this->type, $x115)){
										     $ttt = 'crx'; 
										  }else if(in_array($this->type, $ssc)){
										     $ttt='crt';
										  }else{
										     $ttt=' ';
										  }
										?>
										<script type="text/javascript"> function zoushi(){davidInfo('该玩法号码走势正在开发中！')}</script>
										<?php if($ttt==' '){ ?>
										 <a href="javascript:void(0)" onclick="zoushi()" class="bt01"><span class="fa fa-bar-chart"></span>号码走势</a>
										<?php }else{ ?>
                                        <a href="/index.php?tnt=<?=$ttt ?>&type=<?=$this->type ?>&count=30" target="_blank" class="bt01"><span class="fa fa-bar-chart"></span>号码走势</a>
										<?php }?>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="gct_menu"><a class="gct_menu_yl" href="#" target="_blank"></a> </div>
                                </div>
                                <div id="shownb-box">
                                     <ul class="box-ul">
                                        <li><a class="tabulous_active" href="#nb-box1">近一期</a></li>
                                        <li><a class="" href="#nb-box2">近五期</a></li>
										<span class="tabulousclear"></span>
                                    </ul>
                                     <div class="transition" style="height: 120px;" id="tabs_container">
                                        <div class="make_transist hideleft showleft kj-bottom" style="position: absolute; top: 40px;" id="nb-box1">
                                            <p><?=$types[$this->type]['title']?>  第&nbsp;&nbsp;<b><span class="color-blue last_issues" id="last_issues"><?=$lastNo['actionNo']?></span></b>&nbsp;&nbsp;期 <span id="lt_opentimebox">&nbsp;&nbsp;<span id="kjsay" style="display:none">开奖倒计时:<em class="kjtips">00:00</em></span>&nbsp;</span></p>
											
                                       <?php if($types[$this->type]['type']==1) { //时时彩?>
											<!-- 显示开奖号码 begin-->
											<span class="wjkjData">
											  <p class="hide"><img src="/template/images/common/kjts.gif" /></p>
											  <ul class="kj-hao" style="margin:10px auto auto 15px;" ctype="g0"  cnum="5">
												  <li id="span_lot_0" class="gr_s gr_s<?=intval($kjHao[0])?>"> </li>
												  <li id="span_lot_1" class="gr_s gr_s<?=intval($kjHao[1])?>"> </li>
												  <li id="span_lot_2" class="gr_s gr_s<?=intval($kjHao[2])?>"> </li>
												  <li id="span_lot_3" class="gr_s gr_s<?=intval($kjHao[3])?>"> </li>
												  <li id="span_lot_4" class="gr_s gr_s<?=intval($kjHao[4])?>"> </li>
											   </ul>
											  <div class="clear"></div>
											  </span>
											<!-- 显示开奖号码 end-->
                                       <?php }else if($types[$this->type]['type']==5) { //平台自主彩种时时彩?>
											<!-- 显示开奖号码 begin-->
											<span class="wjkjData">
											  <p class="hide"><img src="/template/images/common/kjts.gif" /></p>
											  <ul class="kj-hao" style="margin:10px auto auto 15px;" ctype="g0"  cnum="5">
												  <li id="span_lot_0" class="gr_s gr_s<?=intval($kjHao[0])?>"> </li>
												  <li id="span_lot_1" class="gr_s gr_s<?=intval($kjHao[1])?>"> </li>
												  <li id="span_lot_2" class="gr_s gr_s<?=intval($kjHao[2])?>"> </li>
												  <li id="span_lot_3" class="gr_s gr_s<?=intval($kjHao[3])?>"> </li>
												  <li id="span_lot_4" class="gr_s gr_s<?=intval($kjHao[4])?>"> </li>
											   </ul>
											  <div class="clear"></div>
											  </span>
											<!-- 显示开奖号码 end-->		        
                                       <?php }else if($types[$this->type]['type']==2) { //11选5?>
											<!-- 显示开奖号码 begin-->
											<span class="wjkjData">
											  <p class="hide"><img src="/template/images/common/kjts.gif" /></p>
											  <ul class="kj-hao" style="margin:10px auto auto 15px;" ctype="g3"  cnum="5">
												  <li id="span_lot_0" class="gr_s gr_s<?=intval($kjHao[0])?>"> </li>
												  <li id="span_lot_1" class="gr_s gr_s<?=intval($kjHao[1])?>"> </li>
												  <li id="span_lot_2" class="gr_s gr_s<?=intval($kjHao[2])?>"> </li>
												  <li id="span_lot_3" class="gr_s gr_s<?=intval($kjHao[3])?>"> </li>
												  <li id="span_lot_4" class="gr_s gr_s<?=intval($kjHao[4])?>"> </li>
											   </ul>
											  <div class="clear"></div>
											  </span>
											<!-- 显示开奖号码 end-->		                                      
                                       <?php }else if($types[$this->type]['type']==3) { //3D 排列三?>
											<!-- 显示开奖号码 begin-->
											<span class="wjkjData">
											  <p class="hide"><img src="/template/images/common/kjts.gif" /></p>
											  <ul class="kj-hao" style="margin:10px auto auto 90px;" ctype="g0"  cnum="3">
												  <li id="span_lot_0" class="gr_s gr_s<?=intval($kjHao[0])?>"> </li>
												  <li id="span_lot_1" class="gr_s gr_s<?=intval($kjHao[1])?>"> </li>
												  <li id="span_lot_2" class="gr_s gr_s<?=intval($kjHao[2])?>"> </li>
											   </ul>
											  <div class="clear"></div>
											  </span>
											<!-- 显示开奖号码 end-->				
                                       <?php }else if($types[$this->type]['type']==9) { //快三?>
											<!-- 显示开奖号码 begin-->
											<span class="wjkjData">
											  <p class="hide"><img src="/template/images/common/kjts.gif" /></p>
											  <ul class="kj-hao" style="margin:10px auto auto 90px;" ctype="g2"  cnum="6">
												  <li id="span_lot_0" class="gr_s gr_s<?=intval($kjHao[0])?>"> </li>
												  <li id="span_lot_1" class="gr_s gr_s<?=intval($kjHao[1])?>"> </li>
												  <li id="span_lot_2" class="gr_s gr_s<?=intval($kjHao[2])?>"> </li>
											   </ul>
											  <div class="clear"></div>
											  </span>
											<!-- 显示开奖号码 end-->			
                                       <?php }else if($types[$this->type]['type']==4) { //快乐十分?>
											<!-- 显示开奖号码 begin-->
											<span class="wjkjData">
											  <p class="hide"><img src="/template/images/common/kjts.gif" /></p>
											  <ul class="kj-hao" style="margin:10px auto auto 40px;" ctype="g1"  cnum="8">
												  <li id="span_lot_0" class="gr_s gr_s020"> <?=$kjHao[0]?> </li>
												  <li id="span_lot_1" class="gr_s gr_s020"> <?=$kjHao[1]?> </li>
												  <li id="span_lot_2" class="gr_s gr_s020"> <?=$kjHao[2]?> </li>
												  <li id="span_lot_3" class="gr_s gr_s020"> <?=$kjHao[3]?> </li>
												  <li id="span_lot_4" class="gr_s gr_s020"> <?=$kjHao[4]?> </li>
												  <li id="span_lot_5" class="gr_s gr_s020"> <?=$kjHao[5]?> </li>
												  <li id="span_lot_6" class="gr_s gr_s020"> <?=$kjHao[6]?> </li>
												  <li id="span_lot_7" class="gr_s gr_s020"> <?=$kjHao[7]?> </li>
											   </ul>
											  <div class="clear"></div>
											  </span>
											<!-- 显示开奖号码 end-->	
                                       <?php }else if($types[$this->type]['type']==6) { //PK10?>
											<!-- 显示开奖号码 begin-->
											<span class="wjkjData">
											  <p class="hide"><img src="/template/images/common/kjts.gif" /></p>
											  <ul class="kj-hao" style="margin:10px auto auto 10px;" ctype="g1"  cnum="10">
												  <li id="span_lot_0" class="gr_s gr_s020"> <?=$kjHao[0]?> </li>
												  <li id="span_lot_1" class="gr_s gr_s020"> <?=$kjHao[1]?> </li>
												  <li id="span_lot_2" class="gr_s gr_s020"> <?=$kjHao[2]?> </li>
												  <li id="span_lot_3" class="gr_s gr_s020"> <?=$kjHao[3]?> </li>
												  <li id="span_lot_4" class="gr_s gr_s020"> <?=$kjHao[4]?> </li>
												  <li id="span_lot_5" class="gr_s gr_s020"> <?=$kjHao[5]?> </li>
												  <li id="span_lot_6" class="gr_s gr_s020"> <?=$kjHao[6]?> </li>
												  <li id="span_lot_7" class="gr_s gr_s020"> <?=$kjHao[7]?> </li>
												  <li id="span_lot_8" class="gr_s gr_s020"> <?=$kjHao[8]?> </li>
												  <li id="span_lot_9" class="gr_s gr_s020"> <?=$kjHao[9]?> </li>
											   </ul>
											  <div class="clear"></div>
											  </span>
											<!-- 显示开奖号码 end-->		
                                       <?php } ?>										   										
                                        </div>
									       <?php  $this->display('index/inc_data_history.php'); ?>
                                     </div><!--End tabs container-->
                                </div>
								<!-- 彩种-->
                              <div class="clear"></div>
                           </div>
                       </div>
                        <!--奖期基本信息结束-->
</div></div>
<script type="text/javascript">
$(function(){
	window.S=<?=json_encode($diffTime>0)?>;
	window.KS=<?=json_encode($kjDiffTime>0)?>;
	window.kjTime=parseInt(<?=json_encode($kjdTime)?>);
	
	if($.browser.msie){
		setTimeout(function(){
			gameKanJiangDataC(<?=$diffTime?>);
		}, 1000);
	}else{
		setTimeout(gameKanJiangDataC, 1000, <?=$diffTime?>);
	}
	<?php if($kjDiffTime>0){ ?> 
		if($.browser.msie){
		setTimeout(function(){
			setKJWaiting(<?=$kjDiffTime?>);
		}, 1000);
		}else{
			setTimeout(setKJWaiting, 1000, <?=$kjDiffTime?>);
		}
	<?php } ?> 
	<?=$this->iff($this->settings['closeVoice'], 'setVoiceStatus(false);', 'setVoiceStatus(true);')?>
	<?php if(!$kjHao){ ?> 
		loadKjData();
	<?php } ?> 
});
</script>