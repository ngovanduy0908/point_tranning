-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2022 at 03:56 PM
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
('DCCTKH64B', '0805-05', 'Khoa Học Máy Tính K64B', 192, 105);

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
(192, 'Khóa 64', '2019', '2023');

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
('0805-05', '2022-03-14', '2022-03-14', '2022-03-15');

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
  `status_teacher` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`maSv`, `maHK`, `point_student`, `point_monitor`, `point_teacher`, `status`, `status_teacher`) VALUES
(1921050137, 'hk1-2021-2022', 74, 76, 76, 1, 1);

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
  `ltRightRule` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `point_monitor`
--

INSERT INTO `point_monitor` (`maSv`, `maHK`, `ltDiemTBHK`, `ltCitizen`, `ltMonitor`, `ltNCKH1`, `ltNCKH2`, `ltNCKH3`, `ltOlympic1`, `ltOlympic2`, `ltOlympic3`, `ltOlympic4`, `ltNoRegulation`, `ltOnTime`, `ltAbandon`, `ltUnTrueTime`, `ltNoFullStudy`, `ltNoCard`, `ltNoAtivities`, `ltNoPayFee`, `ltFullActive`, `ltAchievementSchool`, `ltAchievementCity`, `ltAdvise`, `ltIrresponsible`, `ltNoCultural`, `ltPositiveStudy`, `ltPositiveLove`, `ltWarn`, `ltNoProtect`, `ltBonus`, `ltIrresponsibleMonitor`, `ltRightRule`, `status`) VALUES
(1921050137, 'hk1-2021-2022', 20, 10, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10, 0);

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
  `svRightRule` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `point_student`
--

INSERT INTO `point_student` (`maSv`, `maHK`, `svDiemTBHK`, `svCitizen`, `svMonitor`, `svNCKH1`, `svNCKH2`, `svNCKH3`, `svOlympic1`, `svOlympic2`, `svOlympic3`, `svOlympic4`, `svNoRegulation`, `svOnTime`, `svAbandon`, `svUnTrueTime`, `svNoFullStudy`, `svNoCard`, `svNoAtivities`, `svNoPayFee`, `svFullActive`, `svAchievementSchool`, `svAchievementCity`, `svAdvise`, `svIrresponsible`, `svNoCultural`, `svPositiveStudy`, `svPositiveLove`, `svWarn`, `svNoProtect`, `svBonus`, `svIrresponsibleMonitor`, `svRightRule`, `status`) VALUES
(1921050137, 'hk1-2021-2022', 18, 10, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10, 0);

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
  `gvRightRule` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `point_teacher`
--

INSERT INTO `point_teacher` (`maSv`, `maHK`, `gvDiemTBHK`, `gvCitizen`, `gvMonitor`, `gvNCKH1`, `gvNCKH2`, `gvNCKH3`, `gvOlympic1`, `gvOlympic2`, `gvOlympic3`, `gvOlympic4`, `gvNoRegulation`, `gvOnTime`, `gvAbandon`, `gvUnTrueTime`, `gvNoFullStudy`, `gvNoCard`, `gvNoAtivities`, `gvNoPayFee`, `gvFullActive`, `gvAchievementSchool`, `gvAchievementCity`, `gvAdvise`, `gvIrresponsible`, `gvNoCultural`, `gvPositiveStudy`, `gvPositiveLove`, `gvWarn`, `gvNoProtect`, `gvBonus`, `gvIrresponsibleMonitor`, `gvRightRule`, `status`) VALUES
(1921050137, 'hk1-2021-2022', 20, 10, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0, 0, 0, 0, 10, 5, 0, 0, 0, 0, 10, 0);

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
('hk2-2022-2023', 'Học Kì 2 Năm Học 2022-2023', 1, '2', '2022-2023');

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
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`maSv`, `name`, `maLop`, `role_id`, `email`, `password`) VALUES
(1921050001, 'Đỗ Đức Anh', 'DCCTKH64A', 4, NULL, '123456'),
(1921050002, 'Nguyễn Thị Ngọc Ánh ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050003, 'Hoàng Thị Bình ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050004, 'Vũ Anh Chung', 'DCCTKH64A', 4, NULL, '123456'),
(1921050005, 'Phan Tùng Dương ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050006, 'Đỗ Công Đức ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050007, 'Nguyễn Văn Đức ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050008, 'Phạm Hoàng Hải ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050009, 'Nguyễn Văn Huấn ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050010, 'Vũ Tiến Hùng', 'DCCTKH64A', 4, NULL, '123456'),
(1921050011, 'Nguyễn Ngọc Huy ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050012, 'Trần Quang Huy ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050013, 'Nguyễn Ngô Hưng ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050014, 'Vũ Ngọc Huyên ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050015, 'Lê Thị Khánh ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050016, 'Hoàng Khắc Tuấn Kiệt ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050017, 'Phạm Mai Lan', 'DCCTKH64A', 4, NULL, '123456'),
(1921050018, ' Nguyễn Thành Long ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050019, 'Ninh Đức Mạnh ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050020, 'Nguyễn Phương Nam ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050021, 'Nguyễn Thị Thanh Thanh Nhàn ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050022, 'Nguyễn Hồng Nhung', 'DCCTKH64A', 4, NULL, '123456'),
(1921050023, 'Lê Thị Oanh', 'DCCTKH64A', 4, NULL, '123456'),
(1921050024, 'Phạm Gia Phong', 'DCCTKH64A', 4, NULL, '123456'),
(1921050025, 'Phạm Nhật Phong ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050026, 'Phạm Việt Phương ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050027, 'Ðoàn Ngọc Quý ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050028, 'Nguyễn Văn Quyết ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050029, 'Nguyễn Thị Thu Sương ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050030, 'Lê Thành Thảo ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050031, 'Nguyễn Chiến Thắng ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050032, 'Tạ Tương Thiện ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050033, 'Đào Đình Toàn ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050034, 'Nguyễn Thành Trung ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050035, 'Nguyễn Anh Tuấn ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050036, 'Phạm Minh Tuấn', 'DCCTKH64A', 4, NULL, '123456'),
(1921050037, 'Lê Thanh Tùng ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050038, 'Nguyễn Quốc Tùng ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050039, 'Đặng Danh Việt ', 'DCCTKH64A', 4, NULL, '123456'),
(1921050040, 'Nguyễn Mạnh Dũng', 'DCCTKH64A', 4, NULL, '123456'),
(1921050041, 'Trần quang Duy', 'DCCTKH64A', 4, NULL, '123456'),
(1921050042, 'Bùi Đình Huy Hoàng', 'DCCTKH64A', 4, NULL, '123456'),
(1921050043, 'Nguyễn Thái Hoàng', 'DCCTKH64A', 4, NULL, '123456'),
(1921050044, 'Bùi Duy Linh', 'DCCTKH64A', 4, NULL, '123456'),
(1921050137, 'Ngô Văn Duy', 'DCCTKH64A', 4, 'ngoduy090801@gmail.com', '1234567'),
(1921050143, 'Trần Quang Duy', 'DCCTKH64A', 3, 'qduy@gmail.com', '1234567');

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
  `maKhoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`maGv`, `name`, `role_id`, `email`, `password`, `maKhoa`) VALUES
('0805-05', 'Nguyễn Duy Huy', 2, 'duyhuy@gmail.com', '123456', 105);

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
  ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`maHK`) REFERENCES `semester` (`maHK`);

--
-- Constraints for table `point_monitor`
--
ALTER TABLE `point_monitor`
  ADD CONSTRAINT `diemlt_ibfk_1` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`),
  ADD CONSTRAINT `diemlt_ibfk_2` FOREIGN KEY (`maHK`) REFERENCES `semester` (`maHK`);

--
-- Constraints for table `point_student`
--
ALTER TABLE `point_student`
  ADD CONSTRAINT `diemsv_ibfk_1` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`),
  ADD CONSTRAINT `diemsv_ibfk_2` FOREIGN KEY (`maHK`) REFERENCES `semester` (`maHK`);

--
-- Constraints for table `point_teacher`
--
ALTER TABLE `point_teacher`
  ADD CONSTRAINT `diemgv_ibfk_1` FOREIGN KEY (`maSv`) REFERENCES `students` (`maSv`),
  ADD CONSTRAINT `diemgv_ibfk_2` FOREIGN KEY (`maHK`) REFERENCES `semester` (`maHK`);

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
