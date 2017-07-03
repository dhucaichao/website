<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wamp\www\tp5\public/../application/home\view\personal\index.html";i:1499116186;}*/ ?>
<!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>我的首页</title>
    <link rel="stylesheet" href="/static/user/css/Personal.css">
</head>
<body>
<div class="total">
    <div class="head">
        <h2><img src="/static/user/images/detail.jpg" width="50" height="50"><b>&nbsp;个人中心</b></h2>
        <ul>
            <li><a href="<?php echo url('personal/index'); ?>" style="color:white"> 我的首页 </a></li>
            <li><a href="<?php echo url('bookshlef/index'); ?>" style="color:white"> 我的书架 </a> </li>
            <li><a href="" style="color:white"> 消息中心 </a></li>
            <!--<li><a href="" style="color:white"> 游戏 </a></li>-->
        </ul>

        <h5>首页&nbsp;</h5>
        <h5>书友:</h5><h5><?php echo $name; ?></h5>
    </div>
    <div class="substance">
        <div class="subleft">
            <ul class="submit1">
                <li> <a href="<?php echo url('personal/index'); ?>" > 首页 </a> </li>
                <li> <a href="" > 账务中心 </a> </li>
                <li> <a href="<?php echo url('personal/ticket'); ?>" > 我的票夹 </a></li>
                <li> <a href="<?php echo url('personal/review'); ?>" > 我的书评 </a></li>
                <li> <a href="<?php echo url('personal/safe'); ?>" > 安全中心 </a></li>
                <li> <a href="<?php echo url('bookshlef/index'); ?>" > 我的书架 </a></li>
            </ul>
        </div>
        <div class="subright">
            <div class="srtop">
                <div class="paragraph1">
                    <div class="circular">
                        <img src="/static/user/images/10.jpg">
                    </div>
                </div>
                <div class="paragraph2">
                    <div class="title">
                        <h3>书友名字:</h3>
                        <h3><?php echo $name; ?></h3>
                    </div>
                    <div class="homepage"><b><a href="">个人主页</a></b></div>
                    <div class="install"><a href="">*</a></div>
                </div>
                <div class="paragraph3">
                    <h3>关注<hr><b><?php echo $list['collection']; ?></b></h3>
                    <h3>积分<hr><b><?php echo $list['integral']; ?></b></h3>
                </div>
            </div>
            <div class="srsub">
                <div class="subbox">
                    <h4 class="name"><b>账户余额</b></h4>
                    <h4 class="totall"><b><?php echo $list['integral']; ?></b>&nbsp;积分</h4>
                    <h4 class="cha"><a href="">充值</a></h4>
                </div>
                <div class="subbox">
                    <h4 class="name"><b>我的票夹</b></h4>
                    <h4 class="totall"><b><?php echo $list['ticket']; ?></b>&nbsp;月票</h4>
                    <h4 class="cha"><a href="<?php echo url('personal/ticket'); ?>">立即查看</a></h4>
                </div>
                <div class="subbox">
                    <h4 class="name"><b>我的书架</b></h4>
                    <h4 class="totall"><b><?php echo $list['collection']; ?></b>&nbsp;本藏书</h4>
                    <h4 class="cha"><a href="<?php echo url('bookshlef/index'); ?>">立即看查</a></h4>
                </div>
                <div class="subbox1">
                    <h4 class="name"><b>我的书单</b></h4>
                    <h4 class="totall"><b><?php echo $list['collection']; ?></b>&nbsp;个关注</h4>
                    <h4 class="cha"><a href="">立即看查</a></h4>
                </div>
            </div>

        </div>
    </div>
    <div class="footer">
        <div class="contain">
            <div class="containOne clearfix">
                <div class="oneLeft">
                    <a href="#" title="">关于我们</a>
                    <span>|</span>
                    <a href="#" title="">联系我们</a>
                    <span>|</span>
                    <a href="#" title="">投稿声明</a>
                    <span>|</span>
                    <a href="#" title="">版权声明</a>
                </div>
                <div class="oneRight">
                    霜之哀伤文学信息技术有限公司&nbsp;&nbsp;&nbsp;版权所有
                </div>
            </div>
            <div class="containTwo clearfix">
                <div class="twoLeft">
                    为保证更好的浏览效果，请使用IE9以上或其他主流浏览器访问
                </div>
                <div class="twoRight">
                    <a href="#" title="">粤ICP备13078413号-6</a>
                    <span>增值电信业务许可证网络文化经营许可证</span>
                    <span>粤B2-20130742</span>
                    <span>粤网文[2014]0424-124号</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>