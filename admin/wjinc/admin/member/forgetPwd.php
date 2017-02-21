<script type="text/javascript">
$(function(){
	$('.tabs_involved input[name=username]')
	.focus(function(){
		if(this.value=='会员名') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='会员名';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});
	
});

function forgetPwdBeforeSubmit(){
	//alert(this.name);
}
function forgetPwdList(err, data){
	if(err){
		alert(err);
	}else{
		$('.tab_content').html(data);
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
		</form>
		</h3>
	</header>
    <div class="tab_content">
    <?php $this->display("member/forgetPwd-list.php") ?>
    </div>
</article>