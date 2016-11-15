<?php
return array(
	//配置 禁止访问目录
	'MODULE_DENY_LIST'=>array('Runtime','Common'),
	
	//默认成功跳转对应的模板文件
	'TMPL_ACTION_ERROR' => THINK_PATH . 'Tpl/error_show.tpl',
	//默认成功跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' => THINK_PATH . 'Tpl/error_show.tpl',
	

	
	//开始页面调试工具
	'SHOW_PAGE_TRACE'=>false,
	
	/****
	*自定义常量 (重点配置)
	*/
	'projectName'=>'range',   //设置映射后的模块名称
	'URL'=>'www.wechat.com',  //设置站点网址
);
