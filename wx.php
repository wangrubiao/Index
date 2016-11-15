<?php

function getCode(){
		$appid = 'wxfb4897179e8fbdeb';
		$url = 'http%3a%2f%2fhuiket.com';
		$scope = 'snsapi_base';
		
		$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$url."&response_type=code&scope=".$scope."&state=STATE#wechat_redirect ";
		$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxfb4897179e8fbdeb&redirect_uri=http%3a%2f%2fhuiket.com&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
		$ch = curl_init();
		curl_setopt($ch , CURLOPT_URL, $url);
		curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
		$res = curl_exec($ch);
		curl_close( $ch );
		if( @curl_errno($ch) ){
			var_dump( curl_error($ch) );
		}
		$arr = json_decode($res, true);
		print_r($arr);
		return $arr;	
}
getCode();
?>

