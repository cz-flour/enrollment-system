-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 02:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lrn` int(12) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `extension` varchar(5) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(2) NOT NULL,
  `height` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `cstatus` varchar(30) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `place_birth` varchar(70) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `province` text NOT NULL,
  `municipality` text NOT NULL,
  `brgy` text NOT NULL,
  `purok` varchar(20) NOT NULL,
  `grlevel` varchar(30) NOT NULL,
  `track` varchar(50) NOT NULL,
  `strand` varchar(50) NOT NULL,
  `psa` longblob NOT NULL,
  `formcard` blob NOT NULL,
  `pics` blob NOT NULL,
  `complform` blob NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `caddress` varchar(60) NOT NULL,
  `rel` varchar(50) NOT NULL,
  `cpnum` int(30) NOT NULL,
  `schname` varchar(60) NOT NULL,
  `schaddress` varchar(60) NOT NULL,
  `yrcomp` varchar(30) NOT NULL,
  `schnamej` varchar(60) NOT NULL,
  `schaddressj` varchar(60) NOT NULL,
  `yrcompj` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_id`, `user_id`, `lrn`, `lname`, `fname`, `mname`, `extension`, `birthdate`, `age`, `height`, `weight`, `cstatus`, `nationality`, `place_birth`, `sex`, `religion`, `contact`, `province`, `municipality`, `brgy`, `purok`, `grlevel`, `track`, `strand`, `psa`, `formcard`, `pics`, `complform`, `fullname`, `caddress`, `rel`, `cpnum`, `schname`, `schaddress`, `yrcomp`, `schnamej`, `schaddressj`, `yrcompj`, `date`) VALUES
(7, 3, 34567, 'knb', 'dfq', 'gjd', 'N/A', '2023-06-23', 32, 213, 32, 'Single', 'Filipino', 'efss', 'Male', 'qdaafsz', 98734566, 'Albay', 'Oas', 'Bongoran', '3', 'Grade 11', 'Academic Track', 'General Academic Strand (GAS)', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2023-08-30 16:37:01'),
(8, 3, 987654, 'Lop', 'uyg', 'yftc', 'p', '2023-08-18', 76, 678, 54, 'Single', 'ddsew', 'ffgjk', 'Male', 'kfdkuy', 94345678, 'Albay', 'Oas', 'Bongoran', '7', 'Grade 11', 'Tech-Voc Track', 'Electrical Installation and Maintenance', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2023-08-30 16:37:01'),
(9, 3, 987654, 'Lop', 'uyg', 'yftc', 'p', '2023-08-18', 76, 678, 54, 'Single', 'ddsew', 'ffgjk', 'Male', 'kfdkuy', 94345678, 'Albay', 'Oas', 'Bongoran', '7', 'Grade 11', 'Tech-Voc Track', 'Electrical Installation and Maintenance', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2023-08-30 16:37:01'),
(10, 4, 654346789, 'Lopez', 'Czarina Aicah', 'Manlangit', 'N/A', '2008-07-09', 22, 160, 56, 'Single', 'Filipino', 'Marikina', 'Female', 'kjfsert', 987654371, 'Albay', 'Ligao', 'Obaliw', '2', 'Grade 11', 'Academic Track', 'General Academic Strand (GAS)', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2023-08-30 16:37:01'),
(11, 4, 2147483647, 'Lop', 'gvbn', 'jhgfcv', 'p', '2003-01-29', 98, 567, 34, 'Seperated', 'jhgvb', 'pcbnbmnm', 'Male', 'hgvbnm', 9234568, 'Albay', 'Guinobatan', 'Bagumbayan', '8', 'Grade 11', 'Academic Track', 'General Academic Strand (GAS)', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2023-08-30 16:37:01'),
(12, 4, 987654, 'snkdk', 'uytdxfc', 'ugyffx', 'o', '2001-02-07', 76, 456, 67, 'Married', 'bnmknkn', 'jbmm', 'Male', 'gxbyftct', 646858787, 'Albay', 'Ligao', 'Bagumbayan', '8', 'Grade 11', 'Academic Track', 'General Academic Strand (GAS)', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2023-08-30 16:37:01'),
(13, 3, 34567890, 'ertyu', '', '', '', '2023-08-18', 0, 0, 0, '', '', '', 'Male', '', 0, '', '', '', '', 'Grade 11', 'Tech-Voc Track', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2023-08-30 16:37:01'),
(14, 3, 0, '', '', '', '', '0000-00-00', 0, 0, 0, '', '', '', 'Male', '', 0, '', '', '', '', 'Grade 11', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2023-08-30 16:37:01'),
(15, 3, 0, '', '', '', '', '0000-00-00', 0, 0, 0, '', '', '', 'Male', '', 0, '', '', '', '', 'Grade 11', '', '', 0x53637265656e73686f7420283336292e706e67, 0x53637265656e73686f7420283430292e706e67, 0x53637265656e73686f7420283536292e706e67, 0x53637265656e73686f7420283530292e706e67, 'rrydr', 'ufycdrr', 'uidutddf', 9877654, 'uidddd', 'ufuuctut', '544', 'bkyit', 'yutdeweq', '8765', '2023-08-30 16:37:01'),
(16, 3, 0, '', '', '', '', '0000-00-00', 0, 0, 0, '', '', '', 'Male', '', 0, '', '', '', '', 'Grade 11', '', '', 0x32332d303732382d3034335f4c6967616f2d436974792e706466, 0x3336373534343635305f3331383932303330303530393730305f393035363833313431313139393735353331395f6e2e6a7067, 0x3336333930363630385f323034393534393630383732363736365f363137363636393634353639353738353430385f6e2e6a7067, 0x52455343484544554c452e706466, '', '', '', 0, '', '', '', '', '', '', '2023-08-30 16:37:01'),
(17, 1, 2147483647, 'Mang', 'Juan', 'Edi', 'N/A', '2011-02-01', 34, 143, 34, 'Single', 'Filipino', '', 'Female', 'Secret', 2147483647, 'Albay', 'Ligao', 'Binatagan', '3', 'Grade 11', 'Academic Track', 'General Academic Strand (GAS)', 0x32332d303732382d3034335f4c6967616f2d436974792e706466, 0x3336373534343635305f3331383932303330303530393730305f393035363833313431313139393735353331395f6e2e6a7067, 0x3336333930363630385f323034393534393630383732363736365f363137363636393634353639353738353430385f6e2e6a7067, 0x52455343484544554c452e706466, 'wwrww', 'huiduagdgq', 'huhffj', 9876567, 'dghskwug', 'iwduj', '2991', 'dhkhvdkhav', 'iwhddj', '3622', '2023-08-30 16:37:01'),
(24, 11, 0, 'pandaan', 'aljon', 'romer', '', '1997-01-13', 26, 5, 57, 'Single', 'Filipino', 'tobog,oas,albay', 'Female', 'bicol', 2147483647, 'Albay', 'Oas', 'Ilaor Sur', '1', 'Grade 12', 'Tech-Voc Track', 'Computer System Servicing', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2023-09-13 07:20:51'),
(25, 6, 0, '', '', '', '', '0000-00-00', 0, 0, 0, '', '', '', 'Male', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2023-09-18 15:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `pwd`, `is_admin`) VALUES
(1, 'juan123@gmail.com', 'qwertyuio', 0),
(2, 'czarinaaicah@gmail.com', 'wew345', 0),
(4, 'minx@gmail.com', 'kapayka', 0),
(5, 'admin@gmail.com', 'admin1234', 1),
(6, 'user@email.com', 'user', 0),
(8, 'wawa@gmail.com', '1234567890', 0),
(9, 'abukona@gmail.com', '$2y$10$4XWmsitUOrO2fxcVtiiBp.l', 0),
(11, 'aljonromero@gmail.com', '123456', 0),
(12, 'aiza@gmail.com', 'aizalyn', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
