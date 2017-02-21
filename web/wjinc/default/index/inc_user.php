<?php $this->freshSession(); 
		//更新级别
		$ngrade=$this->getValue("select max(level) from {$this->prename}member_level where minScore <= {$this->user['scoreTotal']}");
		if($ngrade>$this->user['grade']){
			$sql="update ssc_members set grade={$ngrade} where uid=?";
			$this->update($sql, $this->user['uid']);
		}else{$ngrade=$this->user['grade'];}
		
		$date=strtotime('00:00:00');
		//DAVID  查询5天内的数据
		$djcoin=$this->getValue("select sum(amount) from {$this->prename}bets where lotteryNo='' and isDelete!=1 and actionTime>UNIX_TIMESTAMP(DATE_SUB(now(),INTERVAL 5 DAY)) and uid=?",$this->user['uid']); 
?>
<script type="text/javascript">
function indexSign(err, data){
	if(err){
		davidError(err);
	}else{
		reloadMemberInfo();
		davidOk(data);
	}
} 
</script>
<div class="header-top-wapper">
      <ul class="top-user userInfo">
          <li>您好，<a href="<?= $this->basePath('Safe-info') ?>" id="nickname" title="点击修改昵称"><?=$this->user['nickname']?></a></li>
          <li>购彩资金: <span class="color-1 font-weight" id="usermoney">￥<?=$this->user['coin']?></span>&nbsp;&nbsp;<a style=" cursor: pointer;" href="javascript:void(0)" onclick="reloadMemberInfo();" class="fa fa-refresh fa-lg color-0"></a></li>
		  <li>冻结购彩资金: <span class="color-1 font-weight" id="usermoney">￥<?=$this->ifs($djcoin, '0.00')?></span>&nbsp;&nbsp;</li>
		  <li>余额宝资金: <span class="color-1 font-weight" id="usermoney">￥<?=$this->user['deposit']?></span>&nbsp;&nbsp;</li>
          <li>金币: <span class="color-1 font-weight" id="usermoney">＄<?=$this->user['score']?></span>&nbsp;&nbsp;</li>
          <li><a class="color-0" href="<?=$this->basePath('Display-sign') ?>"  dataType="json" call="indexSign" target="ajax" >活动签到</a></li>
          <li><a class="color-0" href="<?=$this->basePath('User-logout') ?>" target="_top">安全退出</a></li>
      </ul>
</div>