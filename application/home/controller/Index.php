<?php
/**
 * Created by PhpStorm.
 * User: v_yigangli
 * Date: 2018/2/9
 * Time: 16:38
 */

namespace app\home\controller;


use app\home\model\User;
use think\facade\Session;


class Index extends Common
{
    public function __construct()
    {
        parent::__construct();
        parent::checkLoginStatus();
        $this->assign('nickname' , Session::get('name'));
    }

    public function home(){
        return $this->fetch('home');
    }
}