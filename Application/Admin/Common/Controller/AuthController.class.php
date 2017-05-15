<?php
namespace Admin\Common\Controller; 
use Think\Controller;
/**
* 
*/
class AuthController extends Controller
{
	
	 public function _initialize()
	 {
	  
	 	$user	       		=  session('admin');
	 	if(!$user){
	 		$this -> error('请先登陆',U('ajax/login'));exit;
	 	}
	 	$role_id       		=  $user['role_id'];			//获取用户权限ID
	 	$rbac_role_auths    =  C('RBAC_ROLE_AUTHS');		//获取用户组的权限
	 	$currenRoleAuth		=  $rbac_role_auths[$role_id];	//获取当前用户的权限

	 	$controller    		=  strtolower(CONTROLLER_NAME);
	 	$action        		=  strtolower(ACTION_NAME); 
	 	 
	 	if($role_id != 1){
	 		if(!in_array($controller.'/'.$action,$currenRoleAuth) && !in_array($controller.'/*',$currenRoleAuth)){
	 				$this -> error('您没有权限',"",3);exit();
	 		}

	 	}
	 }
}