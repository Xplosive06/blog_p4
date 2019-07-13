-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2019 at 09:52 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_p4`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reports` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `reports`) VALUES
(1, 19, 'Jean marque', 'blablabla bla blalalm egm ezgmzgblablabla bla blalalm egm ezgmzgblablabla bla blalalm egm ezgmzgblablabla bla blalalm egm ezgmzgblablabla bla blalalm egm ezgmzgblablabla bla blalalm egm ezgmzgblablabla bla blalalm egm ezgmzgblablabla bla blalalm egm ezgmzg', '2019-07-03 20:59:48', 0),
(2, 19, 'Alberto', '2 ème commentaire blablalblal bla bla blablablablalblal bla bla blablablablalblal bla bla blablablablalblal bla bla blablablablalblal bla bla blablablablalblal bla bla blablablablalblal bla bla blablablablalblal bla bla blablablablalblal bla bla blablablablalblal bla bla blablablablalblal bla bla blablablablalblal bla bla blabla', '2019-07-04 11:03:47', 0),
(3, 27, 'JeanAdmin', 'vzgez', '2019-07-05 08:36:45', 0),
(4, 27, 'JeanAdmin', 'salut', '2019-07-05 08:37:34', 0),
(5, 27, 'JeanAdmin', 'test 3', '2019-07-05 08:39:35', 0),
(6, 27, 'JeanAdmin', 'yooo', '2019-07-05 08:41:20', 0),
(7, 26, 'JeanAdmin', 'test d\'un autre commentaire par JeanAdmin', '2019-07-05 08:42:00', 0),
(8, 28, 'JeanAdmin', 'Moi aussi j\'aime les animaux', '2019-07-05 09:00:08', 0),
(9, 28, 'Chloé', 'Salut c\'est moi !', '2019-07-05 09:00:50', 0),
(10, 28, 'JeanAdmin', 'test url', '2019-07-05 10:10:46', 0),
(11, 28, 'Pseudo', 'h\"rhhf', '2019-07-08 16:02:57', 0),
(12, 28, 'Pseudo', 'saluuuuuuuuuuuuuuuuuuuuuuuuuuuuut', '2019-07-08 16:03:42', 1),
(13, 28, 'Pseudo', 'saluuuuuuuuuuuuuuuuuuuuuuuuuuuuut', '2019-07-08 16:03:50', 2),
(14, 28, 'Pseudo', 'saluuuuuuuuuuuuuuuuuuuuuuuuuuuuut', '2019-07-08 16:12:08', 1),
(17, 28, 'JeanAdmin', 'mon commeuh', '2019-07-08 16:42:44', 0),
(18, 33, 'JeanAdmin', 'tzstzrt', '2019-07-08 16:55:58', 1),
(19, 33, 'JeanAdmin', 'fgghg', '2019-07-08 16:57:35', 1),
(20, 33, 'JeanAdmin', 'gegege', '2019-07-08 20:37:05', 9);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(28, 'Dernière publication TEST', 'Salut, j\'aime les animaux et le flanc aux oeufs.\r\n\r\nYahhhaaa', '2019-07-05 08:59:22'),
(27, 'C\'est ma publication de oiuf', 'Ca parle des chiens errants au Cambodge et de ceux qui se font cuire sur les trottoirs au chalumeau, c\'est vraiment excellent !', '2019-07-04 18:18:28'),
(26, 'Dernier post', 'dernier emkraek ,eamk, apk paekn kpen kmenp,z mknea mknea ,et zetrzhger hger zgrzg zrgrgzarg rzg zg rzgrz g zgrdernier emkraek ,eamk, apk paekn kpen kmenp,z mknea mknea ,et zetrzhger hger zgrzg zrgrgzarg rzg zg rzgrz g zgrdernier emkraek ,eamk, apk paekn kpen kmenp,z mknea mknea ,et zetrzhger hger zgrzg zrgrgzarg rzg zg rzgrz g zgrdernier emkraek ,eamk, apk paekn kpen kmenp,z mknea mknea ,et zetrzhger hger zgrzg zrgrgzarg rzg zg rzgrz g zgrdernier emkraek ,eamk, apk paekn kpen kmenp,z mknea mknea ,et zetrzhger hger zgrzg zrgrgzarg rzg zg rzgrz g zgrdernier emkraek ,eamk, apk paekn kpen kmenp,z mknea mknea ,et zetrzhger hger zgrzg zrgrgzarg rzg zg rzgrz g zgrdernier emkraek ,eamk, apk paekn kpen kmenp,z mknea mknea ,et zetrzhger hger zgrzg zrgrgzarg rzg zg rzgrz g zgr', '2019-07-03 17:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL DEFAULT 'contributor',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `password`, `role`, `creation_date`) VALUES
(1, 'JeanAdmin', '$2y$10$DRSxg.8X/FMTW7Qg5bBqGuJ3np20StgpOy8rJQAZ/TFKq3iDOfXE6', 'admin', '2019-06-23 09:32:37'),
(34, 'PseudoTest', '$2y$10$90b58A5Cy1EWJXnB/RzXAu5jbV0jRxcysp4/B0lOopLdjLIWwxFqK', 'contributor', '2019-07-09 17:42:08'),
(23, 'administrateur', '$2y$10$F7qp3jDgsl1OptBlmrLdC.rxpEdP4N.6tx2MGEpu5dnCK1Htg0fDG', 'contributor', '2019-07-04 17:37:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
