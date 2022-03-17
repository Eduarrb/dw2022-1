-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2022 a las 02:10:08
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw2022_1`
--
CREATE DATABASE IF NOT EXISTS `dw2022_1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dw2022_1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

DROP TABLE IF EXISTS `actores`;
CREATE TABLE `actores` (
  `act_id` int(10) UNSIGNED NOT NULL,
  `act_nombres` varchar(100) NOT NULL,
  `act_apellidos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`act_id`, `act_nombres`, `act_apellidos`) VALUES
(1, 'Tom', 'Holland'),
(2, 'Zendaya', 'Colleman'),
(3, 'Keanu', 'Reeves'),
(4, 'Carrie-Anne', 'Moss'),
(5, 'Kate', 'Winslet'),
(6, 'Leonardo', 'DiCaprio'),
(7, 'Matthew', 'McConaughy'),
(8, 'Anne', 'Hathaway'),
(9, 'Sam', 'Worthington'),
(10, 'Zoe', 'Saldana'),
(11, 'Jack', 'Nicholson'),
(12, 'Shelley', 'Duvall');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

DROP TABLE IF EXISTS `directores`;
CREATE TABLE `directores` (
  `dire_id` int(10) UNSIGNED NOT NULL,
  `dire_nombres` varchar(50) NOT NULL,
  `dire_apellidos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`dire_id`, `dire_nombres`, `dire_apellidos`) VALUES
(1, 'Jon', 'Watts'),
(2, 'Lana', 'Wachowski'),
(3, 'James', 'Cameron'),
(4, 'Christopher', 'Nolan'),
(5, 'John', 'McTiernan'),
(6, 'Stanley', 'Kubrick'),
(7, 'Ridley', 'Scott'),
(8, 'Ron', 'Howard'),
(9, 'Steven', 'Spilberg'),
(10, 'Quentin', 'Tarantino'),
(11, 'Night', 'Shamalan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE `peliculas` (
  `peli_id` int(10) UNSIGNED NOT NULL,
  `peli_nombre` varchar(255) NOT NULL,
  `peli_genero` varchar(100) NOT NULL,
  `peli_estreno` date NOT NULL,
  `peli_restricciones` varchar(10) DEFAULT NULL,
  `peli_dire_id` int(11) DEFAULT NULL,
  `peli_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`peli_id`, `peli_nombre`, `peli_genero`, `peli_estreno`, `peli_restricciones`, `peli_dire_id`, `peli_img`) VALUES
(1, 'Spiderman: No way home', 'Ciencia Ficción', '2021-12-24', 'PG-18', 1, 'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2021/11/nuevo-cartel-spider-man-no-way-home-2543759.jpg?itok=niBRaHkU'),
(2, 'Matrix', 'Ciencia Ficción', '1999-12-24', 'PG-13', 2, NULL),
(3, 'El Código Enigma', 'Bélica', '2017-08-29', 'PG-16', NULL, NULL),
(4, 'Titanic', 'Drama romántico', '1997-07-07', 'PG-13', 3, NULL),
(5, 'Interestellar', 'Ciencia Ficción', '2014-10-10', 'PG-13', 4, NULL),
(6, 'Depredador', 'Ciencia Ficción', '1987-12-24', 'PG-16', 5, NULL),
(7, 'Avatar', 'Ciencia Ficción', '2009-10-18', 'PG', 3, NULL),
(8, 'El Resplandor', 'Terror', '1980-10-19', 'PG-13', 6, NULL),
(9, 'Alien: El octavo pasajero', 'Ciencia Ficción', '1980-01-12', 'PG-18', 7, NULL),
(10, 'Batman', 'ciencia ficción', '2022-03-05', 'PG-16', NULL, NULL),
(11, 'Inception', 'Ciencia Ficción', '2020-10-14', 'PG-13', 4, 'https://upload.wikimedia.org/wikipedia/en/2/2e/Inception_%282010%29_theatrical_poster.jpg'),
(14, 'Pelicula 2', 'Drama', '2022-03-13', 'PG_18', 7, 'https://images.squarespace-cdn.com/content/v1/581bd18003596e16cc905cad/1634771294812-DP2F5LLN28KUI8PNBW8P/Scream-2022-Poster-New.jpeg'),
(15, 'Pelicula 3', 'Horror', '2022-03-14', 'PG-12', 2, 'https://cdn.apis.cineplanet.cl/CDN/media/entity/get/FilmPosterGraphic/HO00000745?referenceScheme=HeadOffice&allowPlaceHolder=true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `per_id` int(10) UNSIGNED NOT NULL,
  `per_nombres` varchar(50) NOT NULL,
  `per_apellidos` varchar(50) NOT NULL,
  `per_fecha_nac` date DEFAULT NULL,
  `per_dni` char(8) NOT NULL,
  `per_genero` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`per_id`, `per_nombres`, `per_apellidos`, `per_fecha_nac`, `per_dni`, `per_genero`) VALUES
(1, 'Sofia', 'Melendez', '1999-10-01', '11111111', 'F'),
(2, 'Malena', 'Ruiz', '1970-01-01', '22222222', 'F'),
(3, 'Pedro', 'Casas', '1980-10-10', '33333333', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

DROP TABLE IF EXISTS `personajes`;
CREATE TABLE `personajes` (
  `per_act_id` int(11) NOT NULL,
  `per_peli_id` int(11) NOT NULL,
  `per_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`per_act_id`, `per_peli_id`, `per_nombre`) VALUES
(1, 1, 'Spiderman'),
(2, 1, 'MJ'),
(3, 2, 'Neo'),
(4, 2, 'Trinity'),
(5, 4, 'Rose'),
(6, 4, 'Jack'),
(7, 5, 'Joseph Cooper'),
(8, 5, 'Amalia Brand'),
(9, 7, 'Jake Zully');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`act_id`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`dire_id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`peli_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`per_id`),
  ADD UNIQUE KEY `per_dni` (`per_dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `act_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `dire_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `peli_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `per_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
