<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\wamp\www\tp5\public/../application/home\view\personal\comment.html";i:1499116186;}*/ ?>
<!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>我的书评</title>
    <link rel="stylesheet" href="/static/user/css/comment.css">
    <!--<link rel="stylesheet" href="/static/writer/js/bootstrap.min.css">-->
</head>
<body>
<script src="/static/writer/js/jquery-1.8.3.min.js"></script>


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
                <div class="qdp-content" data-l1="3">
                    <h2 class="qdp-title">我的书评</h2>
                    <div class="review-record qdp-record" data-l2="5">
                        <div id="tabView" class="ui-tab-tabs">
                            <a href="javascript:;" class="checked" data-rel="tabTarget1" data-eid="qd_M72">发表的书评</a>

                        </div>
                        <div class="ui-tab-contents">
                            <div id="tabTarget1" class="ui-tab-content checked" data-l3="13">
                                <div id="tableTarget1" class="table-x">
                                    <div class="table-size ui-loading-animation" style=" transition: height 200ms;">
                                        <table class="ui-table" >
                                            <thead>
                                              <tr>
                                                <th scope="col" width="70">主题</th>
                                                <th scope="col" width="150">回复内容</th>
                                                <th scope="col" width="121">回复时间</th>
                                                <th scope="col">操作</th>
                                              </tr>
                                            </thead>
                                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $v=>$k): ?>
                                            <tr>
                                                <td><?php echo $bname[$v]; ?></td>
                                                <td><?php echo $k['content']; ?></td>
                                                <td><?php echo date("y-m-d H:i:s",$k['time']); ?></td>
                                                <td>
                                                    <a href="">查看</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </table>
                                        <?php echo $page; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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