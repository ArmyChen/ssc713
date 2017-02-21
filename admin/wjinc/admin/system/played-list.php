<?php
	if(!$args[0]) $args[0]=1;		// 默认查看时时彩玩法
	
	$chiTypes = $this->getTypes();
	$groups=$this->getRows("select * from {$this->prename}played_group where type=? order by sort",$args[0]);
	$sql="select * from {$this->prename}played where type=? and groupId=? order by sort";
// 	$sql="select * from {$this->prename}played where groupId=? order by sort";
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header>
		<h3 class="tabs_involved">玩法设置
			<ul class="tabs" style="margin-right:25px;">
			<?php
				foreach($chiTypes as $key=>$var){ 
					if($var['enable']){
			?>
				<li <?=$this->iff($args[0]==$key, 'class="active"')?>><a href="system/played/<?=$key?>"><?=$var['title'] ?></a></li>
			<?php } } ?>
			</ul>
		</h3>
	</header>
	<?php 
	if($groups) foreach($groups as $group){ 
		$select = '<select name="groupId">';
		foreach($groups as $grp){
			if($group['id'] == $grp['id']){
				$s =" selected";
			}else{
				$s="";
			}
			$select.='<option value="'.$grp['id'].'"'.$s.'>'.$grp['groupName'].'</option>';
		}
		$select .= '</select>';
	?>
	
		
	
	<table class="tablesorter" cellspacing="0">
		<thead>
			<tr>
				<th colspan="10" style="text-align:left;">
                	
					<span style="float:right; margin-right:20px"><a href="/admin778899.php/system/switchPlayedGroupStatus/<?=$group['id']?>" target="ajax" call="reloadPlayed"><?=$this->iff($group['enable'],'关闭','开启')?></a></span>
					<?=$group['groupName']?>&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="spn1">[状态：<span class="state1"><?=$this->iff($group['enable'],'开启','关闭')?></span>]</span>
                    
				</th>
			</tr>
		</thead>
		<tbody>
		<?php if($playeds=$this->getRows($sql, array($args[0], $group['id']))) foreach($playeds as $played){ ?>
			<tr>
				<td width="8%"><?=$played['name']?></td>
				<td width="12%">最高奖金：<input type="text" class="textWid1" name="bonusProp" value="<?=$played['bonusProp']?>"></td>
				<td width="12%">最低奖金：<input type="text" class="textWid1" name="bonusPropBase" value="<?=$played['bonusPropBase']?>"></td>
                <td width="8%">总注数：<?=$played['maxCount']?></td>
                <td width="13%">最高投注：<input type="text" class="textWid1" name="maxBet" value="<?=$played['maxBet']?>">注</td>
                <td width="13%">最低消费：<input type="text" class="textWid1" name="minAmount" value="<?=$played['minAmount']?>">元</td>
                <td width="10%">排序：<input type="text" class="textWid1" name="sort" value="<?=$played['sort']?>"></td>
                <td width="10%">分组：<?=$select?></td>
				<td width="4%"><span class="state2"><?=$this->iff($played['enable'], '开启', '关闭')?></span></td>
				<td><a href="/admin778899.php/system/switchPlayedStatus/<?=$played['id']?>" target="ajax" call="reloadPlayed"><?=$this->iff($played['enable'], '关闭', '开启')?></a> | <a href="/admin778899.php/system/updatePlayed/<?=$played['id']?>" target="ajax" method="post" onajax="sysBeforeUpdatePlayed" call="reloadPlayed">保存修改</a> | <a href="/admin778899.php/system/betPlayedInfoUpdate/<?=$played['id']?>" button="修改:dataAddCode|取消:defaultCloseModal" title="修改信息" width="510" target="modal" modal="true">修改信息</a></td>
			</tr>
		<?php }else{ ?>
			<tr>
				<td colspan="10">暂时没有玩法</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<?php }else{ ?>
		暂时没有玩法
	<?php } ?>
</article>