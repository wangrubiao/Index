<?php
/*****
*公共控制器
*
*/
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
	protected function _initialize(){
		//If Login 
		header("Content-type:text/html;charset=utf-8");
		if(!session('?info.useradmin') or !session('?info.uid'))$this->redirect('Admin/Login/login_out');
		//P(session());
	}
	public function jurisdiction($arr){
		//传入可以被访问权限的等级
		dump(in_array(session('grade'),$arr));exit;
		if(!in_array(session('grade'),$arr)) $this->redirect('Admin/Login/login_out');
		}
	public function PagesStyle($count,$display){
		/***
		*分页样式 仅返回样式不输出
		*/
		$Page = new\Think\Page($count,$display);
		$Page -> setConfig('header','<li class="infoNo"><a href="#">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</a></li>');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('theme','%HEADER% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
		return $Page;
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