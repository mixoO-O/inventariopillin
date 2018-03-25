-- Tablas
CREATE TABLE `inventariopillin`.`rango` (
`id` INT(10) NOT NULL AUTO_INCREMENT ,
`nombre` VARCHAR(50) NOT NULL ,
`observacion` VARCHAR(100) NOT NULL ,
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `inventariopillin`.`usuarios` (
`id` INT(10) NOT NULL AUTO_INCREMENT ,
`usuario` VARCHAR(50) NOT NULL ,
`nombre` VARCHAR(100) NOT NULL ,
`pass` VARCHAR(50) NOT NULL ,
`rango` INT(2) NOT NULL ,
  INDEX IdRango (rango),
  FOREIGN KEY (rango)REFERENCES rango(id),
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `inventariopillin`.`categorias` (
`id` INT(10) NOT NULL AUTO_INCREMENT ,
`nombre` VARCHAR(50) NOT NULL ,
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `inventariopillin`.`tiendas` (
`id` INT(10) NOT NULL AUTO_INCREMENT ,
`nombre` VARCHAR(50) NOT NULL ,
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `inventariopillin`.`productos` (
`id` INT(10) NOT NULL AUTO_INCREMENT ,
`cod_producto` VARCHAR(50) NOT NULL ,
`prod_tienda` INT(10) NOT NULL ,
`prod_usuario` INT(10) NOT NULL ,
`fecha` DATETIME NOT NULL,
  INDEX IdUser (prod_usuario),
  FOREIGN KEY (prod_usuario) REFERENCES usuarios(id),
  INDEX IdTienda (prod_tienda),
  FOREIGN KEY (prod_tienda) REFERENCES tiendas(id),
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `inventariopillin`.`maestra` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `cod_producto` VARCHAR(50) NOT NULL ,
  `nombre_producto` VARCHAR(50),
  `prod_categoria` INT(10),
  INDEX IdCategoria (prod_categoria),
  FOREIGN KEY (prod_categoria) REFERENCES categorias(id),
  PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- Insercion
INSERT INTO `rango` (`id`, `nombre`, `observacion`) VALUES (NULL, 'Usuario', 'Solo carga de datos'), (NULL, 'Jefe', 'Visualizacion de reporte');
INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `pass`, `rango`) VALUES (NULL, 'Usuario1', 'Nombre1 Apellido1', MD5('123'), '2'), (NULL, 'Usuario2', 'Nombre2 Apellido2', MD5('123'), '1');
INSERT INTO `categorias` (`id`, `nombre`) VALUES (NULL, 'Zapatos'), (NULL, 'Zapatillas');
INSERT INTO `tiendas` (`id`, `nombre`) VALUES (NULL, 'Bata'), (NULL, 'Adidas');
INSERT INTO `maestra` (`id`, `cod_producto`, `nombre_producto`, `prod_categoria`) VALUES (NULL, '0123456789012', 'Mocasin T41', '1'), (NULL, '0123456789013', 'Zapatilla SuperStar T42', '2');
INSERT INTO `productos` (`id`, `cod_producto`, `prod_tienda`, `prod_usuario`, `fecha`) VALUES (NULL, '0123456789012', '1', '1', NOW()), (NULL, '0123456789013', '2', '2', NOW());
