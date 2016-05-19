<?php
/**
 * 系统功能管理
 * @authors Kunlun (735767227@qq.com)
 * @date    2016-03-12 13:45:26
 * @copyright Kunlun
 */

namespace Sadmin\Controller;
use Think\Controller;
class FunctionController extends AdminController {
    public function index(){
        $this->assign('page_title', $this->page_title.'功能管理');
        $this->display();
    }
}