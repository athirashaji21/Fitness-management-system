-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2021 at 07:25 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

DROP TABLE IF EXISTS `admin_tb`;
CREATE TABLE IF NOT EXISTS `admin_tb` (
  `user_name` varchar(15) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`user_name`, `pwd`) VALUES
('admin', 'admin321');

-- --------------------------------------------------------

--
-- Table structure for table `dietplan_details`
--

DROP TABLE IF EXISTS `dietplan_details`;
CREATE TABLE IF NOT EXISTS `dietplan_details` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `member_id` int(20) NOT NULL,
  `trainer_id` int(20) NOT NULL,
  `diet_id` int(20) NOT NULL,
  `diet_name` varchar(20) NOT NULL,
  `diet_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `trainer_id` (`trainer_id`),
  KEY `diet_id` (`diet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dietplan_details`
--

INSERT INTO `dietplan_details` (`id`, `member_id`, `trainer_id`, `diet_id`, `diet_name`, `diet_date`) VALUES
(8, 6, 4, 3, 'weight loss', '2021-12-02'),
(9, 6, 4, 4, 'keto diet', '2021-12-01'),
(11, 7, 3, 4, 'keto diet', '2021-12-02'),
(12, 7, 3, 3, 'weight loss', '2021-12-03'),
(13, 6, 3, 4, 'keto diet', '2021-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `diet_details`
--

DROP TABLE IF EXISTS `diet_details`;
CREATE TABLE IF NOT EXISTS `diet_details` (
  `diet_id` int(20) NOT NULL AUTO_INCREMENT,
  `diet_name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`diet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet_details`
--

INSERT INTO `diet_details` (`diet_id`, `diet_name`, `description`) VALUES
(3, 'weight loss', 'shfshgfhsgdfshgf'),
(4, 'keto diet', 'gsfhasgdfhasgdf'),
(5, 'sugar cut', 'for intense fat loss');

-- --------------------------------------------------------

--
-- Table structure for table `membership_plan`
--

DROP TABLE IF EXISTS `membership_plan`;
CREATE TABLE IF NOT EXISTS `membership_plan` (
  `plan_id` int(50) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(20) NOT NULL,
  `period` varchar(20) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_plan`
--

INSERT INTO `membership_plan` (`plan_id`, `plan_name`, `period`, `amount`) VALUES
(1, 'prime_year', '9 months', 20000),
(5, 'half year', '6 months', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `member_attendence`
--

DROP TABLE IF EXISTS `member_attendence`;
CREATE TABLE IF NOT EXISTS `member_attendence` (
  `serial_no` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`serial_no`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_attendence`
--

INSERT INTO `member_attendence` (`serial_no`, `date`, `time`, `member_id`) VALUES
(51, '2021-12-01', '10:45:29', 6),
(52, '2021-12-04', '01:27:00', 6),
(53, '2021-12-02', '22:48:00', 6),
(54, '2021-12-03', '01:51:00', 6),
(55, '2021-12-03', '01:51:00', 6),
(56, '2021-12-04', '22:55:00', 6),
(57, '2021-12-02', '21:32:00', 7),
(58, '2021-12-02', '22:30:00', 7),
(59, '2021-12-07', '23:22:00', 7),
(60, '2021-12-03', '00:29:00', 6),
(61, '2021-12-03', '02:16:00', 7),
(62, '2021-12-03', '02:17:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `member_details`
--

DROP TABLE IF EXISTS `member_details`;
CREATE TABLE IF NOT EXISTS `member_details` (
  `member_id` int(255) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `gender` text NOT NULL,
  `age` int(2) UNSIGNED NOT NULL,
  `address` varchar(50) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`member_id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_details`
--

INSERT INTO `member_details` (`member_id`, `f_name`, `l_name`, `phone_no`, `gender`, `age`, `address`, `height`, `weight`, `plan_id`) VALUES
(6, 'akhila', 'SHAJI', '8156884820', 'f', 24, 'dgjhdgjhgjshgjhsgjhsgjhgjhg', 12, 12, 1),
(7, 'thrishna', 'suresh', '2545856585', 'f', 20, 'hgfhgfh', 160, 50, NULL),
(10, 'clair', 'brown', '7898456585', 'f', 20, 'changambuzha', 160, 50, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_login_details`
--

DROP TABLE IF EXISTS `member_login_details`;
CREATE TABLE IF NOT EXISTS `member_login_details` (
  `member_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_login_details`
--

INSERT INTO `member_login_details` (`member_id`, `member_pwd`) VALUES
(4, 'pass'),
(6, 'akhila123'),
(7, 'thrishna123'),
(8, 'mem123'),
(9, 'mem123'),
(10, 'mem');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

DROP TABLE IF EXISTS `payment_details`;
CREATE TABLE IF NOT EXISTS `payment_details` (
  `payment_id` int(20) NOT NULL AUTO_INCREMENT,
  `member_id` int(20) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `member_id`, `amount`, `date`) VALUES
(3, 7, 100000, '2021-12-01'),
(4, 6, 20000, '2021-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_attendence`
--

DROP TABLE IF EXISTS `trainer_attendence`;
CREATE TABLE IF NOT EXISTS `trainer_attendence` (
  `serial_no` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `trainer_id` int(10) NOT NULL,
  PRIMARY KEY (`serial_no`),
  KEY `trainer_id` (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer_attendence`
--

INSERT INTO `trainer_attendence` (`serial_no`, `date`, `time`, `trainer_id`) VALUES
(16, '2021-12-07', '21:58:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `trainer_details`
--

DROP TABLE IF EXISTS `trainer_details`;
CREATE TABLE IF NOT EXISTS `trainer_details` (
  `trainer_id` int(255) NOT NULL,
  `trainer_name` varchar(20) NOT NULL,
  `gender` text NOT NULL,
  `trainer_add` varchar(255) NOT NULL,
  `availability_status` tinyint(1) DEFAULT NULL,
  `phone_no` varchar(10) NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer_details`
--

INSERT INTO `trainer_details` (`trainer_id`, `trainer_name`, `gender`, `trainer_add`, `availability_status`, `phone_no`) VALUES
(3, 'AKHIL', 'm', 'EDAPALLY,KOCHI', 1, '8974785845'),
(4, 'JITHIN RAMDAS', 'm', 'MANAKKAT HOUSE EDAPALLY ,KOCHI', 1, '9685741425'),
(10, 'KIRAN O V', 'm', 'CHIRAKKAL', 1, '7485962536');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_login_details`
--

DROP TABLE IF EXISTS `trainer_login_details`;
CREATE TABLE IF NOT EXISTS `trainer_login_details` (
  `trainer_id` int(10) NOT NULL AUTO_INCREMENT,
  `trainer_pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer_login_details`
--

INSERT INTO `trainer_login_details` (`trainer_id`, `trainer_pwd`) VALUES
(3, 'tr123'),
(4, 'tr2'),
(5, 'manu'),
(6, 'manu'),
(7, 'manu'),
(8, 're321'),
(9, 're321'),
(10, 'akhil@123');

-- --------------------------------------------------------

--
-- Table structure for table `workoutplan_details`
--

DROP TABLE IF EXISTS `workoutplan_details`;
CREATE TABLE IF NOT EXISTS `workoutplan_details` (
  `plan_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  `workout_name` varchar(25) NOT NULL,
  `workout_date` date NOT NULL,
  PRIMARY KEY (`plan_id`),
  KEY `member_id` (`member_id`),
  KEY `trainer_id` (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workoutplan_details`
--

INSERT INTO `workoutplan_details` (`plan_id`, `member_id`, `trainer_id`, `workout_name`, `workout_date`) VALUES
(5, 6, 3, 'cardio', '2021-12-07'),
(6, 6, 3, 'cardio', '2021-12-03'),
(7, 6, 4, 'cardio', '2021-12-02'),
(8, 6, 4, 'cardio', '2021-12-03'),
(9, 7, 10, 'keto adv', '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `workout_details`
--

DROP TABLE IF EXISTS `workout_details`;
CREATE TABLE IF NOT EXISTS `workout_details` (
  `workout_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`workout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workout_details`
--

INSERT INTO `workout_details` (`workout_id`, `name`, `description`) VALUES
(2, 'cardio', 'for heart'),
(3, 'keto advanced', 'for fat loss');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dietplan_details`
--
ALTER TABLE `dietplan_details`
  ADD CONSTRAINT `dietplan_details_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member_login_details` (`member_id`),
  ADD CONSTRAINT `dietplan_details_ibfk_2` FOREIGN KEY (`trainer_id`) REFERENCES `trainer_login_details` (`trainer_id`),
  ADD CONSTRAINT `dietplan_details_ibfk_3` FOREIGN KEY (`diet_id`) REFERENCES `diet_details` (`diet_id`);

--
-- Constraints for table `member_attendence`
--
ALTER TABLE `member_attendence`
  ADD CONSTRAINT `member_attendence_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member_login_details` (`member_id`);

--
-- Constraints for table `member_details`
--
ALTER TABLE `member_details`
  ADD CONSTRAINT `member_details_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `membership_plan` (`plan_id`),
  ADD CONSTRAINT `member_id` FOREIGN KEY (`member_id`) REFERENCES `member_login_details` (`member_id`);

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member_login_details` (`member_id`);

--
-- Constraints for table `trainer_attendence`
--
ALTER TABLE `trainer_attendence`
  ADD CONSTRAINT `trainer_attendence_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `trainer_login_details` (`trainer_id`);

--
-- Constraints for table `trainer_details`
--
ALTER TABLE `trainer_details`
  ADD CONSTRAINT `trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainer_login_details` (`trainer_id`);

--
-- Constraints for table `workoutplan_details`
--
ALTER TABLE `workoutplan_details`
  ADD CONSTRAINT `workoutplan_details_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member_login_details` (`member_id`),
  ADD CONSTRAINT `workoutplan_details_ibfk_2` FOREIGN KEY (`trainer_id`) REFERENCES `trainer_login_details` (`trainer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
