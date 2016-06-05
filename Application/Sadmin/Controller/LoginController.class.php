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
            $rst = $sys_admin->field('id, name, realname, avatar, password, encrypt, status')->where("name='{$name}' and status != 2")->find();
            if($rst){
                //是否已禁用
                if($rst['status'] == 1){
                    $return = array('status' => 'fail', 'msg' => '您的登陆账号已被禁用！');
                    exit(json_encode($return));
                }
                $input_psd = md5(md5($password).$rst['encrypt']);
                if($input_psd === $rst['password']){
                    //登陆成功
                    $s_login_info = array(
                                        'id'       => $rst['id'],
                                        'name'     => $rst['name'],
                                        'realname' => $rst['realname'],
                                        'avatar'   => $rst['avatar']
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
        //判断是否已登录，如果已登录则跳转到首页
        $s_login_info = session('s_login_info');
        if($s_login_info){
            $url = U('Sadmin/Index/index');
            header("Location: $url");
            exit();
        }
        $this->display();
    }

}