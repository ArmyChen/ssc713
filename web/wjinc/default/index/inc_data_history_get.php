<div style="position: absolute; top: 40px; margin-left:-20px;" class="hideleft make_transist" id="nb-box2">
<?php
	$sql="select time, number, data from {$this->prename}data where type={$this->type} order by number desc,time desc limit {$args[0]}";
	if($data=$this->getRows($sql)) foreach($data as $var){
	$udata=explode(",",$var['data']);
 ?>
     <p>第<span class="nb-box-q"><?=$var['number']?></span> 期号码:&nbsp;&nbsp;
	 <?php foreach($udata as $num){ echo "<span class='nb-box-h'>".$num."</span>";} ?>
     </p>
<?php } ?>

</div>