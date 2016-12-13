<?php
/****
*微信api
*
*/
namespace Admin\Controller;
use Think\Controller;

define("TOKEN", "weixin");
class WeChatController extends Controller {
    public function index(){
		//$this->valid();
		$this->responseMsg();
    }
	public function valid()
    {
		ob_clean();
        $echoStr = $_GET["echostr"];
        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	 public function responseMsg()
    {
		//1.获取到微信推送过来post数据（xml格式）
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		if (!empty($postStr)){
                libxml_disable_entity_loader(true); 
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);//把 XML 字符串载入对象中。
				
				//回复事件
				if(!empty($postObj->Content))
                {
					$Model = D('Wechat');
					
					$fromUsername = $postObj->FromUserName;
					$toUsername   = $postObj->ToUserName;
					$keyword      = trim($postObj->Content);
					$time 		  = time();
					$textTpl 	  = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
						</xml>";
					$msgType = "text";
					//$contentStr = "Welcome to wechat world!";
					$contentStr = $Model->replyMes();
					$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
					echo $resultStr;
                }else{
                	echo "Input something...";
                }
				
			if(strtolower( $postObj->MsgType) == 'event'){
			//订阅事件
			if( strtolower($postObj->Event == 'subscribe') ){
				//回复用户消息(纯文本格式)	
				$Model = D('Wechat');
				echo $Model->eventType($postObj);
			}
			//取消订阅
			if( strtolower($postObj->Event == 'unsubscribe') ){
				
			}
		}
			
			
			
			
			
        }else {
        	echo "非法请求！";
        	exit;
        }
    }
}