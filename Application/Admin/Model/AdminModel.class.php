<?php

/**
 * User: wucux
 * Date: 2017/5/16
 * Time: 16:24
 */
namespace  Admin\Model;
use Think\Model;
class AdminModel extends Model
{
    function checkNamePwd($username,$userpwd){
        $info=$this->where("admin_name='$username'")->find();
        if($info){
            if(md5($userpwd)==$info['admin_pwd']){
                return $info;
            }
        }else{
            return false;
        }
    }
}