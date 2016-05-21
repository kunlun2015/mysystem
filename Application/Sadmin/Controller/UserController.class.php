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
        $sys_admin  = M('sys_admin');
        $count      = $sys_admin->count();
        $Page       = new \Think\Page($count, 10);
        $pagination = $Page->show(); 
        $list       = $sys_admin->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list', $list);
        $this->assign('pagination', $pagination);
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
            $sys_admin = M('sys_admin');
            //判断用户名是否已存在
            $is_user = $sys_admin->where(array('name' => $data['name']))->find();
            if($is_user){
                $return = array('status' => 'fail', 'msg' => '用户名已存在，请更换用户名！');
                exit(json_encode($return));
            }
            
            //产生8为随机字符串用于登陆密码加密
            $string           = new \Org\Util\String;
            $data['encrypt']  = $string->randString(8,'','');
            $password         = I('post.password', '', 'htmlspecialchars');
            $data['password'] = md5(md5($password).$data['encrypt']);
            
            $rst = $sys_admin->data($data)->add();
            if($rst){
                $return = array('status' => 'success', 'msg' => '用户添加成功！');
            }else{
                $return = array('status' => 'fail', 'msg' => '用户添加失败，请重试！');
            }
            exit(json_encode($return));
        }
    }

    //获取用户详细信息
    public function userInfo(){
        $id = I('post.id', 0, 'int');
        $sys_admin = M('sys_admin');
        $rst = $sys_admin->field('id, name, realname, email, remark')->where("id=$id")->find();
        if($rst){
            $return = array('status' => 'success', 'data' => $rst, 'msg' => '数据获取成功！');
        }else{
            $return = array('status' => 'fail', 'msg' => '数据获取失败，请重试！');
        }
        exit(json_encode($return));
    }

    //修改用户信息
    public function edit(){
        $data['id']       = I('post.user_id', 0, 'int');
        $data['realname'] = I('post.realname', '', 'htmlspecialchars');
        $data['email']    = I('post.email', '', 'htmlspecialchars');
        $data['remark']   = I('post.remark', '', 'htmlspecialchars');
        $sys_admin = M('sys_admin');
        $rst = $sys_admin->where("id={$data['id']}")->data($data)->save();
        if($rst !== false){
            $return = array('status' => 'success', 'msg' => '数据更新成功！');
        }else{
            $return = array('status' => 'fail', 'msg' => '数据更新失败，请重试！');
        }
        exit(json_encode($return));
    }

    //修改登录密码
    public function editPsd(){
        $id               = I('post.user_id', 0, 'int');
        $password_old     = I('post.password_old', '', 'htmlspecialchars');   
        $password         = I('post.password', '', 'htmlspecialchars');     
        $sys_admin = M('sys_admin');
        //验证原密码是否正确
        $rst = $sys_admin->field('password, encrypt')->where("id=$id")->find();
        if($rst){            
            //产生8为随机字符串用于登陆密码加密            
            if(md5(md5($password_old).$rst['encrypt']) === $rst['password']){
                $string           = new \Org\Util\String;
                $data['encrypt']  = $string->randString(8,'','');            
                $data['password'] = md5(md5($password).$data['encrypt']);
                $rst = $sys_admin->where("id=$id")->data($data)->save();
                if($rst !== false){
                    $return = array('status' => 'success', 'msg' => '密码修改成功！');
                }else{
                    $return = array('status' => 'fail', 'msg' => '密码修改失败，请重试！');
                }                
            }else{
                $return = array('status' => 'fail', 'msg' => '原密码输入不正确!');                
            }      
        }else{
            $return = array('status' => 'fail', 'msg' => '用户不存在!');           
        }
        exit(json_encode($return));      
    }
}