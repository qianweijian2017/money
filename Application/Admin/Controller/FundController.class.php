<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\AuthController;

/**
* 获取基金数据
*/
class FundController extends AuthController
{
   /**
    * 基金列表
    * @return [type] [description]
   */
    public function fundlist()
    {
        	 $fund 		  =	  M('fund'); 
           $kw        =   trim(I('get.kw',''));  //没有kw ,返回空字符串
           $filter_kw =   str_replace('+','',$kw);
           $col       =   I('get.col',''); //没有kw ,返回空字符串
           $where     =   $filter_kw ?  $this -> getWhere($filter_kw,$col):'1=1';//获取Where 条件

        	 $count 	  =	  $fund -> alias('f')
                                -> join('__FUND_TYPE__ t on t.type_id = f.fund_type')  
                                -> where($where) 
                                -> count();

        	 $page		  =	  new \Org\Util\page($count,8);

        	 $show		  = 	$page -> show();

        	 $fundlist	=   $fund -> alias('f')
                                -> join('__FUND_TYPE__ t on t.type_id = f.fund_type')
                                -> field('f.*,t.*,t.fund_type as type_name') 
                                -> where($where) 
                                -> limit($page ->firstRow,8) 
                                -> select();
            //赋值
        	 $this -> assign('sPages',$show);
        	 $this -> assign('fundlist',$fundlist);
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
               $where =  ' fund_code like "%' . $kw . '%"';      //用户ID搜索
                break;
            case 2:
               $where =  ' fund_name like "%' . $kw . '%"';   //用户名搜索
                break;
            case 3:
               $where =  ' t.fund_type  like "%' . $kw . '%"'; //用户手机搜索
                break;
           
            default:
               $where['fund_code|fund_name|t.fund_type'] =
                        array('like',array('%'.$kw.'%'),'OR');
                break;
      }
      return $where;
    }
   

}