-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2025 a las 02:24:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agencia_viajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `viaje_id` int(11) NOT NULL,
  `numero_asiento` int(11) NOT NULL,
  `comentarios` text DEFAULT NULL,
  `acepta_terminos` tinyint(1) NOT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_regreso` date NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `cuenta` varchar(30) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `usuario_id`, `viaje_id`, `numero_asiento`, `comentarios`, `acepta_terminos`, `fecha_reserva`, `nombre`, `apellido`, `telefono`, `email`, `destino`, `fecha_salida`, `fecha_regreso`, `metodo_pago`, `cuenta`, `contrasena`) VALUES
(6, 1, 9, 1, '0', 1, '2024-12-08 04:39:21', 'Nicolás', 'Soriano', '3187501493', 'nicolas@example.com', 'Nueva York, Estados Unidos', '2025-09-01', '2025-09-10', 'davivienda', '25467834902', '$2y$10$jBpQ5HnkEpTw3UwptBlB0eVrPxSp9t5QxG2mdmJErW.Kn49xIkX/O'),
(7, 3, 9, 2, '0', 1, '2024-12-08 04:44:41', 'Reinaldo', 'Soriano', '3177476902', 'reinaldo@example.com', 'Nueva York, Estados Unidos', '2025-09-01', '2025-09-10', 'davivienda', '32680053246', '$2y$10$1ez58SlX32XgsKlPcKbMdOj5DZ.IgamZh1BDzuftTJ8j6Y57Xoy1m'),
(8, 3, 9, 2, '0', 1, '2024-12-08 04:45:51', 'Reinaldo', 'Soriano', '3177476902', 'reinaldo@example.com', 'Nueva York, Estados Unidos', '2025-09-01', '2025-09-10', 'bbva', '32680053246', '$2y$10$0xXlNJeVXaEPljt6SqDWR.hwPG3f1miWBJJ7Qyf7amMb5oGLHQVc.'),
(9, 7, 9, 2, '0', 1, '2024-12-08 23:22:19', 'Laura', 'Polania', '3187468903', 'laura@example.com', 'Nueva York, Estados Unidos', '2025-09-01', '2025-09-10', 'bancoagrario', '32680053246', '$2y$10$DSw4Qt1E8zeAA.qtZmbrcOi6kIv2r3rr6J/wZZMMy1NniiDZ94jRK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `email`, `password`, `rol`, `fecha_creacion`) VALUES
(1, 'Nicolás', 'Soriano Polania ', '3187501493', 'nicolas@example.com', '$2y$10$0DD4C3TUXxPV2ij9kKkv8O1MyWAyBAxig6Y9AYRtZUElJS1nOdUkO', 'usuario', '2024-12-07 18:03:22'),
(3, 'Reinaldo', 'Soriano', '3177476902', 'reinaldo@example.com', '$2y$10$x.G21LzFXnzSEo2EqFsZZuvqfo0P9vVSzprxiER4.GJACie73uR7y', 'usuario', '2025-01-08 03:31:31'),
(7, 'Laura', 'Polania', '3187468903', 'laura@example.com', '$2y$10$6X/uGSexveMrQVopXUW2wODhBYpTNhrS8xt.w.wLYYSgiyIQF/JjO', 'usuario', '2025-01-08 03:41:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `lugar_salida` varchar(255) NOT NULL DEFAULT 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123',
  `fecha_salida` date NOT NULL,
  `fecha_regreso` date NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id`, `destino`, `lugar_salida`, `fecha_salida`, `fecha_regreso`, `precio`, `descripcion`, `disponible`) VALUES
(1, 'Bali, Indonesia', 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123', '2025-01-10', '2025-01-20', 6000000.00, NULL, 1),
(2, 'París, Francia', 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123', '2025-02-05', '2025-02-15', 4800000.00, NULL, 1),
(3, 'Kyoto, Japón', 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123', '2025-03-01', '2025-03-10', 7200000.00, NULL, 1),
(4, 'Marrakech, Marruecos', 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123', '2025-04-15', '2025-04-25', 5600000.00, NULL, 1),
(5, 'Santorini, Grecia', 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123', '2025-05-05', '2025-05-15', 6000000.00, NULL, 1),
(6, 'Cape Town, Sudáfrica', 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123', '2025-06-01', '2025-06-10', 7200000.00, NULL, 1),
(7, 'São Paulo, Brasil', 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123', '2025-07-20', '2025-07-30', 2500000.00, NULL, 1),
(8, 'Nueva Delhi, India', 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123', '2025-08-10', '2025-08-20', 8000000.00, NULL, 1),
(9, 'Nueva York, Estados Unidos', 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123', '2025-09-01', '2025-09-10', 4800000.00, NULL, 1),
(10, 'Milán, Italia', 'Bogotá, Colombia, Aeropuerto Traveltura, Calle Falsa 123', '2025-10-15', '2025-10-25', 6000000.00, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `viaje_id` (`viaje_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`viaje_id`) REFERENCES `viajes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
