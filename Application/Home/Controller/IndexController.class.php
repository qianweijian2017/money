<?php

namespace Home\Controller;

use Think\Controller;


class IndexController extends Controller
{
    public function index()
    {   $M = M();
        $sql = "select *,(`proj_amount`*1.0/`proj_total`) as result from mn_project ";
        $res = $M->query($sql);     //主要针对查询  //返回一个维数组
        //省心宝
        $shengxinbao = M('project');
        for($i=0;$i<count($res);$i++)
        {
            $data['result']=$res[$i]['result'];
            $shengxinbao->where("id=".($i+1))->setField('result',$data['result']);

        }
        $data_sxb = $shengxinbao->table('mn_project_lock a,mn_project b')->where('b.proj_type=1 and a.type_id=b.proj_type')->order('result desc')->select();
        $this->assign('data', $data_sxb[0]);// 赋值数据集
        $this->assign('data_sec', $data_sxb[1]);// 赋值数据集
        $this->assign('data_thr', $data_sxb[2]);// 赋值数据集

        //基金
        $fund = M('fund');
        $data_fund = $fund->order('create_time desc')->select();
        $this->assign('data_fund_fri', $data_fund[0]);// 赋值数据集
        $this->assign('data_fund_sec', $data_fund[1]);// 赋值数据集
        $this->assign('data_fund_thr', $data_fund[2]);// 赋值数据集

        //月月增
        $yueyuezneg = M('project');
        for($i=0;$i<count($res);$i++)
        {
           $data['result']=$res[$i]['result'];
           $yueyuezneg->where("id=".($i+1))->setField('result',$data['result']);

        }

        //按照进度排序
        $data_yyz = $yueyuezneg->table('mn_project_lock a,mn_project b')->where('b.proj_type=2 and a.type_id=b.proj_type')->order('result desc')->select();
        $this->assign('data_yyz', $data_yyz[0]);// 赋值数据集
        $this->assign('data_yyz_total', $data_yyz[1]);// 赋值数据集
        $this->assign('data_yyz_thr', $data_yyz[2]);// 赋值数据集

         
        $ppt_info=M('ppt')
                 ->select();
                 /*print_r($ppt_info);*/
                 $this->assign('ppt_info',$ppt_info);
        $cont=count($ppt_info);
             $this->assign('cont',$cont); 


        $this->display('./index');

    }



}