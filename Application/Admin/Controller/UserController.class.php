<?php
namespace Admin\Controller;
use Think\Controller; 

/**
* 用户控制器
*/
class UserController extends Controller
{

	public function userlist()
	{
		$user 		=	M('user');  
		$count		= 	$user -> count(); 
		$page		=   new \Org\Util\page($count,8);
		$show 		= 	$page -> show();
		$userlist 	= 	$user -> limit($page ->firstRow,8) -> select();

		$this -> assign('sPages',$show);
		$this -> assign('userlist',$userlist);
		$this -> display();
	}
	/**
	 * 登陆操作
	 * @return [type] [description]
	 */
	public function doLogin()
	{
		 if(IS_POST){ 
		 	$user_name 	=	I('abc');
		 	$user_pwd	=	I('efg');
		 	$user 		=   D('user'); 

	 		$result	= $user -> where("user_name = '{$user_name}' and user_pwd = '{$user_pwd}'")
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