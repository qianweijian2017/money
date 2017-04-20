<?php if (!defined('THINK_PATH')) exit();?>﻿ 
<!DOCTYPE html>
<html lang="zh-CN">
<head> 
<title>金融理财</title>
<link rel="stylesheet" type="text/css" href="/Public/Lib/bootsrapv3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Lib/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/css/reset.css">
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/base.css">
<script rel="stylesheet" src="/Public/Lib/jquery-1.9.1.min.js"></script> 
</head>
<body>
<div class="header_top">
<div class="container none_padding">
    <div class="header_top_left">
        <i class="fa fa-phone i_icon"></i>
        <span>服务热线：<b>10101212</b>（人工 9:00～22:00）</span>
    </div>
    <div class="header_top_right">
        <a class="login">登录</a>
        <span>|</span>
        <a class="register">注册</a>
        <span>|</span>
        <a class="recharge">充值</a>
        <span>|</span>
        <a class="help">帮助中心</a>
        <span>|</span>
        <a class="recruit">人才招聘<i class="hot"></i></a>
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
            <div class="logo col-md-5">
                <a href=""><img  src="/Public/Home/imgs/logo.png"></a>
            </div>
            <ul class="nav navbar-nav nav_title col-md-7">
                <li class="active" hover="1"><a>首页</a></li>
                <li hover="1" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">投资理财<i class="fa fa-chevron-down icon_180"></i><span>New</span></a>
                    <ul class="dropdown-menu nav_second">
                        <li hover="1" class="dropdown">
                            <a class="dropdown-toggle nav_three_title" data-toggle="dropdown" ><i class="fa fa-delicious" ></i>智惠系列<span>(12)</span></a>
                            <ul class="dropdown-menu nav_second nav_three">
                                <li><a>省心宝<span>(12)</span></a></li>
                                <li><a>月月增<span>(99+)</span></a></li>
                                <li><a>灵活宝<span>(99+)</span></a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-refresh" ></i>变现专区<span>(99+)</span></a></li>
                    </ul>
                </li>
                <li hover="1"><a>基金超市<span>Beta</span></a></li>
                <li hover="1" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">信息披露<i class="fa fa-chevron-down icon_180"></i></a>
                    <ul class="dropdown-menu nav_second">
                        <li><a><i class="fa fa-cny" ></i>关于我们</a></li>
                        <li><a><i class="fa fa-cny" ></i>对外公告</a></li>
                        <li><a><i class="fa fa-cny" ></i>运营数据</a></li>
                        <li><a><i class="fa fa-cny" ></i>业务介绍</a></li>
                        <li><a><i class="fa fa-cny" ></i>安全保障</a></li>
                        <li><a><i class="fa fa-cny" ></i>企业文化</a></li>
                    </ul>
                </li>
                <li hover="1"><a>论坛</a></li>
                <li hover="1"><a>会员中心</a></li>
            </ul>
        </div>
    </div>
</div>

  
<link rel="stylesheet" type="text/css" href="/Public/Home/css/fundlist.css">
<!-- 基金超市 开始-->
	<div id="super_content"> 
		<!-- 大标题 -->
		 <div class="super-title clearfix">
		 	<div class="super-title-left">
		 		<h3>明星基金推荐</h3>
		 		<span>近年来表现优异的基金</span>
		 		<a href="">更多>></a>
		 	</div> 
		 	<div class="super-title-right">
		 		<span>基金销售服务由盈米财富提供</span>
		 		<a href="">详情>></a>
		 	</div>
		 </div>
		 <!-- 大标题end -->
		 <!-- 主盒子开始 -->
		 <div class="super-main">
		  <!-- 主列表开始 -->
		 	<div class="super-list">
 
		 	<!-- 遍历开始 --> 
		 	<?php if(is_array($fundlist)): $i = 0; $__LIST__ = $fundlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fundItem): $mod = ($i % 2 );++$i;?><!-- 列表单个选项 -->
		 		<div class="super-item right-margin">
		 			<div class="super-item-tip">
		 				<span><?php echo ($fundItem["fund_type"]); ?></span>
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
						<a href="">立即购买</a>
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
    <script src="/Public/Home/js/base.js"></script>
</body>
</html>