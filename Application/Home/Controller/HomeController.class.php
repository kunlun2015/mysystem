<?php
/**
 * 网站前台控制器父类
 * @authors Kunlun (735767227@qq.com)
 * @date    2016-03-13 10:42:09
 * @copyright Kunlun
 */
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller {
    
    protected $page_title = 'XX网-';

    function __construct(){
        parent::__construct();   
    }
}