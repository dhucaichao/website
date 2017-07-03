<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\wamp\www\tp5\public/../application/admin\view\user\add.html";i:1498129792;s:64:"D:\wamp\www\tp5\public/../application/admin\view\user\index.html";i:1498973757;}*/ ?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <!--加载CSS-->
    <link rel="stylesheet" type="text/css" href="/static/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/reset.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/toastr.min.css" />
</head>
<body>
<div>
    <div class="col-md-12 bg-primary p20">
        <h1><?php echo $title; ?></h1>
        <hr>
    </div>
    <div class="clearfix"></div>

    
<form action="/admin/user/save" enctype="multipart/form-data" method="post">
<div class="container" id="'ccc">
    <div class="col-md-6 h2">
        <ul class="list-group h4">
            昵称:<input type="text" name="nickname">
            <hr>
            电话:<input type="text" name="tel">
            <hr>
            性别:<label><input type="radio" name="sex" value=1 checked>男</label>
            <label><input type="radio" name="sex" value=2>女</label>
            <hr>
            状态:<label><input type="radio" name="status" value=1 checked>激活</label>
                    <label><input type="radio" name="status" value=2>禁用</label>
            <hr>
            会员等级:<label><input type="radio" name="level" value=1 checked>普通用户</label>
            <label><input type="radio" name="level" value=2>普通会员</label>
            <label><input type="radio" name="level" value=3>高级会员</label>
        </ul>
    </div>

    <div class="col-md-6 h2">
        <ul class="list-group h4">
            余额:<input type="text" name="balance">
            <hr>
            已用金额:<input type="text" name="consumption">
            <hr>
            月票:<input type="text" name="ticket">
            <hr>
            收藏书籍数量:<input type="text" name="collection">
            <hr>
            头像:<input type="file" name="icon">
        </ul>
    </div>
    <button class="btn btn-danger btn-lg del-btn">提交</button>
</div>
</form>


<!--加载JS-->
<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/admin/js/toastr.min.js"></script>


</body>
</html>