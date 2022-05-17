-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2022 at 03:36 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `point_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `tk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mk` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`tk`, `mk`) VALUES
('humg881966', '88mda66');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `maLop` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `maGv` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maKhoaHoc` int(11) DEFAULT NULL,
  `maKhoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`maLop`, `maGv`, `class_name`, `maKhoaHoc`, `maKhoa`) VALUES
('DCCTKH64A', '0805-05', 'Khoa Học Máy Tính K64A', 192, 105),
('DCCTKH64B', '0805-05', 'Khoa Học Máy Tính K64B', 192, 105),
('DCCTKH65A', '0805-07', 'Khoa Học Máy Tính K65A', 202, 105);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `maKhoaHoc` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_year` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `final_year` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`maKhoaHoc`, `name`, `start_year`, `final_year`) VALUES
(192, 'Khóa 64', '2019', '2023'),
(202, 'Khóa 65', '2020', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `deadline`
--

CREATE TABLE `deadline` (
  `maGv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `start_time_student` date DEFAULT NULL,
  `end_time_student` date DEFAULT NULL,
  `end_time_monitor` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deadline`
--

INSERT INTO `deadline` (`maGv`, `start_time_student`, `end_time_student`, `end_time_monitor`) VALUES
('0805-05', '2022-03-31', '2022-04-01', '2022-04-03'),
('0805-07', '2022-04-01', '2022-04-01', '2022-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `maKhoa` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`maKhoa`, `name`, `account`, `password`, `role_id`) VALUES
(101, 'Dầu khí ', 'daukhihumg', 'humg1234', 1),
(102, 'Khoa cơ điện', 'codienhumg', 'humg1234', 1),
(105, 'Công Nghệ Thông Tin', 'cntthumg', 'humg1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `maSv` int(11) NOT NULL,
  `maHK` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `point_student` int(11) DEFAULT NULL,
  `point_monitor` int(11) DEFAULT NULL,
  `point_teacher` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `status_teacher` int(11) DEFAULT '0',
  `ltNote` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gvNote` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`maSv`, `maHK`, `point_student`, `point_monitor`, `point_teacher`, `status`, `status_teacher`, `ltNote`, `gvNote`) VALUES
(1921050001, 'hk1-2021-2022', 76, 73, 71, 1, 1, '', 'Điểm trung bình hệ 4 có 3.5\n'),
(1921050002, 'hk1-2021-2022', 8, 8, 8, 1, 1, '', ''),
(1921050004, 'hk1-2021-2022', 83, 83, 83, 1, 1, '', ''),
(1921050005, 'hk1-2021-2022', 64, 64, 64, 1, 1, '', ''),
(1921050006, 'hk1-2021-2022', 65, 80, 80, 1, 1, '', ''),
(1921050007, 'hk1-2021-2022', 73, 73, 73, 1, 1, '', ''),
(1921050008, 'hk1-2021-2022', 71, 71, 71, 1, 1, '', ''),
(1921050009, 'hk1-2021-2022', 88, 88, 88, 1, 1, '', ''),
(1921050010, 'hk1-2021-2022', 88, 88, 88, 1, 1, '', ''),
(1921050011, 'hk1-2021-2022', 41, 41, 31, 1, 1, '', ''),
(1921050012, 'hk1-2021-2022', 13, 13, 13, 1, 1, '', ''),
(1921050014, 'hk1-2021-2022', 73, 73, 73, 1, 1, '', ''),
(1921050015, 'hk1-2021-2022', 21, 20, 20, 1, 1, '', ''),
(1921050016, 'hk1-2021-2022', 71, 68, 68, 1, 1, '', ''),
(1921050017, 'hk1-2021-2022', 82, 82, 82, 1, 1, '', ''),
(1921050018, 'hk1-2021-2022', 45, 45, 45, 1, 1, '', ''),
(1921050019, 'hk1-2021-2022', 80, 80, 68, 1, 1, '', ''),
(1921050050, 'hk1-2021-2022', 76, 75, 75, 1, 1, '', ''),
(1921050051, 'hk1-2021-2022', 92, 73, 73, 1, 1, '<p><strong>Kh&ocirc;ng tham gia g&igrave; m&agrave; cũng chấm điểm cộng</strong></p>\r\n', ''),
(1921050052, 'hk1-2021-2022', 73, 73, 74, 1, 1, '', ''),
(1921050053, 'hk1-2021-2022', 70, 70, 70, 1, 1, '', ''),
(1921050054, 'hk1-2021-2022', 74, 74, 67, 1, 1, '', ''),
(1921050055, 'hk1-2021-2022', 80, 80, 80, 1, 1, '', ''),
(1921050056, 'hk1-2021-2022', 39, 71, 71, 1, 1, '<p><strong>Bạn chấm nhầm &agrave;?</strong></p>\r\n', ''),
(1921050137, 'hk1-2021-2022', 81, 80, 80, 1, 1, '<p><span style=\"color:#c0392b\"><strong>Kh&ocirc;ng đạt giải NCKH.</strong></span></p>\r\n', NULL),
(2021050050, 'hk1-2021-2022', 71, 71, 71, 1, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `point_monitor`
--

CREATE TABLE `point_monitor` (
  `maSv` int(11) NOT NULL,
  `maHK` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ltDiemTBHK` int(11) DEFAULT '0',
  `ltCitizen` int(11) DEFAULT '0',
  `ltMonitor` int(11) DEFAULT '0',
  `ltNCKH1` int(11) DEFAULT '0',
  `ltNCKH2` int(11) DEFAULT '0',
  `ltNCKH3` int(11) DEFAULT '0',
  `ltOlympic1` int(11) DEFAULT '0',
  `ltOlympic2` int(11) DEFAULT '0',
  `ltOlympic3` int(11) DEFAULT '0',
  `ltOlympic4` int(11) DEFAULT '0',
  `ltNoRegulation` int(11) DEFAULT '0',
  `ltOnTime` int(11) DEFAULT '0',
  `ltAbandon` int(11) DEFAULT '0',
  `ltUnTrueTime` int(11) DEFAULT '0',
  `ltNoFullStudy` int(11) DEFAULT '0',
  `ltNoCard` int(11) DEFAULT '0',
  `ltNoAtivities` int(11) DEFAULT '0',
  `ltNoPayFee` int(11) DEFAULT '0',
  `ltFullActive` int(11) DEFAULT '0',
  `ltAchievementSchool` int(11) DEFAULT '0',
  `ltAchievementCity` int(11) DEFAULT '0',
  `ltAdvise` int(11) DEFAULT '0',
  `ltIrresponsible` int(11) DEFAULT '0',
  `ltNoCultural` int(11) DEFAULT '0',
  `ltPositiveStudy` int(11) DEFAULT '0',
  `ltPositiveLove` int(11) DEFAULT '0',
  `ltWarn` int(11) DEFAULT '0',
  `ltNoProtect` int(11) DEFAULT '0',
  `ltBonus` int(11) DEFAULT '0',
  `ltIrresponsibleMonitor` int(11) DEFAULT '0',
  `ltRightRule` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `point_monitor`
--

INSERT INTO `point_monitor` (`maSv`, `maHK`, `ltDiemTBHK`, `ltCitizen`, `ltMonitor`, `ltNCKH1`, `ltNCKH2`, `ltNCKH3`, `ltOlympic1`, `ltOlympic2`, `ltOlympic3`, `ltOlympic4`, `ltNoRegulation`, `ltOnTime`, `ltAbandon`, `ltUnTrueTime`, `ltNoFullStudy`, `ltNoCard`, `ltNoAtivities`, `ltNoPayFee`, `ltFullActive`, `ltAchievementSchool`, `ltAchievementCity`, `ltAdvise`, `ltIrresponsible`, `ltNoCultural`, `ltPositiveStudy`, `ltPositiveLove`, `ltWarn`, `ltNoProtect`, `ltBonus`, `ltIrresponsibleMonitor`, `ltRightRule`) VALUES
(1921050001, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050002, 'hk1-2021-2022', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1921050004, 'hk1-2021-2022', 20, 10, 7, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 3, 0, 10),
(1921050005, 'hk1-2021-2022', 16, 5, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050006, 'hk1-2021-2022', 18, 15, 0, 4, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050007, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050008, 'hk1-2021-2022', 18, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050009, 'hk1-2021-2022', 20, 15, 7, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 3, 0, 10),
(1921050010, 'hk1-2021-2022', 20, 10, 7, 5, 1, 1, 1, 1, 1, 1, 3, 2, 0, -10, 0, 0, 0, 0, 13, 0, 0, 4, 0, 0, 10, 5, 0, 0, 3, 0, 10),
(1921050011, 'hk1-2021-2022', 8, 5, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, -5, -20, 0, 0, 10),
(1921050012, 'hk1-2021-2022', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1921050014, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050015, 'hk1-2021-2022', 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1921050016, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050017, 'hk1-2021-2022', 20, 10, 7, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050018, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(1921050019, 'hk1-2021-2022', 20, 10, 7, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050050, 'hk1-2021-2022', 20, 10, 5, 0, 0, 0, 0, 0, 0, 1, 0, 0, -1, 0, 0, 0, 0, 0, 13, 1, 1, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050051, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050052, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050053, 'hk1-2021-2022', 8, 10, 0, 1, 1, 1, 1, 1, 1, 1, 3, 2, 0, 0, 0, 0, 0, 0, 13, 1, 1, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050054, 'hk1-2021-2022', 20, 10, 0, 1, 1, 1, 1, 1, 1, 1, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 4, 0, -10, 10, 5, 0, 0, 0, 0, 10),
(1921050055, 'hk1-2021-2022', 20, 10, 0, 1, 1, 1, 1, 1, 1, 1, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050056, 'hk1-2021-2022', 18, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050137, 'hk1-2021-2022', 18, 10, 0, 5, 2, 2, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(2021050050, 'hk1-2021-2022', 18, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `point_student`
--

CREATE TABLE `point_student` (
  `maSv` int(11) NOT NULL,
  `maHK` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `svDiemTBHK` int(11) DEFAULT '0',
  `svCitizen` int(11) DEFAULT '0',
  `svMonitor` int(11) DEFAULT '0',
  `svNCKH1` int(11) DEFAULT '0',
  `svNCKH2` int(11) DEFAULT '0',
  `svNCKH3` int(11) DEFAULT '0',
  `svOlympic1` int(11) DEFAULT '0',
  `svOlympic2` int(11) DEFAULT '0',
  `svOlympic3` int(11) DEFAULT '0',
  `svOlympic4` int(11) DEFAULT '0',
  `svNoRegulation` int(11) DEFAULT '0',
  `svOnTime` int(11) DEFAULT '0',
  `svAbandon` int(11) DEFAULT '0',
  `svUnTrueTime` int(11) DEFAULT '0',
  `svNoFullStudy` int(11) DEFAULT '0',
  `svNoCard` int(11) DEFAULT '0',
  `svNoAtivities` int(11) DEFAULT '0',
  `svNoPayFee` int(11) DEFAULT '0',
  `svFullActive` int(11) DEFAULT '0',
  `svAchievementSchool` int(11) DEFAULT '0',
  `svAchievementCity` int(11) DEFAULT '0',
  `svAdvise` int(11) DEFAULT '0',
  `svIrresponsible` int(11) DEFAULT '0',
  `svNoCultural` int(11) DEFAULT '0',
  `svPositiveStudy` int(11) DEFAULT '0',
  `svPositiveLove` int(11) DEFAULT '0',
  `svWarn` int(11) DEFAULT '0',
  `svNoProtect` int(11) DEFAULT '0',
  `svBonus` int(11) DEFAULT '0',
  `svIrresponsibleMonitor` int(11) DEFAULT '0',
  `svRightRule` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `point_student`
--

INSERT INTO `point_student` (`maSv`, `maHK`, `svDiemTBHK`, `svCitizen`, `svMonitor`, `svNCKH1`, `svNCKH2`, `svNCKH3`, `svOlympic1`, `svOlympic2`, `svOlympic3`, `svOlympic4`, `svNoRegulation`, `svOnTime`, `svAbandon`, `svUnTrueTime`, `svNoFullStudy`, `svNoCard`, `svNoAtivities`, `svNoPayFee`, `svFullActive`, `svAchievementSchool`, `svAchievementCity`, `svAdvise`, `svIrresponsible`, `svNoCultural`, `svPositiveStudy`, `svPositiveLove`, `svWarn`, `svNoProtect`, `svBonus`, `svIrresponsibleMonitor`, `svRightRule`) VALUES
(1921050001, 'hk1-2021-2022', 20, 10, 0, 1, 1, 0, 0, 0, 0, 1, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050002, 'hk1-2021-2022', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1921050004, 'hk1-2021-2022', 20, 10, 7, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 3, 0, 10),
(1921050005, 'hk1-2021-2022', 16, 5, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050006, 'hk1-2021-2022', 18, 15, 0, 4, 0, 0, 0, 0, 0, 0, 3, 2, -15, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050007, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050008, 'hk1-2021-2022', 18, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050009, 'hk1-2021-2022', 20, 15, 7, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 3, 0, 10),
(1921050010, 'hk1-2021-2022', 20, 10, 7, 5, 1, 1, 1, 1, 1, 1, 3, 2, 0, -10, 0, 0, 0, 0, 13, 0, 0, 4, 0, 0, 10, 5, 0, 0, 3, 0, 10),
(1921050011, 'hk1-2021-2022', 8, 5, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, -5, -20, 0, 0, 10),
(1921050012, 'hk1-2021-2022', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1921050014, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050015, 'hk1-2021-2022', 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -3, 0, 0, 0, 0, 0, 0, 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1921050016, 'hk1-2021-2022', 20, 10, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, -2, 0, 0, 0, 0, 0, 13, 1, 1, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050017, 'hk1-2021-2022', 20, 10, 7, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050018, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(1921050019, 'hk1-2021-2022', 20, 10, 7, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050050, 'hk1-2021-2022', 20, 10, 5, 1, 0, 0, 0, 0, 0, 1, 0, 0, -1, 0, 0, 0, 0, 0, 13, 1, 1, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050051, 'hk1-2021-2022', 20, 10, 7, 1, 1, 1, 1, 1, 1, 1, 3, 2, 0, 0, -10, 0, 0, 0, 13, 3, 5, 4, 0, 0, 10, 5, 0, 0, 3, 0, 10),
(1921050052, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050053, 'hk1-2021-2022', 8, 10, 0, 1, 1, 1, 1, 1, 1, 1, 3, 2, 0, 0, 0, 0, 0, 0, 13, 1, 1, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050054, 'hk1-2021-2022', 20, 10, 0, 1, 1, 1, 1, 1, 1, 1, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 4, 0, -10, 10, 5, 0, 0, 0, 0, 10),
(1921050055, 'hk1-2021-2022', 20, 10, 0, 1, 1, 1, 1, 1, 1, 1, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050056, 'hk1-2021-2022', 18, 10, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, -7, -10, 0, -15, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050137, 'hk1-2021-2022', 18, 10, 0, 6, 4, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(2021050050, 'hk1-2021-2022', 18, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `point_teacher`
--

CREATE TABLE `point_teacher` (
  `maSv` int(11) NOT NULL,
  `maHK` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gvDiemTBHK` int(11) DEFAULT '0',
  `gvCitizen` int(11) DEFAULT '0',
  `gvMonitor` int(11) DEFAULT '0',
  `gvNCKH1` int(11) DEFAULT '0',
  `gvNCKH2` int(11) DEFAULT '0',
  `gvNCKH3` int(11) DEFAULT '0',
  `gvOlympic1` int(11) DEFAULT '0',
  `gvOlympic2` int(11) DEFAULT '0',
  `gvOlympic3` int(11) DEFAULT '0',
  `gvOlympic4` int(11) DEFAULT '0',
  `gvNoRegulation` int(11) DEFAULT '0',
  `gvOnTime` int(11) DEFAULT '0',
  `gvAbandon` int(11) DEFAULT '0',
  `gvUnTrueTime` int(11) DEFAULT '0',
  `gvNoFullStudy` int(11) DEFAULT '0',
  `gvNoCard` int(11) DEFAULT '0',
  `gvNoAtivities` int(11) DEFAULT '0',
  `gvNoPayFee` int(11) DEFAULT '0',
  `gvFullActive` int(11) DEFAULT '0',
  `gvAchievementSchool` int(11) DEFAULT '0',
  `gvAchievementCity` int(11) DEFAULT '0',
  `gvAdvise` int(11) DEFAULT '0',
  `gvIrresponsible` int(11) DEFAULT '0',
  `gvNoCultural` int(11) DEFAULT '0',
  `gvPositiveStudy` int(11) DEFAULT '0',
  `gvPositiveLove` int(11) DEFAULT '0',
  `gvWarn` int(11) DEFAULT '0',
  `gvNoProtect` int(11) DEFAULT '0',
  `gvBonus` int(11) DEFAULT '0',
  `gvIrresponsibleMonitor` int(11) DEFAULT '0',
  `gvRightRule` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `point_teacher`
--

INSERT INTO `point_teacher` (`maSv`, `maHK`, `gvDiemTBHK`, `gvCitizen`, `gvMonitor`, `gvNCKH1`, `gvNCKH2`, `gvNCKH3`, `gvOlympic1`, `gvOlympic2`, `gvOlympic3`, `gvOlympic4`, `gvNoRegulation`, `gvOnTime`, `gvAbandon`, `gvUnTrueTime`, `gvNoFullStudy`, `gvNoCard`, `gvNoAtivities`, `gvNoPayFee`, `gvFullActive`, `gvAchievementSchool`, `gvAchievementCity`, `gvAdvise`, `gvIrresponsible`, `gvNoCultural`, `gvPositiveStudy`, `gvPositiveLove`, `gvWarn`, `gvNoProtect`, `gvBonus`, `gvIrresponsibleMonitor`, `gvRightRule`) VALUES
(1921050001, 'hk1-2021-2022', 18, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050002, 'hk1-2021-2022', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1921050004, 'hk1-2021-2022', 20, 10, 7, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 3, 0, 10),
(1921050005, 'hk1-2021-2022', 16, 5, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050006, 'hk1-2021-2022', 18, 15, 0, 4, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050007, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050008, 'hk1-2021-2022', 18, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050009, 'hk1-2021-2022', 20, 15, 7, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 3, 0, 10),
(1921050010, 'hk1-2021-2022', 20, 10, 7, 5, 1, 1, 1, 1, 1, 1, 3, 2, 0, -10, 0, 0, 0, 0, 13, 0, 0, 4, 0, 0, 10, 5, 0, 0, 3, 0, 10),
(1921050011, 'hk1-2021-2022', 8, 5, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, -5, -20, 0, 0, 10),
(1921050012, 'hk1-2021-2022', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1921050014, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050015, 'hk1-2021-2022', 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1921050016, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050017, 'hk1-2021-2022', 20, 10, 7, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050018, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(1921050019, 'hk1-2021-2022', 8, 10, 7, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050050, 'hk1-2021-2022', 20, 10, 5, 0, 0, 0, 0, 0, 0, 1, 0, 0, -1, 0, 0, 0, 0, 0, 13, 1, 1, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050051, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050052, 'hk1-2021-2022', 20, 10, 0, 1, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050053, 'hk1-2021-2022', 8, 10, 0, 1, 1, 1, 1, 1, 1, 1, 3, 2, 0, 0, 0, 0, 0, 0, 13, 1, 1, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050054, 'hk1-2021-2022', 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 4, 0, -10, 10, 5, 0, 0, 0, 0, 10),
(1921050055, 'hk1-2021-2022', 20, 10, 0, 1, 1, 1, 1, 1, 1, 1, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050056, 'hk1-2021-2022', 18, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(1921050137, 'hk1-2021-2022', 18, 10, 0, 5, 2, 2, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10),
(2021050050, 'hk1-2021-2022', 18, 10, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Khoa'),
(2, 'Giáo Viên'),
(3, 'Lớp Trưởng'),
(4, 'Sinh Viên');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `maHK` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `semester` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`maHK`, `name`, `status`, `semester`, `year`) VALUES
('hk1-2021-2022', 'Học Kì 1 Năm Học 2021-2022', 1, '1', '2021-2022'),
('hk2-2022-2023', 'Học Kì 2 Năm Học 2022-2023', 0, '2', '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `maSv` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maLop` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT '4',
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT '123456',
  `phone_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`maSv`, `name`, `maLop`, `role_id`, `email`, `password`, `phone_number`) VALUES
(1921050001, 'Đỗ Đức Anh', 'DCCTKH64A', 4, 'ng@gmail.com', '1234567', NULL),
(1921050002, 'Nguyễn Thị Ngọc Ánh ', 'DCCTKH64A', 4, 'sv02@gmail.com', '1234567', NULL),
(1921050004, 'Vũ Anh Chung', 'DCCTKH64A', 4, 'sv04@gmail.com', '1234567', NULL),
(1921050005, 'Phan Tùng Dương ', 'DCCTKH64A', 4, 'sv05@gmail.com', '1234567', NULL),
(1921050006, 'Đỗ Công Đức ', 'DCCTKH64A', 4, 'sv06@gmail.com', '1234567', NULL),
(1921050007, 'Nguyễn Văn Đức ', 'DCCTKH64A', 4, 'sv07@gmail.com', '1234567', NULL),
(1921050008, 'Phạm Hoàng Hải ', 'DCCTKH64A', 4, 'sv08@gmail.com', '1234567', NULL),
(1921050009, 'Nguyễn Văn Huấn ', 'DCCTKH64A', 4, 'sv09@gmail.com', '1234567', NULL),
(1921050010, 'Vũ Tiến Hùng', 'DCCTKH64A', 4, 'sv10@gmail.com', '1234567', NULL),
(1921050011, 'Nguyễn Ngọc Huy ', 'DCCTKH64A', 4, 's11@gmail.com', '1234567', NULL),
(1921050012, 'Trần Quang Huy ', 'DCCTKH64A', 4, 'sv12@gmail.com', '1234567', NULL),
(1921050013, 'Nguyễn Ngô Hưng ', 'DCCTKH64A', 4, 'sv12@gmail.co3', '1234567', NULL),
(1921050014, 'Vũ Ngọc Huyên ', 'DCCTKH64A', 4, 'sv14@gmail.com', '1234567', '1234567'),
(1921050015, 'Lê Thị Khánh ', 'DCCTKH64A', 4, 'sv15@gmail.com', '1234567', NULL),
(1921050016, 'Hoàng Khắc Tuấn Kiệt ', 'DCCTKH64A', 4, 'sv16@gmail.com', '1234567', NULL),
(1921050017, 'Phạm Mai Lan', 'DCCTKH64A', 4, 'sv17@gmail.com', '1234567', NULL),
(1921050018, ' Nguyễn Thành Long ', 'DCCTKH64A', 4, 'sv18@gmail.com', '1234567', '0998423658'),
(1921050019, 'Ninh Đức Mạnh ', 'DCCTKH64A', 4, 'sv19@gmail.com', '1234567', '0998423658'),
(1921050021, 'Nguyễn Thị Thanh Thanh Nhàn ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050022, 'Nguyễn Hồng Nhung', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050023, 'Lê Thị Oanh', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050024, 'Phạm Gia Phong', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050025, 'Phạm Nhật Phong ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050026, 'Phạm Việt Phương ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050027, 'Ðoàn Ngọc Quý ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050028, 'Nguyễn Văn Quyết ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050029, 'Nguyễn Thị Thu Sương ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050030, 'Lê Thành Thảo ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050031, 'Nguyễn Chiến Thắng ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050032, 'Tạ Tương Thiện ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050033, 'Đào Đình Toàn ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050034, 'Nguyễn Thành Trung ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050035, 'Nguyễn Anh Tuấn ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050036, 'Phạm Minh Tuấn', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050037, 'Lê Thanh Tùng ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050038, 'Nguyễn Quốc Tùng ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050039, 'Đặng Danh Việt ', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050040, 'Nguyễn Mạnh Dũng', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050041, 'Trần quang Duy', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050042, 'Bùi Đình Huy Hoàng', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050043, 'Nguyễn Thái Hoàng', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050044, 'Bùi Duy Linh', 'DCCTKH64A', 4, NULL, '123456', NULL),
(1921050050, 'Lê Tuấn Anh', 'DCCTKH64B', 3, 'sv50@gmail.com', '1234567', '0342517806'),
(1921050051, 'Nguyễn Mạnh Cường', 'DCCTKH64B', 4, 'sv51@gmail.com', '1234567', '0334369785'),
(1921050052, 'Nguyễn Việt Cường', 'DCCTKH64B', 4, 'sv52@gmail.com', '1234567', '0998423658'),
(1921050053, 'Nguyễn Văn Đức', 'DCCTKH64B', 4, 'sv53@gmail.com', '1234567', '0342517826'),
(1921050054, 'Phan Thị Hà', 'DCCTKH64B', 4, 'sv54@gmail.com', '1234567', '0334369785'),
(1921050055, 'Đào Gia Hiếu', 'DCCTKH64B', 4, 'sv55@gmail.com', '1234567', '0334369875'),
(1921050056, 'Vũ Thị Huệ', 'DCCTKH64B', 4, 'sv56@gmail.com', '1234567', '0334369875'),
(1921050057, 'Phan Thị Thanh Huyền', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050058, 'Dương Xuân Lâm', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050059, 'Ngô Thùy Linh', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050060, 'Nguyễn Văn Linh', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050061, 'Trần Hoài Linh', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050062, 'Trần Xuân Lộc', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050063, 'Đinh Thành Long', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050064, 'Vũ Duy Long', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050065, 'Đoàn Văn Mạnh', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050066, 'Lê Thị Minh', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050067, 'Hoàng Thị Mơ', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050068, 'Nguyễn Văn Nam', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050069, 'Vũ Lê Khánh Nam', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050070, 'Ngô Thị Ngọc ', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050071, 'Khúc Thị Nhài', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050072, 'Hoa Cao Ngọc Nhật', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050073, 'Nguyễn Thị Phương', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050074, 'Đinh Văn Quân', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050075, 'Nguyễn Bá Quân', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050076, 'Phạm Minh Quang', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050077, 'Phí Thị Quỳnh', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050078, 'Nguyễn An Sơn', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050079, 'Nguyễn Văn Thăng', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050080, 'Phạm Văn Thanh', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050081, 'Nguyễn Thu Thảo', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050082, 'Nguyễn Văn Tiến', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050083, 'Trần Xuân Tiến', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050084, 'Nguyễn Văn Tới', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050085, 'Nguyễn Lê Trung', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050086, 'Phạm Quốc Trung', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050087, 'Nguyễn Văn Trường', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050088, 'Bùi Xuân Tùng', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050089, 'Đặng Văn Tùng', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050090, 'Đoàn Đức Tùng', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050091, 'Triệu Văn Tuyến', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050092, 'Nguyễn Quang Vinh', 'DCCTKH64B', 4, NULL, '123456', NULL),
(1921050137, 'Ngô Văn Duy', 'DCCTKH64A', 4, 'wtfduy0908@gmail.com', '1234567', NULL),
(1921050143, 'Trần Quang Duy', 'DCCTKH64A', 3, 'qduy@gmail.com', '1234567', NULL),
(2021050050, 'Lê Tuấn Anh', 'DCCTKH65A', 3, 'sv0250@gmail.com', '1234567', '0342517826'),
(2021050051, 'Nguyễn Mạnh Cường', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050052, 'Nguyễn Việt Cường', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050053, 'Nguyễn Văn Đức', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050054, 'Phan Thị Hà', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050055, 'Đào Gia Hiếu', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050056, 'Vũ Thị Huệ', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050057, 'Phan Thị Thanh Huyền', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050058, 'Dương Xuân Lâm', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050059, 'Ngô Thùy Linh', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050060, 'Nguyễn Văn Linh', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050061, 'Trần Hoài Linh', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050062, 'Trần Xuân Lộc', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050063, 'Đinh Thành Long', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050064, 'Vũ Duy Long', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050065, 'Đoàn Văn Mạnh', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050066, 'Lê Thị Minh', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050067, 'Hoàng Thị Mơ', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050068, 'Nguyễn Văn Nam', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050069, 'Vũ Lê Khánh Nam', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050070, 'Ngô Thị Ngọc ', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050071, 'Khúc Thị Nhài', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050072, 'Hoa Cao Ngọc Nhật', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050073, 'Nguyễn Thị Phương', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050074, 'Đinh Văn Quân', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050075, 'Nguyễn Bá Quân', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050076, 'Phạm Minh Quang', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050077, 'Phí Thị Quỳnh', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050078, 'Nguyễn An Sơn', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050079, 'Nguyễn Văn Thăng', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050080, 'Phạm Văn Thanh', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050081, 'Nguyễn Thu Thảo', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050082, 'Nguyễn Văn Tiến', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050083, 'Trần Xuân Tiến', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050084, 'Nguyễn Văn Tới', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050085, 'Nguyễn Lê Trung', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050086, 'Phạm Quốc Trung', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050087, 'Nguyễn Văn Trường', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050088, 'Bùi Xuân Tùng', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050089, 'Đặng Văn Tùng', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050090, 'Đoàn Đức Tùng', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050091, 'Triệu Văn Tuyến', 'DCCTKH65A', 4, NULL, '123456', NULL),
(2021050092, 'Nguyễn Quang Vinh', 'DCCTKH65A', 4, NULL, '123456', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `maGv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT '2',
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT '12356@',
  `maKhoa` int(11) DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`maGv`, `name`, `role_id`, `email`, `password`, `maKhoa`, `phone_number`) VALUES
('0805-05', 'Nguyễn Duy Huy', 2, 'duyhuy@gmail.com', '123456', 105, '0342517826'),
('0805-07', 'Trần Quang Hiếu ', 2, 'tranhieu@gmail.com', '123456', 105, '0705707802');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`tk`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`maLop`),
  ADD UNIQUE KEY `class_name` (`class_name`),
  ADD KEY `maGv` (`maGv`),
  ADD KEY `maKhoaHoc` (`maKhoaHoc`),
  ADD KEY `maKhoa` (`maKhoa`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`maKhoaHoc`);

--
-- Indexes for table `deadline`
--
ALTER TABLE `deadline`
  ADD PRIMARY KEY (`maGv`),
  ADD KEY `maGv` (`maGv`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`maKhoa`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`maSv`,`maHK`),
  ADD KEY `maSv` (`maSv`),
  ADD KEY `maHK` (`maHK`);

--
-- Indexes for table `point_monitor`
--
ALTER TABLE `point_monitor`
  ADD PRIMARY KEY (`maSv`,`maHK`),
  ADD KEY `maSv` (`maSv`),
  ADD KEY `maHK` (`maHK`);

--
-- Indexes for table `point_student`
--
ALTER TABLE `point_student`
  ADD PRIMARY KEY (`maSv`,`maHK`),
  ADD KEY `maSv` (`maSv`),
  ADD KEY `maHK` (`maHK`);

--
-- Indexes for table `point_teacher`
--
ALTER TABLE `point_teacher`
  ADD PRIMARY KEY (`maHK`,`maSv`),
  ADD KEY `maSv` (`maSv`),
  ADD KEY `maHK` (`maHK`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`maHK`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`maSv`),
  ADD KEY `maLop` (`maLop`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`maGv`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `maKhoa` (`maKhoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`maGv`) REFERENCES `teacher` (`maGv`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`maKhoaHoc`) REFERENCES `course` (`maKhoaHoc`),
  ADD CONSTRAINT `class_ibfk_3` FOREIGN KEY (`maKhoa`) REFERENCES `department` (`maKhoa`);

--
-- Constraints for table `deadline`
--
ALTER TABLE `deadline`
  ADD CONSTRAINT `deadline_ibfk_1` FOREIGN KEY (`maGv`) REFERENCES `teacher` (`maGv`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `khoa_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `point`
--
ALTER TABLE `point`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`),
  ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`maHK`) REFERENCES `semester` (`maHK`),
  ADD CONSTRAINT `fk_cascade_point` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`) ON DELETE CASCADE;

--
-- Constraints for table `point_monitor`
--
ALTER TABLE `point_monitor`
  ADD CONSTRAINT `diemlt_ibfk_1` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`),
  ADD CONSTRAINT `diemlt_ibfk_2` FOREIGN KEY (`maHK`) REFERENCES `semester` (`maHK`),
  ADD CONSTRAINT `fk_cascade_point_monitor` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`) ON DELETE CASCADE;

--
-- Constraints for table `point_student`
--
ALTER TABLE `point_student`
  ADD CONSTRAINT `diemsv_ibfk_1` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`),
  ADD CONSTRAINT `diemsv_ibfk_2` FOREIGN KEY (`maHK`) REFERENCES `semester` (`maHK`),
  ADD CONSTRAINT `fk_cascade_point_student` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`) ON DELETE CASCADE;

--
-- Constraints for table `point_teacher`
--
ALTER TABLE `point_teacher`
  ADD CONSTRAINT `diemgv_ibfk_1` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`),
  ADD CONSTRAINT `diemgv_ibfk_2` FOREIGN KEY (`maHK`) REFERENCES `semester` (`maHK`),
  ADD CONSTRAINT `fk_cascade_point_teacher` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`maLop`) REFERENCES `class` (`maLop`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`maKhoa`) REFERENCES `department` (`maKhoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
