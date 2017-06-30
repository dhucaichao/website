<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp\www\tp5\public/../application/home\view\index\default.html";i:1498834087;}*/ ?>
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
    <div class="header-con-fixed"></div>
    <div class="header-con">
        <div class="logo">
            <h1><img src="/static/index/picture/logo.png" width='360px' height='60px'></h1>
        </div>
        <div class="header-logo">
        <div class="widthfix center">
        <div class="header ">
            <ul class="pc-nav clearfix">
                <li class="zt"><a class="active" href="/">首页</a></li>
                <li class="tl"><a href="./bibliotheca.php?page=1">书库</a></li>
                <li class="gx"><a href="./rankinglist.php">排行榜</a></li>
                <li class="gx"><a href="./apotheosize.php">个人中心</a></li>

                <li class="gx"><a href="./copyright.php">评论专区</a></li>

                <li class="gx"><a href="./dimensions.php">充值中心</a></li>
        
                <li class="gx"><a href="./authorwelfare.php">免费小说</a></li>
                <li class="zs"><a href="./bookshelf.php">书架</a></li>
                <li class="zs"><a onClick="PV('作者专区');" href="http://yc.aliwx.com.cn/#/login" target="_blank">作者专区</a></li>
            </ul>


        </div>

            <div class="user-login-info" lmk="login" lmv="登录">
                <div id="loginCon">

                </div>

                <?php if($logined == '1'): ?>
                <div class="u-lgn" id="login-link" lmk="login-btn" lmv="登录按钮" urltrue="true" lmurl="#" onclick="aa()" style="display:block;width:100px">
                    <span class="glyphicon glyphicon-user iconfont">&#xe65a;</span>
                    <span>登录</span>
                </div>

                <!---------------------登录---------------->
                <div id="login" class="ui-widget" style="position: fixed;height: 420px;width: 800px;top: 51px;left: 219.5px;z-index: 101;display: none; background-color: #fff;">
                    <div class="logininput">
                        <h1 class="logo">
                            <img src="/static/index/picture/logo.png" width='360px' height='60px'>
                            <div style="position:relative; top:-37px; right:-300px"><a href="<?php echo url('index/index'); ?>" >返回>></a></div>
                        </h1>
                        <form>
                            <div class="loginname">
                                <input type="text" name="tel" placeholder="请输入用户名" value="" id="tel">
                            </div>
                            <div class="loginpwd">
                                <input type="password" name="pwd" class="userPassword" placeholder="请输入密码" id="pwd">
                            </div>

                            <div class="logincheckPic">
                                <input type="text" class="userCheckPic" id="yzm" placeholder="请输入验证码" style="float: left;width:280px" name="yzm">
                                <div style="float: right;"><img src="<?php echo captcha_src(); ?>" alt="captcha" width="70" height="35"  onclick="refreshVerify()" id="verify_img" /><a href="javascript:refreshVerify()"></a></div>
                            </div>
                        </form>
                        <button class="ant-btn ant-btn-primary ant-btn-lg ant-button-sq">
                            <span>登 录</span>
                        </button>
                        <div class="register">
                            <a href="<?php echo url('index/sign'); ?>">注册账号</a><i>|</i>
                            <a href="http://t.shuqi.com/?shuqi_h5=108#!/ct/forgetpassword">忘记密码?</a>
                        </div>
                    </div>
                </div>


                <!-----------------------登录-------------->
                <div id="loginedTemp" style="display:none">
                    <div class="u-nickname" id="nickname-link">
                        <a class="ellipse"></a>
                        <ul class="nickname-list" id="ccc" display="none">
                            <li><a href="./userCenter.php"><span class="glyphicon glyphicon-user"></span>个人中心</a></li>
                            <li id="loginOut"><a href="<?php echo url('index/loginout'); ?>"><span class="glyphicon"></span>&nbsp;&nbsp;退&nbsp;&nbsp;&nbsp;出</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php else: ?>
                <div class="u-lgn" id="login-link" lmk="login-btn" lmv="登录按钮" urltrue="true" lmurl="#" onclick="aa()" style="display:none;width:100px">
                    <span class="glyphicon glyphicon-user iconfont">&#xe65a;</span>
                    <span>登录</span>
                </div>

                <!---------------------登录---------------->
                <div id="login" class="ui-widget" style="position: fixed;height: 420px;width: 800px;top: 51px;left: 219.5px;z-index: 101;display: none; background-color: #fff;">
                    <div class="logininput">
                        <h1 class="logo">
                            <img src="/static/index/picture/logo.png" width='360px' height='60px'>
                            <div style="position:relative; top:-37px; right:-300px"><a href="<?php echo url('index/index'); ?>" >返回>></a></div>
                        </h1>
                        <form>
                            <div class="loginname">
                                <input type="text" name="tel" placeholder="请输入用户名" value="" id="tel">
                            </div>
                            <div class="loginpwd">
                                <input type="password" name="pwd" class="userPassword" placeholder="请输入密码" id="pwd">
                            </div>

                            <div class="logincheckPic">
                                <input type="text" class="userCheckPic" id="yzm" placeholder="请输入验证码" style="float: left;width:280px" name="yzm">
                                <div style="float: right;"><img src="<?php echo captcha_src(); ?>" alt="captcha" width="70" height="35"  onclick="refreshVerify()" id="verify_img" /><a href="javascript:refreshVerify()"></a></div>
                            </div>
                        </form>
                        <button class="ant-btn ant-btn-primary ant-btn-lg ant-button-sq">
                            <span>登 录</span>
                        </button>
                        <div class="register">
                            <a href="<?php echo url('index/sign'); ?>">注册账号</a><i>|</i>
                            <a href="http://t.shuqi.com/?shuqi_h5=108#!/ct/forgetpassword">忘记密码?</a>
                        </div>
                    </div>
                </div>


                <!-----------------------登录-------------->
                <div id="loginedTemp" style="display:block">
                    <div class="u-nickname" id="nickname-link">
                        <a class="ellipse"><?php echo $name; ?></a>
                        <ul class="nickname-list" id="ccc" display="none">
                            <li><a href="./userCenter.php"><span class="glyphicon glyphicon-user"></span>个人中心</a></li>
                            <li id="loginOut"><a href="<?php echo url('index/loginout'); ?>"><span class="glyphicon"></span>&nbsp;&nbsp;退&nbsp;&nbsp;&nbsp;出</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>

                <span class="secah-box glyphicon glyphicon-search iconfont" id="search_box_btn">&#xe620;
                </span>
            </div>

        </div>
        </div>
        <div class="secah-con">
                <div class="secahdiv">
                     <input id="js_searchInput_common" type="text" class="search_input width-search" value="" maxlength="20" placeholder="搜索书名/关键字" autocomplete="off" >
                      <input id="js_search_common" type="button" class="query-btn" lmk="search" lmv="搜索" urltrue="true" lmurl="#">
                </div>
            </div>

    </div>

    <!--轮播图-->
    <div class="carrousel" id="banner">
        <div id="myCarousel" class="carousel slide" style="padding-top:100px">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0;$__LIST__ = is_array($list) ? array_slice($list,1,null, true) : $list->slice(1,null, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $k; ?>"></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner" style="width:600px;margin:auto">
                <div class="item active" style="width:600px;margin:auto">
                    <img src="<?php echo $list[0]['image']; ?>">
                </div>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($list) ? array_slice($list,1,null, true) : $list->slice(1,null, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <div class="item" style="width:600px;margin:auto">
                    <img src="<?php echo $v['image']; ?>">
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control left" href="#myCarousel"
               data-slide="prev">&lsaquo;
            </a>
            <a class="carousel-control right" href="#myCarousel"
               data-slide="next">&rsaquo;
            </a>
        </div>
    </div>
    <!--轮播图-->


    <!--排行榜-->

    <div class="pcbox">
        <div class="channel clearfix">
            <div class="channelbox" id="manbd">
                <div class="chatitle">
                    <h2>男频榜单</h2>
                </div>
                <ul class="chalistbox" lmk="indexnpbd" lmv="男频榜单">
                    <?php if(is_array($list1) || $list1 instanceof \think\Collection || $list1 instanceof \think\Paginator): $k = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                    <li class="clearfix" lmk="indexnpbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=12503">
                            <em class="chan"><?php echo $k; ?>.</em>
                            <img src="<?php echo $v['face']; ?>" alt="">
                            <h3><?php echo $v['k']; ?></h3>
                            <p>
                                <?php echo $v['penname']; ?>/
                                <?php echo $v['name']; ?>
                            </p>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
                <div class="chamove hide">
                    <a href="#">更多&gt;</a>
                </div>
            </div>
            <div class="channelbox" id="wombd">
                <div class="chatitle">
                    <h2>女频榜单</h2>
                </div>
                <ul class="chalistbox" lmk="indexgpbd" lmv="女频榜单">

                    <li class="clearfix" lmk="indexgpbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=12243">
                            <em class="chan">1.</em>
                            <img src="http://img-tailor.11222.cn/ognv/cover/raw/2016041517135485.jpg" alt="">
                            <h3>婚战</h3>
                            <p>
                                紫衣/
                                现代言情
                            </p>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexgpbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=13575">
                            <em class="chan">2.</em>
                            <img src="http://img-tailor.11222.cn/ognv/cover/raw/1479908172519990.jpg" alt="">
                            <h3>花娘游戏</h3>
                            <p>
                                苏三/
                                古代言情
                            </p>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexgpbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=12442">
                            <em class="chan">3.</em>
                            <img src="http://img-tailor.11222.cn/ognv/cover/raw/2016062215061524.jpg" alt="">
                            <h3>御极</h3>
                            <p>
                                阿幂/
                                古代言情
                            </p>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexgpbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=13854">
                            <em class="chan">4.</em>
                            <img src="http://img-tailor.11222.cn/ognv/cover/raw/1483012253168764.jpg" alt="">
                            <h3>遇见你的旧时光</h3>
                            <p>
                                落清/
                                现代言情
                            </p>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexgpbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=13939">
                            <em class="chan">5.</em>
                            <img src="http://img-tailor.11222.cn/ognv/cover/raw/1483509558322466.jpg" alt="">
                            <h3>十家锅灶九不同</h3>
                            <p>
                                宁余心/
                                现代言情
                            </p>
                        </a>
                    </li>

                </ul>
                <div class="chamove hide">
                    <a href="#">更多&gt;</a>
                </div>
            </div>
            <div class="channelbox" id="typebd">
                <div class="chatitle">
                    <h2>分类推荐榜</h2>
                </div>
                <ul class="chalistbox" lmk="indexflbd" lmv="分类推荐榜">

                    <li class="clearfix" lmk="indexflbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=12343">
                            <em class="chan">1.</em>
                            <img src="http://img-tailor.11222.cn/ognv/cover/raw/2016060314532995.jpg" alt="">
                            <h3>鬼墓之门</h3>
                            <p>
                                九福/
                                悬疑
                            </p>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexflbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=12183">
                            <em class="chan">2.</em>
                            <img src="http://img-tailor.11222.cn/ognv/cover/raw/2016051210271064.jpg" alt="">
                            <h3>民国御邪记</h3>
                            <p>
                                萧鸣易/
                                悬疑
                            </p>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexflbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=12213">
                            <em class="chan">3.</em>
                            <img src="http://img-tailor.11222.cn/ognv/cover/raw/2016061610595041.jpg" alt="">
                            <h3>黄泉手札</h3>
                            <p>
                                轩辕唐唐/
                                悬疑
                            </p>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexflbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=12279">
                            <em class="chan">4.</em>
                            <img src="http://img-tailor.11222.cn/ognv/cover/raw/2016050811360766.jpg" alt="">
                            <h3>特囧狂龙</h3>
                            <p>
                                墨雨/
                                都市
                            </p>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexflbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=12215">
                            <em class="chan">5.</em>
                            <img src="http://img-tailor.11222.cn/ognv/cover/raw/2016030817543153.jpg" alt="">
                            <h3>焚天记</h3>
                            <p>
                                悠然独醉/
                                玄幻
                            </p>
                        </a>
                    </li>

                </ul>
                <div class="chamove hide">
                    <a href="#">更多&gt;</a>
                </div>
            </div>
            <div class="channelbox wbox" id="zuibd">
                <div class="chatitle">
                    <h2>强力推荐榜</h2>
                </div>
                <ul class="chalastbox" lmk="indexqlbd" lmv="强力推荐榜">

                    <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=15592">
                            <em class="chan">1.</em>
                            <h3 class="lasth3">可曾情深不寿</h3>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=14607">
                            <em class="chan">2.</em>
                            <h3 class="lasth3">深情缓爱，向暖花...</h3>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=15368">
                            <em class="chan">3.</em>
                            <h3 class="lasth3">却道海棠依旧</h3>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=12375">
                            <em class="chan">4.</em>
                            <h3 class="lasth3">我的君子</h3>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=14935">
                            <em class="chan">5.</em>
                            <h3 class="lasth3">幸为奉旸侯</h3>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=14670">
                            <em class="chan">6.</em>
                            <h3 class="lasth3">锦玉满棠</h3>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=15616">
                            <em class="chan">7.</em>
                            <h3 class="lasth3">一朵小姐压海棠</h3>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=12800">
                            <em class="chan">8.</em>
                            <h3 class="lasth3">飞枝记</h3>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=15063">
                            <em class="chan">9.</em>
                            <h3 class="lasth3">暖色仙人掌</h3>
                        </a>
                    </li>

                    <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=13851">
                            <em class="chan">10.</em>
                            <h3 class="lasth3">琉璃似锦</h3>
                        </a>
                    </li>

                </ul>
                <div class="chamove hide">
                    <a href="#">更多&gt;</a>
                </div>
            </div>
        </div>
    </div>
    <!--排行榜-->



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