-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2021 a las 04:02:35
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
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `idProducto` int(5) NOT NULL,
  `idVenta` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` double NOT NULL,
  `subTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `filesize` int(11) NOT NULL,
  `web_path` varchar(250) NOT NULL,
  `system_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `filename`, `filesize`, `web_path`, `system_path`) VALUES
(1, 'Logotipo-CocaCola-Colombia.png', 39534, '/ecommerce/uploads/1.png', 'C:/xampp/htdocs/ecommerce/uploads/1.png'),
(2, '280px-Pepsi_logo_2014.svg.png', 20372, '/ecommerce/uploads/2.png', 'C:/xampp/htdocs/ecommerce/uploads/2.png'),
(3, '0-7525_red-square-logo-logos-coca-cola-logo-now.jpg', 39491, '/ecommerce/uploads/3.jpg', 'C:/xampp/htdocs/ecommerce/uploads/3.jpg'),
(4, '280px-Pepsi_logo_2014.svg.png', 21235, '/ecommerce/uploads/4.png', 'C:/xampp/htdocs/ecommerce/uploads/4.png'),
(5, '580b57fcd9996e24bc43c1f2.png', 11628, '/ecommerce/uploads/5.png', 'C:/xampp/htdocs/ecommerce/uploads/5.png'),
(6, '580b57fcd9996e24bc43c1f2.png', 48423, '/ecommerce/uploads/6.png', 'C:/xampp/htdocs/ecommerce/uploads/6.png'),
(7, 'índice.jpg', 7878, '/ecommerce/uploads/7.jpg', 'C:/xampp/htdocs/ecommerce/uploads/7.jpg'),
(8, 'Fanta-Logo.png', 31907, '/ecommerce/uploads/8.png', 'C:/xampp/htdocs/ecommerce/uploads/8.png'),
(9, 'Mirinda-Logo-1995.png', 57146, '/ecommerce/uploads/9.png', 'C:/xampp/htdocs/ecommerce/uploads/9.png'),
(10, '7-up_Logo.svg.png', 21593, '/ecommerce/uploads/10.png', 'C:/xampp/htdocs/ecommerce/uploads/10.png'),
(11, 'Logo-Coca-Cola.jpg', 17527, '/ecommerce/uploads/11.jpg', 'C:/xampp/htdocs/ecommerce/uploads/11.jpg'),
(12, '0-7525_red-square-logo-logos-coca-cola-logo-now.jpg', 39491, '/ecommerce/uploads/12.jpg', 'C:/xampp/htdocs/ecommerce/uploads/12.jpg'),
(13, '0-7525_red-square-logo-logos-coca-cola-logo-now.jpg', 39491, '/ecommerce/uploads/13.jpg', 'C:/xampp/htdocs/ecommerce/uploads/13.jpg'),
(14, 'índice.jpg', 4097, '/ecommerce/uploads/14.jpg', 'C:/xampp/htdocs/ecommerce/uploads/14.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `existencias` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `existencias`) VALUES
(1, 'Coca-Cola 2.5 lt', 2.25, 10),
(3, 'Pepsi', 1.25, 20),
(4, 'Sprite', 2, 4),
(5, 'Mountain Dew', 1, 10),
(6, 'Fanta', 3, 6),
(7, 'Mirinda', 1, 9),
(8, '7up', 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_files`
--

CREATE TABLE `productos_files` (
  `producto_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_files`
--

INSERT INTO `productos_files` (`producto_id`, `file_id`) VALUES
(3, 4),
(4, 6),
(5, 7),
(6, 8),
(7, 9),
(8, 10),
(1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `pass`) VALUES
(1, 'Edwin', 'info@proyectoSoft.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Yasuri', 'yasuri@proyectoSoft.com', '202cb962ac59075b964b07152d234b70'),
(4, 'Rafael Zelaya', 'rafa@proyectoSoft.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `idCliente` int(5) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idpro` (`idProducto`),
  ADD KEY `fk_idventa` (`idVenta`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idCli` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `idpro` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idven` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `idcli` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
