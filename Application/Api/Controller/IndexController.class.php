<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	private $userid;  //用户账号
	private $token; //客户端key
	private $pctime; //客户端提交时间
	
	private $key;  //服务端key
	private $model; //模型类
	
	/**
	* 构造函数
	*/
	protected function _initialize()
	{
		extract(I());
		header('content-type:application/json;charset=utf8');
		//接收客户端数据初始化
		$this->userid = $userid;
		$this->token = $token;
		$this->pctime = substr($token,-12)/74;

		//开启签名模式
		$json  = json_decode($this->sign());
		if($json->code != 2000)
		{
			echo $this->sign();
			exit;
		}
	}
	public function index(){
		echo $this->sign(); //授权通过提示
	}
	/**
	* 用户登录
	*/
	public function login(){
		extract(I());
		//echo md5($pwd);
		$val['userid'] = array('eq',$userid);
		$val['pwd'] = array('eq',md5($pwd));
		$result= M('Member')->where($val)->select();
		if($result){
			$arr = $result;
		}else{
			$arr = array(
						'code'=>'4002',
						'msg'=>'账号或者密码错误'
						);
		}
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);  
	}
	/**
	* 会员资料
	* 参数 current_user 为要查询的会员账号
	*/
	public function getUserInfo()
	{	
		extract(I());
		$val['userid'] = array('eq',$current_user);
		$result= M('Member')->where($val)->select();
		if($result){
			$arr = $result;
		}else{
			$arr = array(
						'code'=>'3002',
						'msg'=>'查询的会员不存在'
						);
		}
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);  
	}
	
	/**
	* api鉴权
	*/
	private function sign()
	{
		$val['userid'] = array('eq',$this->userid);
		$result= M('Member')->where($val)->select();
		//请求超时 每次限时10秒
		if((time()-$this->pctime)>10){
			$arr = array(
							'code'=>'2001',
							'msg'=>'请求超时' 
						);
		}else if(!$result){
			$arr = array(
							'code'=>'2002',
							'msg'=>'会员不存在' 
						);
		}else if(!$this->is_token()){
			$arr = array(
							'code'=>'2003',
							'msg'=>'签名失败' 
						);
		}else{
			$arr = array(
							'code'=>'2000',
							'expires_in'=>'10',
							'msg'=>'签名成功' 
						);
		}
		return json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	* Token效验
	*/
	private function is_token(){
		$val['userid'] = array('eq',$this->userid);
		$result= M('Member')->where($val)->select();
		$tokenServer = md5($result[0]['userid']."javaANDphp").($this->pctime*74);
		if($this->token != $tokenServer){
			return false;
		}else{
			return true;
		}
		
	}
}
