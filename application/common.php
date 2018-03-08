<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

 function Result($status){
    $result =  array('msg' => '' , 'status' => 0);
    if($status){
        $result["msg"] = "操作成功";
        $result["status"] = $status;
    }else{
        $result["msg"] = "操作失败,请检查服务器";
        $result["status"] = $status;
    }
    return $result;
}

