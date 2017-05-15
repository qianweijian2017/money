<?php
namespace Admin\Controller;
use Think\Controller;  
use Admin\Common\Controller\AuthController;
/**
* 用户控制器
*/
class UserController extends AuthController
{

	public function userlist()
	{
		$kw     	 =  I('get.kw','');	//没有kw ,返回空字符串
		$filter_kw   =  str_replace('+','',$kw);
		$col     	 =  I('get.col','');	//没有kw ,返回空字符串
		$where 	 	 =  $filter_kw ?  $this -> getWhere($filter_kw,$col):'1=1';//获取Where 条件
	  
		$user 		 =	M('user');  
		$count		 = 	$user -> where($where) ->count(); 
		$page		 =   new \Org\Util\page($count,8);
		$show 		 = 	$page -> show();
		$userlist 	 = 	$user -> limit($page ->firstRow,8) 
							  -> where($where)
							  -> select();

		$this -> assign('sPages',$show);
		$this -> assign('userlist',$userlist);
		$this -> display();
	}
	/**
	 * 获取Where条件
	 * @param  [type] $kw  [关键词]
	 * @param  [type] $col [列名 用数字表示]
	 * @return [type]      [description]
	 */
	public function getWhere($kw,$col)
	{ 

		switch ($col) {
			case 1:
				 $where =  ' id like "%' . $kw . '%"';		  //用户ID搜索
					break;
			case 2:
				 $where =  ' user_name like "%' . $kw . '%"';   //用户名搜索
					break;
			case 3:
				 $where =  ' user_phone  like "%' . $kw . '%"'; //用户手机搜索
					break;
			case 4: 
				 $where =  ' user_email  like "%' . $kw . '%"';  //用户邮箱搜索
					break;
			default:
				 $where['id|user_name|user_phone|user_email'] =
				 				array('like',array('%'.$kw.'%'),'OR');
					break;
		}
		return $where;
	}





}