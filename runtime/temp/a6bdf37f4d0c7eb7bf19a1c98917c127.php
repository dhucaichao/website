<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\wamp\www\tp5\public/../application/admin\view\novel\add.html";i:1499050293;}*/ ?>
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
        <strong><span class="icon-pencil-square-o"></span> 添加书籍 </strong>
    </div>
    <div class="body-content" style="height: 600px; padding-left:10%">
        <form action="save" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <div class="label">
                    <label>封面：</label>
                </div>
                <div class="field">
                    <input type="file" id="url1" name="face" class="input tips" style="width: 25%;line-height: 30px;height: 30px;margin-top: 0px;display: block;padding:0px"  >
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>书籍名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="name"  >
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>作者：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="aid" >
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>类型：</label>
                </div>
                <div class="field">
                    <!--<select id="con">-->
                        <!--<?php if(is_array($list1) || $list1 instanceof \think\Collection || $list1 instanceof \think\Paginator): $k = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>-->
                        <!--<option value ="<?php echo $k; ?>"><?php echo $v['name']; ?></option>-->
                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                    <!--</select>-->
                    <select id="city" name="cid">
                        <?php if(is_array($list5['1']) || $list5['1'] instanceof \think\Collection || $list5['1'] instanceof \think\Paginator): $k = 0; $__LIST__ = $list5['1'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                        <option value ="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; if(is_array($list5['0']) || $list5['0'] instanceof \think\Collection || $list5['0'] instanceof \think\Paginator): $k = 0; $__LIST__ = $list5['0'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                        <option value ="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>评分：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="grade" >
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>月票数量：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="Tticket" >
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>总字数：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="twords" >
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>收藏量：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="Tcollect" >
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>是否完结：</label>
                </div>
                <div class="field">
                    <label><input type="radio" value="1" name="isover"    checked >连载</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" value="2" name="isover"  >完结</label>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>是否上架：</label>
                </div>
                <div class="field">
                    <label><input type="radio" value="1" name="up"  checked>上架</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" value="2" name="up" >下架</label>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>描述：</label>
                </div>
                <div class="field">
                    <textarea name="desc" cols="50" rows="5" ></textarea>
                </div>
            </div>

            <div style="bottom:20px;left:800px; position:fixed;">
                <input type='submit' value='保存' class="button bg-main icon-check-square-o">
            </div>
        </form>
    </div>
</div>

<script>
//    var conList =
</script>
</body>
</html>

