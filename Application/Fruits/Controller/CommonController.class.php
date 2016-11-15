<?php
/*****
*公共控制器
*
*/
namespace Fruits\Controller;
use Think\Controller;
class CommonController extends Controller {
	protected function _initialize(){
		//If Login 
		extract(I());
		header("Content-type:text/html;charset=utf-8");
		//echo "<pre>";
		$wechat = new WechatController();
		$arr = $wechat->getWxInfo($code);
		//p($arr);
		if(!$wechat->is_Wechat()){
			die('请用微信打开哦！');
		}else{
			//  1，查询是否有账号
			//  2，生成session
			$Model = M('fruits_user');
			$val['wechat']  = $arr['openid'];
			$result = $Model->where($val)->select();
			if($result){
				session('info',array(
					'account'=>$result[0]['account'],
					'sign'=>1,
					'openid'=>$arr['openid'],
					'icon'=>$arr['headimgurl'],
					'name'=>$arr['nickname']
					)
					);
			}else{
				$account = mt_rand(1000,8888);//随机生成账号
				$red['account']  = $account;
				$result = $Model->fetchSql(0)->where($red)->count();
				if(!$result){
					//完成自动注册登陆
					$data['account'] = $account;
					$data['wechat'] = $arr['openid'];
					$data['pubtime'] = time();
					$result = $Model->where($red)->add($data);
					session('info',array(
						'account'=>$account,
						'sign'=>1,
						'openid'=>$arr['openid'],
						'icon'=>$arr['headimgurl'],
						'name'=>$arr['nickname']
						)
					);
				}
			}
		}
		
	}
	public function twoif(){
		//子页面判断
		if(!session('?info.account') or !session('?info.sign')){
			$this->redirect('index');
		}
	}
	public function verify(){
		/***
		*验证码
		*
		*/
		$config =    array(
			'fontSize' => 12,    // 验证码字体大小
			'length'   => 4,     // 验证码位数
			'useCurve' => false,  //关闭曲线
			'useNoise' => true, // 关闭验证码杂点
			'imageW'   => 98,	 //宽度
			'imageH'   => 23,	 //高度
		);
		$Verify = new \Think\Verify($config);
		$Verify->codeSet = '0123456789'; 
		$Verify->entry();
		
	}
	public function check_verify($code,$id=''){
		/***
		*匹配验证码
		*
		*/
    	$verify = new \Think\Verify();
   		$this->ajaxReturn($verify->check($code, $id));
	} 
}