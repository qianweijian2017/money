<?php if (!defined('THINK_PATH')) exit();?>﻿ 
<!DOCTYPE html>
<html lang="zh-CN">
<head> 
    <meta charset="utf-8">
    <title>招财宝</title>
    <link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Lib/bootsrapv3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Home/css/reset.css">
    <link rel="stylesheet" type="text/css"  href="/ThinkPHP/Public/Home/css/base.css?1">
    <script rel="stylesheet" src="/ThinkPHP/Public/Lib/jquery-1.9.1.min.js"></script> 
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
        <a  href="<?php echo U('User/login');?>" class="login">登录</a>
        <span>|</span>
        <a  href="<?php echo U('User/register');?>" class="register">注册</a>
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
                <a href=""><img src="/ThinkPHP/Public/Home/imgs/logo.png"></a>
            </div>
           <?php echo is_active(CONTROLLER_NAME,'Index') ?> 
            <ul class="nav navbar-nav nav_title col-md-7">
                <li class="active" hover="1"><a href="<?php echo U('Index/index');?>">首页</a></li>
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
                <li hover="1"><a href="<?php echo U('Fund/fundlist');?>"> 基金超市<span>Beta</span></a></li>
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

<link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Lib/jqpwd/jqpwd.css"> 
<link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Home/css/register.css" />
	<div id="reg-content" class="container-fluid reg-content">
		<div class="row reg-box">
			<section class="reg-form">
				<form>  
					<!-- 头部 -->
					<div class="reg-header"> 
				 		<div class="reg-header-title">
				 			免费注册招财宝账户
				 		</div>
						<div class="reg-header-login">
				 			已有账号?<a href="<?php echo U('User/login');?>">登录</a>
				 		</div>
			 		</div>
					<!-- 头部 end-->
					<!-- 用户输入部分 -->
					<div class="reg-body">
						<!-- 手机号码 -->
						<div class="reg-phone">
							<div class="reg-input jq_input_rmclass clearfix ">
								<label for="reg-phone">
									<i class="fa fa-mobile-phone"></i>
								</label>
								<input type="text" name="phone" data-vali="phone" placeholder="手机号码" id="reg-phone"  />
								 <div class="check-tip none">
								 	<i class="fa fa-check-circle"></i>
								 </div>
							</div>
							<div class="reg-error none">
								 <i class="fa fa-times-circle"></i> 
								 手机号码不正确
							</div>
						</div>
						<!-- 手机号码 end-->
						<div class="reg-pwd" id="reg-pwd">
							<div class="reg-input jq_input_rmclass clearfix">
								<label for="reg-pwd-input">
									<i class="fa fa-lock"></i>
								</label>
								<input type="password" name="key" id="reg-pwd-input"
								onkeyup="pwStrength(this.value)"  data-vali="pwd" placeholder="密码"   />
							</div> 
							<div class="reg-tips clearfix"> 
								建议密码由8位以上数字、字母和特殊字符组成
							</div>
							<div class="pwd-tip none" id="pwd-tip">
								<p>安全程度:</p>
								<ul class="pass_set">
								    <li id="strength_L">弱</li>
								    <li id="strength_M">中</li>
								    <li id="strength_H">强</li>
								</ul>
							</div>   
							<!-- 错误提示信息 -->
							<div class="reg-error none" id="pwd-error">
								<i class="fa fa-times-circle"></i> 
								密码长度须在8~20位之间
							</div>
							<!-- 错误提示信息end -->
						</div> 
						<!-- 滑动插件 -->
						<div class="reg-pulg-in">
							<div id="slider">
							    <div class="vali-img none">
							    	<h6 class="none">验证成功</h6>
							        <div id="vali-big-img">
							             <img src="12" alt="">
							        </div> 
							        <!-- 固定的 -->
							        <div id="squre" class="squre">  
							        </div> 
							         <!-- 移动的 -->
							         <div id="squretwo" class="squre"> 
							               <img src="12" alt="">
							        </div>
							    </div> 
							    <span id="label">
							    	 
							    </span> 
								<span id="labelTip">按住左边滑块，拖动完成上方拼图</span> 
							</div> 
							<span class="plug-check-box">
								<i class="fa fa-lock" ></i>
							</span>
						</div>
						<!-- 滑动插件end -->
						<!-- 点击显示推荐的手机号 -->
						<div class="reg-slide-phone"> 
							<a href="javascript:;">
								<i class="fa fa-caret-right"></i> 
								推荐人手机号码（选填）
							</a>
						</div>
						 <div id="recommend" class="none">
							<div class="reg-input  jq_input_rmclass clearfix reg-phone-two">
								<label for="reg-phonetwo">
									<i class="fa fa-thumbs-o-up "></i>
								</label>
								<input type="text" data-vali="phone" placeholder="推荐人手机号码(选填)" id="reg-phonetwo">

							</div>
							<!-- 错误提示信息 -->
							<div class="reg-error none"> 
								<i class="fa fa-times-circle"></i> 
								手机号码不正确
							</div>
							<!-- 错误提示信息end -->
						</div>
						<!-- 点击显示推荐的手机号end -->
						
					</div> 
					<!-- 用户输入部分end -->
					<div class="reg-footer">
						<!-- 验证码 -->
						<div class="vali-code"> 
							 <p> 
							 	<img src="<?php echo U('User/verify');?>" onclick="Refresh(this)" />
							 </p> 
							 <input type="text" id="verify" name="verify" placeholder="请输入验证码" />
							 
						</div>
						<!-- 验证码end -->
						<div class="reg-term">
							<input type="checkbox" name="deal" checked="checked">
							<span>我已经阅读并同意</span>
							<a href="javascript:;" id="clause">《服务条款协议》</a>
						</div>
						<div class="reg-submit">
							<button type="submit" id="reg_submit" >确认</button>
						</div>
					</div>
				</form>
			 </section> 
			 <!-- 底部提示 默认隐藏-->
			 <div id="reg-bottom">
		 			<div class="guarantee">
		 		 
		 			</div>
			  </div>
			 <!-- 底部提示end -->
		 </div>
		 <div id="clause-box" class="none">
			<h5 class="pull-left">注册条款</h5>
			<p class="pull-right" id="click_close">
				<i class="fa fa-times"></i>
			</p>
		 	<div class="clause-txt">
		 		
		 	</div>
		 </div>
	</div> 


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
        <a><img src="/ThinkPHP/Public/Home/imgs/footer03_03.jpg"></a>
        <a><img src="/ThinkPHP/Public/Home/imgs/footer03_05.jpg"></a>
        <a><img src="/ThinkPHP/Public/Home/imgs/footer03_09.jpg"></a>
        <a><img src="/ThinkPHP/Public/Home/imgs/footer03_11.jpg"></a>
        <a><img src="/ThinkPHP/Public/Home/imgs/footer03_13.jpg"></a>
        <a><img src="/ThinkPHP/Public/Home/imgs/footer03_15.jpg"></a>
        <a><img src="/ThinkPHP/Public/Home/imgs/footer03_17.jpg"></a>
    </div>
    <p>版权所有 (C) PPmoney.com 粤ICP备 12030634号 增值电信业务经营许可证：粤B2-20150286</p>
    <p>信息系统安全等级保护备案证明(三级)  <img src="/ThinkPHP/Public/Home/imgs/police.png">粤公网安备 44010602001800号</p>
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
    <script src="/ThinkPHP/Public/Lib/bootsrapv3.3.7/js/bootstrap.min.js"></script>
    <script src="/ThinkPHP/Public/Home/js/base.js"></script>
</body>
</html>
<script type="text/javascript" src="/ThinkPHP/Public/Lib/jqpwd/jqpwd.js"></script>
<script type="text/javascript" src="/ThinkPHP/Public/Lib/jq-vali/jquery.slideunlock.js"></script>
<script type="text/javascript" src="/ThinkPHP/Public/Home/js/register.js"></script>