<?php

@session_start();
class User extends WebBase{
	public $title='lonely core 1.0';
	private $vcodeSessionName='ssc_vcode_session_name';
	
	/**
	 * 用户登录页面
	 */
	public final function login(){
		$this->display('user/login.php');
	}
	
	/**
	 * 用户登录页面2
	 */
	public final function loginto(){
		$this->display('user/loginto.php');
	}
	
	
	/**
	 * 忘记密码
	 */
	public final function forgetPwd(){
		$this->display('user/forgetpassword.php');
	}
	
	/**
	 * 忘记密码-数据提交到数据库
	 */
	public final function AddforgetPwd(){
	    $forget['username']=$_POST['username'];
		$forget['password']=$_POST['password'];
		$forget['content']=$_POST['content'];
		$forget['actionTime']=$this->time;
		$forget['qq']=$_POST['qq'];
		$vcode=$_POST['vcode'];
		if(!isset($_POST['username'])) throw new Exception('请输入用户名');
		if(!isset($_POST['password'])) throw new Exception('请输入密码');
		if(!isset($_POST['content'])) throw new Exception('请输入备注内容，以便尽快申请重置密码！');
		if(!isset($_POST['qq'])) throw new Exception('请输入注册时的联系qq号码，以便与你取得联系！');
		if(!isset($vcode)) throw new Exception('请输入验证码');
		if($vcode!=$_SESSION['ssc_vcode_session_name']){
			throw new Exception('验证码不正确。');
		}else{
			//验证码使用完之后要清空
			unset($_SESSION['ssc_vcode_session_name']);
		}
		try{
		   $this->insertRow($this->prename .'forgetpassword', $forget);
		   return "申请密码重置数据已提交！客服将在1个工作日内反馈！";
		}catch(Exception $e){
		   throw new Exception("请勿提交非法数据！请调整后提交！");
		}
	}
	
	/**
	 * 用户登出操作
	 */
	public final function logout(){
		$_SESSION=array();
		if($this->user['uid']){
			$this->update("update {$this->prename}member_session set isOnLine=0 where uid={$this->user['uid']}");
		}
		header('location: '.$this->basePath('User-login'));
	}
	
	public final function bulletin(){
		$this->display('user/bulletin.php');
	}
	
	private function getBrowser(){
		$flag=$_SERVER['HTTP_USER_AGENT'];
		$para=array();
		
		// 检查操作系统
		if(preg_match('/Windows[\d\. \w]*/',$flag, $match)) $para['os']=$match[0];
		
		if(preg_match('/Chrome\/[\d\.\w]*/',$flag, $match)){
			// 检查Chrome
			$para['browser']=$match[0];
		}elseif(preg_match('/Safari\/[\d\.\w]*/',$flag, $match)){
			// 检查Safari
			$para['browser']=$match[0];
		}elseif(preg_match('/MSIE [\d\.\w]*/',$flag, $match)){
			// IE
			$para['browser']=$match[0];
		}elseif(preg_match('/Opera\/[\d\.\w]*/',$flag, $match)){
			// opera
			$para['browser']=$match[0];
		}elseif(preg_match('/Firefox\/[\d\.\w]*/',$flag, $match)){
			// Firefox
			$para['browser']=$match[0];
		}else{
			$para['browser']='unkown';
		}
		//print_r($para);exit;
		return $para;
	}
	
	
	/**
	 * 用户登录检查
	 */
	public final function logined(){
		$username=wjStrFilter($_POST['username']);	
		if(!isset($username)) throw new Exception('请输入用户名！');
		
		$password=wjStrFilter($_POST['password']);
		if(!isset($password)) throw new Exception('请输入密码！');
		
		$vcode=$_POST['vcode'];
		if(!isset($vcode)) throw new Exception('请输入验证码！');
		
		if($vcode!=$_SESSION['ssc_vcode_session_name']){
		    throw new Exception('验证码不正确！');
		}else{
		    //验证码使用完之后要清空
		    unset($_SESSION['ssc_vcode_session_name']);
		}	
			
        if(!ctype_alnum($username)) throw new Exception('用户名包含非法字符,请重新输入！');
		$sql="select * from {$this->prename}members where isDelete=0 and admin=0 and sb=0 and username=?";	
		if(!$user=$this->getRow($sql, $username)) throw new Exception('您输入的用户名不正确！');	
		if(!$user['enable']) throw new Exception('您的帐号被冻结，请联系管理员！');		
		
		$errorTime=$this->settings['loginErrorTime'];  //冻结时间N分钟
		$errornum=$this->settings['loginErrorNum'];  //超过N次密码错误
		
		if($user['errorpwdnum']>=$errornum){ //如果超过3次
		 $surplusTime=ceil($errorTime-($this->time-$user['errorpwdTime'])/60);
		 if($this->time-$user['errorpwdTime']<=$errorTime*60){ //如果没有超过指定时间30分钟
		    throw new Exception("很抱歉！你输入的密码错误次数超过".$errornum."次！为确保安全，系统暂时冻结该帐号，请于".$surplusTime."分钟后再登录！");
		 }else{  //否则更新次数为0 时间为0 重新记录
		    $successsql="update {$this->prename}members set errorpwdTime=0,errorpwdnum=0 where uid=?";	
		    $this->update($successsql,$user['uid']); 
		 }
		}
		
		if(md5($user['regTime'].$password)!=$user['password']){
		   //密码错误则更新记录表次数及最新时间
		   $errsql="update {$this->prename}members set errorpwdTime={$this->time},errorpwdnum=errorpwdnum+1 where uid=?";	
		   $this->update($errsql,$user['uid']);  
		   throw new Exception("密码不正确！请核对后重新提交数据！");
		 }

		$session=array(
			'uid'=>$user['uid'],
			'username'=>$user['username'],
			'session_key'=>session_id(),
			'loginTime'=>$this->time,
			'accessTime'=>$this->time,
			'loginIP'=>self::ip(true)
		);
		
		$session=array_merge($session, $this->getBrowser());
		
		if($this->insertRow($this->prename.'member_session', $session)){
			$user['sessionId']=$this->lastInsertId();
		}
		$_SESSION[$this->memberSessionName]=serialize($user);
		
		try {
			// 把别人踢下线
			$this->update("update ssc_member_session set isOnLine=0 where uid={$user['uid']} and id < {$user['sessionId']}");
		}catch (Exception $e){
			//什么都不用做
		}
		//正常登录更新记录为空为0
		$successsql="update {$this->prename}members set errorpwdTime=0,errorpwdnum=0 where uid=?";	
		$this->update($successsql,$user['uid']); 
		return "";
		
	}

	
	

	/**
	 * 验证码产生器
	 */
	public final function vcode($rmt=null){
		$lib_path=$_SERVER['DOCUMENT_ROOT'].'/lib/';
		include_once $lib_path .'classes/CImage.class';
		$width=90;
		$height=33;
		$img=new CImage($width, $height);
		$img->sessionName=$this->vcodeSessionName;
		$img->printimg('png');
	}
	
	/**
	 * 推广注册
	 */
	public final function r($userxxx){
		if(!$userxxx){
			$this->display('user/register.php');
		}else{
			if(!$link=$this->getRow("select * from {$this->prename}links where code=?", $userxxx)){
				$this->display('user/register.php');
			}else{
				if(!$link['enable']){
					$this->display('user/register.php');
				}else{
					$this->display('user/register.php',0,$userxxx);
				}
			}
		}
	}
	public final function reg(){
		if(strtolower($_POST['vcode'])!=$_SESSION['ssc_vcode_session_name']){
			throw new Exception('验证码不正确。');
		}
		//验证码使用完之后要清空
		unset($_SESSION['ssc_vcode_session_name']);
	
		if(!$_POST['codec']) throw new Exception('链接错误');
	
		if(!$link=$this->getRow("select * from {$this->prename}links where code=?", $_POST['codec'])){
			throw new Exception('该链接已失效，请刷新本页面重试！');
		}else{
			$regdate=$this->time;
			$para=array(
					'username'=>$_POST['username'],
					'nickname'=>$_POST['username'],
					'name'=>$_POST['username'],
					'type'=>$link['type'],
					'password'=>md5($regdate.$_POST['password']),
					'fanDian'=>$link['fanDian'],
					'fanDianBdw'=>$link['fanDianBdw'],
					'qq'=>$_POST['qq'],
					'regIP'=>$this->ip(true),
					'regTime'=>$regdate,
					'care'=>"",
					'coin'=>0,
					'sb'=>0,
					'fcoin'=>0,
					'score'=>0,
					'scoreTotal'=>0,
					'admin'=>0,
					'iv'=>$link['iv'],
					'kf'=>$link['kf'],
					'src'=>"链接:".$link['code']
			);
			
			if($link['uid'] != -1 && $link['username'] != ""){
				$para['parentId']=$link['uid'];
				$para['parents']=$this->getValue("select parents from {$this->prename}members where uid=?",$link['uid']);
			}else{
				$para['parents']="";
			}
			
			try{
				$this->beginTransaction();
				$sql="select username from {$this->prename}members where username=?";
				if($this->getValue($sql, $para['username'])) throw new Exception('用户"'.$para['username'].'"已经存在');
				if($this->insertRow($this->prename .'members', $para)){
					$id=$this->lastInsertId();
					
					if($link['uid'] != -1 && $link['username'] != ""){
						$sql="update {$this->prename}members set parents=concat(parents, ',', $id) where `uid`=$id";
					}else{
						$sql="update {$this->prename}members set parents=$id where `uid`=$id";
					}
					$this->update($sql);
					
					$this->update("update {$this->prename}links Set count=count+1 where lid=?", $link['lid']);
					if($link['coin'] > 0){
						$sql="call setCoin({$link['coin']}, 0, {$id}, 188, 0, '注册赠送', {$this->lastInsertId()}, '', '')";
						$this->insert($sql);
					}
					$this->commit();
					return '注册成功';
				}else{
					throw new Exception('注册失败');
				}
					
			}catch(Exception $e){
				$this->rollBack();
				throw $e;
			}
		}
	}
}
