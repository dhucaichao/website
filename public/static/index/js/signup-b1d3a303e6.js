$(function () {
    function e(e) {
        $.ajax({
            url: APIUrl + "appapi/login_server/pc/app_send_vcode_server.php",
            data: {mobile: e, imei: window.FingerprintCode},
            type: "POST",
            success: function (e) {
                200 != e.status && messageAlert("error", e.message)
            },
            error: function (e) {
                messageAlert("error", e.message)
            }
        })
    }

    function a(e) {
        $.ajax({
            url: APIUrl + "appapi/login_server/pc/app_public_reg_server.php",
            type: "POST",
            data: e,
            success: function (e) {
                e = JSON.parse(e), 200 == e.status ? history.go(-1) : messageAlert("warning", e.message)
            }
        })
    }

    $("#verifyCode").click(function () {
        var a = $("#validating").val().trim();
        return a.length ? (e(a), void $(this).counter({phone: "15202400911"})) : (messageAlert("warning", "请填写正确手机号！"), !1)
    }), $("#msg").dialog({title: "错误", autoOpen: !1, modal: !0, minHeight: 100}), $("#verifyXy").click(function () {
        $("#verifyMsg").dialog("open")
    }), $("#verifyMsg").dialog({
        title: "账号协议",
        dialogClass: "no-closebtn",
        autoOpen: !1,
        modal: !0,
        minWidth: 500
    }), $(".signUpPage").on("click", ".ant-checkbox", function (e) {
        e.preventDefault();
        var a = $(this), s = $("#signUp");
        a.hasClass("ant-checkbox-checked") ? (a.removeClass("ant-checkbox-checked"), s.attr("disabled", !0), s.addClass("disabled")) : (a.addClass("ant-checkbox-checked"), s.removeAttr("disabled"), s.removeClass("disabled"))
    }), $(".readbox").on("click", ".ant-checkbox", function (e) {
        e.preventDefault();
        var a = $(this), s = $(".readbtn");
        a.hasClass("ant-checkbox-checked") ? (a.removeClass("ant-checkbox-checked"), s.hide()) : (a.addClass("ant-checkbox-checked"), s.show())
    }), $(".readbtn").on("click", function () {
        $("#verifyMsg").dialog("close")
    }), $(".glyphicon-eye-open").click(function () {
        var e = $(this), a = e.closest(".zcpwd").find(".userPassword");
        e.hasClass("eye-click") ? (e.removeClass("eye-click"), a.attr("type", "password")) : (e.addClass("eye-click"), a.attr("type", "text"))
    }), $("#signUp").on("click", function () {
        var e = $("#validating").val().trim(), s = $(".vodevalue").val().trim(), r = $(".userPassword").val().trim(), i = $(".userPasswordRe").val().trim();
        if (!e.length)return messageAlert("warning", "请输入手机号！"), !1;
        if (!s.length)return messageAlert("warning", "请输入验证码！"), !1;
        if (!r.length)return messageAlert("warning", "请输入密码！"), !1;
        if (!i.length)return messageAlert("warning", "请输入确认密码！"), !1;
        if (r !== i)return messageAlert("warning", "两次输入密码不一致！"), !1;
        var n = {mobile: e, pwd: r, vcode: s, imei: window.FingerprintCode};
        a(n)
    })
});