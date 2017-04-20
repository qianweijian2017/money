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
		$where="1=1";
    	$count=$fund->where($where)->count(); //where 为条件,可作分类分页 
    	$page=new Page($count,8);	//count总页数,limit是显示的行数
    	$fundlist=$fund->where($where)->order('fund_code desc')->limit($page->firstRow.',8' )->select();
    	$sPages=$page->show();
   	 	$this->assign('fundlist',$fundlist);// 赋值数据集
    	$this->assign('sPages',$sPages);// 赋值分页输出
    	$this->display(); // 输出模板 
	}
	/**
	 * 获取数据
	 * @param  int $num  获取的条数
	 * @param  object $fund 对象 
	 * @return boolean 成功信息
	 */
	 public function getFundData($num='',$fund){
	 			$array=array();
				//得到网页数据
			    $json = file_get_contents('http://www.gffunds.com.cn/apistore/JsonService?service=BaseInfo&method=Fund&op=queryFundByGFCategory');
				//把json转换成数组
			    $text = json_decode($json, true);
				//需要抽取的字段
			    $data = ['FUNDCODE',
			        'FUNDFULLNAME',
			        'FUNDTYPEGF',
			        'FUNDNAME',
			        'WEBPRODUCTNAME',
			        'YIELDTHISY',
			        'NAVUNIT',
			        'DAYINCREMENTRATE',
			        'NAVACCUMULATED',
			        'FUNDSTATUS',
			        'CREATEDATEFA'];
			      $col=['fund_code',
			        'fund_fullname',
			        'fund_type',
			        'fund_name',
			        'web_productname',
			        'year_profit',
			        'navunit',
			        'day_up',
			        'threemouth_up',
			        'fund_status',
			        'create_time' 
			      ];
			    if ($num == "") {
			        $num = $text['totalrows'];
			    } 
			    for ($i = 0; $i < $num; $i++) { 
			        $str = "";//新建空字符串 
			        $douhao = '';

			        //循环抽取的数组

			        foreach ($data as $val) {

			            //将一个数组的值拼接成字符串

			            $str .= $douhao . $text['data'][$i][$val];

			            $douhao = ',';
			        }
			        //将字符串转化为新数组

			        $pieces = explode(",", $str);
			         
			        $array[]=$pieces; 

			    } 

			    foreach ($array as $key) {
			    	foreach ($key as $k => $value) {
			     			 $a[$col[$k]]=$value;
			     		}
			     	$fund->add($a); 
			    } 
			    return true;

	}
}