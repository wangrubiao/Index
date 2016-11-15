<?php
/***
*@ FruitsUser Controller
*@ Wangrubiao
*@ 2016
*/
namespace Admin\Controller;
use Think\Controller;
class FruitsUserController extends OrderController {
	protected  function _initialize()
	{
		parent::_initialize();
	}
	public function index()
	{
		/****
		*会员列表
		*/
		$query = M('fruits_user');
		//Page输出
		$count = $query->where()->count();
		$Page = $this->PagesStyle($count,10);
		$show = $Page->show();
		$list = $query
		->where()
		->order('id desc')
		->limit($Page->firstRow.','.$Page->listRows)
		->select();
		//p($list);
		$this->assign('list',$list);
		$this->assign('page',$show);// 分页输出
		$this->display('Index/Fruits/userlist');
	}
	public function seluser(){
		/****
		*查询会员
		*/
		extract(I());
		$val['account'] = array('eq',$account);
		$model = M('fruits_user');
		$result = $model
		->where($val)
		->select();
		//p($result);
		if(empty($result)){
			$data['status'] = 0;
		}else{
			$data['status'] = 1;
			$data['content'] = $result[0];
		}
		$this->ajaxReturn($data);
	}
	public function recharge(){
		/****
		*会员充值
		*/
		$this->display('Index/Fruits/member');
	}
	public function consume(){
		/****
		*线下消费
		*/
	}
	public function integral(){
		/****
		*积分
		*/
	}

    
}