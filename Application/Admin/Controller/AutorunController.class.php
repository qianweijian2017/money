<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\AuthController;

/**
* 获取基金数据
*/
class AutorunController extends AuthController
{
//    投资
    public function index(){
        $this->display();
    }
    public function ajax_reguler(){
        $time=time();
        $data_list=M('proj_moneyman')
            ->where('status=1')
            ->select();
        foreach($data_list as $value){
            if($value['end_time']<=$time){
                $up=M('project')->field('pro_profit')->where('proj_no='.$value['proj_no'])->find();
                $data_arr=array();
                $data_arr['in_amount']=$value['in_amount'];
                $data_arr['status']=1;
                $data_arr['proj_no']=$value['proj_no'];
                $data_arr['user_id']=$value['user_id'];
                $data_arr['interest']=$value['in_amount']*($up['pro_profit']/100);
                $data_arr['create_time']=time();
//                添加到完成表
                $result=M('proj_buyed')->add($data_arr);
////                删除原来
                M('proj_moneyman')->where('id='.$value['id'])->delete();
////                回款
                $moneyman=$data_arr['in_amount']+$data_arr['interest'];
                $money=M('user_money')->where('user_id='.$data_arr['user_id'])->setInc('money',$moneyman);

            }
        }
        $this->ajaxReturn(array('time'=>$time));
//        $this->display();
    }
    public function delete_reguler(){
        $time=time();
        $data_list=M('proj_moneyman')
            ->field('id,start_time')
            ->where('status=0')
            ->select();
        foreach($data_list as $value){
            if((($time-$value['start_time'])/60/60)>=1){
                M('proj_moneyman')->where('id='.$value['id'])->delete();
            }
        }
    }
//贷款
    public function ajax_netloan(){
        $time=time();
        $data_list=M('proj_borrower')
            ->where('status=1')
            ->select();
        foreach($data_list as $value){
            if($value['end_time']<=$time){
                $up=M('project')->field('br_profit')->where('proj_no='.$value['proj_no'])->find();
                $data_arr=array();
                $data_arr['in_amount']=$value['in_amount'];
                $data_arr['proj_no']=$value['proj_no'];
                $data_arr['user_id']=$value['user_id'];
                $data_arr['interest']=$value['in_amount']*($up['br_profit']/100);
                $data_arr['create_time']=time();
                $moneyman=$data_arr['in_amount']+$data_arr['interest'];
                $money=M('user_money')->field('money')->where('user_id='.$data_arr['user_id'])->find();
////            是否扣款
                if($moneyman<=$money['money']){
                    $data_arr['status']=3;
                    M('user_money')->where('user_id='.$data_arr['user_id'])->setDec('money',$moneyman);
                }else{
                    $data_arr['status']=2;
                }
//                添加到完成表
                M('proj_buyed')->add($data_arr);
////                删除原来
                M('proj_borrower')->where('id='.$value['id'])->delete();

            }
        }
        $this->ajaxReturn(array('time'=>$time));
        $this->display();
    }
    public function delete_netloan(){
        $time=time();
        $data_list=M('proj_borrower')
            ->field('id,start_time')
            ->where('status=0')
            ->select();
        foreach($data_list as $value){
            if((($time-$value['start_time'])/60/60)>=1){
                M('proj_borrower')->where('id='.$value['id'])->delete();
            }
        }
    }



}