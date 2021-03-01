-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2021 a las 21:05:12
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `paises`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

/*CREATE TABLE `estados` (
  `id` bigint(20) NOT NULL,
  `id_pais` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;*/

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `id_pais`, `nombre`) VALUES
(1, 1, 'Antioquia'),
(2, 1, 'Atlantico'),
(3, 1, 'D. C. Santa Fe de Bogotá'),
(4, 1, 'Bolivar'),
(5, 1, 'Boyaca'),
(6, 1, 'Caldas'),
(7, 1, 'Caqueta'),
(8, 1, 'Cauca'),
(9, 1, 'Cesar'),
(10, 1, 'Cordova'),
(11, 1, 'Cundinamarca'),
(12, 1, 'Choco'),
(13, 1, 'Huila'),
(14, 1, 'La Guajira'),
(15, 1, 'Magdalena'),
(16, 1, 'Meta'),
(17, 1, 'Nariño'),
(18, 1, 'Norte de Santander'),
(19, 1, 'Quindio'),
(20, 1, 'Risaralda'),
(21, 1, 'Santander'),
(22, 1, 'Sucre'),
(23, 1, 'Tolima'),
(24, 1, 'Valle'),
(25, 1, 'Arauca'),
(26, 1, 'Casanare'),
(27, 1, 'Putumayo'),
(28, 1, 'San Andres'),
(29, 1, 'Amazonas'),
(30, 1, 'Guainia'),
(31, 1, 'Guaviare'),
(32, 1, 'Vaupes'),
(33, 1, 'Vichada'),
(34, 2, 'Amazonas'),
(35, 2, 'Anzoátegui'),
(36, 2, 'Apure'),
(37, 2, 'Aragua'),
(38, 2, 'Barinas'),
(39, 2, 'Bolívar'),
(40, 2, 'Carabobo'),
(41, 2, 'Cojedes'),
(42, 2, 'Delta Amacuro'),
(43, 2, 'Falcón'),
(44, 2, 'Guárico'),
(45, 2, 'Lara'),
(46, 2, 'Mérida'),
(47, 2, 'Miranda'),
(48, 2, 'Monagas'),
(49, 2, 'Nueva Esparta'),
(50, 2, 'Portuguesa'),
(51, 2, 'Sucre'),
(52, 2, 'Táchira'),
(53, 2, 'Trujillo'),
(54, 2, 'Vargas'),
(55, 2, 'Yaracuy'),
(56, 2, 'Zulia'),
(57, 2, 'Distrito Capital'),
(58, 2, 'Dependencias Federales');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
/*ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estados_id_pais_foreign` (`id_pais`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `estados_id_pais_foreign` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id`);
COMMIT;*/

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
