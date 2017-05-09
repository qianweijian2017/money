<?php
namespace Admin\Common\Controller; 
use Think\Controller;
/**
* 
*/
class AdminController extends Controller
{
	
	 public function _initialize()
	 {
	 	echo "1";
	 	$user	=  session('admin');
	 	if(!$user){
	 		$this -> error('请先登陆',U('User/login'));
	 	}
	 }
}