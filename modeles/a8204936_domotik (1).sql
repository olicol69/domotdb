
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2016 at 10:19 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a8204936_domotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `mesure`
--

CREATE TABLE `mesure` (
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zone` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'inconnu',
  `valeur` float NOT NULL,
  `unite` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `mesure`
--

INSERT INTO `mesure` VALUES('2016-10-23 08:52:50', 'RDC', 21, 'degres');

-- --------------------------------------------------------

--
-- Table structure for table `planification`
--

CREATE TABLE `planification` (
  `dateHeurePlanif` datetime NOT NULL,
  `dateHeureExe` datetime DEFAULT NULL,
  `action` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `statut` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'Programmé',
  `log` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `dateHeureCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `planification`
--

