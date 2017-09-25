-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: csmysql.cs.cf.ac.uk
-- Generation Time: Mar 09, 2016 at 05:23 PM
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
  `unique` int(20) DEFAULT NULL,
  UNIQUE KEY `unique` (`unique`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`Colour1`, `Colour2`, `Colour3`, `Colour4`, `Colour5`, `Colour6`, `Colour7`, `Feeling1`, `Feeling2`, `Feeling3`, `Additional_Comment`, `Song_key`, `unique`) VALUES
('blue', 'skyblue', 'mauve', '', '', '', '', 'happy', 'joyful', '', '', '7', 1),
('brown', 'gray', 'indigo', 'purple', '', '', '', 'noble', 'elegent', 'simple', '', '6', 2),
('white', 'orange', 'blue', '', '', '', '', 'pure', 'sarrow', 'deep', '', '5', 3),
('skyblue', 'mauve', 'purple', 'rose pink', '', '', '', 'peaceful', 'charming', 'gentle', '', '4', 4),
('orange', 'blue', 'skyblue', 'mauve', '', '', '', 'profound', 'radient', 'warm', '', '1', 5),
('white', '', '', '', '', '', '', 'simple', '', '', '', '6', 6),
('orange', 'skyblue', '', '', '', '', '', 'clam', 'happy', '', '', '4', 7),
('orange', '', '', '', '', '', '', 'energetic', '', '', '', '3', 8),
('blue', 'skyblue', '', '', '', '', '', 'Sunny daysss', 'gay', 'light', '', '7', 9),
('light red', '', '', '', '', '', '', 'nothing', '', '', '', '9', 10),
('green', 'red', 'indigo', 'purple', '', '', '', 'hyped', 'savage', 'deep', '', '2', 11),
('white', 'silver', 'sand colour', 'light red', '', '', '', 'happy', 'soft', 'gentle', '', '3', 12),
('green', 'orange', 'skyblue', '', '', '', '', 'Free', 'Escape', 'Longing', '', '1', 13),
('green', 'blue', 'yellow', '', '', '', '', 'rural', 'elegant', 'graceful', '', '3', 14),
('orange', 'red', 'indigo', 'light red', '', '', '', 'energetic', 'pumped', '', '', '2', 15),
('rose pink', '', '', '', '', '', '', 'shy', '', '', '', '10', 16),
('purple', '', '', '', '', '', '', 'outdoor', '', '', '', '9', 17),
('purple', '', '', '', '', '', '', 'outdoor', '', '', '', '9', 18),
('red', '', '', '', '', '', '', 'rustic', '', '', '', '8', 19),
('red', '', '', '', '', '', '', 'rustic', '', '', '', '8', 20),
('light red', '', '', '', '', '', '', 'joyous', '', '', '', '7', 21),
('silver', '', '', '', '', '', '', 'deep', '', '', '', '5', 22),
('silver', '', '', '', '', '', '', 'deep', '', '', '', '5', 23),
('red', '', '', '', '', '', '', 'sinister', '', '', '', '2', 24),
('skyblue', '', '', '', '', '', '', 'warm', 'happy', '', '', '1', 25),
('purple', '', '', '', '', '', '', 'rejoice ', '', '', '', '10', 26),
('red', '', '', '', '', '', '', 'alert', '', '', '', '8', 27),
('white', '', '', '', '', '', '', 'elegant', 'graceful', 'simple', '', '6', 28),
('white', '', '', '', '', '', '', 'elegant', 'graceful', 'simple', '', '6', 29),
('white', 'gray', 'purple', 'black', '', '', '', 'melodramatic', 'sorrow', '', '', '5', 30),
('white', 'skyblue', 'mauve', 'silver', '', '', '', 'serene', 'peace', 'soothing', 'makes me think of merry days spent with my loved ones. ', '4', 31),
('white', 'skyblue', 'mauve', 'silver', '', '', '', 'anew', 'spring', 'warm', '', '1', 32),
('indigo', 'purple', 'black', '', '', '', '', 'pumped', 'energetic', 'dramatic', '', '8', 33),
('orange', 'skyblue', 'rose pink', '', '', '', '', 'outdoor', 'deep', 'warm', '', '9', 34),
('blue', 'yellow', 'scarlet', '', '', '', '', 'chilled', 'joyous', 'simple', '', '10', 35),
('green', 'orange', '', '', '', '', '', 'free', 'lonely', 'victorious', '', '1', 36),
('indigo', 'black', '', '', '', '', '', 'dark', 'trapped', 'rough', 'tough feeling, challenge', '2', 37),
('light red', 'rose pink', '', '', '', '', '', 'chilled', 'relaxed', 'soothing', 'summer', '3', 38),
('orange', 'mauve', 'yellow', '', '', '', '', 'romance', 'sorrow', 'shy', '', '4', 39),
('skyblue', '', '', '', '', '', '', 'isolated', '', '', '', '5', 40),
('blue', 'skyblue', 'mauve', '', '', '', '', 'travelling', 'wandering', 'peace', '', '6', 41),
('orange', 'red', 'blue', '', '', '', '', 'colourful', 'joyous', 'social', '', '7', 42),
('indigo', '', '', '', '', '', '', 'uncomfortable', 'unfriendly', 'bad', 'negative vibrations', '8', 43),
('white', 'silver', 'sand colour', '', 'gold', 'transparent', 'transparent', 'simple', 'cool', 'sophisticated', '', '9', 44),
('yellow', '', '', '', '', '', '', 'silly', 'happy', 'playful', 'fun', '10', 45),
('gray', 'indigo', '', '', '', '', '', 'destruction', 'defensive', 'quiet', '', '11', 46);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
