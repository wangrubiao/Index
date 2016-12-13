<?php
/***
*@ Grade Controller
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Controller;
use Think\Controller;
class GradeController extends Controller {
    public function index(){
		//列表页
		extract(I());
		$this->display('Index/gradeIndex');
    }
    public function gradeList(){
		//显示所有职位列表
		extract(I());
		$Model = D('Grade');
		$result = $Model->positionList();
		$this->assign('result',$result);
		$this->display('Index/gradeList');
    }
	public function main(){
		//职位分配默认页
		extract(I());
		$this->display('Index/drag');
    }
	public function gradeCheck(){
		//赋予权限分配页
		extract(I());
		$Model = D('Grade');
		$result = $Model->menu();
		$power  = $Model->gradeId($aid);
		$this->assign('aid',$aid);
		$this->assign('power',$power);
		$this->assign('name',$position);
		$this->assign('top',$Model->menu('all'));
		$this->assign('sub',$Model->menu('all'));
		$this->display('Index/gradeCheck');
    }
	public function handle(){
		//更新权限
		extract(I());
		$grade = M('Grade');
		$val['aid']    = array('eq',$aid);
		$data['range'] = substr($range,0,-1);
		$grade->where($val)->save($data);
		unset($data); 
		$data['status']  = 1;
		$data['content'] = '权限更新成功！';
		$this->ajaxReturn($data);
		
	}
	public function addGrade(){
		//新增职位
		$Model = D('Grade');
		$this->assign('top',$Model->menu('all'));
		$this->assign('sub',$Model->menu('all'));
		$this->display('Index/addGrade');
	}
	public function addGradeHandle(){
		//处理ajax新增职位
		if(!IS_AJAX)$this->error('非法请求');
		extract(I());
		$Model = D('Grade');
		$add['position'] = $position;
		$add['range']    = substr($range,0,-1);
		if (!$Model->create('',5)){
			$data['status']  = 0;
			$data['content'] = $Model->getError();
			$this->ajaxReturn($data);
		}else{
			$grade = M('Grade');
			$grade->where()->add($add);
			if($grade){
				$data['status']  = 1;
				$data['content']="新增职位成功";
			}else{
				$data['status']  = 0;
				$data['content']="Error.新增职位失败！";
			}
			$this->ajaxReturn($data);
		}
		
	}
}