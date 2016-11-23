<?php

// +----------------------------------------------------------------------
// | W+ [ Not the same fireworks ]
// +----------------------------------------------------------------------
// | Describe: 会员注册Api
// +----------------------------------------------------------------------
// | Time: 2016/11/15
// +----------------------------------------------------------------------
// | Author: 64941334@qq.com
// +----------------------------------------------------------------------

namespace Api\Controller;
use Think\Controller;
class RegController extends Controller {
	
	/**
	* 手机注册api
	*/
	public function index()
	{
		extract(I());
		//p(I());
		if(!is_mob($phone)){
			$arr = array(
					'code'=>'5001',
					'msg'=>'手机不正确'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		if(trim($password)==NULL){
			$arr = array(
					'code'=>'5002',
					'msg'=>'密码不能为空'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		$data['phone'] = $phone;
		$data['password'] = md5($password);
		$data['name']  = rand(1,9999);
		$data['sex'] = 0;
		$data['rank'] = 0;
		$data['money'] = 0;
		$data['spaces'] = 1;
		$data['jointime'] = time();
		$data['joinip'] = get_client_ip();
		$result= M('zmx_member')->add($data);
		$arr = $result;
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);  
	}

}
