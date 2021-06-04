-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 04, 2021 at 09:03 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dilemmeduroi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dilemmeroi_cartes`
--

CREATE TABLE `dilemmeroi_cartes` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dilemmeroi_cartes`
--

INSERT INTO `dilemmeroi_cartes` (`ID`, `nom`) VALUES
(1, 'Aucun'),
(2, 'Extrémisme'),
(3, 'Rébellion'),
(4, 'Avarice'),
(5, 'Opportunisme'),
(6, 'Opulence'),
(7, 'Modération');

-- --------------------------------------------------------

--
-- Table structure for table `dilemmeroi_joueurs`
--

CREATE TABLE `dilemmeroi_joueurs` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `maison` int(11) NOT NULL,
  `main` int(11) NOT NULL,
  `prestige` int(11) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dilemmeroi_joueurs`
--

INSERT INTO `dilemmeroi_joueurs` (`ID`, `nom`, `maison`, `main`, `prestige`, `ordre`) VALUES
(1, 'IA', 1, 2, NULL, 0),
(2, 'Pahdidey', 8, 1, 20, 1),
(3, 'Marshkalk', 10, 1, 30, 3),
(4, 'Aedris', 2, 1, 22, 2),
(5, 'Papatte', 4, 1, 32, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dilemmeroi_maisons`
--

CREATE TABLE `dilemmeroi_maisons` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `structure` enum('Marquisat','Duché') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dilemmeroi_maisons`
--

INSERT INTO `dilemmeroi_maisons` (`ID`, `nom`, `structure`) VALUES
(1, 'Blodyn', 'Duché'),
(2, 'Solad', 'Duché'),
(3, 'Tork', 'Marquisat'),
(4, 'Codène', 'Duché'),
(5, 'Olwyn', 'Duché'),
(6, 'Albède', 'Marquisat'),
(7, 'Gamam', 'Duché'),
(8, 'Duhalak', 'Marquisat'),
(9, 'Tiryll', 'Marquisat'),
(10, 'Wylio', 'Marquisat'),
(11, 'Crann', 'Marquisat'),
(12, 'Natar', 'Duché'),
(13, 'Aucune', 'Marquisat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dilemmeroi_cartes`
--
ALTER TABLE `dilemmeroi_cartes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dilemmeroi_joueurs`
--
ALTER TABLE `dilemmeroi_joueurs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `joueurs_ibfk_1` (`maison`),
  ADD KEY `joueurs_ibfk_2` (`main`);

--
-- Indexes for table `dilemmeroi_maisons`
--
ALTER TABLE `dilemmeroi_maisons`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dilemmeroi_cartes`
--
ALTER TABLE `dilemmeroi_cartes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dilemmeroi_joueurs`
--
ALTER TABLE `dilemmeroi_joueurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dilemmeroi_maisons`
--
ALTER TABLE `dilemmeroi_maisons`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dilemmeroi_joueurs`
--
ALTER TABLE `dilemmeroi_joueurs`
  ADD CONSTRAINT `dilemmeroi_joueurs_ibfk_1` FOREIGN KEY (`maison`) REFERENCES `dilemmeroi_maisons` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dilemmeroi_joueurs_ibfk_2` FOREIGN KEY (`main`) REFERENCES `dilemmeroi_cartes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
