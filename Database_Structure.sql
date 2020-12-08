-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: dedi3418.your-server.de
-- Erstellungszeit: 08. Dez 2020 um 12:29
-- Server-Version: 5.7.32-1
-- PHP-Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wuerfg_db1`
--
CREATE DATABASE IF NOT EXISTS `wuerfg_db1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wuerfg_db1`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dsa_chat`
--

CREATE TABLE `dsa_chat` (
  `id` int(11) NOT NULL,
  `zeitstempel` int(25) NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `charakter` varchar(255) NOT NULL,
  `group_id` int(255) NOT NULL,
  `gm_mode` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dsa_groups`
--

CREATE TABLE `dsa_groups` (
  `id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `groupname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dsa_initiative_gruppen`
--

CREATE TABLE `dsa_initiative_gruppen` (
  `id` int(11) NOT NULL,
  `zeitstempel` int(25) NOT NULL,
  `charakter` varchar(255) NOT NULL,
  `group_id` int(255) NOT NULL,
  `gm_mode` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dsa_initiative_wuerfe`
--

CREATE TABLE `dsa_initiative_wuerfe` (
  `id` int(11) NOT NULL,
  `zeitstempel` int(25) NOT NULL,
  `text` text NOT NULL,
  `charakter` varchar(255) NOT NULL,
  `group_id` int(255) NOT NULL,
  `gm_mode` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dsa_userid_to_saonid`
--

CREATE TABLE `dsa_userid_to_saonid` (
  `id` int(15) NOT NULL,
  `userid` varchar(15) NOT NULL DEFAULT '0',
  `saonid` varchar(30) NOT NULL DEFAULT '0',
  `groupid` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dsa_user_online`
--

CREATE TABLE `dsa_user_online` (
  `userid` varchar(10) NOT NULL,
  `groupid` varchar(10) NOT NULL,
  `timestamp` int(15) NOT NULL,
  `username` varchar(40) NOT NULL,
  `cache` tinyint(1) NOT NULL DEFAULT '0',
  `character_id` varchar(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `dsa_chat`
--
ALTER TABLE `dsa_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zeitstempel` (`zeitstempel`),
  ADD KEY `group_id` (`group_id`);

--
-- Indizes für die Tabelle `dsa_groups`
--
ALTER TABLE `dsa_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hash_2` (`hash`),
  ADD KEY `hash` (`hash`);

--
-- Indizes für die Tabelle `dsa_initiative_gruppen`
--
ALTER TABLE `dsa_initiative_gruppen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zeitstempel` (`zeitstempel`),
  ADD KEY `group_id` (`group_id`);

--
-- Indizes für die Tabelle `dsa_initiative_wuerfe`
--
ALTER TABLE `dsa_initiative_wuerfe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zeitstempel` (`zeitstempel`),
  ADD KEY `group_id` (`group_id`);

--
-- Indizes für die Tabelle `dsa_userid_to_saonid`
--
ALTER TABLE `dsa_userid_to_saonid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupid` (`groupid`);

--
-- Indizes für die Tabelle `dsa_user_online`
--
ALTER TABLE `dsa_user_online`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD KEY `groupid` (`groupid`),
  ADD KEY `timestamp` (`timestamp`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `dsa_chat`
--
ALTER TABLE `dsa_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `dsa_groups`
--
ALTER TABLE `dsa_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `dsa_initiative_gruppen`
--
ALTER TABLE `dsa_initiative_gruppen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `dsa_initiative_wuerfe`
--
ALTER TABLE `dsa_initiative_wuerfe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `dsa_userid_to_saonid`
--
ALTER TABLE `dsa_userid_to_saonid`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
