<?php
/***
*@ user Model
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{
	//protected $patchValidate = true;
	protected $_validate = array(
		/***
		*状态值 4=登陆状态 3=全部状态 5=注册状态
		*/
		//注册状态5
		array('username','require','账号不能为空',0),
		array('username','','帐号已被占用',0,'unique',5,array()),
		array('username','checkInp','账号格式错误,只能输入字母或数字',0,'callback',5,array()),
		array('password','require','密码不能为空',0),
		array('repassword','require','确认密码不能为空',0),
		array('repassword','password','两次密码输入不一致',0,'confirm'),
		array('password','checkInp','密码格式错误,只能输入字母或数字',0,'callback',5,array()),
		array('mailbox','require','邮箱不能为空',0),
		array('mailbox','email','邮箱格式不正确'),
		array('mailbox','','邮箱已经被注册',0,'unique',5),
		array('name','require','名字不能为空',0),
		//登陆状态4
		array('username','checkName','账号不存在',1,'callback',4,array()),
		array('password','checkPwd','密码错误',1,'callback',4,array()),
		//array(array('username','grade','password'),'chekGrade','当前账号不属于该等级',1,'callback',4,array()),

		
	);
	protected function checkName($username){
		//验证账号是否存在
		$User   = M('Admin');
		$val['username']=$username;
		$result = $User->where($val)->select();
		if($result){
			return true;
		}else{
			return false;
		}
	}
	protected function checkPwd($password){
		//验证密码是否错误
		$User   = M('Admin');
		$val['password']=$password;
		$result = $User->where($val)->select();
		if($result){
			return true;
		}else{
			return false;
		}
	}
	protected function chekGrade($data){
		//验证等级
		$User   = M('Admin');
		$result = $User->fetchSql(0)->where($data)->select();
		if($result){
			return true;
		}else{
			return false;
		}
	}
	protected function checkInp($str){
		//验证输入只能为数字和字母
		return ctype_alnum($str);
	}
	public function adminCount(){
		//返回所有管理员(链职位表) 总数
		$User 	= M('admin');
		$result = $User
		->fetchSql(false)
		->alias('a')
		->join('__GRADE__ g ON a.grade = g.aid','INNER')
		//->page($page,3)
		->count();
		return $result;
	}
	public function adminList($page,$pageRow){
		//返回所有管理员(链职位表)
		$User 	= M('admin');
		$result = $User
		->fetchSql(false)
		->alias('a')
		->join('__GRADE__ g ON a.grade = g.aid','INNER')
		->page($page,$pageRow)
		->select();
		return $result;
	}
}
?>