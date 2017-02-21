<div class="bank-modal">
	<form action="/admin778899.php/business/<?=$args[1] ?>Link<?=$this->iff($args[0],'/'.$args[0],''); ?>" method="post" target="ajax" call="sysReload">
	<?php
		if($args[0]){
			$linkId=intval($args[0]);
			$link=$this->getRow("select * from {$this->prename}links where lid=$linkId");
		}
	?>
		<table class="tablesorter left" cellspacing="0" width="100%">
			<?php if($args[0]){ ?>
				<tr> 
					<td class="title">链接ID</td> 
					<td><input type="text" name="id" disabled value="<?=$args[0] ?>"/></td>
				</tr>
			<?php }?>
			<tr> 
				<td class="title">用户名</td> 
				<td><input type="text" name="username" value="<?=$link['username'] ?>" <?=$this->iff($args[0],'disabled','') ?>/></td>
			</tr>
			<tr> 
				<td class="title">返点</td> 
				<td><input type="text" name="fanDian" value="<?=$this->iff($link['fanDian'], $link['fanDian'], '11.5') ?>"/></td>
			</tr>
			<tr> 
				<td class="title">不定位返点</td> 
				<td><input type="text" name="fanDianBdw" value="<?=$this->iff($link['fanDianBdw'], $link['fanDianBdw'], '3.5') ?>"/></td>
			</tr>
			<tr> 
				<td class="title">状态</td>
				<td>
					<label><input type="radio" value="1" name="enable" <?=$this->iff($link['enable'],'checked','') ?> />开启</label>
					<label><input type="radio" value="0" name="enable" <?=$this->iff($link['enable'],'','checked') ?> />关闭</label>
				</td> 
			</tr> 
			<tr> 
				<td class="title">是否虚拟号</td>
				<td>
					<label><input type="radio" value="1" name="iv" <?=$this->iff($link['iv'],'checked','') ?> />是</label>
					<label><input type="radio" value="0" name="iv" <?=$this->iff(!$link['iv'],'checked','') ?> />否</label>
				</td> 
			</tr> 
			<tr> 
				<td class="title">账号类型</td>
				<td>
					<label><input type="radio" value="1" name="type" <?=$this->iff($link['type'],'checked','') ?> />代理号</label>
					<label><input type="radio" value="0" name="type" <?=$this->iff(!$link['type'],'checked','') ?> />纯会员号</label>
				</td> 
			</tr> 
			<tr> 
				<td class="title">允许找客服</td>
				<td>
					<label><input type="radio" value="1" name="kf" <?=$this->iff($link['kf'],'checked','') ?> />允许</label>
					<label><input type="radio" value="0" name="kf" <?=$this->iff(!$link['kf'],'checked','') ?> />不允许</label>
				</td> 
			</tr>
			<tr> 
				<td class="title">注册赠送金额</td>
				<td><input type="text" name="coin" value="<?=$this->iff($link['coin'], $link['coin'], '0.00') ?>"/></td>
			</tr>
			<?php if($args[0]){ 
				$this->getSystemSettings();
				?>
			<tr> 
				<td class="title">链接添加时间</td>
				<td><?=date('y-m-d H:i', $link['regTime']) ?></td>
			</tr>
			<tr> 
				<td class="title">链接添加IP</td>
				<td><?=long2ip($link['regIP']) ?></td>
			</tr>
			<tr>
	        	<td class="title">注册推广链接：</td>
				<td>
					<?=$this->settings['addr']?>/index.php/user/r/<?=$link['code'] ?>
				</td>
	        </tr>
			<?php }?>
		</table>
	</form>
</div>