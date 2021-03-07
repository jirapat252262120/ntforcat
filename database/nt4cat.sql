-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 03:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nt4cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_text` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `link_category`
--

CREATE TABLE `link_category` (
  `link_id` int(20) NOT NULL,
  `main_id` int(4) NOT NULL,
  `link_address` varchar(255) NOT NULL,
  `link_name` varchar(255) DEFAULT NULL,
  `datetime_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_category`
--

INSERT INTO `link_category` (`link_id`, `main_id`, `link_address`, `link_name`, `datetime_create`) VALUES
(1, 3, 'https://www.google.com', 'ค้นหา', '2021-02-22 07:54:50'),
(2, 3, 'https://www.google2.com', 'ค้นหา 2', '2021-02-22 07:55:42'),
(3, 1, 'https://www.cat.com', 'เว็บสำนักงาน', '2021-02-22 07:55:46'),
(5, 1, 'https://ww.cat3.com', 'เว็บสำนักงาน 3', '2021-02-22 07:55:51'),
(19, 3, 'หกเหกเ', 'ค้นหา 3', '2021-03-01 10:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `main_id` int(20) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `color_category` varchar(255) NOT NULL,
  `datetime_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`main_id`, `name_category`, `color_category`, `datetime_create`) VALUES
(1, 'งานทำประจำรายวัน', 'bg-danger', '2021-02-13 14:17:59'),
(2, 'ลิงค์ทั่วไป', 'bg-success', '2021-02-13 14:18:13'),
(3, 'ลิงค์น่าสนใจ', 'bg-warning', '2021-02-13 14:21:07'),
(4, 'Add Onu', 'bg-primary', '2021-02-13 14:24:22'),
(5, 'ตัวอย่างงานตรวจซ่อม', 'bg-secondary', '2021-02-13 14:34:56'),
(24, 'ทดสอบ1', 'bg-primary', '2021-03-02 08:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `position`) VALUES
(2, 'สมโชค ฤทธิ์คง', 'somchok.r', 'd746c4ffc30acbfbc8cbf42c1e9added', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_category`
--
ALTER TABLE `link_category`
  ADD PRIMARY KEY (`link_id`,`main_id`),
  ADD KEY `main_id` (`main_id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`main_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `link_category`
--
ALTER TABLE `link_category`
  MODIFY `link_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `main_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `link_category`
--
ALTER TABLE `link_category`
  ADD CONSTRAINT `link_category_ibfk_1` FOREIGN KEY (`main_id`) REFERENCES `main_category` (`main_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
