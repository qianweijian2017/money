-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-25 07:57:24
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
  `user_pwd` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_phone` varchar(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_recommend_phone` varchar(11) DEFAULT NULL,
  `user_portrait` varchar(255) DEFAULT '/public/Home/imgs/user/touxiang.png'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mn_user`
--

INSERT INTO `mn_user` (`id`, `user_pwd`, `user_name`, `user_phone`, `create_time`, `user_recommend_phone`, `user_portrait`) VALUES
(5, '25f9e794323b453885f5181f1b624d0b', '人居多', '15123456789', 1493106820, '', '/public/Home/imgs/user/touxiang.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
