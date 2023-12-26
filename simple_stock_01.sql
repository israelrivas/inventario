-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-12-2023 a las 02:49:51
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simple_stock`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `date_added`) VALUES
(1, 'Repuestos', 'Equipos para el hogar', '2016-12-19 00:00:00'),
(4, 'Equipos', 'Equipos stihl', '2016-12-19 21:06:37'),
(5, 'Accesorios', 'Accesorios stihl', '2016-12-19 21:06:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE IF NOT EXISTS `historial` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `nota` varchar(255) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_historial`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `fecha`, `nota`, `referencia`, `cantidad`) VALUES
(1, 1, 2, '2023-12-20 22:24:49', 'Francisco agregÃ³ 245 producto(s) al inventario', '001', 245),
(2, 2, 2, '2023-12-20 22:32:58', 'Francisco agregÃ³ 22 producto(s) al inventario', '002', 22),
(3, 3, 2, '2023-12-20 22:33:38', 'Francisco agregÃ³ 5 producto(s) al inventario', '003', 5),
(4, 5, 2, '2023-12-20 22:36:42', 'Francisco agregÃ³ 3 producto(s) al inventario', '004', 3),
(5, 6, 2, '2023-12-20 22:40:06', 'Francisco agregÃ³ 20 producto(s) al inventario', '005', 20),
(6, 7, 2, '2023-12-20 22:41:08', 'Francisco agregÃ³ 300 producto(s) al inventario', '006', 300),
(7, 8, 2, '2023-12-20 22:41:49', 'Francisco agregÃ³ 233 producto(s) al inventario', '007', 233),
(8, 9, 1, '2023-12-21 19:23:04', 'Obed agregÃ³ 93 producto(s) al inventario', '008', 93),
(9, 10, 1, '2023-12-21 19:23:29', 'Obed agregÃ³ 200 producto(s) al inventario', '009', 200),
(10, 11, 1, '2023-12-21 19:23:52', 'Obed agregÃ³ 120 producto(s) al inventario', '010', 120),
(11, 12, 1, '2023-12-21 19:24:14', 'Obed agregÃ³ 20 producto(s) al inventario', '011', 20),
(12, 13, 1, '2023-12-21 19:25:07', 'Obed agregÃ³ 20 producto(s) al inventario', '012', 20),
(13, 14, 1, '2023-12-21 19:25:24', 'Obed agregÃ³ 100 producto(s) al inventario', '013', 100),
(14, 15, 1, '2023-12-21 19:25:50', 'Obed agregÃ³ 12 producto(s) al inventario', '014', 12),
(15, 16, 1, '2023-12-21 21:48:53', 'Obed agregÃ³ 21 producto(s) al inventario', '015', 21),
(16, 17, 1, '2023-12-23 15:33:05', 'Obed agregÃ³ 12455 producto(s) al inventario', '016', 12455),
(17, 18, 1, '2023-12-23 15:33:44', 'Obed agregÃ³ 10 producto(s) al inventario', '017', 10),
(18, 19, 1, '2023-12-23 15:34:13', 'Obed agregÃ³ 12 producto(s) al inventario', '018', 12),
(19, 20, 1, '2023-12-23 15:34:40', 'Obed agregÃ³ 44 producto(s) al inventario', '019', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porducts_by_traspaso`
--

DROP TABLE IF EXISTS `porducts_by_traspaso`;
CREATE TABLE IF NOT EXISTS `porducts_by_traspaso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_traspaso` int(20) NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `piezas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `porducts_by_traspaso`
--

INSERT INTO `porducts_by_traspaso` (`id`, `fk_id_traspaso`, `fk_product_id`, `piezas`) VALUES
(4, 2, 8, 2),
(5, 2, 11, 12),
(6, 2, 16, 11),
(7, 3, 7, 2),
(8, 4, 7, 2),
(9, 5, 16, 100),
(10, 6, 16, 100),
(11, 7, 5, 323),
(12, 7, 7, 33),
(13, 7, 10, 23),
(14, 7, 16, 2),
(15, 8, 3, 50),
(16, 9, 3, 50),
(17, 10, 3, 50),
(18, 10, 10, 50),
(19, 10, 14, 50),
(20, 11, 7, 40),
(21, 11, 11, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `precio_producto` double NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigo_producto` (`codigo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_producto`, `codigo_producto`, `nombre_producto`, `date_added`, `precio_producto`, `stock`, `id_categoria`) VALUES
(1, '001', 'toner', '2023-12-20 22:24:49', 350, 24512, 1),
(2, '002', 'mouse', '2023-12-20 22:32:58', 120, 2232, 5),
(3, '003', 'laptop', '2023-12-20 22:33:38', 24000, 550, 4),
(5, '004', 'monitor 15\"', '2023-12-20 22:36:42', 3000, 33212, 5),
(6, '005', 'teclado', '2023-12-20 22:40:06', 500, 2032, 5),
(7, '006', 'pad', '2023-12-20 22:41:08', 140, 29992, 5),
(8, '007', 'usb', '2023-12-20 22:41:49', 300, 23323, 5),
(9, '008', 'LÃ¡piz Ã³ptico', '2023-12-21 19:23:04', 223, 9323, 5),
(10, '009', 'lampara usb', '2023-12-21 19:23:29', 150, 250, 5),
(11, '010', 'cargador laptop', '2023-12-21 19:23:52', 500, 100, 5),
(12, '011', 'Modem', '2023-12-21 19:24:14', 460, 20234, 4),
(13, '012', 'cable ethernet', '2023-12-21 19:25:07', 160, 2045, 5),
(14, '013', 'cinchos', '2023-12-21 19:25:24', 50, 150, 5),
(15, '014', 'procesador', '2023-12-21 19:25:50', 1200, 12456, 5),
(16, '015', 'memoria SD 512gb', '2023-12-21 21:48:53', 200, 2157, 5),
(17, '016', 'memoria ram', '2023-12-23 15:33:05', 1233, 12479, 5),
(18, '017', 'Procesador i5', '2023-12-23 15:33:44', 4000, 10, 5),
(19, '018', 'Procesador i7', '2023-12-23 15:34:13', 8000, 12, 5),
(20, '019', 'procesador i9', '2023-12-23 15:34:40', 12000, 44, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'almacenista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspasos`
--

DROP TABLE IF EXISTS `traspasos`;
CREATE TABLE IF NOT EXISTS `traspasos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime NOT NULL,
  `type_of_move` int(1) NOT NULL COMMENT 'egreso o ingreso',
  `comentarios` varchar(256) DEFAULT NULL,
  `fk_solicita_user_id` int(11) NOT NULL,
  `fk_aprueba_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `traspasos`
--

INSERT INTO `traspasos` (`id`, `fecha_hora`, `type_of_move`, `comentarios`, `fk_solicita_user_id`, `fk_aprueba_user_id`) VALUES
(2, '2023-12-21 22:47:47', 1, NULL, 1, NULL),
(3, '2023-12-21 22:50:15', 1, 'comentatio', 1, NULL),
(4, '2023-12-21 22:50:15', 1, 'comentatio', 1, NULL),
(5, '2023-12-21 22:52:31', 1, 'sin coment', 1, NULL),
(6, '2023-12-21 22:52:31', 1, 'sin coment', 1, NULL),
(7, '2023-12-23 15:12:56', 2, 'uno', 1, NULL),
(8, '2023-12-23 15:21:19', 1, '', 1, NULL),
(9, '2023-12-23 15:23:42', 2, '', 1, NULL),
(10, '2023-12-23 15:24:55', 1, '', 1, NULL),
(11, '2023-12-23 15:27:28', 2, '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL,
  `fk_id_rol` int(9) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`, `fk_id_rol`) VALUES
(1, 'Obed', 'Alvarado', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-12-19 15:06:00', 1),
(2, 'Francisco', 'Ayapantecalth', 'fran', '$2y$10$c8XkM0/P2sikBo0ZY56piuC/8N4xDbWbTS83QnYcQj2ph5uLC12kq', 'jfcruz@outlook.com', '2023-12-20 21:47:59', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `products` (`id_producto`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
