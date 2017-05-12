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


<link rel="stylesheet" href="/Public/Home/css/index.css">
<script src="/Public/Home/js/news.js"></script>

<div class="banner">
    <div class="banner-img carousel slide" id="slidershow" data-ride="carousel">
        <div class="banner-list carousel-inner">
            <?php if(is_array($ppt_info)): $i = 0; $__LIST__ = $ppt_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fundItem): $mod = ($i % 2 );++$i;?><img class="item" src="/Public<?php echo ($fundItem["pic_path"]); ?>" alt=""><?php endforeach; endif; else: echo "" ;endif; ?>


            <!--  <img class="item" src="/Public/Home/imgs/02.jpg" alt="">
             <img class="item" src="/Public/Home/imgs/03.jpg" alt="">
             <img class="item" src="/Public/Home/imgs/04.jpg" alt="">
             <img class="item" src="/Public/Home/imgs/05.png" alt="">
             <img class="item" src="/Public/Home/imgs/06.jpg" alt="">
         </div> -->
            <!-- 显示幻灯片数量的容器 -->
            <form>
                <input type="hidden" value="<?php echo ($cont); ?>" class="con">
            </form>
            <ul class="carousel-indicators">

                <script type="text/javascript">
                    var carou = "";
                    for (var i = 0; i < $(".con").val(); i++) {
                        carou += '<li data-slide-to="' + i + '"  data-target="#slidershow"></li>'
                        $('.carousel-indicators').html(carou);
                    }
                </script>
                <!-- <li data-slide-to="0" class="active" data-target="#slidershow"></li>
                <li data-slide-to="1"  data-target="#slidershow"></li>
                <li data-slide-to="2"  data-target="#slidershow"></li>
                <li data-slide-to="3"  data-target="#slidershow"></li>
                <li data-slide-to="4"  data-target="#slidershow"></li>
                <li data-slide-to="5"  data-target="#slidershow"></li> -->

            </ul>
        </div>
        <div class="banner-box">
            <div id="login">
                <div class="banner-box-hd">
                    <h3>预期年化收益率</h3>
                    <p>昭昭理财预期年化收益率</p>
                    <p class="sum">6%~13%</p>
                </div>
                <div class="banner-box-bd">
                    <?php if($_SESSION['user']== ''): ?><a href="<?php echo U('User/register');?>" class="btn-reg">注册领红包</a>
                        <p class="tips">已有账号？<a href="<?php echo U('User/login');?>" class="link">立即登录</a></p>
                        <?php else: ?>
                        <a class="btn-reg">欢迎登录</a><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="session data-warp">
        <div class="data">
            <ul class="data-list">
                <li>
                    <span>现金交易额</span>
                    <label>768<span>亿</span>6007<span>万</span>9885<span class="normal">元</span></label>
                </li>
                <li>
                    <span>为用户赚取收益</span>
                    <label>14<span>亿</span>7684<span>万</span>5385<span class="normal">元</span></label>
                </li>
                <li class="personNum">
                    <span>注册人数</span>
                    <label>1214<span>万</span>7574<span class="normal">人</span></label>
                    <em class="line"></em>
                </li>
                <li>
                    <span>安全运营时间</span>
                    <label>1587<span class="normal">天</span></label>
                </li>
            </ul>
            <cite>
                <a class="data-btn" href="">详情></a>
            </cite>
        </div>
    </div>
    <div class="session notice-warp">
        <div class="notice">
            <ul class="notice-list">
                <li class="item">
                    <div class=" imgs  notice-img01"></div>
                    <div class="text">
                        <h3>银行存管</h3>
                        <span>所有资金流转均在<br>厦门银行内完成</span>
                    </div>
                </li>
                <li class="item">
                    <div class="imgs notice-img02"></div>
                    <div class="text">
                        <h3>普惠金融</h3>
                        <span>专注于小额分散的<br>消费金融</span>
                    </div>
                </li>
                <li class="item">
                    <div class="imgs notice-img03"></div>
                    <div class="text">
                        <h3>智能服务</h3>
                        <span>国内先进的科技金融<br>服务体系</span>
                    </div>
                </li>
                <li class="item">
                    <div class="imgs notice-img04"></div>
                    <div class="text">
                        <h3>会员单位</h3>
                        <span>中国互联网金融协会<br>首批会员</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row main-detail r1">
        <div class="container">
            <div class="col-lg-3 col-md-4 bg-blue bg-title">
                <div class="bg-up"></div>
                <div class="bg-box">

                </div>
                <div class="bg-down"></div>
            </div>

            <div class="col-lg-9 col-md-8 main-con">
                <ul class="bd-row">
                    <li style="border-right: 1px solid #cccccc" data-status="<?php echo ($data["status"]); ?>" data-id="<?php echo ($data["id"]); ?>">
                        <div class="hd">
                            <div class="tip-title" style="float: left">
                                省心宝
                            </div>
                            <div class="tips">
                                <?php echo (round($data['proj_total']/10000,0)); ?>万
                            </div>
                        </div>
                        <div class="bd">
                            <div class="f1" style="float: left">
                                <div class="yuqi"><span class="yuqitext">预期年化收益率</span><span class="yuqinum"><?php echo ($data['pro_profit']); ?>%</span>
                                </div>
                                <div class="qitou" style="    color: #999;">100起投</div>

                            </div>
                            <div class="lock-day" style="float: right">
                                锁定期 <span class="suodingnum">
                               <?php echo ($data["proj_lock"]); ?>天
                            </span>
                            </div>
                        </div>
                        <div class="ft">
                            <div class="progress-box">
                                <div class="progress-box-c">
                                    <div class="progress-ing" data-width=""></div>
                                </div>
                                <?php $programing_=($data['proj_amount'])/($data['proj_total'])*100; $programing_=sprintf("%.2f",substr(sprintf("%.3f", $programing_), 0, -2)); ?>
                                <span class="progress-val" style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing_); ?>%</span>
                            </div>
                            <div class="progress-box-lent">
                                <div class="progress-box-c">
                                    <div class="progress-ing-lent" data-width=""></div>

                                </div>
                                <?php $programing__=($data['proj_lent'])/($data['proj_total'])*100; ?>
                                <span class="progress-val-lent" style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing__); ?>%</span>
                            </div>
                            <div class="invest-box cf">
                                <div class="btn-box">

                                    <a target="_blank" class="btn btn-primary">立即投资</a>

                                </div>
                            </div>
                        </div>
                        <div class="rookie-mark">新手专享</div>
                    </li>
                    <li data-status="<?php echo ($data_sec["status"]); ?>" data-id="<?php echo ($data_sec["id"]); ?>">
                        <div class="hd">
                            <div class="tip-title" style="float: left">
                                省心宝
                            </div>
                            <div class="tips">
                                <?php echo (round($data_sec['proj_total']/10000,0)); ?>万
                            </div>
                        </div>
                        <div class="bd">
                            <div class="f1" style="float: left">
                                <div class="yuqi">
                                    <span class="yuqitext"><span class="yuqitext">预期年化收益率</span></span>
                                    <span class="yuqinum">
                                    <?php echo ($data_sec["pro_profit"]); ?>%
                            </span></div>

                                <div class="qitou" style="    color: #999;">100起投</div>

                            </div>
                            <div class="lock-day" style="float: right">
                                锁定期 <span class="suodingnum">
                            <?php echo ($data_sec["proj_lock"]); ?> 天
                            </span>
                            </div>

                        </div>
                        <div class="ft">
                            <div class="progress-box">
                                <div class="progress-box-c">
                                    <div class="progress-ing" data-width="">

                                    </div>
                                </div>
                                <?php $programing=($data_sec['proj_amount'])/($data_sec['proj_total'])*100; $programing=sprintf("%.2f",substr(sprintf("%.3f", $programing), 0, -2)); ?>
                                <span class="progress-val"
                                      style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing); ?>%</span>
                            </div>
                            <div class="progress-box-lent">
                                <div class="progress-box-c">
                                    <div class="progress-ing-lent" data-width=""></div>

                                </div>
                                <?php $programing=($data_sec['proj_lent'])/($data_sec['proj_total'])*100; $programing=sprintf("%.2f",substr(sprintf("%.3f", $programing), 0, -2)); ?>
                                <span class="progress-val-lent" style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing); ?>%</span>
                            </div>
                            <div class="invest-box cf">
                                <div class="btn-box">

                                    <a target="_blank" class="btn btn-primary">立即投资</a>

                                </div>
                            </div>
                        </div>
                        <div class="rookie-mark">新手专享</div>
                    </li>
                    <li style="border-right: 1px solid #cccccc">
                        <div class="t-pic">

                        </div>
                    </li>
                    <li data-status="<?php echo ($data_thr["status"]); ?>" data-id="<?php echo ($data_thr["id"]); ?>">
                        <div class="hd">
                            <div class="tip-title" style="float: left">
                                省心宝
                            </div>
                            <div class="tips">
                                <?php echo (round($data_thr['proj_total']/10000,0)); ?>万
                            </div>
                        </div>
                        <div class="bd">
                            <div class="f1" style="float: left">
                                <div class="yuqi"><span class="yuqitext">预期年化收益率</span>

                                    <span class="yuqinum">
                                    <?php echo ($data_thr["pro_profit"]); ?>%
                            </span></div>

                                <div class="qitou" style="    color: #999;">100起投</div>

                            </div>
                            <div class="lock-day" style="float: right">
                                锁定期 <span class="suodingnum">
                            <?php echo ($data_thr["proj_lock"]); ?> 天
                            </span>
                            </div>

                        </div>
                        <div class="ft">
                            <div class="progress-box">
                                <div class="progress-box-c">
                                    <div class="progress-ing" data-width="">

                                    </div>
                                </div>
                                <?php $programing=($data_sec['proj_amount'])/($data_sec['proj_total'])*100; $programing=sprintf("%.2f",substr(sprintf("%.3f", $programing), 0, -2)); ?>
                                <span class="progress-val"
                                      style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing); ?>%</span>
                            </div>
                            <div class="progress-box-lent">
                                <div class="progress-box-c">
                                    <div class="progress-ing-lent" data-width=""></div>

                                </div>
                                <?php $programing=($data_thr['proj_lent'])/($data_thr['proj_total'])*100; $programing=sprintf("%.2f",substr(sprintf("%.3f", $programing), 0, -2)); ?>
                                <span class="progress-val-lent" style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing); ?>%</span>
                            </div>
                            <div class="invest-box cf">
                                <div class="btn-box">

                                    <a target="_blank" class="btn btn-primary">立即投资</a>

                                </div>
                            </div>
                        </div>
                        <div class="rookie-mark">新手专享</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row main-detail r2">
        <div class="container">
            <div class="col-lg-3 col-md-4 bg-pink bg-title">
                <div class="bg-up"></div>
                <div class="bg-box">

                </div>
                <div class="bg-down"></div>
            </div>
            <div class="col-lg-9 col-md-8 main-con">
                <ul class="bd-row">
                    <li data-id="<?php echo ($data_yyz["id"]); ?>" data-status="<?php echo ($data_yyz["status"]); ?>"
                        style="border-right: 1px solid #cccccc">
                        <div class="hd">
                            <div class="tip-title" style="float: left">
                                月月增
                            </div>
                            <div class="tips">
                                <?php echo (round($data_yyz['proj_total']/10000,0)); ?>万
                            </div>
                        </div>
                        <div class="bd">
                            <div class="f1" style="float: left">
                                <div class="yuqi"><span class="yuqitext">预期年化收益率</span><span class="yuqinum"><?php echo ($data_yyz["pro_profit"]); ?>%</span>
                                </div>
                                <div class="qitou" style="    color: #999;">100起投</div>

                            </div>
                            <div class="lock-day" style="float: right">
                                锁定期 <span class="suodingnum">
                                 <?php echo ($data_yyz["proj_lock"]); ?>天
                            </span>
                            </div>

                        </div>
                        <div class="ft">
                            <div class="progress-box-lent">
                                <div class="progress-box-c">
                                    <div class="progress-ing-lent" data-width=""></div>

                                </div>
                                <?php $programing=($data_yyz['proj_lent'])/($data_yyz['proj_total'])*100; $programing=sprintf("%.2f",substr(sprintf("%.3f", $programing), 0, -2)); ?>
                                <span class="progress-val-lent" style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing); ?>%</span>
                            </div>
                            <div class="progress-box">
                                <div class="progress-box-c">
                                    <div class="progress-ing" data-width=""></div>

                                </div>
                                <?php $programing=($data_yyz['proj_amount'])/($data_yyz['proj_total'])*100; $programing=sprintf("%.2f",substr(sprintf("%.3f", $programing), 0, -2)); ?>
                                <span class="progress-val"
                                      style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing); ?>%</span>
                            </div>
                            <div class="invest-box cf">
                                <div class="btn-box">

                                    <a target="_blank" class="btn btn-primary">立即投资</a>

                                </div>
                            </div>
                        </div>
                        <div class="rookie-mark">新手专享</div>
                    </li>
                    <li data-id="<?php echo ($data_yyz_total["id"]); ?>" data-status="<?php echo ($data_yyz_total["status"]); ?>">
                        <div class="hd">
                            <div class="tip-title" style="float: left">
                                月月增
                            </div>
                            <div class="tips">
                                <?php echo (round($data_yyz_total['proj_total']/10000,0)); ?>万
                            </div>
                        </div>
                        <div class="bd">
                            <div class="f1" style="float: left">
                                <div class="yuqi"><span class="yuqitext">预期年化收益率</span><span class="yuqinum"><?php echo ($data_yyz_total["pro_profit"]); ?>%</span>
                                </div>
                                <div class="qitou" style="    color: #999;">100起投</div>

                            </div>
                            <div class="lock-day" style="float: right">
                                锁定期 <span class="suodingnum">
                                 <?php echo ($data_yyz_total["proj_lock"]); ?>天
                            </span>
                            </div>

                        </div>
                        <div class="ft">
                            <div class="progress-box-lent">
                                <div class="progress-box-c">
                                    <div class="progress-ing-lent" data-width=""></div>

                                </div>
                                <?php $programing=($data_yyz_total['proj_lent'])/($data_yyz_total['proj_total'])*100; $programing=sprintf("%.2f",substr(sprintf("%.3f", $programing), 0, -2)); ?>
                                <span class="progress-val-lent" style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing); ?>%</span>
                            </div>
                            <div class="progress-box">
                                <div class="progress-box-c">
                                    <div class="progress-ing" data-width=""></div>

                                </div>
                                <?php $programing=($data_yyz_total['proj_amount'])/($data_yyz_total['proj_total'])*100; $programing=sprintf("%.2f",substr(sprintf("%.3f", $programing), 0, -2)); ?>
                                <span class="progress-val"
                                      style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing); ?>%</span>
                            </div>
                            <div class="invest-box cf">
                                <div class="btn-box">

                                    <a target="_blank" class="btn btn-primary">立即投资</a>

                                </div>
                            </div>
                        </div>
                        <div class="rookie-mark">新手专享</div>
                    </li>
                    <li style="border-right: 1px solid #cccccc">
                        <div class="t-pic">

                        </div>
                    </li>
                    <li data-id="<?php echo ($data_yyz_thr["id"]); ?>" data-status="<?php echo ($data_yyz_thr["status"]); ?>">
                        <div class="hd">
                            <div class="tip-title" style="float: left">
                                月月增
                            </div>
                            <div class="tips">
                                <?php echo (round($data_yyz_thr['proj_total']/10000,0)); ?>万
                            </div>
                        </div>
                        <div class="bd">
                            <div class="f1" style="float: left">
                                <div class="yuqi"><span class="yuqitext">预期年化收益率</span><span class="yuqinum"><?php echo ($data_yyz_thr["pro_profit"]); ?>%</span>
                                </div>
                                <div class="qitou" style="    color: #999;">100起投</div>

                            </div>
                            <div class="lock-day" style="float: right">
                                锁定期 <span class="suodingnum">
                                 <?php echo ($data_yyz_thr["proj_lock"]); ?>天
                            </span>
                            </div>

                        </div>
                        <div class="ft">
                            <div class="progress-box-lent">
                                <div class="progress-box-c">
                                    <div class="progress-ing-lent" data-width=""></div>

                                </div>
                                <?php $programing=($data_yyz_thr['proj_lent'])/($data_yyz_thr['proj_total'])*100; $programing=sprintf("%.2f",substr(sprintf("%.3f", $programing), 0, -2)); ?>
                                <span class="progress-val-lent" style="float: right;margin-top: -8px;margin-left: 5px"><?php echo (round($data_yyz_thr['proj_lent']/ $data_yyz_thr['proj_total']*100,3)); ?>%</span>
                            </div>
                            <div class="progress-box">
                                <div class="progress-box-c">
                                    <div class="progress-ing" data-width=""></div>

                                </div>
                                <?php $programing=($data_yyz_thr['proj_amount'])/($data_yyz_thr['proj_total'])*100; $programing=sprintf("%.2f",substr(sprintf("%.3f", $programing), 0, -2)); ?>
                                <span class="progress-val"
                                      style="float: right;margin-top: -8px;margin-left: 5px"><?php echo ($programing); ?>%</span>
                            </div>
                            <div class="invest-box cf">
                                <div class="btn-box">

                                    <a target="_blank" class="btn btn-primary">立即投资</a>

                                </div>
                            </div>
                        </div>
                        <div class="rookie-mark">新手专享</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row main-detail r3">
        <div class="container">
            <div class="col-lg-3 col-md-4 bg-orange bg-title">
                <div class="bg-up"></div>
                <div class="bg-box">

                </div>
                <div class="bg-down"></div>
            </div>
            <div class="col-lg-9 col-md-8 main-con">
                <ul class="bd-row">
                    <li data-id="<?php echo ($data_fund_sec["id"]); ?>" style="border-right: 1px solid #cccccc">
                        <div class="hd">
                            <div class="tip-title" style="float: left">
                                <?php echo ($data_fund_sec["fund_name"]); ?>
                            </div>
                            <div class="tips">
                                <?php echo ($data_fund_sec["fund_type"]); ?>
                            </div>
                        </div>
                        <div class="bd">
                            <div class="f1" style="float: left">
                                <div class="yuqi">近一年化收益率<span class="yuqinum"><?php echo ($data_fund_sec["year_profit"]); ?>%</span>
                                </div>

                            </div>
                            <div class="lock-day" style="float: right">
                                代码：<span class="suodingnum">
                                <?php echo ($data_fund_sec["fund_code"]); ?>
                            </span>
                            </div>

                        </div>
                        <div class="ft">
                            <div class="progress-box">
                                <div class="progress-box-c">
                                    <div class="progress-ing" data-width=""></div>
                                    <span>创始时间：</span>
                                  <span class="productname" style=""><?php echo ($data_fund_sec["create_time"]); ?></span>


                                </div>
                                <!--<span class="progress-val"-->
                                <!--style="float: right;margin-top: -8px;margin-left: 5px">78.46%</span>-->
                            </div>
                            <div class="invest-box cf">
                                <div class="btn-box">

                                    <a target="_blank" class="btn btn-primary">查看详情</a>

                                </div>
                            </div>
                        </div>
                        <div class="rookie-mark">火热基金</div>
                    </li>
                    <li data-id="<?php echo ($data_fund_fri["id"]); ?>">
                        <div class="hd">
                            <div class="tip-title" style="float: left">
                                <?php echo ($data_fund_fri["fund_name"]); ?>
                            </div>
                            <div class="tips">
                                <?php echo ($data_fund_fri["fund_type"]); ?>
                            </div>
                        </div>
                        <div class="bd">
                            <div class="f1" style="float: left">
                                <div class="yuqi">近一年化收益率<span class="yuqinum"> <?php echo ($data_fund_fri["year_profit"]); ?>%</span>
                                </div>


                            </div>
                            <div class="lock-day" style="float: right">
                                代码：<span class="suodingnum">
                                <?php echo ($data_fund_fri["fund_code"]); ?>
                            </span>
                            </div>

                        </div>
                        <div class="ft">
                            <div class="progress-box">
                                <div class="progress-box-c">
                                    <div class="progress-ing" data-width=""></div>
                                    <span>创始时间：</span>
                                    <span class="productname" style=""><?php echo ($data_fund_fri["create_time"]); ?></span>
                                </div>
                                <!--<span class="progress-val"-->
                                <!--style="float: right;margin-top: -8px;margin-left: 5px">18.46%</span>-->
                            </div>
                            <div class="invest-box cf">
                                <div class="btn-box">

                                    <a target="_blank" class="btn btn-primary">查看详情</a>

                                </div>
                            </div>
                        </div>
                        <div class="rookie-mark">火热基金</div>
                    </li>
                    <li style="border-right: 1px solid #cccccc">
                        <div class="t-pic">

                        </div>
                    </li>
                    <li data-id="<?php echo ($data_fund_thr["id"]); ?>">
                        <div class="hd">
                            <div class="tip-title" style="float: left">
                                <?php echo ($data_fund_thr["fund_name"]); ?>
                            </div>
                            <div class="tips">
                                <?php echo ($data_fund_thr["fund_type"]); ?>
                            </div>
                        </div>
                        <div class="bd">
                            <div class="f1" style="float: left">
                                <div class="yuqi">近一年化收益率<span class="yuqinum"> <?php echo ($data_fund_thr["year_profit"]); ?>%</span>
                                </div>

                            </div>
                            <div class="lock-day" style="float: right">
                                代码：<span class="suodingnum">
                                <?php echo ($data_fund_thr["fund_code"]); ?>
                            </span>
                            </div>

                        </div>
                        <div class="ft">
                            <div class="progress-box">
                                <div class="progress-box-c">
                                    <div class="progress-ing" data-width=""></div>
                                    <span>创始时间：</span>
                                    <span class="productname" style=""><?php echo ($data_fund_fri["create_time"]); ?></span>
                                </div>
                                <!--<span class="progress-val"-->
                                <!--style="float: right;margin-top: -8px;margin-left: 5px">78.46%</span>-->
                            </div>
                            <div class="invest-box cf">
                                <div class="btn-box">

                                    <a target="_blank" class="btn btn-primary">查看详情</a>

                                </div>
                            </div>
                        </div>
                        <div class="rookie-mark">火热基金</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php echo ($project['proj_amount']); ?>
    <!-- 新闻详情开始 -->
    <div class="container " id="news">
        <div class="row news_page news_position ">
            <div class="page-col-6  padding pull-left ">
                <div class="page-col-10 margin_b ">
                    <ul class="list-inline" id="title">
                        <li><a href="#com_dynamic" data-toggle="tab">公司动态</a></li>
                        <li><a href="#Media_reports" data-toggle="tab">媒体报道</a></li>
                        <li><a href="#powder_activity" data-toggle="tab">P粉活动</a></li>
                    </ul>

                </div>
                <div class="tab-content ">
                    <div class="tab-pane fade in active" id="com_dynamic">
                        <div class=" page-col-5 pull-left">
                            <div>
                                <img src="/Public/Home/imgs/00006_20170328183857.jpeg" class="img-responsive">
                            </div>
                        </div>
                        <div class="page-col-5 detail-text  pull-right">
                            <ul>
                                <li>
                                    <a>
                                        <strong>昭昭理财受邀出席中澳经贸合作论坛</strong>
                                    </a>
                                    <p>
                                        3月24日，李克强总理和特恩布尔总理出席中国澳大利亚首席执行官圆桌会议和中国-澳大利亚经贸合作论坛。此次，昭昭理财万惠集团董事长陈宝国也成为中国经贸代表团成员，受邀出席此次论坛。</p>
                                </li>
                                <li>
                                    <a href="javascript:;">科技改变世界 昭昭理财打造数字普惠超级生态</a>
                                </li>
                                <li>
                                    <a href="javascript:;">农业融资迎来春天 昭昭理财送金融服务下乡</a>
                                </li>
                            </ul>

                        </div>

                    </div>
                    <div class="tab-pane detail-text " id="Media_reports">
                        <ul class="date-color">
                            <li>
                                <a href="javascript;:" class="pull-left"><strong>[网贷天眼]</strong>金融科技驱动未来 昭昭理财力拓海外市场</a>
                                <span class="pull-right"> 2017-03-30</span>
                            </li>
                            <li>
                                <a href="javascript;:" class="pull-left"><strong>[中国经济时报]</strong>互联网金融将成农业供给侧改革助推器</a>
                                <span class="pull-right">2017-03-07</span>
                            </li>
                            <li>
                                <a href="javascript;:" class="pull-left"><strong>[金融之家]</strong>五天四家平台宣布上线资金存管 网贷行业迎来春天</a>
                                <span class="pull-right">2017-03-07</span>
                            </li>
                            <li>
                                <a href="javascript;:" class="pull-left"><strong>[新快报]</strong>农村金融再入一号文件 企业创新玩法多</a>
                                <span class="pull-right">2017-02-23</span>
                            </li>
                            <li>
                                <a href="javascript;:"
                                   class="pull-left"><strong>[网贷天眼]</strong>昭昭理财胡新：广东网贷管理办法强化投资者教育</a>
                                <span class="pull-right">2017-02-21</span>
                            </li>
                        </ul>

                    </div>
                    <div class="tab-pane " id="powder_activity">
                        <ul class="">
                            <li class="page-col-5 pull-left">
                                <a href="#">
                                    <img src="/Public/Home/imgs/00002_20170227104927.jpeg" alt=""
                                         class="img-responsive">
                                    <span>昭昭理财粉丝见面会在穗举行 共迎存管...</span>
                                </a>
                            </li>
                            <li class="page-col-5 pull-right">
                                <a href="#">
                                    <img src="/Public/Home/imgs/00003_20170227104931.jpeg" alt=""
                                         class="img-responsive">
                                </a>
                                <span>天津P粉共赴新年之约 公益礼包获赞</span>
                            </li>
                        </ul>

                    </div>

                </div>
                <div><a href="#" class="more_a pull-right more_a_position">更多></a></div>
            </div>
            <div class="page-col-4 padding pull-right left-border">
                <div class="margin_b">
                    <h5>公司公告</h5>
                    <a href="#" class="more_a pull-right">更多></a>
                </div>
                <div class="detail-text">
                    <ul class="date-color">
                        <li>
                            <a href="javasript:;" class="pull-left">关于部分银行系统维护通知的公告</a>
                            <span class="pull-right">2017-04-14</span>
                        </li>
                        <li>
                            <a href="javasript:;" class="pull-left">关于昭昭合伙人佣金奖励调整的说明</a>
                            <span class="pull-right">2017-04-14</span>
                        </li>
                        <li>
                            <a href="javasript:;" class="pull-left">关于昭昭理财理财2017年清明节放... </a>
                            <span class="pull-right">2017-03-30</span>
                        </li>
                        <li>
                            <a href="javasript:;" class="pull-left">关于智惠系列理财产品和预期年化...</a>
                            <span class="pull-right">2017-03-17</span>
                        </li>
                        <li>
                            <a href="javasript:;" class="pull-left">关于厦门银行存管系统升级维护的...</a>
                            <span class="pull-right">2017-03-15</span>
                        </li>
                        <li>
                            <a href="javasript:;" class="pull-left">关于3月14日01:00-02:00停机维护...</a>
                            <span class="pull-right">2017-03-13</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>


    <script>

    </script>
    <!-- 新闻详情end -->
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