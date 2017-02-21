$(function() {
	$('input.code').live('click', function() {
		var $this = $(this);
		if ($this.is('.checked')) {
			$this.removeClass('checked');
		} else {
			$this.addClass('checked');
		}
		gameCalcAmount();
	});
	if ($.browser.msie) {
		$('a, :button, :radio, :checkbox').live('focus', function() {
			this.blur();
		});
	}
	$('input.action').live('click', function() {
		var $this = $(this),
			call = $this.attr('action'),
			pp = $this.parent();
		$this.addClass("on").siblings(".action").removeClass("on");
		if (call && $.isFunction(call = window[call])) {
			call.call(this, pp);
		} else if ($this.is('.all')) {
			$('input.code', pp).addClass('checked');
		} else if ($this.is('.large')) {
			$('input.code.max', pp).addClass('checked');
			$('input.code.min', pp).removeClass('checked');
		} else if ($this.is('.small')) {
			$('input.code.min', pp).addClass('checked');
			$('input.code.max', pp).removeClass('checked');
		} else if ($this.is('.odd')) {
			$('input.code.d', pp).addClass('checked');
			$('input.code.s', pp).removeClass('checked');
		} else if ($this.is('.even')) {
			$('input.code.s', pp).addClass('checked');
			$('input.code.d', pp).removeClass('checked');
		} else if ($this.is('.none')) {
			$('input.code', pp).removeClass('checked');
		}
	});
	$('td.code-list').live('click', function() {
		var data = $(this).parent().data('code');
		displayCodeList(data);
	});
	$('.touzhu-cont .del').live('click', function() {
		$(this).closest('tr').remove();
		$('.touzhu-bottom :checkbox[name=zhuiHao]').removeData()[0].checked = false;
		gameCalcAmount();
	});
	$('#btnPostBet').unbind('click');
	$('#btnPostBet').bind('click', gamePostCode);
	$('.slider').each(function() {
		var $this = $(this),
			onslide, attr = {};
		['value', 'min', 'max', 'step'].forEach(function(p) {
			if (!isNaN(value = parseFloat($this.attr(p)))) {
				attr[p] = value;
			}
		});
		if (onslide = $this.attr('slideCallBack')) {
			if (typeof window[onslide] == 'function') {
				attr.slide = function(event, ui) {
					window[onslide].call(this, ui.value);
				}
			}
		}
		$this.slider(attr);
	});
	$('.fandian-box input').click(function() {
		var $slider = $('#slider'),
			min = parseFloat($slider.attr('min')),
			max = parseFloat($slider.attr('max')),
			value = $slider.slider('option', 'value');

		value += parseFloat($(this).attr('step'));
		if (value < min) value = min;
		if (value > max) value = max;

		$slider.slider('option', 'value', value);
		gameSetFanDian.call($slider[0], value);
	});
	$('#textarea-code').live('keypress', function(event) {
		event.keyCode = event.keyCode || event.charCode;
		return !!(
		event.ctrlKey || event.altKey || event.shiftKey || event.keyCode == 13 || event.keyCode == 8 || (event.keyCode >= 48 && event.keyCode <= 57));
	}).live('keyup', gameMsgAutoTip);
	$('#textarea-code').live('change', function() {
		var str = $(this).val();
		if (/[a-zA-Z]+/.test(str)) {
			davidInfo('投注号码不能含有字母字符');
			$(this).val('');
		}
	});
	$('.pp :button, :radio[name=danwei]').live('click', gameMsgAutoTip);
	$('#beishu').live('change', gameMsgAutoTip);
	$('.surbeishu').live('click', function() {
		var newVal = parseInt($('#beishu').val()) - 1;
		if (newVal < 1) newVal = 1;
		$('#beishu').val(newVal);
		gameMsgAutoTip();
	});
	$('.addbeishu').live('click', function() {
		var newVal = parseInt($('#beishu').val()) + 1;
		$('#beishu').val(newVal);
		gameMsgAutoTip();
	});

	//追号按钮触发函数
	$('.touzhu-bottom :checkbox[name=zhuiHao]').click(function() {
		var bet = $('.touzhu-cont tbody tr'),
			len = bet.length
		if (len == 0) {
			davidInfo('请选择方案进行投注！');
			return false;
		} else if (len > 1) {
			davidInfo('只能针对一个方案发起追号！');
			return false;
		}
		$('#gamezhuihao').show();
		setGameZhuiHao(bet.data('code'));
		return false;
	});

	//追号模块 全选反选
	$('.zhui-hao-modal thead :checkbox').live('change', function() {
		$(this).closest('table').find('tbody :checkbox').prop('checked', this.checked).trigger('change');
	});
	//追号模块 选择单期注单
	$('.zhui-hao-modal tbody :checkbox').live('change', function() {
		var data = $('.touzhu-cont tbody tr').data('code');
		price = Math.round(data.mode * data.actionNum * 100) / 100;
		amount = price * Math.abs($('.zhbeishu').val());
		if (!data.count) {
			data.count = 0;
			data.amount = 0;
		}
		if (this.checked) {
			data.count++;
			data.amount += amount;
		} else {
			data.count--;
			data.amount -= amount;
		}
		var $this = $(this);
		$('.zhamount', $this.closest('tr')).html(Math.round(amount * 100) / 100);
		$this.data('amount', amount);
		zhuihaocount();
	});
	//追号模块 倍数
	$('.zhui-hao-modal tbody .zhbeishu').live('change', function(e) {
		var $this = $(this);
		var re = /^[1-9][0-9]*$/;
		if (!re.test($this.val())) {
			davidInfo('倍数只能为正整数');
			$this.val(1);
			return;
		}
		if (!$this.closest('tr').find(':checkbox')[0].checked) {
			davidInfo('请选择需要追号的注单');
			$this.val(1);
			return;
		};
		$checkbox = $this.closest('tr').find(':checkbox');
		_amount = Math.abs($('#zhamount').val()); //获取注单的默认的金额
		$this.closest('tr').find('.zhamount').html(Math.abs($this.val()) * _amount); //倍数X注单的默认金额		
		amount = Math.abs($this.val()) * _amount;
		zhuihaocount();
	});

	//计算追号的金额倍数的方法

	function zhuihaocount() {
		var beishu = 0;
		var qs = 0;
		$('.zhui-hao-modal tbody :checkbox:checked').each(function() {
			var $this = $(this);
			$tr = $this.closest('tr');
			beishu += parseInt($('.zhbeishu', $tr).val());
			qs++;
		});
		//alert(qs);
		$show = $('.zhgen');
		$('#lt_trace_beishu', $show).text(beishu);
		$('#lt_trace_count', $show).text(qs);
		$('#lt_trace_hmoney', $show).text(Math.abs($('#zhamount').val()) * beishu); //总金额=总倍数x默认注单金额

	}
	//追号模块 期数选择框
	$("#lt_trace_qissueno").live('change', function() {
		$qsno = $('#lt_trace_qissueno').val();
		$zhcheckbox = $('.zhui-hao-modal tbody :checkbox');
		if ($qsno == '') {
			$('.zhui-hao-modal thead :checkbox').attr('checked', false); //取消全选选择框
			$zhcheckbox.each(function() {
				$(this).attr('checked', false);
			}); //全部取消掉
		} else if ($qsno == 'all') {
			$('.zhui-hao-modal thead :checkbox').attr('checked', true); //选中全选选择框
			$zhcheckbox.each(function() {
				$(this).attr('checked', true);
			});
		} else {
			$('.zhui-hao-modal thead :checkbox').attr('checked', false); //取消全选选择框
			$zhcheckbox.each(function() {
				$(this).attr('checked', false);
			}); //先全部取消掉
			$zhcheckbox.slice(0, $qsno).attr("checked", 'true');
		}
		zhuihaocount();
	});
	$('#lt_margin').click(function() {
		btnquxiaozhuihao(); //取消追号					   
	});
	$('.game-btn a[href]').live('click', function() {
		var $this = $(this);
		if ($this.is('.current')) return false;
		$('.game-btn2').load($this.attr('href'), function() {
			$this.closest('.game-btn').find('.current').removeClass('current');
			$this.closest('div').addClass('current');
			$('.game-btn2 a[href]:first').trigger('click');
		});
		return false;
	});
	$('.game-btn2 a[href]').live('click', function() {
		var $this = $(this);
		loadPlayTips($this.attr('data_id'));
		$('#num-select').load($this.attr('href'), function() {
			$this.closest('.game-btn2').find('.current').removeClass('current');
			$this.parent().addClass('current');
		});
		return false;
	});
	$('.showhelp .showeg').live("mouseover", function() {
		var $action = $(this).attr('action');
		var ps = $(this).position();
		$('#' + $action + 's_div').siblings('.game_eg').hide();
		$('#' + $action + 's_div').css({
			top: ps.top + 20,
			left: ps.left + 20
		}).fadeIn(100);
	})
	$('.showhelp .showeg').live("mouseout", function() {
		$('#game-helptips').find('.game_eg').hide();
	})
	$('.kjabtn').live('click', function() {
		var $this = $(this);
		$this.closest('.kaijiangall').find('ul').load($this.attr('src'), function() {
			$('.kjabtn.current').removeClass('current');
			$this.addClass('current');
		});
	});
	$('.jiang').live('click', function() {
		var $this = $(this);
		if ($this.is('.current')) return true;
		$('.jiang.current').removeClass('current');
		$this.addClass('current');
		return true;
	}).find('select').live('change', function() {
		$('.zj-cont tbody').load(this.value);
	});

	$('.dantuo :radio').live('click', function() {
		var $dom = $(this).closest('.dantuo');

		if (this.value) {
			$dom.next().hide().next().show();
		} else {
			$dom.next().show().next().hide();
		}
	});
	$('.dmtm :input.code').live('click', function(event) {
		var $this = $(this),
			$dom = $this.closest('.dmtm');
		if ($('.code.checked[value=' + this.value + ']', $dom).not(this).length == 1) {
			$this.removeClass('checked');
			davidInfo('选择胆码不能与拖码相同');
			return false;
		}
	});
	$('.zhixu115 :input.code').live('click', function(event) {
		var $this = $(this);
		if (!$this.is('.checked')) return false;

		var $dom = $this.closest('.zhixu115');
		$('.code.checked[value=' + this.value + ']', $dom).removeClass('checked');
		$this.addClass('checked');
	});
	if (getVoiceStatus() == 'off') {
		$('#voice').removeClass('voice-on').addClass('voice-off').attr('title', '声音关闭，点击开启');
	}
});
var MaxZjCount = {
	ds: function() {
		var zjCount = 0,
			t = 1,
			s;
		$.each(this.split('|').sort(), function() {
			if (s == String(this)) {
				t++;
			} else {
				s = this;
				if (t > zjCount) zjCount = t;
				t = 1;
			}
		});
		if (t > zjCount) zjCount = t;

		return zjCount;
	},
	fs: function() {
		return 1;
	},
	dxds: function() {
		var d = this.split(',').map(function(v) {
			return v.replace('单', '双').replace('大', '小').split("").sort().join('').replace(/双{2,}/, '双').replace(/小{2,}/, '小').length;
		});
		return d[0] * d[1];
	},
	dd5x: function() {
		return this.split(',').filter(function(v) {
			return v != '-'
		}).length;
	},
	bdd: function() {
		return this.length > 3 ? 3 : this.length;
	}
}

function playVoice(src, domId) {
	if (getVoiceStatus() == 'off') return;
	var $dom = $('#' + domId)
	if ($.browser.msie) {
		if ($dom.length) {
			$dom[0].src = src;
		} else {
			$('<bgsound>', {
				src: src,
				id: domId
			}).appendTo('body');
		}
	} else {
		if ($dom.length) {
			$dom[0].play();
		} else {
			$('<audio>', {
				src: src,
				id: domId
			}).appendTo('body')[0].play();
		}
	}
}

function setVoiceStatus(flag) {
	var session = (typeof sessionStorage != 'undefined');
	var key = 'voiceStatus';
	if (session) {
		if (!flag) {
			sessionStorage.setItem(key, 'off');
		} else {
			sessionStorage.removeItem(key);
		}
	} else {
		if (!flag) {
			$.cookie(key, 'off');
		} else {
			$.cookie(key, null);
		}
	}
}

function getVoiceStatus() {
	var key = 'voiceStatus';
	if (typeof sessionStorage != 'undefined') {
		return sessionStorage.getItem(key);
	} else {
		return $.cookie(key);
	}
}

function voiceKJ() {
	var $dom = $('#voice');
	if (getVoiceStatus() != 'off') {
		setVoiceStatus(false);
		$dom.attr('class', 'voice-off').attr('title', '声音关闭，点击开启');
	} else {
		setVoiceStatus(true);
		$dom.attr('class', 'voice-on').attr('title', '声音开启，点击关闭');
	}
}
//加载玩法信息

function loadPlayTips(playedid) {
	//	$('#game-helptips').load('/index.php/index/playTips/'+playedid);
	$('#game-helptips').load('/index.php?tnt=ipt&playedId=' + playedid);
}