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
	public function fundlist(){  
		$fund = M('fund'); // 实例化Data数据对象  date 是你的表名 
    	$count=$fund->where($where)->count(); //where 为条件,可作分类分页
    	$page=new Page($count,$limit);	//count总页数,limit是显示的行数
    	$fundlist=$fund->where($where)->order('fund_code desc')->limit($page->firstRow.',8' )->select();
    	$sPages=$page->show();
   	 	$this->assign('fundlist',$fundlist);// 赋值数据集
    	$this->assign('sPages',$sPages);// 赋值分页输出
    	$this->display(); // 输出模板 
	}
	
 
}