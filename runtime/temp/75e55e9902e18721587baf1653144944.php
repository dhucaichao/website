<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\wamp\www\tp5\public/../application/home\view\noveldetails\index.html";i:1499096688;s:66:"D:\wamp\www\tp5\public/../application/home\view\index\default.html";i:1499091565;}*/ ?>
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
    
<link rel="stylesheet" type="text/css" href="/static/index/css/core.css" />
<link rel="stylesheet" type="text/css" href="/static/index/css/forum.css" />

<link rel="stylesheet" type="text/css" href="/static/admin/css/toastr.min.css" />

</head>
<body class="topline">

<div class="logo" >
    <h1><img src="/static/index/picture/logo.png" width='360px' height='60px'></h1>
</div>

<!--导航栏-->
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
<!--导航栏-->

<!--小说详情-->
<div class="cover-top">
    <div class="covertbox">
        <div class="cover-nav">
            <p>&gt;
                <a href="./bibliotheca.php?t=10003"><?php echo $list['name']; ?></a> &gt; <span><?php echo $list['k']; ?></span></p>
        </div>
        <div class="coverfm clearfix">
            <div class="coverimg fl">
                <img src="<?php echo $list['face']; ?>" width="240" height="320">
            </div>
            <div class="coverinfo" lmk="bookmeta" lmv="书籍meta信息">
                <h3><?php echo $list['k']; ?></h3>
                <p class="author">作者：<span><?php echo $list['penname']; ?></span></p>
                <p class="part">作品简介:
                    <?php echo $list['desc']; ?><a class="zk" href="#"></a></p>
                <p class="all" style="display: none">
                    <?php echo $list['desc']; ?><a class="sq" href="javascript:;"></a>
                </p>
                <div class="cobtnbox">
                    <!-- <a class="goread" target="_blank" href="./read.php?bid=15102&chapid=251485">开始阅读</a>
                    <a class="js_chapter_btn_cover" href="javascript:;"><span class="glyphicon glyphicon-th-list"></span>&nbsp;目录</a> -->
                    <a class="goread" target="_blank" data-sqbid="7063762" href="<?php echo url('novelcontent/index',['tnum'=>1,'nn'=>$list['k'],'au'=>$list['penname'],'nid'=>$list['n']]); ?>" lmk="bookmeta-start" lmv="开始阅读" urltrue="true" lmurl="#">开始阅读</a>
                    <a class="js_chapter_btn_cover" href="<?php echo url('noveldir/index',['id'=>$list['n'],'nn'=>$list['k'],'au'=>$list['penname'],'nid'=>$list['n']]); ?>" lmk="bookmeta-catalog" lmv="目录" urltrue="true" lmurl="#"><span class="glyphicon glyphicon-th-list"></span>&nbsp;目录</a>
                    <a class="addbksj" href="javascript:;" lmk="bookmeta-add" lmv="加入书架" urltrue="true" lmurl="#">+加入书架</a>
                    <a href="<?php echo url('noveldetails/getticket',['nid'=>$list['n']]); ?>" style="background-color: #ff6700;color: #fff;border-radius:10px">打赏一张月票</a>
                    <!-- <div class="js_chapter_btn_cover"></div> -->
                </div>
                <div class="infospan">
                    <span>分类：<?php echo $list['name']; ?></span>
                    <span>字数：<?php echo $list['twords']; ?></span>
                    <span>状态：
                        <?php if($list['isover'] == '1'): ?>
                        连载
                        <?php else: ?>
                        完结
                        <?php endif; ?>
                    </span>
                    <span style="margin-right:0;">更新时间：<?php echo date('Y-m-d H:i:s',$list['uptime'] ); ?>&nbsp;&nbsp;</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--小说详情-->

<div class="J_reply_wrap"  style="margin:20px auto;width:80%;padding:0;position:fixed;bottom:5px;left:10%;Z-index:999">
    <div class="reply_list" style="width:80%;padding:0;margin:0px auto">
        <div class="core_arrow_top"><em></em><span></span></div>
        <div class="c"></div>
        <div class="reply_quick cc">
            <form action="<?php echo url('noveldetails/add',['nid'=>$list['n']]); ?>" method="post">
            <dl class="ct cc">
                <dt><img class="J_avatar" data-type="small" src="http://www.phpwind.net/res/images/face/face_small.jpg" width="50" height="50" alt="默认头像"></dt>
                <dd style="float: left;margin-left:20px">
                    <div class="arrow"><em></em><span></span></div>
                    <textarea name="content" style="height:40px;width:400px"  placeholder="我也说两句"></textarea>
                </dd>
            </dl>
            <div class="ft cc J_reply_ft" style="width:470px">
                <button type="submit" data-tid="3712367" data-pid="20553688" class="btn btn_submit J_reply_sub" data-action="http://www.phpwind.net/index.php?c=post&amp;a=doreply&amp;_getHtml=2">发布</button>
            </div>
            </form>
        </div>
        <div class="J_reply_page_list">	<ul id="J_reply_ul_20553688">
        </ul>
            <div class="J_pages_wrap"></div></div>
    </div>
</div>
<?php echo $list1->render(); if(is_array($list1) || $list1 instanceof \think\Collection || $list1 instanceof \think\Paginator): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
<div class="floor cc J_read_floor" id="read_20552684" style="width:800px;margin:20px auto">
    <table width="100%" style="table-layout:fixed;" class="floor_table">
        <tbody>
        <tr>
            <td rowspan="2" class="floor_left">
                <div class="floor_info">
                    <!--头像-->
                    <div class="face">
                        <img src="<?php echo $v['icon']; ?>" width="120px" height="120px">
                    </div>
                    <!--用户名-->
                    <div class="name" style="overflow:hidden">
                        <span  title="离线"><?php echo $v['nickname']; ?></span>
                    </div>
                    <!--等级-->
                    <div class="level">
                        <div>
                            <?php switch($v['level']): case "1": ?>普通用户<?php break; case "2": ?>普通会员<?php break; case "3": ?>星级会员<?php break; endswitch; ?>
                        </div>
                    </div>

                </div>
            </td>
            <td class="box_wrap floor_right">
                <div class="fl"><div class="floor_arrow"><em></em><span></span></div></div>
                <div class="c"></div>
                <div class="floor_top_tips cc">
                    <div style="position:relative;"><span class="lou J_floor_copy" title="复制此楼地址" data-hash="read_20552684"><sup></sup></span></div>
                    <span class="fl">发布于：<?php echo date('Y-m-d H:i:s', $v['time'] ); ?></span>
                </div>
                <div id="J_read_main">
                    <div class="editor_content">
                        <?php echo $v['content']; ?>
                    </div>

                    <?php if(is_array($list2) || $list2 instanceof \think\Collection || $list2 instanceof \think\Paginator): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;if($s['did'] == $v['id']): ?>
                       <div style="font-size:15px;margin-top:10px;float: left;"><img src="<?php echo $s['icon']; ?>" width="30px" height="30px"><?php echo $s['nickname']; ?>&nbsp;&nbsp; 回复:&nbsp;&nbsp;<?php echo $s['content']; ?>  发表于<?php echo date('Y-m-d H:i:s', $s['time'] ); ?></div>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="box_wrap floor_bottom" valign="bottom">
                <div id="app_read_floor_2"></div>
                <div class="floor_bottom_tips cc" style="line-height: 20px;height:37px">
								<span class="fr">
									</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span rel="nofollow"
                       data-pid="<?php echo $v['id']; ?>" class="a_reply J_read_reply" data-topped="false">回复</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a role="button" rel="nofollow" href="#" data-pid="20552684"
                                               data-uri="http://www.phpwind.net/index.php?m=app&amp;a=mark&amp;tid=3712367&amp;pid=20552684&amp;app=mark"
                                               class="J_plugin_read_mark" id=""><span>评分</span></a>
                </div>
                <div style="display:none;" class="J_reply_wrap" id="<?php echo $v['id']; ?>"   style="margin-top:20px">
                    <div class="reply_list" style="width:500px">
                        <div class="core_arrow_top"><em></em><span></span></div>
                        <div class="c"></div>
                        <div class="reply_quick cc">
                            <form action="<?php echo url('noveldetails/reply',['nid'=>$list['n'],'did'=>$v['id']]); ?>" method="post">
                            <dl class="ct cc">
                                <dt><img class="J_avatar" data-type="small" src="http://www.phpwind.net/res/images/face/face_small.jpg" width="50" height="50" alt="默认头像"></dt>
                                <dd style="float: left;margin-left:20px">
                                    <div class="arrow"><em></em><span></span></div>
                                    <textarea name="content" id="J_reply_ta_20553688" style="height:40px;width:400px" class="J_at_user_textarea" placeholder="我也说两句"></textarea>
                                </dd>
                            </dl>
                            <div class="ft cc J_reply_ft" style="width:470px">
                                <button type="submit"  class="btn btn_submit J_reply_sub">回复</button>
                            </div>
                            </form>
                        </div>
                        <div class="J_reply_page_list">	<ul id="J_reply_ul_20553688">
                        </ul>
                            <div class="J_pages_wrap"></div></div>
                    </div>
                </div>
            </td>
        </tr>
        </tbody></table>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>


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
    
<script>
    $(function(){
        $('.J_read_reply').click(function(){
            var r = $(this).attr('data-pid');
            var dd = $('#'+r).css('display');
//            console.log(dd);
            if (dd=='none'){
                $('#'+r).css('display','block');
            } else {
                $('#'+r).css('display','none');
            }
//            $('#'+r).css('display','block');
        })
    })
</script>

</body>

</html>