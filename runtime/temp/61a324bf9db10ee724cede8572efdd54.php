<?php /*a:1:{s:80:"/Users/liyigang/Desktop/tp5/application/home/view/users_controller/register.html";i:1519703028;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陆</title>
    <link href="/layui/css/layui.css" rel="stylesheet" media="all" />
    <link  href="/css/login.css" rel="stylesheet" />
    <script src="/js/jquery.min.js"></script>
    <script src="/js/md5.js"></script>
</head>
<body>
<div>
    <div class="head_box">
        <h2 class="head_logo">金华鉴图片发布系统</h2>
    </div>
    <div class="login-panel">
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <li>注册</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <form class="layui-form"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">用户名:</label>
                            <div class="layui-input-block">
                                <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">密码:</label>
                            <div class="layui-input-block">
                                <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">昵称:</label>
                            <div class="layui-input-block">
                                <input type="text" name="nickname" placeholder="请输入昵称" autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit lay-filter="*">注册</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                        <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/layui/layui.js"></script>
<script>
    layui.define(['form'], function(exports){

        //……

        exports('form', layui.form);
    });
    layui.use('form', function(){
        var form = layui.form;
        form.on('submit(*)', function(data){
            var formField = data.field; //当前容器的全部表单字段，名值对形式：{name: value}
            formField.password = hex_md5(formField.password);
            formField.competence = 1;

            $.ajax({
                method:'post',
                url:'/users/register/handler',
                data:{form:formField},
                success:function(msg){
                    if(msg.status){
                        layer.open({
                            title: '成功'
                            ,content: '注册成功，点击确认跳转到登录页',
                            yes:function(){
                                window.location.href = '/user/login';
                            }
                        });
                    }
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        //各种基于事件的操作，下面会有进一步介绍
    });
</script>
</body>
</html>