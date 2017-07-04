<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"E:\wamp\www\newicefire\tp5\public/../application/writer\view\index\writer-login.html";i:1499122241;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0040)http://yc.aliwx.com.cn/#/login?_k=nkws9l -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/static/writer/css/index-2017051107.css">
    <title>霜之哀伤</title>
    <link rel="icon" href="" mce_href="./favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="" mce_href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/static/writer/css/UBXCMkzNVlaZYNs.css">

    <style>
        @font-face {
            font-family: 'icomoon';
            src: url('fonts/icomoon.eot?w4vf6g');
            src: url('fonts/icomoon.eot?w4vf6g#iefix') format('embedded-opentype'), url('fonts/icomoon.ttf?w4vf6g') format('truetype'), url('fonts/icomoon.woff?w4vf6g') format('woff'), url('fonts/icomoon.svg?w4vf6g#icomoon') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'icomoon';
            src: url('./iconfont/iconfont.eot?w4vf6g');
            src: url('./iconfont/iconfont.eot?w4vf6g#iefix') format('embedded-opentype'), url('./iconfont/iconfont.ttf?w4vf6g') format('truetype'), url('./iconfont/iconfont.woff?w4vf6g') format('woff'), url('./iconfont/iconfont.svg?w4vf6g#icomoon') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        .error{
            color:red;
        }
        #imgyzm{
            width: 107px;
            height: 41px;
            /*border: 1px solid red;*/
            margin:0px 270px;
        }
    </style>
</head>

<body>

<div id="root">
    <div data-reactroot="" class="loginPage">
        <div class="wrapper">
            <div class="loginwrap">
                <div>
                    <div class="loginbox clearfix" style="opacity: 1; visibility: visible; transform: translateX(0px);">
                        <div>
                            <div class="loginleft fl"
                                 style="opacity: 1; visibility: visible; transform: translateX(0px);"><img
                                    src="/static/writer/images/937de774e92e6aeed03ec7ce475149f9.png"></div>
                            <div class="loginright fr"
                                 style="opacity: 1; visibility: visible; transform: translateX(0px);">
                                <div class="entrance"><a href="<?php echo url('home/index/index'); ?>" target="_blank">PC站入口&gt;&gt;</a>
                                </div>
                                <div class="logininput"><h1 class="logo"><img
                                        src="">
                                </h1>

                                    <form action="<?php echo url('index/writerlogin'); ?>" method="post">
                                        <div class="loginname"><input type="text" required class="userInput"
                                                                      placeholder="请输入用户名" name="penname">
                                        </div>
                                        <div class="loginpwd"><input type="password" required class="userPassword" name="pwd"
                                                                     placeholder="请输入密码"><i
                                                class="anticon anticon-eye-o"></i></div>
                                        <div id="vCodeContent">


                                            <!--验证码-->
                                            <div class="loginverify">
                                                <input placeholder="请输入验证码" type="text" name="yzm" required>
                                                <div><img id="verify_img" src="<?php echo captcha_src(); ?>" alt="验证码" onclick="refreshVerify()">
                                                    <a href="javascript:refreshVerify()">点击刷新</a></div>
                                            </div>


                                        </div>
                                        <div class="remember"><label class="checkbox-re ant-checkbox-wrapper"><span
                                                class="ant-checkbox"><input
                                                type=""
                                                class=""></span><span></span></label>
                                        </div>
                                        <button type="submit" class="ant-btn ant-btn-primary ant-btn-lg loginbtn">
                                            <span>登 陆</span></button>

                                    </form>

                                    <div><spqn class="error"><?php echo $error; ?></spqn></div>
                                    <div class="register">
                                        <a href="<?php echo url('Index/writerregiste'); ?>">注册账号</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="color: rgb(55,186,245);font-size: 18px"></div>
                </div>
            </div>

            <div class="bottomTextOuter___Vf6Bt">
                <div class="bottomText___1GSrB"><span></span><!-- react-text: 9 -->&nbsp;&nbsp;&nbsp;
                    <!-- /react-text --><span><a href="">关于我们</a></span>
                    <!-- react-text: 12 -->&nbsp;&nbsp;&nbsp;<!-- /react-text --><span>|</span><!-- react-text: 14 -->
                    &nbsp;&nbsp;&nbsp;
                    <!-- /react-text --><span><a href="">投稿声明</a></span>
                    <!-- react-text: 17 -->&nbsp;&nbsp;&nbsp;<!-- /react-text --><span>|</span><!-- react-text: 19 -->
                    &nbsp;&nbsp;&nbsp;
                    <!-- /react-text --><span><a href="">版权声明</a></span>
                    <!-- react-text: 22 -->&nbsp;&nbsp;&nbsp;<!-- /react-text --><span>|</span><!-- react-text: 24 -->
                    &nbsp;&nbsp;&nbsp;
                    <!-- /react-text --><span><a href="">联系我们</a></span></div>
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
    <!--<script src="/static/writer/js/imgyzm.js"></script>-->
    <!--<script src="./原创创作平台_files/index-2017051107.js"></script>-->

</body>
</html>