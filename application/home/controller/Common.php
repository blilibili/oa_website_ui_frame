<?php
/**
 * Created by PhpStorm.
 * User: liyigang
 * Date: 26/2/18
 * Time: PM10:57
 */
namespace app\home\controller;

use think\facade\Session;

class Common extends \think\Controller{
    public function checkLoginStatus(){
        if(Session::get('name')){
            $time = date('H');
            $timeWord = '';
            switch ($time){
                case $time < 6:
                    $timeWord = '上午好';
                    break;
                case $time < 14:
                    $timeWord = '中午好';
                    break;
                case $time < 18:
                    $timeWord = '下午好';
                    break;
                case $time < 23:
                    $timeWord = '晚上好';
                    break;
            }
            $this->assign('time' , $timeWord);
            return true;
        }else{
            $this->redirect('/user/login');
        }
    }
}