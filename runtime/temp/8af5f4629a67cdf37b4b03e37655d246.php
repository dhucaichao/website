<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"E:\wamp\www\newicefire\tp5\public/../application/writer\view\index\writer-registe.html";i:1498621101;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0041)http://yc.aliwx.com.cn/#/signup?_k=g5e399 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/static/writer/css/index-2017051107-z.css">
    <title>霜之哀伤创作平台</title>
    <link rel="stylesheet" type="text/css" href="/static/writer/css/UBXCMkzNVlaZYNs-z.css">
    <style>

        .tjzc{
            margin: 25px 0;
            width: 357px;
            height: 50px;
            background: rgb(36,41,46);
            color: white;
        }
        .loginbox{
            overflow: hidden;
            height: 540px;
        }
        .signUpPage .loginbox{
            height: 540px;
        }
        .imgyzm{
            margin:0px -87px;
        }
    </style>
</head>

<body>

<div id="root">
    <div data-reactroot="" class="signUpPage">
        <div class="wrapper">
            <div class="loginwrap">
                <div class="loginbox">
                    <div>
                        <div class="entrance" style="opacity: 1; visibility: visible; transform: translateX(0px);">
                            <a class="" href="<?php echo url('index/index'); ?>">返回&gt;&gt;</a>
                        </div>
                        <div class="logininput" style="opacity: 1; visibility: visible; transform: translateX(0px);">
                            <h1 class="logo"><img src="/static/writer/images/1497946000_994076.png" ></h1>
                            <div class="uniqueVerify">
                                <form class="" action="<?php echo url('index/submitregiste'); ?>" method='post' >
                                    <div class="ant-row ant-form-item">
                                        <div class="ant-col-5 ant-form-item-label">
                                            <label class="">账&nbsp;&nbsp;&nbsp;&nbsp;号</label>
                                        </div>
                                        <div class="ant-col-12">
                                            <div class="ant-form-item-control ">
                                                <input class="phoneVerifyStyle" placeholder="请输入用户名" id="validating" name="penname">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="yzcode">
                                <label>验证码：</label>
                                <!-- <input type="text" placeholder="请输入验证码" style="display: none;"> -->
                                <input type="text" placeholder="请输入验证码" name="yzm">
                                <div class="couterDiv">
                                    <div class="imgyzm"><img id="verify_img" src="<?php echo captcha_src(); ?>" alt="验证码" onclick="refreshVerify()">
                                        <a href="javascript:refreshVerify()">点击刷新</a></div>
                                </div>
                            </div>
                            <div class="zcpwd mrgT">
                                <label>密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
                                <input type="password" class="showCodeInput" placeholder="请输入密码" name="pwd">
                                <!-- <i class="anticon anticon-eye-o"></i> -->
                            </div>
                            <div class="remember mrgT">
                                <label class="ant-checkbox-wrapper">
                                        <span class="ant-checkbox">
                                            <!-- <span class="ant-checkbox-inner"></span> -->
                                            <input type="checkbox" class="" checked name="checkbox">
                                        </span>
                                    <span>
                                            <span>我已阅读<a>霜之哀伤账号服务协议</a></span>
                                        </span>
                                </label>
                            </div>

                            <input type="submit" value='提交注册' class='tjzc'>
                            </form>
                            <div style="color:red"><?php echo $error; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/static/writer/js/jquery-1.8.3.min.js"></script>
<script>
    function refreshVerify() {
        var ts = Date.parse(new Date())/1000;
        $('#verify_img').attr("src", "/captcha?id="+ts);
    }

</script>


</body>
</html>