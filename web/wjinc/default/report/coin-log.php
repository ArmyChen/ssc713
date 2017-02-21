<!-- 模态框（Modal） -->
<div class="modal fade" id="CoinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
      </div><!-- /.modal-content -->
   </div><!-- modal-dialog -->
</div><!-- /.modal -->
<?php
	$this->getTypes();
	$this->getPlayeds();
	
	// 日期限制
	if($_REQUEST['fromTime'] && $_REQUEST['toTime']){
		$timeWhere=' and l.actionTime between '. strtotime($_REQUEST['fromTime']).' and '.strtotime($_REQUEST['toTime']);
	}elseif($_REQUEST['fromTime']){
		$timeWhere=' and l.actionTime >='. strtotime($_REQUEST['fromTime']);
	}elseif($_REQUEST['toTime']){
		$timeWhere=' and l.actionTime <'. strtotime($_REQUEST['toTime']);
	}else{
		
		if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $timeWhere=' and l.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
	}
	
	// 帐变类型限制
	if($_REQUEST['liqType']){
		$liqTypeWhere=' and liqType='.intval($_REQUEST['liqType']);
		if($_REQUEST['liqType']==2) $liqTypeWhere=' and liqType between 2 and 3';
	}
	

	//用户限制
	$userWhere=" and u.uid={$this->user['uid']}";
	
	// 冻结查询
	if($this->action=='fcoinModal'){
		$fcoinModalWhere='and l.fcoin!=0';
	}
	
	$sql="select b.type, b.playedId, b.actionNo, b.mode, l.liqType, l.coin, l.fcoin, l.userCoin, l.actionTime, l.extfield0, l.extfield1, l.info, u.username from {$this->prename}members u, {$this->prename}coin_log l left join {$this->prename}bets b on b.id=extfield0 where l.uid=u.uid $liqTypeWhere $timeWhere $userWhere $typeWhere $fcoinModalWhere and l.liqType not in(4,11,104) order by l.id desc";
	
	//echo $sql;
	$list=$this->getPage($sql, $this->page, $this->pageSize);
	
	unset($para[$this->baseMethodKey()]);
	unset($_REQUEST['txpgs']);
	$params=http_build_query($_REQUEST, '', '&');
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
	$liqTypeName=array(
		1=>'充值',
		2=>'返点',
		5=>'停止追号',
		6=>'中奖金额',
		7=>'撤单',
		8=>'提现失败返回冻结金额',
		9=>'管理员充值',
		10=>'解除抢庄冻结金额',
		44=>'系统扣款',
		50=>'签到赠送',
		51=>'首次绑定工行卡赠送',
		52=>'充值佣金',
		53=>'消费佣金',
		55=>'系统加款',
		87=>'消费达标送',
		88=>'充值赠送',
		100=>'抢庄冻结金额',
		101=>'投注冻结金额',
		102=>'追号投注',
		103=>'抢庄返点金额',
		105=>'抢庄赔付金额',
		106=>'提现冻结',
		107=>'提现成功扣除冻结金额',
		108=>'开奖扣除冻结金额',
		109=>'上级充值金额',
		110=>'给下级充值扣款金额',
		188=>'注册赠送',
		189=>'绑定银行卡赠送',
		201=>'余额转入',
		202=>'余额转出',
		203=>'余额收益'
	);
	
?>
<table width="100%" class='table_b'>
	<thead>
		<tr class="table_b_th">
			<td>时间</td>
			<td>用户名</td>
			<td>帐变类型</td>
			<td>单号</td>
			<td>游戏</td>
			<td>玩法</td>
			<td>期号</td>
			<td>模式</td>
			<td>资金</td>
			<td>余额</td>
		</tr>
	</thead>
	<tbody class="table_b_tr">
		<?php if($list['data']) foreach($list['data'] as $var){ ?>
		<tr>
			<td><?php echo substr(date('Y-m-d H:i:s', $var['actionTime']),2)?></td>
			<td><?=$var['username']?></td>
			<td><?=$liqTypeName[$var['liqType']]?></td>
			<!-- <td><?//=$var['info']?></td> -->
			
			<?php if($var['extfield0'] && in_array($var['liqType'], array(2,3,4,5,6,7,10,11,100,101,102,103,104,105,108))){ ?>
                <td><a data-toggle="modal" href="<?=$this->basePath('Record-betInfo', $var['extfield0']) ?>" data-target="#CoinModal"><?=$this->getValue("select wjorderId from {$this->prename}bets where id=?", $var['extfield0'])?></a>
                </td>
                <td><?=$this->types[$var['type']]['shortName']?></td>
                <td><?=$this->playeds[$var['playedId']]['name']?></td>
                <td><?=$var['actionNo']?></td>
                <td><?=$modeName[$var['mode']]?></td>
			<?php }elseif(in_array($var['liqType'], array(1,9,52))){?>
                <td><a data-toggle="modal" href="<?=$this->basePath('Cash-rechargeModal', $var['extfield0']) ?>" data-target="#CoinModal"><?=$var['extfield1']?></a></td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
			<?php }elseif(in_array($var['liqType'], array(8,106,107))){?>
                <td><a data-toggle="modal" href="<?=$this->basePath('Cash-cashModal', $var['extfield0']) ?>" data-target="#CoinModal"><?=$var['extfield0']?></a></td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                
            <?php }else{ ?>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
            <?php } ?>
            
            <td><?=number_format($var['coin'],2)?></td>
			<td><?=$var['userCoin']?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php 
	$this->display('inc_page.php',0,$list['total'],$this->pageSize, $this->basePath($this->controller.'-'.$this->action, '', true)."&txpgs={page}&type={$this->type}?$params");
?>