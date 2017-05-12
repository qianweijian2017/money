<?php if (!defined('THINK_PATH')) exit();?>﻿ 
<!DOCTYPE html>
<html lang="zh-CN">
<head> 
    <meta charset="utf-8">
    <title>昭昭理财</title>
    <link rel="stylesheet" type="text/css" href="/Public/Lib/bootsrapv3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/reset.css">
    <link rel="stylesheet" type="text/css"  href="/Public/Home/css/base.css?1">
    <script rel="stylesheet" src="/Public/Lib/jquery-1.9.1.min.js"></script> 
    <meta name="description"
    content="本平台或PPmoney理财平台,PPmoney理财平台用户提供服务。
            欢迎注册成为PPmoney理财平台会员，使用PPmoney理财平台为您提供的会员服务">
    <meta name="keywords" content="招财宝,理财,存钱,投资,基金,投资理财,基金投资,银行存管">

</head>
<body>
<div class="header_top">
<div class="container none_padding">
    <div class="header_top_left">
        <i class="fa fa-phone i_icon"></i>
        <span>服务热线：<b>10101212</b>（人工 9:00～22:00）</span>
    </div>
    <div class="header_top_right">
        <?php if($_SESSION['user']!= ''): ?><a class="portrait"><img src="/Public<?php echo ($_SESSION['user']['user_portrait']); ?>"></a>
            <?php if($_SESSION['user']['user_name']!= '' ): ?><a>欢迎，<?php echo ($_SESSION['user']['user_name']); ?></a>
                <?php elseif($_SESSION['user']['user_email']!= '' ): ?>
                <a>欢迎，<?php echo ($_SESSION['user']['user_email']); ?></a>
                <?php else: ?>
                <a>欢迎，<?php echo ($_SESSION['user']['user_phone']); ?></a>
                <!--<a>欢迎，<?=substr_replace(session(user)[user_phone],"*****",3,6)?></a>--><?php endif; ?>
            <span>|</span>
            <a  href="<?php echo U('User/SignOut');?>" class="login">退出</a>
        <?php else: ?>
        <a  href="<?php echo U('User/login');?>" class="login">登录</a>
        <span>|</span>
        <a  href="<?php echo U('User/register');?>" class="register">注册</a><?php endif; ?>
        <span>|</span>
        <a class="recharge" href="<?php echo U('personal/recharge');?>">充值</a>
        <span>|</span>
        <a href="<?php echo U('Help/helpcenter');?>" class="help">帮助中心</a>
        <span>|</span>
        <a class="phone"><span class="fa fa-mobile-phone"></span>手机APP</a>
        <a class="weibo"><i class="fa fa-weibo i_icon"></i></a>
        <a class="weixin"><i class="fa fa-weixin i_icon"></i></a>
    </div>
</div>
</div>
<div class="header_bottom">
    <div class="fixe_nav">
        <div class="container none_padding">
            <div class="logo clearfix">
                <div class="logo_box">
                    <a href="<?php echo U('Index/index');?>">
                        <img src="/Public/Home/imgs/logo.png">
                    </a>
                </div> 
                <div class="link_user">
                    <a href="<?php echo U('personal/index');?>">我的账户</a>
                </div>
            </div> 
        </div>
        <nav class="clearfix">
             <ul class="nav_title clearfix">
                <li class="<?php is_active(CONTROLLER_NAME,'Index') ?>" hover="1">
                    <a href="<?php echo U('Index/index');?>">首页</a>
                </li>
                <li hover="1" class="<?php is_active(CONTROLLER_NAME,'Netloan') ?>">
                    <a href="<?php echo U('Netloan/net');?>">网贷理财</a>
                </li>
                 <li hover="1" class="<?php is_active(CONTROLLER_NAME,'Regular') ?>">
                     <a href="<?php echo U('Regular/regular');?>">投资理财</a>
                 </li>
                <li class="<?php is_active(CONTROLLER_NAME,'Fund') ?>" hover="1">
                    <a href="<?php echo U('Fund/fundmain');?>"> 基金超市</a>
                </li>
                 <li class="<?php is_active(CONTROLLER_NAME,'Message') ?>" hover="1">
                     <a href="<?php echo U('Message/information');?>">信息披露</a>
                 </li> 
            </ul>
        </nav>
    </div>
</div>

<link rel="stylesheet" href="/Public/Home/css/net.css">
<div class="subnav">
    <ul>
        <li>您所在的位置:</li>
        <li><a href="<?php echo U('Index/index');?>">首页</a>&nbsp;></li>

        <li><span id="sortbarNameSub">投资理财</span></li>
    </ul>
</div>
<div class="mod-box">
    <div class="mod-cont">
        <div class="mod-left">
            <div id="nav_bg"></div>
            <ul class="left-list ">

                <li class="item <?php net_menu_active(I('get.type',0),0) ?>" >
                    <a href="<?php echo U('net',array('type' => 0));?>">
                        <h2 class="strong">
                            全部
                        </h2>
                    </a>
                </li>
                <li class="item <?php net_menu_active(I('get.type'),1) ?>" >
                    <a href="<?php echo U('net',array('type' => 1));?>">
                        <h2 class="strong">省心宝(
                            <span class="em" data-num="6"><?php echo ($heartCount); ?></span> )
                        </h2>
                        <div class="tip">稳健收益更省心</div>
                    </a>
                </li>
                <li class="item <?php net_menu_active(I('get.type'),2) ?>" >
                    <a href="<?php echo U('net',array('type' => 2));?>">
                        <h2 class="strong">月月增(
                            <span class="em" ><?php echo ($mountCount); ?></span> )
                        </h2>
                        <div class="tip">收益月增更赚钱</div>
                    </a>
                </li> 
            </ul>
        </div>
        <div class="mod-right">
            <div class="mod-com clearfix">
                    <?php $type_name = I('get.type')==0 ? "全部": $projectlist[0]['type_name'] ?>
                    <h3><?php echo ($type_name); ?></h3>
                    <h4>排序:</h4>
                    <ul>
                        <li  <?php net_nav_active(I('get.sort'),1) ?>>
                            <a href="<?php echo U('net',array('type'=>I('get.type'),'sort'=>'1'));?>">
                                发标时间
                                <i class="fa fa-arrow-down"></i>
                            </a> 
                        </li>
                         <li  <?php net_nav_active(I('get.sort'),2) ?> >
                            <a href="<?php echo U('net',array('type'=>I('get.type'),'sort'=>'2'));?>">
                                收益
                                <i class="fa fa-arrow-down"></i>
                            </a>
                            
                        </li>
                         <li  <?php net_nav_active(I('get.sort'),3) ?>>
                            <a href="<?php echo U('net',array('type'=>I('get.type'),'sort'=>'3'));?>">
                                期限
                                <i class="fa fa-arrow-down"></i>
                            </a>

                        </li>
                    </ul>
                    <p>
                      <a href="<?php echo U('personal/index');?>">
                          查看回款中的项目
                      </a>
                    </p>
            </div>
            <div class="mod-list">
            <?php if(is_array($projectlist)): $i = 0; $__LIST__ = $projectlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$projectitem): $mod = ($i % 2 );++$i;?><div class="prlist">
                    <div class="prlist_title">
                       <span class="fir">
                       <?php echo ($projectitem["proj_lock"]); ?>天<?php echo ($projectitem["type_name"]); ?>[<?php echo (date("Ymd-i",$projectitem['create_time'])); ?>]
                       </span>
                       <!-- <span class="sml">手动</span>
                       <span class="sml">满减券</span>
                       <span class="sml">加息券</span> -->
                    </div>
                    <div class="explain">
                        <div class="main-rate">
                            <span>预期还款利率</span>
                            <span><?php echo ($projectitem["br_profit"]); ?></span>
                            <span>%</span> 
                        </div>

                        <div class="mod mod-lock">
                            <span class="hb">还款周期</span>
                            <span class="total"><?php echo ($projectitem["proj_lock"]); ?></span>
                            <span class="num">天</span> 
                        </div>

                        <div class="mod  mod-total"  > 
                            <span class="hb">融资金额</span>
                            <span class="total"><?php echo (intval($projectitem['proj_total']/10000)); ?></span>
                            <span class="num">万</span>
                        </div>

                        <div class="pro">           
                            <?php $progress=($projectitem['proj_amount'])/($projectitem['proj_total'])*100; $progress= sprintf("%.2f",substr(sprintf("%.3f", $progress), 0, -2)); ?>  

                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow=" <?php echo ($progress); ?>%" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($progress); ?>%;"> 
                                         
                              </div> 
                            </div>
                            <em class="percent">
                                <?php echo ($progress); ?> %
                            </em>
                            <span> 
                                借出进度:
                            </span>
                        </div>
                        <div class="pro pro2">  
                            <div class="progress progress2">
                               <?php $overplus=$projectitem['proj_amount']; $overplus=sliceNumber($overplus); ?>  
                                <?php echo ($overplus); ?> 元 
                            </div>
                            <span> 
                                可借金额：       
                            </span>
                        </div>
                        <div class="goumai">
                            <a href="<?php echo U('detail',array('fixid'=>$projectitem[proj_id]));?>" target="_blank" class="goumai_btn">立即购买</a>
                        </div> 
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="b-page">
                <?php echo ($page); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/Public/Home/js/net.js"></script>  
﻿

<div style="width:100%;background:#fff;margin: 0px">
    <div class="footer container none_padding">
        <div class="col-md-6 none_padding footer_left">
            <div class="col-md-3 none_padding">
                <i></i>
                <dl>
                    <dt><a>关于我们</a></dt>
                    <dt><a>基本信息</a></dt>
                    <dt><a>管理团队</a></dt>
                    <dt><a>资质证书</a></dt>
                </dl>
            </div>
            <div class="col-md-3 none_padding">
                <i class="i2"></i>
                <dl>
                    <dt><a>安全保障</a></dt>
                    <dt><a>业务介绍</a></dt>
                    <dt><a>风控流程</a></dt>
                    <dt><a>交易安全险</a></dt>
                </dl>
            </div>
            <div class="col-md-3 none_padding">
                <i class="i3"></i>
                <dl>
                    <dt><a>帮助中心</a></dt>
                    <dt><a>注册登记</a></dt>
                    <dt><a>充值中心</a></dt>
                    <dt><a>网站地图</a></dt>
                </dl>
            </div>
            <div class="col-md-3 none_padding">
                <i class="i4"></i>
                <dl>
                    <dt><a>投资理财</a></dt>
                    <dt><a>省心宝</a></dt>
                    <dt><a>月月增</a></dt>
                    <dt><a>灵活宝</a></dt>
                </dl>
            </div>
        </div>
        <div class="col-md-3 none_padding footer_md">
            <span class="hr hr1"></span>
            <div>
                <div class="img"></div>
                <p>移动客户端下载</p>
            </div>
            <div>
                <div class="img img2"></div>
                <p>关注我们的微信</p>
            </div>
        </div>
        <ul class="col-md-3 none_padding footer_right">
            <span class="hr hr2"></span>
            <li class="hot">服务热线：<span>10101212</span></li>
            <li class="people">（人工 9:00~22:00 )</li>
            <li class="day"><i class="fa fa-volume-control-phone"></i>24小时在线客服</li>
            <li class="app"><a class="weibo"><i class="fa fa-weibo i_icon"></i></a>
                <a class="weixin"><i class="fa fa-weixin i_icon"></i></a>
            </li>
        </ul>
    </div>
    <div class="footer_f2 container">
        <div>
            <a><img src="/Public/Home/imgs/footer03_03.jpg"></a>
            <a><img src="/Public/Home/imgs/footer03_05.jpg"></a>
            <a><img src="/Public/Home/imgs/footer03_09.jpg"></a>
            <a><img src="/Public/Home/imgs/footer03_11.jpg"></a>
            <a><img src="/Public/Home/imgs/footer03_13.jpg"></a>
            <a><img src="/Public/Home/imgs/footer03_15.jpg"></a>
            <a><img src="/Public/Home/imgs/footer03_17.jpg"></a>
        </div>
        <p>版权所有 (C) PPmoney.com 粤ICP备 12030634号 增值电信业务经营许可证：粤B2-20150286</p>
        <p>信息系统安全等级保护备案证明(三级)  <img src="/Public/Home/imgs/police.png">粤公网安备 44010602001800号</p>
    </div>
    <div class="footer_f3 ">
        <div class="container">
            <span>友情链接：</span>
            <a>贷款</a>
            <a>融360</a>
            <a>贷款</a>
            <a>融360</a>
            <a>贷款</a>
            <a>融360</a>
            <a>贷款</a>
            <a>融360</a>
        </div>
    </div>
</div>
    <script src="/Public/Lib/bootsrapv3.3.7/js/bootstrap.js"></script>
    <script src="/Public/Home/js/base.js"></script>
</body>
</html>