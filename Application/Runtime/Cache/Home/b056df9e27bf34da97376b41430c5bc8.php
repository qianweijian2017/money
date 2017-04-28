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


<link rel="stylesheet" href="/Public/Home/css/information.css">

<div class="search-box">
    <div class="search-com">
        <form action="">
            <input type="text" id="getSearchValue" class="search-input" name="searchKey" value="" placeholder="请输入问题关键词，如“充值”">
            <input type="button" class="btn search-btn" value="搜索">
        </form>
    </div>
</div>
<div class="information-box">
    <div class="info-title">信息披露</div>
    <div class="information-left">
        <ul class="infor-list nav nav-tabs">
            <li class="infor-item">
                <i class="fa fa-caret-down"></i>
                <span class="item-title">关于我们</span>
                <ul class="item-box">
                    <li class="active"><a href="#profile" data-toggle="tab">公司简介</a></li>
                    <li><a href="#jbxx" data-toggle="tab">基本信息</a></li>
                    <li><a href="#team" data-toggle="tab">管理团队</a></li>
                    <li><a href="#investor" data-toggle="tab">投资方</a></li>
                    <li><a href="#certificate" data-toggle="tab">资质证书</a></li>
                    <li><a href="#bank" data-toggle="tab">银行存管</a></li>
                </ul>
            </li>
            <li class="infor-item">
                <i class="fa fa-caret-down"></i>
                <span class="item-title">对外公告</span>
                <ul class="item-box">
                    <li><a href="#report" data-toggle="tab">定期报告</a></li>
                    <li><a href="#audit" data-toggle="tab">审计报告</a></li>
                    <li><a href="#important" data-toggle="tab">重大事项</a></li>
                </ul>
            </li>
            <li class="infor-item">
                <i class="fa fa-caret-down"></i>
                <span class="item-title">业务介绍</span>
                <ul class="item-box">
                    <li><a href="#xiaofei" data-toggle="tab">消费金融</a></li>
                    <li><a href="#car" data-toggle="tab">汽车金融</a></li>
                    <li><a href="#san" data-toggle="tab">三农金融</a></li>
                </ul>
            </li>
            <li class="infor-item">
                <i class="fa fa-caret-right"></i>
                <span class="item-title">运营数据</span>
                <ul class="item-box">
                    <li><a href="">运营数据</a></li>
                    <li><a href="">运营报告</a></li>
                </ul>
            </li>
            <li class="infor-item">
                <i class="fa fa-caret-down"></i>
                <span class="item-title">安全保障</span>
                <ul class="item-box">
                    <li><a href="">风控流程</a></li>
                    <li><a href="">交易安全险</a></li>
                </ul>
            </li>
            <li class="infor-item">
                <i class="fa fa-caret-down"></i>
                <span class="item-title">企业文化</span>
                <ul class="item-box">
                    <li><a href="">公司荣誉</a></li>
                    <li><a href="">大事记</a></li>
                    <li><a href="">合作机构</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <!--公司简介-->
        <div class="information-right tab-pane active" id="profile">
            <div class="info-ban"></div>
            <div class="info-com">
                <h1 class="com-title">人民财富惠人民</h1>
                <p class="com-intro">PPmoney理财是中国互联网金融行业中专注于消费金融的领导平台。平台于2012年12月正式上线，由PPmoney万惠集团（中国领先的普惠金融科技集团）旗下全资子公司运营。PPmoney理财借助云计算、移动支付和大数据等先进互联网技术，调剂投资者和融资者的资金融通，满足双方的投融资需求，最终实现多方共赢。</p>
                <p class="com-intro">自平台创立之初，PPmoney理财就以“人民财富惠人民”为宗旨，结合多年的资产管理服务和风险控制经验，不断为投融资双方提供安全、高效、个性化的互联网金融服务。通过平台提供的信息中介服务，既解决了融资者融资难、成本高的问题，也为广大投资者创造了实实在在的财富价值。目前，PPmoney理财的注册投资者已超过1100万，解决了数十万中小微企业和个人的融资需求，真正实践着互联网金融在中国的普惠之道。</p>
                <p class="com-intro">当前，PPmoney理财已经登陆资本市场，进入了规范化运营的新阶段。接下来，平台围绕“产品分类、用户分层、智能推送、全球配置”的经营思路，向更安全、更全面、更智能的综合型互联网金融平台迈进，打造独具特色的互联网金融生态圈，竭诚为用户提供多元化、个性化的普惠金融服务。</p>
                <h1 class="com-title">办公环境</h1>
                <div class="com-img"></div>
            </div>
        </div>
        <!--基本信息-->
        <div class="information-right tab-pane" id="jbxx">
            <div class="info-ban-base"></div>
            <div class="info-com">
                <h1 class="com-title">基本资料</h1>
                <table class="gridtable">
                    <tbody>
                    <tr class="firstRow">
                        <td>全称及简称</td>
                        <td style="word-break: break-all;">万惠投资管理有限公司（简称：PPmoney理财）</td>
                    </tr>
                    <tr>
                        <td>注册／实缴资本</td>
                        <td>人民币：1亿五千万元整
                            <a href="https://special.ppmoney.com/pphelp/upload/1.pdf" target="_blank">点击查看验资报告</a>
                        </td>
                    </tr>
                    <tr>
                        <td>注册地址</td>
                        <td>广州市天河区体育西路153号602房</td>
                    </tr>
                    <tr>
                        <td>成立时间</td>
                        <td>2012年3月14日</td>
                    </tr>
                    <tr>
                        <td>法定代表人</td>
                        <td>陈宝国</td>
                    </tr>
                    <tr>
                        <td>经营范围</td>
                        <td>商务服务业</td>
                    </tr>
                    <tr>
                        <td>网站或平台地址</td>
                        <td>www.ppmoney.com</td>
                    </tr>
                    <tr>
                        <td>平台名称</td>
                        <td>PPmoney理财</td>
                    </tr>
                    <tr>
                        <td>平台上线运营时间</td>
                        <td>2012年12月12日</td>
                    </tr>
                    </tbody>
                </table>
                <h1 class="com-title">股权结构</h1>
                <div class="guquan"></div>
                <h1 class="com-title">组织机构</h1>
                <div class="zuzhi"></div>
                <h1 class="com-title">员工情况</h1>
                <p class="com-text">目前公司总人数超过500人，主要以学识、激情和创造力均处最佳状态的80、90后为主力，推动着PPmoney的快速成长。</p>
                <div class="peo01"></div>
                <p class="com-text text2">其中技术人员超过150人，平均年龄27岁，70%以上的团队成员拥有本科或本科以上学历</p>
                <div class="peo02"></div>
                <h1 class="com-title">联系我们</h1>
                <div class="contact-box">
                    <span class="title">万惠投资管理有限公司</span>
                    <p class="sub-title">PPmoney万惠互联网金融平台</p>
                    <div class="contacts">
                        <p>公司地址：广州市天河区体育西路153号新天河大厦2、3、6、10、14楼</p>
                        <p>邮政编码： 510620</p>
                        <p>公司总机： 020-37796666</p>
                    </div>
                </div>
                <div class="contact-box">
                    <span class="title">万惠投资管理有限公司北京办事处</span>
                    <p class="sub-title">&nbsp;</p>
                    <div class="contacts">
                        <p>地址：北京市海淀区 中关村大街19号 &nbsp;新中关大厦北翼B座6层605</p>
                        <p>邮政编码： 100080</p>
                        <p>联系电话： 010-85870288</p>
                    </div>
                </div>
            </div>
        </div>
        <!--管理团队-->
        <div class="information-right tab-pane" id="team">
            <div class="info-ban-team"></div>
            <div class="info-com">


            </div>
        </div>
        <!--投资方-->
        <div class="information-right tab-pane" id="investor">
            <div class="info-ban-investor"></div>
            <div class="info-com">


            </div>
        </div>
        <!--资质证书-->
        <div class="information-right tab-pane" id="certificate">
            <div class="info-ban-certificate"></div>
            <div class="info-com">


            </div>
        </div>
        <!--银行存管-->
        <div class="information-right tab-pane" id="bank">
            <img src="/Public/Home/imgs/bank01.png" alt="">
            <img src="/Public/Home/imgs/bank02.png" alt="">
            <img src="/Public/Home/imgs/bank03.png" alt="">
            <img src="/Public/Home/imgs/bank04.png" alt="">
            <img src="/Public/Home/imgs/bank05.png" alt="">
            <img src="/Public/Home/imgs/bank06.png" alt="">
        </div>
        <!--定期报告-->
        <div class="information-right tab-pane" id="report">
            <div class="info-ban-report">
                <div class="rep-tit">定期报告</div>
            </div>
            <div class="info-com">


            </div>
        </div>
        <!--审计报告-->
        <div class="information-right tab-pane" id="audit">
            <div class="info-ban-report">
                <div class="rep-tit">审计报告</div>
            </div>
            <div class="info-com">


            </div>
        </div>
        <!--重大事项-->
        <div class="information-right tab-pane" id="important">
            <div class="info-ban-report">
                <div class="rep-tit">重大事项</div>
            </div>
            <div class="info-com">
                <table class="gridtable">
                    <tbody>
                    <tr class="firstRow">
                        <td>合并、分立、解散或者申请破产</td>
                        <td style="word-break: break-all;">无</td>
                    </tr>
                    <tr>
                        <td>从业机构受到刑事处罚</td>
                        <td>无</td>
                    </tr>
                    <tr>
                        <td>从业机构受到重大行政处罚</td>
                        <td>无</td>
                    </tr>
                    <tr>
                        <td>重大诉讼或者仲裁事项</td>
                        <td>无</td>
                    </tr>
                    <tr>
                        <td>实际控制人与持股 5%以上的股东、董事、监事、高级管理人员<br>的变更信息</td>
                        <td>持股 5%以上的股东变更：<br>
                            无<br>董事、监事变更：<br>无<br>高级管理 人员变更：<br>无<br></td>
                    </tr>
                    <tr>
                        <td>实际控制人与持股 5%以上的股东、董事、监事、高级管理人员涉及的<br>重大诉讼、仲裁事项或者重大行政处罚</td>
                        <td>无</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--消费金融-->
        <div class="information-right tab-pane" id="xiaofei">
            <div class="info-ban-xiao">
            </div>
            <div class="info-com">
            </div>
        </div>
        <!--汽车金融-->
        <div class="information-right tab-pane" id="car">
            <div class="info-ban-car">
            </div>
            <div class="info-com">
            </div>
        </div>
        <!--三农金融-->
        <div class="information-right tab-pane" id="san">
            <div class="info-ban-san">
            </div>
            <div class="info-com">
            </div>
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