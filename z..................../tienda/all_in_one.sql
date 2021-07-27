-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2020 a las 17:30:03
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `all_in_one`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Admin`
--

CREATE TABLE `Admin` (
  `id` bigint(20) NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `apellido` text COLLATE utf8_unicode_ci NOT NULL,
  `correo` text COLLATE utf8_unicode_ci NOT NULL,
  `codigo` text COLLATE utf8_unicode_ci NOT NULL,
  `rol` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Admin`
--

INSERT INTO `Admin` (`id`, `nombre`, `apellido`, `correo`, `codigo`, `rol`) VALUES
(1, 'Neury Eleasar', 'Aguasvivas Lorenzo', 'eleasar0991@gmail.com', 'admin', 'Propietario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulos`
--

CREATE TABLE `Articulos` (
  `id` bigint(20) NOT NULL,
  `categoria` text COLLATE utf8_unicode_ci NOT NULL,
  `subCategoria` text COLLATE utf8_unicode_ci NOT NULL,
  `marca` text COLLATE utf8_unicode_ci NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `color` text COLLATE utf8_unicode_ci NOT NULL,
  `talla` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `costo` decimal(65,2) NOT NULL,
  `cantidad` bigint(20) NOT NULL,
  `precio` decimal(65,2) NOT NULL,
  `imagen` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Articulos`
--

INSERT INTO `Articulos` (`id`, `categoria`, `subCategoria`, `marca`, `nombre`, `color`, `talla`, `descripcion`, `costo`, `cantidad`, `precio`, `imagen`) VALUES
(1, 'Femenido', 'Mujer', 'Levi\'s', 'Selección mujer uno', 'Azul', 'Grande', 'Descripción', '1400.00', 23, '1750.00', 'Femenino-mujer-1.jpg'),
(2, 'Femenido', 'Mujer', 'Levi\'s', 'Selección mujer dos', 'Azul', 'Grande', 'Descripción', '1400.00', 20, '1750.00', 'Femenino-mujer-2.jpg'),
(3, 'Masculino', 'Hombre', 'APC', 'Selección hombre uno', 'Azul', 'Grande', 'Descripción', '535.00', 45, '668.75', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(4, '', '', '', 'Selección hombre uno', '', '', 'Descripción', '535.00', 45, '668.75', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(5, '', '', '', 'Selección hombre uno', '', '', 'Descripción', '535.00', 45, '668.75', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(6, '', '', '', 'Selección hombre uno', '', '', 'Descripción', '535.00', 45, '668.75', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(7, '', '', '', 'Selección hombre uno', '', '', 'Descripción', '535.00', 45, '668.75', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(8, '', '', '', 'Selección hombre uno', '', '', 'Descripción', '535.00', 45, '668.75', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(9, '', '', '', 'Selección hombre uno', '', '', 'Descripción', '535.00', 45, '668.75', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(10, '', '', '', 'Selección hombre uno', '', '', 'Descripción', '535.00', 45, '668.75', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(11, '', '', '', 'Selección hombre uno', '', '', 'Descripción', '535.00', 45, '668.75', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(12, '', '', '', 'Selección hombre uno', '', '', 'Descripción', '535.00', 45, '668.75', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(13, 'Masculino', 'Hombre', 'Prada', 'Selección hombre uno', 'Negro', 'Mediana', 'Descripción', '535.00', 45, '668.75', 'pikwizard-1cc72f22aa8eae0c4472e4e4cfac406e.jpg'),
(14, 'Masculino', 'Hombre', 'Prada', 'fsfsf', 'Azul', 'Mediana', '', '5345.00', 45, '6681.25', 'pikwizard-8b429d3ef4bcb6b8afba000a259ed318.jpg'),
(15, 'Masculino', 'Hombre', 'APC', 'uykyk', 'Azul', 'Small', 'hfh', '6757.00', 7657, '8446.25', 'pikwizard-0399630b04d44c5c3bc9ebb9e77e1d75.jpg'),
(16, 'Masculino', 'Chico', 'Tom Ford', 'oñ', 'Negro', 'Small', '', '98.00', 98, '122.50', 'pikwizard-d296a762f780cbc86eda704a848f30d3.jpg'),
(17, 'Masculino', 'Hombre', 'APC', 'fsdfs', 'Negro', 'Small', '', '453.00', 543, '566.25', 'pikwizard-97ac533815e69dee15c56b5b3637da03.jpg'),
(18, 'Masculino', 'Hombre', 'APC', 'fsdfs', 'Azul', 'Small', '', '453.00', 543, '566.25', 'pikwizard-97ac533815e69dee15c56b5b3637da03.jpg'),
(19, 'Masculino', 'Hombre', 'APC', 'fsfsf', 'Azul', 'Small', '', '453.00', 543, '566.25', 'pikwizard-ed7126dcb16b79c73a1364ab0590d55e.jpg'),
(20, 'Masculino', 'Hombre', 'APC', 'fsdf', 'Negro', 'Small', '', '54.00', 5, '67.50', 'pikwizard-be7daf4888e17830c0106cac62372abd.jpg'),
(21, 'Masculino', 'Chico', 'Acne Studios', 'kpḱp', 'Negro', 'Mediana', 'ḱlñklñ', '56.00', 2, '70.00', 'Femenino-mujer-2.jpg'),
(22, 'Masculino', 'Hombre', 'AG Jeans', 'zapato seleccion uno', 'Blanco', 'Mediana', 'De lana refinada', '3000.00', 10, '3750.00', 'zapato-1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Boletines`
--

CREATE TABLE `Boletines` (
  `id` bigint(20) NOT NULL,
  `suscriptor` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Suscriptores`
--

CREATE TABLE `Suscriptores` (
  `id` bigint(20) NOT NULL,
  `suscriptor` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Articulos`
--
ALTER TABLE `Articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Boletines`
--
ALTER TABLE `Boletines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suscriptor` (`suscriptor`) USING HASH;

--
-- Indices de la tabla `Suscriptores`
--
ALTER TABLE `Suscriptores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suscriptor` (`suscriptor`) USING HASH;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Articulos`
--
ALTER TABLE `Articulos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `Boletines`
--
ALTER TABLE `Boletines`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Suscriptores`
--
ALTER TABLE `Suscriptores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
