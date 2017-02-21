<?php
class Member extends AdminBase{
	public $pageSize=15;
	public final function add(){
		$this->display('member/add.php');
	}
	
	public final function index(){
		$this->display('member/list.php');
	}
	
	public final function bank(){
		$this->display('member/bank.php');
	}
	
	public final function loginLog(){
		//include 'ip.function.php';
		$this->display('member/login-list.php');
	}
	
	public final function level(){
		$this->display('member/level-list.php');
	}
	
	public final function userCountSetting(){
		$this->display('member/count-setting.php');
	}
	
	public final function edit($uid){
		$this->display('member/edit.php');
	}

	public final function fabuxiaoxi(){
		$this->display('member/fabuxiaoxi.php');
	}
	//重置密码 DAVID 2015-05-16
	public final function forgetPwd(){
		$this->display('member/forgetPwd.php');
	}
	public final function forgetPwdlist(){
		$this->display('member/forgetPwd-list.php');
	}
	public final function UpdateforgetPwd($id){
		$this->display('member/update-forgetPwd.php', 0, $id);
	}
	
	//确认重置密码
	public final function UpdateforgetPwded(){
		if(!isset($_POST['id'])) throw new Exception('参数出现错误！请联系技术人员处理！');
		if(!isset($_POST['userid'])) throw new Exception('参数出现错误！请联系技术人员处理！');
		if(!ctype_digit(intval($_POST['userid']))) throw new Exception('参数包含非法字符!');
		try{
		   $regTime=$this->getValue("select regTime from {$this->prename}members where uid=?",$_POST['userid']);
		   $pwd=md5($regTime.'123456');  //更新密码为123456  
		   $sql="update {$this->prename}forgetpassword set flag=1,mId={$this->user['uid']},mTime={$this->time} where id={$_POST['id']}";
		   $this->update($sql);
		   $pwdsql="update {$this->prename}members set password='{$pwd}' where uid={$_POST['userid']}";
		   $this->update($pwdsql);
		   return "重置密码成功！";
		}catch(Exception $e){
		   throw new Exception('重置密码错误！');
		}
	}

	public final function added($passwordEncrypt=false){
		if(!$_POST) throw new Exception('提交数据出错');
		
		$regTime=$this->time;
		//过滤
		$update['type']=intval($_POST['type']);
		$update['fanDian']=floatval($_POST['fanDian']);
		$update['fanDianBdw']=floatval($_POST['fanDianBdw']);
		$update['username']=wjStrFilter($_POST['username']);
		$update['qq']=$_POST['qq'];
		$update['password']=$_POST['password'];
		$update['regIP']=$this->ip(true);
		$update['regTime']=$regTime;
// 		$update['parentId']=$this->user['uid'];
// 		$update['parents']=$this->user['parents'];
		$update['parents']='';
		$update['sb']=0;
		$update['src']="后台添加";
		
		if(!isset($update['username'])) throw new Exception('用户名不能为空');
		if(!isset($update['fanDian'])) throw new Exception('返点不能为空');
		if(!isset($update['fanDianBdw'])) throw new Exception('不定位返点不能为空');
		if(!ctype_digit($update['qq'])) throw new Exception('QQ包含非法字符');
		if(strlen($update['qq'])<4 || strlen($update['qq'])>13) throw new Exception('QQ号为4-12位,请重新输入');
		
		if($this->getValue("select uid from {$this->prename}members where username=?", $update['username']))
		throw new Exception("用户名已经存在。");
		
		if(isset($update['password']) && !$passwordEncrypt) $update['password']=md5($regTime.$update['password']);
		if(!isset($update['nickname']) || !$update['nickname']) $update['nickname']=$update['username'];
		if(!isset($update['name']) || !$update['name']) $update['name']=$update['username'];
		
		
		
		if($this->insertRow($this->prename .'members', $update)){
			$uid=$this->lastInsertId();
			$this->addLog(4,$this->adminLogType[4].'['.$update['username'].']',$uid, $update['username']);
			$this->update("update {$this->prename}members set parents='{$uid}' where `uid`={$uid}");
			$update['message']='添加用户成功';
			return $update;
		}else{
			throw new Exception('Member-Added函数出错！');
		}
	}
	
	public final function delete($uid){
		$uid=intval($uid);
		$this->display('member/userDel-modal.php', 0, $uid);
	}
	public final function deleteed(){
		$para=$_POST;
		$uid=$para['uid'];
		$teamCoin=$para['teamCoin'];
		$teamFcoin=$para['teamFcoin'];
		//检查是否有下级，并且有帐变
		$son=$this->getRow("select count(*) teamNum, sum(coin) teamCoin, sum(fcoin) teamFcoin from {$this->prename}members where concat(',', parents, ',') like '%,$uid,%'");
		if($son['teamNum']-1>0) throw new Exception('团队还有成员'.$son['teamNum'].'人，团队资金'.$son['teamCoin'].'元,团队冻结'.$son['teamFcoin'].'元');
		if(floatval($teamCoin) != floatval($son['teamCoin'])) throw new Exception('团队资金刚有变动'.(floatval($son['teamFcoin'])-floatval($teamFcoin)).'元，请确认后再删除');
		if(floatval($teamFcoin) != floatval($son['teamFcoin'])) throw new Exception('团队冻结资金刚有变动'.(floatval($son['teamFcoin'])-floatval($teamFcoin)).'元，请确认后再删除');
		//检查用户是否有已经充值还未到账的情况
		//if() throw new Exception('有用户充值'.(floatval($son['teamFcoin'])-floatval($teamFcoin)).'元，正在到账中……');
		
		$userName=$this->getValue("select username from {$this->prename}members where uid=?", $uid);
		$sql="call delUser($uid)";
		if($this->update($sql)){
			//$this->updateRows($this->prename .'members', array('isDelete'=>1), 'uid='.$uid)
			$this->addLog(6,$this->adminLogType[6].'['.$userName.']',$uid,$userName);
			return '删除成功';
		}else{
			throw new Exception('删除失败');
		}
	}
	
	public final function setLevel(){
		$para=$_POST;
		$table=$this->prename .'member_level';

		foreach($para['data'] as $id=>$level){
			//print_r($para);exit;
			$this->updateRows($table, $level, "id=$id");
		}
		$this->addLog(14,$this->adminLogType[14]);
		return true;
	}

//用户等级限额
	public final function updateUserCount($id){
		if($this->updateRows($this->prename .'params_fandianset', $_POST, 'id='.$id)){
			echo '修改成功';
		}else{
			throw new Exception('未知出错');
		}
	}
	
	/*用户*///myq
	public final function listUser($sortType="userId"){
		//throw new Exception($sortType);
		$this->sortType=$sortType;
		$this->display('member/list-user.php');
	}
	/*编辑用户*/
	public final function userUpdate($id){
		$this->display('member/update-modal.php', 0, $id);
	}
	public final function userUpdateed(){
		$para=$_POST;
		$uid=intval($para['uid']);
		$regTime=$this->getValue("select regTime from {$this->prename}members where uid={$uid}");
		if(!$para['password']){
			unset($para['password']);
		}else{
			$para['password']=md5($regTime.$para['password']);
		}
		if(!$para['coinPassword']){
			unset($para['coinPassword']);
		}else{
			$para['coinPassword']=md5($regTime.$para['coinPassword']);
		}
		if(!isset($para['fanDian'])) unset($para['fanDian']);
		if(!isset($para['fanDianBdw'])) unset($para['fanDianBdw']);
		
		// 重置银行信息
		if($para['resetBank']==1){
			$sql="update {$this->prename}member_bank set editEnable=1,account='' where `uid`={$para['uid']}";
			$this->update($sql);
		}
		unset($para['resetBank']);
		
		//print_r($para);
		if($this->updateRows($this->prename .'members', $para, "uid=$uid")){
			$this->addLog(5,$this->adminLogType[5].'['.$para['username'].']',$para['uid'],$para['username']);
			echo '修改成功';
		}else{
			throw new Exception('未知出错');
		}
		
	}
	
	public final function userAmount($id){
		$this->display('member/user-amount.php', 0, $id);
	}

	
	
	public final function redList(){
		$this->display('member/reds.php', 0, $id);
	}

    
	
	public final function redeed(){
		$this->display('member/redeed.php');
	}
	
	public final function doRedeed($uid){
		$this->display('modal/redeed-modal.php', 0, $uid);
	}
	
	public final function payRedeed(){
		$para['uid'] = intval($_POST['uid']);
		$para['startTime'] = intval($_POST['startTime']);
		$para['stopTime'] = intval($_POST['stopTime']);
		$para['redAmount'] = floatval($_POST['redAmount']);
		$para['kuisun'] = floatval($_POST['kuisun']);
		if($para['redAmount']<=0) throw new Exception('该用户没有分红需要派发！');
		$usr = $this->getRow("select* from {$this->prename}members where uid=?", $para['uid']);
		if(!$usr) throw new Exception('找不到该用户');
		$para['username'] = $usr['username'];
		$para['puid'] = $this->user['uid'];
		$para['pusername'] = $this->user['username'];
		$para['red'] = $usr['red'];
		$para['from'] = 1;
		try{
			$this->beginTransaction();
			if($this->insertRow($this->prename .'member_red', $para)){
				$rid=$this->lastInsertId();
				$log=array(
						'uid'=>$usr['uid'],
						'info'=>'亏损分红',
						'coin'=>$para['redAmount'],
						'liqType'=>1,
						'extfield0'=>$rid,
						'extfield1'=>'',
						'extfield2'=>''
				);
				$this->addCoin($log);
				$this->updateRows($this->prename .'members', array('lastRedeed'=>$para['stopTime']), 'uid='.$usr['uid']);
				$this->commit();
				return '分红资金派发成功';
			}else{
				throw new Exception('未知错误');
			}
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
	}
	
}