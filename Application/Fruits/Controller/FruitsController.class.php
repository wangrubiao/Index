<?php
/***
*@ Login Controller
*@ Wangrubiao
*@ 2016
*/
namespace Fruits\Controller;
use Think\Controller;
class FruitsController extends Controller {
	
	private $key;  //服务端key
	private $pckey; //客户端key
	private $pctime; //客户端提交时间
	private $model; //模型类
	
	/**
	* Api构造函数
	*/
	protected function _initialize()
	{
		//echo phpinfo();
		//echo "PHP时间戳：".time()."</br>";
		//echo $this->key = md5("270264127"."xbjrw").(time()*74)."<br>";
		extract(I());
		header('content-type:application/json;charset=utf8');
		$this->pctime = substr($pckey,-12)/74;
		$this->key = md5($account."xbjrw").($this->pctime*74);
		$this->pckey = $pckey;
		//实例化模型类
		$this->model = D('Fruits');
		//开启签名模式
		$json  = json_decode($this->sign());
		$is_user  = json_decode($this->is_user());
		if($json->status != 1){
			//验证签名
			echo $this->sign();
			exit;
		}
		if($this->is_user($account)==false){
			//签名成功 验证会员是否存在！
			$this->getUserInfo();
			exit;
		}
	}
	//添加订单到数据库
	public function orderAdd()
	{
		extract(I());
		$json = htmlspecialchars_decode($order);
		$arrOrder=json_decode($json,true);
		$result = $this->model->orderAdd($account,$arrOrder,$zmey,$yhui,$shishou,$yingzhao,time(),0,0);
		if(!$result){
			$arr = array('status'=>'-1','msg'=>'创建失败');
		}else{
			$arr = array('status'=>'1','msg'=>'创建成功');
		}
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);  
		
	}
	//判断会员是否存在
	public function is_user($account){
		if($this->model->select($account) == false){
			return false;
		}else{
			return true;
		}
	}
	//获取会员资料
	public function getUserInfo()
	{	
		extract(I());
		if($this->model->select($account) == false){
			$arr = array('status'=>'0','msg'=>'会员不存在');
		}else{
			$arr = $this->model->select($account);
		}
		
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);  
	}
	
	private function sign()
	{
		//签名失败
		if($this->pckey != $this->key){
			$arr = array(
							'status'=>'-1',
							'msg'=>'签名失败'
						);
		}
		//请求超时 每次限时10秒
		else if((time()-$this->pctime)>10){
			$arr = array(
							'status'=>'-1',
							'msg'=>'请求超时'
						);
		}else{
			$arr = array(
							'status'=>'1',
							'msg'=>'请求成功',
							'expires_in'=>'10'
						);
		}
		return json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);		
	}
	

}
