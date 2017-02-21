<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header><h3 class="tabs_involved">系统设置</h3></header>
	<form name="system_install" action="/admin778899.php/system/updateSettings" method="post" target="ajax" call="sysSettings" onajax="sysSettingsBefor">
	<table class="tablesorter left" cellspacing="0" width="100%">
		<thead>
			<tr>
				<td width="160" style="text-align:left;">配置项目</td>
				<td style="text-align:left;">配置值</td>
				<td><input type="submit" value="保存修改设置" title="保存设置" onClick="beforeSysSettings()" class="alt_btn"></td>
				<td><input type="button" onclick="load('system/settings')" value="重置" title="重置原来的设置" class="alt_btn" ></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>平台名称</td>
				<td><input type="text" value="<?=$this->settings['webName']?>" name="webName"/></td>
			</tr>
			<tr>
				<td>平台样式包地址</td>
				<td><input type="text" value="<?=$this->settings['templateurl'] ?>" name="templateurl" style="width:400px;"/>（Tmplate文件夹可作为分流）</td>
			</tr>
			<tr>
				<td>网站开关</td>
				<td>
					<label><input type="radio" value="1" name="switchWeb" <?=$this->iff($this->settings['switchWeb'],'checked="checked"')?>/>开启</label>
					<label><input type="radio" value="0" name="switchWeb" <?=$this->iff(!$this->settings['switchWeb'],'checked="checked"')?>/>关闭</label>
				</td>
			</tr>
			<tr>
				<td>网站关闭公告</td>
				<td>
					<textarea name="webCloseServiceResult" cols="80" rows="3"><?=$this->settings['webCloseServiceResult']?></textarea>
				</td>
			</tr>
			<tr>
				<td>网站页脚公告</td>
				<td>
					<textarea name="webFT" cols="80" rows="2"><?=$this->settings['webFT']?></textarea>
				</td>
			</tr>
			<tr>
				<td>网站声音开关</td>
				<td>
					<label><input type="radio" value="0" name="closeVoice" <?=$this->iff(!$this->settings['closeVoice'],'checked="checked"') ?>/>开启</label>
					<label><input type="radio" value="1" name="closeVoice" <?=$this->iff($this->settings['closeVoice'],'checked="checked"') ?>/>关闭</label>
				</td>
			</tr>
            <tr>
				<td>总投注功能开关</td>
				<td>
					<label><input type="radio" value="1" name="switchBuy" <?=$this->iff($this->settings['switchBuy'],'checked="checked"')?>/>开启</label>
					<label><input type="radio" value="0" name="switchBuy" <?=$this->iff(!$this->settings['switchBuy'],'checked="checked"')?>/>关闭</label>
				</td>
			</tr>
			<tr>
				<td>代理投注开关</td>
				<td>
					<label><input type="radio" value="1" name="switchDLBuy" <?=$this->iff($this->settings['switchDLBuy'],'checked="checked"')?>/>开启</label>
					<label><input type="radio" value="0" name="switchDLBuy" <?=$this->iff(!$this->settings['switchDLBuy'],'checked="checked"')?>/>关闭</label>
				</td>
			</tr>
			<tr>
				<td>上级充值开关</td>
				<td>
					<label><input type="radio" value="1" name="recharge" <?=$this->iff($this->settings['recharge'],'checked="checked"')?>/>开启</label>
					<label><input type="radio" value="0" name="recharge" <?=$this->iff(!$this->settings['recharge'],'checked="checked"')?>/>关闭</label>
				</td>
			</tr>
			<tr>
				<td>中奖排行开关</td>
				<td>
					<label><input type="radio" value="1" name="paihang" <?=$this->iff($this->settings['paihang'],'checked="checked"')?>/>开启</label>
					<label><input type="radio" value="0" name="paihang" <?=$this->iff(!$this->settings['paihang'],'checked="checked"')?>/>关闭</label>
				</td>
			</tr>
			<tr>
				<td>投注记录开关</td>
				<td>
					<label><input type="radio" value="1" name="tzjl" <?=$this->iff($this->settings['tzjl'],'checked="checked"')?>/>开启</label>
					<label><input type="radio" value="0" name="tzjl" <?=$this->iff(!$this->settings['tzjl'],'checked="checked"')?>/>关闭</label>
				</td>
			</tr>
			<tr>
				<td>站内信总开关</td>
				<td>
					<label><input type="radio" value="1" name="LetterStatus" <?=$this->iff($this->settings['LetterStatus'],'checked="checked"')?>/>开启</label>
					<label><input type="radio" value="0" name="LetterStatus" <?=$this->iff(!$this->settings['LetterStatus'],'checked="checked"')?>/>关闭</label>
					<span style="margin-left:10px;">*（关闭则不显示编写发送信息按钮  禁言个人可在用户列表里操作修改）</span>
				</td>
			</tr>
			<tr>
				<td>后台充值声音开关</td>
				<td>
					<label><input type="radio" value="1" name="HouTaiCZVoice" <?=$this->iff($this->settings['HouTaiCZVoice'],'checked="checked"')?>/>开启</label>
					<label><input type="radio" value="0" name="HouTaiCZVoice" <?=$this->iff(!$this->settings['HouTaiCZVoice'],'checked="checked"')?>/>关闭</label>
				</td>
			</tr>
			<tr>
				<td>后台提现声音开关</td>
				<td>
					<label><input type="radio" value="1" name="HouTaiTXVoice" <?=$this->iff($this->settings['HouTaiTXVoice'],'checked="checked"')?>/>开启</label>
					<label><input type="radio" value="0" name="HouTaiTXVoice" <?=$this->iff(!$this->settings['HouTaiTXVoice'],'checked="checked"')?>/>关闭</label>
				</td>
			</tr>
			<tr>
				<td>投注模式</td>
				<td>
					<label><input type="checkbox" name="modeY" id="modeY" <?=$this->iff($this->settings['modeY'],'checked')?>/>元</label>
					<label><input type="checkbox" name="modeJ" id="modeJ" <?=$this->iff($this->settings['modeJ'],'checked')?>/>角</label>
					<label><input type="checkbox" name="modeF" id="modeF" <?=$this->iff($this->settings['modeF'],'checked')?>/>分</label>
					<label><input type="checkbox" name="modeL" id="modeL" <?=$this->iff($this->settings['modeL'],'checked')?>/>厘</label>
					<br />
				</td>
			</tr>
			<tr>
				<td>前台密码错误</td>
				<td>前台登录密码错误次数超过<input type="text" value="<?=$this->settings['loginErrorNum'] ?>" style="width:50px; text-align:center" name="loginErrorNum"/>次，系统将自动冻结<input type="text" value="<?=$this->settings['loginErrorTime'] ?>" style="width:50px; text-align:center" name="loginErrorTime"/>分钟！（*该功能防止恶意撞库登录！）</td>
			</tr>
			<tr>
				<td>余额宝存款利率</td>
				<td>
					<label>收益计算一：<input type="text" class="textWid1" name="deposittime1"  value="<?=$this->settings['deposittime1']?>" style="width:60px;"/>（分钟）为0时，则关闭余额宝收益&nbsp;&nbsp;
					   收益利率：<input type="text" class="textWid1" name="depositll1"  value="<?=$this->settings['depositll1']?>" style="width:60px"/>%&nbsp;&nbsp;</label>
					   <br /><br />
					   <label>收益计算二：<input type="text" class="textWid1" name="deposittime2"  value="<?=$this->settings['deposittime2']?>" style="width:60px;"/>（分钟）&nbsp;&nbsp;
					   收益利率：<input type="text" class="textWid1" name="depositll2"  value="<?=$this->settings['depositll2']?>" style="width:60px"/>%&nbsp;&nbsp;</label>
					   <br /><br />
					   <label>收益计算三：<input type="text" class="textWid1" name="deposittime3"  value="<?=$this->settings['deposittime3']?>" style="width:60px;"/>（分钟）&nbsp;&nbsp;
					   收益利率：<input type="text" class="textWid1" name="depositll3"  value="<?=$this->settings['depositll3']?>" style="width:60px"/>%&nbsp;&nbsp;</label>
				</td>
			</tr>
			<tr>
				<td>签到赠送</td>
                <td>
                	  会员每日签到赠送购彩金：<input type="text" class="textWid1" value="<?=$this->settings['huoDongSign']?>" name="huoDongSign"/><span style="margin-left:10px;">*设置为0则关闭该功能</span>
                </td>
			</tr>
			<tr style="display:none">
				<td>注册赠送活动</td>
                <td>
                	  新注册会员，赠送会员购彩金：<input type="text" class="textWid1" value="<?=$this->settings['huoDongRegister']?>" name="huoDongRegister"/>元，彩金在绑定完收款方式后赠送到账！<span style="margin-left:10px;">*设置为0则关闭该功能</span>
                </td>
			</tr>
			<tr>
				<td>消费赠送开关</td>
				<td>
					<label><input type="radio" value="1" name="consumeGift" <?=$this->iff($this->settings['consumeGift'],'checked="checked"') ?>/>赠送</label>
					<label><input type="radio" value="0" name="consumeGift" <?=$this->iff(!$this->settings['consumeGift'],'checked="checked"') ?>/>不赠送</label>
				</td>
			</tr>
			<tr>
				<td>消费赠送标准</td>
				<td>消费<input type="text" value="<?=$this->settings['consumeTarget'] ?>" name="consumeTarget"/>元达标后，赠送<input type="text" value="<?=$this->settings['consumeLargess'] ?>" name="consumeLargess"/>元</td>
			</tr>
			<tr>
				<td>五分、两分、分分彩利润</td>
				<td><input type="text" class="textWid1" value="<?=$this->settings['LiRunLv']?>" name="LiRunLv"/>%&nbsp;&nbsp;&nbsp;&nbsp; 1-10%&nbsp;&nbsp;&nbsp;&nbsp; 1%已经不会亏了，设置过高将导致当期筛选号码困难而超时不开奖</td>
			</tr>
			<tr>
				<td>会员上榜最低中奖金额</td>
                <td>
                	  会员最低中奖：<input type="text" class="textWid1" value="<?=$this->settings['sbje']?>" name="sbje"/>元才能上榜，如果为0则所有中奖都上榜
                </td>
			</tr>
			<tr>
				<td>虚拟上榜会员昵称</td>
				<td>
					<textarea name="paihangsjnr" cols="56" rows="3"><?=$this->settings['paihangsjnr']?></textarea>&nbsp&nbsp&nbsp*最好不少于20个，请用"|"隔开，用于参合到真实数据中
				</td>
			</tr>
			<tr>
				<td>虚拟上榜中奖金额</td>
				<td>
					<textarea name="paihangsjje" cols="56" rows="3"><?=$this->settings['paihangsjje']?></textarea>&nbsp&nbsp&nbsp*最好不少于20个，请用"|"隔开，用于参合到真实数据中
				</td>
			</tr>
			<tr>
				<td>最大返点限制</td>
				<td>
                	  元模式：<input type="text" class="textWid1" value="<?=$this->settings['betModeMaxFanDian0']?>" name="betModeMaxFanDian0"/>%
                	　角模式：<input type="text" class="textWid1" value="<?=$this->settings['betModeMaxFanDian1']?>" name="betModeMaxFanDian1"/>%
                	　分模式：<input type="text" class="textWid1" value="<?=$this->settings['betModeMaxFanDian2']?>" name="betModeMaxFanDian2"/>%
                </td>
			</tr>
			<tr>
				<td>最大投注限制</td>
				<td>
                	  最大注数：<input type="text" class="textWid1" value="<?=$this->settings['betMaxCount']?>" name="betMaxCount"/>注
                	　最大中奖：<input type="text" class="textWid1" value="<?=$this->settings['betMaxZjAmount']?>" name="betMaxZjAmount"/>元
                </td>
			</tr>
			<tr>
				<td>充值限制</td>
				<td>
                	最低金额：<input type="text" class="textWid1" value="<?=$this->settings['rechargeMin']?>" name="rechargeMin"/>元&nbsp;&nbsp; 
                    最高金额：<input type="text" class="textWid1" value="<?=$this->settings['rechargeMax']?>" name="rechargeMax"/>元
                    <br /><br />
                	支付宝/财付通：最低金额 <input type="text" class="textWid1" value="<?=$this->settings['rechargeMin1']?>" name="rechargeMin1"/>元&nbsp;&nbsp;最高金额 <input type="text" class="textWid1" value="<?=$this->settings['rechargeMax1']?>" name="rechargeMax1"/>元&nbsp;&nbsp;
                    
                </td>
			</tr>
			<tr>
				<td>提现限制</td>
				<td>
                	消费满：<input type="text" class="textWid1" value="<?=$this->settings['cashMinAmount']?>" name="cashMinAmount"/>%&nbsp;&nbsp;
					最低金额：<input type="text" class="textWid1" value="<?=$this->settings['cashMin']?>" name="cashMin"/>元&nbsp;&nbsp;
					最高金额：<input type="text" class="textWid1" value="<?=$this->settings['cashMax']?>" name="cashMax"/>元&nbsp;&nbsp;
					时间段： 从 <input type="time" value="<?=$this->settings['cashFromTime']?>" name="cashFromTime" class="textWid1"/> 到 <input type="time" value="<?=$this->settings['cashToTime']?>" name="cashToTime" class="textWid1"/>
                    &nbsp&nbsp 00:00-23:59<br /><br />
                	支付宝/财付通：最低金额 <input type="text" class="textWid1" value="<?=$this->settings['cashMin1']?>" name="cashMin1"/>元&nbsp;&nbsp;最高金额 <input type="text" class="textWid1" value="<?=$this->settings['cashMax1']?>" name="cashMax1"/>元&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td>清理账号规则</td>
				<td>账户金额低于&nbsp;<input type="text" class="textWid1" value="<?=$this->settings['clearMemberCoin']?>" name="clearMemberCoin" id="clearMemberCoin"/>元，&nbsp;且&nbsp;<input type="text" class="textWid1" value="<?=$this->settings['clearMemberDate']?>" name="clearMemberDate" id="clearMemberDate"/> &nbsp;天未登录&nbsp;&nbsp;<a method="post" target="ajax" onajax="clearUsersBefor" call="clearDataSuccess" title="数据清除不可修复，是否继续！" dataType="json" id="alt_btn3" href="/admin778899.php/System/clearUser">清理</a></td>
			</tr>
			<tr>
				<td>清理数据</td>
				<td>清除当前 <input type="date" readonly="readonly" id="clearData" /> 以前的投注、帐变、管理员日志、会员登录日志、提现、充值、采集记录数据&nbsp;&nbsp;<a method="post" target="ajax" onajax="clearDataBefor" call="clearDataSuccess" title="数据清除不可修复，是否继续！" dataType="json" id="alt_btn3" href="/admin778899.php/System/clearData">清理</a></td>
			</tr>
			<tr>
				<td>清理数据 2</td>
				<td>仅清除当前 <input type="date" readonly="readonly" id="clearData2" /> 以前的采集记录数据&nbsp;&nbsp;<a method="post" target="ajax" onajax="clearDataBefor2" call="clearDataSuccess2" title="采集记录数据清除不可修复，是否继续！" dataType="json" id="alt_btn3" href="/admin778899.php/System/clearData2">清理</a></td>
			</tr>
			<tr>
				<td>充值佣金 活动</td>
				<td>每个会员每天累计充值<input class="textWid1" type="text" value="<?=$this->settings['rechargeCommissionAmount']?>" name="rechargeCommissionAmount"/>元以上，上家送<input type="text" class="textWid1" value="<?=$this->settings['rechargeCommission']?>" name="rechargeCommission"/>元佣金，上上家送<input class="textWid1" type="text" value="<?=$this->settings['rechargeCommission2']?>" name="rechargeCommission2"/>元佣金，达标自动到账，关闭请全部填0</td>
			</tr>
			<tr>
				<td>消费佣金 活动</td>
				<td><p>每个会员每天消费达<input class="textWid1" type="text" value="<?=$this->settings['conCommissionBase']?>" name="conCommissionBase"/>元时，上家送<input  class="textWid1"type="text" value="<?=$this->settings['conCommissionParentAmount']?>" name="conCommissionParentAmount"/>元佣金，上上家送<input  class="textWid1"type="text" value="<?=$this->settings['conCommissionParentAmount2']?>" name="conCommissionParentAmount2"/>元佣金，达标自动到账，关闭请全部填0</p></td>
			</tr>
			<tr>
				<td>返点最大值</td>
				<td><input type="text" class="textWid1" value="<?=$this->settings['fanDianMax']?>" name="fanDianMax"/>% &nbsp;&nbsp;不定位返点最大值<input type="text" class="textWid1" value="<?=$this->settings['fanDianBdwMax']?>" name="fanDianBdwMax"/>%</td>
			</tr>
			<tr>
				<td>上下级返点最小差值</td>
				<td><input type="text" class="textWid1" value="<?=$this->settings['fanDianDiff']?>" name="fanDianDiff"/>%</td>
			</tr>
			<tr>
				<td>积分比例</td>
				<td>
					<input type="text" class="textWid1" value="<?=$this->settings['scoreProp']?>" name="scoreProp"/> 每消费1元积的分数
				</td>
			</tr>
			<tr>
				<td>积分规则</td>
				<td>
					<textarea name="scoreRule" cols="56" rows="2"><?=$this->settings['scoreRule']?></textarea>
				</td>
			</tr>
            <tr>
				<td>客服状态</td>
				<td>
					<label><input type="radio" value="1" name="kefuStatus" <?=$this->iff($this->settings['kefuStatus'],'checked="checked"')?>/>开启</label>
					<label><input type="radio" value="0" name="kefuStatus" <?=$this->iff(!$this->settings['kefuStatus'],'checked="checked"')?>/>关闭</label>

				</td>
			</tr>
			<tr>
				<td>客服链接</td>
				<td>
					<textarea name="kefuGG" cols="56" rows="3"><?=$this->settings['kefuGG']?></textarea>
				</td>
			</tr>
		</tbody>
	</table>
	<footer>
		<div class="submit_link">
			<input type="submit" value="保存修改设置" title="保存设置" onClick="beforeSysSettings()" class="alt_btn">&nbsp;&nbsp;
			<input type="button" onclick="load('system/settings')" value="重置" title="重置原来的设置" >
		</div>
	</footer>
	</form>
</article>