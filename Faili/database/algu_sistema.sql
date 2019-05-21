-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 09:17 PM
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
(16, 'Vienalga');

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
  `darba_dev_izmaksas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `org_id`, `user_id`, `salary`, `IIN`, `socialais_nod`, `darba_dev_izmaksas`) VALUES
(3, 16, 8, '800', 96.4, 88, 993.08);

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
(5, 'SuperAdmin', 'admin@admin.com', '$2y$08$eC8aULvqmee3uvvJD0uWaumD5mYUhr3siL2OxhKEAdrrgq8EYhNCq', '2019-05-15', '2019-05-21 09:05:14', '', 'Superadmin', 0),
(8, 'lietotajs', 'example@example.com', '$2y$08$KIDmi0/flhcMkV5oX3gg1uBvv/PiY0NG8ubzjUGikYniB7vEah3zC', '2019-05-15', '2019-05-21 08:05:06', '', 'User', 16),
(10, 'boss', 'boss@boss.com', '$2y$08$6GaIPlNTyG2IyRHM6HvCZ.Q927eCgum1QqFKBuOru6V.pydLIDtiK', '2019-05-21', '2019-05-21 09:05:47', '', 'Admin', 16);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
