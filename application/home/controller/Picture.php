<?php

namespace app\home\controller;

use app\home\model\PicSrc;
use app\home\model\Users;
use think\facade\Session;

class Picture extends Common
{
    public function __construct()
    {
        parent::__construct();
        parent::checkLoginStatus();
        $this->assign('nickname' , Session::get('name'));
    }

    public function index(){
        $pic = new PicSrc();
        $username= Session::get("username");
        $user = new Users();
        $picInfo = $pic->queryAll($user->queryOne($username));
        foreach ($picInfo as $key => $value){
            $picInfo[$key]["nickname"] = $user->queryOne($username)["nickname"];
            $value['pic_src'] = json_decode($value['pic_src'] , true);
        }

        $this->assign("picture" , $picInfo);

        return $this->fetch("index");
    }

    public function printPicture(){
        return $this->fetch("print_picture");
    }
}