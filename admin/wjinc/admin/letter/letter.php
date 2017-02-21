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

function letterBeforeSubmit(){
	//alert(this.name);
}
function letterList(err, data){
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
		<h3 class="tabs_involved">发送列表
		<form action="/admin778899.php/letter/letterList" class="submit_link wz" target="ajax" dataType="html" onajax="letterBeforeSubmit" call="letterList">
            <!--<select name="type">
            <option value="1">所有类型</option>
            <option value="2">发送列表</option>
            <option value="3">接收列表</option>
            </select>&nbsp;&nbsp;-->
			会员名：<input type="text" class="alt_btn" style="width:100px;" value="会员名" name="username"/>&nbsp;&nbsp;
			时间：从<input type="date" class="alt_btn" name="fromTime" /> 到 <input type="date" class="alt_btn" name="toTime" value="<?=date("Y-m-d",$this->time)?>"/>&nbsp;&nbsp;
			<input type="submit" value="查找" class="alt_btn">
			<input type="reset" value="重置条件">
		</form>
		</h3>
	</header>
    
    <div class="tab_content">
    <?php $this->display("letter/letter-list.php") ?>
    </div>
    
</article>