<?php
/***
*@ Wangrubiao
*@ 2016
*/
namespace Fruits\Model;
use Think\Model;

class FruitsModel extends Model{
	protected $tableName = 'fruits_user';  //自定模型对应表名

	/**
	 * 主订单
	 * 查询会员返回所有列表
	 */
	 public function orderList($account){
		 $order = M('fruits_order');
		 $val['user_id'] = array('eq',$this->getUserId($account));
		 $result = $order->fetchSql(0)->where($val)->select();
		 return $result;
	 }
	 /**
	 * 主订单
	 * 查询订单ID返回指定信息(单条)
	 */
	 public function orderUser($id){
		 $order = M('fruits_order');
		 $val['id'] = array('eq',$id);
		 $result = $order->fetchSql(0)->where($val)->select();
		 return $result;
	 }

	/**
	 * 查询订单明细
	 */

	 public function orderDetail($account,$order_id){
		 $order = M('fruits_orderdetailed');
		 $result = $order
		 ->fetchSql(0)
		 ->alias('c')
		 ->where(array('c.order_id'=>$order_id))
		 //->join('__FRUITS_ORDER__ ON c.order_id = __FRUITS_ORDER__.id')
		 ->join('__FRUITS_GOODS__ ON c.goods_id = __FRUITS_GOODS__.gid')
		 ->select();
		// die($result);
		 return $result;

	 }

	/**
	 * 会员查询
	 */
	public function select($account){
		$user = M('fruits_user');
		$val['account'] = array('eq',$account);
		$result = $user->where($val)->select();
		if(empty($result)){
			return false;
		}else{
			return $result[0];
		}		
	}

	/**
	 *获取会员ID
	 */
	public function getUserId($account){
		$result = $this->select($account);
		if($result == false){
			return false;
		}else{
			return $result['id']; 
		}
	}

	/**
	 * 获取用户消费总额
	 */
	public function getSpend($account){
		$order = M('fruits_order');
		$val['user_id'] = array('eq',$this->getUserId($account));
		$result = $order->where($val)->sum('total');
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	/**
	* 订单插入
	* orderAdd(会员账号,订单数组,总价,优惠,实收,应找,时间,积分,类型)
	*/

	public function orderAdd($account,$orderData,$total,$discount,$receipts,$backmey,$buytime,$integral,$payment)

	{

		$order = M('fruits_order');

		$orderList = M('fruits_orderdetailed');

		//主表数据

		$data['user_id'] = $this->getUserId($account);

		$data['order'] = time();//总计

		$data['total'] = $total;//总计

		$data['discount'] = str_replace("-", "",$discount);

		$data['receipts'] = $receipts;

		$data['backmey'] = $backmey;

		$data['buytime'] = time();

		$data['integral'] = $integral; //积分

		$data['payment'] = $payment;//支付方式

		$order_id = $order->add($data);

		//p($orderData);

		if($order_id){

			//详细表数据

			for($i=0; $i < count($orderData); ++$i){

				$orderData[$i]['order_id'] = $order_id;

				//unset($orderData[$i]['name']); //无损摧毁，Think自带过滤

			}

			$orderList->addAll($orderData);

			return true;

		}else{

			return false;

		}

		

		

	}

}



?>