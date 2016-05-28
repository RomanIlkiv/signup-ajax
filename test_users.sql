-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2015 at 02:17 PM
-- Server version: 5.5.25
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `test_users`
--

CREATE TABLE IF NOT EXISTS `test_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` int(1) NOT NULL,
  `avatar` int(11) NOT NULL,
  `regdate` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `test_users`
--

INSERT INTO `test_users` (`id`, `login`, `email`, `name`, `age`, `country`, `city`, `password`, `gender`, `avatar`, `regdate`) VALUES
(20, 'lol', 'lol@meta.ua', '', 0, '', '', '', 0, 0, 0),
(24, 'fff', 'fff@mail.cu', 'fff', 21, 'fff', 'fff', '343d9040a671c45832ee5381860e2996', 1, 2, 1442406752),
(25, 'aaa', 'asdd@ds.ru', 'aaa', 23, 'aaa', 'aaa', '062f79307a8538ef9c5c6e9d110596ab', 1, 1, 1442406812),
(26, 'sss', 'df@sdfdf.ru', '', 0, '', '', '2fda376604282b894d10779dec939226', 0, 0, 1442406840),
(27, 'bbb', 'bbb@bbb.bbb', 'bbb', 21, 'bbb', 'bbb', 'bb2808e2fcfdac77943987a5df0b35db', 1, 2, 1442408284),
(28, 'fdsf', 'ccc@cc.ua', '', 0, '', '', '13b7c89fc01d9b1b79059381cef4605e', 1, 1, 1442408440),
(29, 'nnn', 'nn@nn.mh', '', 0, '', '', '1849ae4d1b26700d3dda18f507775f0a', 0, 2, 1442408503),
(30, 'roma', 'roma@gmail.com', 'Роман', 22, 'Україна', 'Львів', '3563ba262d531919e14200bd03c91369', 1, 2, 1442410225),
(31, '', '', 'Роман', 0, '', '', '', 0, 0, 0),
(32, 'iii', 'iii@iii.ua', '', 0, '', '', 'd447ee60e71335c39b338a1b41aac7c2', 1, 1, 1442498420),
(33, 'Vynnyk', 'vynnyk@sfsdf.wer', 'Роман', 0, '', '', 'c7717d68d83cc4f2e9ae703221a574b1', 0, 2, 1442504601),
(34, 'Іван', 'sdf@sf.ua', '', 0, '', '', 'a484477d90f65fa7bded53436fbd6b38', 1, 2, 1442506448),
(35, 'jj', 'jj@sdfj.sfd', '', 0, '', '', '8827a5b8c259c2ef15ece11bb5225068', 1, 2, 1442506566),
(36, 'ttt', 'ttt@ffsdtt.sf', '', 0, '', '', '312470a3875e99534d52a1832c99f45b', 0, 2, 1442506780),
(37, 'lolik', 'sdffsd@sdfsdf.sdf', '', 23, '', '', '791814327c2a7aa1f01d45a2b72a8e1e', 1, 2, 1442518730),
(38, 'xxx', 'xxx@xxx.ua', 'xxx', 21, 'xxx', 'xxx', '27964027ff07b65a43c62ace293d568a', 1, 1, 1442571695),
(39, 'gd', 'fff@mail.com', 'dfg', 31, 'dfg', 'dfg', '790032320b3c5c06aca9f353da24ef37', 1, 2, 1442574052);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
