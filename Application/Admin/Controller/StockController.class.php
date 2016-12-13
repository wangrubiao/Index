<?php
/***
*@ Stock Controller
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Controller;
use Think\Controller;
class StockController extends Controller {
    public function index(){
    	$goods = M('goods');
    	$list = $goods->where()
    	->field('wx_goods.id,wx_goods.title,wx_goods.goods_number,wx_goods.state,wx_goods_type.type_name')
		->join('__GOODS_TYPE__ ON __GOODS_TYPE__.id = __GOODS__.type')
    	->select();
    	$this->assign('list',$list);
		$this->display('Index/Stock/purchase');
    }
    public function jg(){
        $dataList[] = array('record_id'=>'1','sid'=>'3');
        $dataList[] = array('record_id'=>'1','sid'=>'5');
        p($dataList);
    }
	//Login Handle
	public function handle(){
		if(!IS_AJAX)$this->error('非法请求！');
		extract(I());
	}
	/******
    *进销模态框输出
    */
	public function stockEdit(){
		if(!IS_AJAX)$this->error('非法请求');
		extract(I());
        $spec = M('goods_spec');
       // $id=1;
        $specList = $spec->where(array('wx_goods_spec.goods_id'=>$id))
        ->join('wx_goods_specfocus ON wx_goods_spec.id = wx_goods_specfocus.spec_id')
        ->order('wx_goods_spec.spec_name desc,wx_goods_specfocus.focus_name')
        ->select();
      //  p($specList);
        foreach($specList as $key=>$item){
            $str.='<li class="g'.$key.'">'.$item['spec_name'].'-'.$item['focus_name'].'&nbsp&nbsp
            <input class="stockInputA" id="'.$item['id'].'" name="" type="text" value=""/>
            <input id="'.$item['id'].'" class="stockInputB" type="text" value="" data-type="0" /></li>';
        }
       // echo $str;
       //赠品检索
         $spec = M('gift_spec');
         $specList = $spec->where(array('wx_gift_spec.goods_id'=>$id))
        ->join('wx_gift_specfocus ON wx_gift_spec.id = wx_gift_specfocus.gift_id')
        ->select();
        //p($specList);
        //echo "------------------赠品------------------";gift_spec_
         foreach($specList as $key=>$item){
            $strB.='<li class="z'.$key.'">'.$item['gift_name'].'-'.$item['gift_spec'].'&nbsp&nbsp
            <input class="stockInputA" id="'.$item['id'].'" name="" type="text" value=""/>
            <input id="'.$item['id'].'" class="stockInputB" type="text" value="" data-type="1" /></li>';
        }
        //echo $strB;
        $this->ajaxReturn($str.$strB);
	}
    /******
    *确定进销
    */
    public function stockEditCheck(){
        if(!IS_AJAX)$this->error('非法请求');
        extract(I());
        $quantity = array_sum(i_array_column($val,'quantity'));//采购总数量
        $sumMey = array_sum(i_array_column($val,'sumMey'));//产品总价格
        $data = array(
            //基础表数据
            'goods_id' => $id,
            'total_mey'=> $sumMey,
            'total'    => $quantity,
            'taketime' => time(),
            'state'    => 0,
            'remarks'  =>'',
            );
        $stock = M('stock_record');
        $sid = $stock->add($data);
        echo $sid;
        foreach ($val as $key => $value) {
            $val[$key]['record_id']=$sid;
        }
        p($val);
       $detailed=M('stock_detailed');
       $detailed->addAll($val);
    }
    /******
    *采购单列表
    */
    public function audit()
    {
        $stock = M('stock_record');
        $result = $stock
        ->field('wx_stock_record.id,wx_stock_record.total_mey,wx_stock_record.total,wx_stock_record.taketime,wx_stock_record.state,wx_stock_record.remarks
            ,wx_goods.goods_number
            ')
        ->join('wx_goods ON wx_stock_record.goods_id = wx_goods.id')
        ->select();
        //p($result);
        $this->assign('list',$result);
        $this->display('Index/Stock/audit');
    }
    /******
    *采购单详情
    */
    public function examine()
    {
        extract(I());
        $M = M('stock_detailed');
        $val['wx_stock_detailed.record_id'] = array('eq',$id);
        $val['wx_stock_detailed.stock_type'] = array('eq',0);
        $data = $M
        ->fetchSql(0)
        ->where($val)
        ->field('wx_goods_specfocus.focus_name,wx_goods_specfocus.spec_mey,wx_goods_specfocus.id,
                wx_stock_detailed.buying,wx_stock_detailed.quantity,wx_stock_detailed.stock_type,wx_stock_detailed.stock_type,
                wx_goods_spec.spec_name,
                wx_stock_record.taketime,wx_stock_record.total_mey,wx_stock_record.total,wx_stock_record.discount
                ')
        ->join('wx_stock_record ON wx_stock_record.id = '.$id)
        ->join('wx_goods_specfocus ON wx_stock_detailed.focus_id = wx_goods_specfocus.id')
        ->join('wx_goods_spec ON wx_goods_specfocus.spec_id = wx_goods_spec.id')
        ->order('wx_goods_spec.spec_name desc,wx_goods_specfocus.focus_name')
        ->select();
        //p($data);
        foreach($data as $key=>$item){
            $row[$key]['taketime'] = $item['taketime'];
            $row[$key]['total_mey'] = $item['total_mey'];
            $row[$key]['total'] = $item['total'];
            $row[$key]['discount'] = $item['discount'];
        }
        //P($row[0]);
        //输入赠品
        $val['wx_stock_detailed.stock_type'] = array('eq',1);
        $dataB = $M
        ->fetchSql(0)
        ->where($val)
        ->field('wx_gift_specfocus.gift_spec,wx_gift_specfocus.gift_mey,wx_gift_specfocus.id,
                wx_stock_detailed.buying,wx_stock_detailed.quantity,wx_stock_detailed.stock_type,wx_stock_detailed.stock_type,
                wx_gift_spec.gift_name,
                wx_stock_record.taketime,wx_stock_record.total_mey,wx_stock_record.total
                ')
        ->join('wx_stock_record ON wx_stock_record.id = '.$id)
        ->join('wx_gift_specfocus ON wx_stock_detailed.focus_id = wx_gift_specfocus.id')
        ->join('wx_gift_spec ON wx_gift_specfocus.gift_id = wx_gift_spec.id')
        ->select();
        //p($dataB);
        $this->assign('id',$id);
        $this->assign('row',$row[0]);
        $this->assign('list',$data);
        $this->assign('listB',$dataB);
        $this->display('Index/Stock/examine');
    }
    /******
    *审核采购单
    */
    public function confirmExamine()
    {
        if(!IS_AJAX)$this->error('非法请求');
        extract(I());
        //$id = 9;
        $M = M('stock_detailed');
        $val['record_id'] = array('eq',$id);
        //$val['stock_type'] = array('eq',0);
        $data = $M
        ->fetchSql(0)
        ->where($val)
        ->field('focus_id,quantity,stock_type')
        ->select();
        //p($data);
        $stock = M('stock_record');
        $result = $stock->where('id='.$id)->setField('state',3);
        if($result){
            $specfocus = M('goods_specfocus');
            $gift = M('gift_specfocus');
            foreach ($data as $key => $value) {
                if($value['stock_type']==0){
                    $specfocus->where('id='.$value["focus_id"])->setInc('spec_stock',$value['quantity']);
                }else{
                    $gift->where('id='.$value["focus_id"])->setInc('gift_stock',$value['quantity']);
                }
            }
            $this->ajaxReturn('采购完成');
        }else{
            $this->ajaxReturn('订单已被处理,请勿重复处理');
        }
        
    }
}