<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\wamp\www\tp5\public/../application/home\view\noveldir\index.html";i:1499093362;s:66:"D:\wamp\www\tp5\public/../application/home\view\index\default.html";i:1499091565;}*/ ?>
﻿
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>霜之哀伤文学</title>
    <meta name="keywords" content="霜之哀伤文学，小说，小说网,言情小说,青春小说,玄幻小说,武侠小说,都市小说,历史小说,网络小说,小说下载，原创网络文学,畅销图书,精品图书,传统出版,电子书，原创文学" />
     <meta name="description" content="霜之哀伤文学提供免费小说,热门小说,精品小说,好看小说,小说连载,小说排行榜,小说在线阅读,小说下载,尽请浏览霜之哀伤文学各种玄幻小说,都市小说,言情小说,穿越小说,青春小说,武侠小说,历史小说,军事小说,科幻小说,灵异小说,游戏小说,竞技小说,同人小说,2016全新登场,手机下载阅读,电子书,效果更佳" />
    <link rel="shortcut icon" href="/static/index/images/9dfedc665fe4d4a759d61106128d1cec.jpg" type="image/x-icon">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--<link rel="stylesheet" type="text/css" href="css/style-c4460f1fb4.css">-->
    <!--<link rel="stylesheet" type="text/css" href="iconfont/iconfont.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/static/admin/css/bootstrap.min.css" />-->
    
    <link rel="stylesheet" type="text/css" href="/static/index/css/style-c4460f1fb4.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/iconfont/iconfont.css" />
    
</head>
<body class="topline">

<div class="logo">
    <h1><img src="/static/index/picture/logo.png" width='360px' height='60px'></h1>
</div>
<div class="header" style="margin-left:10%">
    <ul class="pc-nav clearfix">
        <li class="zt"><a class="active" href="<?php echo url('index/index'); ?>">首页</a></li>
        <li class="tl"><a href="<?php echo url('novellist/index'); ?>">书库</a></li>
        <li class="gx"><a href="./rankinglist.php">排行榜</a></li>
        <li class="gx"><a href="./apotheosize.php">个人中心</a></li>

        <li class="gx"><a href="./copyright.php">评论专区</a></li>

        <li class="gx"><a href="./dimensions.php">充值中心</a></li>

        <li class="gx"><a href="./authorwelfare.php">免费小说</a></li>
        <li class="zs"><a href="./bookshelf.php">书架</a></li>
        <li class="zs"><a onClick="PV('作者专区');" href="http://yc.aliwx.com.cn/#/login" target="_blank">作者专区</a></li>
    </ul>
</div>

<div class="contetline">
    <div class="content">
        <div class="cover-nav">
            <p>&gt; <a class="booktitle" href="<?php echo url('noveldetails/ndindex',['id'=>$nid]); ?>"><?php echo $nn; ?></a> &gt; <span>所有章节</span></p>
        </div>
        <div class="bookMeta">
            <h3 class="chatit"><?php echo $nn; ?></h3>
            <p class="chaauto"><?php echo $au; ?></p>
        </div>
        <dl class="zjlistdl">
            <dt><a class="descsort" id="js_sort" href="javascript:;"></a></dt>
        </dl>
        <ul class="chapterul clearfix" id="chapterlists">
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;if($k < '2'): ?>
            <li><a target="_blank" href="<?php echo url('novelcontent/index',['tnum'=>$v['tnum'],'nid'=>$nid,'nn'=>$nn,'au'=>$au,'id'=>$nid]); ?>">第<?php echo $v['tnum']; ?>章：<?php echo $v['title']; ?></a></li>
            <?php endif; endforeach; endif; else: echo "" ;endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;if($k > '1'): ?>
            <li class="vipjump"><a target="_blank" href="<?php echo url('novelcontent/index',['tnum'=>$v['tnum'],'nid'=>$nid,'nn'=>$nn,'au'=>$au,'id'=>$nid]); ?>">第<?php echo $v['tnum']; ?>章：<?php echo $v['title']; ?></a><i class="chapter-vip"></i></li>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>


    <div class="footer">
        <div class="footbox">
            <div class="footbox-info clearfix">
                <div class="left">
                    <a href="./about.php">关于我们</a><i>|</i><a href="./contact.php">联系我们</a><i>|</i><a href="./contribute.php">投稿声明</a><i>|</i><a href="./copyinfo.php">版权声明</a>
                </div>
                <div class="right">广州霜之哀伤文学信息技术有限公司&nbsp;&nbsp;&nbsp;&nbsp;版权所有</div>

            </div>

            <!-- <p class="footer-p">广州阿里巴巴文学信息技术有限公司&nbsp;&nbsp;&nbsp;&nbsp;版权所有</p> -->
            <div class="footbox-info footbox-p clearfix">
                <div class="left">为保证更好的浏览效果，请使用IE9以上或其他主流浏览器访问</div>
                <div class=" right">
                    <a href="http://www.miitbeian.gov.cn/" target="_blank">粤ICP备13078413号-6&nbsp;&nbsp;</a>
                    <span>增值电信业务许可证&nbsp;&nbsp;&nbsp;&nbsp;粤B2-20130742</span>
                    <span>网络文化经营许可证&nbsp;&nbsp;&nbsp;&nbsp;粤网文[2014]0424-124号</span>
                </div>
            </div>

        </div>
    </div>

    <script>
        function aa() {
            var login = document.getElementById('login');
            login.style.display = 'block';
        }
        function refreshVerify() {
            var ts = Date.parse(new Date())/1000;
            $('#verify_img').attr("src", "/captcha?id="+ts);
        }
    </script>


    <script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/index/js/jq-c0eb42550f.1.11.min.js"></script>
    <script type="text/javascript" src="/static/index/js/jquery-546c1da987.lazyload.min.js"></script>
    <script type="text/javascript" src="/static/index/js/jquery-ui-019252536e.js"></script>
    <script type="text/javascript" src="/static/index/js/md5-d090c8bf51.js"></script>
    <script type="text/javascript" src="/static/index/js/underscore-min-a94321f207.js"></script>
    <script type="text/javascript" src="/static/index/js/fingerprint2-81a8ae0bd8.min.js"></script>
    <script type="text/javascript" src="/static/index/js/wa-900d0de307.js"></script>
    <script type="text/javascript" src="/static/index/js/common-0a23c8c6c8.js"></script>
    <!--<script type="text/javascript" src="/static/index/js/login-0a1f55f637.js"></script>-->
    <script type="text/javascript" src="/static/index/js/jquery-f2528ce963.page.js"></script>
    <script type="text/javascript" src="/static/index/js/index-ae8c6f6dd0.js"></script>    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259530409'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1259530409' type='text/javascript'%3E%3C/script%3E"));</script>
    <script>
        //            messageAlert("warning", "请输入手机号！");
        $(function () {
            $('button').click(function () {
                var tel = $('input[name=tel]').val();
                var pwd = $('input[name=pwd]').val();
                var yzm = $('input[name=yzm]').val();
                if (tel == ''){
                    $('input[name=tel]').focus();
                    return messageAlert("warning", "用户名不能为空");
                }
                if (pwd == '') {
                    $('input[name=pwd]').focus();

                    return messageAlert("warning", "密码不能为空");
                }
                if (yzm == '') {
                    $('input[name=yzm]').focus();
                    return messageAlert("warning", "请输入验证码");
                }
                $.ajax({
                    type: 'post',
                    url: '/home/index/login',
                    data: {'tel': tel,'pwd': pwd,'yzm': yzm},
                    dateType:'json',
                    success: function (data) {
                        if (data['status'] == 1){
                            $('input[name=tel]').focus();
                            return messageAlert("warning", data['error']);
                        }
                        if (data['status'] == 2){
                            $('input[name=pwd]').focus();
                            return messageAlert("warning", data['error']);
                        }
                        if (data['status'] == 3){
                            $('input[name=yzm]').focus();
                            return messageAlert("warning", data['error']);
                        }
                        if (data['status'] == 4){
                            console.log($('#login-link'));
                            document.getElementById('login-link').style.display='none';
                            document.getElementById('loginedTemp').style.display='block';
                            document.getElementById('login').style.display='none';
                            $('#nickname-link .ellipse').html(data['name']);
                        }
                    },
                    error: function(){
                        console.log(1);
                    }
                })
            })

            $('.ellipse').mouseover(function(){
                var a = document.getElementById('ccc').style;
                if (a.display == 'block'){
                    a.display = 'none';
                } else {
                    a.display = 'block';
                }
            })
        })

    </script>
    
</body>

</html>