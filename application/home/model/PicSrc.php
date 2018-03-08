<?php
/**
 * Created by PhpStorm.
 * User: v_yigangli
 * Date: 2018/2/11
 * Time: 15:13
 */

namespace app\home\model;


use think\Model;

class PicSrc extends Model {
    public function add($arr){
        //查看是否已经注册过
        // 使用闭包查询
        return $this->save($arr);
    }
    public function checkLogin($arr){
        return $this::where($arr)->select();
    }

    //查询所有图片 按bg查
    public function queryAll($arr){
        return $this::where('bg' , $arr['bg'])->select();
    }


    public function del($id){
        return $this::where('id' , '=' , $id)->delete();
    }
}