-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 01 mars 2016 kl 19:38
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
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `USERid` int(11) NOT NULL,
  `FirstName` varchar(64) NOT NULL,
  `LastName` varchar(64) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Phone` varchar(64) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=702 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`USERid`, `FirstName`, `LastName`, `Username`, `Password`, `Email`, `Phone`, `Date`) VALUES
(420, 'Arvid', 'Gullqvist', '4RV1D', '59539de0956bf6581e9d8d2c53418259', 'arvidgullqvist@hotmail.com', '0705361197', '0000-00-00 00:00:00'),
(666, 'Bert', 'Karlsson', 'SWAG LORD', '202cb962ac59075b964b07152d234b70', 'arvid.the.man@hotmail.com', '0704367798', '0000-00-00 00:00:00'),
(700, '123', '123', '4RV1D', '202cb962ac59075b964b07152d234b70', 'arvidgullqvist@hotmail.com', '123', '2016-03-01 09:21:15'),
(701, '213', '123', '4RV1D', '202cb962ac59075b964b07152d234b70', '123@hotmail.com', '123', '2016-03-01 09:27:07');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `USERid` (`USERid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `USERid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=702;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
