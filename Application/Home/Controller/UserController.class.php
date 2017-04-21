<?php
namespace Home\Controller;
use Think\Controller; 
use Think\Verify;
/**
* 用户类
*/
class UserController extends Controller
{
	
	public function login()
	{ 
		$this->display();
	}
	public function register()
	{	
		$this->display();
	}
	public function verify()
	{

		$verify=new Verify();
		$verify->useCurve=false;	//混淆曲线
		$verify->useNoise=true;		//添加杂点
		$verify->entry();			//绘制
	}
	 
}