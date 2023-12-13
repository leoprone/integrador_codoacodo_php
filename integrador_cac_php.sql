-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2023 a las 03:54:11
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
-- Base de datos: `integrador_cac_php`
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
  `categoria` varchar(50) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oradores`
--

INSERT INTO `oradores` (`id_orador`, `nombre`, `apellido`, `email`, `categoria`, `tema`, `fecha_alta`, `imagen`) VALUES
(12, 'Alejandro', 'Amor', 'aleamor@gmail.com', '', 'QuÃ© esperar de Javascript para 2024?', '2023-12-10 21:36:02', '1702254962_alejandro.jpg'),
(13, 'Susana', 'Delgado', 'susanadelgado@gmail.com', '', 'Utilidades de PHP', '2023-12-10 22:22:03', '1702328014_susana-delgado.png'),
(14, 'Leonardo', 'Prone', 'leoprone@gmail.com', '', 'PHP 8 - ventajas', '2023-12-11 17:57:23', '1702328632_leonardo.png'),
(15, 'Steve ', 'Jobs', 'stevejobs@gmail.com', '', 'El futuro de Javascript', '2023-12-11 17:58:32', '1702328312_steve.jpg'),
(16, 'Oscar', 'PÃ©rez', 'oscarperez@gmail.com', '', 'Api en PHP', '2023-12-11 18:01:44', '1702328504_oscar.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `admin`) VALUES
(5, 'usu11', '$2y$12$DbVIz7Q/l/YjMa6m0m1NDO/qFGe/QH7IWXUPjbUkbOLBTST1nBsxu', 's'),
(6, 'usu1', '$2y$12$logvBBOI26BvW2ce.izG5eKlKXrHuwC7AmcaDn2CeGmpA7FLrrCAC', 's'),
(9, 'usu12', '$2y$12$XNxWjL8E6y6vqc1wq.j6A.QJs.0q2R71W1fidbAAnBOVZa.e2q7SS', NULL),
(10, 'usu13', '$2y$12$c6UCoAgH9IqxuJvLFjYU0.MI0nPlO42idyVw621/mu5S.tKSR1LLm', 's');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `oradores`
--
ALTER TABLE `oradores`
  ADD PRIMARY KEY (`id_orador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `oradores`
--
ALTER TABLE `oradores`
  MODIFY `id_orador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
