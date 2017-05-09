<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\AdminController;

/**
* 获取基金数据
*/
class FundController extends AdminController
{
 /**
  * 基金列表
  * @return [type] [description]
 */
  public function fundlist()
  {
  	 $fund 		  =	  M('fund');
  	 $count 	  =	  $fund -> count();
  	 $page		  =	  new \Org\Util\page($count,8);
  	 $show		  = 	$page -> show();
  	 $fundlist	=   $fund -> limit($page ->firstRow,8) -> select();
  	 $this -> assign('sPages',$show);
  	 $this -> assign('fundlist',$fundlist);
     $this -> display();
  }

 

}