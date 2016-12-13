<?php
/***
*@ order Model
*@ 订单模型 订单功能的集合
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Model;
use Think\Model;

class OrderModel extends Model{

	protected $_validate = array(
		/***
		*状态值 4=登陆状态 3=全部状态 5=注册状态
		*/
		//注册状态5
		//array('position','','该职位已经存在',0,'unique',5,array()),
		//登陆状态4
	);
	/*****
	*订单发货更新
	*/
	public function upOrder($order,$express,$waybill,$freight)
	{
		//记录操作人
		$info['username'] = array('eq',session('info.useradmin'));
		$user = M('admin');
		$id   = $user->field('id')->where($info)->select();
		if(!empty($id)){
			//更新单号
			$up = M('order');
			$val['order']	  = array('eq',$order);
			$data['type']	  = 2;
			$data['express']  = $express;
			$data['waybill']  = $waybill;
			$data['freight']  = $freight;
			$data['sendtime'] = time();
			$data['uid'] 	  = $id[0]['id'];
			$result = $up->where($val)->save($data);
			return $result;
		}else{
			return false;
		}
		
	}
	/*****
	*订单移动方法
	*参数一 订单ID
	*参数二 移动类型(移出回收站 or 移入回收站)
	*/
	public function trashOrder($orderId,$type)
	{
		$info['username'] = array('eq',session('info.useradmin'));
		$user = M('admin');
		$id   = $user->field('id')->where($info)->select();
		if(!empty($id)){
			if(!empty($type) and $type == 1){
				$data['type']	  = 1;
				$data['sendtime'] = '';
				$data['uid']	  = 0;
			}else{
				$data['type']	  = 0;
				$data['sendtime'] = time();
				$data['uid']	  = $id[0]['id'];
			}
			$order = M('order');
			$val['id']=array('eq',$orderId);
			$result = $order->where($val)->save($data);
	 		return $result;
		}else{
			return false;
		}
	}
	/*****
	*获取订单登记信息
	*/
	public function getNotes($id)
	{
		$order = M('order');
		$val['id'] = array('eq',$id);
		$result = $order->field('register')->where($val)->select();
		return $result;
	}
	/*****
	*根据手机号获取归属地
	*/
	public function getMob($tel){
    	$ch = curl_init();
    	$url = 'http://apis.baidu.com/showapi_open_bus/mobile/find?num='.substr($tel,0,11);
    	$header = array('apikey:0df60c49ca16509031173bd430d0289d',);
    	// 添加apikey到header
   		curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	// 执行HTTP请求
   		 curl_setopt($ch , CURLOPT_URL , $url);
    	$res = curl_exec($ch);
    	//var_dump(json_decode($res));
    	$a=json_decode($res);
    	$str.= $a->showapi_res_body->{'name'};
		$str.= '-'.$a->showapi_res_body->{'prov'}.'-';
		$str.= $a->showapi_res_body->{'city'};
		return $str;
	}
	/*****
	*根据订单ID获取物流信息
	*/
	public function express($id){
		$order = M('order');
		$result = $order
		->field('wx_express.exp_name,wx_express.pinyin,wx_order.waybill')
		->where('wx_order.id='.$id)
		->join('__EXPRESS__ ON __ORDER__.express = __EXPRESS__.id')
		//->join('__CARD__ ON __ARTIST__.card_id = __CARD__.id')
		->select();
		return $result;
	}
}

?>