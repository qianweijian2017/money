<?
namespace Home\Controller;
use Think\Controller; 
/**
* 基金超市类
*/
class FundController extends Controller
{
	//CSS样式删除了还可以加载????*{ 12px }怎么来的!
	function fundlist()
	{
		
		$fund=M("fund");
 		$fundlist=$fund->select();  
 		$this->assign("fundlist",$fundlist);
		$this->display();
	}
}