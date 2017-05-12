<?php
namespace Admin\Controller;
use Think\Controller; 

/**
* 用户控制器
*/
class AdminController extends Controller
{

	public function adminlist()
	{
		$admin 		=	M('admin');  
		$count		= 	$admin -> count(); 
		$page		=   new \Org\Util\page($count,8);
		$show 		= 	$page  -> show();
		$adminlist 	= 	$admin -> limit($page ->firstRow,8) -> select();

		$this -> assign('sPages',$show);
		$this -> assign('adminlist',$adminlist);
		$this -> display();
	}
	/**
	 * 登陆操作
	 * @return [type] [description]
	 */
	public function doLogin()
	{
		 if(IS_POST){ 
		 	$admin_name 	=	I('abc');
		 	$admin_pwd	=	I('efg');
		 	$admin 		=   D('admin'); 
		 	 
	 		$result	= $admin -> where("admin_name = '{$admin_name}' and admin_pwd = '{$admin_pwd}'")
	 						 -> find();  
	 		if($result){ 
	 			if($result['role_id'] == 2){
	 				session("admin",$result);
	 				$this -> success('登陆成功!',U('index/index'));
	 			}else{
	 				$this -> error('对不起,您没有权限!');
	 			}
	 		}else{
	 			$this -> error('用户名或密码错误!');
	 		}

	 		 
	 	 



		 }
	}



	/**
	 * 登陆界面 
	 * @return [type] [description]
	 */
	public function login()
	{
		session_start();
		$this -> display();
	}

}