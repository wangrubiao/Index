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
		//老叶域名部署
		'yerish.com'  => 'Yeris',
		'www.yerish.com'  => 'Yeris',
		//王世邦域名部署
		//'huiket.com'  => 'Fruits',
		'www.huiket.com'  => 'Wong',
		/******
		*单页推广商品域名部署
		*第一步：解析域名
		*第二步：设置301重定向
		*第二部：填写子域名和商品id
		*/
		'506.yerish.com'  => array('Wong','id=5'),  // 506货号商品
		'8104.yerish.com'  => array('Wong','id=6'),  // 8104货号商品
		
		
	),
	
	/****
	*配置邮箱发送(QQ邮箱)
	*/
	'MAIL_HOST' =>'smtp.qq.com',//smtp服务器的名称
	'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
	'MAIL_USERNAME' =>'270264127@qq.com',//发件人邮箱名
	'MAIL_PASSWORD' =>'06291013',//qq邮箱发件人独立密码
	'MAIL_FROM' =>'270264127@qq.com',//发件人地址
	'MAIL_FROMNAME'=>'恋狱',//发件人姓名（qq邮箱昵称）
	'MAIL_CHARSET' =>'utf-8',//设置邮件编码
	'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
);