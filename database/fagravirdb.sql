-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: mysql.omega:3306
-- Létrehozás ideje: 2025. Jan 07. 19:04
-- Kiszolgáló verziója: 5.7.42-log
-- PHP verzió: 7.2.34-54+0~20241224.101+debian12~1.gbpb6068e

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `fagravirdb`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `aru`
--

CREATE TABLE `aru` (
  `id` int(11) NOT NULL,
  `nev` varchar(40) NOT NULL,
  `leiras` varchar(300) NOT NULL,
  `kategoriaid` int(11) NOT NULL,
  `kep` mediumblob NOT NULL,
  `keptipus` varchar(25) NOT NULL,
  `ar` int(11) NOT NULL,
  `elerheto` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nev` varchar(40) NOT NULL,
  `jelszo` varchar(40) NOT NULL,
  `jog` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `email`, `nev`, `jelszo`, `jog`) VALUES
(1, 'kristofpruskoczki@gmail.com', 'Prusko', 'f10e2821bbbea527ea02200352313bc059445190', 1),
(2, 'balazs7c@gmail.com', 'kristof209', 'f10e2821bbbea527ea02200352313bc059445190', 0),
(3, 'elek@gmail.com', 'Elek', 'f10e2821bbbea527ea02200352313bc059445190', 0),
(4, 'asda@gmail.com', 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 1),
(5, 'prusi@gmail.com', 'prusi207', 'f10e2821bbbea527ea02200352313bc059445190', 0),
(6, 'kristofpruskoczki2@gmail.com', 'prusi209', 'f10e2821bbbea527ea02200352313bc059445190', 1),
(7, 'kristofpruskoczki4@gmail.com', 'kristof207', 'f10e2821bbbea527ea02200352313bc059445190', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `megnevezes` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `kategoria`
--

INSERT INTO `kategoria` (`id`, `megnevezes`) VALUES
(1, 'Karácsony'),
(3, 'Húsvét'),
(4, 'Újév'),
(7, 'Születésnap'),
(9, 'Nőnap'),
(11, 'Névnap'),
(17, 'ajándék');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE `rendeles` (
  `id` int(11) NOT NULL,
  `rendid` int(11) NOT NULL,
  `aruid` int(11) NOT NULL,
  `db` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelesek`
--

CREATE TABLE `rendelesek` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nev` varchar(40) NOT NULL,
  `cim` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telszam` varchar(15) NOT NULL,
  `szallitas` tinyint(4) NOT NULL,
  `osszeg` int(11) NOT NULL,
  `allapot` tinyint(4) NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `velemeny`
--

CREATE TABLE `velemeny` (
  `id` int(11) NOT NULL,
  `termekid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `velemeny` varchar(200) NOT NULL,
  `csillag` tinyint(5) NOT NULL,
  `ido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `aru`
--
ALTER TABLE `aru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoriaid` (`kategoriaid`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD KEY `nev` (`nev`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rendid` (`rendid`),
  ADD KEY `aruid` (`aruid`);

--
-- A tábla indexei `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- A tábla indexei `velemeny`
--
ALTER TABLE `velemeny`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termekid` (`termekid`),
  ADD KEY `userid` (`userid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `aru`
--
ALTER TABLE `aru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT a táblához `rendelesek`
--
ALTER TABLE `rendelesek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT a táblához `velemeny`
--
ALTER TABLE `velemeny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `aru`
--
ALTER TABLE `aru`
  ADD CONSTRAINT `aru_ibfk_1` FOREIGN KEY (`kategoriaid`) REFERENCES `kategoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `rendeles_ibfk_1` FOREIGN KEY (`rendid`) REFERENCES `rendelesek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rendeles_ibfk_2` FOREIGN KEY (`aruid`) REFERENCES `aru` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD CONSTRAINT `rendelesek_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `felhasznalok` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `velemeny`
--
ALTER TABLE `velemeny`
  ADD CONSTRAINT `velemeny_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `felhasznalok` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `velemeny_ibfk_3` FOREIGN KEY (`termekid`) REFERENCES `aru` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
