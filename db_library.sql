-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 10:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE `tb_book` (
  `b_id` varchar(6) NOT NULL,
  `b_name` varchar(60) NOT NULL,
  `b_writer` varchar(50) DEFAULT NULL,
  `b_category` varchar(2) NOT NULL,
  `b_price` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`b_id`, `b_name`, `b_writer`, `b_category`, `b_price`) VALUES
('B00001', 'คู่มือการสอบรับราชการ', 'สมศักดิ์ ตั้งใจ', '1', 299),
('B00002', 'แฮรี่ พอตเตอร์', 'J.K. Rowling', '2', 259),
('B00003', 'เย็บ ปัก ถักร้อย', 'สะอาด อิ่มสุข', '3', 249),
('B00004', 'เจ้าชายน้อย', 'อ็องตวน เดอ แซ็ง', '2', 355),
('B00005', 'การเขียนโปรแกรมคอมพิวเตอร์', 'กิ่งแก้ว กลิ่นหอม', '1', 329),
('B00006', 'แจ็คผู้ฆ่ายักษ์', 'ไม่รู้', '2', 199);

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrow_book`
--

CREATE TABLE `tb_borrow_book` (
  `br_date_br` date NOT NULL DEFAULT current_timestamp(),
  `br_date_rt` date NOT NULL DEFAULT '1990-01-01',
  `b_id` varchar(6) NOT NULL,
  `m_user` varchar(40) NOT NULL,
  `br_fine` decimal(3,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_borrow_book`
--

INSERT INTO `tb_borrow_book` (`br_date_br`, `br_date_rt`, `b_id`, `m_user`, `br_fine`) VALUES
('2021-08-20', '2021-08-28', 'B00002', 'member03', 25),
('2021-08-21', '2025-02-07', 'B00001', 'member02', 15),
('2021-08-22', '2025-02-07', 'B00001', 'member02', 15),
('2021-08-23', '2025-02-07', 'B00003', 'member01', 0),
('2021-08-23', '2025-02-07', 'B00004', 'member05', 0),
('2025-02-07', '2025-02-07', 'B00001', 'member06', 15),
('2025-02-07', '1990-01-01', 'B00002', 'member06', NULL),
('2025-02-07', '1990-01-01', 'B00003', 'member01', NULL),
('2025-02-07', '2025-02-07', 'B00004', 'member01', 0),
('2025-02-07', '2025-02-07', 'B00005', 'member01', 15),
('2025-02-07', '2025-02-07', 'B00005', 'member06', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `m_user` varchar(40) NOT NULL,
  `m_pass` varchar(20) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`m_user`, `m_pass`, `m_name`, `m_phone`) VALUES
('member01', 'abc1111', 'สมหญิง จริงโจ้', '0811111111'),
('member02', 'abc2222', 'สมชาย มั่นคง', '0822222222'),
('member03', 'abc3333', 'สมเกียรติ เก่งกล้า', '0833333333'),
('member04', 'abc4444', 'สมสมร อิ่มเอม', '0844444444'),
('member05', 'abc5555', 'สมรักษ์ สะอาด', '0855555555'),
('member06', 'asd12345', 'สมดุ๋ย จริงจู้', '0901234567'),
('member07', 'asd12345', 'สมร สแหม่', '0991234567'),
('member08', 'asd12345', 'สมดุ๋ย ดึ้บดึ้บ', '0991234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tb_borrow_book`
--
ALTER TABLE `tb_borrow_book`
  ADD PRIMARY KEY (`br_date_br`,`b_id`,`m_user`),
  ADD KEY `fk_b_id` (`b_id`),
  ADD KEY `fk_m_user` (`m_user`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`m_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_borrow_book`
--
ALTER TABLE `tb_borrow_book`
  ADD CONSTRAINT `fk_b_id` FOREIGN KEY (`b_id`) REFERENCES `tb_book` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_m_user` FOREIGN KEY (`m_user`) REFERENCES `tb_member` (`m_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
