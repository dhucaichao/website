<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\wamp\www\tp5\public/../application/admin\view\category\add.html";i:1498572861;s:66:"D:\wamp\www\tp5\public/../application/admin\view\author\index.html";i:1498138222;}*/ ?>
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

    
<form action="/admin/category/save" method="post">
    <div class="container">
        <div class="col-md-6 h2">
            <ul class="list-group h4">
                分类名:<input type="text" name="name">
                <hr>
                所属类:
                <input type="text" name="pid">
                <p><?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <?php echo $v['id']; ?>-<?php echo $v['name']; endforeach; endif; else: echo "" ;endif; ?>
                <hr></p>
                隐藏/显示:<label><input type="radio" name="display" value=1 checked>显示</label>
                <label><input type="radio" name="display" value=2 >隐藏</label>
            </ul>
            <button class="btn btn-danger btn-lg del-btn">保存</button>
        </div>
    </div>
</form>


<!--加载JS-->
<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/admin/js/toastr.min.js"></script>


</body>
</html>