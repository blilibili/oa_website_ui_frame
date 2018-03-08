<?php
/**
 * Created by PhpStorm.
 * User: v_yigangli
 * Date: 2018/2/11
 * Time: 15:13
 */

namespace app\home\model;


use think\Model;

class Users extends Model {
    public function add($arr){
        //查看是否已经注册过
        // 使用闭包查询
        return $this->save($arr);
    }
    public function checkLogin($arr){
        return $this::where($arr)->select();
    }

    //查询所有用户
    public function queryAll(){
        return $this::all();
    }

    //根据用户名查找当前的信息
    public function queryOne($username){
        return $this::where('username' , $username)->find();
    }

    //查询是否是管理员
    public function checkIsAdmin($username){
        $result = $this::where('username' , $username)->find();
        if($result['competence'] == 'admin'){
            return true;
        }else{
            return false;
        }
    }

    public function del($id){
        return $this::where('id' , '=' , $id)->delete();
    }
}