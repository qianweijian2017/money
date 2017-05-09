<?php


namespace Home\Controller;
use Think\Controller;

class NetloanController extends Controller
{
    public function net()
    {
    	$project  	  =  M('project');
    	$count	      =  $project -> count();
    	$page    	  =  new \Org\Util\page($count,8);
    	$show 		  =  $page -> show();
    	$projectlist  =	 $project -> alias('p')
    							  -> join('__PROJECT_TYPE__ t on t.type_id = p.proj_type','right')
    							  -> join('__PROJECT_LOCK__ l on l.type_id = t.type_id','left')  
    							  -> limit($page ->firstRow,8)
    							  -> select(); 

    	$this -> assign('page',$show);
    	$this -> assign('projectlist',$projectlist);
        $this -> display();
    }

      /**
     * 定期理财详情
     * @return [type] [description]
     */
    public function detail(){ 
    	if(IS_GET){
    		$id=I('get.fixid',0);
    		if($id){
    			$model 		= M('project');
    			$project 	= $model 
		    		    	  ->select($id); 
				$this -> assign('projectitem',$project);// 赋值数据集 
    		}
    	}
		$this->display();
	}
}