<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wamp\www\tp5\public/../application/admin\view\author\edit.html";i:1498115857;s:66:"D:\wamp\www\tp5\public/../application/admin\view\author\index.html";i:1498138222;}*/ ?>
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

    
<form action="/admin/author/update/id/<?php echo $result['id']; ?>" enctype="multipart/form-data" method="post">
<div class="container">
    <div class="col-md-6 h2">
        <ul class="list-group h4">
            笔名:<input type="text" name="penname" value=<?php echo $result['penname']; ?>>
            <hr>
            电话:<input type="text" name="tel" value=<?php echo $result['tel']; ?>>
            <hr>
            性别:<label><input type="radio" name="sex" value=1 <?php echo !empty($result['sex']) && $result['sex']==1?'checked':''; ?>>男</label>
            <label><input type="radio" name="sex" value=2 <?php echo !empty($result['sex']) && $result['sex']==2?'checked':''; ?>>女</label>
            <hr>
            状态:<label><input type="radio" name="status" value=1 <?php echo !empty($result['status']) && $result['status']==1?'checked':''; ?>>激活</label>
            <label><input type="radio" name="status" value=2 <?php echo !empty($result['status']) && $result['status']==2?'checked':''; ?>>禁用</label>
            <hr>
            作家等级:<label><input type="radio" name="level" value=1 <?php echo !empty($result['level']) && $result['level']==1?'checked':''; ?>>普通写手</label>
            <label><input type="radio" name="level" value=2 <?php echo !empty($result['level']) && $result['level']==2?'checked':''; ?>>黄金写手</label>
            <label><input type="radio" name="level" value=3 <?php echo !empty($result['level']) && $result['level']==3?'checked':''; ?>>白金写手</label>
        </ul>
    </div>

    <div class="col-md-6 h2">
        <ul class="list-group h4">
            稿费:<input type="text" name="balance" value=<?php echo $result['balance']; ?>>
            <hr>
            已完结小说:<input type="text" name="end-nover" value=<?php echo $result['endnover']; ?>>
            <hr>
            粉丝数:<input type="text" name="fence" value=<?php echo $result['fence']; ?>>
            <hr>
            连载中小说:<input type="text" name="serial-nover" value=<?php echo $result['serialnover']; ?>>
            <hr>
            头像:<input type="file" name="icon">
        </ul>
    </div>
    <button class="btn btn-danger btn-lg del-btn">保存</button>

</div>
</form>


<!--加载JS-->
<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/admin/js/toastr.min.js"></script>


</body>
</html>