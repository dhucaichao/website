<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"D:\wamp\www\tp5\public/../application/admin\view\index\index.html";i:1498121735;s:64:"D:\wamp\www\tp5\public/../application/admin\view\public\top.html";i:1499066421;s:65:"D:\wamp\www\tp5\public/../application/admin\view\public\left.html";i:1499090306;s:65:"D:\wamp\www\tp5\public/../application/admin\view\public\foot.html";i:1499089983;}*/ ?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>
    <script src="./jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="/static/admin/css/pintuer.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <script src="/static/admin/js/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="/static/admin/images/y.jpg" class="radius-circle rotate-hover" height="50" alt=""/>后台管理中心</h1>
    </div>
    <div class="head-l">
        <a class="button button-little bg-green" href="<?php echo url('home/index/index'); ?>" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="<?php echo url('index/clear'); ?>" class="button button-little bg-blue"><span class="icon-wrench"></span>清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo url('login/logout'); ?>"><span class="icon-power-off"></span> 退出登录</a>
    </div>
    <div style="float: right;margin-right:30px;color:white;line-height:70px;font-size:20px">欢迎您: <span style="font-size:30px;color:red"><?php echo $name; ?></span>管理员</div>
</div>
<div class="leftnav">
    <div class="leftnav-title">
        <strong><span class="icon-list"></span>菜单列表</strong>
    </div>
    <h2>用户管理</h2>
    <ul style="display:none">
        <li><a href="<?php echo url('user/index'); ?>" target="right">用户管理</a></li>
        <li><a href="<?php echo url('user/create'); ?>" target="right">用户添加</a></li>
    </ul>
    <!-- 用户管理模块结束 -->

    <!-- 作者管理功能模块 -->
    <h2> 作者管理 </h2>
    <ul>
        <li><a href="<?php echo url('author/index'); ?>" target="right">已注册作者列表</a></li>
        <li><a href="<?php echo url('author/create'); ?>" target="right">新添作者</a></li>
        <!-- 作者管理功能模块结束 -->
    </ul>

    <!-- 书籍管理功能模块 -->
    <h2> 书籍管理 </h2>
    <ul>
        <li><a href="<?php echo url('novel/index'); ?>" target="right">书籍列表</a></li>
        <li><a href="<?php echo url('novel/create'); ?>" target="right">添加书籍</a></li>
    </ul>
    <!-- 书籍管理功能模块结束 -->



    <!-- 分类管理开始 -->
    <h2> 分类管理 </h2>
    <ul>
        <li><a href="<?php echo url('category/index'); ?>" target="right">分类列表</a></li>
        <li><a href="<?php echo url('category/create1'); ?>" target="right">新增一级分类</a></li>
        <li><a href="<?php echo url('category/create'); ?>" target="right">新增多级分类</a></li>
    </ul>

    <h2> 轮播图管理 </h2>
    <ul>
        <li><a href="<?php echo url('banner/index'); ?>" target="right">轮播图列表</a></li>
        <li><a href="<?php echo url('banner/create'); ?>" target="right">添加轮播图</a></li>
    </ul>

    <h2> 小说章节管理 </h2>
    <ul>
        <li><a href="<?php echo url('chapter/index'); ?>" target="right">章节列表</a></li>
    </ul>
    <!-- 分类管理结束 -->


    <h2> 评论管理 </h2>
    <ul>
        <li><a href="<?php echo url('comment/index'); ?>" target="right">评论列表</a></li>
    </ul>

    <h2> 友情链接管理 </h2>
    <ul>
        <li><a href="<?php echo url('link/index'); ?>" target="right">链接列表</a></li>
        <li><a href="<?php echo url('link/create'); ?>" target="right">添加链接</a></li>
    </ul>
    <!--  <script>
     // 展开效果
     $(function(){
         // 进入页面 第一个默认是展开的
         $('#leftnav ul:eq(0)').show();

         //绑定H3点击事件
         $('#leftnav h3').click(function(){
             // 展开对应的下一个ul元素
             $(this).next('ul').slideDown().siblings('ul').slideUp();
         });

     })
     </script> -->

    <script type="text/javascript">
        $(function(){
            $(".leftnav h3").click(function(){
                $(this).next().slideToggle(200);
                $(this).toggleClass("on");
            })
            $(".leftnav ul li a").click(function(){
                $("#a_leader_txt").text($(this).text());
                $(".leftnav ul li a").removeClass("on");
                $(this).addClass("on");
            })
            // $(".leftnav .manage").click(function(){
            //     $(this).next().slideToggle(200);
            //     $(this).toggleClass("on");
            // })
            // $(".leftnav .manage li a").click(function(){
            //       $("#a_leader_txt").text($(this).text());
            //       $(".leftnav .manage li a").removeClass("on");
            //       $(this).addClass("on");
            // })
        });
    </script>

    <!-- 其他功能模块 -->
    <h2><span class="icon-pencil-square-o"></span>其  他</h2>
    <ul>
        <li><a href="list.html" target="right">内容管理</a></li>
        <li><a href="add.html" target="right">添加内容</a></li>
        <li><a href="cate.html" target="right">分类管理</a></li>
    </ul>
    <!-- 其他功能模块结束 -->
</div>

<script type="text/javascript">
    $(function(){
        $(".leftnav h2").click(function(){
            $(this).next().slideToggle(200);
            $(this).toggleClass("on");
        })
        $(".leftnav ul li a").click(function(){
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
    });
</script>
<ul class="bread">
    <li><a href="" target="right" class="icon-home"> 首页</a></li>
    <li><a href="##" id="a_leader_txt">网站信息</a></li>
    <li><b>当前语言：</b><span style="color:red;">中文</php></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：
        <a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a></li>
</ul>


<div class="admin" style="padding:0px; margin:0px;" >
    <iframe scrolling="no" rameborder="0" src="" name="right" width="100%" height="100%" >
    </iframe>
</div><div style="text-align:center;">
    <p>
        来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a>
    </p>
</div>
</body>
</html>