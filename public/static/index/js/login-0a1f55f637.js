$(function () {
    function e() {
        var e = APIUrl + "appapi/ppuser/pc/ppuser_vcode_img_server.php?sn=" + window.FingerprintCode + "&imei=" + window.FingerprintCode + "&time=" + (new Date).getTime() + "&width=50&height=25";
        $("#checkCodePic-btn").prop("src", e)
    }

    function o(o, n, t) {
        $.ajax({
            url: APIUrl + "appapi/login_server/pc/app_public_login_server.php",
            data: {mobile: o, password: n, imei: window.FingerprintCode, vcode: t},
            type: "POST",
            success: function (t) {
                if (t = JSON.parse(t), 200 == t.status) {
                    localStorage.remember && a(o, n), localStorage.userId = t.data.userid, localStorage.isWriter = t.data.isWriter, localStorage.isLogin = !0, localStorage.loginout = !1, localStorage.nickname = t.data.nickname, localStorage.fly = t.data.fly;
                    var i = new Date;
                    localStorage.loginTime = i.getTime(), window.location.reload()
                } else 500 == t.status ? (messageAlert("danger", t.message), e()) : (messageAlert("warning", t.message), e())
            }
        })
    }

    function a(e, o) {
        var a = e.split("").map(function (e) {
            return String.fromCharCode(e.charCodeAt() + 171)
        });
        a = a.join("");
        var n = o.split("").map(function (e) {
            return String.fromCharCode(2 * e.charCodeAt() + 50)
        });
        n = n.join(""), localStorage.bookEncoding = a + "✐" + n
    }

    function n() {
        var e = localStorage.bookEncoding.split("✐"), o = e[0], a = e[1];
        return o = o.split("").map(function (e) {
            return String.fromCharCode(e.charCodeAt() - 171)
        }), o = o.join(""), a = a.split("").map(function (e) {
            return String.fromCharCode((e.charCodeAt() - 50) / 2)
        }), a = a.join(""), [o, a]
    }

    var n, t, i;
    localStorage.bookEncoding && (n = n(), i = n[1]), localStorage.nickname && (t = localStorage.nickname), "undefined" != localStorage.remember && (localStorage.remember && JSON.parse(localStorage.remember) ? ($(".userInput").val(n[0]), $(".userPassword").val(i), $(".ant-checkbox").addClass("ant-checkbox-checked")) : ($(".userInput").val(""), $(".userPassword").val(""))), localStorage.isLogin && JSON.parse(localStorage.isLogin) ? $("#loginCon").html(_.template($("#loginedTemp").html())({
        nickname: t,
        pwd: i
    })) : $("#loginCon").html(_.template($("#loginTemp").html())()), $(document).on("click", "#login-link", function (e) {
        PV("登录页"), $("#login").dialog("open"), e.preventDefault()
    }), $("#login").dialog({
        draggable: !1,
        classes: {"ui-dialog": "login-dialog"},
        autoOpen: !1,
        modal: !0,
        minWidth: 800,
        minHeight: 450,
        open: function (e, o) {
            $(e.target).dialog("widget").css({position: "fixed"}).position({my: "center", at: "center", of: window})
        }
    }), localStorage.loginout && JSON.parse(localStorage.loginout) && $("#loginCon").html(_.template($("#loginTemp").html())()), $("#login").on("click", ".remember", function (e) {
        e.preventDefault();
        var o = $(".ant-checkbox");
        o.hasClass("ant-checkbox-checked") ? (o.removeClass("ant-checkbox-checked"), localStorage.remember = !1) : (o.addClass("ant-checkbox-checked"), localStorage.remember = !0)
    }), $("#search_box_btn").click(function () {
        var e = $(".secah-con");
        "none" == e.css("display") ? (e.fadeIn(), e.find("input[type=text]").focus()) : e.fadeOut()
    }), $(".user-login-info").hover(function (e) {
        e.preventDefault(), $(this).addClass("active"), $(".nickname-listnovel").fadeIn()
    }, function (e) {
        e.preventDefault(), $(this).removeClass("active"), $(".nickname-listnovel").fadeOut()
    }), $(document).on("click", ".loginbtn", function () {
        var e = $(".userInput").val().trim(), a = $(".userPassword").val().trim(), n = $(".userCheckPic").val().trim();
        o(e, a, n)
    }), $(".search_button").click(function () {
        $(".search_box").toggleClass("start"), $(this).is(":focus") || setTimeout(function () {
            $(".search_input").focus()
        }, 920)
    }), $(document).on("click", "#checkCodePic-btn", function () {
        e()
    }), setTimeout(function () {
        e()
    }, 300)
});