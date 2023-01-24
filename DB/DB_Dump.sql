-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 24. Jan 2023 um 16:27
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.1.6

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
-- Tabellenstruktur für Tabelle `Arbeit`
--

CREATE TABLE `Arbeit` (
  `ArbeitNr` int(11) NOT NULL,
  `Arbeit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Arbeit`
--

INSERT INTO `Arbeit` (`ArbeitNr`, `Arbeit`) VALUES
(1, 'Reperatur'),
(2, 'Sanitär'),
(3, 'Heizung'),
(4, 'Garantie');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Auftraege`
--

CREATE TABLE `Auftraege` (
  `AuftragsNr` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Zeit` double(4,2) NOT NULL,
  `Kunde` int(11) NOT NULL,
  `Mitarbeiter` int(11) NOT NULL,
  `Adresse_Objekt` varchar(50) NOT NULL,
  `Terminwunsch` varchar(50) NOT NULL,
  `Beschreibung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Auftraege`
--

INSERT INTO `Auftraege` (`AuftragsNr`, `Datum`, `Zeit`, `Kunde`, `Mitarbeiter`, `Adresse_Objekt`, `Terminwunsch`, `Beschreibung`) VALUES
(1, '2023-01-25', 10.30, 1, 1, 'dito', 'wend ziit hesch chasch mal verbii cho', 'Miis Huus isch explodiert');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Auftrag-Arbeit`
--

CREATE TABLE `Auftrag-Arbeit` (
  `ArbeitNr` int(11) NOT NULL,
  `AuftragsNr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Kunden`
--

CREATE TABLE `Kunden` (
  `KNR` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Vorname` varchar(25) NOT NULL,
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

INSERT INTO `Kunden` (`KNR`, `Name`, `Vorname`, `Geschlecht`, `Telefon`, `Natel`, `Adresse`, `PLZ`, `Ort`) VALUES
(1, 'Wenzler', 'Alejandro', 'Herr', '077 424 04 24', '077 232 23 43', 'Weissnichwo 25', 4321, 'Brucke');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Mitarbeiter`
--

CREATE TABLE `Mitarbeiter` (
  `MNR` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Vorname` varchar(25) NOT NULL,
  `Abteilung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Mitarbeiter`
--

INSERT INTO `Mitarbeiter` (`MNR`, `Name`, `Vorname`, `Abteilung`) VALUES
(1, 'Rothe', 'Nils', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Abteilung`
--
ALTER TABLE `Abteilung`
  ADD PRIMARY KEY (`AbtNr`);

--
-- Indizes für die Tabelle `Arbeit`
--
ALTER TABLE `Arbeit`
  ADD PRIMARY KEY (`ArbeitNr`);

--
-- Indizes für die Tabelle `Auftraege`
--
ALTER TABLE `Auftraege`
  ADD PRIMARY KEY (`AuftragsNr`),
  ADD KEY `Kunde` (`Kunde`),
  ADD KEY `Mitarbeiter` (`Mitarbeiter`);

--
-- Indizes für die Tabelle `Auftrag-Arbeit`
--
ALTER TABLE `Auftrag-Arbeit`
  ADD KEY `ArbeitNr` (`ArbeitNr`),
  ADD KEY `AuftragsNr` (`AuftragsNr`);

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
-- AUTO_INCREMENT für Tabelle `Arbeit`
--
ALTER TABLE `Arbeit`
  MODIFY `ArbeitNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `Auftraege`
--
ALTER TABLE `Auftraege`
  MODIFY `AuftragsNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `Kunden`
--
ALTER TABLE `Kunden`
  MODIFY `KNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `Mitarbeiter`
--
ALTER TABLE `Mitarbeiter`
  MODIFY `MNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints der Tabelle `Auftrag-Arbeit`
--
ALTER TABLE `Auftrag-Arbeit`
  ADD CONSTRAINT `auftrag-arbeit_ibfk_1` FOREIGN KEY (`ArbeitNr`) REFERENCES `Arbeit` (`ArbeitNr`),
  ADD CONSTRAINT `auftrag-arbeit_ibfk_2` FOREIGN KEY (`AuftragsNr`) REFERENCES `Auftraege` (`AuftragsNr`);

--
-- Constraints der Tabelle `Mitarbeiter`
--
ALTER TABLE `Mitarbeiter`
  ADD CONSTRAINT `mitarbeiter_ibfk_1` FOREIGN KEY (`Abteilung`) REFERENCES `Abteilung` (`AbtNr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
