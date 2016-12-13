<?php
/***
*@ Index Controller
*@ Wangrubiao
*@ 2015
*/
namespace Shop\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
		//header('Location: http://www.huiket.com?id=1');
		//P($_GET['g']);
		$id = $_GET['id'];
		extract(I());
		$goods = M('goods');

		//获取商品基本信息
		$result = $goods
		->fetchSql(0)
		->field('wx_goods.id,wx_goods.title,wx_goods.picture_id,wx_goods.point,wx_goods.goods_number,wx_goods.content,wx_goods.counter,wx_goods.records,
    			wx_goods.money,wx_goods.discount,wx_goods.shipping,wx_goods.weight,wx_goods.stock,wx_goods.attribute,
    			wx_goods.seat,wx_goods.pubtime,wx_goods.state,wx_goods_type.type_name,
    			wx_goods_picture.img_url')
		->where(array('wx_goods.id'=>$id))
		->join('wx_goods_type ON wx_goods.type = wx_goods_type.id')
		->join('wx_goods_picture ON wx_goods.id = wx_goods_picture.img_id')
		->select();
		//p($result);
		foreach($result as $item){
			$img_data['picture'][].= $item['img_url'];
		}
		//p($img_data);
		if(empty($result)) die("");
	 	$discount = $result[0]['money'] / $result[0]['counter'];
		$this->assign('discount',round($discount,2));
		$this->assign('info',$result[0]);
		//获取规格信息
		$goodsSpec = M('goods_spec');
		$val['goods_id']=array('eq',$result[0]['id']);
		$Spec = $goodsSpec->where($val)->select();
		//p($Spec);
		$this->assign('spec',$Spec);
		//获取SKU信息
		$goodsSku = M('goods_specfocus');
		$valSku['spec_id']=array('eq',$Spec[0]['id']);
		$Sku = $goodsSku->where($valSku)->select();
		//p($Sku);
		$this->assign('picture',$img_data['picture']);
		$this->assign('rule',$_GET['g']);
		$this->assign('sku',$Sku);
		if(!check_wap()){
			//PC端
			$this->display('Index/index');
		}else{
			//wap端
			$this->display('Index/index_wap');
		}
	}
	/*******
	*微信单页
	*/
 	public function wx()
    {
		//P($_GET);
		$id = $_GET['id'];
		//p($id);
		extract(I());
		$goods = M('goods');

		//获取商品基本信息
		$result = $goods
		->fetchSql(0)
		->field('wx_goods.id,wx_goods.title,wx_goods.picture_id,wx_goods.point,wx_goods.goods_number,wx_goods.content,wx_goods.counter,wx_goods.records,
    			wx_goods.money,wx_goods.discount,wx_goods.shipping,wx_goods.weight,wx_goods.stock,wx_goods.attribute,
    			wx_goods.seat,wx_goods.pubtime,wx_goods.state,wx_goods_type.type_name,
    			wx_goods_picture.img_url')
		->where(array('wx_goods.id'=>$id))
		->join('wx_goods_type ON wx_goods.type = wx_goods_type.id')
		->join('wx_goods_picture ON wx_goods.id = wx_goods_picture.img_id')
		->select();
		//p($result);
		foreach($result as $item){
			$img_data['picture'][].= $item['img_url'];
		}
		//p($img_data);
		if(empty($result)) die("");
	 	$discount = $result[0]['money'] / $result[0]['counter'];
		$this->assign('discount',round($discount,2));
		$this->assign('info',$result[0]);
		//获取规格信息
		$goodsSpec = M('goods_spec');
		$val['goods_id']=array('eq',$result[0]['id']);
		$Spec = $goodsSpec->where($val)->select();
		//p($Spec);
		$this->assign('spec',$Spec);
		//获取SKU信息
		$goodsSku = M('goods_specfocus');
		$valSku['spec_id']=array('eq',$Spec[0]['id']);
		$Sku = $goodsSku->where($valSku)->select();
		//p($Sku);
		$this->assign('picture',$img_data['picture']);
		$this->assign('rule',$_GET['g']);
		$this->assign('sku',$Sku);
		$this->display('Index/index_wx');
	}
	/*******
	*ajax加载规格集
	*/
	public function skuList(){
		extract(I());
		//$spec_id=1;
		$sku = M('goods_specfocus');
		$val['spec_id']=array('eq',$spec_id);
		$result = $sku->where($val)->select();
		//p($result);
		foreach($result as $item){
			if($item['id'] == 10 or $item['id'] == 12){
				$str.='<label class="sku">
                <input type="radio" name="chicun" value="'.$item['id'].'" alt="'.$item['spec_mey'].'">
                &nbsp;&nbsp;'.$item['focus_name'].'&nbsp;&nbsp;<b>(缺货/3月5号发货)</b></label>
               <br>';
			}else if($item['spec_stock']<100){
				$str.='<label class="sku">
                <input type="radio" name="chicun" value="'.$item['id'].'" alt="'.$item['spec_mey'].'">
                &nbsp;&nbsp;'.$item['focus_name'].'</label>
               <br>';
			}else{
				$str.='<label class="sku">
                <input type="radio" name="chicun" value="'.$item['id'].'" alt="'.$item['spec_mey'].'">
                &nbsp;&nbsp;'.$item['focus_name'].'</label>
               <br>';
			}
		}
		$data['staus']=1;
		$data['content']=$str;
		$this->ajaxReturn($data);
	}
	//处理支付宝异步回调方法
	public function alipayReturn()
	{
		//商户订单号
		$out_trade_no = $_GET['out_trade_no'];
		//支付宝交易号
		$trade_no = $_GET['trade_no'];
		//交易状态
		$trade_status = $_GET['trade_status'];
		file_put_contents('./return.log', var_export($_GET, true), FILE_APPEND);
		if($_GET['trade_status'] == 1) {
			//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）使用Bmob的订单查询接口查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序.
			$obj = alipayReturn($out_trade_no);
			$arr = object_array($obj);
			var_dump($arr['body']);
			$Model = D('Order');
			$Model->alipayOrder($arr['body'],$arr['total_fee'],strtotime($arr['create_time']));
			$order = base64_encode($arr['body']*7);  
			$this->redirect('orderInfo',array('order'=>$order));
		}
		else {
		  echo "trade_status=".$_GET['trade_status'];
		}
		echo "验证成功<br />";
		}
	/*****
	*支付成功提示页
	*/
	public function orderInfo()
	{
		extract(I());
		$Model = D('Order');
		$order = base64_decode($order)/7; //订单解密
		$info = $Model->orderInfo($order);
		if(empty($info))$this->error("非法请求");
		//模板渲染
		$this->assign('result',$info[0]);
		$this->assign('tjdz',$_SERVER['HTTP_REFERER']);
		$this->display('Index/order');
		//
	}
	//提交订单处理
	public function order()
	{	
		if(!IS_POST)$this->redirect('Index/index');
		extract(I());
		$M = M('goods_specfocus');
		$val['wx_goods_specfocus.id'] = array('eq',$chicun);
		$sizeName = $M->where($val)
		->field('wx_goods_specfocus.id,wx_goods_specfocus.focus_name,wx_goods_specfocus.spec_mey,
				wx_goods_spec.spec_name
			')
		->join('wx_goods_spec ON wx_goods_specfocus.spec_id = wx_goods_spec.id')
		->select();
		//p($sizeName[0]);
		//p(I());
		if(empty($rule)){
			$rule = "0";
		}
		//echo $rule;
		//exit;
		$order = D('Order');
		$detailed = M('order_detailed');
		if($payment==1){
			//支付宝付款
			$data=array(
			'goods_id'=>$id,
			'order_title'=>$title,
			'product_img'=>$figure,
			'order'=>time(),
			'product'=>$sizeName[0]['spec_name'],
			'size'=>$sizeName[0]['focus_name'],
			'consignee'=>$name,
			'mob'=>$mob,
			'address'=>$province.$city.$area.$address,
			'mey'=>$sizeName[0]['spec_mey'],
			'paytype'=>1,
			'type'=>1,
			'position'=>$rule,
			'guest'=>$guest,
			'ip'=>get_client_ip(),
			'countip'=>$order->selectIp(get_client_ip())+1
			);
			$order_id = $order->where()->add($data);
			$orderArr=array(
			'order_id'=>$order_id,
			'size_id'=>$sizeName[0]['id'],
			);
			$detailed->where()->add($orderArr);
			echo alipay($data,$title);
		}else{
			$data=array(
			'goods_id'=>$id,
			'order_title'=>$title,
			'product_img'=>$figure,
			'order'=>time(),
			'product'=>$sizeName[0]['spec_name'],
			'size'=>$sizeName[0]['focus_name'],
			'consignee'=>$name,
			'mob'=>$mob,
			'address'=>$province.$city.$area.$address,
			'mey'=>$sizeName[0]['spec_mey'],
			'paytype'=>0,
			'position'=>$rule,
			'paystate'=>1,
			'paytime'=>time(),
			'guest'=>$guest,
			'ip'=>get_client_ip(),
			'countip'=>$order->selectIp(get_client_ip())+1
			);
			//p($data);exit;
			$order_id = $order->where()->add($data);
			$orderArr=array(
				'order_id'=>$order_id,
				'size_id'=>$sizeName[0]['id'],
			);
			//p($orderArr);
			$detailed->where()->add($orderArr);
			$orderB = base64_encode($data['order']*7);
			//短信下发提醒
			message($data['mob'],$data['order']);
			//邮件提醒
			$str.="订单号：".$data['order']."<br>";
			$str.="姓名：".$data['consignee']."<br>";
			$str.="电话：".$data['mob']."<br>";
			$str.="款式：".$data['product']."<br>";
			$str.="尺码：".$data['size']."<br>";
			$str.="地址：".$data['address']."<br>";
			$str.="留言：".$data['guest']."<br>";
			$str.="IP：".$data['ip']."<br>";
			SendMail('64941334@qq.com','喔.订单来了！',$str);
			$this->redirect('orderInfo',array('order'=>$orderB));
		}
		//发送邮箱
		$str.="订单号：".$data['order']."<br>";
		$str.="姓名：".$data['consignee']."<br>";
		$str.="电话：".$data['mob']."<br>";
		$str.="款式：".$data['product']."<br>";
		$str.="尺码：".$data['size']."<br>";
		$str.="地址：".$data['address']."<br>";
		$str.="留言：".$data['guest']."<br>";
		$str.="IP：".$data['ip']."<br>";
		SendMail('64941334@qq.com','支付宝订单来啦！',$str);
		
	}
	//ajax加载评论
	public function comment()
	{
		extract(I());
		//$id = 1;
		$M = M('evaluate');
		$val['goods_id'] = array('eq',$id);
		$result = $M->where($val)->order('evaltime desc')->limit(10)->select();

		//p($result);
		$this->assign('sum',count($result));
		$this->assign('list',$result);
		$this->display('Index/comment');

	}
	public function orderSel()
	{
		extract(I());
		$M = M('order');
		$val['order'] = array('eq',$orderSel);
		$result = $M->where($val)->select();
		if($result){
			$data['staus'] = 1;
			$data['content'] = ' <span><font color="red">您购买了</font><span>【颜色：'.$result[0]['product'].'   尺码：'.$result[0]['size'].'  金额：'.$result[0]['mey'].'元】</span></span>
         <div><a href="javascript:void(0)" onclick='."alert('订单处于发货途中，无法申请退货。')".' >申请退货</a> - <a href="javascript:void(0)" onclick='."alert('订单未签收，无法评价！')".' >我要评价</a></div>';

		}else{
			$data['staus'] = 0;
		}
		$this->ajaxReturn($data);
	}
}
