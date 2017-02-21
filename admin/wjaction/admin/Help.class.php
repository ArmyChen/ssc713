<?php
/**
*  帮助模块 DAVID 2015-05-15  (该功能夭折)
*/
class Help extends AdminBase{
	
	public final function tab_1(){ //常见问题
		$this->display('help/tab_1.php');
	}
	
	public final function tab_2(){ //在线充值说明
		$this->display('help/tab_2.php');
	}
	
	public final function tab_3(){ //平台提现说明
		$this->display('help/tab_3.php');
	}
	
	public final function tab_4(){ //在线客服说明
		$this->display('help/tab_4.php');
	}
	
	public final function tab_5(){ //免责声明
		$this->display('help/tab_5.php');
	}
	
	public final function tab_1_add(){ //添加常见问题
		try{
		   $sql="UPDATE {$this->prename}problem set content='{$_POST['editor1']}' where id=1"; //常见问题
		   $this->update($sql);
		   return "添加常见问题列表内容成功！";
		}catch(Exception $e){
		   throw $e;
		}		
	}
	
	public final function tab_2_add(){ //添加在线充值说明
		try{
		   $sql="UPDATE {$this->prename}problem set content='{$_POST['editor1']}' where id=2"; //在线充值说明
		   $this->update($sql);
		   return "添加在线充值说明内容成功！";
		}catch(Exception $e){
		   throw $e;
		}
	}
}