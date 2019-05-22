-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 07:15 PM
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
-- Database: `algu_sistema`
--

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `org_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`) VALUES
(16, 'Vienalga'),
(17, 'idontcare'),
(18, 'organizasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `IIN` double NOT NULL,
  `socialais_nod` double NOT NULL,
  `darba_dev_izmaksas` double NOT NULL,
  `year` int(11) NOT NULL,
  `month` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `org_id`, `user_id`, `salary`, `IIN`, `socialais_nod`, `darba_dev_izmaksas`, `year`, `month`) VALUES
(20, 16, 8, '12000', 2136, 1320, 14891.16, 2019, 'March'),
(22, 16, 8, '1222', 171.516, 134.42, 1516.7398, 2019, 'January'),
(23, 16, 8, '1500', 221, 165, 1861.71, 2019, 'March'),
(24, 16, 8, '50000', 8854, 5500, 62045.36, 2018, 'May'),
(25, 16, 8, '5200', 925.6, 572, 6453.04, 2019, 'February'),
(26, 16, 8, '65656', 11686.768, 7222.16, 81472.8904, 2019, 'JÅ«lijs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'User',
  `org_key` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `register_date`, `last_login`, `notes`, `role`, `org_key`) VALUES
(5, 'SuperAdmin', 'admin@admin.com', '$2y$08$eC8aULvqmee3uvvJD0uWaumD5mYUhr3siL2OxhKEAdrrgq8EYhNCq', '2019-05-15', '2019-05-22 04:05:06', '', 'Superadmin', 0),
(8, 'lietotajs', 'example@example.com', '$2y$08$KIDmi0/flhcMkV5oX3gg1uBvv/PiY0NG8ubzjUGikYniB7vEah3zC', '2019-05-15', '2019-05-22 06:05:18', '', 'User', 16),
(11, 'idk', 'idk@gmail.com', '$2y$08$5eJ4NM/r7EEOomwJ9ySdsuNMlkMyWfDA3oxTD8NjiIv6/LBFhVw0C', '2019-05-22', '2019-05-22 00:00:00', '', 'User', 17),
(10, 'boss', 'boss@boss.com', '$2y$08$6GaIPlNTyG2IyRHM6HvCZ.Q927eCgum1QqFKBuOru6V.pydLIDtiK', '2019-05-21', '2019-05-22 07:05:50', '', 'Admin', 16),
(12, 'Aigars', 'aii@aii.com', '$2y$08$/Go7ruLEeZXV6aj34R05e.s1WW6tYNRTxfQZzEAphlg6d.1OTHyhC', '2019-05-22', '2019-05-22 00:00:00', '', 'User', 17),
(13, 'aljhdaskhd', 'sdfjhsdkjfhs@gmail.com', '$2y$08$CfDa5wsiAyzClQK27oTbuu6MEJorO1ASlR0Iv4RaB4UhjarRSF4t.', '2019-05-22', '2019-05-22 00:00:00', '', 'User', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
