-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Úpraveno: 5. 11. 2020, 10:40
-- Verze serveru: 10.1.9-MariaDB
-- Verze PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `vydap_projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `mistnosti`
--

CREATE TABLE `classes` (
  `id` varchar(5) COLLATE utf8_czech_ci NOT NULL,
  `desc` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `capacity` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `pedagogove`
--

CREATE TABLE `teachers` (
  `login` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  `fname` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `degreeBefore` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `degreeAfter` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


-- --------------------------------------------------------

--
-- Struktura tabulky `pedagogove_predmety`
--

CREATE TABLE `teachers2courses` (
  `login_teacher` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  `id_course` varchar(5) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `predmety`
--

CREATE TABLE `courses` (
  `id` varchar(5) COLLATE utf8_czech_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `credits` smallint(6) NOT NULL,
  `lecture` smallint(6) NOT NULL,
  `practice` smallint(6) NOT NULL,
  `examType` varchar(2) COLLATE utf8_czech_ci NOT NULL,
  `anotation` text COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `studenti`
--

CREATE TABLE `students` (
  `login` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  `fname` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `studenti_predmety`
--

CREATE TABLE `students2courses` (
  `login_student` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  `id_course` varchar(5) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `vypsane_terminy`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `id_class` varchar(5) COLLATE utf8_czech_ci NOT NULL,
  `login_teacher` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  `id_course` varchar(5) COLLATE utf8_czech_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `capacity` smallint(6) NOT NULL,
  `note` varchar(200) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


-- --------------------------------------------------------

--
-- Struktura tabulky `vysledky`
--

CREATE TABLE `results` (
  `id` smallint(6) NOT NULL,
  `desc` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `type` varchar(2) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `zapsane_terminy`
--

CREATE TABLE `students2exams` (
  `id_exam` int(11) NOT NULL,
  `login_student` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  `id_result` smallint(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `mistnosti`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `pedagogove`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`login`);

--
-- Klíče pro tabulku `pedagogove_predmety`
--
ALTER TABLE `teachers2courses`
  ADD PRIMARY KEY (`login_teacher`,`id_course`),
  ADD KEY `id_course` (`id_course`);

--
-- Klíče pro tabulku `predmety`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `studenti`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`login`);

--
-- Klíče pro tabulku `studenti_predmety`
--
ALTER TABLE `students2courses`
  ADD PRIMARY KEY (`login_student`,`id_course`),
  ADD KEY `id_course` (`id_course`);

--
-- Klíče pro tabulku `vypsane_terminy`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`id_class`,`login_teacher`,`id_course`,`date`,`capacity`,`note`),
  ADD KEY `id_class` (`id_class`),
  ADD KEY `id_course` (`id_course`),
  ADD KEY `login_teacher` (`login_teacher`);

--
-- Klíče pro tabulku `vysledky`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `zapsane_terminy`
--
ALTER TABLE `students2exams`
  ADD PRIMARY KEY (`id_exam`,`login_student`),
  ADD KEY `login_student` (`login_student`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `vypsane_terminy`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `pedagogove_predmety`
--
ALTER TABLE `teachers2courses`
  ADD CONSTRAINT `teachers2courses_ibfk_1` FOREIGN KEY (`login_teacher`) REFERENCES `teachers` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers2courses_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `studenti_predmety`
--
ALTER TABLE `students2courses`
  ADD CONSTRAINT `students2courses_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students2courses_ibfk_2` FOREIGN KEY (`login_student`) REFERENCES `students` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `vypsane_terminy`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`login_teacher`) REFERENCES `teachers` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_ibfk_3` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `zapsane_terminy`
--
ALTER TABLE `students2exams`
  ADD CONSTRAINT `students2exams_ibfk_1` FOREIGN KEY (`login_student`) REFERENCES `students` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students2exams_ibfk_2` FOREIGN KEY (`id_exam`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
