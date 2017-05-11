<?php


namespace Home\Controller;
use Think\Controller; 

class NetloanController extends Controller
{
  /**
   * 网贷理财表  project表的状态 为 2
   * @return [type] [description]
   */
    public function net()
    {
    	 $project  	   =  M('project'); //项目对象 
    	 $where        =  I('get.type',0) == 0 ? "1=1": 'proj_type='.I('get.type');//where 条件
       $where       .=  ' and status = 2';        //只取状态2 开放借贷中的项目
       $order        =  I('get.sort',0) == 0 ?   : $this -> gerSort(I('get.sort'));  
       $count        =  $project -> where($where) -> count();   //记录数
       $page         =  new \Org\Util\page($count,8);           //分页对象
       $show         =  $page    -> show();                     //show方法获取分页字符串
       //联合 (主表) 项目表  及(从表) 项目类型表/锁定期表
    	 $projectlist  =	$project  -> alias('p')
                							    -> join('__PROJECT_TYPE__ t on t.type_id = p.proj_type','right')
                							    -> join('__PROJECT_LOCK__ l on l.type_id = t.type_id','left')  
                                  -> field('p.*,t.*,l.*,p.id as proj_id')
                                  -> where($where)  
                							    -> limit($page ->firstRow,8)
                							    -> select(); 
        $heartCount   =  $project -> where('proj_type = 1 and status = 2')  //省心宝记录数
                                  -> count();
        $mountCount   =  $project -> where('proj_type = 2 and status = 2')  //月月增记录数
                                  -> count();  
        $this -> assign('heartCount',$heartCount);
        $this -> assign('mountCount',$mountCount);
    	  $this -> assign('page',$show);
    	  $this -> assign('projectlist',$projectlist);
        $this -> display();
    }

     /**
     * 网贷理财详情
     * @return [type] [description]
     */
    public function detail(){ 
        if(IS_GET){
            $id=I('get.fixid',0);
            if($id){
                $model      = M('project');
                $project    = $model -> alias('p')
                                     -> join('__PROJECT_LOCK__ l on l.type_id = p.proj_type')
                                     -> find($id); 
                $this -> assign('projitem',$project);// 赋值数据集 
            }
        }
        $this->display();
    }
    /**
     * 获取投资人数据
     * @return [JSON] [返回投资人信息]
     */
    public function getProjBorrower()
    {   
        //获取基金的ID
        //通过ID去查找基金代码
        //再通过基金代码去查找本基金被借走的用户和其详细信息
       $borrower      =   M('ProjBorrower');      //贷款人信息表
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
                                    -> count();    

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
        //返回投资人数据
       $this -> ajaxReturn(
            array(
                'userhtml' => $userhtml,
                'pagehtml' => $pagehtml
                )
       );  
       exit;               
    }

    /**
     * 获取项目基本信息信息
     * @return Ajax
     */
    public function getProjectInfo()
    {
        
       $proj_id       =    I('post.proj_id');   //项目的ID
       $project       =    M('project');      //实例化项目表
       //查询用户所要借贷的这个项目的基本信息
       $proj_item     =    $project ->  where("id = $proj_id")   
                                    ->  field('proj_no,proj_type') 
                                    ->  find();
       
        //项目锁定期                              
       $projlock      =    M('ProjectLock') -> where("type_id = {$proj_item['proj_type']}")
                                            -> getField('proj_lock');
                                           
      
      //返回Ajax
      $this -> ajaxReturn(
              array(
                'proj_no'   => $proj_item['proj_no'],
                'proj_lock' => $projlock
                )
        );
        exit;
                
    }
    /**
     * 点击借款按钮,开始执行数据录入操作
     * @return [type] [description]
     */
    public function doLend()
    {
       //获取用户信息
       $user = session('user');  
       
       //查询用户的密码是否正确
       $trader_pwd    =    I('post.trader_pwd',false);
       $userMoney     =    M('UserMoney');
       $check_trander =    $userMoney -> where("user_id = {$user['id']}")
                                      -> getField('trader_pwd');
       if(md5($trader_pwd) !== $check_trander){
            $this -> ajaxReturn(
                  array(
                    'info'   => '交易密码错误,请重新输入',
                    'icon'   => 7
                    )
              );
            exit;
       }

       $proj_id       =    I('post.fixid');   //项目的ID
       $munis_money   =    I('post.money');   //要投资的金额
       $project       =    M('project');      //实例化项目
       $proj_item     =    $project -> where("id = {$proj_id} ") 
                                  -> find();
       $proj_total    =    $proj_item['proj_total'];         //项目总金额 
       $proj_amount   =    $proj_item['proj_amount'];       //项目目前拥有金额 
       
       if($munis_money - $proj_amount > 0){               //所投金额超出项目剩余金额
          $this -> ajaxReturn(
                  array(
                    'info'      => '抱歉,项目剩余金额不足,请重新输入',
                    'status'    => 0,
                    'icon'      => 5
                  )
            );
          exit;
       }
      
       //如果项目金额全被借完返加true;
       //后期判断是否要改变状态,3 :完成项目,即项目金额已经全部被借出,进行开始计时还款状态
       $change_status = $munis_money - $proj_amount == 0 ? true : false;   
       
       //如果项目还有余额则进入判断层内
       if($munis_money - $proj_amount < 0){ 
          //查询项目锁定期(天数)
          $lock_day               = $project-> alias('p') 
                                            -> join('__PROJECT_LOCK__ l on l.type_id = p.proj_type')
                                            -> getField('proj_lock');
         
          $now_time               = time();
           //将天数转成时间截
          $end_time               = time() + ($lock_day  * 24 * 60 * 60);
         
          $proj_br                = D('ProjBorrower');  //创建借款人表对象
          $proj_br -> create();                         //创建模型    
          $proj_br ->proj_no      = $proj_no;
          $proj_br ->user_id      = $user['id'];
          $proj_br ->in_amount    = $munis_money;
          $proj_br ->start_time   = $now_time;
          $proj_br ->end_time     = $end_time;
          //判断是否添加成功
          if($id = $proj_br -> add()){ 
                //如果添加成功  改变项目借款状态==成功
                $proj_br -> where(" id = $id ") -> setField('status' , 1);
                                                  

                //对项目表的所投金额  减去 用户借走的钱  == 项目剩余金额
                $project -> where("id = {$proj_id}") -> setDec('proj_amount',$munis_money);  

                //添加用户的余额
                $add_money   =  $userMoney -> where("user_id = {$user['id']}") 
                                               -> setInc('money',$munis_money);
                  //添加用户余额失败,此时应该联系管理员                                
                  if(!$add_money){
                         $this -> ajaxReturn(
                             array(
                                  'info'      => '系统错误,请联系管理员',
                                  'status'    => 0,
                                  'icon'      => 7
                              )
                          );
                         
                    }   
                //判断项目所剩金额是否为0, 为 0 则 项目表的状态改为 3 : 项目已经将金额全部借出
                if( $change_status ){ 
                    $project -> where("id = {$proj_id}") -> setField('status' , 3 ); 
                    
                }
                //借款成功后返回的信息
                $this -> ajaxReturn(
                           array(
                                'info'      => 
                                '借款成功,请在还款之日时保证您的账户余额足以扣除您所借款的额度',
                                'status'    => 1,
                                'icon'      => 6
                            )
                      );
                exit;  
          }
            
       }
    }
    /**
     * 排序
     * @return [type] [description]
     */
    public function gerSort($sort)
    {

        switch ($sort) {
            case '1':
                 $order = 'create_time desc';//时间排序
                break;
            case '2':
                 $order = 'pro_profit desc';//收益排序
                break;
            case '3':
                 $order = 'l.proj_lock desc';//锁定期排序
                break;
            default:
                 $order = 'create_time desc'; //当数据转来却不存在选项时.按发布时间排序
                break;
        }
        return $order;
    }
}