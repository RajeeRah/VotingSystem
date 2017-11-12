-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 02. Nov 2017 um 11:17
-- Server-Version: 5.6.33
-- PHP-Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `TestDB`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `poll_answers`
--

CREATE TABLE `poll_answers` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `poll_answers`
--

INSERT INTO `poll_answers` (`id`, `user`, `region`, `answer`) VALUES
(29, 1, 1, 2),
(30, 2, 2, 2),
(31, 3, 2, 3),
(32, 4, 2, 3),
(33, 6, 4, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `poll_options`
--

CREATE TABLE `poll_options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `poll_options`
--

INSERT INTO `poll_options` (`id`, `name`) VALUES
(1, 'Person 1'),
(2, 'Person 2'),
(3, 'TEST Person');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `poll_region`
--

CREATE TABLE `poll_region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `poll_region`
--

INSERT INTO `poll_region` (`id`, `region_name`) VALUES
(1, 'Nord'),
(2, 'South'),
(3, 'East'),
(4, 'West');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`) VALUES
(1, 'Test User 1'),
(2, 'Test User 2');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `poll_options`
--
ALTER TABLE `poll_options`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `poll_region`
--
ALTER TABLE `poll_region`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `poll_answers`
--
ALTER TABLE `poll_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT für Tabelle `poll_options`
--
ALTER TABLE `poll_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `poll_region`
--
ALTER TABLE `poll_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;