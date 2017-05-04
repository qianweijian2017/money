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

 
<link rel="stylesheet" type="text/css" href="/Public/Home/css/detail.css?1">
	 
 
<div class="navli">
	<ul>
		<li>您所在的位置:</li>
		<li><a href="">首页</a>></li>
		<li><a href="">投资理财</a>></li>
		<li><a href="">省心宝</a>></li>
		<li>项目详情</li>
	</ul>
</div>

<!--content-->
<div class="content">
	<div class="content-in">
		<div class="content_left">
			<div class="content_left_title">
			   <div><h3>新手专享省心宝[20170415-7]</h3></div>
			   <div class="newcus">
				  <ul>
  					<li>加息券</li>
  					<li>满减券</li>
  					<li>新手</li>
  					<li>手动</li>
				  </ul>
			   </div>
			</div>
			<div class="content_info">
				<div class="main-rate">
					<span>8.5</span>
					<span>%</span>
					<span>预期年化收益率&nbsp;<i class="fa fa-question-circle-o"></i></span>
				</div>

				<div class="mod">
					<span class="total">30</span>
					<span class="num">天</span>
					<span class="hb">锁定期</span>
				</div>

				<div class="mod" style="margin-left: 50px;">
					<span class="total">100.00</span>
					<span class="num">万元</span>
					<span class="hb">融资金额</span>
				</div>

				<div class="exp">30天锁定期后随时可退，不退出可持续享有收益
				</div>
			</div>

		</div>

		<div class="content_right">
			<div class="content_right_head">
				<div>
					<span>投资进度：</span>
					<div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">                      
                      </div>
                    </div>
                    <span>60%</span>
				</div>

				<div>剩余金额：	<span class="money">543,700</span>
				&nbsp;元</div>

				<div>账户余额： <a href="<?php echo U('User/login');?>" class="login">登入可见</a></div>
			</div>

			<div class="invest-box">
				<form action="<?php echo U('goods/buy');?>" method="post">
					<p style="font-size: 10px;">购买金额：</p>
					<div class="insert-box">
						<input id="investNum" name="money" class="invest-num" type="text" value="100">
						<input name="fund_code" type="hidden" value="270002">
						<span class="rmb">元</span>
						<div id="btnTotal" class="invest-total">全额</div>
					</div>

					<input class="lijibuy" type="submit" value="立即购买"/>
				</form>

			</div>

			<div class="tip">
			<p>小P提醒：理财有风险，投资需谨慎</p>
			</div>

		</div>
	</div>
</div> 

<div class="content">
  <div class="bs-example bs-example-taps" data-example-id="togglable-taps">
    <ul id="myTabs" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">项目介绍</a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">债权明细</a></li>
      <li role="presentation" class=""><a href="#third" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">风险提示</a></li>
      <li role="presentation" class=""><a href="#forth" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">常见问题</a></li>
    </ul>

    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
         <h5 class="mceNonEditable">了解【省心宝&middot;智惠系列】</h5>
         <div class="word">省心宝&middot;智惠系列是昭昭理财理财平台推出的新型资金管理服务，加入省心宝的资金将由<span>昭昭理财理财自主研发的借贷交易撮合系统（蜂巢系统）</span>代为分配投资标的，投资本金将自动实现债权对应匹配，投资者投资满30天后可随时申请退出，退出成功后按退出本金的比例结算对应收益，不退出可持续享有收益。</div>
         <h5 class="mceNonEditable">项目进度</h5>
         <div class="liuctu"></div>
         <div class="liuc">
         	<ul>
         		<li>
         			<p>今日投资</p>
         			<p class="today">【今日日期】</p>
         		</li>
         		<li>
         			<p>开始计息</p>
         			<p class="start-day">【开始计息日期】</p>
         			<p>预计日期&nbsp;<i class="fa fa-question-circle-o"></i></p>	
         		</li>
         		<li>
         			<p>锁定期满</p>
         			<p class="lockend-day">【锁定期满日期】</p>
         			<p>预计日期&nbsp;<i class="fa fa-question-circle-o">
         			</i></p>
         		</li>
         		<li>
         			<p>随时可申请退出</p>
              <p>2~5个自然日内到账</p>
         		</li>
         	</ul>
         </div>
         
         <div class="table">
         <table class="stepup-guarantee table-stepup">
         	<tbody>
         		<tr><th>如何获得收益</th>
         			<td>债权匹配成功当日开始计息（一般为投资次日），投资者退出成功后按退出本金的比例结算对应收益</td>
         		</tr>
         		<tr><th>投资期限</th>
         			<td><span class="\&quot;strong\&quot;">最短持有30天，最长投资期限为6个月</span></td>
         		</tr>
         		<tr><th>起投和限购金额</th>
         			<td><span class="strong"><span id="min-invest-amount">100.00</span>元起投</span>，并以<span id="increase-invest-amount">100.00</span>元的整数倍递增；单人限购50,000.00元</td>
         		</tr>
         		<tr><th>如何退出</th>
         			<td>
         				<div class="\&quot;quit-box" cf="">
         					<p>1、关于时间：30天锁定期过后，投资者可随时申请退出，但锁定期内不能退出；</p>
         					<p>2、关于金额：投资者可以选择部分或全额退出，每笔申请退出金额至少为100元以上，并以100的整数倍递增；</p>
         					<p>3、关于结息：按退出本金的比例结算对应的利息； 退出本金在退出期间仍然计息，尚未申请退出的本金将继续投资计息，不影响其利息计算；退出成功当日不计息；</p>
         				</div>
         			</td>
         		</tr>
         		<tr><th>退出时间</th>
         			<td>申请退出后，系统将以债权转让方式退出并按批次撮合交易，视债权转让交易情况而定，成功退出一般只需要2~5个自然日；</td>
         		</tr>
         		<tr><th>费用说明</th>
         			<td>退出费0元；</td>
         		</tr>
         		<tr><th>服务协议</th>
         			<td><a class="primary" href="/StepUp/GetAgreement/1?prjType=104039" target="_blank">点击查看</a>
         				<ul>
         					<li style="display: none;" class="date" data-repayment-date="">协议范本： <span> <a href="/StepUp/GetAgreement/1?prjType=104039" target="_blank">查看详情</a></span></li>
         				</ul>
         			</td>
         		</tr>
         	</tbody>
         </table>
         </div>
      </div>

      <div role="tabpanel" class="tab-pane fade " id="profile" aria-labelledby="profile-tab">
        <p class="p-t30 p-b10">为了保护借款人信息，仅展示部分债权标的，投资省心宝后可在我的账户><a href="/StepUp/Home?projectType=104039" target="_blank" class="in">省心宝</a>中查看已购买项目的匹配记录</p>

        <div class="person_info">
        	<h4>已接入互联网金融风险信息共享系统</h4>
        	<table style="width: 100%">
        		<thead>
        			<tr>
        				<th width="20%">项目编号</th>
        				<th>借款人/企业</th>
        				<th width="20%">身份证/机构代码</th>
        				<th width="10%">借款用途</th>
        				<!-- <th width="20%">债权匹配金额（元）</th> -->
        				<th width="20%">借款总额（元）</th>
        				<th width="10%">查看</th>
        			</tr>
        		</thead>
        		<tbody id="record_panelPlan">
        			<tr>
        				<td>11928799002</td>
        				<td>覃**</td>
        				<td>4404****9063</td>
        				<td>个人短期周转</td>
        				<td>3,000.00</td>
        				<td><a href="">详情</a></td>
        			</tr>
        			<tr>
        				<td>11928799002</td>
        				<td>覃**</td>
        				<td>4404****9063</td>
        				<td>个人短期周转</td>
        				<td>3,000.00</td>
        				<td><a href="">详情</a></td>
        			</tr>
        			<tr>
        				<td>11928799002</td>
        				<td>覃**</td>
        				<td>4404****9063</td>
        				<td>个人短期周转</td>
        				<td>3,000.00</td>
        				<td><a href="">详情</a></td>
        			</tr>
        		</tbody>
        	</table>
        </div>
      	<ul class="pagination person_fy">
      		<li>
      			<a href="#" aria-label="Previous">
      			<span aria-hidden="true">上一页</span>
      			</a>
      		</li>
      		<li><a href="#">1</a></li>
      		<li><a href="#">2</a></li>
      		<li><a href="#">3</a></li>
      		<li><a href="#">4</a></li>
      		<li><a href="#">5</a></li>
      		<li><a href="#">6</a></li>
      		<li><a href="#">...</a></li>
      		<li>
      			<a href="#" aria-label="Next">
      				<span aria-hidden="true">下一页</span>
      			</a>
      		</li>
      	</ul>
      </div>

      <div role="tabpanel" class="tab-pane fade" id="third" aria-labelledby="dropdown1-tab">
      	<div class=''>
      		<p class="strengthen">
      			由于债权标的项目受市场、政策、法律等各种因素的影响，昭昭理财理财作为网贷信息中介平台主要提供信息发布和交易撮合服务，不向投资人或对借贷项目提供任何形式的担保，不承诺保本付息，无论是明示或暗示的。昭昭理财理财提供的各种信息及资料仅供参考，不构成任何投资建议或引导，投资人应依其独立判断做出决策并承担由此带来的投资风险。
      		</p>
      		<p class="mt-30">
      			因此请您在投资本项目时，对项目风险务必要有清醒的认识，并根据自身的风险承受能力及资产情况、收入状况、风险偏好等，结合以往的投资经验综合考虑是否投资本项目。
      		</p>
      	</div>
      	<p class="strengthen mt-30">包括但不限于以下风险：</p>
      	<div class="mt-30">
      		<p>（一）市场风险</p>
      		<p>市场风险是指债权标的的预期收益因受经济因素、政治因素和交易制度等各种因素影响而引起的波动，导致收益水平变化而产生的风险。市场风险主要包括：政策风险、经济周期风险、利率风险和购买力风险。</p>
      	</div>
      	<div class="mt-30">
      		<p>（二）信息风险</p>
      		<p>信息风险是指在项目运作过程中，因信息中介方的知识、经验、判断等会影响其对获取的信息的判断。若信息中介方获取的信息不够全面、准确将可能导致投资人判断有误，从而影响最终的投资收益。</p>
      	</div>
      	<div class="mt-30">
      		<p>（三）违约风险</p>
      		<p>违约风险是指项目融资方因死亡、失踪、停业、解散、撤销、破产，或者被有关监管机构撤销相关业务许可等原因导致不能按时履行还款职责的风险。</p>
      	</div>
      	<div class="mt-30">
      		<p>（四）技术风险</p>
      		<p>技术风险是指因本项目通过互联网信息技术平台进行信息撮合成交，因此可能存在信息技术系统故障的风险。</p>
      	</div>
      	<div class="mt-30">
      		<p>（五）操作风险</p>
      		<p>操作风险是指相关人员在业务操作过程中，因操作失误或操作不规范而引起的风险。</p>
      	</div>
      	<div class="mt-30">
      		<p>（六）不可抗力因素导致的风险</p>
      		<p>不可抗力风险是指遭受无法预见、无法克服、无法避免等不可抗力的客观情况所导致的项目无法按时还款的风险，包括但不限于洪水、地震及其它自然灾害、战争、骚乱、火灾、突发性公共卫生事件、政府征用、没收、法律法规变化或其他突发事件、项目相关方非正常的暂停或终止业务等。</p>
      	</div>
      </div>

      <div role="tabpanel" class="tab-pane fade" id="forth" aria-labelledby="dropdown2-tab">
        <div class="stepup-tab-question">
          <h3>1、什么是省心宝？</h3>
          <p>答：省心宝是昭昭理财理财为了兼顾投资者收益性和流动性的需求而特别推出的理财产品。利率固定，收益稳健；到期可退，期限灵活。</p>
          <h3 class="first">2、我省心宝投资1万元，如何预估我12个月后的收益？24个月项目理财期限结束后呢？</h3>
          <p>答：以预期年化收益为8.0%的省心宝项目为例，持有12个月的收益为800元，持有到24个月为1600元，具体金额以实际到账为准，建议您持有至项目理财期限结束为止。</p>
          <h3 class="first">3、省心宝的收益计算方式是怎样的？</h3>
          <p>答：您好，以预期年化收益为8.0%的省心宝项目为例，投资1万元，并持有3个月零10天(假定持有期间为2016/01/01-2016/04/11)的利息约为：10,000*8.0%*3/12+(10,000*8.0%)/12*10/30= 222.22元。（具体金额以实际到账为准）</p>
          <h3 class="first">4、我的钱投给了谁？我怎么知道还款情况如何？</h3>
          <p>答：昭昭理财理财坚持向投资者披露每一笔资金的去向和每一笔借款的还款情况。投资完成后，具体债权的明细您可以登录电脑端【我的账户】，在【省心宝】中查看对应债权的明细。</p>
          <h3 class="first">5、省心宝的收益是怎么结算的？</h3>
          <p>答：债权匹配成功当日开始计息（一般为投资次日），到期一次性还本付息到您的监管账户。项目锁定期过后，如您需取回投资本金，可以申请提前退出，退出成功后按退出本金的比例结算对应收益。</p>
          <h3 class="first">6、锁定期是指什么？</h3>
          <p>答：省心宝的锁定期是指省心宝的最短持有期限，在锁定期内不可以申请退出，锁定期后您可以随时申请退出，并且昭昭理财理财不收取您任何退出费用。成功提交退出申请后，视债权转让交易情况而定，退出一般需要2~5个自然日。</p>
          <h3 class="first">7、 过锁定期后没有进行退出操作，会怎么样?</h3>
          <p>答：如果锁定期过后，您没有选择退出，将会继续持有该项目，并按照原有固定的预期年化收益率计算持有期内收益，直至项目理财期限结束后自动退出为止。</p>
          <h3 class="first">8、退出有什么注意事项吗？</h3>
          <p>答：省心宝申请退出需注意以下几点： <br />1、关于退出时间： a. 必须在锁定期后才能申请退出； b. 视债权转让交易情况而定，退出一般需要2~5个自然日；<br /> 2、关于退出金额： a. 每笔申请退出金额为100元的整数倍； b. 可以选择部分或全额退出； <br />3、关于结息方式： a. 退出本金在申请退出期间仍然计息，成功退出当天起不再计息，尚未申请退出的本金将继续投资计息； b. 退出成功后，系统按退出本金的比例结算对应收益； <br />4、关于退出方式： 您提交退出申请后，系统将自动以债权转让方式退出并按批次撮合交易； <br />5、关于退出申请： 如果您选择部分退出，需要待已提交的申请&ldquo;已退出&rdquo;或&ldquo;取消申请&rdquo;后，才能对剩余部分再次提出新的退出申请。</p>
        </div>
      </div>
    </div>
  
  </div>

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
 <script type="text/javascript" src="/Public/Home/js/detail.js"></script>