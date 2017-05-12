<?php if (!defined('THINK_PATH')) exit();?> 
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

  
<link rel="stylesheet" type="text/css" href="/Public/Home/css/fundlist.css">
<!-- 基金超市 开始-->
		<!-- 大图片开始 -->
		<section class="super-pic-box">
			 <a href="">
			 	
			 </a>
			 <div class="super-reg">
			 	<h4>昭昭基金超市</h4>
			 	<p>海量理财精选等着你!</p>
			 	<div class="super-bg">
			 		
			 	</div>
			 	<?php if($_SESSION['user']== ''): ?><div class="link-reg">
						<a href="<?php echo U('User/register');?>" class="btn btn-danger">
							注册昭昭基金账户
						</a>
					</div>
					<div class="super-footer">
						已有账户?<a href="<?php echo U('User/login');?>">立即登陆</a>
					</div>
					<?php else: ?>
					<div class="link-reg">
						<a href="<?php echo U('User/register');?>" class="btn btn-danger">
							欢迎登陆昭昭基金账户
						</a>
					</div><?php endif; ?>
			 </div>
		</section>
		<!-- 大图片end -->
	<div id="super_content"> 
		<!-- 大标题 -->
		 <div class="super-title clearfix">
		 	<div class="super-title-left">
		 		<h3>明星基金推荐</h3>
		 		<span>近年来表现优异的基金</span>
		 		<a href="<?php echo U('Fund/fundlist',array('ftype'=>'2'));?>">更多>></a>
		 	</div> 
		 	<div class="super-title-right">
		 		 <a href="<?php echo U('Fund/fundlist',array('ftype'=>'2'));?>">显示全部</a>
		 	</div>
		 </div>
		 <!-- 大标题end -->
		 <!-- 主盒子开始 -->
		 <div class="super-main clearfix">
		  <!-- 主列表开始 -->
		 	<div class="super-list"> 
		 	<!-- 遍历开始 --> 
		 	<?php if(is_array($fundmain)): $i = 0; $__LIST__ = $fundmain;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fundItem): $mod = ($i % 2 );++$i;?><!-- 列表单个选项 --> 
		 		 <?php $right_margin="right-margin"; if($i==4||$i==8){ $right_margin=""; } $icon_color=""; $fund_type=trim($fundItem['fund_type']); switch($fund_type){ case "指数型":$icon_color="yellow";break; case "货币型":$icon_color="green";break; case "债券型":$icon_color="bohe";break; case "海外型":$icon_color="red";break; case "理财型":$icon_color="licai";break; default:$icon_color="default"; } ?>
					
		 		<div class="super-item <?php echo ($right_margin); ?>">
		 			<div class="super-item-tip">
		 				<span class="<?php echo ($icon_color); ?>"><?php echo ($fundItem["fund_type"]); ?></span>
		 			</div>
		 			<div class="super-item-title">
		 				<p><?php echo ($fundItem["fund_fullname"]); ?></p>
		 				<span><?php echo ($fundItem["fund_name"]); ?> <?php echo ($fundItem["fund_code"]); ?></span>
		 			</div> 
		 			<p class="line"></p>
					<div class="super-item-per">
						<span>
							<?php echo ($fundItem["year_profit"]); ?>
						</span>
						<small>
							%
						</small>
						<p>近一年收益</p>
					</div>
					<div class="super-item-recent">
						最新净值
						<span>
							(元)
						</span>
						<?php echo ($fundItem["navunit"]); ?>
					</div>
					<div class="super-item-btn">
						<a href="<?php echo U('Fund/funddetail',array('fixid' => $fundItem[fund_id]));?>">立即购买</a>
					</div>
		 		</div> 
		 		<!-- 列表单个选项end --><?php endforeach; endif; else: echo "" ;endif; ?>
		 	 <!-- 遍历end -->
		 	</div>
		 	  <!-- 主列表end -->
		 </div>
		   <!-- 主盒子end-->
	</div>
	 <!-- 基金超市end-->  
	
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