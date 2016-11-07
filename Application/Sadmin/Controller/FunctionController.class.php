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
        $functions     = M('functions');        
        $count         = $functions->where("status = 0 and pid = 0")->count();
        $Page          = new \Think\Page($count, 10);
        $pagination    = $Page->show(); 
        $function_list = $functions->where("status = 0 and pid = 0")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('function_list', $function_list);
        $this->assign('pagination', $pagination);
        $this->display();
    }

    //添加菜单
    public function add(){
        if(IS_POST && IS_AJAX){
            $data = array(
                    'title'      => I('post.title', '', 'htmlspecialchars'),
                    'style'      => I('post.style', '', 'htmlspecialchars'),
                    'module'     => I('post.module', '', 'htmlspecialchars'),
                    'controller' => I('post.controller', '', 'htmlspecialchars'),
                    'method'     => I('post.method', '', 'htmlspecialchars'),
                    'sort'       => I('post.sort', '', 'int'),
                    'remark'     => I('post.remark', '', 'htmlspecialchars')
                );
            $functions = M('functions');
            $rst = $functions->data($data)->add();
            if($rst){
                $return = array('status' => 'success', 'msg' => '功能添加成功！');
            }else{
                $return = array('status' => 'fail', 'msg' => '功能添加失败，请重试！');
            }
            exit(json_encode($return));
        }        
    }
}