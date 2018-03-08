<?php
/**
 * Created by PhpStorm.
 * User: v_yigangli
 * Date: 2018/2/9
 * Time: 16:38
 */

namespace app\home\controller;

use app\home\model\PicSrc;
use app\home\model\Users;
use think\facade\Session;

class Upload extends Common
{
    public function __construct()
    {
        parent::__construct();
        parent::checkLoginStatus();
        $this->assign('nickname' , Session::get('name'));
    }

    public function index(){
        //获取当前人的信息
        $username = Session::get('username');
        $user = new Users();

        $this->assign('userInfo' , $user->queryOne($username));
        return $this->fetch('index');
    }

    public function uploadHandler(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');

        $files = [];
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $currentTime = date('Y-m-d');
            $info = $file->move('/data/website/daniel/tp5/public/uploads/'.$currentTime.'/' , '');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                $files['extension'] = $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $files['save_name'] = $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                $files['file_name'] = $info->getFilename();
                // 上传的路径
                $files['pic_src'] = '/data/website/daniel/tp5/public/uploads/'.$currentTime.'/'.$files['file_name'];
                // 返回今日日期
                $files['date'] = $currentTime;
            }else{
                // 上传失败获取错误信息
                return $file->getError();
            }
        }
        return $files;
    }


    public function saveHandler(){
        $reqParam = $this->request->param();
        $reqParam['timestamp'] = time();
        $pic = new PicSrc();
        return Result($pic->add($reqParam));
    }
}