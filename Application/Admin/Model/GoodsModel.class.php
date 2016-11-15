<?php
/***
*@ Goods Model
*@ 商品模型
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Model;
use Think\Model;

class GoodsModel extends Model{

	protected $_validate = array(

	);
	/*****
	*批量更新数据
	*saveAll(参数1,参数2,参数3)
	*参数1：更改的条件id(一维数组)
	*参数2：要操作的表名
	*参数3：要更改的字段
	*/
	public function saveAll($arr,$table,$field){
        $key = implode(',', array_keys($arr));
        $sql = "UPDATE $table SET $field = CASE id "; 
        foreach ($arr as $id => $item) { 
             $sql .= sprintf("WHEN %d THEN %d ", $id, $item); 
        } 
        $sql .= "END WHERE id IN ($key)"; 
        $Model = M();
        $Model->execute($sql);
        return true;
    }
}

?>