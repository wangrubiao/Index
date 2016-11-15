<?php
/***
*@ Index Controller
*@ Wangrubiao
*@ 2015
*/
namespace Mall\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index()
    {
    	P(session());
		$this->display('Index/user');
	}
}