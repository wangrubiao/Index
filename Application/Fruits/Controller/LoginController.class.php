<?php
/***
*@ Login Controller
*@ Wangrubiao
*@ 2016
*/
namespace Fruits\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function index()
	{
		$this->display('Index/Login');
	}	
    public function handle()
    {
		if(!IS_AJAX)$this->error('非法请求');
		extract(I());
		$Model = M('user');
		$val['account'] = $account;
		$val['password'] = XMd($password);
		$result = $Model->fetchSql(0)->where($val)->select();
		if(count($result)){
			//存在账户
			$data['status'] = 1;
			//生存session
			session('info',array('account'=>$result[0]['account'],'sign'=>1));
		}else{
			//不存在账户
			$data['status'] = 0;
			$data['content'] = '账号或者密码错误';
		}
		$this->ajaxReturn($data);
	}
	public function logout(){
		session(null);
		$this->redirect('Index/Index');
	}

}
