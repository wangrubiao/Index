<?php
/***
*@ Wechat Model
*@ 处理微信各类事件
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Model;
use Think\Model;

class WechatModel extends Model{

	protected $_validate = array(
		array('position','','该职位已经存在',0,'unique',5,array()),
	);
	public function eventType($postObj)
	{
		//订阅事件
		$toUser   = $postObj->FromUserName;
		$fromUser = $postObj->ToUserName;
		$time     = time();
		$msgType  =  'text';
		$content  = '模型欢迎关注我们的微信公众账号'.$postObj->FromUserName.'-'.$postObj->ToUserName;
		$template = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Content><![CDATA[%s]]></Content>
					</xml>";
		$info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
		return $info;
		/*$list = M('grade');
		$val['id']=array('eq',1);
		$result = $list->where($val)->select();
		return $result;*/
	}
	/*
	*回复事件
	*/
	public function replyMes()
	{
		return "欢迎发我信息！";
	}
}

?>