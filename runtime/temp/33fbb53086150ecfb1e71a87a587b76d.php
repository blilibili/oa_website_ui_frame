<?php /*a:4:{s:65:"/Users/liyigang/Desktop/tp5/application/home/view/index/home.html";i:1519701392;s:68:"/Users/liyigang/Desktop/tp5/application/home/view/common/header.html";i:1519792501;s:74:"/Users/liyigang/Desktop/tp5/application/home/view/common/header-title.html";i:1519717716;s:66:"/Users/liyigang/Desktop/tp5/application/home/view/common/menu.html";i:1519717279;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图片发布系统</title>
    <link href="/layui/css/layui.css" rel="stylesheet" />
    <link href="/css/home.css" rel="stylesheet" />
    <script src="/layui/layui.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/babel.js"></script>
    <script src="/js/jsrender.min.js"></script>
    <script src="/js/main.js"></script>
</head>
<body>
<div>
    <div class="head_box">
    <h2 class="head_logo">金华鉴网站</h2>
    <div class="head_right">
        <div class="layui-col-md5 nickname">
            <?php echo htmlentities($nickname); ?> , <?php echo htmlentities($time); ?>
        </div>
        <div class="layui-col-md1">|</div>
        <div class="layui-col-md1">
            <div class="ava_circle"></div>
        </div>
    </div>
    <div class="login-menu" style="display: none;">
        <ul>
            <li>退出</li>
        </ul>
    </div>
</div>
    <div class="body-content">
        <div class="col-left">
    <div class="menu">
        <ul>
            <a href="/home/index">
                <li><i style="font-size: 20px;" class="layui-icon">&#xe68e;</i><span style="margin-left: 30px;">首页</span></li>
            </a>
            <a href="/home/upload">
                <li><i style="font-size: 20px;" class="layui-icon">&#xe62f;</i><span style="margin-left: 30px;">图片上传</span></li>
            </a>
            <a href="/home/picture">
                <li><i style="font-size: 20px;" class="layui-icon">&#xe60d;</i><span style="margin-left: 30px;">查看图片</span></li>
            </a>
            <a href="/user/admin">
                <li><i style="font-size: 20px;" class="layui-icon">&#xe620;</i><span style="margin-left: 30px;">系统设置</span></li>
            </a>
        </ul>
    </div>
</div>
        <div class="col-right"></div>
    </div>
</div>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            $.ajax({
                method:'post',
                url:'/home/form/add',
                data:data.field,
                success:function(msg){
                    if(msg.status){
                        layer.msg(msg.msg);
                    }else{
                        $('.fadeForm').load('/www.baidu.com');
                        layer.msg(msg.msg);
                    }
                }
            });
            return false;
        });
    });
</script>
</body>
</html>