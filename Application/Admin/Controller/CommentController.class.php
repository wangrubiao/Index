<?php
/***
*@ comment Controller
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Controller;
use Think\Controller;
class CommentController extends OrderController {
	protected  function _initialize()
	{
		parent::_initialize();
		//$power = explode(',',session('info.power'));
		//p($power);
		//parent::jurisdiction(array(1,2,3,4));
	}
	public function index()
	{
		$query = M('evaluate');
		//Page输出
		$count = $query->where()->count();
		$Page = $this->PagesStyle($count,10);
		$show = $Page->show();
		$list = $query
		->field('wx_evaluate.goods_id,wx_evaluate.content,wx_evaluate.evaltime,wx_evaluate.name,wx_evaluate.id,
				wx_goods_picture.img_url,wx_goods_picture.sort,wx_goods_picture.img_id,
				wx_goods.title
				')
		->join('wx_goods_picture ON wx_evaluate.goods_id = wx_goods_picture.img_id')
		->join('wx_goods ON wx_evaluate.goods_id = wx_goods.id')
		->where('wx_goods_picture.sort = 1')
		->order('wx_evaluate.evaltime desc')
		->limit($Page->firstRow.','.$Page->listRows)
		->select();
		//p($list);
		$this->assign('list',$list);
		$this->assign('page',$show);// 分页输出
		$this->display('Index/comment');
	}
	//更新评论内容
	public function changeContent(){
		extract(I());
		$query = M('evaluate');
		$val['id']=array('eq',$id);
		$data['content'] = $content;
		$rel = $query->where($val)->save($data);
		if($rel){
			$data['content'] = $content;
			$data['status'] = 1;
		}else{
			$data['status'] = 0;
		}
		$this->ajaxReturn($data);
	}
	//刷新3天内随机时间
	public function changeTime(){
		extract(I());
		$begintime = date("Y-m-d",strtotime("-3 day")); //
		$endtime = date("Y-m-d h:i:s",time());
		$upTime = $this->randomDate($begintime, $endtime);
		$query = M('evaluate');
		$val['id']=array('eq',$id);
		$data['evaltime'] = $upTime;
		$rel = $query->where($val)->save($data);
		if($rel){
			$data['content'] = date('Y-m-d h:i:s',$upTime);
			$data['status'] = 1;
		}else{
			$data['status'] = 0;
		}
		$this->ajaxReturn($data);
	}
	/** 
 	*   生成某个范围内的随机时间 
 	*	$begintime  起始时间 格式为 Y-m-d H:i:s 
 	* 	$endtime    结束时间 格式为 Y-m-d H:i:s   
 	*/  
	public function randomDate($begintime, $endtime="")
	{  
    	$begin = strtotime($begintime);  
    	$end = $endtime == "" ? mktime() : strtotime($endtime);  
    	$timestamp = rand($begin, $end);  
    	//return date("Y-m-d H:i:s", $timestamp);
    	return $timestamp; 
	}  
    
}