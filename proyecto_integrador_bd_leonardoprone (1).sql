-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 21:10:33
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_integrador_bd_leonardoprone`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oradores`
--

CREATE TABLE `oradores` (
  `id_orador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oradores`
--

INSERT INTO `oradores` (`id_orador`, `nombre`, `apellido`, `email`, `tema`, `fecha_alta`) VALUES
(1, 'Steve ', 'Jobs', 'stevejobs@gmail.com', 'tema 1', '2023-11-13 16:54:38'),
(2, 'Bill', 'Gates', 'bgates@gmail.com', 'javascript', '2023-11-13 16:54:38'),
(3, 'Ada', 'Lovelace', 'adalovelace@gmail.com', 'Java', '2023-11-13 16:54:38'),
(4, 'Pedro', 'Suarez', 'pedrosuarez@gmail.com', 'microsoft domain', '2023-11-13 16:54:38'),
(5, 'Jorgelina ', 'Lopez', 'jorlopez@gmail.com', 'la programación real', '2023-11-13 16:54:38'),
(6, 'Juan', 'Perez', 'juanperez@gmail.com', 'el futuro de Javascript', '2023-11-13 16:54:38'),
(7, 'Marilina', 'Becar', 'mbecar@gmail.com', 'Presente y futuro de Cobol', '2023-11-13 16:54:38'),
(8, 'Mariano', 'Fernandez', 'marianofernandez@gmail.com', 'Principios de programación', '2023-11-13 16:54:38'),
(9, 'Carolina', 'Mejo', 'camejo@gmail.com', 'Aprender PHP', '2023-11-13 16:54:38'),
(10, 'Miguel', 'Trujo', 'mtrujo@gmail.com', 'Node.js y sus ventajas', '2023-11-13 16:54:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `oradores`
--
ALTER TABLE `oradores`
  ADD PRIMARY KEY (`id_orador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `oradores`
--
ALTER TABLE `oradores`
  MODIFY `id_orador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
