-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 05. Feb 2023 um 13:13
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `M295_Projekt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Abteilung`
--

CREATE TABLE `Abteilung` (
  `AbtNr` int(11) NOT NULL,
  `AbtName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Abteilung`
--

INSERT INTO `Abteilung` (`AbtNr`, `AbtName`) VALUES
(1, 'Administration'),
(2, 'Bereichsleiter'),
(3, 'Mitarbeiter');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Auftraege`
--

CREATE TABLE `Auftraege` (
  `AuftragsNr` int(11) NOT NULL,
  `Datum` date DEFAULT NULL,
  `Zeit` double(4,2) DEFAULT NULL,
  `Kunde` int(11) NOT NULL,
  `Mitarbeiter` int(11) DEFAULT NULL,
  `Adresse_Objekt` varchar(50) DEFAULT NULL,
  `Terminwunsch` varchar(50) NOT NULL,
  `Arbeit` varchar(200) NOT NULL,
  `Beschreibung` varchar(255) NOT NULL,
  `Ausgefuehrt` tinyint(1) NOT NULL,
  `Freigegeben_Verrechnung` tinyint(1) NOT NULL,
  `Verrechnet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Auftraege`
--

INSERT INTO `Auftraege` (`AuftragsNr`, `Datum`, `Zeit`, `Kunde`, `Mitarbeiter`, `Adresse_Objekt`, `Terminwunsch`, `Arbeit`, `Beschreibung`, `Ausgefuehrt`, `Freigegeben_Verrechnung`, `Verrechnet`) VALUES
(1, NULL, NULL, 2, NULL, 'dito', 'Morgen', 'Reparatur,Heizung,', 'Wasserhan kapput', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Kunden`
--

CREATE TABLE `Kunden` (
  `KNR` int(11) NOT NULL,
  `Kunden_Name` varchar(25) NOT NULL,
  `Kunden_Vorname` varchar(25) NOT NULL,
  `Geschlecht` varchar(10) NOT NULL,
  `Telefon` varchar(15) NOT NULL,
  `Natel` varchar(15) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `PLZ` int(11) NOT NULL,
  `Ort` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Kunden`
--

INSERT INTO `Kunden` (`KNR`, `Kunden_Name`, `Kunden_Vorname`, `Geschlecht`, `Telefon`, `Natel`, `Adresse`, `PLZ`, `Ort`) VALUES
(1, 'Wenzler', 'Alejandro', 'Herr', '077 424 04 24', '077 232 23 43', 'Weissnichwo 25', 4321, 'Brucke'),
(2, 'Rothe', 'Nils', 'Herr', '077 424 03 94', '077 424 03 94', 'Oberzelgstrasse 26', 8493, 'Saland');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Mitarbeiter`
--

CREATE TABLE `Mitarbeiter` (
  `MNR` int(11) NOT NULL,
  `Mitarbeiter_Name` varchar(25) NOT NULL,
  `Mitarbeiter_Vorname` varchar(25) NOT NULL,
  `Abteilung` int(11) NOT NULL,
  `Passwort` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Mitarbeiter`
--

INSERT INTO `Mitarbeiter` (`MNR`, `Mitarbeiter_Name`, `Mitarbeiter_Vorname`, `Abteilung`, `Passwort`) VALUES
(1, 'Rothe', 'Nils', 1, '$2y$10$k1GPMvSD8Ya3pFpis3KDpuZnRTzB9vEhR4dLe3lN3JHiG3Q3RhlV6'),
(2, 'Wenzler', 'Ale', 2, '$2y$10$2adBl6s.Yk/ZT46EvoGlAuRaI1.Mxn7dvRTqguvRcz4wwit0PfOEe'),
(3, 'Moser', 'Shay', 3, '$2y$10$dpN0nTwGBHevxof5uaJJYuyQ1PJwIOqcM05WMKWP2v0LHrRQ0P67W'),
(4, 'brunner', 'Martin', 3, '$2y$10$qt7ofdRgk7gS/mRyDVEy0.oe6x25yVjCCOZtAKdERpteFlQBylNm.');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Abteilung`
--
ALTER TABLE `Abteilung`
  ADD PRIMARY KEY (`AbtNr`);

--
-- Indizes für die Tabelle `Auftraege`
--
ALTER TABLE `Auftraege`
  ADD PRIMARY KEY (`AuftragsNr`),
  ADD KEY `Kunde` (`Kunde`),
  ADD KEY `Mitarbeiter` (`Mitarbeiter`);

--
-- Indizes für die Tabelle `Kunden`
--
ALTER TABLE `Kunden`
  ADD PRIMARY KEY (`KNR`);

--
-- Indizes für die Tabelle `Mitarbeiter`
--
ALTER TABLE `Mitarbeiter`
  ADD PRIMARY KEY (`MNR`),
  ADD KEY `Abteilung` (`Abteilung`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Abteilung`
--
ALTER TABLE `Abteilung`
  MODIFY `AbtNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `Auftraege`
--
ALTER TABLE `Auftraege`
  MODIFY `AuftragsNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `Kunden`
--
ALTER TABLE `Kunden`
  MODIFY `KNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `Mitarbeiter`
--
ALTER TABLE `Mitarbeiter`
  MODIFY `MNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Auftraege`
--
ALTER TABLE `Auftraege`
  ADD CONSTRAINT `auftraege_ibfk_1` FOREIGN KEY (`Kunde`) REFERENCES `Kunden` (`KNR`),
  ADD CONSTRAINT `auftraege_ibfk_2` FOREIGN KEY (`Mitarbeiter`) REFERENCES `Mitarbeiter` (`MNR`);

--
-- Constraints der Tabelle `Mitarbeiter`
--
ALTER TABLE `Mitarbeiter`
  ADD CONSTRAINT `mitarbeiter_ibfk_1` FOREIGN KEY (`Abteilung`) REFERENCES `Abteilung` (`AbtNr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
