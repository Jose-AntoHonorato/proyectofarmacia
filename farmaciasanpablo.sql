-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-11-2023 a las 20:50:03
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmaciasanpablo`
--

DELIMITER $$
--
-- Procedimientos
--
DROP farmaciasanpablo;
CREATE farmaciasanpablo;
USE farmaciasanpablo;

DROP PROCEDURE IF EXISTS `medicamentos_Gael`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `medicamentos_Gael` ()   SELECT *
FROM medicamento$$

DROP PROCEDURE IF EXISTS `NomLaboratorio_Isaac`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `NomLaboratorio_Isaac` ()   SELECT Clavelab, Nomlab
FROM laboratorio$$

DROP PROCEDURE IF EXISTS `rutclientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `rutclientes` (OUT `sexocli` TEXT)   SELECT Nomcli, Direccion FROM clientes$$

DROP PROCEDURE IF EXISTS `RutJorel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RutJorel` ()   SELECT Nomcli, Direccion FROM clientes$$

DROP PROCEDURE IF EXISTS `RutJosue`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RutJosue` ()   SELECT Telprov, Nomprov
FROM proveedores$$

DROP PROCEDURE IF EXISTS `Vermedicamento_Honora`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Vermedicamento_Honora` (OUT `Nombremed` VARCHAR(20))   SELECT Folticket, Prodvend FROM ventas$$

DROP PROCEDURE IF EXISTS `vermed_Gael`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `vermed_Gael` (IN `NomMed` INT(20))   SELECT Lotemed, Clavemed, Nombremed
FROM medicamento
WHERE
Nombremed = Nommed$$

DROP PROCEDURE IF EXISTS `verventas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verventas` (OUT `Idcliente` INT(20))   SELECT Folticket, Prodvend FROM ventas$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int NOT NULL,
  `Nomcli` varchar(20) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Numtel` int DEFAULT NULL,
  `Fechareg` date DEFAULT NULL,
  `Sexocli` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `Nomcli`, `Direccion`, `Numtel`, `Fechareg`, `Sexocli`) VALUES
(1000, 'Andrés Felipe Gómez ', 'CALLE AGUSTIN LARA NO. 69-B', 2147483647, '2024-03-14', 'H'),
(1001, 'JOSEFINA ENRIQUEZ PE', 'AV. INDEPENDENCIA NO. 241', 2147483647, '2024-04-17', 'M'),
(1002, 'ISIDRO BRAVO UBIETA', 'CALLE MATAMOROS NO. 310', 128752180, '2024-07-05', 'H'),
(1003, 'ROSA NIVEA GAMBOA TE', 'AV. 5 DE MAYO NO 1100-A', 128753656, '2024-09-20', 'M'),
(1004, 'JUAN CARLOS OLIVO FE', 'ARTEAGA NO 729', 128753209, '2024-10-31', 'H'),
(1005, 'JUAN ZAMORA REYES', 'ALDAMA NO 1212', 2147483647, '2025-01-16', 'H'),
(1006, 'JOSE TRIUNFO MARES', 'AV. 5 DE MAYO NO 1721', 2147483647, '2025-02-27', 'H'),
(1007, 'DOLORES OCAMPO ZUÐIG', 'MIGUEL HIDALGO NO 689', 1515688666, '2025-03-26', 'M'),
(1008, 'ISMAEL AVILA ORTEGA', 'CALLE OCAMPO S/M.', 2006546945, '2025-04-16', 'H'),
(1009, 'EMILIO CRIOLLO RODRI', 'AV. INDEPENDENCIA NO. 246', 1205465166, '2025-08-13', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
CREATE TABLE IF NOT EXISTS `laboratorio` (
  `Clavelab` int NOT NULL,
  `Nomlab` varchar(20) DEFAULT NULL,
  `Direclab` varchar(20) DEFAULT NULL,
  `Numlab` int DEFAULT NULL,
  `Correo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Clavelab`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`Clavelab`, `Nomlab`, `Direclab`, `Numlab`, `Correo`) VALUES
(1, 'Johnson & Johnson', 'amino Tepalcapa No. ', 2147483647, 'contactenos.mx@acuvu'),
(2, 'Roche', 'Cerrada de Bezares N', 2147483647, 'mexico.askMI@roche.c'),
(3, 'Pfizer', 'Paseo de los Tamarin', 2147483647, 'contacto@pfizer.com'),
(4, 'Novartis', 'Cda. Electrón 28, In', 2147483647, 'proveedores.latam@no'),
(5, 'Merck & Co', 'Calle 5, Número 7 Fr', 2147483647, 'SIM@merckgroup.com'),
(6, 'Sanofi', 'Av. Real de Mayorazg', 2147483647, 'fv-imed@sanofi.com'),
(7, 'AstraZeneca', 'Avenida Lomas Verdes', 2147483647, 'medicaUY@astrazeneca'),
(8, 'Bayer', 'Blvd. M. Cervantes S', 2147483647, 'relaciones.publicas@'),
(9, 'Boehringer Ingelheim', 'Prat de la Riba, 50', 2147483647, 'atencionclientes.es@'),
(10, 'Pisa', 'Avenida De La Barran', 800800365, 'atencionclientes.es@');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
CREATE TABLE IF NOT EXISTS `medicamento` (
  `Clavemed` int NOT NULL,
  `Nombremed` varchar(20) DEFAULT NULL,
  `Clavelab` int DEFAULT NULL,
  `Fechacad` date DEFAULT NULL,
  `Lotemed` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Clavemed`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`Clavemed`, `Nombremed`, `Clavelab`, `Fechacad`, `Lotemed`) VALUES
(1, 'Parecetamol', 5, '2025-07-24', '64566'),
(2, 'Omeprazol', 9, '2025-08-14', '69789'),
(3, 'Naproxeno', 7, '2025-09-05', '65100'),
(4, 'Clindamicina', 6, '2025-11-20', '23032'),
(5, 'Amoxicilina', 2, '2026-05-07', '21000'),
(6, 'Ampicilina', 10, '2026-09-17', '97879'),
(7, 'Loratadina', 7, '2027-04-07', '11212'),
(8, 'Prednisolona', 5, '2027-06-11', '89005'),
(9, 'Ibuprofeno', 1, '2027-06-26', '18710'),
(10, 'Ranitidina', 6, '2027-02-03', '21007');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `Idprov` int NOT NULL,
  `Nomprov` varchar(25) DEFAULT NULL,
  `Direcprov` varchar(30) DEFAULT NULL,
  `Telprov` int DEFAULT NULL,
  `Clavelab` int DEFAULT NULL,
  PRIMARY KEY (`Idprov`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`Idprov`, `Nomprov`, `Direcprov`, `Telprov`, `Clavelab`) VALUES
(10100, 'Farmacia Similares', 'Trinidad Lopez 552,	Los Mochis', 2147483647, 3),
(10101, 'Farmacia san Pablo', 'AV. 5 DE MAYO NO. 1108', 2147483647, 6),
(10102, 'Farmacia del Ahorro', '	CALLE AGUSTIN LARA NO. 69-B', 2061548948, 7),
(10103, 'Farmacia Benavides', 'AV. INDEPENDENCIA NO. 779', 2147483647, 9),
(10104, 'Centro Dispensario', 'Calle del Cóndor 7, 52950 Atiz', 2147483647, 6),
(10105, 'MediCo y Salud', 'C. 20 De Noviembre 14', 2147483647, 3),
(10106, 'Recetas y Controlados', 'CALLE MATAMOROS NO. 127', 555893516, 2),
(10107, 'Farmacia La Gragea', 'CALLE ALDAMA NO 156', 216541632, 8),
(10108, 'Farmacia Express', 'MATAMOROS NO 85 ESQ. 20 DE NOV', 2147483647, 4),
(10109, 'Tu Bienestar', 'CALLE IGNACIO RAYON NO. 949', 2147483647, 10),
(10110, 'Farmacia Santa Rita', 'AV. INDEPENDENCIA N0.677', 2147483647, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `Folticket` int NOT NULL,
  `Idcliente` int DEFAULT NULL,
  `Clavemed` int DEFAULT NULL,
  `Fechventa` date DEFAULT NULL,
  `Prodvend` int DEFAULT NULL,
  PRIMARY KEY (`Folticket`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Folticket`, `Idcliente`, `Clavemed`, `Fechventa`, `Prodvend`) VALUES
(1, 1001, 1, '2024-01-01', 5),
(2, 1010, 3, '2024-01-05', 3),
(3, 1006, 8, '2024-01-06', 15),
(4, 1005, 10, '2024-01-06', 7),
(5, 1004, 3, '2024-01-09', 30),
(6, 1001, 4, '2024-01-09', 11),
(7, 1002, 9, '2024-01-10', 2),
(8, 1015, 3, '2024-01-12', 9),
(9, 1011, 2, '2024-02-07', 3),
(10, 1003, 7, '2024-02-10', 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
