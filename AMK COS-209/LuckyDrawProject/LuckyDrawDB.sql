-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2023 at 02:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LuckyDrawDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_email` varchar(30) NOT NULL,
  `admin_pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_email`, `admin_pwd`) VALUES
('aung@gmail.com', 'A123');

-- --------------------------------------------------------

--
-- Table structure for table `Bank`
--

CREATE TABLE `Bank` (
  `acc_no` varchar(20) NOT NULL,
  `balance` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Bank`
--

INSERT INTO `Bank` (`acc_no`, `balance`) VALUES
('1111 2222 3333 4444', 960000),
('2222 3333 4444 5555', 2780000),
('3333 4444 5555 6666', 100000),
('4444 5555 6666 7777', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `userid` int(10) NOT NULL,
  `t_id` int(5) NOT NULL,
  `t_cat_id` int(5) NOT NULL,
  `p_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`userid`, `t_id`, `t_cat_id`, `p_date`) VALUES
(10002, 2002, 1002, '2023-05-11'),
(10002, 2003, 1002, '2023-05-11'),
(10002, 2004, 1002, '2023-05-11'),
(10002, 2005, 1002, '2023-05-11'),
(10001, 2006, 1002, '2023-05-12'),
(10001, 2007, 1002, '2023-05-12'),
(10001, 2008, 1002, '2023-05-12'),
(10001, 2009, 1002, '2023-05-12'),
(10001, 2010, 1002, '2023-05-12'),
(10003, 2011, 1002, '2023-05-15'),
(10003, 2544, 1002, '2023-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `t_id` int(5) NOT NULL,
  `t_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`t_id`, `t_cat_id`) VALUES
(1001, 1001),
(1002, 1001),
(1003, 1001),
(1004, 1001),
(1005, 1001),
(1006, 1001),
(1007, 1001),
(1008, 1001),
(1009, 1001),
(1010, 1001),
(2001, 1002),
(2002, 1002),
(2003, 1002),
(2004, 1002),
(2005, 1002),
(2006, 1002),
(2007, 1002),
(2008, 1002),
(2009, 1002),
(2010, 1002),
(2011, 1002),
(2531, 1002),
(2532, 1002),
(2534, 1002),
(2535, 1002),
(2536, 1002),
(2537, 1002),
(2538, 1002),
(2539, 1002),
(2540, 1002),
(2541, 1002),
(2542, 1002),
(2543, 1002),
(2544, 1002);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_category`
--

CREATE TABLE `ticket_category` (
  `t_cat_id` int(5) NOT NULL,
  `t_cat_date` date NOT NULL,
  `price` int(6) NOT NULL,
  `qty` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_category`
--

INSERT INTO `ticket_category` (`t_cat_id`, `t_cat_date`, `price`, `qty`) VALUES
(1001, '2023-04-01', 20000, 600),
(1002, '2023-05-01', 20000, 600);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `acc_no` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  `ph_no` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `email`, `pwd`, `acc_no`, `gender`, `age`, `ph_no`, `address`) VALUES
(10001, 'Tyler', 'tyler@gmail.com', 'T123', '1111 2222 3333 4444', 'Male', 23, 987654321, 'YGN'),
(10002, 'Taylor', 'taylor@gmail.com', 'T123', '2222 3333 4444 5555', 'Female', 20, 123456789, 'YGN'),
(10003, 'Chris', 'chris@gmail.com', 'C123', '3333 4444 5555 6666', 'Male', 18, 3456787, 'YGN');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE `winner` (
  `userid` int(10) NOT NULL,
  `t_id` int(5) NOT NULL,
  `month` date NOT NULL,
  `prize` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winner`
--

INSERT INTO `winner` (`userid`, `t_id`, `month`, `prize`) VALUES
(10002, 2002, '2023-05-12', 'Airpod Pro 2'),
(10002, 2003, '2023-05-12', 'PlayStation 5'),
(10002, 2004, '2023-05-12', 'iPhone 14 Pro'),
(10001, 2006, '2023-05-12', 'iPhone 14 Pro Max');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bank`
--
ALTER TABLE `Bank`
  ADD PRIMARY KEY (`acc_no`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD KEY `uu` (`userid`),
  ADD KEY `tt` (`t_id`),
  ADD KEY `catt` (`t_cat_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `dddd` (`t_cat_id`);

--
-- Indexes for table `ticket_category`
--
ALTER TABLE `ticket_category`
  ADD PRIMARY KEY (`t_cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `acc` (`acc_no`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD KEY `uuid` (`userid`),
  ADD KEY `ttid` (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2545;

--
-- AUTO_INCREMENT for table `ticket_category`
--
ALTER TABLE `ticket_category`
  MODIFY `t_cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `catt` FOREIGN KEY (`t_cat_id`) REFERENCES `ticket_category` (`t_cat_id`),
  ADD CONSTRAINT `tt` FOREIGN KEY (`t_id`) REFERENCES `ticket` (`t_id`),
  ADD CONSTRAINT `uu` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `dddd` FOREIGN KEY (`t_cat_id`) REFERENCES `ticket_category` (`t_cat_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `acc` FOREIGN KEY (`acc_no`) REFERENCES `Bank` (`acc_no`);

--
-- Constraints for table `winner`
--
ALTER TABLE `winner`
  ADD CONSTRAINT `ttid` FOREIGN KEY (`t_id`) REFERENCES `ticket` (`t_id`),
  ADD CONSTRAINT `uuid` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
