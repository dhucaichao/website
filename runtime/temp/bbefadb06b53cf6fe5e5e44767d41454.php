<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\wamp\www\tp5\public/../application/admin\view\novel\edit.html";i:1498837267;}*/ ?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <!--加载CSS-->
    <!--<link rel="stylesheet" type="text/css" href="/static/admin/css/bootstrap.min.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="/static/admin/css/toastr.min.css" />-->
    <link rel="stylesheet" type="text/css" href="/static/admin/css/admin.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/pintuer.css" />
    <style>
        .form-group{
            width:100%;
            height:30px;
        }
        .label{
            width:15%;
            float: left;
            height:30px;
        }
        .field{
            width:70%;
            float: left;
            height:30px;
        }
        .w50{
            width:30%;
            height:30px;
        }
        label{
            width:25%;
            text-align: center;
            line-height:30px;
            margin-right:10%;
        }
    </style>
</head>
<body>

<div class="panel admin-panel" style="height: 100%;">
    <div class="panel-head" id="add">
        <strong><span class="icon-pencil-square-o"></span> 编辑书籍 </strong>
    </div>
    <div class="body-content" style="height: 600px; padding-left:10%">
        <form action="/admin/novel/update/id/<?php echo $result['id']; ?>" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <div class="label">
                    <label>封面：</label>
                </div>
                <div class="field">
                    <input type="file" id="url1" name="face" class="input tips" style="width: 25%;line-height: 30px;height: 30px;margin-top: 0px;display: block;padding:0px" value=<?php echo $result['face']; ?> >
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>书籍名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="name" value=<?php echo $result['name']; ?> >
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>作者：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="aid" value=<?php echo $result['aid']; ?>>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>评分：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="grade" value=<?php echo $result['grade']; ?>>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>月票数量：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="Tticket" value=<?php echo $result['Tticket']; ?>>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>总字数：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="twords" value=<?php echo $result['twords']; ?>>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>收藏量：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="Tcollect" value=<?php echo $result['Tcollect']; ?>>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>是否完结：</label>
                </div>
                <div class="field">
                    <label><input type="radio" value="1" name="isover"   value=<?php echo $result['isover']; ?> checked >连载</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" value="2" name="isover" value=<?php echo $result['isover']; ?> >完结</label>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>是否上架：</label>
                </div>
                <div class="field">
                    <label><input type="radio" value="1" name="up" value=<?php echo $result['up']; ?> checked>上架</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" value="2" name="up" value=<?php echo $result['up']; ?>>下架</label>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>描述：</label>
                </div>
                <div class="field">
                    <textarea name="desc" cols="50" rows="5" value=<?php echo $result['desc']; ?>></textarea>
                </div>
            </div>

            <div style="bottom:20px;left:800px; position:fixed;">
                <input type='submit' value='保存' class="button bg-main icon-check-square-o">
            </div>
        </form>
    </div>
</div>

</body>
</html>
