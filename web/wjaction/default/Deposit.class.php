<?php

/**
*  UPDATE 2015-05-11 DAVID 余额宝存款计算 重新修改
*/

class Deposit extends WebLoginBase{
	private $vcodeSessionName='ssc_vcode_session_name';
    public $pageSize=15;
	
	//余额宝存款
	public final function recharge(){
		$this->display('deposit/deposit-recharge.php');
	}
	
	//余额宝取款
	public final function tocash(){
		$this->display('deposit/deposit-tocash.php');
	}
	
	//余额宝记录
	public final function main(){
		$this->display('deposit/deposit.php');
	}
	
	//余额宝记录
	public final function depositlist(){
		$this->display('deposit/deposit-list.php');
	}
	
	
	//领取收益
	public final function pull(){
		$depositTime=$this->getValue("select actionTime from {$this->prename}deposit_log where uid=? order by actionTime desc limit 1",$this->user['uid']);
		$Time=$this->time;
		
		$deposittime1=$this->settings['deposittime1']; //余额宝利率时间1 单位分钟
		$deposittime2=$this->settings['deposittime2']; //余额宝利率时间2 
		$deposittime3=$this->settings['deposittime3']; //余额宝利率时间3 
		
		$depositll1=$this->settings['depositll1']; //余额宝利率1
		$depositll2=$this->settings['depositll2']; //余额宝利率2
		$depositll3=$this->settings['depositll3']; //余额宝利率3 
		
		if($deposittime1<0){throw new Exception('客服尚未开启余额宝收益功能！');}
		
		$minute=(ceil(($Time-$depositTime)/60));  //算出存款多少分钟 进一取整
		
		$deposit=$this->getValue("select deposit from {$this->prename}members where uid=? ",$this->user['uid']);
		//return $minute;
		if($deposit<=0){throw new Exception("亲，您还没有存款余额宝哦！赶紧前往存款吧！");}
		if($minute<$deposittime1)throw new Exception("亲，别急，喝杯茶！请晚点再来领取收益！");
		if($minute>=$deposittime1 && $minute<$deposittime2){ 
		   $this->beginTransaction();
		   try{
			    $depositCoin=$deposit*$depositll1*0.01/1440*$minute;  //按照第一种利率计算 
				//$CoinTime=$minute/1440;
			    $sql="insert into {$this->prename}deposit_log(uid,actionTime,CoinTime,depositCoin,info,lltype,userDepositCoin)values({$this->user['uid']},{$this->time},{$minute},{$depositCoin},'余额收益',{$depositll1},{$deposit})";
			    $this->insert($sql);  //添加收益记录		   
			    // 帐变记录
			    $this->addCoin(array(
				  'coin'=>$depositCoin,
		   		  'uid'=>$para['uid'],
		   		  'liqType'=>203,
		   		  'info'=>"余额收益"
			    ));
			    $this->commit();
				return '恭喜您，存款收益已领取！您的存款时间共计为： '.$minute.' 分钟！存款越久收益越高！';
		     }catch(Exception $e){
			    $this->rollBack();
                throw new Exception("程序出现错误，请联系在线客服！错误代码"+$e);
		     }
		}else if($minute>=$deposittime2 && $minute<$deposittime3){  //按照第二种利率计算 
		   $this->beginTransaction();
		   try{
			    $depositCoin=$deposit*$depositll2*0.01/1440*$minute;
				//$CoinTime=$minute/1440;
			    $sql="insert into {$this->prename}deposit_log(uid,actionTime,CoinTime,depositCoin,info,lltype,userDepositCoin)values({$this->user['uid']},{$this->time},{$minute},{$depositCoin},'余额收益',{$depositll2},{$deposit})";
			    $this->insert($sql);  //添加收益记录		   
			    // 帐变记录
			    $this->addCoin(array(
				  'coin'=>$depositCoin,
		   		  'uid'=>$para['uid'],
		   		  'liqType'=>203,
		   		  'info'=>"余额收益"
			    ));
			    $this->commit();
				return '恭喜您，存款收益已领取！您的存款时间共计为：'.$minute.' 分钟！存款越久收益越高！';
		     }catch(Exception $e){
			    $this->rollBack();
                throw new Exception("程序出现错误，请联系在线客服！错误代码"+$e);
		     }
		}else if($minute>=$deposittime3){  //按照第三种利率计算 
		   $this->beginTransaction();
		   try{
			    $depositCoin=$deposit*$depositll3*0.01/1440*$minute;
				//$CoinTime=$minute/1440;
			    $sql="insert into {$this->prename}deposit_log(uid,actionTime,CoinTime,depositCoin,info,lltype,userDepositCoin)values({$this->user['uid']},{$this->time},{$minute},{$depositCoin},'余额收益',{$depositll3},{$deposit})";
			    $this->insert($sql);  //添加收益记录		   
			    // 帐变记录
			    $this->addCoin(array(
				  'coin'=>$depositCoin,
		   		  'uid'=>$para['uid'],
		   		  'liqType'=>203,
		   		  'info'=>"余额收益"
			    ));
			    $this->commit();
				return '恭喜您，存款收益已领取！您的存款时间共计为：'.$minute.' 分钟！存款越久收益越高！';
		     }catch(Exception $e){
			    $this->rollBack();
                throw new Exception("程序出现错误，请联系在线客服！错误代码"+$e);
		     }
		}else{
           throw new Exception("亲，别急，喝杯茶！请晚点再来领取收益！");
		}

	}
	
	//将可用余额转入余额宝
	public final function indeposit(){
		if(!$_POST) throw new Exception('程序出错，请联系客服处理！');
		$para['uid']=intval($_POST['uid']);
		$para['amount']=floatval($_POST['amount']);
		$vcode=wjStrFilter($_POST['vcode']);
		
        if(!isset($vcode)){
			throw new Exception('请输入验证码');
		}
		if($vcode!=$_SESSION[$this->vcodeSessionName]){
			throw new Exception('验证码不正确。');
		};
		if($para['amount']<=0) throw new Exception("转存金额只能为正整数");  
		if($para['amount']>$this->user['coin']){throw new Exception('转存金额大于当前可用余额！请重新输入正确数字！');}
		$this->beginTransaction();
		try{

			if($this->getValue("select depositStatus from {$this->prename}members where uid={$para['uid']}")==0){
			   $sql="insert into {$this->prename}deposit_log(uid,actionTime,CoinTime,depositCoin,info)values({$para['uid']},{$this->time},0,0,'首次转入余额宝')";
			   $this->insert($sql);
			   }
           $sql="update {$this->prename}members set deposit=deposit+{$para['amount']},depositStatus=1 where uid={$para['uid']}";
           $this->update($sql);		
		   // 帐变记录
			$this->addCoin(array(
				'coin'=>0-$para['amount'],
				'uid'=>$para['uid'],
				'liqType'=>201,
				'info'=>"余额转入"
			));
			
		   $this->commit();
		    return '余额转入成功，超过1小时后可自助领取收益！';
		   }catch(Excetion $e){
			  $this->rollBack();
		      throw new Exception('转入金额失败，请重新操作或联系客服！错误代码：'+$e);
		   }
		     //清空验证码session
	         unset($_SESSION[$this->vcodeSessionName]);
	 }
	 //将余额宝余额转出到购彩账户
	public final function outdeposit(){
		if(!$_POST) throw new Exception('程序出错，请联系客服处理！');
		$para['uid']=intval($_POST['uid']);
		$para['amount']=floatval($_POST['amount']);
		$vcode=wjStrFilter($_POST['vcode']);
        if(!isset($vcode)){
			throw new Exception('请输入验证码');
		}
		if($vcode!=$_SESSION[$this->vcodeSessionName]){
			throw new Exception('验证码不正确。');
		}
		if($para['amount']<=0) throw new Exception("转出金额只能为正整数");  
		if($para['amount']>$this->user['deposit']){throw new Exception('转出金额大于当前可用余额！请重新输入正确数字！');}
		$this->beginTransaction();
		try{
           $sql="update {$this->prename}members set deposit=deposit-{$para['amount']},depositStatus=1 where uid={$para['uid']}";
           $this->update($sql);
		   
		   // 帐变记录
			$this->addCoin(array(
				'coin'=>$para['amount'],
				'uid'=>$para['uid'],
				'liqType'=>202,
				'info'=>"余额转出"
			));

		   $this->commit();
		    return '余额转出成功！祝您购彩愉快！';
		   }catch(Excetion $e){
			  $this->rollBack();
		      throw new Exception('转出金额失败，请重新操作或联系客服！错误代码：'+$e);
		   }
		     //清空验证码session
	         unset($_SESSION[$this->vcodeSessionName]);
	 }
	 
}