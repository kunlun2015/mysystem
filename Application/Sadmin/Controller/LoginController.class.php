<?php
/**
 * 系统管理员登录
 * @authors Kunlun
 * @date    2016-03-09 12:43:57
 * @copyright 735767227@qq.com
 */
namespace Sadmin\Controller;
use Think\Controller;
class LoginController extends Controller {
    
    public function index(){
        if(IS_POST && IS_AJAX){
            $name     = I('post.username', '', 'htmlspecialchars');
            $password = I('post.password', '', 'htmlspecialchars');
            $sys_admin = M('sys_admin');
            $rst = $sys_admin->field('id, name, password, encrypt')->where("name='{$name}'")->find();
            if($rst){
                $input_psd = md5(md5($password).$rst['encrypt']);
                if($input_psd === $rst['password']){
                    //登陆成功
                    $s_login_info = array(
                                        'id'   => $rst['id'],
                                        'name' => $rst['name']
                                    );
                    session('s_login_info', $s_login_info);
                    $return = array('status' => 'ok', 'msg' => '登陆成功，正在跳转...', 'url' => U('Sadmin/Index/index'));                    
                }else{
                    $return = array('status' => 'fail', 'msg' => '密码输入不正确！');
                }
            }else{
                $return = array('status' => 'fail', 'msg' => '登陆用户不存在！');
            }
            exit(json_encode($return));
        }
        $this->display();
    }

}