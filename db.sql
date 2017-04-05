-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Kwi 2017, 17:07
-- Wersja serwera: 10.1.16-MariaDB
-- Wersja PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passcode` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `username`, `passcode`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `number` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`number`, `id`, `user`, `comment`) VALUES
(1, 7, 'test', 'test'),
(2, 1, 'test', ''),
(3, 1, 'test1', 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`) VALUES
(1, 'lol', '2017-01-10', '2017-01-10 12:55:50', '2017-01-10 12:55:50', 1),
(2, '1', '2017-03-01', '2017-01-10 13:10:32', '2017-01-10 13:10:32', 1),
(3, 'test', '2017-01-11', '2017-01-10 13:24:00', '2017-01-10 13:24:00', 1),
(4, '121', '2017-01-10', '2017-01-10 13:25:01', '2017-01-10 13:25:01', 1),
(5, 'test 2', '2017-01-27', '2017-01-10 13:43:54', '2017-01-10 13:43:54', 1),
(6, 'test3', '2017-01-09', '2017-01-10 14:11:58', '2017-01-10 14:11:58', 1),
(7, 'test4', '2017-01-25', '2017-01-10 14:12:15', '2017-01-10 14:12:15', 1),
(8, 'test', '2017-01-19', '2017-01-11 15:31:30', '2017-01-11 15:31:30', 1),
(9, 'test1', '2017-01-12', '2017-01-11 19:28:00', '2017-01-11 19:28:00', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `bodytext` varchar(2000) NOT NULL,
  `created` date NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `info`
--

INSERT INTO `info` (`id`, `title`, `bodytext`, `created`, `count`) VALUES
(1, 'Congratulations to the 2016 Hearthstone World Champion: Pavel!', '2016 saw the introduction of the Hearthstone Championship Tour, Standard format, and a much higher level of competition. We saw many familiar faces, long-time competitive players come into the limelight, and innovative fresh faces burst into the scene. Ultimately, Pavel managed to prepare and pilot his decks the best to navigate through the tough sea of competitors and be our 2016 Hearthstone World Champion!', '2017-01-04', 2),
(7, 'testowy post', 'test', '2017-04-05', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `title` varchar(150) DEFAULT NULL,
  `bodytext` text,
  `created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passcode` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `passcode`, `email`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(2, 'test2', '098f6bcd4621d373cade4e832627b4f6', 'kakaka1766@gmail.com'),
(3, 'dasasd', 'cd51db49dbbe2ff62f59efedc34d274f', 'test@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT dla tabeli `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
