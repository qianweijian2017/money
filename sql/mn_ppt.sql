-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-05-09 09:57:14
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
-- 表的结构 `mn_ppt`
--

CREATE TABLE `mn_ppt` (
  `id` int(2) NOT NULL,
  `pic_path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mn_ppt`
--

INSERT INTO `mn_ppt` (`id`, `pic_path`) VALUES
(1, '/Home/imgs/01.jpg'),
(2, '/Home/imgs/02.jpg'),
(3, '/Home/imgs/03.jpg'),
(4, '/Home/imgs/04.jpg'),
(5, '/Home/imgs/05.jpg'),
(6, '/Home/imgs/06.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
