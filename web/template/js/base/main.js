$(function() {
	$("#user-data").tabulous({
		effect: "flip"
	});
	$("#shownb-box").tabulous({
		effect: "slideLeft"
	});
});
(function(e, c, a, g) {
	var d = "tabulous",
		f = {
			effect: "scale"
		};

	function b(i, h) {
		this.element = i;
		this.$elem = e(this.element);
		this.options = e.extend({}, f, h);
		this._defaults = f;
		this._name = d;
		this.init();
	}
	b.prototype = {
		init: function() {
			var j = this.$elem.find("li").find("a");
			var i = this.$elem.find("li:first-child").find("a");
			var h = this.$elem.find("li:last-child").after('<span class="tabulousclear"></span>');
			if (this.options.effect == "scale") {
				tab_content = this.$elem.find("div").not(":first").not(":nth-child(1)").addClass("hidescale");
			} else {
				if (this.options.effect == "slideLeft") {
					tab_content = this.$elem.find("div").not(":first").not(":nth-child(1)").addClass("hideleft");
				} else {
					if (this.options.effect == "scaleUp") {
						tab_content = this.$elem.find("div").not(":first").not(":nth-child(1)").addClass("hidescaleup");
					} else {
						if (this.options.effect == "flip") {
							tab_content = this.$elem.find("div").not(":first").not(":nth-child(1)").addClass("hideflip");
						}
					}
				}
			}
			var k = this.$elem.find("#tabs_container");
			var l = k.find("div:first").height();
			var m = this.$elem.find("div:first").find("div");
			m.css({
				"position": "absolute",
				"top": "40px"
			});
			k.css("height", l + "px");
			i.addClass("tabulous_active");
			j.bind("click", {
				myOptions: this.options
			}, function(s) {
				s.preventDefault();
				var n = s.data.myOptions;
				var p = n.effect;
				var o = e(this);
				var r = o.parent().parent().parent();
				var q = o.attr("href");
				k.addClass("transition");
				j.removeClass("tabulous_active");
				o.addClass("tabulous_active");
				thisdivwidth = r.find("div" + q).height();
				if (p == "scale") {
					m.removeClass("showscale").addClass("make_transist").addClass("hidescale");
					r.find("div" + q).addClass("make_transist").addClass("showscale");
				} else {
					if (p == "slideLeft") {
						m.removeClass("showleft").addClass("make_transist").addClass("hideleft");
						r.find("div" + q).addClass("make_transist").addClass("showleft");
					} else {
						if (p == "scaleUp") {
							m.removeClass("showscaleup").addClass("make_transist").addClass("hidescaleup");
							r.find("div" + q).addClass("make_transist").addClass("showscaleup");
						} else {
							if (p == "flip") {
								m.removeClass("showflip").addClass("make_transist").addClass("hideflip");
								r.find("div" + q).addClass("make_transist").addClass("showflip");
							}
						}
					}
				}
				k.css("height", thisdivwidth + "px");
			});
		},
		yourOtherFunction: function(i, h) {}
	};
	e.fn[d] = function(h) {
		return this.each(function() {
			new b(this, h);
		});
	};
})(jQuery, window, document);