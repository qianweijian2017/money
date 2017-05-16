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
		 	$admin_pwd	=	md5($admin_pwd);
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
	/**
	 * 删除操作
	 * @return [type] [description]
	 */
	public function delete()
	{
		if(IS_POST){
			$ids			=   I('aIds'); 			//获取ID
			$controller 	=   I('controllerName');	//获取控制器名
			$model 			=   D($controller);			//创建模型
			$sIds			=   implode(',',$ids);		//分割成字符串 
			if($model  -> delete($sIds)){
				$this -> ajaxReturn(
						array(
						'info' => '删除成功!',
						'icon' => 1	
							)
					);
				exit;
			}else{

				$this -> ajaxReturn(
						array(
						'info' => '删除失败!',
						'icon' => 2		
							)
					);
				exit;
			}

		} 

	}
}