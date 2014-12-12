-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2014 at 02:52 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cheapomail`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `subject` varchar(500) NOT NULL,
  `user_id` int(255) NOT NULL,
  `recipient_ids` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`recipient_ids`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `body`, `subject`, `user_id`, `recipient_ids`) VALUES
(1, 'I am doing web dev!', 'Web Dev', 4, 0),
(2, 'I am doing web dev!', 'Web Dev', 4, 0),
(3, 'I am doing web dev!', 'Web Dev', 4, 4),
(4, 'I am doing web dev!', 'Web Dev', 4, 4),
(5, 'I am doing web dev!', 'Web Dev', 4, 4),
(6, 'It''s happening!!!!', 'IEEEXtreeme', 5, 4),
(7, '', '', 4, 0),
(8, 'How ya doing?', 'Hello World!', 4, 4),
(9, 'Hai!', 'moo', 2, 2),
(10, 'Hello World! :D', 'Hello', 6, 6),
(11, 'cool!', 'Drop Down menu', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `message_read`
--

CREATE TABLE IF NOT EXISTS `message_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `reader_id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`,`reader_id`,`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `message_read`
--

INSERT INTO `message_read` (`id`, `message_id`, `reader_id`, `date`) VALUES
(35, 10, 6, '12/12/2014'),
(34, 11, 6, '12/12/2014');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `FirstName`, `LastName`, `Password`, `UserName`) VALUES
(1, 'Travis', 'Smith', 'datatraveler', 'tevyt'),
(2, 'Justen', 'Morgan', 'PooPooPoo1', 'moo'),
(3, 'First', 'Second', 'Password1', 'user'),
(4, 'Travis', 'Smith', 'Lifestartsn0w', 'tyrique'),
(5, 'Dane', 'Miller', 'Drell1mal', 'drell1mal'),
(6, 'Jerene', 'Ricketts', 'Ph1ll#!$', 'tanjerene');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
