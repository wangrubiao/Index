<?php
/********
*P函数
*/
function P($arr){
	echo "<pre>";
    return var_dump($arr);
}
/********
*PHP5.5以上的版本支持array_column函数
*为了兼容低版本自定义该函数
*在5.5版本中可以删除该函数，直接调用array_column系统函数
*/
function i_array_column($input, $columnKey, $indexKey=null){
    if(!function_exists('array_column')){ 
        $columnKeyIsNumber  = (is_numeric($columnKey))?true:false; 
        $indexKeyIsNull            = (is_null($indexKey))?true :false; 
        $indexKeyIsNumber     = (is_numeric($indexKey))?true:false; 
        $result                         = array(); 
        foreach((array)$input as $key=>$row){ 
            if($columnKeyIsNumber){ 
                $tmp= array_slice($row, $columnKey, 1); 
                $tmp= (is_array($tmp) && !empty($tmp))?current($tmp):null; 
            }else{ 
                $tmp= isset($row[$columnKey])?$row[$columnKey]:null; 
            } 
            if(!$indexKeyIsNull){ 
                if($indexKeyIsNumber){ 
                  $key = array_slice($row, $indexKey, 1); 
                  $key = (is_array($key) && !empty($key))?current($key):null; 
                  $key = is_null($key)?0:$key; 
                }else{ 
                  $key = isset($row[$indexKey])?$row[$indexKey]:0; 
                } 
            } 
            $result[$key] = $tmp; 
        } 
        return $result; 
    }else{
        return array_column($input, $columnKey, $indexKey);
    }
 }
 /********
 *Md5重复加密
 */
 function XMd($str){
    $val    = 'dad3jhsgs343xjxsjjh';
    $result = md5(md5($str.$val));
    return $result;
}
/********
*获取IP地址
*/
function getIpAddr($clientIP){
    import('ORG.Net.IpLocation');
    $Ip = new \Org\Net\IpLocation('UTFWry.dat');
    $area = $Ip->getlocation($clientIP);
    return $area['country'];
}
/********
*邮件提醒
*/
function sendMail($to, $title, $content) {
    Vendor('PHPMailer.PHPMailerAutoload');
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_USERNAME'); //发件人邮箱名
    $mail->Password = C('MAIL_PASSWORD') ; //163邮箱发件人授权密码
    $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to,"尊敬的客户");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    return($mail->Send());
}
/********
*推送Api
*参数1：标识(区分推送的类型)
*参数2：推送的内容array方式
*客户资料格式：array("name"=>"客户@李斯", "mob"=>"13570454547","color"=>"黄色","size"=>"170/M")
*/
function JPush($type,$array) {
    Vendor('JPush.JPush');
    $app_key = '179239acc86455b18a78ab71';
    $master_secret = '4089dab4bfbb04e7f1cbd2bf';
    $client = new JPush($app_key, $master_secret);
    $log_path = null;
    $max_retry_times = null;
    $client = new JPush($app_key, $master_secret, $log_path, $max_retry_times);

    $push = $client->push();
    $push->setPlatform('all');
    $push->setPlatform('ios', 'android');
    $push->addAllAudience();
    $push->setAudience('all');

    $push->setMessage($msg_content = $type,$title=null, $content_type=null, $extras=$array);
    
    $push->setOptions($sendno=null, $time_to_live=864000, $override_msg_id=null, $apns_production=null, $big_push_duration=null);

    $push->build();
    //$push->printJSON();
    $push->send();
}
/********
*终端判断 判断访问是否为pc或者wap
*/
function check_wap()
    {
        // 先检查是否为wap代理，准确度高
        if(stristr($_SERVER['HTTP_VIA'],"wap")){
            return true;
        }
        // 检查浏览器是否接受 WML.
        elseif(strpos(strtoupper($_SERVER['HTTP_ACCEPT']),"VND.WAP.WML") > 0){
            return true;
        }
        //检查USER_AGENT
        elseif(preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera |Googlebot-Mobile|YahooSeeker\/M1A1-R2D2|android|iphone|ipod|mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])){
            return true;       
        }else{
            //PC端
            return false;  
        }
    }
/********
*XML转成Array
*/
function turnXml($xmlstring)
    {
        $str = json_decode(json_encode((array)simplexml_load_string($xmlstring)), true);
        return $str;
    }
/********
*curl post请求
*参数1：请求的url
*参数2：需要post的数据，array格式
*/
function curl($url,$data)
{
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, 1 );
    curl_setopt ( $ch, CURLOPT_HEADER, 0 );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
    $curlstring = curl_exec ( $ch );
    curl_close ($ch);
    return $curlstring;
}
/********
*短信接口
*/
function message($tel,$order)
    {
        $url = "http://api.chanyoo.cn/utf8/interface/send_sms.aspx";
        $data = array (
                'username' => 'callback',
                'password' => '06291013',
                'receiver' => $tel,
                'content' => '尊敬的客户，您的订单已成功提交，订单号：'.$order.'。我司将会在24小时内安排发货。感谢您的支持！【左格斯服装】',
            );
        $str = turnXml(curl($url,$data));
        return $str;
    }   

?>