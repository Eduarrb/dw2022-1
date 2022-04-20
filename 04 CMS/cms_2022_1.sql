-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2022 a las 03:26:30
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
-- Base de datos: `cms_2022_1`
--
CREATE DATABASE IF NOT EXISTS `cms_2022_1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cms_2022_1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nombre`) VALUES
(1, 'PHP'),
(2, 'HTML5'),
(3, 'PYTHON'),
(4, 'MYSQL'),
(15, 'JavaScript');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
CREATE TABLE `publicaciones` (
  `pub_id` int(10) UNSIGNED NOT NULL,
  `pub_cat_id` int(11) NOT NULL,
  `pub_user_id` int(11) NOT NULL,
  `pub_titulo` varchar(255) NOT NULL,
  `pub_resumen` text NOT NULL,
  `pub_contenido` text NOT NULL,
  `pub_fecha` date NOT NULL,
  `pub_img` text NOT NULL,
  `pub_vistas` int(11) DEFAULT 0,
  `pub_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`pub_id`, `pub_cat_id`, `pub_user_id`, `pub_titulo`, `pub_resumen`, `pub_contenido`, `pub_fecha`, `pub_img`, `pub_vistas`, `pub_status`) VALUES
(9, 15, 5, 'Curso de Javascript', 'resumen', 'contenido', '2022-01-01', '02.png', 1, 'publicado'),
(10, 1, 6, 'Curso de PHP', 'resumen', 'contenido', '2022-04-12', '01.png', 2, 'publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_nombres` varchar(255) NOT NULL,
  `user_apellidos` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_img` text DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_token` text DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT 0,
  `user_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_nombres`, `user_apellidos`, `user_email`, `user_img`, `user_pass`, `user_token`, `user_status`, `user_rol`) VALUES
(2, 'ana', 'jimenez', 'ana@gmail.com', NULL, '$2y$12$t87Wj7n7x68F0cECZLGyReotXV/.mysap6WoJZ3l/0txU4sU55Ahq', 'c20e473714c07ad001b7888ccfc17917', 0, 'suscriptor'),
(4, 'Jaimito', 'Castañeda', 'jaimito@gmail.com', NULL, '$2y$12$3MV84J1bnFJcsi8xd5xv6O/r.2EU4gwVB9tpER5GExgj1m9WOg4j2', '', 0, 'suscriptor'),
(5, 'Pedro', 'Ore', 'pedro@gmail.com', NULL, '$2y$12$Bc2yS2l929UuimBMz5H94.tbH2tpZzOBd.usZmxyDVDywdvQTzduK', '', 1, 'admin'),
(6, 'Eduardo', 'Arroyo', 'eduardo@gmail.com', NULL, '$2y$12$30Rl4ssS5y3roPZ1aj7stuBpZ7o4EkIIxa7WwotLUlgklUFMkLPwG', 'f186d0ac765e3e90b9c6a0b1f4898784', 1, 'god'),
(7, 'Sofia', 'Casas', 'sofia@gmail.com', NULL, '$2y$12$ESN.4Y8M5aLrTFIHNpL43.2r1yBjgalPyfvWQ9gUh6amxG.NWcOLu', '', 0, 'suscriptor'),
(8, 'Marcos', 'Gonzales', 'marcos@hotmail.com', NULL, '$2y$12$1G9EE7M11KWnPTJxbLm.MOGMbw0zV6DZ/JEFneZvpVnfmBWRJDagC', '', 1, 'suscriptor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `pub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
