<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Common\Controller\AuthController;

class GoodsController extends AuthController
{
public function buy(){
	if(I('money')>0){
		$data=array();
		$data['fund_code']=I('fund_code');
		$data['money']=I('money');
		$data['user_id']=session('user')['id'];
		$data['start_time']=time();
		$goods_info=M('goods')->where('user_id='.session('user')['id'].' and fund_code='.I('fund_code').' and status=0')->find();
		if(!$goods_info){
			M('goods')->add($data);
		}else{
			M('goods')->where('user_id='.session('user')['id'].' and fund_code='.I('fund_code').' and status=0')->save($data);
		}
		$user_money=M('user_money')->where('user_id='.session('user')['id'])->find();
		if(!$user_money){
			$money_add=array();
			$money_add['user_id']=session(user)['id'];
			$result=M('user_money')->add($money_add);
			if($result){
				$this->success('请设置交易密码',U("personal/trader_pwd"));
			}
		}elseif(!$user_money['trader_pwd']){
			$this->success('请设置交易密码',U("personal/trader_pwd"));
		}elseif($user_money['money']<I('money')){
			$this->error('余额不足，请及时充值',U("personal/recharge"));
		}else{
				// 跳转到 Admin分组Index模块view操作，uid参数为1，延迟3秒跳转
//			$this->redirect('Admin-Index/view', array('uid'=>1), 3,'页面跳转中~');
			$this->redirect('goods/buy_money', array('fund_code'=>I('fund_code')));
		}

		//将此项目的目前投资金额加 I money 使用到mn_project表
		$project=M('project');
		$project->where('')->setInc('proj_amount',$data['money']);
	}else{
		$this->error('输入的金额不正确');
	}
}
	public function doBuy(){
		if(I('money')>0){
			$trader_pwd=M('user_money')
					->field('trader_pwd')
					->where('user_id='.session('user')['id'])
					->find();
			if($trader_pwd['trader_pwd']==md5(I('trader_pwd'))){
				$user_money=M('user_money')->where('user_id='.session('user')['id'])->find();
				if($user_money['money']>I('money')){
					$data['money']=I('money');
					$data['status']=1;
					$data['start_time']=time();
					$data['length_day']=I('length_day');
					$data['end_time']=$data['start_time']+I('length_day')*60*60*24;
					$result=M('goods')->where('user_id='.session('user')['id'].' and fund_code='.I('fund_code').' and status=0')->save($data);
					$money=M('user_money')->field('money')->where('user_id='.session('user')['id'])->find();
					$money['money']=$money['money']-I('money');
					$result_money=M('user_money')->where('user_id='.session('user')['id'])->save($money);
					if($result&&$result_money){

						$this->success('交易成功',U('personal/index'));
					}else{
						$this->error('交易失败',U('personal/index'));
					}
				}else{
					$this->error('余额不足，请及时充值',U("personal/recharge"));
				}
			}else{
				$this->error('交易密码不正确');
			}
		}else{
			$this->error('输入的金额不正确');
		}
	}

	 
}