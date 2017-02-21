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

function depositBeforeSubmit(){
	//alert(this.name);
}
function depositList(err, data){
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
		<h3 class="tabs_involved">收益记录
		<form action="/admin778899.php/deposit/depositList" class="submit_link wz" target="ajax" dataType="html" onajax="depositBeforeSubmit" call="depositList">
            会员名：<input type="text" class="alt_btn" style="width:100px;" value="会员名" name="username"/>&nbsp;&nbsp;
			时间：从<input type="date" class="alt_btn" name="fromTime" value="<?=date("Y-m-d",$this->time)?>"/> 到 <input type="date" class="alt_btn" name="toTime"/>&nbsp;&nbsp;
			<input type="submit" value="查找" class="alt_btn">
			<input type="reset" value="重置条件">
		</form><span style="font-weight:normal; margin-left:5px; font-size:12px">*收益时长/1440*收益利率*0.01*余额宝当时存额=余额宝当期收益</span>
		</h3>
	</header>
    
    <div class="tab_content">
    <?php $this->display("deposit/deposit-list.php") ?>
    </div>
    
</article>