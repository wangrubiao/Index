<?php
/***
*@ Index Controller
*@ Wangrubiao
*@ 2015
*/
namespace Mall\Controller;
use Think\Controller;
class GoodsController extends Controller {
     public function index()
    {
		//P(session('mall'));
		$rel = cookie('val');
		//P($rel[0]);
		$id = $_GET['id'];
		extract(I());
		$goods = M('goods');
		//获取商品基本信息
		$result = $goods
		->fetchSql(0)
		->field('wx_goods.id,wx_goods.title,wx_goods.picture_id,wx_goods.point,wx_goods.goods_number,wx_goods.content,wx_goods.counter,wx_goods.stock,
    			wx_goods.money,wx_goods.discount,wx_goods.shipping,wx_goods.weight,wx_goods.stock,
    			wx_goods.seat,wx_goods.pubtime,wx_goods.state,wx_goods_type.type_name,
    			wx_goods_picture.img_url')
		->where(array('wx_goods.id'=>$id))
		->join('wx_goods_type ON wx_goods.type = wx_goods_type.id')
		->join('wx_goods_picture ON wx_goods.id = wx_goods_picture.img_id')
		->select();
		//p($result);
		foreach($result as $item){
			$img_data[]['picture'].= $item['img_url'];
		}
		//p($img_data);
		if(empty($result)) die("错误的商品ID.");
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
		$this->assign('img_data',$img_data);
		$this->assign('rule',$_GET['g']);
		$this->assign('sku',$Sku);
		$this->display('Index/goods');
	}
	/*******
	*ajax加载规格集
	*/
	public function skuList()
	{
		extract(I());
		//$spec_id=1;
		$sku = M('goods_specfocus');
		$val['spec_id']=array('eq',$spec_id);
		$result = $sku->where($val)->select();
		//p($result);
		foreach($result as $item){
               $str.=' <li prop="prop_2" fid="'.$item['spec_id'].'" vid="'.$item['id'].'" class="skuli
               ">
                <a href="javascript:void(0)" title="'.$item['focus_name'].'">'.$item['focus_name'].'</a>
                </li>';
		}
		$data['status']=1;
		$data['content']=$str;
		$this->ajaxReturn($data);
	}
	/*******
	*ajax查询sku库存
	*/
	public function skuStock()
	{
		extract(I());
		//$spec_id = 1;
		//$sku_id = 1;
		$stock = M('goods_specfocus');
		$val['spec_id'] = array('eq',$spec_id);
		$val['id'] = array('eq',$sku_id);
		$result = $stock->where($val)->select();
		//p($result);		
		$data['status'] = 1;
		$data['content'] = $result[0]['spec_stock'];
		$this->ajaxReturn($data);
	}
}