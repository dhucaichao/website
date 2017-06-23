<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp\www\tp5\public/../application/admin\view\author\index.html";i:1498138222;}*/ ?>
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
                    <th>笔名</th>
                    <th>头像</th>
                    <th>电话</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['penname']; ?></td>
                    <td><img src="<?php echo $v['icon']; ?>" alt=""></td>
                    <td><?php echo $v['tel']; ?></td>
                    <td class="col-md-4">
                        <button data-id="<?php echo $v['id']; ?>" class="btn btn-default btn-xs show-btn" data-toggle="modal" data-target="#myModal">查看信息</button>
                        <a href="<?php echo url('author/edit',['id'=>$v['id']]); ?>" class="btn btn-primary btn-xs">编辑</a>
                        <button data-id="<?php echo $v['id']; ?>" class="btn btn-danger btn-xs del-btn">删除</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <?php echo $list->render(); ?>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    作者<img src="" alt="" id="myimg">[<u></u>]的详细信息
                </h4>
            </div>
            <table class="table table-hover bg-info">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <span class="status"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="tel"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="level"></span>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <span class="sex"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="regtime"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="balance"></span>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <span class="endnover"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="fence"></span>
                    </div>
                    <div class="col-md-4">
                        <span class="serialnover"></span>
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
        // 触发用户删除
        $('.del-btn').click(function () {
            var ac_id = $(this).attr('data-id');
            if (confirm('您确定要 [ 删 除 ] 该用户么?')) {
                var obj = $(this).parents('tr');
                delAjax(ac_id,obj);// 执行删除操作
            }
        });
        // 触发查询单条用户
        $('.show-btn').click(function () {
            var ac_id = $(this).attr('data-id');
            showAjax(ac_id); //AJAX查询
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

    // 执行AJAX 查询单条数据
    function showAjax(id){
        $.ajax({
            type: 'get',
            url: '/admin/author/read/id/' + id,
            dateType: 'json',
            success:function (data){
                var myimg = document.getElementById('myimg');
                myimg.getAttributeNode('src').nodeValue=data.icon;
                $('.modal-title u').html(data.penname);
                $('.modal-body .status').html('作者状态:' + (data.status == 1 ? '激活' : '禁用'));
                $('.modal-body .tel').html('电话号码:' + (data.tel));
                $('.modal-body .level').html('作者用户等级:' + (data.level == 1 ? '普通写手' : (data.level == 2?'黄金写手':'白金写手')));


                $('.modal-body .sex').html('性别:' + (data.sex == 1 ? '男' : '女'));
                $('.modal-body .regtime').html('注册时间:' + (data.regtime));
                $('.modal-body .balance').html('稿费:' + (data.balance));

                $('.modal-body .endnover').html('已完结小说:' + (data['endnover']));
                $('.modal-body .fence').html('粉丝数:' + (data.fence));
                $('.modal-body .serialnover').html('连载中小说:' + (data['serialnover']));
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
            type: 'delete',
            url: '/admin/author/delete/id/' + id,
            dateType: 'json',
            success: function (data) {
                if (data.status) {
                    toastr.success(data.info);
                    obj.remove();
                } else {
                    toastr.error(data.info,'用户删除失败');
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