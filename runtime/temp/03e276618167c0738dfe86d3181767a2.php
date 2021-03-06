<?php /*a:1:{s:77:"/Users/liyigang/Desktop/tp5/application/home/view/users_controller/login.html";i:1519703028;}*/ ?>
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
                    <li>登陆</li>
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
                                    <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input input-password">
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit lay-filter="*">登陆</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                    <a href="/user/register"><button type="button" class="layui-btn layui-btn-primary">去注册</button></a>
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
                var formField = data.field //当前容器的全部表单字段，名值对形式：{name: value}
                formField.password = hex_md5(formField.password);

                $.ajax({
                    method:'post',
                    url:'/users/login/handler',
                    data:{form:formField},
                    success:function(msg){
                        if(msg.status){
                            layer.open({
                                title: '成功'
                                ,icon:1
                                ,content: '登陆成功，三秒后跳转到首页',
                            });
                            setTimeout(function(){
                                window.location.href = '/home/index';
                            } , 2000)
                        }else{
                            layer.open({
                                title: '失败'
                                ,icon:5
                                ,content: '密码错误,请重新输入',
                                yes:function(index){
                                    $('.input-password').val('');
                                    layer.close(index);
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