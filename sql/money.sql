/*
Navicat MySQL Data Transfer

Source Server         : long
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : money

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-05-02 18:08:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mn_fund
-- ----------------------------
DROP TABLE IF EXISTS `mn_fund`;
CREATE TABLE `mn_fund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fund_code` int(7) NOT NULL COMMENT '基金代码 如 000176',
  `fund_fullname` varchar(255) NOT NULL COMMENT '基金全名',
  `fund_name` varchar(255) NOT NULL COMMENT '基金子名称',
  `fund_type` char(20) DEFAULT NULL COMMENT '如:混合型/股票型',
  `web_productname` varchar(255) DEFAULT NULL COMMENT '富国低碳环保混合',
  `year_profit` varchar(10) DEFAULT '0' COMMENT '近一年收益(单位:元',
  `navunit` varchar(10) DEFAULT NULL COMMENT '累计净值 (单位:元',
  `day_up` varchar(10) DEFAULT NULL COMMENT '日涨幅 (单位: %',
  `threemouth_up` varchar(10) DEFAULT NULL COMMENT '三个月涨幅 单位:%',
  `fund_status` tinyint(4) DEFAULT NULL COMMENT '基金开放状态: 0 关闭 1 开放',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_fund
-- ----------------------------
INSERT INTO `mn_fund` VALUES ('1', '162703', '广发小盘成长混合型证券投资基金(LOF)', '广发小盘成长混合', '混合型', '广发小盘成长混合（LOF）', '8', '1', '0.33', '3.5370', '0', '20050201');
INSERT INTO `mn_fund` VALUES ('2', '270001', '广发聚富开放式证券投资基金', '广发聚富基金', '混合型', '广发聚富混合', '6', '0', '0.08', '3.6959', '0', '20031203');
INSERT INTO `mn_fund` VALUES ('3', '270002', '广发稳健增长开放式证券投资基金', '广发稳健增长', '混合型', '广发稳健增长混合', '2', '1', '-0.25', '3.9238', '0', '20040726');
INSERT INTO `mn_fund` VALUES ('4', '270005', '广发聚丰混合型证券投资基金', '广发聚丰混合', '混合型', '广发聚丰混合', '2', '0', '0.10', '4.9943', '0', '20051223');
INSERT INTO `mn_fund` VALUES ('5', '270006', '广发策略优选混合型证券投资基金', '广发优选基金', '混合型', '广发策略优选混合', '11.56', '1', '-0.37', '3.0269', '0', '20060517');
INSERT INTO `mn_fund` VALUES ('6', '270007', '广发大盘成长混合型证券投资基金', '广发大盘成长', '混合型', '广发大盘成长混合', '2', '1', '-0.48', '1.0861', '0', '20070613');
INSERT INTO `mn_fund` VALUES ('7', '270008', '广发核心精选混合型证券投资基金', '广发核心精选混合', '混合型', '广发核心精选混合', '9', '3', '0.85', '3.4270', '0', '20080716');
INSERT INTO `mn_fund` VALUES ('8', '270021', '广发聚瑞混合型证券投资基金', '广发聚瑞混合', '混合型', '广发聚瑞混合', '4', '1', '-1.15', '1.8060', '0', '20090616');
INSERT INTO `mn_fund` VALUES ('9', '270022', '广发内需增长灵活配置混合型证券投资基金', '广发内需增长', '混合型', '广发内需增长混合', '6', '0', '0.00', '1.0110', '0', '20100419');
INSERT INTO `mn_fund` VALUES ('10', '270025', '广发行业领先混合型证券投资基金', '广发行业领先混合', '混合型', '广发行业领先混合', '3', '1', '0.39', '1.9120', '0', '20101123');
INSERT INTO `mn_fund` VALUES ('11', '270028', '广发制造业精选混合型证券投资基金', '广发制造精选混合', '混合型', '广发制造业精选混合', '11.56', '2', '-0.62', '2.2530', '0', '20110920');
INSERT INTO `mn_fund` VALUES ('12', '270041', '广发消费品精选混合型证券投资基金', '广发消费混合', '混合型', '广发消费品精选混合', '11', '2', '0.45', '2.2510', '0', '20120612');
INSERT INTO `mn_fund` VALUES ('13', '270050', '广发新经济混合型发起式证券投资基金', '广发新经济混合', '混合型', '广发新经济混合', '7', '1', '0.33', '1.8220', '0', '20130206');
INSERT INTO `mn_fund` VALUES ('14', '117', '广发轮动配置混合型证券投资基金', '广发轮动配置混合', '混合型', '广发轮动配置混合', '9', '1', '0.79', '1.6680', '0', '20130528');
INSERT INTO `mn_fund` VALUES ('15', '167', '广发聚优灵活配置混合型证券投资基金', '广发聚优灵活配置', '混合型', '广发聚优灵活配置混合', '8', '1', '0.62', '1.3010', '0', '20130911');
INSERT INTO `mn_fund` VALUES ('16', '529', '广发竞争优势灵活配置混合型证券投资基金', '广发竞争优势混合', '混合型', '广发竞争优势混合', '7', '1', '0.14', '1.4590', '0', '20140312');
INSERT INTO `mn_fund` VALUES ('17', '550', '广发新动力混合型证券投资基金', '广发新动力混合', '混合型', '广发新动力混合', '2', '2', '-0.09', '2.1930', '0', '20140319');
INSERT INTO `mn_fund` VALUES ('18', '567', '广发聚祥灵活配置混合型证券投资基金', '广发聚祥灵活混合', '混合型', '广发聚祥灵活混合', '2', '1', '0.43', '1.6450', '0', '20140321');
INSERT INTO `mn_fund` VALUES ('19', '477', '广发主题领先灵活配置混合型证券投资基金', '广发主题领先混合', '混合型', '广发主题领先混合', '11.56', '1', '-0.37', '1.5950', '0', '20140731');
INSERT INTO `mn_fund` VALUES ('20', '747', '广发逆向策略灵活配置混合型证券投资基金', '广发逆向策略混合', '混合型', '广发逆向策略混合', '11.56', '1', '-0.58', '1.5320', '0', '20140904');
INSERT INTO `mn_fund` VALUES ('21', '1468', '广发改革先锋灵活配置混合型证券投资基金', '广发改革混合', '混合型', '广发改革混合', '-1', '0', '-0.52', '0.7620', '0', '20150727');
INSERT INTO `mn_fund` VALUES ('22', '992', '广发对冲套利定期开放混合型发起式证券投资基金', '广发对冲套利混合', '混合型', '广发对冲套利混合', '11.56', '1', '0.18', '1.1360', '0', '20150206');
INSERT INTO `mn_fund` VALUES ('23', '214', '广发成长优选灵活配置混合型证券投资基金', '广发成长优选混合', '混合型', '广发成长优选混合', '11.56', '1', '0.00', '1.3490', '0', '20131211');
INSERT INTO `mn_fund` VALUES ('24', '215', '广发趋势优选灵活配置混合型证券投资基金', '广发趋势优选混合', '混合型', '广发趋势优选混合', '3', '1', '-0.07', '1.5430', '0', '20130911');
INSERT INTO `mn_fund` VALUES ('25', '1115', '广发聚安混合型证券投资基金', '广发聚安混合A类', '混合型', '广发聚安混合A类', '2', '1', '-0.10', '1.3350', '0', '20150325');
INSERT INTO `mn_fund` VALUES ('26', '1116', '广发聚安混合型证券投资基金', '广发聚安混合C类', '混合型', '广发聚安混合C类', '2', '1', '-0.10', '1.1690', '0', '20150325');
INSERT INTO `mn_fund` VALUES ('27', '1189', '广发聚宝混合型证券投资基金', '广发聚宝混合', '混合型', '广发聚宝混合', '-1', '1', '0.00', '1.0580', '0', '20150409');
INSERT INTO `mn_fund` VALUES ('28', '1207', '广发聚惠灵活配置混合型证券投资基金', '广发聚惠混合C类', '混合型', '广发聚惠混合C类', '-1', '1', '-0.09', '1.1210', '0', '20150415');
INSERT INTO `mn_fund` VALUES ('29', '1206', '广发聚惠灵活配置混合型证券投资基金', '广发聚惠混合A类', '混合型', '广发聚惠混合A类', '-1', '1', '0.00', '1.1080', '0', '20150415');
INSERT INTO `mn_fund` VALUES ('30', '1290', '广发安泰回报混合型证券投资基金', '广发安泰混合', '混合型', '广发安泰混合', '11.56', '1', '-0.09', '1.0600', '0', '20150514');
INSERT INTO `mn_fund` VALUES ('31', '1260', '广发安心回报混合型证券投资基金', '广发安心混合', '混合型', '广发安心混合', '-1', '1', '0.00', '1.0590', '0', '20150514');
INSERT INTO `mn_fund` VALUES ('32', '1353', '广发聚康混合型证券投资基金', '广发聚康混合A类', '混合型', '广发聚康混合A类', '11.56', '1', '0.00', '1.2420', '0', '20150601');
INSERT INTO `mn_fund` VALUES ('33', '1354', '广发聚康混合型证券投资基金', '广发聚康混合C类', '混合型', '广发聚康混合C类', '11.56', '1', '0.00', '1.0470', '0', '20150601');
INSERT INTO `mn_fund` VALUES ('34', '1355', '广发聚泰混合型证券投资基金', '广发聚泰混合A类', '混合型', '广发聚泰混合A类', '2', '1', '0.00', '1.2170', '0', '20150608');
INSERT INTO `mn_fund` VALUES ('35', '1356', '广发聚泰混合型证券投资基金', '广发聚泰混合C类', '混合型', '广发聚泰混合C类', '2', '1', '-0.10', '1.0390', '0', '20150608');
INSERT INTO `mn_fund` VALUES ('36', '510360', '广发沪深300交易型开放式指数证券投资基金', '沪深300ETF', '指数型', '广发沪深300ETF', '4', '1', '-0.48', '1.0671', '0', '20150820');
INSERT INTO `mn_fund` VALUES ('37', '270010', '广发沪深300交易型开放式指数证券投资基金联接基金', '广发300基金联接A类', '指数型', '广发沪深300ETF联接A类', '4', '1', '-0.46', '1.8553', '0', '20081230');
INSERT INTO `mn_fund` VALUES ('38', '2987', '广发沪深300交易型开放式指数证券投资基金联接基金', '广发300基金联接C类', '指数型', '广发沪深300ETF联接C类', '3', '1', '-0.47', '1.5616', '0', '20081230');
INSERT INTO `mn_fund` VALUES ('39', '510510', '广发中证500交易型开放式指数证券投资基金', '中证500ETF', '指数型', '广发中证500ETF', '-1', '1', '-1.00', '1.7538', '0', '20130411');
INSERT INTO `mn_fund` VALUES ('40', '162711', '广发中证500交易型开放式指数证券投资基金联接基金(LOF)', '广发中证500联接', '指数型', '广发中证500ETF联接A类（LOF）', '-1', '1', '-0.96', '1.3376', '0', '20091126');
INSERT INTO `mn_fund` VALUES ('41', '2903', '广发中证500交易型开放式指数证券投资基金联接基金(LOF)', '广发中证500ETF联接C类', '指数型', '广发中证500ETF联接C类', '-1', '1', '-0.96', '1.0756', '0', '20091126');
INSERT INTO `mn_fund` VALUES ('42', '159907', '广发中小板300交易型开放式指数证券投资基金', '中小300', '指数型', '广发中小板300ETF', '-1', '1', '-0.74', '1.2972', '0', '20110603');
INSERT INTO `mn_fund` VALUES ('43', '270026', '广发中小板300交易型开放式指数证券投资基金联接基金', '广发中小联接', '指数型', '广发中小板300ETF联接', '11.56', '1', '-0.71', '1.1816', '0', '20110608');
INSERT INTO `mn_fund` VALUES ('44', '162714', '广发深证100指数分级证券投资基金', '广发深证100分级', '指数型', '广发深证100指数分级', '5', '1', '-0.24', '1.1680', '0', '20120507');
INSERT INTO `mn_fund` VALUES ('45', '150083', '广发深证100指数分级证券投资基金', '广发100稳健收益', '指数型', '广发深证100指数分级A', '-1', '1', '0.01', '1.3031', '0', '20120507');
INSERT INTO `mn_fund` VALUES ('46', '150084', '广发深证100指数分级证券投资基金', '广发100积极收益', '指数型', '广发深证100指数分级B', '10', '1', '-0.49', '1.0327', '0', '20120507');
INSERT INTO `mn_fund` VALUES ('47', '159945', '广发中证全指能源交易型开放式指数证券投资基金', '广发全指能源ETF', '指数型', '广发中证全指能源ETF', '2', '0', '-1.94', '0.7171', '0', '20150625');
INSERT INTO `mn_fund` VALUES ('48', '1460', '广发中证全指能源交易型开放式指数证券投资基金发起式联接基金', '广发能源联接A类', '指数型', '广发中证全指能源ETF联接A类', '-1', '0', '-1.77', '0.8322', '0', '20150709');
INSERT INTO `mn_fund` VALUES ('49', '2973', '广发中证全指能源交易型开放式指数证券投资基金发起式联接基金', '广发能源联接C类', '指数型', '广发中证全指能源ETF联接C类', '-1', '0', '-1.77', '0.8319', '0', '20150709');
INSERT INTO `mn_fund` VALUES ('50', '159944', '广发中证全指原材料交易型开放式指数证券投资基金', '广发全指材料ETF', '指数型', '广发中证全指原材料ETF', '3', '0', '-1.78', '0.8839', '0', '20150625');
INSERT INTO `mn_fund` VALUES ('51', '1459', '广发中证全指原材料交易型开放式指数证券投资基金发起式联接基金', '广发原材料联接A类', '指数型', '广发中证全指原材料ETF联接A类', '-1', '1', '-1.60', '1.0756', '0', '20150818');
INSERT INTO `mn_fund` VALUES ('52', '2975', '广发中证全指原材料交易型开放式指数证券投资基金发起式联接基金', '广发原材料联接C类', '指数型', '广发中证全指原材料ETF联接C类', '-1', '1', '-1.60', '1.0746', '0', '20150818');
INSERT INTO `mn_fund` VALUES ('53', '159946', '广发中证全指主要消费交易型开放式指数证券投资基金', '广发全指消费ETF', '指数型', '广发中证全指主要消费ETF', '3', '1', '-0.72', '1.0290', '0', '20150701');
INSERT INTO `mn_fund` VALUES ('54', '1458', '广发中证全指主要消费交易型开放式指数证券投资基金发起式联接基金', '广发主要消费联接A类', '指数型', '广发中证全指主要消费ETF联接A类', '2', '1', '-0.73', '1.1344', '0', '20150818');
INSERT INTO `mn_fund` VALUES ('55', '2976', '广发中证全指主要消费交易型开放式指数证券投资基金发起式联接基金', '广发主要消费联接C类', '指数型', '广发中证全指主要消费ETF联接C类', '2', '1', '-0.73', '1.1337', '0', '20150818');
INSERT INTO `mn_fund` VALUES ('56', '159936', '广发中证全指可选消费交易型开放式指数证券投资基金', '广发可选消费ETF', '指数型', '广发中证全指可选消费ETF', '2', '1', '-0.55', '1.5797', '0', '20140603');
INSERT INTO `mn_fund` VALUES ('57', '1133', '广发中证全指可选消费交易型开放式指数证券投资基金发起式联接基金', '广发可选消费联接A类', '指数型', '广发中证全指可选消费ETF联接A类', '2', '0', '-0.52', '0.8204', '0', '20150415');
INSERT INTO `mn_fund` VALUES ('58', '2977', '广发中证全指可选消费交易型开放式指数证券投资基金发起式联接基金', '广发可选消费联接C类', '指数型', '广发中证全指可选消费ETF联接C类', '2', '0', '-0.53', '0.8218', '0', '20150415');
INSERT INTO `mn_fund` VALUES ('59', '159938', '广发中证全指医药卫生交易型开放式指数证券投资基金', '广发医药卫生ETF', '指数型', '广发中证全指医药卫生ETF', '11.56', '1', '-0.53', '1.2906', '0', '20141201');
INSERT INTO `mn_fund` VALUES ('60', '1180', '广发中证全指医药卫生交易型开放式指数证券投资基金发起式联接基金', '广发医药卫生联接A类', '指数型', '广发中证全指医药卫生ETF联接A类', '11.56', '0', '-0.49', '0.8044', '0', '20150507');
INSERT INTO `mn_fund` VALUES ('61', '2978', '广发中证全指医药卫生交易型开放式指数证券投资基金发起式联接基金', '广发医药卫生联接C类', '指数型', '广发中证全指医药卫生ETF联接C类', '11.56', '0', '-0.50', '0.8027', '0', '20150507');
INSERT INTO `mn_fund` VALUES ('62', '159940', '广发中证全指金融地产交易型开放式指数证券投资基金', '广发金融地产ETF', '指数型', '广发中证全指金融地产ETF', '-1', '0', '-0.61', '0.8010', '0', '20150323');
INSERT INTO `mn_fund` VALUES ('63', '1469', '广发中证全指金融地产交易型开放式指数证券投资基金发起式联接基金', '广发金融地产联接A类', '指数型', '广发中证全指金融地产ETF联接A类', '11.56', '0', '-0.57', '0.8870', '0', '20150709');
INSERT INTO `mn_fund` VALUES ('64', '2979', '广发中证全指金融地产交易型开放式指数证券投资基金发起式联接基金', '广发金融地产联接C类', '指数型', '广发中证全指金融地产ETF联接C类', '11.56', '0', '-0.57', '0.8876', '0', '20150709');
INSERT INTO `mn_fund` VALUES ('65', '159939', '广发中证全指信息技术交易型开放式指数证券投资基金', '广发信息技术ETF', '指数型', '广发中证全指信息技术ETF', '11.56', '1', '-0.57', '1.0696', '0', '20150108');
INSERT INTO `mn_fund` VALUES ('66', '942', '广发中证全指信息技术交易型开放式指数证券投资基金发起式联接基金', '广发信息技术联接A类', '指数型', '广发中证全指信息技术ETF联接A类', '11.56', '1', '-0.52', '1.0067', '0', '20150129');
INSERT INTO `mn_fund` VALUES ('67', '2974', '广发中证全指信息技术交易型开放式指数证券投资基金发起式联接基金', '广发信息技术联接C类', '指数型', '广发中证全指信息技术ETF联接C类', '11.56', '1', '-0.52', '1.0068', '0', '20150129');
INSERT INTO `mn_fund` VALUES ('68', '502056', '广发中证医疗指数分级证券投资基金', '广发医疗指数分级', '指数型', '广发医疗指数分级', '11.56', '0', '-0.95', '0.6738', '0', '20150723');
INSERT INTO `mn_fund` VALUES ('69', '502057', '广发中证医疗指数分级证券投资基金', '广发医疗指数分级A', '指数型', '广发医疗指数分级A', '-1', '1', '0.01', '1.0980', '0', '20150723');
INSERT INTO `mn_fund` VALUES ('70', '502058', '广发中证医疗指数分级证券投资基金', '广发医疗指数分级B', '指数型', '广发医疗指数分级B', '11.56', '0', '-1.93', '0.2803', '0', '20150723');
INSERT INTO `mn_fund` VALUES ('71', '968', '广发中证养老产业指数型发起式证券投资基金', '广发中证养老指数A类', '指数型', '广发中证养老指数A类', '2', '0', '-0.38', '0.9912', '0', '20150213');
INSERT INTO `mn_fund` VALUES ('72', '2982', '广发中证养老产业指数型发起式证券投资基金', '广发中证养老指数C类', '指数型', '广发中证养老指数C类', '2', '0', '-0.37', '0.9892', '0', '20150213');
INSERT INTO `mn_fund` VALUES ('73', '1064', '广发中证环保产业指数型发起式证券投资基金', '广发中证环保指数A类', '指数型', '广发中证环保指数A类', '3', '0', '-0.20', '0.7881', '0', '20150325');
INSERT INTO `mn_fund` VALUES ('74', '2984', '广发中证环保产业指数型发起式证券投资基金', '广发中证环保指数C类', '指数型', '广发中证环保指数C类', '3', '0', '-0.19', '0.7865', '0', '20150325');
INSERT INTO `mn_fund` VALUES ('75', '826', '广发中证百度百发策略100指数型证券投资基金', '广发百发100A', '指数型', '广发百发100指数A', '2', '0', '-1.14', '1.3170', '0', '20141030');
INSERT INTO `mn_fund` VALUES ('76', '827', '广发中证百度百发策略100指数型证券投资基金', '广发百发100E', '指数型', '广发百发100指数E', '2', '0', '-1.14', '1.3150', '0', '20141030');
INSERT INTO `mn_fund` VALUES ('77', '270004', '广发货币市场基金', '广发货币A级', '货币型', '广发货币A', '11.56', '1', '0.02', '1.0000', '0', '20050520');
INSERT INTO `mn_fund` VALUES ('78', '270014', '广发货币市场基金', '广发货币B级', '货币型', '广发货币B', '11.56', '1', '0.02', '1.0000', '0', '20050520');
INSERT INTO `mn_fund` VALUES ('79', '389', '广发天天红发起式货币市场基金', '广发天天红货币', '货币型', '广发天天红货币A', '11.56', '1', '0.02', '1.0000', '0', '20131022');
INSERT INTO `mn_fund` VALUES ('80', '2183', '广发天天红发起式货币市场基金', '广发天天红B', '货币型', '广发天天红货币B', '11.56', '1', '0.02', '1.0000', '0', '20131022');
INSERT INTO `mn_fund` VALUES ('81', '509', '广发钱袋子货币市场基金', '广发钱袋子货币', '货币型', '广发钱袋子货币', '-1', '1', '0.02', '1.0000', '0', '20140110');
INSERT INTO `mn_fund` VALUES ('82', '475', '广发天天利货币市场基金', '广发天天利货币A', '货币型', '广发天天利货币A', '-1', '1', '0.02', '1.0000', '0', '20140127');
INSERT INTO `mn_fund` VALUES ('83', '476', '广发天天利货币市场基金', '广发天天利货币B', '货币型', '广发天天利货币B', '-1', '1', '0.02', '1.0000', '0', '20140127');
INSERT INTO `mn_fund` VALUES ('84', '1134', '广发天天利货币市场基金', '广发天天利货币E类', '货币型', '广发天天利货币E', '-1', '1', '0.02', '1.0000', '0', '20140127');
INSERT INTO `mn_fund` VALUES ('85', '748', '广发活期宝货币市场基金', '广发活期宝货币A', '货币型', '广发活期宝货币A', '-1', '1', '0.02', '1.0000', '0', '20140828');
INSERT INTO `mn_fund` VALUES ('86', '519858', '广发现金宝场内实时申赎货币市场基金', '广发宝A', '货币型', '广发现金宝A', '-1', '1', '0.02', '1.0000', '0', '20131202');
INSERT INTO `mn_fund` VALUES ('87', '519859', '广发现金宝场内实时申赎货币市场基金', '广发宝B', '货币型', '广发现金宝B', '-1', '1', '0.02', '1.0000', '0', '20131202');
INSERT INTO `mn_fund` VALUES ('88', '511921', '广发货币市场基金', '广发货币E', '货币型', '广发货币E', '11.56', '1', '0.02', '1.0000', '0', '20050520');
INSERT INTO `mn_fund` VALUES ('89', '270023', '广发全球精选股票型证券投资基金', '广发全球精选股票', '海外型', '广发全球精选股票（QDII）', '11', '1', '-0.73', '1.8230', '0', '20100818');
INSERT INTO `mn_fund` VALUES ('90', '270009', '广发增强债券型证券投资基金', '广发强债基金', '债券型', '广发增强债券', '11.56', '1', '0.00', '1.5860', '0', '20080327');
INSERT INTO `mn_fund` VALUES ('91', '906', '广发全球精选股票型证券投资基金', '广发全球精选美元', '海外型', '广发全球精选股票美元（QDII）', '12', '0', '-1.05', '0.2618', '0', '20100818');
INSERT INTO `mn_fund` VALUES ('92', '162712', '广发聚利债券型证券投资基金(LOF)', '广发聚利债券', '债券型', '广发聚利债券（LOF）', '11.56', '1', '-0.07', '1.6670', '0', '20110805');
INSERT INTO `mn_fund` VALUES ('93', '270027', '广发标普全球农业指数证券投资基金', '广发全球农业', '海外型', '广发全球农业指数（QDII）', '-1', '1', '0.60', '1.1780', '0', '20110628');
INSERT INTO `mn_fund` VALUES ('94', '270029', '广发聚财信用债券型证券投资基金', '广发信用债A', '债券型', '广发聚财信用债A', '11.56', '1', '0.00', '1.4700', '0', '20120313');
INSERT INTO `mn_fund` VALUES ('95', '270046', '广发理财30天债券型证券投资基金', '广发理财30天A', '理财型', '广发理财30天A', '-1', '1', '0.02', '1.0000', '0', '20130114');
INSERT INTO `mn_fund` VALUES ('96', '885', '广发标普全球农业指数证券投资基金', '广发全球农业美元', '海外型', '广发全球农业指数美元（QDII）', '-1', '0', '0.29', '0.1711', '0', '20110628');
INSERT INTO `mn_fund` VALUES ('97', '270030', '广发聚财信用债券型证券投资基金', '广发信用债B', '债券型', '广发聚财信用债B', '11.56', '1', '-0.09', '1.4470', '0', '20120313');
INSERT INTO `mn_fund` VALUES ('98', '270047', '广发理财30天债券型证券投资基金', '广发理财30天B', '理财型', '广发理财30天B', '-1', '1', '0.02', '1.0000', '0', '20130114');
INSERT INTO `mn_fund` VALUES ('99', '270043', '广发理财年年红债券型证券投资基金', '广发年年红债券', '债券型', '广发年年红债券', '11.56', '1', '0.00', '1.1840', '0', '20120719');
INSERT INTO `mn_fund` VALUES ('100', '270042', '广发纳斯达克100指数证券投资基金', '广发纳指100', '海外型', '广发纳斯达克100指数（QDII）', '9', '1', '0.00', '1.9590', '0', '20120815');

-- ----------------------------
-- Table structure for mn_fund_detial
-- ----------------------------
DROP TABLE IF EXISTS `mn_fund_detial`;
CREATE TABLE `mn_fund_detial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fund_id` int(11) NOT NULL COMMENT '基金ID 与主表fund的fund_id相关联',
  `user_id` int(11) NOT NULL COMMENT '基金经理 与userid相关联',
  `suggest` varchar(255) DEFAULT NULL COMMENT '介绍',
  `fund_risk` char(2) DEFAULT NULL COMMENT '风险等级( 1.高 2.中 3.低)',
  `fund_number` int(11) DEFAULT NULL COMMENT '投资总人数(替代页面中上的''总规模'')',
  `fund_money` int(11) DEFAULT NULL COMMENT '目前总资产',
  `create_time` int(11) DEFAULT NULL COMMENT '基金建立时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_fund_detial
-- ----------------------------

-- ----------------------------
-- Table structure for mn_fund_people
-- ----------------------------
DROP TABLE IF EXISTS `mn_fund_people`;
CREATE TABLE `mn_fund_people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '与user表的id相关联',
  `fund_id` int(11) NOT NULL COMMENT '与主表的fund_id相关联',
  `createtime` int(11) NOT NULL COMMENT '投资时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_fund_people
-- ----------------------------

-- ----------------------------
-- Table structure for mn_goods
-- ----------------------------
DROP TABLE IF EXISTS `mn_goods`;
CREATE TABLE `mn_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(12,2) NOT NULL,
  `fund_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stauts` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:为交易未完成；1为交易已完成',
  `start_time` int(11) DEFAULT NULL,
  `length_day` int(5) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_goods
-- ----------------------------
INSERT INTO `mn_goods` VALUES ('1', '30.00', '270002', '1', '1', '1493703224', '30', '1496295224');
INSERT INTO `mn_goods` VALUES ('2', '10.00', '270002', '1', '1', '1493704019', '30', '1496296019');
INSERT INTO `mn_goods` VALUES ('3', '100.00', '270002', '1', '1', '1493704086', '30', '1496296086');
INSERT INTO `mn_goods` VALUES ('4', '80.00', '270002', '1', '1', '1493704179', '30', '1496296179');

-- ----------------------------
-- Table structure for mn_project
-- ----------------------------
DROP TABLE IF EXISTS `mn_project`;
CREATE TABLE `mn_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proj_no` int(11) NOT NULL COMMENT '项目编号',
  `proj_total` char(10) DEFAULT NULL COMMENT '融资金额(万元)',
  `proj_lock` varchar(255) DEFAULT NULL COMMENT '锁定期(天)',
  `proj_amount` int(11) DEFAULT NULL COMMENT '目前融资金额(元)',
  `proj_type` int(11) DEFAULT NULL COMMENT '分表:project_type 类型( 1省心宝 2月月增)',
  `create_time` int(11) DEFAULT NULL COMMENT '创建项目的时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_project
-- ----------------------------

-- ----------------------------
-- Table structure for mn_project_type
-- ----------------------------
DROP TABLE IF EXISTS `mn_project_type`;
CREATE TABLE `mn_project_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL COMMENT '与project的字段 proj_type相关联',
  `type_name` char(10) DEFAULT NULL COMMENT '1.省心宝和2.月月增(锁定期恰好等于30天就算是月月增)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_project_type
-- ----------------------------

-- ----------------------------
-- Table structure for mn_proj_borrower
-- ----------------------------
DROP TABLE IF EXISTS `mn_proj_borrower`;
CREATE TABLE `mn_proj_borrower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proj_no` int(11) DEFAULT NULL COMMENT '项目编号',
  `user_id` int(11) DEFAULT NULL COMMENT '借款用户的ID 与user表的id相关联',
  `in_amount` int(11) DEFAULT NULL COMMENT '借款金额(单位:元',
  `create_time` int(11) DEFAULT NULL COMMENT '借款时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_proj_borrower
-- ----------------------------

-- ----------------------------
-- Table structure for mn_proj_moneyman
-- ----------------------------
DROP TABLE IF EXISTS `mn_proj_moneyman`;
CREATE TABLE `mn_proj_moneyman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proj_no` int(11) DEFAULT NULL COMMENT '项目编号与project表的proj_no相关联',
  `user_id` int(11) DEFAULT NULL COMMENT '投资人的ID与user表的user_id关联',
  `in_amount` int(11) DEFAULT NULL COMMENT '投资金额(单位:元',
  `create_time` int(11) DEFAULT NULL COMMENT '投资时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_proj_moneyman
-- ----------------------------

-- ----------------------------
-- Table structure for mn_user
-- ----------------------------
DROP TABLE IF EXISTS `mn_user`;
CREATE TABLE `mn_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_phone` varchar(11) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_portrait` varchar(255) DEFAULT '/Home/imgs/user/touxiang.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_user
-- ----------------------------
INSERT INTO `mn_user` VALUES ('1', 'admin', '15123456789', 'h@qq.com', '21232f297a57a5a743894a0e4a801fc3', '/upload/5904a84d50b1a.jpg');
INSERT INTO `mn_user` VALUES ('2', '杨天德', null, 'admin@qq.com', '21232f297a57a5a743894a0e4a801fc3', '/upload/5904923fefc73.jpg');

-- ----------------------------
-- Table structure for mn_user_bankcard
-- ----------------------------
DROP TABLE IF EXISTS `mn_user_bankcard`;
CREATE TABLE `mn_user_bankcard` (
  `user_id` int(11) NOT NULL,
  `bank_card` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_user_bankcard
-- ----------------------------
INSERT INTO `mn_user_bankcard` VALUES ('1', '0123456789123456789', '与', '13226267239');

-- ----------------------------
-- Table structure for mn_user_content
-- ----------------------------
DROP TABLE IF EXISTS `mn_user_content`;
CREATE TABLE `mn_user_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_gender` tinyint(1) DEFAULT NULL,
  `user_birthday` varchar(10) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `user_register` varchar(30) NOT NULL,
  `user_real_name` varchar(20) DEFAULT NULL,
  `user_id_card` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_user_content
-- ----------------------------
INSERT INTO `mn_user_content` VALUES ('1', '1', '2', '2000-10-17', '1493289955', '2017042718450478271', '蒋含巧', '451031198502275481');
INSERT INTO `mn_user_content` VALUES ('2', '2', '0', '2017-1-1', '1493290219', '2017042718500491471', '谭大达', '548147514745874147');

-- ----------------------------
-- Table structure for mn_user_money
-- ----------------------------
DROP TABLE IF EXISTS `mn_user_money`;
CREATE TABLE `mn_user_money` (
  `user_id` int(11) NOT NULL,
  `money` decimal(12,2) DEFAULT '0.00',
  `trader_pwd` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mn_user_money
-- ----------------------------
INSERT INTO `mn_user_money` VALUES ('1', '99953.00', 'e10adc3949ba59abbe56e057f20f883e');
