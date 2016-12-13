<?php
/****
*微信api
*
*/
namespace Admin\Controller;
use Think\Controller;

//define("TOKEN", "weixin");
class QapiController extends Controller {
    public function index(){
		//$this->valid();
		//$this->responseMsg();
		if($_POST){
		$ret = print_r($_POST, TRUE);
			echo("<&&>SendMessage<&>13873489<&>收到数据：\n$ret");
		}
		
    }
}