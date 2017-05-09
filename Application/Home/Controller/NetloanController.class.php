<?php


namespace Home\Controller;
use Think\Controller;

class NetloanController extends Controller
{
    public function net()
    {
    	$project  	  =  M('project');
    	$where        =  I('get.type',0) == 0 ? : 'proj_type='.I('get.type');
        $order        =  I('get.sort',0) == 0 ? : $this -> gerSort(I('get.sort'));  
        $count        =  $project -> where($where) -> count();
        $page         =  new \Org\Util\page($count,8);  
        $show         =  $page   -> show();
    	$projectlist  =	 $project -> alias('p')
    							  -> join('__PROJECT_TYPE__ t on t.type_id = p.proj_type','right')
    							  -> join('__PROJECT_LOCK__ l on l.type_id = t.type_id','left')  
                                  -> where($where)
                                  -> order($order)
    							  -> limit($page ->firstRow,8)
    							  -> select(); 
        $heartCount   =  $project -> where('proj_type = 1')
                                  -> count();
        $mountCount   =  $project -> where('proj_type = 2')
                                  -> count();  
        $this -> assign('heartCount',$heartCount);
        $this -> assign('mountCount',$mountCount);
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
    			$project 	= $model -> alias('p')
    								         -> join('__PROJECT_LOCK__ l on l.type_id = p.proj_type')
		    		    	  		     -> select($id); 
				$this -> assign('projectitem',$project);// 赋值数据集 
    		}
    	}
		$this->display();
	}
    /**
     * 排序
     * @return [type] [description]
     */
    public function gerSort($sort)
    {

        switch ($sort) {
            case '1':
                 $order = 'create_time desc';
                break;
            case '2':
                 $order = 'pro_profit desc';
                break;
            case '3':
                 $order = 'l.proj_lock desc';
                break;
            default:
                 $order = 'create_time desc';
                break;
        }
        return $order;
    }
}