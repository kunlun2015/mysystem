#管理员用户表
create table kl_sys_admin(
    id int unsigned not null primary key auto_increment,
    name varchar(16) not null default '' comment '登录用户名',
    realname varchar(4) not null default '' comment '真实姓名',
    email varchar(64) not null default '' comment '用户邮箱',
    password varchar(64) not null default '' comment '登录密码',
    encrypt varchar(16) not null default '' comment '加密字符串',
    auth varchar(1024) not null default '' comment '用户功能权限列表',
    login_times int not null default 0 comment '登陆次数，默认0',
    last_login_time datetime not null default '0000-00-00 00:00:00' comment '上次登录时间',
    last_login_ip int not null default '0' comment '上次登录ip',
    is_use tinyint(1) not null default 0 comment '账号是否有效，默认0有效，1禁用',
    create_at TIMESTAMP default CURRENT_TIMESTAMP comment '记录生成时间',
    index name(name(12))
) charset=utf8 engine=myisam comment='系统管理员表'

#msyql 存储session
create table kl_session (
    session_id varchar(255) NOT NULL,
    session_expire int(11) NOT NULL,
    session_data blob,
    UNIQUE KEY `session_id` (`session_id`)
) charset=utf8 engine=innodb comment='mysql存储session'