<style type="text/css">
.modal-body {height:240px; font-size:14px;}
.modal-body ul{ position:absolute;width:800px;}
.modal-body li{ float:left; margin:10px 30px 10px 30px;}
</style>
<form action="<?=$this->basePath('Team-payRedeed') ?>" method="post" target="ajax" call="sysReload">
	<?php
		if($args[0]){
			$uid=intval($args[0]);
			$usr=$this->getRow("select * from {$this->prename}members where uid=$uid");
		}
		//between 1423594800 and 1423681200
		$start = $usr['lastRedeed'];
		$stop = $this->time;
		$time = "between $start and $stop";
		
		
		$sql = "select sum(b.mode * b.beiShu * b.actionNum) betAmount, sum(b.bonus) zjAmount from ssc_members u left join ssc_bets b on u.uid=b.uid and b.isDelete=0 and actionTime $time and concat(',', u.parents, ',') like '%,{$usr['uid']},%'";
		$all=$this->getRow($sql);
		$all['fanDianAmount']=$this->getValue("select sum(l.coin) from ssc_coin_log l, ssc_members u where l.liqType between 2 and 3 and l.uid=u.uid and l.actionTime $time and concat(',', u.parents, ',') like '%,{$usr['uid']},%'");
		$all['brokerageAmount']=$this->getValue("select sum(l.coin) from ssc_coin_log l, ssc_members u where l.liqType in(50,51,52,53) and l.uid=u.uid and l.actionTime $time and concat(',', u.parents, ',') like '%,{$usr['uid']},%'");
		?>
		<input type="hidden" name="username" value="<?=$usr['username'] ?>"/>
		<input type="hidden" name="startTime" value="<?=$start ?>"/>
		<input type="hidden" name="stopTime" value="<?=$stop ?>"/>
		<div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title" id="myModalLabel">团队会员充值</h4>
   </div>
   <div class="modal-body" >
    <ul>
	  <li>
	    <em>用户名：</em><span class="red"><?=$usr['username'] ?></span>
	  </li>
	   <li>
	    <em>上次分红时间：</em><span><?=$this->iff($usr['lastRedeed']>0,date("Y-m-d H:i:s",$usr['lastRedeed']), '无记录')?></span>
	  </li>
	   <li>
	    <em>本次团队总盈亏：</em><span><?=$yk=$this->ifs($all['zjAmount']-$all['betAmount']+$all['fanDianAmount']+$all['brokerageAmount'], '0.00') ?> 元</span>
	  </li>
	   <li>
	    <em>分红比例：</em><span><?=$usr['red'] ?>%</span>
	  </li>
	  <?php 
				$yk = abs($yk);
				$redAmount = $this->iff($yk>0, ($yk*$usr['red'])/100, '0.00');
				$redAmount = round($redAmount, 2);
			?>
	   <li>
	    <em>本次应分红金额：</em><span><input type="text" name="redAmount" value="<?=$redAmount ?>"/>元</span>
	  </li>
	   <li>
	    <em>用户名：</em><span><?=$usr['username'] ?></span>
	  </li>
	  <li>
	    <em>*温馨提示：</em><span class="green">请核对清楚填写内容后点击提交派发分红，一旦派发成功则不可撤回！</span>
	  </li>
		<input type="hidden" name="kuisun" value="-<?=$yk ?>"/>
    </ul>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-action" data-dismiss="modal">关闭</button>
	 <button type="sumbit" class="btn btn-action">提交更改</button>
   </div>  
	</form>