<?php
class Display extends WebLoginBase{
	public final function freshKanJiang($type=null, $groupId=null, $played=null){
		if($type) $this->type=intval($type);
		if($groupId) $this->groupId=intval($groupId);
		if($played) $this->played=intval($played);
		$this->display('index/inc_data_current.php');
	}
	
	public final function sign(){
		$this->getSystemSettings();
	    //$SignStatus=$this->settings['huoDongSignStatus']; //0为金币  1为购彩金
		//金币功能未完善开发  DAVID
		$SignStatus=1;
		$SignCoin=$this->settings['huoDongSign'];  //读取签到每次赠送数量
		$liqType=50;		// 流动资金类型：签到
		$liqInfo='签到赠送';
	
		//  如果资金为0，表示关闭这活动
		if($SignCoin==0) throw new Exception('很遗憾，每日签到活动已经结束！');
		
		// 只有绑定收款方式才能参与签到活动
		$sql="select count(bankId) from {$this->prename}member_bank where `uid`={$this->user['uid']} and enable=1 order by id limit 1";
		if($this->getValue($sql)<=0) throw new Exception('亲，您还未绑定收款方式！请绑定信息后再进行签到操作！');  //0则为没有
		
		// 查询当日是否已经签到过
		$sql="select count(*) from {$this->prename}coin_log where actionTime>=? and liqType=$liqType and `uid`={$this->user['uid']}";
		if($this->getValue($sql, strtotime('00:00'))) throw new Exception('对不起，您今天已经签到过了，请明天再来！');
		   
		if($SignStatus==1){
		   $this->addCoin(array(
			  'info'=>$liqInfo,
			  'liqType'=>$liqType,
			  'coin'=>$SignCoin
		   ));
		   return '每日签到成功！系统赠送购彩金：'.$SignCoin.' 元 ！祝您购彩愉快！';
		}else{
		   $sql="update {$this->prename}members set score=score+{$SignCoin} where 'uid'={$this->user['uid']}";
		   $this->update($sql);
		   return '每日签到成功！系统赠送金币：'.$SignCoin.'  ！祝您购彩愉快！';
		}
	}
}