<?php
/**
*  站内信后台 DAVID 2015-05-05
*/
class Letter extends AdminBase{
	public $pageSize=15;
	
	public final function letterList(){
		$this->display('letter/letter-list.php');
	}
	
	public final function lettermain(){
		$this->display('letter/letter.php');
	}
	
	public final function addlettermain($id){
		$this->display('letter/addlettermain.php',0,$id);
	}
	
	public final function letterInfo($id){
		$this->display('letter/letter-info.php',0,$id);
	}
	
	public final function addgroupletter(){
		if(!$_POST['title']) throw new Exception('请输入需要发送的信息主题！');
		if(!$_POST['content']) throw new Exception('请输入需要发送的信息内容！');
		if(strlen($_POST['title'])==300){throw new Exception('系统检测信息主题过长，请缩短至120字以内！');}
		if(strlen($_POST['content'])==700){throw new Exception('系统检测信息内容过长，请缩短至300字以内！');}
	
		$sql="select uid from {$this->prename}members where isDelete = 0 and enable = 1";
		$list=$this->getrows($sql);
		try {
		    $this->beginTransaction();
		    if($list) foreach($list as $var){
			  $value['aId'] = $var['uid'];
			  $value['sId'] = 0; //0为 系统客服 
			  $value['content'] = $_POST['content'];
			  $value['title'] = $_POST['title'];
			  $value['actionTime']=$this->time;
			  $this->insertRow($this->prename .'letter', $value);				
		    }
			$this->commit();
			return '信息发送成功！';
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
			
	}

	public final function addletter(){
		if(!$_POST['user']) throw new Exception('请选择需要发送的对象：上级代理/下级会员！');
		if(!$_POST['title']) throw new Exception('请输入需要发送的信息主题！');
		if(!$_POST['content']) throw new Exception('请输入需要发送的信息内容！');
		if(strlen($_POST['title'])==300){throw new Exception('系统检测信息主题过长，请缩短至120字以内！');}
		if(strlen($_POST['content'])==700){throw new Exception('系统检测信息内容过长，请缩短至300字以内！');}
		$letter['aId']=intval($_POST['user']);
		$letter['sId']=$this->user['uid'];
		$letter['title']=$_POST['title'];
		$letter['content']=$_POST['content'];
		$letter['actionTime']=$this->time;
		if($this->insertRow($this->prename .'letter', $letter)){
				return '信息发送成功！';
			}else{
				throw new Exception('信息发送失败！请重试或者联系技术员处理！');
			}
	}
}