<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp\www\tp5\public/../application/home\view\index\default.html";i:1498208276;}*/ ?>
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
    <!--<link rel="stylesheet" type="text/css" href="css/style-c4460f1fb4.css">-->
    <!--<link rel="stylesheet" type="text/css" href="iconfont/iconfont.css">-->

    
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
                <div class="u-lgn" id="login-link" lmk="login-btn" lmv="登录按钮" urltrue="true" lmurl="#" onclick="aa()">
                    <span class="glyphicon glyphicon-user iconfont">&#xe65a;</span>
                    <span>登录</span>
                </div>

                <!---------------------登录---------------->
                <div id="login" class="ui-widget" style="position: fixed;height: auto;width: 800px;top: 51px;left: 219.5px;display: block;z-index: 101;display: none; background-color: #fff;">
                    <div class="logininput">
                        <h1 class="logo">
                            <img src="/static/index/picture/logo.png" width='360px' height='60px'>
                            <div style="position:relative; top:-37px; right:-300px"><a href="{index/index}" >返回>></a></div>
                        </h1>
                        <form action="/home/index/login" method="post">
                            <div class="loginname">
                                <input type="text" name="nickname" placeholder="请输入用户名" value="">
                            </div>
                            <div class="loginpwd">
                                <input type="password" name="'pwd" class="userPassword" placeholder="请输入密码">
                            </div>

                            <div class="logincheckPic">
                                <input type="text" class="userCheckPic" placeholder="请输入验证码" style="float: left;width:280px" name="yzm">
                                <div style="float: right;"><img src="<?php echo captcha_src(); ?>" alt="captcha" width="70" height="35"  onclick="refreshVerify()" id="verify_img" /><a href="javascript:refreshVerify()"></a></div>
                            </div>
                            <div class="remember">
                                <label class="checkbox-re ant-checkbox-wrapper" style="float: left;">
                                            <span class="ant-checkbox">
                                                <span class="ant-checkbox-inner"></span>
                                                <input type="checkbox" class="ant-checkbox-input" value="on">
                                            </span>
                                    <span>记住密码</span>
                                </label>
                            </div>
                            <button class="ant-btn ant-btn-primary ant-btn-lg ant-button-sq ">
                                <span>登 录</span>
                            </button>
                            <div class="register">
                                <a href="<?php echo url('index/sign'); ?>">注册账号</a><i>|</i>
                                <a href="http://t.shuqi.com/?shuqi_h5=108#!/ct/forgetpassword">忘记密码?</a>
                            </div>
                        </form>
                    </div>
                </div>


                <!-----------------------登录-------------->
                <script type="text/template" id="loginedTemp">
                    <div class="u-nickname" id="nickname-link">
                        <a class="ellipse" title="<%-nickname%>"><%-nickname%></a>
                        <ul class="nickname-list">
                            <li><a href="./userCenter.php"><span class="glyphicon glyphicon-user"></span>个人中心</a></li>
                            <li id="loginOut"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;登&nbsp;&nbsp;&nbsp;出
                            </li>
                        </ul>
                    </div>
                </script>

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

    

    
    <div class="carrousel" id="banner"></div>
    <div class="pcbox">
        <div class="channel clearfix">
            <div class="channelbox" id="manbd"></div>
            <div class="channelbox" id="wombd"></div>
            <div class="channelbox" id="typebd"></div>
            <div class="channelbox wbox" id="zuibd"></div>
        </div>
    </div>
    <div class="batchtotal" id="typetab"></div>
    <div class="manbox" id="manwrap" lmk="indexnpjx" lmv="男频精选">
        <div class="mantit" >
            <h2>男频精选</h2>
        </div>
        <div class="rollbox" id="manlb"></div>
            <div class="mantable clearfix">
                <div class="manlist" id="mt1">
                    
                </div>
                <div class="manlist" id="mt2">
                    
                </div>
                <div class="manlist" id="mt3">
                   
                </div>
                <div class="manlist" id="mt4">
                   
                </div>
            </div>
    </div>
    <div class="hotbook batchtotal" lmk="indexemxs" lmv="热门新书">
        <div class="hotbkbox" id="newbkwrap">
            <h2>热门新书</h2>
            <div class="rollbox" id="hotbklb"></div>
        </div>
    </div>
    <div class="manbox" id="womanwrap"  lmk="indexgpjx" lmv="女频精选">
        <div class="mantit">
            <h2>女频精选</h2>
        </div>
        <div class="rollbox" id="womlb"></div>
            <div class="mantable clearfix">
                <div class="manlist" id="vt1">
                    
                </div>
                <div class="manlist" id="vt2">
                   
                </div>
                <div class="manlist" id="vt3">
                   
                </div>
                <div class="manlist" id="vt4">
                   
                </div>
            </div>
    </div>
    <script type="text/template" id="bk_banner_tpl">
        <div class="banberbox">
        <div class="corrouselbox">
            <ul class="txtinof" lmk="indexdbft" lmv="顶部封推">
                <%for(var i = 0,len = data.length; i < len; ++ i){%>
                    <li class="hero" lmk="indexdbft-smjjj" lmv="书名加简介" urltrue="true" lmurl="#">
                        <a href="./cover.php?bid=<%= data[i].bid%>"><h2 class="bktitle"><%= data[i].book_name%></h2>
                    <p class="classify f16"><%= data[i].author_name%>/<%= data[i].class_name%></p>
                    <p class="intro f16"><%= data[i].intro.length>120?data[i].intro.substring(0,120)+'...':data[i].intro%>
                    </p></a>
                    </li>

                    <%}%>
            </ul>
        </div>
            <div class="thumbnail">
                <ul class="smallul">
                    <%for(var i = 0,len = data.length; i < len; ++ i){%>
                        <li>
                            <img id="<%= i%>" src="<%= data[i].cover%>" width="48">
                        </li>
                        <%}%>


                </ul>

            </div>
            <a id="lbl_btn" class="caleft" href="javascript:;"></a>
            <a id="lbr_btn" class="caright" href="javascript:;"></a>
        </div>
    </script>
    <script type="text/template" id="bk_mpd_tpl">
        <div class="chatitle">
            <h2><%= data.modu_name%></h2>
        </div>
        <ul class="chalistbox" lmk="<%= data.lmk%>" lmv="<%= data.lmv%>">
            <%for(var i = 0,len = data.length; i < len; ++ i){%>
                <li class="clearfix" lmk="<%= data.lmkIn%>" lmv="<%= data.lmvIn%>" urltrue="true" lmurl="#">
                    <a href="./cover.php?bid=<%= data[i].bid%>">
                        <em class="chan"><%= i+1%>.</em>
                        <img src="<%= data[i].cover%>" alt="">
                        <h3><%= data[i].book_name.length>7?data[i].book_name.substring(0,7)+'...':data[i].book_name%></h3>
                        <p>
                            <%= data[i].author_name%>/
                                <%= data[i].class_name%>
                        </p>
                    </a>
                </li>
            <%}%>
        </ul>
        <div class="chamove hide">
            <a href="#">更多&gt;</a>
        </div>
    </script>
    <script type="text/template" id="bk_zapd_tpl">
        <div class="chatitle">
            <h2><%= data.modu_name%></h2>
        </div>
        <ul class="chalastbox" lmk="<%= data.lmk%>" lmv="<%= data.lmv%>">
             <%for(var i = 0,len = data.length; i < len; ++ i){%>
            <li class="clearfix" lmk="<%= data.lmkIn%>" lmv="<%= data.lmvIn%>" urltrue="true" lmurl="#">
                 <a href="./cover.php?bid=<%= data[i].bid%>">
                <em class="chan"><%= i+1%>.</em>
                <h3 class="lasth3"><%= data[i].book_name.length>8?data[i].book_name.substring(0,8)+'...':data[i].book_name%></h3>
                 </a>
            </li>
            <%}%>
        </ul>
        <div class="chamove hide">
            <a href="#">更多&gt;</a>
        </div>
    </script>
    <script type="text/template" id="bk_tab_tpl">
     <table class="classtable" width="100%" border="0" cellspacing="0" lmk="indexfl" lmv="分类">
                <%
                    var i = 0;              
                %>
            <tr>
                <% for(var item in data){ %>

                 <td lmk="<%='indexfl-'+item%>" lmv="<%=data[item]['name']%>" urltrue="true" lmurl="#">
                    <a href="./bibliotheca.php?t=<%= item%>" class="divhei" style="background:url(/static/index/img/class_<%=i+1 %>.jpg);background-size: cover;">
                        <h3><%=data[item]['name']%></h3>
                        <p>(<%=data[item]['num']%>)</p>
                    </a>
                </td>
                <% i++;
                if(i==4){
                    break;
                }
                %>
                <%}%>
            </tr>
            <tr>
               <% i = 0; for(var key in data) {%>
                    <%
                    i++;
                        if (i < 5) {
                            continue;
                        }
                        if (i == 9) {
                            break;
                        }
                    %>
                    <td lmk="<%='indexfl-'+key%>" lmv="<%=data[key]['name']%>" urltrue="true" lmurl="#" <%if(i==7){%> rowspan="2"<%}%>><a href="./bibliotheca.php?t=<%= key%>" class=<%if(i!=7){%> "divhei"<%}else{%>"rspan"<%}%> style="background:url(/static/index/img/class_<%= i%>.jpg);background-size: cover;"> <h3><%=data[key]['name']%></h3>
                        <p>(<%=data[key]['num']%>)</p>
                       </a></td>
               <%}%>
            </tr>
            <tr>
                  <% i = 0; for(var ktr in data) {%>
                    <%
                        i++;
                    
                        if (i <= 8) {
                            continue;
                        }
                    %>
                    <td lmk="<%='indexfl-'+ktr%>" lmv="<%=data[ktr]['name']%>" urltrue="true" lmurl="#"  <%if(i==9){%>
                        colspan="2"
                     <%}%>>
                    <a href="./bibliotheca.php?t=<%= ktr%>" class="divhei" style="background:url(/static/index/img/class_<%=i%>.jpg);background-size: cover;">
                         <h3><%=data[ktr]['name']%></h3>
                        <p>(<%=data[ktr]['num']%>)</p>
                    </a>
                </td>
               <%}%>
            </tr>
        </table>
    </script>
    <script type="text/template" id="bk_nlb_tpl">
        <div class="hotseam">
            <ul class="count clearfix">
                   <%for(var i = 0,len = data.length; i < len; ++ i){%>
                <li lmk="<%= data.lmkIn%>" lmv="<%= data.lmvIn%>" urltrue="true" lmurl="#"
>
                    <a href="./cover.php?bid=<%= data[i].bid%>"><img src="<%= data[i].cover%>" width="120" height="160">
                        <h3><%= data[i].book_name.length>7?data[i].book_name.substring(0,7)+'...':data[i].book_name%></h3>
                        <p><%= data[i].author_name%>/<%= data[i].class_name%></p>
                    </a>
                </li>
                <%}%>
                </ul>
         </div>
          <%if(!(data.length < 6)){ %>
        <a class="manlbtn" href="javascript:;"></a>
        <a class="manrbtn" href="javascript:;"></a>
        <%}%>
    </script>
     <script type="text/template" id="bk_hotlb_tpl">
      <div class="hotseam">
        <ul class="count clearfix">
                       <%for(var i = 0,len = data.length; i < len; ++ i){%>
                <li lmk="<%= data.lmkIn%>" lmv="<%= data.lmvIn%>" urltrue="true" lmurl="#">
                    <a href="./cover.php?bid=<%= data[i].bid%>"><img src="<%= data[i].cover%>" width="120" height="160">
                        <h3><%= data[i].book_name.length>7?data[i].book_name.substring(0,7)+'...':data[i].book_name%></h3>
                        <p><%= data[i].author_name%>/<%= data[i].class_name%></p>
                    </a>
                </li>
                <%}%>
                </ul>
            </div>
             <%if(!(data.length < 6)){ %>
            <a class="manlbtn" href="javascript:;"></a>
            <a class="manrbtn" href="javascript:;"></a>
            <%}%>
    </script>
    <script type="text/template" id="bk_womlb_tpl">
    <div class="hotseam">
         <ul class="count clearfix">
                  <%for(var i = 0,len = data.length; i < len; ++ i){%>
                <li lmk="<%= data.lmkIn%>" lmv="<%= data.lmvIn%>" urltrue="true" lmurl="#">
                    <a href="./cover.php?bid=<%= data[i].bid%>"><img src="<%= data[i].cover%>" width="120" height="160">
                        <h3><%= data[i].book_name.length>7?data[i].book_name.substring(0,7)+'...':data[i].book_name%></h3>
                        <p><%= data[i].author_name%>/<%= data[i].class_name%></p>
                    </a>
                </li>
                <%}%>
            </ul>
            </div>
       <%if(!(data.length < 6)){ %>
            <a class="manlbtn" href="javascript:;"></a>
            <a class="manrbtn" href="javascript:;"></a>
            <%}%>
    </script>
    <script type="text/template" id="bk_ty_tpl">
        <dl>
                        <dt><h2><%= data.title %></h2></dt>
                        <dd>
                            <ul>
                                <%for(var i = 0,len = data.data.length; i < len;i++){%>
                                <li lmk="<%= data.lmkIn%>" lmv="<%= data.lmvIn%>" urltrue="true" lmurl="#"><a href="./cover.php?bid=<%= data.data[i].bid%>"><%= data.data[i].book_name%></a></li>
                                <%}%>
                            </ul>

                        </dd>

                    </dl>
                    <div class="chamove" lmk="<%= data.lmkInGd%>" lmv="<%= data.lmvInGd%>" urltrue="true" lmurl="#">
                        <a href="./bibliotheca.php?t=<%=data.lid%>">更多&gt;</a>
                    </div>
    </script>
         


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

    <input type="hidden" id="js_path" value="img/default.jpg" />

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
</body>

</html>