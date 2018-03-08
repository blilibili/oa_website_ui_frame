<?php /*a:4:{s:66:"/Users/liyigang/Desktop/tp5/application/home/view/admin/index.html";i:1519717314;s:68:"/Users/liyigang/Desktop/tp5/application/home/view/common/header.html";i:1519701668;s:74:"/Users/liyigang/Desktop/tp5/application/home/view/common/header-title.html";i:1519717716;s:66:"/Users/liyigang/Desktop/tp5/application/home/view/common/menu.html";i:1519717279;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我是头部测试</title>
    <link href="/layui/css/layui.css" rel="stylesheet" />
    <link href="/css/home.css" rel="stylesheet" />
    <script src="/layui/layui.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/babel.js"></script>
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
            <table class="layui-table">
                <colgroup>
                    <col width="150">
                    <col width="200">
                    <col width="100">
                    <col width="100">
                </colgroup>
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>昵称</th>
                    <th>是否是管理员</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($user['username']); ?></td>
                    <td><?php echo htmlentities($user['nickname']); ?></td>
                    <td>
                        <?php if($user['competence'] == 'admin'): ?>是
                        <?php else: ?>
                        否
                        <?php endif; ?>
                    </td>
                    <td>
                        <button class="layui-btn layui-btn-normal">修改密码</button>
                        <button class="layui-btn layui-btn-danger">删除</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

</script>
</body>
</html>