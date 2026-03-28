-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql.ct8.pl
-- Generation Time: Mar 23, 2026 at 07:32 AM
-- Wersja serwera: 8.0.43
-- Wersja PHP: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `m54009_ykom_baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_uzyt_zam`
--

CREATE TABLE `dane_uzyt_zam` (
  `id` int NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `nr_dom` varchar(4) NOT NULL,
  `ulica` varchar(50) NOT NULL,
  `miejscowosc` varchar(50) NOT NULL,
  `kod_poczt` varchar(6) NOT NULL,
  `nr_tel` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `dane_uzyt_zam`
--

INSERT INTO `dane_uzyt_zam` (`id`, `imie`, `nazwisko`, `nr_dom`, `ulica`, `miejscowosc`, `kod_poczt`, `nr_tel`, `email`, `login`, `haslo`) VALUES
(1, 'Robert', 'Kowalski', '68a', 'Wyzwolenia', 'Wodzisław Śląski', '44-373', '+48690131441', 'RobertosKol@gmail.com', 'RobKol2', 'RobKol2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int NOT NULL,
  `nazwa_kat` varchar(50) NOT NULL,
  `opis_kat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa_kat`, `opis_kat`) VALUES
(1, 'Komputer', 'Komputer Stacjonarny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `id` int NOT NULL,
  `nazwa_prod` decimal(50,0) NOT NULL,
  `opis_prod` varchar(250) NOT NULL,
  `id_kategoria` int NOT NULL,
  `cena_sztuka` decimal(10,0) NOT NULL,
  `ilosc_magazyn` int NOT NULL,
  `zdjecie_prod` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `produkt`
--

INSERT INTO `produkt` (`id`, `nazwa_prod`, `opis_prod`, `id_kategoria`, `cena_sztuka`, `ilosc_magazyn`, `zdjecie_prod`) VALUES
(1, 0, 'Komputer RXPC z mocnym procesorem Ryzen 7 7800x3d, 32GB szybkiej pamięci RAM DDR5, mocną kartą graficzną RTX 4070 oraz szybkim dyskiem SSD o pojemności 2TB.', 1, 6899, 4, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int NOT NULL,
  `id_osob` int NOT NULL,
  `data_zamow` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `kwota` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id`, `id_osob`, `data_zamow`, `status`, `kwota`) VALUES
(1, 1, '2026-03-10 09:27:28', 'Paczka wysłana', 6899);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamow_produkty`
--

CREATE TABLE `zamow_produkty` (
  `id` int NOT NULL,
  `id_zamow` int NOT NULL,
  `id_produkt` int NOT NULL,
  `ilosc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `zamow_produkty`
--

INSERT INTO `zamow_produkty` (`id`, `id_zamow`, `id_produkt`, `ilosc`) VALUES
(1, 1, 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_uzyt_zam`
--
ALTER TABLE `dane_uzyt_zam`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `produkt_fk3` (`id_kategoria`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `zamowienia_fk1` (`id_osob`);

--
-- Indeksy dla tabeli `zamow_produkty`
--
ALTER TABLE `zamow_produkty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `zamow_produkty_fk1` (`id_zamow`),
  ADD KEY `zamow_produkty_fk2` (`id_produkt`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane_uzyt_zam`
--
ALTER TABLE `dane_uzyt_zam`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `produkt`
--
ALTER TABLE `produkt`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `zamow_produkty`
--
ALTER TABLE `zamow_produkty`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD CONSTRAINT `produkt_fk3` FOREIGN KEY (`id_kategoria`) REFERENCES `kategorie` (`id`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_fk1` FOREIGN KEY (`id_osob`) REFERENCES `dane_uzyt_zam` (`id`);

--
-- Ograniczenia dla tabeli `zamow_produkty`
--
ALTER TABLE `zamow_produkty`
  ADD CONSTRAINT `zamow_produkty_fk1` FOREIGN KEY (`id_zamow`) REFERENCES `zamowienia` (`id`),
  ADD CONSTRAINT `zamow_produkty_fk2` FOREIGN KEY (`id_produkt`) REFERENCES `produkt` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
