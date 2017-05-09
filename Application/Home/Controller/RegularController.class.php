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
    /**
     * 定期理财详情
     * @return [type] [description]
     */
    public function detail(){ 
        if(IS_GET){
            $id=I('get.fixid',0);
            if($id){
                $model      = M('project');
                $project    = $model -> alias('p')
                                     -> join('__PROJECT_LOCK__ l on l.type_id = p.proj_type')
                                     -> select($id); 
                $this -> assign('projitem',$project);// 赋值数据集 
            }
        }
        $this->display();
    }
    /**
     * 获取投资人数据
     * @return [type] [description]
     */
    public function getProjBorrower()
    {   
        //获取基金的ID
        //通过ID去查找基金代码
        //再通过基金代码去查找本基金被借走的用户和其详细信息
       $borrower      =   M('ProjBorrower');
       $project       =   M('project');           //项目表 
       $proj_id       =   I('get.id'); 
       $pagenum       =   I('get.pagenum'); 

       $proj_no       =   $project   ->  field("proj_no")
                                     ->  where("id = $proj_id")
                                     ->  find(); 
       $proj_no       =   $proj_no['proj_no'];   
                             
       $count         =   $borrower -> alias('b')
                                    -> join('__USER__ u on u.id = b.user_id')
                                    -> join('__USER_CONTENT__ c on c.user_id = u.id')
                                    -> where("proj_no = {$proj_no}") 
                                    ->  count();    

       $page          =   new \Org\Util\page($count,3);
       $pagehtml      =   $page -> show();
       

       $info          =   $borrower -> alias('b')
                                    -> join('__USER__ u on u.id = b.user_id')
                                    -> join('__USER_CONTENT__ c on c.user_id = u.id')
                                    -> where("proj_no = {$proj_no}") 
                                    -> limit($page ->firstRow,3)
                                    -> select(); 
                                   
       foreach ($info as $key => $value) {  

               $user['user_real_name']  =  $value['user_real_name'];
               $user['user_id_card']    =  $value['user_id_card'];
               $user                    =  hidden($user);
               $user_in_amount          =  sliceNumber(intval($value['in_amount'])); 
               $userhtml .="<tr>
                                <td>{$proj_no}</td>
                                <td>{$user['user_real_name']}</td>
                                <td>{$user['user_id_card']}</td> 
                                <td>{$user_in_amount}</td> 
                            </tr>" ; 

        }  
       $this -> ajaxReturn(
            array(
                'userhtml' => $userhtml,
                'page' => $pagehtml
                )
       );  
       exit;               
    }


  
}