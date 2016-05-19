<?php
/**
 * 表单令牌生成
 * @authors Kunlun (735767227@qq.com)
 * @date    2016-05-08 22:59:20
 * @copyright Kunlun
 */

return array(
     // 添加下面一行定义即可
     //'view_filter' => array('Behavior\TokenBuild'),
    // 如果是3.2.1以上版本 需要改成
    'view_filter' => array('Behavior\TokenBuildBehavior'),
);