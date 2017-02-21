//显示投注信息

function showBetInfo(id) {
	$.get('/index.php?tnt=rbi&id=' + id, function(data) {
		ds.dialog({
			title: '投注信息',
			content: data,
			onyes: true,
			icon: "success.png",
			yesText: '关闭',
			onyes: function() {
				$(this).dialog("destroy");
				return false;
			},
		});
/*
	  $(data).dialog({
			title:'投注信息',
			width:500,
			buttons:{
				"关闭":function(){
					$(this).dialog("destroy");
				}
			}
		});	
		 */
	});
}
//购彩等待进度条

function wait() {
	$('<img src="/template/images/common/wait.gif" />').modal({
		modal: true,
		escClose: false,
		overlayCss: {
			background: '#000'
		},
		dataCss: {
			padding: '0px',
			margin: '0px'
		}
	});
}

function destroyWait() {
	$.modal.close();
}

function defaultModalCloase(event, ui) {
	$(this).dialog('destroy');
}

function dataAddCode() {
	$('form', this).trigger('submit');
}

//开奖时间函数
var T, S, KT, KS;

function gameKanJiangDataC(diffTime, actionNo) {
	var $dom = $('#count_down');
	var thisNo = $('.kj-title span').html();
	var tips = '本期[' + thisNo + ']已截至投注';
	if (diffTime <= 0) {

		if ($('#kaijiang .feipan')) $('#kaijiang .feipan em').html("X");
		$dom.text('00:00:00');
		$('#kaijiang .wjtips').html('正在封单中');

		$('#btnPostBet').unbind('click');
		$('#btnPostBet').bind('click', function() {
			davidInfo(tips);
		});
		ds.dialog({
			title: '即将开奖',
			content: "第&nbsp" + thisNo + "&nbsp期投注已截止！<br />清空预投注内容请点击[确定]，不刷新则点击[取消]。",
			yesText: '确定',
			timeout: 3,
			onyes: function() {
				gameActionRemoveCode();
				$('#gamezhuihao').hide(); //隐藏追号模块
				this.close();
			},
			noText: '取消',
			onno: function() {
				$('#gamezhuihao').hide(); //隐藏追号模块
				this.close();
			},
			icon: "question.gif",
		}); //DAVID dialog end 
		S = false;
		KS = true;
		if (KT) clearTimeout(KT);
		$('.gm_con span.last_issues').text($('.kj-title span').text());
		setKJWaiting(kjTime); //1234
		getQiHao();
	} else {
		if (actionNo) $dom.prev().find('span').html(actionNo);
		var m = Math.floor(diffTime % 60),
			s = (diffTime---m) / 60,
			h = 0;
		if (s < 10) {
			s = "0" + s;
		}
		if (m < 10) {
			m = "0" + m;
		}
		if (s > 60) {
			h = Math.floor(s / 60);
			s = s - h * 60;
			$dom.text((h < 10 ? "0" + h : h) + ":" + (s < 10 ? "0" + s : s) + ":" + m);
		} else {
			h = 0;
			$dom.text("00:" + s + ":" + m);
		}
		if (S && h == 0 && m == 6 && s == 0) {
			playVoice('/template/sound/stop-time.wav', 'stop-time-voice');
		}
		if (h == 0 && m == 0 && s == 0) {
			loadKjData();
		} else {
			if ($.browser.msie) {
				T = setTimeout(function() {
					gameKanJiangDataC(diffTime);
				}, 1000);
			} else {
				T = setTimeout(gameKanJiangDataC, 1000, diffTime);
			}
		}
	}
}

function setKJWaiting(kjDiffTime) {
	var $dom = $('#kaijiang .kjtips');
	$('#kaijiang #kjsay').show();
	$('.wjkjData ul').hide();
	$('.wjkjData p').show();
	var mm = Math.floor(kjDiffTime % 60),
		ss = (kjDiffTime---mm) / 60;
	if (ss < 10) {
		ss = "0" + ss;
	}
	if (mm < 10) {
		mm = "0" + mm;
	}
	if (ss > 60) {
		hh = Math.floor(ss / 60);
		ss = ss - hh * 60;
		$dom.text((hh < 10 ? "0" + hh : hh) + ":" + ss + ":" + mm);
	} else {
		$dom.text(ss + ":" + mm);
	}
	if (Math.floor(mm) == 0 && Math.floor(ss) == 0) {
		getQiHao();
		setKjing();
		loadKjData();
		//wjDialog.dialog( "close" );
		KS = false;
	} else {
		if ($.browser.msie) {
			KT = setTimeout(function() {
				setKJWaiting(kjDiffTime);
			}, 1000);
		} else {
			KT = setTimeout(setKJWaiting, 1000, kjDiffTime);
		}
	}
}
//获取期号

function getQiHao() {
	$.getJSON('/index.php?tnt=igqh&type=' + game.type, function(data) {
		if (data && data.lastNo && data.thisNo) {
			$('#kaijiang .wjtips').html('正在销售中');
			$('#btnPostBet').unbind('click');
			$('#btnPostBet').bind('click', gamePostCode);
			$('.kj-title span').html(data.thisNo.actionNo);
			$('#current_endtime').html(data.validTime);
			$('.gm_con span.last_issues').html(data.lastNo.actionNo);
			S = true;
			if (T) clearTimeout(T);
			kjTime = parseInt(data.kjdTime);
			gameKanJiangDataC(data.diffTime - kjTime, data.thisNo.actionNo);
			loadKjData();
		}
	});
}

//设置开奖状态
var moveno;

function setKjing() {
	if (!KS) {
		$('#kaijiang #kjsay').html('<em class="kjtips">正在开奖中</em>');
		$('#kaijiang #kjsay').show();
		$('.wjkjData p').hide();
		$('.wjkjData ul').show();
	}
	var ctype = $('.kj-hao').attr('ctype');
	var cnum = $('.kj-hao').attr('cnum'),
		num;
	cnum = parseInt(cnum);
	$(".kj-hao").find("li").attr("flag", "move");
	if (ctype == 'g1') {
		moveno = window.setInterval(function() {
			$.each($(".kj-hao").find("li"), function(i, n) {
				if ($(this).attr("flag") == "move") {
					num = Math.floor((cnum - 1) * Math.random() + 1);
					if (num < 10) num = '0' + num;
					$(this).html(num);
				}
			})
		}, 40);
	} else if (ctype == 'g3') { //11选5
		moveno = window.setInterval(function() {
			$.each($(".kj-hao").find("li"), function(i, n) {
				if ($(this).attr("flag") == "move") {
					$(this).attr("class", "gr_s gr_s0" + Math.floor(8 * Math.random() + 1));
				}
			})
		}, 40);
	} else {
		moveno = window.setInterval(function() {
			$.each($(".kj-hao").find("li"), function(i, n) {
				if ($(this).attr("flag") == "move") {
					$(this).attr("class", "gr_s gr_s" + Math.floor(10 * Math.random()));
				}
			})
		}, 40);
	}
}

function setKjing1(i, str) {
	$(".kj-hao li:eq(" + i + ")").attr("class", str);
}

//加载开奖数据

function loadKjData() {
	var type = $('#kaijiang').attr('type');
	$.ajax('/index.php?tnt=igld&type=' + type, {
		dataType: 'json',
		cache: false,
		error: function() {
			setTimeout(loadKjData, 5000);

		},
		success: function(data, textStatus, xhr) {
			if (!data) {
				setKjing();
				setTimeout(loadKjData, 5000);
			} else {
				try {
					var $dom = $('#kaijiang'),
						$kjHaoS, $feipan, hao;

					if (parseInt(type) == 24) { //快8
						$kjHaoS = data.data.split('|');
						hao = $kjHaoS[0].split(',');
						$feipan = $kjHaoS[1];
					} else {
						hao = data.data.split(',');
					}
					$('.gm_con span.last_issues').html(data.actionNo);
					var ctype = $('.kj-hao').attr('ctype');
					var times = 3000;
					if (ctype == 'g1') {
						$('.kj-hao li').each(function(i) {
							$(this).html(hao[i]);
						});
						if ($dom.find('.feipan')) $dom.find('.feipan').html("快乐飞盘：<em>" + $feipan + "</em>");
					} else if (ctype == 'g2') { //快3
						$('.kj-hao li').each(function(i) {
							times -= 500;
							setTimeout("setKjing1(" + i + ",'gr_ks gr_ks" + hao[i] + "')", times);
						});
					} else {
						$('.kj-hao li').each(function(i) {
							times -= 500;
							setTimeout("setKjing1(" + i + ",'gr_s gr_s" + hao[i] + "')", times);
						});
					}
					reloadMemberInfo();
					freshKaiJiangData(game.type);
					gameFreshOrdered();
					getYKTip(game.type, data.actionNo)
					$('#btnPostBet').unbind('click');
					$('#btnPostBet').bind('click', gamePostCode);
					if ((typeof $('#wanjinDialog').dialog("isOpen") == 'object') || $('#wanjinDialog').dialog('isOpen')) {
						$('#wanjinDialog').dialog('close');
					}
					S = true;
					if (T) clearTimeout(T);
					KS = true;
					if (KT) clearTimeout(KT);
					kjTime = parseInt(data.kjdTime);
					gameKanJiangDataC(data.diffTime - parseInt(kjTime), data.thisNo);
					$('#kaijiang #kjsay').hide();
					$('#kaijiang #kjsay').html('开奖倒计时：<em class="kjtips">00:00</em>');
					$('.wjkjData p').hide();
					$('.wjkjData ul').show();
					$(".kj-hao").find("li").attr("flag", "normal");
					if (moveno) clearInterval(moveno);
					playVoice('/template/sound/kai-jiang.wav', 'kai-jian-voice');
				} catch (err) {
					setTimeout(loadKjData, 5000);
				}
			}
		}
	});
}

//加载开奖历史记录

function freshKaiJiangData(type) {
	$('#nb-box2').load('/index.php?tnt=ighd&type=' + type);
}

//获取系统提示

function getYKTip(type, actionNo) {
	if (type && actionNo) {
		$.getJSON('/index.php?tnt=tgy&type=' + type + '&ctionNo=' + actionNo, function(tip) {
			if (tip) {
				$("<div>").append(tip.message).dialog({
					position: ['right', 'bottom'],
					minHeight: 40,
					title: '系统提示',
					buttons: ''
				});
			}
		})
	}
}

function dataAddCode() {
	$('form', this).trigger('submit');
}

function defaultCloseModal() {
	$(this).dialog('destroy');
}

//选择投注号码

function uniqueSelect(parent) {
	var $this = $(this),
		$unique = parent.closest('.unique'),
		fun = function(i, c) {
			return $('input.code.checked[value=' + this.value + ']').length ? '' : 'checked';
		};
	if ($this.is('.all')) {
		$('input.code', parent).addClass(fun);
	} else if ($this.is('.large')) {
		$('input.code.max', parent).addClass(fun);
		$('input.code.min', parent).removeClass('checked');
	} else if ($this.is('.small')) {
		$('input.code.min', parent).addClass(fun);
		$('input.code.max', parent).removeClass('checked');
	} else if ($this.is('.odd')) {
		$('input.code.d', parent).addClass(fun);
		$('input.code.s', parent).removeClass('checked');
	} else if ($this.is('.even')) {
		$('input.code.s', parent).addClass(fun);
		$('input.code.d', parent).removeClass('checked');
	} else if ($this.is('.none')) {
		$('input.code', parent).removeClass('checked');
	}
}

function reload() {
	location.reload();
}

//随机号码
function randomSelectCode(len, codes) {
	var i, selectCode = [],
		codesLen = codes.length;
	for (i = 0; i < len; i++) {
		selectCode[i] = Math.floor(Math.random() * codesLen);
	}
	return selectCode;
}
//清除追号框内容
function clearzhdata() {
	$('#lt_trace_count').html(0);
	$('#lt_trace_beishu').html(0);
	$('#lt_trace_hmoney').html(0);
	$('.zhui-hao-modal thead :checkbox').attr('checked', false); //取消全选选择框
}

//取消追号
function btnquxiaozhuihao() {
	$('#lt_trace_if').removeData()[0].checked = false;
	gameCalcAmount();
	clearzhdata();
	$('#gamezhuihao').hide();
}

//确认追号
function btnquerenzhuihao() {
	var data = [];
	$('.zhui-hao-modal tbody :checkbox:checked').each(function() {
		var $this = $(this),
			$tr = $this.closest('tr');
		data.push([$('.zhactionNo', $tr).html(), $('.zhbeishu', $tr).val(), $('.zhactionTime', $tr).html()].join('|'));
	});

	if (!data.length) {
		davidInfo('确认追号至少选择一期注单！');
		return false;
	}
	$('#lt_trace_if').data({
		zhuiHao: data.join(';'),
		zhuiHaoMode: $(':checkbox[id=lt_trace_stop]')[0].checked ? 1 : 0
	})[0].checked = true;

	gameCalcAmount();
	clearzhdata();
	$('#gamezhuihao').hide(); //隐藏追号模块
}

//追号功能（DAVID UPDATE 2015-05-09）
function setGameZhuiHao(data) {
	var $this = $(this);
	price = Math.round(data.mode * data.actionNum * 100) / 100;
	$.get('/index.php?tnt=izhq&type=' + data.type + '&mode=' + price + '&count=', function(data) {
		$("#zhuihaolist").html(data);
	});
};

function displayCodeList(opts) {
	//DAVID dialog 
	ds.dialog({
		title: '投注号码',
		content: "<textarea style='width:300px' disabled='disabled'>" + opts.actionData + "</textarea>",
		onyes: true,
	});
}
//选择方案的提示信息
function gameMsgAutoTip() {
	var obj, $game = $('#num-select .pp'),
		calcFun = $game.attr('action');
	if (calcFun && (calcFun = window[calcFun]) && (typeof calcFun == 'function')) {
		try {
			obj = calcFun.call($game);
			if ($.isArray(obj)) {
				o = {
					actionNum: 0
				};
				obj.forEach(function(v, i) {
					o.actionNum += v.actionNum;
				});
				obj = o;
			}
			$('#game-tip-dom').text('共 ' + obj.actionNum + ' 注，金额 ' + (gameGetMode() * gameGetBeiShu() * obj.actionNum).round(2) + ' 元');
		} catch (err) {
			$('#game-tip-dom').text(err);
		}
	}
}
$(function() {
	$(':radio[name=danwei]').live("click", function() {
		var value = $(this).val();
		if ($(this).attr("checked")) {
			$.cookie('mode', value, {
				expires: 7,
				path: '/'
			});
		}
	})
	$('#slider').live("mouseover", function() {
		$.cookie('fanDian', gameGetFanDian(), {
			expires: 7,
			path: '/'
		});
	})
	$('.changebg a').live("click", function() {
		var img = $(this).attr("rel");
		$.cookie('pagepg', img, {
			expires: 7,
			path: '/'
		});
		location.reload();
		return false;
	})

})

function gameActionRemoveCode(isSelected) {
	$('.touzhu-cont tr').remove();
	$('.touzhu-bottom :checkbox[name=zhuiHao]').removeData()[0].checked = false;
	gameCalcAmount();
}

//添加投注方法 
function gameAddCode(code) {
	wait();
	var actionNo = $.parseJSON($.ajax('/index.php?tnt=gcb', {
		async: false
	}).responseText);
	destroyWait();
	if (actionNo) {
		davidInfo('本期投注已截止，请下一期再投注');
		return false;
	}
	if ($.isArray(code)) {
		for (var i = 0; i < code.length; i++) gameAddCode(code[i]);
		return;
	}
	if (code.actionNum == 0) throw ('号码不正确');
	try {
		code = $.extend({
			fanDian: gameGetFanDian(),
			bonusProp: gameGetPl(code),
			mode: gameGetMode(),
			beiShu: gameGetBeiShu(),
			orderId: (new Date()) - 2147483647 * 623
		}, code);
		var weiShu = 0,
			wei = '',
			modeName = {
				'2': '元',
				'0.2': '角',
				'0.02': '分'
			},
			amount = code.mode * code.beiShu * code.actionNum,
			$wei = $('#wei-shu'),
			playedName = code.playedName || $('.game-cont .current').text(),
			weiCount = parseInt($wei.attr('length'));
		if (code.playedName) delete code.playedName;
		delete code.isZ6;
		if ($wei.length) {
			if ($(':checked', $wei).length != weiCount) throw ('请选择' + weiCount + '位数！');
			$(':checked', $wei).each(function() {
				weiShu |= parseInt(this.value);
			});
		}
		code.weiShu = weiShu;
		if (weiShu) {
			var w = {
				16: '万',
				8: '千',
				4: '百',
				2: '十',
				1: '个'
			}
			for (var p in w) {
				if (weiShu & p) wei += w[p];
			}
			wei += ':';
		}
		$('#num-select input:hidden').each(function() {
			code[$(this).attr('name')] = this.value;
		});
		delete code.undefined;
		$('<tr>').data('code', code).append(
		$('<td>').append(playedName)).append(
		$('<td class="code-list">').append(wei + (code.actionData.length > 18 ? (code.actionData.substr(0, 5) + '...') : code.actionData))).append(
		$('<td>').data('value', code.actionNum).append('[' + code.actionNum + '注]')).append(
		$('<td>').data('value', amount).append(amount.round(2) + "元")).append(
		$('<td>').append(code.beiShu + '倍')).append(
		$('<td>').append(modeName[code.mode])).append(
		$('<td>').append('奖－返：' + parseFloat(code.bonusProp).round(2) + '-' + parseFloat(code.fanDian).round(1) + '%')).append(
		$('<td><div class="del"></div></td>')).appendTo('.touzhu-cont table');
		$('#textarea-code').val("");
		gameCalcAmount();
		$('.tz-buytype :checkbox[name=zhuiHao]').removeData()[0].checked = false;
		$('.num-table :button.checked').removeClass('checked');
	} catch (err) {
		davidError(err);
	}
}
//确定投注函数 已过滤

function gamePostCode() {
	var code = [],
		zhuiHao, data = {};
	$('.touzhu-cont tr').each(function() {
		code.push($(this).data('code'));
	});
	if (code == "") {
		davidInfo('您还未添加预投注');
		return false;
	}
	$('.touzhu-bottom :checkbox:checked').each(function() {
		data[$(this).attr('name')] = this.value;
	});
	if ($(':checkbox[name=zhuiHao]')[0].checked) {
		var $dom = $(':checkbox[name=zhuiHao]');
		zhuiHao = $dom.data('zhuiHao');
		data.zhuiHao = 1;
		data.zhuiHaoMode = $dom.data('zhuiHaoMode');
	}
	wait();
	var actionNo = $.parseJSON($.ajax('/index.php?tnt=ggn&type=' + game.type, {
		async: false
	}).responseText);
	destroyWait();
	if (!actionNo) {
		davidInfo('获取投注期号出错');
		return false;
	}
	//DAVID dialog
	var tipString = "<div style='width:450px;'>确定要购买第&nbsp;&nbsp;<b>" + actionNo['actionNo'] + "</b>&nbsp;&nbsp;期彩票？";
	tipString += '<br /><div style="overflow-x:auto;overflow-y:auto;height:300px;"><table width="100%"><thead><tr><th>玩法</th><th>号码</th><th>注数</th><th>倍数</th><th>模式</th></tr></thead>';
	$('.touzhu-cont tr').each(function() {
		var $this = $(this);
		tipString += "<tbody><tr><td>" + $('td:eq(0)', $this).text() + "</td><td class='code-list'>" + $('td:eq(1)', $this).text() + "</td><td>" + $('td:eq(2)', $this).data('value') + "</td><td>" + $('td:eq(4)', $this).text() + "</td><td>" + $('td:eq(5)', $this).text() + "</td></tr>";
	});
	tipString += '</tbody></table></div>';
	tipString += '<br />' + $('.tz-tongji').html();
	ds.dialog({
		title: '投注提示',
		content: tipString,
		yesText: '确定',
		onyes: function() {
			this.close();
			data['type'] = game.type;
			data['actionNo'] = actionNo.actionNo;
			data['kjTime'] = actionNo.actionTime;
			wait();
			$.ajax('/index.php?tnt=gpc', {
				data: {
					code: code,
					para: data,
					zhuiHao: zhuiHao
				},
				type: 'post',
				dataType: 'json',
				error: function(xhr, textStatus, errorThrown) {
					gamePostedCode(errorThrown || textStatus);
				},
				success: function(data, textStatus, xhr) {
					gamePostedCode(null, data);
					if (data) davidOk(data);
				},
				complete: function(xhr, textStatus) {
					destroyWait();
					var errorMessage = xhr.getResponseHeader('X-Error-Message');
					if (errorMessage) gamePostedCode(decodeURIComponent(errorMessage));
				}
			});
		},
		noText: '取消',
		onno: function() {
			this.close();
		},
		icon: "question.gif",
	});
}
//确定购买提交数据

function gamePostedCode(err, data) {
	if (err) {
		if ('您的可用资金不足，是否充值？' == err) {
			if (window.confirm(err)) location = '/index.php?tnt=cr';
		} else {
			davidInfo(err);
		}
	} else {
		gameActionRemoveCode();
		gameFreshOrdered();
		reloadMemberInfo();
		gameCalcAmount();
		$('#game-tip-dom').text('');
		//reload();
	}
}
//计算方案金额

function gameCalcAmount() {
	var count = 0;
	fpcount = 1;
	amount = 0.0, $zhuiHao = $(':checkbox[name=zhuiHao]'), $feipan = $(':checkbox[name=fpEnable]');
	if ($feipan.prop('checked')) fpcount = 2;
	if ($zhuiHao.prop('checked')) {
		var data = $('.touzhu-cont tr').data('code');
		$zhuiHao.data('zhuiHao').split(';').forEach(function(v) {
			count += parseInt(v.split('|')[1]);
		});
		amount = data.mode * data.actionNum * count * fpcount;
	} else {
		$('.touzhu-cont tr').each(function() {
			var $this = $(this);
			count += $('td:eq(2)', $this).data('value');
			amount += $('td:eq(3)', $this).data('value') * fpcount;
		});
	}
	$('#all-count').text(count);
	$('#all-amount').text(amount.round(2));

}
//添加号码函数

function gameActionAddCode() {
	if ($('#wjdl')) {
		if (parseInt($('#wjdl').val()) > 0) {
			davidInfo('代理不能买单');
			return false;
		}
	}
	var modeName = {
		'2.00': '元',
		'0.20': '角',
		'0.02': '分'
	},
		$mode = $(':radio:checked[name=danwei]'),
		$slider = $('#slider'),
		fanDian = gameGetFanDian(),
		modeFanDian = $mode.data().maxFanDian,
		userFanDian = $slider.attr('fan-dian'),
		mode = $mode.val();
	if (userFanDian - fanDian > modeFanDian) {
		var pl = $('#fandian-value').data(),
			_amount = (pl.maxpl - pl.minpl) / $slider.attr('game-fan-dian') * modeFanDian + (pl.minpl - 0);
		davidInfo(modeName[mode] + '模式最大奖金只能为' + _amount.toFixed(2));
		return false;
	}
	var maxZjAmount = $slider.data().betZjAmount;
	if (maxZjAmount) {
		if ($('#fandian-value').data('pl') * mode / 2 * ($('#beishu').val() || 1) > maxZjAmount) {
			davidInfo('单笔中奖奖金不能超过' + maxZjAmount + '元');
			return false;
		}
	}
	var obj, $game = $('#num-select .pp'),
		calcFun = $game.attr('action');
	if (calcFun && (calcFun = window[calcFun]) && (typeof calcFun == 'function')) {
		try {
			obj = calcFun.call($game);
			var maxBetCount = $slider.data().betCount;
			if (maxBetCount && obj.actionNum > maxBetCount) {
				davidInfo('单笔投注注数最大不能超过' + maxBetCount + '注');
				return false;
			}
			if (typeof obj != 'object') {
				throw ('未知出错');
			} else {
				gameAddCode(obj);
				$game.find('input.action').removeClass('on');
			}
		} catch (err) {
			davidError(err);
		}
	}
}
//撤单函数

function confirmCancel() {
	var obj = $(this);
	ds.dialog({
		title: '系统提示',
		content: "是否确定撤单？",
		icon: "question.gif",
		yesText: '确定',
		onyes: function() {
			obj.attr("onajax", "");
			obj.click();
			this.close();
		},
		noText: '取消',
		onno: function() {
			this.close();
		}
	});
	return false;
}
//刷新投注页订单信息

function gameFreshOrdered(err, msg) {
	if (err) {
		davidInfo(err);
	} else {
		$('#order-history').load('/index.php?tnt=ggo&type=' + game.type, reloadMemberInfo);
	}
}
//设置返点

function gameSetFanDian(value) {
	var $dom = $("#fandian-value"),
		gameFanDian = parseFloat($('#slider').attr('game-fan-dian')),
		myFanDian = parseFloat($('#slider').attr('fan-dian')),
		pl = parseFloat($dom.data('maxpl')),
		minPl = parseFloat($dom.data('minpl')),
		str = (pl - minPl) / gameFanDian * myFanDian + minPl - (pl - minPl) * value / gameFanDian;
	str = str.round(2);
	if (pl == minPl) {
		$('.fandian-box').hide();
		$dom.data('pl', str);
		str += '';
		$dom.text(str);
	} else {
		$('.fandian-box').show();
		$dom.data('pl', str);
		str += '/' + value.round(1) + '%';
		$dom.text(str);
	}
}
var FANDIAN = 0;

function gameSetPl(value, flag, fanDianBdw) {
	var $dom = $('#slider');
	$('#fandian-value').data('maxpl', value.bonusProp);
	$('#fandian-value').data('minpl', value.bonusPropBase);
	var $slider = $('#slider').closest('.fandian-box');
	if (flag) {
		$('.fandian-k').css('visibility', 'hidden');
	} else {
		$('.fandian-k').css('visibility', 'visible');
	}
	if (fanDianBdw) {
		gameSetFanDian(fanDianBdw);
	} else {
		FANDIAN = FANDIAN || gameGetFanDian();
		gameSetFanDian(FANDIAN);
	}
}

function gameGetFanDian() {
	return $('#slider').slider('option', 'value');
}

function gameGetPl(code) {
	var $dom = $('#num-select .pp');
	if ($dom.is('[action=tzSscHhzxInput]')) {
		if (code.isZ6) {
			var set = {
				bonusProp: parseFloat($dom.attr('z6max')),
				bonusPropBase: parseFloat($dom.attr('z6min'))
			};
		} else {
			var set = {
				bonusProp: parseFloat($dom.attr('z3max')),
				bonusPropBase: parseFloat($dom.attr('z3min'))
			};
		}
		gameSetPl(set, true);
	}
	return $('#fandian-value').data('pl');
}

function gameGetMode() {
	return parseFloat($('#game-dom :radio[name=danwei]:checked').val() || 1);
}

function gameGetBeiShu() {
	var txt = $('#beishu').val();
	if (!txt) return 1;
	var re = /^[1-9][0-9]*$/;
	if (!re.test(txt)) {
		throw ('倍数只能为大于1正整数');
		$('#beishu').val(1);
	}
	if (isNaN(txt = parseInt(txt))) throw ('倍数设置不正确');
	return txt;
}

function DescartesAlgorithm() {
	var i, j, a = [],
		b = [],
		c = [];
	if (arguments.length == 1) {
		if (!$.isArray(arguments[0])) {
			return [arguments[0]];
		} else {
			return arguments[0];
		}
	}
	if (arguments.length > 2) {
		for (i = 0; i < arguments.length - 1; i++) a[i] = arguments[i];
		b = arguments[i];
		return arguments.callee(arguments.callee.apply(null, a), b);
	}
	if ($.isArray(arguments[0])) {
		a = arguments[0];
	} else {
		a = [arguments[0]];
	}
	if ($.isArray(arguments[1])) {
		b = arguments[1];
	} else {
		b = [arguments[1]];
	}
	for (i = 0; i < a.length; i++) {
		for (j = 0; j < b.length; j++) {
			if ($.isArray(a[i])) {
				c.push(a[i].concat(b[j]));
			} else {
				c.push([a[i], b[j]]);
			}
		}
	}
	return c;
}
//begin***************************************************************************************************************************
//彩种玩法、算法  DAVID 2015-04-09

/* 组合算法*/

function combine(arr, num) {
	var r = [];
	(function f(t, a, n) {
		if (n == 0) return r.push(t);
		for (var i = 0, l = a.length; i <= l - n; i++) {
			f(t.concat(a[i]), a.slice(i + 1), n - 1);
		}
	})([], arr, num);
	return r;
} /* 排列算法*/

function permutation(arr, num) {
	var r = [];
	(function f(t, a, n) {
		if (n == 0) return r.push(t);
		for (var i = 0, l = a.length; i < l; i++) {
			f(t.concat(a[i]), a.slice(0, i).concat(a.slice(i + 1)), n - 1);
		}
	})([], arr, num);
	return r;
}

function gameLoadZnzPage(type) {
	$('.game-left.img-bj').load('/index.php/index/znz/' + type);
}
//计算注数算法集

function tzAllSelect() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length')),
		delimiter = this.attr('delimiter') || "";
	if (this.has('.checked').length != codeLen) throw ('请选' + codeLen + '位数字');
	this.each(function(i) {
		var $code = $('input.code.checked', this);
		if ($code.length == 0) {
			code[i] = '-';
		} else {
			len *= $code.length;
			code[i] = [];
			$code.each(function() {
				code[i].push(this.value);
			});
			code[i] = code[i].join(delimiter);
		}
	});
	return {
		actionData: code.join(','),
		actionNum: len
	};
} /* 排列组选2  除去对子和豹子*/

function tzDesAlgorSelect() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length')),
		delimiter = this.attr('delimiter') || "";
	if (this.has('.checked').length != codeLen) throw ('请选' + codeLen + '位数字');
	this.each(function(i) {
		var $code = $('input.code.checked', this);
		if ($code.length == 0) {
			code[i] = '-';
		} else {
			code[i] = [];
			$code.each(function() {
				code[i].push(this.value);
			});
			code[i] = code[i].join(delimiter);
		}
	});
	code = code.join(',');
	len = DescartesAlgorithm.apply(null, code.split(",").map(function(v) {
		return v.split(delimiter)
	})).map(function(v) {
		return v.join(',');
	}).filter(function(v) {
		return (!isRepeat(v.split(",")))
	}).length;
	return {
		actionData: code,
		actionNum: len
	};
}

function isRepeat(arr) {
	var hash = {};
	for (var i in arr) {
		if (hash[arr[i]]) return true;
		hash[arr[i]] = true;
	}
	return false;
} /*大小单双选号*/

function tzDXDS() {
	var code = [],
		len = 1,
		codeLen = 2;
	if (this.has('.checked').length != codeLen) throw ('请选' + codeLen + '位数字');
	this.each(function(i) {
		var $code = $('input.code.checked', this);
		if ($code.length == 0) {
			code[i] = '-';
		} else {
			len *= $code.length;
			code[i] = [];
			$code.each(function() {
				code[i].push(this.value);
			});
			code[i] = code[i].join("");

		}
	});
	return {
		actionData: code.join(','),
		actionNum: len
	};
} /*大小单双选号*/

function tzDXDSq3h3() {
	var code = [],
		len = 1,
		codeLen = 3;
	if (this.has('.checked').length != codeLen) throw ('请选' + codeLen + '位数字');
	this.each(function(i) {
		var $code = $('input.code.checked', this);
		if ($code.length == 0) {
			code[i] = '-';
		} else {
			len *= $code.length;
			code[i] = [];
			$code.each(function() {
				code[i].push(this.value);
			});
			code[i] = code[i].join("");
		}
	});
	return {
		actionData: code.join(','),
		actionNum: len
	};
} /*趣味选号*/

function qwwf() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	if (this.has('.checked').length != codeLen) throw ('请选' + codeLen + '位数字');
	this.each(function(i) {
		var $code = $('input.code.checked', this);
		if ($code.length == 0) {
			code[i] = '-';
		} else {
			len *= $code.length;
			code[i] = [];
			$code.each(function() {
				code[i].push(this.value);
			});
			code[i] = code[i].join("");
		}
	});
	return {
		actionData: code.join(','),
		actionNum: len
	};
} /*五星定位胆选号*/

function tz5xDwei() {
	var code = [],
		len = 0,
		delimiter = this.attr('delimiter') || "";
	this.each(function(i) {
		var $code = $('input.code.checked', this);
		if ($code.length == 0) {
			code[i] = '-';
		} else {
			len += $code.length;
			code[i] = [];
			$code.each(function() {
				code[i].push(this.value);
			});
			code[i] = code[i].join(delimiter);
		}
	});
	if (!len) throw ('至少选一个号码');
	return {
		actionData: code.join(','),
		actionNum: len
	};
} /*不定胆选号*/

function tz5xBDwei() {
	var code = "",
		len = 0,
		$code = $('input.code.checked', this);
	len = $code.length;
	if (!len) throw ('至少选一个号码');
	$code.each(function() {
		code += this.value;
	});
	return {
		actionData: code,
		actionNum: len
	};
} /* 时时彩录入式投注*/

function tzSscInput() {
	var codeLen = parseInt(this.attr('length')),
		codes = [],
		str = $('#textarea-code', this).val().replace(/[^\d]/g, '');
	if (str.length && str.length % codeLen == 0) {
		if (/[^\d]/.test(str)) throw ('投注有错，不能有数字以外的字符。');
		codes = codes.concat(str.match(new RegExp('\\d{' + codeLen + '}', 'g')));
	} else {
		throw ('输入号码不正确');
	}
	codes = codes.map(function(code) {
		return code.split("").join(',')
	});
	return {
		actionData: codes.join('|'),
		actionNum: codes.length
	}
}

/*11选5录入式投注*/

function tz11x5Input() {
	var codeLen = parseInt(this.attr('length')) * 2,
		codes = [],
		ncode, str = $('#textarea-code', this).val().replace(/[^\d]/g, '');
	if (str.length && str.length % codeLen == 0) {
		if (/[^\d]/.test(str)) throw ('投注有错，不能有数字以外的字符。');
		codes = codes.concat(str.match(new RegExp('\\d{' + codeLen + '}', 'g')));
	} else {
		throw ('输入号码不正确');
	}
	codes = codes.map(function(code) {
		code = code.split("");
		ncode = "";
		code.forEach(function(v, i) {
			if (i % 2 == 0 && ncode) {
				ncode += "," + v;
			} else {
				ncode += v;
			}
		});
		return ncode;
	});
	return {
		actionData: codes.join('|'),
		actionNum: codes.length
	}
}

function tz11x5Inputrxds() {
	var codeLen = parseInt(this.attr('length')) * 2,
		codes = [],
		str = $('#textarea-code', this).val().replace(/[^\d]/g, ''),
		str2 = str;
	str2 = strCut(str2, 2);
	var info = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11'];
	if (isRepeat(str2)) throw ('号码有重复，请重新输入!');
	if (str.length < codeLen) throw ('至少输入' + parseInt(this.attr('length')) + '个号!');
	if (str.length && str.length / codeLen == 1) {
		if (/[^\d]/.test(str)) throw ('投注有错，不能有数字以外的字符!');
		for (var j = 0; j < str2.length; j++) {
			if (info.indexOf(str2[j]) == -1) throw ('号码输入有误，请重新输入!');
		}
		codes = codes.concat(str.match(new RegExp('\\d{' + codeLen + '}', 'g')));
	} else {
		len = 0;
	}
	len = codes.length;
	return {
		actionData: codes.join('|'),
		actionNum: len
	}
} /*时时彩录入式组选投注*/

function tzSscZuInput() {
	var codeLen = parseInt(this.attr('length')),
		codes = [];
	$('#textarea-code', this).val().split(/[\r\n]/).forEach(function(str) {
		if (str.length && str.length % codeLen == 0) {
			if (/[^\d]/.test(str)) throw ('投注有错，不能有数字以外的字符。');
			codes = codes.concat(str.match(new RegExp('\\d{' + codeLen + '}', 'g')));
		} else {
			throw ('输入号码不正确');
		}
	});
	codes.forEach(function(code) {
		if ((new RegExp("^(\\d)\\1{" + (codeLen - 1) + "}$")).test(code)) throw ('组选不能为豹子');
	});
	codes = codes.map(function(code) {
		return code.split("").join(',')
	});
	return {
		actionData: codes.join('|'),
		actionNum: codes.length
	}
} /*时时彩录入式选位数投注*/

function tzSscWeiInput() {
	var codeLen = parseInt(this.attr('length')),
		codes = [],
		weiShu = [],
		str = $('#textarea-code', this).val().replace(/[^\d]/g, '');
	if ($('#wei-shu :checked', this).length != codeLen) throw ('请选' + codeLen + '位数');
	$('#wei-shu :checkbox', this).each(function(i) {
		if (!this.checked) weiShu.push(i);
	});
	if (str.length && str.length % codeLen == 0) {
		if (/[^\d]/.test(str)) throw ('投注有错，不能有数字以外的字符。');
		codes = codes.concat(str.match(new RegExp('\\d{' + codeLen + '}', 'g')));
	} else {
		throw ('输入号码不正确');
	}
	codes = codes.map(function(code) {
		code = code.split("");
		weiShu.forEach(function(v, i) {
			code.splice(v, 0, '-');
		});
		return code.join(',');
	});
	return {
		actionData: codes.join('|'),
		actionNum: codes.length
	}
} /*11选5录入式选位数投注*/

function tz11x5WeiInput() {
	var codeLen = parseInt(this.attr('length')),
		codes = [],
		weiShu = [],
		ncode, str = $('#textarea-code', this).val().replace(/[^\d]/g, '');
	if ($('#wei-shu :checked', this).length != codeLen) throw ('请选' + codeLen + '位数');
	$('#wei-shu :checkbox', this).each(function(i) {
		if (!this.checked) weiShu.push(i);
	});
	codeLen *= 2;
	if (str.length && str.length % codeLen == 0) {
		if (/[^\d]/.test(str)) throw ('投注有错，不能有数字以外的字符。');
		codes = codes.concat(str.match(new RegExp('\\d{' + codeLen + '}', 'g')));
	} else {
		throw ('输入号码不正确');
	}
	codes = codes.map(function(code) {
		code = code.split("");
		ncode = "";
		code.forEach(function(v, i) {
			if (i % 2 == 0 && ncode) {
				ncode += "," + v;
			} else {
				ncode += v;
			}
		});
		ncode = ncode.split(",");
		weiShu.forEach(function(v, i) {
			ncode.splice(v, 0, '-');
		});
		return ncode;
	});
	return {
		actionData: codes.join('|'),
		actionNum: codes.length
	}
} /*时时彩录入式组选位数投注*/

function tzSscZuWeiInput() {
	var codeLen = parseInt(this.attr('length')),
		codes = [],
		weiShu = [],
		str = $('#textarea-code', this).val().replace(/[^\d]/g, '');
	if ($('#wei-shu :checked', this).length != codeLen) throw ('请选' + codeLen + '位数');
	$('#wei-shu :checkbox', this).each(function(i) {
		if (!this.checked) weiShu.push(i);
	});
	if (str.length && str.length % codeLen == 0) {
		if (/[^\d]/.test(str)) throw ('投注有错，不能有数字以外的字符。');
		codes = codes.concat(str.match(new RegExp('\\d{' + codeLen + '}', 'g')));
	} else {
		throw ('输入号码不正确');
	}
	codes.forEach(function(code) {
		if ((new RegExp("^(\\d)\\1{" + (codeLen - 1) + "}$")).test(code)) throw ('组选不能为豹子');
	});
	codes = codes.map(function(code) {
		code = code.split("");
		weiShu.forEach(function(v, i) {
			code.splice(v, 0, '-');
		});
		return code.join(',');
	});
	return {
		actionData: codes.join('|'),
		actionNum: codes.length
	};
} /*组合组选*/

function tzCombineSelect() {
	var codeLen = parseInt(this.attr('length')),
		codes = '',
		$select = $('.checked'),
		len;
	if ($select.length < codeLen) throw ('请选' + codeLen + '位数');
	$select.each(function() {
		codes += this.value;
	});
	len = combine(codes.split(""), codeLen).length;
	return {
		actionData: codes,
		actionNum: len
	};
} /*组合组选2*/

function tzCombineSelect2() {
	var codeLen = parseInt(this.attr('length')),
		codes = '',
		$select = $('.checked'),
		len, fangan = $('#positioninfo').html();
	if ($select.length < codeLen) throw ('请选' + codeLen + '位数');
	$select.each(function() {
		codes += this.value;
	});
	len = combine(codes.split(""), codeLen).length * fangan;
	return {
		actionData: codes,
		actionNum: len
	};
} /*排列组选*/

function tzPermutationSelect() {
	var codeLen = parseInt(this.attr('length')),
		codes = '',
		$select = $('.checked'),
		len;
	if ($select.length < codeLen) throw ('请选' + codeLen + '位数');
	$select.each(function() {
		codes += this.value;
	});
	len = permutation(codes.split(""), codeLen).length;
	return {
		actionData: codes,
		actionNum: len
	};
} /*混合组选录入式投注*/

function tzSscHhzxInput() {
	var codeList = $('#textarea-code').val(),
		played = this.attr('played'),
		z3 = [],
		z6 = [];
	var o = {
		"前": [16, 17],
		"后": [19, 20],
		"任选": [22, 23],
		"混": [59, 60]
	};
	if (played == '任选' && $('#wei-shu :checked', this).length != 3) throw ('请选3位数');
	codeList = codeList.replace(/[^\d]/gm, '');
	if (codeList.length == 0) throw ('请输入号码');
	if (codeList.length % 3) throw ('输入号码不正确');
	codeList.replace(/[^\d]/gm, '').match(/\d{3}/g).forEach(function(code) {
		var reg = /(\d)(.*)\1/;
		if (/(\d)\1{2}/.test(code)) {
			throw ('组选不能为豹子');
		} else if (reg.test(code)) {
			z3.push(code);
		} else {
			z6.push(code);
		}
	});
	if (z3.length && z6.length) {
		return [{
			playedId: o[played][0],
			playedName: played + '三组三',
			actionData: z3.join(','),
			actionNum: z3.length,
			isZ6: false
		}, {
			playedId: o[played][1],
			playedName: played + '三组六',
			actionData: z6.join(','),
			actionNum: z6.length,
			isZ6: true
		}];
	} else if (z3.length) {
		return {
			playedId: o[played][0],
			playedName: played + '三组三',
			actionData: z3.join(','),
			actionNum: z3.length,
			isZ6: false
		};
	} else if (z6.length) {
		return {
			playedId: o[played][1],
			playedName: played + '三组六',
			actionData: z6.join(','),
			actionNum: z6.length,
			isZ6: true
		};
	}
}
/*
* 六合彩玩法 ajax方法  DAVID UPDATE 2015
* 六合彩二中二
*/
function lhc_2z2(){
	var code=[], len=1,codeLen=parseInt(this.attr('length'));
	var $d=$(this).filter(':visible:first'),
		dLen=$('.code.checked', $d).length;
		if(dLen<2){
			throw('至少选2位数');
		}else{
			var dCode=[];
			$('.code.checked', $d).each(function(i,o){
				dCode[i]=o.value;
			});
			len=combine(dCode, codeLen).length;
			return {actionData:dCode.join(' '), actionNum:len};
		}
}

/*
* 六合彩三中三
*/
function lhc_3z3(){
	var code=[], len=1,codeLen=parseInt(this.attr('length'));
	var $d=$(this).filter(':visible:first'),
		dLen=$('.code.checked', $d).length;
		if(dLen<3){
			throw('至少选3位数');
		}else{
			var dCode=[];
			$('.code.checked', $d).each(function(i,o){
				dCode[i]=o.value;
			});
			len=combine(dCode, codeLen).length;
			return {actionData:dCode.join(' '), actionNum:len};
		}
}

/*
* 六合彩特码
*/
function lhctmdx(){
	var code=[],len=1,codeLen=parseInt(this.attr('length'));
	var $d=$(this).filter(':visible:first'),
		dLen=$('.code.checked', $d).length;
		if(dLen!=1){
			throw('请选择一种形态');
		}else{
			var dCode=[];
			$('.code.checked', $d).each(function(i,o){
				dCode[i]=o.value;
			});
			return {actionData:dCode.join(' '), actionNum:len};
		}
}

/*
* 六合五不中
*/
function lhc_5bz(){
	var code=[],len=1,codeLen=parseInt(this.attr('length'));
	var $d=$(this).filter(':visible:first'),
		dLen=$('.code.checked', $d).length;
		if(dLen!=5){
			throw('请选择5个号码');
		}else{
			var dCode=[];
			$('.code.checked', $d).each(function(i,o){
				dCode[i]=o.value;
			});
			return {actionData:dCode.join(' '), actionNum:len};
		}
}
/*
* 六合七不中
*/
function lhc_7bz(){
	var code=[],len=1,codeLen=parseInt(this.attr('length'));
	var $d=$(this).filter(':visible:first'),
		dLen=$('.code.checked', $d).length;
		if(dLen!=7){
			throw('请选择7个号码');
		}else{
			var dCode=[];
			$('.code.checked', $d).each(function(i,o){
				dCode[i]=o.value;
			});
			return {actionData:dCode.join(' '), actionNum:len};
		}
}
/* 六合彩 end*/
function zxhz3d(){
	var code=[], len=1,codeLen=parseInt(this.attr('length'));
	var sele_count= new Array('1','3','6','10','15','21','28','36','45','55','63','69','73','75','75','73','69','63','55','45','36','28','21','15','10','6','3','1');
	var endnum=0;var num;

	var $d=$(this).filter(':visible:first'),
		dLen=$('.code.checked', $d).length;
        
		if(dLen<1){
			throw('至少选择一位！');
		}else{
			var dCode=[];
			$('.code.checked', $d).each(function(i,o){
				dCode[i]=o.value;
			});
		    for (i=0;i<dCode.length;i++){num=dCode[i];endnum=endnum+parseInt(sele_count[num]);} 
			len=endnum;
			return {actionData:dCode.join(','), actionNum:len};
		}
}

/*十一选五任选玩法投注*/

function tz11x5Select() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length')),
		sType = !! $('.dantuo :radio:checked').val();
	if (sType) {
		var $d = $(this).filter(':visible:first'),
			$t = $d.next(),
			dLen = $('.code.checked', $d).length;
		if (dLen == 0) {
			throw ('至少选一位胆码');
		} else if (dLen >= codeLen) {
			throw ('最多只能选择' + (codeLen - 1) + '个胆码');
		} else {
			var dCode = [],
				tCode = [];
			$('.code.checked', $d).each(function(i, o) {
				dCode[i] = o.value;
			});
			$('.code.checked', $t).each(function(i, o) {
				tCode[i] = o.value;
			});
			len = combine(tCode, codeLen - dCode.length).length;
			return {
				actionData: '(' + dCode.join(' ') + ')' + tCode.join(' '),
				actionNum: len
			};
		}
	} else {
		$(':input:visible.code.checked').each(function(i, o) {
			code[i] = o.value;
		});
		if (code.length < codeLen) throw ('至少选择' + codeLen + '位数');
		return {
			actionData: code.join(' '),
			actionNum: combine(code, codeLen).length
		};
	}
}

function ssc_5z_120() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var $d = $(this).filter(':visible:first'),
		dLen = $('.code.checked', $d).length;
	if (dLen < 5) {
		throw ('至少选5位数');
	} else {
		var dCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		len = combine(dCode, codeLen).length;
		return {
			actionData: dCode.join(','),
			actionNum: len
		};
	}
}

function ssczx60() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var endnum = 0;
	var num = 0;
	var c;
	var anum = 0;
	var bnum = 0;
	var c;
	var d;
	var sele_count = new Array('0', '0', '0', '1', '4', '10', '20', '35', '56', '84');
	var $d = $(this).filter(':visible:first'),
		$t = $d.next(),
		dLen = $('.code.checked', $d).length;
	tLen = $('.code.checked', $t).length;
	if (dLen == 0) {
		throw ('至少选一位二重号');
	} else if (tLen < 3) {
		throw ('至少选三位单号');
	} else {
		var dCode = [],
			tCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		$('.code.checked', $t).each(function(i, o) {
			tCode[i] = o.value;
		});
		num = Sames(dCode, tCode);
		if (tLen - 1 >= 0) {
			c = tLen - 1
		} else {
			c = 0;
		};
		if (num - 1 >= 0) {
			if (dLen - num == 0) {
				anum = sele_count[c] * dLen;
			}
			if (dLen - num > 0) {
				anum = sele_count[tLen] * (dLen - num) + sele_count[c] * num;
			}
		} else {
			anum = sele_count[tLen] * dLen;
		}
		len = parseInt(anum);
		return {
			actionData: dCode.join('') + ',' + tCode.join(''),
			actionNum: len
		};
	}
}

function ssczx30() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var endnum = 0;
	var num = 0;
	var c;
	var anum = 0;
	var bnum = 0;
	var cnum = 0;
	var bnum = 0;
	var c;
	var d;
	var $d = $(this).filter(':visible:first'),
		$t = $d.next(),
		dLen = $('.code.checked', $d).length;
	tLen = $('.code.checked', $t).length;
	if (dLen < 2) {
		throw ('至少选两位二重号');
	} else if (tLen < 1) {
		throw ('至少选一位单号');
	} else {
		var dCode = [],
			tCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});

		$('.code.checked', $t).each(function(i, o) {
			tCode[i] = o.value;
		});
		for (i = 0; i < dLen - 1; i++) {
			d = i + 1;
			for (j = d; j < dLen; j++) {
				for (c = 0; c < tLen; c++) {
					if (dCode[i] - tCode[c] != 0 && dCode[j] - tCode[c] != 0) {
						bnum = bnum + 1;
					}
				}
			}
		}
		len = bnum;
		return {
			actionData: dCode.join('') + ',' + tCode.join(''),
			actionNum: len
		};
	}
}

function ssczx20() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var endnum = 0;
	var num = 0;
	var c;
	var anum = 0;
	var bnum = 0;
	var cnum = 0;
	var bnum = 0;
	var c;
	var d;
	var $d = $(this).filter(':visible:first'),
		$t = $d.next(),
		dLen = $('.code.checked', $d).length;
	tLen = $('.code.checked', $t).length;
	if (dLen < 1) {
		throw ('至少选一位三重号');
		//}else if(tLen<2){
		//throw('至少选两位单号');
	} else {
		var dCode = [],
			tCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});

		$('.code.checked', $t).each(function(i, o) {
			tCode[i] = o.value;
		});
		for (i = 0; i < tLen - 1; i++) {
			d = i + 1;
			for (j = d; j < tLen; j++) {
				for (c = 0; c < dLen; c++) {
					if (dCode[i] - tCode[c] != 0 && dCode[j] - tCode[c] != 0) {
						bnum = bnum + 1;
					}
				}
			}
		}
		len = bnum;
		return {
			actionData: dCode.join('') + ',' + tCode.join(''),
			actionNum: len
		};
	}
}

function ssczx10() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var endnum = 0;
	var num = 0;
	var c;
	var anum = 0;
	var bnum = 0;
	var cnum = 0;
	var bnum = 0;
	var c;
	var d;
	var $d = $(this).filter(':visible:first'),
		$t = $d.next(),
		dLen = $('.code.checked', $d).length;
	tLen = $('.code.checked', $t).length;
	if (dLen < 1) {
		throw ('至少选一位三重号');
	} else if (tLen < 1) {
		throw ('至少选一位二重号');
	} else {
		var dCode = [],
			tCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		$('.code.checked', $t).each(function(i, o) {
			tCode[i] = o.value;
		});
		for (i = 0; i < dLen; i++) {
			for (j = 0; j < tLen; j++) {
				if (dCode[i] - tCode[j] != 0) {
					bnum = bnum + 1;
				}
			}
		}
		len = bnum;
		return {
			actionData: dCode.join('') + ',' + tCode.join(''),
			actionNum: len
		};
	}
}

function ssczx5() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var endnum = 0;
	var num = 0;
	var c;
	var anum = 0;
	var bnum = 0;
	var cnum = 0;
	var bnum = 0;
	var c;
	var d;
	var $d = $(this).filter(':visible:first'),
		$t = $d.next(),
		dLen = $('.code.checked', $d).length;
	tLen = $('.code.checked', $t).length;
	if (dLen < 1) {
		throw ('至少选一位四重号');
	} else if (tLen < 1) {
		throw ('至少选一位单号');
	} else {
		var dCode = [],
			tCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		$('.code.checked', $t).each(function(i, o) {
			tCode[i] = o.value;
		});
		for (i = 0; i < dLen; i++) {
			for (j = 0; j < tLen; j++) {
				if (dCode[i] - tCode[j] != 0) {
					bnum = bnum + 1;
				}
			}
		}
		len = bnum;
		return {
			actionData: dCode.join('') + ',' + tCode.join(''),
			actionNum: len
		};
	}
}

function ssczx24() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var sele_count = new Array('0', '0', '0', '1', '5', '15', '35', '70', '126', '210');
	var $d = $(this).filter(':visible:first'),
		dLen = $('.code.checked', $d).length;
	if (dLen < 4) {
		throw ('至少选择四位！');
	} else {
		var dCode = [],
			tCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		var endnum = 0;
		var num = dCode.length - 1;
		endnum = parseInt(sele_count[num]);
		len = endnum;
		return {
			actionData: dCode.join(','),
			actionNum: len
		};
	}
}

function ssczx12() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var endnum = 0;
	var num = 0;
	var a;
	var b;
	var c;
	var anum = 0;
	var bnum = 0;
	var c;
	var d;
	var sele_count = new Array('0', '1', '3', '6', '10', '15', '21', '28', '36');
	var $d = $(this).filter(':visible:first'),
		$t = $d.next(),
		dLen = $('.code.checked', $d).length;
	tLen = $('.code.checked', $t).length;
	if (dLen < 1) {
		throw ('至少选一位二重号');
	} else if (tLen < 2) {
		throw ('至少选两位单号');
	} else {
		var dCode = [],
			tCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		$('.code.checked', $t).each(function(i, o) {
			tCode[i] = o.value;
		});
		num = Sames(dCode, tCode);
		if (tLen - 1 >= 0) {
			c = tLen - 1
		} else {
			c = 0;
		};
		if (tLen - 2 >= 0) {
			d = tLen - 2
		} else {
			d = 0;
		};
		if (num - 1 >= 0) {
			if (dCode.length - num == 0) {
				c = tLen - 2;
				anum = sele_count[c] * dCode.length;
			}
			if (dCode.length - num > 0) {
				c = tLen - 2;
				anum = sele_count[c] * num;
				anum = anum + sele_count[tLen - 1] * (dCode.length - num);
			}
		} else {
			if (tLen - 1 >= 0) {
				c = tLen - 1
			} else {
				c = 0;
			};
			anum = sele_count[c] * dCode.length;
		}
		endnum = parseInt(anum);
		len = endnum;
		return {
			actionData: dCode.join('') + ',' + tCode.join(''),
			actionNum: len
		};
	}
}


function ssczx6() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var sele_count = new Array('0', '0', '1', '3', '6', '10', '15', '21', '28', '36', '45');
	var $d = $(this).filter(':visible:first'),
		dLen = $('.code.checked', $d).length;
	if (dLen < 2) {
		throw ('至少选择两位！');
	} else {
		var dCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		var endnum = sele_count[dLen];
		len = endnum;
		return {
			actionData: dCode.join(','),
			actionNum: len
		};
	}
}

function ssczx4() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var endnum = 0;
	var num = 0;
	var a;
	var b;
	var c;
	var d_arr = new Array();
	var anum = 0;
	var bnum = 0;
	var c;
	var d;
	var sele_count = new Array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	var $d = $(this).filter(':visible:first'),
		$t = $d.next(),
		dLen = $('.code.checked', $d).length;
	tLen = $('.code.checked', $t).length;
	if (dLen < 1) {
		throw ('至少选一位三重号');
	} else if (tLen < 1) {
		throw ('至少选一位单号');
	} else {
		var dCode = [],
			tCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});

		$('.code.checked', $t).each(function(i, o) {
			tCode[i] = o.value;
		});
		for (var e = 0; e < dCode.length; e++) {
			var this_num = dCode[e];
			d_arr = drop_array_lines(tCode, this_num);
			endnum += d_arr.length;
		}
		len = endnum;
		return {
			actionData: dCode.join('') + ',' + tCode.join(''),
			actionNum: len
		};
	}
}

function ssch3zxhz() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var sele_count = new Array('1', '2', '2', '4', '5', '6', '8', '10', '11', '13', '14', '14', '15', '15', '14', '14', '13', '11', '10', '8', '6', '5', '4', '2', '2', '1');
	var endnum = 0;
	var num;

	var $d = $(this).filter(':visible:first'),
		dLen = $('.code.checked', $d).length;

	if (dLen < 1) {
		throw ('至少选择一位！');
	} else {
		var dCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		for (i = 0; i < dCode.length; i++) {
			num = dCode[i] - 1;
			endnum = endnum + parseInt(sele_count[num]);
		}
		len = endnum;
		return {
			actionData: dCode.join(','),
			actionNum: len
		};
	}
}

function ssch3ts() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));

	var $d = $(this).filter(':visible:first'),
		dLen = $('.code.checked', $d).length;

	if (dLen < 1) {
		throw ('至少选择一位！');
	} else {
		var dCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		len = dLen;
		return {
			actionData: dCode.join(','),
			actionNum: len
		};
	}
}

function ssch3kd() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var sele_count = new Array('10', '54', '96', '126', '144', '150', '144', '126', '96', '54');
	var endnum = 0;
	var num;
	var $d = $(this).filter(':visible:first'),
		dLen = $('.code.checked', $d).length;

	if (dLen < 1) {
		throw ('至少选择一位！');
	} else {
		var dCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		for (i = 0; i < dCode.length; i++) {
			num = dCode[i];
			if (num - 1 >= -1) {
				endnum = endnum + parseInt(sele_count[num]);
			}
		}
		len = endnum;
		return {
			actionData: dCode.join(','),
			actionNum: len
		};
	}
}

function sscq3qw2x() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var endnum = 0;
	var num = 0;
	var a;
	var b;
	var c;
	var d_arr = new Array();
	var anum = 0;
	var bnum = 0;
	var c;
	var d;
	var sele_count = new Array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	var $d = $(this).filter(':visible:first'),
		$t = $d.next(),
		dLen = $('.code.checked', $d).length;
	tLen = $('.code.checked', $t).length;
	if (dLen < 1) {
		throw ('至少选一位三重号');
	} else if (tLen < 1) {
		throw ('至少选一位单号');
	} else {
		var dCode = [],
			tCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});

		$('.code.checked', $t).each(function(i, o) {
			tCode[i] = o.value;
		});
		for (var e = 0; e < dCode.length; e++) {
			var this_num = dCode[e];
			d_arr = drop_array_lines(tCode, this_num);
			endnum += d_arr.length;
		}
		return {
			actionData: dCode.join('') + ',' + tCode.join(''),
			actionNum: endnum
		};
	}
}

function ssc2xh2zxbd() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var endnum = 0;
	var num = 0;
	var a;
	var b;
	var c;
	var anum = 0;
	var bnum = 0;
	var cnum = 0;
	var bnum = 0;
	var c;
	var d;
	var alist = new Array;
	var blist = new Array
	var $d = $(this).filter(':visible:first'),
		dLen = $('.code.checked', $d).length;
	if (dLen < 1) {
		throw ('至少选择一位！');
	} else {
		var dCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		var endnum = 0;
		var num = 0;
		var a;
		var b;
		var c;
		var anum = 0;
		var bnum = 0;
		var cnum = 0;
		var bnum = 0;
		var c;
		var d;
		var alist = new Array;
		var blist = new Array
		for (j = 0; j < 10; j++) {
			for (c = j; c < 10; c++) {
				if (j - c != 0) {
					if (dCode - c == 0 || dCode - j == 0) {
						bnum = bnum + 1;
					}
				}
			}
		}
		return {
			actionData: dCode.join(','),
			actionNum: bnum
		};
	}
}

function zxhz3d() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var sele_count = new Array('1', '3', '6', '10', '15', '21', '28', '36', '45', '55', '63', '69', '73', '75', '75', '73', '69', '63', '55', '45', '36', '28', '21', '15', '10', '6', '3', '1');
	var endnum = 0;
	var num;

	var $d = $(this).filter(':visible:first'),
		dLen = $('.code.checked', $d).length;

	if (dLen < 1) {
		throw ('至少选择一位！');
	} else {
		var dCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		for (i = 0; i < dCode.length; i++) {
			num = dCode[i];
			endnum = endnum + parseInt(sele_count[num]);
		}
		len = endnum;
		return {
			actionData: dCode.join(','),
			actionNum: len
		};
	}
}

function zuxhz3d() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length'));
	var sele_count = new Array('1', '2', '2', '4', '5', '6', '8', '10', '11', '13', '14', '14', '15', '15', '14', '14', '13', '11', '10', '8', '6', '5', '4', '2', '2', '1');
	var endnum = 0;
	var num;

	var $d = $(this).filter(':visible:first'),
		dLen = $('.code.checked', $d).length;

	if (dLen < 1) {
		throw ('至少选择一位！');
	} else {
		var dCode = [];
		$('.code.checked', $d).each(function(i, o) {
			dCode[i] = o.value;
		});
		for (i = 0; i < dCode.length; i++) {
			num = dCode[i] - 1;
			endnum = endnum + parseInt(sele_count[num]);
		}
		len = endnum;
		return {
			actionData: dCode.join(','),
			actionNum: len
		};
	}
}

/*快乐十分任选玩法投注*/

function tzKLSFSelect() {
	var code = [],
		len = 1,
		codeLen = parseInt(this.attr('length')),
		sType = !! $('.dantuo :radio:checked').val();
	if (sType) {
		var $d = $(this).filter(':visible:first'),
			$t = $d.next(),
			dLen = $('.code.checked', $d).length;

		if (dLen == 0) {
			throw ('至少选一位胆码');
		} else if (dLen >= codeLen) {
			throw ('最多只能选择' + (codeLen - 1) + '个胆码');
		} else {
			var dCode = [],
				tCode = [];
			$('.code.checked', $d).each(function(i, o) {
				dCode[i] = o.value;
			});
			$('.code.checked', $t).each(function(i, o) {
				tCode[i] = o.value;
			});
			len = combine(tCode, codeLen - dCode.length).length;
			return {
				actionData: '(' + dCode.join(' ') + ')' + tCode.join(' '),
				actionNum: len
			};
		}
	} else {
		$(':input:visible.code.checked').each(function(i, o) {
			code[i] = o.value;
		});
		if (code.length < codeLen) throw ('至少选择' + codeLen + '位数');
		return {
			actionData: code.join(' '),
			actionNum: combine(code, codeLen).length
		};
	}
}

function Sames(a, b) {
	var num = 0;
	for (i = 0; i < a.length; i++) {
		var zt = 0;
		for (j = 0; j < b.length; j++) {
			if (a[i] - b[j] == 0) {
				zt = 1;
			}
		}
		if (zt == 1) {
			num += 1;
		}
	}
	return num;
}

function drop_array_lines(arr, num) {
	var drop_arr = new Array();
	for (o = 0; o < arr.length; o++) {
		if (parseInt(arr[o], 10) - parseInt(num, 10) == 0) {

		} else {
			drop_arr.push(arr[o]);
		}
	}
	return drop_arr;
}

/**
 * 时时彩随机投注
 *
 * @params int number		随机投几注，默认为1
 */

function gameActionRandom(number) {
	var $game = $('#num-select .pp');
	if ($game.length <= 1 || $game.attr('action') == 'tz5xDwei') {
		davidInfo('该玩法暂不支持机选，请手动选择号码！');
		return;
	}
	fun = $game.attr('random');
	//len=$game.attr('length');		
	try {
		fun = window[fun];
		if (typeof fun == 'function') {
			gameAddCode(fun.call($game, number));
		}
	} catch (err) {
		alert(err);
	}
}

//机选多注

function genMultiRandom(bet) {
	var $game = $('#num-select .pp');
	if ($game.length <= 1) {
		davidInfo('该玩法暂不支持机选，请手动选择号码！');
		return;
	} else {
		for (var i = 0; i < bet; i++) {
			gameActionRandom(1);
		}
	}
}

function gameActionRemoveCode(isSelected) {
	$('.touzhu-cont tr').remove();
	$('.touzhu-bottom :checkbox[name=zhuiHao]').removeData()[0].checked = false;
	gameCalcAmount();
}

//{{{随机投注函数集

/**
 * 时时彩随机投注函数
 *
 * @params num		投机投几注，默认为1，可以设置为5，选几位数由HTML属性length得
 * @return			要求返回一个对象{actionData:"1,23,4,5,6",actionNum:2}
 *
 */

function sscRandom(num) {
	var i, j, code, codes = [],
		codeLen = parseInt(this.attr('length'));
	if (codeLen == 'undefined' || null == codeLen) return;
	for (i = 0; i < num; i++) {

		code = [];
		for (j = 0; j < codeLen; j++) {
			code.push(Math.floor(Math.random() * 10));
		}

		codes[i] = code;
	}
	return {
		actionData: codes.join('|'),
		actionNum: codes.length
	};
}

//}}}

//随机数 GetRandomNum(1,6)

function GetRandomNum(Min, Max) {
	var Range = Max - Min;
	var Rand = Math.random();
	return (Min + Math.round(Rand * Range));
}

//彩种玩法、算法 DAVID 
//end***************************************************************************************************************************

//提示

function winjinAlert(tips) {
	ds.dialog({
		title: '系统提示',
		content: tips,
		timeout: 2,
		onyes: true,
	});
}


//{{{ 通用复制函数

function CopyToClipboard(meintext, cb) {
	if (window.clipboardData) {
		window.clipboardData.setData("Text", meintext);
	} else if (window.netscape) {
		netscape.security.PrivilegeManager.enablePrivilege('UniversalXPConnect');
		var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
		if (!clip) return;
		var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
		if (!trans) return;
		trans.addDataFlavor('text/unicode');
		var str = new Object();
		var len = new Object();
		var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
		var copytext = meintext;
		str.data = copytext;
		trans.setTransferData("text/unicode", str, copytext.length * 2);
		var clipid = Components.interfaces.nsIClipboard;
		if (!clip) return false;
		clip.setData(trans, null, clipid.kGlobalClipboard);
	} else {
		return false;
	}
	if (typeof cb == 'function') {
		return cb(meintext);
	} else {
		return true;
	}
}

function Combination(c, b) {
	b = parseInt(b);
	c = parseInt(c);
	if (b < 0 || c < 0) {
		return false
	}
	if (b == 0 || c == 0) {
		return 1
	}
	if (b > c) {
		return 0
	}
	if (b > c / 2) {
		b = c - b
	}
	var a = 0;
	for (i = c; i >= (c - b + 1); i--) {
		a += Math.log(i)
	}
	for (i = b; i >= 1; i--) {
		a -= Math.log(i)
	}
	a = Math.exp(a);
	return Math.round(a)
}

function strCut(str, len) {
	var strlen = str.length;
	if (strlen == 0) return false;
	var j = Math.ceil(strlen / len);
	var arr = Array();
	for (var i = 0; i < j; i++)
	arr[i] = str.substr(i * len, len)
	return arr;
}

function filterArray(arrs) {
	var k = 0,
		n = arrs.length;
	var arr = new Array();
	for (var i = 0; i < n; i++) {
		for (var j = i + 1; j < n; j++) {
			if (arrs[i] == arrs[j]) {
				arrs[i] = null;
				break;
			}
		}
	}
	for (var i = 0; i < n; i++) {
		if (arrs[i]) {
			arr[k++] = arrs[i]; // arr.push(this[i]);
		}
	}
	return arr;
}