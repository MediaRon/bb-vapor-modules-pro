if (function(t, e) {
	var i = function(t, e) {
		"use strict";
		if (e.getElementsByClassName) {
			var i, o = e.documentElement,
				s = t.Date,
				n = t.HTMLPictureElement,
				r = t.addEventListener,
				a = t.setTimeout,
				l = t.requestAnimationFrame || a,
				d = t.requestIdleCallback,
				c = /^picture$/i,
				p = ["load", "error", "lazyincluded", "_lazyloaded"],
				u = {},
				h = Array.prototype.forEach,
				f = function(t, e) {
					return u[e] || (u[e] = new RegExp("(\\s|^)" + e + "(\\s|$)")), u[e].test(t.getAttribute("class") || "") && u[e]
				},
				g = function(t, e) {
					f(t, e) || t.setAttribute("class", (t.getAttribute("class") || "").trim() + " " + e)
				},
				v = function(t, e) {
					var i;
					(i = f(t, e)) && t.setAttribute("class", (t.getAttribute("class") || "").replace(i, " "))
				},
				m = function(t, e, i) {
					var o = i ? "addEventListener" : "removeEventListener";
					i && m(t, e), p.forEach(function(i) {
						t[o](i, e)
					})
				},
				y = function(t, i, o, s, n) {
					var r = e.createEvent("CustomEvent");
					return r.initCustomEvent(i, !s, !n, o || {}), t.dispatchEvent(r), r
				},
				w = function(e, o) {
					var s;
					!n && (s = t.picturefill || i.pf) ? s({
						reevaluate: !0,
						elements: [e]
					}) : o && o.src && (e.src = o.src)
				},
				b = function(t, e) {
					return (getComputedStyle(t, null) || {})[e]
				},
				k = function(t, e, o) {
					for (o = o || t.offsetWidth; o < i.minSize && e && !t._lazysizesWidth;) o = e.offsetWidth, e = e.parentNode;
					return o
				},
				T = function() {
					var t, i, o = [],
						s = [],
						n = o,
						r = function() {
							var e = n;
							for (n = o.length ? s : o, t = !0, i = !1; e.length;) e.shift()();
							t = !1
						},
						d = function(o, s) {
							t && !s ? o.apply(this, arguments) : (n.push(o), i || (i = !0, (e.hidden ? a : l)(r)))
						};
					return d._lsFlush = r, d
				}(),
				$ = function(t, e) {
					return e ? function() {
						T(t)
					} : function() {
						var e = this,
							i = arguments;
						T(function() {
							t.apply(e, i)
						})
					}
				},
				S = function(t) {
					var e, i = 0,
						o = 666,
						n = function() {
							e = !1, i = s.now(), t()
						},
						r = d ? function() {
							d(n, {
								timeout: o
							}), 666 !== o && (o = 666)
						} : $(function() {
							a(n)
						}, !0);
					return function(t) {
						var n;
						(t = !0 === t) && (o = 44), e || (e = !0, n = 125 - (s.now() - i), n < 0 && (n = 0), t || n < 9 && d ? r() : a(r, n))
					}
				},
				C = function(t) {
					var e, i, o = function() {
							e = null, t()
						},
						n = function() {
							var t = s.now() - i;
							t < 99 ? a(n, 99 - t) : (d || o)(o)
						};
					return function() {
						i = s.now(), e || (e = a(n, 99))
					}
				},
				x = function() {
					var n, l, d, p, u, k, x, j, z, E, Q, I, P, O, D, M = /^img$/i,
						N = /^iframe$/i,
						H = "onscroll" in t && !/glebot/.test(navigator.userAgent),
						L = 0,
						R = 0,
						W = -1,
						_ = function(t) {
							R--, t && t.target && m(t.target, _), (!t || R < 0 || !t.target) && (R = 0)
						},
						F = function(t, i) {
							var s, n = t,
								r = "hidden" == b(e.body, "visibility") || "hidden" != b(t, "visibility");
							for (z -= i, I += i, E -= i, Q += i; r && (n = n.offsetParent) && n != e.body && n != o;)(r = (b(n, "opacity") || 1) > 0) && "visible" != b(n, "overflow") && (s = n.getBoundingClientRect(), r = Q > s.left && E < s.right && I > s.top - 1 && z < s.bottom + 1);
							return r
						},
						U = function() {
							var t, s, r, a, c, p, h, f, g;
							if ((u = i.loadMode) && R < 8 && (t = n.length)) {
								s = 0, W++, null == O && ("expand" in i || (i.expand = o.clientHeight > 500 && o.clientWidth > 500 ? 500 : 370), P = i.expand, O = P * i.expFactor), L < O && R < 1 && W > 2 && u > 2 && !e.hidden ? (L = O, W = 0) : L = u > 1 && W > 1 && R < 6 ? P : 0;
								for (; s < t; s++)
									if (n[s] && !n[s]._lazyRace)
										if (H)
											if ((f = n[s].getAttribute("data-expand")) && (p = 1 * f) || (p = L), g !== p && (x = innerWidth + p * D, j = innerHeight + p, h = -1 * p, g = p), r = n[s].getBoundingClientRect(), (I = r.bottom) >= h && (z = r.top) <= j && (Q = r.right) >= h * D && (E = r.left) <= x && (I || Q || E || z) && (d && R < 3 && !f && (u < 3 || W < 4) || F(n[s], p))) {
												if (J(n[s]), c = !0, R > 9) break
											} else !c && d && !a && R < 4 && W < 4 && u > 2 && (l[0] || i.preloadAfterLoad) && (l[0] || !f && (I || Q || E || z || "auto" != n[s].getAttribute(i.sizesAttr))) && (a = l[0] || n[s]);
								else J(n[s]);
								a && !c && J(a)
							}
						},
						B = S(U),
						q = function(t) {
							g(t.target, i.loadedClass), v(t.target, i.loadingClass), m(t.target, V)
						},
						X = $(q),
						V = function(t) {
							X({
								target: t.target
							})
						},
						G = function(t, e) {
							try {
								t.contentWindow.location.replace(e)
							} catch (i) {
								t.src = e
							}
						},
						Y = function(t) {
							var e, o, s = t.getAttribute(i.srcsetAttr);
							(e = i.customMedia[t.getAttribute("data-media") || t.getAttribute("media")]) && t.setAttribute("media", e), s && t.setAttribute("srcset", s), e && (o = t.parentNode, o.insertBefore(t.cloneNode(), t), o.removeChild(t))
						},
						K = $(function(t, e, o, s, n) {
							var r, l, d, u, f, b;
							(f = y(t, "lazybeforeunveil", e)).defaultPrevented || (s && (o ? g(t, i.autosizesClass) : t.setAttribute("sizes", s)), l = t.getAttribute(i.srcsetAttr), r = t.getAttribute(i.srcAttr), n && (d = t.parentNode, u = d && c.test(d.nodeName || "")), b = e.firesLoad || "src" in t && (l || r || u), f = {
								target: t
							}, b && (m(t, _, !0), clearTimeout(p), p = a(_, 2500), g(t, i.loadingClass), m(t, V, !0)), u && h.call(d.getElementsByTagName("source"), Y), l ? t.setAttribute("srcset", l) : r && !u && (N.test(t.nodeName) ? G(t, r) : t.src = r), (l || u) && w(t, {
								src: r
							})), t._lazyRace && delete t._lazyRace, v(t, i.lazyClass), T(function() {
								(!b || t.complete && t.naturalWidth > 1) && (b ? _(f) : R--, q(f))
							}, !0)
						}),
						J = function(t) {
							var e, o = M.test(t.nodeName),
								s = o && (t.getAttribute(i.sizesAttr) || t.getAttribute("sizes")),
								n = "auto" == s;
							(!n && d || !o || !t.src && !t.srcset || t.complete || f(t, i.errorClass)) && (e = y(t, "lazyunveilread").detail, n && A.updateElem(t, !0, t.offsetWidth), t._lazyRace = !0, R++, K(t, e, n, s, o))
						},
						Z = function() {
							if (!d) {
								if (s.now() - k < 999) return void a(Z, 999);
								var t = C(function() {
									i.loadMode = 3, B()
								});
								d = !0, i.loadMode = 3, B(), r("scroll", function() {
									3 == i.loadMode && (i.loadMode = 2), t()
								}, !0)
							}
						};
					return {
						_: function() {
							k = s.now(), n = e.getElementsByClassName(i.lazyClass), l = e.getElementsByClassName(i.lazyClass + " " + i.preloadClass), D = i.hFac, r("scroll", B, !0), r("resize", B, !0), t.MutationObserver ? new MutationObserver(B).observe(o, {
								childList: !0,
								subtree: !0,
								attributes: !0
							}) : (o.addEventListener("DOMNodeInserted", B, !0), o.addEventListener("DOMAttrModified", B, !0), setInterval(B, 999)), r("hashchange", B, !0), ["focus", "mouseover", "click", "load", "transitionend", "animationend", "webkitAnimationEnd"].forEach(function(t) {
								e.addEventListener(t, B, !0)
							}), /d$|^c/.test(e.readyState) ? Z() : (r("load", Z), e.addEventListener("DOMContentLoaded", B), a(Z, 2e4)), n.length ? (U(), T._lsFlush()) : B()
						},
						checkElems: B,
						unveil: J
					}
				}(),
				A = function() {
					var t, o = $(function(t, e, i, o) {
							var s, n, r;
							if (t._lazysizesWidth = o, o += "px", t.setAttribute("sizes", o), c.test(e.nodeName || ""))
								for (s = e.getElementsByTagName("source"), n = 0, r = s.length; n < r; n++) s[n].setAttribute("sizes", o);
							i.detail.dataAttr || w(t, i.detail)
						}),
						s = function(t, e, i) {
							var s, n = t.parentNode;
							n && (i = k(t, n, i), s = y(t, "lazybeforesizes", {
								width: i,
								dataAttr: !!e
							}), s.defaultPrevented || (i = s.detail.width) && i !== t._lazysizesWidth && o(t, n, s, i))
						},
						n = function() {
							var e, i = t.length;
							if (i)
								for (e = 0; e < i; e++) s(t[e])
						},
						a = C(n);
					return {
						_: function() {
							t = e.getElementsByClassName(i.autosizesClass), r("resize", a)
						},
						checkElems: a,
						updateElem: s
					}
				}(),
				j = function() {
					j.i || (j.i = !0, A._(), x._())
				};
			return function() {
				var e, o = {
					lazyClass: "lazyload",
					loadedClass: "lazyloaded",
					loadingClass: "lazyloading",
					preloadClass: "lazypreload",
					errorClass: "lazyerror",
					autosizesClass: "lazyautosizes",
					srcAttr: "data-src",
					srcsetAttr: "data-srcset",
					sizesAttr: "data-sizes",
					minSize: 40,
					customMedia: {},
					init: !0,
					expFactor: 1.5,
					hFac: .8,
					loadMode: 2
				};
				i = t.lazySizesConfig || t.lazysizesConfig || {};
				for (e in o) e in i || (i[e] = o[e]);
				t.lazySizesConfig = i, a(function() {
					i.init && j()
				})
			}(), {
				cfg: i,
				autoSizer: A,
				loader: x,
				init: j,
				uP: w,
				aC: g,
				rC: v,
				hC: f,
				fire: y,
				gW: k,
				rAF: T
			}
		}
	}(t, t.document);
	t.lazySizes = i, "object" == typeof module && module.exports && (module.exports = i)
}(window), function() {
	"use strict";

	function t(o) {
		if (!o) throw new Error("No options passed to Waypoint constructor");
		if (!o.element) throw new Error("No element option passed to Waypoint constructor");
		if (!o.handler) throw new Error("No handler option passed to Waypoint constructor");
		this.key = "waypoint-" + e, this.options = t.Adapter.extend({}, t.defaults, o), this.element = this.options.element, this.adapter = new t.Adapter(this.element), this.callback = o.handler, this.axis = this.options.horizontal ? "horizontal" : "vertical", this.enabled = this.options.enabled, this.triggerPoint = null, this.group = t.Group.findOrCreate({
			name: this.options.group,
			axis: this.axis
		}), this.context = t.Context.findOrCreateByElement(this.options.context), t.offsetAliases[this.options.offset] && (this.options.offset = t.offsetAliases[this.options.offset]), this.group.add(this), this.context.add(this), i[this.key] = this, e += 1
	}
	var e = 0,
		i = {};
	t.prototype.queueTrigger = function(t) {
		this.group.queueTrigger(this, t)
	}, t.prototype.trigger = function(t) {
		this.enabled && this.callback && this.callback.apply(this, t)
	}, t.prototype.destroy = function() {
		this.context.remove(this), this.group.remove(this), delete i[this.key]
	}, t.prototype.disable = function() {
		return this.enabled = !1, this
	}, t.prototype.enable = function() {
		return this.context.refresh(), this.enabled = !0, this
	}, t.prototype.next = function() {
		return this.group.next(this)
	}, t.prototype.previous = function() {
		return this.group.previous(this)
	}, t.invokeAll = function(t) {
		var e = [];
		for (var o in i) e.push(i[o]);
		for (var s = 0, n = e.length; s < n; s++) e[s][t]()
	}, t.destroyAll = function() {
		t.invokeAll("destroy")
	}, t.disableAll = function() {
		t.invokeAll("disable")
	}, t.enableAll = function() {
		t.invokeAll("enable")
	}, t.refreshAll = function() {
		t.Context.refreshAll()
	}, t.viewportHeight = function() {
		return window.innerHeight || document.documentElement.clientHeight
	}, t.viewportWidth = function() {
		return document.documentElement.clientWidth
	}, t.adapters = [], t.defaults = {
		context: window,
		continuous: !0,
		enabled: !0,
		group: "default",
		horizontal: !1,
		offset: 0
	}, t.offsetAliases = {
		"bottom-in-view": function() {
			return this.context.innerHeight() - this.adapter.outerHeight()
		},
		"right-in-view": function() {
			return this.context.innerWidth() - this.adapter.outerWidth()
		}
	}, window.Waypoint = t
}(), function() {
	"use strict";

	function t(t) {
		window.setTimeout(t, 1e3 / 60)
	}

	function e(t) {
		this.element = t, this.Adapter = s.Adapter, this.adapter = new this.Adapter(t), this.key = "waypoint-context-" + i, this.didScroll = !1, this.didResize = !1, this.oldScroll = {
			x: this.adapter.scrollLeft(),
			y: this.adapter.scrollTop()
		}, this.waypoints = {
			vertical: {},
			horizontal: {}
		}, t.waypointContextKey = this.key, o[t.waypointContextKey] = this, i += 1, this.createThrottledScrollHandler(), this.createThrottledResizeHandler()
	}
	var i = 0,
		o = {},
		s = window.Waypoint,
		n = window.onload;
	e.prototype.add = function(t) {
		var e = t.options.horizontal ? "horizontal" : "vertical";
		this.waypoints[e][t.key] = t, this.refresh()
	}, e.prototype.checkEmpty = function() {
		var t = this.Adapter.isEmptyObject(this.waypoints.horizontal),
			e = this.Adapter.isEmptyObject(this.waypoints.vertical);
		t && e && (this.adapter.off(".waypoints"), delete o[this.key])
	}, e.prototype.createThrottledResizeHandler = function() {
		function t() {
			e.handleResize(), e.didResize = !1
		}
		var e = this;
		this.adapter.on("resize.waypoints", function() {
			e.didResize || (e.didResize = !0, s.requestAnimationFrame(t))
		})
	}, e.prototype.createThrottledScrollHandler = function() {
		function t() {
			e.handleScroll(), e.didScroll = !1
		}
		var e = this;
		this.adapter.on("scroll.waypoints", function() {
			e.didScroll && !s.isTouch || (e.didScroll = !0, s.requestAnimationFrame(t))
		})
	}, e.prototype.handleResize = function() {
		s.Context.refreshAll()
	}, e.prototype.handleScroll = function() {
		var t = {},
			e = {
				horizontal: {
					newScroll: this.adapter.scrollLeft(),
					oldScroll: this.oldScroll.x,
					forward: "right",
					backward: "left"
				},
				vertical: {
					newScroll: this.adapter.scrollTop(),
					oldScroll: this.oldScroll.y,
					forward: "down",
					backward: "up"
				}
			};
		for (var i in e) {
			var o = e[i],
				s = o.newScroll > o.oldScroll,
				n = s ? o.forward : o.backward;
			for (var r in this.waypoints[i]) {
				var a = this.waypoints[i][r],
					l = o.oldScroll < a.triggerPoint,
					d = o.newScroll >= a.triggerPoint,
					c = l && d,
					p = !l && !d;
				(c || p) && (a.queueTrigger(n), t[a.group.id] = a.group)
			}
		}
		for (var u in t) t[u].flushTriggers();
		this.oldScroll = {
			x: e.horizontal.newScroll,
			y: e.vertical.newScroll
		}
	}, e.prototype.innerHeight = function() {
		return this.element == this.element.window ? s.viewportHeight() : this.adapter.innerHeight()
	}, e.prototype.remove = function(t) {
		delete this.waypoints[t.axis][t.key], this.checkEmpty()
	}, e.prototype.innerWidth = function() {
		return this.element == this.element.window ? s.viewportWidth() : this.adapter.innerWidth()
	}, e.prototype.destroy = function() {
		var t = [];
		for (var e in this.waypoints)
			for (var i in this.waypoints[e]) t.push(this.waypoints[e][i]);
		for (var o = 0, s = t.length; o < s; o++) t[o].destroy()
	}, e.prototype.refresh = function() {
		var t, e = this.element == this.element.window,
			i = e ? void 0 : this.adapter.offset(),
			o = {};
		this.handleScroll(), t = {
			horizontal: {
				contextOffset: e ? 0 : i.left,
				contextScroll: e ? 0 : this.oldScroll.x,
				contextDimension: this.innerWidth(),
				oldScroll: this.oldScroll.x,
				forward: "right",
				backward: "left",
				offsetProp: "left"
			},
			vertical: {
				contextOffset: e ? 0 : i.top,
				contextScroll: e ? 0 : this.oldScroll.y,
				contextDimension: this.innerHeight(),
				oldScroll: this.oldScroll.y,
				forward: "down",
				backward: "up",
				offsetProp: "top"
			}
		};
		for (var n in t) {
			var r = t[n];
			for (var a in this.waypoints[n]) {
				var l, d, c, p, u, h = this.waypoints[n][a],
					f = h.options.offset,
					g = h.triggerPoint,
					v = 0,
					m = null == g;
				h.element !== h.element.window && (v = h.adapter.offset()[r.offsetProp]), "function" == typeof f ? f = f.apply(h) : "string" == typeof f && (f = parseFloat(f), h.options.offset.indexOf("%") > -1 && (f = Math.ceil(r.contextDimension * f / 100))), l = r.contextScroll - r.contextOffset, h.triggerPoint = v + l - f, d = g < r.oldScroll, c = h.triggerPoint >= r.oldScroll, p = d && c, u = !d && !c, !m && p ? (h.queueTrigger(r.backward), o[h.group.id] = h.group) : !m && u ? (h.queueTrigger(r.forward), o[h.group.id] = h.group) : m && r.oldScroll >= h.triggerPoint && (h.queueTrigger(r.forward), o[h.group.id] = h.group)
			}
		}
		return s.requestAnimationFrame(function() {
			for (var t in o) o[t].flushTriggers()
		}), this
	}, e.findOrCreateByElement = function(t) {
		return e.findByElement(t) || new e(t)
	}, e.refreshAll = function() {
		for (var t in o) o[t].refresh()
	}, e.findByElement = function(t) {
		return o[t.waypointContextKey]
	}, window.onload = function() {
		n && n(), e.refreshAll()
	}, s.requestAnimationFrame = function(e) {
		(window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || t).call(window, e)
	}, s.Context = e
}(), function() {
	"use strict";

	function t(t, e) {
		return t.triggerPoint - e.triggerPoint
	}

	function e(t, e) {
		return e.triggerPoint - t.triggerPoint
	}

	function i(t) {
		this.name = t.name, this.axis = t.axis, this.id = this.name + "-" + this.axis, this.waypoints = [], this.clearTriggerQueues(), o[this.axis][this.name] = this
	}
	var o = {
			vertical: {},
			horizontal: {}
		},
		s = window.Waypoint;
	i.prototype.add = function(t) {
		this.waypoints.push(t)
	}, i.prototype.clearTriggerQueues = function() {
		this.triggerQueues = {
			up: [],
			down: [],
			left: [],
			right: []
		}
	}, i.prototype.flushTriggers = function() {
		for (var i in this.triggerQueues) {
			var o = this.triggerQueues[i],
				s = "up" === i || "left" === i;
			o.sort(s ? e : t);
			for (var n = 0, r = o.length; n < r; n += 1) {
				var a = o[n];
				(a.options.continuous || n === o.length - 1) && a.trigger([i])
			}
		}
		this.clearTriggerQueues()
	}, i.prototype.next = function(e) {
		this.waypoints.sort(t);
		var i = s.Adapter.inArray(e, this.waypoints);
		return i === this.waypoints.length - 1 ? null : this.waypoints[i + 1]
	}, i.prototype.previous = function(e) {
		this.waypoints.sort(t);
		var i = s.Adapter.inArray(e, this.waypoints);
		return i ? this.waypoints[i - 1] : null
	}, i.prototype.queueTrigger = function(t, e) {
		this.triggerQueues[e].push(t)
	}, i.prototype.remove = function(t) {
		var e = s.Adapter.inArray(t, this.waypoints);
		e > -1 && this.waypoints.splice(e, 1)
	}, i.prototype.first = function() {
		return this.waypoints[0]
	}, i.prototype.last = function() {
		return this.waypoints[this.waypoints.length - 1]
	}, i.findOrCreate = function(t) {
		return o[t.axis][t.name] || new i(t)
	}, s.Group = i
}(), function() {
	"use strict";

	function t(t) {
		return t === t.window
	}

	function e(e) {
		return t(e) ? e : e.defaultView
	}

	function i(t) {
		this.element = t, this.handlers = {}
	}
	var o = window.Waypoint;
	i.prototype.innerHeight = function() {
		return t(this.element) ? this.element.innerHeight : this.element.clientHeight
	}, i.prototype.innerWidth = function() {
		return t(this.element) ? this.element.innerWidth : this.element.clientWidth
	}, i.prototype.off = function(t, e) {
		function i(t, e, i) {
			for (var o = 0, s = e.length - 1; o < s; o++) {
				var n = e[o];
				i && i !== n || t.removeEventListener(n)
			}
		}
		var o = t.split("."),
			s = o[0],
			n = o[1],
			r = this.element;
		if (n && this.handlers[n] && s) i(r, this.handlers[n][s], e), this.handlers[n][s] = [];
		else if (s)
			for (var a in this.handlers) i(r, this.handlers[a][s] || [], e), this.handlers[a][s] = [];
		else if (n && this.handlers[n]) {
			for (var l in this.handlers[n]) i(r, this.handlers[n][l], e);
			this.handlers[n] = {}
		}
	}, i.prototype.offset = function() {
		if (!this.element.ownerDocument) return null;
		var t = this.element.ownerDocument.documentElement,
			i = e(this.element.ownerDocument),
			o = {
				top: 0,
				left: 0
			};
		return this.element.getBoundingClientRect && (o = this.element.getBoundingClientRect()), {
			top: o.top + i.pageYOffset - t.clientTop,
			left: o.left + i.pageXOffset - t.clientLeft
		}
	}, i.prototype.on = function(t, e) {
		var i = t.split("."),
			o = i[0],
			s = i[1] || "__default",
			n = this.handlers[s] = this.handlers[s] || {};
		(n[o] = n[o] || []).push(e), this.element.addEventListener(o, e)
	}, i.prototype.outerHeight = function(e) {
		var i, o = this.innerHeight();
		return e && !t(this.element) && (i = window.getComputedStyle(this.element), o += parseInt(i.marginTop, 10), o += parseInt(i.marginBottom, 10)), o
	}, i.prototype.outerWidth = function(e) {
		var i, o = this.innerWidth();
		return e && !t(this.element) && (i = window.getComputedStyle(this.element), o += parseInt(i.marginLeft, 10), o += parseInt(i.marginRight, 10)), o
	}, i.prototype.scrollLeft = function() {
		var t = e(this.element);
		return t ? t.pageXOffset : this.element.scrollLeft
	}, i.prototype.scrollTop = function() {
		var t = e(this.element);
		return t ? t.pageYOffset : this.element.scrollTop
	}, i.extend = function() {
		for (var t = Array.prototype.slice.call(arguments), e = 1, i = t.length; e < i; e++) ! function(t, e) {
			if ("object" == typeof t && "object" == typeof e)
				for (var i in e) e.hasOwnProperty(i) && (t[i] = e[i])
		}(t[0], t[e]);
		return t[0]
	}, i.inArray = function(t, e, i) {
		return null == e ? -1 : e.indexOf(t, i)
	}, i.isEmptyObject = function(t) {
		for (var e in t) return !1;
		return !0
	}, o.adapters.push({
		name: "noframework",
		Adapter: i
	}), o.Adapter = i
}(), function(t) {
	"use strict";
	"function" == typeof define && define.amd ? define(["jquery"], t) : "undefined" != typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(function(t) {
	"use strict";
	var e = window.Slick || {};
	e = function() {
		function e(e, o) {
			var s, n = this;
			n.defaults = {
				accessibility: !0,
				adaptiveHeight: !1,
				appendArrows: t(e),
				appendDots: t(e),
				arrows: !0,
				asNavFor: null,
				prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">Previous</button>',
				nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">Next</button>',
				autoplay: !1,
				autoplaySpeed: 3e3,
				centerMode: !1,
				centerPadding: "50px",
				cssEase: "ease",
				customPaging: function(e, i) {
					return t('<button type="button" data-role="none" role="button" tabindex="0" />').text(i + 1)
				},
				dots: !1,
				dotsClass: "slick-dots",
				draggable: !0,
				easing: "linear",
				edgeFriction: .35,
				fade: !1,
				focusOnSelect: !1,
				infinite: !0,
				initialSlide: 0,
				lazyLoad: "ondemand",
				mobileFirst: !1,
				pauseOnHover: !0,
				pauseOnFocus: !0,
				pauseOnDotsHover: !1,
				respondTo: "window",
				responsive: null,
				rows: 1,
				rtl: !1,
				slide: "",
				slidesPerRow: 1,
				slidesToShow: 1,
				slidesToScroll: 1,
				speed: 500,
				swipe: !0,
				swipeToSlide: !1,
				touchMove: !0,
				touchThreshold: 5,
				useCSS: !0,
				useTransform: !0,
				variableWidth: !1,
				vertical: !1,
				verticalSwiping: !1,
				waitForAnimate: !0,
				zIndex: 1e3
			}, n.initials = {
				animating: !1,
				dragging: !1,
				autoPlayTimer: null,
				currentDirection: 0,
				currentLeft: null,
				currentSlide: 0,
				direction: 1,
				$dots: null,
				listWidth: null,
				listHeight: null,
				loadIndex: 0,
				$nextArrow: null,
				$prevArrow: null,
				slideCount: null,
				slideWidth: null,
				$slideTrack: null,
				$slides: null,
				sliding: !1,
				slideOffset: 0,
				swipeLeft: null,
				$list: null,
				touchObject: {},
				transformsEnabled: !1,
				unslicked: !1
			}, t.extend(n, n.initials), n.activeBreakpoint = null, n.animType = null, n.animProp = null, n.breakpoints = [], n.breakpointSettings = [], n.cssTransitions = !1, n.focussed = !1, n.interrupted = !1, n.hidden = "hidden", n.paused = !0, n.positionProp = null, n.respondTo = null, n.rowCount = 1, n.shouldClick = !0, n.$slider = t(e), n.$slidesCache = null, n.transformType = null, n.transitionType = null, n.visibilityChange = "visibilitychange", n.windowWidth = 0, n.windowTimer = null, s = t(e).data("slick") || {}, n.options = t.extend({}, n.defaults, o, s), n.currentSlide = n.options.initialSlide, n.originalSettings = n.options, void 0 !== document.mozHidden ? (n.hidden = "mozHidden", n.visibilityChange = "mozvisibilitychange") : void 0 !== document.webkitHidden && (n.hidden = "webkitHidden", n.visibilityChange = "webkitvisibilitychange"), n.autoPlay = t.proxy(n.autoPlay, n), n.autoPlayClear = t.proxy(n.autoPlayClear, n), n.autoPlayIterator = t.proxy(n.autoPlayIterator, n), n.changeSlide = t.proxy(n.changeSlide, n), n.clickHandler = t.proxy(n.clickHandler, n), n.selectHandler = t.proxy(n.selectHandler, n), n.setPosition = t.proxy(n.setPosition, n), n.swipeHandler = t.proxy(n.swipeHandler, n), n.dragHandler = t.proxy(n.dragHandler, n), n.keyHandler = t.proxy(n.keyHandler, n), n.instanceUid = i++, n.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, n.registerBreakpoints(), n.init(!0)
		}
		var i = 0;
		return e
	}(), e.prototype.activateADA = function() {
		this.$slideTrack.find(".slick-active").attr({
			"aria-hidden": "false"
		}).find("a, input, button, select").attr({
			tabindex: "0"
		})
	}, e.prototype.addSlide = e.prototype.slickAdd = function(e, i, o) {
		var s = this;
		if ("boolean" == typeof i) o = i, i = null;
		else if (i < 0 || i >= s.slideCount) return !1;
		s.unload(), "number" == typeof i ? 0 === i && 0 === s.$slides.length ? t(e).appendTo(s.$slideTrack) : o ? t(e).insertBefore(s.$slides.eq(i)) : t(e).insertAfter(s.$slides.eq(i)) : !0 === o ? t(e).prependTo(s.$slideTrack) : t(e).appendTo(s.$slideTrack), s.$slides = s.$slideTrack.children(this.options.slide), s.$slideTrack.children(this.options.slide).detach(), s.$slideTrack.append(s.$slides), s.$slides.each(function(e, i) {
			t(i).attr("data-slick-index", e)
		}), s.$slidesCache = s.$slides, s.reinit()
	}, e.prototype.animateHeight = function() {
		var t = this;
		if (1 === t.options.slidesToShow && !0 === t.options.adaptiveHeight && !1 === t.options.vertical) {
			var e = t.$slides.eq(t.currentSlide).outerHeight(!0);
			t.$list.animate({
				height: e
			}, t.options.speed)
		}
	}, e.prototype.animateSlide = function(e, i) {
		var o = {},
			s = this;
		s.animateHeight(), !0 === s.options.rtl && !1 === s.options.vertical && (e = -e), !1 === s.transformsEnabled ? !1 === s.options.vertical ? s.$slideTrack.animate({
			left: e
		}, s.options.speed, s.options.easing, i) : s.$slideTrack.animate({
			top: e
		}, s.options.speed, s.options.easing, i) : !1 === s.cssTransitions ? (!0 === s.options.rtl && (s.currentLeft = -s.currentLeft), t({
			animStart: s.currentLeft
		}).animate({
			animStart: e
		}, {
			duration: s.options.speed,
			easing: s.options.easing,
			step: function(t) {
				t = Math.ceil(t), !1 === s.options.vertical ? (o[s.animType] = "translate(" + t + "px, 0px)", s.$slideTrack.css(o)) : (o[s.animType] = "translate(0px," + t + "px)", s.$slideTrack.css(o))
			},
			complete: function() {
				i && i.call()
			}
		})) : (s.applyTransition(), e = Math.ceil(e), !1 === s.options.vertical ? o[s.animType] = "translate3d(" + e + "px, 0px, 0px)" : o[s.animType] = "translate3d(0px," + e + "px, 0px)", s.$slideTrack.css(o), i && setTimeout(function() {
			s.disableTransition(), i.call()
		}, s.options.speed))
	}, e.prototype.getNavTarget = function() {
		var e = this,
			i = e.options.asNavFor;
		return i && null !== i && (i = t(i).not(e.$slider)), i
	}, e.prototype.asNavFor = function(e) {
		var i = this,
			o = i.getNavTarget();
		null !== o && "object" == typeof o && o.each(function() {
			var i = t(this).slick("getSlick");
			i.unslicked || i.slideHandler(e, !0)
		})
	}, e.prototype.applyTransition = function(t) {
		var e = this,
			i = {};
		!1 === e.options.fade ? i[e.transitionType] = e.transformType + " " + e.options.speed + "ms " + e.options.cssEase : i[e.transitionType] = "opacity " + e.options.speed + "ms " + e.options.cssEase, !1 === e.options.fade ? e.$slideTrack.css(i) : e.$slides.eq(t).css(i)
	}, e.prototype.autoPlay = function() {
		var t = this;
		t.autoPlayClear(), t.slideCount > t.options.slidesToShow && (t.autoPlayTimer = setInterval(t.autoPlayIterator, t.options.autoplaySpeed))
	}, e.prototype.autoPlayClear = function() {
		var t = this;
		t.autoPlayTimer && clearInterval(t.autoPlayTimer)
	}, e.prototype.autoPlayIterator = function() {
		var t = this,
			e = t.currentSlide + t.options.slidesToScroll;
		t.paused || t.interrupted || t.focussed || (!1 === t.options.infinite && (1 === t.direction && t.currentSlide + 1 === t.slideCount - 1 ? t.direction = 0 : 0 === t.direction && (e = t.currentSlide - t.options.slidesToScroll, t.currentSlide - 1 == 0 && (t.direction = 1))), t.slideHandler(e))
	}, e.prototype.buildArrows = function() {
		var e = this;
		!0 === e.options.arrows && (e.$prevArrow = t(e.options.prevArrow).addClass("slick-arrow"), e.$nextArrow = t(e.options.nextArrow).addClass("slick-arrow"), e.slideCount > e.options.slidesToShow ? (e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options.appendArrows), e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.appendTo(e.options.appendArrows), !0 !== e.options.infinite && e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({
			"aria-disabled": "true",
			tabindex: "-1"
		}))
	}, e.prototype.buildDots = function() {
		var e, i, o = this;
		if (!0 === o.options.dots && o.slideCount > o.options.slidesToShow) {
			for (o.$slider.addClass("slick-dotted"), i = t("<ul />").addClass(o.options.dotsClass), e = 0; e <= o.getDotCount(); e += 1) i.append(t("<li />").append(o.options.customPaging.call(this, o, e)));
			o.$dots = i.appendTo(o.options.appendDots), o.$dots.find("li").first().addClass("slick-active").attr("aria-hidden", "false")
		}
	}, e.prototype.buildOut = function() {
		var e = this;
		e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), e.slideCount = e.$slides.length, e.$slides.each(function(e, i) {
			t(i).attr("data-slick-index", e).data("originalStyling", t(i).attr("style") || "")
		}), e.$slider.addClass("slick-slider"), e.$slideTrack = 0 === e.slideCount ? t('<div class="slick-track"/>').appendTo(e.$slider) : e.$slides.wrapAll('<div class="slick-track"/>').parent(), e.$list = e.$slideTrack.wrap('<div aria-live="polite" class="slick-list"/>').parent(), e.$slideTrack.css("opacity", 0), !0 !== e.options.centerMode && !0 !== e.options.swipeToSlide || (e.options.slidesToScroll = 1), t("img[data-lazy]", e.$slider).not("[src]").addClass("slick-loading"), e.setupInfinite(), e.buildArrows(), e.buildDots(), e.updateDots(), e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0), !0 === e.options.draggable && e.$list.addClass("draggable")
	}, e.prototype.buildRows = function() {
		var t, e, i, o, s, n, r, a = this;
		if (o = document.createDocumentFragment(), n = a.$slider.children(), a.options.rows > 1) {
			for (r = a.options.slidesPerRow * a.options.rows, s = Math.ceil(n.length / r), t = 0; t < s; t++) {
				var l = document.createElement("div");
				for (e = 0; e < a.options.rows; e++) {
					var d = document.createElement("div");
					for (i = 0; i < a.options.slidesPerRow; i++) {
						var c = t * r + (e * a.options.slidesPerRow + i);
						n.get(c) && d.appendChild(n.get(c))
					}
					l.appendChild(d)
				}
				o.appendChild(l)
			}
			a.$slider.empty().append(o), a.$slider.children().children().children().css({
				width: 100 / a.options.slidesPerRow + "%",
				display: "inline-block"
			})
		}
	}, e.prototype.checkResponsive = function(e, i) {
		var o, s, n, r = this,
			a = !1,
			l = r.$slider.width(),
			d = window.innerWidth || t(window).width();
		if ("window" === r.respondTo ? n = d : "slider" === r.respondTo ? n = l : "min" === r.respondTo && (n = Math.min(d, l)), r.options.responsive && r.options.responsive.length && null !== r.options.responsive) {
			s = null;
			for (o in r.breakpoints) r.breakpoints.hasOwnProperty(o) && (!1 === r.originalSettings.mobileFirst ? n < r.breakpoints[o] && (s = r.breakpoints[o]) : n > r.breakpoints[o] && (s = r.breakpoints[o]));
			null !== s ? null !== r.activeBreakpoint ? (s !== r.activeBreakpoint || i) && (r.activeBreakpoint = s, "unslick" === r.breakpointSettings[s] ? r.unslick(s) : (r.options = t.extend({}, r.originalSettings, r.breakpointSettings[s]), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)), a = s) : (r.activeBreakpoint = s, "unslick" === r.breakpointSettings[s] ? r.unslick(s) : (r.options = t.extend({}, r.originalSettings, r.breakpointSettings[s]), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)), a = s) : null !== r.activeBreakpoint && (r.activeBreakpoint = null, r.options = r.originalSettings, !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e), a = s), e || !1 === a || r.$slider.trigger("breakpoint", [r, a])
		}
	}, e.prototype.changeSlide = function(e, i) {
		var o, s, n, r = this,
			a = t(e.currentTarget);
		switch (a.is("a") && e.preventDefault(), a.is("li") || (a = a.closest("li")), n = r.slideCount % r.options.slidesToScroll != 0, o = n ? 0 : (r.slideCount - r.currentSlide) % r.options.slidesToScroll, e.data.message) {
			case "previous":
				s = 0 === o ? r.options.slidesToScroll : r.options.slidesToShow - o, r.slideCount > r.options.slidesToShow && r.slideHandler(r.currentSlide - s, !1, i);
				break;
			case "next":
				s = 0 === o ? r.options.slidesToScroll : o, r.slideCount > r.options.slidesToShow && r.slideHandler(r.currentSlide + s, !1, i);
				break;
			case "index":
				var l = 0 === e.data.index ? 0 : e.data.index || a.index() * r.options.slidesToScroll;
				r.slideHandler(r.checkNavigable(l), !1, i), a.children().trigger("focus");
				break;
			default:
				return
		}
	}, e.prototype.checkNavigable = function(t) {
		var e, i, o = this;
		if (e = o.getNavigableIndexes(), i = 0, t > e[e.length - 1]) t = e[e.length - 1];
		else
			for (var s in e) {
				if (t < e[s]) {
					t = i;
					break
				}
				i = e[s]
			}
		return t
	}, e.prototype.cleanUpEvents = function() {
		var e = this;
		e.options.dots && null !== e.$dots && t("li", e.$dots).off("click.slick", e.changeSlide).off("mouseenter.slick", t.proxy(e.interrupt, e, !0)).off("mouseleave.slick", t.proxy(e.interrupt, e, !1)), e.$slider.off("focus.slick blur.slick"), !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow && e.$prevArrow.off("click.slick", e.changeSlide), e.$nextArrow && e.$nextArrow.off("click.slick", e.changeSlide)), e.$list.off("touchstart.slick mousedown.slick", e.swipeHandler), e.$list.off("touchmove.slick mousemove.slick", e.swipeHandler), e.$list.off("touchend.slick mouseup.slick", e.swipeHandler), e.$list.off("touchcancel.slick mouseleave.slick", e.swipeHandler), e.$list.off("click.slick", e.clickHandler), t(document).off(e.visibilityChange, e.visibility), e.cleanUpSlideEvents(), !0 === e.options.accessibility && e.$list.off("keydown.slick", e.keyHandler), !0 === e.options.focusOnSelect && t(e.$slideTrack).children().off("click.slick", e.selectHandler), t(window).off("orientationchange.slick.slick-" + e.instanceUid, e.orientationChange), t(window).off("resize.slick.slick-" + e.instanceUid, e.resize), t("[draggable!=true]", e.$slideTrack).off("dragstart", e.preventDefault), t(window).off("load.slick.slick-" + e.instanceUid, e.setPosition), t(document).off("ready.slick.slick-" + e.instanceUid, e.setPosition)
	}, e.prototype.cleanUpSlideEvents = function() {
		var e = this;
		e.$list.off("mouseenter.slick", t.proxy(e.interrupt, e, !0)), e.$list.off("mouseleave.slick", t.proxy(e.interrupt, e, !1))
	}, e.prototype.cleanUpRows = function() {
		var t, e = this;
		e.options.rows > 1 && (t = e.$slides.children().children(), t.removeAttr("style"), e.$slider.empty().append(t))
	}, e.prototype.clickHandler = function(t) {
		!1 === this.shouldClick && (t.stopImmediatePropagation(), t.stopPropagation(), t.preventDefault())
	}, e.prototype.destroy = function(e) {
		var i = this;
		i.autoPlayClear(), i.touchObject = {}, i.cleanUpEvents(), t(".slick-cloned", i.$slider).detach(), i.$dots && i.$dots.remove(), i.$prevArrow && i.$prevArrow.length && (i.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), i.htmlExpr.test(i.options.prevArrow) && i.$prevArrow.remove()), i.$nextArrow && i.$nextArrow.length && (i.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), i.htmlExpr.test(i.options.nextArrow) && i.$nextArrow.remove()), i.$slides && (i.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function() {
			t(this).attr("style", t(this).data("originalStyling"))
		}), i.$slideTrack.children(this.options.slide).detach(), i.$slideTrack.detach(), i.$list.detach(), i.$slider.append(i.$slides)), i.cleanUpRows(), i.$slider.removeClass("slick-slider"), i.$slider.removeClass("slick-initialized"), i.$slider.removeClass("slick-dotted"), i.unslicked = !0, e || i.$slider.trigger("destroy", [i])
	}, e.prototype.disableTransition = function(t) {
		var e = this,
			i = {};
		i[e.transitionType] = "", !1 === e.options.fade ? e.$slideTrack.css(i) : e.$slides.eq(t).css(i)
	}, e.prototype.fadeSlide = function(t, e) {
		var i = this;
		!1 === i.cssTransitions ? (i.$slides.eq(t).css({
			zIndex: i.options.zIndex
		}), i.$slides.eq(t).animate({
			opacity: 1
		}, i.options.speed, i.options.easing, e)) : (i.applyTransition(t), i.$slides.eq(t).css({
			opacity: 1,
			zIndex: i.options.zIndex
		}), e && setTimeout(function() {
			i.disableTransition(t), e.call()
		}, i.options.speed))
	}, e.prototype.fadeSlideOut = function(t) {
		var e = this;
		!1 === e.cssTransitions ? e.$slides.eq(t).animate({
			opacity: 0,
			zIndex: e.options.zIndex - 2
		}, e.options.speed, e.options.easing) : (e.applyTransition(t), e.$slides.eq(t).css({
			opacity: 0,
			zIndex: e.options.zIndex - 2
		}))
	}, e.prototype.filterSlides = e.prototype.slickFilter = function(t) {
		var e = this;
		null !== t && (e.$slidesCache = e.$slides, e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.filter(t).appendTo(e.$slideTrack), e.reinit())
	}, e.prototype.focusHandler = function() {
		var e = this;
		e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*:not(.slick-arrow)", function(i) {
			i.stopImmediatePropagation();
			var o = t(this);
			setTimeout(function() {
				e.options.pauseOnFocus && (e.focussed = o.is(":focus"), e.autoPlay())
			}, 0)
		})
	}, e.prototype.getCurrent = e.prototype.slickCurrentSlide = function() {
		return this.currentSlide
	}, e.prototype.getDotCount = function() {
		var t = this,
			e = 0,
			i = 0,
			o = 0;
		if (!0 === t.options.infinite)
			for (; e < t.slideCount;) ++o, e = i + t.options.slidesToScroll,
				i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll : t.options.slidesToShow;
		else if (!0 === t.options.centerMode) o = t.slideCount;
		else if (t.options.asNavFor)
			for (; e < t.slideCount;) ++o, e = i + t.options.slidesToScroll, i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll : t.options.slidesToShow;
		else o = 1 + Math.ceil((t.slideCount - t.options.slidesToShow) / t.options.slidesToScroll);
		return o - 1
	}, e.prototype.getLeft = function(t) {
		var e, i, o, s = this,
			n = 0;
		return s.slideOffset = 0, i = s.$slides.first().outerHeight(!0), !0 === s.options.infinite ? (s.slideCount > s.options.slidesToShow && (s.slideOffset = s.slideWidth * s.options.slidesToShow * -1, n = i * s.options.slidesToShow * -1), s.slideCount % s.options.slidesToScroll != 0 && t + s.options.slidesToScroll > s.slideCount && s.slideCount > s.options.slidesToShow && (t > s.slideCount ? (s.slideOffset = (s.options.slidesToShow - (t - s.slideCount)) * s.slideWidth * -1, n = (s.options.slidesToShow - (t - s.slideCount)) * i * -1) : (s.slideOffset = s.slideCount % s.options.slidesToScroll * s.slideWidth * -1, n = s.slideCount % s.options.slidesToScroll * i * -1))) : t + s.options.slidesToShow > s.slideCount && (s.slideOffset = (t + s.options.slidesToShow - s.slideCount) * s.slideWidth, n = (t + s.options.slidesToShow - s.slideCount) * i), s.slideCount <= s.options.slidesToShow && (s.slideOffset = 0, n = 0), !0 === s.options.centerMode && !0 === s.options.infinite ? s.slideOffset += s.slideWidth * Math.floor(s.options.slidesToShow / 2) - s.slideWidth : !0 === s.options.centerMode && (s.slideOffset = 0, s.slideOffset += s.slideWidth * Math.floor(s.options.slidesToShow / 2)), e = !1 === s.options.vertical ? t * s.slideWidth * -1 + s.slideOffset : t * i * -1 + n, !0 === s.options.variableWidth && (o = s.slideCount <= s.options.slidesToShow || !1 === s.options.infinite ? s.$slideTrack.children(".slick-slide").eq(t) : s.$slideTrack.children(".slick-slide").eq(t + s.options.slidesToShow), e = !0 === s.options.rtl ? o[0] ? -1 * (s.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ? -1 * o[0].offsetLeft : 0, !0 === s.options.centerMode && (o = s.slideCount <= s.options.slidesToShow || !1 === s.options.infinite ? s.$slideTrack.children(".slick-slide").eq(t) : s.$slideTrack.children(".slick-slide").eq(t + s.options.slidesToShow + 1), e = !0 === s.options.rtl ? o[0] ? -1 * (s.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ? -1 * o[0].offsetLeft : 0, e += (s.$list.width() - o.outerWidth()) / 2)), e
	}, e.prototype.getOption = e.prototype.slickGetOption = function(t) {
		return this.options[t]
	}, e.prototype.getNavigableIndexes = function() {
		var t, e = this,
			i = 0,
			o = 0,
			s = [];
		for (!1 === e.options.infinite ? t = e.slideCount : (i = -1 * e.options.slidesToScroll, o = -1 * e.options.slidesToScroll, t = 2 * e.slideCount); i < t;) s.push(i), i = o + e.options.slidesToScroll, o += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
		return s
	}, e.prototype.getSlick = function() {
		return this
	}, e.prototype.getSlideCount = function() {
		var e, i, o = this;
		return i = !0 === o.options.centerMode ? o.slideWidth * Math.floor(o.options.slidesToShow / 2) : 0, !0 === o.options.swipeToSlide ? (o.$slideTrack.find(".slick-slide").each(function(s, n) {
			if (n.offsetLeft - i + t(n).outerWidth() / 2 > -1 * o.swipeLeft) return e = n, !1
		}), Math.abs(t(e).attr("data-slick-index") - o.currentSlide) || 1) : o.options.slidesToScroll
	}, e.prototype.goTo = e.prototype.slickGoTo = function(t, e) {
		this.changeSlide({
			data: {
				message: "index",
				index: parseInt(t)
			}
		}, e)
	}, e.prototype.init = function(e) {
		var i = this;
		t(i.$slider).hasClass("slick-initialized") || (t(i.$slider).addClass("slick-initialized"), i.buildRows(), i.buildOut(), i.setProps(), i.startLoad(), i.loadSlider(), i.initializeEvents(), i.updateArrows(), i.updateDots(), i.checkResponsive(!0), i.focusHandler()), e && i.$slider.trigger("init", [i]), !0 === i.options.accessibility && i.initADA(), i.options.autoplay && (i.paused = !1, i.autoPlay())
	}, e.prototype.initADA = function() {
		var e = this;
		e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({
			"aria-hidden": "true",
			tabindex: "-1"
		}).find("a, input, button, select").attr({
			tabindex: "-1"
		}), e.$slideTrack.attr("role", "listbox"), e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function(i) {
			t(this).attr({
				role: "option",
				"aria-describedby": "slick-slide" + e.instanceUid + i
			})
		}), null !== e.$dots && e.$dots.attr("role", "tablist").find("li").each(function(i) {
			t(this).attr({
				role: "presentation",
				"aria-selected": "false",
				"aria-controls": "navigation" + e.instanceUid + i,
				id: "slick-slide" + e.instanceUid + i
			})
		}).first().attr("aria-selected", "true").end().find("button").attr("role", "button").end().closest("div").attr("role", "toolbar"), e.activateADA()
	}, e.prototype.initArrowEvents = function() {
		var t = this;
		!0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow.off("click.slick").on("click.slick", {
			message: "previous"
		}, t.changeSlide), t.$nextArrow.off("click.slick").on("click.slick", {
			message: "next"
		}, t.changeSlide))
	}, e.prototype.initDotEvents = function() {
		var e = this;
		!0 === e.options.dots && e.slideCount > e.options.slidesToShow && t("li", e.$dots).on("click.slick", {
			message: "index"
		}, e.changeSlide), !0 === e.options.dots && !0 === e.options.pauseOnDotsHover && t("li", e.$dots).on("mouseenter.slick", t.proxy(e.interrupt, e, !0)).on("mouseleave.slick", t.proxy(e.interrupt, e, !1))
	}, e.prototype.initSlideEvents = function() {
		var e = this;
		e.options.pauseOnHover && (e.$list.on("mouseenter.slick", t.proxy(e.interrupt, e, !0)), e.$list.on("mouseleave.slick", t.proxy(e.interrupt, e, !1)))
	}, e.prototype.initializeEvents = function() {
		var e = this;
		e.initArrowEvents(), e.initDotEvents(), e.initSlideEvents(), e.$list.on("touchstart.slick mousedown.slick", {
			action: "start"
		}, e.swipeHandler), e.$list.on("touchmove.slick mousemove.slick", {
			action: "move"
		}, e.swipeHandler), e.$list.on("touchend.slick mouseup.slick", {
			action: "end"
		}, e.swipeHandler), e.$list.on("touchcancel.slick mouseleave.slick", {
			action: "end"
		}, e.swipeHandler), e.$list.on("click.slick", e.clickHandler), t(document).on(e.visibilityChange, t.proxy(e.visibility, e)), !0 === e.options.accessibility && e.$list.on("keydown.slick", e.keyHandler), !0 === e.options.focusOnSelect && t(e.$slideTrack).children().on("click.slick", e.selectHandler), t(window).on("orientationchange.slick.slick-" + e.instanceUid, t.proxy(e.orientationChange, e)), t(window).on("resize.slick.slick-" + e.instanceUid, t.proxy(e.resize, e)), t("[draggable!=true]", e.$slideTrack).on("dragstart", e.preventDefault), t(window).on("load.slick.slick-" + e.instanceUid, e.setPosition), t(document).on("ready.slick.slick-" + e.instanceUid, e.setPosition)
	}, e.prototype.initUI = function() {
		var t = this;
		!0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow.show(), t.$nextArrow.show()), !0 === t.options.dots && t.slideCount > t.options.slidesToShow && t.$dots.show()
	}, e.prototype.keyHandler = function(t) {
		var e = this;
		t.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === t.keyCode && !0 === e.options.accessibility ? e.changeSlide({
			data: {
				message: !0 === e.options.rtl ? "next" : "previous"
			}
		}) : 39 === t.keyCode && !0 === e.options.accessibility && e.changeSlide({
			data: {
				message: !0 === e.options.rtl ? "previous" : "next"
			}
		}))
	}, e.prototype.lazyLoad = function() {
		function e(e) {
			t("img[data-lazy]", e).each(function() {
				var e = t(this),
					i = t(this).attr("data-lazy"),
					o = document.createElement("img");
				o.onload = function() {
					e.animate({
						opacity: 0
					}, 100, function() {
						e.attr("src", i).animate({
							opacity: 1
						}, 200, function() {
							e.removeAttr("data-lazy").removeClass("slick-loading")
						}), r.$slider.trigger("lazyLoaded", [r, e, i])
					})
				}, o.onerror = function() {
					e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), r.$slider.trigger("lazyLoadError", [r, e, i])
				}, o.src = i
			})
		}
		var i, o, s, n, r = this;
		!0 === r.options.centerMode ? !0 === r.options.infinite ? (s = r.currentSlide + (r.options.slidesToShow / 2 + 1), n = s + r.options.slidesToShow + 2) : (s = Math.max(0, r.currentSlide - (r.options.slidesToShow / 2 + 1)), n = r.options.slidesToShow / 2 + 1 + 2 + r.currentSlide) : (s = r.options.infinite ? r.options.slidesToShow + r.currentSlide : r.currentSlide, n = Math.ceil(s + r.options.slidesToShow), !0 === r.options.fade && (s > 0 && s--, n <= r.slideCount && n++)), i = r.$slider.find(".slick-slide").slice(s, n), e(i), r.slideCount <= r.options.slidesToShow ? (o = r.$slider.find(".slick-slide"), e(o)) : r.currentSlide >= r.slideCount - r.options.slidesToShow ? (o = r.$slider.find(".slick-cloned").slice(0, r.options.slidesToShow), e(o)) : 0 === r.currentSlide && (o = r.$slider.find(".slick-cloned").slice(-1 * r.options.slidesToShow), e(o))
	}, e.prototype.loadSlider = function() {
		var t = this;
		t.setPosition(), t.$slideTrack.css({
			opacity: 1
		}), t.$slider.removeClass("slick-loading"), t.initUI(), "progressive" === t.options.lazyLoad && t.progressiveLazyLoad()
	}, e.prototype.next = e.prototype.slickNext = function() {
		this.changeSlide({
			data: {
				message: "next"
			}
		})
	}, e.prototype.orientationChange = function() {
		var t = this;
		t.checkResponsive(), t.setPosition()
	}, e.prototype.pause = e.prototype.slickPause = function() {
		var t = this;
		t.autoPlayClear(), t.paused = !0
	}, e.prototype.play = e.prototype.slickPlay = function() {
		var t = this;
		t.autoPlay(), t.options.autoplay = !0, t.paused = !1, t.focussed = !1, t.interrupted = !1
	}, e.prototype.postSlide = function(t) {
		var e = this;
		e.unslicked || (e.$slider.trigger("afterChange", [e, t]), e.animating = !1, e.setPosition(), e.swipeLeft = null, e.options.autoplay && e.autoPlay(), !0 === e.options.accessibility && e.initADA())
	}, e.prototype.prev = e.prototype.slickPrev = function() {
		this.changeSlide({
			data: {
				message: "previous"
			}
		})
	}, e.prototype.preventDefault = function(t) {
		t.preventDefault()
	}, e.prototype.progressiveLazyLoad = function(e) {
		e = e || 1;
		var i, o, s, n = this,
			r = t("img[data-lazy]", n.$slider);
		r.length ? (i = r.first(), o = i.attr("data-lazy"), s = document.createElement("img"), s.onload = function() {
			i.attr("src", o).removeAttr("data-lazy").removeClass("slick-loading"), !0 === n.options.adaptiveHeight && n.setPosition(), n.$slider.trigger("lazyLoaded", [n, i, o]), n.progressiveLazyLoad()
		}, s.onerror = function() {
			e < 3 ? setTimeout(function() {
				n.progressiveLazyLoad(e + 1)
			}, 500) : (i.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), n.$slider.trigger("lazyLoadError", [n, i, o]), n.progressiveLazyLoad())
		}, s.src = o) : n.$slider.trigger("allImagesLoaded", [n])
	}, e.prototype.refresh = function(e) {
		var i, o, s = this;
		o = s.slideCount - s.options.slidesToShow, !s.options.infinite && s.currentSlide > o && (s.currentSlide = o), s.slideCount <= s.options.slidesToShow && (s.currentSlide = 0), i = s.currentSlide, s.destroy(!0), t.extend(s, s.initials, {
			currentSlide: i
		}), s.init(), e || s.changeSlide({
			data: {
				message: "index",
				index: i
			}
		}, !1)
	}, e.prototype.registerBreakpoints = function() {
		var e, i, o, s = this,
			n = s.options.responsive || null;
		if ("array" === t.type(n) && n.length) {
			s.respondTo = s.options.respondTo || "window";
			for (e in n)
				if (o = s.breakpoints.length - 1, i = n[e].breakpoint, n.hasOwnProperty(e)) {
					for (; o >= 0;) s.breakpoints[o] && s.breakpoints[o] === i && s.breakpoints.splice(o, 1), o--;
					s.breakpoints.push(i), s.breakpointSettings[i] = n[e].settings
				}
			s.breakpoints.sort(function(t, e) {
				return s.options.mobileFirst ? t - e : e - t
			})
		}
	}, e.prototype.reinit = function() {
		var e = this;
		e.$slides = e.$slideTrack.children(e.options.slide).addClass("slick-slide"), e.slideCount = e.$slides.length, e.currentSlide >= e.slideCount && 0 !== e.currentSlide && (e.currentSlide = e.currentSlide - e.options.slidesToScroll), e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0), e.registerBreakpoints(), e.setProps(), e.setupInfinite(), e.buildArrows(), e.updateArrows(), e.initArrowEvents(), e.buildDots(), e.updateDots(), e.initDotEvents(), e.cleanUpSlideEvents(), e.initSlideEvents(), e.checkResponsive(!1, !0), !0 === e.options.focusOnSelect && t(e.$slideTrack).children().on("click.slick", e.selectHandler), e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0), e.setPosition(), e.focusHandler(), e.paused = !e.options.autoplay, e.autoPlay(), e.$slider.trigger("reInit", [e])
	}, e.prototype.resize = function() {
		var e = this;
		t(window).width() !== e.windowWidth && (clearTimeout(e.windowDelay), e.windowDelay = window.setTimeout(function() {
			e.windowWidth = t(window).width(), e.checkResponsive(), e.unslicked || e.setPosition()
		}, 50))
	}, e.prototype.removeSlide = e.prototype.slickRemove = function(t, e, i) {
		var o = this;
		if ("boolean" == typeof t ? (e = t, t = !0 === e ? 0 : o.slideCount - 1) : t = !0 === e ? --t : t, o.slideCount < 1 || t < 0 || t > o.slideCount - 1) return !1;
		o.unload(), !0 === i ? o.$slideTrack.children().remove() : o.$slideTrack.children(this.options.slide).eq(t).remove(), o.$slides = o.$slideTrack.children(this.options.slide), o.$slideTrack.children(this.options.slide).detach(), o.$slideTrack.append(o.$slides), o.$slidesCache = o.$slides, o.reinit()
	}, e.prototype.setCSS = function(t) {
		var e, i, o = this,
			s = {};
		!0 === o.options.rtl && (t = -t), e = "left" == o.positionProp ? Math.ceil(t) + "px" : "0px", i = "top" == o.positionProp ? Math.ceil(t) + "px" : "0px", s[o.positionProp] = t, !1 === o.transformsEnabled ? o.$slideTrack.css(s) : (s = {}, !1 === o.cssTransitions ? (s[o.animType] = "translate(" + e + ", " + i + ")", o.$slideTrack.css(s)) : (s[o.animType] = "translate3d(" + e + ", " + i + ", 0px)", o.$slideTrack.css(s)))
	}, e.prototype.setDimensions = function() {
		var t = this;
		!1 === t.options.vertical ? !0 === t.options.centerMode && t.$list.css({
			padding: "0px " + t.options.centerPadding
		}) : (t.$list.height(t.$slides.first().outerHeight(!0) * t.options.slidesToShow), !0 === t.options.centerMode && t.$list.css({
			padding: t.options.centerPadding + " 0px"
		})), t.listWidth = t.$list.width(), t.listHeight = t.$list.height(), !1 === t.options.vertical && !1 === t.options.variableWidth ? (t.slideWidth = Math.ceil(t.listWidth / t.options.slidesToShow), t.$slideTrack.width(Math.ceil(t.slideWidth * t.$slideTrack.children(".slick-slide").length))) : !0 === t.options.variableWidth ? t.$slideTrack.width(5e3 * t.slideCount) : (t.slideWidth = Math.ceil(t.listWidth), t.$slideTrack.height(Math.ceil(t.$slides.first().outerHeight(!0) * t.$slideTrack.children(".slick-slide").length)));
		var e = t.$slides.first().outerWidth(!0) - t.$slides.first().width();
		!1 === t.options.variableWidth && t.$slideTrack.children(".slick-slide").width(t.slideWidth - e)
	}, e.prototype.setFade = function() {
		var e, i = this;
		i.$slides.each(function(o, s) {
			e = i.slideWidth * o * -1, !0 === i.options.rtl ? t(s).css({
				position: "relative",
				right: e,
				top: 0,
				zIndex: i.options.zIndex - 2,
				opacity: 0
			}) : t(s).css({
				position: "relative",
				left: e,
				top: 0,
				zIndex: i.options.zIndex - 2,
				opacity: 0
			})
		}), i.$slides.eq(i.currentSlide).css({
			zIndex: i.options.zIndex - 1,
			opacity: 1
		})
	}, e.prototype.setHeight = function() {
		var t = this;
		if (1 === t.options.slidesToShow && !0 === t.options.adaptiveHeight && !1 === t.options.vertical) {
			var e = t.$slides.eq(t.currentSlide).outerHeight(!0);
			t.$list.css("height", e)
		}
	}, e.prototype.setOption = e.prototype.slickSetOption = function() {
		var e, i, o, s, n, r = this,
			a = !1;
		if ("object" === t.type(arguments[0]) ? (o = arguments[0], a = arguments[1], n = "multiple") : "string" === t.type(arguments[0]) && (o = arguments[0], s = arguments[1], a = arguments[2], "responsive" === arguments[0] && "array" === t.type(arguments[1]) ? n = "responsive" : void 0 !== arguments[1] && (n = "single")), "single" === n) r.options[o] = s;
		else if ("multiple" === n) t.each(o, function(t, e) {
			r.options[t] = e
		});
		else if ("responsive" === n)
			for (i in s)
				if ("array" !== t.type(r.options.responsive)) r.options.responsive = [s[i]];
				else {
					for (e = r.options.responsive.length - 1; e >= 0;) r.options.responsive[e].breakpoint === s[i].breakpoint && r.options.responsive.splice(e, 1), e--;
					r.options.responsive.push(s[i])
				}
		a && (r.unload(), r.reinit())
	}, e.prototype.setPosition = function() {
		var t = this;
		t.setDimensions(), t.setHeight(), !1 === t.options.fade ? t.setCSS(t.getLeft(t.currentSlide)) : t.setFade(), t.$slider.trigger("setPosition", [t])
	}, e.prototype.setProps = function() {
		var t = this,
			e = document.body.style;
		t.positionProp = !0 === t.options.vertical ? "top" : "left", "top" === t.positionProp ? t.$slider.addClass("slick-vertical") : t.$slider.removeClass("slick-vertical"), void 0 === e.WebkitTransition && void 0 === e.MozTransition && void 0 === e.msTransition || !0 === t.options.useCSS && (t.cssTransitions = !0), t.options.fade && ("number" == typeof t.options.zIndex ? t.options.zIndex < 3 && (t.options.zIndex = 3) : t.options.zIndex = t.defaults.zIndex), void 0 !== e.OTransform && (t.animType = "OTransform", t.transformType = "-o-transform", t.transitionType = "OTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (t.animType = !1)), void 0 !== e.MozTransform && (t.animType = "MozTransform", t.transformType = "-moz-transform", t.transitionType = "MozTransition", void 0 === e.perspectiveProperty && void 0 === e.MozPerspective && (t.animType = !1)), void 0 !== e.webkitTransform && (t.animType = "webkitTransform", t.transformType = "-webkit-transform", t.transitionType = "webkitTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (t.animType = !1)), void 0 !== e.msTransform && (t.animType = "msTransform", t.transformType = "-ms-transform", t.transitionType = "msTransition", void 0 === e.msTransform && (t.animType = !1)), void 0 !== e.transform && !1 !== t.animType && (t.animType = "transform", t.transformType = "transform", t.transitionType = "transition"), t.transformsEnabled = t.options.useTransform && null !== t.animType && !1 !== t.animType
	}, e.prototype.setSlideClasses = function(t) {
		var e, i, o, s, n = this;
		i = n.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), n.$slides.eq(t).addClass("slick-current"), !0 === n.options.centerMode ? (e = Math.floor(n.options.slidesToShow / 2), !0 === n.options.infinite && (t >= e && t <= n.slideCount - 1 - e ? n.$slides.slice(t - e, t + e + 1).addClass("slick-active").attr("aria-hidden", "false") : (o = n.options.slidesToShow + t, i.slice(o - e + 1, o + e + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === t ? i.eq(i.length - 1 - n.options.slidesToShow).addClass("slick-center") : t === n.slideCount - 1 && i.eq(n.options.slidesToShow).addClass("slick-center")), n.$slides.eq(t).addClass("slick-center")) : t >= 0 && t <= n.slideCount - n.options.slidesToShow ? n.$slides.slice(t, t + n.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : i.length <= n.options.slidesToShow ? i.addClass("slick-active").attr("aria-hidden", "false") : (s = n.slideCount % n.options.slidesToShow, o = !0 === n.options.infinite ? n.options.slidesToShow + t : t, n.options.slidesToShow == n.options.slidesToScroll && n.slideCount - t < n.options.slidesToShow ? i.slice(o - (n.options.slidesToShow - s), o + s).addClass("slick-active").attr("aria-hidden", "false") : i.slice(o, o + n.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false")), "ondemand" === n.options.lazyLoad && n.lazyLoad()
	}, e.prototype.setupInfinite = function() {
		var e, i, o, s = this;
		if (!0 === s.options.fade && (s.options.centerMode = !1), !0 === s.options.infinite && !1 === s.options.fade && (i = null, s.slideCount > s.options.slidesToShow)) {
			for (o = !0 === s.options.centerMode ? s.options.slidesToShow + 1 : s.options.slidesToShow, e = s.slideCount; e > s.slideCount - o; e -= 1) i = e - 1, t(s.$slides[i]).clone(!0).attr("id", "").attr("data-slick-index", i - s.slideCount).prependTo(s.$slideTrack).addClass("slick-cloned");
			for (e = 0; e < o; e += 1) i = e, t(s.$slides[i]).clone(!0).attr("id", "").attr("data-slick-index", i + s.slideCount).appendTo(s.$slideTrack).addClass("slick-cloned");
			s.$slideTrack.find(".slick-cloned").find("[id]").each(function() {
				t(this).attr("id", "")
			})
		}
	}, e.prototype.interrupt = function(t) {
		var e = this;
		t || e.autoPlay(), e.interrupted = t
	}, e.prototype.selectHandler = function(e) {
		var i = this,
			o = t(e.target).is(".slick-slide") ? t(e.target) : t(e.target).parents(".slick-slide"),
			s = parseInt(o.attr("data-slick-index"));
		if (s || (s = 0), i.slideCount <= i.options.slidesToShow) return i.setSlideClasses(s), void i.asNavFor(s);
		i.slideHandler(s)
	}, e.prototype.slideHandler = function(t, e, i) {
		var o, s, n, r, a, l = null,
			d = this;
		if (e = e || !1, (!0 !== d.animating || !0 !== d.options.waitForAnimate) && !(!0 === d.options.fade && d.currentSlide === t || d.slideCount <= d.options.slidesToShow)) {
			if (!1 === e && d.asNavFor(t), o = t, l = d.getLeft(o), r = d.getLeft(d.currentSlide), d.currentLeft = null === d.swipeLeft ? r : d.swipeLeft, !1 === d.options.infinite && !1 === d.options.centerMode && (t < 0 || t > d.getDotCount() * d.options.slidesToScroll)) return void(!1 === d.options.fade && (o = d.currentSlide, !0 !== i ? d.animateSlide(r, function() {
				d.postSlide(o)
			}) : d.postSlide(o)));
			if (!1 === d.options.infinite && !0 === d.options.centerMode && (t < 0 || t > d.slideCount - d.options.slidesToScroll)) return void(!1 === d.options.fade && (o = d.currentSlide, !0 !== i ? d.animateSlide(r, function() {
				d.postSlide(o)
			}) : d.postSlide(o)));
			if (d.options.autoplay && clearInterval(d.autoPlayTimer), s = o < 0 ? d.slideCount % d.options.slidesToScroll != 0 ? d.slideCount - d.slideCount % d.options.slidesToScroll : d.slideCount + o : o >= d.slideCount ? d.slideCount % d.options.slidesToScroll != 0 ? 0 : o - d.slideCount : o, d.animating = !0, d.$slider.trigger("beforeChange", [d, d.currentSlide, s]), n = d.currentSlide, d.currentSlide = s, d.setSlideClasses(d.currentSlide), d.options.asNavFor && (a = d.getNavTarget(), a = a.slick("getSlick"), a.slideCount <= a.options.slidesToShow && a.setSlideClasses(d.currentSlide)), d.updateDots(), d.updateArrows(), !0 === d.options.fade) return !0 !== i ? (d.fadeSlideOut(n), d.fadeSlide(s, function() {
				d.postSlide(s)
			})) : d.postSlide(s), void d.animateHeight();
			!0 !== i ? d.animateSlide(l, function() {
				d.postSlide(s)
			}) : d.postSlide(s)
		}
	}, e.prototype.startLoad = function() {
		var t = this;
		!0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow.hide(), t.$nextArrow.hide()), !0 === t.options.dots && t.slideCount > t.options.slidesToShow && t.$dots.hide(), t.$slider.addClass("slick-loading")
	}, e.prototype.swipeDirection = function() {
		var t, e, i, o, s = this;
		return t = s.touchObject.startX - s.touchObject.curX, e = s.touchObject.startY - s.touchObject.curY, i = Math.atan2(e, t), o = Math.round(180 * i / Math.PI), o < 0 && (o = 360 - Math.abs(o)), o <= 45 && o >= 0 ? !1 === s.options.rtl ? "left" : "right" : o <= 360 && o >= 315 ? !1 === s.options.rtl ? "left" : "right" : o >= 135 && o <= 225 ? !1 === s.options.rtl ? "right" : "left" : !0 === s.options.verticalSwiping ? o >= 35 && o <= 135 ? "down" : "up" : "vertical"
	}, e.prototype.swipeEnd = function(t) {
		var e, i, o = this;
		if (o.dragging = !1, o.interrupted = !1, o.shouldClick = !(o.touchObject.swipeLength > 10), void 0 === o.touchObject.curX) return !1;
		if (!0 === o.touchObject.edgeHit && o.$slider.trigger("edge", [o, o.swipeDirection()]), o.touchObject.swipeLength >= o.touchObject.minSwipe) {
			switch (i = o.swipeDirection()) {
				case "left":
				case "down":
					e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide + o.getSlideCount()) : o.currentSlide + o.getSlideCount(), o.currentDirection = 0;
					break;
				case "right":
				case "up":
					e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide - o.getSlideCount()) : o.currentSlide - o.getSlideCount(), o.currentDirection = 1
			}
			"vertical" != i && (o.slideHandler(e), o.touchObject = {}, o.$slider.trigger("swipe", [o, i]))
		} else o.touchObject.startX !== o.touchObject.curX && (o.slideHandler(o.currentSlide), o.touchObject = {})
	}, e.prototype.swipeHandler = function(t) {
		var e = this;
		if (!(!1 === e.options.swipe || "ontouchend" in document && !1 === e.options.swipe || !1 === e.options.draggable && -1 !== t.type.indexOf("mouse"))) switch (e.touchObject.fingerCount = t.originalEvent && void 0 !== t.originalEvent.touches ? t.originalEvent.touches.length : 1, e.touchObject.minSwipe = e.listWidth / e.options.touchThreshold, !0 === e.options.verticalSwiping && (e.touchObject.minSwipe = e.listHeight / e.options.touchThreshold), t.data.action) {
			case "start":
				e.swipeStart(t);
				break;
			case "move":
				e.swipeMove(t);
				break;
			case "end":
				e.swipeEnd(t)
		}
	}, e.prototype.swipeMove = function(t) {
		var e, i, o, s, n, r = this;
		return n = void 0 !== t.originalEvent ? t.originalEvent.touches : null, !(!r.dragging || n && 1 !== n.length) && (e = r.getLeft(r.currentSlide), r.touchObject.curX = void 0 !== n ? n[0].pageX : t.clientX, r.touchObject.curY = void 0 !== n ? n[0].pageY : t.clientY, r.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(r.touchObject.curX - r.touchObject.startX, 2))), !0 === r.options.verticalSwiping && (r.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(r.touchObject.curY - r.touchObject.startY, 2)))), "vertical" !== (i = r.swipeDirection()) ? (void 0 !== t.originalEvent && r.touchObject.swipeLength > 4 && t.preventDefault(), s = (!1 === r.options.rtl ? 1 : -1) * (r.touchObject.curX > r.touchObject.startX ? 1 : -1), !0 === r.options.verticalSwiping && (s = r.touchObject.curY > r.touchObject.startY ? 1 : -1), o = r.touchObject.swipeLength, r.touchObject.edgeHit = !1, !1 === r.options.infinite && (0 === r.currentSlide && "right" === i || r.currentSlide >= r.getDotCount() && "left" === i) && (o = r.touchObject.swipeLength * r.options.edgeFriction, r.touchObject.edgeHit = !0), !1 === r.options.vertical ? r.swipeLeft = e + o * s : r.swipeLeft = e + o * (r.$list.height() / r.listWidth) * s, !0 === r.options.verticalSwiping && (r.swipeLeft = e + o * s), !0 !== r.options.fade && !1 !== r.options.touchMove && (!0 === r.animating ? (r.swipeLeft = null, !1) : void r.setCSS(r.swipeLeft))) : void 0)
	}, e.prototype.swipeStart = function(t) {
		var e, i = this;
		if (i.interrupted = !0, 1 !== i.touchObject.fingerCount || i.slideCount <= i.options.slidesToShow) return i.touchObject = {}, !1;
		void 0 !== t.originalEvent && void 0 !== t.originalEvent.touches && (e = t.originalEvent.touches[0]), i.touchObject.startX = i.touchObject.curX = void 0 !== e ? e.pageX : t.clientX, i.touchObject.startY = i.touchObject.curY = void 0 !== e ? e.pageY : t.clientY, i.dragging = !0
	}, e.prototype.unfilterSlides = e.prototype.slickUnfilter = function() {
		var t = this;
		null !== t.$slidesCache && (t.unload(), t.$slideTrack.children(this.options.slide).detach(), t.$slidesCache.appendTo(t.$slideTrack), t.reinit())
	}, e.prototype.unload = function() {
		var e = this;
		t(".slick-cloned", e.$slider).remove(), e.$dots && e.$dots.remove(), e.$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove(), e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove(), e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
	}, e.prototype.unslick = function(t) {
		var e = this;
		e.$slider.trigger("unslick", [e, t]), e.destroy()
	}, e.prototype.updateArrows = function() {
		var t = this;
		Math.floor(t.options.slidesToShow / 2), !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && !t.options.infinite && (t.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), t.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === t.currentSlide ? (t.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), t.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : t.currentSlide >= t.slideCount - t.options.slidesToShow && !1 === t.options.centerMode ? (t.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), t.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : t.currentSlide >= t.slideCount - 1 && !0 === t.options.centerMode && (t.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), t.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")))
	}, e.prototype.updateDots = function() {
		var t = this;
		null !== t.$dots && (t.$dots.find("li").removeClass("slick-active").attr("aria-hidden", "true"), t.$dots.find("li").eq(Math.floor(t.currentSlide / t.options.slidesToScroll)).addClass("slick-active").attr("aria-hidden", "false"))
	}, e.prototype.visibility = function() {
		var t = this;
		t.options.autoplay && (document[t.hidden] ? t.interrupted = !0 : t.interrupted = !1)
	}, t.fn.slick = function() {
		var t, i, o = this,
			s = arguments[0],
			n = Array.prototype.slice.call(arguments, 1),
			r = o.length;
		for (t = 0; t < r; t++)
			if ("object" == typeof s || void 0 === s ? o[t].slick = new e(o[t], s) : i = o[t].slick[s].apply(o[t].slick, n), void 0 !== i) return i;
		return o
	}
}), function() {
	var t, e;
	t = this.jQuery || window.jQuery, e = t(window), t.fn.stick_in_parent = function(i) {
		var o, s, n, r, a, l, d, c, p, u, h, f;
		for (null == i && (i = {}), f = i.sticky_class, l = i.inner_scrolling, h = i.recalc_every, u = i.parent, p = i.offset_top, c = i.spacer, n = i.bottoming, null == p && (p = 0), null == u && (u = void 0), null == l && (l = !0), null == f && (f = "is_stuck"), o = t(document), null == n && (n = !0), r = function(i, s, r, a, d, g, v, m) {
				var y, w, b, k, T, $, S, C, x, A, j, z;
				if (!i.data("sticky_kit")) {
					if (i.data("sticky_kit", !0), T = o.height(), S = i.parent(), null != u && (S = S.closest(u)), !S.length) throw "failed to find stick parent";
					if (b = !1, y = !1, j = null != c ? c && i.closest(c) : t("<div />"), j && j.css("position", i.css("position")), C = function() {
							var t, e, n;
							if (!m) return T = o.height(), t = parseInt(S.css("border-top-width"), 10), e = parseInt(S.css("padding-top"), 10), s = parseInt(S.css("padding-bottom"), 10), r = S.offset().top + t + e, a = S.height(), b && (b = !1, y = !1, null == c && (i.insertAfter(j), j.detach()), i.css({
								position: "",
								top: "",
								width: "",
								bottom: ""
							}).removeClass(f), n = !0), d = i.offset().top - (parseInt(i.css("margin-top"), 10) || 0) - p, g = i.outerHeight(!0), v = i.css("float"), j && j.css({
								width: i.outerWidth(!0),
								height: g,
								display: i.css("display"),
								"vertical-align": i.css("vertical-align"),
								float: v
							}), n ? z() : void 0
						}, C(), g !== a) return k = void 0, $ = p, A = h, z = function() {
						var t, u, w, x, z, E;
						if (!m) return w = !1, null != A && (A -= 1) <= 0 && (A = h, C(), w = !0), w || o.height() === T || (C(), w = !0), x = e.scrollTop(), null != k && (u = x - k), k = x, b ? (n && (z = x + g + $ > a + r, y && !z && (y = !1, i.css({
							position: "fixed",
							bottom: "",
							top: $
						}).trigger("sticky_kit:unbottom"))), x < d && (b = !1, $ = p, null == c && ("left" !== v && "right" !== v || i.insertAfter(j), j.detach()), t = {
							position: "",
							width: "",
							top: ""
						}, i.css(t).removeClass(f).trigger("sticky_kit:unstick")), l && (E = e.height(), g + p > E && (y || ($ -= u, $ = Math.max(E - g, $), $ = Math.min(p, $), b && i.css({
							top: $ + "px"
						}))))) : x > d && (b = !0, t = {
							position: "fixed",
							top: $
						}, t.width = "border-box" === i.css("box-sizing") ? i.outerWidth() + "px" : i.width() + "px", i.css(t).addClass(f), null == c && (i.after(j), "left" !== v && "right" !== v || j.append(i)), i.trigger("sticky_kit:stick")), b && n && (null == z && (z = x + g + $ > a + r), !y && z) ? (y = !0, "static" === S.css("position") && S.css({
							position: "relative"
						}), i.css({
							position: "absolute",
							bottom: s,
							top: "auto"
						}).trigger("sticky_kit:bottom")) : void 0
					}, x = function() {
						return C(), z()
					}, w = function() {
						if (m = !0, e.off("touchmove", z), e.off("scroll", z), e.off("resize", x), t(document.body).off("sticky_kit:recalc", x), i.off("sticky_kit:detach", w), i.removeData("sticky_kit"), i.css({
								position: "",
								bottom: "",
								top: "",
								width: ""
							}), S.position("position", ""), b) return null == c && ("left" !== v && "right" !== v || i.insertAfter(j), j.remove()), i.removeClass(f)
					}, e.on("touchmove", z), e.on("scroll", z), e.on("resize", x), t(document.body).on("sticky_kit:recalc", x), i.on("sticky_kit:detach", w), setTimeout(z, 0)
				}
			}, a = 0, d = this.length; a < d; a++) s = this[a], r(t(s));
		return this
	}
}.call(this), function(t) {
	"function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? module.exports = t : t(jQuery)
}(function(t) {
	function e(e) {
		var r = e || window.event,
			a = l.call(arguments, 1),
			d = 0,
			p = 0,
			u = 0,
			h = 0,
			f = 0,
			g = 0;
		if (e = t.event.fix(r), e.type = "mousewheel", "detail" in r && (u = -1 * r.detail), "wheelDelta" in r && (u = r.wheelDelta), "wheelDeltaY" in r && (u = r.wheelDeltaY), "wheelDeltaX" in r && (p = -1 * r.wheelDeltaX), "axis" in r && r.axis === r.HORIZONTAL_AXIS && (p = -1 * u, u = 0), d = 0 === u ? p : u, "deltaY" in r && (u = -1 * r.deltaY, d = u), "deltaX" in r && (p = r.deltaX, 0 === u && (d = -1 * p)), 0 !== u || 0 !== p) {
			if (1 === r.deltaMode) {
				var v = t.data(this, "mousewheel-line-height");
				d *= v, u *= v, p *= v
			} else if (2 === r.deltaMode) {
				var m = t.data(this, "mousewheel-page-height");
				d *= m, u *= m, p *= m
			}
			if (h = Math.max(Math.abs(u), Math.abs(p)), (!n || h < n) && (n = h, o(r, h) && (n /= 40)), o(r, h) && (d /= 40, p /= 40, u /= 40), d = Math[d >= 1 ? "floor" : "ceil"](d / n), p = Math[p >= 1 ? "floor" : "ceil"](p / n), u = Math[u >= 1 ? "floor" : "ceil"](u / n), c.settings.normalizeOffset && this.getBoundingClientRect) {
				var y = this.getBoundingClientRect();
				f = e.clientX - y.left, g = e.clientY - y.top
			}
			return e.deltaX = p, e.deltaY = u, e.deltaFactor = n, e.offsetX = f, e.offsetY = g, e.deltaMode = 0, a.unshift(e, d, p, u), s && clearTimeout(s), s = setTimeout(i, 200), (t.event.dispatch || t.event.handle).apply(this, a)
		}
	}

	function i() {
		n = null
	}

	function o(t, e) {
		return c.settings.adjustOldDeltas && "mousewheel" === t.type && e % 120 == 0
	}
	var s, n, r = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
		a = "onwheel" in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
		l = Array.prototype.slice;
	if (t.event.fixHooks)
		for (var d = r.length; d;) t.event.fixHooks[r[--d]] = t.event.mouseHooks;
	var c = t.event.special.mousewheel = {
		version: "3.1.12",
		setup: function() {
			if (this.addEventListener)
				for (var i = a.length; i;) this.addEventListener(a[--i], e, !1);
			else this.onmousewheel = e;
			t.data(this, "mousewheel-line-height", c.getLineHeight(this)), t.data(this, "mousewheel-page-height", c.getPageHeight(this))
		},
		teardown: function() {
			if (this.removeEventListener)
				for (var i = a.length; i;) this.removeEventListener(a[--i], e, !1);
			else this.onmousewheel = null;
			t.removeData(this, "mousewheel-line-height"), t.removeData(this, "mousewheel-page-height")
		},
		getLineHeight: function(e) {
			var i = t(e),
				o = i["offsetParent" in t.fn ? "offsetParent" : "parent"]();
			return o.length || (o = t("body")), parseInt(o.css("fontSize"), 10) || parseInt(i.css("fontSize"), 10) || 16
		},
		getPageHeight: function(e) {
			return t(e).height()
		},
		settings: {
			adjustOldDeltas: !0,
			normalizeOffset: !0
		}
	};
	t.fn.extend({
		mousewheel: function(t) {
			return t ? this.bind("mousewheel", t) : this.trigger("mousewheel")
		},
		unmousewheel: function(t) {
			return this.unbind("mousewheel", t)
		}
	})
}), function() {
	function t(t, e) {
		document.addEventListener ? t.addEventListener("scroll", e, !1) : t.attachEvent("scroll", e)
	}

	function e(t) {
		document.body ? t() : document.addEventListener ? document.addEventListener("DOMContentLoaded", function e() {
			document.removeEventListener("DOMContentLoaded", e), t()
		}) : document.attachEvent("onreadystatechange", function e() {
			"interactive" != document.readyState && "complete" != document.readyState || (document.detachEvent("onreadystatechange", e), t())
		})
	}

	function i(t) {
		this.a = document.createElement("div"), this.a.setAttribute("aria-hidden", "true"), this.a.appendChild(document.createTextNode(t)), this.b = document.createElement("span"), this.c = document.createElement("span"), this.h = document.createElement("span"), this.f = document.createElement("span"), this.g = -1, this.b.style.cssText = "max-width:none;display:inline-block;position:absolute;height:100%;width:100%;overflow:scroll;font-size:16px;", this.c.style.cssText = "max-width:none;display:inline-block;position:absolute;height:100%;width:100%;overflow:scroll;font-size:16px;", this.f.style.cssText = "max-width:none;display:inline-block;position:absolute;height:100%;width:100%;overflow:scroll;font-size:16px;", this.h.style.cssText = "display:inline-block;width:200%;height:200%;font-size:16px;max-width:none;", this.b.appendChild(this.h), this.c.appendChild(this.f), this.a.appendChild(this.b), this.a.appendChild(this.c)
	}

	function o(t, e) {
		t.a.style.cssText = "max-width:none;min-width:20px;min-height:20px;display:inline-block;overflow:hidden;position:absolute;width:auto;margin:0;padding:0;top:-999px;white-space:nowrap;font-synthesis:none;font:" + e + ";"
	}

	function s(t) {
		var e = t.a.offsetWidth,
			i = e + 100;
		return t.f.style.width = i + "px", t.c.scrollLeft = i, t.b.scrollLeft = t.b.scrollWidth + 100, t.g !== e && (t.g = e, !0)
	}

	function n(e, i) {
		function o() {
			var t = n;
			s(t) && t.a.parentNode && i(t.g)
		}
		var n = e;
		t(e.b, o), t(e.c, o), s(e)
	}

	function r(t, e) {
		var i = e || {};
		this.family = t, this.style = i.style || "normal", this.weight = i.weight || "normal", this.stretch = i.stretch || "normal"
	}

	function a() {
		if (null === u)
			if (l() && /Apple/.test(window.navigator.vendor)) {
				var t = /AppleWebKit\/([0-9]+)(?:\.([0-9]+))(?:\.([0-9]+))/.exec(window.navigator.userAgent);
				u = !!t && 603 > parseInt(t[1], 10)
			} else u = !1;
		return u
	}

	function l() {
		return null === f && (f = !!document.fonts), f
	}

	function d() {
		if (null === h) {
			var t = document.createElement("div");
			try {
				t.style.font = "condensed 100px sans-serif"
			} catch (t) {}
			h = "" !== t.style.font
		}
		return h
	}

	function c(t, e) {
		return [t.style, t.weight, d() ? t.stretch : "", "100px", e].join(" ")
	}
	var p = null,
		u = null,
		h = null,
		f = null;
	r.prototype.load = function(t, s) {
		var r = this,
			d = t || "BESbswy",
			u = 0,
			h = s || 3e3,
			f = (new Date).getTime();
		return new Promise(function(t, s) {
			if (l() && !a()) {
				var g = new Promise(function(t, e) {
						function i() {
							(new Date).getTime() - f >= h ? e() : document.fonts.load(c(r, '"' + r.family + '"'), d).then(function(e) {
								1 <= e.length ? t() : setTimeout(i, 25)
							}, function() {
								e()
							})
						}
						i()
					}),
					v = new Promise(function(t, e) {
						u = setTimeout(e, h)
					});
				Promise.race([v, g]).then(function() {
					clearTimeout(u), t(r)
				}, function() {
					s(r)
				})
			} else e(function() {
				function e() {
					var e;
					(e = -1 != m && -1 != y || -1 != m && -1 != w || -1 != y && -1 != w) && ((e = m != y && m != w && y != w) || (null === p && (e = /AppleWebKit\/([0-9]+)(?:\.([0-9]+))/.exec(window.navigator.userAgent), p = !!e && (536 > parseInt(e[1], 10) || 536 === parseInt(e[1], 10) && 11 >= parseInt(e[2], 10))), e = p && (m == b && y == b && w == b || m == k && y == k && w == k || m == T && y == T && w == T)), e = !e), e && ($.parentNode && $.parentNode.removeChild($), clearTimeout(u), t(r))
				}

				function a() {
					if ((new Date).getTime() - f >= h) $.parentNode && $.parentNode.removeChild($), s(r);
					else {
						var t = document.hidden;
						!0 !== t && void 0 !== t || (m = l.a.offsetWidth, y = g.a.offsetWidth, w = v.a.offsetWidth, e()), u = setTimeout(a, 50)
					}
				}
				var l = new i(d),
					g = new i(d),
					v = new i(d),
					m = -1,
					y = -1,
					w = -1,
					b = -1,
					k = -1,
					T = -1,
					$ = document.createElement("div");
				$.dir = "ltr", o(l, c(r, "sans-serif")), o(g, c(r, "serif")), o(v, c(r, "monospace")), $.appendChild(l.a), $.appendChild(g.a), $.appendChild(v.a), document.body.appendChild($), b = l.a.offsetWidth, k = g.a.offsetWidth, T = v.a.offsetWidth, a(), n(l, function(t) {
					m = t, e()
				}), o(l, c(r, '"' + r.family + '",sans-serif')), n(g, function(t) {
					y = t, e()
				}), o(g, c(r, '"' + r.family + '",serif')), n(v, function(t) {
					w = t, e()
				}), o(v, c(r, '"' + r.family + '",monospace'))
			})
		})
	}, "object" == typeof module ? module.exports = r : (window.FontFaceObserver = r, window.FontFaceObserver.prototype.load = r.prototype.load)
}(), "undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery"); + function(t) {
"use strict";
var e = t.fn.jquery.split(" ")[0].split(".");
if (e[0] < 2 && e[1] < 9 || 1 == e[0] && 9 == e[1] && e[2] < 1 || e[0] > 3) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")
}(jQuery),
function(t) {
"use strict";

function e() {
	var t = document.createElement("bootstrap"),
		e = {
			WebkitTransition: "webkitTransitionEnd",
			MozTransition: "transitionend",
			OTransition: "oTransitionEnd otransitionend",
			transition: "transitionend"
		};
	for (var i in e)
		if (void 0 !== t.style[i]) return {
			end: e[i]
		};
	return !1
}
t.fn.emulateTransitionEnd = function(e) {
	var i = !1,
		o = this;
	t(this).one("bsTransitionEnd", function() {
		i = !0
	});
	var s = function() {
		i || t(o).trigger(t.support.transition.end)
	};
	return setTimeout(s, e), this
}, t(function() {
	t.support.transition = e(), t.support.transition && (t.event.special.bsTransitionEnd = {
		bindType: t.support.transition.end,
		delegateType: t.support.transition.end,
		handle: function(e) {
			if (t(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
		}
	})
})
}(jQuery),
function(t) {
"use strict";

function e(e) {
	return this.each(function() {
		var i = t(this),
			s = i.data("bs.alert");
		s || i.data("bs.alert", s = new o(this)), "string" == typeof e && s[e].call(i)
	})
}
var i = '[data-dismiss="alert"]',
	o = function(e) {
		t(e).on("click", i, this.close)
	};
o.VERSION = "3.3.7", o.TRANSITION_DURATION = 150, o.prototype.close = function(e) {
	function i() {
		r.detach().trigger("closed.bs.alert").remove()
	}
	var s = t(this),
		n = s.attr("data-target");
	n || (n = s.attr("href"), n = n && n.replace(/.*(?=#[^\s]*$)/, ""));
	var r = t("#" === n ? [] : n);
	e && e.preventDefault(), r.length || (r = s.closest(".alert")), r.trigger(e = t.Event("close.bs.alert")), e.isDefaultPrevented() || (r.removeClass("in"), t.support.transition && r.hasClass("fade") ? r.one("bsTransitionEnd", i).emulateTransitionEnd(o.TRANSITION_DURATION) : i())
};
var s = t.fn.alert;
t.fn.alert = e, t.fn.alert.Constructor = o, t.fn.alert.noConflict = function() {
	return t.fn.alert = s, this
}, t(document).on("click.bs.alert.data-api", i, o.prototype.close)
}(jQuery),
function(t) {
"use strict";

function e(e) {
	return this.each(function() {
		var o = t(this),
			s = o.data("bs.button"),
			n = "object" == typeof e && e;
		s || o.data("bs.button", s = new i(this, n)), "toggle" == e ? s.toggle() : e && s.setState(e)
	})
}
var i = function(e, o) {
	this.$element = t(e), this.options = t.extend({}, i.DEFAULTS, o), this.isLoading = !1
};
i.VERSION = "3.3.7", i.DEFAULTS = {
	loadingText: "loading..."
}, i.prototype.setState = function(e) {
	var i = "disabled",
		o = this.$element,
		s = o.is("input") ? "val" : "html",
		n = o.data();
	e += "Text", null == n.resetText && o.data("resetText", o[s]()), setTimeout(t.proxy(function() {
		o[s](null == n[e] ? this.options[e] : n[e]), "loadingText" == e ? (this.isLoading = !0, o.addClass(i).attr(i, i).prop(i, !0)) : this.isLoading && (this.isLoading = !1, o.removeClass(i).removeAttr(i).prop(i, !1))
	}, this), 0)
}, i.prototype.toggle = function() {
	var t = !0,
		e = this.$element.closest('[data-toggle="buttons"]');
	if (e.length) {
		var i = this.$element.find("input");
		"radio" == i.prop("type") ? (i.prop("checked") && (t = !1), e.find(".active").removeClass("active"), this.$element.addClass("active")) : "checkbox" == i.prop("type") && (i.prop("checked") !== this.$element.hasClass("active") && (t = !1), this.$element.toggleClass("active")), i.prop("checked", this.$element.hasClass("active")), t && i.trigger("change")
	} else this.$element.attr("aria-pressed", !this.$element.hasClass("active")), this.$element.toggleClass("active")
};
var o = t.fn.button;
t.fn.button = e, t.fn.button.Constructor = i, t.fn.button.noConflict = function() {
	return t.fn.button = o, this
}, t(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function(i) {
	var o = t(i.target).closest(".btn");
	e.call(o, "toggle"), t(i.target).is('input[type="radio"], input[type="checkbox"]') || (i.preventDefault(), o.is("input,button") ? o.trigger("focus") : o.find("input:visible,button:visible").first().trigger("focus"))
}).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function(e) {
	t(e.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(e.type))
})
}(jQuery),
function(t) {
"use strict";

function e(e) {
	return this.each(function() {
		var o = t(this),
			s = o.data("bs.carousel"),
			n = t.extend({}, i.DEFAULTS, o.data(), "object" == typeof e && e),
			r = "string" == typeof e ? e : n.slide;
		s || o.data("bs.carousel", s = new i(this, n)), "number" == typeof e ? s.to(e) : r ? s[r]() : n.interval && s.pause().cycle()
	})
}
var i = function(e, i) {
	this.$element = t(e), this.$indicators = this.$element.find(".carousel-indicators"), this.options = i, this.paused = null, this.sliding = null, this.interval = null, this.$active = null, this.$items = null, this.options.keyboard && this.$element.on("keydown.bs.carousel", t.proxy(this.keydown, this)), "hover" == this.options.pause && !("ontouchstart" in document.documentElement) && this.$element.on("mouseenter.bs.carousel", t.proxy(this.pause, this)).on("mouseleave.bs.carousel", t.proxy(this.cycle, this))
};
i.VERSION = "3.3.7", i.TRANSITION_DURATION = 600, i.DEFAULTS = {
	interval: 5e3,
	pause: "hover",
	wrap: !0,
	keyboard: !0
}, i.prototype.keydown = function(t) {
	if (!/input|textarea/i.test(t.target.tagName)) {
		switch (t.which) {
			case 37:
				this.prev();
				break;
			case 39:
				this.next();
				break;
			default:
				return
		}
		t.preventDefault()
	}
}, i.prototype.cycle = function(e) {
	return e || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(t.proxy(this.next, this), this.options.interval)), this
}, i.prototype.getItemIndex = function(t) {
	return this.$items = t.parent().children(".item"), this.$items.index(t || this.$active)
}, i.prototype.getItemForDirection = function(t, e) {
	var i = this.getItemIndex(e);
	if (("prev" == t && 0 === i || "next" == t && i == this.$items.length - 1) && !this.options.wrap) return e;
	var o = "prev" == t ? -1 : 1,
		s = (i + o) % this.$items.length;
	return this.$items.eq(s)
}, i.prototype.to = function(t) {
	var e = this,
		i = this.getItemIndex(this.$active = this.$element.find(".item.active"));
	if (!(t > this.$items.length - 1 || t < 0)) return this.sliding ? this.$element.one("slid.bs.carousel", function() {
		e.to(t)
	}) : i == t ? this.pause().cycle() : this.slide(t > i ? "next" : "prev", this.$items.eq(t))
}, i.prototype.pause = function(e) {
	return e || (this.paused = !0), this.$element.find(".next, .prev").length && t.support.transition && (this.$element.trigger(t.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
}, i.prototype.next = function() {
	if (!this.sliding) return this.slide("next")
}, i.prototype.prev = function() {
	if (!this.sliding) return this.slide("prev")
}, i.prototype.slide = function(e, o) {
	var s = this.$element.find(".item.active"),
		n = o || this.getItemForDirection(e, s),
		r = this.interval,
		a = "next" == e ? "left" : "right",
		l = this;
	if (n.hasClass("active")) return this.sliding = !1;
	var d = n[0],
		c = t.Event("slide.bs.carousel", {
			relatedTarget: d,
			direction: a
		});
	if (this.$element.trigger(c), !c.isDefaultPrevented()) {
		if (this.sliding = !0, r && this.pause(), this.$indicators.length) {
			this.$indicators.find(".active").removeClass("active");
			var p = t(this.$indicators.children()[this.getItemIndex(n)]);
			p && p.addClass("active")
		}
		var u = t.Event("slid.bs.carousel", {
			relatedTarget: d,
			direction: a
		});
		return t.support.transition && this.$element.hasClass("slide") ? (n.addClass(e), n[0].offsetWidth, s.addClass(a), n.addClass(a), s.one("bsTransitionEnd", function() {
			n.removeClass([e, a].join(" ")).addClass("active"), s.removeClass(["active", a].join(" ")), l.sliding = !1, setTimeout(function() {
				l.$element.trigger(u)
			}, 0)
		}).emulateTransitionEnd(i.TRANSITION_DURATION)) : (s.removeClass("active"), n.addClass("active"), this.sliding = !1, this.$element.trigger(u)), r && this.cycle(), this
	}
};
var o = t.fn.carousel;
t.fn.carousel = e, t.fn.carousel.Constructor = i, t.fn.carousel.noConflict = function() {
	return t.fn.carousel = o, this
};
var s = function(i) {
	var o, s = t(this),
		n = t(s.attr("data-target") || (o = s.attr("href")) && o.replace(/.*(?=#[^\s]+$)/, ""));
	if (n.hasClass("carousel")) {
		var r = t.extend({}, n.data(), s.data()),
			a = s.attr("data-slide-to");
		a && (r.interval = !1), e.call(n, r), a && n.data("bs.carousel").to(a), i.preventDefault()
	}
};
t(document).on("click.bs.carousel.data-api", "[data-slide]", s).on("click.bs.carousel.data-api", "[data-slide-to]", s), t(window).on("load", function() {
	t('[data-ride="carousel"]').each(function() {
		var i = t(this);
		e.call(i, i.data())
	})
})
}(jQuery),
function(t) {
"use strict";

function e(e) {
	var i, o = e.attr("data-target") || (i = e.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, "");
	return t(o)
}

function i(e) {
	return this.each(function() {
		var i = t(this),
			s = i.data("bs.collapse"),
			n = t.extend({}, o.DEFAULTS, i.data(), "object" == typeof e && e);
		!s && n.toggle && /show|hide/.test(e) && (n.toggle = !1), s || i.data("bs.collapse", s = new o(this, n)), "string" == typeof e && s[e]()
	})
}
var o = function(e, i) {
	this.$element = t(e), this.options = t.extend({}, o.DEFAULTS, i), this.$trigger = t('[data-toggle="collapse"][href="#' + e.id + '"],[data-toggle="collapse"][data-target="#' + e.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle()
};
o.VERSION = "3.3.7", o.TRANSITION_DURATION = 350, o.DEFAULTS = {
	toggle: !0
}, o.prototype.dimension = function() {
	return this.$element.hasClass("width") ? "width" : "height"
}, o.prototype.show = function() {
	if (!this.transitioning && !this.$element.hasClass("in")) {
		var e, s = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
		if (!(s && s.length && (e = s.data("bs.collapse")) && e.transitioning)) {
			var n = t.Event("show.bs.collapse");
			if (this.$element.trigger(n), !n.isDefaultPrevented()) {
				s && s.length && (i.call(s, "hide"), e || s.data("bs.collapse", null));
				var r = this.dimension();
				this.$element.removeClass("collapse").addClass("collapsing")[r](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
				var a = function() {
					this.$element.removeClass("collapsing").addClass("collapse in")[r](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
				};
				if (!t.support.transition) return a.call(this);
				var l = t.camelCase(["scroll", r].join("-"));
				this.$element.one("bsTransitionEnd", t.proxy(a, this)).emulateTransitionEnd(o.TRANSITION_DURATION)[r](this.$element[0][l])
			}
		}
	}
}, o.prototype.hide = function() {
	if (!this.transitioning && this.$element.hasClass("in")) {
		var e = t.Event("hide.bs.collapse");
		if (this.$element.trigger(e), !e.isDefaultPrevented()) {
			var i = this.dimension();
			this.$element[i](this.$element[i]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
			var s = function() {
				this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
			};
			if (!t.support.transition) return s.call(this);
			this.$element[i](0).one("bsTransitionEnd", t.proxy(s, this)).emulateTransitionEnd(o.TRANSITION_DURATION)
		}
	}
}, o.prototype.toggle = function() {
	this[this.$element.hasClass("in") ? "hide" : "show"]()
}, o.prototype.getParent = function() {
	return t(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(t.proxy(function(i, o) {
		var s = t(o);
		this.addAriaAndCollapsedClass(e(s), s)
	}, this)).end()
}, o.prototype.addAriaAndCollapsedClass = function(t, e) {
	var i = t.hasClass("in");
	t.attr("aria-expanded", i), e.toggleClass("collapsed", !i).attr("aria-expanded", i)
};
var s = t.fn.collapse;
t.fn.collapse = i, t.fn.collapse.Constructor = o, t.fn.collapse.noConflict = function() {
	return t.fn.collapse = s, this
}, t(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function(o) {
	var s = t(this);
	s.attr("data-target") || o.preventDefault();
	var n = e(s),
		r = n.data("bs.collapse"),
		a = r ? "toggle" : s.data();
	i.call(n, a)
})
}(jQuery),
function(t) {
"use strict";

function e(e) {
	var i = e.attr("data-target");
	i || (i = e.attr("href"), i = i && /#[A-Za-z]/.test(i) && i.replace(/.*(?=#[^\s]*$)/, ""));
	var o = i && t(i);
	return o && o.length ? o : e.parent()
}

function i(i) {
	i && 3 === i.which || (t(s).remove(), t(n).each(function() {
		var o = t(this),
			s = e(o),
			n = {
				relatedTarget: this
			};
		s.hasClass("open") && (i && "click" == i.type && /input|textarea/i.test(i.target.tagName) && t.contains(s[0], i.target) || (s.trigger(i = t.Event("hide.bs.dropdown", n)), i.isDefaultPrevented() || (o.attr("aria-expanded", "false"), s.removeClass("open").trigger(t.Event("hidden.bs.dropdown", n)))))
	}))
}

function o(e) {
	return this.each(function() {
		var i = t(this),
			o = i.data("bs.dropdown");
		o || i.data("bs.dropdown", o = new r(this)), "string" == typeof e && o[e].call(i)
	})
}
var s = ".dropdown-backdrop",
	n = '[data-toggle="dropdown"]',
	r = function(e) {
		t(e).on("click.bs.dropdown", this.toggle)
	};
r.VERSION = "3.3.7", r.prototype.toggle = function(o) {
	var s = t(this);
	if (!s.is(".disabled, :disabled")) {
		var n = e(s),
			r = n.hasClass("open");
		if (i(), !r) {
			"ontouchstart" in document.documentElement && !n.closest(".navbar-nav").length && t(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(t(this)).on("click", i);
			var a = {
				relatedTarget: this
			};
			if (n.trigger(o = t.Event("show.bs.dropdown", a)), o.isDefaultPrevented()) return;
			s.trigger("focus").attr("aria-expanded", "true"), n.toggleClass("open").trigger(t.Event("shown.bs.dropdown", a))
		}
		return !1
	}
}, r.prototype.keydown = function(i) {
	if (/(38|40|27|32)/.test(i.which) && !/input|textarea/i.test(i.target.tagName)) {
		var o = t(this);
		if (i.preventDefault(), i.stopPropagation(), !o.is(".disabled, :disabled")) {
			var s = e(o),
				r = s.hasClass("open");
			if (!r && 27 != i.which || r && 27 == i.which) return 27 == i.which && s.find(n).trigger("focus"), o.trigger("click");
			var a = s.find(".dropdown-menu li:not(.disabled):visible a");
			if (a.length) {
				var l = a.index(i.target);
				38 == i.which && l > 0 && l--, 40 == i.which && l < a.length - 1 && l++, ~l || (l = 0), a.eq(l).trigger("focus")
			}
		}
	}
};
var a = t.fn.dropdown;
t.fn.dropdown = o, t.fn.dropdown.Constructor = r, t.fn.dropdown.noConflict = function() {
	return t.fn.dropdown = a, this
}, t(document).on("click.bs.dropdown.data-api", i).on("click.bs.dropdown.data-api", ".dropdown form", function(t) {
	t.stopPropagation()
}).on("click.bs.dropdown.data-api", n, r.prototype.toggle).on("keydown.bs.dropdown.data-api", n, r.prototype.keydown).on("keydown.bs.dropdown.data-api", ".dropdown-menu", r.prototype.keydown)
}(jQuery),
function(t) {
"use strict";

function e(e, o) {
	return this.each(function() {
		var s = t(this),
			n = s.data("bs.modal"),
			r = t.extend({}, i.DEFAULTS, s.data(), "object" == typeof e && e);
		n || s.data("bs.modal", n = new i(this, r)), "string" == typeof e ? n[e](o) : r.show && n.show(o)
	})
}
var i = function(e, i) {
	this.options = i, this.$body = t(document.body), this.$element = t(e), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function() {
		this.$element.trigger("loaded.bs.modal")
	}, this))
};
i.VERSION = "3.3.7", i.TRANSITION_DURATION = 300, i.BACKDROP_TRANSITION_DURATION = 150, i.DEFAULTS = {
	backdrop: !0,
	keyboard: !0,
	show: !0
}, i.prototype.toggle = function(t) {
	return this.isShown ? this.hide() : this.show(t)
}, i.prototype.show = function(e) {
	var o = this,
		s = t.Event("show.bs.modal", {
			relatedTarget: e
		});
	this.$element.trigger(s), this.isShown || s.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function() {
		o.$element.one("mouseup.dismiss.bs.modal", function(e) {
			t(e.target).is(o.$element) && (o.ignoreBackdropClick = !0)
		})
	}), this.backdrop(function() {
		var s = t.support.transition && o.$element.hasClass("fade");
		o.$element.parent().length || o.$element.appendTo(o.$body), o.$element.show().scrollTop(0), o.adjustDialog(), s && o.$element[0].offsetWidth, o.$element.addClass("in"), o.enforceFocus();
		var n = t.Event("shown.bs.modal", {
			relatedTarget: e
		});
		s ? o.$dialog.one("bsTransitionEnd", function() {
			o.$element.trigger("focus").trigger(n)
		}).emulateTransitionEnd(i.TRANSITION_DURATION) : o.$element.trigger("focus").trigger(n)
	}))
}, i.prototype.hide = function(e) {
	e && e.preventDefault(), e = t.Event("hide.bs.modal"), this.$element.trigger(e), this.isShown && !e.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(i.TRANSITION_DURATION) : this.hideModal())
}, i.prototype.enforceFocus = function() {
	t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function(t) {
		document === t.target || this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus")
	}, this))
}, i.prototype.escape = function() {
	this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", t.proxy(function(t) {
		27 == t.which && this.hide()
	}, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
}, i.prototype.resize = function() {
	this.isShown ? t(window).on("resize.bs.modal", t.proxy(this.handleUpdate, this)) : t(window).off("resize.bs.modal")
}, i.prototype.hideModal = function() {
	var t = this;
	this.$element.hide(), this.backdrop(function() {
		t.$body.removeClass("modal-open"), t.resetAdjustments(), t.resetScrollbar(), t.$element.trigger("hidden.bs.modal")
	})
}, i.prototype.removeBackdrop = function() {
	this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
}, i.prototype.backdrop = function(e) {
	var o = this,
		s = this.$element.hasClass("fade") ? "fade" : "";
	if (this.isShown && this.options.backdrop) {
		var n = t.support.transition && s;
		if (this.$backdrop = t(document.createElement("div")).addClass("modal-backdrop " + s).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", t.proxy(function(t) {
				if (this.ignoreBackdropClick) return void(this.ignoreBackdropClick = !1);
				t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide())
			}, this)), n && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !e) return;
		n ? this.$backdrop.one("bsTransitionEnd", e).emulateTransitionEnd(i.BACKDROP_TRANSITION_DURATION) : e()
	} else if (!this.isShown && this.$backdrop) {
		this.$backdrop.removeClass("in");
		var r = function() {
			o.removeBackdrop(), e && e()
		};
		t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", r).emulateTransitionEnd(i.BACKDROP_TRANSITION_DURATION) : r()
	} else e && e()
}, i.prototype.handleUpdate = function() {
	this.adjustDialog()
}, i.prototype.adjustDialog = function() {
	var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
	this.$element.css({
		paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "",
		paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : ""
	})
}, i.prototype.resetAdjustments = function() {
	this.$element.css({
		paddingLeft: "",
		paddingRight: ""
	})
}, i.prototype.checkScrollbar = function() {
	var t = window.innerWidth;
	if (!t) {
		var e = document.documentElement.getBoundingClientRect();
		t = e.right - Math.abs(e.left)
	}
	this.bodyIsOverflowing = document.body.clientWidth < t, this.scrollbarWidth = this.measureScrollbar()
}, i.prototype.setScrollbar = function() {
	var t = parseInt(this.$body.css("padding-right") || 0, 10);
	this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
}, i.prototype.resetScrollbar = function() {
	this.$body.css("padding-right", this.originalBodyPad)
}, i.prototype.measureScrollbar = function() {
	var t = document.createElement("div");
	t.className = "modal-scrollbar-measure", this.$body.append(t);
	var e = t.offsetWidth - t.clientWidth;
	return this.$body[0].removeChild(t), e
};
var o = t.fn.modal;
t.fn.modal = e, t.fn.modal.Constructor = i, t.fn.modal.noConflict = function() {
	return t.fn.modal = o, this
}, t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function(i) {
	var o = t(this),
		s = o.attr("href"),
		n = t(o.attr("data-target") || s && s.replace(/.*(?=#[^\s]+$)/, "")),
		r = n.data("bs.modal") ? "toggle" : t.extend({
			remote: !/#/.test(s) && s
		}, n.data(), o.data());
	o.is("a") && i.preventDefault(), n.one("show.bs.modal", function(t) {
		t.isDefaultPrevented() || n.one("hidden.bs.modal", function() {
			o.is(":visible") && o.trigger("focus")
		})
	}), e.call(n, r, this)
})
}(jQuery),
function(t) {
"use strict";

function e(e) {
	return this.each(function() {
		var o = t(this),
			s = o.data("bs.tooltip"),
			n = "object" == typeof e && e;
		!s && /destroy|hide/.test(e) || (s || o.data("bs.tooltip", s = new i(this, n)), "string" == typeof e && s[e]())
	})
}
var i = function(t, e) {
	this.type = null, this.options = null, this.enabled = null, this.timeout = null, this.hoverState = null, this.$element = null, this.inState = null, this.init("tooltip", t, e)
};
i.VERSION = "3.3.7", i.TRANSITION_DURATION = 150, i.DEFAULTS = {
	animation: !0,
	placement: "top",
	selector: !1,
	template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
	trigger: "hover focus",
	title: "",
	delay: 0,
	html: !1,
	container: !1,
	viewport: {
		selector: "body",
		padding: 0
	}
}, i.prototype.init = function(e, i, o) {
	if (this.enabled = !0, this.type = e, this.$element = t(i), this.options = this.getOptions(o), this.$viewport = this.options.viewport && t(t.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : this.options.viewport.selector || this.options.viewport), this.inState = {
			click: !1,
			hover: !1,
			focus: !1
		}, this.$element[0] instanceof document.constructor && !this.options.selector) throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
	for (var s = this.options.trigger.split(" "), n = s.length; n--;) {
		var r = s[n];
		if ("click" == r) this.$element.on("click." + this.type, this.options.selector, t.proxy(this.toggle, this));
		else if ("manual" != r) {
			var a = "hover" == r ? "mouseenter" : "focusin",
				l = "hover" == r ? "mouseleave" : "focusout";
			this.$element.on(a + "." + this.type, this.options.selector, t.proxy(this.enter, this)), this.$element.on(l + "." + this.type, this.options.selector, t.proxy(this.leave, this))
		}
	}
	this.options.selector ? this._options = t.extend({}, this.options, {
		trigger: "manual",
		selector: ""
	}) : this.fixTitle()
}, i.prototype.getDefaults = function() {
	return i.DEFAULTS
}, i.prototype.getOptions = function(e) {
	return e = t.extend({}, this.getDefaults(), this.$element.data(), e), e.delay && "number" == typeof e.delay && (e.delay = {
		show: e.delay,
		hide: e.delay
	}), e
}, i.prototype.getDelegateOptions = function() {
	var e = {},
		i = this.getDefaults();
	return this._options && t.each(this._options, function(t, o) {
		i[t] != o && (e[t] = o)
	}), e
}, i.prototype.enter = function(e) {
	var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
	return i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i)), e instanceof t.Event && (i.inState["focusin" == e.type ? "focus" : "hover"] = !0), i.tip().hasClass("in") || "in" == i.hoverState ? void(i.hoverState = "in") : (clearTimeout(i.timeout), i.hoverState = "in", i.options.delay && i.options.delay.show ? void(i.timeout = setTimeout(function() {
		"in" == i.hoverState && i.show()
	}, i.options.delay.show)) : i.show())
}, i.prototype.isInStateTrue = function() {
	for (var t in this.inState)
		if (this.inState[t]) return !0;
	return !1
}, i.prototype.leave = function(e) {
	var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
	if (i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i)), e instanceof t.Event && (i.inState["focusout" == e.type ? "focus" : "hover"] = !1), !i.isInStateTrue()) {
		if (clearTimeout(i.timeout), i.hoverState = "out", !i.options.delay || !i.options.delay.hide) return i.hide();
		i.timeout = setTimeout(function() {
			"out" == i.hoverState && i.hide()
		}, i.options.delay.hide)
	}
}, i.prototype.show = function() {
	var e = t.Event("show.bs." + this.type);
	if (this.hasContent() && this.enabled) {
		this.$element.trigger(e);
		var o = t.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
		if (e.isDefaultPrevented() || !o) return;
		var s = this,
			n = this.tip(),
			r = this.getUID(this.type);
		this.setContent(), n.attr("id", r), this.$element.attr("aria-describedby", r), this.options.animation && n.addClass("fade");
		var a = "function" == typeof this.options.placement ? this.options.placement.call(this, n[0], this.$element[0]) : this.options.placement,
			l = /\s?auto?\s?/i,
			d = l.test(a);
		d && (a = a.replace(l, "") || "top"), n.detach().css({
			top: 0,
			left: 0,
			display: "block"
		}).addClass(a).data("bs." + this.type, this), this.options.container ? n.appendTo(this.options.container) : n.insertAfter(this.$element), this.$element.trigger("inserted.bs." + this.type);
		var c = this.getPosition(),
			p = n[0].offsetWidth,
			u = n[0].offsetHeight;
		if (d) {
			var h = a,
				f = this.getPosition(this.$viewport);
			a = "bottom" == a && c.bottom + u > f.bottom ? "top" : "top" == a && c.top - u < f.top ? "bottom" : "right" == a && c.right + p > f.width ? "left" : "left" == a && c.left - p < f.left ? "right" : a, n.removeClass(h).addClass(a)
		}
		var g = this.getCalculatedOffset(a, c, p, u);
		this.applyPlacement(g, a);
		var v = function() {
			var t = s.hoverState;
			s.$element.trigger("shown.bs." + s.type), s.hoverState = null, "out" == t && s.leave(s)
		};
		t.support.transition && this.$tip.hasClass("fade") ? n.one("bsTransitionEnd", v).emulateTransitionEnd(i.TRANSITION_DURATION) : v()
	}
}, i.prototype.applyPlacement = function(e, i) {
	var o = this.tip(),
		s = o[0].offsetWidth,
		n = o[0].offsetHeight,
		r = parseInt(o.css("margin-top"), 10),
		a = parseInt(o.css("margin-left"), 10);
	isNaN(r) && (r = 0), isNaN(a) && (a = 0), e.top += r, e.left += a, t.offset.setOffset(o[0], t.extend({
		using: function(t) {
			o.css({
				top: Math.round(t.top),
				left: Math.round(t.left)
			})
		}
	}, e), 0), o.addClass("in");
	var l = o[0].offsetWidth,
		d = o[0].offsetHeight;
	"top" == i && d != n && (e.top = e.top + n - d);
	var c = this.getViewportAdjustedDelta(i, e, l, d);
	c.left ? e.left += c.left : e.top += c.top;
	var p = /top|bottom/.test(i),
		u = p ? 2 * c.left - s + l : 2 * c.top - n + d,
		h = p ? "offsetWidth" : "offsetHeight";
	o.offset(e), this.replaceArrow(u, o[0][h], p)
}, i.prototype.replaceArrow = function(t, e, i) {
	this.arrow().css(i ? "left" : "top", 50 * (1 - t / e) + "%").css(i ? "top" : "left", "")
}, i.prototype.setContent = function() {
	var t = this.tip(),
		e = this.getTitle();
	t.find(".tooltip-inner")[this.options.html ? "html" : "text"](e), t.removeClass("fade in top bottom left right")
}, i.prototype.hide = function(e) {
	function o() {
		"in" != s.hoverState && n.detach(), s.$element && s.$element.removeAttr("aria-describedby").trigger("hidden.bs." + s.type), e && e()
	}
	var s = this,
		n = t(this.$tip),
		r = t.Event("hide.bs." + this.type);
	if (this.$element.trigger(r), !r.isDefaultPrevented()) return n.removeClass("in"), t.support.transition && n.hasClass("fade") ? n.one("bsTransitionEnd", o).emulateTransitionEnd(i.TRANSITION_DURATION) : o(), this.hoverState = null, this
}, i.prototype.fixTitle = function() {
	var t = this.$element;
	(t.attr("title") || "string" != typeof t.attr("data-original-title")) && t.attr("data-original-title", t.attr("title") || "").attr("title", "")
}, i.prototype.hasContent = function() {
	return this.getTitle()
}, i.prototype.getPosition = function(e) {
	e = e || this.$element;
	var i = e[0],
		o = "BODY" == i.tagName,
		s = i.getBoundingClientRect();
	null == s.width && (s = t.extend({}, s, {
		width: s.right - s.left,
		height: s.bottom - s.top
	}));
	var n = window.SVGElement && i instanceof window.SVGElement,
		r = o ? {
			top: 0,
			left: 0
		} : n ? null : e.offset(),
		a = {
			scroll: o ? document.documentElement.scrollTop || document.body.scrollTop : e.scrollTop()
		},
		l = o ? {
			width: t(window).width(),
			height: t(window).height()
		} : null;
	return t.extend({}, s, a, l, r)
}, i.prototype.getCalculatedOffset = function(t, e, i, o) {
	return "bottom" == t ? {
		top: e.top + e.height,
		left: e.left + e.width / 2 - i / 2
	} : "top" == t ? {
		top: e.top - o,
		left: e.left + e.width / 2 - i / 2
	} : "left" == t ? {
		top: e.top + e.height / 2 - o / 2,
		left: e.left - i
	} : {
		top: e.top + e.height / 2 - o / 2,
		left: e.left + e.width
	}
}, i.prototype.getViewportAdjustedDelta = function(t, e, i, o) {
	var s = {
		top: 0,
		left: 0
	};
	if (!this.$viewport) return s;
	var n = this.options.viewport && this.options.viewport.padding || 0,
		r = this.getPosition(this.$viewport);
	if (/right|left/.test(t)) {
		var a = e.top - n - r.scroll,
			l = e.top + n - r.scroll + o;
		a < r.top ? s.top = r.top - a : l > r.top + r.height && (s.top = r.top + r.height - l)
	} else {
		var d = e.left - n,
			c = e.left + n + i;
		d < r.left ? s.left = r.left - d : c > r.right && (s.left = r.left + r.width - c)
	}
	return s
}, i.prototype.getTitle = function() {
	var t = this.$element,
		e = this.options;
	return t.attr("data-original-title") || ("function" == typeof e.title ? e.title.call(t[0]) : e.title)
}, i.prototype.getUID = function(t) {
	do {
		t += ~~(1e6 * Math.random())
	} while (document.getElementById(t));
	return t
}, i.prototype.tip = function() {
	if (!this.$tip && (this.$tip = t(this.options.template), 1 != this.$tip.length)) throw new Error(this.type + " `template` option must consist of exactly 1 top-level element!");
	return this.$tip
}, i.prototype.arrow = function() {
	return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
}, i.prototype.enable = function() {
	this.enabled = !0
}, i.prototype.disable = function() {
	this.enabled = !1
}, i.prototype.toggleEnabled = function() {
	this.enabled = !this.enabled
}, i.prototype.toggle = function(e) {
	var i = this;
	e && ((i = t(e.currentTarget).data("bs." + this.type)) || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i))), e ? (i.inState.click = !i.inState.click,
		i.isInStateTrue() ? i.enter(i) : i.leave(i)) : i.tip().hasClass("in") ? i.leave(i) : i.enter(i)
}, i.prototype.destroy = function() {
	var t = this;
	clearTimeout(this.timeout), this.hide(function() {
		t.$element.off("." + t.type).removeData("bs." + t.type), t.$tip && t.$tip.detach(), t.$tip = null, t.$arrow = null, t.$viewport = null, t.$element = null
	})
};
var o = t.fn.tooltip;
t.fn.tooltip = e, t.fn.tooltip.Constructor = i, t.fn.tooltip.noConflict = function() {
	return t.fn.tooltip = o, this
}
}(jQuery),
function(t) {
"use strict";

function e(e) {
	return this.each(function() {
		var o = t(this),
			s = o.data("bs.popover"),
			n = "object" == typeof e && e;
		!s && /destroy|hide/.test(e) || (s || o.data("bs.popover", s = new i(this, n)), "string" == typeof e && s[e]())
	})
}
var i = function(t, e) {
	this.init("popover", t, e)
};
if (!t.fn.tooltip) throw new Error("Popover requires tooltip.js");
i.VERSION = "3.3.7", i.DEFAULTS = t.extend({}, t.fn.tooltip.Constructor.DEFAULTS, {
	placement: "right",
	trigger: "click",
	content: "",
	template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
}), i.prototype = t.extend({}, t.fn.tooltip.Constructor.prototype), i.prototype.constructor = i, i.prototype.getDefaults = function() {
	return i.DEFAULTS
}, i.prototype.setContent = function() {
	var t = this.tip(),
		e = this.getTitle(),
		i = this.getContent();
	t.find(".popover-title")[this.options.html ? "html" : "text"](e), t.find(".popover-content").children().detach().end()[this.options.html ? "string" == typeof i ? "html" : "append" : "text"](i), t.removeClass("fade top bottom left right in"), t.find(".popover-title").html() || t.find(".popover-title").hide()
}, i.prototype.hasContent = function() {
	return this.getTitle() || this.getContent()
}, i.prototype.getContent = function() {
	var t = this.$element,
		e = this.options;
	return t.attr("data-content") || ("function" == typeof e.content ? e.content.call(t[0]) : e.content)
}, i.prototype.arrow = function() {
	return this.$arrow = this.$arrow || this.tip().find(".arrow")
};
var o = t.fn.popover;
t.fn.popover = e, t.fn.popover.Constructor = i, t.fn.popover.noConflict = function() {
	return t.fn.popover = o, this
}
}(jQuery),
function(t) {
"use strict";

function e(i, o) {
	this.$body = t(document.body), this.$scrollElement = t(t(i).is(document.body) ? window : i), this.options = t.extend({}, e.DEFAULTS, o), this.selector = (this.options.target || "") + " .nav li > a", this.offsets = [], this.targets = [], this.activeTarget = null, this.scrollHeight = 0, this.$scrollElement.on("scroll.bs.scrollspy", t.proxy(this.process, this)), this.refresh(), this.process()
}

function i(i) {
	return this.each(function() {
		var o = t(this),
			s = o.data("bs.scrollspy"),
			n = "object" == typeof i && i;
		s || o.data("bs.scrollspy", s = new e(this, n)), "string" == typeof i && s[i]()
	})
}
e.VERSION = "3.3.7", e.DEFAULTS = {
	offset: 10
}, e.prototype.getScrollHeight = function() {
	return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
}, e.prototype.refresh = function() {
	var e = this,
		i = "offset",
		o = 0;
	this.offsets = [], this.targets = [], this.scrollHeight = this.getScrollHeight(), t.isWindow(this.$scrollElement[0]) || (i = "position", o = this.$scrollElement.scrollTop()), this.$body.find(this.selector).map(function() {
		var e = t(this),
			s = e.data("target") || e.attr("href"),
			n = /^#./.test(s) && t(s);
		return n && n.length && n.is(":visible") && [
			[n[i]().top + o, s]
		] || null
	}).sort(function(t, e) {
		return t[0] - e[0]
	}).each(function() {
		e.offsets.push(this[0]), e.targets.push(this[1])
	})
}, e.prototype.process = function() {
	var t, e = this.$scrollElement.scrollTop() + this.options.offset,
		i = this.getScrollHeight(),
		o = this.options.offset + i - this.$scrollElement.height(),
		s = this.offsets,
		n = this.targets,
		r = this.activeTarget;
	if (this.scrollHeight != i && this.refresh(), e >= o) return r != (t = n[n.length - 1]) && this.activate(t);
	if (r && e < s[0]) return this.activeTarget = null, this.clear();
	for (t = s.length; t--;) r != n[t] && e >= s[t] && (void 0 === s[t + 1] || e < s[t + 1]) && this.activate(n[t])
}, e.prototype.activate = function(e) {
	this.activeTarget = e, this.clear();
	var i = this.selector + '[data-target="' + e + '"],' + this.selector + '[href="' + e + '"]',
		o = t(i).parents("li").addClass("active");
	o.parent(".dropdown-menu").length && (o = o.closest("li.dropdown").addClass("active")), o.trigger("activate.bs.scrollspy")
}, e.prototype.clear = function() {
	t(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
};
var o = t.fn.scrollspy;
t.fn.scrollspy = i, t.fn.scrollspy.Constructor = e, t.fn.scrollspy.noConflict = function() {
	return t.fn.scrollspy = o, this
}, t(window).on("load.bs.scrollspy.data-api", function() {
	t('[data-spy="scroll"]').each(function() {
		var e = t(this);
		i.call(e, e.data())
	})
})
}(jQuery),
function(t) {
"use strict";

function e(e) {
	return this.each(function() {
		var o = t(this),
			s = o.data("bs.tab");
		s || o.data("bs.tab", s = new i(this)), "string" == typeof e && s[e]()
	})
}
var i = function(e) {
	this.element = t(e)
};
i.VERSION = "3.3.7", i.TRANSITION_DURATION = 150, i.prototype.show = function() {
	var e = this.element,
		i = e.closest("ul:not(.dropdown-menu)"),
		o = e.data("target");
	if (o || (o = e.attr("href"), o = o && o.replace(/.*(?=#[^\s]*$)/, "")), !e.parent("li").hasClass("active")) {
		var s = i.find(".active:last a"),
			n = t.Event("hide.bs.tab", {
				relatedTarget: e[0]
			}),
			r = t.Event("show.bs.tab", {
				relatedTarget: s[0]
			});
		if (s.trigger(n), e.trigger(r), !r.isDefaultPrevented() && !n.isDefaultPrevented()) {
			var a = t(o);
			this.activate(e.closest("li"), i), this.activate(a, a.parent(), function() {
				s.trigger({
					type: "hidden.bs.tab",
					relatedTarget: e[0]
				}), e.trigger({
					type: "shown.bs.tab",
					relatedTarget: s[0]
				})
			})
		}
	}
}, i.prototype.activate = function(e, o, s) {
	function n() {
		r.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), e.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), a ? (e[0].offsetWidth, e.addClass("in")) : e.removeClass("fade"), e.parent(".dropdown-menu").length && e.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), s && s()
	}
	var r = o.find("> .active"),
		a = s && t.support.transition && (r.length && r.hasClass("fade") || !!o.find("> .fade").length);
	r.length && a ? r.one("bsTransitionEnd", n).emulateTransitionEnd(i.TRANSITION_DURATION) : n(), r.removeClass("in")
};
var o = t.fn.tab;
t.fn.tab = e, t.fn.tab.Constructor = i, t.fn.tab.noConflict = function() {
	return t.fn.tab = o, this
};
var s = function(i) {
	i.preventDefault(), e.call(t(this), "show")
};
t(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', s).on("click.bs.tab.data-api", '[data-toggle="pill"]', s)
}(jQuery),
function(t) {
"use strict";

function e(e) {
	return this.each(function() {
		var o = t(this),
			s = o.data("bs.affix"),
			n = "object" == typeof e && e;
		s || o.data("bs.affix", s = new i(this, n)), "string" == typeof e && s[e]()
	})
}
var i = function(e, o) {
	this.options = t.extend({}, i.DEFAULTS, o), this.$target = t(this.options.target).on("scroll.bs.affix.data-api", t.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", t.proxy(this.checkPositionWithEventLoop, this)), this.$element = t(e), this.affixed = null, this.unpin = null, this.pinnedOffset = null, this.checkPosition()
};
i.VERSION = "3.3.7", i.RESET = "affix affix-top affix-bottom", i.DEFAULTS = {
	offset: 0,
	target: window
}, i.prototype.getState = function(t, e, i, o) {
	var s = this.$target.scrollTop(),
		n = this.$element.offset(),
		r = this.$target.height();
	if (null != i && "top" == this.affixed) return s < i && "top";
	if ("bottom" == this.affixed) return null != i ? !(s + this.unpin <= n.top) && "bottom" : !(s + r <= t - o) && "bottom";
	var a = null == this.affixed,
		l = a ? s : n.top,
		d = a ? r : e;
	return null != i && s <= i ? "top" : null != o && l + d >= t - o && "bottom"
}, i.prototype.getPinnedOffset = function() {
	if (this.pinnedOffset) return this.pinnedOffset;
	this.$element.removeClass(i.RESET).addClass("affix");
	var t = this.$target.scrollTop(),
		e = this.$element.offset();
	return this.pinnedOffset = e.top - t
}, i.prototype.checkPositionWithEventLoop = function() {
	setTimeout(t.proxy(this.checkPosition, this), 1)
}, i.prototype.checkPosition = function() {
	if (this.$element.is(":visible")) {
		var e = this.$element.height(),
			o = this.options.offset,
			s = o.top,
			n = o.bottom,
			r = Math.max(t(document).height(), t(document.body).height());
		"object" != typeof o && (n = s = o), "function" == typeof s && (s = o.top(this.$element)), "function" == typeof n && (n = o.bottom(this.$element));
		var a = this.getState(r, e, s, n);
		if (this.affixed != a) {
			null != this.unpin && this.$element.css("top", "");
			var l = "affix" + (a ? "-" + a : ""),
				d = t.Event(l + ".bs.affix");
			if (this.$element.trigger(d), d.isDefaultPrevented()) return;
			this.affixed = a, this.unpin = "bottom" == a ? this.getPinnedOffset() : null, this.$element.removeClass(i.RESET).addClass(l).trigger(l.replace("affix", "affixed") + ".bs.affix")
		}
		"bottom" == a && this.$element.offset({
			top: r - e - n
		})
	}
};
var o = t.fn.affix;
t.fn.affix = e, t.fn.affix.Constructor = i, t.fn.affix.noConflict = function() {
	return t.fn.affix = o, this
}, t(window).on("load", function() {
	t('[data-spy="affix"]').each(function() {
		var i = t(this),
			o = i.data();
		o.offset = o.offset || {}, null != o.offsetBottom && (o.offset.bottom = o.offsetBottom), null != o.offsetTop && (o.offset.top = o.offsetTop), e.call(i, o)
	})
})
}(jQuery),
function(t, e, i) {
"use strict";
var o, s = t.lazySizes && lazySizes.cfg || t.lazySizesConfig,
	n = e.createElement("img"),
	r = "sizes" in n && "srcset" in n,
	a = /\s+\d+h/g,
	l = function() {
		var t = /\s+(\d+)(w|h)\s+(\d+)(w|h)/,
			i = Array.prototype.forEach;
		return function(o) {
			var s = e.createElement("img"),
				n = function(e) {
					var i, o = e.getAttribute(lazySizesConfig.srcsetAttr);
					o && (o.match(t) && (i = "w" == RegExp.$2 ? RegExp.$1 / RegExp.$3 : RegExp.$3 / RegExp.$1) && e.setAttribute("data-aspectratio", i), e.setAttribute(lazySizesConfig.srcsetAttr, o.replace(a, "")))
				},
				r = function(t) {
					var e = t.target.parentNode;
					e && "PICTURE" == e.nodeName && i.call(e.getElementsByTagName("source"), n), n(t.target)
				},
				l = function() {
					s.currentSrc && e.removeEventListener("lazybeforeunveil", r)
				};
			o[1] && (e.addEventListener("lazybeforeunveil", r), s.onload = l, s.onerror = l, s.srcset = "data:,a 1w 1h", s.complete && l())
		}
	}();
if (s || (s = {}, t.lazySizesConfig = s), s.supportsType || (s.supportsType = function(t) {
		return !t
	}), !t.picturefill && !s.pf) {
	if (t.HTMLPictureElement && r) return e.msElementsFromPoint && l(navigator.userAgent.match(/Edge\/(\d+)/)), void(s.pf = function() {});
	s.pf = function(e) {
		var i, s;
		if (!t.picturefill)
			for (i = 0, s = e.elements.length; i < s; i++) o(e.elements[i])
	}, o = function() {
		var i = function(t, e) {
				return t.w - e.w
			},
			n = /^\s*\d+\.*\d*px\s*$/,
			l = function(t) {
				var e, i, o = t.length,
					s = t[o - 1],
					n = 0;
				for (n; n < o; n++)
					if (s = t[n], s.d = s.w / t.w, s.d >= t.d) {
						!s.cached && (e = t[n - 1]) && e.d > t.d - .13 * Math.pow(t.d, 2.2) && (i = Math.pow(e.d - .6, 1.6), e.cached && (e.d += .15 * i), e.d + (s.d - t.d) * i > t.d && (s = e));
						break
					}
				return s
			},
			d = function() {
				var t, e = /(([^,\s].[^\s]+)\s+(\d+)w)/g,
					i = /\s/,
					o = function(e, i, o, s) {
						t.push({
							c: i,
							u: o,
							w: 1 * s
						})
					};
				return function(s) {
					return t = [], s = s.trim(), s.replace(a, "").replace(e, o), t.length || !s || i.test(s) || t.push({
						c: s,
						u: s,
						w: 99
					}), t
				}
			}(),
			c = function() {
				c.init || (c.init = !0, addEventListener("resize", function() {
					var t, i = e.getElementsByClassName("lazymatchmedia"),
						s = function() {
							var t, e;
							for (t = 0, e = i.length; t < e; t++) o(i[t])
						};
					return function() {
						clearTimeout(t), t = setTimeout(s, 66)
					}
				}()))
			},
			p = function(e, i) {
				var o, n = e.getAttribute("srcset") || e.getAttribute(s.srcsetAttr);
				!n && i && (n = e._lazypolyfill ? e._lazypolyfill._set : e.getAttribute(s.srcAttr) || e.getAttribute("src")), e._lazypolyfill && e._lazypolyfill._set == n || (o = d(n || ""), i && e.parentNode && (o.isPicture = "PICTURE" == e.parentNode.nodeName.toUpperCase(), o.isPicture && t.matchMedia && (lazySizes.aC(e, "lazymatchmedia"), c())), o._set = n, Object.defineProperty(e, "_lazypolyfill", {
					value: o,
					writable: !0
				}))
			},
			u = function(e) {
				var i = t.devicePixelRatio || 1,
					o = lazySizes.getX && lazySizes.getX(e);
				return Math.min(o || i, 2.5, i)
			},
			h = function(e) {
				return t.matchMedia ? (h = function(t) {
					return !t || (matchMedia(t) || {}).matches
				})(e) : !e
			},
			f = function(t) {
				var e, o, r, a, d, c, f;
				if (a = t, p(a, !0), d = a._lazypolyfill, d.isPicture)
					for (o = 0, e = t.parentNode.getElementsByTagName("source"), r = e.length; o < r; o++)
						if (s.supportsType(e[o].getAttribute("type"), t) && h(e[o].getAttribute("media"))) {
							a = e[o], p(a), d = a._lazypolyfill;
							break
						}
				return d.length > 1 ? (f = a.getAttribute("sizes") || "", f = n.test(f) && parseInt(f, 10) || lazySizes.gW(t, t.parentNode), d.d = u(t), !d.src || !d.w || d.w < f ? (d.w = f, c = l(d.sort(i)), d.src = c) : c = d.src) : c = d[0], c
			},
			g = function(t) {
				if (!r || !t.parentNode || "PICTURE" == t.parentNode.nodeName.toUpperCase()) {
					var e = f(t);
					e && e.u && t._lazypolyfill.cur != e.u && (t._lazypolyfill.cur = e.u, e.cached = !0, t.setAttribute(s.srcAttr, e.u), t.setAttribute("src", e.u))
				}
			};
		return g.parse = d, g
	}(), s.loadedClass && s.loadingClass && function() {
		var t = [];
		['img[sizes$="px"][srcset].', "picture > img:not([srcset])."].forEach(function(e) {
			t.push(e + s.loadedClass), t.push(e + s.loadingClass)
		}), s.pf({
			elements: e.querySelectorAll(t.join(", "))
		})
	}()
}
}(window, document),
function(t) {
"use strict";
var e, i = t.createElement("img");
!("srcset" in i) || "sizes" in i || window.HTMLPictureElement || (e = /^picture$/i, t.addEventListener("lazybeforeunveil", function(i) {
	var o, s, n, r, a, l, d;
	!i.defaultPrevented && !lazySizesConfig.noIOSFix && (o = i.target) && (n = o.getAttribute(lazySizesConfig.srcsetAttr)) && (s = o.parentNode) && ((a = e.test(s.nodeName || "")) || (r = o.getAttribute("sizes") || o.getAttribute(lazySizesConfig.sizesAttr))) && (l = a ? s : t.createElement("picture"), o._lazyImgSrc || Object.defineProperty(o, "_lazyImgSrc", {
		value: t.createElement("source"),
		writable: !0
	}), d = o._lazyImgSrc, r && d.setAttribute("sizes", r), d.setAttribute(lazySizesConfig.srcsetAttr, n), o.setAttribute("data-pfsrcset", n), o.removeAttribute(lazySizesConfig.srcsetAttr), a || (s.insertBefore(l, o), l.appendChild(o)), l.insertBefore(d, o))
}))
}(document),
function() {
"use strict";
if (window.addEventListener) {
	var t = /\s+/g,
		e = /\s*\|\s+|\s+\|\s*/g,
		i = /^(.+?)(?:\s+\[\s*(.+?)\s*\])?$/,
		o = /\(|\)|'/,
		s = {
			contain: 1,
			cover: 1
		},
		n = function(t) {
			var e = lazySizes.gW(t, t.parentNode);
			return (!t._lazysizesWidth || e > t._lazysizesWidth) && (t._lazysizesWidth = e), t._lazysizesWidth
		},
		r = function(t) {
			var e;
			return e = (getComputedStyle(t) || {
				getPropertyValue: function() {}
			}).getPropertyValue("background-size"), !s[e] && s[t.style.backgroundSize] && (e = t.style.backgroundSize), e
		},
		a = function(o, s, n) {
			var r = document.createElement("picture"),
				a = s.getAttribute(lazySizesConfig.sizesAttr),
				l = s.getAttribute("data-ratio"),
				d = s.getAttribute("data-optimumx");
			s._lazybgset && s._lazybgset.parentNode == s && s.removeChild(s._lazybgset), Object.defineProperty(n, "_lazybgset", {
				value: s,
				writable: !0
			}), Object.defineProperty(s, "_lazybgset", {
				value: r,
				writable: !0
			}), o = o.replace(t, " ").split(e), r.style.display = "none", n.className = lazySizesConfig.lazyClass, 1 != o.length || a || (a = "auto"), o.forEach(function(t) {
				var e = document.createElement("source");
				a && "auto" != a && e.setAttribute("sizes", a), t.match(i) && (e.setAttribute(lazySizesConfig.srcsetAttr, RegExp.$1), RegExp.$2 && e.setAttribute("media", lazySizesConfig.customMedia[RegExp.$2] || RegExp.$2)), r.appendChild(e)
			}), a && (n.setAttribute(lazySizesConfig.sizesAttr, a), s.removeAttribute(lazySizesConfig.sizesAttr), s.removeAttribute("sizes")), d && n.setAttribute("data-optimumx", d), l && n.setAttribute("data-ratio", l), r.appendChild(n), s.appendChild(r)
		},
		l = function(t) {
			if (t.target._lazybgset) {
				var e = t.target,
					i = e._lazybgset,
					s = e.currentSrc || e.src;
				s && (i.style.backgroundImage = "url(" + (o.test(s) ? JSON.stringify(s) : s) + ")"), e._lazybgsetLoading && (lazySizes.fire(i, "_lazyloaded", {}, !1, !0), delete e._lazybgsetLoading)
			}
		};
	addEventListener("lazybeforeunveil", function(t) {
		var e, i, o;
		!t.defaultPrevented && (e = t.target.getAttribute("data-bgset")) && (o = t.target, i = document.createElement("img"), i.alt = "", i._lazybgsetLoading = !0, t.detail.firesLoad = !0, a(e, o, i), setTimeout(function() {
			lazySizes.loader.unveil(i), lazySizes.rAF(function() {
				lazySizes.fire(i, "_lazyloaded", {}, !0, !0), i.complete && l({
					target: i
				})
			})
		}))
	}), document.addEventListener("load", l, !0), window.addEventListener("lazybeforesizes", function(t) {
		if (t.target._lazybgset && t.detail.dataAttr) {
			var e = t.target._lazybgset,
				i = r(e);
			s[i] && (t.target._lazysizesParentFit = i, lazySizes.rAF(function() {
				t.target.setAttribute("data-parent-fit", i), t.target._lazysizesParentFit && delete t.target._lazysizesParentFit
			}))
		}
	}, !0), document.documentElement.addEventListener("lazybeforesizes", function(t) {
		!t.defaultPrevented && t.target._lazybgset && (t.detail.width = n(t.target._lazybgset))
	})
}
}(),
function() {
"use strict";

function t(o) {
	this.options = e.extend({}, i.defaults, t.defaults, o), this.element = this.options.element, this.$element = e(this.element), this.createWrapper(), this.createWaypoint()
}
var e = window.jQuery,
	i = window.Waypoint;
t.prototype.createWaypoint = function() {
	var t = this.options.handler;
	this.waypoint = new i(e.extend({}, this.options, {
		element: this.wrapper,
		handler: e.proxy(function(e) {
			var i = this.options.direction.indexOf(e) > -1,
				o = i ? this.$element.outerHeight(!0) : "";
			this.$wrapper.height(o), this.$element.toggleClass(this.options.stuckClass, i), t && t.call(this, e)
		}, this)
	}))
}, t.prototype.createWrapper = function() {
	this.options.wrapper && this.$element.wrap(this.options.wrapper), this.$wrapper = this.$element.parent(), this.wrapper = this.$wrapper[0]
}, t.prototype.destroy = function() {
	this.$element.parent()[0] === this.wrapper && (this.waypoint.destroy(), this.$element.removeClass(this.options.stuckClass), this.options.wrapper && this.$element.unwrap())
}, t.defaults = {
	wrapper: '<div class="sticky-wrapper" />',
	stuckClass: "stuck",
	direction: "down right"
}, i.Sticky = t
}(),
function() {
var t = [].slice;
! function(e, i, o) {
	var s, n, r, a;
	e.fn.extend({
		sidenotes: function() {
			var i, o;
			return o = arguments[0], i = 2 <= arguments.length ? t.call(arguments, 1) : [], this.each(function() {
				var t, s, n;
				return t = e(this), s = null != (n = t.data("sidenotes")) ? n : t.data("sidenotes", new r(this, o)), "string" == typeof o && (s[o].apply(s, i), "destroy" === o && t.removeData("sidenotes")), !0
			})
		}
	}), r = function() {
		function t(t, i) {
			var o, r;
			this.options = e.extend({}, this.options, i), this.options.sidenotePlacement = this.options.placement || this.options.sidenotePlacement, this.options.hideFootnoteContainer && (this.$footnoteContainer = e(this.options.footnoteContainerSelector, t)), this.$footnoteContainer = 0 !== this.$footnoteContainer.size() ? this.$footnoteContainer : null, this.$postContainer = this.$footnoteContainer.parent(), this.$footnotes = e(this.options.footnoteContainerSelector + " " + this.options.footnoteSelector, this.$postContainer), this.sidenotesAfterRef = "after" === this.options.sidenotePlacement, r = 1, this.sidenotes = [], this.groups = [], o = this, this.$footnotes.each(function() {
				var t, e, i, a, l, d, c;
				if (t = this, e = t.id, a = o.options.removeRefMarkRegex.test(e), d = new s(t, a ? null : r++, o), o.sidenotes.push(d), l = null != (c = o.sidenotes[o.sidenotes.length - 2]) ? c : null, null != l ? l.$pivot.is(d.$pivot) : void 0) return l.hasGroup() ? l.group.push(d) : (i = new n([l, d], o), o.groups.push(i))
			}), this.isHidden = this.options.initiallyHidden, this.isHidden ? this.hide(!0) : this.show(!0)
		}
		return t.prototype.options = {
			footnoteContainerSelector: ".footnotes",
			footnoteSelector: "> ol > li",
			initiallyHidden: !1,
			removeRefMarkRegex: /(?!)/,
			refMarkClass: "ref-mark",
			sidenoteClass: "sidenote",
			sidenoteGroupClass: "sidenote-group",
			sidenoteElement: "aside",
			sidenoteGroupElement: "div",
			sidenotePlacement: "before",
			hideFootnoteContainer: !0,
			formatSidenote: function(t, i, o) {
				var s;
				return s = e("<" + this.sidenoteElement + "/>", {
					class: this.sidenoteClass
				}).html(t).attr("id", i), null != o && (s.attr("data-ref", o), s.prepend(e("<span/>", {
					class: this.refMarkClass
				}).html(o))), s
			},
			formatSidenoteID: function(t) {
				return t.replace(/^f/, "s")
			},
			hide: function(t) {
				return t.hide()
			},
			show: function(t) {
				return t.show()
			}
		}, t.prototype.show = function(t) {
			var e, i, o, s, n, r, a, l;
			if (this.isHidden || t) {
				for (a = this.sidenotes, o = 0, n = a.length; o < n; o++) i = a[o], t && !i.hasGroup() && i.$pivot[this.sidenotePlacement()](i.$sidenote), i.show();
				for (l = this.groups, s = 0, r = l.length; s < r; s++) e = l[s], t && e.$pivot[this.sidenotePlacement()](e.$group), e.show();
				return null != this.$footnoteContainer && this.options.hideFootnoteContainer && this.options.hide(this.$footnoteContainer), this.isHidden = !1
			}
		}, t.prototype.hide = function(t) {
			var e, i, o, s, n, r, a, l;
			if (!this.isHidden || t) {
				for (a = this.sidenotes, o = 0, n = a.length; o < n; o++) i = a[o], t && !i.hasGroup() && i.$pivot[this.sidenotePlacement()](i.$sidenote), i.hide();
				for (l = this.groups, s = 0, r = l.length; s < r; s++) e = l[s], t && e.$pivot[this.sidenotePlacement()](e.$group), e.hide();
				return null != this.$footnoteContainer && this.options.show(this.$footnoteContainer), this.isHidden = !0
			}
		}, t.prototype.sidenotePlacement = function(t, e) {
			var i, o, s, n, r, a, l, d;
			if ("before" !== t && "after" !== t || t === this.sidenotePlacement() && !e) return this.sidenotesAfterRef ? "after" : "before";
			for (l = this.sidenotes, s = 0, r = l.length; s < r; s++) o = l[s], o.hasGroup() || o.$pivot[t](o.$sidenote);
			for (d = this.groups, n = 0, a = d.length; n < a; n++) i = d[n], i.$pivot[t](i.$group);
			return this.sidenotesAfterRef = "after" === t
		}, t.prototype.placement = function(t, e) {
			return this.sidenotePlacement(t, e)
		}, t.prototype.destroy = function() {
			var t, e, i, o, s, n, r, a, l;
			for (this.hide(), r = this.sidenotes, i = 0, s = r.length; i < s; i++) e = r[i], e.$sidenote.remove();
			for (a = this.groups, l = [], o = 0, n = a.length; o < n; o++) t = a[o], l.push(t.$group.remove());
			return l
		}, t
	}(), s = function() {
		function t(t, i, o) {
			var s, n, r, l, d, c;
			if (this.$footnote = e(t), this.owner = o, this.footnoteID = t.id, this.sidenoteID = this.owner.options.formatSidenoteID(this.footnoteID), this.ref = i > 0 ? i : null, this.$refMarkAnchor = e("a[href='#" + a(this.footnoteID) + "']", this.owner.$postContainer), this.$refMarkSup = this.$refMarkAnchor.parent("sup"), this.$refMarkSup = 0 !== this.$refMarkSup.size() ? this.$refMarkSup : null, this.isNested = e.contains(this.owner.$footnoteContainer.get(0), this.refMark().get(0)), this.isNested)
				for (n = this.refMark().closest(this.owner.$footnotes), c = this.owner.sidenotes, l = 0, d = c.length; l < d; l++)
					if (r = c[l], r.$footnote.is(n)) {
						this.referringSidenote = r;
						break
					}
			this.refMarkID = this.refMark().attr("id"), this.originalRef = this.$refMarkAnchor.html(), this.$sidenote = this.owner.options.formatSidenote(this.$footnote.html(), this.sidenoteID, this.ref), this.$pivot = this.isNested ? this.referringSidenote.$pivot : this.refMark().parentsUntil(this.owner.$postContainer).last(), this.group = null, s = e("a[href='#" + a(this.refMarkID) + "']", this.$sidenote), null != s && this.noMark() && this.owner.options.hide(s), this.owner.options.hide(this.$sidenote), this.isHidden = !0
		}
		return t.prototype.noMark = function() {
			return null == this.ref
		}, t.prototype.hasGroup = function() {
			return null != this.group
		}, t.prototype.show = function(t) {
			if (this.isHidden || t) return this.noMark() ? this.owner.options.hide(this.refMark()) : (this.$refMarkAnchor.html(this.ref), this.$refMarkAnchor.attr("href", "#" + this.sidenoteID)), this.owner.options.show(this.$sidenote), this.owner.options.hide(this.$footnote), this.isHidden = !1
		}, t.prototype.hide = function(t) {
			if (!this.isHidden || t) return this.$refMarkAnchor.html(this.originalRef), this.$refMarkAnchor.attr("href", "#" + this.footnoteID), this.owner.options.show(this.refMark()), this.owner.options.hide(this.$sidenote), this.owner.options.show(this.$footnote), this.isHidden = !0
		}, t.prototype.refMark = function() {
			var t;
			return null != (t = this.$refMarkSup) ? t : this.$refMarkAnchor
		}, t
	}(), n = function() {
		function t(t, i) {
			var o;
			this.sidenotes = [], this.owner = i, this.$group = e("<" + this.owner.options.sidenoteGroupElement + "/>", {
				class: this.owner.options.sidenoteGroupClass
			}), this.push(t), this.$pivot = null != (o = this.sidenotes[0]) ? o.$pivot : void 0, this.owner.options.hide(this.$group), this.isHidden = !0
		}
		return t.prototype.push = function(t) {
			var e, i, o, s, n;
			for (i = t instanceof Array ? t : [t], (n = this.sidenotes).push.apply(n, i), o = 0, s = i.length; o < s; o++) e = i[o], this.$group.append(e.$sidenote), e.group = this;
			return null != this.$pivot ? this.$pivot : this.$pivot = this.sidenotes[0].pivot
		}, t.prototype.show = function() {
			if (this.isHidden) return this.owner.options.show(this.$group), this.isHidden = !1
		}, t.prototype.hide = function() {
			if (!this.isHidden) return this.owner.options.hide(this.$group), this.isHidden = !0
		}, t
	}(), a = function(t) {
		return t.replace(/([#;&,\.\+\*\~':"\!\^$\[\]\(\)=>\|])/g, "\\$1")
	}
}(jQuery, window, document)
}.call(this),
function() {
	var t, e;
	t = window.jQuery, e = t(window), t.fn.stick_in_parent = function(i) {
		var o, s, n, r, a, l, d, c, p, u, h, f, g;
		for (null == i && (i = {}), g = i.sticky_class, l = i.inner_scrolling, f = i.recalc_every, h = i.parent, p = i.offset_top, c = i.spacer, n = i.bottoming, null == p && (p = 0), null == h && (h = void 0), null == l && (l = !0), null == g && (g = "is_stuck"), o = t(document), null == n && (n = !0), u = function(t) {
				var e, i;
				return window.getComputedStyle ? (t[0], e = window.getComputedStyle(t[0]), i = parseFloat(e.getPropertyValue("width")) + parseFloat(e.getPropertyValue("margin-left")) + parseFloat(e.getPropertyValue("margin-right")), "border-box" !== e.getPropertyValue("box-sizing") && (i += parseFloat(e.getPropertyValue("border-left-width")) + parseFloat(e.getPropertyValue("border-right-width")) + parseFloat(e.getPropertyValue("padding-left")) + parseFloat(e.getPropertyValue("padding-right"))), i) : t.outerWidth(!0)
			}, r = function(i, s, r, a, d, v, m, y) {
				var w, b, k, T, $, S, C, x, A, j, z, E;
				if (!i.data("sticky_kit")) {
					if (i.data("sticky_kit", !0), $ = o.height(), C = i.parent(), null != h && (C = C.closest(h)), !C.length) throw "failed to find stick parent";
					if (k = !1, w = !1, z = null != c ? c && i.closest(c) : t("<div />"), z && z.css("position", i.css("position")), x = function() {
							var t, e, n;
							if (!y) return $ = o.height(), t = parseInt(C.css("border-top-width"), 10), e = parseInt(C.css("padding-top"), 10), s = parseInt(C.css("padding-bottom"), 10), r = C.offset().top + t + e, a = C.height(), k && (k = !1, w = !1, null == c && (i.insertAfter(z), z.detach()), i.css({
								position: "",
								top: "",
								width: "",
								bottom: ""
							}).removeClass(g), n = !0), d = i.offset().top - (parseInt(i.css("margin-top"), 10) || 0) - p, v = i.outerHeight(!0), m = i.css("float"), z && z.css({
								width: u(i),
								height: v,
								display: i.css("display"),
								"vertical-align": i.css("vertical-align"),
								float: m
							}), n ? E() : void 0
						}, x(), v !== a) return T = void 0, S = p, j = f, E = function() {
						var t, u, h, b, A, E;
						if (!y) return h = !1, null != j && (j -= 1) <= 0 && (j = f, x(), h = !0), h || o.height() === $ || (x(), h = !0), b = e.scrollTop(), null != T && (u = b - T), T = b, k ? (n && (A = b + v + S > a + r, w && !A && (w = !1, i.css({
							position: "fixed",
							bottom: "",
							top: S
						}).trigger("sticky_kit:unbottom"))), b < d && (k = !1, S = p, null == c && ("left" !== m && "right" !== m || i.insertAfter(z), z.detach()), t = {
							position: "",
							width: "",
							top: ""
						}, i.css(t).removeClass(g).trigger("sticky_kit:unstick")), l && (E = e.height(), v + p > E && (w || (S -= u, S = Math.max(E - v, S), S = Math.min(p, S), k && i.css({
							top: S + "px"
						}))))) : b > d && (k = !0, t = {
							position: "fixed",
							top: S
						}, t.width = "border-box" === i.css("box-sizing") ? i.outerWidth() + "px" : i.width() + "px", i.css(t).addClass(g), null == c && (i.after(z), "left" !== m && "right" !== m || z.append(i)), i.trigger("sticky_kit:stick")), k && n && (null == A && (A = b + v + S > a + r), !w && A) ? (w = !0, "static" === C.css("position") && C.css({
							position: "relative"
						}), i.css({
							position: "absolute",
							bottom: s,
							top: "auto"
						}).trigger("sticky_kit:bottom")) : void 0
					}, A = function() {
						return x(), E()
					}, b = function() {
						if (y = !0, e.off("touchmove", E), e.off("scroll", E), e.off("resize", A), t(document.body).off("sticky_kit:recalc", A), i.off("sticky_kit:detach", b), i.removeData("sticky_kit"), i.css({
								position: "",
								bottom: "",
								top: "",
								width: ""
							}), C.position("position", ""), k) return null == c && ("left" !== m && "right" !== m || i.insertAfter(z), z.remove()), i.removeClass(g)
					}, e.on("touchmove", E), e.on("scroll", E), e.on("resize", A), t(document.body).on("sticky_kit:recalc", A), i.on("sticky_kit:detach", b), setTimeout(E, 0)
				}
			}, a = 0, d = this.length; a < d; a++) s = this[a], r(t(s));
		return this
	}
}.call(this),
function(t) {
	function e() {}
	e.prototype = {
		constructor: e,
		elementInView: function(t, e) {
			e = e || !1;
			var i = jQuery(window).scrollTop(),
				o = i + jQuery(window).height(),
				s = jQuery(t).offset().top,
				n = jQuery(t).height(),
				r = s + n,
				a = o - s;
			return e && (a = o - r), a < 0 ? 0 : a
		},
		elementInViewProgress: function(t) {
			var e = jQuery(window).scrollTop(),
				i = e + jQuery(window).height(),
				o = jQuery(t).offset().top,
				s = jQuery(t).height(),
				n = i - o;
			return n < 0 ? 0 : n / s
		},
		getRandomInt: function(t, e) {
			return Math.floor(Math.random() * (e - t + 1)) + t
		},
		twoDigit: function(t) {
			return t > 9 ? "" + t : "0" + t
		},
		scrollGallery: function(e) {
			var i = (new Date).getTime(),
				o = !1;
			e.mousewheel(function(e) {
				var s = (new Date).getTime();
				s - i < 50 ? i = s : o || (i = s, e.deltaX < 0 ? (e.preventDefault(), t(this).slick("slickPrev")) : e.deltaX > 0 && (e.preventDefault(), t(this).slick("slickNext")))
			}), e.on("beforeChange", function(t, e, i, s) {
				o = !0
			}), e.on("afterChange", function(t, e, i, s) {
				o = !1
			})
		}
	};
	var e = new e,
		i = {
			common: {
				init: function() {
					window.lazySizesConfig = window.lazySizesConfig || {}, window.lazySizesConfig.customMedia = {
						"--xs": "(max-width: 768px)"
					}, jQuery(window).on("scroll", function(t) {
						jQuery(this).scrollTop() > 0 ? jQuery("body").addClass("body-scrolled") : jQuery("body").removeClass("body-scrolled")
					}), jQuery(document).on("click", ".grid-post a", function(t) {
						t.preventDefault();
						var e = window.location.hash,
							i = "";
						"" === e ? i += "#" : i = e.split(":")[0], i += ":post_" + jQuery(this).parents(".grid-post").attr("data-id"), history.replaceState(void 0, void 0, i), window.location = jQuery(this).attr("href")
					}), jQuery(".promo-bar-toggle").on("click", function(t) {
						t.preventDefault(), jQuery("body").removeClass("with-promo-bar")
					}), jQuery(".promo-bar").on("click", function(t) {
						sessionStorage.setItem("hideAdbar", "true")
					}), sessionStorage.getItem("hideAdbar") && jQuery("body").removeClass("with-promo-bar");
					var i = function() {
							var i = jQuery(".js-nav-sizer").height(),
								s = t(window).height() - i,
								n = t(window).width() - i,
								r = e.getRandomInt(0, n),
								a = e.getRandomInt(0, s),
								l = t('<div class="screensaver-eye"></div>');
							t(l).css({
								left: r,
								top: a
							}), t(l).hide(), t("body").append(l), t(l).fadeIn(), resetTimer(o)
						},
						o = 3e4;
					t(".no-touch").length && (screenSaverTimer = setTimeout(function() {
						i()
					}, 12e4), resetTimer = function(t) {
						clearTimeout(screenSaverTimer), screenSaverTimer = setTimeout(function() {
							i()
						}, t)
					}, jQuery(document).on("mousemove touchstart", function() {
						window.setTimeout(function() {
							t(".screensaver-eye").fadeOut(function() {
								t(this).remove()
							})
						}, 500), resetTimer(12e4)
					})), jQuery(".nav-letters").on("mouseenter", function() {
						var t = 0;
						jQuery(this).find(".nav-letter").each(function() {
							var e = this;
							window.setTimeout(function() {
								jQuery(e).addClass("is-active")
							}, 50 * t), window.setTimeout(function() {
								jQuery(e).removeClass("is-active")
							}, 50 * (t + 1)), t++
						})
					}), $postGallery = jQuery("#post-gallery"), $postGallery.length && t(document).keydown(function(e) {
						switch (e.which) {
							case 37:
								$postGallery.slick("slickPrev");
								break;
							case 39:
								$postGallery.slick("slickNext");
								break;
							case 27:
								t("#gallery-modal").modal("hide");
								break;
							default:
								return
						}
						e.preventDefault()
					});
					var s = jQuery(".post-column > :last-child");
					jQuery(".sprite-eye-black").length || (jQuery(s).is("p") ? jQuery(s).append('&nbsp;<span class="sprite-eye-black"></span>') : jQuery(".post-column").append('<div class="post-column-eye"><span class="sprite-eye-black"></span></div>')), jQuery(".post-content .t-module-caption").each(function() {
						jQuery(this).find("p").length || jQuery(this).wrapInner("<p>")
					}), jQuery("#related-articles").length && jQuery(window).on("scroll", function(t) {
						var e = 0;
						jQuery(window).width() >= 768 && (e = jQuery(".js-nav-sizer").height());
						var i = jQuery("#related-articles").offset().top - e,
							o = jQuery(this).scrollTop(),
							s = o / i;
						jQuery("#reading-indicator").css("width", 100 * s + "%")
					})
				},
				finalize: function() {
					jQuery(".grid-slideshow").each(function(t) {
						var i = jQuery(this);
						i.slick({
							arrows: !1,
							centerMode: !1,
							dots: !1,
							infinite: !0,
							speed: 300,
							mobileFirst: !0,
							variableWidth: !0,
							responsive: [{
								breakpoint: 767,
								settings: {
									centerMode: !0,
									centerPadding: 0,
									slidesToShow: 2,
									variableWidth: !1
								}
							}]
						}), e.scrollGallery(i);
						var o = function() {
							i.slick("setPosition");
							var t = 0;
							if (jQuery(window).width() >= 768) {
								var e = jQuery(window).width(),
									o = e / 3;
								t = o / 2 + 74 / 3
							} else {
								var e = jQuery(window).width() - 70,
									o = .9 * e;
								jQuery(".grid-slideshow .grid-item").width(o)
							}
							i.slick("slickSetOption", "centerPadding", t + "px")
						};
						jQuery(window).resize(function() {
							o()
						}), jQuery(".grid-slideshow .grid-item").each(function() {
							this.addEventListener("load", o, !0)
						}), jQuery(window).load(function() {
							o(), window.setTimeout(function() {
								o()
							}, 1e3)
						})
					}), jQuery(document).on("scroll", function() {
						var t = 0;
						t = e.elementInView(jQuery("#page"), !0);
						var i = 0;
						jQuery("#related-articles").length && (i = e.elementInView(jQuery("#related-articles"), !1)), jQuery(".js-footer-reveal").each(function() {
							var e = jQuery(this),
								i = jQuery(this).attr("data-footer-reveal-attribute");
							void 0 === i && (i = "top");
							var o = jQuery(this).attr("data-footer-reveal-reverse");
							e.addClass("no-transition"), 0 === t ? e.css(i, "") : void 0 !== o ? e.css(i, t) : e.css(i, -t), window.setTimeout(function() {
								e.removeClass("no-transition")
							}, 100)
						}), jQuery(".js-related-reveal").each(function() {
							var t = jQuery(this),
								e = jQuery(this).attr("data-related-reveal-attribute");
							void 0 === e && (e = "top");
							var o = jQuery(this).attr("data-related-reveal-reverse");
							t.addClass("no-transition"), 0 === i ? t.css(e, "") : void 0 !== o ? t.css(e, i) : t.css(e, -i), window.setTimeout(function() {
								t.removeClass("no-transition")
							}, 100)
						})
					});
					var i = function() {
							var e = jQuery("#newsletter"),
								i = jQuery("#newsletter-content"),
								o = i.outerHeight(!0);
							t(window).width() < 768 && (o = t(window).height()), e.css("height", o)
						},
						o = function() {
							var t = jQuery(".js-nav-sizer").height();
							jQuery(".js-stick").each(function() {
								new Waypoint.Sticky({
									element: jQuery(this)[0],
									offset: t
								})
							})
						},
						s = function(t) {
							var e = jQuery(t),
								i = e.attr("id");
							return jQuery('a[href="#' + i + '"]')
						},
						n = function(t) {
							var e = s(t);
							e.length && e.addClass("is-active")
						},
						r = function(t) {
							var e = s(t);
							e.length && e.removeClass("is-active")
						};
					jQuery(".modal").on("show.bs.modal", function(t) {
						var e = this;
						jQuery(".modal").each(function() {
							this !== e && (jQuery(this).modal("hide"), r(this))
						}), window.setTimeout(function() {
							jQuery("body").addClass("modal-open")
						}, 400), n(e)
					}), jQuery(".modal").on("hide.bs.modal", function(t) {
						r(this)
					}), jQuery("#search-modal").on("show.bs.modal", function(t) {
						jQuery("body").addClass("search-open"), window.setTimeout(function() {
							jQuery(".search-input").focus()
						}, 400), jQuery("#search-modal").scroll(function() {
							var t = jQuery(".js-nav-sizer").height();
							jQuery("#search-secondary").position().top < t ? jQuery("body").addClass("show-results") : jQuery("body").removeClass("show-results")
						})
					}), jQuery("#search-modal").on("hide.bs.modal", function(t) {
						jQuery("#search-modal").unbind("scroll"), window.setTimeout(function() {
							jQuery("body").removeClass("search-open")
						}, 400)
					}), jQuery(".nav-toggle .hamburger").on("click", function(t) {
						t.preventDefault(), jQuery("body").hasClass("search-open") ? (jQuery("#search-modal").modal("hide"), jQuery("#menu-modal").modal("show")) : jQuery("#menu-modal").hasClass("in") ? jQuery("#menu-modal").modal("hide") : jQuery("#menu-modal").modal("show")
					}), jQuery(window).load(function() {
						setTimeout(function() {
							o(), i()
						}, 400)
					}), jQuery(window).resize(function() {
						i()
					});
					var a = function() {
						jQuery(".grid-large-thumbnails .grid-item").each(function() {
							if (t(this).is(":nth-of-type(2n + 1)")) {
								var e = t(this).find(".grid-item-title"),
									i = t(this).next(".grid-item"),
									o = t(i).find(".grid-item-title");
								if (t(e).height("auto"), t(o).height("auto"), t(window).width() >= 768) {
									var s = t(e).height(),
										n = t(o).height();
									n > s && (s = n), t(e).height(s), t(o).height(s)
								}
							}
						}), jQuery(".grid-small-thumbnails .grid-item").each(function() {
							if (t(this).is(":nth-of-type(3n + 1)")) {
								var e = t(this).find(".grid-item-title"),
									i = t(this).next(".grid-item"),
									o = t(i).find(".grid-item-title"),
									s = t(i).next(".grid-item"),
									n = t(s).find(".grid-item-title");
								if (t(e).height("auto"), t(o).height("auto"), t(n).height("auto"), t(window).width() >= 768) {
									var r = t(e).height(),
										a = t(o).height(),
										l = t(n).height();
									a > r && (r = a), l > r && (r = l), t(e).height(r), t(o).height(r), t(n).height(r)
								}
							}
						})
					};
					jQuery(".grid-item").each(function() {
						this.addEventListener("load", a, !0)
					}), removeWidow = function(e) {
						return t(e).each(function() {
							var e, i;
							if (i = t(this).html().split(" "), i.length > 2 && (e = i[i.length - 2] + " " + i[i.length - 1], e.length < 17)) return i[i.length - 2] = i[i.length - 2] += "&nbsp;" + i[i.length - 1], i.pop(), t(this).html(i.join(" "))
						})
					}, jQuery("#menu-modal").on("show.bs.modal", function() {
						jQuery(".nav-toggle .hamburger").addClass("is-active")
					}), jQuery("#menu-modal").on("hide.bs.modal", function() {
						jQuery(".nav-toggle .hamburger").removeClass("is-active")
					}), jQuery(".grid-item.has-video .grid-item-block").on("click", function(t) {
						t.preventDefault(), t.stopPropagation();
						var e = jQuery(this).parents(".grid-item"),
							i = jQuery(e).find("iframe");
						jQuery(e).addClass("show-video"), jQuery(i).attr("src", jQuery(i).attr("data-src"))
					}), jQuery(window).resize(function() {
						a()
					}), jQuery(window).load(function() {
						jQuery("body").removeClass("preload"), a(), removeWidow(".post-lede, .post-title")
					}), jQuery("*[data-show]").click(function(t) {
						t.preventDefault();
						var e = jQuery(this).attr("href");
						jQuery(e).modal("show")
					});
					var l = t("iframe[data-src^='//player.vimeo.com'], iframe[src^='//www.youtube.com']"),
						d = t("body");
					l.each(function() {
						t(this).data("aspectRatio", this.height / this.width).removeAttr("height").removeAttr("width")
					});
					var c = 1,
						p = c;
					jQuery(".post-column img, .post-feature-image img").each(function(i) {
						if (t(this).parents(".visible-xs").length) return !0;
						var o = jQuery("#figcaptions"),
							s = jQuery(this).parents("figure"),
							n = jQuery(s).find("img");
						jQuery(n).wrap('<div class="post-image-wrapper"></div>');
						var r = t(n).parent("div");
						jQuery(".gallery-modal").hasClass("admin-logged-in") && s.not(".post-feature-image").append('<a href="' + n.data("srcset") + '" class="js-version image-download btn" download>download</a>');
						var a = jQuery(s).find("figcaption"),
							l = !0;
						a.length ? jQuery(r).append(a) : (l = !1, jQuery(r).append('<figcaption class="wp-caption-text gallery-caption"></figcaption>'), a = jQuery(s).find("figcaption"));
						var d = jQuery(a).text(),
							u = jQuery(n).attr("data-srcset"),
							h = e.twoDigit(p),
							f = !jQuery(this).parents(".post-head-with-image").length,
							g = parseInt(jQuery(n).attr("width")),
							v = parseInt(jQuery(n).attr("height")),
							m = "landscape";
						v > g && (m = "portrait"), jQuery(s).addClass(m), jQuery(s).attr("data-index", c), f && (jQuery(r).append('<div class="post-image-super">' + h + "</div>"), jQuery(a).wrapInner('<span class="figcaption-text"></span>'), jQuery(a).prepend('<span class="figcaption-super">' + h + "<br></span>"), l && jQuery(o).append('<li class="figcaption">' + jQuery(a).html() + "</li>"), p++);
						var y = jQuery("#post-gallery-slide").html(),
							w = jQuery(y).clone();
						w.attr("data-index", c), w.find(".post-gallery-image").attr("data-bgset", u), f && (w.find(".figcaption-super").text(h), w.find(".figcaption-text").text(d)), jQuery("#post-gallery").append(w), c++
					}), document.addEventListener("lazybeforeunveil", function(t) {
						window.setTimeout(function() {
							u(t.target)
						}, 100)
					});
					var u = function(e) {
						var i = jQuery(e).parents("figure"),
							o = jQuery(i).find(".post-image-wrapper"),
							s = t(i).find("figcaption");
						if (i.length) {
							t(i).css("margin-bottom", 0);
							var n = t(s).height();
							t(window).width() < 768 ? n += 35 : n += 74, t(e).parents(".slick-slide").length ? t(o).css("padding-bottom", n) : t(i).css("margin-bottom", n)
						}
					};
					jQuery(window).resize(function() {
						jQuery(parent).find(".post-column img, .post-feature-image img").each(function(t) {
							u(this)
						})
					}), jQuery(".gallery").each(function(t) {
						var i = jQuery(this);
						if (!i.hasClass("gallery-columns-1")) {
							i.slick({
								arrows: !1,
								dots: !1,
								infinite: !0,
								speed: 300,
								slidesToShow: 1,
								centerMode: !0,
								variableWidth: !0
							}), e.scrollGallery(i);
							var o = function() {
								i.slick("slickGoTo", 0)
							};
							this.addEventListener("load", o, !0)
						}
					}), jQuery(".post-gallery").each(function(t) {
						var i = jQuery(this);
						i.hasClass("gallery-columns-1") || (i.slick({
							dots: !1,
							infinite: !0,
							speed: 300,
							slidesToShow: 1,
							variableWidth: !1,
							appendArrows: jQuery(this).parent(".gallery-modal"),
							prevArrow: '<button type="button" class="slick-prev slick-arrow"><span class="sprite-arrow-prev hidden-xs"></span><span class="sprite-arrow-prev-xs visible-xs"></span></button>',
							nextArrow: '<button type="button" class="slick-next slick-arrow"><span class="sprite-arrow-next hidden-xs"></span><span class="sprite-arrow-next-xs visible-xs"></span></button>'
						}), e.scrollGallery(i))
					}), jQuery(document).on("click", ".gallery-item, .wp-caption, .side-image", function(t) {
						t.preventDefault(), t.stopPropagation();
						var e = parseInt(jQuery(this).attr("data-index"));
						jQuery("#gallery-modal").attr("data-index", e - 1), jQuery("#gallery-modal").modal("show")
					}), jQuery(".image-download").click(function(t) {
						t.stopPropagation()
					}), jQuery("#gallery-modal").on("show.bs.modal", function() {
						var t = this,
							e = jQuery(t).attr("data-index");
						setTimeout(function() {
							jQuery(".post-gallery").slick("slickGoTo", e, !0), jQuery('.post-gallery [data-index="' + e + '"] .post-gallery-image').addClass("lazypreload"), jQuery(t).addClass("is-visible"), jQuery(window).trigger("resize")
						}, 400)
					}), jQuery("#gallery-modal").on("hide.bs.modal", function() {
						var t = this;
						setTimeout(function() {
							jQuery(t).removeClass("is-visible")
						}, 400)
					});
					var h = function() {
						if (t("body").hasClass("single-post")) {
							var e = 0,
								i = jQuery(".js-nav-sizer").height();
							jQuery(window).scroll(function(o) {
								var s = t(this).scrollTop();
								s > e && s > i ? (e = s, jQuery("body").addClass("post-is-scrolled")) : (s < e - 300 || s < i) && (e = s, jQuery("body").removeClass("post-is-scrolled"))
							})
						}
					};
					jQuery(window).load(function() {
						window.setTimeout(function() {
							h()
						}, 400)
					});
					var f = function() {
						jQuery(".top-five.row").each(function() {
							var e = this;
							new Waypoint({
								element: e,
								handler: function(i) {
									var o = t(e).find(".grid-fixed-aside");
									t(window).width() < 768 ? t(o).fadeIn(0) : "down" == i ? t(o).fadeIn(400) : t(o).fadeOut(200)
								},
								offset: "50%"
							})
						})
					};
					jQuery(".top-five.row:first-of-type").each(function() {
						if (t(window).width() >= 768) {
							var e = t(this).find(".grid-fixed-aside");
							t(e).fadeIn(0)
						}
					}), jQuery(window).resize(function() {
						f()
					}), jQuery(window).load(function() {
						window.setTimeout(function() {
							f()
						}, 100), window.setTimeout(function() {
							Waypoint.refreshAll()
						}, 1e3)
					});
					var g = jQuery(window).width() < 768;
					jQuery(".single-format-aside .post-content").each(function() {
						try {
							jQuery(this).sidenotes({
								initiallyHidden: g,
								sidenoteElement: "div"
							})
						} catch (t) {
							console.log("Side image reference not found. Check all side images have a corresponding shortcode."), jQuery(".single-format-aside").addClass("single-format-aside-error")
						}
					}), jQuery("sup").each(function() {
						var t = parseInt(jQuery(this).find("a").text());
						t = t > 9 ? "" + t : "0" + t, jQuery(this).find("a").text(t)
					}), jQuery(window).resize(function() {
						jQuery(".single-format-aside .post-content").each(function() {
							try {
								jQuery(window).width() >= 768 ? jQuery(this).sidenotes("show") : jQuery(this).sidenotes("hide")
							} catch (t) {
								console.log("Cannot show or hide side note as side image reference not found.")
							}
						})
					}), t(window).resize(function() {
						var e = parseInt(d.width());
						e > 1600 && (e = 1600), l.each(function() {
							var i = t(this);
							i.width(e).height(e * i.data("aspectRatio"))
						})
					}).resize()
				}
			},
			home: {
				init: function() {},
				finalize: function() {}
			},
			contributors: {
				init: function() {
					jQuery(document).on("click", ".alphabet-nav-item", function(t) {
						var e = jQuery(this).attr("data-target"),
							i = jQuery(e).offset().top,
							o = i - jQuery(".alphabet-nav").outerHeight() - jQuery(".alphabet-nav").position().top;
						jQuery("html, body").animate({
							scrollTop: o
						}, "slow")
					})
				},
				finalize: function() {}
			},
			search: {
				init: function() {},
				finalize: function() {
					jQuery(".has-results").length && (jQuery("#search-secondary").addClass("show"), jQuery(window).load(function() {
						var t = jQuery(".js-nav-sizer").height(),
							e = jQuery("#search-secondary").offset().top - 45;
						jQuery("html, body").animate({
							scrollTop: e - t
						}, "slow")
					})), window.setTimeout(function() {
						jQuery(window).scrollTop(0)
					}, 1), window.setTimeout(function() {
						jQuery(window).scrollTop(0)
					}, 400)
				}
			}
		},
		o = {
			fire: function(t, e, o) {
				var s, n = i;
				e = void 0 === e ? "init" : e, s = "" !== t, s = s && n[t], (s = s && "function" == typeof n[t][e]) && n[t][e](o)
			},
			loadEvents: function() {
				o.fire("common"), t.each(document.body.className.replace(/-/g, "_").split(/\s+/), function(t, e) {
					o.fire(e), o.fire(e, "finalize")
				}), o.fire("common", "finalize")
			}
		};
	jQuery(document).ready(o.loadEvents)
}(jQuery);