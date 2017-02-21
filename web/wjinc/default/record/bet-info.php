<?php
	$bet=$this->getRow("select * from {$this->prename}bets where id=?", $args[0]);
	if(!$bet) throw new Exception('单号不存在');
	$modeName=array(
			'0.001'=>'厘',
			'0.002'=>'厘',
			'0.010'=>'分',
			'0.020'=>'分',
			'0.100'=>'角',
			'0.200'=>'角',
			'1.000'=>'元',
			'2.000'=>'元'
		);
	$weiShu=$bet['weiShu'];
	if($weiShu){
		$w=array(16=>'万', 8=>'千', 4=>'百', 2=>'十',1=>'个');
		foreach($w as $p=>$v){
			if($weiShu & $p) $wei.=$v;
		}
		$wei.=':';
	}
	$betCont=$bet['mode'] * $bet['beiShu'] * $bet['actionNum'] * ($bet['fpEnable']+1);
	
?>
<style type="text/css">
.modal-body {height:370px; font-size:14px;}
.modal-body ul{ position:absolute;width:800px;}
.modal-body li{ float:left; margin:10px 30px 10px 30px;}
</style>
   <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title" id="myModalLabel">投注订单信息</h4>
   </div>
   <div class="modal-body" >
    <ul>
	  <li>
	    <em>投注用户：</em>
	    <span class="red"><?=$this->iff($bet['username']==$this->user['username'], $bet['username'], preg_replace('/^(\w).*(\w{2})$/', '\1***\2', $bet['username']))?></span>
	  </li>
	  <li><em>彩种：</em><span class="red"><?=$this->types[$bet['type']]['title']?></span></li>
	  <li><em>玩法：</em><span class="red"><?=$this->playeds[$bet['playedId']]['name']?></span></li>
	  <li><em>订单状态：</em><em>
			<?php
				if($bet['isDelete']==1){
					echo '<font color="#999999">已撤单</font>';
				}elseif(!$bet['lotteryNo']){
					echo '<font color="#009900">未开奖</font>';
				}elseif($bet['zjCount']){
					echo '<font color="red">已派奖</font>';
				}else{
					echo '<font color="#00CC00">未中奖</font>';
				}
			?>
            </em></li>
	  <li><em>订单编号：</em><span class="red"><?=$bet['wjorderId']?></span></li>
	  <li><em>购买模式：</em><span class="red"><?=$modeName[$bet['mode']]?></span></li>
	  <li><em>奖金返点：</em><span class="red"><?=number_format($bet['bonusProp'], 2)?>－<?=number_format($bet['fanDian'],1)?>%</span></li>
	  <li><em>开奖号码：</em><span class="red"><?=$this->ifs($bet['lotteryNo'], '－')?></span></li>
	  <li><em>投注时间：</em><span class="red"><?=date('m-d H:i:s',$bet['actionTime'])?></span></li>
	  <li><em>投注期号：</em><span class="red"><?=$bet['actionNo']?></span></li>
	  <li><em>购买倍数：</em><span class="red"><?=$bet['beiShu'].'倍'?></span></li>
	  <li><em>开奖时间：</em><span class="red"><?=$this->iff($bet['lotteryNo'], date('m-d H:i:s',$bet['kjTime']), '－')?></span></li>
	  <li><em>购买金额：</em><span class="red"><?=number_format($betCont, 2)?></span></li>
	  <li><em>返点金额：</em><span class="red"><?=$this->iff($bet['lotteryNo'], number_format(($bet['fanDian']/100)*$betCont, 2). '元', '－')?></span></li>
	  <li><em>中奖注数：</em><span class="red"><?=$this->iff($bet['lotteryNo'], $bet['bonus']/$bet['bonusProp'].'注', '－')?></span></li>
	  <li><em>中奖金额：</em><span class="red"><?=$this->iff($bet['lotteryNo'], number_format($bet['bonus'], 2) .'元', '－')?></span></li>
	  <li><em>个人盈亏：</em><em class="green"><?=$this->iff($bet['lotteryNo'], number_format($bet['bonus'] - $betCont + ($bet['fanDian']/100)*$betCont, 4), '－')?></em>元</li>
	  <li><em>投注内容：</em><br /><div style="overflow-x:auto;overflow-y:auto;height:180px;"><p style="word-break:break-all;"><br /><?=$wei.$bet['actionData']?></p></div></li>  
	</ul>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-action" data-dismiss="modal">关闭</button>
	 <!--<button type="button" class="btn btn-action">提交更改</button>-->
   </div>  
