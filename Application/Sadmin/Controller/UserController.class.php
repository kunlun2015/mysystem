<?php
/**
 * 用户管理
 * @authors Kunlun (735767227@qq.com)
 * @date    2016-03-12 13:39:10
 * @copyright Kunlun
 */

namespace Sadmin\Controller;
use Think\Controller;
class UserController extends AdminController {

    public function index(){        
        $this->assign('page_title', $this->page_title.'用户管理');
        $this->display();
    }

    public function add(){
        if(IS_POST && IS_AJAX){
            $data = array(
                        'name' => I('post.username', '', 'htmlspecialchars'),
                        'realname' => I('post.realname', '', 'htmlspecialchars'),
                        'email'    => I('post.email', '', 'htmlspecialchars'),                       
                        'remark'   => I('post.remark', '', 'htmlspecialchars')
                    );
            //判断用户名是否已存在
            
            //产生8为随机字符串用于登陆密码加密
            $string           = new \Org\Util\String;
            $data['encrypt']  = $string->randString(8,'','');
            $password         = I('post.password', '', 'htmlspecialchars');
            $data['password'] = md5(md5($password).$data['encrypt']);
            $sys_admin = M('sys_admin');
            $rst = $sys_admin->data($data)->add();
            if($rst){
                $return = array('status' => 'success', 'msg' => '用户添加成功！');
            }else{
                $return = array('status' => 'fail', 'msg' => '用户添加失败，请重试！');
            }
            exit(json_encode($return));
        }
    }
}