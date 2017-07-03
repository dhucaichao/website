function loadPage(e) {
    var n = 1;
    $.ajax({
        type: "POST",
        url: public.ajaxUrl + "?r=pcapi/pcpage/pageinfo",
        data: {pageId: 1, timestamp: public.timestamp, sign: md5(n + public.timestamp + public.pageKey)}
    }).done(function (n) {
        var t = !1;
        try {
            t = JSON.parse(n)
        } catch (e) {
        }
        200 == t.state && "function" == typeof e && e(t.data)
    }).fail(function (e, n, t) {
    }).always(function () {
        window.count++
    })
}
function getmoduData(e, n) {
    $.ajax({type: "POST", url: public.ajaxUrl + "?r=pcapi/pcpage/moduleinfo", data: e}).done(function (e) {
        var t = !1;
        try {
            t = JSON.parse(e)
        } catch (e) {
        }
        n && n(t), public.defaulImg()
    }).fail(function (e, n, t) {
    }).always(function () {
        window.count++
    })
}
function render(e, n, t) {
    var a = _.template($(n).html());
    $(e).html(a({data: t}))
}
function typeRender(e, n) {
    var t = 0;
    for (var a in e)!function (e, a) {
        loadType(e, a.size, function (e) {
            switch (t++, e.title = a.name, "#mt" == n ? (e.lmkIn = "indexnpjx-sj", e.lmvIn = "书籍", e.lmkInGd = "indexnpjx-gd", e.lmvInGd = "更多") : (e.lmkIn = "indexgpjx-sj", e.lmvIn = "书籍", e.lmkInGd = "indexgpjx-gd", e.lmvInGd = "更多"), t) {
                case 1:
                    render($(n + 1), $("#bk_ty_tpl"), e);
                    break;
                case 2:
                    render($(n + 2), $("#bk_ty_tpl"), e);
                    break;
                case 3:
                    render($(n + 3), $("#bk_ty_tpl"), e);
                    break;
                default:
                    render($(n + 4), $("#bk_ty_tpl"), e)
            }
        })
    }(a, e[a])
}
function loadType(e, n, t) {
    var a = "1", d = n, l = {
        classId: e,
        page: "1",
        pageSize: d,
        timestamp: public.timestamp,
        sign: md5(a + d + public.timestamp + public.bookKey)
    };
    $.ajax({type: "POST", url: public.ajaxUrl + "?r=pcapi/pcbook/librarysearch", data: l}).done(function (n) {
        var a = !1;
        try {
            a = JSON.parse(n)
        } catch (e) {
        }
        200 == a.state ? (a.lid = e, t && t(a)) : console.log("没有数据")
    }).fail(function (e, n, t) {
    }).always(function () {
        window.count++, 15 == window.count && "function" == typeof window.callPhantom && window.callPhantom()
    })
}
PV("首页"), function (e) {
    e.extend({
        foucs: function (n) {
            function t(n) {
                for (var t = e(".smallul li").length, a = 0; a < t; a++)e("#" + a).parent().removeClass("on"), e("#" + a).css({
                    width: "48px",
                    "margin-top": "30px"
                });
                e("#" + n).parent().addClass("on"), e("#" + n).animate({width: "90px", "margin-top": 0}), d(n)
            }

            function a(e) {
                var n = m.eq(e);
                if ("done" !== n.attr("data-loadImg")) {
                    var t = n.find("img"), a = t.attr("data-src");
                    t.hide(), t.attr("src", a), n.attr("data-loadImg") || (t.fadeIn(300), n.attr("data-loadImg", "done"))
                }
            }

            function d(e) {
                a(e), setTimeout(function () {
                    var e = p(1), n = f(1);
                    a(e), a(n)
                }, 200)
            }

            function l() {
                d(0), t(0)
            }

            var o = 0, i = e(".banberbox"), m = i.find("li.hero"), r = e("#lbl_btn"), u = e("#lbr_btn"), s = {
                interval: n && n.interval || 3e3,
                animateTime: n && n.animateTime || 500,
                direction: n && "right" === n.direction,
                _imgLen: m.length
            }, c = o, p = function (e) {
                return c + e >= s._imgLen ? c + e - s._imgLen : c + e
            }, f = function (e) {
                return c - e < 0 ? s._imgLen + c - e : c - e
            }, b = function (e) {
                m.eq(e ? f(2) : p(2)).css("left", e ? "-2400px" : "2400px"), m.animate({left: (e ? "+" : "-") + "=1200px"}, s.animateTime), c = e ? f(1) : p(1), o = c, t(o), a(o)
            }, _ = function (e) {
                if (e >= 5) {
                    for (var n = e; n >= 0; n--) {
                        var a = 1200 * (n - e);
                        m.eq(n).css("left", a + "px")
                    }
                    m.eq(0).css("left", "1200px")
                } else if (0 == e)m.eq(0).css("left", "0px"), m.eq(1).css("left", "1200px"), m.eq(2).css("left", "2400px"), m.eq(3).css("left", "3600px"), m.eq(4).css("left", "-3600px"), m.eq(5).css("left", "-2400px"); else {
                    for (var n = e + 1; n >= 0; n--) {
                        var a = 1200 * (n - e);
                        m.eq(n).css("left", a + "px")
                    }
                    for (var d = n = e + 2; n > 0; n--, d++) {
                        var a = (n + 2) * -1200;
                        m.eq(d).css("left", a + "px")
                    }
                }
                o = c = e, t(o)
            }, g = setInterval(function () {
                b(s.direction)
            }, s.interval);
            m.css("left", "-1200px"), m.eq(c).css("left", 0).end().eq(c + 1).css("left", "1200px"), r.click(function () {
                0 === e(":animated").length && b(!0)
            }), u.click(function () {
                0 === e(":animated").length && b(!1)
            }), e(".smallul li").click(function () {
                _(Number(e(this).find("img").attr("id")))
            }), e(".banberbox").hover(function () {
                clearInterval(g)
            }, function () {
                g = setInterval(function () {
                    b(s.direction)
                }, s.interval)
            }), l()
        }
    })
}(jQuery), $(function () {
    setTimeout(function () {
        document.body.scrollTop = 0
    }, 100), loadPage(function (e) {
        for (var n = {}, t = {}, a = "", d = "", l = "", o = "", i = "", m = "", r = 0, u = e.length; r < u; r++)switch (e[r].ord) {
            case"1":
                a += e[r].module_id + ",", t["name" + e[r].module_id] = e[r].module_name;
                break;
            case"2":
                d += e[r].module_id + ",", t["name" + e[r].module_id] = e[r].module_name;
                break;
            case"3":
                l += e[r].module_id + ",", t["name" + e[r].module_id] = e[r].module_name;
                break;
            case"4":
                o += e[r].module_id + ",", t["name" + e[r].module_id] = e[r].module_name;
                break;
            case"5":
                i += e[r].module_id + ",", t["name" + e[r].module_id] = e[r].module_name;
                break;
            default:
                m += e[r].module_id + ",", t["name" + e[r].module_id] = e[r].module_name
        }
        n.module1 = {moduleIds: a.slice(0, a.length - 1)}, n.module2 = {moduleIds: d.slice(0, d.length - 1)}, n.module3 = {moduleIds: l.slice(0, l.length - 1)}, n.module4 = {moduleIds: o.slice(0, o.length - 1)}, n.module5 = {moduleIds: i.slice(0, i.length - 1)}, n.module6 = {moduleIds: m.slice(0, m.length - 1)};
        for (var s in n)if (n.hasOwnProperty(s)) {
            var c = n[s];
            c.timestamp = public.timestamp, c.sign = md5(n[s].moduleIds + public.timestamp + public.pageKey)
        }
        getmoduData(n.module1, function (e) {
            if (200 == e.state) {
                var t = n.module1.moduleIds.split(",").sort(), a = e.data["module" + t[0]], d = e.show;
                d.show_rand && (a = a.sort(function () {
                    return Math.random() - .5
                })), a = a.slice(0, 6), render("#banner", "#bk_banner_tpl", a), $.foucs({direction: "left"})
            }
        }), getmoduData(n.module2, function (e) {
            if (200 == e.state) {
                var a = n.module2.moduleIds.split(",").sort(), d = e.data["module" + a[0]], l = e.data["module" + a[1]], o = e.data["module" + a[2]], i = e.data["module" + a[3]];
                e.show["module" + a[0]].show_rand && (d = d.sort(function () {
                    return Math.random() - .5
                })), d.modu_name = t["name" + a[0]], e.show["module" + a[1]].show_rand && (l = l.sort(function () {
                    return Math.random() - .5
                })), l.modu_name = t["name" + a[1]], e.show["module" + a[2]].show_rand && (o = o.sort(function () {
                    return Math.random() - .5
                })), o.modu_name = t["name" + a[2]], e.show["module" + a[3]].show_rand && (i = i.sort(function () {
                    return Math.random() - .5
                })), i.modu_name = t["name" + a[3]], d.lmk = "indexnpbd", d.lmv = "男频榜单", d.lmkIn = "indexnpbd-sj", d.lmvIn = "书籍", l.lmk = "indexgpbd", l.lmv = "女频榜单", l.lmkIn = "indexgpbd-sj", l.lmvIn = "书籍", o.lmk = "indexflbd", o.lmv = "分类推荐榜", o.lmkIn = "indexflbd-sj", o.lmvIn = "书籍", i.lmk = "indexqlbd", i.lmv = "强力推荐榜", i.lmkIn = "indexqlbd-sj", i.lmvIn = "书籍", render("#manbd", "#bk_mpd_tpl", d), render("#wombd", "#bk_mpd_tpl", l), render("#typebd", "#bk_mpd_tpl", o), render("#zuibd", "#bk_zapd_tpl", i)
            }
        }), getmoduData(n.module3, function (e) {
            if (200 == e.state) {
                var t = e.show["module" + n.module3.moduleIds];
                if (t) {
                    var a = t.class_data;
                    render("#typetab", "#bk_tab_tpl", a)
                }
            }
        }), getmoduData(n.module4, function (e) {
            if (200 == e.state) {
                var a = n.module4.moduleIds.split(",").sort(), d = e.data["module" + a[0]], l = e.show["module" + a[1]].class_data;
                d.modu_name = t["name" + a[0]];
                var o = "#mt";
                typeRender(l, o), d.lmkIn = "indexnpjx-sj", d.lmvIn = "书籍", d.lmkInGd = "indexnpjx-gd", d.lmvInGd = "更多", render("#manlb", "#bk_nlb_tpl", d), $("#manwrap").seamless({
                    direction: "right",
                    step: 6
                })
            }
        }), getmoduData(n.module5, function (e) {
            if (200 == e.state) {
                var t = n.module5.moduleIds.split(",").sort(), a = e.data["module" + t[0]];
                a.lmkIn = "indexemxs-sj", a.lmvIn = "书籍", render("#hotbklb", "#bk_hotlb_tpl", a), $("#newbkwrap").seamless({
                    direction: "right",
                    step: 6
                })
            }
        }), getmoduData(n.module6, function (e) {
            if (200 == e.state) {
                var t = n.module6.moduleIds.split(",").sort(), a = e.data["module" + t[0]], d = e.show["module" + t[1]].class_data, l = "#vt";
                typeRender(d, l), a.lmkIn = "indexgpjx-sj", a.lmvIn = "书籍", a.lmkInGd = "indexgpjx-gd", a.lmvInGd = "更多", render("#womlb", "#bk_womlb_tpl", a), $("#womanwrap").seamless({
                    direction: "right",
                    step: 6
                })
            }
        })
    }), window.count = 0
});