<?php
return array(
	//'配置项'=>'配置值'
    'site_url' => 'http://localhost/amos/git/mysystem/',
    'SHOW_PAGE_TRACE' =>true,

    'URL_MODEL' => 2,

    'TOKEN_ON'=>true,  // 是否开启令牌验证
    'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true

    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'my_system', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '123@wepartner', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'kl_', // 数据库表前缀 
    'DB_CHARSET'=> 'utf8', // 字符集


    //'SESSION_TYPE'=>'Db'
    // 或者
    'SESSION_OPTIONS' => array(
                            'type'   => 'db',
                            'expire' => 1440
                        ),
    'SESSION_TABLE' => 'kl_session',
    'SESSION_TYPE' => 'Db', // session hander类型 默认无需设置 除非扩展了session hander驱动
);