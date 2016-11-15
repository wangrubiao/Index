<?php
/***
*@ Login Controller
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
		p(session());
		$this->display('Index/sign-in');
    }
	//Login Handle
	public function handle(){
		if(!IS_AJAX)$this->error('非法请求！','',30);
		extract(I());
		$_POST['password'] = $password = XMD(XMD($username).XMD($password));
		$Admin = D("Admin");
		if (!$Admin->create('',4)){
			$data['status']  = 0;
			$data['content'] = $Admin->getError();
			$this->ajaxReturn($data);
		}else{
			//Login Success
			$Model = D('Grade');
			$info = $Model->userinfo($username);
			session('info',array('uid'=>$info[0]['id'],'useradmin'=>$username,'grade'=>$info[0]['grade'],'power'=>$Model->gradeId($info[0]['grade'])));
			//$Model->gradeId($info[0]['grade'])
			$data['status']  = 1;
			$this->ajaxReturn($data);
		}
	}
	public function login_out(){
		//安全退出
		session(null);
		$this->redirect('Admin/Login/index');
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
			'useNoise' => false, // 关闭验证码杂点
			'imageW'   => 98,	 //宽度
			'imageH'   => 20,	 //高度
		);
		$Verify = new \Think\Verify($config);
		$Verify->codeSet = '0123456789'; 
		$Verify->entry();
		
	}
}