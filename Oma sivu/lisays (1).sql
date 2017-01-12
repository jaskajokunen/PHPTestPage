-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Palvelin: 127.0.0.1
-- Luontiaika: 13.12.2012 klo 17:00
-- Palvelimen versio: 5.5.27
-- PHP:n versio: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 
create database 1100328;
use database 1100328;
Rakenne taululle `palaute`
--

CREATE TABLE IF NOT EXISTS `palaute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `levyn_nimi` varchar(30) NOT NULL,
  `artisti` varchar(30) DEFAULT NULL,
  `julkaisuvuosi` varchar(30) NOT NULL,
  `kesto` int(30) NOT NULL,
  `levy_yhtio` varchar(30) DEFAULT NULL,
  `kommentti` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vedos taulusta `palaute`
--

INSERT INTO `palaute` (`id`, `levyn_nimi`, `artisti`, `julkaisuvuosi`, `kesto`, `levy_yhtio`, `kommentti`) VALUES
(1, 'marko_jumppa', 'markoboy87', '2010', 1, 'roadrunner_records', 'Ihan kiva');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
