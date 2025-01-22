-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 22, 2025 at 12:04 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klienci`
--
CREATE DATABASE IF NOT EXISTS `klienci` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `klienci`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logged_in_users`
--

CREATE TABLE `logged_in_users` (
  `sessionId` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `lastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `kursy` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivery` varchar(100) NOT NULL,
  `total` float NOT NULL,
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `kursy`, `fullName`, `email`, `phone`, `address`, `delivery`, `total`, `orderDate`) VALUES
(4, 22, 'japonski, francuski, niemiecki', 'Jan Testowy', 'test@gmail.com', '+48655323123', 'Nałęczowska 35', 'InPost', 443.96, '2025-01-08 16:22:51'),
(7, 39, 'niemiecki', 'Adam Nowak', 'test123@gmail.com', '666555111', 'Nałęczowska 35/1', 'InPost', 163.98, '2025-01-22 11:57:13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `fullName`, `email`, `passwd`, `status`, `date`) VALUES
(1, 'admin', 'Jakub Jankowski', 'admin@gmail.com', '$2y$10$DF3s8YK/bbop79sGV9GPCu9.irRHdxPVMF638yunfuL2T2TzXYbCW', 2, '2025-01-07 19:07:36'),
(22, 'test', 'Jan Testowy', 'test@gmail.com', '$2y$10$hu2J9HrAxdNwpnwfyOSfcODxN7Y4X36FkNf0iK79btLeURBk9sNFK', 1, '2025-01-06 12:28:00'),
(37, 'ahmed', 'Ahmed Tijara', 'ahmed@tijara.com', '$2y$10$O9LZFDcyyAPSPDZcu.M31.gmkR3pSXmlotVr5l13zBmNRkNfGpfoG', 1, '2025-01-07 18:58:36'),
(39, 'test123', 'Adam Nowak', 'test123@gmail.com', '$2y$10$in5.paogsN08g/gPZxfFkuvR.Vv35ciCx0KKmSnjqQelaTA/69N9G', 1, '2025-01-18 16:58:26');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `logged_in_users`
--
ALTER TABLE `logged_in_users`
  ADD PRIMARY KEY (`sessionId`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD UNIQUE KEY `email` (`email`,`phone`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
