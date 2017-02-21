<?php 
	$sql="select * from {$this->prename}letter where id=?";
	$info=$this->getRow($sql, $args[0]);
	
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
<header><h3 class="tabs_involved">站内信内容</h3></header>
<table>
<tr><td>
		<table class="tablesorter table2" cellspacing="0" width="100%">
			
			<tr>
				<td><span class="aq-txt">主题：</span></td>
				<td align="left"><input type="text" name="title" style="width:550px;" readonly="true" value="<?=$info['title']?>" /></td>
			</tr>
			<tr>
				<td><span class="aq-txt">内容：</span></td>
				<td align="left">
                <textarea rows="14" name="content" id="content" boxid="content" readonly="true" style="width:550px;"><?=$info['content']?></textarea>
                </td>
			</tr>
			<tr>
				<td><span class="aq-txt">发布日期：</span></td>
				<td align="left" style="text-align:left;"><input type="text" name="addTime" readonly="true" style="width:150px;" value="<?=date('Y-m-d', $info['actionTime'])?>" /></td>
			</tr>
		</table>
	</td>
</tr>
</table>
</article>
