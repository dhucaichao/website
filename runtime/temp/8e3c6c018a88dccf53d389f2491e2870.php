<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\wamp\www\tp5\public/../application/admin\view\link\index.html";i:1499090306;}*/ ?>
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

    
    <div class="row mt50">
        <div class="col-md-12">
            <table class="table table-hover bg-info">
                <tr>
                    <th>ID</th>
                    <th>地址路径</th>
                    <th>地址命名</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['url']; ?></td>
                    <td><?php echo $v['name']; ?></td>
                    <td class="col-md-4">
                        <a href="<?php echo url('link/edit',['id'=>$v['id']]); ?>" class="btn btn-primary btn-xs">更换</a>
                        <button data-id="<?php echo $v['id']; ?>" class="btn btn-danger btn-xs del-btn">删除</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <?php echo $list->render(); ?>
        </div>
    </div>
</div>


<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/admin/js/toastr.min.js"></script>



<script>
    $(function () {
        // 触发用户删除
        $('.del-btn').click(function () {
            var ac_id = $(this).attr('data-id');
            if (confirm('您确定要 [ 删 除 ] 链接么?')) {
                var obj = $(this).parents('tr');
                delAjax(ac_id,obj);// 执行删除操作
            }
        });
    });


    // 设置弹框参数
    toastr.options = {
        closeButton: true,//是否显示关闭按钮
        progressBar: false,//实现显示计时条
        timeOut: "1000",//自动关闭时间
        positionClass: "toast-bottom-right",//提示位置
        // toast-top-full-width 顶端，宽度铺满整个屏幕
        // toast-top-right  顶端右边
    };

    // 执行AJAX 查询单条数据


    // 执行AJAX删除的操作
    function delAjax(id, obj) {
        // console.log(id);
        $.ajax({
            type: 'delete',
            url: '/admin/link/delete/id/' + id,
            dateType: 'json',
            success: function (data) {
                if (data.status) {
                    toastr.success(data.info);
                    obj.remove();
                } else {
                    toastr.error(data.info,'链接删除失败');
                }
            },
            error: function () {
                // AJAX执行失败
                alert('ajax操作失败');
            }
        });
    }
</script>