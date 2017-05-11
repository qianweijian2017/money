<?php
namespace Admin\Controller;
use Think\Controller;

/**
* 获取项目数据
*/
class ProjectController extends Controller
{
	/**
	 * 项目列表
	 * @return [type] [description]
	 */
	public function projectList()
	{
		 $project    =  M('project'); 
		 //分页
		 $count      =  $project -> count();
		 $page 		 =  new \Org\Util\page($count , 8);
		 $show 		 =  $page -> show();
		 //获取当前页数据
		 $projlist   =  $project -> alias('p')
		 						 -> join('__PROJECT_TYPE__ t on t.type_id = p.proj_type')
		 						 -> join('__PROJECT_LOCK__ l on l.type_id = t.type_id')
		 						 -> limit($page ->firstRow,8)
		 						 -> select();
		 $this -> assign('sPages',$show);
		 $this -> assign('projlist',$projlist);
		 $this -> display();
	}

}