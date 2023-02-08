-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 07:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalorije`
--

-- --------------------------------------------------------

--
-- Table structure for table `gramaza`
--

CREATE TABLE `gramaza` (
  `id` int(10) UNSIGNED NOT NULL,
  `kolicina` int(11) NOT NULL,
  `idHrana` int(5) UNSIGNED NOT NULL,
  `idNalog` int(5) UNSIGNED NOT NULL,
  `kalorijei` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gramaza`
--

INSERT INTO `gramaza` (`id`, `kolicina`, `idHrana`, `idNalog`, `kalorijei`) VALUES
(19, 150, 7, 2, 134),
(20, 250, 4, 2, 358),
(21, 120, 5, 2, 432),
(22, 50, 13, 2, 26),
(34, 150, 7, 1, 134),
(35, 70, 3, 1, 272),
(36, 70, 3, 1, 272),
(37, 150, 9, 2, 107),
(38, 30, 21, 3, 174),
(39, 50, 45, 3, 12),
(40, 65, 46, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `hrana`
--

CREATE TABLE `hrana` (
  `id` int(5) UNSIGNED NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `kalorije` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hrana`
--

INSERT INTO `hrana` (`id`, `naziv`, `kalorije`) VALUES
(2, 'Pilece belo meso', 120),
(3, 'Ovsene pahuljice', 389),
(4, 'Pasulj', 143),
(5, 'Beli pirinac', 360),
(6, 'Kuvano jaje', 147),
(7, 'Banana', 89),
(8, 'Pastrmka', 195),
(9, 'Oslic', 71),
(10, 'Brokoli', 34),
(11, 'Kikiriki', 618),
(12, 'Belance ', 52),
(13, 'Jabuka', 52),
(14, 'Leblebija', 364),
(15, 'Kinoa', 368),
(16, 'Socivo', 352),
(17, 'Kuvani kukuruz', 86),
(18, 'Beli krompir', 77),
(19, 'Slatki krompir', 86),
(20, 'Orah', 654),
(21, 'Badem', 579),
(22, 'Tunjevina', 144),
(23, 'Cia seme', 486),
(24, 'Paradajz', 18),
(25, 'Jagode', 33),
(26, 'Lubenica', 30),
(27, 'Prsuta', 252),
(28, 'Sargarepa', 41),
(29, 'Krastavac', 15),
(30, 'Sampinjoni', 22),
(31, 'Junetina', 276),
(32, 'Tresnje', 63),
(33, 'Avokado', 160),
(34, 'Grasak', 81),
(35, 'Ananas', 48),
(36, 'Kajsija', 48),
(37, 'Masline', 145),
(38, 'Lesnik', 628),
(39, 'Karfiol', 25),
(40, 'Laneno seme', 533),
(41, 'Sardina', 208),
(42, 'Sljiva', 46),
(43, 'Maline', 52),
(44, 'Indijski orah', 553),
(45, 'Spanac', 23),
(46, 'Zelena salata', 13),
(47, 'Kupus', 25),
(48, 'Pileci batak', 184),
(49, 'Svinjski but', 297),
(50, 'Integralni pirinac', 362),
(51, 'Boranija', 31),
(52, 'Pomorandza', 47),
(53, 'Dekstroza', 400),
(54, 'Pecenica', 345),
(55, 'Ella sir', 55),
(56, 'Kokice', 387),
(57, 'Razane pahuljice', 335),
(58, 'Grozdje', 69),
(59, 'Kivi', 61),
(60, 'Limun', 29),
(61, 'Feta sir', 264),
(62, 'Nektarina', 44),
(63, 'Mleko', 64),
(64, 'Soja', 172),
(65, 'Mladi sir', 116),
(66, 'Cvekla', 43),
(67, 'Kackavalj', 389),
(68, 'Jogurt', 61),
(69, 'Grcki jogurt', 133),
(70, 'Peceni kikiriki', 587),
(71, 'Kisela pavlaka', 205),
(72, 'Blitva', 19),
(73, 'Surutka', 27),
(74, 'Crni luk', 40),
(75, 'Brazilski orah', 659),
(76, 'Lignje', 92),
(77, 'Maslinovo ulje', 884),
(78, 'Mandarine', 53),
(79, 'Nar', 83),
(80, 'Breskva', 39),
(81, 'Kupine', 43),
(82, 'Borovnica', 57),
(83, 'Batat', 86),
(84, 'Pecurke', 22),
(85, 'Govedina', 276);

-- --------------------------------------------------------

--
-- Table structure for table `nalozi`
--

CREATE TABLE `nalozi` (
  `id` int(5) UNSIGNED NOT NULL,
  `korisnickoIme` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sifra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nalozi`
--

INSERT INTO `nalozi` (`id`, `korisnickoIme`, `email`, `sifra`) VALUES
(1, 'marko', 'markomijailovic03@gmail.com', 'm'),
(2, 'pera', 'pperic@gmail.com', 'p'),
(3, 'laza', 'llazic@gmail.com', 'l');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gramaza`
--
ALTER TABLE `gramaza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veza1` (`idHrana`),
  ADD KEY `veza2` (`idNalog`);

--
-- Indexes for table `hrana`
--
ALTER TABLE `hrana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nalozi`
--
ALTER TABLE `nalozi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gramaza`
--
ALTER TABLE `gramaza`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hrana`
--
ALTER TABLE `hrana`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `nalozi`
--
ALTER TABLE `nalozi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gramaza`
--
ALTER TABLE `gramaza`
  ADD CONSTRAINT `veza1` FOREIGN KEY (`idHrana`) REFERENCES `hrana` (`id`),
  ADD CONSTRAINT `veza2` FOREIGN KEY (`idNalog`) REFERENCES `nalozi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
