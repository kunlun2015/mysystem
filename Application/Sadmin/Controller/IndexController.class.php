<?php
/**
 * 管理员后台首页
 * @authors Kunlun
 * @date    2016-03-09 12:43:57
 * @copyright 735767227@qq.com
 */
namespace Sadmin\Controller;
use Think\Controller;
class IndexController extends AdminController {
    public function index(){
        $this->assign('page_title', $this->page_title.'系统首页');
        $this->display();
    }
}