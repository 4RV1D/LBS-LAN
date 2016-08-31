-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 02 maj 2016 kl 09:52
-- Serverversion: 5.6.26
-- PHP-version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `lbs_lan`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `NewsID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Text` text NOT NULL,
  `Name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `news`
--

INSERT INTO `news` (`NewsID`, `Title`, `Text`, `Name`) VALUES
(1, 'Test news Kappa123', '<strong>Lorem ipsum is very nice</strong><br>\r\nUt elementum neque a congue commodo. Nullam eu tincidunt quam. Nullam nec euismod velit. Fusce massa lorem, pellentesque vel placerat iaculis, lacinia quis velit. Vestibulum odio lorem, condimentum in eros in, convallis euismod orci. Nullam vulputate gravida lacinia. Praesent risus eros, congue vitae diam et, feugiat finibus nunc. Curabitur metus sapien, vestibulum vel tristique id, sollicitudin a sapien. Sed molestie convallis placerat.', 'Arvid Gullqvist'),
(5, 'Kappa123', 'Hej jag heter hampus\n<h3>SWAG</h3>', 'Hampus Fuckboii');

-- --------------------------------------------------------

--
-- Tabellstruktur `tournaments`
--

CREATE TABLE IF NOT EXISTS `tournaments` (
  `id` int(11) NOT NULL,
  `Game` text NOT NULL,
  `USERid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `tournaments`
--

INSERT INTO `tournaments` (`id`, `Game`, `USERid`) VALUES
(13, '1', 666),
(14, '2', 666),
(18, '1', 736),
(20, '1', 737),
(21, '2', 737);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `USERid` int(11) NOT NULL,
  `FirstName` varchar(64) NOT NULL,
  `LastName` varchar(64) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `MainGame` text NOT NULL,
  `ProfilePic` text NOT NULL,
  `Phone` varchar(64) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TableNum` varchar(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=739 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`USERid`, `FirstName`, `LastName`, `Username`, `Password`, `Email`, `MainGame`, `ProfilePic`, `Phone`, `Date`, `TableNum`) VALUES
(1, '', '', 'Admin', '59539de0956bf6581e9d8d2c53418259', '', '', '', '', '2016-05-02 09:48:49', ''),
(404, 'Guest', 'Guest', 'GuestUser', 'e10adc3949ba59abbe56e057f20f883e', 'Guest@hotmail.com', 'Guesting', 'http://i.imgur.com/veLso0d.png', '1337', '2016-05-02 09:43:14', ''),
(420, 'Arvid', 'Gullqvist', '4RV1D', '59539de0956bf6581e9d8d2c53418259', 'arvidgullqvist@hotmail.com', 'Black Desert', 'http://i.imgur.com/dcmyRDw.gif', '0705361197', '2016-05-01 23:53:32', 'B23'),
(666, 'Bert', 'Karlsson', 'SWAG LORD', '59539de0956bf6581e9d8d2c53418259', 'arvid.the.man@hotmail.com', 'LoL', 'http://i.imgur.com/FwbO1SQ.jpg', '0704367798', '0000-00-00 00:00:00', 'B24');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NewsID`);

--
-- Index för tabell `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `USERid` (`USERid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `news`
--
ALTER TABLE `news`
  MODIFY `NewsID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT för tabell `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `USERid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=739;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
