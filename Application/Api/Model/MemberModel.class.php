<?php
/***
*@ 会员模型
*@
*/
namespace Api\Model;
use Think\Model;

class MemberModel extends Model{
	//protected $tableName = 'fruits_user';  //自定模型对应表名

	/**
	 * 主订单
	 * 查询会员返回所有列表
	 */
	 public function index(){
		echo "模型的方法";
	 }
	 /**
	 * 返回用户信息
	 */
	 
	 $val['userid'] = array('eq','admin');
		$result= M('Member')\
		->where($val)
		join(wefdwefwefwef)
		join(wefdwefwefwef)
		join(wefdwefwefwef)
		->select();
		
	 public function userInfo(){
		$val['userid'] = array('eq',$userid);
		$result = M('member')->fetchSql(1)->where($val)->select();
		return $result;
		if($result){
			return $result;
		}else{
			return false;
		}	
	 }
}
?>