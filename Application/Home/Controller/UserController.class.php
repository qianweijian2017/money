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
		if(IS_POST){
			$verify=new Verify();
			if($verify->check(I('verify'))){
				$user_table=D('user');
				$result=$user_table->where('user_phone="'.I('user_phone').'" and user_pwd="'.md5(I('user_pwd')).'"')->find();
				if($result){
					session('user',$result);
					$this->success('登录成功',U('personal/index'));
				}else{
					$this->error('密码或手机号有误');
				}

			}else{
				$this->error('验证码错误');
			}
		}else{
			$this->display();
		}
	}
	public function signOut(){
		session('user',null);
//		print_r(session(user));exit();
		$this->success('退出成功');
	}
	public function register()
	{
		if(IS_POST){
			$verify=new Verify();
			if($verify->check(I("verify"))){
				$user_data=D('user');
				if($user_data->create()){
					$data=array();
					$data['user_phone']=I('user_phone');
					$data['user_recommend_phone']=I('user_recommend_phone');
					$data['user_pwd']=md5(I('user_pwd'));
					$data['create_time']=time();
					$result=$user_data->add($data);//返回自增长id
					$this->success('注册成功',U('user/login'));
				}else{
					$this->error($user_data->getError());
				}
			}else{
				$this->error('验证码不正确');
			}
		}else{
			$this->display();
		}
	}
	public function verify()
	{

		$verify=new Verify();
		$verify->useCurve=false;	//混淆曲线
		$verify->useNoise=true;		//添加杂点
		$verify->entry();			//绘制
	}
	 
}