<?php
namespace Home\Controller;
use Think\Controller; 
use Org\Util\page;// 导入分页类
/**
* 基金超市类
*/
class FundController extends Controller
{ 
	/**
	 * 显示基金超市列表并分页 
	 * @return [array] [基金超市数组]
	 * @return [string] [分页的字符串]
	 */
	public function fundmain(){   
		$fund = M('fund'); 
		$fundmain=$fund -> alias('f')
						-> join('__FUND_TYPE__ t on t.type_id =f.fund_type','left')
						-> order('year_profit desc') 
						-> limit(0,8) 
						-> select();
   	 	$this->assign('fundmain',$fundmain);// 赋值数据集
    	$this->display(); // 输出模板 
	}
	/**
	 * 基金详情列表
	 * @return [type] [description]
	 */
	public function fundlist(){  
		$fund 	   		   =  M('fund'); // 实例化fund数据对象  fund 是你的表名   
		$where  		   =  I("get.ftype")=="9"?"1=1":$this->getWhere(I("get.ftype"));   
    	$count  		   =  $fund  -> alias('f')
    							   	 -> where($where) 
    				 			   	 -> join('__FUND_TYPE__ t on t.type_id =f.fund_type','left')
    				 			   	 -> count(); //where 为条件,可作分类分页   
    	$sPages = "";							//定义分页
    	if($count>8){ 
	    	$page 		   =   new Page($count,8);	//count总页数,limit是显示的行数 
	    	$sPages 	   =   $page -> show();
    	}
    	//获取列表
    	$fundlist 		   =   $fund ->  alias('f')
    							     ->  join('__FUND_TYPE__ t on t.type_id =f.fund_type','left')
    							     ->  where($where)  
				    			     ->	 order('year_profit+0 desc')
				    			     ->	 limit($page->firstRow , 8 )
				    			     ->	 select();
		//类型列表
		$fund_type 		   =  M('fund_type');
		$fund_type_nav	   =  $fund_type -> field('type_id , fund_type as type_name')
										 -> select();	//将基金的类型选项动态化
		$this -> assign('fund_type_nav',$fund_type_nav);
    	$this -> assign('fundlist',$fundlist);// 赋值数据集
    	$this -> assign('sPages',$sPages);// 赋值分页输出  
		$this -> display(); // 输出模板 
	}
	/**
	 * Where条件
	 * @param  [type] $fund_type [description]
	 * @return [type]            [description]
	 */
	public function getWhere($fund_type){  
		$where="type_id = $fund_type"; //按基金类型排序
		
	   	return $where;
	} 

	 
}