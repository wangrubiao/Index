<?php
/***
*@ Order Model
*@ 前台订单操作模型
*@ Wangrubiao
*@ 2015
*/
namespace Yeris\Model;
use Think\Model;

class OrderModel extends Model{

	public function selectIp($ip){
		//返回下单Ip总数量
		$list = M('order');
		$val['ip']=array('eq',$ip);
		$result = $list->where($val)->count();
		return $result;
	}
	/*****
	*order是客户提交时产生的订单号,
	*付款成功后通过第三方返回更改对应订单状态
	*/
	public function alipayOrder($odr,$mey,$time){
		$order = M('order');
		$val['order'] = array('eq',$odr);
		$data['paystate'] = 1;
		$data['mey'] = $mey;
		$data['paytime'] = $time;
		$result = $order->where($val)->save($data);
	}
	/*****
	*根据订单号返回订单信息
	*/
	public function orderInfo($odr){
		$order = M('order');
		$val['order'] = array('eq',$odr);
		$result = $order->where($val)->select();
		return $result;
	}
}

?>