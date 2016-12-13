<?php
/***
*@ Admin Controller
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function index(){
		//列表页
		//p(session());
		extract(I());
	 	$Admin  = D("Admin");
		$count = $Admin->adminCount(); //获取总记录数
		$pageRow = 10;	//每页显示条数
		$pageCount = ceil($count/$pageRow); //获取总页数
		$result = $Admin->adminList(1,$pageRow);
		$this->assign('result',$result); //显示当前页记录数
		$this->assign('pageCount',$pageCount); //显示当前总页数
		$this->display('Index/administration');
    }
	public function ajaxPage(){
		extract(I());
	 	$Admin  = D("Admin");
		$count = $Admin->adminCount(); //获取总记录数
		$pageRow = 10;	//每页显示条数
		$pageCount = ceil($count/$pageRow); //获取总页数
		$thisPage=explode('_',$thisPage);
		$showPage = 5; //显示页码数量
		
		$data['aaa']=$thisPage[1];
		if($typePage=="Next"){
			$thisPage = ($thisPage[1]+1);
		}
		if($typePage=="Prev"){
			$thisPage = ($thisPage[1]-1);
		}
		if($thisPage <= 1){
			$page.='<li class="pagenNo"><a href="#">Prev</a></li>';
		}else{
			$page.=' <li class=""><a href="#">Prev</a></li>';
		}
		if($thisPage > 3){
			$page.=' <li class=""><a href="#">...</a></li>';
		}
			$result = $Admin->adminList($thisPage,$pageRow);
			foreach($result as $vo){
				$vo["lasttime"]  = $vo["lasttime"]==""?'未登录':date("Y-m-d",$vo["lasttime"]);
				$data['content'].= ' <tr>
										<td>'.$vo["id"].'</td>
										<td>'.$vo["username"].'</td>
										<td>'.$vo["name"].'</td>
										<td>'.$vo["position"].'</td>
										<td><a href="#" rel="tooltip" class="recovery" id="'.$vo["username"].'" title="恢复账号?"><i class="icon-play"></i></a></td>
										<td>'.$vo["lasttime"].'</td>
										<td><a href="#"><i class="icon-pencil"></i></a>&nbsp
											<a href="#myModal" class="checkYes" role="button" data-toggle="modal" title="'.$vo["id"].'"><i class="icon-remove"></i></a>
										</td>
										</tr>';
				}
		if($thisPage >= $pageCount){
			$page.='<li class="pagenNo"><a href="#">Next</a></li>';
		}else{
			$page.=' <li class=""><a href="#">Next</a></li>';
		}
		$page.='<li class="thisPage infoNo"><a href="#" id="p_'.$thisPage.'">当前第'.$thisPage.'页</a></li>
				<li class="infoNo"><a href="#">共'.$pageCount.'页</a></li>';
		$data['page'] = $page;
		$data['status']  = 1;
		$this->ajaxReturn($data);
		
	}
	public function userState(){
		//更改账号状态
		if(!IS_AJAX)$this->error('非法请求');
		extract(I());
		$val['username'] = array('eq',$username);
		$data['state']	 = $ustate;
		$User 	= M("Admin");
		$result = $User->fetchSql(0)->where($val)->save($data);
		$data['status']=1;
		$this->ajaxReturn($data);
	}
	public function userDele(){
		//删除管理员
		extract(I());
		//鉴于数据安全，停用下面删除功能。
		$data['status']  = 0;
		$data['content'] = '很抱歉，删除功能已关闭!';
		$this->ajaxReturn($data);
		exit; 
		//code end
		if($id == session('info.uid')){
			$data['status']  = 3;
			$data['content'] = '无法删除自己';
			$this->ajaxReturn($data);
		}
		$User = M("Admin");
		$val['id']      = array('eq',$id);
		$val['default'] = array('neq',1);
		//$result = $User->fetchSql(0)->where($val)->delete();  //关闭删除功能
		if($result){
			$data['status']  = 1;
			$data['content'] = '管理员删除成功';
		}else{
			$data['status']  = 0;
			$data['content'] = '不能删除初始化管理员';
		}
		$this->ajaxReturn($data);	
	}
	public function added(){
		//添加页
		$this->display('Index/added');
	}
	public function ajaxForm(){
		//处理提交过来的ajax数据，仅返回ajax数据，不做任何处理
		if(!IS_AJAX)$this->error('非法请求');
		extract(I());
		$Admin = D("Admin");
		if (!$Admin->create('',5)){
			$data['status']  = 0;
			$data['content'] = $Admin->getError();
			$this->ajaxReturn($data);
		}else{
			$data['status']  = 1;
			$data['content'] = "验证成功";
			$this->ajaxReturn($data);
		}
	}
	public function handle(){
		//处理提交过来的ajax数据，完成管理员表单注册
		if(!IS_AJAX)$this->error('非法请求');
		extract(I());
		$Admin = D("Admin");
		if (!$Admin->create('',5)){
			$data['status']  = 0;
			$data['content'] = $Admin->getError();
			$this->ajaxReturn($data);
		}else{
			$_POST['pubtime'] = time();
			$_POST['password'] = $password = XMD(XMD($username).XMD($password));
			$Admin->add(I());
			$data['status']  = 1;
			$data['content']  = "添加管理员成功";
			$this->ajaxReturn($data);
		}
		
	}
}