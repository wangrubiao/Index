<?php
/**
 *@ 微信公众号核心部分
 */
namespace Fruits\Controller;
use Think\Controller;
class WechatController extends Controller {
	private $appid;
	private $appsecret;
	//private $code;
	public function _initialize(){
		$this->appid = 'wxfb4897179e8fbdeb';
		$this->appsecret = '3283a1e73353d3d0709a7fc6cb730ecc';
		//$this->code = $code;
	} 
	/**
	 *判断是否微信浏览器打开
	 */
	public function is_Wechat()
	{  
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {  
			return true;  
		}    
			return false;  
	}  
	/**
	 *获取用户信息
	 */
	public function getWxInfo($code){
		$arr = $this->getWxAccessToken($code);
		$access_token = $arr['access_token'];
		$openid = $arr['openid'];
		$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$arr['access_token']."&openid=".$arr['openid']."&lang=zh_CN";
		return $this->wechatCurl($url);
	}
	/**
	 *获取access_token
	 */
	private function getWxAccessToken($code){
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->appid."&secret=".$this->appsecret."&code=".$code."&grant_type=authorization_code";
		$arr = $this->wechatCurl($url);
		if(empty($arr['openid'])){
			//刷新token
			$arr = $this->refresh_token(session('refresh_token'));
		}else{
			session('refresh_token',$arr['refresh_token']);
		}
		return $arr;
	}
	/**
	 *刷新access_token
	 */
	private function refresh_token($token){
		$url = "https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=".$this->appid."&grant_type=refresh_token&refresh_token=".$token;
		return $this->wechatCurl($url);
	}
	/**
	 *Curl请求
	 */
	private function wechatCurl($url){
		$ch = curl_init();
		curl_setopt($ch , CURLOPT_URL, $url);
		curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
		$res = curl_exec($ch);
		curl_close( $ch );
		if( @curl_errno($ch) ){
			var_dump( curl_error($ch) );
		}
		$arr = json_decode($res, true);
		return $arr;
	}
}