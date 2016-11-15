<?php
/***
*公共函数
*/
/******
*支付宝付款api
*alipay()
*参数1:订单金额
*参数2:订单号和码数(展示给客户看)
*参数3:返回订单id给第三方平台(回调给系统标识付款完成)
*/
function alipay($arr){
    //ob_clean();
	
	header('Content-type: text/html; charset=utf-8');
    Vendor ('Bmob.lib.BmobPay#class');
    $bmobPay = new BmobPay();
    $title='订单号:'.$arr["order"].'  产品:'.$arr['product'].'-'.$arr["size"];
    $res = $bmobPay->webPay((int)$arr["mey"], $title,(string)$arr["order"]);
    //调起Web支付接口，返回的html，输出在此页面中，将自动跳转到支付宝支付页面。
    $html = $res->html;
    return ($html);
}
/******
*查询订单状态
*根据订单号号查询是否支付成功
*/
function alipayReturn($order){
    Vendor ('Bmob.lib.BmobPay#class');
    $bmobPay = new BmobPay();
    $res = $bmobPay->getOrder($order);  //查询订单
    return ($res);
}
/******
*把对象转成数组
*/
function object_array($array) {  
    if(is_object($array)) {  
        $array = (array)$array;  
     } if(is_array($array)) {  
         foreach($array as $key=>$value) {  
             $array[$key] = object_array($value);  
             }  
     }  
     return $array;  
}
?>