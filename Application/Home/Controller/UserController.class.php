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
				$data=I('user_login');
				$user_pwd=I('user_pwd');
				$sql="(user_name='".$data."' or user_email='".$data."' or user_phone='".$data."') and user_pwd='".md5($user_pwd)."'";
				$result=$user_table->where($sql)->find();

				if($result){
					$user_info=hidden($result);
					$user_info['id']=$result['id'];
					$user_info['user_portrait']=$result['user_portrait'];
//				print_r($user_info);
					session('user',$user_info);
//					session('userAll',$result);
					$this->success('登录成功',U('personal/index'));
				}else{
					$this->error('登陆失败,输入用户信息有误');
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
	public function register(){
		$this->display();
	}
	public function register_phone_ajax(){
		$_phone=array(
				array('user_phone','require','手机号不能为空！'), //默认情况下用正则进行验证
				array('user_phone','/^1[3|4|5|8][0-9]\d{4,8}$/','手机号码格式错误！','0','regex',1),
				array('user_phone','','手机号已注册！','3','unique'),
				array('user_pwd','require','密码不能为空'),
				array('user_pwd','5,16','密码不能少于5位，且不能多于16位',3,'length'),
				array('repassword','user_pwd','两次输入的密码不一样',0,'confirm'), // 验证确认密码是否和密码一致
		);
		$user_data=D('user');
		$arr=array();
		$arr[I('name')]=I('user_val');
		if(I('name')=='repassword'){
			$arr['user_pwd']=I('user_pwd');
		}
//		print_r($arr);
		if(!$user_data->validate($_phone)->create($arr)){
			$this->ajaxReturn(array('stauts'=>0,'massage'=>$user_data->getError()));
		}else{
			$this->ajaxReturn(array('stauts'=>1,'massage'=>"√"));
		}
	}
	public function register_phone()
	{
		$verify = new \Think\Verify();
			if($verify->check(I("verify"))){
			// 保存自动验证的规则
			$_phone=array(
					array('user_phone','require','手机号不能为空！'), //默认情况下用正则进行验证
					array('user_phone','/^1[3|4|5|8][0-9]\d{4,8}$/','手机号码格式错误！','0','regex',1),
					array('user_phone','','手机号已注册！','3','unique'),
					array('user_pwd','require','密码不能为空'),
					array('user_pwd','5,16','密码不能少于5位，且不能多于16位',3,'length'),
					array('repassword','user_pwd','两次输入的密码不一样',0,'confirm'), // 验证确认密码是否和密码一致
			);
				$user_data=D('user');
				$user_content=D('user_content');
				if($user_data->validate($_phone)->create()){
					$data=array();
					$data['user_phone']=I('user_phone');
					$data['user_pwd']=md5(I('user_pwd'));
					$result=$user_data->add($data);//返回自增长id

					$data_content['create_time']=time();
					$data_content['user_register']=date('YmdHim',time()).rand(10000,99999);
					$data_content['user_id']=$result;
					$result_content=$user_content->add($data_content);

					if($result>0&&$result_content==1){
						$this->success('注册成功',U('user/login'));
					}else{
						$this->error('注册失败');
					}
				}else{
					$this->error($user_data->getError());
				}
			}else{
				$this->error('验证码不正确');
			}
	}
	public function register_email_ajax(){
		// 保存自动验证的规则
		$_email=array(
				array('user_email','email','email格式错误'),
				array('user_email','require','邮箱不能为空！'), //默认情况下用正则进行验证
				array('user_email','','邮箱已注册！','3','unique'),
				array('user_pwd','require','密码不能为空'),
				array('user_pwd','5,16','密码不能少于5位，且不能多于16位',3,'length'),
				array('repassword','user_pwd','两次输入的密码不一样',0,'confirm'), // 验证确认密码是否和密码一致
		);
		$user_data=D('user');
		$arr=array();
		$arr[I('name')]=I('user_val');
		if(I('name')=='repassword'){
			$arr['user_pwd']=I('user_pwd');
		}
//		print_r($arr);
		if(!$user_data->validate($_email)->create($arr)){
			$this->ajaxReturn(array('stauts'=>0,'massage'=>$user_data->getError()));
		}else{
			$this->ajaxReturn(array('stauts'=>1,'massage'=>"√"));
		}
	}
	public function register_email()
	{
			$verify=new Verify();
			if($verify->check(I("verify"))){
			// 保存自动验证的规则
			$_email=array(
					array('user_email','email','email格式错误'),
					array('user_email','require','邮箱不能为空！'), //默认情况下用正则进行验证
					array('user_email','','邮箱已注册！','3','unique'),
					array('user_pwd','require','密码不能为空'),
					array('user_pwd','5,16','密码不能少于5位，且不能多于16位',3,'length'),
					array('repassword','user_pwd','两次输入的密码不一样',0,'confirm'), // 验证确认密码是否和密码一致
			);
			$user_data=D('user');
			$user_content=D('user_content');
			if($user_data->validate($_email)->create()){
				$data=array();
				$data['user_email']=I('user_email');
				$data['user_pwd']=md5(I('user_pwd'));
				$result=$user_data->add($data);//返回自增长id

				$data_content['create_time']=time();
				$data_content['user_register']=date('YmdHim',time()).rand(10000,99999);
				$data_content['user_id']=$result;
				$result_content=$user_content->add($data_content);

				if($result>0&&$result_content==1){
					$this->success('注册成功',U('user/login'));
				}else{
					$this->error('注册失败');
				}
			}else{
				$this->error($user_data->getError());
			}
			}else{
				$this->error('验证码不正确');
			}
	}
	public function verify()
	{

		$verify=new Verify();
		$verify->useCurve=false;	//混淆曲线
		$verify->useNoise=true;		//添加杂点
		$verify->entry();			//绘制
	}
	public function verify_ajax(){
		$verify=new Verify(array('reset'=>false));
		if(!$verify->check(I('verify_ajax'))){
			$this->ajaxReturn(array('stauts'=>0,'massage'=>'验证码错误'));
		}else{
			$this->ajaxReturn(array('stauts'=>1,'massage'=>'√√√'));
		}
	}
	 
}