-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Lis 2021, 19:19
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `przychodnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adres`
--

CREATE TABLE `adres` (
  `id_Adres` int(11) NOT NULL,
  `Ulica` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `Miasto` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `NrDomu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `adres`
--

INSERT INTO `adres` (`id_Adres`, `Ulica`, `Miasto`, `NrDomu`) VALUES
(1, 'Zielona', 'Gdańsk', 10),
(2, 'Niebieska', 'MAlbork', 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `leczenie`
--

CREATE TABLE `leczenie` (
  `id_Lekarz` int(4) NOT NULL,
  `id_Pacjent` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `leczenie`
--

INSERT INTO `leczenie` (`id_Lekarz`, `id_Pacjent`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekarz`
--

CREATE TABLE `lekarz` (
  `id_Lekarz` int(4) NOT NULL,
  `id_Specjalnosc` int(4) NOT NULL,
  `Id_Adres` int(4) NOT NULL,
  `Imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Telefon` varchar(15) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `lekarz`
--

INSERT INTO `lekarz` (`id_Lekarz`, `id_Specjalnosc`, `Id_Adres`, `Imie`, `Nazwisko`, `Telefon`) VALUES
(1, 1, 1, 'Zbyszek', 'Lekarz', '98466985492834'),
(2, 0, 0, 'Jacek', 'Lekarz', '43255446'),
(3, 0, 0, 'Franek', 'Lekarz', '314412365436');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pacjent`
--

CREATE TABLE `pacjent` (
  `id_Pacjent` int(4) NOT NULL,
  `id_Adres` int(4) NOT NULL,
  `id_Lekarz` int(4) NOT NULL,
  `Imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Telefon` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `Przebyte_choroby` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pacjent`
--

INSERT INTO `pacjent` (`id_Pacjent`, `id_Adres`, `id_Lekarz`, `Imie`, `Telefon`, `Przebyte_choroby`, `Nazwisko`) VALUES
(1, 0, 0, 'Adam', '43255446', '', 'Pacjent'),
(2, 0, 0, 'Jacek', '314412365436', '', 'Pacjent');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `specjalnosc`
--

CREATE TABLE `specjalnosc` (
  `id_Specjalnosc` int(4) NOT NULL,
  `NazwaSpecjalnosci` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `specjalnosc`
--

INSERT INTO `specjalnosc` (`id_Specjalnosc`, `NazwaSpecjalnosci`) VALUES
(1, 'Internista'),
(2, 'Chirurg'),
(3, 'Kardiolog'),
(4, 'Dermatolog');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wizyta`
--

CREATE TABLE `wizyta` (
  `id_Wizyta` int(4) NOT NULL,
  `id_Pacjent` int(4) NOT NULL,
  `id_Lekarz` int(4) NOT NULL,
  `Gabinet` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Data_wizyty` date NOT NULL,
  `Godzina` time(6) NOT NULL,
  `czyRezerwowana` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wizyta`
--

INSERT INTO `wizyta` (`id_Wizyta`, `id_Pacjent`, `id_Lekarz`, `Gabinet`, `Data_wizyty`, `Godzina`, `czyRezerwowana`) VALUES
(1, 1, 3, '15', '2021-10-25', '17:00:00.988000', 0),
(2, 2, 2, '17', '2021-10-25', '16:00:00.988000', 1),
(6, 1, 1, '18', '2021-11-17', '17:00:00.988000', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`id_Adres`);

--
-- Indeksy dla tabeli `leczenie`
--
ALTER TABLE `leczenie`
  ADD PRIMARY KEY (`id_Lekarz`,`id_Pacjent`);

--
-- Indeksy dla tabeli `lekarz`
--
ALTER TABLE `lekarz`
  ADD PRIMARY KEY (`id_Lekarz`);

--
-- Indeksy dla tabeli `pacjent`
--
ALTER TABLE `pacjent`
  ADD PRIMARY KEY (`id_Pacjent`);

--
-- Indeksy dla tabeli `specjalnosc`
--
ALTER TABLE `specjalnosc`
  ADD PRIMARY KEY (`id_Specjalnosc`);

--
-- Indeksy dla tabeli `wizyta`
--
ALTER TABLE `wizyta`
  ADD PRIMARY KEY (`id_Wizyta`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `adres`
--
ALTER TABLE `adres`
  MODIFY `id_Adres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `lekarz`
--
ALTER TABLE `lekarz`
  MODIFY `id_Lekarz` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `pacjent`
--
ALTER TABLE `pacjent`
  MODIFY `id_Pacjent` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `specjalnosc`
--
ALTER TABLE `specjalnosc`
  MODIFY `id_Specjalnosc` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `wizyta`
--
ALTER TABLE `wizyta`
  MODIFY `id_Wizyta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
