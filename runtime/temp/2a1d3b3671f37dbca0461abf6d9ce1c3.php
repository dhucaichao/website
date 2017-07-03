<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp\www\tp5\public/../application/admin\view\phone\index.html";i:1499106119;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>手机归属地查询</title>
    <link rel="stylesheet" type="text/css" href="/static/admin/css/bootstrap.min.css" />

</head>
<body>
<form action="/admin/phone/index" method="get" accept-charset="utf-8">
    <!-- 输入手机号 提交到当前页面 $_GET接收 -->
    <input class="form-control" type="text" name="phone" placeholder="手机号" style="width: 200px; margin-top: 20px; margin-left: 10px;">
    <br>
    <input type="submit" name="" class="btn btn-info" value="提交" style="margin-left: 10px;">
</form>
<div>
    <table class="table table-hover" style="margin-left: 10px; margin-top: 10px; width: 300px; ">
        <tr>
            <td>手机号:</td>
            <td><?php echo $shouji; ?></td>
        </tr>

        <tr>
            <td>省份:</td>
            <td><?php echo $province; ?></td>
        </tr>

        <tr>
            <td>城市:</td>
            <td><?php echo $city; ?></td>
        </tr>

        <tr>
            <td>运营商:</td>
            <td><?php echo $company; ?></td>
        </tr>

        <tr>
            <td>卡型:</td>
            <td><?php echo $cardtype; ?></td>
        </tr>

        <tr>
            <td>区号:</td>
            <td><?php echo $areacode; ?></td>
        </tr>

    </table>
</div>
</body>
</html>