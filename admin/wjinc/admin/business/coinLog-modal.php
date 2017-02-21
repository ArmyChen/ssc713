<table cellpadding="0" cellspacing="0" width="320" class="layout">
	<tr>
		<th>用户名：</th>
		<td><input type="text" name="username" min="100"/></td>
	</tr>
	<tr>
		<th>帐变金额：</th>
		<td><input type="text" name="amount" min="100" /><span style="color:#F00">负数为扣款！</span></td>
	</tr>
	<tr>
		<th>info：</th>
		<td><input type="text" name="info" min="100"/><span style="color:#F00">变账描述</span></td>
	</tr>
	<tr>
		<th>边账类型：</th>
		<td>
			<select name="liqType">        
				<option value="9">管理员充值</option>
				<option value="44">系统扣款</option>
				<option value="55">系统加款</option>
				<option value="88">充值赠送</option>
				<option value="188">注册赠送</option>
				<option value="189">绑定银行卡赠送</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>extfield0：</th>
		<td><input type="text" name="extfield0" min="100"/><span style="color:#F00">默认为空！</span></td>
	</tr>
	<tr>
		<th>extfield1：</th>
		<td><input type="text" name="extfield1" min="100"/><span style="color:#F00">默认为空！</span></td>
	</tr>
	<tr>
		<th>extfield2：</th>
		<td><input type="text" name="extfield2" min="100"/><span style="color:#F00">默认为空！</span></td>
	</tr>
</table>