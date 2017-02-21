<?php
class Report extends WebLoginBase{
	public $type;
	public $pageSize=15;
	
	// �ʱ��б�
	public final function coin($type=0){
		$this->type=intval($type);
		$this->action='coinlog';
		$this->display('report/coin.php');
	}
	
	public final function coinlog($type=0){
		$this->type=intval($type);
		$this->display('report/coin-log.php');
	}

	// �ܽ����ѯ
	public final function count(){
		$this->action='countSearch';
		$this->display('report/count.php');
	}
	
	public final function countSearch(){
		$this->display('report/count-list.php');
	}
}
