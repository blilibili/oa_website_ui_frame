<?php
/**
 * Created by PhpStorm.
 * User: v_yigangli
 * Date: 2018/2/9
 * Time: 16:38
 */

namespace app\home\controller;


use app\home\model\Users;
use think\facade\Session;

class Admin extends Common
{
    public function __construct()
    {
        parent::__construct();
        parent::checkLoginStatus();
        $this->assign('nickname' , Session::get('name'));
    }

    public function index(){
        $user = new Users();
        $isAdmin = $user->checkIsAdmin(Session::get('username'));
        if($isAdmin){
            $this->assign('users' , $user->queryAll());
            return $this->fetch("index");
        }else{
            $this->error('您没有权限访问这一页面');
        }
    }
}