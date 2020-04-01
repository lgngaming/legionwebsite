-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2020 at 01:27 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitchdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` int(11) NOT NULL,
  `twitch_name` varchar(255) NOT NULL,
  `team` varchar(255) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `priority` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `twitch_name`, `team`, `online`, `priority`) VALUES
(1, 'alternity', 'LGN', 0, 4),
(2, 'landoflegiontv', 'LGN', 0, 9),
(13, 'bosskonasegway', 'LGN', 0, 6),
(14, 'bullseyel', 'LGN', 0, 7),
(15, 'cosmiccow6', 'LGN', 0, 8),
(16, 'lgnxdarigaz', 'LGN', 0, 2),
(17, 'gsbet', 'LGN', 0, 3),
(18, 'bakmei64strikes', 'Other', 0, 5),
(19, 'lizardking', 'Other', 0, 1),
(20, 'linux_baby', 'LGN', 0, 10),
(21, 'shmapty', 'LGN', 0, 14),
(22, 'primaltyrant', 'LGN', 0, 12),
(23, 'sc2locke', 'LGN', 0, 13),
(24, 'monstercat', 'Other', 1, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
