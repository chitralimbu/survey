-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: csmysql.cs.cf.ac.uk
-- Generation Time: Mar 09, 2016 at 04:29 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c1327916`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `Colour1` text NOT NULL,
  `Colour2` text NOT NULL,
  `Colour3` text NOT NULL,
  `Colour4` text NOT NULL,
  `Colour5` text NOT NULL,
  `Colour6` text NOT NULL,
  `Colour7` text NOT NULL,
  `Feeling1` text NOT NULL,
  `Feeling2` text NOT NULL,
  `Feeling3` text NOT NULL,
  `Additional_Comment` text NOT NULL,
  `Song_key` varchar(20) NOT NULL,
  `UID` int(10) DEFAULT NULL,
  UNIQUE KEY `UID` (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`Colour1`, `Colour2`, `Colour3`, `Colour4`, `Colour5`, `Colour6`, `Colour7`, `Feeling1`, `Feeling2`, `Feeling3`, `Additional_Comment`, `Song_key`, `UID`) VALUES
('green', 'orange', 'skyblue', '', '', '', '', 'Free', 'Escape', 'Longing', '', '1', 1),
('white', 'skyblue', 'mauve', 'silver', '', '', '', 'anew', 'spring', 'warm', '', '1', NULL),
('green', 'red', 'indigo', 'purple', '', '', '', 'hyped', 'savage', 'deep', '', '2', NULL),
('white', 'silver', 'sand colour', 'light red', '', '', '', 'happy', 'soft', 'gentle', '', '3', NULL),
('white', 'skyblue', 'mauve', 'silver', '', '', '', 'serene', 'peace', 'soothing', 'makes me think of merry days spent with my loved ones. ', '4', NULL),
('white', 'gray', 'purple', 'black', '', '', '', 'melodramatic', 'sorrow', '', '', '5', NULL),
('white', '', '', '', '', '', '', 'elegant', 'graceful', 'simple', '', '6', NULL),
('white', '', '', '', '', '', '', 'elegant', 'graceful', 'simple', '', '6', NULL),
('light red', '', '', '', '', '', '', 'nothing', '', '', '', '9', NULL),
('red', '', '', '', '', '', '', 'alert', '', '', '', '8', NULL),
('blue', 'skyblue', '', '', '', '', '', 'Sunny daysss', 'gay', 'light', '', '7', NULL),
('purple', '', '', '', '', '', '', 'rejoice ', '', '', '', '10', NULL),
('skyblue', '', '', '', '', '', '', 'warm', 'happy', '', '', '1', NULL),
('red', '', '', '', '', '', '', 'sinister', '', '', '', '2', NULL),
('orange', '', '', '', '', '', '', 'energetic', '', '', '', '3', NULL),
('orange', 'skyblue', '', '', '', '', '', 'clam', 'happy', '', '', '4', NULL),
('silver', '', '', '', '', '', '', 'deep', '', '', '', '5', NULL),
('silver', '', '', '', '', '', '', 'deep', '', '', '', '5', NULL),
('white', '', '', '', '', '', '', 'simple', '', '', '', '6', NULL),
('light red', '', '', '', '', '', '', 'joyous', '', '', '', '7', NULL),
('red', '', '', '', '', '', '', 'rustic', '', '', '', '8', NULL),
('red', '', '', '', '', '', '', 'rustic', '', '', '', '8', NULL),
('purple', '', '', '', '', '', '', 'outdoor', '', '', '', '9', NULL),
('purple', '', '', '', '', '', '', 'outdoor', '', '', '', '9', NULL),
('rose pink', '', '', '', '', '', '', 'shy', '', '', '', '10', NULL),
('orange', 'blue', 'skyblue', 'mauve', '', '', '', 'profound', 'radient', 'warm', '', '1', NULL),
('orange', 'red', 'indigo', 'light red', '', '', '', 'energetic', 'pumped', '', '', '2', NULL),
('green', 'blue', 'yellow', '', '', '', '', 'rural', 'elegant', 'graceful', '', '3', NULL),
('skyblue', 'mauve', 'purple', 'rose pink', '', '', '', 'peaceful', 'charming', 'gentle', '', '4', NULL),
('white', 'orange', 'blue', '', '', '', '', 'pure', 'sarrow', 'deep', '', '5', NULL),
('brown', 'gray', 'indigo', 'purple', '', '', '', 'noble', 'elegent', 'simple', '', '6', NULL),
('blue', 'skyblue', 'mauve', '', '', '', '', 'happy', 'joyful', '', '', '7', NULL),
('indigo', 'purple', 'black', '', '', '', '', 'pumped', 'energetic', 'dramatic', '', '8', NULL),
('orange', 'skyblue', 'rose pink', '', '', '', '', 'outdoor', 'deep', 'warm', '', '9', NULL),
('blue', 'yellow', 'scarlet', '', '', '', '', 'chilled', 'joyous', 'simple', '', '10', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
