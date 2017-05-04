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

<link rel="stylesheet" href="/Public/Home/css/personal_common.css">
<link rel="stylesheet" href="/Public/Home/css/personal_safe.css">

<div class="width100">
    <div class="nav_crumb">
        <ul class="breadcrumb personal_crumb width1000">
            <li><a>你的位置：</a></li>
            <li><a href="<?php echo U('index/index');?>">首页</a></li>
            <li><a href="<?php echo U('personal/index');?>">个人中心</a></li>
            <li><a>账户安全</a></li>
        </ul>
    </div>
    <div class="width1000 personal_con">
        <link rel="stylesheet" href="/Public/Home/css/personal_edit_menu.css">
    <div class="edit_left">
        <h4>设置列表</h4>
        <ul class="left_list">
            <li><a href="<?php echo U('personal/index');?>">个人中心</a></li>
            <li class="<?php if(ACTION_NAME == personal_edit): ?>active<?php endif; ?>">
                <a href="<?php echo U('personal/personal_edit');?>">基本信息</a>
            </li>
            <li class="<?php if((ACTION_NAME == personal_safe) or (ACTION_NAME == personal_safe_edit)): ?>active<?php endif; ?>">
                <a href="<?php echo U('personal/personal_safe');?>">账户安全</a>
            </li>
            <li><a>账号绑定</a></li>
            <li><a>我的级别</a></li>
        </ul>
    </div>
        <div class="safe_box">
            <div class="safe">
                <i class="fa fa-check"></i>
                <h3>登录密码</h3>
                <div class="hr"></div>
                <span>互联网账号存在被盗风险，建议您定期更改密码以保护账户安全。</span>
                <a  href="<?php echo U('personal/personal_safe_edit',array('cate'=>'pwd'));?>">修改</a>
            </div>
            <?php if($user_info['user_email'] == ''): ?><div class="safe">
                    <i class="fa fa-close"></i>
                    <h3>邮箱验证</h3>
                    <div class="hr"></div>
                    <span>验证后，可用于找回登录密码，接收账户余额变动提醒。</span>
                    <a class="check" href="<?php echo U('personal/personal_safe_edit',array('cate'=>'email','stauts'=>0));?>">立即验证</a>
                </div>
                <?php else: ?>
                <div class="safe">
                    <i class="fa fa-check"></i>
                    <h3>邮箱验证</h3>
                    <div class="hr"></div>
                    <span>您验证的邮箱是：<?php echo ($user_info['user_email']); ?></span>
                    <a href="<?php echo U('personal/personal_safe_edit',array('cate'=>'email','stauts'=>1));?>">修改</a>
                </div><?php endif; ?>
            <?php if($user_info['user_phone'] == ''): ?><div class="safe">
                    <i class="fa fa-close"></i>
                    <h3>手机验证</h3>
                    <div class="hr"></div>
                    <span>验证后，可用于快速找回登录密码，接收账户余额变动提醒。</span>
                    <a class="check" href="<?php echo U('personal/personal_safe_edit',array('cate'=>'phone','stauts'=>0));?>">立即验证</a>
                </div>
                <?php else: ?>
                <div class="safe">
                    <i class="fa fa-check"></i>
                    <h3>手机验证</h3>
                    <div class="hr"></div>
                    <span>您验证的手机：<?php echo ($user_info['user_phone']); ?> 若已丢失或停用，请立即更换</span>
                    <a href="<?php echo U('personal/personal_safe_edit',array('cate'=>'phone','stauts'=>1));?>">修改</a>
                </div><?php endif; ?>
            <?php if($user_info['user_id_card'] == ''): ?><div class="safe">
                    <i class="fa fa-close"></i>
                    <h3>实名认证</h3>
                    <div class="hr"></div>
                    <span>验证后，可用于找回登录密码，管理账户资金，利于资金安全。</span>
                    <a class="check" href="<?php echo U('personal/personal_safe_edit',array('cate'=>'real','stauts'=>0));?>">立即验证</a>
                </div>
                <?php else: ?>
                <div class="safe">
                    <i class="fa fa-check"></i>
                    <h3>实名认证</h3>
                    <div class="hr"></div>
                    <span>您认证的实名信息：<?php echo ($user_info['user_real_name']); ?> <?php echo ($user_info['user_id_card']); ?></span>
                    <a style="color: #666;">已验证</a>
                </div><?php endif; ?>

        </div>

    </div><!--内容-->
    <!--满屏-->
</div>
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
    <script src="/Public/Lib/bootsrapv3.3.7/js/bootstrap.min.js"></script>
    <script src="/Public/Home/js/base.js"></script>
</body>
</html>