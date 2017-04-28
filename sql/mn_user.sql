-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-28 02:07:27
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money`
--

-- --------------------------------------------------------

--
-- 表的结构 `mn_user`
--

CREATE TABLE `mn_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_phone` varchar(11) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_portrait` varchar(255) DEFAULT '/Home/imgs/user/touxiang.png'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mn_user`
--

INSERT INTO `mn_user` (`id`, `user_name`, `user_phone`, `user_email`, `user_pwd`, `user_portrait`) VALUES
(1, 'admin', '15123456789', NULL, '21232f297a57a5a743894a0e4a801fc3', '/upload/5901e22b678f4.png'),
(2, NULL, NULL, 'admin@qq.com', '21232f297a57a5a743894a0e4a801fc3', '/Home/imgs/user/touxiang.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mn_user`
--
ALTER TABLE `mn_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mn_user`
--
ALTER TABLE `mn_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
