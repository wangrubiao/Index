<?php

// +----------------------------------------------------------------------
// | W+ [ Not the same fireworks ]
// +----------------------------------------------------------------------
// | Describe: api鉴权类
// +----------------------------------------------------------------------
// | Time: 2016/11/15
// +----------------------------------------------------------------------
// | Author: 64941334@qq.com
// +----------------------------------------------------------------------

namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	private $username;  //用户账号
	private $token; //客户端key
	private $pctime; //客户端提交时间
	
	public $uid;  //请求api的会员ID
	private $model; //模型类
	
	
	
	/**
	* 构造函数
	*/
	protected function _initialize()
	{
		extract(I());
		//p(I());
		echo "至少看到这里...";
		//header('content-type:application/json;charset=utf8');
		
		header("Content-type: text/html; charset=utf-8");
		//接收客户端数据初始化
		$this->username = $username;
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
	/**
	 * 鉴权调试检查
	 */
	public function index(){
		echo $this->sign(); //授权通过提示
	}
	/**
	* 用户登录 api
	
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
	}*/
	/**
	* 会员资料 api
	* 参数 current_user 为要查询的会员账号
	
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
	*/
	/**
	* api鉴权
	*/
	private function sign()
	{
		$val['username'] = array('eq',$this->username);
		$result= M('zmx_member')->where($val)->select();
		//请求超时 每次限时10秒
		if((time()-$this->pctime)>10000){
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
		$this->uid = $result[0]['uid'];
		return json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	* Token效验
	*/
	private function is_token(){
		$val['username'] = array('eq',$this->username);
		$result= M('zmx_member')->where($val)->select();
		$tokenServer = md5($result[0]['username']."javaANDphp").($this->pctime*74);
		if($this->token != $tokenServer){
			return false;
		}else{
			return true;
		}
		
	}
}
