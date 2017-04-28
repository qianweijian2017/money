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


<link rel="stylesheet" type="text/css" href="/Public/Home/css/register.css" />
<script type="text/javascript" src="/Public/Lib/angular.min.js"></script>

	<div id="reg-content" class="container-fluid reg-content">
		<div class="row reg-box">
			<section class="reg-form">
				<!-- 头部 -->
				<div class="reg-header">
					<div class="reg-header-login">
						已有账号?<a href="<?php echo U('User/login');?>">登录</a>
					</div>
					<ul class="nav nav_tit">
						<li class="active phone_ajax"><a href="#form_phone" data-toggle="tab" class="reg-header-title">手机注册</a></li>
						<li class="email_ajax"><a href="#form_email" data-toggle="tab" class="reg-header-title">邮箱注册</a></li>
					</ul>
				</div>
				<!-- 头部 end-->
				<div class="tab-content">
					<form action="<?php echo U('User/register_phone');?>" class="tab-pane fade in active" id="form_phone" method="post">
						<!-- 用户输入部分 -->
						<div class="reg-body">
							<!-- 手机号码 -->
							<div class="reg-phone">
								<div class="reg-input jq_input_rmclass clearfix ">
									<label for="reg-phone">
										<i class="fa fa-mobile-phone"></i>
									</label>
									<input type="text" name="user_phone" data-vali="phone" placeholder="手机号码" id="reg-phone"  />
									<span></span>
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
									<input type="password" name="user_pwd" class="user_pwd" id="reg-pwd-input" onkeyup="pwStrength(this.value)"  data-vali="pwd" placeholder="密码"   />
									<span></span>
								</div>
								<!-- 错误提示信息 -->
								<div class="reg-error none" id="pwd-error">
									<i class="fa fa-times-circle"></i>
									密码长度须在5~16位之间
								</div>
								<!-- 错误提示信息end -->
								<!--再次密码-->
								<div class="reg-input jq_input_rmclass clearfix">
									<label for="reg-pwd-input">
										<i class="fa fa-lock"></i>
									</label>
									<input type="password" name="repassword" id="reg-pwd-input" data-vali="pwd" placeholder="再次输入密码"   />
									<span></span>
								</div>
							</div>

						</div>
						<!-- 用户输入部分end -->
						<div class="reg-footer">
							<!-- 验证码 -->
							<div class="vali-code">
								<p>
									<img class="phone_img_ajax" src="<?php echo U('User/verify');?>" onclick="Refresh(this)" />
									<input type="hidden" class="ajax_input" value="<?php echo U('User/verify');?>">
								</p>
								<input type="text" id="verify_phone" name="verify" placeholder="请输入验证码" />
								<span class="verify_ts verify_ts1"></span>
							</div>
							<!-- 验证码end -->
							<div class="reg-term">
								<input type="checkbox" name="deal">
								<span>我已经阅读并同意</span>
								<a href="javascript:;" id="clause">《服务条款协议》</a>
							</div>
							<div class="reg-submit">
								<button type="submit" id="reg_submit" class="reg_submit1" disabled="">注册</button>
							</div>
						</div>
					</form>
					<form action="<?php echo U('User/register_email');?>" class="tab-pane fade" id="form_email" method="post">
						<!-- 用户输入部分 -->
						<div class="reg-body">
							<!-- 邮箱-->
							<div class="reg-phone">
								<div class="reg-input jq_input_rmclass clearfix ">
									<label for="reg-phone">
										<i class="fa fa-mobile-phone"></i>
									</label>
									<input type="email" name="user_email" data-vali="email" placeholder="邮箱" id="reg-phone"  />
									<span></span>
									<div class="check-tip none">
										<i class="fa fa-check-circle"></i>
									</div>
								</div>
							</div>
							<!-- 邮箱 end-->
							<div class="reg-pwd" id="reg-pwd">
								<div class="reg-input jq_input_rmclass clearfix">
									<label for="reg-pwd-input">
										<i class="fa fa-lock"></i>
									</label>
									<input type="password" name="user_pwd" class="user_pwd" id="reg-pwd-input" onkeyup="pwStrength(this.value)"  data-vali="pwd" placeholder="密码"   />
									<span></span>
								</div>
								<!-- 错误提示信息 -->
								<div class="reg-error none" id="pwd-error">
									<i class="fa fa-times-circle"></i>
									密码长度须在5~20位之间
								</div>
								<!-- 错误提示信息end -->
								<div class="reg-input jq_input_rmclass clearfix">
									<label for="reg-pwd-input">
										<i class="fa fa-lock"></i>
									</label>
									<input type="password" name="repassword" id="reg-pwd-input" data-vali="pwd" placeholder="再次输入密码"   />
									<span></span>
								</div>
							</div>

						</div>
						<!-- 用户输入部分end -->
						<div class="reg-footer">
							<!-- 验证码 -->
							<div class="vali-code">
								<p>
									<img class="email_img_ajax" src="<?php echo U('User/verify');?>" onclick="Refresh(this)" />
								</p>
								<input type="text" id="verify_email" name="verify" placeholder="请输入验证码" />
								<span class="verify_ts verify_ts2"></span>
							</div>
							<!-- 验证码end -->
							<div class="reg-term2 reg-term">
								<input type="checkbox" name="deal">
								<span>我已经阅读并同意</span>
								<a href="javascript:;" id="clause">《服务条款协议》</a>
							</div>
							<div class="reg-submit">
								<button type="submit" id="reg_submit" class="reg_submit2" disabled="">注册</button>
							</div>
						</div>
					</form>
				</div>
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
 
<script type="text/javascript" src="/Public/Home/js/register.js"></script>
<script  type="text/javascript">
	/*刷新验证码*/
	function Refresh($oVali){
		$oVali.src=$oVali.src+"?"+Math.random();
	}
//	点击选项卡标题刷新验证码
	$('.phone_ajax').click(function () {
		var ajax_input=$('.ajax_input').val();
		$('.phone_img_ajax').attr('src',ajax_input+"?"+Math.random());
	})
	$('.email_ajax').click(function () {
		var ajax_input=$('.ajax_input').val();
		$('.email_img_ajax').attr('src',ajax_input+"?"+Math.random());
	})
//	ajax检测验证码
	$('#verify_phone').bind('input propertychange',function () {
		var verify_ajax=$(this).val();
		$.post("<?php echo U('user/verify_ajax');?>",{verify_ajax},function(data){
			$('.verify_ts1').html(data.massage);
		})
	})
	$('#verify_email').bind('input propertychange',function () {
		var verify_ajax=$(this).val();
		$.post("<?php echo U('user/verify_ajax');?>",{verify_ajax},function(data){
			$('.verify_ts2').html(data.massage);
		})
	})
	//ajax验证用户输入的信息
function I_change(parent_ele,element_change,url){
	element_change.on('change',function () {
		var user_val=$(this).val();
		var name=$(this).attr('name')
		var user_pwd=parent_ele.find('.user_pwd').val();
		var dangqian=$(this);
		$.post(url,{name,user_val,user_pwd}, function (data) {
			dangqian.next('span').html(data.massage);
//			dangqian.next('span').html(data);
		})
	})
}
	var parent_ele=$('#form_phone');
	var element_change=$('#form_phone input');
	var url="<?php echo U('user/register_phone_ajax');?>";
	I_change(parent_ele,element_change,url);

	var parent_ele2=$('#form_email');
	var element_change2=$('#form_email input');
	var url2="<?php echo U('user/register_email_ajax');?>";
	I_change(parent_ele2,element_change2,url2);
</script>