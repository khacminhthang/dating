-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2019 lúc 01:16 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dating`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(155) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'demo', 'demo', 'bed3482f502c7bbfb6f9fa54f36e77d7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `circle`
--

CREATE TABLE `circle` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `status` enum('discard','pending','blocked','approved') DEFAULT 'pending',
  `is_favourite` enum('no','yes') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `circle`
--

INSERT INTO `circle` (`id`, `member_id`, `friend_id`, `dated`, `status`, `is_favourite`) VALUES
(1, 3, 2, '2016-04-07 08:08:00', 'approved', 'no'),
(2, 3, 1, '2016-04-07 08:08:10', 'approved', 'no'),
(3, 2, 3, '2016-04-07 08:08:27', 'blocked', 'no'),
(4, 1, 3, '2016-04-07 08:12:08', 'blocked', 'no'),
(5, 18, 15, '2016-04-25 02:07:21', 'pending', 'no'),
(6, 1, 8, '2016-04-28 05:44:23', 'blocked', 'no'),
(7, 1, 17, '2016-05-03 00:57:05', 'pending', 'no'),
(8, 1, 2, '2016-05-03 01:05:25', 'blocked', 'yes'),
(9, 1, 16, '2016-05-03 01:47:43', 'pending', 'no'),
(10, 1, 18, '2016-05-03 02:49:31', 'blocked', 'yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('25a762010727453896c68a804ee81cf5', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/79.0.108 Chrome/73.0.3683.10', 1557745895, 'a:10:{s:9:\"user_data\";s:0:\"\";s:4:\"city\";N;s:9:\"member_id\";s:2:\"26\";s:8:\"username\";s:11:\"hongson1998\";s:5:\"photo\";s:16:\"261557746137.jpg\";s:4:\"name\";N;s:13:\"is_user_login\";b:1;s:8:\"admin_id\";s:1:\"1\";s:10:\"admin_name\";s:4:\"demo\";s:14:\"is_admin_login\";b:1;}'),
('2b892ba7681675ce1d92f3b2d513618e', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/79.0.108 Chrome/73.0.3683.10', 1557744485, 'a:4:{s:9:\"user_data\";s:0:\"\";s:8:\"admin_id\";s:1:\"1\";s:10:\"admin_name\";s:4:\"demo\";s:14:\"is_admin_login\";b:1;}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` enum('Female','Male') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `relationship_status` varchar(30) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `life_style` varchar(30) DEFAULT NULL,
  `smoking` enum('No','Yes') DEFAULT NULL,
  `drinking` enum('No','Yes') DEFAULT NULL,
  `education` varchar(50) DEFAULT NULL,
  `about_me` text,
  `photo` varchar(90) DEFAULT NULL,
  `looking_for` enum('Female','Male') DEFAULT NULL,
  `looking_age_from` varchar(25) DEFAULT NULL,
  `looking_age_to` varchar(30) DEFAULT NULL,
  `looking_marital_status` varchar(25) DEFAULT NULL,
  `looking_country` varchar(50) DEFAULT NULL,
  `looking_state` varchar(40) DEFAULT NULL,
  `looking_city` varchar(50) DEFAULT NULL,
  `sts` enum('blocked','inactive','active') DEFAULT 'inactive',
  `verification_code` varchar(100) DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `first_login_date` datetime DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `is_logged_in` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `username`, `password`, `gender`, `dob`, `city`, `state`, `country`, `phone`, `relationship_status`, `marital_status`, `life_style`, `smoking`, `drinking`, `education`, `about_me`, `photo`, `looking_for`, `looking_age_from`, `looking_age_to`, `looking_marital_status`, `looking_country`, `looking_state`, `looking_city`, `sts`, `verification_code`, `dated`, `first_login_date`, `last_login_date`, `is_logged_in`) VALUES
(3, 'son', 'test3@test.com', 'test3', '3eb0b767edcaaa801e388c280c5d4ef4', 'Male', '1989-02-06', 'Sydney', NULL, 'Australia', '123456789', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Middle School', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et libero quis lacus pharetra pretium et eget leo. Fusce a lacus tristique, ultrices velit non, dictum nisi. Vivamus turpis tortor, luctus id accumsan et, aliquet nec metus. Phasellus eleifend ornare tortor, placerat tempor purus ornare a. Phasellus vitae orci maximus dolor dictum vulputate quis a quam. Fusce at erat eu odio gravida convallis vitae ut nisi.', '31460034468.jpg', 'Female', '18', '19', 'Never Married', 'Australia', NULL, 'Sydney', 'active', '11126eabda2030641bedeb69221127e6', '2016-04-07 08:06:11', NULL, '2017-02-18 03:05:58', 0),
(4, 'duy thai', 'test4@test.com', 'test4', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1988-05-08', 'Lipsum', NULL, 'Argentina', '132456789', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Middle School', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et libero quis lacus pharetra pretium et eget leo. Fusce a lacus tristique, ultrices velit non, dictum nisi. Vivamus turpis tortor, luctus id accumsan et, aliquet nec metus. Phasellus eleifend ornare tortor, placerat tempor purus ornare a. Phasellus vitae orci maximus dolor dictum vulputate quis a quam. Fusce at erat eu odio gravida convallis vitae ut nisi.', '41460034982.jpg', 'Female', '18', '19', 'Never Married', 'Argentina', NULL, 'Dolor sit', 'active', '87fdfcbc76f472a7590abf9469f6790e', '2016-04-07 08:14:56', NULL, '2016-04-07 08:15:27', 0),
(5, 'minh dinh', 'test5@test.com', 'test5', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1994-04-08', 'Dummy City', NULL, 'Germany', '123456789', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Middle School', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et libero quis lacus pharetra pretium et eget leo. Fusce a lacus tristique, ultrices velit non, dictum nisi. Vivamus turpis tortor, luctus id accumsan et, aliquet nec metus. Phasellus eleifend ornare tortor, placerat tempor purus ornare a. Phasellus vitae orci maximus dolor dictum vulputate quis a quam. Fusce at erat eu odio gravida convallis vitae ut nisi.', '51460036276.jpg', 'Female', '18', '19', 'Never Married', 'Azerbaijan', NULL, 'Dummy City', 'active', 'f93883c45e48de29f2dc353acc7274bb', '2016-04-07 08:33:05', NULL, '2016-04-07 08:33:48', 0),
(6, 'lan', 'test6@test.com', 'test6', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1986-04-09', 'London', NULL, 'United Kingdom', '123456789', 'Friendship', 'Never Married', 'Very Modern', 'No', 'No', 'Doctorate', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet. Nulla eu nunc dignissim, dignissim nisi vel, dictum lacus. Quisque eget erat dapibus, lobortis tellus sed, facilisis odio. Aenean nec efficitur lacus. Donec eget varius velit, eget sollicitudin ante. Pellentesque ut iaculis urna. Sed pharetra dui vitae ante tristique gravida. Nulla porta suscipit purus, nec auctor lectus sollicitudin quis. Nunc et ullamcorper lorem, et convallis enim. Aenean non cursus urna. In risus nibh, feugiat vel feugiat rutrum, iaculis eget erat.', '61460631990.jpg', 'Female', '18', '25', 'Never Married', 'United Kingdom', NULL, 'London', 'active', '2ddad12c7bec42c2aae5223bcb4b038b', '2016-04-14 06:03:56', NULL, '2016-05-31 12:24:46', 0),
(7, 'duy hoa', 'test7@test.com', 'test7', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1990-02-07', 'Dummy City', NULL, 'Cyprus', '123456789', 'Married', 'Never Married', 'Very Modern', 'No', 'No', 'Masters', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet.', '71460632322.jpg', 'Female', '18', '27', 'Never Married', 'Cyprus', NULL, 'Dummy City', 'active', '69d1c3c8c80e0217d378cca15e4044ef', '2016-04-14 06:10:13', NULL, '2016-04-14 06:11:00', 0),
(8, 'duy hiep', 'test8@test.com', 'test8', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1994-04-11', 'Lipsum', NULL, 'Zimbabwe', '123456789', 'Dating', 'Never Married', 'Modern', 'No', 'No', 'Bachelors', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet.', '81460632452.jpg', 'Female', '18', '19', 'Never Married', 'Zimbabwe', NULL, 'Lipsum', 'inactive', '563efe98574bfb8cbb6c88ed0608dee1', '2016-04-14 06:12:57', NULL, '2016-04-14 06:13:16', 0),
(9, 'nam phuong', 'test9@test.com', 'test9', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1993-05-06', 'Lipsum', NULL, 'American Samoa', '123456789', 'Married', 'Never Married', 'Modern', 'No', 'No', 'Masters', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet.', '91460632605.jpg', 'Male', '18', '31', 'Never Married', 'American Samoa', NULL, 'Lipsum', 'active', 'fb65096ea98c0fbd33a60170de6925a4', '2016-04-14 06:15:25', NULL, '2016-04-14 06:15:54', 0),
(10, 'nam nhat', 'test10@test.com', 'test10', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1990-09-13', 'Bombay', NULL, 'India', '123456798', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Bachelors', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet.', '101460633268.jpg', 'Female', '18', '19', 'Never Married', 'India', NULL, 'Dehli', 'active', '46937b8aabe907ab90272c6dbe78c9e8', '2016-04-14 06:26:17', NULL, '2016-04-14 06:27:01', 0),
(11, 'nam phong', 'test11@test.com', 'test11', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1990-05-04', 'Lipsum', NULL, 'Argentina', '1234567', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Bachelors', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet.', '111460633761.jpg', 'Female', '18', '19', 'Never Married', 'Argentina', NULL, 'Lipsum', 'active', '96a9213b745e53f619d17688874d595f', '2016-04-14 06:34:48', NULL, '2016-04-14 06:35:08', 0),
(12, 'van anh', 'test12@test.com', 'test12', 'cc03e747a6afbbcbf8be7668acfebee5', 'Female', '1995-04-06', 'Lipsum', NULL, 'Brazil', '123456789', 'Dating', 'Never Married', 'Modern', 'No', 'No', 'Masters', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet.', '121460633907.jpg', 'Male', '18', '19', 'Never Married', 'Brazil', NULL, 'Dummy City', 'active', '3e42bb59ad7ae888c52b86ebb1337371', '2016-04-14 06:37:22', NULL, '2016-04-14 06:37:40', 0),
(13, 'lan ngoc', 'test13@test123.com', 'test13', 'cc03e747a6afbbcbf8be7668acfebee5', 'Female', '1991-05-07', 'Dummy City', NULL, 'Germany', '123456789', 'Friendship', 'Never Married', 'Very Modern', 'No', 'No', 'Middle School', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet.', '131460633998.jpg', 'Female', '18', '19', 'Never Married', 'Afganistan', NULL, 'Lipsum', 'active', 'a0d2ee1465eb4dbdd48c155393cf345c', '2016-04-14 06:39:08', NULL, '2016-04-14 06:39:22', 0),
(14, 'ha thanh', 'test14@test14.com', 'test14', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1991-05-24', 'Lipsum', NULL, 'Algeria', '123456789', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Middle School', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet.', '141460634320.jpg', 'Female', '18', '19', 'Never Married', 'Algeria', NULL, 'Lipsum', 'active', 'f5359b4cfd4a44c5819d2094ef76c274', '2016-04-14 06:41:11', NULL, '2016-04-14 06:44:43', 0),
(15, 'lan anh', 'test15@test15.com', 'test15', 'cc03e747a6afbbcbf8be7668acfebee5', 'Female', '1995-05-22', 'Lipsum', NULL, 'Andorra', '123456798', 'Dating', 'Never Married', 'Simple', 'No', 'No', 'Bachelors', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet.', '151460634747.jpg', 'Male', '18', '19', 'Never Married', 'Angola', NULL, 'Dummy City', 'active', '710838e1c0863dc1e3a00a0b3c5b8301', '2016-04-14 06:51:11', NULL, '2016-04-14 06:51:48', 0),
(16, 'duy phuc', 'test16@test.com', 'test16', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1995-05-10', 'Lipsum', NULL, 'Australia', '123456789', 'Friendship', 'Never Married', 'Very Modern', 'Yes', 'Yes', 'Bachelors', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel pulvinar dui, id consequat lorem. Nullam efficitur felis nec dolor mattis porta. Mauris vulputate, lorem venenatis vehicula dapibus, lectus augue rutrum nisi, eget facilisis nulla erat nec nibh. Maecenas neque nibh, ornare a suscipit ac, ullamcorper vitae erat. Nunc at mauris sit amet ante lacinia vestibulum. Nam euismod lacus vitae interdum pellentesque. In congue, mauris in suscipit pellentesque, orci ex convallis arcu, nec fringilla purus mi a ipsum. Fusce varius, tortor eu interdum porttitor, nulla felis consectetur urna, vitae pharetra est tellus ac massa. Etiam vitae nunc eget lacus pulvinar facilisis. Nunc fermentum condimentum cursus. Integer quis nisi at odio convallis sollicitudin ac non sem.', '161461567521.jpg', 'Female', '18', '19', 'Never Married', 'Australia', NULL, 'Dummy City', 'active', '2bd748446bacfff02138e1d5c2530252', '2016-04-25 01:45:40', NULL, '2016-04-25 01:55:35', 0),
(17, 'ngo ba kha', 'test17@test.com', 'test17', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1995-05-10', 'Lipsum', NULL, 'Argentina', '123456789', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Masters', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel pulvinar dui, id consequat lorem. Nullam efficitur felis nec dolor mattis porta. Mauris vulputate, lorem venenatis vehicula dapibus, lectus augue rutrum nisi, eget facilisis nulla erat nec nibh. Maecenas neque nibh, ornare a suscipit ac, ullamcorper vitae erat. Nunc at mauris sit amet ante lacinia vestibulum. Nam euismod lacus vitae interdum pellentesque. In congue, mauris in suscipit pellentesque, orci ex convallis arcu, nec fringilla purus mi a ipsum. Fusce varius, tortor eu interdum porttitor, nulla felis consectetur urna, vitae pharetra est tellus ac massa. Etiam vitae nunc eget lacus pulvinar facilisis. Nunc fermentum condimentum cursus. Integer quis nisi at odio convallis sollicitudin ac non sem.', '171461567800.jpg', 'Female', '18', '19', 'Never Married', 'Argentina', NULL, 'Dummy City', 'active', '7d847816a87e19de07030396c4dc7916', '2016-04-25 01:59:32', NULL, '2016-04-25 02:02:09', 0),
(18, 'huan hoa hong', 'test18@test.com', 'test18', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1995-05-10', 'Lipsum', NULL, 'Algeria', '123456789', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Masters', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel pulvinar dui, id consequat lorem. Nullam efficitur felis nec dolor mattis porta. Mauris vulputate, lorem venenatis vehicula dapibus, lectus augue rutrum nisi, eget facilisis nulla erat nec nibh. Maecenas neque nibh, ornare a suscipit ac, ullamcorper vitae erat. Nunc at mauris sit amet ante lacinia vestibulum. Nam euismod lacus vitae interdum pellentesque. In congue, mauris in suscipit pellentesque, orci ex convallis arcu, nec fringilla purus mi a ipsum. Fusce varius, tortor eu interdum porttitor, nulla felis consectetur urna, vitae pharetra est tellus ac massa. Etiam vitae nunc eget lacus pulvinar facilisis. Nunc fermentum condimentum cursus. Integer quis nisi at odio convallis sollicitudin ac non sem.', '181461568013.jpg', 'Male', '18', '19', 'Never Married', 'Algeria', NULL, 'Dummy City', 'active', 'b745099043ec7081dc73f9eaf61d7c7c', '2016-04-25 02:04:04', NULL, '2016-04-25 02:04:20', 0),
(20, 'dung ha dong', 'test20@test.com', 'test20', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '1988-05-07', 'Lipsum', NULL, 'Armenia', '123456789', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Masters', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel pulvinar dui, id consequat lorem. Nullam efficitur felis nec dolor mattis porta. Mauris vulputate, lorem venenatis vehicula dapibus, lectus augue rutrum nisi, eget facilisis nulla erat nec nibh. Maecenas neque nibh, ornare a suscipit ac, ullamcorper vitae erat. Nunc at mauris sit amet ante lacinia vestibulum. Nam euismod lacus vitae interdum pellentesque. In congue, mauris in suscipit pellentesque, orci ex convallis arcu, nec fringilla purus mi a ipsum. Fusce varius, tortor eu interdum porttitor, nulla felis consectetur urna, vitae pharetra est tellus ac massa.', '201461569260.jpg', 'Female', '18', '19', 'Never Married', 'Armenia', NULL, 'Dummy City', 'active', '0227ba537cd8be84b19d961f5286627d', '2016-04-25 02:25:49', NULL, '2016-04-25 02:26:35', 0),
(21, 'duong minh tuyen', 'fghdfg@ergsdgsd.com', 'test1', '62cc2d8b4bf2d8728120d052163a77df', 'Male', '1952-03-02', 'fddsfsdf', NULL, 'Belize', '36427247', 'Dating', 'Divorced', 'Mid Level', 'Yes', 'Yes', 'Bachelors', 'fdsfds', '3831480791305.jpg', 'Male', '18', '19', 'Divorced', 'Russia', NULL, 'hhh', 'active', 'ea5ec017615fa82256437bab8fbb1c1c', '2016-10-22 12:29:37', NULL, '2017-02-21 11:11:39', 0),
(22, 'son tung mtp', 'testguy@gmail.com', 'testguy', 'cc03e747a6afbbcbf8be7668acfebee5', 'Male', '2016-01-06', '', NULL, 'USA', '', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Middle School', '', '1482088806.png', 'Female', '18', '19', 'Never Married', 'USA', NULL, 'stet', 'active', '7481f32d588f362e34d66c6ce74f1cf6', '2016-12-18 11:54:19', NULL, '2017-02-18 02:24:26', 1),
(23, NULL, 'manbq68@gmail.com', 'manbq68', '5590d55e8101664d4209abe747753049', 'Male', '1968-01-17', NULL, NULL, 'Vietnam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, 'active', '1b41bda2fd73656b0d8b0ccebf4464a6', '2017-02-20 08:05:02', '2017-02-20 08:05:41', '2017-02-20 08:05:51', 0),
(25, NULL, 'test@test.com', 'test123', '7630acaf769895e3cf33087841d0ac91', 'Male', '1966-10-18', NULL, NULL, 'Austria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, 'inactive', 'cc517268b88e464ba1ab230ad5958f1a', '2017-02-21 10:57:42', NULL, NULL, 0),
(26, 'le hong son', 'hongson1998@gmail.com', 'hongson1998', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '2000-02-19', 'ha noi', NULL, 'Vietnam', '0123456666', 'Dating', 'Never Married', 'Very Modern', 'No', 'No', 'Middle School', 'tml', '261557746137.jpg', 'Female', '18', '19', 'Never Married', 'Vietnam', NULL, 'ha noi', 'active', NULL, '2019-05-13 12:48:05', NULL, '2019-05-13 13:10:42', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `members_albums`
--

CREATE TABLE `members_albums` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(30) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `members_albums`
--

INSERT INTO `members_albums` (`album_id`, `album_name`, `mem_id`, `date_created`) VALUES
(1, 'Work', 4, '2016-04-07 08:18:34'),
(2, 'First Album', 1, '2016-04-28 05:28:53'),
(3, 'Second Album', 1, '2016-04-28 05:29:04'),
(4, 'third album', 1, '2016-04-28 05:29:17'),
(5, 'sdfsgdgh', 1, '2016-05-03 03:34:59'),
(6, 'FFFFFFFFFF', 1, '2016-05-03 03:44:40'),
(7, 'novo', 1, '2016-05-03 07:56:00'),
(8, 'fhj', 1, '2016-05-06 10:52:11'),
(9, '<script>window.location.href =', 1, '2016-05-19 09:09:42'),
(10, 'dfdf', 1, '2016-05-19 09:09:56'),
(11, 'khh', 12, '2016-05-23 10:32:51'),
(12, '', 2, '2016-05-31 06:41:34'),
(13, 'hn', 2, '2016-05-31 06:46:35'),
(14, 'aaa', 2, '2016-05-31 10:35:57'),
(15, 'Test', 19, '2016-06-17 12:57:11'),
(16, 'roko', 23, '2016-07-13 03:01:57'),
(17, 'cvbc', 24, '2016-07-13 10:09:41'),
(18, 'hhh', 2, '2016-07-28 02:51:40'),
(19, 'Test', 26, '2016-07-28 19:04:59'),
(20, 'ssf', 2, '2016-07-29 11:39:49'),
(21, 'test', 2, '2016-08-23 15:27:03'),
(22, 'sfdf', 2, '2016-08-30 06:00:43'),
(23, 'aaaaaaa', 2, '2016-08-30 06:01:45'),
(24, '', 23, '2016-10-22 18:34:49'),
(25, 'aa', 23, '2016-10-22 19:35:09'),
(26, 'bbvcb', 23, '2016-10-27 09:18:34'),
(27, '', 24, '2016-10-27 22:37:27'),
(28, 'fgh', 23, '2016-11-18 00:51:33'),
(29, 'test', 23, '2016-11-18 15:23:23'),
(30, 'testing yeah', 23, '2016-12-12 19:12:38'),
(31, 'geek', 23, '2016-12-16 04:17:47'),
(32, 'ggg', 23, '2016-12-29 13:55:44'),
(33, 'ok', 26, '2017-02-20 08:07:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `members_gallery`
--

CREATE TABLE `members_gallery` (
  `image_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `org_photo` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `members_gallery`
--

INSERT INTO `members_gallery` (`image_id`, `mem_id`, `org_photo`, `date_added`, `album_id`) VALUES
(3, 4, '41460035095.jpg', '2016-04-07 08:18:15', 0),
(4, 4, '41460035125.jpg', '2016-04-07 08:18:45', 1),
(5, 4, '41460035132.jpg', '2016-04-07 08:18:52', 1),
(11, 1, '11462265105.jpg', '2016-05-03 03:45:05', 6),
(12, 1, '11462275973.jpg', '2016-05-03 06:46:13', 6),
(13, 1, '11462280186.jpg', '2016-05-03 07:56:26', 7),
(16, 1, '11463052811.jpg', '2016-05-12 06:33:31', 0),
(18, 1, 'fofo2.php', '2016-05-19 09:10:09', 10),
(19, 1, 'zzz.html', '2016-05-19 09:10:18', 10),
(20, 12, '1291464017586.jpg', '2016-05-23 10:33:06', 11),
(21, 2, '21464389763.jpg', '2016-05-27 17:56:03', 0),
(22, 2, '21464708976.jpg', '2016-05-31 10:36:16', 14),
(23, 2, '21464708993.jpg', '2016-05-31 10:36:33', 14),
(25, 2, '21465734475.jpg', '2016-06-12 07:27:56', 14),
(27, 19, '1901466186282.jpg', '2016-06-17 12:58:03', 15),
(28, 2, '21466337969.jpg', '2016-06-19 07:06:09', 0),
(30, 26, '2621469750962.jpg', '2016-07-28 19:09:22', 19),
(31, 2, '21469810395.jpg', '2016-07-29 11:39:55', 20),
(32, 2, '21470816913.jpg', '2016-08-10 03:15:13', 0),
(33, 2, '21472206674.gif', '2016-08-26 05:17:54', 0),
(34, 2, '21472554855.jpg', '2016-08-30 06:00:55', 22),
(35, 2, '21472554916.jpg', '2016-08-30 06:01:56', 23),
(36, 2, '21472554917.jpg', '2016-08-30 06:01:57', 23),
(37, 2, '21477121687.jpg', '2016-10-22 02:34:47', 13),
(38, 23, '3831477198489.jpg', '2016-10-22 23:54:49', 25),
(39, 23, '3831477199520.png', '2016-10-23 00:12:00', 0),
(40, 23, '3831477600769.jpg', '2016-10-27 15:39:29', 0),
(41, 24, '4461477625856.jpg', '2016-10-27 22:37:36', 0),
(42, 23, '3831477654573.jpg', '2016-10-28 06:36:13', 0),
(43, 23, '3831477965353.jpg', '2016-10-31 20:55:53', 25),
(44, 23, '3831478034677.gif', '2016-11-01 16:11:17', 0),
(45, 23, '3831478034876.jpg', '2016-11-01 16:14:36', 0),
(46, 24, '4751478180325', '2016-11-03 08:38:45', 0),
(47, 23, '3831479102892.jpg', '2016-11-13 23:54:52', 0),
(48, 23, '3831479300810.png', '2016-11-16 06:53:30', 0),
(50, 23, '3831479946644.png', '2016-11-23 18:17:24', 25),
(51, 25, '5441480187466', '2016-11-26 13:11:06', 0),
(52, 25, '5731481210871', '2016-12-08 09:27:51', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_messages`
--

CREATE TABLE `users_messages` (
  `messages_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_send` datetime NOT NULL,
  `msg_status` enum('read','unread') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users_messages`
--

INSERT INTO `users_messages` (`messages_id`, `sender_id`, `reciever_id`, `message`, `date_send`, `msg_status`) VALUES
(6, 1, 14, 'siemka', '2016-05-03 03:23:54', 'unread'),
(9, 1, 3, 'hi', '2016-05-03 06:00:19', 'unread'),
(10, 1, 19, 'hi', '2016-05-03 06:00:26', 'unread'),
(11, 1, 14, 'hi', '2016-05-03 06:00:33', 'unread');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `circle`
--
ALTER TABLE `circle`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `members_albums`
--
ALTER TABLE `members_albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Chỉ mục cho bảng `members_gallery`
--
ALTER TABLE `members_gallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Chỉ mục cho bảng `users_messages`
--
ALTER TABLE `users_messages`
  ADD PRIMARY KEY (`messages_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `circle`
--
ALTER TABLE `circle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=627;

--
-- AUTO_INCREMENT cho bảng `members_albums`
--
ALTER TABLE `members_albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `members_gallery`
--
ALTER TABLE `members_gallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `users_messages`
--
ALTER TABLE `users_messages`
  MODIFY `messages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
