<?php
/**
 * 
 * @authors Kunlun (735767227@qq.com)
 * @date    2016-05-29 15:47:08
 * @copyright Kunlun
 */
namespace Sadmin\Controller;
use Think\Controller;
class MyController extends AdminController {

    public function profile(){
        $this->assign('page_title', $this->page_title.'个人信息管理');
        $sys_admin = M('sys_admin');
        //用户信息
        $user_info = $sys_admin->field('name, realname, avatar')->where("id = {$this->login_info['id']}")->find();
        $this->login_info['avatar'] = $user_info['avatar'];
        $this->assign('user_info', $user_info);
        $this->display();
    }

    public function avatarEdit(){
        $this->assign('page_title', $this->page_title.'头像修改'); 
        $sys_admin = M('sys_admin');
        $user_info = $sys_admin->field('name, avatar')->where("id = {$this->login_info['id']}")->find();
        $avatar = $user_info['avatar'].$user_info['name'].'_big.png';
        if(!file_exists(C('upload_root').$avatar)){
            $avatar = C('site_url').'static/images/profile_user.jpg';
        }else{
            $avatar = C('site_url').'upload/'.$avatar;
        }
        $this->assign('avatar', $avatar);
        $this->display();
    }

    //保存头像
    public function avatarSave(){
        $avator_stream = file_get_contents('php://input');
        $data = explode('--------------------', $avator_stream);
        $date_path = 'avatar/'.date('Y').'/'.date('m').'/'.date('d').'/';
        $avator_save_path = C('upload_root').$date_path;
        if(!is_dir($avator_save_path)){
            mkdir($avator_save_path, 0777, true);
        }
        @file_put_contents($avator_save_path.$this->login_info['name'].'_big.png', $data[0]);
        @file_put_contents($avator_save_path.$this->login_info['name'].'_middle.png', $data[1]);
        @file_put_contents($avator_save_path.$this->login_info['name'].'_small.png', $data[2]);
        $sys_admin = M('sys_admin');
        $data = array('id'=>$this->login_info['id'], 'avatar'=>$date_path);
        $res = $sys_admin->data($data)->save();
        $return = array('status' => '1', 'msg' => '头像上传成功！',);
        exit(json_encode($return));
    }
}