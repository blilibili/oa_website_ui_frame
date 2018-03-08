<?php /*a:4:{s:67:"/Users/liyigang/Desktop/tp5/application/home/view/upload/index.html";i:1519792568;s:68:"/Users/liyigang/Desktop/tp5/application/home/view/common/header.html";i:1519792501;s:74:"/Users/liyigang/Desktop/tp5/application/home/view/common/header-title.html";i:1519717716;s:66:"/Users/liyigang/Desktop/tp5/application/home/view/common/menu.html";i:1519717279;}*/ ?>
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
        <div class="col-right">
            <input type="hidden" name="username" value="<?php echo htmlentities($userInfo['username']); ?>" />
            <input type="hidden" name="bg" value="<?php echo htmlentities($userInfo['bg']); ?>" />
            <div class="upload-img">

            </div>
            <button type="button" class="layui-btn" id="test1">
                <i class="layui-icon">&#xe67c;</i>上传图片
            </button>
        </div>
    </div>
</div>

<script>
    //Demo uploadHandler
    layui.use('upload', function(){
        var upload = layui.upload;

        var uploadImg = [];
        //执行实例
        var uploadInst = upload.render({
            elem: '#test1' //绑定元素
            ,url: 'uploadHandler/' //上传接口
            ,multiple:true //允许多文件上传
            ,done: function(res){
                //上传完毕回调
                console.log(res);

            }
            ,error: function(res){
                //请求异常回调
                console.log(res);
            }
        });
    });
</script>
</body>
</html>