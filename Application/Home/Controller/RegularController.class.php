<?php 
namespace Home\Controller;
use Think\Controller;
use Org\Util\page;// 导入分页类
class RegularController extends Controller
{
    /**
     * 定期理财 
     * @return [type] [description]
     */
    public function regular()
    { 
    	$model  =  M('project'); 
    	$count=$model->count(); //where 为条件,可作分类分页   
    	$sPages = "";							//定义分页
    	if($count > 8){ 
	    	$page = new Page($count,8);	//count总页数,limit是显示的行数 
	    	$sPages = $page->show();
    	}
    	$project=$model->alias('p')
		    		   ->join('__PROJECT_TYPE__ t on t.type_id = p.proj_type')
                       ->join('__PROJECT_LOCK__ l on l.type_id = p.proj_type')
		    		   ->where('proj_lock=180')
		    		   ->select();  
    	$this->assign('projlist',$project);// 赋值数据集
    	$this->assign('sPages',$sPages);// 赋值分页输出  
        $this->display();
    }
  
    public function getProjBorrower()
    {
        sliceNumber("999.60");exit;
        //获取基金的ID
        //通过ID去查找基金代码
        //再通过基金代码去查找本基金被借走的用户和其详细信息
       $borrower      =   M('ProjBorrower');
       $project       =   M('project');           //项目表
       $proj_id       =   I('post.proj_id');      //项目ID
       $pagenum       =   I('post.pagenum');      //当前页
       $rowstart      =   ($pagenum - 1) * 3;     //起始行数
       
       $proj_no       =   $project ->  field("proj_no")
                                   ->  find($proj_id);
     
       
       $proj_user     =    $borrower -> alias('b')
                                     -> join('__USER__ u on u.id = b.user_id')
                                     -> join('__USER_CONTENT__ c on c.user_id = u.id')
                                     -> where("proj_no = {$proj_no['proj_no']}") 
                                     -> limit($rowstart,3)
                                     -> select();
        for($i = 0 ;$i < count($proj_user) ; $i ++ ){
            $result['user_real_name']     = $proj_user[$i]['user_real_name'];
            $result['user_id_card']       = $proj_user[$i]['user_id_card'];  
            $hidden_user   = hidden($result);  
            $slideNumber   = sliceNumber($proj_user[$i]['in_amount']);  
            $info          .="<tr>
                                <td>{$proj_no['proj_no']}</td>
                                <td>{$hidden_user['user_rel_name']}</td>
                                <td>{$hidden_user['user_id_card']}</td> 
                                <td>{$slideNumber}</td>
                              </tr>";
        }
       
        $pagenum      =   intval($pagenum);
        $pagenum1     =   $pagenum + 1;
        $pagenum2     =   $pagenum + 2;
        $pagenum3     =   $pagenum + 3;
        $pagehtml     ="
                        <li><a href='javascript:;' data-src=$pagenum1  > $pagenum1 </a></li>
                        <li><a href='javascript:;' data-src= $pagenum2  > $pagenum2 </a></li>
                        <li><a href='javascript:;' data-src= $pagenum3  > $pagenum3 </a></li> 
                        <li><a href='javascript:;' data-src= $pagenum  >当前: $pagenum </a></li>
                        ";

       $this -> ajaxReturn(
                array(
                    'info' => $info,
                    'page' => $pagehtml
                    )
       );  
       exit;               
    }
}