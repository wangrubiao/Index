<?php
/***
*@ Index Controller
*@ Wangrubiao
*@ 2015
*/
namespace Mall\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index()
    {
    	//extract(I());
		$this->display('Index/login');
	}
	public function login()
	{
		//ajax登录查询查询
		if(!IS_AJAX)$this->error('非法请求！','',30);
		extract(I());
		$password = XMD(XMD($account).XMD($password));
		$user = M('user');
		$val['account'] = array('eq',$account);
		$val['password'] = array('eq',$password);
		$result = $user->where($val)->select();
		if(!$result){
			$data['status']  = 0;
			$data['content'] = "账号或者密码错误";
		}else{
			$data['status']  = 1;
			session('mall',array('uid'=>$result[0]['id'],'account'=>$account,'sign'=>1));
		}
		$this->ajaxReturn($data);		
	}
}