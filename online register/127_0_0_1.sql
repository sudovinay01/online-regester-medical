-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 04:20 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1`
--
CREATE DATABASE IF NOT EXISTS `1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `1`;

-- --------------------------------------------------------

--
-- Table structure for table `cpat`
--

CREATE TABLE `cpat` (
  `id` int(250) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pname` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` text NOT NULL,
  `dname` varchar(100) NOT NULL,
  `amo` int(100) NOT NULL,
  `amop` int(100) NOT NULL,
  `tests` varchar(100) NOT NULL,
  `addby` varchar(100) NOT NULL,
  `cdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cby` varchar(100) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpat`
--

INSERT INTO `cpat` (`id`, `datetime`, `pname`, `age`, `gender`, `dname`, `amo`, `amop`, `tests`, `addby`, `cdatetime`, `cby`, `reason`) VALUES
(11, '2019-08-12 18:32:31', '1', 1, 'male', '1', 1, 1, 'a:1:{i:0;s:1:\"1\";}', '1', '2019-08-12 19:12:25', '1', 'fedf'),
(12, '2019-08-12 18:32:40', '2', 2, 'male', '2', 2, 2, 'a:1:{i:0;s:1:\"2\";}', '1', '2019-08-12 19:11:03', '1', 'aa'),
(13, '2019-08-12 19:12:18', '22', 22, 'female', 'dsd', 32, 2, 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";}', '1', '2019-08-12 19:17:58', '1', '23'),
(14, '2019-08-12 19:16:39', 'ww', 1, 'male', 'ws', 2332, 3, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"4\";}', '1', '2019-08-13 14:05:11', 'yeshwanth kumar', 'cd'),
(15, '2019-08-13 07:53:23', 'lokesh', 21, 'male', 'anji', 100, 0, 'a:1:{i:0;s:2:\"37\";}', 'admin', '2019-08-13 07:56:39', 'admin', 'aids'),
(17, '2019-08-13 13:58:52', 'yeshwanth', 20, 'male', 'palavai', 100, 100, 'a:4:{i:0;s:1:\"3\";i:1;s:1:\"5\";i:2;s:1:\"7\";i:3;s:1:\"9\";}', 'yeshwanth kumar', '2019-08-13 14:02:16', 'yeshwanth kumar', 'palavai is not checking properly');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` text NOT NULL,
  `uname` varchar(100) NOT NULL,
  `addedby` varchar(100) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `password`, `type`, `uname`, `addedby`, `addedon`) VALUES
(1, 'admin', '$2y$10$UrzecSxM32Ngo8E5opBwbuX.5L3wHydZUeqLn4UKPkLltGqyST4gC', 'admin', 'admin', 'admin', '2019-08-12 08:32:10'),
(2, 'admin', '$2y$10$R12mZD0IBcFmqX91ddj.muBOdmorI39kzbaNxx7hDAkkDqcQvh8iq', 'member', 'admin', 'admin', '2019-08-12 08:32:10'),
(20, '2', '$2y$10$XZDv79IqBEsdYN/Z16StrO0goWDVtQxOgoaPTcF3iDw4jKlPBnI.m', 'admin', '2', 'admin', '2019-08-12 16:38:24'),
(21, '1', '$2y$10$uLG1eQdXr4y5pcJO1K1g5etor/wkrHB7H5BN.pF23Nt9oyY2TGKfm', 'member', '1', 'admin', '2019-08-13 08:00:28'),
(22, '3', '$2y$10$PxIrGd./xKylAgTZsHB9ieLvMxnkAHUEvGLwDku9kKPM3nUnwVLiy', 'member', '3', 'admin', '2019-08-13 11:14:49'),
(23, 'w', '$2y$10$hq7Wf7ixqEZ0iCzBTIjxUuWuBtdvQVPl3F0F4vinMAVj3CyXAKg8y', 'admin', 'w', 'admin', '2019-08-13 12:22:56'),
(27, 'vinay', '$2y$10$y6QHCdYe2MVQYg1tXhRLeePH8e7/XOYfEzH0lD2jIqd.q/p6tRseW', 'member', 'vinay kumar', 'admin', '2019-08-13 13:51:46'),
(28, 'vinay', '$2y$10$XGOvrz2fV7eEDF6rk0eogOzQxt0VYZbSO7WHflcwaJuJbKsZGPDKG', 'admin', 'vinay kumar', '2', '2019-08-13 13:52:18'),
(29, 'yeshwanth', '$2y$10$AMeaac8NmC2k287D71NtHubi49RwnfSGkDDHx/4rPljVg.zsuprQG', 'member', 'yeshwanth kumar', 'admin', '2019-08-13 13:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `oldmembers`
--

CREATE TABLE `oldmembers` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` text NOT NULL,
  `uname` varchar(100) NOT NULL,
  `addedby` varchar(100) NOT NULL,
  `removedby` varchar(100) NOT NULL,
  `removedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oldmembers`
--

INSERT INTO `oldmembers` (`id`, `name`, `password`, `type`, `uname`, `addedby`, `removedby`, `removedon`, `addedon`, `reason`) VALUES
(20, 'q', '$2y$10$HWnPEpuLltZNOXS4R7VACOxavhlN1QtkvPXE4EkCGRPo76kOpC6Sa', 'member', 'q', 'admin', 'admin', '2019-08-12 10:02:29', '2019-08-12 10:02:07', 'dont know'),
(21, 'w', '$2y$10$4UAlnfXLlFpC/zcuaWyHN.3Vu4WtmVmHZbg5fVU/GXDdCArGeI2b.', 'member', 'w', 'admin', 'admin', '2019-08-12 10:02:37', '2019-08-12 10:02:14', 'wush ggg'),
(22, 'a', '$2y$10$xhoxN7qgTHxAt3NWI13OkuzPwXk6RS31y.cWCP21sBm03JGfZA1u.', 'member', 'a', 'a', 'a', '2019-08-12 14:29:36', '2019-08-12 08:33:08', 'testing'),
(23, 'dd', '$2y$10$4q7q0Fx6fUqfwD4yRzYt9uoQBxedWbWaTiEDfwD6mDVbFIRMDjpLG', 'member', 'd', 'admin', 'admin', '2019-08-12 16:12:29', '2019-08-12 10:02:22', 'aaa'),
(24, 'a', '$2y$10$YPB5R/Ri2aajYznFUVfMMuYxU/gtCm8Z73tYua/o3hQFgUJOFMDvO', 'admin', 'a', 'admin', 'a', '2019-08-12 16:38:00', '2019-08-12 08:32:30', 'aaa'),
(25, '1', '$2y$10$UZq0/1rVPFecFmyVBvfd9OqSswMXUHB7S31EUGACGFjL.XCGxnCoK', 'member', '1', 'admin', 'admin', '2019-08-13 07:57:57', '2019-08-12 16:38:18', 'left job'),
(26, 'yeshwanth kumar', '$2y$10$rko27y8vFhIybhyhtzmJkeY/yrTalj2bgfPjtU0evRaXhvA3nbgte', 'member', 'yeshwanth567', 'admin', 'admin', '2019-08-13 13:42:08', '2019-08-13 13:38:09', 'forgot [assword'),
(27, 'vinay kumar', '$2y$10$xDlOneWsK0vBZlD.n0XMuOcAaNhc/AVoBoSGIhR57wSwGFX9I0fIK', 'member', 'vinay', 'admin', 'admin', '2019-08-13 13:51:20', '2019-08-13 13:48:38', 'dont know'),
(28, 'yeshwanth kumar', '$2y$10$p6O33Jj/2sM6Q6ZDgZuj2excZUP.bOgAjq2taEMVgC9TbFo5pmZs6', 'member', 'yeshwanth', 'admin', 'admin', '2019-08-13 13:51:24', '2019-08-13 13:42:59', 'fff');

-- --------------------------------------------------------

--
-- Table structure for table `pat`
--

CREATE TABLE `pat` (
  `id` int(250) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pname` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` text NOT NULL,
  `dname` varchar(100) NOT NULL,
  `amo` int(100) NOT NULL,
  `amop` int(100) NOT NULL,
  `tests` varchar(100) NOT NULL,
  `addby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pat`
--

INSERT INTO `pat` (`id`, `datetime`, `pname`, `age`, `gender`, `dname`, `amo`, `amop`, `tests`, `addby`) VALUES
(9, '2019-08-12 18:02:52', '1', 1, 'male', '1 ', 1, 1, 'a:1:{i:0;s:1:\"1\";}', '1'),
(10, '2019-08-12 18:03:49', '2', 2, 'female', '2', 2, 2, 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', '1'),
(15, '2019-08-13 13:30:18', '33', 3, 'male', '3', 33, 3, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '1'),
(16, '2019-08-13 13:31:26', '22', 2, 'male', '22', 22, 2, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `tid` int(100) NOT NULL,
  `tnames` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`tid`, `tnames`) VALUES
(1, 'CBP'),
(2, 'ESR'),
(3, 'Blood Parasites MP/Microfilaria'),
(4, 'Malarial Parasites(Rapid test or card Method)'),
(5, 'Haemoglobin'),
(6, 'A.E.c.\r\n'),
(7, 'Platelet count'),
(8, 'BT & CT'),
(9, 'Blood Grouping + Rh Typing'),
(10, 'C.U.E.'),
(11, 'B.S.,B.P.'),
(12, 'Stool Exam Routine'),
(13, 'Stool for PH & Reducing Substances'),
(14, 'urine pregnancy test'),
(15, 'Semen Analysis'),
(16, 'Random Blood Sugar'),
(17, 'Fasting/Post Lunch Blood sugar'),
(18, 'Blood urea'),
(19, 'S. Creatinine'),
(20, 'S. Uric Acid'),
(21, 'S. Cholesterol'),
(22, 'S. Triglycerides'),
(23, 'S. Calcium'),
(24, 'S. Proteins with A/G Ratio'),
(25, 'S.Bilirubin'),
(26, 'S. Electrolytes'),
(27, 'S. Lipid Profile'),
(28, 'LFT'),
(29, 'Widal Test'),
(30, 'TB lgG/lgM'),
(31, 'Denque lgG/lgM'),
(32, 'ASO'),
(33, 'RA Factor'),
(34, 'CRP'),
(35, 'VDRL'),
(36, 'HBsAg.'),
(37, 'HIV I&II'),
(38, 'Mantoux Test'),
(39, 'Sputum for AFB'),
(40, 'Other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpat`
--
ALTER TABLE `cpat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oldmembers`
--
ALTER TABLE `oldmembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pat`
--
ALTER TABLE `pat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cpat`
--
ALTER TABLE `cpat`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `oldmembers`
--
ALTER TABLE `oldmembers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pat`
--
ALTER TABLE `pat`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `tid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
