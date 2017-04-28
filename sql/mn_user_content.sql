-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-28 02:08:56
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
-- 表的结构 `mn_user_content`
--

CREATE TABLE `mn_user_content` (
  `user_id` int(11) NOT NULL,
  `user_gender` tinyint(1) DEFAULT NULL,
  `user_birthday` varchar(10) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `user_register` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mn_user_content`
--

INSERT INTO `mn_user_content` (`user_id`, `user_gender`, `user_birthday`, `create_time`, `user_register`) VALUES
(1, 2, '2000-10-17', 1493289955, '2017042718450478271'),
(2, NULL, NULL, 1493290219, '2017042718500491471');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
