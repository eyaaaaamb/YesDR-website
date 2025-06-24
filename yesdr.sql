-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 juin 2025 à 21:03
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `yesdr`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `idA` int NOT NULL AUTO_INCREMENT,
  `idM` int NOT NULL,
  `idP` int NOT NULL,
  `dateA` datetime NOT NULL,
  `notesA` text,
  PRIMARY KEY (`idA`),
  KEY `idP` (`idP`),
  KEY `idM` (`idM`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `appointments`
--

INSERT INTO `appointments` (`idA`, `idM`, `idP`, `dateA`, `notesA`) VALUES
(40, 8, 23, '2025-05-14 21:19:00', 'wish me luck !'),
(38, 7, 25, '2025-05-13 19:25:00', 'urgent'),
(37, 7, 23, '2025-05-14 15:49:00', 'exam'),
(32, 8, 23, '2025-05-10 14:14:00', 'a'),
(31, 8, 25, '2025-05-09 14:13:00', 'm'),
(25, 7, 25, '2025-05-14 14:10:00', 'chekup\r\n'),
(19, 6, 22, '2025-05-07 21:16:54', 'general check up'),
(20, 7, 23, '2025-05-14 21:17:30', 'controle'),
(21, 6, 22, '2025-05-07 21:17:51', 'controle'),
(41, 7, 23, '2025-05-14 08:46:00', 'azert'),
(42, 7, 23, '2025-05-28 08:48:00', 'chechup');

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

DROP TABLE IF EXISTS `dossiers`;
CREATE TABLE IF NOT EXISTS `dossiers` (
  `idD` int NOT NULL AUTO_INCREMENT,
  `idA` int NOT NULL,
  `diagnosis` text NOT NULL,
  `treatment` text,
  `prescriptions` text,
  PRIMARY KEY (`idD`),
  KEY `idA` (`idA`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `dossiers`
--

INSERT INTO `dossiers` (`idD`, `idA`, `diagnosis`, `treatment`, `prescriptions`) VALUES
(10, 21, 'grave', 'cure ', '..,...'),
(12, 31, 'zeet', 'azerty', 'azerty'),
(8, 19, 'pas du grave', 'diloprane', 'rien'),
(14, 25, 'test', 'test', 'test'),
(15, 19, 'rien', 'rien', 'rien'),
(16, 19, 'rien', 'rien', 'rien'),
(17, 32, 'mmmmmmm', 'rien', 'mmmmmmm'),
(18, 35, 'rien', 'rien', 'rien'),
(19, 35, 'test', 'test2', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

DROP TABLE IF EXISTS `medecins`;
CREATE TABLE IF NOT EXISTS `medecins` (
  `idM` int NOT NULL AUTO_INCREMENT,
  `nomM` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenomM` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `emailM` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rpps` varchar(20) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `passwordM` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'default.png',
  PRIMARY KEY (`idM`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `medecins`
--

INSERT INTO `medecins` (`idM`, `nomM`, `prenomM`, `emailM`, `rpps`, `specialite`, `passwordM`, `img`) VALUES
(6, 'abdou', 'abdou', 'abdou@gmail.com', '333333', 'generaliste', '81dc9bdb52d04dc20036dbd8313ed055', 'dr.jpg'),
(8, 'med', 'med', 'med@gmail.com', '3333', 'pediatre', '81dc9bdb52d04dc20036dbd8313ed055', 'pdp_681f515c9b83c3.30570419.jpg'),
(7, 'Fradj', 'Frigui', 'frigui@gmail.com', '123344', 'dermatologue', '81dc9bdb52d04dc20036dbd8313ed055', 'pdp_681f492c7a8115.73600784.jpeg'),
(10, 'rayen', 'ray', 'rayentest@gmail.com', '1111', 'pediatre', '81dc9bdb52d04dc20036dbd8313ed055', 'pdp_681f492c7a8115.73600784.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `idP` int NOT NULL AUTO_INCREMENT,
  `nomP` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenomP` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexeP` enum('Homme','Femme') NOT NULL DEFAULT 'Homme',
  `emailP` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` int NOT NULL,
  `dateP` date NOT NULL,
  `passwordP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(255) DEFAULT 'default.png',
  PRIMARY KEY (`idP`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`idP`, `nomP`, `prenomP`, `sexeP`, `emailP`, `phone`, `dateP`, `passwordP`, `img`) VALUES
(25, 'molka', 'nakbi', 'Homme', 'molka@gmail.com', 1234567, '2004-03-09', '81dc9bdb52d04dc20036dbd8313ed055', 'pdp_681f4fb1a7f541.78409201.jpg'),
(22, 'meriam', 'meriam', 'Femme', 'meriam@gmail.com', 2222, '2005-02-10', '81dc9bdb52d04dc20036dbd8313ed055', 'pdp_6820b189380143.54195291.jpg'),
(30, 'malek', 'Bouzeinne', 'Homme', 'malek@gmail.com', 123, '2025-05-17', '81dc9bdb52d04dc20036dbd8313ed055', 'patient.png'),
(23, 'Aya', 'Mabrouk', 'Femme', 'eya@gmail.com', 2222222, '2004-05-10', '827ccb0eea8a706c4c34a16891f84e7b', 'patient.png'),
(33, 'testt', 'test', 'Femme', 'test@test.com', 12, '2025-04-30', '827ccb0eea8a706c4c34a16891f84e7b', 'default.png'),
(34, 'rayen', 'raye', 'Homme', 'rayen@gmail.com', 22223, '2025-05-23', '81dc9bdb52d04dc20036dbd8313ed055', 'patient.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
