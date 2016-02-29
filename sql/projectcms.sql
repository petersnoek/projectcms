-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 29 feb 2016 om 12:57
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `projectcms`
--
CREATE DATABASE IF NOT EXISTS `projectcms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projectcms`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(50) DEFAULT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `achternaam` varchar(50) DEFAULT NULL,
  `telefoon` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adres` varchar(50) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `plaats` varchar(50) DEFAULT NULL,
  `opmerking` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `members`
--

INSERT INTO `members` (`id`, `voornaam`, `prefix`, `achternaam`, `telefoon`, `email`, `adres`, `postcode`, `plaats`, `opmerking`) VALUES
(1, 'Monni', '', 'Souliere', 1234567, 'Drakenpencil@yahoo.com', 'Rozenstraat70', '1234QW', 'Saint-Émilion', 'Living meme machine');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(50) DEFAULT NULL,
  `opdrachtgever` varchar(50) DEFAULT NULL,
  `bedrijf` varchar(50) DEFAULT NULL,
  `telefoon` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adres` varchar(50) DEFAULT NULL,
  `plaats` varchar(50) DEFAULT NULL,
  `pc` varchar(50) DEFAULT NULL,
  `omschrijving` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `projects`
--

INSERT INTO `projects` (`id`, `titel`, `opdrachtgever`, `bedrijf`, `telefoon`, `email`, `adres`, `plaats`, `pc`, `omschrijving`) VALUES
(1, 'Project CMS', 'SNP', 'DaVinci', 1234567, 'snp@mydavinci.nl', 'Test12', 'Gemberboom', '\\(o_o)/', 'Een redelijk lang bericht zou ook gewoon vervangen kunnen worden door wat copy paste spam, maar ik heb even zin om te typen. Geen idee waarom, maar dat zit wel goed, al zeg ik het zelf.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
