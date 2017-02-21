<!DOCTYPE HTML>
<html>
<head>
<?php 
if($this->type){
	$row=$this->getRow("select enable,title from {$this->prename}type where id={$this->type}");
	if(!$row['enable']){
		echo $row['title'].'已经关闭';
		exit;
	}
}else{
	$this->type=1;
	$this->groupId=2;
	$this->played=10;
}
?>
<?php $this->display('inc_game_lr.php',0,'游戏中心'); ?>
</head> 
<body>
<?php $this->display('index/inc_header.php'); ?>
 <div class="top-bg" style="position:absolute"></div>
<?php $this->display('index/inc_data_current.php'); ?>
 <div class="clear"></div>
<div class="game">
  <div class="gm_con_to" style="background-color:#CCCCCC;">
 <!--投注选号标签开始-->
<?php $this->display('index/inc_game.php'); ?>
   </div>
</div>
<?php $this->display('inc_footer.php'); ?>
<script type="text/javascript">
var game={
	type:<?=json_encode($this->type)?>,
	played:<?=json_encode($this->played)?>,
	groupId:<?=json_encode($this->groupId)?>
},
user="<?=$this->user['username']?>",
aflag=<?=json_encode($this->user['admin']==1)?>;
</script>
</body>
</html>
  
   
 