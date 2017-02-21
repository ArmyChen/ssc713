<?php
@session_start();

class Safe extends WebLoginBase{
	public $title='lonely 1.0';
	private $vcodeSessionName='ssc_vcode_session_name';
	/**
	 * 用户信息页面
	 */
	public final function info(){
		$this->display('safe/info.php');
	}
	/**
	 * 银行卡管理
	 */
	public final function bank(){
		$this->display('safe/bank.php');
	}
	/**
	 * 密码管理
	 */
	public final function passwd(){
		$sql="select password, coinPassword from {$this->prename}members where uid=?";
		$pwd=$this->getRow($sql, $this->user['uid']);
		if(!$pwd['coinPassword']){
			$coinPassword=false;
		}else{
			$coinPassword=true;
		}

		$this->display('safe/passwd.php',0,$coinPassword);
	}
	
	/**
	 * 设置密码 加密方式为注册时间+设置的密码的md5密文
	 */
	public final function setPasswd(){
	
		$urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被篡改，请联系在线客服处理！');

		$opwd=$_POST['oldpassword'];
		if(!$opwd) throw new Exception('原密码不能为空');
		if(strlen($opwd)<6) throw new Exception('原密码至少6位');
		if(!$npwd=$_POST['newpassword']) throw new Exception('密码不能为空');
		if(strlen($npwd)<6) throw new Exception('密码至少6位');
		
		$sql="select regTime,password from {$this->prename}members where uid=?";
		$user=$this->getRow($sql, $this->user['uid']);
		
		$opwd=md5($user['regTime'].$opwd);//时间+密码的md5
		if($opwd!=$user['password']) throw new Exception('原始密码不正确，请重新输入！');
		
		$sql="update {$this->prename}members set password=? where uid={$this->user['uid']}";
		if($this->update($sql, md5($user['regTime'].$npwd))) return '修改密码成功';
		return '修改密码失败';
		
	}
	
	/**
	 * 设置资金密码
	 */
	public final function setCoinPwd(){
		$urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被篡改，请联系在线客服处理！');

		$opwd=$_POST['oldpassword'];
		if(!$npwd=$_POST['newpassword']) throw new Exception('资金密码不能为空');
		if(strlen($npwd)<6) throw new Exception('资金密码至少6位');
		
		$sql="select regTime,password,coinPassword from {$this->prename}members where uid=?";
		$pwd=$this->getRow($sql, $this->user['uid']);
		if(!$pwd['coinPassword']){
			$npwd=md5($pwd['regTime'].$npwd);
			if($npwd==$pwd['password']) throw new Exception('资金密码与登录密码不能一样');
			$tishi='资金密码设置成功';
		}else{
			if($opwd && md5($pwd['regTime'].$opwd)!=$pwd['coinPassword']) throw new Exception('原资金密码不正确');
			$npwd=md5($pwd['regTime'].$npwd);
			if($npwd==$pwd['password']) throw new Exception('资金密码与登录密码不能一样');
			$tishi='修改资金密码成功';
		}
		$sql="update {$this->prename}members set coinPassword=? where uid={$this->user['uid']}";
		if($this->update($sql, $npwd)) return $tishi;
		return '修改资金密码失败';
	}
	
	public final function setCoinPwd2(){
		$urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被篡改，请联系在线客服处理！');
		$opwd=$_POST['oldpassword'];
		if(!$opwd) throw new Exception('原资金密码不能为空');
		if(strlen($opwd)<6) throw new Exception('原资金密码至少6位');
		if(!$npwd=$_POST['newpassword']) throw new Exception('资金密码不能为空');
		if(strlen($npwd)<6) throw new Exception('资金密码至少6位');
		
		$sql="select regTime,password, coinPassword from {$this->prename}members where uid=?";
		$pwd=$this->getRow($sql, $this->user['uid']);
		if(!$pwd['coinPassword']){
			$npwd=md5($pwd['regTime'].$npwd);
			if($npwd==$pwd['password']) throw new Exception('资金密码与登录密码不能一样');
			$tishi='资金密码设置成功';
		}else{
			if($opwd && md5($pwd['regTime'].$opwd)!=$pwd['coinPassword']) throw new Exception('原资金密码不正确');
			$npwd=md5($pwd['regTime'].$npwd);
			if($npwd==$pwd['password']) throw new Exception('资金密码与登录密码不能一样');
			$tishi='修改资金密码成功';
		}
		
		//throw new Exception($npwd);
		
		$sql="update {$this->prename}members set coinPassword=? where uid={$this->user['uid']}";
		if($this->update($sql, $npwd)) return $tishi;
		return '修改资金密码失败';
	}
	
	
	//绑定收款方式
	public final function setCBAccount(){
	
        $urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被篡改，请联系在线客服处理！');
		
// 		if(!$para=$_POST) throw new Exception('参数出错');
		$para['bankId'] = wjStrFilter($_POST['bankId']);
		$para['uid']=$this->user['uid'];
		$para['editEnable']=0;
		$para['admin']=0;
		$para['account']=wjStrFilter($_POST['account']);
		$para['countname']=wjStrFilter($_POST['countname']);
		$para['username']=wjStrFilter($_POST['username']);
		$para['bankId']=intval($_POST['bankId']);
		$para['coinPassword']=$_POST['coinPassword'];
		
		$this->freshSession();
		if(!$para['bankId'])throw new Exception('必须选择银行');
		if($para['account']){
			if($para['bankId'] == 2 ||$para['bankId'] == 3){  //财付通或者支付宝
				if(strlen($para['account'])>30)throw new Exception('财付通/支付宝账号不能超过30位字符！');
				if(strstr($para['account'], "'") || strstr($para['account'], " ") || strstr($para['account'], ";") || strstr($para['account'], ")"))throw new Exception('账号包含不允许的特殊字符，请检查！');
			}else{
				if(!is_numeric($para['account']))throw new Exception('银行卡号只能是数字！请复查后重新填写提交！');
				if(strlen($para['account'])<15 || strlen($para['account'])>22)throw new Exception('银行卡号长度必须在大于14位，小于23位');
			}
		}else{
			throw new Exception('收款方式账号不能为空！');
		}
		$user=$this->getRow("select regTime,coinPassword from {$this->prename}members where uid=?", $para['uid']);
		
		if(md5($user['regTime'].$para['coinPassword'])!=$user['coinPassword']) throw new Exception('资金密码不正确');
		unset($para['coinPassword']);

		if($account=$this->getValue("select account FROM {$this->prename}member_bank where account=? LIMIT 1",$para['account'])) throw new Exception('该'.$account.'银行账号已经使用');
		if(!$bnk = $this->getRow("select * from {$this->prename}bank_list where isDelete=0 and tk=1 and id=?", $para['bankId'])) throw new Exception('已经停止绑定该收款方式，请选择其它收款方式！');;
		
		if($bank=$this->getRow("select id,editEnable from {$this->prename}member_bank where uid=?",$this->user['uid'])){
			//已经绑定，修改账号的情况
			if($bank['editEnable']!=1) throw new Exception('收款方式信息绑定后不能随便更改，如需更改，请联系在线客服');
			if($this->updateRows($this->prename .'member_bank',$para,'uid='.$this->user['uid'])){
				return '修改收款方式信息成功';
			}else{
				throw new Exception( '修改收款方式信息出错！请联系在线客服处理！');
			}
		}else{
			//初次绑定
			$this->beginTransaction();
			if($this->insertRow($this->prename .'member_bank',$para)){
				if($bnk['zs'] > 0){
					$id=$this->lastInsertId();
					$sql="call setCoin({$bnk['gift']}, 0, {$this->user['uid']}, 189, 0, '绑定银行卡赠送', {$id}, '', '')";
					$this->insert($sql);
					$this->commit();
					return '添加收款方式信息成功！系统赠送购彩金：'.$bnk['zs'].' ！祝您购彩愉快！';
				}else{
					$this->commit();
					return '添加收款方式信息成功！祝您购彩愉快！';
				}
			}else{
				$this->rollBack();
				throw new Exception( '添加收款方式信息出错！请联系在线客服处理！');
			}
		}
	}

//设置登陆问候语
public final function care(){
        $urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被篡改，请联系在线客服处理！');

		if(!$_POST) throw new Exception('提交参数出错');

		//过滤未知字段
		$update['care']=wjStrFilter($_POST['care']);

        //问候语长度限制
		$len=mb_strlen($update['care'],'utf8');
		if($len>10) throw new Exception( '登陆问候语过长，请重新输入');
		if($len=0) throw new Exception( '登陆问候语不能为空，请重新输入');

		if($this->updateRows($this->prename .'members', $update, 'uid='. $this->user['uid'])){
				return '更改登陆问候语成功';
			}else{
				throw new Exception( '更改登陆问候语出错');
			}
  }

 //设置昵称
public final function nickname(){
        $urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被篡改，请联系在线客服处理！');

		if(!$_POST) throw new Exception('提交参数出错');

		//过滤未知字段
		$update['nickname']=wjStrFilter($_POST['nickname']);

		$len=mb_strlen($update['nickname'],'utf8');
		if($len>8) throw new Exception( '昵称过长，请重新输入');
		if($len=0) throw new Exception( '昵称不能为空，请重新输入');
		if($this->updateRows($this->prename .'members', $update, 'uid='. $this->user['uid'])){
				return '更改昵称成功';
			}else{
				throw new Exception( '更改昵称出错');
			}
  }
}