-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 12, 2018 alle 20:11
-- Versione del server: 10.1.30-MariaDB
-- Versione PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utenti`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `medicinali`
--

CREATE TABLE `medicinali` (
  `id_medicina` int(2) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descrizione` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(2) NOT NULL,
  `id_utente` int(2) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `cod_fiscale` int(16) NOT NULL,
  `data_nascita` date NOT NULL,
  `luogo_nascita` int(11) NOT NULL,
  `sesso` varchar(1) NOT NULL,
  `specialistica` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `paziente`
--

CREATE TABLE `paziente` (
  `id_paz` int(2) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `cod_fiscale` varchar(16) NOT NULL,
  `data_nascita` date NOT NULL,
  `luogo_nascita` varchar(20) NOT NULL,
  `sesso` varchar(1) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `paz_med`
--

CREATE TABLE `paz_med` (
  `id_paz` int(2) NOT NULL,
  `id_medico` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `paz_medicinali`
--

CREATE TABLE `paz_medicinali` (
  `id_paz` int(2) NOT NULL,
  `id_medicina` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id_prenotazione` int(2) NOT NULL,
  `id_medico` int(2) NOT NULL,
  `data` date NOT NULL,
  `id_paz` int(2) NOT NULL,
  `descrizione` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID_User` int(2) NOT NULL,
  `rank` int(1) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID_User`, `rank`, `user`, `password`) VALUES
(9, 1, 'admin', 'admin'),
(10, 0, 'asdasd', 'asdasd'),
(11, 0, 'dfsfsd', 'asd');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `medicinali`
--
ALTER TABLE `medicinali`
  ADD PRIMARY KEY (`id_medicina`);

--
-- Indici per le tabelle `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `paziente`
--
ALTER TABLE `paziente`
  ADD PRIMARY KEY (`id_paz`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `paz_med`
--
ALTER TABLE `paz_med`
  ADD KEY `id_paz` (`id_paz`,`id_medico`),
  ADD KEY `id_medico` (`id_medico`);

--
-- Indici per le tabelle `paz_medicinali`
--
ALTER TABLE `paz_medicinali`
  ADD KEY `id_paz` (`id_paz`),
  ADD KEY `id_medicina` (`id_medicina`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id_prenotazione`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_paz` (`id_paz`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `medicinali`
--
ALTER TABLE `medicinali`
  MODIFY `id_medicina` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `paziente`
--
ALTER TABLE `paziente`
  MODIFY `id_paz` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id_prenotazione` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID_User` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`ID_User`);

--
-- Limiti per la tabella `paziente`
--
ALTER TABLE `paziente`
  ADD CONSTRAINT `paziente_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`ID_User`);

--
-- Limiti per la tabella `paz_med`
--
ALTER TABLE `paz_med`
  ADD CONSTRAINT `paz_med_ibfk_1` FOREIGN KEY (`id_paz`) REFERENCES `paziente` (`id_paz`),
  ADD CONSTRAINT `paz_med_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`);

--
-- Limiti per la tabella `paz_medicinali`
--
ALTER TABLE `paz_medicinali`
  ADD CONSTRAINT `paz_medicinali_ibfk_1` FOREIGN KEY (`id_paz`) REFERENCES `paziente` (`id_paz`),
  ADD CONSTRAINT `paz_medicinali_ibfk_2` FOREIGN KEY (`id_medicina`) REFERENCES `medicinali` (`id_medicina`);

--
-- Limiti per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD CONSTRAINT `prenotazioni_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`),
  ADD CONSTRAINT `prenotazioni_ibfk_2` FOREIGN KEY (`id_paz`) REFERENCES `paziente` (`id_paz`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
