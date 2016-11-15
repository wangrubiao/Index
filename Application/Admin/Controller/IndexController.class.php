<?php
/***
*@ Index Controller
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		if(!session('info')){
			$this->redirect('Login/index');
		}
		$this->display('Index/index');
    }
	public function top(){
		$this->display('Index/head');
	}
	 public function menu(){
		$Model = D('Grade'); 
		/* foreach($Model->all() as $item){
			if($item['fid']==0){
				echo '+<b>'.$item['name'].'</b></br>';
				foreach($Model->all() as $val){
					if($val['fid']==$item['id']){
						echo '-'.$val['name'].'</br>';
					}
				}
			}
		} */
		$this->assign('top',$Model->menu());
		$this->assign('sub',$Model->menu());
		$this->display('Index/menu');
    }
    public function main(){
      $this->display('Index/main');
    }
	public function drag(){
		$this->display('Index/drag');
	}
	public function footer(){
		$this->display('Index/footer');
	}
}