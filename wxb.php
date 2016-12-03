<?php

$code = $_GET;
p($code);
echo "这是回调页面！wxb";
exit;

$getInfo =  getWxAccessToken($code['code']); //获取access_token

getWxInfo($getInfo);

//echo "<img src='http://wx.qlogo.cn/mmopen/SBRsfnp03sFaCXsbL9B2Paw8c5ZbG44msohJkq02gDJh7xQQic9WCvWTia9gXjHPEyjUtLZRLsR8147JvicjkTKrWGUAoX5gicWC/0' width='45' height='45'/>";

function getWxAccessToken($code){
		/***
		*获取access_token
		*/
		$appid = 'wxfb4897179e8fbdeb';
		$appsecret =  '3283a1e73353d3d0709a7fc6cb730ecc';
		$code = $code;
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$appsecret."&code=".$code."&grant_type=authorization_code";

		$ch = curl_init();
		curl_setopt($ch , CURLOPT_URL, $url);
		curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
		$res = curl_exec($ch);
		curl_close( $ch );
		if( @curl_errno($ch) ){
			var_dump( curl_error($ch) );
		}
		$arr = json_decode($res, true);
		p($arr);
		return $arr;
	}
function getWxInfo($arr){
		/***
		*获取用户信息
		*/
		$access_token = $arr['access_token'];
		$openid = $arr['openid'];
		$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";

		$ch = curl_init();
		curl_setopt($ch , CURLOPT_URL, $url);
		curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
		$res = curl_exec($ch);
		curl_close( $ch );
		if( @curl_errno($ch) ){
			var_dump( curl_error($ch) );
		}
		$arr = json_decode($res, true);
		p($arr);
	}
function p($str){
		echo '<pre>';
		print_r($str);
}
?>

