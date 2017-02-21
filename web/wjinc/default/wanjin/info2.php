 <?php
	$actionNo=$this->getGameNo(31);
	$flag=1;      //开奖按钮
	$kjdata='';  //开奖号码
	$kjtime=date('Y-m-d H:m:s');
?>
<ul><li><?=$actionNo['actionNo']?></li><li><?=$kjdata?></li><li><?=$actionNo['actionTime']?></li><li><?=$flag?></li></ul>