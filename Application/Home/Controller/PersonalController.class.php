<?php
namespace Home\Controller;
use Think\Controller; 
use Think\Verify;
use Common\Controller\AuthController;
/**
* 用户类
*/
class PersonalController extends AuthController
{
	public function index(){
		$this->display();
	}
	 
}