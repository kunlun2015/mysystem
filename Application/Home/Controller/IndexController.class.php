<?php
/**
 * 网站首页
 * @authors Kunlun (735767227@qq.com)
 * @date    2016-03-13 10:42:09
 * @copyright Kunlun
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends HomeController {
    public function index(){
        $this->assign('page_title', $this->page_title.'首页');
        $this->display();
    }
}