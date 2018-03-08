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

class UsersController extends Common
{
    public function login(){
        return $this->fetch("login");
    }

    public function register(){
        return $this->fetch('register');
    }

    public function registerHandler(){
        $reqParam = $this->request->param();
        $users = new Users();
        return Result($users->add($reqParam['form']));
    }

    public function loginHandler(){
        $reqParam = $this->request->param();
        $users = new Users();
        if(count($users->checkLogin($reqParam['form'])) != 0){
            //登录成功
            Session::set('name' , $users->checkLogin($reqParam['form'])[0]['nickname']);
            Session::set('username' , $users->checkLogin($reqParam['form'])[0]['username']);
            return Result(1);
        }else{
            return Result(0);
        }
    }

    public function loginOutHandler(){
        Session::clear();
        return Result(1);
    }
}