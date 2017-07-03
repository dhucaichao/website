<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wamp\www\tp5\public/../application/home\view\personal\modpwd.html";i:1499115210;}*/ ?>
<!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>安全中心</title>
    <link rel="stylesheet" href="/static/user/css/safe.css">
</head>
<body>
    <div class="total">
        <div class="head">
            <h2><img src="/static/user/images/detail.jpg" width="50" height="50"><b>&nbsp;个人中心</b></h2>
            <ul>
                <li><a href="<?php echo url('personal/index'); ?>" style="color:white"> 我的首页 </a></li>
                <li><a href="<?php echo url('bookshelf/index'); ?>" style="color:white"> 我的书架 </a> </li>
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
                    <li> <a href="<?php echo url('bookshelf/index'); ?>" > 我的书架 </a></li>
                </ul>
            </div>

            <div class="subright">

                <div class='row  clearfix'>
                    <div class='circle'></div>
                    <div class='row-title'>
                        修改密码
                    </div>

                </div>
                <form action="<?php echo url('personal/yzmodpwd'); ?>" method='post' enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td class='td-right'>原密码:</td>
                            <td class='td-left'><input type='text' class='text-box' name='pwd' value=""></td>
                        </tr>

                        <tr>
                            <td class='td-right'>新密码:</td>
                            <td class='td-left'> <input type='text' class='text-box' name='xpwd' value=""> </td>
                        </tr>

                        <tr>
                            <td class='td-right'>确认密码:</td>
                            <td class='td-left'><input type='text' class='text-box' name='qrpwd' value=""></td>
                        </tr>


                        <tr>
                            <td></td>
                            <td class='td-left submit-box'><input type="submit" value='修改'></td>
                        </tr>
                    </table>
                </form>

            </div>
            <div><?php echo $error; ?></div>

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
    </div>
</body>
</html>