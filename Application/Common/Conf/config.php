<?php
return array(
	//配置 禁止访问目录
	'MODULE_DENY_LIST'=>array('Runtime','Common','Home'),
	
		//PDO连接方式
	'DB_TYPE'      =>  'mysql',     // 数据库类型
	'DB_HOST'      =>  '120.24.186.143',     // 服务器地址
	'DB_NAME'      =>  'fruits',     // 数据库名
	'DB_USER'      =>  'fruits',     // 用户名
	'DB_PWD'       =>  '06291013',     // 密码
	'DB_PORT'      =>  '',     // 端口
	'DB_PREFIX'    =>  'wx_',     // 数据库表前缀
	'DB_DSN'       =>  '',     // 数据库连接DSN 用于PDO方式
	'DB_CHARSET'   =>  'utf8', // 数据库的编码 默认为utf8
	
	//模块映射
	'URL_MODULE_MAP'    =>    array('range'=>'admin'),
	//设置url模式
	'URL_MODEL'=>2,
	//设置错误提示
	'ERROR_MESSAGE'         =>  '404 Not Found...',	//错误显示信息,非调试模式有效
	//域名部署
	'APP_SUB_DOMAIN_DEPLOY'   =>    1, // 开启子域名配置
	'APP_SUB_DOMAIN_RULES'    =>    array(   
    	'www.fruits.com'  => 'Fruits',  // admin.domain1.com域名指向Admin模块
    	'www.yerish.com'   => 'Yeris',  // test.domain2.com域名指向Test模块
	),
	
);