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

            <ul class="nav navbar-nav nav_title col-md-7">
                <li class="<?php is_active(CONTROLLER_NAME,'Index') ?>" hover="1"><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li hover="1" class="dropdown ">
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
                <li class="<?php is_active(CONTROLLER_NAME,'Fund') ?>" hover="1"><a href="<?php echo U('Fund/fundlist');?>"> 基金超市<span>Beta</span></a></li>
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

 
<link rel="stylesheet" href="/ThinkPHP/Public/Home/css/index.css">  
    <script src="/ThinkPHP/Public/Home/js/news.js"></script>
<div class="banner">
    <div class="banner-img carousel slide" id="slidershow" data-ride="carousel">
        <div class="banner-list carousel-inner">
            <img class="item active" src="/ThinkPHP/Public/Home/imgs/01.jpg" alt="">
            <img class="item" src="/ThinkPHP/Public/Home/imgs/02.jpg" alt="">
            <img class="item" src="/ThinkPHP/Public/Home/imgs/03.jpg" alt="">
            <img class="item" src="/ThinkPHP/Public/Home/imgs/04.jpg" alt="">
            <img class="item" src="/ThinkPHP/Public/Home/imgs/05.png" alt="">
            <img class="item" src="/ThinkPHP/Public/Home/imgs/06.jpg" alt="">
        </div>
        <!-- 显示幻灯片数量的容器 -->
        <ul class="carousel-indicators">
            <li data-slide-to="0" class="active" data-target="#slidershow"></li>
            <li data-slide-to="1"  data-target="#slidershow"></li>
            <li data-slide-to="2"  data-target="#slidershow"></li>
            <li data-slide-to="3"  data-target="#slidershow"></li>
            <li data-slide-to="4"  data-target="#slidershow"></li>
            <li data-slide-to="5"  data-target="#slidershow"></li>
        </ul>
    </div>
    <div class="banner-box">
        <div id="login">
            <div class="banner-box-hd">
                <h3>预期年化收益率</h3>
                <p>PPmoney理财预期年化收益率</p>
                <p class="sum">6%~13%</p>
            </div>
            <div class="banner-box-bd">
                <a href="https://www.ppmoney.com/register/" class="btn-reg">注册领红包</a>
                <p class="tips">已有账号？<a href="https://www.ppmoney.com/login/" class="link">立即登录</a></p>
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
        	<a class="data-btn" href="https://www.ppmoney.com/ppcms/help/#url=/introOperateData/operationalreport">详情></a>
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
                <div class="tab-pane fade in active"  id="com_dynamic">
                    <div class=" page-col-5 pull-left">
                        <div>
                            <img src="/ThinkPHP/Public/Home/imgs/00006_20170328183857.jpeg" class="img-responsive">
                        </div>
                    </div>
                    <div class="page-col-5 detail-text  pull-right">
                        <ul>
                            <li>
                                <a>
                                    <strong>PPmoney受邀出席中澳经贸合作论坛</strong>
                                </a>
                                <p>3月24日，李克强总理和特恩布尔总理出席中国澳大利亚首席执行官圆桌会议和中国-澳大利亚经贸合作论坛。此次，PPmoney万惠集团董事长陈宝国也成为中国经贸代表团成员，受邀出席此次论坛。</p>
                            </li>
                            <li>
                                <a href="javascript:;">科技改变世界 PPmoney打造数字普惠超级生态</a>
                            </li>
                            <li>
                                <a href="javascript:;">农业融资迎来春天 PPmoney送金融服务下乡</a>
                            </li>
                        </ul>

                    </div>

                </div>
                <div class="tab-pane detail-text " id="Media_reports">
                    <ul class="date-color">
                        <li>
                            <a href="javascript;:"class="pull-left" ><strong>[网贷天眼]</strong>金融科技驱动未来 PPmoney力拓海外市场</a>
                            <span class="pull-right" > 2017-03-30</span>
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
                            <a href="javascript;:" class="pull-left"><strong>[网贷天眼]</strong>PPmoney胡新：广东网贷管理办法强化投资者教育</a>
                            <span class="pull-right">2017-02-21</span>
                        </li>
                    </ul>

                </div>
                <div class="tab-pane " id="powder_activity">
                    <ul class="">
                        <li class="page-col-5 pull-left">
                            <a href="#" >
                                <img src="/ThinkPHP/Public/Home/imgs/00002_20170227104927.jpeg" alt="" class="img-responsive">
                                <span>PPmoney粉丝见面会在穗举行 共迎存管...</span>
                            </a>
                        </li>
                        <li class="page-col-5 pull-right">
                            <a href="#" >
                                <img src="/ThinkPHP/Public/Home/imgs/00003_20170227104931.jpeg" alt="" class="img-responsive">
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
                            <a href="javasript:;" class="pull-left">关于PP合伙人佣金奖励调整的说明</a>
                            <span class="pull-right">2017-04-14</span>
                        </li>
                        <li>
                            <a href="javasript:;"class="pull-left">关于PPmoney理财2017年清明节放... </a>
                            <span class="pull-right">2017-03-30</span>
                        </li>
                        <li>
                            <a href="javasript:;"class="pull-left">关于智惠系列理财产品和预期年化...</a>
                            <span class="pull-right">2017-03-17</span>
                        </li>
                        <li>
                            <a href="javasript:;"class="pull-left">关于厦门银行存管系统升级维护的...</a>
                            <span class="pull-right">2017-03-15</span>
                        </li>
                        <li>
                            <a href="javasript:;"class="pull-left">关于3月14日01:00-02:00停机维护...</a>
                            <span class="pull-right">2017-03-13</span>
                        </li>
                    </ul>
                </div>

            </div>
    </div>
    </div>
<!-- 新闻详情end -->
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