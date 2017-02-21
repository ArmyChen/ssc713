 <?php
	$lastNo=$this->getGameLastNo(14);
	$flag=1;      //开奖按钮
	$kjdata='';  //开奖号码
	$kjtime=date('Y-m-d H:m:s');
?>
<ul><li><?=$lastNo['actionNo']?></li><li><?=$kjdata?></li><li><?=$lastNo['actionTime']?></li><li><?=$flag?></li></ul>