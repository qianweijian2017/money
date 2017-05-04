<?
namespace Admin\Controller;
use Think\Controller;

/**
* 获取基金数据
*/
class AutorunController extends Controller
{
    public function index(){
        $this->display();
    }
    public function ajax(){
        $time=time();
        $data_list=M('goods')
            ->field('id,end_time')
            ->where('status=1')
            ->select();
        foreach($data_list as $value){
            if($value['end_time']<=$time){
                $data_info=M('goods')
                    ->field('money,fund_code,user_id,start_time,length_day')
                    ->where('id='.$value['id'])
                    ->find();
                $up=M('fund')->field('threemouth_up')->where('fund_code='.$data_info['fund_code'])->find();
                $data_arr=array();
                $data_arr['goods_id']=$value['id'];
                $data_arr['money']=$data_info['money'];
                $data_arr['fund_code']=$data_info['fund_code'];
                $data_arr['user_id']=$data_info['user_id'];
                $data_arr['start_time']=$data_info['start_time'];
                $data_arr['length_day']=$data_info['length_day'];
                $data_arr['income']=$up['threemouth_up'];
                $data_arr['income_money']=$data_info['money']*($up['threemouth_up']/100);
                $data_arr['create_time']=time();
                M('goods_fund_income')->add($data_arr);
                M('goods')->where('id='.$value['id'])->delete();
                $money=M('user_money')->field('money')->where('user_id='.$data_info['user_id'])->find();
                $money['money']=$money['money']+$data_arr['money']=$data_info['money']+$data_arr['income_money'];
                M('user_money')->where('user_id='.$data_info['user_id'])->save($money);

            }
        }
        $this->ajaxReturn(array('time'=>$time));
    }
    public function delete(){
        $time=time();
        $data_list=M('goods')
            ->field('id,start_time')
            ->where('status=0')
            ->select();
        foreach($data_list as $value){
            if((($time-$value['start_time'])/60/60)>=1){
                M('goods')->where('id='.$value['id'])->delete();
            }
        }
    }



}