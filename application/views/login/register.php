<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="ie8" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html lang='en'><!--<![endif]-->
    <head>
        <meta charset='utf-8'>
        <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
        <script type="text/javascript">window.NREUM || (NREUM = {}); NREUM.info = {"beacon":"bam.nr-data.net", "errorBeacon":"bam.nr-data.net", "licenseKey":"651091c70e", "applicationID":"5324540", "transactionName":"cQoPQUsKWw1RQUtBB1UMEkFLBEMIW11LXQdF", "queueTime":2, "applicationTime":105, "agent":""}</script>
        <script type="text/javascript">(window.NREUM || (NREUM = {})).loader_config = {xpid:"XQQDVVBbGwYDVlVXAwE="}; window.NREUM || (NREUM = {}), __nr_require = function(t, e, n){function r(n){if (!e[n]){var o = e[n] = {exports:{}}; t[n][0].call(o.exports, function(e){var o = t[n][1][e]; return r(o || e)}, o, o.exports)}return e[n].exports}if ("function" == typeof __nr_require)return __nr_require; for (var o = 0; o < n.length; o++)r(n[o]); return r}({1:[function(t, e, n){function r(t){try{c.console && console.log(t)} catch (e){}}var o, i = t("ee"), a = t(15), c = {}; try{o = localStorage.getItem("__nr_flags").split(","), console && "function" == typeof console.log && (c.console = !0, o.indexOf("dev") !== - 1 && (c.dev = !0), o.indexOf("nr_dev") !== - 1 && (c.nrDev = !0))} catch (s){}c.nrDev && i.on("internal-error", function(t){r(t.stack)}), c.dev && i.on("fn-err", function(t, e, n){r(n.stack)}), c.dev && (r("NR AGENT IN DEVELOPMENT MODE"), r("flags: " + a(c, function(t, e){return t}).join(", ")))}, {}], 2:[function(t, e, n){function r(t, e, n, r, o){try{d?d -= 1:i("err", [o || new UncaughtException(t, e, n)])} catch (c){try{i("ierr", [c, (new Date).getTime(), !0])} catch (s){}}return"function" == typeof f && f.apply(this, a(arguments))}function UncaughtException(t, e, n){this.message = t || "Uncaught error with no additional information", this.sourceURL = e, this.line = n}function o(t){i("err", [t, (new Date).getTime()])}var i = t("handle"), a = t(16), c = t("ee"), s = t("loader"), f = window.onerror, u = !1, d = 0; s.features.err = !0, t(1), window.onerror = r; try{throw new Error} catch (l){"stack"in l && (t(8), t(7), "addEventListener"in window && t(5), s.xhrWrappable && t(9), u = !0)}c.on("fn-start", function(t, e, n){u && (d += 1)}), c.on("fn-err", function(t, e, n){u && (this.thrown = !0, o(n))}), c.on("fn-end", function(){u && !this.thrown && d > 0 && (d -= 1)}), c.on("internal-error", function(t){i("ierr", [t, (new Date).getTime(), !0])})}, {}], 3:[function(t, e, n){t("loader").features.ins = !0}, {}], 4:[function(t, e, n){function r(t){}if (window.performance && window.performance.timing && window.performance.getEntriesByType){var o = t("ee"), i = t("handle"), a = t(8), c = t(7), s = "learResourceTimings", f = "addEventListener", u = "resourcetimingbufferfull", d = "bstResource", l = "resource", p = "-start", h = "-end", m = "fn" + p, w = "fn" + h, v = "bstTimer", y = "pushState"; t("loader").features.stn = !0, t(6); var g = NREUM.o.EV; o.on(m, function(t, e){var n = t[0]; n instanceof g && (this.bstStart = Date.now())}), o.on(w, function(t, e){var n = t[0]; n instanceof g && i("bst", [n, e, this.bstStart, Date.now()])}), a.on(m, function(t, e, n){this.bstStart = Date.now(), this.bstType = n}), a.on(w, function(t, e){i(v, [e, this.bstStart, Date.now(), this.bstType])}), c.on(m, function(){this.bstStart = Date.now()}), c.on(w, function(t, e){i(v, [e, this.bstStart, Date.now(), "requestAnimationFrame"])}), o.on(y + p, function(t){this.time = Date.now(), this.startPath = location.pathname + location.hash}), o.on(y + h, function(t){i("bstHist", [location.pathname + location.hash, this.startPath, this.time])}), f in window.performance && (window.performance["c" + s]?window.performance[f](u, function(t){i(d, [window.performance.getEntriesByType(l)]), window.performance["c" + s]()}, !1):window.performance[f]("webkit" + u, function(t){i(d, [window.performance.getEntriesByType(l)]), window.performance["webkitC" + s]()}, !1)), document[f]("scroll", r, {passive:!0}), document[f]("keypress", r, !1), document[f]("click", r, !1)}}, {}], 5:[function(t, e, n){function r(t){for (var e = t; e && !e.hasOwnProperty(u); )e = Object.getPrototypeOf(e); e && o(e)}function o(t){c.inPlace(t, [u, d], "-", i)}function i(t, e){return t[1]}var a = t("ee").get("events"), c = t(17)(a, !0), s = t("gos"), f = XMLHttpRequest, u = "addEventListener", d = "removeEventListener"; e.exports = a, "getPrototypeOf"in Object?(r(document), r(window), r(f.prototype)):f.prototype.hasOwnProperty(u) && (o(window), o(f.prototype)), a.on(u + "-start", function(t, e){var n = t[1], r = s(n, "nr@wrapped", function(){function t(){if ("function" == typeof n.handleEvent)return n.handleEvent.apply(n, arguments)}var e = {object:t, "function":n}[typeof n]; return e?c(e, "fn-", null, e.name || "anonymous"):n}); this.wrapped = t[1] = r}), a.on(d + "-start", function(t){t[1] = this.wrapped || t[1]})}, {}], 6:[function(t, e, n){var r = t("ee").get("history"), o = t(17)(r); e.exports = r, o.inPlace(window.history, ["pushState", "replaceState"], "-")}, {}], 7:[function(t, e, n){var r = t("ee").get("raf"), o = t(17)(r), i = "equestAnimationFrame"; e.exports = r, o.inPlace(window, ["r" + i, "mozR" + i, "webkitR" + i, "msR" + i], "raf-"), r.on("raf-start", function(t){t[0] = o(t[0], "fn-")})}, {}], 8:[function(t, e, n){function r(t, e, n){t[0] = a(t[0], "fn-", null, n)}function o(t, e, n){this.method = n, this.timerDuration = "number" == typeof t[1]?t[1]:0, t[0] = a(t[0], "fn-", this, n)}var i = t("ee").get("timer"), a = t(17)(i), c = "setTimeout", s = "setInterval", f = "clearTimeout", u = "-start", d = "-"; e.exports = i, a.inPlace(window, [c, "setImmediate"], c + d), a.inPlace(window, [s], s + d), a.inPlace(window, [f, "clearImmediate"], f + d), i.on(s + u, r), i.on(c + u, o)}, {}], 9:[function(t, e, n){function r(t, e){d.inPlace(e, ["onreadystatechange"], "fn-", c)}function o(){var t = this, e = u.context(t); t.readyState > 3 && !e.resolved && (e.resolved = !0, u.emit("xhr-resolved", [], t)), d.inPlace(t, w, "fn-", c)}function i(t){v.push(t), h && (g = - g, b.data = g)}function a(){for (var t = 0; t < v.length; t++)r([], v[t]); v.length && (v = [])}function c(t, e){return e}function s(t, e){for (var n in t)e[n] = t[n]; return e}t(5); var f = t("ee"), u = f.get("xhr"), d = t(17)(u), l = NREUM.o, p = l.XHR, h = l.MO, m = "readystatechange", w = ["onload", "onerror", "onabort", "onloadstart", "onloadend", "onprogress", "ontimeout"], v = []; e.exports = u; var y = window.XMLHttpRequest = function(t){var e = new p(t); try{u.emit("new-xhr", [e], e), e.addEventListener(m, o, !1)} catch (n){try{u.emit("internal-error", [n])} catch (r){}}return e}; if (s(p, y), y.prototype = p.prototype, d.inPlace(y.prototype, ["open", "send"], "-xhr-", c), u.on("send-xhr-start", function(t, e){r(t, e), i(e)}), u.on("open-xhr-start", r), h){var g = 1, b = document.createTextNode(g); new h(a).observe(b, {characterData:!0})} else f.on("fn-end", function(t){t[0] && t[0].type === m || a()})}, {}], 10:[function(t, e, n){function r(t){var e = this.params, n = this.metrics; if (!this.ended){this.ended = !0; for (var r = 0; r < d; r++)t.removeEventListener(u[r], this.listener, !1); if (!e.aborted){if (n.duration = (new Date).getTime() - this.startTime, 4 === t.readyState){e.status = t.status; var i = o(t, this.lastSize); if (i && (n.rxSize = i), this.sameOrigin){var a = t.getResponseHeader("X-NewRelic-App-Data"); a && (e.cat = a.split(", ").pop())}} else e.status = 0; n.cbTime = this.cbTime, f.emit("xhr-done", [t], t), c("xhr", [e, n, this.startTime])}}}function o(t, e){var n = t.responseType; if ("json" === n && null !== e)return e; var r = "arraybuffer" === n || "blob" === n || "json" === n?t.response:t.responseText; return h(r)}function i(t, e){var n = s(e), r = t.params; r.host = n.hostname + ":" + n.port, r.pathname = n.pathname, t.sameOrigin = n.sameOrigin}var a = t("loader"); if (a.xhrWrappable){var c = t("handle"), s = t(11), f = t("ee"), u = ["load", "error", "abort", "timeout"], d = u.length, l = t("id"), p = t(14), h = t(13), m = window.XMLHttpRequest; a.features.xhr = !0, t(9), f.on("new-xhr", function(t){var e = this; e.totalCbs = 0, e.called = 0, e.cbTime = 0, e.end = r, e.ended = !1, e.xhrGuids = {}, e.lastSize = null, p && (p > 34 || p < 10) || window.opera || t.addEventListener("progress", function(t){e.lastSize = t.loaded}, !1)}), f.on("open-xhr-start", function(t){this.params = {method:t[0]}, i(this, t[1]), this.metrics = {}}), f.on("open-xhr-end", function(t, e){"loader_config"in NREUM && "xpid"in NREUM.loader_config && this.sameOrigin && e.setRequestHeader("X-NewRelic-ID", NREUM.loader_config.xpid)}), f.on("send-xhr-start", function(t, e){var n = this.metrics, r = t[0], o = this; if (n && r){var i = h(r); i && (n.txSize = i)}this.startTime = (new Date).getTime(), this.listener = function(t){try{"abort" === t.type && (o.params.aborted = !0), ("load" !== t.type || o.called === o.totalCbs && (o.onloadCalled || "function" != typeof e.onload)) && o.end(e)} catch (n){try{f.emit("internal-error", [n])} catch (r){}}}; for (var a = 0; a < d; a++)e.addEventListener(u[a], this.listener, !1)}), f.on("xhr-cb-time", function(t, e, n){this.cbTime += t, e?this.onloadCalled = !0:this.called += 1, this.called !== this.totalCbs || !this.onloadCalled && "function" == typeof n.onload || this.end(n)}), f.on("xhr-load-added", function(t, e){var n = "" + l(t) + !!e; this.xhrGuids && !this.xhrGuids[n] && (this.xhrGuids[n] = !0, this.totalCbs += 1)}), f.on("xhr-load-removed", function(t, e){var n = "" + l(t) + !!e; this.xhrGuids && this.xhrGuids[n] && (delete this.xhrGuids[n], this.totalCbs -= 1)}), f.on("addEventListener-end", function(t, e){e instanceof m && "load" === t[0] && f.emit("xhr-load-added", [t[1], t[2]], e)}), f.on("removeEventListener-end", function(t, e){e instanceof m && "load" === t[0] && f.emit("xhr-load-removed", [t[1], t[2]], e)}), f.on("fn-start", function(t, e, n){e instanceof m && ("onload" === n && (this.onload = !0), ("load" === (t[0] && t[0].type) || this.onload) && (this.xhrCbStart = (new Date).getTime()))}), f.on("fn-end", function(t, e){this.xhrCbStart && f.emit("xhr-cb-time", [(new Date).getTime() - this.xhrCbStart, this.onload, e], e)})}}, {}], 11:[function(t, e, n){e.exports = function(t){var e = document.createElement("a"), n = window.location, r = {}; e.href = t, r.port = e.port; var o = e.href.split("://"); !r.port && o[1] && (r.port = o[1].split("/")[0].split("@").pop().split(":")[1]), r.port && "0" !== r.port || (r.port = "https" === o[0]?"443":"80"), r.hostname = e.hostname || n.hostname, r.pathname = e.pathname, r.protocol = o[0], "/" !== r.pathname.charAt(0) && (r.pathname = "/" + r.pathname); var i = !e.protocol || ":" === e.protocol || e.protocol === n.protocol, a = e.hostname === document.domain && e.port === n.port; return r.sameOrigin = i && (!e.hostname || a), r}}, {}], 12:[function(t, e, n){function r(){}function o(t, e, n){return function(){return i(t, [(new Date).getTime()].concat(c(arguments)), e?null:this, n), e?void 0:this}}var i = t("handle"), a = t(15), c = t(16), s = t("ee").get("tracer"), f = NREUM; "undefined" == typeof window.newrelic && (newrelic = f); var u = ["setPageViewName", "setCustomAttribute", "setErrorHandler", "finished", "addToTrace", "inlineHit", "addRelease"], d = "api-", l = d + "ixn-"; a(u, function(t, e){f[e] = o(d + e, !0, "api")}), f.addPageAction = o(d + "addPageAction", !0), f.setCurrentRouteName = o(d + "routeName", !0), e.exports = newrelic, f.interaction = function(){return(new r).get()}; var p = r.prototype = {createTracer:function(t, e){var n = {}, r = this, o = "function" == typeof e; return i(l + "tracer", [Date.now(), t, n], r), function(){if (s.emit((o?"":"no-") + "fn-start", [Date.now(), r, o], n), o)try{return e.apply(this, arguments)} finally{s.emit("fn-end", [Date.now()], n)}}}}; a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","), function(t, e){p[e] = o(l + e)}), newrelic.noticeError = function(t){"string" == typeof t && (t = new Error(t)), i("err", [t, (new Date).getTime()])}}, {}], 13:[function(t, e, n){e.exports = function(t){if ("string" == typeof t && t.length)return t.length; if ("object" == typeof t){if ("undefined" != typeof ArrayBuffer && t instanceof ArrayBuffer && t.byteLength)return t.byteLength; if ("undefined" != typeof Blob && t instanceof Blob && t.size)return t.size; if (!("undefined" != typeof FormData && t instanceof FormData))try{return JSON.stringify(t).length} catch (e){return}}}}, {}], 14:[function(t, e, n){var r = 0, o = navigator.userAgent.match(/Firefox[\/\s](\d+\.\d+)/); o && (r = + o[1]), e.exports = r}, {}], 15:[function(t, e, n){function r(t, e){var n = [], r = "", i = 0; for (r in t)o.call(t, r) && (n[i] = e(r, t[r]), i += 1); return n}var o = Object.prototype.hasOwnProperty; e.exports = r}, {}], 16:[function(t, e, n){function r(t, e, n){e || (e = 0), "undefined" == typeof n && (n = t?t.length:0); for (var r = - 1, o = n - e || 0, i = Array(o < 0?0:o); ++r < o; )i[r] = t[e + r]; return i}e.exports = r}, {}], 17:[function(t, e, n){function r(t){return!(t && t instanceof Function && t.apply && !t[a])}var o = t("ee"), i = t(16), a = "nr@original", c = Object.prototype.hasOwnProperty, s = !1; e.exports = function(t, e){function n(t, e, n, o){function nrWrapper(){var r, a, c, s; try{a = this, r = i(arguments), c = "function" == typeof n?n(r, a):n || {}} catch (f){l([f, "", [r, a, o], c])}u(e + "start", [r, a, o], c); try{return s = t.apply(a, r)} catch (d){throw u(e + "err", [r, a, d], c), d} finally{u(e + "end", [r, a, s], c)}}return r(t)?t:(e || (e = ""), nrWrapper[a] = t, d(t, nrWrapper), nrWrapper)}function f(t, e, o, i){o || (o = ""); var a, c, s, f = "-" === o.charAt(0); for (s = 0; s < e.length; s++)c = e[s], a = t[c], r(a) || (t[c] = n(a, f?c + o:o, i, c))}function u(n, r, o){if (!s || e){var i = s; s = !0; try{t.emit(n, r, o)} catch (a){l([a, n, r, o])}s = i}}function d(t, e){if (Object.defineProperty && Object.keys)try{var n = Object.keys(t); return n.forEach(function(n){Object.defineProperty(e, n, {get:function(){return t[n]}, set:function(e){return t[n] = e, e}})}), e} catch (r){l([r])}for (var o in t)c.call(t, o) && (e[o] = t[o]); return e}function l(e){try{t.emit("internal-error", e)} catch (n){}}return t || (t = o), n.inPlace = f, n.flag = a, n}}, {}], ee:[function(t, e, n){function r(){}function o(t){function e(t){return t && t instanceof r?t:t?s(t, c, i):i()}function n(n, r, o){if (!l.aborted){t && t(n, r, o); for (var i = e(o), a = h(n), c = a.length, s = 0; s < c; s++)a[s].apply(i, r); var f = u[y[n]]; return f && f.push([g, n, r, i]), i}}function p(t, e){v[t] = h(t).concat(e)}function h(t){return v[t] || []}function m(t){return d[t] = d[t] || o(n)}function w(t, e){f(t, function(t, n){e = e || "feature", y[n] = e, e in u || (u[e] = [])})}var v = {}, y = {}, g = {on:p, emit:n, get:m, listeners:h, context:e, buffer:w, abort:a, aborted:!1}; return g}function i(){return new r}function a(){(u.api || u.feature) && (l.aborted = !0, u = l.backlog = {})}var c = "nr@context", s = t("gos"), f = t(15), u = {}, d = {}, l = e.exports = o(); l.backlog = u}, {}], gos:[function(t, e, n){function r(t, e, n){if (o.call(t, e))return t[e]; var r = n(); if (Object.defineProperty && Object.keys)try{return Object.defineProperty(t, e, {value:r, writable:!0, enumerable:!1}), r} catch (i){}return t[e] = r, r}var o = Object.prototype.hasOwnProperty; e.exports = r}, {}], handle:[function(t, e, n){function r(t, e, n, r){o.buffer([t], r), o.emit(t, e, n)}var o = t("ee").get("handle"); e.exports = r, r.ee = o}, {}], id:[function(t, e, n){function r(t){var e = typeof t; return!t || "object" !== e && "function" !== e? - 1:t === window?0:a(t, i, function(){return o++})}var o = 1, i = "nr@id", a = t("gos"); e.exports = r}, {}], loader:[function(t, e, n){function r(){if (!b++){var t = g.info = NREUM.info, e = d.getElementsByTagName("script")[0]; if (setTimeout(f.abort, 3e4), !(t && t.licenseKey && t.applicationID && e))return f.abort(); s(v, function(e, n){t[e] || (t[e] = n)}), c("mark", ["onload", a()], null, "api"); var n = d.createElement("script"); n.src = "https://" + t.agent, e.parentNode.insertBefore(n, e)}}function o(){"complete" === d.readyState && i()}function i(){c("mark", ["domContent", a()], null, "api")}function a(){return(new Date).getTime()}var c = t("handle"), s = t(15), f = t("ee"), u = window, d = u.document, l = "addEventListener", p = "attachEvent", h = u.XMLHttpRequest, m = h && h.prototype; NREUM.o = {ST:setTimeout, CT:clearTimeout, XHR:h, REQ:u.Request, EV:u.Event, PR:u.Promise, MO:u.MutationObserver}, t(12); var w = "" + location, v = {beacon:"bam.nr-data.net", errorBeacon:"bam.nr-data.net", agent:"js-agent.newrelic.com/nr-1016.min.js"}, y = h && m && m[l] && !/CriOS/.test(navigator.userAgent), g = e.exports = {offset:a(), origin:w, features:{}, xhrWrappable:y}; d[l]?(d[l]("DOMContentLoaded", i, !1), u[l]("load", r, !1)):(d[p]("onreadystatechange", o), u[p]("onload", r)), c("mark", ["firstbyte", a()], null, "api"); var b = 0}, {}]}, {}, ["loader", 2, 10, 4, 3]);</script>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'>
        <title>Shedul</title>
        <meta content='' name='description'>
        <meta content='' name='author'>
        <meta name="csrf-param" content="authenticity_token" />
        <meta name="csrf-token" content="MLkUyJzNo4qg6TY+Md+UHYh8PLR3vlchLr+ktKRHYymnryDYvQZ4JTepJW6krEomJ+rmDGsqiwsDLn9HXQhMLg==" /><link href='/apple-touch-icon-57x57.png?v=rMMnxJlqdL' rel='apple-touch-icon' sizes='57x57'>
        <link href='/apple-touch-icon-60x60.png?v=rMMnxJlqdL' rel='apple-touch-icon' sizes='60x60'>
        <link href='/apple-touch-icon-72x72.png?v=rMMnxJlqdL' rel='apple-touch-icon' sizes='72x72'>
        <link href='/apple-touch-icon-76x76.png?v=rMMnxJlqdL' rel='apple-touch-icon' sizes='76x76'>
        <link href='/apple-touch-icon-114x114.png?v=rMMnxJlqdL' rel='apple-touch-icon' sizes='114x114'>
        <link href='/apple-touch-icon-120x120.png?v=rMMnxJlqdL' rel='apple-touch-icon' sizes='120x120'>
        <link href='/apple-touch-icon-144x144.png?v=rMMnxJlqdL' rel='apple-touch-icon' sizes='144x144'>
        <link href='/apple-touch-icon-152x152.png?v=rMMnxJlqdL' rel='apple-touch-icon' sizes='152x152'>
        <link href='/apple-touch-icon-180x180.png?v=rMMnxJlqdL' rel='apple-touch-icon' sizes='180x180'>
        <link href='/favicon-32x32.png?v=rMMnxJlqdL' rel='icon' sizes='32x32' type='image/png'>
        <link href='/favicon-194x194.png?v=rMMnxJlqdL' rel='icon' sizes='194x194' type='image/png'>
        <link href='/favicon-96x96.png?v=rMMnxJlqdL' rel='icon' sizes='96x96' type='image/png'>
        <link href='/android-chrome-192x192.png?v=rMMnxJlqdL' rel='icon' sizes='192x192' type='image/png'>
        <link href='/favicon-16x16.png?v=rMMnxJlqdL' rel='icon' sizes='16x16' type='image/png'>
        <link href='/manifest.json?v=rMMnxJlqdL' rel='manifest'>
        <link color='#10cfbd' href='/safari-pinned-tab.svg?v=rMMnxJlqdL' rel='mask-icon'>
        <link href='/favicon.ico?v=rMMnxJlqdL' rel='shortcut icon'>
        <meta content='Shedul' name='apple-mobile-web-app-title'>
        <meta content='Shedul' name='application-name'>
        <meta content='#36434a' name='msapplication-TileColor'>
        <meta content='/mstile-144x144.png?v=rMMnxJlqdL' name='msapplication-TileImage'>
        <meta content='#ffffff' name='theme-color'>
        <link rel="stylesheet" media="all" href="//d3ith3umqn03s3.cloudfront.net/assets/application-11002f05b9198749711068d74feebf5b6287f9b4b3f893159c9ab4d67fcae406.css" />
        <script src="//d3ith3umqn03s3.cloudfront.net/assets/application-c50969ed7377e0923ff534c8d954f68936bb5b89fe10feebf41363c3247a976a.js"></script>
        <script src="//d3ith3umqn03s3.cloudfront.net/assets/static/application.a3aad46f9c8d1a34fb35.js"></script>
        <script>
                    (function(i, s, o, g, r, a, m){i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function(){
                    (i[r].q = i[r].q || []).push(arguments)}, i[r].l = 1 * new Date(); a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
                    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
                    // Default tracker
                    ga('create', "UA-63088265-2", 'auto');
                    ga('send', 'pageview');</script>
    </head>
    <body class='fixed-header registration'>
        <!-- Google Tag Manager -->
        <noscript>
        <iframe height='0' src='//www.googletagmanager.com/ns.html?id=GTM-MWZLXD' style='display:none;visibility:hidden' width='0'></iframe>
        </noscript>
        <script>
                    (function(w, d, s, l, i){w[l] = w[l] || []; w[l].push({'gtm.start':
                            new Date().getTime(), event:'gtm.js'}); var f = d.getElementsByTagName(s)[0],
                            j = d.createElement(s), dl = l != 'dataLayer'?'&l=' + l:''; j.async = true; j.src =
                            '//www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
                    })(window, document, 'script', 'dataLayer', 'GTM-MWZLXD');</script>
        <!-- End Google Tag Manager -->
        <script>
                    //<![CDATA[
                    var app = app || {}; app.vars = {"requestStamp":"1-61bdd38"};
                    //]]>
        </script>
        <div class='content'></div>
        <div class='register-container full-height sm-p-t-30'>
            <div class='container-sm-height full-height m-t-50 sm-no-margin'>
                <div class='row row-sm-height'>
                    <div class='col-sm-12 col-sm-height'>
                        <a target="_blank" href="https://www.shedul.com"><img height="22" src="//d3ith3umqn03s3.cloudfront.net/assets/shedul-full-logo-light-bg-63d8928125e4469dabc395245bcf0485bd621c9184acdafcf5a4320189ec9669.png" alt="Shedul full logo light bg" /></a>
                        <h3>Totally free software for Salons &amp; Spas</h3>
                        <p>
                            Zero limitations, trial periods or hidden costs - Shedul is free for everyone!
                        </p>
                        <hr>
                        <form id="form-register" class="simple_form " novalidate="novalidate" action="/sign-up" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="gc2lOV8Z0tUGbKGmLWvcxR553dsMEpgozzoRsUUecegW25EpftIJepEssva4GAL+se8HYxCGRALiq8pCvFFe7w==" /><div class='font-montserrat text-uppercase m-b-5'>
                                Login details
                            </div>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <div class="form-group string required employee_first_name"><input class="string required input-lg form-control" placeholder="First name" type="text" name="employee[first_name]" id="employee_first_name" /></div>
                                </div>
                                <div class='col-sm-6'>
                                    <div class="form-group string required employee_last_name"><input class="string required input-lg form-control" placeholder="Last name" type="text" name="employee[last_name]" id="employee_last_name" /></div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class="form-group email required employee_email"><input class="string email required input-lg form-control" placeholder="Email address" type="email" name="employee[email]" id="employee_email" /></div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class="form-group password required employee_password"><input class="password required input-lg form-control" placeholder="Password" type="password" name="employee[password]" id="employee_password" /></div>
                                </div>
                            </div>
                            <hr>
                            <div class='font-montserrat text-uppercase m-b-5'>
                                Business details
                            </div>
                            <div class="form-group string required employee_provider_name"><input class="string required input-lg form-control" placeholder="Company name" type="text" name="employee[provider][name]" id="employee_provider_name" /></div>
                            <div class='form-group no-padding'>
                                <div class='select-wrapper'>
                                    <select class="select required form-control input-lg" include_blank="Business type" required="required" name="employee[provider][business_type_id]" id="employee_provider_business_type_id"><option value="">Business type</option>
                                        <option value="1">Other</option>
                                        <option value="2">Hair Salon</option>
                                        <option value="3">Nail Salon</option>
                                        <option value="4">Beauty Salon</option>
                                        <option value="5">Skin Clinic</option>
                                        <option value="6">Tanning Salon</option>
                                        <option value="7">Waxing Salon</option>
                                        <option value="8">Spa</option>
                                        <option value="9">Massage Therapy</option>
                                        <option value="10">Barbershop</option>
                                        <option value="11">Brow Bar</option>
                                        <option value="12">Chiropractic Clinic</option>
                                        <option value="13">Dental Clinic</option>
                                        <option value="14">Gym &amp; Fitness</option>
                                        <option value="15">Health Club</option>
                                        <option value="16">Makeup Studio</option>
                                        <option value="17">Mobile Therapy</option>
                                        <option value="18">Nutrition &amp; Weight Loss</option>
                                        <option value="19">Pilates Studio</option>
                                        <option value="20">Yoga Studio</option>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group no-padding' id='register-country-select-container'>
                                <div class='select-wrapper'>
                                    <select class="select required form-control input-lg" include_blank="Country" required="required" name="employee[provider][country_code]" id="employee_provider_country_code"><option value="">Country</option>
                                        <option data-currency="GBP" data-timezone="Europe/London" value="GB">United Kingdom</option>
                                        <option data-currency="USD" data-timezone="America/New_York" value="US">United States</option>
                                        <option disabled="disabled" value="separator">------------</option>
                                        <option data-currency="AFN" data-timezone="Asia/Kabul" value="AF">Afghanistan</option>
                                        <option data-currency="FIM" data-timezone="Europe/Mariehamn" value="AX">Åland Islands</option>
                                        <option data-currency="ALL" data-timezone="Europe/Tirane" value="AL">Albania</option>
                                        <option data-currency="DZD" data-timezone="Africa/Algiers" value="DZ">Algeria</option>
                                        <option data-currency="USD" data-timezone="Pacific/Pago_Pago" value="AS">American Samoa</option>
                                        <option data-currency="EUR" data-timezone="Europe/Andorra" value="AD">Andorra</option>
                                        <option data-currency="AOA" data-timezone="Africa/Luanda" value="AO">Angola</option>
                                        <option data-currency="XCD" data-timezone="America/Anguilla" value="AI">Anguilla</option>
                                        <option data-currency="AUD" data-timezone="Antarctica/McMurdo" value="AQ">Antarctica</option>
                                        <option data-currency="XCD" data-timezone="America/Antigua" value="AG">Antigua and Barbuda</option>
                                        <option data-currency="ARS" data-timezone="America/Argentina/Buenos_Aires" value="AR">Argentina</option>
                                        <option data-currency="AMD" data-timezone="Asia/Yerevan" value="AM">Armenia</option>
                                        <option data-currency="AWG" data-timezone="America/Aruba" value="AW">Aruba</option>
                                        <option data-currency="AUD" data-timezone="Australia/Lord_Howe" value="AU">Australia</option>
                                        <option data-currency="EUR" data-timezone="Europe/Vienna" value="AT">Austria</option>
                                        <option data-currency="AZN" data-timezone="Asia/Baku" value="AZ">Azerbaijan</option>
                                        <option data-currency="BSD" data-timezone="America/Nassau" value="BS">Bahamas</option>
                                        <option data-currency="BHD" data-timezone="Asia/Bahrain" value="BH">Bahrain</option>
                                        <option data-currency="BDT" data-timezone="Asia/Dhaka" value="BD">Bangladesh</option>
                                        <option data-currency="BBD" data-timezone="America/Barbados" value="BB">Barbados</option>
                                        <option data-currency="BYR" data-timezone="Europe/Minsk" value="BY">Belarus</option>
                                        <option data-currency="EUR" data-timezone="Europe/Brussels" value="BE">Belgium</option>
                                        <option data-currency="BZD" data-timezone="America/Belize" value="BZ">Belize</option>
                                        <option data-currency="XOF" data-timezone="Africa/Porto-Novo" value="BJ">Benin</option>
                                        <option data-currency="BMD" data-timezone="Atlantic/Bermuda" value="BM">Bermuda</option>
                                        <option data-currency="BTN" data-timezone="Asia/Thimphu" value="BT">Bhutan</option>
                                        <option data-currency="BOB" data-timezone="America/La_Paz" value="BO">Bolivia, Plurinational State of</option>
                                        <option data-currency="USD" data-timezone="America/Kralendijk" value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option data-currency="BAM" data-timezone="Europe/Sarajevo" value="BA">Bosnia and Herzegovina</option>
                                        <option data-currency="BWP" data-timezone="Africa/Gaborone" value="BW">Botswana</option>
                                        <option data-currency="BRL" data-timezone="America/Noronha" value="BR">Brazil</option>
                                        <option data-currency="USD" data-timezone="Indian/Chagos" value="IO">British Indian Ocean Territory</option>
                                        <option data-currency="BND" data-timezone="Asia/Brunei" value="BN">Brunei Darussalam</option>
                                        <option data-currency="BGN" data-timezone="Europe/Sofia" value="BG">Bulgaria</option>
                                        <option data-currency="XOF" data-timezone="Africa/Ouagadougou" value="BF">Burkina Faso</option>
                                        <option data-currency="BIF" data-timezone="Africa/Bujumbura" value="BI">Burundi</option>
                                        <option data-currency="CVE" data-timezone="Atlantic/Cape_Verde" value="CV">Cabo Verde</option>
                                        <option data-currency="KHR" data-timezone="Asia/Phnom_Penh" value="KH">Cambodia</option>
                                        <option data-currency="XAF" data-timezone="Africa/Douala" value="CM">Cameroon</option>
                                        <option data-currency="CAD" data-timezone="America/St_Johns" value="CA">Canada</option>
                                        <option data-currency="KYD" data-timezone="America/Cayman" value="KY">Cayman Islands</option>
                                        <option data-currency="XAF" data-timezone="Africa/Bangui" value="CF">Central African Republic</option>
                                        <option data-currency="XAF" data-timezone="Africa/Ndjamena" value="TD">Chad</option>
                                        <option data-currency="CLP" data-timezone="America/Santiago" value="CL">Chile</option>
                                        <option data-currency="CNY" data-timezone="Asia/Shanghai" value="CN">China</option>
                                        <option data-currency="AUD" data-timezone="Indian/Christmas" value="CX">Christmas Island</option>
                                        <option data-currency="AUD" data-timezone="Indian/Cocos" value="CC">Cocos (Keeling) Islands</option>
                                        <option data-currency="COP" data-timezone="America/Bogota" value="CO">Colombia</option>
                                        <option data-currency="KMF" data-timezone="Indian/Comoro" value="KM">Comoros</option>
                                        <option data-currency="XAF" data-timezone="Africa/Brazzaville" value="CG">Congo</option>
                                        <option data-currency="CDF" data-timezone="Africa/Kinshasa" value="CD">Congo, the Democratic Republic of the</option>
                                        <option data-currency="NZD" data-timezone="Pacific/Rarotonga" value="CK">Cook Islands</option>
                                        <option data-currency="CRC" data-timezone="America/Costa_Rica" value="CR">Costa Rica</option>
                                        <option data-currency="XOF" data-timezone="Africa/Abidjan" value="CI">Côte d&#39;Ivoire</option>
                                        <option data-currency="HRK" data-timezone="Europe/Zagreb" value="HR">Croatia</option>
                                        <option data-currency="CUP" data-timezone="America/Havana" value="CU">Cuba</option>
                                        <option data-currency="ANG" data-timezone="America/Curacao" value="CW">Curaçao</option>
                                        <option data-currency="EUR" data-timezone="Asia/Nicosia" value="CY">Cyprus</option>
                                        <option data-currency="CZK" data-timezone="Europe/Prague" value="CZ">Czech Republic</option>
                                        <option data-currency="DKK" data-timezone="Europe/Copenhagen" value="DK">Denmark</option>
                                        <option data-currency="DJF" data-timezone="Africa/Djibouti" value="DJ">Djibouti</option>
                                        <option data-currency="XCD" data-timezone="America/Dominica" value="DM">Dominica</option>
                                        <option data-currency="DOP" data-timezone="America/Santo_Domingo" value="DO">Dominican Republic</option>
                                        <option data-currency="USD" data-timezone="America/Guayaquil" value="EC">Ecuador</option>
                                        <option data-currency="EGP" data-timezone="Africa/Cairo" value="EG">Egypt</option>
                                        <option data-currency="SVC" data-timezone="America/El_Salvador" value="SV">El Salvador</option>
                                        <option data-currency="XAF" data-timezone="Africa/Malabo" value="GQ">Equatorial Guinea</option>
                                        <option data-currency="ETB" data-timezone="Africa/Asmara" value="ER">Eritrea</option>
                                        <option data-currency="EUR" data-timezone="Europe/Tallinn" value="EE">Estonia</option>
                                        <option data-currency="ETB" data-timezone="Africa/Addis_Ababa" value="ET">Ethiopia</option>
                                        <option data-currency="FKP" data-timezone="Atlantic/Stanley" value="FK">Falkland Islands (Malvinas)</option>
                                        <option data-currency="DKK" data-timezone="Atlantic/Faroe" value="FO">Faroe Islands</option>
                                        <option data-currency="FJD" data-timezone="Pacific/Fiji" value="FJ">Fiji</option>
                                        <option data-currency="EUR" data-timezone="Europe/Helsinki" value="FI">Finland</option>
                                        <option data-currency="EUR" data-timezone="Europe/Paris" value="FR">France</option>
                                        <option data-currency="EUR" data-timezone="America/Cayenne" value="GF">French Guiana</option>
                                        <option data-currency="XPF" data-timezone="Pacific/Tahiti" value="PF">French Polynesia</option>
                                        <option data-currency="EUR" data-timezone="Indian/Kerguelen" value="TF">French Southern Territories</option>
                                        <option data-currency="XAF" data-timezone="Africa/Libreville" value="GA">Gabon</option>
                                        <option data-currency="GMD" data-timezone="Africa/Banjul" value="GM">Gambia</option>
                                        <option data-currency="GEL" data-timezone="Asia/Tbilisi" value="GE">Georgia</option>
                                        <option data-currency="EUR" data-timezone="Europe/Berlin" value="DE">Germany</option>
                                        <option data-currency="GHS" data-timezone="Africa/Accra" value="GH">Ghana</option>
                                        <option data-currency="GIP" data-timezone="Europe/Gibraltar" value="GI">Gibraltar</option>
                                        <option data-currency="EUR" data-timezone="Europe/Athens" value="GR">Greece</option>
                                        <option data-currency="DKK" data-timezone="America/Godthab" value="GL">Greenland</option>
                                        <option data-currency="XCD" data-timezone="America/Grenada" value="GD">Grenada</option>
                                        <option data-currency="EUR" data-timezone="America/Guadeloupe" value="GP">Guadeloupe</option>
                                        <option data-currency="USD" data-timezone="Pacific/Guam" value="GU">Guam</option>
                                        <option data-currency="GTQ" data-timezone="America/Guatemala" value="GT">Guatemala</option>
                                        <option data-currency="GGP" data-timezone="Europe/Guernsey" value="GG">Guernsey</option>
                                        <option data-currency="GNF" data-timezone="Africa/Conakry" value="GN">Guinea</option>
                                        <option data-currency="XOF" data-timezone="Africa/Bissau" value="GW">Guinea-Bissau</option>
                                        <option data-currency="GYD" data-timezone="America/Guyana" value="GY">Guyana</option>
                                        <option data-currency="HTG" data-timezone="America/Port-au-Prince" value="HT">Haiti</option>
                                        <option data-currency="EUR" data-timezone="Europe/Vatican" value="VA">Holy See (Vatican City State)</option>
                                        <option data-currency="HNL" data-timezone="America/Tegucigalpa" value="HN">Honduras</option>
                                        <option data-currency="HKD" data-timezone="Asia/Hong_Kong" value="HK">Hong Kong</option>
                                        <option data-currency="HUF" data-timezone="Europe/Budapest" value="HU">Hungary</option>
                                        <option data-currency="ISK" data-timezone="Atlantic/Reykjavik" value="IS">Iceland</option>
                                        <option data-currency="INR" data-timezone="Asia/Kolkata" value="IN">India</option>
                                        <option data-currency="IDR" data-timezone="Asia/Jakarta" value="ID">Indonesia</option>
                                        <option data-currency="IRR" data-timezone="Asia/Tehran" value="IR">Iran, Islamic Republic of</option>
                                        <option data-currency="IQD" data-timezone="Asia/Baghdad" value="IQ">Iraq</option>
                                        <option data-currency="EUR" data-timezone="Europe/Dublin" value="IE">Ireland</option>
                                        <option data-currency="IMP" data-timezone="Europe/Isle_of_Man" value="IM">Isle of Man</option>
                                        <option data-currency="ILS" data-timezone="Asia/Jerusalem" value="IL">Israel</option>
                                        <option data-currency="EUR" data-timezone="Europe/Rome" value="IT">Italy</option>
                                        <option data-currency="JMD" data-timezone="America/Jamaica" value="JM">Jamaica</option>
                                        <option data-currency="JPY" data-timezone="Asia/Tokyo" value="JP">Japan</option>
                                        <option data-currency="JEP" data-timezone="Europe/Jersey" value="JE">Jersey</option>
                                        <option data-currency="JOD" data-timezone="Asia/Amman" value="JO">Jordan</option>
                                        <option data-currency="KZT" data-timezone="Asia/Almaty" value="KZ">Kazakhstan</option>
                                        <option data-currency="KES" data-timezone="Africa/Nairobi" value="KE">Kenya</option>
                                        <option data-currency="AUD" data-timezone="Pacific/Tarawa" value="KI">Kiribati</option>
                                        <option data-currency="KPW" data-timezone="Asia/Pyongyang" value="KP">Korea, Democratic People&#39;s Republic of</option>
                                        <option data-currency="KRW" data-timezone="Asia/Seoul" value="KR">Korea, Republic of</option>
                                        <option data-currency="KWD" data-timezone="Asia/Kuwait" value="KW">Kuwait</option>
                                        <option data-currency="KGS" data-timezone="Asia/Bishkek" value="KG">Kyrgyzstan</option>
                                        <option data-currency="LAK" data-timezone="Asia/Vientiane" value="LA">Lao People&#39;s Democratic Republic</option>
                                        <option data-currency="EUR" data-timezone="Europe/Riga" value="LV">Latvia</option>
                                        <option data-currency="LBP" data-timezone="Asia/Beirut" value="LB">Lebanon</option>
                                        <option data-currency="LSL" data-timezone="Africa/Maseru" value="LS">Lesotho</option>
                                        <option data-currency="LRD" data-timezone="Africa/Monrovia" value="LR">Liberia</option>
                                        <option data-currency="LYD" data-timezone="Africa/Tripoli" value="LY">Libya</option>
                                        <option data-currency="CHF" data-timezone="Europe/Vaduz" value="LI">Liechtenstein</option>
                                        <option data-currency="EUR" data-timezone="Europe/Vilnius" value="LT">Lithuania</option>
                                        <option data-currency="EUR" data-timezone="Europe/Luxembourg" value="LU">Luxembourg</option>
                                        <option data-currency="MOP" data-timezone="Asia/Macau" value="MO">Macao</option>
                                        <option data-currency="MKD" data-timezone="Europe/Skopje" value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option data-currency="MGA" data-timezone="Indian/Antananarivo" value="MG">Madagascar</option>
                                        <option data-currency="MWK" data-timezone="Africa/Blantyre" value="MW">Malawi</option>
                                        <option data-currency="MYR" data-timezone="Asia/Kuala_Lumpur" value="MY">Malaysia</option>
                                        <option data-currency="MVR" data-timezone="Indian/Maldives" value="MV">Maldives</option>
                                        <option data-currency="XOF" data-timezone="Africa/Bamako" value="ML">Mali</option>
                                        <option data-currency="EUR" data-timezone="Europe/Malta" value="MT">Malta</option>
                                        <option data-currency="USD" data-timezone="Pacific/Majuro" value="MH">Marshall Islands</option>
                                        <option data-currency="EUR" data-timezone="America/Martinique" value="MQ">Martinique</option>
                                        <option data-currency="MRO" data-timezone="Africa/Nouakchott" value="MR">Mauritania</option>
                                        <option data-currency="MUR" data-timezone="Indian/Mauritius" value="MU">Mauritius</option>
                                        <option data-currency="EUR" data-timezone="Indian/Mayotte" value="YT">Mayotte</option>
                                        <option data-currency="MXN" data-timezone="America/Mexico_City" value="MX">Mexico</option>
                                        <option data-currency="USD" data-timezone="Pacific/Chuuk" value="FM">Micronesia, Federated States of</option>
                                        <option data-currency="MDL" data-timezone="Europe/Chisinau" value="MD">Moldova, Republic of</option>
                                        <option data-currency="EUR" data-timezone="Europe/Monaco" value="MC">Monaco</option>
                                        <option data-currency="MNT" data-timezone="Asia/Ulaanbaatar" value="MN">Mongolia</option>
                                        <option data-currency="EUR" data-timezone="Europe/Podgorica" value="ME">Montenegro</option>
                                        <option data-currency="XCD" data-timezone="America/Montserrat" value="MS">Montserrat</option>
                                        <option data-currency="MAD" data-timezone="Africa/Casablanca" value="MA">Morocco</option>
                                        <option data-currency="MZN" data-timezone="Africa/Maputo" value="MZ">Mozambique</option>
                                        <option data-currency="MMK" data-timezone="Asia/Rangoon" value="MM">Myanmar</option>
                                        <option data-currency="NAD" data-timezone="Africa/Windhoek" value="NA">Namibia</option>
                                        <option data-currency="AUD" data-timezone="Pacific/Nauru" value="NR">Nauru</option>
                                        <option data-currency="NPR" data-timezone="Asia/Kathmandu" value="NP">Nepal</option>
                                        <option data-currency="EUR" data-timezone="Europe/Amsterdam" value="NL">Netherlands</option>
                                        <option data-currency="XPF" data-timezone="Pacific/Noumea" value="NC">New Caledonia</option>
                                        <option data-currency="NZD" data-timezone="Pacific/Auckland" value="NZ">New Zealand</option>
                                        <option data-currency="NIO" data-timezone="America/Managua" value="NI">Nicaragua</option>
                                        <option data-currency="XOF" data-timezone="Africa/Niamey" value="NE">Niger</option>
                                        <option data-currency="NGN" data-timezone="Africa/Lagos" value="NG">Nigeria</option>
                                        <option data-currency="NZD" data-timezone="Pacific/Niue" value="NU">Niue</option>
                                        <option data-currency="AUD" data-timezone="Pacific/Norfolk" value="NF">Norfolk Island</option>
                                        <option data-currency="USD" data-timezone="Pacific/Saipan" value="MP">Northern Mariana Islands</option>
                                        <option data-currency="NOK" data-timezone="Europe/Oslo" value="NO">Norway</option>
                                        <option data-currency="OMR" data-timezone="Asia/Muscat" value="OM">Oman</option>
                                        <option data-currency="PKR" data-timezone="Asia/Karachi" value="PK">Pakistan</option>
                                        <option data-currency="USD" data-timezone="Pacific/Palau" value="PW">Palau</option>
                                        <option data-currency="JOD" data-timezone="Asia/Gaza" value="PS">Palestine, State of</option>
                                        <option data-currency="PAB" data-timezone="America/Panama" value="PA">Panama</option>
                                        <option data-currency="PGK" data-timezone="Pacific/Port_Moresby" value="PG">Papua New Guinea</option>
                                        <option data-currency="PYG" data-timezone="America/Asuncion" value="PY">Paraguay</option>
                                        <option data-currency="PEN" data-timezone="America/Lima" value="PE">Peru</option>
                                        <option data-currency="PHP" data-timezone="Asia/Manila" value="PH">Philippines</option>
                                        <option data-currency="NZD" data-timezone="Pacific/Pitcairn" value="PN">Pitcairn</option>
                                        <option data-currency="PLN" data-timezone="Europe/Warsaw" value="PL">Poland</option>
                                        <option data-currency="EUR" data-timezone="Europe/Lisbon" value="PT">Portugal</option>
                                        <option data-currency="USD" data-timezone="America/Puerto_Rico" value="PR">Puerto Rico</option>
                                        <option data-currency="QAR" data-timezone="Asia/Qatar" value="QA">Qatar</option>
                                        <option data-currency="EUR" data-timezone="Indian/Reunion" value="RE">Réunion</option>
                                        <option data-currency="RON" data-timezone="Europe/Bucharest" value="RO">Romania</option>
                                        <option data-currency="RUB" data-timezone="Europe/Kaliningrad" value="RU">Russian Federation</option>
                                        <option data-currency="RWF" data-timezone="Africa/Kigali" value="RW">Rwanda</option>
                                        <option data-currency="EUR" data-timezone="America/St_Barthelemy" value="BL">Saint Barthélemy</option>
                                        <option data-currency="SHP" data-timezone="Atlantic/St_Helena" value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option data-currency="XCD" data-timezone="America/St_Kitts" value="KN">Saint Kitts and Nevis</option>
                                        <option data-currency="XCD" data-timezone="America/St_Lucia" value="LC">Saint Lucia</option>
                                        <option data-currency="EUR" data-timezone="America/Marigot" value="MF">Saint Martin (French part)</option>
                                        <option data-currency="EUR" data-timezone="America/Miquelon" value="PM">Saint Pierre and Miquelon</option>
                                        <option data-currency="XCD" data-timezone="America/St_Vincent" value="VC">Saint Vincent and the Grenadines</option>
                                        <option data-currency="WST" data-timezone="Pacific/Apia" value="WS">Samoa</option>
                                        <option data-currency="EUR" data-timezone="Europe/San_Marino" value="SM">San Marino</option>
                                        <option data-currency="STD" data-timezone="Africa/Sao_Tome" value="ST">Sao Tome and Principe</option>
                                        <option data-currency="SAR" data-timezone="Asia/Riyadh" value="SA">Saudi Arabia</option>
                                        <option data-currency="XOF" data-timezone="Africa/Dakar" value="SN">Senegal</option>
                                        <option data-currency="RSD" data-timezone="Europe/Belgrade" value="RS">Serbia</option>
                                        <option data-currency="SCR" data-timezone="Indian/Mahe" value="SC">Seychelles</option>
                                        <option data-currency="SLL" data-timezone="Africa/Freetown" value="SL">Sierra Leone</option>
                                        <option data-currency="SGD" data-timezone="Asia/Singapore" value="SG">Singapore</option>
                                        <option data-currency="ANG" data-timezone="America/Lower_Princes" value="SX">Sint Maarten (Dutch part)</option>
                                        <option data-currency="SKK" data-timezone="Europe/Bratislava" value="SK">Slovakia</option>
                                        <option data-currency="EUR" data-timezone="Europe/Ljubljana" value="SI">Slovenia</option>
                                        <option data-currency="SBD" data-timezone="Pacific/Guadalcanal" value="SB">Solomon Islands</option>
                                        <option data-currency="SOS" data-timezone="Africa/Mogadishu" value="SO">Somalia</option>
                                        <option data-currency="ZAR" data-timezone="Africa/Johannesburg" value="ZA">South Africa</option>
                                        <option data-currency="GBP" data-timezone="Atlantic/South_Georgia" value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option data-currency="SSP" data-timezone="Africa/Juba" value="SS">South Sudan</option>
                                        <option data-currency="EUR" data-timezone="Europe/Madrid" value="ES">Spain</option>
                                        <option data-currency="LKR" data-timezone="Asia/Colombo" value="LK">Sri Lanka</option>
                                        <option data-currency="SDG" data-timezone="Africa/Khartoum" value="SD">Sudan</option>
                                        <option data-currency="SRD" data-timezone="America/Paramaribo" value="SR">Suriname</option>
                                        <option data-currency="NOK" data-timezone="Arctic/Longyearbyen" value="SJ">Svalbard and Jan Mayen</option>
                                        <option data-currency="CHF" data-timezone="Africa/Mbabane" value="SZ">Swaziland</option>
                                        <option data-currency="SEK" data-timezone="Europe/Stockholm" value="SE">Sweden</option>
                                        <option data-currency="CHF" data-timezone="Europe/Zurich" value="CH">Switzerland</option>
                                        <option data-currency="SYP" data-timezone="Asia/Damascus" value="SY">Syrian Arab Republic</option>
                                        <option data-currency="TWD" data-timezone="Asia/Taipei" value="TW">Taiwan, Province of China</option>
                                        <option data-currency="TJS" data-timezone="Asia/Dushanbe" value="TJ">Tajikistan</option>
                                        <option data-currency="TZS" data-timezone="Africa/Dar_es_Salaam" value="TZ">Tanzania, United Republic of</option>
                                        <option data-currency="THB" data-timezone="Asia/Bangkok" value="TH">Thailand</option>
                                        <option data-currency="IDR" data-timezone="Asia/Dili" value="TL">Timor-Leste</option>
                                        <option data-currency="XOF" data-timezone="Africa/Lome" value="TG">Togo</option>
                                        <option data-currency="NZD" data-timezone="Pacific/Fakaofo" value="TK">Tokelau</option>
                                        <option data-currency="TOP" data-timezone="Pacific/Tongatapu" value="TO">Tonga</option>
                                        <option data-currency="TTD" data-timezone="America/Port_of_Spain" value="TT">Trinidad and Tobago</option>
                                        <option data-currency="TND" data-timezone="Africa/Tunis" value="TN">Tunisia</option>
                                        <option data-currency="TRY" data-timezone="Europe/Istanbul" value="TR">Turkey</option>
                                        <option data-currency="TMM" data-timezone="Asia/Ashgabat" value="TM">Turkmenistan</option>
                                        <option data-currency="USD" data-timezone="America/Grand_Turk" value="TC">Turks and Caicos Islands</option>
                                        <option data-currency="TVD" data-timezone="Pacific/Funafuti" value="TV">Tuvalu</option>
                                        <option data-currency="UGX" data-timezone="Africa/Kampala" value="UG">Uganda</option>
                                        <option data-currency="UAH" data-timezone="Europe/Kiev" value="UA">Ukraine</option>
                                        <option data-currency="AED" data-timezone="Asia/Dubai" value="AE">United Arab Emirates</option>
                                        <option data-currency="USD" data-timezone="Pacific/Johnston" value="UM">United States Minor Outlying Islands</option>
                                        <option data-currency="UYU" data-timezone="America/Montevideo" value="UY">Uruguay</option>
                                        <option data-currency="UZS" data-timezone="Asia/Samarkand" value="UZ">Uzbekistan</option>
                                        <option data-currency="VUV" data-timezone="Pacific/Efate" value="VU">Vanuatu</option>
                                        <option data-currency="VEF" data-timezone="America/Caracas" value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option data-currency="VND" data-timezone="Asia/Ho_Chi_Minh" value="VN">Vietnam</option>
                                        <option data-currency="USD" data-timezone="America/Tortola" value="VG">Virgin Islands, British</option>
                                        <option data-currency="USD" data-timezone="America/St_Thomas" value="VI">Virgin Islands, U.S.</option>
                                        <option data-currency="XPF" data-timezone="Pacific/Wallis" value="WF">Wallis and Futuna</option>
                                        <option data-currency="MAD" data-timezone="Africa/El_Aaiun" value="EH">Western Sahara</option>
                                        <option data-currency="YER" data-timezone="Asia/Aden" value="YE">Yemen</option>
                                        <option data-currency="ZMW" data-timezone="Africa/Lusaka" value="ZM">Zambia</option>
                                        <option data-currency="ZWD" data-timezone="Africa/Harare" value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <div class='form-group no-padding'>
                                        <div class='select-wrapper'>
                                            <select class="select required form-control input-lg" include_blank="Time zone" required="required" name="employee[provider][time_zone]" id="employee_provider_time_zone"><option value="">Time zone</option>
                                                <option value="Pacific/Pago_Pago">(GMT -11:00) Pago Pago</option>
                                                <option value="Pacific/Niue">(GMT -11:00) Niue</option>
                                                <option value="Pacific/Midway">(GMT -11:00) Midway</option>
                                                <option value="Pacific/Apia">(GMT -11:00) Apia</option>
                                                <option value="Pacific/Rarotonga">(GMT -10:00) Rarotonga</option>
                                                <option value="Pacific/Tahiti">(GMT -10:00) Tahiti</option>
                                                <option value="Pacific/Johnston">(GMT -10:00) Johnston</option>
                                                <option value="America/Adak">(GMT -10:00) Adak</option>
                                                <option value="Pacific/Honolulu">(GMT -10:00) Honolulu</option>
                                                <option value="Pacific/Marquesas">(GMT -09:30) Marquesas</option>
                                                <option value="Pacific/Gambier">(GMT -09:00) Gambier</option>
                                                <option value="America/Anchorage">(GMT -09:00) Anchorage</option>
                                                <option value="America/Juneau">(GMT -09:00) Juneau</option>
                                                <option value="America/Sitka">(GMT -09:00) Sitka</option>
                                                <option value="America/Metlakatla">(GMT -09:00) Metlakatla</option>
                                                <option value="America/Yakutat">(GMT -09:00) Yakutat</option>
                                                <option value="America/Nome">(GMT -09:00) Nome</option>
                                                <option value="America/Vancouver">(GMT -08:00) Vancouver</option>
                                                <option value="America/Whitehorse">(GMT -08:00) Whitehorse</option>
                                                <option value="America/Dawson">(GMT -08:00) Dawson</option>
                                                <option value="America/Tijuana">(GMT -08:00) Tijuana</option>
                                                <option value="Pacific/Pitcairn">(GMT -08:00) Pitcairn</option>
                                                <option value="America/Los_Angeles">(GMT -08:00) Los Angeles</option>
                                                <option value="America/Edmonton">(GMT -07:00) Edmonton</option>
                                                <option value="America/Cambridge_Bay">(GMT -07:00) Cambridge Bay</option>
                                                <option value="America/Yellowknife">(GMT -07:00) Yellowknife</option>
                                                <option value="America/Inuvik">(GMT -07:00) Inuvik</option>
                                                <option value="America/Creston">(GMT -07:00) Creston</option>
                                                <option value="America/Dawson_Creek">(GMT -07:00) Dawson Creek</option>
                                                <option value="America/Fort_Nelson">(GMT -07:00) Fort Nelson</option>
                                                <option value="America/Mazatlan">(GMT -07:00) Mazatlan</option>
                                                <option value="America/Chihuahua">(GMT -07:00) Chihuahua</option>
                                                <option value="America/Ojinaga">(GMT -07:00) Ojinaga</option>
                                                <option value="America/Hermosillo">(GMT -07:00) Hermosillo</option>
                                                <option value="America/Denver">(GMT -07:00) Denver</option>
                                                <option value="America/Boise">(GMT -07:00) Boise</option>
                                                <option value="America/Phoenix">(GMT -07:00) Phoenix</option>
                                                <option value="America/Belize">(GMT -06:00) Belize</option>
                                                <option value="America/Winnipeg">(GMT -06:00) Winnipeg</option>
                                                <option value="America/Rainy_River">(GMT -06:00) Rainy River</option>
                                                <option value="America/Resolute">(GMT -06:00) Resolute</option>
                                                <option value="America/Rankin_Inlet">(GMT -06:00) Rankin Inlet</option>
                                                <option value="America/Regina">(GMT -06:00) Regina</option>
                                                <option value="America/Swift_Current">(GMT -06:00) Swift Current</option>
                                                <option value="Pacific/Easter">(GMT -06:00) Easter</option>
                                                <option value="America/Costa_Rica">(GMT -06:00) Costa Rica</option>
                                                <option value="Pacific/Galapagos">(GMT -06:00) Galapagos</option>
                                                <option value="America/Guatemala">(GMT -06:00) Guatemala</option>
                                                <option value="America/Tegucigalpa">(GMT -06:00) Tegucigalpa</option>
                                                <option value="America/Mexico_City">(GMT -06:00) Mexico City</option>
                                                <option value="America/Merida">(GMT -06:00) Merida</option>
                                                <option value="America/Monterrey">(GMT -06:00) Monterrey</option>
                                                <option value="America/Matamoros">(GMT -06:00) Matamoros</option>
                                                <option value="America/Bahia_Banderas">(GMT -06:00) Bahia Banderas</option>
                                                <option value="America/Managua">(GMT -06:00) Managua</option>
                                                <option value="America/El_Salvador">(GMT -06:00) El Salvador</option>
                                                <option value="America/Chicago">(GMT -06:00) Chicago</option>
                                                <option value="America/Indiana/Tell_City">(GMT -06:00) Tell City, Indiana</option>
                                                <option value="America/Indiana/Knox">(GMT -06:00) Knox, Indiana</option>
                                                <option value="America/Menominee">(GMT -06:00) Menominee</option>
                                                <option value="America/North_Dakota/Center">(GMT -06:00) Center, North Dakota</option>
                                                <option value="America/North_Dakota/New_Salem">(GMT -06:00) New Salem, North Dakota</option>
                                                <option value="America/North_Dakota/Beulah">(GMT -06:00) Beulah, North Dakota</option>
                                                <option value="America/Eirunepe">(GMT -05:00) Eirunepe</option>
                                                <option value="America/Rio_Branco">(GMT -05:00) Rio Branco</option>
                                                <option value="America/Nassau">(GMT -05:00) Nassau</option>
                                                <option value="America/Toronto">(GMT -05:00) Toronto</option>
                                                <option value="America/Nipigon">(GMT -05:00) Nipigon</option>
                                                <option value="America/Thunder_Bay">(GMT -05:00) Thunder Bay</option>
                                                <option value="America/Iqaluit">(GMT -05:00) Iqaluit</option>
                                                <option value="America/Pangnirtung">(GMT -05:00) Pangnirtung</option>
                                                <option value="America/Atikokan">(GMT -05:00) Atikokan</option>
                                                <option value="America/Bogota">(GMT -05:00) Bogota</option>
                                                <option value="America/Havana">(GMT -05:00) Havana</option>
                                                <option value="America/Guayaquil">(GMT -05:00) Guayaquil</option>
                                                <option value="America/Port-au-Prince">(GMT -05:00) Port-au-Prince</option>
                                                <option value="America/Jamaica">(GMT -05:00) Jamaica</option>
                                                <option value="America/Cayman">(GMT -05:00) Cayman</option>
                                                <option value="America/Cancun">(GMT -05:00) Cancun</option>
                                                <option value="America/Panama">(GMT -05:00) Panama</option>
                                                <option value="America/Lima">(GMT -05:00) Lima</option>
                                                <option value="America/New_York">(GMT -05:00) New York</option>
                                                <option value="America/Detroit">(GMT -05:00) Detroit</option>
                                                <option value="America/Kentucky/Louisville">(GMT -05:00) Louisville, Kentucky</option>
                                                <option value="America/Kentucky/Monticello">(GMT -05:00) Monticello, Kentucky</option>
                                                <option value="America/Indiana/Indianapolis">(GMT -05:00) Indianapolis, Indiana</option>
                                                <option value="America/Indiana/Vincennes">(GMT -05:00) Vincennes, Indiana</option>
                                                <option value="America/Indiana/Winamac">(GMT -05:00) Winamac, Indiana</option>
                                                <option value="America/Indiana/Marengo">(GMT -05:00) Marengo, Indiana</option>
                                                <option value="America/Indiana/Petersburg">(GMT -05:00) Petersburg, Indiana</option>
                                                <option value="America/Indiana/Vevay">(GMT -05:00) Vevay, Indiana</option>
                                                <option value="America/Antigua">(GMT -04:00) Antigua</option>
                                                <option value="America/Anguilla">(GMT -04:00) Anguilla</option>
                                                <option value="Antarctica/Palmer">(GMT -04:00) Palmer</option>
                                                <option value="America/Aruba">(GMT -04:00) Aruba</option>
                                                <option value="America/Barbados">(GMT -04:00) Barbados</option>
                                                <option value="America/St_Barthelemy">(GMT -04:00) St Barthelemy</option>
                                                <option value="Atlantic/Bermuda">(GMT -04:00) Bermuda</option>
                                                <option value="America/La_Paz">(GMT -04:00) La Paz</option>
                                                <option value="America/Kralendijk">(GMT -04:00) Kralendijk</option>
                                                <option value="America/Campo_Grande">(GMT -04:00) Campo Grande</option>
                                                <option value="America/Cuiaba">(GMT -04:00) Cuiaba</option>
                                                <option value="America/Porto_Velho">(GMT -04:00) Porto Velho</option>
                                                <option value="America/Boa_Vista">(GMT -04:00) Boa Vista</option>
                                                <option value="America/Manaus">(GMT -04:00) Manaus</option>
                                                <option value="America/Halifax">(GMT -04:00) Halifax</option>
                                                <option value="America/Glace_Bay">(GMT -04:00) Glace Bay</option>
                                                <option value="America/Moncton">(GMT -04:00) Moncton</option>
                                                <option value="America/Goose_Bay">(GMT -04:00) Goose Bay</option>
                                                <option value="America/Blanc-Sablon">(GMT -04:00) Blanc-Sablon</option>
                                                <option value="America/Santiago">(GMT -04:00) Santiago</option>
                                                <option value="America/Curacao">(GMT -04:00) Curacao</option>
                                                <option value="America/Dominica">(GMT -04:00) Dominica</option>
                                                <option value="America/Santo_Domingo">(GMT -04:00) Santo Domingo</option>
                                                <option value="America/Grenada">(GMT -04:00) Grenada</option>
                                                <option value="America/Thule">(GMT -04:00) Thule</option>
                                                <option value="America/Guadeloupe">(GMT -04:00) Guadeloupe</option>
                                                <option value="America/Guyana">(GMT -04:00) Guyana</option>
                                                <option value="America/St_Kitts">(GMT -04:00) St Kitts</option>
                                                <option value="America/St_Lucia">(GMT -04:00) St Lucia</option>
                                                <option value="America/Marigot">(GMT -04:00) Marigot</option>
                                                <option value="America/Martinique">(GMT -04:00) Martinique</option>
                                                <option value="America/Montserrat">(GMT -04:00) Montserrat</option>
                                                <option value="America/Puerto_Rico">(GMT -04:00) Puerto Rico</option>
                                                <option value="America/Asuncion">(GMT -04:00) Asuncion</option>
                                                <option value="America/Lower_Princes">(GMT -04:00) Lower Princes</option>
                                                <option value="America/Grand_Turk">(GMT -04:00) Grand Turk</option>
                                                <option value="America/Port_of_Spain">(GMT -04:00) Port of Spain</option>
                                                <option value="America/St_Vincent">(GMT -04:00) St Vincent</option>
                                                <option value="America/Caracas">(GMT -04:00) Caracas</option>
                                                <option value="America/Tortola">(GMT -04:00) Tortola</option>
                                                <option value="America/St_Thomas">(GMT -04:00) St Thomas</option>
                                                <option value="America/St_Johns">(GMT -03:30) St Johns</option>
                                                <option value="Antarctica/Rothera">(GMT -03:00) Rothera</option>
                                                <option value="America/Argentina/Buenos_Aires">(GMT -03:00) Buenos Aires, Argentina</option>
                                                <option value="America/Argentina/Cordoba">(GMT -03:00) Cordoba, Argentina</option>
                                                <option value="America/Argentina/Salta">(GMT -03:00) Salta, Argentina</option>
                                                <option value="America/Argentina/Jujuy">(GMT -03:00) Jujuy, Argentina</option>
                                                <option value="America/Argentina/Tucuman">(GMT -03:00) Tucuman, Argentina</option>
                                                <option value="America/Argentina/Catamarca">(GMT -03:00) Catamarca, Argentina</option>
                                                <option value="America/Argentina/La_Rioja">(GMT -03:00) La Rioja, Argentina</option>
                                                <option value="America/Argentina/San_Juan">(GMT -03:00) San Juan, Argentina</option>
                                                <option value="America/Argentina/Mendoza">(GMT -03:00) Mendoza, Argentina</option>
                                                <option value="America/Argentina/San_Luis">(GMT -03:00) San Luis, Argentina</option>
                                                <option value="America/Argentina/Rio_Gallegos">(GMT -03:00) Rio Gallegos, Argentina</option>
                                                <option value="America/Argentina/Ushuaia">(GMT -03:00) Ushuaia, Argentina</option>
                                                <option value="America/Belem">(GMT -03:00) Belem</option>
                                                <option value="America/Fortaleza">(GMT -03:00) Fortaleza</option>
                                                <option value="America/Recife">(GMT -03:00) Recife</option>
                                                <option value="America/Araguaina">(GMT -03:00) Araguaina</option>
                                                <option value="America/Maceio">(GMT -03:00) Maceio</option>
                                                <option value="America/Bahia">(GMT -03:00) Bahia</option>
                                                <option value="America/Sao_Paulo">(GMT -03:00) Sao Paulo</option>
                                                <option value="America/Santarem">(GMT -03:00) Santarem</option>
                                                <option value="Atlantic/Stanley">(GMT -03:00) Stanley</option>
                                                <option value="America/Cayenne">(GMT -03:00) Cayenne</option>
                                                <option value="America/Godthab">(GMT -03:00) Godthab</option>
                                                <option value="America/Miquelon">(GMT -03:00) Miquelon</option>
                                                <option value="America/Paramaribo">(GMT -03:00) Paramaribo</option>
                                                <option value="America/Montevideo">(GMT -03:00) Montevideo</option>
                                                <option value="America/Noronha">(GMT -02:00) Noronha</option>
                                                <option value="Atlantic/South_Georgia">(GMT -02:00) South Georgia</option>
                                                <option value="Atlantic/Cape_Verde">(GMT -01:00) Cape Verde</option>
                                                <option value="America/Scoresbysund">(GMT -01:00) Scoresbysund</option>
                                                <option value="Atlantic/Azores">(GMT -01:00) Azores</option>
                                                <option value="Antarctica/Troll">(GMT +00:00) Troll</option>
                                                <option value="Africa/Ouagadougou">(GMT +00:00) Ouagadougou</option>
                                                <option value="Africa/Abidjan">(GMT +00:00) Abidjan</option>
                                                <option value="Africa/El_Aaiun">(GMT +00:00) El Aaiun</option>
                                                <option value="Atlantic/Canary">(GMT +00:00) Canary</option>
                                                <option value="Atlantic/Faroe">(GMT +00:00) Faroe</option>
                                                <option value="Europe/London">(GMT +00:00) London</option>
                                                <option value="Europe/Guernsey">(GMT +00:00) Guernsey</option>
                                                <option value="Africa/Accra">(GMT +00:00) Accra</option>
                                                <option value="America/Danmarkshavn">(GMT +00:00) Danmarkshavn</option>
                                                <option value="Africa/Banjul">(GMT +00:00) Banjul</option>
                                                <option value="Africa/Conakry">(GMT +00:00) Conakry</option>
                                                <option value="Africa/Bissau">(GMT +00:00) Bissau</option>
                                                <option value="Europe/Dublin">(GMT +00:00) Dublin</option>
                                                <option value="Europe/Isle_of_Man">(GMT +00:00) Isle of Man</option>
                                                <option value="Atlantic/Reykjavik">(GMT +00:00) Reykjavik</option>
                                                <option value="Europe/Jersey">(GMT +00:00) Jersey</option>
                                                <option value="Africa/Monrovia">(GMT +00:00) Monrovia</option>
                                                <option value="Africa/Casablanca">(GMT +00:00) Casablanca</option>
                                                <option value="Africa/Bamako">(GMT +00:00) Bamako</option>
                                                <option value="Africa/Nouakchott">(GMT +00:00) Nouakchott</option>
                                                <option value="Europe/Lisbon">(GMT +00:00) Lisbon</option>
                                                <option value="Atlantic/Madeira">(GMT +00:00) Madeira</option>
                                                <option value="Atlantic/St_Helena">(GMT +00:00) St Helena</option>
                                                <option value="Africa/Freetown">(GMT +00:00) Freetown</option>
                                                <option value="Africa/Dakar">(GMT +00:00) Dakar</option>
                                                <option value="Africa/Sao_Tome">(GMT +00:00) Sao Tome</option>
                                                <option value="Africa/Lome">(GMT +00:00) Lome</option>
                                                <option value="Europe/Andorra">(GMT +01:00) Andorra</option>
                                                <option value="Europe/Tirane">(GMT +01:00) Tirane</option>
                                                <option value="Africa/Luanda">(GMT +01:00) Luanda</option>
                                                <option value="Europe/Vienna">(GMT +01:00) Vienna</option>
                                                <option value="Europe/Sarajevo">(GMT +01:00) Sarajevo</option>
                                                <option value="Europe/Brussels">(GMT +01:00) Brussels</option>
                                                <option value="Africa/Porto-Novo">(GMT +01:00) Porto-Novo</option>
                                                <option value="Africa/Kinshasa">(GMT +01:00) Kinshasa</option>
                                                <option value="Africa/Bangui">(GMT +01:00) Bangui</option>
                                                <option value="Africa/Brazzaville">(GMT +01:00) Brazzaville</option>
                                                <option value="Europe/Zurich">(GMT +01:00) Zurich</option>
                                                <option value="Africa/Douala">(GMT +01:00) Douala</option>
                                                <option value="Europe/Prague">(GMT +01:00) Prague</option>
                                                <option value="Europe/Berlin">(GMT +01:00) Berlin</option>
                                                <option value="Europe/Busingen">(GMT +01:00) Busingen</option>
                                                <option value="Europe/Copenhagen">(GMT +01:00) Copenhagen</option>
                                                <option value="Africa/Algiers">(GMT +01:00) Algiers</option>
                                                <option value="Europe/Madrid">(GMT +01:00) Madrid</option>
                                                <option value="Africa/Ceuta">(GMT +01:00) Ceuta</option>
                                                <option value="Europe/Paris">(GMT +01:00) Paris</option>
                                                <option value="Africa/Libreville">(GMT +01:00) Libreville</option>
                                                <option value="Europe/Gibraltar">(GMT +01:00) Gibraltar</option>
                                                <option value="Africa/Malabo">(GMT +01:00) Malabo</option>
                                                <option value="Europe/Zagreb">(GMT +01:00) Zagreb</option>
                                                <option value="Europe/Budapest">(GMT +01:00) Budapest</option>
                                                <option value="Europe/Rome">(GMT +01:00) Rome</option>
                                                <option value="Europe/Vaduz">(GMT +01:00) Vaduz</option>
                                                <option value="Europe/Luxembourg">(GMT +01:00) Luxembourg</option>
                                                <option value="Europe/Monaco">(GMT +01:00) Monaco</option>
                                                <option value="Europe/Podgorica">(GMT +01:00) Podgorica</option>
                                                <option value="Europe/Skopje">(GMT +01:00) Skopje</option>
                                                <option value="Europe/Malta">(GMT +01:00) Malta</option>
                                                <option value="Africa/Windhoek">(GMT +01:00) Windhoek</option>
                                                <option value="Africa/Niamey">(GMT +01:00) Niamey</option>
                                                <option value="Africa/Lagos">(GMT +01:00) Lagos</option>
                                                <option value="Europe/Amsterdam">(GMT +01:00) Amsterdam</option>
                                                <option value="Europe/Oslo">(GMT +01:00) Oslo</option>
                                                <option value="Europe/Warsaw">(GMT +01:00) Warsaw</option>
                                                <option value="Europe/Belgrade">(GMT +01:00) Belgrade</option>
                                                <option value="Europe/Stockholm">(GMT +01:00) Stockholm</option>
                                                <option value="Europe/Ljubljana">(GMT +01:00) Ljubljana</option>
                                                <option value="Arctic/Longyearbyen">(GMT +01:00) Longyearbyen</option>
                                                <option value="Europe/Bratislava">(GMT +01:00) Bratislava</option>
                                                <option value="Europe/San_Marino">(GMT +01:00) San Marino</option>
                                                <option value="Africa/Ndjamena">(GMT +01:00) Ndjamena</option>
                                                <option value="Africa/Tunis">(GMT +01:00) Tunis</option>
                                                <option value="Europe/Vatican">(GMT +01:00) Vatican</option>
                                                <option value="Europe/Mariehamn">(GMT +02:00) Mariehamn</option>
                                                <option value="Europe/Sofia">(GMT +02:00) Sofia</option>
                                                <option value="Africa/Bujumbura">(GMT +02:00) Bujumbura</option>
                                                <option value="Africa/Gaborone">(GMT +02:00) Gaborone</option>
                                                <option value="Africa/Lubumbashi">(GMT +02:00) Lubumbashi</option>
                                                <option value="Asia/Nicosia">(GMT +02:00) Nicosia</option>
                                                <option value="Europe/Tallinn">(GMT +02:00) Tallinn</option>
                                                <option value="Africa/Cairo">(GMT +02:00) Cairo</option>
                                                <option value="Europe/Helsinki">(GMT +02:00) Helsinki</option>
                                                <option value="Europe/Athens">(GMT +02:00) Athens</option>
                                                <option value="Asia/Jerusalem">(GMT +02:00) Jerusalem</option>
                                                <option value="Asia/Amman">(GMT +02:00) Amman</option>
                                                <option value="Asia/Beirut">(GMT +02:00) Beirut</option>
                                                <option value="Africa/Maseru">(GMT +02:00) Maseru</option>
                                                <option value="Europe/Vilnius">(GMT +02:00) Vilnius</option>
                                                <option value="Europe/Riga">(GMT +02:00) Riga</option>
                                                <option value="Africa/Tripoli">(GMT +02:00) Tripoli</option>
                                                <option value="Europe/Chisinau">(GMT +02:00) Chisinau</option>
                                                <option value="Africa/Blantyre">(GMT +02:00) Blantyre</option>
                                                <option value="Africa/Maputo">(GMT +02:00) Maputo</option>
                                                <option value="Asia/Gaza">(GMT +02:00) Gaza</option>
                                                <option value="Asia/Hebron">(GMT +02:00) Hebron</option>
                                                <option value="Europe/Bucharest">(GMT +02:00) Bucharest</option>
                                                <option value="Europe/Kaliningrad">(GMT +02:00) Kaliningrad</option>
                                                <option value="Africa/Kigali">(GMT +02:00) Kigali</option>
                                                <option value="Asia/Damascus">(GMT +02:00) Damascus</option>
                                                <option value="Africa/Mbabane">(GMT +02:00) Mbabane</option>
                                                <option value="Europe/Kiev">(GMT +02:00) Kiev</option>
                                                <option value="Europe/Uzhgorod">(GMT +02:00) Uzhgorod</option>
                                                <option value="Europe/Zaporozhye">(GMT +02:00) Zaporozhye</option>
                                                <option value="Africa/Johannesburg">(GMT +02:00) Johannesburg</option>
                                                <option value="Africa/Lusaka">(GMT +02:00) Lusaka</option>
                                                <option value="Africa/Harare">(GMT +02:00) Harare</option>
                                                <option value="Antarctica/Syowa">(GMT +03:00) Syowa</option>
                                                <option value="Asia/Bahrain">(GMT +03:00) Bahrain</option>
                                                <option value="Europe/Minsk">(GMT +03:00) Minsk</option>
                                                <option value="Asia/Famagusta">(GMT +03:00) Famagusta</option>
                                                <option value="Africa/Djibouti">(GMT +03:00) Djibouti</option>
                                                <option value="Africa/Asmara">(GMT +03:00) Asmara</option>
                                                <option value="Africa/Addis_Ababa">(GMT +03:00) Addis Ababa</option>
                                                <option value="Asia/Baghdad">(GMT +03:00) Baghdad</option>
                                                <option value="Africa/Nairobi">(GMT +03:00) Nairobi</option>
                                                <option value="Indian/Comoro">(GMT +03:00) Comoro</option>
                                                <option value="Asia/Kuwait">(GMT +03:00) Kuwait</option>
                                                <option value="Indian/Antananarivo">(GMT +03:00) Antananarivo</option>
                                                <option value="Asia/Qatar">(GMT +03:00) Qatar</option>
                                                <option value="Europe/Moscow">(GMT +03:00) Moscow</option>
                                                <option value="Europe/Simferopol">(GMT +03:00) Simferopol</option>
                                                <option value="Europe/Volgograd">(GMT +03:00) Volgograd</option>
                                                <option value="Europe/Kirov">(GMT +03:00) Kirov</option>
                                                <option value="Asia/Riyadh">(GMT +03:00) Riyadh</option>
                                                <option value="Africa/Khartoum">(GMT +03:00) Khartoum</option>
                                                <option value="Africa/Mogadishu">(GMT +03:00) Mogadishu</option>
                                                <option value="Africa/Juba">(GMT +03:00) Juba</option>
                                                <option value="Europe/Istanbul">(GMT +03:00) Istanbul</option>
                                                <option value="Africa/Dar_es_Salaam">(GMT +03:00) Dar es Salaam</option>
                                                <option value="Africa/Kampala">(GMT +03:00) Kampala</option>
                                                <option value="Asia/Aden">(GMT +03:00) Aden</option>
                                                <option value="Indian/Mayotte">(GMT +03:00) Mayotte</option>
                                                <option value="Asia/Tehran">(GMT +03:30) Tehran</option>
                                                <option value="Asia/Dubai">(GMT +04:00) Dubai</option>
                                                <option value="Asia/Yerevan">(GMT +04:00) Yerevan</option>
                                                <option value="Asia/Baku">(GMT +04:00) Baku</option>
                                                <option value="Asia/Tbilisi">(GMT +04:00) Tbilisi</option>
                                                <option value="Indian/Mauritius">(GMT +04:00) Mauritius</option>
                                                <option value="Asia/Muscat">(GMT +04:00) Muscat</option>
                                                <option value="Indian/Reunion">(GMT +04:00) Reunion</option>
                                                <option value="Europe/Astrakhan">(GMT +04:00) Astrakhan</option>
                                                <option value="Europe/Saratov">(GMT +04:00) Saratov</option>
                                                <option value="Europe/Ulyanovsk">(GMT +04:00) Ulyanovsk</option>
                                                <option value="Europe/Samara">(GMT +04:00) Samara</option>
                                                <option value="Indian/Mahe">(GMT +04:00) Mahe</option>
                                                <option value="Asia/Kabul">(GMT +04:30) Kabul</option>
                                                <option value="Antarctica/Mawson">(GMT +05:00) Mawson</option>
                                                <option value="Asia/Aqtobe">(GMT +05:00) Aqtobe</option>
                                                <option value="Asia/Aqtau">(GMT +05:00) Aqtau</option>
                                                <option value="Asia/Atyrau">(GMT +05:00) Atyrau</option>
                                                <option value="Asia/Oral">(GMT +05:00) Oral</option>
                                                <option value="Indian/Maldives">(GMT +05:00) Maldives</option>
                                                <option value="Asia/Karachi">(GMT +05:00) Karachi</option>
                                                <option value="Asia/Yekaterinburg">(GMT +05:00) Yekaterinburg</option>
                                                <option value="Indian/Kerguelen">(GMT +05:00) Kerguelen</option>
                                                <option value="Asia/Dushanbe">(GMT +05:00) Dushanbe</option>
                                                <option value="Asia/Ashgabat">(GMT +05:00) Ashgabat</option>
                                                <option value="Asia/Samarkand">(GMT +05:00) Samarkand</option>
                                                <option value="Asia/Tashkent">(GMT +05:00) Tashkent</option>
                                                <option value="Asia/Kolkata">(GMT +05:30) Kolkata</option>
                                                <option value="Asia/Colombo">(GMT +05:30) Colombo</option>
                                                <option value="Asia/Kathmandu">(GMT +05:45) Kathmandu</option>
                                                <option value="Antarctica/Vostok">(GMT +06:00) Vostok</option>
                                                <option value="Asia/Dhaka">(GMT +06:00) Dhaka</option>
                                                <option value="Asia/Thimphu">(GMT +06:00) Thimphu</option>
                                                <option value="Asia/Urumqi">(GMT +06:00) Urumqi</option>
                                                <option value="Indian/Chagos">(GMT +06:00) Chagos</option>
                                                <option value="Asia/Bishkek">(GMT +06:00) Bishkek</option>
                                                <option value="Asia/Almaty">(GMT +06:00) Almaty</option>
                                                <option value="Asia/Qyzylorda">(GMT +06:00) Qyzylorda</option>
                                                <option value="Asia/Omsk">(GMT +06:00) Omsk</option>
                                                <option value="Indian/Cocos">(GMT +06:30) Cocos</option>
                                                <option value="Asia/Yangon">(GMT +06:30) Yangon</option>
                                                <option value="Antarctica/Davis">(GMT +07:00) Davis</option>
                                                <option value="Indian/Christmas">(GMT +07:00) Christmas</option>
                                                <option value="Asia/Jakarta">(GMT +07:00) Jakarta</option>
                                                <option value="Asia/Pontianak">(GMT +07:00) Pontianak</option>
                                                <option value="Asia/Phnom_Penh">(GMT +07:00) Phnom Penh</option>
                                                <option value="Asia/Vientiane">(GMT +07:00) Vientiane</option>
                                                <option value="Asia/Hovd">(GMT +07:00) Hovd</option>
                                                <option value="Asia/Novosibirsk">(GMT +07:00) Novosibirsk</option>
                                                <option value="Asia/Barnaul">(GMT +07:00) Barnaul</option>
                                                <option value="Asia/Tomsk">(GMT +07:00) Tomsk</option>
                                                <option value="Asia/Novokuznetsk">(GMT +07:00) Novokuznetsk</option>
                                                <option value="Asia/Krasnoyarsk">(GMT +07:00) Krasnoyarsk</option>
                                                <option value="Asia/Bangkok">(GMT +07:00) Bangkok</option>
                                                <option value="Asia/Ho_Chi_Minh">(GMT +07:00) Ho Chi Minh</option>
                                                <option value="Australia/Perth">(GMT +08:00) Perth</option>
                                                <option value="Asia/Brunei">(GMT +08:00) Brunei</option>
                                                <option value="Asia/Shanghai">(GMT +08:00) Shanghai</option>
                                                <option value="Asia/Hong_Kong">(GMT +08:00) Hong Kong</option>
                                                <option value="Asia/Makassar">(GMT +08:00) Makassar</option>
                                                <option value="Asia/Ulaanbaatar">(GMT +08:00) Ulaanbaatar</option>
                                                <option value="Asia/Choibalsan">(GMT +08:00) Choibalsan</option>
                                                <option value="Asia/Macau">(GMT +08:00) Macau</option>
                                                <option value="Asia/Kuala_Lumpur">(GMT +08:00) Kuala Lumpur</option>
                                                <option value="Asia/Kuching">(GMT +08:00) Kuching</option>
                                                <option value="Asia/Manila">(GMT +08:00) Manila</option>
                                                <option value="Asia/Irkutsk">(GMT +08:00) Irkutsk</option>
                                                <option value="Asia/Singapore">(GMT +08:00) Singapore</option>
                                                <option value="Asia/Taipei">(GMT +08:00) Taipei</option>
                                                <option value="Asia/Pyongyang">(GMT +08:30) Pyongyang</option>
                                                <option value="Australia/Eucla">(GMT +08:45) Eucla</option>
                                                <option value="Asia/Jayapura">(GMT +09:00) Jayapura</option>
                                                <option value="Asia/Tokyo">(GMT +09:00) Tokyo</option>
                                                <option value="Asia/Seoul">(GMT +09:00) Seoul</option>
                                                <option value="Pacific/Palau">(GMT +09:00) Palau</option>
                                                <option value="Asia/Chita">(GMT +09:00) Chita</option>
                                                <option value="Asia/Yakutsk">(GMT +09:00) Yakutsk</option>
                                                <option value="Asia/Khandyga">(GMT +09:00) Khandyga</option>
                                                <option value="Asia/Dili">(GMT +09:00) Dili</option>
                                                <option value="Australia/Broken_Hill">(GMT +09:30) Broken Hill</option>
                                                <option value="Australia/Adelaide">(GMT +09:30) Adelaide</option>
                                                <option value="Australia/Darwin">(GMT +09:30) Darwin</option>
                                                <option value="Antarctica/DumontDUrville">(GMT +10:00) Dumont D&#39;Urville</option>
                                                <option value="Australia/Hobart">(GMT +10:00) Hobart</option>
                                                <option value="Australia/Currie">(GMT +10:00) Currie</option>
                                                <option value="Australia/Melbourne">(GMT +10:00) Melbourne</option>
                                                <option value="Australia/Sydney">(GMT +10:00) Sydney</option>
                                                <option value="Australia/Brisbane">(GMT +10:00) Brisbane</option>
                                                <option value="Australia/Lindeman">(GMT +10:00) Lindeman</option>
                                                <option value="Pacific/Chuuk">(GMT +10:00) Chuuk</option>
                                                <option value="Pacific/Guam">(GMT +10:00) Guam</option>
                                                <option value="Pacific/Saipan">(GMT +10:00) Saipan</option>
                                                <option value="Pacific/Port_Moresby">(GMT +10:00) Port Moresby</option>
                                                <option value="Asia/Vladivostok">(GMT +10:00) Vladivostok</option>
                                                <option value="Asia/Ust-Nera">(GMT +10:00) Ust-Nera</option>
                                                <option value="Australia/Lord_Howe">(GMT +10:30) Lord Howe</option>
                                                <option value="Antarctica/Casey">(GMT +11:00) Casey</option>
                                                <option value="Antarctica/Macquarie">(GMT +11:00) Macquarie</option>
                                                <option value="Pacific/Pohnpei">(GMT +11:00) Pohnpei</option>
                                                <option value="Pacific/Kosrae">(GMT +11:00) Kosrae</option>
                                                <option value="Pacific/Noumea">(GMT +11:00) Noumea</option>
                                                <option value="Pacific/Norfolk">(GMT +11:00) Norfolk</option>
                                                <option value="Pacific/Bougainville">(GMT +11:00) Bougainville</option>
                                                <option value="Asia/Magadan">(GMT +11:00) Magadan</option>
                                                <option value="Asia/Sakhalin">(GMT +11:00) Sakhalin</option>
                                                <option value="Asia/Srednekolymsk">(GMT +11:00) Srednekolymsk</option>
                                                <option value="Pacific/Guadalcanal">(GMT +11:00) Guadalcanal</option>
                                                <option value="Pacific/Efate">(GMT +11:00) Efate</option>
                                                <option value="Antarctica/McMurdo">(GMT +12:00) McMurdo</option>
                                                <option value="Pacific/Fiji">(GMT +12:00) Fiji</option>
                                                <option value="Pacific/Tarawa">(GMT +12:00) Tarawa</option>
                                                <option value="Pacific/Majuro">(GMT +12:00) Majuro</option>
                                                <option value="Pacific/Kwajalein">(GMT +12:00) Kwajalein</option>
                                                <option value="Pacific/Nauru">(GMT +12:00) Nauru</option>
                                                <option value="Pacific/Auckland">(GMT +12:00) Auckland</option>
                                                <option value="Asia/Kamchatka">(GMT +12:00) Kamchatka</option>
                                                <option value="Asia/Anadyr">(GMT +12:00) Anadyr</option>
                                                <option value="Pacific/Funafuti">(GMT +12:00) Funafuti</option>
                                                <option value="Pacific/Wake">(GMT +12:00) Wake</option>
                                                <option value="Pacific/Wallis">(GMT +12:00) Wallis</option>
                                                <option value="Pacific/Chatham">(GMT +12:45) Chatham</option>
                                                <option value="Pacific/Enderbury">(GMT +13:00) Enderbury</option>
                                                <option value="Pacific/Fakaofo">(GMT +13:00) Fakaofo</option>
                                                <option value="Pacific/Tongatapu">(GMT +13:00) Tongatapu</option>
                                                <option value="Pacific/Kiritimati">(GMT +14:00) Kiritimati</option></select>
                                        </div>

                                    </div>
                                </div>
                                <div class='col-sm-6'>
                                    <div class='form-group no-padding'>
                                        <div class='select-wrapper'>
                                            <select class="select required form-control input-lg" include_blank="Currency" required="required" name="employee[provider][currency_code]" id="employee_provider_currency_code"><option value="">Currency</option>
                                                <option value="AFN">Afghan Afghani - AFN</option>
                                                <option value="ALL">Albanian Lek - ALL</option>
                                                <option value="DZD">Algerian Dinar - DZD</option>
                                                <option value="AOA">Angolan Kwanza - AOA</option>
                                                <option value="ARS">Argentine Peso - ARS</option>
                                                <option value="AMD">Armenian Dram - AMD</option>
                                                <option value="AWG">Aruban Florin - AWG</option>
                                                <option value="AUD">Australian Dollar - AUD</option>
                                                <option value="AZN">Azerbaijani Manat - AZN</option>
                                                <option value="BSD">Bahamian Dollar - BSD</option>
                                                <option value="BHD">Bahraini Dinar - BHD</option>
                                                <option value="BDT">Bangladeshi Taka - BDT</option>
                                                <option value="BBD">Barbadian Dollar - BBD</option>
                                                <option value="BYR">Belarusian Ruble - BYR</option>
                                                <option value="BZD">Belize Dollar - BZD</option>
                                                <option value="BMD">Bermudian Dollar - BMD</option>
                                                <option value="BTN">Bhutanese Ngultrum - BTN</option>
                                                <option value="BOB">Bolivian Boliviano - BOB</option>
                                                <option value="BAM">Bosnia and Herzegovina Convertible Mark - BAM</option>
                                                <option value="BWP">Botswana Pula - BWP</option>
                                                <option value="BRL">Brazilian Real - BRL</option>
                                                <option value="GBP">British Pound - GBP</option>
                                                <option value="BND">Brunei Dollar - BND</option>
                                                <option value="BGN">Bulgarian Lev - BGN</option>
                                                <option value="BIF">Burundian Franc - BIF</option>
                                                <option value="KHR">Cambodian Riel - KHR</option>
                                                <option value="CAD">Canadian Dollar - CAD</option>
                                                <option value="CVE">Cape Verdean Escudo - CVE</option>
                                                <option value="KYD">Cayman Islands Dollar - KYD</option>
                                                <option value="XAF">Central African Cfa Franc - XAF</option>
                                                <option value="XPF">Cfp Franc - XPF</option>
                                                <option value="CLP">Chilean Peso - CLP</option>
                                                <option value="CNY">Chinese Renminbi Yuan - CNY</option>
                                                <option value="COP">Colombian Peso - COP</option>
                                                <option value="KMF">Comorian Franc - KMF</option>
                                                <option value="CDF">Congolese Franc - CDF</option>
                                                <option value="CRC">Costa Rican Colón - CRC</option>
                                                <option value="HRK">Croatian Kuna - HRK</option>
                                                <option value="CUC">Cuban Convertible Peso - CUC</option>
                                                <option value="CUP">Cuban Peso - CUP</option>
                                                <option value="CZK">Czech Koruna - CZK</option>
                                                <option value="DKK">Danish Krone - DKK</option>
                                                <option value="DJF">Djiboutian Franc - DJF</option>
                                                <option value="DOP">Dominican Peso - DOP</option>
                                                <option value="XCD">East Caribbean Dollar - XCD</option>
                                                <option value="EGP">Egyptian Pound - EGP</option>
                                                <option value="ERN">Eritrean Nakfa - ERN</option>
                                                <option value="EEK">Estonian Kroon - EEK</option>
                                                <option value="ETB">Ethiopian Birr - ETB</option>
                                                <option value="EUR">Euro - EUR</option>
                                                <option value="FKP">Falkland Pound - FKP</option>
                                                <option value="FJD">Fijian Dollar - FJD</option>
                                                <option value="GMD">Gambian Dalasi - GMD</option>
                                                <option value="GEL">Georgian Lari - GEL</option>
                                                <option value="GHS">Ghanaian Cedi - GHS</option>
                                                <option value="GIP">Gibraltar Pound - GIP</option>
                                                <option value="GTQ">Guatemalan Quetzal - GTQ</option>
                                                <option value="GNF">Guinean Franc - GNF</option>
                                                <option value="GYD">Guyanese Dollar - GYD</option>
                                                <option value="HTG">Haitian Gourde - HTG</option>
                                                <option value="HNL">Honduran Lempira - HNL</option>
                                                <option value="HKD">Hong Kong Dollar - HKD</option>
                                                <option value="HUF">Hungarian Forint - HUF</option>
                                                <option value="ISK">Icelandic Króna - ISK</option>
                                                <option value="INR">Indian Rupee - INR</option>
                                                <option value="IDR">Indonesian Rupiah - IDR</option>
                                                <option value="IRR">Iranian Rial - IRR</option>
                                                <option value="IQD">Iraqi Dinar - IQD</option>
                                                <option value="ILS">Israeli New Sheqel - ILS</option>
                                                <option value="JMD">Jamaican Dollar - JMD</option>
                                                <option value="JPY">Japanese Yen - JPY</option>
                                                <option value="JOD">Jordanian Dinar - JOD</option>
                                                <option value="KZT">Kazakhstani Tenge - KZT</option>
                                                <option value="KES">Kenyan Shilling - KES</option>
                                                <option value="KWD">Kuwaiti Dinar - KWD</option>
                                                <option value="KGS">Kyrgyzstani Som - KGS</option>
                                                <option value="LAK">Lao Kip - LAK</option>
                                                <option value="LVL">Latvian Lats - LVL</option>
                                                <option value="LBP">Lebanese Pound - LBP</option>
                                                <option value="LSL">Lesotho Loti - LSL</option>
                                                <option value="LRD">Liberian Dollar - LRD</option>
                                                <option value="LYD">Libyan Dinar - LYD</option>
                                                <option value="MOP">Macanese Pataca - MOP</option>
                                                <option value="MKD">Macedonian Denar - MKD</option>
                                                <option value="MGA">Malagasy Ariary - MGA</option>
                                                <option value="MWK">Malawian Kwacha - MWK</option>
                                                <option value="MYR">Malaysian Ringgit - MYR</option>
                                                <option value="MVR">Maldivian Rufiyaa - MVR</option>
                                                <option value="MRO">Mauritanian Ouguiya - MRO</option>
                                                <option value="MUR">Mauritian Rupee - MUR</option>
                                                <option value="MXN">Mexican Peso - MXN</option>
                                                <option value="MDL">Moldovan Leu - MDL</option>
                                                <option value="MNT">Mongolian Tögrög - MNT</option>
                                                <option value="MAD">Moroccan Dirham - MAD</option>
                                                <option value="MZN">Mozambican Metical - MZN</option>
                                                <option value="MMK">Myanmar Kyat - MMK</option>
                                                <option value="NAD">Namibian Dollar - NAD</option>
                                                <option value="NPR">Nepalese Rupee - NPR</option>
                                                <option value="ANG">Netherlands Antillean Gulden - ANG</option>
                                                <option value="TWD">New Taiwan Dollar - TWD</option>
                                                <option value="NZD">New Zealand Dollar - NZD</option>
                                                <option value="NIO">Nicaraguan Córdoba - NIO</option>
                                                <option value="NGN">Nigerian Naira - NGN</option>
                                                <option value="KPW">North Korean Won - KPW</option>
                                                <option value="NOK">Norwegian Krone - NOK</option>
                                                <option value="OMR">Omani Rial - OMR</option>
                                                <option value="PKR">Pakistani Rupee - PKR</option>
                                                <option value="PAB">Panamanian Balboa - PAB</option>
                                                <option value="PGK">Papua New Guinean Kina - PGK</option>
                                                <option value="PYG">Paraguayan Guaraní - PYG</option>
                                                <option value="PEN">Peruvian Nuevo Sol - PEN</option>
                                                <option value="PHP">Philippine Peso - PHP</option>
                                                <option value="PLN">Polish Złoty - PLN</option>
                                                <option value="QAR">Qatari Riyal - QAR</option>
                                                <option value="RON">Romanian Leu - RON</option>
                                                <option value="RUB">Russian Ruble - RUB</option>
                                                <option value="RWF">Rwandan Franc - RWF</option>
                                                <option value="SHP">Saint Helenian Pound - SHP</option>
                                                <option value="SVC">Salvadoran Colón - SVC</option>
                                                <option value="WST">Samoan Tala - WST</option>
                                                <option value="STD">São Tomé and Príncipe Dobra - STD</option>
                                                <option value="SAR">Saudi Riyal - SAR</option>
                                                <option value="RSD">Serbian Dinar - RSD</option>
                                                <option value="SCR">Seychellois Rupee - SCR</option>
                                                <option value="SLL">Sierra Leonean Leone - SLL</option>
                                                <option value="SGD">Singapore Dollar - SGD</option>
                                                <option value="SKK">Slovak Koruna - SKK</option>
                                                <option value="SBD">Solomon Islands Dollar - SBD</option>
                                                <option value="SOS">Somali Shilling - SOS</option>
                                                <option value="ZAR">South African Rand - ZAR</option>
                                                <option value="KRW">South Korean Won - KRW</option>
                                                <option value="LKR">Sri Lankan Rupee - LKR</option>
                                                <option value="SDG">Sudanese Pound - SDG</option>
                                                <option value="SRD">Surinamese Dollar - SRD</option>
                                                <option value="SZL">Swazi Lilangeni - SZL</option>
                                                <option value="SEK">Swedish Krona - SEK</option>
                                                <option value="CHF">Swiss Franc - CHF</option>
                                                <option value="SYP">Syrian Pound - SYP</option>
                                                <option value="TJS">Tajikistani Somoni - TJS</option>
                                                <option value="TZS">Tanzanian Shilling - TZS</option>
                                                <option value="THB">Thai Baht - THB</option>
                                                <option value="TOP">Tongan Paʻanga - TOP</option>
                                                <option value="TTD">Trinidad and Tobago Dollar - TTD</option>
                                                <option value="TND">Tunisian Dinar - TND</option>
                                                <option value="TRY">Turkish Lira - TRY</option>
                                                <option value="TMM">Turkmenistani Manat - TMM</option>
                                                <option value="UGX">Ugandan Shilling - UGX</option>
                                                <option value="UAH">Ukrainian Hryvnia - UAH</option>
                                                <option value="AED">United Arab Emirates Dirham - AED</option>
                                                <option value="USD">United States Dollar - USD</option>
                                                <option value="UYU">Uruguayan Peso - UYU</option>
                                                <option value="UZS">Uzbekistani Som - UZS</option>
                                                <option value="VUV">Vanuatu Vatu - VUV</option>
                                                <option value="VEF">Venezuelan Bolívar - VEF</option>
                                                <option value="VND">Vietnamese Đồng - VND</option>
                                                <option value="XOF">West African Cfa Franc - XOF</option>
                                                <option value="YER">Yemeni Rial - YER</option>
                                                <option value="ZMK">Zambian Kwacha - ZMK</option>
                                                <option value="ZWD">Zimbabwean Dollar - ZWD</option></select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="commit" value="Create my account" class="btn btn-success  btn-lg full-width btn-cons m-t-10 m-b-30" data-style="expand-left" id="create-account" />
                        </form>
                        <div class='row m-b-50'>
                            <div class='col-sm-8 col-sm-offset-2 text-center'>
                                By creating your account you agree to the </br> <a target="blank" href="http://www.shedul.com/terms.html">Terms</a> and <a target="blank" href="http://www.shedul.com/privacy.html">Privacy</a> policies.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></body></html>