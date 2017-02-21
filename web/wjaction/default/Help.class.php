<?php
class Help extends WebLoginBase{
	public $pageSize=15;

	public final function index(){
		$this->display('help/main.php');
	}
	
	public final function wanfa(){
		$this->display('help/wanfa.php');
	}
	
	public final function gongneng(){
		$this->display('help/gongneng.php');
	}
	
	public final function toCashResult(){
		$this->display('cash/cash-result.php');
	}
	
	public final function recharge(){
		$this->display('cash/recharge.php');
	}
	
	public final function rechargeLog(){
		$this->display('cash/recharge-log.php');
	}
}