USE cars;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 14 дек 2024 в 21:15
-- Версия на сървъра: 10.4.28-MariaDB
-- Версия на PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `cars`
--

-- --------------------------------------------------------

--
-- Структура на таблица `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `marka` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `cars`
--

INSERT INTO `cars` (`id`, `marka`, `model`, `image`, `price`) VALUES
(9, 'Mercedes', 'W124', '1734205684_W124.avif', 11000.00),
(10, 'Audi', '80', '1734205853_Audi_80_B4_Sedan.jpg', 3750.00),
(11, 'BMW', 'e30', '1734206268_Bmw-e30.jpg', 6000.00),
(12, 'Opel', 'Astra', '1734206336_Opel-Astra-G.jpg', 4000.00),
(13, 'Volkswagen', 'Golf 4', '1734206863_golf 4.jfif', 2799.00),
(14, 'Citroen', 'Xsara picasso', '1734207014_citroen-xsara-picasso-n68.jpg', 4300.00),
(16, 'Peugeot', '5008', '1734207344_Peugeot_5008_BlueHDi_180_EAT8_GT_(II)_–_f_01092019_(colour_corrected).jpg', 32990.00);

-- --------------------------------------------------------

--
-- Структура на таблица `favorite_cars_users`
--

CREATE TABLE `favorite_cars_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `names`, `email`, `password`) VALUES
(1, 'Теодор', 'Teo@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Nm15U2FXN3JVeFVnQk9uQQ$nANgy6TC4jAZa8zr0AGyyGmyM0CK6i8SMA1MFtFp7qM'),
(2, 'A', 'aaa@aaa', '$argon2i$v=19$m=65536,t=4,p=1$M0MwdHdBcjM0bGRmNDdPbg$QbeDR7NwSGE8RaHQyS6ztCzC5X041RoRAHuVjqpn/ik');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
