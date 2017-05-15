<?php
namespace Admin\Controller;
use Think\Controller;
class AjaxController extends Controller
{
	/**
	 * 登陆操作
	 * @return [type] [description]
	 */
	public function doLogin()
	{
		 if(IS_POST){ 
		 	$admin_name =	I('abc');
		 	$admin_pwd	=	I('efg');
		 	$admin 		=   D('admin'); 
		 	 
	 		$result	= $admin -> where("admin_name = '{$admin_name}' and admin_pwd = '{$admin_pwd}'")
	 						 -> find();  
	 		if($result){  
 				session("admin",$result);
 				$this -> success('登陆成功!',U('index/index')); 
	 		}else{
	 			$this -> error('用户名或密码错误!');
	 		} 

		 }
	}
	public function doExit() 
	{

		session('admin',null); 
		if(!session('admin')){
			$this -> success('退出成功!',U('ajax/login'),3);
			
		}
		exit;
	}

	/**
	 * 登陆界面 
	 * @return [type] [description]
	 */
	public function login()
	{
		session_start();
		$this -> display('user/login');
	}

}