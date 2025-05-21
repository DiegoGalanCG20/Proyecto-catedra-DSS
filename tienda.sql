CREATE DATABASE IF NOT EXISTS `tienda`;
USE `tienda`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
);

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Herramientas'),
(2, 'Jardinería'),
(3, 'Construcción'),
(4, 'Plomeria');

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
);

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria_id`, `imagen`) VALUES
(1, 'Martillo', 'Martillo de acero forjado con mango antideslizante.', 9.99, 1, 'martillo.jpg'),
(2, 'Destornillador', 'Destornillador multipunta magnético.', 5.49, 1, 'destornillador.jpg'),
(3, 'Tijeras de podar', 'Tijeras para cortar ramas pequeñas y flores.', 7.89, 2, 'tijeras_podar.jpg'),
(4, 'Regadera', 'Regadera de plástico 5L.', 4.25, 2, 'regadera.jpg'),
(5, 'Cemento Portland', 'Bolsa de 50kg para obras civiles.', 12.99, 3, 'cemento.jpg'),
(6, 'Bloques de concreto', 'Bloques estándar 15x20x40cm.', 1.35, 3, 'bloques.jpg'),
(7, 'Cortatubos', 'Herramienta para cortar tubos pvc u otro tipo', 8.56, 4, 'cortatubos.jpg'),
(8, 'Cinta Teflon', 'Cinta teflon para las tuberias', 3.99, 4, 'cintateflon.jpg'),
(9, 'Destapacaños', 'Destapador para el baño', 4.98, 4, 'destapacaños.jpg');

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
);

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `creado_en`) VALUES
(1, 'Admin Uno', 'admin1@ferreteria.com', '$2y$10$OqK/nq2z1wDp6FpI1ORdFu0YdTuD8lZJe4wKE1dRpDWDkSL.qw7iO', '2025-05-19 04:41:40'),
(2, 'Cliente Demo', 'cliente@ferreteria.com', '$2y$10$2Dd0Bb0t/0mZHuk5eufTHe9Gptpt7Iboq7RM8hQqCSFvjO/08rM3e', '2025-05-19 04:41:40');

ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
