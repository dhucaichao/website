<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wamp\www\tp5\public/../application/admin\view\user\add.html";i:1497954754;s:64:"D:\wamp\www\tp5\public/../application/admin\view\user\index.html";i:1497954754;}*/ ?>
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
        <a href="<?php echo url('rest/user/index'); ?>" class="btn btn-default">用户列表页</a>
        <a href="<?php echo url('rest/user/create'); ?>" class="btn btn-default">添加页</a>
    </div>
    <div class="clearfix"></div>

    
<div class="col-md-5 h2">
    <ul class="list-group">
        <li class="list-group-item">ID: <?php echo $row['id']; ?></li>
        <li class="list-group-item">NAME: <?php echo $row['name']; ?></li>
        <li class="list-group-item">
            SEX:
            <?php switch($row['sex']): case "0": ?>女<?php break; case "1": ?>男<?php break; case "2": ?>保密<?php break; default: ?>未知生物
            <?php endswitch; ?>
        </li>
        <li class="list-group-item">AGE: <?php echo $row['age']; ?></li>
        <li class="list-group-item">PRO: <?php echo $row['province']; ?></li>
    </ul>
</div>



<!--加载JS-->
<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/admin/js/toastr.min.js"></script>


</body>
</html>