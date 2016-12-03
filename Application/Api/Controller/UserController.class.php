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
//class UserController extends Controller {
class UserController extends IndexController {
	/**
	* 登陆api
	*/
	public function login(){
		extract(I());
		//echo md5($pwd);
		$val['username'] = array('eq',$username);
		$val['password'] = array('eq',$password);
		$result= M('zmx_member')->where($val)->select();
		if($result){
			$arr = array(
					'code' => '200',
					'msg' => 'success',
					'data'=>$result[0]
			);
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
			$arr = array(
					'code' => '200',
					'msg' => 'success',
					'data'=>$result[0]
			);
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
			M('zmx_member')->where('uid = '.$this->uid)->setInc('plan');
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
			$arr = array(
					'code' => '200',
					'msg' => 'success',
					'data'=>$result
					);
		}else{
			$arr = array(
					'code'=>'6006',
					'msg'=>'计划列表为空'
			);
		};
		//$this->ajaxReturn($arr);
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	 * 发布说说
	 */
	public function addSay()
	{
		extract(I());
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
			//设置文件上传
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  =     'uploads/'; // 设置附件上传根目录
			$upload->savePath  =     ''; // 设置附件上传（子）目录
			// 上传文件
			$info   =   $upload->upload();
			//P($info);
			if($info){
				foreach($info as $file){
					$img[] = $file['savepath'].$file['savename'];
				}
			}
			$str = implode(',',$img);
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
		$result = M('zmx_comment')
		->join('__ZMX_MEMBER__ ON __ZMX_COMMENT__.uid = __ZMX_MEMBER__.uid')
		->where($where)->order('commtime desc')->select();
		foreach($result as $kvo=>$vo){
				if($vo['fid'] == 0){
					$list[] = array(
							'id' => $vo['id'],
							'sid' => $vo['sid'],
							'uid' => $vo['uid'],
							'fid' => $vo['fid'],
							'content' => $vo['content'],
							'commtime' => date('Y-m-d h:i:s',$vo['commtime']),
							//会员表信息
							'name' => $vo['name'],
							'face' => $vo['face']
							
							
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
		if($type == 1){
			//最新
			$sort = 'pubtime';
		}else if($type == 2){
			//热门
			$sort = 'likes';
		}else{
			//最多
			$sort = 'comment';
		}
		$count = M('zmx_say')->count();  //记录总数
		$num = ceil($count/2); //返回总页数
		$thisPage = ($page-1)*2;   //返回条数
		
		$result = M('zmx_plan')
		->field('
				w_zmx_member.uid, w_zmx_member.name, w_zmx_member.face,w_zmx_member.username,
				w_zmx_plan.status, w_zmx_plan.pid, w_zmx_plan.totaldays,
				w_zmx_say.sid, w_zmx_say.scontent, w_zmx_say.img, w_zmx_say.pubtime, w_zmx_say.likes, w_zmx_say.comment
				')
		->join('__ZMX_MEMBER__ ON __ZMX_PLAN__.uid = __ZMX_MEMBER__.uid')
		->join('__ZMX_SAY__ ON __ZMX_PLAN__.pid = __ZMX_SAY__.pid')
		->order($sort.' desc')
		->limit($thisPage,2)
		->select();
		//获取说说SID 组成数组
		foreach ($result as $key=>$vo){
			$list[] = $vo['sid'];
			if($result[$key][img] != null){
				$result[$key][img] = explode(',',$vo['img']);
			}else{
				$result[$key][img] = '';
			}
			
		}
		//根据SID查询返回点赞集
		$where['sid'] = array('in',$list==null?'0':$list);
		$likes = M('zmx_likes')->field('sid,uid,likestime,lface')->where($where)->select();
		if(count($likes) >= 1){
			//点赞集合归类到说说数组
			foreach($likes as $key=>$vo){
				foreach($result as $k=>$v){
					if($v['sid'] == $vo['sid']){
						$result[$k]['dz'][] = $likes[$key];
					}
				}
			}
		}else{
			//如果当前页的说说没有被点赞记录
			foreach ($result as $key=>$vo){
				$result[$key]['dz'] = '';
			}
		}
		$arr = array(
				'code' => '200',
				'msg' => 'success',
				'num' => $num,
				'data'=>$result
		);
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	 * 广场列表数据
	 * @access public
	 * @param  int      $type   (1:最新发布,2:最多浏览,3:最多回复)
	 * @return array    该方法已经抛弃，可以删除
	 */
	public function squareaxxxxxxxxxxxxxxx()
	{
		extract(I());
		if($type == 1){
			//最新
			$sort = 'pubtime';
		}else if($type == 2){
			//热门
			$sort = 'likes';
		}else{
			//最多
			$sort = 'comment';
		}
		
		$count = M('zmx_say')->count();  //记录总数
		$num = ceil($count/2); //返回总页数
		$thisPage = ($page-1)*2;   //返回条数
		
		echo "真实条数".$zcount."<br>";
		echo "总条数".$count."<br>";
		echo "共有".$num."页<br>";
		echo "当前第".$page."页<br>";
		p($thisPage);
		$result = M('zmx_plan')
		->field('
				w_zmx_member.uid, w_zmx_member.name, w_zmx_member.face,
				w_zmx_plan.status, w_zmx_plan.pid, w_zmx_plan.totaldays,
				w_zmx_say.sid, w_zmx_say.scontent, w_zmx_say.img, w_zmx_say.pubtime, w_zmx_say.likes, w_zmx_say.comment,
				w_zmx_likes.uid as l_uid,w_zmx_likes.likestime as l_time,w_zmx_likes.lface
				')
		->join('__ZMX_MEMBER__ ON __ZMX_PLAN__.uid = __ZMX_MEMBER__.uid')
		->join('__ZMX_SAY__ ON __ZMX_PLAN__.pid = __ZMX_SAY__.pid')
		->join('LEFT JOIN __ZMX_LIKES__ ON __ZMX_SAY__.sid = __ZMX_LIKES__.sid')		
		->order($sort.' desc')
		->limit($thisPage,2)
		->select();
		//获取点赞数组
		foreach ($result as $key=>$item){
			foreach ($result as $k=>$vo){
					if($item['sid'] == $vo['sid']){
						//unset($result['']);
						if($vo['l_uid'] != null){
							$result[$key]['dz'][] = array('uid'=>$vo['l_uid'],'time'=>$vo['l_time'],'face'=>$vo['lface']);
						}else{
							$result[$key]['dz'] = '';
						}
						
					}
			}
		}
		$list = array();
		foreach($result as $key=>$v){
			unset($result[$key]['l_uid']);
			unset($result[$key]['l_time']);
			unset($result[$key]['lface']);
			$list[$v['sid']] = $result[$key];
		}
		
		$list = array_merge($list); //重新排序数组
		//图文图片
		foreach ($list as $key=>$vo){
			if(!empty($vo['img'])){
				$img = explode(',',$vo['img']);
				foreach ($img as $v){
					unset($list[$key]['img']);
					$list[$key]['imgs'][] = $v;
				}
			}else{
				$list[$key]['imgs'] = '';
				unset($list[$key]['img']);
			}
		}
		$arr = array(
				'code' => '200',
				'msg' => 'success',
				'data'=>$list
		);
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
		
	}
	public function follow(){
		extract(I());
		if(empty($called) or empty($type))
		{
			$arr = array(
					'code' => '80003',
					'msg' => '参数不完整'
			);
		}else if($this->uid == $called){
			$arr = array(
					'code' => '80004',
					'msg' => '不能关注自己'
			);
		}else if($type == 'follow'){
			//关注别人
			$data['calling'] = $this->uid;
			$data['called'] = $called; //被关注人ID
			$result = M('zmx_follow')->where($data)->find();
			if(!$result){
				M('zmx_follow')->add($data);
				M('zmx_member')->where('uid = '.$this->uid)->setInc('calling');
				M('zmx_member')->where('uid = '.$called)->setInc('called');
				$arr = array(
						'code' => '200',
						'msg' => '关注成功'
				);
			}else{
				//不能重复关注
				$arr = array(
						'code' => '80001',
						'msg' => '请勿重复关注'
				);
			}
			
		}else if($type == 'cancel'){
			//取消关注
			$where['calling'] = array('eq',$this->uid);
			$where['called'] = array('eq',$called);
			M('zmx_follow')->where($where)->delete();
			M('zmx_member')->where('uid = '.$this->uid)->setDec('calling');
			M('zmx_member')->where('uid = '.$called)->setDec('called');
			$arr = array(
					'code' => '80002',
					'msg' => '取消关注成功'
			);
		}else{
			
		}
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
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
