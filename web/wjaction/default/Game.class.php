<?php
include_once 'Bet.class.php';
class Game extends WebLoginBase{
    //验证是否开始投注
	public final function checkBuy(){
		$actionNo="";
		if($this->settings['switchBuy']==0){
			$actionNo['flag']=1;
		}
		echo json_encode($actionNo);
		}
	//{{{ 投注
	public final function postCode(){
// 		$urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
// 		$urldan = $_SERVER['SERVER_NAME']; //本站域名
// 		$urlcheck=substr($urlshang,7,strlen($urldan));
// 		if($urlcheck!=$urldan)  throw new Exception('请勿站外投注，谢谢合作');
		$tps = $this->getTypes();
		$codes=$_POST['code'];
		$para=$_POST['para'];
		$amount=0;
		$fpcount=1;  //飞盘 默认为1
        if(!ctype_digit($codes[0]['actionNum'])) throw new Exception('注数只能为整数');
		if(!ctype_digit($codes[0]['beiShu'])) throw new Exception('倍数只能为整数');
		if(!ctype_digit($codes[0]['weiShu'])) throw new Exception('位数只能为整数');
		$this->getSystemSettings();
		if($this->settings['switchBuy']==0) throw new Exception('本平台已经停止购买！');
		if($this->settings['switchDLBuy']==0 && $this->user['type'])  throw new Exception('代理不能买单！');
		if(count($codes)==0) throw new Exception('请先选择号码再提交投注');
		//检查时间 期数
		$ftime=$this->getTypeFtime($para['type']);  //封单时间
		$actionTime=$this->getGameActionTime($para['type']);  //当期时间
		$actionNo=$this->getGameActionNo($para['type']);  //当期期数
		if($actionTime!=$para['kjTime'])  throw new Exception('投注失败：你投注第'.$para['actionNo'].'已过购买时间');
		if($actionNo!=$para['actionNo'])  throw new Exception('投注失败：你投注第'.$para['actionNo'].'已过购买时间');
		if($actionTime-$ftime<$this->time) throw new Exception('投注失败：你投注第'.$para['actionNo'].'已过购买时间');
		
		// 查检每注的赔率是否正常
		$this->getPlayeds();
		foreach($codes as $code){
			$played=$this->playeds[$code['playedId']];
			//检查开启
			if(!$played['enable']) throw new Exception('游戏玩法组已停,请刷新再投');
			//检查赔率
			$chkBonus=($played['bonusProp']-$played['bonusPropBase'])/$this->settings['fanDianMax']*$this->user['fanDian']+$played['bonusPropBase']-($played['bonusProp']-$played['bonusPropBase'])*$code['fanDian']/$this->settings['fanDianMax'];//实际奖金
			if($code['bonusProp']>$played['bonusProp']) throw new Exception('提交奖金大于最大奖金，请重新投注');
			if($code['bonusProp']<$played['bonusPropBase']) throw new Exception('提交奖金小于最小奖金，请重新投注');
			//if(intval($chkBonus)!=intval($code['bonusProp'])) throw new Exception('提交奖金出错，请重新投注');
			//检查返点
			//if(floatval($code['fanDian'])>floatval($this->user['fanDian']) || floatval($code['fanDian'])>floatval($this->settings['fanDianMax'])) throw new Exception('提交返点出错，请重新投注');
			//检查倍数
			if(intval($code['beiShu'])<1) throw new Exception('倍数只能为大于1正整数');
			//检查模式
			if($code['mode']!=2 && $code['mode']!=0.2 && $code['mode']!=0.02 && $code['mode']!=0.002) throw new Exception('模式出错，请重新投注');
			// 检查注数
			if($code['actionNum']<1) throw new Exception('注数不能小于1，请重新投注');
			if($betCountFun=$played['betCountFun']){
				if($played['betCountFun']=='descar'){
					if($code['actionNum']>Bet::$betCountFun($code['actionData'])) throw new Exception('提交注数出错，请重新投注');	
				}else{
					if($code['actionNum']!=Bet::$betCountFun($code['actionData'])) throw new Exception('提交注数出错，请重新投注');
				}
			}
		    //最大注数检查
            $maxcount=$this->getmaxcount($code['playedId']);
			if($code['actionNum']>$maxcount) throw new Exception('注数超过该玩法最高注数:'.$maxcount.'注,请重新投注');

        $code=current($codes);
		if($para['fpEnable'])  $fpcount=2;
		if(isset($para['actionNo'])) unset($para['actionNo']);
		if(isset($para['kjTime'])) unset($para['kjTime']);
		$para=array_merge($para, array(
			'actionTime'=>$this->time,
			'actionNo'=>$actionNo,
			'kjTime'=>$actionTime,
			'actionIP'=>$this->ip(true),
			'uid'=>$this->user['uid'],
			'username'=>$this->user['username'],
			'serializeId'=>uniqid(),
			'nickname'=>$this->user['nickname']
		));
		
		$code=array_merge($code, $para);

		if($zhuihao=$_POST['zhuiHao']){
			$liqType=102;
			$codes=array();
			$info='追号投注';
			
			if(isset($para['actionNo'])) unset($para['actionNo']);
			if(isset($para['kjTime'])) unset($para['kjTime']);
			
			foreach(explode(';', $zhuihao) as $var){
				list($code['actionNo'], $code['beiShu'], $code['kjTime'])=explode('|', $var);
				$code['kjTime']=strtotime($code['kjTime']);
				$actionNo=$this->getGameNo($para['type'],$code['kjTime']-1);
				
				$ano=$this->getGameNo($code['type'], $this->time + $tps[$code['type']]['data_ftime']);
				if($code['actionNo'] != $ano['actionNo']){
					list($dt1,$b1)=explode('-', $code['actionNo']);    //提交的
					list($dt2,$b2)=explode('-', $ano['actionNo']);    //当前的
					if($dt2<$dt1 || ($dt2==$dt1 && $b2<$b1)){
					}else{
						throw new Exception($dt1.'-'.$dt2.'-'.$b1.'-'.$b2.'-'.'投注失败：您追号投注的第'.$ano['actionNo'].'期已经过购买时间！');
					}
				}
				
				//if($actionNo['actionNo']!=$code['actionNo'])  throw new Exception('投注失败：你追号投注第'.$code['actionNo'].'已过购买时间');
				if(strtotime($actionNo['actionTime'])-$ftime<$this->time) throw new Exception('投注失败：你追号投注第'.$code['actionNo'].'已过购买时间');
				$codes[]=$code;
				$amount+=abs($code['actionNum']*$code['mode']*$code['beiShu']*$fpcount);
			}
		}else{
			$liqType=101;
			$info='投注';

			foreach($codes as $i=>$code){
				$codes[$i]=array_merge($code, $para);
				$amount+=abs($code['actionNum']*$code['mode']*$code['beiShu']*$fpcount);
			}
		}
	}
		// 查询用户可用资金
		$userAmount=$this->getValue("select coin from {$this->prename}members where uid={$this->user['uid']}");
		if($userAmount < $amount) throw new Exception('您的可用资金不足，是否充值？');

		// 开始事物处理
		$this->beginTransaction();
		try{
			
			foreach($codes as $code){
				//对投注注数进行检查
				if($this->playeds[$code['playedId']]['maxBet']>0 && $code['actionNum'] > $this->playeds[$code['playedId']]['maxBet'])throw new Exception($this->playeds[$code['playedId']]['name']." 玩法投注不能超过  ".$this->playeds[$code['playedId']]['maxBet']." 注");
				
				// 插入投注表
				$code['wjorderId']=$code['type'].$code['playedId'].$this->randomkeys(8-strlen($code['type'].$code['playedId']));
				$code['actionNum']=abs($code['actionNum']);
				$code['mode']=abs($code['mode']);
				$code['beiShu']=abs($code['beiShu']);
				$amount=abs($code['actionNum']*$code['mode']*$code['beiShu']*$fpcount);
				$code['amount']=$amount;
				//对投注金额进行检查
				if($amount < $this->playeds[$code['playedId']]['minAmount'])throw new Exception($this->playeds[$code['playedId']]['name']." 玩法投注金额不能低于  ".$this->playeds[$code['playedId']]['minAmount']." 元");
				
				
				$this->insertRow($this->prename .'bets', $code);
	
				// 添加用户资金流动日志
				$this->addCoin(array(
					'uid'=>$this->user['uid'],
					'type'=>$code['type'],
					//'playedId'=>$para['playedId'],
					'liqType'=>$liqType,
					'info'=>$info,
					'extfield0'=>$this->lastInsertId(),
					'extfield1'=>$para['serializeId'],
					//'extfield2'=>$data['orderId'],
					'coin'=>-$amount,
					//'fcoin'=>$amount
				));
			}
			// 返点与积分等开奖时结算

			$this->commit();
			return '投注成功';
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
	}
	//}}}
	public final function getNo($type){
		$type=intval($type);
		$actionNo=$this->getGameNo($type);
		if($type==1 && $actionNo['actionTime']=='00:00'){
			$actionNo['actionTime']=strtotime($actionNo['actionTime'])+24*3600;
		}else{
			$actionNo['actionTime']=strtotime($actionNo['actionTime']);
		}
		echo json_encode($actionNo);
	}
// 	//{{{ 庄内庄投注
// 	public final function znzPost($id){
// 		if(!$id=intval($id)) throw new Exception('参数错误1');
// 		if(!$para=$_POST) throw new Exception('参数错误2');
// 		if($para['fanDianAmount']<0) throw new Exception('参数错误3');
// 		if($para['qz_chouShui']<0) throw new Exception('参数错误4');
// 		$this->beginTransaction();
// 		try{
// 			$data=$this->getRow("select * from {$this->prename}bets where id=$id");
// 			$amount=abs($data['mode']/2 * $data['beiShu'] * $data['bonusProp']) + abs($para['fanDianAmount']) + abs($para['qz_chouShui']);
// 			if(!$data) throw new Exception('参数错误5');
// 			if($para['qz_fcoin']<$amount) throw new Exception('参数错误6');
// 			if($data['isDelete']) throw new Exception('投注已经撤单');
// 			if($data['qz_uid']) throw new Exception('已经被别人抢庄了');
// 			if($data['uid']==$this->user['uid']) throw new Exception('不能抢自己的庄');
// 			if($amount>$this->user['coin']) throw new Exception('你的资金余额不足');
			
// 			// 冻结时间后不能抢庄
// 			$this->getTypes();
// 			$ftime=$this->getTypeFtime($data['type']);
// 			if($data['kjTime']-$ftime<$this->time) throw new Exception('这期已经结冻，不能抢庄');
			
// 			$para['qz_uid']=$this->user['uid'];
// 			$para['qz_username']=$this->user['username'];
// 			$para['qz_time']=$this->time;
			
// 			if($this->updateRows($this->prename .'bets', $para, 'id='.$id)){
// 				$amount=abs($para['qz_fcoin']);
// 				$this->addCoin(array(
// 					'uid'=>$this->user['uid'],
// 					'type'=>$data['type'],
// 					'liqType'=>100,
// 					'info'=>'抢庄投注',
// 					'extfield0'=>$data['id'],
// 					'fcoin'=>$amount,
// 					'coin'=>-$amount
// 				));
// 			}
			
// 			$this->commit();
// 			return '抢庄成功';
// 		}catch(Exception $e){
// 			$this->rollBack();
// 			throw $e;
// 		}
// 	}
// 	//}}}
	/**
	 * ajax取定单列表
	 */
	public final function getOrdered($type=null){
		$type=intval($type);
		if(!$this->type) $this->type=$type;
		$this->display('index/inc_game_order_history.php');
	}
	/**
	 * {{{ ajax撤单
	 */
	public final function deleteCode($id){
		$id=intval($id);
		$this->beginTransaction();
		try{
			$sql="select * from {$this->prename}bets where id=?";
			if(!$data=$this->getRow($sql, $id)) throw new Exception('找不到定单。');
			if($data['isDelete']) throw new Exception('这单子已经撤单过了。');
			if($data['uid']!=$this->user['uid']) throw new Exception('这单子不是您的，您不能撤单。');		// 可考虑管理员能给用户撤单情况
			if($data['kjTime']<=$this->time) throw new Exception('已经开奖，不能撤单');
			if($data['lotteryNo']) throw new Exception('已经开奖，不能撤单');
			if($data['qz_uid']) throw new Exception('单子已经被人抢庄，不能撤单');

			// 冻结时间后不能撤单
			$this->getTypes();
			$ftime=$this->getTypeFtime($data['type']);
			if($data['kjTime']-$ftime<$this->time) throw new Exception('这期已经结冻，不能撤单');

			$amount=$data['beiShu'] * $data['mode'] * $data['actionNum'] * (intval($this->iff($data['fpEnable'], '2', '1')));
			$amount=abs($amount);
			// 添加用户资金变更日志
			$this->addCoin(array(
				'uid'=>$data['uid'],
				'type'=>$data['type'],
				'playedId'=>$data['playedId'],
				'liqType'=>7,
				'info'=>"撤单",
				'extfield0'=>$id,
				'coin'=>$amount,
				//'fcoin'=>-$amount
			));

			// 更改定单为已经删除状态
			$sql="update {$this->prename}bets set isDelete=1 where id=?";
			$this->update($sql, $id);

			$this->commit();
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
	}
}
