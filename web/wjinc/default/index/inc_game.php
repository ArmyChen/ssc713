<div class="game-main"><!--选号模块-->
<div id="bet-game">
	<div class="game-btn">
	<?php
		$this->getSystemSettings();
		$this->getTypes();
		$sql="select id, groupName, enable from {$this->prename}played_group where enable=1 and type=? order by sort";
		$groups=$this->getObject($sql, 'id', $this->type);
		if($this->groupId && !$groups[$this->groupId]) unset($this->groupId);
		
		if($groups) foreach($groups as $key=>$group){
			if(!$this->groupId) $this->groupId=$group['id'];
?>
		<div class="ul-li<?=($this->groupId==$group['id'])?' current':''?>">
        	<a class="cai" href="<?=$this->basePath('Index-group', $this->type .'/'.$group['id']) ?>"><span class="content"><?=$group['groupName']?></span></a>
		</div>
<?php } ?>
<div class="clear"></div>	
</div>
<div class="game-cont">
<?php $this->display('index/inc_game_played.php'); ?>
 <div class="tbn_bot">
   <div class="fandian-table" style="height:auto;" id="game-dom">
			<div class="fandian">
				<div class="fandian-k">
				<div class="prompt" id="game-tip-dom" style="float:left; margin-right:10px;">提示：必须选满三位数才能投注！</div>
					<span class="spn8">奖金/返点：</span>
					<div class="fandian-box">
						<input type="button" class="min" value="" step="-0.1"/>
						<div id="slider" class="slider" value="<?=$this->ifs($_COOKIE['fanDian'], 0)?>" data-bet-count="<?=$this->settings['betMaxCount']?>" data-bet-zj-amount="<?=$this->settings['betMaxZjAmount']?>" max="<?=$this->user['fanDian']?>" game-fan-dian="<?=$this->settings['fanDianMax']?>" fan-dian="<?=$this->user['fanDian']?>" game-fan-dian-bdw="<?=$this->settings['fanDianBdwMax']?>" fan-dian-bdw="<?=$this->user['fanDianBdw']?>" min="0" step="0.1" slideCallBack="gameSetFanDian"></div>
						<input type="button" class="max" value="" step="0.1"/>
					</div>
					<span id="fandian-value" class="fdmoney"><?=$maxPl?>/0%</span>
				</div>
				<div style="float:right; margin-right:15px;">
				<div class="danwei">
					<span>模式：</span>
					<?php 
						$xlx = true;
						if($this->settings['modeY']==1){
					?>
					<label><input type="radio" value="2.00" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian0']?>" name="danwei" <?=$this->iff($xlx,'checked')?> />元</label>
					<?php 
							$xlx = false;
						}
						if($this->settings['modeJ']==1){
					?>
					<label><input type="radio" value="0.20" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian1']?>" name="danwei" <?=$this->iff($xlx,'checked')?> />角</label>
					<?php 
							$xlx = false;
						}
						if($this->settings['modeF']==1){
					?>
					<label><input type="radio" value="0.02" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian2']?>" name="danwei" <?=$this->iff($xlx,'checked')?> />分</label>
					<?php 
							$xlx = false;
						}
						if($this->settings['modeL']==1){
					?>
					<label><input type="radio" value="0.002" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian2']?>" name="danwei" <?=$this->iff($xlx,'checked')?> />厘</label>
					<?php }	?>
				</div>
				<div class="beishu">
                <span>倍数：</span><input type="button" class="surbeishu" value=""/><input id="beishu" value="<?=$this->ifs($_COOKIE['beishu'],1)?>" class="txt"/><input type="button" class="addbeishu" value=""/>
				</div>
				</div>
                <div class="clear"></div>
			</div>		
		</div>
   </div>
      <div class="clear"></div>
   <div>
     <div class="g_submit" id="lt_sel_insert" onclick="gameActionAddCode()"><span class="fa fa-plus fa-lg"></span>添加</div>
	 
	 </div>
	    <div class="clear"></div>
   <div class="tbn_b_bot" >
     <div class="tbn_bb_l">
       <div class="tbn_bg1"><div class="tbn_bg2"></div></div>
       <div class="tbn_bb_ln">
         <div class="tz_tab_list_box touzhu-cont" >
		 <table width="100%"></table>
         </div>
       </div>
     </div>
     <div class="clear"></div>
   </div>
   <div class="tbn_bb_2">
    <span class="tbn_clear" id="lt_random_one" onclick="gameActionRandom(1)" title="点击多次，随机更多">随机一注</span>
    <span class="tbn_clear" id="lt_random_five" onclick="genMultiRandom(5)" title="点击多次，随机更多">随机五注</span> 
    <span class="tbn_clear" id="lt_cf_clear" onclick="gameActionRemoveCode()" title="清除投注框内投注单">清除号码</span>
   </div>
   <div class="clear"></div>
   <div class="tbn_bb_r">
    <div class="touzhu-bottom sub_txt">
	<div class="tz-tongji">
        总注数: <strong><span class="r" id="all-count">0</span></strong> 注&nbsp;&nbsp;&nbsp;&nbsp;
        总金额: <strong><span class="r" id="all-amount">0.00</span></strong> 元
   </div>
    <div>
     <label class="zh_title tz-buytype touzhu-bottom" name="lt_trace_if">
	  <span class="tbn_clear" id="lt_cf_clear" style="margin-top:15px; height:30px; line-height:30px" title="清除投注框内投注单"><input name="zhuiHao" id="lt_trace_if" style="display:none" value="yes" type="checkbox">我要追号</span>
	  </label>
   </div>
  </div>
 </div>
    <!--投注选号区结束-->
<div class="clear"></div>
<div class="zh_body">
   <div class="unit">
     <div class="unit_title">
       <div class="ut_l"></div>
       <div class="ut_r"></div>
     </div>
     <!--追号区开始-->
	    <div id="gamezhuihao" style="display:none">
          <?php $this->display('index/inc_game_zhuihao.php') ?>
		</div>
     <!--追号区结束-->
     <div class="bg10">
	  <div class="touzhu-bottom g_submit" id="lt_buy"><div class="tz-true-btn" id="btnPostBet"><span class="fa fa-check-square-o fa-lg"></span>确认投注</div></div>
     </div>
  </div><!--unit end -->
  <div class="clear"></div>
  <!--游戏记录开始-->
  <div class="gm_con">
     <div class="gm_con_to">
       <div class="yx_body">
         <div class="unit">
           <div class="unit_title">
             <div class="ut_l"></div>
             <h4><label class="yx_title">游戏记录</label></h4>
             <div class="ut_r"></div>
           </div>
         </div>
         <div class="yx_box">
           <div class="yxlist" >
             <table border="0" cellpadding="0" cellspacing="0">
             <tbody>
             <th>注单编号</th>
             <!--<th>投注时间</th>-->
             <!--<th>彩种</th>-->
             <th>玩法</th>
             <th>期号</th>
             <th>投注</th>
             <th>倍数</th>
             <!--<th>注数</th>-->
             <th>模式</th>
             <th>金额</th>
             <th>奖金</th>
             <th>状态</th>
             <th>操作</th>
             </tbody>
			 <tbody class="projectlist" id="order-history"><?php $this->display('index/inc_game_order_history.php'); ?></tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
   </div>

   <!--游戏记录结束-->
   
</div>
   <!-- -->
</div></div>
