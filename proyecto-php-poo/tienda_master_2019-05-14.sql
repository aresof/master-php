# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Base de datos: tienda_master
# Tiempo de Generación: 2019-05-14 17:07:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla categorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;

INSERT INTO `categorias` (`id`, `nombre`)
VALUES
	(1,'Manga corta'),
	(2,'Tirantes'),
	(3,'Manga larga'),
	(4,'Sudaderas'),
	(5,'Lucha'),
	(6,'Combate'),
	(7,'Chaqueta');

/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla lineas_pedidos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lineas_pedidos`;

CREATE TABLE `lineas_pedidos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(255) NOT NULL,
  `producto_id` int(255) NOT NULL,
  `unidades` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_linea_pedido` (`pedido_id`),
  KEY `fk_linea_producto` (`producto_id`),
  CONSTRAINT `fk_linea_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  CONSTRAINT `fk_linea_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lineas_pedidos` WRITE;
/*!40000 ALTER TABLE `lineas_pedidos` DISABLE KEYS */;

INSERT INTO `lineas_pedidos` (`id`, `pedido_id`, `producto_id`, `unidades`)
VALUES
	(1,11,3,1),
	(2,11,2,1),
	(3,11,7,1),
	(4,12,3,1),
	(5,12,2,1),
	(6,12,7,2),
	(7,13,3,1),
	(8,13,2,1),
	(9,13,7,2),
	(10,14,3,1),
	(11,14,2,1),
	(12,14,7,2),
	(13,15,3,1),
	(14,15,2,1),
	(15,15,7,2),
	(16,16,2,1),
	(17,16,7,2),
	(18,16,4,1),
	(19,17,2,1),
	(20,17,7,2),
	(21,17,4,1),
	(22,18,2,1),
	(23,18,7,2),
	(24,18,4,1);

/*!40000 ALTER TABLE `lineas_pedidos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla pedidos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(255) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `coste` float(200,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_usuario` (`usuario_id`),
  CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;

INSERT INTO `pedidos` (`id`, `usuario_id`, `provincia`, `localidad`, `direccion`, `coste`, `estado`, `fecha`, `hora`)
VALUES
	(1,27,'Granada','Cijuela','Calle Real 1',2673.00,'Confirmado','2019-05-07','21:26:49'),
	(2,27,'Granada','Cijuela','Calle Real 1',2673.00,'Ready','2019-05-07','21:32:32'),
	(3,27,'Granada','Santa Fe','Calle Carlos 16',2673.00,'Confirmado','2019-05-07','21:40:58'),
	(4,27,'Granada','Láchar','Calle Carlos Cano',2673.00,'Confirmado','2019-05-07','21:41:38'),
	(5,27,'Murcia','Lorca','Callejuela',2673.00,'Confirmado','2019-05-07','22:12:27'),
	(6,27,'Murcia','Lorca','Callejuela',2673.00,'Confirmado','2019-05-07','22:12:56'),
	(7,27,'Murcia','Lorca','Callejuela',2673.00,'Confirmado','2019-05-07','22:18:10'),
	(8,27,'Granada','Cijuela','Calle Rodríguez de la Fuente, 22',1280.00,'Confirmado','2019-05-09','18:02:53'),
	(9,27,'Granada','Cijuela','Calle Rodríguez de la Fuente, 22',1280.00,'Confirmado','2019-05-09','18:03:39'),
	(10,27,'Granada','Cijuela','Calle Rodríguez de la Fuente, 22',1280.00,'Confirmado','2019-05-09','18:04:23'),
	(11,27,'Granada','Cijuela','Calle Rodríguez de la Fuente, 22',1280.00,'Confirmado','2019-05-09','18:04:42'),
	(12,27,'dasd','dasd','Casdas',1314.00,'Confirmado','2019-05-09','18:05:51'),
	(13,27,'dasd','dasd','Casdas',1314.00,'Confirmado','2019-05-09','18:13:10'),
	(14,27,'dasd','dasd','Casdas',1314.00,'Confirmado','2019-05-09','18:14:30'),
	(15,27,'fdsf','fds','sdfsdf',1314.00,'Confirmado','2019-05-09','18:25:02'),
	(16,27,'Granada','Chauchina','Calle Caballero Largo, 7',1325.00,'Confirmado','2019-05-10','18:54:28'),
	(17,27,'gdf','gif','dfg',1325.00,'Ready','2019-05-10','18:59:02'),
	(18,27,'fsd','fsd','sdf',1325.00,'Confirmado','2019-05-10','19:18:42');

/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla productos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `precio` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `oferta` varchar(2) DEFAULT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_categoria` (`categoria_id`),
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`)
VALUES
	(2,5,'Producto 1','desc 1',1234.00,9,'NO','2019-04-29','IMG_5678.PNG'),
	(3,7,'Corta Real Madrid','Sin numerar',12.00,8,'10','2019-04-29','mod1555756026.jpg'),
	(4,4,'Luces','Manga larga con capucha',23.00,12,'NO','2019-04-25','PHOTO-2018-11-16-17-49-49.jpg'),
	(5,1,'Prod #4','dsadasdas',23.00,2,'NO','2019-04-29','mod1555756026.jpg'),
	(6,1,'Prod #5','dsadasd',23.00,12,'NO','2019-04-29','mod1555756026.jpg'),
	(7,7,'Prod #7','asad',34.00,4,'NO','2019-04-29','20170811_104640579_iOS.jpg'),
	(8,7,'Prod #8','dsad',33.00,3,'NO','2019-04-29','');

/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `rol`, `imagen`)
VALUES
	(1,'Admin','Admin','admin@admin.com','contraseña','admin',NULL),
	(2,'Arturo','Ortega Flores','artu@artu.com','$2y$04$1L.f7XrIruiE2/0fcBEuTu749tGrmXE/nuQepuHGoAqKNunLjF0dy','user',NULL),
	(5,'Alex','Ortega Flores','alex@alex.com','$2y$04$tMBH9gBGwyGWYqV6TKmOa.2NQJTpwVKwTJZ3UIRon3q4dCwCBuA/G','user',NULL),
	(7,'Pepe','pepito','pepe@pepe.es','$2y$04$TFxX5S4vmJk7HLuIJKsa7ezx39irOcXPuvNwyjq2XiVA4fEr.PPWG','user',NULL),
	(9,'Juan','juanito','juan@juan.es','$2y$04$WuxtcPOsBONKRHQJriETjOJh9LGvM8QaLCDhnCTTjYnjXoQhxlM9K','user',NULL),
	(11,'Lucas','peres','sab@eas.es','$2y$04$EwcLivodxDTSWvLjE5SDo.3SR2ENtU3i.BnF2bpAD40ZSV29DfBMK','user',NULL),
	(13,'Lucases','peres','sab@easss.es','$2y$04$9kV1F9WSNQMeficIb34tPuN29GaTdqtfRI7FHJH8WijD0PDpJK5X6','user',NULL),
	(14,'Luz','peres','sab@ss.es','$2y$04$TPAXzVc5F4Sohlnz5Wuig.cvPriJIm5eN3PzYYyVa00K3q/XLfr2C','user',NULL),
	(27,'Pepito','Grillo','pepito@pepito.es','$2y$04$mVoTHoVq5jqn7jEKVKRGK.gCoX1FHwABWMZ7fyMGAhv6fCSvrmpua','admin',NULL),
	(28,'Lucas','perez','lucas@lucas.es','$2y$04$fU6.1V0E8drmGl6Xv1kINuNALjQiT31Co/GpAji0ZHV/gQ4q88kRq','user',NULL),
	(29,'Pedro','pedrito','pedro@pedro.es','$2y$04$B8MeUZhitpaCcZ.uc.74MuXowXuAvgBjqBAf4PFDrNTmZZstyDkmm','user',NULL),
	(32,'Sergio','Pilas','sergio@sergio.es','$2y$04$/VaT9JuN/GOArX9ZmtBFwuYhO2aO1CmjXLZiz5bVVWqYwa6a5OpI.','user',NULL),
	(33,'pepa','pepa','pepa@pepa.es','$2y$04$93kO425tYbHI3byCNMd53OnL/QLJw68MCjvql/gkpE6uIG48gk6Ka','user',NULL),
	(34,'p','p','p@p.es','$2y$04$Yd22CP4z8Q5F3fpLYd/2..2PE4c5jLQOxScpB83IkqzJl0KUzR86u','user',NULL);

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
