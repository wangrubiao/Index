<?php

// +----------------------------------------------------------------------
// | W+ [ Not the same fireworks ]
// +----------------------------------------------------------------------
// | Describe: 会员注册Api 
// +----------------------------------------------------------------------
// | Time: 2016/11/15
// +----------------------------------------------------------------------
// | Author: 64941334@qq.com
// +----------------------------------------------------------------------

namespace Api\Controller;
use Think\Controller;
class RegController extends Controller {

    public $uid;  //请求api的会员ID

    /**
     * 构造函数
     */
    public function _initialize(){
        extract(I());
        $val['username'] = array('eq',$username);
        $result= M('zmx_member')->where($val)->select();
        if($result){
            $this->uid = $result[0]['uid'];
        }else{
            $this->uid = null;
        }
        //echo $this->uid;
    }
    /**
     * 定时脚本
     * 每天更新计划状态 统计金额
     */
    public function timing(){

       /* $filename = 'log.txt';
        $word = "写入成功.时间是：".date('Y-m-d H:i:s')."\r\n";  //双引号会换行 单引号不换行
        file_put_contents($filename, $word,FILE_APPEND);
        exit;
       */
        //根据条件查询出主键ID
        $where['status'] = array('in','0,1');
        $where['signtime'] = array('LT',strtotime(date('Y-m-d'))); //LT表达式小于
        $data['status'] = 3;

        $result = M('zmx_plan')
            ->field(array('pid'))
            ->where($where)
            ->select();
        //p($result);
        //p(implode(',',i_array_column($result,'pid')));


        //修改计划状态
        $result = M('zmx_plan')
           // ->fetchSql(true)
            ->where($where)
            ->save($data);
    }
	/**
	 * 金额设置
	 */
	public function money(){
		$arr = array(
				'code'=>'5001',
				'msg'=>'手机不正确',
				'data' => array(5,10,20,30,50,100)
		);
		echo json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}
	/**
	 * 消息推送
	 */
	public function message(){
		extract(I());
		//主叫
	/*	$data['calling_name'] = $
		$data['calling_accunt'] = $
		$data['calling_face'] = $
		//被叫
		$data['called_accunt'] = $
		*/
		$json	=  json_encode(I(), JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
		JPushApp('message',$user_id,$json);
	}
	/**
	* 手机注册api
	*/
	public function index()
	{
		extract(I());
		//p(I());
		if(!is_mob($phone)){
			$arr = array(
					'code'=>'5001',
					'msg'=>'手机不正确'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		if(trim($password)==NULL){
			$arr = array(
					'code'=>'5002',
					'msg'=>'密码不能为空'
			);
			die(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		}
		$data['username'] = $phone;
		$data['phone'] = $phone;
		$data['password'] = md5($password);
		$data['name']  = "会员_".rand(1,9999);
		$data['sex'] = 0;
		$data['rank'] = 0;
		$data['face'] = '2016-11-25/5837c0b9b930c.jpg';
		$data['money'] = 0;
		$data['spaces'] = 1;
		$data['jointime'] = time();
		$data['joinip'] = get_client_ip();
		$data['brief'] = '这货很懒，没说啥...';
		$data['plan'] = 0;
		$data['calling'] = 0;
		$data['called'] = 0;
		
		$result= M('zmx_member')->add($data);
		if($result){
			$arr = array(
					'code'=>'200',
					'msg'=>'Success',
					'data' => $data
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
                    //p($result);
					if(count($likes) >= 1){
						//点赞集合归类到说说数组
						foreach($likes as $key=>$vo){
							foreach($result as $k=>$v){
								if($v['sid'] == $vo['sid']){
									$result[$k]['dz'][] = $likes[$key];
                                    if($this->uid == null){
                                        //$result[$k]['dz'][] = $likes[$key];
                                        $result[$k]['result'] = 0; //该用户未点缀此说说
                                    }else if($vo['uid'] == $this->uid){
                                        $result[$k]['result'] = 1; //该用户未已点缀此说说
                                    }else{
                                        $result[$k]['result'] = 0; //该用户未点缀此说说
                                    }
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
