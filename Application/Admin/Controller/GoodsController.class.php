<?php
/***
*@ Login Controller
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function index(){
		//p(session());
		$this->display('Index/sign-in');
    }
    /******
    *添加商品
    */
    public function addShop(){
        //p(session());
        $this->display('Index/Goods/addShop');
    }
    /******
    *商品列表
    */
    public function goodsList(){
    	$goods = M('goods');
    	$list = $goods->where()
    	->field('wx_goods.id,wx_goods.title,wx_goods.picture_id,wx_goods.point,wx_goods.goods_number,wx_goods.content,
    			wx_goods.money,wx_goods.discount,wx_goods.shipping,wx_goods.weight,wx_goods.stock,
    			wx_goods.seat,wx_goods.pubtime,wx_goods.state,wx_goods_type.type_name')
		->join('__GOODS_TYPE__ ON __GOODS_TYPE__.id = __GOODS__.type')
    	->select();
    	//p($list);
    	$spec = M('goods_spec');
    	$specList = $spec->where(array('wx_goods_spec.goods_id'=>1))
    	->join('wx_goods_specfocus ON wx_goods_spec.id = wx_goods_specfocus.spec_id')
    	->select();
    	//p($specList);
    	$this->assign('list',$list);
		$this->display('Index/Goods/goodsList');
    }
	/******
    *库存模态框输出
    */
	public function stockEdit(){
		//if(!IS_AJAX)$this->error('非法请求');
		extract(I());
        $spec = M('goods_spec');
        $id=1;
        $specList = $spec->where(array('wx_goods_spec.goods_id'=>$id))
        ->join('wx_goods_specfocus ON wx_goods_spec.id = wx_goods_specfocus.spec_id')
        ->order('wx_goods_spec.spec_name desc,wx_goods_specfocus.focus_name')
        ->select();
      //  p($specList);
        foreach($specList as $item){
            $str.='<li>'.$item['spec_name'].'-'.$item['focus_name'].'&nbsp&nbsp<input class="stockInput" id="'.$item['id'].'" name="" type="text" value="'.$item['spec_stock'].'"/></li>';
        }
       // echo $str;
       //赠品检索
         $spec = M('gift_spec');
         $giftList = $spec->where(array('wx_gift_spec.goods_id'=>$id))
        ->join('wx_gift_specfocus ON wx_gift_spec.id = wx_gift_specfocus.gift_id')
        ->select();
        //p($specList);
        //echo "------------------赠品------------------";
         foreach($giftList as $item){
            $strB.='<li>'.$item['gift_name'].'-'.$item['gift_spec'].'&nbsp&nbsp<input class="stockInput" id="gift_spec_'.$item['id'].'" name="" type="text" value="'.$item['gift_stock'].'"/></li>';
        }
        //echo $strB;
        $this->ajaxReturn($str.$strB);
	}
    /******
    *库存模态框保存数据
    */
    public function stockEditCheck(){
        if(!IS_AJAX)$this->error('非法请求');
        extract(I());
        $Model = D('Goods');
        $result = $Model->saveAll($val,'wx_goods_specfocus','spec_stock');
        if($result!=0){
            $where['id'] = $id;
            $Model->where($where)->setField('stock',array_sum($val));
            $data['status'] = 1;
        }else{
            $data['status'] = 1;
        }
        $this->ajaxReturn($data);
    }
    /******
    *价格模态框输出
    */
    public function moneyEdit(){
        if(!IS_AJAX)$this->error('非法请求');
        extract(I());
        $spec = M('goods_spec');
        $specList = $spec->where(array('wx_goods_spec.goods_id'=>$id))
        ->join('wx_goods_specfocus ON wx_goods_spec.id = wx_goods_specfocus.spec_id')
        ->select();
        foreach($specList as $item){
            $str.='<li>'.$item['spec_name'].'-'.$item['focus_name'].'&nbsp&nbsp<input class="stockInput" id="'.$item['id'].'" name="" type="text" value="'.$item['spec_mey'].'"/></li>';
        }
        $this->ajaxReturn($str);
    }
    /******
    *价格模态框保存数据
    */
    public function moneyEditCheck(){
        extract(I());
        if(!IS_AJAX)$this->error('非法请求');
        $Model = D('Goods');
        $result = $Model->saveAll($val,'wx_goods_specfocus','spec_mey');
        if($result!=0){
            $where['id'] = $id;
            rsort($val,SORT_NUMERIC);
            $Model->where($where)->setField('money',$val[0]);
            $data['status'] = 1;
        }else{
            $data['status'] = 1;
        }
        $this->ajaxReturn($data);
    }
}