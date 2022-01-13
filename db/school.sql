-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2018 at 04:57 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `status`, `date`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'active', '2016-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `application_master`
--

CREATE TABLE `application_master` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_master`
--

INSERT INTO `application_master` (`id`, `name`) VALUES
(1, 'Bonafide Certificate'),
(2, 'Leaving Certificate'),
(3, 'Marks Memo Certificate'),
(4, 'Nirgam Uttara'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `application_request`
--

CREATE TABLE `application_request` (
  `arid` int(11) NOT NULL,
  `application_for` varchar(200) NOT NULL,
  `application_description` text CHARACTER SET utf8 NOT NULL,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `received_date` date NOT NULL,
  `app_status` enum('pending','approved','cancel','received') NOT NULL,
  `medium` enum('english','marathi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_request`
--

INSERT INTO `application_request` (`arid`, `application_for`, `application_description`, `sid`, `pid`, `class`, `division`, `create_date`, `received_date`, `app_status`, `medium`) VALUES
(1, 'Bonafide Certificate', 'I want need bonafide certificate', 0, 1, '7', 'D', '2017-10-04', '0000-00-00', 'pending', 'english'),
(2, 'Bonafide Certificate', 'dadsfsafdsaf', 7, 1, '7', 'D', '2017-10-04', '2018-01-20', 'received', 'marathi'),
(3, 'Marks Memo Certificate', 'zxxcxczxcvxz', 7, 1, '7', 'D', '2017-10-04', '0000-00-00', 'cancel', 'english'),
(4, 'Nirgam Uttara', 'i want need nigram uttara', 7, 1, '7', 'D', '2017-12-17', '2018-01-20', 'received', 'marathi'),
(5, 'Leaving Certificate', 'i want leaving certificate', 7, 1, '7', 'D', '2017-12-19', '2018-06-30', 'received', 'marathi'),
(6, 'Leaving Certificate', 'i want leaving certificate', 7, 1, '7', 'D', '2018-01-03', '2018-01-21', 'received', 'marathi'),
(7, 'Marks Memo Certificate', 'go', 7, 1, '7', 'D', '2018-01-03', '0000-00-00', 'pending', 'english'),
(8, 'Leaving Certificate', 'i want need to my student list', 9, 1, '7', 'D', '2018-01-17', '2018-01-20', 'received', 'english'),
(9, 'Bonafide Certificate', 'leaving certificate', 9, 1, '7', 'D', '2018-01-17', '2018-01-20', 'received', 'english'),
(10, 'Nirgam Uttara', 'application list', 9, 1, '7', 'D', '2018-01-17', '2018-02-22', 'received', 'english'),
(11, 'Bonafide Certificate', 'hello', 23, 1, '7', 'D', '2018-02-22', '2018-02-22', 'received', 'english'),
(12, 'Leaving Certificate', 'asdfasf', 42, 1, '3', 'A', '2018-02-23', '2018-02-23', 'received', 'english'),
(13, 'Nirgam Uttara', 'godd', 42, 1, '3', 'A', '2018-02-23', '2018-02-23', 'received', 'marathi'),
(14, 'Bonafide Certificate', 'bonafied', 14, 1, '5', '1', '2018-03-13', '2018-03-13', 'received', 'english');

-- --------------------------------------------------------

--
-- Table structure for table `caste_master`
--

CREATE TABLE `caste_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caste_master`
--

INSERT INTO `caste_master` (`id`, `name`) VALUES
(1, 'Christan'),
(2, 'Islam'),
(3, 'Hindu'),
(4, 'Buddh'),
(5, 'Sikh'),
(6, 'Jain');

-- --------------------------------------------------------

--
-- Table structure for table `cast_master`
--

CREATE TABLE `cast_master` (
  `cid` int(11) NOT NULL,
  `cast_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cast_master`
--

INSERT INTO `cast_master` (`cid`, `cast_name`) VALUES
(1, 'OPEN'),
(2, 'OBC'),
(3, 'VJ(A)'),
(4, 'NT(A)'),
(5, 'NT(B)'),
(6, 'NT(C)'),
(7, 'SC'),
(8, 'ST'),
(9, 'SBC');

-- --------------------------------------------------------

--
-- Table structure for table `child_master`
--

CREATE TABLE `child_master` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `yid` int(11) NOT NULL,
  `date1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_master`
--

INSERT INTO `child_master` (`id`, `pid`, `yid`, `date1`) VALUES
(1, 1, 3, '2017-08-11'),
(2, 1, 4, '2017-08-15'),
(3, 1, 5, '2017-08-25'),
(4, 1, 6, '2018-12-26'),
(5, 1, 7, '2018-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `day_master`
--

CREATE TABLE `day_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day_master`
--

INSERT INTO `day_master` (`id`, `name`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `divison_master`
--

CREATE TABLE `divison_master` (
  `dmid` int(11) NOT NULL,
  `divison_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divison_master`
--

INSERT INTO `divison_master` (`dmid`, `divison_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'None'),
(7, '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE `exam_master` (
  `exid` int(11) NOT NULL,
  `exam_name` text NOT NULL,
  `pid` int(11) NOT NULL,
  `class` text NOT NULL,
  `division` text NOT NULL,
  `created_date` date NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`exid`, `exam_name`, `pid`, `class`, `division`, `created_date`, `year`) VALUES
(1, 'First Term Examination', 1, '7', 'D', '2017-09-12', 2017),
(3, 'Unit Test', 1, '3', 'B', '2018-05-14', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`id`, `name`) VALUES
(1, 'Unit Test'),
(2, 'First Term Examination'),
(3, 'Second Term Examination');

-- --------------------------------------------------------

--
-- Table structure for table `exam_type_master`
--

CREATE TABLE `exam_type_master` (
  `emid` int(11) NOT NULL,
  `day` text NOT NULL,
  `subject` text NOT NULL,
  `exam_date` date NOT NULL,
  `subject_code` int(11) NOT NULL,
  `time_from` text NOT NULL,
  `time_to` text NOT NULL,
  `exid` int(11) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type_master`
--

INSERT INTO `exam_type_master` (`emid`, `day`, `subject`, `exam_date`, `subject_code`, `time_from`, `time_to`, `exid`, `create_date`) VALUES
(7, 'Monday', 'English', '2017-10-26', 1001, '10:00 am', '1:00 pm', 1, '2017-09-16'),
(8, 'Tuesday', 'Hindi', '2017-10-03', 1002, '10:00 am', '1:00 pm', 1, '2017-09-16'),
(9, 'Wednesday', 'Marathi', '2017-10-04', 1003, '10:00 am', '1:00 pm', 1, '2017-09-16'),
(10, 'Thursday', 'Mathmetics', '2017-10-05', 1004, '10:00 am', '1:00 pm', 1, '2017-09-16'),
(11, 'Friday', 'Science', '2017-10-06', 1005, '10:00 am', '1:00 pm', 1, '2017-09-16'),
(13, 'Monday', 'Marathi', '2017-09-16', 1006, '10:00 am', '1:00 pm', 1, '2017-09-16'),
(15, 'Monday', 'marathi', '2018-05-14', 1001, '10:00 am', '10:00 am', 3, '2018-05-14'),
(16, 'Wednesday', 'hindi', '2018-05-14', 1002, '10:00 am', '12:00 am', 3, '2018-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `gender_master`
--

CREATE TABLE `gender_master` (
  `id` int(11) NOT NULL,
  `name` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender_master`
--

INSERT INTO `gender_master` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `leaving_certificate`
--

CREATE TABLE `leaving_certificate` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `student_behavior` varchar(250) CHARACTER SET utf8 NOT NULL,
  `schools_leaving_date` varchar(250) CHARACTER SET utf8 NOT NULL,
  `schools_leaving_year` varchar(250) CHARACTER SET utf8 NOT NULL,
  `schools_leaving_reason` varchar(250) CHARACTER SET utf8 NOT NULL,
  `schools_shera` varchar(250) CHARACTER SET utf8 NOT NULL,
  `student_performance` varchar(250) CHARACTER SET utf8 NOT NULL,
  `sub_caste` varchar(250) CHARACTER SET utf8 NOT NULL,
  `created_date` date NOT NULL,
  `leaving_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaving_certificate`
--

INSERT INTO `leaving_certificate` (`id`, `parent_id`, `pid`, `request_id`, `student_behavior`, `schools_leaving_date`, `schools_leaving_year`, `schools_leaving_reason`, `schools_shera`, `student_performance`, `sub_caste`, `created_date`, `leaving_no`) VALUES
(1, 2147483647, 1, 8, 'changli', '10.01.2018', '2017', 'पुढील वर्ग नसल्यामुळे', 'good', 'good', 'banjara', '2018-01-20', 1),
(2, 2147483647, 1, 6, 'समाधानकारक', '17.01.2018', '2017', 'पुढील वर्ग नसल्यामुळे', '5 उतीर्ण', 'चांगली', 'बंजारा', '2018-01-21', 2),
(3, 2147483647, 1, 12, 'good', '09.02.2018', '2017', 'next school', 'good', 'good', '', '2018-02-23', 710224),
(4, 2147483647, 1, 5, 'good', '05.06.2018', '2017', 'next school not available', 'good', 'Good', '', '2018-06-30', 705808);

-- --------------------------------------------------------

--
-- Table structure for table `medium_master`
--

CREATE TABLE `medium_master` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medium_master`
--

INSERT INTO `medium_master` (`id`, `name`) VALUES
(1, 'Marathi'),
(2, 'Semi English'),
(3, 'General'),
(4, 'English'),
(5, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `month_master`
--

CREATE TABLE `month_master` (
  `mid` int(11) NOT NULL,
  `month` varchar(6) NOT NULL,
  `month_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month_master`
--

INSERT INTO `month_master` (`mid`, `month`, `month_name`) VALUES
(1, '01', 'Jan'),
(2, '02', 'Feb'),
(3, '03', 'Mar'),
(4, '04', 'Apr'),
(5, '05', 'May'),
(6, '06', 'Jun'),
(7, '07', 'July'),
(8, '08', 'Aug'),
(9, '09', 'Sep'),
(10, '10', 'Oct'),
(11, '11', 'Nov'),
(12, '12', 'Dec');

-- --------------------------------------------------------

--
-- Table structure for table `nigram_uttara`
--

CREATE TABLE `nigram_uttara` (
  `id` int(11) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `sub_caste` varchar(250) CHARACTER SET utf8 NOT NULL,
  `student_performance` varchar(200) CHARACTER SET utf8 NOT NULL,
  `student_behavior` varchar(200) CHARACTER SET utf8 NOT NULL,
  `schools_leaving_date` varchar(100) NOT NULL,
  `schools_leaving_reason` varchar(200) CHARACTER SET utf8 NOT NULL,
  `schools_shera` varchar(300) CHARACTER SET utf8 NOT NULL,
  `nirgam_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nigram_uttara`
--

INSERT INTO `nigram_uttara` (`id`, `parent_id`, `pid`, `request_id`, `created_date`, `sub_caste`, `student_performance`, `student_behavior`, `schools_leaving_date`, `schools_leaving_reason`, `schools_shera`, `nirgam_no`) VALUES
(1, 454545442323, 1, 4, '2018-01-20', 'बंजारा', 'चांगली', 'समाधानकारक', '10.01.2018', 'पुढील वर्ग नसल्यामुळे', 'good', 1),
(2, 343434231289, 1, 10, '2018-02-22', 'बंजारा', 'चांगली', 'समाधानकारक', '10.01.2018', 'no', '5 उतीर्ण', 2),
(3, 546323436545, 1, 13, '2018-02-23', '', 'good', 'good', '01.02.2018', 'next school', 'good', 705924);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `notification_description` text CHARACTER SET utf8 NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `date1` datetime NOT NULL,
  `notification_type` enum('common','individual') NOT NULL,
  `pid` int(11) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `division` varchar(20) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `adhar_card` varchar(100) NOT NULL,
  `roll_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nid`, `sid`, `notification_description`, `status`, `date1`, `notification_type`, `pid`, `class_name`, `division`, `student_name`, `adhar_card`, `roll_no`) VALUES
(2, 7, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin ', 'active', '2017-08-28 17:31:05', 'individual', 1, '7', 'D', 'hello', '454545442323', '1002'),
(3, 7, 'शुभ प्रभात', 'active', '2017-10-01 08:02:33', 'individual', 1, '7', 'D', 'hello', '454545442323', '1002'),
(4, 7, 'माझ्या छान जीवनात सतीश माझा सर्वात चांगला मित्र', 'active', '2017-10-01 18:51:57', 'individual', 1, '7', 'D', 'hello', '454545442323', '1002'),
(5, 7, 'i comming is there i will come', 'active', '2017-10-05 17:38:51', 'individual', 1, '7', 'D', 'hello', '454545442323', '1002'),
(6, 0, 'Good New for you', 'active', '2017-12-22 17:22:53', 'common', 1, '7', 'D', '', '', ''),
(7, 0, 'Goood Morning All of you', 'active', '2017-12-22 18:00:56', 'common', 1, '', 'D', '', '', ''),
(8, 7, 'dsdfasdf', 'active', '2018-02-24 06:39:11', 'individual', 1, '7', 'D', '???? ???????? ???', '454545442323', '1002');

-- --------------------------------------------------------

--
-- Table structure for table `notification_admin`
--

CREATE TABLE `notification_admin` (
  `nid` int(11) NOT NULL,
  `notification_name` text CHARACTER SET utf8 NOT NULL,
  `pid` int(11) NOT NULL,
  `date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_admin`
--

INSERT INTO `notification_admin` (`nid`, `notification_name`, `pid`, `date`, `expiry_date`) VALUES
(3, 'दिवाळीचा पहिला दिवा लागता दारी,\r\nसुखाचे किरण येती घरी,\r\nपुर्ण होवोत तुमच्या सर्व ईच्छा, \r\nआमच्याकडुन दिवाळीच्या हार्दिक शुभेच्छा!...', 0, '2017-10-03', '2018-05-16'),
(4, 'Notfication Tested', 0, '2018-05-10', '2018-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `notification_master`
--

CREATE TABLE `notification_master` (
  `nid` int(11) NOT NULL,
  `notification_name` varchar(500) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_master`
--

INSERT INTO `notification_master` (`nid`, `notification_name`, `pid`, `date`, `start_date`, `expiry_date`) VALUES
(2, 'The app server builds a downstream message request from these fundamental components: the target, the message options, and the payload. These components are common between the GCM HTTP and XMPP connection server protocols. 1 	The app server builds a downstream message request from these fundamental components: the target, the message options, and the payload. These components are common between the GCM HTTP and XMPP connection server protocols.', 1, '2017-08-16', '2017-11-28', '2019-05-11'),
(3, '1 	The app server builds a downstream message request from these fundamental components: the target, the message options, and the payload. These components are common between the GCM HTTP and XMPP connection server protocols.', 1, '2018-07-18', '2018-07-18', '2018-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `result_master`
--

CREATE TABLE `result_master` (
  `rmid` int(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `division` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `exam_name` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `create_date` date NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_master`
--

INSERT INTO `result_master` (`rmid`, `class`, `division`, `pid`, `exam_name`, `parent_id`, `year`, `create_date`, `status`, `month`) VALUES
(1, '7', 'D', 1, 'Unit Test', 7, 2017, '2017-09-18', 'active', '09'),
(2, '7', 'D', 1, 'First Term Examination', 8, 2017, '2017-09-19', 'active', '09'),
(3, '7', 'D', 1, 'Unit Test', 7, 2017, '2017-11-02', 'active', '11'),
(4, '7', 'D', 1, 'Unit Test', 8, 2017, '2017-11-02', 'active', '11'),
(5, '7', 'D', 1, 'Unit Test', 9, 2017, '2017-11-02', 'active', '11'),
(6, '7', 'D', 1, 'Unit Test', 20, 2017, '2017-11-02', 'active', '11'),
(7, '7', 'D', 1, 'Unit Test', 21, 2017, '2017-11-02', 'active', '11'),
(8, '7', 'D', 1, 'Unit Test', 22, 2017, '2017-11-02', 'active', '11'),
(9, '7', 'D', 1, 'Unit Test', 23, 2017, '2017-11-02', 'active', '11'),
(10, '7', 'D', 1, 'First Term Examination', 0, 2018, '2018-05-17', 'active', '05'),
(11, '7', 'D', 1, 'Unit Test', 0, 2018, '2018-05-17', 'active', '05'),
(12, '7', 'D', 1, 'Unit Test', 0, 2018, '2018-06-13', 'active', '06'),
(13, '7', 'D', 1, 'Unit Test', 7, 2018, '2018-06-13', 'active', '06'),
(14, '7', 'D', 1, 'Unit Test', 9, 2018, '2018-06-13', 'active', '06'),
(15, '7', 'D', 1, 'Unit Test', 21, 2018, '2018-06-13', 'active', '06'),
(16, '7', 'D', 1, 'Unit Test', 22, 2018, '2018-06-13', 'active', '06'),
(17, '7', 'D', 1, 'Unit Test', 23, 2018, '2018-06-13', 'active', '06'),
(18, '7', 'D', 1, 'Unit Test', 24, 2018, '2018-06-13', 'active', '06'),
(19, '7', 'D', 1, 'Unit Test', 32, 2018, '2018-06-13', 'active', '06'),
(20, '7', 'D', 1, 'Unit Test', 33, 2018, '2018-06-13', 'active', '06'),
(21, '7', 'D', 1, 'Unit Test', 34, 2018, '2018-06-13', 'active', '06'),
(22, '7', 'D', 1, 'Unit Test', 35, 2018, '2018-06-13', 'active', '06'),
(23, '7', 'D', 1, 'Unit Test', 36, 2018, '2018-06-13', 'active', '06'),
(24, '7', 'D', 1, 'Unit Test', 37, 2018, '2018-06-13', 'active', '06'),
(25, '7', 'D', 1, 'Unit Test', 38, 2018, '2018-06-13', 'active', '06'),
(26, '7', 'D', 1, 'Unit Test', 39, 2018, '2018-06-13', 'active', '06'),
(27, '7', 'D', 1, 'Unit Test', 40, 2018, '2018-06-13', 'active', '06'),
(28, '7', 'D', 1, 'Unit Test', 48, 2018, '2018-06-13', 'active', '06');

-- --------------------------------------------------------

--
-- Table structure for table `result_subject_marks`
--

CREATE TABLE `result_subject_marks` (
  `rsmid` int(11) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `maximum_marks` int(11) NOT NULL,
  `minmum_marks` int(11) NOT NULL,
  `obtained_marks` int(11) NOT NULL,
  `rmid` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_subject_marks`
--

INSERT INTO `result_subject_marks` (`rsmid`, `subject_name`, `maximum_marks`, `minmum_marks`, `obtained_marks`, `rmid`, `created_date`, `status`) VALUES
(1, 'Marathi', 20, 7, 12, 1, '2017-09-18', 'active'),
(2, 'English', 20, 7, 13, 1, '2017-09-18', 'active'),
(3, 'Hindi', 20, 7, 12, 1, '2017-09-18', 'active'),
(4, 'Math', 20, 7, 16, 1, '2017-09-18', 'active'),
(5, 'Science', 20, 7, 18, 1, '2017-09-18', 'active'),
(6, 'History', 20, 7, 19, 1, '2017-09-18', 'active'),
(7, 'marathi', 100, 35, 20, 2, '2017-09-19', 'active'),
(8, 'english', 100, 35, 40, 2, '2017-09-19', 'active'),
(9, 'hindi', 100, 35, 60, 2, '2017-09-19', 'active'),
(10, 'social science', 100, 35, 45, 2, '2017-09-19', 'active'),
(11, 'History', 100, 35, 46, 2, '2017-09-19', 'active'),
(12, 'Marathi', 100, 40, 67, 3, '2017-11-02', 'active'),
(13, 'Marathi', 100, 40, 45, 4, '2017-11-02', 'active'),
(14, 'Marathi', 100, 40, 63, 5, '2017-11-02', 'active'),
(15, 'Marathi', 100, 40, 46, 6, '2017-11-02', 'active'),
(16, 'Marathi', 100, 40, 67, 7, '2017-11-02', 'active'),
(17, 'Marathi', 100, 40, 67, 8, '2017-11-02', 'active'),
(19, 'English', 100, 40, 80, 3, '2017-11-02', 'active'),
(20, 'English', 100, 40, 45, 4, '2017-11-02', 'active'),
(21, 'English', 100, 40, 46, 5, '2017-11-02', 'active'),
(22, 'English', 100, 40, 65, 6, '2017-11-02', 'active'),
(23, 'English', 100, 40, 34, 7, '2017-11-02', 'active'),
(24, 'English', 100, 40, 27, 8, '2017-11-02', 'active'),
(26, 'Hindi', 100, 40, 23, 3, '2017-11-04', 'active'),
(27, 'Hindi', 100, 40, 45, 4, '2017-11-04', 'active'),
(28, 'Hindi', 100, 40, 33, 5, '2017-11-04', 'active'),
(29, 'Hindi', 100, 40, 33, 6, '2017-11-04', 'active'),
(30, 'Hindi', 100, 40, 33, 7, '2017-11-04', 'active'),
(31, 'Hindi', 100, 40, 33, 8, '2017-11-04', 'active'),
(33, 'History', 100, 40, 23, 3, '2017-11-04', 'active'),
(34, 'History', 100, 40, 45, 4, '2017-11-04', 'active'),
(35, 'History', 100, 40, 33, 5, '2017-11-04', 'active'),
(36, 'History', 100, 40, 33, 6, '2017-11-04', 'active'),
(37, 'History', 100, 40, 33, 7, '2017-11-04', 'active'),
(38, 'History', 100, 40, 33, 8, '2017-11-04', 'active'),
(40, 'Math', 100, 40, 23, 3, '2017-11-04', 'active'),
(41, 'Math', 100, 40, 45, 4, '2017-11-04', 'active'),
(42, 'Math', 100, 40, 44, 5, '2017-11-04', 'active'),
(43, 'Math', 100, 40, 55, 6, '2017-11-04', 'active'),
(44, 'Math', 100, 40, 55, 7, '2017-11-04', 'active'),
(45, 'Math', 100, 40, 55, 8, '2017-11-04', 'active'),
(48, 'English', 100, 40, 56, 9, '0000-00-00', 'active'),
(49, 'Hindi', 100, 40, 53, 9, '0000-00-00', 'active'),
(50, 'History', 100, 40, 53, 9, '0000-00-00', 'active'),
(51, 'Math', 100, 40, 55, 9, '0000-00-00', 'active'),
(52, 'Science', 100, 35, 100, 9, '2017-11-04', 'active'),
(53, 'Marathi', 100, 35, 56, 9, '2017-11-04', 'active'),
(54, 'marathi', 100, 35, 33, 13, '2018-06-13', 'active'),
(55, 'marathi', 100, 35, 34, 14, '2018-06-13', 'active'),
(56, 'marathi', 100, 35, 35, 15, '2018-06-13', 'active'),
(57, 'marathi', 100, 35, 36, 16, '2018-06-13', 'active'),
(58, 'marathi', 100, 35, 37, 17, '2018-06-13', 'active'),
(59, 'marathi', 100, 35, 38, 18, '2018-06-13', 'active'),
(60, 'marathi', 100, 35, 39, 19, '2018-06-13', 'active'),
(61, 'marathi', 100, 35, 40, 20, '2018-06-13', 'active'),
(62, 'marathi', 100, 35, 41, 21, '2018-06-13', 'active'),
(63, 'marathi', 100, 35, 42, 22, '2018-06-13', 'active'),
(64, 'marathi', 100, 35, 43, 23, '2018-06-13', 'active'),
(65, 'marathi', 100, 35, 44, 24, '2018-06-13', 'active'),
(66, 'marathi', 100, 35, 45, 25, '2018-06-13', 'active'),
(67, 'marathi', 100, 35, 46, 26, '2018-06-13', 'active'),
(68, 'marathi', 100, 35, 47, 27, '2018-06-13', 'active'),
(69, 'marathi', 100, 35, 48, 28, '2018-06-13', 'active'),
(70, 'english', 100, 35, 33, 13, '2018-06-13', 'active'),
(71, 'english', 100, 35, 34, 14, '2018-06-13', 'active'),
(72, 'english', 100, 35, 35, 15, '2018-06-13', 'active'),
(73, 'english', 100, 35, 36, 16, '2018-06-13', 'active'),
(74, 'english', 100, 35, 37, 17, '2018-06-13', 'active'),
(75, 'english', 100, 35, 30, 18, '2018-06-13', 'active'),
(76, 'english', 100, 35, 39, 19, '2018-06-13', 'active'),
(77, 'english', 100, 35, 40, 20, '2018-06-13', 'active'),
(78, 'english', 100, 35, 41, 21, '2018-06-13', 'active'),
(79, 'english', 100, 35, 42, 22, '2018-06-13', 'active'),
(80, 'english', 100, 35, 40, 23, '2018-06-13', 'active'),
(81, 'english', 100, 35, 44, 24, '2018-06-13', 'active'),
(82, 'english', 100, 35, 45, 25, '2018-06-13', 'active'),
(83, 'english', 100, 35, 11, 26, '2018-06-13', 'active'),
(84, 'english', 100, 35, 47, 27, '2018-06-13', 'active'),
(85, 'english', 100, 35, 48, 28, '2018-06-13', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `schools_master`
--

CREATE TABLE `schools_master` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools_master`
--

INSERT INTO `schools_master` (`id`, `name`) VALUES
(1, '1 '),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `schools_time_table`
--

CREATE TABLE `schools_time_table` (
  `sttid` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `mon` varchar(200) NOT NULL,
  `tue` varchar(200) NOT NULL,
  `wed` varchar(200) NOT NULL,
  `Thu` varchar(200) NOT NULL,
  `Fir` varchar(200) NOT NULL,
  `Stu` varchar(200) NOT NULL,
  `sttmid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools_time_table`
--

INSERT INTO `schools_time_table` (`sttid`, `time`, `mon`, `tue`, `wed`, `Thu`, `Fir`, `Stu`, `sttmid`) VALUES
(17, '7:00 AM', 'English', 'Hindi', 'Hindi', 'Hindi', 'Hindi', 'Hindi', 1),
(18, '8:00 am', 'English', 'English', 'English', 'English', 'English', 'English', 1),
(19, '9:00 AM', 'History', 'History', 'History', 'History', 'History', 'History', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_time_table_master`
--

CREATE TABLE `school_time_table_master` (
  `sttmid` int(11) NOT NULL,
  `division` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_time_table_master`
--

INSERT INTO `school_time_table_master` (`sttmid`, `division`, `class`, `pid`, `status`, `date`) VALUES
(1, 'D', '7', 1, 'active', '2017-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `subcaste_master`
--

CREATE TABLE `subcaste_master` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcaste_master`
--

INSERT INTO `subcaste_master` (`id`, `name`) VALUES
(1, 'SC'),
(2, 'ST'),
(3, 'OBC'),
(4, 'OPEN'),
(5, 'SBC'),
(6, 'VJ'),
(7, 'NT-B'),
(8, 'NT-C'),
(9, 'NT-D');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `aid` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `attendance_status` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `month` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `class_name` varchar(11) NOT NULL,
  `anual_year` varchar(40) NOT NULL,
  `pid` int(11) NOT NULL,
  `divsion` varchar(20) NOT NULL,
  `ptid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`aid`, `roll_no`, `tid`, `attendance_status`, `year`, `month`, `date`, `attendance_date`, `status`, `class_name`, `anual_year`, `pid`, `divsion`, `ptid`) VALUES
(1, 1002, 4, 'A', 2017, '08', '2017-08-10 14:39:13', '2017-08-10', 'active', '7', '2017-2018', 1, 'D', 7),
(2, 1003, 4, 'P', 2017, '08', '2017-08-10 14:40:30', '2017-08-10', 'active', '7', '2017-2018', 1, 'D', 8),
(3, 1002, 4, 'P', 2017, '08', '2017-08-12 05:57:31', '2017-08-12', 'active', '7', '2017-2018', 1, 'D', 7),
(4, 1003, 4, 'A', 2017, '08', '2017-08-12 05:57:35', '2017-08-12', 'active', '7', '2017-2018', 1, 'D', 8),
(5, 1002, 4, 'P', 2017, '08', '2017-08-16 04:08:27', '2017-08-16', 'active', '7', '2017-2018', 1, 'D', 7),
(6, 1003, 4, 'P', 2017, '08', '2017-08-16 04:08:28', '2017-08-16', 'active', '7', '2017-2018', 1, 'D', 8),
(7, 1002, 4, 'A', 2017, '08', '2017-08-17 18:51:14', '2017-08-17', 'active', '7', '2017-2018', 1, 'D', 7),
(8, 1003, 4, 'A', 2017, '08', '2017-08-17 18:51:16', '2017-08-17', 'active', '7', '2017-2018', 1, 'D', 8),
(11, 1002, 4, 'A', 2017, '08', '2017-08-19 06:35:03', '2017-08-19', 'active', '7', '2017-2018', 1, 'D', 7),
(12, 1003, 4, 'P', 2017, '08', '2017-08-19 06:35:08', '2017-08-19', 'active', '7', '2017-2018', 1, 'D', 8),
(13, 1002, 4, 'P', 2017, '08', '2017-08-21 07:26:39', '2017-08-21', 'active', '7', '2017-2018', 1, 'D', 7),
(14, 1003, 4, 'P', 2017, '08', '2017-08-21 07:26:41', '2017-08-21', 'active', '7', '2017-2018', 1, 'D', 8),
(15, 1002, 4, 'P', 2017, '08', '2017-08-22 16:13:24', '2017-08-22', 'active', '7', '2017-2018', 1, 'D', 7),
(16, 1003, 4, 'P', 2017, '08', '2017-08-22 16:13:25', '2017-08-22', 'active', '7', '2017-2018', 1, 'D', 8),
(17, 1002, 4, 'A', 2017, '08', '2017-08-23 17:47:48', '2017-08-23', 'active', '7', '2017-2018', 1, 'D', 7),
(18, 1003, 4, 'P', 2017, '08', '2017-08-23 17:47:50', '2017-08-23', 'active', '7', '2017-2018', 1, 'D', 8),
(19, 1002, 4, 'P', 2017, '08', '2017-08-28 16:32:34', '2017-08-28', 'active', '7', '2017-2018', 1, 'D', 7),
(20, 1003, 4, 'P', 2017, '08', '2017-08-28 16:32:37', '2017-08-28', 'active', '7', '2017-2018', 1, 'D', 8),
(21, 1003, 4, 'P', 2017, '08', '2017-08-29 18:56:58', '2017-08-29', 'active', '7', '2017-2018', 1, 'D', 8),
(22, 1002, 4, 'P', 2017, '08', '2017-08-29 18:56:59', '2017-08-29', 'active', '7', '2017-2018', 1, 'D', 7),
(23, 1002, 4, 'P', 2017, '08', '2017-08-31 16:28:25', '2017-08-31', 'active', '7', '2017-2018', 1, 'D', 7),
(24, 1003, 4, 'P', 2017, '08', '2017-08-31 16:28:27', '2017-08-31', 'active', '7', '2017-2018', 1, 'D', 8),
(25, 1002, 4, 'P', 2017, '08', '2017-08-31 16:46:50', '2017-08-31', 'active', '7', '2017-2018', 1, 'D', 7),
(26, 1003, 4, 'P', 2017, '08', '2017-08-31 16:46:52', '2017-08-31', 'active', '7', '2017-2018', 1, 'D', 8),
(27, 1002, 4, 'A', 2017, '08', '2017-08-31 16:48:37', '2017-08-31', 'active', '7', '2017-2018', 1, 'D', 7),
(28, 1003, 4, 'A', 2017, '08', '2017-08-31 16:48:40', '2017-08-31', 'active', '7', '2017-2018', 1, 'D', 8),
(29, 1002, 4, 'P', 2017, '08', '2017-08-31 16:53:15', '2017-08-30', 'active', '7', '2017-2018', 1, 'D', 7),
(30, 1002, 4, 'P', 2017, '08', '2017-08-31 16:53:16', '2017-08-30', 'active', '7', '2017-2018', 1, 'D', 7),
(31, 1003, 4, 'P', 2017, '08', '2017-08-31 16:53:17', '2017-08-30', 'active', '7', '2017-2018', 1, 'D', 8),
(32, 1002, 4, 'P', 2017, '09', '2017-09-01 19:12:52', '2017-09-01', 'active', '7', '2017-2018', 1, 'D', 7),
(33, 1003, 4, 'P', 2017, '09', '2017-09-01 19:12:53', '2017-09-01', 'active', '7', '2017-2018', 1, 'D', 8),
(34, 1002, 4, 'H', 2017, '09', '2017-09-02 10:58:05', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 7),
(35, 1003, 4, 'H', 2017, '09', '2017-09-02 10:58:08', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 8),
(36, 1002, 4, 'P', 2017, '09', '2017-09-02 11:01:53', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 7),
(37, 1003, 4, 'P', 2017, '09', '2017-09-02 11:01:54', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 8),
(38, 1002, 4, 'H', 2017, '09', '2017-09-02 11:01:55', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 7),
(39, 1003, 4, 'H', 2017, '09', '2017-09-02 11:01:58', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 8),
(40, 1002, 4, 'H', 2017, '09', '2017-09-02 11:02:55', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 7),
(41, 1003, 4, 'H', 2017, '09', '2017-09-02 11:02:56', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 8),
(42, 1003, 4, 'H', 2017, '09', '2017-09-02 18:45:50', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 8),
(43, 1003, 4, 'H', 2017, '09', '2017-09-02 18:48:41', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 8),
(44, 1003, 4, 'H', 2017, '09', '2017-09-02 18:48:42', '2017-09-02', 'active', '7', '2017-2018', 1, 'D', 8),
(45, 1002, 4, 'P', 2017, '09', '2017-09-04 23:49:07', '2017-09-04', 'active', '7', '2017-2018', 1, 'D', 7),
(46, 1003, 4, 'P', 2017, '09', '2017-09-04 23:49:09', '2017-09-04', 'active', '7', '2017-2018', 1, 'D', 8),
(47, 1002, 4, 'P', 2017, '09', '2017-09-05 08:13:05', '2017-09-05', 'active', '7', '2017-2018', 1, 'D', 7),
(48, 1003, 4, 'P', 2017, '09', '2017-09-05 08:13:06', '2017-09-05', 'active', '7', '2017-2018', 1, 'D', 8),
(49, 1002, 4, 'P', 2017, '09', '2017-09-19 18:28:34', '2017-09-19', 'active', '7', '2017-2018', 1, 'D', 7),
(50, 1003, 4, 'P', 2017, '09', '2017-09-19 18:28:35', '2017-09-19', 'active', '7', '2017-2018', 1, 'D', 8),
(51, 1002, 4, 'P', 2017, '09', '2017-09-19 18:29:04', '2017-09-18', 'active', '7', '2017-2018', 1, 'D', 7),
(52, 1003, 4, 'P', 2017, '09', '2017-09-19 18:29:05', '2017-09-18', 'active', '7', '2017-2018', 1, 'D', 8),
(53, 1002, 4, 'P', 2017, '09', '2017-09-19 18:34:09', '2017-09-11', 'active', '7', '2017-2018', 1, 'D', 7),
(54, 1002, 4, 'P', 2017, '09', '2017-09-19 18:34:14', '2017-09-12', 'active', '7', '2017-2018', 1, 'D', 7),
(55, 1003, 4, 'P', 2017, '09', '2017-09-19 18:34:16', '2017-09-12', 'active', '7', '2017-2018', 1, 'D', 8),
(56, 1002, 4, 'H', 2017, '09', '2017-09-19 18:34:21', '2017-09-13', 'active', '7', '2017-2018', 1, 'D', 7),
(57, 1003, 4, 'H', 2017, '09', '2017-09-19 18:34:25', '2017-09-13', 'active', '7', '2017-2018', 1, 'D', 8),
(58, 1002, 4, 'P', 2017, '09', '2017-09-19 18:34:31', '2017-09-14', 'active', '7', '2017-2018', 1, 'D', 7),
(59, 1003, 4, 'P', 2017, '09', '2017-09-19 18:34:32', '2017-09-14', 'active', '7', '2017-2018', 1, 'D', 8),
(60, 1002, 4, 'A', 2017, '09', '2017-09-19 18:34:37', '2017-09-15', 'active', '7', '2017-2018', 1, 'D', 7),
(61, 1003, 4, 'P', 2017, '09', '2017-09-19 18:34:39', '2017-09-15', 'active', '7', '2017-2018', 1, 'D', 8),
(62, 1003, 4, 'A', 2017, '09', '2017-09-19 18:34:44', '2017-09-16', 'active', '7', '2017-2018', 1, 'D', 8),
(63, 1002, 4, 'P', 2017, '09', '2017-09-19 18:34:45', '2017-09-16', 'active', '7', '2017-2018', 1, 'D', 7),
(64, 1002, 4, 'P', 2017, '09', '2017-09-23 18:43:09', '2017-09-23', 'active', '7', '2017-2018', 1, 'D', 7),
(65, 1003, 4, 'H', 2017, '09', '2017-09-23 18:43:13', '2017-09-23', 'active', '7', '2017-2018', 1, 'D', 8),
(66, 1002, 4, 'P', 2017, '09', '2017-09-26 17:30:39', '2017-09-26', 'active', '7', '2017-2018', 1, 'D', 7),
(67, 1003, 4, 'P', 2017, '09', '2017-09-26 17:30:40', '2017-09-26', 'active', '7', '2017-2018', 1, 'D', 8),
(68, 1002, 4, 'H', 2017, '09', '2017-09-30 09:03:46', '2017-09-30', 'active', '7', '2017-2018', 1, 'D', 7),
(69, 1003, 4, 'H', 2017, '09', '2017-09-30 09:03:51', '2017-09-30', 'active', '7', '2017-2018', 1, 'D', 8),
(70, 1002, 4, 'P', 2017, '09', '2017-09-30 09:13:31', '2017-09-29', 'active', '7', '2017-2018', 1, 'D', 7),
(71, 1003, 4, 'H', 2017, '09', '2017-09-30 09:13:32', '2017-09-29', 'active', '7', '2017-2018', 1, 'D', 8),
(72, 1002, 4, 'H', 2017, '10', '2017-10-10 17:16:29', '2017-10-10', 'active', '7', '2017-2018', 1, 'D', 7),
(73, 1003, 4, 'P', 2017, '10', '2017-10-10 17:16:31', '2017-10-10', 'active', '7', '2017-2018', 1, 'D', 8),
(74, 1002, 4, 'P', 2017, '10', '2017-10-10 17:47:24', '2017-10-07', 'active', '7', '2017-2018', 1, 'D', 7),
(75, 1003, 4, 'P', 2017, '10', '2017-10-10 17:47:26', '2017-10-07', 'active', '7', '2017-2018', 1, 'D', 8),
(76, 1002, 4, 'P', 2017, '10', '2017-10-10 17:47:36', '2017-10-06', 'active', '7', '2017-2018', 1, 'D', 7),
(77, 1003, 4, 'P', 2017, '10', '2017-10-10 17:47:37', '2017-10-06', 'active', '7', '2017-2018', 1, 'D', 8),
(78, 1002, 4, 'P', 2017, '10', '2017-10-10 17:47:42', '2017-10-05', 'active', '7', '2017-2018', 1, 'D', 7),
(79, 1003, 4, 'P', 2017, '10', '2017-10-10 17:47:43', '2017-10-05', 'active', '7', '2017-2018', 1, 'D', 8),
(80, 1002, 4, 'A', 2017, '10', '2017-10-10 17:47:47', '2017-10-04', 'active', '7', '2017-2018', 1, 'D', 7),
(81, 1003, 4, 'P', 2017, '10', '2017-10-10 17:47:49', '2017-10-04', 'active', '7', '2017-2018', 1, 'D', 8),
(82, 1002, 4, 'P', 2017, '10', '2017-10-10 17:47:54', '2017-10-03', 'active', '7', '2017-2018', 1, 'D', 7),
(83, 1003, 4, 'P', 2017, '10', '2017-10-10 17:47:59', '2017-10-02', 'active', '7', '2017-2018', 1, 'D', 8),
(84, 1002, 4, 'P', 2017, '10', '2017-10-10 17:48:26', '2017-10-09', 'active', '7', '2017-2018', 1, 'D', 7),
(85, 1003, 4, 'P', 2017, '10', '2017-10-10 17:48:27', '2017-10-09', 'active', '7', '2017-2018', 1, 'D', 8),
(86, 1003, 4, 'H', 2017, '10', '2017-10-10 17:48:33', '2017-10-03', 'active', '7', '2017-2018', 1, 'D', 8),
(87, 1005, 0, 'P', 2017, '10', '2017-10-28 04:01:01', '2017-10-28', 'active', '7', '', 1, 'D', 9),
(88, 1006, 0, 'P', 2017, '10', '2017-10-28 04:01:04', '2017-10-28', 'active', '7', '', 1, 'D', 10),
(89, 1007, 0, 'P', 2017, '10', '2017-10-28 04:01:07', '2017-10-28', 'active', '7', '', 1, 'D', 11),
(90, 1005, 0, 'P', 2017, '10', '2017-10-28 04:01:14', '2017-10-02', 'active', '7', '', 1, 'D', 9),
(91, 1006, 0, 'P', 2017, '10', '2017-10-28 04:01:15', '2017-10-02', 'active', '7', '', 1, 'D', 10),
(92, 1007, 0, 'P', 2017, '10', '2017-10-28 04:01:16', '2017-10-02', 'active', '7', '', 1, 'D', 11),
(93, 1005, 0, 'P', 2017, '10', '2017-10-28 04:01:21', '2017-10-03', 'active', '7', '', 1, 'D', 9),
(94, 1006, 0, 'P', 2017, '10', '2017-10-28 04:01:23', '2017-10-03', 'active', '7', '', 1, 'D', 10),
(95, 1007, 0, 'P', 2017, '10', '2017-10-28 04:01:24', '2017-10-03', 'active', '7', '', 1, 'D', 11),
(96, 1005, 0, 'A', 2017, '10', '2017-10-28 04:01:28', '2017-10-04', 'active', '7', '', 1, 'D', 9),
(97, 1006, 0, 'P', 2017, '10', '2017-10-28 04:01:30', '2017-10-04', 'active', '7', '', 1, 'D', 10),
(98, 1007, 0, 'P', 2017, '10', '2017-10-28 04:01:31', '2017-10-04', 'active', '7', '', 1, 'D', 11),
(99, 1005, 0, 'H', 2017, '10', '2017-10-28 04:01:38', '2017-10-05', 'active', '7', '', 1, 'D', 9),
(100, 1006, 0, 'A', 2017, '10', '2017-10-28 04:01:39', '2017-10-05', 'active', '7', '', 1, 'D', 10),
(101, 1007, 0, 'A', 2017, '10', '2017-10-28 04:01:41', '2017-10-05', 'active', '7', '', 1, 'D', 11),
(102, 1006, 0, 'A', 2017, '10', '2017-10-28 04:01:47', '2017-10-12', 'active', '7', '', 1, 'D', 10),
(103, 1007, 0, 'A', 2017, '10', '2017-10-28 04:01:48', '2017-10-12', 'active', '7', '', 1, 'D', 11),
(104, 1005, 0, 'A', 2017, '10', '2017-10-28 04:01:49', '2017-10-12', 'active', '7', '', 1, 'D', 9),
(105, 1006, 0, 'A', 2017, '10', '2017-10-28 04:01:55', '2017-10-13', 'active', '7', '', 1, 'D', 10),
(106, 1007, 0, 'A', 2017, '10', '2017-10-28 04:01:56', '2017-10-13', 'active', '7', '', 1, 'D', 11),
(107, 1005, 0, 'P', 2017, '10', '2017-10-28 04:01:59', '2017-10-13', 'active', '7', '', 1, 'D', 9),
(108, 1005, 0, 'P', 2017, '10', '2017-10-28 04:02:03', '2017-10-14', 'active', '7', '', 1, 'D', 9),
(109, 1006, 0, 'P', 2017, '10', '2017-10-28 04:02:04', '2017-10-14', 'active', '7', '', 1, 'D', 10),
(110, 1007, 0, 'P', 2017, '10', '2017-10-28 04:02:05', '2017-10-14', 'active', '7', '', 1, 'D', 11),
(111, 1005, 0, 'A', 2017, '10', '2017-10-28 04:02:11', '2017-10-26', 'active', '7', '', 1, 'D', 9),
(112, 1006, 0, 'P', 2017, '10', '2017-10-28 04:02:12', '2017-10-26', 'active', '7', '', 1, 'D', 10),
(113, 1007, 0, 'P', 2017, '10', '2017-10-28 04:02:13', '2017-10-26', 'active', '7', '', 1, 'D', 11),
(114, 1005, 0, 'P', 2017, '10', '2017-10-28 04:02:29', '2017-10-11', 'active', '7', '', 1, 'D', 9),
(115, 1006, 0, 'P', 2017, '10', '2017-10-28 04:02:30', '2017-10-11', 'active', '7', '', 1, 'D', 10),
(116, 1007, 0, 'P', 2017, '10', '2017-10-28 04:02:31', '2017-10-11', 'active', '7', '', 1, 'D', 11),
(117, 1005, 0, 'P', 2017, '10', '2017-10-28 04:02:35', '2017-10-10', 'active', '7', '', 1, 'D', 9),
(118, 1006, 0, 'P', 2017, '10', '2017-10-28 04:02:36', '2017-10-10', 'active', '7', '', 1, 'D', 10),
(119, 1007, 0, 'P', 2017, '10', '2017-10-28 04:02:37', '2017-10-10', 'active', '7', '', 1, 'D', 11),
(120, 1005, 0, 'P', 2017, '10', '2017-10-28 04:02:42', '2017-10-09', 'active', '7', '', 1, 'D', 9),
(121, 1006, 0, 'P', 2017, '10', '2017-10-28 04:02:43', '2017-10-09', 'active', '7', '', 1, 'D', 10),
(122, 1007, 0, 'P', 2017, '10', '2017-10-28 04:02:44', '2017-10-09', 'active', '7', '', 1, 'D', 11),
(123, 1002, 4, 'P', 2017, '10', '2017-10-28 04:11:46', '2017-10-28', 'active', '7', '2017-2018', 1, 'D', 7),
(124, 1003, 4, 'P', 2017, '10', '2017-10-28 04:11:47', '2017-10-28', 'active', '7', '2017-2018', 1, 'D', 8),
(125, 1002, 4, 'P', 2017, '11', '2017-11-01 17:03:58', '2017-11-01', 'active', '7', '2017-2018', 1, 'D', 7),
(126, 1003, 4, 'P', 2017, '11', '2017-11-01 17:03:59', '2017-11-01', 'active', '7', '2017-2018', 1, 'D', 8),
(127, 1005, 0, 'P', 2017, '11', '2017-11-01 17:04:00', '2017-11-01', 'active', '7', '', 1, 'D', 9),
(128, 1008, 0, 'P', 2017, '11', '2017-11-01 17:04:11', '2017-11-01', 'active', '7', '', 1, 'D', 20),
(129, 1003, 4, 'P', 2017, '10', '2017-11-01 17:06:05', '2017-10-26', 'active', '7', '2017-2018', 1, 'D', 8),
(130, 1002, 4, 'A', 2017, '10', '2017-11-01 17:06:07', '2017-10-26', 'active', '7', '2017-2018', 1, 'D', 7),
(131, 1008, 0, 'P', 2017, '10', '2017-11-01 17:06:11', '2017-10-26', 'active', '7', '', 1, 'D', 20),
(132, 0, 0, 'P', 2017, '11', '2017-11-01 18:22:54', '2017-11-01', 'active', '7', '', 1, 'D', 21),
(133, 0, 0, 'A', 2017, '11', '2017-11-01 18:25:04', '2017-11-01', 'active', '7', '', 1, 'D', 22),
(134, 0, 0, 'P', 2017, '11', '2017-11-01 18:25:07', '2017-11-01', 'active', '7', '', 1, 'D', 23),
(135, 0, 4, 'P', 2017, '11', '2017-11-02 16:44:27', '2017-11-02', 'active', '7', '', 1, 'D', 7),
(136, 0, 4, 'A', 2017, '11', '2017-11-02 16:44:31', '2017-11-02', 'active', '7', '', 1, 'D', 8),
(137, 0, 0, 'A', 2017, '11', '2017-11-02 16:44:33', '2017-11-02', 'active', '7', '', 1, 'D', 9),
(138, 0, 0, 'A', 2017, '11', '2017-11-02 16:44:34', '2017-11-02', 'active', '7', '', 1, 'D', 20),
(139, 0, 0, 'A', 2017, '11', '2017-11-02 16:44:35', '2017-11-02', 'active', '7', '', 1, 'D', 21),
(140, 0, 0, 'P', 2017, '11', '2017-11-02 16:44:37', '2017-11-02', 'active', '7', '', 1, 'D', 22),
(141, 0, 0, 'H', 2017, '11', '2017-11-02 16:44:38', '2017-11-02', 'active', '7', '', 1, 'D', 23),
(142, 0, 4, 'P', 2017, '11', '2017-11-11 13:08:08', '2017-11-11', 'active', '7', '', 1, 'D', 7),
(143, 0, 0, 'P', 2017, '12', '2017-12-03 04:41:49', '2017-12-01', 'active', '7', '', 1, 'D', 9),
(144, 0, 4, 'P', 2017, '12', '2017-12-03 04:41:51', '2017-12-01', 'active', '7', '', 1, 'D', 7),
(145, 0, 0, 'P', 2017, '12', '2017-12-03 04:41:52', '2017-12-01', 'active', '7', '', 1, 'D', 23),
(146, 0, 4, 'P', 2017, '12', '2017-12-03 04:41:53', '2017-12-01', 'active', '7', '', 1, 'D', 8),
(147, 0, 0, 'P', 2017, '12', '2017-12-03 04:41:54', '2017-12-01', 'active', '7', '', 1, 'D', 21),
(148, 0, 0, 'P', 2016, '12', '2017-12-03 04:43:08', '2016-12-01', 'active', '7', '', 1, 'D', 9),
(149, 0, 4, 'P', 2016, '12', '2017-12-03 04:43:09', '2016-12-01', 'active', '7', '', 1, 'D', 7),
(150, 0, 0, 'P', 2016, '12', '2017-12-03 04:43:10', '2016-12-01', 'active', '7', '', 1, 'D', 23),
(151, 0, 4, 'P', 2016, '12', '2017-12-03 04:43:12', '2016-12-01', 'active', '7', '', 1, 'D', 8),
(152, 0, 0, 'P', 2016, '12', '2017-12-03 04:43:15', '2016-12-01', 'active', '7', '', 1, 'D', 21),
(153, 0, 0, 'P', 2017, '11', '2017-12-03 05:24:53', '2017-11-15', 'active', '7', '', 1, 'D', 9),
(154, 0, 4, 'P', 2017, '11', '2017-12-03 05:24:54', '2017-11-15', 'active', '7', '', 1, 'D', 7),
(155, 0, 0, 'P', 2017, '11', '2017-12-03 05:24:55', '2017-11-15', 'active', '7', '', 1, 'D', 23),
(156, 0, 4, 'P', 2017, '11', '2017-12-03 05:24:57', '2017-11-15', 'active', '7', '', 1, 'D', 8),
(157, 0, 0, 'P', 2017, '11', '2017-12-03 05:24:58', '2017-11-15', 'active', '7', '', 1, 'D', 21),
(158, 0, 0, 'P', 2017, '11', '2017-12-03 05:25:01', '2017-11-15', 'active', '7', '', 1, 'D', 22),
(159, 0, 0, 'P', 2017, '12', '2017-12-07 16:02:53', '2017-12-07', 'active', '7', '', 1, 'D', 9),
(160, 0, 4, 'P', 2017, '12', '2017-12-07 16:02:54', '2017-12-07', 'active', '7', '', 1, 'D', 7),
(161, 0, 0, 'P', 2017, '12', '2017-12-07 16:02:55', '2017-12-07', 'active', '7', '', 1, 'D', 23),
(162, 0, 4, 'P', 2017, '12', '2017-12-07 16:02:56', '2017-12-07', 'active', '7', '', 1, 'D', 8),
(163, 0, 0, 'P', 2017, '12', '2017-12-07 16:02:57', '2017-12-07', 'active', '7', '', 1, 'D', 21),
(164, 0, 0, 'P', 2017, '12', '2017-12-07 16:04:01', '2017-12-06', 'active', '7', '', 1, 'D', 9),
(165, 0, 4, 'P', 2017, '12', '2017-12-07 16:04:03', '2017-12-06', 'active', '7', '', 1, 'D', 7),
(166, 0, 0, 'P', 2017, '12', '2017-12-07 16:04:04', '2017-12-06', 'active', '7', '', 1, 'D', 23),
(167, 0, 4, 'P', 2017, '12', '2017-12-07 16:04:06', '2017-12-06', 'active', '7', '', 1, 'D', 8),
(168, 0, 0, 'A', 2017, '12', '2017-12-07 16:04:08', '2017-12-06', 'active', '7', '', 1, 'D', 21),
(169, 0, 0, 'P', 2017, '12', '2017-12-07 16:04:09', '2017-12-06', 'active', '7', '', 1, 'D', 22),
(170, 0, 0, 'P', 2017, '12', '2017-12-07 16:04:15', '2017-12-05', 'active', '7', '', 1, 'D', 9),
(171, 0, 4, 'P', 2017, '12', '2017-12-07 16:04:16', '2017-12-05', 'active', '7', '', 1, 'D', 7),
(172, 0, 0, 'P', 2017, '12', '2017-12-07 16:04:17', '2017-12-05', 'active', '7', '', 1, 'D', 23),
(173, 0, 4, 'P', 2017, '12', '2017-12-07 16:04:18', '2017-12-05', 'active', '7', '', 1, 'D', 8),
(174, 0, 0, 'P', 2017, '12', '2017-12-07 16:04:20', '2017-12-05', 'active', '7', '', 1, 'D', 21),
(175, 0, 0, 'P', 2017, '12', '2017-12-07 16:04:21', '2017-12-05', 'active', '7', '', 1, 'D', 22),
(176, 0, 0, 'P', 2017, '12', '2017-12-07 16:04:28', '2017-12-04', 'active', '7', '', 1, 'D', 9),
(177, 0, 4, 'P', 2017, '12', '2017-12-07 16:04:30', '2017-12-04', 'active', '7', '', 1, 'D', 7),
(178, 0, 0, 'A', 2017, '12', '2017-12-07 16:04:31', '2017-12-04', 'active', '7', '', 1, 'D', 23),
(179, 0, 4, 'P', 2017, '12', '2017-12-07 16:04:33', '2017-12-04', 'active', '7', '', 1, 'D', 8),
(180, 0, 0, 'P', 2017, '12', '2017-12-07 16:04:34', '2017-12-04', 'active', '7', '', 1, 'D', 21),
(181, 0, 0, 'P', 2017, '12', '2017-12-07 16:04:35', '2017-12-04', 'active', '7', '', 1, 'D', 22),
(182, 0, 0, 'P', 2017, '12', '2017-12-10 06:08:48', '2017-12-02', 'active', '7', '', 1, 'D', 31),
(183, 0, 0, 'H', 2017, '08', '2017-12-10 12:25:46', '2017-08-16', 'active', '7', '', 1, 'D', 34),
(184, 0, 0, 'H', 2017, '08', '2017-12-10 12:25:47', '2017-08-16', 'active', '7', '', 1, 'D', 33),
(185, 0, 0, 'A', 2017, '08', '2017-12-10 12:25:48', '2017-08-16', 'active', '7', '', 1, 'D', 32),
(186, 0, 0, 'P', 2017, '12', '2017-12-12 18:40:45', '2017-12-04', 'active', '6', '', 1, 'C', 26),
(187, 0, 0, 'P', 2017, '12', '2017-12-12 18:40:46', '2017-12-04', 'active', '6', '', 1, 'C', 27),
(188, 0, 0, 'A', 2017, '12', '2017-12-12 18:40:49', '2017-12-04', 'active', '6', '', 1, 'C', 28),
(189, 0, 0, 'P', 2017, '12', '2017-12-12 18:40:53', '2017-12-05', 'active', '6', '', 1, 'C', 26),
(190, 0, 0, 'A', 2017, '12', '2017-12-12 18:40:54', '2017-12-05', 'active', '6', '', 1, 'C', 27),
(191, 0, 0, 'H', 2017, '12', '2017-12-12 18:40:56', '2017-12-05', 'active', '6', '', 1, 'C', 28),
(192, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:00', '2017-12-06', 'active', '6', '', 1, 'C', 26),
(193, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:01', '2017-12-06', 'active', '6', '', 1, 'C', 28),
(194, 0, 0, 'A', 2017, '12', '2017-12-12 18:41:03', '2017-12-06', 'active', '6', '', 1, 'C', 27),
(195, 0, 0, 'H', 2017, '12', '2017-12-12 18:41:08', '2017-12-07', 'active', '6', '', 1, 'C', 26),
(196, 0, 0, 'A', 2017, '12', '2017-12-12 18:41:09', '2017-12-07', 'active', '6', '', 1, 'C', 27),
(197, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:10', '2017-12-07', 'active', '6', '', 1, 'C', 28),
(198, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:14', '2017-12-08', 'active', '6', '', 1, 'C', 26),
(199, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:16', '2017-12-08', 'active', '6', '', 1, 'C', 27),
(200, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:19', '2017-12-08', 'active', '6', '', 1, 'C', 28),
(201, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:24', '2017-12-09', 'active', '6', '', 1, 'C', 26),
(202, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:25', '2017-12-09', 'active', '6', '', 1, 'C', 27),
(203, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:26', '2017-12-09', 'active', '6', '', 1, 'C', 28),
(204, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:32', '2017-12-11', 'active', '6', '', 1, 'C', 26),
(205, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:33', '2017-12-11', 'active', '6', '', 1, 'C', 27),
(206, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:34', '2017-12-11', 'active', '6', '', 1, 'C', 28),
(207, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:39', '2017-12-12', 'active', '6', '', 1, 'C', 26),
(208, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:40', '2017-12-12', 'active', '6', '', 1, 'C', 27),
(209, 0, 0, 'P', 2017, '12', '2017-12-12 18:41:41', '2017-12-12', 'active', '6', '', 1, 'C', 28),
(210, 0, 0, 'P', 2017, '12', '2017-12-22 18:58:31', '2017-12-22', 'active', '7', '', 1, 'D', 31),
(211, 0, 0, 'P', 2017, '12', '2017-12-22 18:58:33', '2017-12-22', 'active', '7', '', 1, 'D', 30),
(212, 0, 0, 'P', 2017, '12', '2017-12-22 18:58:35', '2017-12-22', 'active', '7', '', 1, 'D', 9),
(213, 0, 0, 'P', 2017, '12', '2017-12-22 18:58:36', '2017-12-22', 'active', '7', '', 1, 'D', 23),
(214, 0, 4, 'P', 2017, '12', '2017-12-22 18:58:38', '2017-12-22', 'active', '7', '', 1, 'D', 8),
(215, 0, 0, 'P', 2017, '12', '2017-12-22 18:58:39', '2017-12-22', 'active', '7', '', 1, 'D', 24),
(216, 0, 0, 'A', 2017, '12', '2017-12-22 18:58:41', '2017-12-22', 'active', '7', '', 1, 'D', 21),
(217, 0, 0, 'A', 2017, '12', '2017-12-22 18:58:42', '2017-12-22', 'active', '7', '', 1, 'D', 22),
(218, 0, 0, 'H', 2017, '12', '2017-12-22 18:58:45', '2017-12-22', 'active', '7', '', 1, 'D', 34),
(219, 0, 0, 'H', 2017, '12', '2017-12-22 18:58:47', '2017-12-22', 'active', '7', '', 1, 'D', 33),
(220, 0, 4, 'A', 2017, '12', '2017-12-22 18:58:48', '2017-12-22', 'active', '7', '', 1, 'D', 7),
(221, 0, 0, 'A', 2017, '12', '2017-12-22 19:19:48', '2017-12-06', 'active', '7', '', 1, 'D', 24),
(222, 0, 0, 'A', 2017, '12', '2017-12-22 19:21:07', '2017-12-04', 'active', '7', '', 1, 'D', 24),
(223, 0, 0, 'P', 2017, '12', '2017-12-22 19:21:08', '2017-12-04', 'active', '7', '', 1, 'D', 34),
(224, 0, 0, 'P', 2017, '12', '2017-12-22 19:21:10', '2017-12-04', 'active', '7', '', 1, 'D', 33),
(225, 0, 0, 'P', 2017, '12', '2017-12-22 19:21:13', '2017-12-04', 'active', '7', '', 1, 'D', 32),
(226, 0, 0, 'P', 2017, '12', '2017-12-22 19:21:18', '2017-12-04', 'active', '7', '', 1, 'D', 30),
(227, 0, 0, 'P', 2017, '12', '2017-12-22 19:21:21', '2017-12-04', 'active', '7', '', 1, 'D', 31),
(228, 0, 0, 'P', 2017, '12', '2017-12-28 17:26:39', '2017-12-28', 'active', '7', '', 1, 'D', 31),
(229, 0, 0, 'P', 2017, '12', '2017-12-28 17:26:41', '2017-12-28', 'active', '7', '', 1, 'D', 30),
(230, 0, 0, 'P', 2017, '12', '2017-12-28 17:26:45', '2017-12-28', 'active', '7', '', 1, 'D', 9),
(231, 0, 4, 'P', 2017, '12', '2017-12-28 17:26:48', '2017-12-28', 'active', '7', '', 1, 'D', 8),
(232, 0, 0, 'P', 2017, '12', '2017-12-28 17:26:51', '2017-12-28', 'active', '7', '', 1, 'D', 24),
(233, 0, 0, 'P', 2017, '12', '2017-12-28 17:26:57', '2017-12-28', 'active', '7', '', 1, 'D', 21),
(234, 0, 0, 'P', 2017, '12', '2017-12-28 17:43:29', '2017-12-28', 'active', '7', '', 1, 'D', 23),
(235, 0, 0, 'P', 2017, '12', '2017-12-28 17:43:36', '2017-12-28', 'active', '7', '', 1, 'D', 22),
(236, 0, 0, 'P', 2017, '12', '2017-12-28 17:43:37', '2017-12-28', 'active', '7', '', 1, 'D', 34),
(237, 0, 0, 'P', 2017, '12', '2017-12-28 17:43:39', '2017-12-28', 'active', '7', '', 1, 'D', 33),
(238, 0, 4, 'P', 2017, '12', '2017-12-28 17:43:45', '2017-12-28', 'active', '7', '', 1, 'D', 7),
(239, 0, 0, 'P', 2017, '12', '2017-12-28 17:43:46', '2017-12-28', 'active', '7', '', 1, 'D', 32),
(240, 0, 0, 'P', 2017, '12', '2017-12-31 08:05:39', '2017-12-29', 'active', '7', '', 1, 'D', 31),
(241, 0, 0, 'A', 2017, '12', '2017-12-31 08:05:42', '2017-12-29', 'active', '7', '', 1, 'D', 30),
(242, 0, 0, 'H', 2018, '01', '2018-01-03 05:59:16', '2018-01-03', 'active', '7', '', 1, 'D', 31),
(243, 0, 0, 'P', 2018, '01', '2018-01-03 05:59:18', '2018-01-03', 'active', '7', '', 1, 'D', 30),
(244, 0, 0, 'P', 2018, '01', '2018-01-03 05:59:21', '2018-01-03', 'active', '7', '', 1, 'D', 23),
(245, 0, 0, 'P', 2018, '01', '2018-01-03 05:59:25', '2018-01-03', 'active', '7', '', 1, 'D', 24),
(246, 0, 0, 'P', 2018, '01', '2018-01-03 05:59:31', '2018-01-03', 'active', '7', '', 1, 'D', 21),
(247, 0, 0, 'A', 2018, '01', '2018-01-03 05:59:36', '2018-01-03', 'active', '7', '', 1, 'D', 22),
(248, 0, 0, 'P', 2018, '01', '2018-01-03 05:59:47', '2018-01-03', 'active', '7', '', 1, 'D', 34),
(249, 0, 0, 'P', 2018, '01', '2018-01-03 05:59:49', '2018-01-03', 'active', '7', '', 1, 'D', 33),
(250, 0, 4, 'P', 2018, '01', '2018-01-03 05:59:50', '2018-01-03', 'active', '7', '', 1, 'D', 7),
(251, 0, 0, 'A', 2018, '01', '2018-01-03 05:59:51', '2018-01-03', 'active', '7', '', 1, 'D', 32),
(252, 0, 0, 'P', 2018, '01', '2018-01-03 05:59:56', '2018-01-03', 'active', '7', '', 1, 'D', 9),
(253, 0, 4, 'P', 2018, '01', '2018-01-03 05:59:58', '2018-01-03', 'active', '7', '', 1, 'D', 8),
(254, 0, 0, 'H', 2018, '01', '2018-01-04 04:15:16', '2018-01-04', 'active', '7', '', 1, 'D', 23),
(255, 0, 0, 'A', 2018, '01', '2018-01-04 04:15:25', '2018-01-04', 'active', '7', '', 1, 'D', 40),
(256, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 7),
(257, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 8),
(258, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 9),
(259, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 21),
(260, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 22),
(261, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 24),
(262, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 30),
(263, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 31),
(264, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 32),
(265, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 33),
(266, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 34),
(267, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 35),
(268, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 36),
(269, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 37),
(270, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 38),
(271, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-04', 'active', '7', '', 1, 'D', 39),
(272, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 7),
(273, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 8),
(274, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 9),
(275, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 21),
(276, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 22),
(277, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 23),
(278, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 24),
(279, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 30),
(280, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 31),
(281, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 32),
(282, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 33),
(283, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 34),
(284, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 35),
(285, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 36),
(286, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 37),
(287, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 38),
(288, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 39),
(289, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-02', 'active', '7', '', 1, 'D', 40),
(290, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 7),
(291, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 8),
(292, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 9),
(293, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 21),
(294, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 22),
(295, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 23),
(296, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 24),
(297, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 30),
(298, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 31),
(299, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 32),
(300, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 33),
(301, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 34),
(302, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 35),
(303, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 36),
(304, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 37),
(305, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 38),
(306, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 39),
(307, 0, 4, 'P', 2018, '01', '2018-01-04 00:00:00', '2018-01-01', 'active', '7', '', 1, 'D', 40),
(308, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 7),
(309, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 8),
(310, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 9),
(311, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 21),
(312, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 22),
(313, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 23),
(314, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 24),
(315, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 30),
(316, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 31),
(317, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 32),
(318, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 33),
(319, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 34),
(320, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 35),
(321, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 36),
(322, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 37),
(323, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 38),
(324, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 39),
(325, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-26', 'active', '7', '', 1, 'D', 40),
(326, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 7),
(327, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 8),
(328, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 9),
(329, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 21),
(330, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 22),
(331, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 23),
(332, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 24),
(333, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 30),
(334, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 31),
(335, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 32),
(336, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 33),
(337, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 34),
(338, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 35),
(339, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 36),
(340, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 37),
(341, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 38),
(342, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 39),
(343, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-25', 'active', '7', '', 1, 'D', 40),
(344, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 7),
(345, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 8),
(346, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 9),
(347, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 21),
(348, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 22),
(349, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 23),
(350, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 24),
(351, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 30),
(352, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 31),
(353, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 32),
(354, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 33),
(355, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 34),
(356, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 35),
(357, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 36),
(358, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 37),
(359, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 38),
(360, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 39),
(361, 0, 4, 'P', 2017, '12', '2018-01-04 00:00:00', '2017-12-31', 'active', '7', '', 1, 'D', 40),
(362, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 9),
(363, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 21),
(364, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 22),
(365, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 23),
(366, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 24),
(367, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 30),
(368, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 31),
(369, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 35),
(370, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 36),
(371, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 37),
(372, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 38),
(373, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 39),
(374, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-16', 'active', '7', '', 1, 'D', 40),
(375, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 9),
(376, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 21),
(377, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 22),
(378, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 23),
(379, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 24),
(380, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 30),
(381, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 31),
(382, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 32),
(383, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 33),
(384, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 34),
(385, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 35),
(386, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 36),
(387, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 37),
(388, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 38),
(389, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 39),
(390, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-17', 'active', '7', '', 1, 'D', 40),
(391, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 7),
(392, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 8),
(393, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 9),
(394, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 21),
(395, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 22),
(396, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 23),
(397, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 24),
(398, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 30),
(399, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 31),
(400, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 32),
(401, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 33),
(402, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 34),
(403, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 35),
(404, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 36),
(405, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 37),
(406, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 38),
(407, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 39),
(408, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-18', 'active', '7', '', 1, 'D', 40),
(409, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 9),
(410, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 21),
(411, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 22),
(412, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 23),
(413, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 24),
(414, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 30),
(415, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 31),
(416, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 32),
(417, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 33),
(418, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 34),
(419, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 35),
(420, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 36),
(421, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 37),
(422, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 38),
(423, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 39),
(424, 0, 4, 'P', 2017, '08', '2018-01-04 00:00:00', '2017-08-19', 'active', '7', '', 1, 'D', 40),
(425, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 7),
(426, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 8),
(427, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 9),
(428, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 21),
(429, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 22),
(430, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 23),
(431, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 24),
(432, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 32),
(433, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 33),
(434, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 34),
(435, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 35),
(436, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 36),
(437, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 37),
(438, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 38),
(439, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 39),
(440, 0, 4, 'P', 2018, '01', '2018-01-05 00:00:00', '2018-01-05', 'active', '7', '', 1, 'D', 40),
(441, 0, 0, 'P', 2018, '01', '2018-01-09 17:27:15', '2018-01-09', 'active', '7', '', 1, 'D', 23),
(442, 0, 4, 'P', 2018, '01', '2018-01-09 17:27:19', '2018-01-09', 'active', '7', '', 1, 'D', 8),
(443, 0, 0, 'A', 2018, '01', '2018-01-09 17:27:23', '2018-01-09', 'active', '7', '', 1, 'D', 21),
(444, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 7),
(445, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 9),
(446, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 22),
(447, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 24),
(448, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 32),
(449, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 33),
(450, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 34),
(451, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 35),
(452, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 36),
(453, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 37),
(454, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 38),
(455, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 39),
(456, 0, 4, 'P', 2018, '01', '2018-01-09 00:00:00', '2018-01-09', 'active', '7', '', 1, 'D', 40),
(457, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 7),
(458, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 8),
(459, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 9),
(460, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 21),
(461, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 22),
(462, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 23),
(463, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 24),
(464, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 32),
(465, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 33),
(466, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 34),
(467, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 35),
(468, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 36),
(469, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 37),
(470, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 38),
(471, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 39),
(472, 0, 4, 'P', 2017, '01', '2018-01-17 00:00:00', '2017-01-17', 'active', '7', '', 1, 'D', 40),
(473, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 7),
(474, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 8),
(475, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 9),
(476, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 21),
(477, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 22),
(478, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 23),
(479, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 24),
(480, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 32),
(481, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 33),
(482, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 34),
(483, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 35),
(484, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 36),
(485, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 37),
(486, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 38),
(487, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 39),
(488, 0, 4, 'P', 2018, '01', '2018-01-17 00:00:00', '2018-01-17', 'active', '7', '', 1, 'D', 40),
(489, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 7),
(490, 0, 4, 'A', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 8),
(491, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 9),
(492, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 21),
(493, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 22),
(494, 0, 4, 'A', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 23),
(495, 0, 4, 'H', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 24),
(496, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 32),
(497, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 33),
(498, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 34),
(499, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 35),
(500, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 36),
(501, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 37),
(502, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 38),
(503, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 39),
(504, 0, 4, 'P', 2018, '01', '2018-01-20 00:00:00', '2018-01-20', 'active', '7', '', 1, 'D', 40),
(505, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 7),
(506, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 8),
(507, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 9),
(508, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 21),
(509, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 22),
(510, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 23),
(511, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 24);
INSERT INTO `tbl_attendance` (`aid`, `roll_no`, `tid`, `attendance_status`, `year`, `month`, `date`, `attendance_date`, `status`, `class_name`, `anual_year`, `pid`, `divsion`, `ptid`) VALUES
(512, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 32),
(513, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 33),
(514, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 34),
(515, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 35),
(516, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 36),
(517, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 37),
(518, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 38),
(519, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 39),
(520, 0, 4, 'P', 2018, '02', '2018-02-16 00:00:00', '2018-02-16', 'active', '7', '', 1, 'D', 40),
(521, 0, 0, 'P', 2018, '03', '2018-03-02 14:02:06', '2018-03-02', 'active', '7', '', 1, 'D', 9),
(522, 0, 0, 'A', 2018, '03', '2018-03-02 14:02:17', '2018-03-02', 'active', '7', '', 1, 'D', 23),
(523, 0, 0, 'P', 2018, '03', '2018-03-02 14:02:24', '2018-03-02', 'active', '7', '', 1, 'D', 48),
(524, 0, 0, 'P', 2018, '03', '2018-03-02 14:02:40', '2018-03-02', 'active', '7', '', 1, 'D', 24),
(525, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 7),
(526, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 21),
(527, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 22),
(528, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 32),
(529, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 33),
(530, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 34),
(531, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 35),
(532, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 36),
(533, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 37),
(534, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 38),
(535, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 39),
(536, 0, 4, 'P', 2018, '03', '2018-03-02 00:00:00', '2018-03-02', 'active', '7', '', 1, 'D', 40),
(537, 0, 0, 'P', 2018, '05', '2018-05-19 19:44:12', '2018-05-19', 'active', '7', '', 1, 'D', 9),
(538, 0, 0, 'P', 2018, '05', '2018-05-19 19:44:14', '2018-05-19', 'active', '7', '', 1, 'D', 23),
(539, 0, 0, 'P', 2018, '05', '2018-05-19 19:44:15', '2018-05-19', 'active', '7', '', 1, 'D', 48),
(540, 0, 0, 'P', 2018, '05', '2018-05-19 19:44:16', '2018-05-19', 'active', '7', '', 1, 'D', 24),
(541, 0, 0, 'P', 2018, '05', '2018-05-19 19:44:18', '2018-05-19', 'active', '7', '', 1, 'D', 21),
(542, 0, 0, 'P', 2018, '05', '2018-05-19 19:44:19', '2018-05-19', 'active', '7', '', 1, 'D', 22),
(543, 0, 0, 'P', 2018, '05', '2018-05-19 19:44:20', '2018-05-19', 'active', '7', '', 1, 'D', 34),
(544, 0, 0, 'P', 2018, '05', '2018-05-19 19:44:25', '2018-05-19', 'active', '7', '', 1, 'D', 37),
(545, 0, 0, 'P', 2018, '05', '2018-05-19 19:44:27', '2018-05-19', 'active', '7', '', 1, 'D', 39),
(546, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-19', 'active', '7', '', 1, 'D', 7),
(547, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-19', 'active', '7', '', 1, 'D', 32),
(548, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-19', 'active', '7', '', 1, 'D', 33),
(549, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-19', 'active', '7', '', 1, 'D', 35),
(550, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-19', 'active', '7', '', 1, 'D', 36),
(551, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-19', 'active', '7', '', 1, 'D', 38),
(552, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-19', 'active', '7', '', 1, 'D', 40),
(553, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 7),
(554, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 9),
(555, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 21),
(556, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 22),
(557, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 23),
(558, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 24),
(559, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 32),
(560, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 33),
(561, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 34),
(562, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 35),
(563, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 36),
(564, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 37),
(565, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 38),
(566, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 39),
(567, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 40),
(568, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-18', 'active', '7', '', 1, 'D', 48),
(569, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 7),
(570, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 9),
(571, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 21),
(572, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 22),
(573, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 23),
(574, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 24),
(575, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 32),
(576, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 33),
(577, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 34),
(578, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 35),
(579, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 36),
(580, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 37),
(581, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 38),
(582, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 39),
(583, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 40),
(584, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-17', 'active', '7', '', 1, 'D', 48),
(585, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 7),
(586, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 9),
(587, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 21),
(588, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 22),
(589, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 23),
(590, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 24),
(591, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 32),
(592, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 33),
(593, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 34),
(594, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 35),
(595, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 36),
(596, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 37),
(597, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 38),
(598, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 39),
(599, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 40),
(600, 0, 4, 'P', 2018, '05', '2018-05-19 00:00:00', '2018-05-16', 'active', '7', '', 1, 'D', 48),
(601, 0, 0, 'P', 2018, '05', '2018-05-21 18:59:57', '2018-05-21', 'active', '7', '', 1, 'D', 9),
(602, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 7),
(603, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 21),
(604, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 22),
(605, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 23),
(606, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 24),
(607, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 32),
(608, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 33),
(609, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 34),
(610, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 35),
(611, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 36),
(612, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 37),
(613, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 38),
(614, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 39),
(615, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 40),
(616, 0, 4, 'P', 2018, '05', '2018-05-21 00:00:00', '2018-05-21', 'active', '7', '', 1, 'D', 48),
(617, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 7),
(618, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 9),
(619, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 21),
(620, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 22),
(621, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 23),
(622, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 24),
(623, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 32),
(624, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 33),
(625, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 34),
(626, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 35),
(627, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 36),
(628, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 37),
(629, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 38),
(630, 0, 4, 'A', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 39),
(631, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 40),
(632, 0, 4, 'P', 2018, '05', '2018-05-26 00:00:00', '2018-05-26', 'active', '7', '', 1, 'D', 48);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bonafied`
--

CREATE TABLE `tbl_bonafied` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `bonafied_no` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bonafied`
--

INSERT INTO `tbl_bonafied` (`id`, `request_id`, `pid`, `sid`, `created_date`, `bonafied_no`) VALUES
(2, 2, 1, 7, '2018-01-20', 1),
(3, 9, 1, 9, '2018-01-20', 2),
(4, 11, 1, 23, '2018-02-22', 3),
(5, 14, 1, 14, '2018-03-13', 604859);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_type_master`
--

CREATE TABLE `tbl_exam_type_master` (
  `id` int(11) NOT NULL,
  `type` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_exam_type_master`
--

INSERT INTO `tbl_exam_type_master` (`id`, `type`) VALUES
(1, 'घटक चाचणी'),
(2, 'तोंडी काम / गट चर्चा / वाचन'),
(3, 'उपक्रम / प्रयोग / स्वयं मूल्यमापन '),
(4, 'प्रकल्प गटकार्य '),
(5, 'स्वाध्याय'),
(6, 'तोंडी / प्रात्यक्षिक '),
(7, 'लेखी ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees`
--

CREATE TABLE `tbl_fees` (
  `id` int(11) NOT NULL,
  `total_fees` double NOT NULL,
  `total_discount_fees` double NOT NULL,
  `dicount_percentage` int(11) NOT NULL,
  `exam_total_fees` double NOT NULL,
  `exam_recives_fess` double NOT NULL,
  `tour_total_fees` double NOT NULL,
  `tour_recives_fess` double NOT NULL,
  `other_total_fees` double NOT NULL,
  `other_recive_fees` double NOT NULL,
  `exam_fees_date` varchar(100) NOT NULL,
  `tour_fees_date` varchar(100) NOT NULL,
  `other_fees_date` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `pid` int(11) NOT NULL,
  `division` varchar(200) CHARACTER SET utf8 NOT NULL,
  `class` varchar(50) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fees`
--

INSERT INTO `tbl_fees` (`id`, `total_fees`, `total_discount_fees`, `dicount_percentage`, `exam_total_fees`, `exam_recives_fess`, `tour_total_fees`, `tour_recives_fess`, `other_total_fees`, `other_recive_fees`, `exam_fees_date`, `tour_fees_date`, `other_fees_date`, `create_date`, `pid`, `division`, `class`, `parent_id`) VALUES
(1, 10000, 9000, 10, 2000, 2000, 2000, 2000, 0, 0, '04-01-2018', '04-01-2018', '04-01-2018', '2018-01-04', 1, 'D', '7', 9),
(3, 10000, 9000, 10, 2000, 1000, 2000, 200, 0, 0, '04-01-2018', '04-01-2018', '04-01-2018', '2018-01-04', 1, '1', '5', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees_discount_master`
--

CREATE TABLE `tbl_fees_discount_master` (
  `id` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fees_discount_master`
--

INSERT INTO `tbl_fees_discount_master` (`id`, `discount`) VALUES
(1, 5),
(2, 10),
(11, 15),
(12, 20),
(13, 25),
(14, 30),
(15, 35),
(16, 40),
(17, 45),
(18, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees_master`
--

CREATE TABLE `tbl_fees_master` (
  `id` int(11) NOT NULL,
  `total_fees` float(10,2) NOT NULL,
  `total_discount_fees` float(10,2) NOT NULL,
  `dicount_percentage` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `pid` int(11) NOT NULL,
  `division` varchar(200) CHARACTER SET utf8 NOT NULL,
  `class` varchar(50) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fees_master`
--

INSERT INTO `tbl_fees_master` (`id`, `total_fees`, `total_discount_fees`, `dicount_percentage`, `create_date`, `pid`, `division`, `class`, `parent_id`) VALUES
(1, 10000.00, 9500.00, 5, '2018-05-20', 1, 'D', '7', 9),
(2, 30000.00, 30000.00, 0, '2018-06-20', 1, 'A', '1', 50),
(3, 20000.00, 19000.00, 5, '2018-06-26', 1, '', '', 59);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees_type`
--

CREATE TABLE `tbl_fees_type` (
  `id` int(11) NOT NULL,
  `fees_id` bigint(20) NOT NULL,
  `fees_type` varchar(100) NOT NULL,
  `total_fees` float(10,2) NOT NULL,
  `paid_fees` float(10,2) NOT NULL,
  `remaining_fees` float(10,2) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fees_type`
--

INSERT INTO `tbl_fees_type` (`id`, `fees_id`, `fees_type`, `total_fees`, `paid_fees`, `remaining_fees`, `created_date`) VALUES
(1, 1, 'tuition fees', 6000.00, 6000.00, 0.00, '2018-05-20'),
(2, 1, 'examination fees', 2000.00, 2000.00, 0.00, '2018-05-20'),
(3, 1, 'other fees', 1500.00, 1000.00, 0.00, '2018-05-20'),
(4, 1, '', 0.00, 0.00, 0.00, '0000-00-00'),
(5, 1, '', 0.00, 0.00, 0.00, '0000-00-00'),
(6, 2, 'tuition fees', 2000.00, 2000.00, 2000.00, '2018-06-20'),
(7, 2, '', 0.00, 0.00, 0.00, '0000-00-00'),
(8, 2, '', 0.00, 0.00, 0.00, '0000-00-00'),
(9, 2, '', 0.00, 0.00, 0.00, '0000-00-00'),
(10, 2, '', 0.00, 0.00, 0.00, '0000-00-00'),
(11, 3, 'tuition fees', 2000.00, 1000.00, 0.00, '2018-06-26'),
(12, 3, 'examination fees', 1000.00, 1000.00, 0.00, '2018-06-05'),
(13, 3, 'Trip Fees', 1000.00, 2000.00, 0.00, '2018-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_final_result_master`
--

CREATE TABLE `tbl_final_result_master` (
  `id` int(11) NOT NULL,
  `class` varchar(200) NOT NULL,
  `division` varchar(200) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `examination_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(200) CHARACTER SET utf8 NOT NULL,
  `pid` int(11) NOT NULL,
  `exam_type` varchar(200) NOT NULL,
  `year` year(4) NOT NULL,
  `exam_no` varchar(200) NOT NULL,
  `obtained_marks` int(11) NOT NULL,
  `total_marks` varchar(40) CHARACTER SET utf8 NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_final_result_master`
--

INSERT INTO `tbl_final_result_master` (`id`, `class`, `division`, `parent_id`, `examination_name`, `subject`, `pid`, `exam_type`, `year`, `exam_no`, `obtained_marks`, `total_marks`, `created_date`) VALUES
(1, '7', 'D', 7, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1001', 50, '100', '2018-07-02'),
(2, '7', 'D', 8, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1002', 51, '100', '2018-07-02'),
(3, '7', 'D', 9, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1003', 52, '100', '2018-07-02'),
(4, '7', 'D', 21, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1004', 53, '100', '2018-07-02'),
(5, '7', 'D', 22, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1005', 54, '100', '2018-07-02'),
(6, '7', 'D', 23, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1006', 55, '100', '2018-07-02'),
(7, '7', 'D', 24, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1007', 56, '100', '2018-07-02'),
(8, '7', 'D', 32, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1011', 60, '100', '2018-07-02'),
(9, '7', 'D', 33, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1012', 61, '100', '2018-07-02'),
(10, '7', 'D', 34, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1013', 62, '100', '2018-07-02'),
(11, '7', 'D', 38, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1014', 63, '100', '2018-07-02'),
(12, '7', 'D', 39, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1015', 64, '100', '2018-07-02'),
(13, '7', 'D', 40, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1016', 65, '100', '2018-07-02'),
(14, '7', 'D', 44, 'स्वाध्याय', 'संगणक', 0, 'First Terms', 2018, '1017', 66, '100', '2018-07-02'),
(15, '7', 'D', 58, 'स्वाध्याय', 'संगणक', 1, 'First Terms', 2018, '1018', 67, '100', '2018-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_installment_amount`
--

CREATE TABLE `tbl_installment_amount` (
  `id` int(11) NOT NULL,
  `fees_id` int(11) NOT NULL,
  `installment_amount` double NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_installment_amount`
--

INSERT INTO `tbl_installment_amount` (`id`, `fees_id`, `installment_amount`, `date`) VALUES
(1, 1, 2000, '04-01-2018'),
(2, 1, 500, '04-01-2018'),
(3, 1, 7000, '04-01-2018'),
(4, 3, 3000, '04-01-2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL,
  `po_number` varchar(30) NOT NULL,
  `valid_from` date NOT NULL,
  `til_date` date NOT NULL,
  `payment_terms` varchar(300) NOT NULL,
  `registration_charges` double NOT NULL,
  `software_charges` double NOT NULL,
  `data_entry_charges` double NOT NULL,
  `maintenance_charges` double NOT NULL,
  `customization_charges` double NOT NULL,
  `reactivation_charges` bigint(20) NOT NULL,
  `other_charges` double NOT NULL,
  `pid` int(11) NOT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `status` enum('PAID','UNPAID') NOT NULL,
  `school_status` enum('PAID','UNPAID') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `po_number`, `valid_from`, `til_date`, `payment_terms`, `registration_charges`, `software_charges`, `data_entry_charges`, `maintenance_charges`, `customization_charges`, `reactivation_charges`, `other_charges`, `pid`, `invoice_no`, `created_date`, `status`, `school_status`) VALUES
(1, '', '2018-02-01', '2019-02-01', '50% Advance Payment Against Invoice', 1, 1, 0, 0, 0, 0, 0, 14, 'VSM-47861', '2018-02-21', 'PAID', 'PAID'),
(2, '', '2018-02-01', '2018-02-28', '100 % advance amount', 10, 10, 10, 10, 10, 0, 10, 12, 'VSM-34701', '2018-02-26', 'PAID', 'PAID'),
(3, '', '2018-02-01', '2018-02-28', '50 Percentage', 10, 10, 10, 10, 10, 0, 10, 14, 'VSM-40454', '2018-02-26', 'PAID', 'PAID'),
(4, '', '2018-02-01', '2018-02-26', 'percentage', 10, 10, 10, 10, 10, 10, 10, 14, 'VSM-71222', '2018-02-26', 'PAID', 'PAID'),
(5, '', '2018-03-01', '2018-03-07', 'dd', 24, 46, 76, 45, 78, 45, 456, 1, 'VSM-50623', '2018-03-11', 'PAID', 'PAID'),
(6, '', '2018-05-10', '2018-05-31', '50 percentage advance', 200, 300, 300, 200, 200, 100, 200, 1, 'VSM-13762', '2018-05-09', 'PAID', 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_slider`
--

CREATE TABLE `tbl_main_slider` (
  `mid` int(11) NOT NULL,
  `slider_banner_images` varchar(500) NOT NULL,
  `slider_Heading` varchar(300) NOT NULL,
  `slider_small_heading` varchar(300) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `pid` int(11) NOT NULL,
  `slider_type` enum('supper','schools') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_main_slider`
--

INSERT INTO `tbl_main_slider` (`mid`, `slider_banner_images`, `slider_Heading`, `slider_small_heading`, `datetime`, `status`, `pid`, `slider_type`) VALUES
(2, 's1_2278.jpg', 'Schools Mangement System', 'online attendance Mangement', '2017-08-20 13:38:10', 'active', 0, 'supper'),
(3, 's2_5595.jpg', 'E Learning Schools', 'Digital schools', '2017-08-20 13:39:04', 'active', 0, 'supper'),
(4, 's3_3910.jpg', 'Schools Mangement System', 'learning phase schools', '2017-08-20 13:40:01', 'active', 0, 'supper'),
(5, '18268549_1456744011015349_5110630634969048269_n.jpg', 'Main Sliders', 'Digital schools', '2017-08-25 19:30:48', 'active', 0, 'schools'),
(6, 'FB_IMG_1471115713462.jpg', 'Main Sliders', 'Digital schools', '2017-08-25 19:33:53', 'active', 0, 'supper'),
(7, 'Windows Photo Viewer Wallpaper.jpg', '', '', '2017-09-25 18:01:03', 'active', 1, 'schools'),
(8, '3d-demo1.gif', '', '', '2017-09-30 09:16:05', 'active', 1, 'schools'),
(9, 'Christmas-Images.jpg', '', '', '2017-11-21 16:00:13', 'active', 0, 'supper'),
(10, 'avatar-3.jpg', '', '', '2018-08-24 19:23:34', 'active', 1, 'schools'),
(11, 'a-man-doing-cryptocoin-mining_1308-10548.jpg', 'asdfsaf', 'asdfsa', '2018-09-26 08:38:59', 'active', 0, 'supper');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parent`
--

CREATE TABLE `tbl_parent` (
  `Ptid` int(11) NOT NULL,
  `gr_code` varchar(200) CHARACTER SET utf8 NOT NULL,
  `admission_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `adhar_card` varchar(15) CHARACTER SET utf8 NOT NULL,
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `Student_name` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `Student_roll_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Student_year` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Student_class_division` varchar(200) CHARACTER SET utf8 NOT NULL,
  `divsion` varchar(20) NOT NULL,
  `Parent_email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Parent_password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Parent_mobile_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Student_profile_picture` varchar(500) CHARACTER SET utf8 NOT NULL,
  `dob` date NOT NULL,
  `date_of_birth_word` varchar(300) CHARACTER SET utf8 NOT NULL,
  `pan_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(300) CHARACTER SET utf8 NOT NULL,
  `old_schools` varchar(500) CHARACTER SET utf8 NOT NULL,
  `account_no` varchar(300) CHARACTER SET utf8 NOT NULL,
  `bank_no` varchar(200) CHARACTER SET utf8 NOT NULL,
  `ifc_code` varchar(20) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `redensital_address` varchar(200) CHARACTER SET utf8 NOT NULL,
  `cast` varchar(200) CHARACTER SET utf8 NOT NULL,
  `sub_cast` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Subgenre` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  `Status` enum('active','inactive') NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8 NOT NULL,
  `admission_date` date NOT NULL,
  `student_id_no` varchar(30) NOT NULL,
  `u_id_no` varchar(50) NOT NULL,
  `medium` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `birth_place` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_parent`
--

INSERT INTO `tbl_parent` (`Ptid`, `gr_code`, `admission_no`, `adhar_card`, `tid`, `pid`, `Student_name`, `Student_roll_no`, `Student_year`, `Student_class_division`, `divsion`, `Parent_email`, `Parent_password`, `Parent_mobile_no`, `Student_profile_picture`, `dob`, `date_of_birth_word`, `pan_no`, `address`, `old_schools`, `account_no`, `bank_no`, `ifc_code`, `mother_name`, `redensital_address`, `cast`, `sub_cast`, `Subgenre`, `Date`, `Status`, `gender`, `admission_date`, `student_id_no`, `u_id_no`, `medium`, `nationality`, `birth_place`) VALUES
(7, '45', '', '454545442323', 4, 1, 'विजय पांडुरंग जधव', '1002', '2017-2018', '7', 'D', '', '', '9158680769', '', '2017-08-10', 'ten aguest two thousand seventee', '345v', 'pune', 'my schools', '42151656232', 'maharshtra bank india', '342424ac', 'xyz', '', 'Hindu', 'VJ', '', '2017-08-10 08:57:46', 'active', 'Male', '0000-00-00', '452423', '', '', '', '0'),
(8, '33', '', '234234532345', 4, 1, 'sandip', '1003', '2017-2018', '7', 'B', '', '', '9451217845', '', '2017-08-26', '', '2344', 'pune', 'none', '3435354', 'maharshtra', 'good', 'v', '', '', '', '', '2017-08-10 10:47:32', 'active', 'पुरुष ', '0000-00-00', '234525345', '', '', '', '0'),
(9, '345', '', '343434231289', 0, 1, 'Chiku Jadhav', '1005', '2017-2018', '7', 'D', '', '', '7798605708', 'news_image_04_8156.jpg', '2000-04-18', 'fourteen aguest nitin', 'HDV234D', 'dharmapuri', 'zp nanded', '345343434', 'marshtra gramin bank', '', 'Pooja', 'dharmapuri', 'Hindu', 'OBC', '', '2017-10-19 10:16:54', 'active', 'Male', '2017-06-07', '34353', '4444', 'Semi English', 'India', 'dharmapuri'),
(14, '162483244', '', '324122754545', 0, 1, 'Namrata Narayan Musande', '2013271506082010000', '2017-2018', '5', '1', '', '', '9158680769', '', '2017-10-18', '', '', '', '', '', '', '', 'Sunita', '?????? ???? ????', 'Hindu', 'General', 'banjara', '2017-10-28 10:33:09', 'active', 'Female', '0000-00-00', '234523543', '', '', '', '0'),
(15, '16141', '', '43325523523', 0, 1, 'Prabhudda Gundaji Akhargekar', '2013271506113090000', '', '5', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'Kalpana', '', 'Hindu', 'SC', '', '2017-10-28 10:33:09', 'active', 'M', '0000-00-00', '34535', '', '', '', '0'),
(16, '15885', '', '524353254', 0, 1, 'Sidheshwar Shivaji Kadam', '2013272704011010000', '', '5', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '?????? ???? ????', '', 'Hindu', 'General', '', '2017-10-28 10:33:09', 'active', 'M', '0000-00-00', '', '', '', '', '0'),
(17, '15975', '', '4353457666', 0, 1, 'सोन्या गणपत पवार', '2013272708040020000', '', '5', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'Anuja', '', 'Hindu', 'General', '', '2017-10-28 10:33:09', 'active', 'M', '0000-00-00', '123414', '12341234124', '', '', '0'),
(18, '16009', '', '35235', 0, 1, 'Krushna Dayanand Kadam', '2013272801043010000', '', '5', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'Aasha', '', '', '', '', '2017-10-28 10:33:09', 'active', 'M', '0000-00-00', '', '', '', '', '0'),
(21, '45566', '', '234561245165', 0, 1, 'XYZ afasf', '1008', '2017-2018', '7', 'D', '', '', '9158680769', 'Christmas-Images_9326.jpg', '1970-01-01', 'fourteen aguest nitin', 'fffa345', 'kandhar', 'none', '34543535', 'fac4552', '', 'INDU', 'kandhar', 'VJ', 'Banjara', '', '2017-10-31 18:39:06', 'active', 'Female', '0000-00-00', '', '', '', '', '0'),
(22, '45566', '', '234561245235', 0, 1, 'XYZsdfgdsfg', '1008', '2017-2018', '7', 'D', '', '', '9158680769', 'Christmas-Images_3066.jpg', '1970-01-01', 'fourteen aguest nitin', 'fffa345', 'kandhar', 'none', '34543535', 'fac4552', '', 'INDU', 'kandhar', 'VJ', 'Banjara', '', '2017-10-31 18:44:51', 'active', 'Female', '0000-00-00', '', '', '', '', '0'),
(23, '45566', '', '234531245235', 0, 1, 'Pintu  Jadhav', '1008', '', '7', 'D', '', '', '9158680769', '', '2017-10-25', '', 'fffa345', 'kandhar', 'none', '34543535', 'fac4552', '', 'INDU', 'kandhar', 'VJ', 'Banjara', '', '2017-11-28 17:57:22', 'active', 'male', '0000-00-00', '', '', '', '', '0'),
(24, '3244', '', '535435334244', 0, 1, 'xyz', '10034', '2017-2018', '7', 'D', '', '', '9158680769', '', '2017-12-08', 'fourteen aguest nitin', 'dasfe4', 'nanded', 'zp kandhar', '34324', '4354353', '52352', 'sx', 'SDSSD', 'Hindu', 'NT-C', '', '2017-12-08 18:49:09', 'active', 'Male', '0000-00-00', '', '555', 'Marathi', 'inida', 'kandhar'),
(25, '162483244', '', '344434343545', 0, 1, 'xyz', '1001', '2017-2018', '9', 'B', '', '', '9158680769', '', '2017-12-08', 'fourteen aguest nitin', 'af', 'nanded', 'zp kandhar', '34535', '4535', 'sadfds', 'zyz', 'afasdf', 'Hindu', 'NT-C', '', '2017-12-08 18:51:53', 'active', 'Male', '0000-00-00', '', '555', 'Semi English', 'dsfs', 'dasfd'),
(26, '162483244', '', '451263451245', 0, 1, 'xyz', '', '2017-2018', '6', 'C', '', '', '9158680769', '', '2017-12-13', 'fourteen aguest nitin', '', '', 'zp kandhar', '', '', '', 'sx', '', 'Buddh', 'OPEN', '', '2017-12-08 18:54:35', 'active', 'Male', '0000-00-00', '', '555', '', '', ''),
(27, '162483244', '', '451263451223', 0, 1, 'xyz', '', '2017-2018', '6', 'C', '', '', '9158680769', '', '2017-12-13', 'fourteen aguest nitin', '', '', 'zp kandhar', '', '', '', 'sx', '', 'Buddh', 'OPEN', '', '2017-12-08 18:56:23', 'active', 'Male', '0000-00-00', '', '555', '', '', ''),
(28, '162483244', '', '451263451223', 0, 1, 'xyz', '', '2017-2018', '6', 'C', '', '', '9158680769', '', '2017-12-13', 'fourteen aguest nitin', '', '', 'zp kandhar', '', '', '', 'sx', '', 'Buddh', 'OPEN', '', '2017-12-08 18:56:23', 'active', 'Male', '0000-00-00', '', '555', '', '', ''),
(32, '3447', '', '455657544451', 0, 1, 'विजय पांडुरंग जधव', '10003', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2017-12-10 10:39:37', 'active', 'Male', '1970-01-01', '4554661', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(33, '3442', '', '455657544453', 0, 1, 'बळीराम पांडुरंग जधव', '10002', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2017-12-10 10:39:37', 'active', 'Male', '1970-01-01', '4554666', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(34, '3441', '', '455657544455', 0, 1, 'गजानन पांडुरंग जधव', '10004', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2017-12-10 10:39:37', 'active', 'Male', '1970-01-01', '4554667', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(35, '3447', '', '455657544451', 0, 1, 'विजय पांडुरंग जधव', '10003', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-01-03 08:04:34', 'active', 'Male', '1970-01-01', '4554661', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(36, '3442', '', '455657544453', 0, 1, 'बळीराम पांडुरंग जधव', '10002', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-01-03 08:04:35', 'active', 'Male', '1970-01-01', '4554666', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(37, '3441', '', '455657544455', 0, 1, 'गजानन पांडुरंग जधव', '10004', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-01-03 08:04:35', 'active', 'Male', '1970-01-01', '4554667', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(38, '3447', '', '455651344451', 0, 1, 'विलास  किसन जाधव', '10004', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-01-03 08:09:59', 'active', 'Male', '1970-01-01', '4554661', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(39, '3442', '', '455652144453', 0, 1, 'नितीन किसण जाधव', '10005', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-01-03 08:09:59', 'active', 'Male', '1970-01-01', '4554666', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(40, '3441', '', '455636544455', 0, 1, 'सतीश किशन जाधव', '10007', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-01-03 08:09:59', 'active', 'Male', '1970-01-01', '4554667', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(41, '4334', '', '451245784578', 0, 1, 'rahul rathod', '', '2017-2018', '4', 'C', '', '', '', '', '2018-01-08', 'god', '', 'kandhar', '', '', '', '', 'asha', '', 'Hindu', 'OPEN', '', '2018-01-22 16:09:27', 'active', 'पुरुष ', '0000-00-00', '', '', 'Marathi', 'india', 'pune'),
(42, '453535', '', '546323436545', 0, 1, 'rahul rathod', '40032', '2017-2018', '3', 'A', '', '', '9158684565', '', '2018-01-02', 'fifth augest two thousand twoell', 'USD343322', 'good', 'xyz', '', '', '', 'OX', '', 'Hindu', 'NT-D', '', '2018-01-22 16:20:32', 'active', 'पुरुष ', '2018-01-02', '4043243', '453534', 'General', 'XX', ''),
(43, '', '', '435352532223', 0, 1, 'vilas', '245', '2017-2018', '1 ', 'None', '', '', '9158689022', 'John_McAfee_1274.jpg', '2018-02-14', '', '', 'dharmapuri', '', '', '', '', 'kamal', '', 'Hindu', 'VJ', 'Banjara', '2018-02-22 17:48:16', 'active', 'पुरुष ', '0000-00-00', '', '', 'Marathi', '', ''),
(44, '4566', '', '454334233313', 0, 1, 'raj', '', '2018-2019', '7', 'D', '', '', '914954035', '', '1970-01-01', 'done', 'bdc', 'pune', 'new', '', '', '', 'rani', '', 'hindu', 'vj', 'banajara', '2018-02-22 18:22:01', 'active', 'male', '1970-01-01', '3567', '3566', 'Marathi', 'indian', 'pune'),
(46, '4566', '', '454334233313', 0, 12, 'raj', '', '2018-2019', '7', 'D', '', '', '914954035', '', '1970-01-01', 'done', 'bdc', 'pune', 'new', '', '', '', 'rani', '', 'hindu', 'vj', 'banajara', '2018-02-22 18:24:43', 'active', 'male', '1970-01-01', '3567', '3566', 'Marathi', 'indian', 'pune'),
(48, '4566', '', '454334233313', 0, 1, 'raj', '', '2018-2019', '7', 'D', '', '', '914954035', '', '1970-01-01', 'done', 'bdc', 'pune', 'new', '', '', '', 'rani', '', 'hindu', 'vj', 'banajara', '2018-02-22 18:26:24', 'active', 'male', '1970-01-01', '3567', '3566', 'Marathi', 'indian', 'pune'),
(49, '', '', '111112222233', 0, 1, 'vijay', '', '2018-2019', '4', 'B', '', '', '', '', '2018-05-17', '', '', '', '', '', '', '', 'good', '', '', '', '', '2018-05-17 17:24:01', 'active', 'मुलगा', '2018-05-17', '', '', 'Semi English', '', ''),
(50, '233456', '', '111111111104', 0, 1, 'KRISHNA', '3345', '2018-2019', '1', 'A', '', '', '9158680769', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546D', 'PUNE', 'amal school', '', '', '', 'RANI', '', 'HINDU', 'OPEN', 'MARATHA', '2018-05-20 07:41:20', 'active', 'MALE', '1970-01-01', '23456781', '111111111104', 'Marathi', 'INDIAN', 'nanded'),
(51, '233457', '', '111111111105', 0, 1, 'RAJARAM', '3346', '2018-2019', '1', 'A', '', '', '9158680761', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546E', 'PUNE', 'amal school', '', '', '', 'RUTUJA', '', 'HINDU', 'OPEN', 'LINGAYAT', '2018-05-20 07:41:20', 'active', 'MALE', '1970-01-01', '23456782', '111111111105', 'Marathi', 'INDIAN', 'nanded'),
(52, '233458', '', '111111111106', 0, 1, 'RAM', '3347', '2018-2019', '1', 'A', '', '', '9158680762', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546T', 'PUNE', 'amal school', '', '', '', 'KARISHMA', '', 'HINDU', 'SC', 'MAHAR', '2018-05-20 07:41:20', 'active', 'MALE', '1970-01-01', '23456783', '111111111106', 'Marathi', 'INDIAN', 'nanded'),
(53, '233459', '', '111111111107', 0, 1, 'SEETA', '3348', '2018-2019', '1', 'A', '', '', '9158680763', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546U', 'PUNE', 'amal school', '', '', '', 'RESHMA', '', 'HINDU', 'VJ', 'BANJARA', '2018-05-20 07:41:20', 'active', 'FEMALE', '1970-01-01', '23456784', '111111111107', 'Marathi', 'INDIAN', 'nanded'),
(54, '233460', '', '111111111108', 0, 1, 'SANGEETA', '3349', '2018-2019', '1', 'A', '', '', '9158680764', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546O', 'PUNE', 'amal school', '', '', '', 'ROJA', '', 'HINDU', 'OPEN', 'MARATHA', '2018-05-20 07:41:20', 'active', 'FEMALE', '1970-01-01', '23456785', '111111111108', 'Marathi', 'INDIAN', 'nanded'),
(55, '233461', '', '111111111109', 0, 1, 'MAHESH', '3350', '2018-2019', '1', 'A', '', '', '9158680765', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546P', 'PUNE', 'amal school', '', '', '', 'NITA', '', 'HINDU', 'VJ', 'BANJARA', '2018-05-20 07:41:20', 'active', 'MALE', '2018-01-02', '23456786', '111111111109', 'Marathi', 'INDIAN', 'nanded'),
(58, '323', '34333445', '345678123121', 0, 1, 'Ankur', '223', '2018-2019', '7', 'D', '', '', '9158689534', '', '1970-01-01', '', 'BH', 'nanded', 'MGM College', '', 'dena bank', '', 'pa', 'nanded', '', '', '', '2018-06-26 17:39:16', 'active', 'Male', '1970-01-01', '23433', '3544', 'English', 'india', ''),
(59, '', '', '', 0, 1, '', '', '', '', '', '', '', '', '', '1970-01-01', '', '', '', '', '', '', '', '', '', '', '', '', '2018-06-26 17:39:16', 'active', '', '1970-01-01', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_principle`
--

CREATE TABLE `tbl_principle` (
  `Pid` int(11) NOT NULL,
  `Principle_name` varchar(500) NOT NULL,
  `reg_no` text NOT NULL,
  `Principle_email` varchar(200) NOT NULL,
  `Principle_password` varchar(200) NOT NULL,
  `Principle_school_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Principle_schools_image` varchar(600) NOT NULL,
  `Principle_mobile_no` varchar(20) NOT NULL,
  `Principle_schools_city` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Date` datetime NOT NULL,
  `todate` date NOT NULL,
  `Status` enum('active','inactive') NOT NULL,
  `data_operators` varchar(20) NOT NULL,
  `adhar_card` varchar(20) NOT NULL,
  `pan_card` varchar(20) NOT NULL,
  `monthly_salary` int(11) NOT NULL,
  `acount_no` varchar(20) NOT NULL,
  `ifc_code` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `login_id` int(11) NOT NULL,
  `aternative_phone` varchar(20) NOT NULL,
  `land_line_number` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `establish_year` year(4) NOT NULL,
  `signature` varchar(500) NOT NULL,
  `schools_slogan` varchar(500) CHARACTER SET utf8 NOT NULL,
  `board_of_director` varchar(500) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `sales_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_principle`
--

INSERT INTO `tbl_principle` (`Pid`, `Principle_name`, `reg_no`, `Principle_email`, `Principle_password`, `Principle_school_name`, `Principle_schools_image`, `Principle_mobile_no`, `Principle_schools_city`, `Date`, `todate`, `Status`, `data_operators`, `adhar_card`, `pan_card`, `monthly_salary`, `acount_no`, `ifc_code`, `dob`, `address`, `login_id`, `aternative_phone`, `land_line_number`, `gender`, `establish_year`, `signature`, `schools_slogan`, `board_of_director`, `sales_id`) VALUES
(1, 'Er Vijay Jadhav1', '433555323432', 'vijay171819@gmail.com', '123456', 'सरस्वती प्राथमिक विध्यामंदीर ,प्रकाश नगर लातूर ', 'steamed-bun-dim-sum_original_3065.jpg', '9158680769', 'लातूर (महारष्ट्)', '2017-07-29 00:00:00', '0000-00-00', 'active', 'principal', '', '', 0, '', '', '0000-00-00', 'pune', 0, '', '02466219064', 'Male', 1966, '22489917_1586506964763616_5291962738702275248_n_593.jpg', 'एकता शिक्षण वर्ग ', 'बाल विकास प्रसारक मंडळ लातूर द्वारा  संचालित', 0),
(5, 'sandeep', '', 'ssurwase5@gmail.com', 'india123', 'vimlai school', '', '9561168569', 'latur', '2017-08-08 07:46:15', '0000-00-00', 'active', '', '', '', 0, '', '', '0000-00-00', '', 0, '', '', '', 0000, '', '', '', 0),
(12, 'Er Vijay Jadhav1', 'm,m,.m', 'vijay181zz9@gmail.com', ';lk;lk;l', 'Sarswati Public Schools Kandhar', '', '9158680769', 'Nanded', '2017-12-17 12:50:52', '0000-00-00', 'inactive', 'principal', '', '', 0, '', '', '0000-00-00', 'ghodaj', 0, '', '', '?????', 2015, '', '', '', 0),
(13, 'xyz', '', 'vijay1234522@gmail.com', '123456', '', '', '9158680769', '', '2018-01-07 18:10:42', '0000-00-00', 'active', 'clerk', '324354645753', '5333aa', 3000, '', '', '2018-01-08', 'zyz', 1, '', '', 'Male', 0000, '', '', '', 0),
(14, 'Mr A.D Jadhav', '34403', 'mdjadhav@gmail.com', '123456', 'Ganpat More School', '', '9158680769', '', '2018-01-08 17:57:32', '0000-00-00', 'active', 'principal', '', '', 0, '', '', '0000-00-00', 'bhawani nagar kandhar', 0, '', '', '????? ', 2012, '', '', '', 1),
(15, '3454544', 'asdasdf', 'shilwant121984@gmail.com', '12345', 'school', '', '9158680679', '', '2018-04-14 19:01:01', '0000-00-00', 'inactive', 'principal', '', '', 0, '', '', '0000-00-00', 'asfasfds', 0, '', '', '?????', 2015, '', '', '', 0),
(16, 'Vijay', '200', 'vijay1212@gmail.com', '123456', 'VIDYAVADHINI ENGLISH MEDIUM SCHOOL', '', '9158680769', '', '2018-05-20 18:20:01', '0000-00-00', 'inactive', 'principal', '', '', 0, '', '', '0000-00-00', 'pune', 0, '', '', '?????', 2010, '', '', '', 0),
(17, 'test', '24', 'test12@gmail.com', '12345', 'test', '', '9158680741', '', '2018-05-21 11:19:29', '0000-00-00', 'inactive', 'principal', '', '', 0, '', '', '0000-00-00', 'te', 0, '', '', 'Male', 2017, '', '', '', 0),
(18, 'te', '33', 'vijay18119@gmail.com', '123456', 'test', '', '9123456789', '', '2018-05-21 11:29:10', '0000-00-00', 'inactive', 'principal', '', '', 0, '', '', '0000-00-00', 'test', 0, '', '', 'Male', 2017, '', '', '', 0),
(19, '', '', 'vikadsafaf@gmail.com', '', '', '', '', '', '2018-05-23 05:59:19', '0000-00-00', 'inactive', 'principal', '', '', 0, '', '', '0000-00-00', '', 0, '', '', '', 0000, '', '', '', 0),
(20, 'vijay', '', 'vijay12345@gmail.com', '123456', '', '', '9158680769', '', '2018-05-26 07:08:00', '0000-00-00', 'active', 'clerk', '343242413243', 'BHE34543', 0, '', '', '2018-05-17', 'PUNE', 1, '', '', 'Male', 0000, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_users`
--

CREATE TABLE `tbl_sales_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `pan_no` varchar(30) NOT NULL,
  `aadhar_card` varchar(20) NOT NULL,
  `acount_number` bigint(20) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `signature` varchar(500) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales_users`
--

INSERT INTO `tbl_sales_users` (`id`, `name`, `email`, `password`, `mobile_no`, `pan_no`, `aadhar_card`, `acount_number`, `ifsc_code`, `bank_name`, `signature`, `status`, `created_date`) VALUES
(1, 'sales man', 'sales@gmail.com', '12345678', '9158680769', 'bh3535332', '123456789123', 0, '', '', '', 'active', '2018-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_anual_year`
--

CREATE TABLE `tbl_student_anual_year` (
  `id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_anual_year`
--

INSERT INTO `tbl_student_anual_year` (`id`, `year`) VALUES
(1, '2017-2018'),
(2, '2018-2019'),
(3, '2019-2020'),
(4, '2020-2021'),
(5, '2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_history`
--

CREATE TABLE `tbl_student_history` (
  `Ptid` int(11) NOT NULL,
  `gr_code` varchar(200) CHARACTER SET utf8 NOT NULL,
  `adhar_card` varchar(15) CHARACTER SET utf8 NOT NULL,
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `Student_name` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `Student_roll_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Student_year` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Student_class_division` varchar(200) CHARACTER SET utf8 NOT NULL,
  `divsion` varchar(20) NOT NULL,
  `Parent_email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Parent_password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Parent_mobile_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Student_profile_picture` varchar(500) CHARACTER SET utf8 NOT NULL,
  `dob` date NOT NULL,
  `date_of_birth_word` varchar(300) CHARACTER SET utf8 NOT NULL,
  `pan_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(300) CHARACTER SET utf8 NOT NULL,
  `old_schools` varchar(500) CHARACTER SET utf8 NOT NULL,
  `account_no` varchar(300) CHARACTER SET utf8 NOT NULL,
  `bank_no` varchar(200) CHARACTER SET utf8 NOT NULL,
  `ifc_code` varchar(20) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `redensital_address` varchar(200) CHARACTER SET utf8 NOT NULL,
  `cast` varchar(200) CHARACTER SET utf8 NOT NULL,
  `sub_cast` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Subgenre` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  `Status` enum('active','inactive') NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8 NOT NULL,
  `admission_date` date NOT NULL,
  `student_id_no` varchar(30) NOT NULL,
  `u_id_no` varchar(50) NOT NULL,
  `medium` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `birth_place` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_history`
--

INSERT INTO `tbl_student_history` (`Ptid`, `gr_code`, `adhar_card`, `tid`, `pid`, `Student_name`, `Student_roll_no`, `Student_year`, `Student_class_division`, `divsion`, `Parent_email`, `Parent_password`, `Parent_mobile_no`, `Student_profile_picture`, `dob`, `date_of_birth_word`, `pan_no`, `address`, `old_schools`, `account_no`, `bank_no`, `ifc_code`, `mother_name`, `redensital_address`, `cast`, `sub_cast`, `Subgenre`, `Date`, `Status`, `gender`, `admission_date`, `student_id_no`, `u_id_no`, `medium`, `nationality`, `birth_place`) VALUES
(1, '45', '454545442323', 0, 1, 'विजय पांडुरंग जधव', '1002', '2017-2018', '7', 'D', '', '', '9158680769', '', '2017-08-10', 'ten aguest two thousand seventee', '345v', 'pune', 'my schools', '', 'maharshtra bank india', '342424ac', 'xyz', '', 'Hindu', 'VJ', '', '2018-07-18 16:18:31', 'active', 'Male', '0000-00-00', '452423', '', '', '', '0'),
(2, '33', '234234532345', 0, 1, 'sandip', '1003', '2017-2018', '7', 'B', '', '', '9451217845', '', '2017-08-26', '', '2344', 'pune', 'none', '', 'maharshtra', 'good', 'v', '', '', '', '', '2018-07-18 16:18:31', 'active', 'पुरुष ', '0000-00-00', '234525345', '', '', '', '0'),
(3, '345', '343434231289', 0, 1, 'Chiku Jadhav', '1005', '2017-2018', '7', 'D', '', '', '7798605708', '', '2000-04-18', 'fourteen aguest nitin', 'HDV234D', 'dharmapuri', 'zp nanded', '', 'marshtra gramin bank', '', 'Pooja', '', 'Hindu', 'OBC', '', '2018-07-18 16:18:31', 'active', 'Male', '2017-06-07', '34353', '4444', 'Semi English', 'India', 'dharmapuri'),
(4, '162483244', '324122754545', 0, 1, 'Namrata Narayan Musande', '2013271506082010000', '2017-2018', '5', '1', '', '', '9158680769', '', '2017-10-18', '', '', '', '', '', '', '', 'Sunita', '', 'Hindu', 'General', 'banjara', '2018-07-18 16:18:31', 'active', 'Female', '0000-00-00', '234523543', '', '', '', '0'),
(5, '16141', '43325523523', 0, 1, 'Prabhudda Gundaji Akhargekar', '2013271506113090000', '', '5', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'Kalpana', '', 'Hindu', 'SC', '', '2018-07-18 16:18:31', 'active', 'M', '0000-00-00', '34535', '', '', '', '0'),
(6, '15885', '524353254', 0, 1, 'Sidheshwar Shivaji Kadam', '2013272704011010000', '', '5', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '?????? ???? ????', '', 'Hindu', 'General', '', '2018-07-18 16:18:31', 'active', 'M', '0000-00-00', '', '', '', '', '0'),
(7, '15975', '4353457666', 0, 1, 'सोन्या गणपत पवार', '2013272708040020000', '', '5', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'Anuja', '', 'Hindu', 'General', '', '2018-07-18 16:18:31', 'active', 'M', '0000-00-00', '123414', '12341234124', '', '', '0'),
(8, '16009', '35235', 0, 1, 'Krushna Dayanand Kadam', '2013272801043010000', '', '5', '1', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'Aasha', '', '', '', '', '2018-07-18 16:18:31', 'active', 'M', '0000-00-00', '', '', '', '', '0'),
(9, '45566', '234561245165', 0, 1, 'XYZ afasf', '1008', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'fourteen aguest nitin', 'fffa345', 'kandhar', 'none', '', 'fac4552', '', 'INDU', '', 'VJ', 'Banjara', '', '2018-07-18 16:18:31', 'active', 'Female', '0000-00-00', '', '', '', '', '0'),
(10, '45566', '234561245235', 0, 1, 'XYZsdfgdsfg', '1008', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'fourteen aguest nitin', 'fffa345', 'kandhar', 'none', '', 'fac4552', '', 'INDU', '', 'VJ', 'Banjara', '', '2018-07-18 16:18:31', 'active', 'Female', '0000-00-00', '', '', '', '', '0'),
(11, '45566', '234531245235', 0, 1, 'Pintu  Jadhav', '1008', '', '7', 'D', '', '', '9158680769', '', '2017-10-25', '', 'fffa345', 'kandhar', 'none', '', 'fac4552', '', 'INDU', '', 'VJ', 'Banjara', '', '2018-07-18 16:18:32', 'active', 'male', '0000-00-00', '', '', '', '', '0'),
(12, '3244', '535435334244', 0, 1, 'xyz', '10034', '2017-2018', '7', 'D', '', '', '9158680769', '', '2017-12-08', 'fourteen aguest nitin', 'dasfe4', 'nanded', 'zp kandhar', '', '4354353', '52352', 'sx', '', 'Hindu', 'NT-C', '', '2018-07-18 16:18:32', 'active', 'Male', '0000-00-00', '', '555', 'Marathi', 'inida', 'kandhar'),
(13, '162483244', '344434343545', 0, 1, 'xyz', '1001', '2017-2018', '9', 'B', '', '', '9158680769', '', '2017-12-08', 'fourteen aguest nitin', 'af', 'nanded', 'zp kandhar', '', '4535', 'sadfds', 'zyz', '', 'Hindu', 'NT-C', '', '2018-07-18 16:18:32', 'active', 'Male', '0000-00-00', '', '555', 'Semi English', 'dsfs', 'dasfd'),
(14, '162483244', '451263451245', 0, 1, 'xyz', '', '2017-2018', '6', 'C', '', '', '9158680769', '', '2017-12-13', 'fourteen aguest nitin', '', '', 'zp kandhar', '', '', '', 'sx', '', 'Buddh', 'OPEN', '', '2018-07-18 16:18:32', 'active', 'Male', '0000-00-00', '', '555', '', '', ''),
(15, '162483244', '451263451223', 0, 1, 'xyz', '', '2017-2018', '6', 'C', '', '', '9158680769', '', '2017-12-13', 'fourteen aguest nitin', '', '', 'zp kandhar', '', '', '', 'sx', '', 'Buddh', 'OPEN', '', '2018-07-18 16:18:32', 'active', 'Male', '0000-00-00', '', '555', '', '', ''),
(16, '45566', '2.34521E+11', 0, 1, '?????? ', '322', '', '7', 'D', '', '', '9158680769', '', '2017-10-25', '', 'fffa345', 'kandhar', 'none', '', 'fac4552', '', 'INDU', '', 'NT', 'Banjara', '', '2018-01-03 05:24:02', 'active', 'male', '0000-00-00', '', '', '', '', ''),
(17, '45566', '235000000000', 0, 1, '???? ???', '322', '2017-2018', '7', 'D', '', '', '9158680769', '', '2017-10-24', 'good', 'fffa345', 'kandhar', 'none', '', 'fac4552', '', 'INDU', '', 'NT', 'Banjara', '', '2018-01-03 05:24:02', 'active', 'पुरुष ', '2018-01-01', '', '', '', 'India', 'maharshtra'),
(18, '3447', '455657544451', 0, 1, 'विजय पांडुरंग जधव', '10003', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-07-18 16:18:32', 'active', 'Male', '1970-01-01', '4554661', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(19, '3442', '455657544453', 0, 1, 'बळीराम पांडुरंग जधव', '10002', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-07-18 16:18:32', 'active', 'Male', '1970-01-01', '4554666', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(20, '3441', '455657544455', 0, 1, 'गजानन पांडुरंग जधव', '10004', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-07-18 16:18:32', 'active', 'Male', '1970-01-01', '4554667', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(21, '3447', '455651344451', 0, 1, 'विलास  किसन जाधव', '10004', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-07-18 16:18:32', 'active', 'Male', '1970-01-01', '4554661', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(22, '3442', '455652144453', 0, 1, 'नितीन किसण जाधव', '10005', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-07-18 16:18:32', 'active', 'Male', '1970-01-01', '4554666', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(23, '3441', '455636544455', 0, 1, 'सतीश किशन जाधव', '10007', '2017-2018', '7', 'D', '', '', '9158680769', '', '1970-01-01', 'चोव्धा आठ येकोनिशे नावध', '43223322', 'मजरे धर्मापुरी तांडा', 'श्री शंत द्येनश्वर विधायाल गोलेगाव', '', 'bank of marashtra', 'mic1245', 'इंदुबाई', '', 'हिंदू', 'VJ', '', '2018-07-18 16:18:32', 'active', 'Male', '1970-01-01', '4554667', '34555', 'English', 'INDIA', '???? ????????? ?????'),
(24, '4334', '451245784578', 0, 1, 'rahul rathod', '', '2017-2018', '4', 'C', '', '', '', '', '2018-01-08', 'god', '', 'kandhar', '', '', '', '', 'asha', '', 'Hindu', 'OPEN', '', '2018-07-18 16:18:32', 'active', 'पुरुष ', '0000-00-00', '', '', 'Marathi', 'india', 'pune'),
(25, '453535', '546323436545', 0, 1, 'rahul rathod', '40032', '2017-2018', '3', 'A', '', '', '9158684565', '', '2018-01-02', 'fifth augest two thousand twoell', 'USD343322', 'good', 'xyz', '', '', '', 'OX', '', 'Hindu', 'NT-D', '', '2018-07-18 16:18:32', 'active', 'पुरुष ', '2018-01-02', '4043243', '453534', 'General', 'XX', ''),
(26, '', '435352532223', 0, 1, 'vilas', '245', '2017-2018', '1 ', 'None', '', '', '9158689022', '', '2018-02-14', '', '', 'dharmapuri', '', '', '', '', 'kamal', '', 'Hindu', 'VJ', 'Banjara', '2018-07-18 16:18:32', 'active', 'पुरुष ', '0000-00-00', '', '', 'Marathi', '', ''),
(27, '4566', '454334233313', 0, 1, 'raj', '', '2018-2019', '7', 'D', '', '', '914954035', '', '1970-01-01', 'done', 'bdc', 'pune', 'new', '', '', '', 'rani', '', 'hindu', 'vj', 'banajara', '2018-07-18 16:18:32', 'active', 'male', '1970-01-01', '3567', '3566', 'Marathi', 'indian', 'pune'),
(28, '', '111112222233', 0, 1, 'vijay', '', '2018-2019', '4', 'B', '', '', '', '', '2018-05-17', '', '', '', '', '', '', '', 'good', '', '', '', '', '2018-07-18 16:18:32', 'active', 'मुलगा', '2018-05-17', '', '', 'Semi English', '', ''),
(29, '233456', '111111111104', 0, 1, 'KRISHNA', '3345', '2018-2019', '1', 'A', '', '', '9158680769', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546D', 'PUNE', 'amal school', '', '', '', 'RANI', '', 'HINDU', 'OPEN', 'MARATHA', '2018-07-18 16:18:32', 'active', 'MALE', '1970-01-01', '23456781', '111111111104', 'Marathi', 'INDIAN', 'nanded'),
(30, '233457', '111111111105', 0, 1, 'RAJARAM', '3346', '2018-2019', '1', 'A', '', '', '9158680761', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546E', 'PUNE', 'amal school', '', '', '', 'RUTUJA', '', 'HINDU', 'OPEN', 'LINGAYAT', '2018-07-18 16:18:32', 'active', 'MALE', '1970-01-01', '23456782', '111111111105', 'Marathi', 'INDIAN', 'nanded'),
(31, '233458', '111111111106', 0, 1, 'RAM', '3347', '2018-2019', '1', 'A', '', '', '9158680762', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546T', 'PUNE', 'amal school', '', '', '', 'KARISHMA', '', 'HINDU', 'SC', 'MAHAR', '2018-07-18 16:18:32', 'active', 'MALE', '1970-01-01', '23456783', '111111111106', 'Marathi', 'INDIAN', 'nanded'),
(32, '233459', '111111111107', 0, 1, 'SEETA', '3348', '2018-2019', '1', 'A', '', '', '9158680763', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546U', 'PUNE', 'amal school', '', '', '', 'RESHMA', '', 'HINDU', 'VJ', 'BANJARA', '2018-07-18 16:18:32', 'active', 'FEMALE', '1970-01-01', '23456784', '111111111107', 'Marathi', 'INDIAN', 'nanded'),
(33, '233460', '111111111108', 0, 1, 'SANGEETA', '3349', '2018-2019', '1', 'A', '', '', '9158680764', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546O', 'PUNE', 'amal school', '', '', '', 'ROJA', '', 'HINDU', 'OPEN', 'MARATHA', '2018-07-18 16:18:32', 'active', 'FEMALE', '1970-01-01', '23456785', '111111111108', 'Marathi', 'INDIAN', 'nanded'),
(34, '233461', '111111111109', 0, 1, 'MAHESH', '3350', '2018-2019', '1', 'A', '', '', '9158680765', '', '1970-01-01', 'five march two thousant eighteen', 'AAAA14546P', 'PUNE', 'amal school', '', '', '', 'NITA', '', 'HINDU', 'VJ', 'BANJARA', '2018-07-18 16:18:32', 'active', 'MALE', '2018-01-02', '23456786', '111111111109', 'Marathi', 'INDIAN', 'nanded'),
(35, '323', '345678123121', 0, 1, 'Ankur', '223', '2018-2019', '7', 'D', '', '', '9158689534', '', '1970-01-01', '', 'BH', 'nanded', 'MGM College', '', 'dena bank', '', 'pa', '', '', '', '', '2018-07-18 16:18:32', 'active', 'Male', '1970-01-01', '23433', '3544', 'English', 'india', ''),
(36, '', '', 0, 1, '', '', '', '', '', '', '', '', '', '1970-01-01', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-18 16:18:32', 'active', '', '1970-01-01', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_master`
--

CREATE TABLE `tbl_subject_master` (
  `id` int(11) NOT NULL,
  `subject` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject_master`
--

INSERT INTO `tbl_subject_master` (`id`, `subject`) VALUES
(1, 'इंग्रजी'),
(2, 'कला'),
(3, 'मराठी'),
(4, 'हिंदी'),
(5, 'संस्कृत'),
(6, 'परिसर'),
(7, 'अभ्यास'),
(8, 'शिक्षण'),
(9, 'संगणक'),
(10, 'विज्ञान'),
(11, 'ई . भू . ना .'),
(12, 'Hindi'),
(13, 'English'),
(14, 'History'),
(15, 'Marathi'),
(16, 'Methematics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `Tid` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  `Teacher_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Teacher_email` varchar(200) NOT NULL,
  `Teacher_password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Teacher_profile_image` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Teacher_mobile_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Date` datetime NOT NULL,
  `schools_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `divsion` varchar(10) CHARACTER SET utf8 NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `teacher_type` enum('clarke','teacher') CHARACTER SET utf8 NOT NULL,
  `dob` date NOT NULL,
  `pan_card` varchar(30) CHARACTER SET utf8 NOT NULL,
  `adhar_card` varchar(20) CHARACTER SET utf8 NOT NULL,
  `year` varchar(30) CHARACTER SET utf8 NOT NULL,
  `payment` varchar(30) CHARACTER SET utf8 NOT NULL,
  `account_no` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ifc_code` varchar(30) CHARACTER SET utf8 NOT NULL,
  `address` varchar(500) NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`Tid`, `Pid`, `Teacher_name`, `Teacher_email`, `Teacher_password`, `Teacher_profile_image`, `Teacher_mobile_no`, `Date`, `schools_name`, `divsion`, `status`, `teacher_type`, `dob`, `pan_card`, `adhar_card`, `year`, `payment`, `account_no`, `ifc_code`, `address`, `gender`) VALUES
(1, 1, 'Vijay Jadhav', 'vijay17@gmail.com', '123456', '', '9158680769', '2017-08-03 11:44:28', '2', 'A', 'active', 'clarke', '0000-00-00', '', '', '', '', '', '', '', ''),
(2, 5, 'vikram', 'shilwant1984@gmail.com', 'india123', '', '8380038202', '2017-08-08 07:51:34', '10', 'A', 'active', 'clarke', '0000-00-00', '', '', '', '', '', '', '', ''),
(3, 1, 'hello', 'hell1o@gmail.com', '123456', '', '9158680769', '2017-08-09 09:18:08', '9', 'B', 'active', 'clarke', '2017-08-09', '34455bc', '343434123423', '', '456', '44553434', 'fad444', '', ''),
(4, 1, 'Vijay Jadhav', 'vijay1819@gmail.com', '123456', 'logos_3796.png', '9158680769', '2017-08-10 08:38:53', '7', 'D', 'active', 'clarke', '0000-00-00', '', '', '', '', '', '', '', ''),
(5, 1, 'Vijay Jadhav', 'vijay111@gmail.com', '123456', 'logos_9874.png', '9158647899', '2017-08-15 06:36:16', '7', 'C', 'active', 'teacher', '2017-08-15', '34455bc', '451245789545', '2017-2018', '456', '44553434', 'fad444', 'pune', 'Male'),
(6, 1, 'vijay', 'vijay@gmail.com', '123456', '', '', '2017-12-07 15:25:39', '2', 'C', 'active', 'teacher', '0000-00-00', '', '546647547856', '', '', '', '', '', 'Male'),
(7, 1, 'विलास किशन जाधव', 'vijay1234@gmail.com', '12344', '', '9158680769', '2017-12-10 17:31:06', '4', 'D', 'active', 'teacher', '1990-04-02', 'af343fas', '541578451214', '2017-2018', '3000', '454033565', 'MCRR3455', '', 'पुरुष'),
(8, 1, 'नितिन बंडू राठोड', 'vijay1237@gmail.com', '12344', '', '9158680769', '2017-12-10 17:31:06', '2', 'D', 'active', 'teacher', '1990-04-02', 'af343fas', '541578451211', '2017-2018', '3000', '454033565', 'MCRR3455', '', 'पुरुष'),
(9, 1, 'नितीन भोसले', 'vijay12377@gmail.com', '12344', '', '9158680769', '2017-12-10 17:31:06', '6', 'D', 'active', 'teacher', '1990-04-02', 'af343fas', '541578451212', '2017-2018', '3000', '454033565', 'MCRR3455', '', 'पुरुष'),
(10, 1, 'दीपक भोसले', 'vijay123123@gmail.com', '12341', 'olfftemplatemo_middle_4680.jpg', '9158680769', '2017-12-10 17:31:06', '5', 'D', 'active', 'teacher', '1990-04-02', 'af343fas', '541578451218', '2017-2018', '3000', '454033565', 'MCRR3455', '', 'पुरुष'),
(11, 1, 'Baliram Jadhav', 'vijay171819@gmail.com', '13443', '', '9158680768', '2018-06-23 17:19:37', '4', 'C', 'active', 'teacher', '1970-01-01', 'BHK3433', '334242421234', '2018-2019', '30000', '3424335353', 'BKD00566', 'Dharmapuri Tanda', 'Male'),
(12, 1, '', '', '', '', '', '2018-06-23 17:19:38', '', '', 'active', 'teacher', '1970-01-01', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_attendance`
--

CREATE TABLE `tbl_teacher_attendance` (
  `aid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `attendance_status` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `month` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_master`
--

CREATE TABLE `time_master` (
  `tid` int(11) NOT NULL,
  `time_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_master`
--

INSERT INTO `time_master` (`tid`, `time_name`) VALUES
(1, '7:00 AM'),
(2, '7:15 AM'),
(3, '7:30 AM'),
(4, '7:45 AM'),
(5, '8:00 AM'),
(6, '8:15 AM'),
(7, '8:30 AM'),
(8, '8:45 AM'),
(9, '9:00 AM'),
(10, '9:15 AM'),
(11, '9:30 AM'),
(12, '9:45 AM'),
(13, '10:00 AM'),
(14, '10:15 AM'),
(15, '10:30 AM'),
(16, '10:45 AM'),
(17, '11:00 AM'),
(18, '11:15 AM'),
(19, '11:30 AM'),
(20, '11:45 AM'),
(21, '12:00 PM'),
(22, '12:15 PM'),
(23, '12:30 PM'),
(24, '12:45 PM'),
(25, '01:00 PM'),
(26, '01:15 PM'),
(27, '01:30 PM'),
(28, '01:45 PM'),
(29, '02:00 PM'),
(30, '02:15 PM'),
(31, '02:30 PM'),
(32, '02:45 PM'),
(33, '03:00 PM'),
(34, '03:15 PM'),
(35, '03:30 PM'),
(36, '03:45 PM'),
(37, '4:00 PM'),
(38, '4:15 PM'),
(39, '4:30 PM'),
(40, '4:45 PM'),
(41, '05:00 PM'),
(42, '05:15 PM'),
(43, '05:30 PM'),
(44, '05:45 PM'),
(45, '6:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `yearly_holiday_master`
--

CREATE TABLE `yearly_holiday_master` (
  `yid` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `ptid` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `between_dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yearly_holiday_master`
--

INSERT INTO `yearly_holiday_master` (`yid`, `event_name`, `ptid`, `status`, `fromdate`, `todate`, `between_dates`) VALUES
(3, 'my event', 1, 'active', '2017-08-11', '2017-08-11', '0000-00-00'),
(4, 'Independance Day', 1, 'active', '2017-08-15', '2017-08-15', '0000-00-00'),
(5, 'Ganesh Chturthi', 1, 'active', '2017-08-25', '2017-08-25', '0000-00-00'),
(6, 'Independance Day', 1, 'active', '2018-12-26', '2018-12-26', '0000-00-00'),
(7, 'Republic Day', 1, 'active', '2018-01-26', '2018-01-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `year_master`
--

CREATE TABLE `year_master` (
  `id` int(11) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_master`
--

INSERT INTO `year_master` (`id`, `year`) VALUES
(1, 2016),
(2, 2017),
(3, 2018);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_master`
--
ALTER TABLE `application_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_request`
--
ALTER TABLE `application_request`
  ADD PRIMARY KEY (`arid`);

--
-- Indexes for table `caste_master`
--
ALTER TABLE `caste_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cast_master`
--
ALTER TABLE `cast_master`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `child_master`
--
ALTER TABLE `child_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_master`
--
ALTER TABLE `day_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divison_master`
--
ALTER TABLE `divison_master`
  ADD PRIMARY KEY (`dmid`);

--
-- Indexes for table `exam_master`
--
ALTER TABLE `exam_master`
  ADD PRIMARY KEY (`exid`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_type_master`
--
ALTER TABLE `exam_type_master`
  ADD PRIMARY KEY (`emid`);

--
-- Indexes for table `gender_master`
--
ALTER TABLE `gender_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaving_certificate`
--
ALTER TABLE `leaving_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medium_master`
--
ALTER TABLE `medium_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month_master`
--
ALTER TABLE `month_master`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `nigram_uttara`
--
ALTER TABLE `nigram_uttara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `notification_admin`
--
ALTER TABLE `notification_admin`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `notification_master`
--
ALTER TABLE `notification_master`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `result_master`
--
ALTER TABLE `result_master`
  ADD PRIMARY KEY (`rmid`);

--
-- Indexes for table `result_subject_marks`
--
ALTER TABLE `result_subject_marks`
  ADD PRIMARY KEY (`rsmid`);

--
-- Indexes for table `schools_master`
--
ALTER TABLE `schools_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools_time_table`
--
ALTER TABLE `schools_time_table`
  ADD PRIMARY KEY (`sttid`);

--
-- Indexes for table `school_time_table_master`
--
ALTER TABLE `school_time_table_master`
  ADD PRIMARY KEY (`sttmid`);

--
-- Indexes for table `subcaste_master`
--
ALTER TABLE `subcaste_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_bonafied`
--
ALTER TABLE `tbl_bonafied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exam_type_master`
--
ALTER TABLE `tbl_exam_type_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fees_discount_master`
--
ALTER TABLE `tbl_fees_discount_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fees_master`
--
ALTER TABLE `tbl_fees_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fees_type`
--
ALTER TABLE `tbl_fees_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_final_result_master`
--
ALTER TABLE `tbl_final_result_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_installment_amount`
--
ALTER TABLE `tbl_installment_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_main_slider`
--
ALTER TABLE `tbl_main_slider`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `tbl_parent`
--
ALTER TABLE `tbl_parent`
  ADD PRIMARY KEY (`Ptid`);

--
-- Indexes for table `tbl_principle`
--
ALTER TABLE `tbl_principle`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `tbl_sales_users`
--
ALTER TABLE `tbl_sales_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_anual_year`
--
ALTER TABLE `tbl_student_anual_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_history`
--
ALTER TABLE `tbl_student_history`
  ADD PRIMARY KEY (`Ptid`);

--
-- Indexes for table `tbl_subject_master`
--
ALTER TABLE `tbl_subject_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`Tid`);

--
-- Indexes for table `tbl_teacher_attendance`
--
ALTER TABLE `tbl_teacher_attendance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `time_master`
--
ALTER TABLE `time_master`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `yearly_holiday_master`
--
ALTER TABLE `yearly_holiday_master`
  ADD PRIMARY KEY (`yid`);

--
-- Indexes for table `year_master`
--
ALTER TABLE `year_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_master`
--
ALTER TABLE `application_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `application_request`
--
ALTER TABLE `application_request`
  MODIFY `arid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `caste_master`
--
ALTER TABLE `caste_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cast_master`
--
ALTER TABLE `cast_master`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `day_master`
--
ALTER TABLE `day_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `divison_master`
--
ALTER TABLE `divison_master`
  MODIFY `dmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_master`
--
ALTER TABLE `exam_master`
  MODIFY `exid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_type_master`
--
ALTER TABLE `exam_type_master`
  MODIFY `emid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gender_master`
--
ALTER TABLE `gender_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaving_certificate`
--
ALTER TABLE `leaving_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medium_master`
--
ALTER TABLE `medium_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `month_master`
--
ALTER TABLE `month_master`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nigram_uttara`
--
ALTER TABLE `nigram_uttara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification_admin`
--
ALTER TABLE `notification_admin`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification_master`
--
ALTER TABLE `notification_master`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `result_master`
--
ALTER TABLE `result_master`
  MODIFY `rmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `result_subject_marks`
--
ALTER TABLE `result_subject_marks`
  MODIFY `rsmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `schools_master`
--
ALTER TABLE `schools_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schools_time_table`
--
ALTER TABLE `schools_time_table`
  MODIFY `sttid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `school_time_table_master`
--
ALTER TABLE `school_time_table_master`
  MODIFY `sttmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcaste_master`
--
ALTER TABLE `subcaste_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=633;

--
-- AUTO_INCREMENT for table `tbl_bonafied`
--
ALTER TABLE `tbl_bonafied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_exam_type_master`
--
ALTER TABLE `tbl_exam_type_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_fees_discount_master`
--
ALTER TABLE `tbl_fees_discount_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_fees_master`
--
ALTER TABLE `tbl_fees_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_fees_type`
--
ALTER TABLE `tbl_fees_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_final_result_master`
--
ALTER TABLE `tbl_final_result_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_installment_amount`
--
ALTER TABLE `tbl_installment_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_main_slider`
--
ALTER TABLE `tbl_main_slider`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_parent`
--
ALTER TABLE `tbl_parent`
  MODIFY `Ptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_principle`
--
ALTER TABLE `tbl_principle`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_sales_users`
--
ALTER TABLE `tbl_sales_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_student_anual_year`
--
ALTER TABLE `tbl_student_anual_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_student_history`
--
ALTER TABLE `tbl_student_history`
  MODIFY `Ptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_subject_master`
--
ALTER TABLE `tbl_subject_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_teacher_attendance`
--
ALTER TABLE `tbl_teacher_attendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_master`
--
ALTER TABLE `time_master`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `yearly_holiday_master`
--
ALTER TABLE `yearly_holiday_master`
  MODIFY `yid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `year_master`
--
ALTER TABLE `year_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
