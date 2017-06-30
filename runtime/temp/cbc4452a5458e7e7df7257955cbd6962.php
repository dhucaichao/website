<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wamp\www\tp5\public/../application/admin\view\chapter\index2.html";i:1498821987;}*/ ?>
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
                    <th>章节数</th>
                    <th>章节名</th>
                    <th>价格</th>
                    <th>审核状态</th>
                    <th>上次更新时间</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['tnum']; ?></td>
                    <td>
                        <?php echo $v['title']; ?>
                    </td>
                    <td class='price' data-price="<?php echo $v['price']; ?>" priceid="<?php echo $v['id']; ?>">
                        <span><?php echo $v['price']; ?></span>
                        <div id="price" style="display:none;width:50px"><input type="number" value="<?php echo $v['price']; ?>" name="price" id="ppp" style="width:60px"></div>
                    </td>
                        <?php switch($v['check']): case "0": ?><td class="checkover"><button class="btn btn-check btn-default btn-xs" checkid="<?php echo $v['id']; ?>">未审核</button></td><?php break; case "1": ?><td>审核未通过</td><?php break; case "2": ?><td>审核通过</td><?php break; endswitch; ?>
                    <td>
                        <?php echo $v['uptime']; ?>
                    </td>
                    <td class="col-md-4">
                        <button data-id="<?php echo $v['id']; ?>" class="btn btn-default btn-xs show-btn" data-toggle="modal" data-target="#myModal">查看章节内容</button>
                        <button data-id="<?php echo $v['id']; ?>" class="btn btn-danger btn-xs del-btn">删除</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    第 <i></i> 章[<u></u>]的详细信息
                </h4>
            </div>
            <table class="table table-hover bg-info">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="content"></span>
                        </div>
                    </div>


                </div>
            </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>


<!--加载JS-->
<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/admin/js/toastr.min.js"></script>


<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    $(function () {
        // 触发用户删除
        $('.del-btn').click(function () {
            var ac_id = $(this).attr('data-id');
            if (confirm('您确定要 [ 删 除 ] 该章节么?')) {
                var obj = $(this).parents('tr');
                delAjax(ac_id,obj);// 执行删除操作
            }
        });
        $('.show-btn').click(function () {
            var ac_id = $(this).attr('data-id');
            showAjax(ac_id); //AJAX查询
        })
        $('.btn-check').click(function () {
            var ac_id = $(this).attr('checkid');
            var r = confirm('审核是否通过');
            if (r == true){
                cc = 2;
            } else {
                cc =1;
            }
            $.ajax({
                type: 'get',
                url: '/admin/chapter/edit/check/' + cc + '/id/' + ac_id,
                dateType: 'json',
                success:function (data){
                    if (data.status){
                        $('.checkover').html(data.mes);
                    }
                },
                error: function () {
                    // AJAX执行失败
                    alert('ajax操作失败');
                }
            });
        })
        $('.price').click(function(){
             id = $(this).attr('priceid');
            var price = $(this).attr('data-price');
            $('.price span').html('');
            a = document.getElementById('price');
            a.style.display = 'block';
        })
        $('.price input').blur(function(){
            var p = document.getElementById('ppp').value;
            var p =parseFloat(p).toFixed(2);
//            var id = $(this).attr('priceid');
            $.ajax({
                type: 'get',
                url: '/admin/chapter/read1/id/' + id + '/p/' + p,
                dateType: 'json',
                success:function (data){
                    if (data.status){
                        $('.price span').html(p);
                        a.style.display = 'none';
                    }

                },
                error: function () {
                    // AJAX执行失败
                    alert('ajax操作失败');
                }
            });
        })
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

    function showAjax(id){
        $.ajax({
            type: 'get',
            url: '/admin/chapter/read/id/' + id,
            dateType: 'json',
            success:function (data){
                $('.modal-title u').html(data.title);
                $('.modal-title i').html(data.tnum);
                $('.modal-body .content').html(data.content);
            },
            error: function () {
                // AJAX执行失败
                alert('ajax操作失败');
            }
        });
    }
    // 执行AJAX删除的操作
    function delAjax(id, obj) {
        // console.log(id);
        $.ajax({
            type: 'get',
            url: '/admin/chapter/delete/id/' + id,
            dateType: 'json',
            success: function (data) {
                if (data.status) {
                    toastr.success(data.info);
                    obj.remove();
                } else {
                    toastr.error(data.info,'分类删除失败');
                }
            },
            error: function () {
                // AJAX执行失败
                alert('ajax操作失败');
            }
        });
    }
</script>

</body>
</html>