<?php
/**
 * 管理员后台父类，做登录权限控制
 * @authors Kunlun
 * @date    2016-03-09 12:43:57
 * @copyright 735767227@qq.com
 */
namespace Uadmin\Controller;
use Think\Controller;
class LoginController extends Controller {
    
    public function index(){
        $this->display();
    }

}