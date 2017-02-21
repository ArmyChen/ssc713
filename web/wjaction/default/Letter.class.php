<?php

/**
*  UPDATE 2015-05 DAVID 站内信
*/
class Letter extends WebLoginBase{
	public $pageSize=15;
	

	//站内信主页
	public final function main(){
		$this->display('safe/letter-main.php');
	}
	
	//站内信搜索列表
	public final function searchLetter(){
		$this->display('safe/letter-search-list.php');
	}
	
	//站内信详细页面
	public final function letterInfo($id){
		$this->display('safe/letter-Info.php',0,intval($id));
	}
	
	//站内信页面
	public final function addLetterMain(){
		$this->display('safe/addLetter-Main.php');
	}
	
	//站内信编写
	public final function addLetter(){
		if(!$_POST['user']) throw new Exception('请选择需要发送的对象：上级代理/下级会员！');
		if(!$_POST['title']) throw new Exception('请输入需要发送的信息主题！');
		if(!$_POST['content']) throw new Exception('请输入需要发送的信息内容！');
		if(strlen($_POST['title'])==300) throw new Exception('系统检测信息主题过长，请缩短至120字以内！'); 
		if(strlen($_POST['content'])==700) throw new Exception('系统检测信息内容过长，请缩短至300字以内！'); 
		$letter['aId']=intval($_POST['user']);
		$letter['sId']=$this->user['uid'];
		$letter['title']=$_POST['title'];
		$letter['content']=$_POST['content'];
		$letter['actionTime']=$this->time;
		try{
		  $this->insertRow($this->prename .'letter', $letter);
		}catch(Exception $e){
		  throw new Exception("信息发送失败！请联系在线客服处理！");
		}
		  return "信息发送成功！";
	}
	
}