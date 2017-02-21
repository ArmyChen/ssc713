<?php
	if($list=$this->getGameNos($this->type, $args[1]))
	foreach($list as $var){
?>
<tr>
	<td><input type="checkbox" name="zhcheckbox" />
	<td><span class="zhactionNo"><?=$var['actionNo']?></span></td>
	<td><input type="text" class="zhbeishu" value="1" style="width:25px; height:25px; line-height:25px; text-align:center"/></td>
	<td><span class="zhamount"><?=$_GET['mode']?></span>元<input type="hidden" value="<?=$_GET['mode']?>" id="zhamount" /></td>
	<td><span class="zhactionTime"><?=date('Y-m-d H:i:s', $var['actionTime'])?></span></td>
</tr>
<?php } ?>

