-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 17 mrt 2016 om 10:33
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
-- Tabelstructuur voor tabel `project_members`
--

CREATE TABLE IF NOT EXISTS `project_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_project_members_members` (`member_id`),
  KEY `FK_project_members_projects` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `project_members`
--

INSERT INTO `project_members` (`id`, `member_id`, `project_id`) VALUES
(1, 8, 7),
(2, 5, 1),
(3, 6, 1),
(4, 5, 2),
(5, 10, 2);

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `project_members`
--
ALTER TABLE `project_members`
  ADD CONSTRAINT `FK_project_members_members` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `FK_project_members_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
