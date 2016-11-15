<?php
/***
*@ Index Controller
*@ Wangrubiao
*@ 2015
*/
namespace Mall\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
    	echo 111111;
		$this->display('Index/index');
	}
}