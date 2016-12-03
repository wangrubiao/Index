<?php
/***
*@ Cart Controller
*@ Wangrubiao
*@ 2015
*/
namespace Mall\Controller;
use Think\Controller;
class CartController extends Controller {
    /***
    *购物车中心
    */
    public function index()
    {
        //p(count(unserialize(cookie('cart'))));
        $obj = M('goods_specfocus');
        if(unserialize(cookie('cart'))){  
            $val['wx_goods_specfocus.id'] = array('in',i_array_column(unserialize(cookie('cart')),'sku_id'));
        }else{
            $val['wx_goods_specfocus.id'] = array('in',array(0),'sku_id');
        }
       
        $val['wx_goods_picture.sort'] = array('eq',1); //设置第一张主图为购物车显示
        $result = $obj
        ->field('wx_goods_specfocus.id,wx_goods_specfocus.spec_id,wx_goods_specfocus.focus_name,wx_goods_specfocus.spec_mey,wx_goods_specfocus.spec_stock,
                wx_goods_spec.spec_name,
                wx_goods.title,
                wx_goods_picture.img_url
            ')
        ->where($val)
        ->join('wx_goods_spec ON  wx_goods_specfocus.spec_id = wx_goods_spec.id')
         ->join('wx_goods ON  wx_goods_spec.goods_id = wx_goods.id')
         ->join('wx_goods_picture ON wx_goods.id = wx_goods_picture.img_id')
        ->select();
        foreach ($result as $key => $value) {
            foreach (unserialize(cookie('cart')) as $k => $itme) {
              if($value['id'] == $itme['sku_id']){
                    $result[$key]['num'] = $itme['num'];//设置数量
                    $result[$key]['count'] = $value['spec_mey']*$itme['num'];
                }
            }
        }
        //p(count($result));
        $this->assign('list',$result);
        $this->display('Index/cart');
    }
    /***
    *添加购物车
    */
    public function add()
    {
    	extract(I());
    	//$sku_id  =  2;
    	$sku = M('goods_specfocus');
    	$sku_val['id'] = array('eq',$sku_id);
    	$result = $sku->where($sku_val)->select();
    	//p($result);
    	if($result){
    		$cartList = array();
    		if(cookie('cart') == null){
    			$cartList[] = array(
    				'sku_id' => $result[0]['id'],
    				'num' => 1
    				);
    			cookie('cart',serialize($cartList));
    		}else{	
    			$cartListb = unserialize(cookie('cart'));
                $list = i_array_column($cartListb,'sku_id');
                if(gettype(array_search($result[0]['id'],$list)) != boolean){
                    $cartListb[array_search($result[0]['id'],$list)]['num'] = $cartListb[array_search($result[0]['id'],$list)]['num']+1;
                }else{
                    $cartListb[] =array(
                    'sku_id' => $result[0]['id'],
                    'num' => 1
                    );
                }
				cookie('cart',serialize($cartListb));
    		}
            $data['status'] = 1;
    	}else{
    		$data['status'] = 0;
    	}
    	//cookie('cart',null);
    	//p(unserialize(cookie('cart')));
    	$this->ajaxReturn($data);
	}
    /***
    *删除购物车
    */
    public function less()
    {
        extract(I());
        //$sku_id  =  2;
        $sku = M('goods_specfocus');
        $sku_val['id'] = array('eq',$sku_id);
        $result = $sku->where($sku_val)->select();
        if($result){
            $cartList = array();
            if(cookie('cart') == null){
                $cartList[] = array(
                    'sku_id' => $result[0]['id'],
                    'num' => 1
                    );
                cookie('cart',serialize($cartList));
            }else{  
                $cartListb = unserialize(cookie('cart'));
                $list = i_array_column($cartListb,'sku_id');
                if(gettype(array_search($result[0]['id'],$list)) != boolean){
                    $cartListb[array_search($result[0]['id'],$list)]['num'] = $cartListb[array_search($result[0]['id'],$list)]['num']-1;
                }else{
                    $cartListb[] =array(
                    'sku_id' => $result[0]['id'],
                    'num' => 1
                    );
                }
                cookie('cart',serialize($cartListb));
            }
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }
        //cookie('cart',null);
        //p(unserialize(cookie('cart')));
        $this->ajaxReturn($data);
    }
    public function del()
    {
        extract(I());
        //$sku_id  =  14;
        foreach (unserialize(cookie('cart')) as $key => $value) {
            if($value['sku_id'] == $sku_id){
                //unset();
               $cart = unserialize(cookie('cart'));
               unset($cart[$key]);
               cookie('cart',serialize($cart));
            }
        }
        $data['content'] = count(unserialize(cookie('cart')));
        $data['status'] = 1;
        $this->ajaxReturn($data);
    }
}

