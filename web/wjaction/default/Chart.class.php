
<?php
class Chart extends WebBase{
	//时时彩类
	public final function ssc($type=1, $count=30){
		if(!intval($type)) throw new Exception("彩种不正确！");
		$this->display('chart/chart_ssc.php', 0, $type, $count);
	}
	
	//十一选五类
	public final function x115($type=1, $count=30){
		if(!intval($type)) throw new Exception("彩种不正确！");
		$this->display('chart/chart_115.php', 0, $type, $count);
	}
	
}

?>