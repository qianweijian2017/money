<?php


namespace Home\Controller;
use Think\Controller;
use Org\Util\page;// 导入分页类
class RegularController extends Controller
{
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
		    		   ->where('proj_lock=180')
		    		   ->select();  
    	$this->assign('projectlist',$project);// 赋值数据集
    	$this->assign('sPages',$sPages);// 赋值分页输出  
        $this->display();
    }
    public function detail(){ 
    	if(IS_GET){
    		$id=I('get.fixid',0);
    		if($id){
    			$model = M('project');
    			$project=$model 
		    		    ->select($id); 
				$this->assign('projectitem',$project);// 赋值数据集 
		        
    		}
    	}
		$this->display();
	}
}