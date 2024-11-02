-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 05:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(35) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` int(7) NOT NULL,
  `contact` bigint(13) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `street`, `city`, `state`, `country`, `zip`, `contact`, `create_date`, `ip`) VALUES
(20, '85, green park township, jakatnaka', 'Anand', 'Gujarat', 'India', 324569, 7458755222, '2023-03-12 12:10:44', '::1'),
(21, '60,silvervelly residency, dandi road', 'Surat', 'Gujarat', 'India', 214569, 9638527412, '2023-03-12 12:11:56', '::1'),
(23, 'coral square', 'udipur', 'gujarat', 'india', 888888, 9090909090, '2023-03-23 15:21:09', '::1'),
(24, 'Repudiandae aliquid ', 'indor', 'madhya-pradesh', 'india', 100000, 2749235770, '2023-04-07 23:54:39', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `id` int(11) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `semail` varchar(25) NOT NULL,
  `saddress` varchar(70) NOT NULL,
  `scontact` bigint(11) NOT NULL,
  `rname` varchar(20) NOT NULL,
  `remail` varchar(25) NOT NULL,
  `raddress` varchar(70) NOT NULL,
  `rcontact` bigint(11) NOT NULL,
  `pnumber` bigint(11) NOT NULL,
  `pheight` int(3) NOT NULL,
  `pweight` int(3) NOT NULL,
  `pwidth` int(3) NOT NULL,
  `plength` int(3) NOT NULL,
  `pprice` int(5) NOT NULL,
  `dp` int(1) NOT NULL,
  `dbranchid` int(2) NOT NULL,
  `pbranchid` int(2) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`id`, `sname`, `semail`, `saddress`, `scontact`, `rname`, `remail`, `raddress`, `rcontact`, `pnumber`, `pheight`, `pweight`, `pwidth`, `plength`, `pprice`, `dp`, `dbranchid`, `pbranchid`, `status`, `date`) VALUES
(5, 'sunny', 'lyxesezic@mailinator.com', 'xumigevic@mailinator.com', 9193544455, 'bezinec@mailinator.c', 'xemu@mailinator.com', 'wovo@mailinator.com', 7287622536, 1552604681, 266, 254, 110, 429, 615, 2, 21, 21, 5, '2023-03-12 13:32:21'),
(6, 'hamix@mailinator.com', 'vohuponuly@mailinator.com', 'puciq@mailinator.com', 6805844996, 'kokijeby@mailinator.', 'secavyc@mailinator.com', 'wemuvep@mailinator.com', 2158698775, 2132024886, 401, 658, 553, 124, 433, 1, 20, 19, 3, '2023-03-12 13:39:32'),
(7, 'tirth', 'tirth1@gmail.com', 'abc,surat', 7564756489, 'akshay', 'ak56@gmail.com', 'xyz,anand', 9458374858, 8293746583, 45, 67, 68, 54, 450, 2, 20, 20, 2, '2023-04-04 10:09:48'),
(8, 'mahesh', 'mahesh12@gmail.com', 'golden circle', 8475648394, 'suresh', 'suresh45@gmail.com', 'arrow house', 8374867485, 1342526375, 45, 34, 65, 2, 464, 2, 21, 23, 1, '2023-04-04 10:11:19'),
(9, 'kilava@mailinator.co', 'gugaf@mailinator.com', 'dofyxefop@mailinator.com', 6430035899, 'hojodal@mailinator.c', 'kecybo@mailinator.com', 'genosis@mailinator.com', 2587076709, 954372843, 452, 696, 519, 160, 840, 1, 23, 0, 1, '2023-04-07 23:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(3) NOT NULL,
  `branchid` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `contact`, `email`, `password`, `role`, `branchid`, `ip`, `status`) VALUES
(21, 'dhruvit gadhiya', 6564646666, '20bca002@charusat.edu.in', '123', 1, 21, '::1', 1),
(22, 'manav patel', 6325632587, 'manav@gmail.com', '123', 2, 20, '::1', 1),
(23, 'dhruvit gadhiya', 7458745874, 'dhruvitgadhiya77@gmail.com', '123', 1, 21, '::1', 1),
(26, 'ramesh patel', 6547896655, 'ramesh@outlook.com', '123', 2, 20, '::1', 1),
(28, 'Kieran', 4203412705, 'vyzatady@mailinator.com', '123', 1, 20, '::1', 1),
(30, 'jigar', 9487694049, 'jigo12@gmail.com', '123', 2, 21, '::1', 1),
(31, 'Kuame', 9993932170, 'ryhajupe@mailinator.com', '123', 2, 23, '::1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zip` (`zip`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branchid` (`branchid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`branchid`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
