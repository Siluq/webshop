-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 mrt 2020 om 11:11
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `admin_password`) VALUES
(3, 'Admin', '$2y$08$noY0Q0zxHt7w9r67c.wqaODQFjfxhFdHTZxpEAffGK7VEYVfeqc26'),
(8, 'samboesjes', '$2y$08$4VXDpWIdKr4rAWq.dvHr8O5pqVTjHb0KgPCnizaUxyfxhGW1Y/4YW'),
(21, 'Test', '$2y$08$pOzfCq7ZmKLqQw5Q9uK47u4wOOU168U771Ok4nWg94x7D9EiYY4iK'),
(23, 'Hey', '$2y$08$sOd5/TElj5vOMS9QYZ6GTuBgv/LEFcO11aZyzjh3AhZFROOQlmLmu');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `active`) VALUES
(1, 'tafellamp', 'Tafellampen zijn binnenlampen voor op tafel.', 1),
(2, 'buitenlamp', 'buitenlamp zijn lampen voor buiten.', 1),
(3, 'designlamp', 'designlampen zijn lampen die wat specialer zijn.', 1),
(4, 'bureaulamp', 'bureaulampen zijn lampen voor op je bureau.', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `houseNumber` varchar(255) NOT NULL,
  `houseNumber_addon` varchar(255) NOT NULL,
  `zipCode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `newsletter_subscription` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `customer`
--

INSERT INTO `customer` (`id`, `gender`, `firstName`, `middleName`, `lastName`, `street`, `houseNumber`, `houseNumber_addon`, `zipCode`, `city`, `phone`, `email`, `password`, `newsletter_subscription`) VALUES
(1, 'Male', 'Jan', 'Hendrik', 'Hertog', 'Bierlaan', '1', 'c', '1919HJ', 'Utrecht', '0623234565', 'hertog@jan.nl', 'BierLife22', 1),
(2, 'Male', 'Gerit', '', 'Bos', 'Boslaan', '35', '', '3941QL', 'Doorn', '0623239595', 'Gerit.boes@gmail.com', 'Paddo59', 0),
(3, 'woman', 'Chantal', '', 'Breed', 'Vruchtengaard', '22', 'a', '3941HD', 'Doorn', '0674639595', 'Cbreed@gmail.com', 'B0sb3s', 1),
(4, 'woman', 'Marilyn', 'Van der', 'Gaag', 'Paardebloem', '56', '', '3762LW', 'Kampen', '0692644595', 'Mvdgaag@gmail.com', 'H3artB3at', 0),
(5, 'Male', 'Joop', 'Hendrik', 'Boesjes', 'Notengaard', '18', '', '3941LW', 'Doorn', '0644290066', 'HendrikB@gmail.com', 'Koopies283', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `category_id`, `price`, `color`, `weight`, `active`) VALUES
(1, 'Arstid', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmat', 1, '39.95', 'wit', '300', 1),
(2, 'buitenlamp', 'Deze buitenlamp is pervect voor bij uw voordeur.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid ', 2, '49.95', 'zwart', '950', 1),
(3, 'gans-lamp', 'Deze lamp is echt iets voor jou als je even wat geks wil of van ganzen houd.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en j', 3, '69.95', 'blauw', '600', 1),
(4, 'giraf-lamp', 'Deze lamp is echt iets voor jou als je even wat geks wil of van giraffen houd.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en', 3, '69.95', 'wit en zwart', '600', 1),
(5, 'hektar', 'Dit is een prachtige lamp die je makkelijk kan verstellen.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en', 4, '59.95', 'grijs', '1000', 1),
(6, 'jesse', 'Dit is een mooi designlamp lamp om naast een bank neer te zetten.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelij', 3, '69.95', 'zwart', '600', 1),
(7, 'lampje', 'Dit is een grappige lamp voor in huis.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt', 3, '49.95', 'zwart', '350', 1),
(8, 'llahra', 'Een mooie lamp voor naast een bank.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n', 3, '69.95', 'zwart', '700', 1),
(9, 'struisvogel-lamp', 'De struisvogel lamp is weer eens wat lekkers gek.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid', 3, '69.95', 'goud', '500', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `active`) VALUES
(1, 1, 'arstid.jpg', 1),
(2, 2, 'buitenlamp.jpg, buitenlamp2.jpg', 1),
(3, 3, 'gans.jpg', 1),
(4, 4, 'giraf.jpg, giraf2.jpg', 1),
(5, 5, 'hektar.jpg', 1),
(6, 6, 'jesse.jpg', 1),
(7, 7, 'lampje.jpg', 1),
(8, 8, 'llahra.jpg', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstName`, `middleName`, `lastName`, `birthDate`, `email`, `user_password`) VALUES
(2, 'Thomas', 'Tinus', 'Tijs', '1980-02-04', 'tthijs@glu.nl', '12345'),
(11, 'Sam', '', 'Boesjes', '0000-00-00', 'Sam.boesjes@gmail.com', '$2y$08$0Bvi8b73nVeOMhNyndmjTuo4BW82PGxCfDJGdw2dgpazktj3oXS22'),
(12, 'Mark', '', 'fredriksz', '0000-00-00', 'Mark.frediksz@gmail.com', '$2y$08$i8ac8nPmy8ma87ck3hQHBuE3kBOLWrGkNNIfT0WJDJF6ooXvSit6W');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
