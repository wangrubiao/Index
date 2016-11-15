<?php
/***
*@ user Model
*@ 返回菜单显示 职位显示
*@ Wangrubiao
*@ 2015
*/
namespace Home\Model;
use Think\Model;

class GradeModel extends Model{

	public function grade(){
		//返回当前登陆用户等级
		$list = M('grade');
		$val['id']=array('eq',1);
		$result = $list->where($val)->select();
		return $result;
	}
	public function all(){
		//返回所有菜单
		$list = M('menu');
		$grade = $this->grade();
		$result = $list->where('id in('.$grade[0]['range'].')')->select();
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