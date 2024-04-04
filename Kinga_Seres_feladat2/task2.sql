-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Ápr 03. 22:12
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `task2`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `task2_login_failure`
--

CREATE TABLE `task2_login_failure` (
  `id_login_failure` int(11) NOT NULL,
  `username` varchar(140) NOT NULL,
  `password` varchar(140) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `task2_login_failure`
--

INSERT INTO `task2_login_failure` (`id_login_failure`, `username`, `password`, `date_time`) VALUES
(4, 'Debi', '$2y$10$xg7qTGnaNVl72Ksx0KbXpucxX9uMzmqj5no6bTxwdbCGzt8/SgVh6', '2024-04-03 19:50:11'),
(5, 'animegirl', '$2y$10$hINV5SfX6apmXpXciF9AuedqSBF3a2BCwbN4GYtadSVSkMgxF1.qK', '2024-04-03 19:54:54'),
(6, 'Ricsi', '$2y$10$L7t.da9enHvFG5otTSyL7etseBjcbjHUf6tnleFBAXlhLHTQ/h.iG', '2024-04-03 19:55:04'),
(7, 'Kati', '$2y$10$opE5UBlFlOGMiXDJtHdZr.7nh0xp79eWkymQkDcFu1jYjhFfRPYPm', '2024-04-03 20:11:45');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `task2_users`
--

CREATE TABLE `task2_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(140) NOT NULL,
  `password` varchar(140) NOT NULL,
  `name` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `task2_users`
--

INSERT INTO `task2_users` (`id_user`, `username`, `password`, `name`) VALUES
(1, 'Kinga', 'francia', 'kinga');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `task2_login_failure`
--
ALTER TABLE `task2_login_failure`
  ADD PRIMARY KEY (`id_login_failure`);

--
-- A tábla indexei `task2_users`
--
ALTER TABLE `task2_users`
  ADD PRIMARY KEY (`id_user`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `task2_login_failure`
--
ALTER TABLE `task2_login_failure`
  MODIFY `id_login_failure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `task2_users`
--
ALTER TABLE `task2_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
