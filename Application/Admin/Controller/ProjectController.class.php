<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\AuthController;
/**
* 获取项目数据
*/
class ProjectController extends AuthController
{
	/**
	 * 项目列表
	 * @return [type] [description]
	 */
	public function projectList()
	{ 
		 $project    =  M('project'); 
		 if (IS_POST) {

		    $money=I("in-money");
		    $profit=I("in-profit");
		    $lent_profit=I("in-lent-profit");
		    $type=I("in-type");
		    $data['proj_no']=time()+1;
		    $data['proj_total']=$money;
		    $data['pro_profit']=$profit;
		    $data['br_profit']=$lent_profit;
		    $data['proj_type']=$type;
		    $data['result']="0";
		    $data['proj_amount']="0";
		    $data['create_time']=time();
		    $project->add($data);

		}
		 $kw     	 =  I('get.kw','');	//没有kw ,返回空字符串
		 $filter_kw      =  str_replace('+','',$kw);
		 $col     	 =  I('get.col','');	//没有kw ,返回空字符串
		 $where 	 =  $filter_kw ?  $this -> getWhere($filter_kw,$col):'1=1';//获取Where 条件
		 //分页
		 $count		 = 	$project -> alias('p') 
		 						 -> join('__PROJECT_TYPE__ t on t.type_id = p.proj_type')
		 						 -> join('__PROJECT_LOCK__ l on l.type_id = t.type_id')
		 						 -> where($where) 
		 						 -> count(); 
		 $page 		 =  new \Org\Util\page($count , 8);
		 $show 		 =  $page -> show();

		 //获取当前页数据
		 $projlist   =  $project -> alias('p')
		 						 -> join('__PROJECT_TYPE__ t on t.type_id = p.proj_type')
		 						 -> join('__PROJECT_LOCK__ l on l.type_id = t.type_id')
		 						 -> field('p.*,t.*,l.*,p.id as proj_id')
		 						 -> where($where)
		 						 -> limit($page ->firstRow,8)
		 						 -> select();
		 $this -> assign('sPages',$show);
		 $this -> assign('projlist',$projlist);
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
				 $where =  ' t.type_name  like "%' . $kw . '%"'; //用户手机搜索
					break;
			case 4: 
				 $where =  ' proj_lock  like "%' . $kw . '%"';  //用户邮箱搜索
					break;
			default:
				 $where['proj_id|proj_no|type_name|proj_lock'] =
				 				array('like',array('%'.$kw.'%'),'OR');
					break;
		}
		return $where;
	}
}