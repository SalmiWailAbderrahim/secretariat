-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2023 at 10:16 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docteurdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabinet`
--

DROP TABLE IF EXISTS `cabinet`;
CREATE TABLE IF NOT EXISTS `cabinet` (
  `cabinet_id` int NOT NULL AUTO_INCREMENT,
  `namec` varchar(100) NOT NULL,
  PRIMARY KEY (`cabinet_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cabinet`
--

INSERT INTO `cabinet` (`cabinet_id`, `namec`) VALUES
(12, 'wail\'s cabinet');

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

DROP TABLE IF EXISTS `descriptions`;
CREATE TABLE IF NOT EXISTS `descriptions` (
  `description_id` int NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `reponse` text NOT NULL,
  `instructions_id` int DEFAULT NULL,
  `docteur_id` int DEFAULT NULL,
  PRIMARY KEY (`description_id`),
  KEY `instructions_id` (`instructions_id`),
  KEY `docteur_id` (`docteur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `descriptions`
--

INSERT INTO `descriptions` (`description_id`, `question`, `reponse`, `instructions_id`, `docteur_id`) VALUES
(5, 'Nouveau Patients', 'Oui', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `docteurs`
--

DROP TABLE IF EXISTS `docteurs`;
CREATE TABLE IF NOT EXISTS `docteurs` (
  `docteur_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `specialite` varchar(40) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addressC` text NOT NULL,
  `date_roduction` varchar(40) NOT NULL,
  `Information` text NOT NULL,
  `Regles` text NOT NULL,
  `comment` text NOT NULL,
  `cabinet_id` int NOT NULL,
  `update_time` varchar(40) NOT NULL,
  PRIMARY KEY (`docteur_id`),
  KEY `cabinet_id` (`cabinet_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `docteurs`
--

INSERT INTO `docteurs` (`docteur_id`, `nom`, `specialite`, `telephone`, `email`, `addressC`, `date_roduction`, `Information`, `Regles`, `comment`, `cabinet_id`, `update_time`) VALUES
(1, 'Salmi wail abderrahim', 'ISIL', '0672119841', 'salmiwailabderrahim@gmail.com', 'xxxx', '2023-03-03', 'xxxx', 'xxxx', 'xxxx', 12, '2023-03-03 11:06:15 PM');

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

DROP TABLE IF EXISTS `instructions`;
CREATE TABLE IF NOT EXISTS `instructions` (
  `instructions_id` int NOT NULL AUTO_INCREMENT,
  `nomi` varchar(40) NOT NULL,
  `docteur_id` int DEFAULT NULL,
  PRIMARY KEY (`instructions_id`),
  KEY `docteur_id` (`docteur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`instructions_id`, `nomi`, `docteur_id`) VALUES
(5, ' Nouveaux Patients', 1),
(6, 'Type de consultation pris en charge', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_name`, `password`) VALUES
(1, 'w', 'f1290186a5d0b1ceab27f4e77c0c5d68');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int NOT NULL AUTO_INCREMENT,
  `date_debut` varchar(40) NOT NULL,
  `date_fin` varchar(40) NOT NULL,
  `messages` text NOT NULL,
  `docteur_id` int DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `docteur_id` (`docteur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `date_debut`, `date_fin`, `messages`, `docteur_id`) VALUES
(6, '2023-03-03', '2023-03-10', 'le site est done\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `query_saver`
--

DROP TABLE IF EXISTS `query_saver`;
CREATE TABLE IF NOT EXISTS `query_saver` (
  `id_query` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) NOT NULL,
  `date` varchar(40) NOT NULL,
  `query` text NOT NULL,
  PRIMARY KEY (`id_query`),
  KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `query_saver`
--

INSERT INTO `query_saver` (`id_query`, `user_name`, `date`, `query`) VALUES
(80, 'w', '2023-03-03 11:05:10 PM', 'INSERT INTO cabinet (namec)\r\n                                        VALUES (\'wail\'s cabinet\')'),
(81, 'w', '2023-03-03 11:05:58 PM ', 'INSERT INTO docteurs\r\n					(nom, specialite, telephone, email,addressC,Information,Regles, comment,date_roduction,cabinet_id,update_time)\r\n					VALUES (\'Salmi wail abderrahim\',\'ISIL\',\'0672119841\',\'salmiwailabderrahim@gmail.com\',\'xxxx\',\'xxxx\',\'xxxx\',\'xxxx\',\'2023-03-03\',\'12\',\'2023-03-03 11:05:58 PM \')'),
(82, 'w', '2023-03-03 11:06:04 PM', 'INSERT INTO instructions (nomi,docteur_id)\r\n                                        VALUES (\' Nouveaux Patients\',\'1\')'),
(83, 'w', '2023-03-03 11:06:10 PM', 'INSERT INTO descriptions (question,reponse,instructions_id)\r\n                                        VALUES (\'Nouveau Patients\',\'Oui\',\'5\')'),
(84, 'w', '2023-03-03 11:06:15 PM', 'INSERT INTO instructions (nomi,docteur_id)\r\n                                        VALUES (\'Type de consultation pris en charge\',\'1\')'),
(85, 'w', '2023-03-03 11:06:49 PM', 'INSERT INTO messages (date_debut,date_fin,messages,docteur_id)\r\n                                        VALUES (\'2023-03-03\',\'2023-03-10\',\'le site est done\r\n\',\'1\')');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
