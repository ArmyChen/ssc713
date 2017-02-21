
<?php 
	$sql="select * from {$this->prename}members where uid=?";
	$userData=$this->getRow($sql, $args[0]);
	
	if($userData['parentId']){
		$parentData=$this->getRow("select fanDian, fanDianBdw from {$this->prename}members where uid=?", $userData['parentId']);
	}else{
		$this->getSystemSettings();
		$parentData['fanDian']=$this->settings['fanDianMax'];
		$parentData['fanDianBdw']=$this->settings['fanDianBdwMax'];
	}
	$sonFanDianMax=$this->getRow("select max(fanDian) sonFanDian, max(fanDianBdw) sonFanDianBdw from {$this->prename}members where isDelete=0 and parentId=?",$args[0]);
	//print_r($parentData);
?>

<div>
<input type="hidden" value="<?=$this->user['username']?>" />
<form action="/admin778899.php/member/userUpdateed" target="ajax" method="post" call="userDataSubmitCode" onajax="userDataBeforeSubmitCode" dataType="html">
	<input type="hidden" name="type" value="<?=$userData['type']?>"/>
	<input type="hidden" name="uid" value="<?=$args[0]?>"/>
      <!--uid  isDelete  enable  parentId 会员从属关系 parents 上级系列 admin  username  coinPassword  type 是否代理：0会员，1代理 subCount 人数配额 sex  nickname  name 用户真实姓名 regIP  regTime  updateTime  province  city  address  password  qq  msn  mobile  email  idCard 身份证号码 grade 等级 score 积分 coin 个人财产 fcoin 冻结资产 fanDian 用户设置的返点数 fanDianBdw 不定位返点 safepwd 交易密码，请区别于登录密码 safeEmail 密保邮箱，与邮箱分开 -->
	<table cellpadding="2" cellspacing="2" class="popupModal">
		<tr>
			<td class="title" width="180">上级关系：</td>
			<td><?=implode('> ',$this->getCol("select username from {$this->prename}members where uid in ({$userData['parents']})"))?></td>
		</tr>
		<tr>
			<td class="title" width="180">用户名：</td>
			<td><lable><?=$userData['username']?></lable></td>
		</tr>
		<tr>
			<td class="title" width="180">会员类型：</td>
			<td><label><input type="radio" value="1" name="type" <?php if($userData['type']) echo 'checked="checked"'?>/>代理</label>&nbsp;&nbsp;<label><input type="radio" value="0" name="type" <?php if(!$userData['type']) echo 'checked="checked"'?>/>会员</label></td>
		</tr>
		<tr>
			<td class="title" width="180">虚拟号：</td>
			<td><label><input type="radio" value="1" name="iv" <?php if($userData['iv']) echo 'checked="checked"'?>/>是</label>&nbsp;&nbsp;<label><input type="radio" value="0" name="iv" <?php if(!$userData['iv']) echo 'checked="checked"'?>/>否</label></td>
		</tr>
		<tr>
			<td class="title" width="180">站内信开关：</td>
			<td><label><input type="radio" value="1" name="mLetterStatus" <?php if($userData['mLetterStatus']) echo 'checked="checked"'?>/>开</label>&nbsp;&nbsp;<label><input type="radio" value="0" name="mLetterStatus" <?php if(!$userData['mLetterStatus']) echo 'checked="checked"'?>/>关</label></td>
		</tr>
		<tr>
			<td class="title" width="180">允许找客服：</td>
			<td><label><input type="radio" value="1" name="kf" <?php if($userData['kf']) echo 'checked="checked"'?>/>允许</label>&nbsp;&nbsp;<label><input type="radio" value="0" name="kf" <?php if(!$userData['kf']) echo 'checked="checked"'?>/>不允许</label></td>
		</tr>
		<tr>
			<td class="title">密码：</td>
			<td><input type="text" name="password" value=""/>&nbsp;<span class="spn9">置空为不修改</span></td>
		</tr>
		<tr>
			<td class="title">资金密码：</td>
			<td><input type="text" name="coinPassword" value=""/>&nbsp;<span class="spn9">置空为不修改</span></td>
		</tr>
		<tr>
			<td class="title">可用金额：</td>
            <td><input type="text" name="coin" value="<?=$userData['coin']?>" />&nbsp;</td>
		</tr>
		<tr>
			<td class="title">冻结金额：</td>
            <td><input type="text" name="fcoin" value="<?=$userData['fcoin']?>" />&nbsp;</td>
		</tr>
		<tr>
			<td class="title">余额宝资金：</td>
            <td><input type="text" name="deposit" value="<?=$userData['deposit']?>" />&nbsp;</td>
		</tr>
		<tr>
			<td class="title">积分：</td>
            <td><input type="text" name="score" value="<?=$userData['score']?>" />&nbsp;</td>
		</tr>
		<tr>
			<td class="title">返点：</td>
			<td><input type="text" name="fanDian" value="<?=$userData['fanDian']?>" max="<?=$parentData['fanDian']?>" min="<?=$sonFanDianMax['sonFanDian']?>" fanDianDiff=<?=$this->settings['fanDianDiff']?> >%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999"><?=$this->ifs($sonFanDianMax['sonFanDian'],'0')?>—<?=$parentData['fanDian']?>%</span></td>
		</tr>
		<tr>
			<td class="title">不定返点：</td>
			<td><input type="text" name="fanDianBdw" value="<?=$userData['fanDianBdw']?>" max="<?=$parentData['fanDianBdw']?>" min="<?=$sonFanDianMax['sonFanDianBdw']?>"/>%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999"><?=$this->ifs($sonFanDianMax['sonFanDianBdw'],'0')?>—<?=$parentData['fanDianBdw']?>%</span></td>
		</tr>
		<tr>
			<td class="title">分红：</td>
			<td><input type="text" name="red" value="<?=$userData['red']?>" max="99" min="0"/>%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999">0—99%</span></td>
		</tr>
		<?php 
			$bk = $this->getRow("select bl.name,mb.* from ssc_member_bank mb, ssc_bank_list bl where mb.uid=? and mb.bankId=bl.id", $userData['uid']);
			if($bk){
		?>
		<tr>
			<td class="title">银行信息：</td>
			<td><label><?=$bk['name'] ?> | <?=$bk['account'] ?> | <?=$bk['username'] ?></label></td>
		</tr>
		<tr>
			<td class="title">重置银行：</td>
			<td><label><input type="radio" name="resetBank" value="1"/>重置</label> <label><input type="radio" name="resetBank" value="" checked />不重置</label></td>
		</tr>
		<?php }else{?>
		<tr>
			<td class="title">银行：</td>
			<td><label>未绑定</label></td>
		</tr>
		<?php } ?>
        <tr>
        	<td class="title">账号冻结：</td>
            <td><label><input type="radio" value="1" name="enable" <?php if($userData['enable']) echo 'checked="checked"'?>/>开启</label>&nbsp;&nbsp;<label><input type="radio" value="0" name="enable" <?php if(!$userData['enable']) echo 'checked="checked"'?>/>冻结</label></td>
        </tr>
		<tr>
        	<td class="title">注册IP：</td>
			<td><label><?=long2ip($userData['regIP'])?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="spn9">判断是否恶意注册小号</span></td>
        </tr>
        <tr>
        	<td class="title">加入时间：</td>
			<td><?=date("Y-m-d H:i:s",$userData['regTime'])?></td>
        </tr>
        <tr>
        	<td class="title">上次分红时间：</td>
			<td><?=date("Y-m-d H:i:s",$userData['lastRedeed'])?></td>
        </tr>
        <?php if($userData['qq']){?>
        <tr>
        	<td class="title">Q Q：</td>
			<td><?=$userData['qq']?></td>
        </tr>
        <?php }?>
	</table>
</form>
</div>