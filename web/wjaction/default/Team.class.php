<?php

class Team extends WebLoginBase{
	public $pageSize=15;
	
	public function getMyUserCount1(){
		$this->getSystemSettings();
		$minFanDian=$this->user['fanDian'] - 10 * $this->settings['fanDianDiff'];
		$sql="select count(*) registerUserCount, fanDian from {$this->prename}members where parentId={$this->user['uid']} and fanDian>=$minFanDian and fanDian<{$this->user['fanDian']} group by fanDian order by fanDian desc";
		$data=$this->getRows($sql);
		
		$ret=array();
		$fanDian=$this->user['fanDian'];
		$i=0;
		$set=explode(',', $this->settings['fanDianUserCount']);
		
		while(($fanDian-=$this->settings['fanDianDiff']) && ($fanDian>=$minFanDian)){
			$arr=array();
			if($data[0]['fanDian']==$fanDian){
				$arr=array_shift($data);
			}else{
				$arr['fanDian']=$fanDian;
				$arr['registerUserCount']=0;
			}
			
			$arr['setting']=$set[$i];
			//var_dump($fanDian);
			$ret["$fanDian"]=$arr;
			
			$i++;
		}
		
		return ($ret);
	}
	
	public function getMyUserCount(){
		if(!$set=$this->settings['fanDianUserCount']) return array();
		$set=explode(',', $set);
		
		foreach($set as $key=>$var){
			$set[$key]=explode('|', $var);
		}
		
		foreach($set as $var){
			if($this->user['fanDian']>=$var[1]) break;
			array_shift($set);
		}
		
	}
	
	/*游戏记录*/
	public final function gameRecord(){
		$this->getTypes();
		$this->getPlayeds();
		$this->action='searchGameRecord';
		$this->display('team/record.php');
	}
	
	public final function searchGameRecord(){
		
		$this->getTypes();
		$this->getPlayeds();
		$this->display('team/record-list.php');
	}
	/*游戏记录 结束*/
	
	/*团队报表*/
	public final function report(){

		$this->action='searchReport';
		$this->display('team/report.php');
	}
	
	public final function searchReport(){
		
		$this->display('team/report-list.php');
	}
	/*团队报表 结束*/
	
	/*帐变列表*/
	public final function coin(){
		$this->action='searchCoin';
		$this->display('team/coin.php');
	}
	
	public final function searchCoin(){
		$this->display('team/coin-log.php');
	}
	/*帐变列表 结束*/
	
	public final function coinall(){
		$this->freshSession();
		$this->display('team/coinall.php');
	}
	
	public final function addMember(){
		
		$this->display('team/add-member.php');
	}
	public final function userUpdate($id){
		$this->display('team/update-menber.php', 0, intval($id));
	}
	public final function userUpdate2($id){
		$this->display('team/menber-recharge.php', 0, intval($id));
	}
	public final function memberList(){
		$this->display('team/member-list.php');
	}
	
	public final function cashRecord(){
		$this->display('team/cash-record.php');
	}
	
	public final function searchCashRecord(){
		$this->display('team/cash-record-list.php');
	}
	public final function addLink(){
		$this->display('team/add-link.php');
	}
	public final function linkDelete($lid){
		$this->display('team/delete-link.php',0,intval($lid));
	}
	public final function linkList(){
		$this->display('team/link-list.php');
	}
	public final function getLinkCode($id){
		$this->display('team/get-linkcode.php', 0, intval($id), $this->user['uid'], $this->urlPasswordKey);
	}
	public final function advLink(){
		$this->display('team/link-list.php');
	}
	public final function switchLinkStatus($id){
		if(!$id=intval($id)) throw new Exception('参数出错');
		$sql="update {$this->prename}links set enable=not enable where lid=?";
		if($this->update($sql, $id)){
			echo '操作成功';
		}else{
			throw new Exception('未知错误');
		}
	}
	public final function insertLink(){
		$urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被非法篡改，请重新操作');

		if(!$_POST)  throw new Exception('提交数据出错，请重新操作');

        $update['uid']=intval($_POST['uid']);
		$update['type']=intval($_POST['type']);
		$update['fanDian']=floatval($_POST['fanDian']);
		$update['fanDianBdw']=floatval($_POST['fanDianBdw']);
		$update['regIP']=$this->ip(true);
		$update['regTime']=$this->time;
		$update['code']=$this->getCodeID('links', 6, 'code');
		
		$update['username'] = $this->user['username'];
		$update['updateTime'] = $this->time;
		$update['isDelete'] = 0;
		$update['count'] = 0;
		$update['enable'] = 1;
		$update['coin'] = 0;
		$update['iv'] = 0;
		$update['kf'] = 1;

        if($update['fanDian']<0) throw new Exception('返点不能小于0');
		if($update['fanDianBdw']<0) throw new Exception('不定位返点不能小于0');
		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) throw new Exception('返点不能大于'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']));
		if($update['fanDianBdw']>$this->iff($this->user['fanDianBdw']-$this->settings['fanDianDiff']<0,0,$this->user['fanDianBdw']-$this->settings['fanDianDiff'])) throw new Exception('不定位返点不能大于'.$this->iff($this->user['fanDianBdw']-$this->settings['fanDianDiff']<0,0,$this->user['fanDianBdw']-$this->settings['fanDianDiff']));
		if($update['type']!=0 && $update['type']!=1) throw new Exception('类型出错，请重新操作');
		if($update['uid']!=$this->user['uid']) throw new Exception('只能增加自己的推广链接!');

		// 查检返点设置
		if($update['fanDian']){
			$this->getSystemSettings();
			if($update['fanDian'] % $this->settings['fanDianDiff']) throw new Exception(sprintf('返点只能是%.1f%的倍数', $this->settings['fanDianDiff']));
			
		}else{
			$update['fanDian']=0.0;
		}
		
		$this->beginTransaction();
		try{
			$sql="select fanDian from {$this->prename}links where uid={$update['uid']} and fanDian=? ";
			
			if($this->getValue($sql, $update['fanDian'])) throw new Exception('此链接已经存在');
			if($this->insertRow($this->prename .'links', $update)){
				$id=$this->lastInsertId();	
				$this->commit();
				return '添加链接成功';
			}else{
				throw new Exception('添加链接失败');
			}
			
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
	}
	
	/*编辑注册链接*/
	public final function linkUpdate($id){
		$this->display('team/update-link.php', 0, intval($id));
	}
	
	public final function linkUpdateed(){
		$urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被非法篡改，请重新操作');

		if(!$_POST)  throw new Exception('提交数据出错，请重新操作');

		$update['lid']=intval($_POST['lid']);
        $update['fanDian']=floatval($_POST['fanDian']);
		$update['fanDianBdw']=floatval($_POST['fanDianBdw']);
		$lid=$update['lid'];

		if($update['fanDian']<0) throw new Exception('返点不能小于0');
		if($update['fanDianBdw']<0) throw new Exception('不定位返点不能小于0');
		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) throw new Exception('返点不能大于'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']));
		if($update['fanDianBdw']>$this->iff($this->user['fanDianBdw']-$this->settings['fanDianDiff']<0,0,$this->user['fanDianBdw']-$this->settings['fanDianDiff'])) throw new Exception('不定位返点不能大于'.$this->iff($this->user['fanDianBdw']-$this->settings['fanDianDiff']<0,0,$this->user['fanDianBdw']-$this->settings['fanDianDiff']));
        if($uid=$this->getvalue("select uid from {$this->prename}links where lid=?",$lid)){
		     if($uid!=$this->user['uid']) throw new Exception('只能修改自己的推广链接!');
		}else{
			throw new Exception('此注册链接不存在');
			}
		
		if(!$_POST['fanDian']){unset($_POST['fanDian']);unset($update['fanDian']);}
		if(!$_POST['fanDianBdw']){unset($_POST['fanDianBdw']);unset($update['fanDianBdw']);}
		if($update['fanDian']==0) $update['fanDian']=0.0;
		if($update['fanDianBdw']==0) $update['fanDianBdw']=0.0;

		if($this->updateRows($this->prename .'links', $update, "lid=$lid")){
			echo '修改成功';
		}else{
			throw new Exception('未知出错');
		}
		
	}
	
	/*删除注册链接*/
	public final function linkDeleteed(){
		$lid=intval($_POST['lid']);
		if($uid=$this->getvalue("select uid from {$this->prename}links where lid=?",$lid)){
		     if($uid!=$this->user['uid']) throw new Exception('只能删除自己的推广链接!');
		}else{
			throw new Exception('此注册链接不存在');
			}
		$sql="delete from {$this->prename}links where lid=?";
		if($this->delete($sql, $lid)){
			echo '删除成功';
		}else{
			throw new Exception('未知出错');
		}
	}

	public final function searchMember(){
		$this->display('team/member-search-list.php');
	}
	
	public final function insertMember(){
		$urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被篡改，请重新操作');
		$regTime=$this->time;
		if(!$_POST) throw new Exception('提交数据出错，请重新操作');

        //过滤未知字段
		$update['username']=wjStrFilter($_POST['username']);
		$update['qq']=wjStrFilter($_POST['qq']);
		$update['fanDian']=floatval($_POST['fanDian']);
		$update['fanDianBdw']=floatval($_POST['fanDianBdw']);
		$update['password']=$_POST['password'];
		$update['type']=intval($_POST['type']);
		$update['sb']=0;
		$update['care']="";
		$update['coin']=0;
		$update['fcoin']=0;
		$update['score']=0;
		$update['scoreTotal']=0;
		$update['admin']=0;
		$update['iv']=0;
		$update['kf']=1;
		$update['src']="代理添加";
        
		//接收参数检查
		if($update['fanDian']<0) throw new Exception('返点不能小于0');
		if($update['fanDianBdw']<0) throw new Exception('不定位不能小于0');
		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<=0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) throw new Exception('返点不能大于'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']));
		if($update['fanDianBdw']>$this->iff($this->user['fanDianBdw']-$this->settings['fanDianDiff']<=0,0,$this->user['fanDianBdw']-$this->settings['fanDianDiff'])) throw new Exception('不定位返点不能大于'.$this->iff($this->user['fanDianBdw']-$this->settings['fanDianDiff']<0,0,$this->user['fanDianBdw']-$this->settings['fanDianDiff']));
		if(!$update['username']) throw new Exception('用户名不能为空，请重新操作');
		if($update['type']!=0 && $update['type']!=1) throw new Exception('类型出错，请重新操作');

		if(!ctype_alnum($update['username'])) throw new Exception('用户名包含非法字符,请重新输入');
		if(!ctype_digit($update['qq'])) throw new Exception('QQ包含非法字符');

		$userlen=strlen($update['username']);
		$passlen=strlen($update['password']);
		$qqlen=strlen($update['qq']);

		if($userlen<4 || $userlen>16) throw new Exception('用户名长度不正确,请重新输入');
		if($passlen<6) throw new Exception('密码至少六位,请重新输入');
		if($qqlen<4 || $qqlen>13) throw new Exception('QQ号为4-12位,请重新输入');

		$update['parentId']=$this->user['uid'];
		$update['parents']=$this->user['parents'];
		$update['password']=md5($regTime.$update['password']);
		
		$update['regIP']=$this->ip(true);
		$update['regTime']=$regTime;
		
		if(!$_POST['nickname']) $update['nickname']='未设昵称';
		if(!$_POST['name']) $update['name']=$update['username'];
		
		//$subCount=$this->getValue("select count(*) from {$this->prename}members where parentId=?", $this->user['uid']);
		//throw new Exception($subCount);
		//if($subCount>=$this->user['subCount']) throw new Exception('您的会员人数已经达到上限');
		
		// 查检返点设置
		if($update['fanDian']){
			$this->getSystemSettings();
			if($update['fanDian'] % $this->settings['fanDianDiff']) throw new Exception(sprintf('返点只能是%.1f%的倍数', $this->settings['fanDianDiff']));
			
			$count=$this->getMyUserCount();
			$sql="select userCount, (select count(*) from {$this->prename}members m where m.parentId={$this->user['uid']} and m.fanDian=s.fanDian) registerCount from {$this->prename}params_fandianset s where s.fanDian={$update['fanDian']}";
			$count=$this->getRow($sql);
			//throw new Exception($sql);
			//throw new Exception(sprintf('注册人数：%d，总人数：%d', $count['registerCount'], $count['userCount']));
			
			if($count && $count['registerCount']>=$count['userCount']) throw new Exception(sprintf('对不起返点为%.1f的下级人数已经达到上限', $update['fanDian']));
		}else{
			$update['fanDian']=0.0;
		}
		
		$this->beginTransaction();
		try{
			$sql="select username from {$this->prename}members where username=?";
			if($this->getValue($sql, $update['username'])) throw new Exception('用户“'.$update['username'].'”已经存在');
			if($this->insertRow($this->prename .'members', $update)){
				$id=$this->lastInsertId();
				$sql="update {$this->prename}members set parents=concat(parents, ',', $id) where `uid`=$id";
				$this->update($sql);
				
				$this->commit();
				
				return '添加会员成功！';
			}else{
				throw new Exception('添加会员失败！');
			}
			
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
	}
	
	public final function userUpdateed(){
		$urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被非法篡改，请重新操作');

		if(!$_POST) throw new Exception('提交数据出错，请重新操作');
        
		//过滤未知字段
		$update['type']=intval($_POST['type']);
		$update['uid']=intval($_POST['uid']);
		$update['fanDian']=floatval($_POST['fanDian']);
		$update['fanDianBdw']=floatval($_POST['fanDianBdw']);
		$uid=$update['uid'];

        if($update['fanDian']<0) throw new Exception('返点不能小于0');
		if($update['fanDianBdw']<0) throw new Exception('不定位不能小于0');
		$fandian=$this->getvalue("select fanDian from {$this->prename}members where uid=?",$update['uid']);
		$fanDianBdw=$this->getvalue("select fanDianBdw from {$this->prename}members where uid=?",$update['uid']);
		if($update['fanDian']<$fandian) throw new Exception('返点不能降低!');
		if($update['fanDianBdw']<$fanDianBdw) throw new Exception('不定位返点不能降低!');
// 		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) throw new Exception('返点不能大于'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']));
// 		if($update['fanDianBdw']>$this->iff($this->user['fanDianBdw']-$this->settings['fanDianDiff']<0,0,$this->user['fanDianBdw']-$this->settings['fanDianDiff'])) throw new Exception('不定位返点不能大于'.$this->iff($this->user['fanDianBdw']-$this->settings['fanDianDiff']<0,0,$this->user['fanDianBdw']-$this->settings['fanDianDiff']));
		if($update['type']!=0 && $update['type']!=1) throw new Exception('类型出错，请重新操作');

		if($uid==$this->user['uid']) throw new Exception('不能修改自己的返点');
		if(!$parentId=$this->getvalue("select parentId from {$this->prename}members where uid=?",$uid)) throw new Exception('此会员不存在!');
		if($parentId!=$this->user['uid']) throw new Exception('此会员不是你的直属下线，无法修改');

		if(!$_POST['fanDian']){unset($_POST['fanDian']);unset($update['fanDian']);}
		if(!$_POST['fanDianBdw']){unset($_POST['fanDianBdw']);unset($update['fanDianBdw']);}
		if($update['fanDian']==0) $update['fanDian']=0.0;
		if($update['fanDianBdw']==0) $update['fanDianBdw']=0.0;
		
		if($this->updateRows($this->prename .'members', $update, "uid=$uid")){
			echo '修改成功';
		}else{
			throw new Exception('未知出错');
		}
	}
	
 /*额度转移*/
	public final function userUpdateed2(){
		$urlshang = $_SERVER['HTTP_REFERER']; //上一页URL
		$urldan = $_SERVER['SERVER_NAME']; //本站域名
		$urlcheck=substr($urlshang,7,strlen($urldan));
		if($urlcheck<>$urldan)  throw new Exception('数据包被非法篡改，请重新操作');

		if(!$para=$_POST) throw new Exception('提交数据出错，请重新操作');

        if($this->settings['recharge']==1){
		$uid=intval($para['uid']);
		$uid2=$this->user['uid'];
		$para['coin']=floatval($para['coin']);
		if($para['coin']<1 || $para['coin']>10000) throw new Exception('只能充值1-10000元');
		if(!$para['coin']) unset($para['coin']);

		$this->beginTransaction();
		try{
		$sql="select * from {$this->prename}members where uid=?";
		$userData=$this->getRow($sql, $uid2);
        if(!$userData2=$this->getRow($sql, $uid)) throw new Exception('此会员不存在!');

		if($userData2['parentId']!=$uid2) throw new Exception('此会员不是的你的直属会员，请重新选择！');
		if(!$userData2['enable']) throw new Exception('此会员已被冻结，无法转移！');
		if($userData['coin']<=0) throw new Exception('余额不足，请先充值！');
		if($userData['coin']<$para['coin']) throw new Exception('可用余额小于充值金额，请先充值！');
		$abc['coin']=$userData['coin']-$para['coin'];
        $def['coin']=$userData2['coin']+$para['coin'];
		
			$this->addCoin(array(
						'uid'=>$uid2,
						'coin'=>-$para['coin'],
						'liqType'=>110,
						//'extfield0'=>$id,
						'extfield0'=>0,
						'extfield1'=>0,
						'info'=>'给下级'.$userData2['username'].'充值扣款金额'
					));	//上级充值成功扣款结束
			$this->addCoin(array(
						'uid'=>$uid,
						'coin'=>$para['coin'],
						'liqType'=>109,
						//'extfield0'=>$id,
						'extfield0'=>0,
						'extfield1'=>0,
						'info'=>'上级'.$userData['username'].'充值金额'
					));	//上级充值结束

		$this->commit();
		echo '充值成功';
		unset($uid2);unset($uid);unset($abc['coin']);unset($def['coin']);unset($userData);unset($userData2);
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
	  }else{ throw new Exception('上级充值功能已经关闭！');}
	}
	
	
	public final function userDoRedeed($uid){
		$this->display('team/redeed-modal.php', 0, $uid);
	}
	
	public final function payRedeed(){
		$para['username'] = $_POST['username'];
		if(strlen($para['username'])>16)throw new Exception('用户名不正确！');
		$para['startTime'] = intval($_POST['startTime']);
		$para['stopTime'] = intval($_POST['stopTime']);
		$para['redAmount'] = abs(floatval($_POST['redAmount']));
		$para['kuisun'] = floatval($_POST['kuisun']);
		if($para['redAmount']<=0) throw new Exception('该用户没有分红需要派发！');
		$usr = $this->getRow("select * from {$this->prename}members where username=?", $para['username']);
		if(!$usr) throw new Exception('找不到该用户');
		$para['uid'] = $usr['uid'];
		$para['puid'] = $this->user['uid'];
		$para['pusername'] = $this->user['username'];
		$para['red'] = $usr['red'];
		$para['from'] = 0;
		try{
			$iam = $this->getRow("select * from {$this->prename}members where uid=?", $this->user['uid']);
			if($para['redAmount'] > $iam['coin'])  throw new Exception('您的余额不足，请充值后再试!');
// 			$this->beginTransaction();
			if($this->insertRow($this->prename .'member_red', $para)){
				$rid=$this->lastInsertId();
				$logx=array(
						'uid'=>$this->user['uid'],
						'info'=>'派发分红扣除',
						'coin'=>-$para['redAmount'],
						'liqType'=>1,
						'extfield0'=>$rid,
						'extfield1'=>'',
						'extfield2'=>''
				);
				$this->addCoin($logx);
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
// 				$this->commit();
				return '分红资金派发成功';
			}else{
				throw new Exception('未知错误');
			}
		}catch(Exception $e){
// 			$this->rollBack();
			throw $e;
		}
	}
}