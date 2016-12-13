<?php
/***
*@ user Model
*@ 返回菜单显示 职位显示
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Model;
use Think\Model;

class GradeModel extends Model{

	protected $_validate = array(
		/***
		*状态值 4=登陆状态 3=全部状态 5=注册状态
		*/
		//注册状态5
		array('position','','该职位已经存在',0,'unique',5,array()),
		//登陆状态4

		
	);
	/*****
	*返回当前登录用户的等级
	public function grade(){
		$list = M('grade');
		$val['id']=array('eq',1);
		$result = $list->where($val)->select();
		return $result;
	}
	*/
	/*****
	*userinfo(参数1,[参数2,...,...]) 根据用户名返回相关信息
	*参数1：用户名
	*参数2：返回数据库字段名称(空代表返回所有,支持数组传参)
	*/
	public function userinfo($username,$info=""){
		$list = M('admin');
		$val['username']=array('eq',$username);
		$result = $list->field($info)->where($val)->select();
		return $result;
	}
	/*****
	*返回权限包括的所有ID组
	*gradeId(参数[必填])
	*参数 等级权限的aid
	*/
	public function gradeId($aid){
		$list = M('grade');
		$val['aid']=array('eq',$aid);
		$result = $list->fetchSql(0)->where($val)->select();
		return $result[0]['range'];
	}
	/*****
	*根据用户名查询对应的ID  
	*(已遗弃，被userinfo函数取代)
	public function nameId($username){
		$list = M('admin');
		$val['username']=array('eq',$username);
		$result = $list->field('id')->where($val)->select();
		return $result[0]['id'];
	}
	*/
	/*****
	*menu(参数) 默认参数为{返回当前登录用户的权限菜单}
	*1、参数为空 根据登录用户权限返回菜单
	*2、参数为all 返回所有菜单列表
	*/
	public function menu($val)
	{
		$list = M('menu');
		if($val!='all' or empty($val)){
			$result = $list->where('id in('.session('info.power').')')->select();
		}else{
			$result = $list->where()->select();
		}
		return $result;
	}
	public function positionList(){
		//返回所有的职位列表
		$list = M('grade');
		$result = $list->where()->select();
		return $result;
		
	}
}

?>