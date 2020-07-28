-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2020 at 04:54 PM
-- Server version: 5.5.8-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE IF NOT EXISTS `login_details` (
  `login_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `last_activity` datetime NOT NULL,
  PRIMARY KEY (`login_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`) VALUES
(34, 4, '2020-07-28 04:52:23'),
(35, 3, '2020-07-28 04:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_type` enum('master','user') NOT NULL,
  `user_image` varchar(150) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_type`, `user_image`) VALUES
(1, 'gurleenbindra1999@gmail.com', '12345', 'user', 'pngtree-vector-users-icon-png-image_856952.jpg'),
(2, 'humerashaheen2103@gmail.com', '123456', 'user', 'download.jpg'),
(3, 'eble.hasan@gmail.com', '123', 'master', ''),
(4, 'demo@gmail.com', '1234', 'user', ''),
(5, 'eble.hasan1@gmail.com', '1234', 'master', ''),
(6, 'eble.hasan21@gmail.com', '123', 'user', ''),
(7, 'eble.hasan12@gmail.com', '123', 'user', ''),
(8, 'eble.hasan1212@gmail.com', '123', 'master', ''),
(9, 'eble.hasaasan@gmail.com', '123', 'user', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
