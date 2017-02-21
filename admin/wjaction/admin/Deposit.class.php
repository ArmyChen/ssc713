<?php
/**
*  余额宝后台 DAVID 2015-05-05
*/
class Deposit extends AdminBase{
	public $pageSize=15;
	
	public final function depositList(){
		$this->display('deposit/deposit-list.php');
	}
	
	public final function depositmain(){
		$this->display('deposit/deposit.php');
	}
}