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
        <a class="recharge">充值</a>
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
                <li hover="1">
                    <a >投资理财</a> 
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

<link rel="stylesheet" href="/Public/Home/css/personal.css">
<div class="nav_crumb">
    <ul class="breadcrumb personal_crumb width1000">
        <li><a>你的位置：</a></li>
        <li><a>首页</a></li>
        <li><a>个人中心</a></li>
    </ul>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal_con">
    </div>
</div>

<div class="width1000">
    <div class="personal_left">
        <div class="personal_msg">
            <div class="portrait">
                <img class="portrait_img" src="/Public<?php echo ($user_info['user_portrait']); ?>">
            </div>
            <div class="portrait2">
                <h5>
                    <?php if($user_info['user_name'] != '' ): ?><span>欢迎，<?php echo ($user_info['user_name']); ?></span>
                        <?php elseif($user_info['user_email'] != '' ): ?>
                        <span>欢迎，<?php echo ($user_info['user_email']); ?></span>
                        <?php else: ?>
                        <span>欢迎，<?php echo ($user_info['user_phone']); ?></span><?php endif; ?>
                    <?php if($user_info['user_gender'] == 1): ?><span>&nbsp;先生</span>
                        <?php elseif($user_info['user_gender'] == 2): ?>
                        <span>&nbsp;女士</span><?php endif; ?>
                </h5>
                <p>注册号：<?php echo ($user_info['user_register']); ?></p>
                <h6><a class="ionc"></a><a class="shengji">升级/缴费</a></h6>
                <a class="edit" href="<?php echo U('personal/personal_edit');?>">编辑信息</a>
            </div>
        </div>
        <ul class="state" title="实名认证">
                <li><i class="state_icon1"></i><a href="<?php echo U('personal/personal_safe');?>">未认证</a></li>
                <li><i class="state_icon2"></i><a href="<?php echo U('personal/personal_safe');?>">未保障</a></li>
                <li><i class="state_icon3"></i><a href="<?php echo U('personal/personal_safe');?>">已绑定</a></li>
                <li><i class="state_icon4"></i><a href="<?php echo U('personal/personal_safe');?>">未绑定</a></li>
        </ul>
        <div class="personal_grade">
            <div class="ppdengji">
                <span>PP合伙人等级：</span>
                <a><i class="ppdengji_icon"></i></a>
            </div>
            <div class="vipdengji">
                <span>会员等级：</span>
                <a href="">P1</a>
            </div>
            <div class="safedengji">
                <span>安全等级：</span>
                <div class="level"><div class="level_value"></div></div>
                <div class="level_msg"><span>低</span><a>提升</a></div>
            </div>
        </div>
        <div class="account_title my_account">
            我的账户
        </div>
        <div class="invest_manage">
            <div class="account_title  invest_manage_title">
                投资管理
            </div>
            <div class="invest_content">
                <a><div class="img"><img src="/Public/Home/imgs/user/account_03.png"></div><span>月月增</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_05.png"></div><span>季季增</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_08.png"></div><span>省心宝</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_14.png"></div><span>定期理财</span></a>
            </div>
        </div>
        <div class="invest_manage">
            <div class="account_title  invest_manage_title">
                投资管理
            </div>
            <div class="invest_content">
                <a><div class="img"><img src="/Public/Home/imgs/user/account_18.png"></div><span>月月增</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_20.png"></div><span>季季增</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_22.png"></div><span>省心宝</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_28.png"></div><span>定期理财</span></a>
            </div>
        </div>
        <div class="invest_manage">
            <div class="account_title  invest_manage_title">
                资金管理
            </div>
            <div class="invest_content">
                <a><div class="img"><img src="/Public/Home/imgs/user/account_03.png"></div><span>监管账户</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_05.png"></div><span>我的银行卡</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_08.png"></div><span>交易记录</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_14.png"></div><span>充值</span></a>
            </div>
        </div>
        <div class="invest_manage">
            <div class="account_title  invest_manage_title">
                会员资料
            </div>
            <div class="invest_content">
                <a><div class="img"><img src="/Public/Home/imgs/user/account_31.png"></div><span>会员资料</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_32.png"></div><span>安全认证</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_34.png"></div><span>密码管理</span></a>
                <a><div class="img"><img src="/Public/Home/imgs/user/account_39.png"></div><span>pp合伙人</span></a>
            </div>
        </div>


    </div>
    <div class="personal_right">
        <div class="personal_capital">
            <div class="personal_trade">
                <div class="personal_trade_balance">
                    <span>账户余额：<h2>999.00</h2>元</span><a>转入灵活宝</a>
                </div>
                <div class="personal_trade_operate">
                    <a class="recharge">充值</a>
                    <a class="cash">提现</a>
                </div>
            </div>
            <ul class="personal_profit">
                <li>
                    <p>总资产<span>(元)</span></p>
                    <p class="cash">0.00</p>
                    <p><a>查看详情></a></p>
                </li>
                <li>
                    <p>累计收益<span>(元)</span></p>
                    <p class="cash">0.00</p>
                    <p><a>查看详情></a></p>
                </li>
                <li>
                    <p>我的积分</p>
                    <p class="cash">0</p>
                    <p><a>积分商城></a></p>
                </li>
            </ul>
            <p class="all_profit">累计投资：<span>0</span>笔， 共计：<span>0.00</span>元</p>
        </div>
        <div></div>
    </div>

</div>
<script src="/Public/Home/js/personal.js"></script>

﻿

<div style="width:100%;background:#fff;">
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
    <script src="/Public/Lib/bootsrapv3.3.7/js/bootstrap.min.js"></script>
    <script src="/Public/Home/js/base.js"></script>
</body>
</html>