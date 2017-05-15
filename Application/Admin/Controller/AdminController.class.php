<?php
namespace Admin\Controller;
use Think\Controller; 
use Admin\Common\Controller\AuthController;
/**
* 用户控制器
*/
class AdminController extends AuthController
{
 
	/**
	 * 超级管理员管理列表
	 * @return [type] [description]
	 */
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
	
	

	 
}