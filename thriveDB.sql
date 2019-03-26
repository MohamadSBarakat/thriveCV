-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2019 at 11:49 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thriveDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

CREATE TABLE `activite` (
  `id` int(10) NOT NULL,
  `actFr` varchar(255) NOT NULL,
  `actEn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activite`
--

INSERT INTO `activite` (`id`, `actFr`, `actEn`) VALUES
(1, 'Santé - Médecine', 'Health - Medicine'),
(2, 'Négoce - Banque ', 'Trading - Bank'),
(3, 'Achats', 'Shopping'),
(4, 'Transport - Logistique', 'Logistic transport'),
(5, 'Industrie - Technique', 'Industry - Technical'),
(6, 'Artisanat ou autres professions manuelles', 'Crafts or other manual professions'),
(7, 'Construction et bâtiment', 'Construction and building'),
(8, 'Management - Business - Finances et Comptabilité    ', 'Management - Business - Finance and Accounting'),
(9, 'Marketing et média - Comunication', 'Marketing and Media - Comunication'),
(10, 'Informatique - Ingénierie et Sciences - télécommunications', 'Computer Science - Engineering and Science - Telecommunications'),
(11, 'Commercial et vente', 'Commercial and sales'),
(12, 'Pharmaceutique - Chimie', 'Pharmaceutical - Chemistry'),
(13, 'Restaurantion, hôtellerie, tourisme', 'Restaurantion, hotels, tourism'),
(14, 'Santé, social et médecine', 'Health, Social and Medical'),
(15, 'Administration - bureautique et accueil', 'Administration - office automation and reception'),
(16, 'Sécurité, Défense', 'Security, Defense'),
(17, 'Installation -  maintenance et réparation', 'Installation - maintenance and repair'),
(18, 'Immobilier', 'Immovable'),
(19, 'Juridique - Assurances', 'Legal - Insurance'),
(20, 'Ressources humaines, gestion du personnel', 'Human Resources, Personnel Management'),
(21, 'Droit, fiscalité, conseil', 'Law, taxation, advice'),
(22, 'Soins, beauté, sport', 'Care, beauty, sport'),
(23, 'Eduction et Service Public', 'Eduction and Public Service'),
(24, 'Agriculture', 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `profileC`
--

CREATE TABLE `profileC` (
  `idUser` int(100) NOT NULL,
  `idAct` int(10) DEFAULT NULL,
  `emailUser` varchar(255) DEFAULT NULL,
  `phoneNum` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `canton` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `permiTra` varchar(1) DEFAULT NULL,
  `permiCo` varchar(1) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `cvPdf` varchar(255) DEFAULT NULL,
  `vedioT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profileC`
--

INSERT INTO `profileC` (`idUser`, `idAct`, `emailUser`, `phoneNum`, `lastName`, `firstName`, `canton`, `ville`, `permiTra`, `permiCo`, `photo`, `cvPdf`, `vedioT`) VALUES
(1, 20, 'karima.kamel@gmail.com', NULL, NULL, 'Karima', 'Genève', 'Lancy', 'B', '0', NULL, NULL, 'Karima.mp4'),
(2, 15, 'jeremy.john@gmail.com', NULL, NULL, 'Jérémy', 'Vaud', 'Laussane', 'F', '1', NULL, NULL, 'Jeremy.mp4'),
(3, 15, 'medina.bakr@gmail.com', NULL, NULL, 'Medina', 'Vaud', 'Nyon', 'N', '0', NULL, NULL, 'Medina.mp4'),
(4, 10, 'doris.passan@gmail.com', NULL, NULL, 'Doris', 'Genève', 'Cern', 'N', '1', NULL, NULL, 'Doris.mp4'),
(5, 17, 'Maeva.mami@gmail.com', NULL, NULL, 'Maeva', 'Vaud', 'Laussane', 'B', NULL, NULL, NULL, 'Maeva.mp4'),
(6, 4, 'wissem.mapi@gmail.com', NULL, NULL, 'wissem', 'Genève', 'La Plaine', 'N', NULL, NULL, NULL, 'wissem.mp4'),
(7, 15, 'Camille.ston@gmial.com', NULL, NULL, 'Camille', 'Vaud', 'Montrox', 'F', NULL, NULL, NULL, 'Camille.mp4'),
(8, 7, 'dina.dina@gmail.com', NULL, NULL, 'Dina', 'Genève', NULL, 'B', '1', NULL, NULL, 'Dina.mp4'),
(9, 15, '﻿Farid.sanoi@gmail.com', NULL, NULL, 'Farid', 'Genève', 'Carouge', 'F', '0', NULL, NULL, '﻿Farid.mp4'),
(10, 14, 'Hajar,somi@gmail.com', NULL, NULL, 'Hajar', 'Vaud', 'Nyon', 'N', '1', NULL, NULL, 'Hajar.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profileC`
--
ALTER TABLE `profileC`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idAct` (`idAct`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activite`
--
ALTER TABLE `activite`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `profileC`
--
ALTER TABLE `profileC`
  MODIFY `idUser` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profileC`
--
ALTER TABLE `profileC`
  ADD CONSTRAINT `profileC_ibfk_1` FOREIGN KEY (`idAct`) REFERENCES `activite` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
