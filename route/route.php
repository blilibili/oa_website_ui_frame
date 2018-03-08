<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

Route::get('home/index' , 'home/index/home');

Route::get('home/test' , 'index/test');

Route::get('home/list' , 'home/Index/page');

Route::get('home/upload' , 'home/upload/index');

Route::get('home/picture' , 'home/picture/index');

//打印图片
Route::get('picture/print' , 'home/Picture/printPicture');

//管理员页面
Route::get('user/admin' , 'home/Admin/index');

//登陆
Route::get('user/login' , 'home/UsersController/login');
//注册
Route::get('user/register' , 'home/UsersController/register');

Route::post('home/form/add' , 'home/Index/add');

Route::post('home/form/del' , 'home/Index/del');

//文件上传
Route::post('home/uploadHandler' , 'home/Upload/uploadHandler');

//注册写入数据库
Route::post('users/register/handler' , 'home/UsersController/registerHandler');
//登陆
Route::post('users/login/handler' , 'home/UsersController/loginHandler');
//登出
Route::post('users/logout/handler' , 'home/UsersController/loginOutHandler');
//图片上传记录信息
Route::post('upload/save/handler' , 'home/Upload/saveHandler');

return [

];
