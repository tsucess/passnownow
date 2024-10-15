-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2024 at 05:28 PM
-- Server version: 5.7.44
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Passnownow`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

-- CREATE TABLE `admins` (
--   `id` int(11) NOT NULL,
--   `unique_id` int(200) NOT NULL,
--   `firstname` tinytext,
--   `lastname` tinytext,
--   `username` tinytext NOT NULL,
--   `contact` varchar(20) NOT NULL,
--   `email` varchar(200) DEFAULT NULL,
--   `userpassword` longtext NOT NULL,
--   `role` varchar(10) NOT NULL DEFAULT 'sadmin',
--   `avatar` varchar(100) NOT NULL DEFAULT 'avatar.png',
--   `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `user_unique_id` int(200) NOT NULL,
  `title` tinytext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_unique_id` int(20) DEFAULT NULL,
  `account_name` varchar(200) DEFAULT NULL,
  `account_no` varchar(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_code` varchar(20) DEFAULT NULL,
  `amount` float NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'review in progress',
  `comment` text NOT NULL,
  `txn_id` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `firstname` varchar(200) DEFAULT 'User',
  `lastname` longtext,
  `username` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `gender` varchar(11) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `nationality` varchar(200) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT 'avatar.png',
  `userpassword` varchar(150) NOT NULL,
  `terms` int(1) DEFAULT '0',
  `role` varchar(10) DEFAULT 'member',
  `referral_code` varchar(200) NOT NULL,
  `verification_token` varchar(100) NOT NULL,
  `is_verified` int(1) NOT NULL DEFAULT '0',
  `user_session_id` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `past question`
--

CREATE TABLE `pastquestions` (
  `id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `subject_id` tinytext NOT NULL,
  `title` tinytext NOT NULL,
  `year` tinytext NOT NULL,
  `link` longtext NOT NULL,
  `author_id` int(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `title` tinytext NOT NULL,
  `link` longtext NOT NULL,
  `author_id` int(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
