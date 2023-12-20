-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 11:02 AM
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
-- Database: `gestion_tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `creatingDate` datetime NOT NULL,
  `priorite` enum('Low','Meduim','High') DEFAULT NULL,
  `status` enum('Open','In progress','Closed') DEFAULT NULL,
  `deleteDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `titre`, `description`, `creatingDate`, `priorite`, `status`, `deleteDate`) VALUES
(1, 'test', 'test', '0000-00-00 00:00:00', '', 'In progress', '2023-12-19 16:03:14'),
(2, 'test', 'test', '0000-00-00 00:00:00', '', 'In progress', '2023-12-20 08:11:01'),
(3, 'test', 'test', '0000-00-00 00:00:00', '', 'In progress', '2023-12-20 08:11:08'),
(4, 'test', 'hhhh', '0000-00-00 00:00:00', '', 'Closed', '2023-12-20 08:14:34'),
(5, 'test', 'hhhh', '0000-00-00 00:00:00', '', 'Closed', '2023-12-20 08:50:23'),
(6, 'test', 'hhhh', '0000-00-00 00:00:00', '', 'Closed', '2023-12-20 08:50:23'),
(7, 'test', 'hhhh', '0000-00-00 00:00:00', '', 'Closed', '2023-12-20 08:53:39'),
(8, 'test', 'hhhh', '0000-00-00 00:00:00', '', 'Closed', '2023-12-20 08:53:39'),
(9, 'first ticket', 'ticket test', '0000-00-00 00:00:00', '', 'Open', '2023-12-20 09:07:12'),
(10, 'first ticket', 'ticket test', '0000-00-00 00:00:00', '', 'Open', '2023-12-20 09:07:12'),
(11, 'second ticket', 'youcode', '0000-00-00 00:00:00', '', 'In progress', '2023-12-20 09:08:51'),
(12, 'fiuberjnksdl', 'gvfredbjhwnk', '0000-00-00 00:00:00', '', 'Closed', '2023-12-20 09:09:56'),
(13, 'yassinehanach@gmail.com', 'yassinehanach@gmail.com yassinehanach@gmail.com yassinehanach@gmail.com', '0000-00-00 00:00:00', '', 'Open', '2023-12-20 09:40:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
