<?php
namespace Home\Controller;
use Think\Controller; 
use Think\Verify;
use Common\Controller\AuthController;
use Think\Upload;
/**
* 用户类
*/
class PersonalController extends AuthController
{
	public function index(){
		if(!M('user_money')->where('user_id='.session(user)['id'])->find()){
			$money_add=array();
			$money_add['user_id']=session(user)['id'];
			M('user_money')->add($money_add);
		}
		$user_info= M('user')->alias('u')
				->field('u.user_name,u.user_phone,u.user_email,u.user_portrait,uc.user_gender,uc.user_register,uc.user_id_card,um.money')
				->join('mn_user_content uc on uc.user_id=u.id','left')
				->join('mn_user_money um on um.user_id=uc.user_id','left')
				->where('u.id='.session(user)['id'])
				->find();
		$result=array();
		$result['user_name']=$user_info['user_name'];
		$result['user_phone']=$user_info['user_phone'];
		$result['user_email']=$user_info['user_email'];
		$result['user_id_card']=$user_info['user_id_card'];
		$result=hidden($result);
		$user_info['user_name']=$result['user_name'];
		$user_info['user_phone']=$result['user_phone'];
		$user_info['user_email']=$result['user_email'];
		$user_info['user_id_card']=$result['user_id_card'];
		$this->assign('user_info',$user_info);
		$this->display();
	}
	public function personal_edit(){
		$user_info= M('user')->alias('u')
				->field('u.user_name,u.user_portrait,uc.user_gender,uc.user_birthday')
				->join('mn_user_content uc on uc.user_id=u.id')
				->where('u.id='.session(user)['id'])
				->find();
		$birthday=$user_info['user_birthday'];
		$arrBirthday=explode('-',$birthday);
		$this->assign('arrBirthday',$arrBirthday);
		$this->assign('user_info',$user_info);
		$this->display();
	}
	public function doPersonal_edit(){
		$data=array();
		$data_content=array();
		$data['user_name']=I('user_name');
		$files_array=pic('user_portrait');
		if (!empty($files_array['user_portrait']['savename'])) {
			$data['user_portrait']='/upload/'.$files_array['user_portrait']['savename'];
		}

		$data_content['user_gender']=I('user_gender');
		$data_content['user_birthday']=I('year').'-'.I('month').'-'.I('day');
		$user_info=D('user');
		$user_con=D('user_content');
		if($user_info->create($data)){
			$userInfo=$user_info->field(id)->where('user_name="'.$data['user_name'].'"')->select();
			if($userInfo){
				if($userInfo[0][id]==session(user)['id']){
					$result=$user_info->where('id='.session(user)['id'])->save($data);//修改信息
					$result_content=$user_con->where('user_id='.session(user)['id'])->save($data_content);
					if($result||$result_content){
						$this->success('修改成功',U('personal/personal_edit'));
					}else{
						$this->error("修改失败");
					}

				}else{
					$this->error("用户名已经处在");
				}
			}else{
				$result=$user_info->where('id='.session(user)['id'])->save($data);//修改信息
				if($result){
					$this->success('修改成功',U('personal/personal_edit'));
				}else{
					$this->error("修改失败");
				}
			}
		}


	}
	public function personal_safe(){
		$result= M('user')->alias('u')
				->field('u.user_phone,u.user_email,u.user_pwd,uc.user_real_name,uc.user_id_card')
				->join('mn_user_content uc on uc.user_id=u.id')
				->where('u.id='.session(user)['id'])
				->find();
		$user_info=hidden($result);
		$this->assign('user_info',$user_info);
		$this->display();
	}
	public function personal_safe_edit(){
//		print_r($_GET);
		$this->assign('cate',I('cate'));
		$this->assign('stauts',I('stauts'));
		$this->display();
	}
	public function doSafe_edit(){
		$new=array();
		if(I('user_id_card')){
			print_r($_POST);
			$_real=array(
					array('user_real_name','require','姓名不能为空！'),
					array('user_real_name','2,20','姓名不能少于2个字符，且不能多于20个字符',3,'length'),
					array('user_id_card','require','身份证号不能为空！'),
					array('user_id_card', '/^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/', '身份证号不合法！', 1, 'regex', 3),
			);
			$user_content=M('user_content');
			if($user_content->validate($_real)->create()){
				$new['user_real_name']=I('user_real_name');
				$new['user_id_card']=I('user_id_card');
				$result=$user_content->where('user_id='.session(user)['id'])->save($new);//修改信息
				if($result){
					$this->success('实名验证成功',U('personal/personal_safe'));
				}else{
					$this->error('实名验证失败');
				}
			}else{
				$this->error($user_content->getError());
			}
		}else{
			// 保存自动验证的规则
			$_val=array(
					array('user_name','require','用户名不能为空！'),
					array('user_email','email','email格式错误'),
					array('user_email','require','邮箱不能为空！'), //默认情况下用正则进行验证
					array('user_email','','邮箱已注册！','3','unique'),
					array('user_phone','require','手机号不能为空！'), //默认情况下用正则进行验证
					array('user_phone','/^1[3|4|5|8][0-9]\d{8}$/','手机号码格式错误！','0','regex',1),
					array('user_phone','','手机号已注册！','3','unique'),
					array('user_pwd','require','密码不能为空'),
					array('user_pwd','5,16','密码不能少于5位，且不能多于16位',3,'length'),
					array('repassword','user_pwd','两次输入的密码不一样',0,'confirm'), // 验证确认密码是否和密码一致
			);
			$user=M('user');
			if($user->validate($_val)->create()){
				$old=$user->where('id='.session(user)['id'])->find();
				if(I('user_pwd')){
					if($old['user_pwd']==md5(I('old_user_pwd'))){
						$user_pwd=array();
						$user_pwd['user_pwd']=md5(I('user_pwd'));
						$result=$user->where('id='.session(user)['id'])->save($user_pwd);//修改信息
						if($result){
							$this->success('修改密码成功',U('personal/personal_safe'));
						}else{
							$this->error('修改密码失败');
						}
					}else{
						$this->error('输入旧的密码不正确');
					};
				}
				elseif(I('user_email')){

					if($old['user_email']){
						if($old['user_email']==I('old_user_email')){
							$new['user_email']=I('user_email');
							$result=$user->where('id='.session(user)['id'])->save($new);//修改信息
							if($result){
								$this->success('修改邮箱成功',U('personal/personal_safe'));
							}else{
								$this->error('修改邮箱失败');
							}
						}else{
							$this->error('输入旧的邮箱不正确');
						};
					}else{
						$new['user_email']=I('user_email');
						$result=$user->where('id='.session(user)['id'])->save($new);//修改信息
						if($result){
							$this->success('修改邮箱成功',U('personal/personal_safe'));
						}else{
							$this->error('修改邮箱失败');
						}
					}
				}
				elseif(I('user_phone')){
					if($old['user_phone']){
						if($old['user_phone']==I('old_user_phone')){
							$new['user_phone']=I('user_phone');
							$result=$user->where('id='.session(user)['id'])->save($new);//修改信息
							if($result){
								$this->success('修改手机号成功',U('personal/personal_safe'));
							}else{
								$this->error('修改手机号失败');
							}
						}else{
							$this->error('输入旧的手机号不正确');
						};
					}else{
						$new['user_phone']=I('user_phone');
						$result=$user->where('id='.session(user)['id'])->save($new);//修改信息
						if($result){
							$this->success('修改手机号成功',U('personal/personal_safe'));
						}else{
							$this->error('修改手机号失败');
						}
					}
				}

			}else{
				$this->error($user->getError());
			}
		}

	}

	function personal_bank(){
		$this->display();
	}
	function doPersonal_bank(){
		$bank=M('user_bankcard');
		$_data=array(
				array('name','require','姓名不能为空！'),
				array('bank_card','/^\d{19}$/','银行卡号码格式错误！','0','regex',1),
				array('bank_card','','银行卡号码已经绑定！','3','unique'),
				array('phone','/^1[3|4|5|8][0-9]\d{8}$/','手机号码格式错误！','0','regex',1),
		);
		if($bank->validate($_data)->create()){
			$_POST['user_id']=session(user)['id'];
			$result=M('user_bankcard')->add($_POST);
			if($result){
				$this->success('绑定银行卡成功',U('personal/index'));
			}else{
				$this->error('绑定银行卡失败');
			}
		}else{
			$this->error($bank->getError());
		}
	}
	public function trader_pwd(){
		if($_POST){
			$_arr=array(
					array('trader_pwd','require','交易密码不能为空'),
					array('trader_pwd','/^\d{6}$/','交易密码为6位数字','0','regex',1),
					array('retrader','trader_pwd','两次输入的密码不一样',0,'confirm'), // 验证确认密码是否和密码一致
			);
			$user_money=M('user_money');
			if($user_money->validate($_arr)->create()){
				$data['trader_pwd']=md5(I('trader_pwd'));
				$result=$user_money->where('user_id='.session(user)['id'])->save($data);
				if($result){
					$this->success('设置交易密码成功',U('personal/trader_pwd'));
				}else{
					$this->error('设置交易密码失败');
				}
			}
		}else{
			$this->display();
		}
	}
	public function recharge(){
		if(IS_POST){
			$user_money=M('user_money');
			$result_money=$user_money->where('user_id='.session(user)['id'])->find();
			if(!$result_money['trader_pwd']){
				$this->error('请先设置您的交易密码',U("personal/trader_pwd"));
			}else{
				$card_list=M('user_bankcard')->where('user_id='.session(user)['id'])->select();
				foreach($card_list as $value){
					if($value['bank_card']==I('bank_card')){
						if($result_money['trader_pwd']==md5(I('trader_pwd'))){
							$data['money']=I('money')+$result_money['money'];
							$result=$user_money->where('user_id='.session(user)['id'])->save($data);
							if($result){
								$this->success('充值成功',U("personal/index"));
							}else{
								$this->error('充值失败');
							}
						}else{
							$this->error('交易密码不正确');
						}
					}else{
						$this->error('该银行卡还没有绑定');
					}
				}
			}
		}else{
			$this->display();
		}
	}

	 
}