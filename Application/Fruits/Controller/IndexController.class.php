<?php
/**
 *@ Index控制器
 */
namespace Fruits\Controller;
use Think\Controller;
class IndexController extends CommonController{
	 
	public $account;
	public $icon;
	public $nickname;
	
	
	protected function _initialize()
	{
		
		parent::_initialize();
		//实例化模型类
		$this->account = session('info.account');
		$this->icon = session('info.icon');
		$this->nickname = session('info.name');
	}
    public function index()
    {
		//p(session());
		$this->assign('account',$this->account);
		$this->assign('icon',$this->icon);
		$this->assign('name',$this->nickname);
		$this->display('Index');
	}
	public function privilege(){
		//会员权益
		parent::twoif();
		$this->display('Privilege');
	}
	public function detail(){
		//积分明细
		parent::twoif();
		$this->display('Detail');
	}
	/**
	 * 订单页
	 */
	public function order()
	{
		parent::twoif();
		//实例化模型类
		$model = D('Fruits');
		$result = $model->orderList($this->account);
		$summey = $model->getSpend($this->account);
		$this->assign('summey',$summey);
		$this->assign('list',$result);
		$this->display('Order');
	}
	/**
	 * 订单详细页
	 */
	public function orderdetail()
	{
		extract(I());
		parent::twoif();
		//实例化模型类
		$model = D('Fruits');
		$result = $model->orderDetail($this->account,$order_id);
		$this->assign('list',$result);
		//echo "当前订单ID:".$order_id."<br>";
		//p(I());
		$this->assign('order',I());
		$this->display('Orderdetail');
	}
	//生日特权
	public function birthday()
	{
		parent::twoif();
		
		$val['account'] = array('eq',$this->account);
		$result = M('fruits_user')->where($val)->select();
		$this->assign('birthday',$result[0]['birthday']);

		//得到出生到今天的日数
		$birth=round((time()-$result[0]['birthday'])/3600/24);
		$this->assign('birth',$birth);
		/////////////////////////////////
		//计算出生日距离多少天
		$year = date('Y',time());  //当前年份
		$thisDays = $year.'-'.date('m-d',time()); //当前日期
		$pastDays = $year.'-'.date('m-d',$result[0]['birthday']); //用户生日
		if(strtotime($pastDays)>strtotime($thisDays)){
			//生日未到
			$births=round((strtotime($pastDays)-time())/3600/24);
			$birthStr = "距离还有".($births+1)."天";
		}else if(strtotime($pastDays) == strtotime($thisDays)){
			$birthStr = "生日快乐！";
		}else{
			//生日已过
			$pastDays = ($year+1)."-".date('m-d',$result[0]['birthday']);
			$births=round((strtotime($pastDays)-time())/3600/24);
			$birthStr = "距离还有".$births."天";
		}
		$this->assign('birthStr',$birthStr);
		$this->display('Birthday');
	}
	//设置生日
	public function birthdaySet()
	{
		parent::twoif();
		$model = M('fruits_user');
		$val['account'] = array('eq',$this->account);
		$result=$model->where($val)->select();
		$this->assign('user',$result[0]);
		$this->display('BirthdaySet');
	}
	public function birthdayComplete()
	{
		extract(I());
		if(!isDate($dtime)){
			$data['centent'] = "生日格式错误";
		}else{
			$model = M('fruits_user');
			$data['birthday'] = strtotime($dtime);
			$val['account'] = array('eq',$this->account);
			$result=$model->where($val)->save($data);
			if($result){
				$data['centent'] = "生日设置成功";
			}else{
				$data['centent'] = "设置失败";
			}
		}
		$this->ajaxReturn($data);
	}

}