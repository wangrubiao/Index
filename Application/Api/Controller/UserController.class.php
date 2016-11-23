<?php

// +----------------------------------------------------------------------
// | W+ [ Not the same fireworks ]
// +----------------------------------------------------------------------
// | Describe: 会员Api
// +----------------------------------------------------------------------
// | Time: 2016/11/15
// +----------------------------------------------------------------------
// | Author: 64941334@qq.com
// +----------------------------------------------------------------------

namespace Api\Controller;
use Think\Controller;
class UserController extends Controller {
//class UserController extends IndexController {
	/**
	* 登陆api
	*/
	public function login(){
		extract(I());
		//echo md5($pwd);
		$val['username'] = array('eq',$username);
		$val['pwd'] = array('eq',md5($pwd));
		$result= M('zmx_member')->where($val)->select();
		if($result){
			$arr = $result;
		}else{
			$arr = array(
						'code'=>'4002',
						'msg'=>'账号或者密码错误'
						);
		}
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);  
	}
	/**
	* 会员资料 api
	* 参数 current_user 为要查询的会员账号
	*/
	public function getUserInfo()
	{	
		extract(I());
		$val['username'] = array('eq',$current_user);
		$result= M('zmx_member')->where($val)->select();
		if($result){
			$arr = $result;
		}else{
			$arr = array(
						'code'=>'3002',
						'msg'=>'查询的会员不存在'
						);
		}
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);  
	}
	/**
	 * 创建计划
	 */
	public function addPlan()
	{
		extract(I());
		$data['uid'] = $this->uid;
		$data['title'] = trim($title);
		$data['describe'] = trim($describe);
		$data['jointime'] = time();
		$data['starttime'] = strtotime($starttime);
		$data['endtime'] = strtotime($endtime);
		$data['money'] = $money;
		$data['totaldays'] = 0;
		if($data['starttime'] < strtotime(date("Y-m-d"))){
			$arr = array(
					'code'=>'6001',
					'msg'=>'开始时间已过'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		if($data['endtime'] < $data['starttime']){
			$arr = array(
					'code'=>'6002',
					'msg'=>'结束时间大于开始时间'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		if(diffBetweenTwoDays($starttime,$endtime) < 7){
			$arr = array(
					'code'=>'6005',
					'msg'=>'计划周期不足7天'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		
		if($data['title']==null){
			$arr = array(
					'code'=>'6003',
					'msg'=>'计划标题为空'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		if($data['describe']==null){
			$arr = array(
					'code'=>'6004',
					'msg'=>'计划描述为空'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		if(date('Ymd', $data['starttime']) == date('Ymd')){
			$data['status'] = 1; //进行中
		}else{
			$data['status'] = 0; //为开始
		}
		$result= M('zmx_plan')->add($data);
		if($result){
			$arr = array(
					'code'=>'6000',
					'msg'=>'计划创建成功'
			);
		}
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	 * 读取计划列表
	 */
	public function getPlan()
	{
		extract(I());
		$where['uid'] = array('eq',$this->uid);
		$where['status'] = array('eq',$status);
		$result = M('zmx_plan')->fetchSql(0)->where($where)->select();
		if($result){
			//p($result);
			$arr = $result;
		}else{
			$arr = array(
					'code'=>'6006',
					'msg'=>'计划列表为空'
			);
		};
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	 * 发布说说
	 */
	public function addSay()
	{
		extract(I());
		
		//设置文件上传
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     'uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件
		$info   =   $upload->upload();
		if($info){
			foreach($info as $file){
				$img[] = $file['savepath'].$file['savename'];
			}
		}
		$str = implode(',',$img);
		//echo $str;
		$where['pid'] = array('eq',$pid);
		$result = M('zmx_plan')->fetchSql(0)->where($where)->select();
		if(!$result){
			$arr = array(
					'code'=>'7001',
					'msg'=>'计划不存在'
			);
		}else if($result[0]['status'] != 1){
			$arr = array(
					'code'=>'7002',
					'msg'=>'非进行中计划'
			);
		}else if(trim($scontent)==null){
			$arr = array(
					'code'=>'7003',
					'msg'=>'描述不能为空'
			);
		}else if($this->is_say($pid)){
			$arr = array(
					'code'=>'7004',
					'msg'=>'重复坚持'
			);
		}else{
			//发布成功
			$data['pid'] = $pid;
			$data['scontent'] = $scontent;
			$data['pubtime'] = time();
			$data['likes'] = 0;
			$data['comment'] = 0;
			$data['img'] = $str;
			$add = M('zmx_say')->add($data);
			if($add){
				M('zmx_plan')->where($where)->setInc('totaldays'); // 坚持天数加1
				$arr = array(
						'code'=>'7000',
						'msg'=>'文字发布成功'
				);
			}
			
		}
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	 * 说说点赞
	 */
	public function likes()
	{
		extract(I());
		if(!$this->checkSay($sid)){
			$arr = array(
					'code'=>'8001',
					'msg'=>'说说不存在'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		$where['sid'] = array('eq',$sid);
		$where['uid'] = array('eq',$this->uid);
		$result = M('zmx_likes')->where($where)->select();
		if($result){
			$arr = array(
					'code'=>'8002',
					'msg'=>'重复点赞'
			);
		}else{
			$data['sid'] = $sid;
			$data['uid'] = $this->uid;
			$data['likestime'] = time();
			M('zmx_likes')->add($data);
			M('zmx_say')->where('sid = '.$sid)->setInc('likes');
			$arr = array(
					'code'=>'8000',
					'msg'=>'点赞成功'
			);
		}	
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	 * 说说评论
	 */
	public function comment()
	{
		extract(I());
		$data['sid'] = $sid;
		$data['uid'] = $this->uid;
		$data['fid'] = empty($fid)?0:$fid;
		$data['cid'] = $cid;
		$data['content'] = $content;
		$data['commtime'] = time();
		if(trim($cid)==null){
			$arr = array(
					'code'=>'9004',
					'msg'=>'参数不完整'
			);
		}else if(!$this->checkSay($sid)){
			$arr = array(
					'code'=>'9001',
					'msg'=>'说说不存在'
			);
		}else if(trim($content)==null){
			$arr = array(
					'code'=>'9002',
					'msg'=>'评论内容为空'
			);
		}else if($fid != 0){
			$where['id'] = array('eq',$fid);
			$result = M('zmx_comment')->where($where)->select();
			if(!$result){
				$arr = array(
						'code'=>'9003',
						'msg'=>'回复的评论不存在'
				);
			}else{
				M('zmx_comment')->add($data);
				M('zmx_say')->where('sid = '.$sid)->setInc('comment');
				$arr = array(
						'code'=>'9000',
						'msg'=>'回复成功'
				);	
			}
			
		}else{
			M('zmx_comment')->add($data);
			M('zmx_say')->where('sid = '.$sid)->setInc('comment');
			$arr = array(
					'code'=>'9000',
					'msg'=>'回复成功'
			);
			
		}
		
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	 * 获取评论
	 */
	public function getComment(){
		extract(I());
		if(!$this->checkSay($sid)){
			$arr = array(
					'code'=>'3001',
					'msg'=>'说说不存在'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		$where['sid'] = $sid;
		$result = M('zmx_comment')->where($where)->order('commtime desc')->select();
		foreach($result as $kvo=>$vo){
				if($vo['fid'] == 0){
					$list[] = array(
							'id' => $vo['id'],
							'sid' => $vo['sid'],
							'uid' => $vo['uid'],
							'fid' => $vo['fid'],
							'content' => $vo['content'],
							'commtime' => $vo['commtime']
							
					);		
				}
		}
		foreach($list as $kvo=>$vo){
			foreach($result as $kv=>$v){
				if($v['cid'] == $vo['id']){
					$list[$kvo]['replys'][] = $result[$kv];
				}	
			}
		
		}
		$arr = array('comment'=>$list);
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	 * 广场列表数据
	 * @access public
	 * @param  int      $type   (1:最新发布,2:最多浏览,3:最多回复)
	 * @return array
	 */
	public function square()
	{
		extract(I());
		//$type
		 $result = M('zmx_say')
		->where('status = 1')
		->field('uid,title,describe,money,status,totaldays,
				scontent,pubtime,likes,comment,img
				')
		->join('__ZMX_PLAN__ ON __ZMX_SAY__.pid = __ZMX_PLAN__.pid')
		->select();
		
		foreach ($result as $key=>$vo){
			if(!empty($vo['img'])){
				$img = explode(',',$vo['img']);
				foreach ($img as $v){
					unset($result[$key]['img']);
					$result[$key]['imgs'][] = $v;
				}
			}
			
		}
		p($result);
		echo json_encode($result, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
		///////////////////////

	}
	/**
	 * 检查说说是否存在
	 * @access protected
	 * @param  int      $sid    说说SID
	 * @return boolean
	 */
	protected function checkSay($sid='')
	{
		$where['sid'] = array('eq',$sid);
		$result = M('zmx_say')->where($where)->select();
		if($result){
			return true;
		}else{
			return false;
		}
	}
	/**
	 * 检查是否重复发布说说
	 * @access protected
	 * @param  int      $pid    计划PID
	 * @return boolean
	 */
	protected function is_say($pid)
	{
		$where['pid'] = array('eq',$pid);
		$result = M('zmx_say')->field('max(pubtime)')->where($where)->select();
		if(date('Y-m-d',$result[0]['max(pubtime)']) == date('Y-m-d')){
			return true;
		}else{
			return false;
		}
	}
}
