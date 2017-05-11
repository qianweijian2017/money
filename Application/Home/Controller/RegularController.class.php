<?php 
namespace Home\Controller;
use Think\Controller;
use Org\Util\page;// 导入分页类
class RegularController extends Controller
{
    /**
     * 定期理财 
     * @return [type] [description]
     */
    public function regular()
    { 
    	$model  =  M('project'); 
    	$count=$model->where('status=1')->count(); //where 为条件,可作分类分页
    	$sPages = "";							//定义分页
    	if($count > 8){ 
	    	$page = new Page($count,8);	//count总页数,limit是显示的行数 
	    	$sPages = $page->show();
    	}
    	$project=$model->alias('p')
                        ->field('p.*,t.type_id,t.type_name,l.*')
		    		   ->join('__PROJECT_TYPE__ t on t.type_id = p.proj_type','left')
                       ->join('__PROJECT_LOCK__ l on l.type_id = p.proj_type','left')
		    		   ->where('p.status=1')
                       ->limit($page->firstRow,8)
                        ->order('p.id desc')
		    		   ->select();
    	$this->assign('projlist',$project);// 赋值数据集
    	$this->assign('sPages',$sPages);// 赋值分页输出  
        $this->display();
    }
    /**
     * 定期理财详情
     * @return [type] [description]
     */
    public function detail(){ 
        if(IS_GET){
            $id=I('fixid');
            if($id){
                $model      = M('project');
                $project    = $model -> alias('p')
                                     -> join('__PROJECT_LOCK__ l on l.type_id = p.proj_type')
                                    ->where('p.id='.$id)
                                     -> find();
                $this -> assign('projitem',$project);// 赋值数据集
            }
        }
        $money='';
        if(session(user)){
            $user_id=session(user)['id'];
            $money=M('user_money')->field('money')->where('user_id='.$user_id)->find() ;
        }
        $this->assign('money',$money);

        $this->display();
    }

    public function buy(){
        if(!session(user)){
            $this->error('请先登录',U('user/login'));exit();
        }
        if(I('money')>0){
            $data=array();
            $data['proj_no']=I('proj_no');
            $data['in_amount']=I('money');
            $data['user_id']=session('user')['id'];
            $data['start_time']=time();
            $goods_info=M('proj_moneyman')->where('user_id='.session('user')['id'].' and proj_no='.$data['proj_no'].' and status=0')->find();
            if(!$goods_info){
                M('proj_moneyman')->add($data);
            }else{
                M('proj_moneyman')->where('user_id='.session('user')['id'].' and proj_no='.$data['proj_no'].' and status=0')->save($data);
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
                $proj_type=M('project')->field('proj_type')->where('proj_no='.$data['proj_no'])->find();
                $proj_lock=M('project_lock')->field('proj_lock')->where('type_id='.$proj_type['proj_type'])->find();
                print_r($data);
                $this->redirect('regular/buy_m', array('proj_no'=>I('proj_no'),'in_amount'=>$data['in_amount'],'proj_lock'=>$proj_lock['proj_lock']));
            }
        }else{
            $this->error('输入的金额不正确');
        }
    }
    public function doBuy(){
        if(!session(user)){
            $this->error('请先登录',U('user/login'));exit();
        }
        if(I('in_amount')>0){
            $trader_pwd=M('user_money')
                ->field('trader_pwd')
                ->where('user_id='.session('user')['id'])
                ->find();
            if($trader_pwd['trader_pwd']==md5(I('trader_pwd'))){
                $user_money=M('user_money')->where('user_id='.session('user')['id'])->find();
                if($user_money['money']>I('money')){
                    $pro=M('project')->field('proj_total,proj_amount')->where('proj_no='.I('proj_no'))->find();
                    $cha=$pro['proj_total']-$pro['proj_amount'];
                    if($cha>I('in_amount')){
//                        保存用户交易
                        $data['in_amount']=I('in_amount');
                        $data['status']=1;
                        $data['start_time']=time();
                        $data['end_time']=$data['start_time']+I('length_day')*60*60*24;
                        $result=M('proj_moneyman')->where('user_id='.session('user')['id'].' and proj_no='.I('proj_no').' and status=0')->save($data);
                        //         减去用户钱
                        $result_money=M('user_money')->where('user_id='.session('user')['id'])->setDec('money',I('in_amount'));
                        //         增加融资
                        $amount=M('project')->where('proj_no='.I('proj_no'))->setInc('proj_amount',$data['in_amount']);
                        //         修改result
                        $result_data=($pro['proj_amount']+I('in_amount'))/$pro['proj_total'];
                        $result_p=M('project')->where('proj_no='.I('proj_no'))->setField('result',$result_data);
                        if($result&&$result_money&&$amount){

                            $this->success('交易成功',U('personal/index'));
                        }else{
                            $this->error('交易失败');
                        }
                    }else{
//                        保存用户交易
                        $data['in_amount']=$cha;
                        $data['status']=1;
                        $data['start_time']=time();
                        $data['end_time']=$data['start_time']+I('length_day')*60*60*24;
                        $result=M('proj_moneyman')->where('user_id='.session('user')['id'].' and proj_no='.I('proj_no').' and status=0')->save($data);
//                        修改主表
                        $result_p=M('project')->where('proj_no='.I('proj_no'))->setField('result',1);
                        $status_p=M('project')->where('proj_no='.I('proj_no'))->setField('status',2);
                        $proj_amount=M('project')->where('proj_no='.I('proj_no'))->setField('proj_amount',$pro['proj_total']);
//                        减去用户钱
                        $result_money=M('user_money')->where('user_id='.session('user')['id'])->setDec('money',$cha);
                        if($result&&$status_p&&$result_money){

                            $this->success('交易成功',U('personal/index'));
                        }else{
                            $this->error('交易失败',U('personal/index'));
                        }
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

    /**
     * 获取投资人数据
     * @return [type] [description]
     */
    public function getProjBorrower()
    {   
        //获取基金的ID
        //通过ID去查找基金代码
        //再通过基金代码去查找本基金被借走的用户和其详细信息
       $borrower      =   M('ProjBorrower');
       $project       =   M('project');           //项目表 
       $proj_id       =   I('get.id'); 
       $pagenum       =   I('get.pagenum'); 

       $proj_no       =   $project   ->  field("proj_no")
                                     ->  where("id = $proj_id")
                                     ->  find(); 
       $proj_no       =   $proj_no['proj_no'];   
                             
       $count         =   $borrower -> alias('b')
                                    -> join('__USER__ u on u.id = b.user_id')
                                    -> join('__USER_CONTENT__ c on c.user_id = u.id')
                                    -> where("proj_no = {$proj_no}") 
                                    ->  count();    

       $page          =   new \Org\Util\page($count,3);
       $pagehtml      =   $page -> show();
       

       $info          =   $borrower -> alias('b')
                                    -> join('__USER__ u on u.id = b.user_id')
                                    -> join('__USER_CONTENT__ c on c.user_id = u.id')
                                    -> where("proj_no = {$proj_no}") 
                                    -> limit($page ->firstRow,3)
                                    -> select(); 
                                   
       foreach ($info as $key => $value) {  

               $user['user_real_name']  =  $value['user_real_name'];
               $user['user_id_card']    =  $value['user_id_card'];
               $user                    =  hidden($user);
               $user_in_amount          =  sliceNumber(intval($value['in_amount'])); 
               $userhtml .="<tr>
                                <td>{$proj_no}</td>
                                <td>{$user['user_real_name']}</td>
                                <td>{$user['user_id_card']}</td> 
                                <td>{$user_in_amount}</td> 
                            </tr>" ; 

        }  
       $this -> ajaxReturn(
            array(
                'userhtml' => $userhtml,
                'page' => $pagehtml
                )
       );  
       exit;               
    }


  
}