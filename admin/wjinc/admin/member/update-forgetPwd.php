<?php 
	$sql="select m.username as musername,f.* from {$this->prename}forgetpassword f left join {$this->prename}manager m on  f.mId=m.uid where f.id=?";
	$forgetPwdData=$this->getRow($sql, $args[0]);
	$userid=$this->getValue("select uid from {$this->prename}members where username='{$forgetPwdData['username']}'");
?>
<script type="text/javascript">
//重置密码
function forgetPwdBeforeSubmit(){}
function forgetPwdSubmit(err, data){
	if(err){
		error(err);
	}else{
		success("重置密码成功！");
	}
}
</script>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
<header>
		<h3 class="tabs_involved">重置密码申请列表
		<form action="/admin778899.php/member/forgetPwdlist" class="submit_link wz" target="ajax" dataType="html" onajax="forgetPwdBeforeSubmit" call="forgetPwdList">
			申请时间：从<input type="date" class="alt_btn" name="fromTime" /> 到 <input type="date" class="alt_btn" name="toTime" value="<?=date("Y-m-d",$this->time)?>"/>&nbsp;&nbsp;
			<input type="submit" value="查找" class="alt_btn">
			<input type="reset" value="重置条件">
		</form></h3>
	</header>
<form action="/admin778899.php/member/UpdateforgetPwded" target="ajax" method="post" call="forgetPwdSubmit" onajax="forgetPwdBeforeSubmit" dataType="html">
	<table cellpadding="2" cellspacing="2" class="popupModal">
	<input type="hidden" name="id" value="<?=$args[0]?>"/>
	<input type="hidden" name="userid" value="<?=$userid ?>"/> 
		<tr>
			<td class="title" width="180">是否处理：</td>
			<td><?php if($forgetPwdData['flag']==1){
					  echo '<font color="#009900">已处理</font>';
					}else{
					  echo '<font color="#999999">未处理</font>';
					}?></td>
		</tr>
		<tr>
			<td class="title" width="180">编号：</td>
			<td><lable><?=$forgetPwdData['id']?></lable></td>
		</tr>
		<tr>
			<td class="title" width="180">用户名：</td>
			<td><lable><?=$forgetPwdData['username']?></lable>
			<span><?php if(empty($userid)){
					  echo '<font color="red">该用户名不存在！不可自助重置密码！请仔细核对资料！可联系该用户慎重处理！</font>';
					}else{
					  echo "<font color='#009900'>该用户名存在！用户编号为：</font>".$userid;
					}?></span></td>
		</tr>
		<tr>
			<td class="title" width="180">密码：</td>
			<td><lable><?=$forgetPwdData['password']?></lable></td>
		</tr>
		<tr>
			<td class="title" width="180">qq：</td>
			<td><lable><?=$forgetPwdData['qq']?></lable></td>
		</tr>
		<tr>
			<td class="title" width="180">备注内容：</td>
			<td><lable><?=$forgetPwdData['content']?></lable></td>
		</tr>
        <tr>
        	<td class="title">申请时间：</td>
			<td><?=date("Y-m-d H:i:s",$forgetPwdData['actionTime'])?></td>
        </tr>
        <tr>
        	<td class="title">操作人：</td>
			<td><?=$forgetPwdData['musername']?></td>
        </tr>
        <tr>
        	<td class="title">操作时间：</td>
			<td><?=date("Y-m-d H:i:s",$forgetPwdData['mTime'])?></td>
        </tr>
			<?php if(!empty($userid) && $forgetPwdData['flag']==0){ ?>  
        <tr>
        	<td><input type="submit" value="确认通过重置密码" style="margin-left:50px;" class="alt_btn"></td>
			<td><span style="color:red">*请仔细核对申请内容，如可确认为本人，则通过重置默认密码！默认密码为：123456 </span></td>
        </tr>			
		<?php } ?>
	</table>
</form>
</article>