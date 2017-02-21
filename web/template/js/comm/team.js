// 团队中心所需的函数
function reload(){
	location.reload();
}
function teamCopyTip(text){
	if(text){davidOk("复制成功");	}
}
function teamBeforeAddMember(){
	var type=$('[name=type]:checked',this).val();
	if(!this.username.value){davidInfo("没有输入用户名");return false;}
	if(!/^\w{4,16}$/.test(this.username.value)){davidInfo("用户名由4到16位的字母或数字组成");return false;}
	if(!this.password.value){davidInfo("请输入密码");return false;}
	if(this.password.value.length<6){davidInfo("密码至少6位");return false;}
	if(document.getElementById('cpasswd').value!=this.password.value){davidInfo("两次输入密码不一样");return false;}
	if(!this.fanDian.value){davidInfo("请输入返点");return false;}
	if(parseFloat(this.fanDian.value)<0){davidInfo("返点不能小于0%"); return false;}
	if(parseFloat(this.fanDian.value)>parseFloat($(this.fanDian).attr('max'))){davidInfo('返点不能大于'+$(this.fanDian).attr('max')); return false;}
	//if(!this.fanDianBdw.value){davidInfo("请输入不定位返点");return false;}
	if(parseFloat(this.fanDianBdw.value)>parseFloat($(this.fanDianBdw).attr('max'))){davidInfo('不定位返点不能大于'+$(this.fanDianBdw).attr('max')); return false;}
	var fanDianDiff= $(this.fanDian).attr('fanDianDiff');
	if((this.fanDian.value*1000) % (fanDianDiff*1000)){davidInfo('返点只能是'+fanDianDiff+'%的倍数');return false;}
	if((this.fanDianBdw.value*1000) % (fanDianDiff*1000)){davidInfo('不定位返点只能是'+fanDianDiff+'%的倍数');return false;}
}
function teamAddMember(err, data){
	if(err){
		davidError(err);
	}else{
		$('#username').val(this.username.value);
		$('#password').val(this.password.value);
		davidOk(data);
	}
}
function dataAddCode(){
	$('form', this).trigger('submit');
}
function defaultCloseModal(){
	$(this).dialog('destroy');
}
function userDataBeforeSubmitCode(){
	
	if(!this.fanDian.value.match(/^[\d\.\%]{1,4}$/)||!this.fanDianBdw.value.match(/^[\d\.\%]{1,4}$/)) throw('请正确设置返点');
	if(parseFloat(this.fanDian.value)>=parseFloat($(this.fanDian).attr('max'))) throw('返点不能大于或等于'+$(this.fanDian).attr('max'));
	if(parseFloat(this.fanDian.value)<parseFloat($(this.fanDian).attr('min'))) throw('返点不能小于'+$(this.fanDian).attr('min'));
	if(parseFloat(this.fanDian.value)<parseFloat($(this.fanDian).attr('val'))) throw('返点不能小于'+$(this.fanDian).attr('val'));
	if(parseFloat(this.fanDianBdw.value)>parseFloat($(this.fanDianBdw).attr('max'))) throw('不定位返点不能大于'+$(this.fanDianBdw).attr('max'));
	if(parseFloat(this.fanDianBdw.value)<parseFloat($(this.fanDianBdw).attr('min'))) throw('不定位返点不能小于'+$(this.fanDianBdw).attr('min'));
	if(parseFloat(this.fanDianBdw.value)<parseFloat($(this.fanDianBdw).attr('val'))) throw('不定位返点不能小于'+$(this.fanDianBdw).attr('val'));
	var fanDianDiff= $(this.fanDian).attr('fanDianDiff');
	if((this.fanDian.value*1000) % (fanDianDiff*1000)) throw('返点只能是'+fanDianDiff+'%的倍数');
	if((this.fanDianBdw.value*1000) % (fanDianDiff*1000)) throw('不定位返点只能是'+fanDianDiff+'%的倍数');
}
function userDataSubmitCode(err, data){
	if(err){
		davidError(err);
	}else{
		davidOk("修改成功");
		$(this).parent().dialog('destroy');
		reload();
	}
}
function userCoinBeforeSubmitCode(){
	if(this.coin.value<=0) throw('金额必须大于0');
}
function userCoinSubmitCode(err, data){
	if(err){
		davidError(err);
	}else{
		davidOk("转移成功");
		$(this).parent().dialog('destroy');
		location.reload();
	}
}
function teamBeforeAddLink(){
	var type=$('[name=type]:checked',this).val();
	if(!this.fanDian.value) throw('请输入返点');
	if(parseFloat(this.fanDian.value)<0) throw('返点不能小于0%');
	if(parseFloat(this.fanDian.value)>parseFloat($(this.fanDian).attr('max'))) throw('返点不能大于'+$(this.fanDian).attr('max'));
	if(!this.fanDianBdw.value) throw('请输入返点');
	if(parseFloat(this.fanDianBdw.value)>parseFloat($(this.fanDianBdw).attr('max'))) throw('不定位返点不能大于'+$(this.fanDianBdw).attr('max'));
	var fanDianDiff= $(this.fanDian).attr('fanDianDiff');
	if((this.fanDian.value*1000) % (fanDianDiff*1000)) throw('返点只能是'+fanDianDiff+'%的倍数');
	if((this.fanDianBdw.value*1000) % (fanDianDiff*1000)) throw('不定位返点只能是'+fanDianDiff+'%的倍数');
}
function teamAddLink(err, data){
	if(err){
		davidError(err);
	}else{
		davidOk(data);
		this.reset();
		window.location='/index.php?tnt=tll';
	}
}
function linkDataBeforeSubmitCode(){
	if(!this.fanDian.value.match(/^[\d\.\%]{1,4}$/)||!this.fanDianBdw.value.match(/^[\d\.\%]{1,4}$/)) throw('请正确设置返点');
	if(parseFloat(this.fanDian.value)>parseFloat($(this.fanDian).attr('max'))) throw('返点不能大于或等于'+$(this.fanDian).attr('max'));
	if(parseFloat(this.fanDian.value)<parseFloat($(this.fanDian).attr('min'))) throw('返点不能小于'+$(this.fanDian).attr('min'));
	if(parseFloat(this.fanDianBdw.value)>parseFloat($(this.fanDianBdw).attr('max'))) throw('不定位返点不能大于'+$(this.fanDianBdw).attr('max'));
	if(parseFloat(this.fanDianBdw.value)<parseFloat($(this.fanDianBdw).attr('min'))) throw('不定位返点不能小于'+$(this.fanDianBdw).attr('min'));
	var fanDianDiff= $(this.fanDian).attr('fanDianDiff');
	if((this.fanDian.value*1000) % (fanDianDiff*1000)) throw('返点只能是'+fanDianDiff+'%的倍数');
	if((this.fanDianBdw.value*1000) % (fanDianDiff*1000)) throw('不定位返点只能是'+fanDianDiff+'%的倍数');
}
function linkDataSubmitCode(err, data){
	if(err){
		davidError(err);
	}else{
		davidOk("修改成功");
		$(this).parent().dialog('destroy');
		reload();
	}
}
function linkDataBeforeSubmitDelete(){
}
function linkDataSubmitDelete(err, data){
	if(err){
		davidError(err);
	}else{
		davidOk("删除成功");
		$(this).parent().dialog('destroy');
		reload();
	}
}

function sysModal(modalPath, titl, width){
	$.get(SCRIPT_NAME + modalPath, function(html){
		$(html).dialog({
			title: titl,
			width: width,
			buttons:{
				"提交":function(event,ui){
					var $this=$(this);
					$this.find('form').submit();
					$this.dialog("destroy");
				},
				"取消":function(event,ui){
					$(this).dialog("destroy");
				}
			}
		});
	});
}
function sysReload(err, data){ if(err){	davidError(err);}else{ if(data) davidOk(data); reload();}}
function sysReloadQuiet(err, data){ if(err){ AlertDialog(err);}else{ AlertDialogyes(data); reload();}}
