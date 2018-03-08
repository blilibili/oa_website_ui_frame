<?php
/**
 * Created by PhpStorm.
 * User: v_yigangli
 * Date: 2018/2/11
 * Time: 15:13
 */

namespace app\home\model;


use think\Model;

class User extends Model {
    public function add($arr){
        //查看是否已经注册过
        // 使用闭包查询
        $status = $this::where('username',$arr["username"])->find();
        if($status){
            return 0;
        }else{
            return $this->save($arr);
        }
    }

    public function queryAll(){
        return $this::all();
    }

    public function del($id){
        return $this::where('id' , '=' , $id)->delete();
    }
}