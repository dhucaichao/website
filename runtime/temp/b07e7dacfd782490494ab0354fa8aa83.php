<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\wamp\www\tp5\public/../application/admin\view\banner\add.html";i:1498733169;s:64:"D:\wamp\www\tp5\public/../application/admin\view\user\index.html";i:1498482198;}*/ ?>
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

    
<form action="/admin/banner/save" enctype="multipart/form-data" method="post">
<div class="container" id="'ccc">


    <div class="col-md-6 h2">
        <ul class="list-group h4">
            图片:<input type="file" name="image">
        </ul>
        <button class="btn btn-danger btn-lg del-btn">添加</button>
    </div>
</div>
</form>


<!--加载JS-->
<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/admin/js/toastr.min.js"></script>


</body>
</html>