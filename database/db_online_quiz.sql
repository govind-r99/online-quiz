-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 29, 2024 at 09:41 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_online_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `question` int NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question`, `answer`) VALUES
(1, 1, 1, 'choice_3'),
(2, 1, 2, 'choice_4'),
(3, 1, 3, 'choice_2'),
(4, 1, 4, 'choice_3'),
(5, 1, 5, 'choice_3'),
(6, 2, 1, 'choice_4'),
(7, 2, 2, 'choice_4'),
(8, 2, 3, 'choice_4'),
(9, 2, 4, 'choice_4'),
(10, 2, 5, 'choice_4'),
(11, 3, 1, 'choice_3'),
(12, 3, 2, 'choice_2'),
(13, 3, 3, 'choice_3'),
(14, 3, 4, 'choice_3'),
(15, 3, 5, 'choice_4'),
(16, 4, 1, 'choice_3'),
(17, 4, 2, 'choice_2'),
(18, 4, 3, 'choice_4'),
(19, 4, 4, 'choice_4'),
(20, 4, 5, 'choice_3');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question_no` int NOT NULL,
  `question` text NOT NULL,
  `choice_1` text NOT NULL,
  `choice_2` text NOT NULL,
  `choice_3` text NOT NULL,
  `choice_4` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_no`, `question`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `answer`) VALUES
(1, 1, 'Which programming language is primarily used for web development?', 'Python', 'Java', 'JavaScript', 'C++', 'choice_3'),
(2, 2, 'Which of the following is a popular JavaScript library for building user interfaces?', 'Laravel', 'React', 'CodeIgniter', 'Django', 'choice_2'),
(3, 3, 'Which protocol is used to transfer web pages on the internet?', 'FTP', 'SMTP', 'HTTP', 'IMAP', 'choice_3'),
(4, 4, 'Which of the following is NOT a type of database?', 'MySQL', 'MongoDB', 'WordPress', 'PostgreSQL', 'choice_3'),
(5, 5, 'What does SEO stand for in web development?', 'Standard Email Optimization', 'Simple Execution Output', 'Search Engine Optimization', 'Secure Encryption Overhaul', 'choice_3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(1, 'Govind R'),
(2, 'test'),
(3, 'aman'),
(4, 'tom');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
