<?

namespace Home\Controller;
use Think\Controller; 
use Org\Util\page;
class GoodsController extends Controller {

  	public function index(){
  		$news=M('news'); 
  		$newslist=$news->select();
 	 	$this->assign("newslist",$newslist);  
 	 	$this->display();
 	}
	public function detail(){
		if(IS_GET){ 
			 $iNewsid=I('get.newsid');
	  		 $news=M('news'); 
	 	 	 $newsDetail=$news->where("id={$iNewsid}")->find();  
	 	 	 $this->assign("newsDetail",$newsDetail); 
	 	 	 $this->display();
 	 	 }
 	} 
 	
}
 
?>
 