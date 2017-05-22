<?php

/**
 * User: wucux
 * Date: 2017/5/16
 * Time: 15:23
 */
namespace Admin\Controller;
use Admin\Model\AdminModel;
use Think\Controller;
use Think\Verify;

class ManagerController extends Controller
{
    function login(){
        $admin=new AdminModel();
        if(!empty($_POST)){
            $vrf=new Verify();
            if($vrf->check($_POST['captcha'])){
                $name=$_POST["admin_user"];
                $pwd=$_POST["admin_pwd"];
                $info=$admin->checkNamePwd($name,$pwd);
                if($info){
                    session("admin_name",$name);
                    $this->redirect("Index/index",array(),2,"登陆成功，正在跳转...");
                }else{
                    $this->redirect("Manager/Login",array(),2,"用户名密码错误！！！");
                }
            }else{
                $this->redirect("Manager/Login",array(),2,"验证码输入错误！！！");
            }
        }
        $this->display();
    }

    function logout(){
        session(null);
        $this->redirect("Manager/Login");
    }

    function verify(){
        $cfg=array(
            'imageH'   => 35,
            'imageW'   =>  120,
            'fontSize'=>16,
            'length' =>4,
            'fontttf'=>'4.ttf',
        );
        $verif=new Verify($cfg);
        echo $verif->entry();
    }
}