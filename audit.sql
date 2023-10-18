-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Sty 2022, 20:25
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `audit`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(11) UNSIGNED NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cookies` varchar(32) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `guestbook`
--

INSERT INTO `guestbook` (`id`, `comment`, `name`, `cookies`, `time`) VALUES
(1, 'Sesjon_D3c0dEr{Braw0_S3sj3_Admin1_Zd08yT1}', 'Admin', 'admin17dv91wsf1', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nowa`
--

CREATE TABLE `nowa` (
  `id` int(11) NOT NULL,
  `keys` text NOT NULL,
  `dd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `nowa`
--

INSERT INTO `nowa` (`id`, `keys`, `dd`) VALUES
(1, 'tajna wiadomosc \"H2=<2 ?2 8C2?:4J\"', 'X'),
(2, 'tajna wiadomosc \"V&?:@? $t{tr% Y 7C@> ]]] R\"', 'A'),
(3, 'kolejna wiadomosc \"BHGPĄ ĄZĆ 47\" *(13)', 'Z'),
(4, 'Wiadomości zaszyfrowane, są bardzo starym i łatwym do złamania szyfrze. Zwróć uwagę na inną wartość w 3 wiadomości. Nawiasy podpowiadają :-), wiadomość ta jest w języku polskim.</br>\r\nJest ona podpowiedzią dla pozostałych wiadomości.', 'M');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `que`
--

CREATE TABLE `que` (
  `Id` int(11) NOT NULL,
  `que` text NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `que`
--

INSERT INTO `que` (`Id`, `que`, `ans`) VALUES
(1, 'Odpowiedź do tego zadania znajduje się w zakładce \"brute\", spróbuj się zalogować na konto user. Do tej operacji polecam wykorzystać bazę haseł, gdyż używane hasło jest jednym z najpopularniejszych. ', 'BrUt3F0rc3{\"Brut3_Zd0Byt3_Gr1Tulacj3\"}'),
(2, 'Odpowiedź do tego zadania znajduje się w zakładce \"SQL-Injection\", spróbuj za pomocą polecenia \"Union\" znaleźć ukrytą informację w tabeli \"secret\". ', 'SQL-INJ3cti0N{SQL-InJ_Zd0Byt3_Gr1tuL1cj3\"}'),
(3, 'Odpowiedź do tego zadania znajduje się w zakładce \"SQL-Injection Logowanie\", spróbuj za pomocą SQL Injection zalogować się do jednego z użytkowników. \"user, hack, johny, admin, czesio\". Nie musisz znać hasła użytkownika :-).', 'SQL-L0giN{\"Wyk0rzySTani3_sql-injecti0n_w_l0g0wAniu\"}'),
(4, 'Odpowiedź do tego zadania znajduje się w zakładce \"XSS-DOM\", spróbuj za pomocą języka JavaScript wykonać jakieś polecenie.', 'XSS-D0M{\"XSS-D0M_w_Pr1ktyc3_GratuLaCj3\"}'),
(5, 'Odpowiedź do tego zadania znajduje się w zakładce \"XSS-REF\", spróbuj za pomocą polecenia w formie JavaScript wykonać jakiś skrypt. ', 'XSS-RE3F{\"XSS-R3F_W_PrAkTyC3_Gr1TuL1cj3\"}'),
(6, 'Odpowiedź do tego zadania znajduje się w zakładce ,,XSS-STORED\'\', która przechowuje informacje w różnej formie. Spróbuj wprowadzić jakiś skrypt.', 'XSS-STOR3D{\"XSS-ST0r3d_W_WykORZystaNi3_Gr1TuL1cj3\"} '),
(7, 'Nasz wywiad doniósł o unikalnym identyfikatorze, rożni się on całkowicie od tych występujących na stronie najprawdopodobniej jest on zaszyfrowany. Spróbuj odczytać zaszyfrowaną wiadomość podaną poniżej.\r\nIdentyfikator: YWRtaW4xN2R2OTF3c2Yx', 'admin17dv91wsf1'),
(8, 'Zadanie to jest zależne od wcześniejszego dlatego najpierw rozszyfruj identyfikator administratora następnie wykorzystaj go w podatnym serwisie i podaj jaką informacje przechowywał admin.', 'Sesjon_D3c0dEr{Braw0_S3sj3_Admin1_Zd08yT1}');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `secret`
--

CREATE TABLE `secret` (
  `id` int(11) DEFAULT NULL,
  `secret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `secret`
--

INSERT INTO `secret` (`id`, `secret`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `usr`
--

CREATE TABLE `usr` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `result` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `usrs`
--

CREATE TABLE `usrs` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `id_que` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `usrs`
--

INSERT INTO `usrs` (`user_id`, `first_name`, `last_name`, `password`, `id_que`) VALUES
(1, 'user', 'user', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, 'Johny', 'Lewus', 'e99a18c428cb38d5f260853678922e03', 0),
(3, 'Hack', 'Me', '8d3533d75ae2c3966d7e0d4fcc69216b', 0),
(4, 'Admin', 'sql', '0d107d09f5bbe40cade3de5c71e9e9b7', 0),
(5, 'Czesio', 'Mucha', '5f4dcc3b5aa765d61d8327deb882cf99', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `nowa`
--
ALTER TABLE `nowa`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `que`
--
ALTER TABLE `que`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `usrs`
--
ALTER TABLE `usrs`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `nowa`
--
ALTER TABLE `nowa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `que`
--
ALTER TABLE `que`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `usr`
--
ALTER TABLE `usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
