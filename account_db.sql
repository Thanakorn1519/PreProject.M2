-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 12:53 PM
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
-- Database: `account_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ledgerid`
--

CREATE TABLE `ledgerid` (
  `ID` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Description` text NOT NULL,
  `Income` int(100) NOT NULL,
  `Expenses` int(100) NOT NULL,
  `Balance` int(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledgerid`
--

INSERT INTO `ledgerid` (`ID`, `Date`, `Description`, `Income`, `Expenses`, `Balance`, `user_id`) VALUES
(39, '2024-03-07', 'afasfsa', 500, 200, 0, 1),
(40, '2024-03-15', 'assdafsa', 234, 2, 0, 1),
(43, '2024-03-07', 'anime', 400, 500, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'n', 'n@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'net', 'net@gmail.com', '40fa73c9d0083043c6576dd2b40511e4'),
(3, 'fdsafsa@gmail.com', 'fdsafsa@gmail.com', 'f04c2e256e4896aaae783054a940d4f9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ledgerid`
--
ALTER TABLE `ledgerid`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ledgerid`
--
ALTER TABLE `ledgerid`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ledgerid`
--
ALTER TABLE `ledgerid`
  ADD CONSTRAINT `ledgerid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
