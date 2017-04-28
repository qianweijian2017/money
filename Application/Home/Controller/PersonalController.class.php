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
		$user_info= M('user')->alias('u')
				->field('u.user_name,u.user_phone,u.user_email,u.user_portrait,uc.user_gender,uc.user_register')
				->join('mn_user_content uc on uc.user_id=u.id')
				->where('u.id='.session(user)['id'])
				->find();
//		print_r($user_info);
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
	 
}