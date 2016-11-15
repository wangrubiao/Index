<?php
return array(
	//配置 禁止访问目录
	'MODULE_DENY_LIST'=>array('Runtime','Common'),
	
	//PDO连接方式
	'DB_TYPE'      =>  'mysql',     // 数据库类型
	'DB_HOST'      =>  'localhost',     // 服务器地址
	'DB_NAME'      =>  'weixin',     // 数据库名
	'DB_USER'      =>  'root',     // 用户名
	'DB_PWD'       =>  '',     // 密码
	'DB_PORT'      =>  '',     // 端口
	'DB_PREFIX'    =>  'wx_',     // 数据库表前缀
	'DB_DSN'       =>  '',     // 数据库连接DSN 用于PDO方式
	'DB_CHARSET'   =>  'utf8', // 数据库的编码 默认为utf8
	
	//默认成功跳转对应的模板文件
	'TMPL_ACTION_ERROR' => THINK_PATH . 'Tpl/error_show.tpl',
	//默认成功跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' => THINK_PATH . 'Tpl/error_show.tpl',
	

	//开始页面调试工具
	'SHOW_PAGE_TRACE'=>false,
	/****
	*自定义常量
	*/
	'projectName'=>'Mall', 
	'URL'=>'www.wechat.com', 
	
	'MAIL_HOST' =>'smtp.qq.com',//smtp服务器的名称
	'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
	'MAIL_USERNAME' =>'270264127@qq.com',//发件人邮箱名
	'MAIL_PASSWORD' =>'06291013',//qq邮箱发件人独立密码
	'MAIL_FROM' =>'270264127@qq.com',//发件人地址
	'MAIL_FROMNAME'=>'诸葛孔明',//发件人姓名（qq邮箱昵称）
	'MAIL_CHARSET' =>'utf-8',//设置邮件编码
	'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
);
