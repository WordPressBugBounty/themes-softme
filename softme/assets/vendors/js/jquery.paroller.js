!(function (r) {
    "use strict";
    "function" == typeof define && define.amd ? define("parollerjs", ["jquery"], r) : "object" == typeof module && "object" == typeof module.exports ? (module.exports = r(require("jquery"))) : r(jQuery);
})(function (m) {
    "use strict";
    var g = !1,
        w = function () {
            g = !1;
        },
        v = function (r, t) {
            return r.css({ "background-position": "center " + -t + "px" });
        },
        x = function (r, t) {
            return r.css({ "background-position": -t + "px center" });
        },
        b = function (r, t, o) {
            return (
                "none" !== o || (o = ""),
                r.css({
                    "-webkit-transform": "translateY(" + t + "px)" + o,
                    "-moz-transform": "translateY(" + t + "px)" + o,
                    transform: "translateY(" + t + "px)" + o,
                    transition: "transform 0.6s cubic-bezier(0, 0, 0, 1) 0s",
                    "will-change": "transform",
                })
            );
        },
        k = function (r, t, o) {
            return (
                "none" !== o || (o = ""),
                r.css({ "-webkit-transform": "translateX(" + t + "px)" + o, "-moz-transform": "translateX(" + t + "px)" + o, transform: "translateX(" + t + "px)" + o, transition: "transform linear", "will-change": "transform" })
            );
        },
        y = function (r, t, o) {
            var n = r.data("paroller-factor"),
                a = n || o.factor;
            if (t < 576) {
                var e = r.data("paroller-factor-xs"),
                    i = e || o.factorXs;
                return i || a;
            }
            if (t <= 768) {
                var c = r.data("paroller-factor-sm"),
                    f = c || o.factorSm;
                return f || a;
            }
            if (t <= 1024) {
                var u = r.data("paroller-factor-md"),
                    s = u || o.factorMd;
                return s || a;
            }
            if (t <= 1200) {
                var l = r.data("paroller-factor-lg"),
                    d = l || o.factorLg;
                return d || a;
            }
            if (t <= 1920) {
                var p = r.data("paroller-factor-xl"),
                    h = p || o.factorXl;
                return h || a;
            }
            return a;
        },
        z = function (r, t) {
            return Math.round(r * t);
        },
        M = function (r, t, o, n) {
            return Math.round((r - o / 2 + n) * t);
        },
        X = function (r) {
            return r.css({ "background-position": "unset" });
        },
        j = function (r) {
            return r.css({ transform: "unset", transition: "unset" });
        };
    m.fn.paroller = function (d) {
        var p = m(window).height(),
            h = m(document).height();
        d = m.extend({ factor: 0, factorXs: 0, factorSm: 0, factorMd: 0, factorLg: 0, factorXl: 0, type: "background", direction: "vertical" }, d);
        return this.each(function () {
            var t = m(this),
                o = m(window).width(),
                n = t.offset().top,
                a = t.outerHeight(),
                r = t.data("paroller-type"),
                e = t.data("paroller-direction"),
                i = t.css("transform"),
                c = r || d.type,
                f = e || d.direction,
                u = y(t, o, d),
                s = z(n, u),
                l = M(n, u, p, a);
            "background" === c ? ("vertical" === f ? v(t, s) : "horizontal" === f && x(t, s)) : "foreground" === c && ("vertical" === f ? b(t, l, i) : "horizontal" === f && k(t, l, i)),
                m(window).on("resize", function () {
                    var r = m(this).scrollTop();
                    (o = m(window).width()),
                        (n = t.offset().top),
                        (a = t.outerHeight()),
                        (u = y(t, o, d)),
                        (s = Math.round(n * u)),
                        (l = Math.round((n - p / 2 + a) * u)),
                        g || (window.requestAnimationFrame(w), (g = !0)),
                        "background" === c ? (X(t), "vertical" === f ? v(t, s) : "horizontal" === f && x(t, s)) : "foreground" === c && r <= h && (j(t), "vertical" === f ? b(t, l) : "horizontal" === f && k(t, l));
                }),
                m(window).on("scroll", function () {
                    var r = m(this).scrollTop();
                    (h = m(document).height()),
                        (s = Math.round((n - r) * u)),
                        (l = Math.round((n - p / 2 + a - r) * u)),
                        g || (window.requestAnimationFrame(w), (g = !0)),
                        "background" === c ? ("vertical" === f ? v(t, s) : "horizontal" === f && x(t, s)) : "foreground" === c && r <= h && ("vertical" === f ? b(t, l, i) : "horizontal" === f && k(t, l, i));
                });
        });
    };
});
