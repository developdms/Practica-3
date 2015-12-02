-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2015 a las 12:11:08
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dms_business_manager`
--
CREATE DATABASE IF NOT EXISTS `dms_business_manager` default character set utf8 collate utf8_unicode_ci;
USE `dms_business_manager`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `idBill` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('open','close') COLLATE latin1_spanish_ci DEFAULT NULL,
  `infoDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idBill`)
) engine=innodb;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `device`
--

CREATE TABLE IF NOT EXISTS `device` (
  `idDevice` varchar(18) COLLATE latin1_spanish_ci NOT NULL,
  `rol` enum('admin','term') COLLATE latin1_spanish_ci DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDevice`),
  KEY `idUser` (`idUser`)
) engine=innodb;;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `idOrderDetail` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `price` float(6,2) NOT NULL,
  `idBill` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  PRIMARY KEY (`idOrderDetail`),
  KEY `idBill` (`idBill`),
  KEY `idProduct` (`idProduct`)
) engine=innodb;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `idProduct` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `price` float(6,2) NOT NULL,
  `image` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idProduct`),
  UNIQUE KEY `description` (`description`)
) engine=innodb;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `userName` (`userName`)
) engine=innodb;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`idBill`) REFERENCES `bill` (`idBill`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
