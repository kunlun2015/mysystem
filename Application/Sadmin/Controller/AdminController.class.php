<?php
/**
 * 系统管理员后台父类，做登录权限控制
 * @authors Kunlun
 * @date    2016-03-09 12:43:57
 * @copyright 735767227@qq.com
 */

namespace Sadmin\Controller;
use Think\Controller;
class AdminController extends Controller {

    protected $page_title = 'Kunlun后台管理系统-';
 
    public function __construct(){
        parent::__construct();
        $s_login_info = session('s_login_info');
        if(!$s_login_info){
            //如果没有登陆则定向到登陆页面
            $login_url = U('Sadmin/Login/index');
            header("Location: $login_url");
            exit();
        }
        $this->assign('login_info', $s_login_info);
    }

}