<?php 
namespace Home\Controller;
use Think\Controller;
use Org\Util\page;// �����ҳ��
class RegularController extends Controller
{
    /**
     * ������� 
     * @return [type] [description]
     */
    public function regular()
    { 
    	$model  =  M('project'); 
    	$count=$model->where('status=1')->count(); //where Ϊ����,���������ҳ
    	$sPages = "";							//�����ҳ
    	if($count > 8){ 
	    	$page = new Page($count,8);	//count��ҳ��,limit����ʾ������ 
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
    	$this->assign('projlist',$project);// ��ֵ���ݼ�
    	$this->assign('sPages',$sPages);// ��ֵ��ҳ���  
        $this->display();
    }
    /**
     * �����������
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
                $this -> assign('projitem',$project);// ��ֵ���ݼ�
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
            $this->error('���ȵ�¼',U('user/login'));exit();
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
                    $this->success('�����ý�������',U("personal/trader_pwd"));
                }
            }elseif(!$user_money['trader_pwd']){
                $this->success('�����ý�������',U("personal/trader_pwd"));
            }elseif($user_money['money']<I('money')){
                $this->error('���㣬�뼰ʱ��ֵ',U("personal/recharge"));
            }else{
                // ��ת�� Admin����Indexģ��view������uid����Ϊ1���ӳ�3����ת
//			$this->redirect('Admin-Index/view', array('uid'=>1), 3,'ҳ����ת��~');
                $proj_type=M('project')->field('proj_type')->where('proj_no='.$data['proj_no'])->find();
                $proj_lock=M('project_lock')->field('proj_lock')->where('type_id='.$proj_type['proj_type'])->find();
                print_r($data);
                $this->redirect('regular/buy_m', array('proj_no'=>I('proj_no'),'in_amount'=>$data['in_amount'],'proj_lock'=>$proj_lock['proj_lock']));
            }
        }else{
            $this->error('����Ľ���ȷ');
        }
    }
    public function doBuy(){
        if(!session(user)){
            $this->error('���ȵ�¼',U('user/login'));exit();
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
//                        �����û�����
                        $data['in_amount']=I('in_amount');
                        $data['status']=1;
                        $data['start_time']=time();
                        $data['end_time']=$data['start_time']+I('length_day')*60*60*24;
                        $result=M('proj_moneyman')->where('user_id='.session('user')['id'].' and proj_no='.I('proj_no').' and status=0')->save($data);
                        //         ��ȥ�û�Ǯ
                        $result_money=M('user_money')->where('user_id='.session('user')['id'])->setDec('money',I('in_amount'));
                        //         ��������
                        $amount=M('project')->where('proj_no='.I('proj_no'))->setInc('proj_amount',$data['in_amount']);
                        //         �޸�result
                        $result_data=($pro['proj_amount']+I('in_amount'))/$pro['proj_total'];
                        $result_p=M('project')->where('proj_no='.I('proj_no'))->setField('result',$result_data);
                        if($result&&$result_money&&$amount){
                            $this->success('���׳ɹ�',U('personal/index'));
                        }else{
                            $this->error('����ʧ��');
                        }
                    }else{
//                        �����û�����
                        $data['in_amount']=$cha;
                        $data['status']=1;
                        $data['start_time']=time();
                        $data['end_time']=$data['start_time']+I('length_day')*60*60*24;
                        $result=M('proj_moneyman')->where('user_id='.session('user')['id'].' and proj_no='.I('proj_no').' and status=0')->save($data);
//                        �޸�����
                        $result_p=M('project')->where('proj_no='.I('proj_no'))->setField('result',1);
                        $status_p=M('project')->where('proj_no='.I('proj_no'))->setField('status',2);
                        $proj_amount=M('project')->where('proj_no='.I('proj_no'))->setField('proj_amount',$pro['proj_total']);
//                        ��ȥ�û�Ǯ
                        $result_money=M('user_money')->where('user_id='.session('user')['id'])->setDec('money',$cha);
                        if($result&&$status_p&&$result_money){
                            $this->success('���׳ɹ�',U('personal/index'));
                        }else{
                            $this->error('����ʧ��',U('personal/index'));
                        }
                    }
                }else{
                    $this->error('���㣬�뼰ʱ��ֵ',U("personal/recharge"));
                }
               }else{
                $this->error('�������벻��ȷ');
            }
        }else{
            $this->error('����Ľ���ȷ');
        }
    }
    /**
     * ��ȡͶ��������
     * @return [type] [description]
     */
    public function getProjBorrower()
    {   
        //��ȡ�����ID
        //ͨ��IDȥ���һ������
        //��ͨ���������ȥ���ұ����𱻽��ߵ��û�������ϸ��Ϣ
       $borrower      =   M('ProjBorrower');
       $project       =   M('project');           //��Ŀ�� 
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