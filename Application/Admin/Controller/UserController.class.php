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
		$userlist 	= 	$user -> limit($page ->firstRow,8) 
							  -> select();

		$this -> assign('sPages',$show);
		$this -> assign('userlist',$userlist);
		$this -> display();
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