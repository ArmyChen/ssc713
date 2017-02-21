<div class="card-modal">
	<form action="/admin778899.php/Score/<?=$args[1] ?>Activity<?=$this->iff($args[0],'/'.$args[0],'') ?>" method="post" target="ajax" call="sysReload">
	<?php 
		if($args[0]){
			$aId=intval($args[0]);
			$act=$this->getRow("select * from {$this->prename}activity where id=$aId");
		}
	?>
		<table class="tablesorter left" cellspacing="0" width="100%">
			<?php if($args[0]){ ?>
				<tr>
					<td class="title">ID</td>
					<td><input type="text" name="id" disabled value="<?=$args[0] ?>"/></td>
				</tr>
			<?php }?>
			<tr>
	            <td class="title">活动名称</td>
	            <td><input type="text" name="name" value="<?=$act['name']?>"/></td>
	        </tr>
	        <tr>
	            <td class="title">活动介绍</td>
	            <td><textarea rows="4" name="des"><?=$act['des']?></textarea></td>
	        </tr>
	        
	        <tr>
	            <td class="title">时间</td>
	            <td>从 <input type="date"  name="start" style="width:75px;" value="<?php if($act['start']){echo date('Ymd',$act['start']);}else{echo date('Ymd',$this->time); }?>"/>
	            	到  <input type="date" name="stop" style="width:75px;" value="<?php if($act['stop']){echo date('Ymd',$act['stop']);}else{echo '0';}?>"/>
	            	<span class="spn6">格式：20150101，0为永不过期</span>
	            </td>
	        </tr>
	        <tr>
	            <td class="title">状态</td>
	            <td>
	                <label><input type="radio" value="1" name="enable" <?php if($act["enable"]==1){?>checked='checked'<?php }?>/>开启</label>
	                <label><input type="radio" value="0" name="enable" <?php if($act["enable"]==0){?>checked='checked'<?php }?>/>关闭</label>
	            </td>
	        <tr>
		</table>
	</form>
</div>