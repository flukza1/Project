-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 11:38 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `student` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sec_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `term` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_id`, `subject_name`, `time`, `term`, `year`, `sec_id`, `teacher_name`) VALUES
(1, 5206105, 'YEAST TECHNOLOGY (3)', '09:30-12:30', 1, 2561, 1, 'รศ. ดวงใจ  โอชัยกุล'),
(2, 5206105, 'YEAST TECHNOLOGY (3)', '09:30-12:30', 1, 2561, 1, 'ผศ.ดร. เจริญ'),
(3, 5206106, 'GENETIC ENGINEERING (3)', '09:30-12:30', 1, 2561, 1, 'ผศ.ดร. อนุรักษ์  โพธิ์เอี่ยม'),
(4, 5216101, 'MICROBIOLOGY ASSOCIATED WITH FOOD (3)', '09:30-12:30', 1, 2561, 1, 'รศ.ดร. สุรีย์  นานาสมบัติ'),
(5, 5216103, 'PRODUCT RECOVERY (3)', '09:30-12:30', 1, 2561, 1, 'ผศ.ดร. สมชาย  ไกรรักษ์'),
(6, 5216103, 'PRODUCT RECOVERY (3)', '09:30-12:30', 1, 2561, 1, 'ผศ.ดร. สมชาย  ไกรรักษ์'),
(7, 5216105, 'IMMUNOLOGY (3)', '09:30-12:30', 1, 2561, 1, 'รศ.ดร. จิตติ  ท่าไว'),
(8, 5216111, 'APPLIED PHARMACEUTICAL MICROBIOLOGY (3)', '09:30-12:30', 1, 2561, 1, 'อ. พิเศษ'),
(9, 5216111, 'APPLIED PHARMACEUTICAL MICROBIOLOGY (3)', '09:30-12:30', 1, 2561, 1, 'ดร. กานต์  วงศาริยะ'),
(10, 5406109, 'INTRODUCTION TO MULTIVARIATE ANALYSIS (3)', '09:30-12:30', 1, 2561, 1, 'รศ. สายชล  สินสมบูรณ์ทอง'),
(11, 5506072, 'WEB MINING (3)', '09:30-12:30', 1, 2561, 1, 'ดร. อัคเดช  อุดมชัยพร'),
(12, 5506072, 'WEB MINING (3)', '09:30-12:30', 1, 2561, 1, 'ดร. กุลสวัสดิ์  จิตขจรวานิช'),
(13, 5506072, 'WEB MINING (3)', '09:30-12:30', 1, 2561, 2, 'ดร. อัคเดช  อุดมชัยพร'),
(14, 5506072, 'WEB MINING (3)', '09:30-12:30', 1, 2561, 2, 'ดร. กุลสวัสดิ์  จิตขจรวานิช'),
(15, 5506072, 'WEB MINING (3)', '09:30-12:30', 1, 2561, 1, 'ดร. อัคเดช  อุดมชัยพร'),
(16, 5506072, 'WEB MINING (3)', '09:30-12:30', 1, 2561, 1, 'ดร. กุลสวัสดิ์  จิตขจรวานิช'),
(17, 5506072, 'WEB MINING (3)', '09:30-12:30', 1, 2561, 2, 'ดร. อัคเดช  อุดมชัยพร'),
(18, 5506072, 'WEB MINING (3)', '09:30-12:30', 1, 2561, 2, 'ดร. กุลสวัสดิ์  จิตขจรวานิช'),
(19, 5656007, 'ANALYTICAL CHEMISTRY (3)', '09:30-12:30', 1, 2561, 555, 'อ.พิเศษ'),
(20, 5656007, 'ANALYTICAL CHEMISTRY (3)', '09:30-12:30', 1, 2561, 555, 'ผศ.ดร. เสาวภาคย์  ธีราทรง'),
(21, 5656027, 'INDUSTRIAL FERMENTATION (3)', '09:30-12:30', 1, 2561, 555, 'อ. พิเศษ'),
(22, 5656027, 'INDUSTRIAL FERMENTATION (3)', '09:30-12:30', 1, 2561, 555, 'ดร. กานต์  วงศาริยะ'),
(23, 5656027, 'INDUSTRIAL FERMENTATION (3)', '09:30-12:30', 1, 2561, 556, 'อ. พิเศษ'),
(24, 5656027, 'INDUSTRIAL FERMENTATION (3)', '09:30-12:30', 1, 2561, 556, 'ดร. กานต์  วงศาริยะ'),
(25, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 501, 'รศ. ปรียาภา  จิตต์บุญ'),
(26, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 502, 'รศ.ดร. ภัทรพร ธรรมประดิษฐ์'),
(27, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 503, 'อ. ดวงใจ วสุเพ็ญ'),
(28, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 504, 'อ. เจนจิรา จิตรไพบูลย์'),
(29, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 505, 'ผศ. อุมาพร อุไรสกุล'),
(30, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 505, 'ดร. อำภาพรรณ ตันตินาครกูล'),
(31, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 506, 'อ. ศศิกานต์ ศศิธรเวชกุล'),
(32, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 506, 'ดร. อำภาพรรณ ตันตินาครกูล'),
(33, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 507, 'ดร. พิมพ์รำไพ  พันธุ์วิชาติกุล'),
(34, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 507, 'ดร. อำภาพรรณ ตันตินาครกูล'),
(35, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 508, 'ดร. กฤษณะ  โฆษชุณหนันท์'),
(36, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 508, 'ดร. อำภาพรรณ ตันตินาครกูล'),
(37, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 509, 'อ. ปรารถนา  กังสดาลย์'),
(38, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 509, 'ดร. อำภาพรรณ ตันตินาครกูล'),
(39, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 510, 'อ. เพ็ญพิชชา ประกายบริสุทธิ์'),
(40, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 510, 'ดร. อำภาพรรณ ตันตินาครกูล'),
(41, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 511, 'อ. พิมพ์พนิต โชติสวัสดิ์'),
(42, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 511, 'ดร. อำภาพรรณ ตันตินาครกูล'),
(43, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 512, 'รศ. ปรียาภา  จิตต์บุญ'),
(44, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 513, 'รศ.ดร. ภัทรพร ธรรมประดิษฐ์'),
(45, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 514, 'อ. ดวงใจ วสุเพ็ญ'),
(46, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 515, 'อ. เจนจิรา จิตรไพบูลย์'),
(47, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 516, 'รศ. เฉลิมศรี ปรีชาพานิช'),
(48, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 516, 'ดร. อำภาพรรณ ตันตินาครกูล'),
(49, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 517, 'รศ. สุขุมาลย์ นิลรัตน์'),
(50, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 517, 'ดร. อำภาพรรณ ตันตินาครกูล'),
(51, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 518, 'ผศ. อุมาพร อุไรสกุล'),
(52, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 518, 'ดร. อำภาพรรณ ตันตินาครกูล'),
(53, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 519, 'อ. ปรารถนา  กังสดาลย์'),
(54, 90201001, 'FOUNDATION ENGLISH 1 (3)', '09:30-12:30', 1, 2561, 519, 'ดร. อำภาพรรณ ตันตินาครกูล');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `teacher_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `role`, `teacher_type`) VALUES
(28, 'ดร.บุญญสิทธิ์ วรจันทร์', 'อาจารย์', 'ผู้บริหาร');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(3, 'test', '202cb962ac59075b964b07152d234b70', 'sss@gamil.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`,`subject_id`) USING BTREE;

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`,`subject_id`,`sec_id`) USING BTREE;

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`,`teacher_name`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
