$(function(){var e=function(e,t){var n="秒后重试";clearInterval(a);var a=setInterval(function(){t.time--,t.time==-1?(clearInterval(a),e.val("点击获取").attr("disabled",!0)):e.val(t.time+n).attr("disabled",!0)},1e3)},t=function(t,n){return n.phone?void e(t,n):($("#msg h4").html("手机号码填写错误"),void $("#msg").dialog("open"))};$.fn.counter=function(e){var n=$.extend({value:"点击获取",disabled:!1,time:60,phone:void 0,verifyUrl:""},e);return this.each(function(){var e=$(this);t(e,n),console.trace(e)})}});