<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo ($page_title); ?></title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="<?php echo C('STATIC_URL');?>css/common.css" rel="stylesheet">
<link href="<?php echo C('STATIC_URL');?>css/theme.css" rel="stylesheet">
<script src="<?php echo C('STATIC_URL');?>js/jquery-1.12.1.min.js"></script>
</head>
<body>
    <div class="top-bar">
        <div class="top-bar-inner">
            <span>XX网站欢迎您！</span>
            <span class="add-favorite">收藏本站</span>
        </div>
    </div>
    <div class="header">
        <div class="logo"><img src="<?php echo C('STATIC_URL');?>img/logo.png" alt=""></div>
        <div class="site-info"></div>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="">
                    <span>首页</span>
                </a>
            </li>
            <li>
                <a href="">
                    <span>父菜单</span>
                </a>
                <dl class="sub-menu">
                    <dd>
                        <a href="">子菜单富国天惠</a>
                    </dd>
                    <dd>
                        <a href="">子菜单</a>
                    </dd>
                </dl>
            </li>
            <li>
                <a href="">
                    <span>父菜单</span>
                </a>
                <dl class="sub-menu">
                    <dd>
                        <a href="">子菜单</a>
                    </dd>
                    <dd>
                        <a href="">子菜单</a>
                    </dd>
                </dl>
            </li>
        </ul>
    </div>    
    <div class="wrap">
        <div class="slide-pic">
            
        </div>
    </div>
    <script>
        $(function(){
            $('.menu ul li').hover(function(){
                if($(this).find('dl.sub-menu').length > 0){
                    $(this).find('dl.sub-menu').slideDown(200);   
                }
                return false;
            },function(){
                if($(this).find('dl.sub-menu').length > 0){
                    $(this).find('dl.sub-menu').slideUp(200);   
                }    
            })            
        })
    </script>
</body>
</html>