<?php
/***
*@ 会员模型
*@
*/
namespace Api\Model;
use Think\Model\ViewModel;

class SayViewModel extends ViewModel {
	protected $tableName = 'zmx_say';  //自定模型对应表名
	
	public $viewFields = array(
			'zmx_say'=>array('sid','pid','scontent'),
			//'zmx_plan'=>array('title'=>'category_name', '_on'=>'zmx_say.pid=zmx_plan.pid','_type'=>'LEFT'),
			'zmx_likes'=>array('likestime', 'sid'=>'l_sid','_on'=>'zmx_say.sid=zmx_likes.sid'),
	);
	
}
?>