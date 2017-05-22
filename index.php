<?php


// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
define("WEBSITE","http://www.wblog.com/");
define("HOME_PUBLIC_PATH","/Public/");
define("HOME_VIEW_PATH","/Application/Home/View/");
define("ADMIN_VIEW_PATH","/Application/Admin/View/css/");
define("EDIT_PATH","/Application/Tool/ueditor/");
define("WEBNAME","wucux博客程序");

// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

session_start();