<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\AuthController;
/**
* 获取项目数据
*/
class ProjbuyedController extends AuthController
{
	/**
	 * 项目购买完成后
	 * @return [type] [description]
	 */
	public function projBuyedList()
	{
		$buyed  		=  M('ProjBuyed');			//获取模型 
	    $kw     	 	=  I('get.kw','');	//没有kw ,返回空字符串
	    $filter_kw      =  str_replace('+','',$kw);
	    $col     	 	=  I('get.col','');	//没有kw ,返回空字符串
	    $where 	 		=  $filter_kw ?  $this -> getWhere($filter_kw,$col):'1=1';//获取Where 条件
		$count          =  $buyed -> alias('p')
								  -> join('__USER__ u on u.id = p.user_id','left')
								  -> field('p.id as buyedid')
								  -> where($where)  
								  -> count();		//总记录数

		$page  			=  new \Org\Util\page($count,8);
		$show 			=  $page -> show();
		$projbuyed      =  $buyed -> alias('p')
								  -> join('__USER__ u on u.id = p.user_id','left')
								  -> field('proj_no,user_name,p.id as buyedid')
								  -> where($where)
								  -> limit($page ->firstRow,8)
								  -> select(); 
		$this -> assign('page',$show);
		$this -> assign('projbuyed',$projbuyed);
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
				 $where =  ' p.id like "%' . $kw . '%"';		  //用户ID搜索
					break;
			case 2:
				 $where =  ' proj_no like "%' . $kw . '%"';   //用户名搜索
					break;
			case 3:
				 $where =  ' u.user_name  like "%' . $kw . '%"'; //用户手机搜索
					break;
		 
			default:
				 $where['p.id|proj_no|user_name'] =
				 				array('like',array('%'.$kw.'%'),'OR');
					break;
		}
		return $where;
	}


}