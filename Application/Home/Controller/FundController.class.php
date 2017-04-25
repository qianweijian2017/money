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
		$fundmain=$fund->order('year_profit desc')->limit(0,8)->select();
   	 	$this->assign('fundmain',$fundmain);// 赋值数据集
    	$this->display(); // 输出模板 
	}
	public function fundlist(){  
		$fund = M('fund'); // 实例化fund数据对象  fund 是你的表名   
		$where=I("get.ftype")=="2"?"1=1":$this->getWhere(I("get.ftype"));   
    	$count=$fund->where($where)->count(); //where 为条件,可作分类分页   
    	$sPages="";							//定义分页
    	if($count>8){ 
	    	$page=new Page($count,8);	//count总页数,limit是显示的行数 
	    	$sPages=$page->show();
    	}
    	//获取列表
    	$fundlist=$fund->where($where)->order('year_profit+0 desc')->limit($page->firstRow.',8' )->select();
    	$this->assign('fundlist',$fundlist);// 赋值数据集
    	$this->assign('sPages',$sPages);// 赋值分页输出  
		$this->display(); // 输出模板 
	}
	public function getWhere($fund_type){ 
		$where="fund_type='{$fund_type}'";
	   	return $where;
	} 

	public function detail(){ 

		$this->display();
	}


 

}