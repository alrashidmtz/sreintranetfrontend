-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2018 at 09:47 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proteccion`
--

-- --------------------------------------------------------

--
-- Table structure for table `actas_administrativas`
--

CREATE TABLE `actas_administrativas` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Fecha` date NOT NULL,
  `Asunto` varchar(250) NOT NULL,
  `Funcionario` text NOT NULL,
  `Departamento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actas_administrativas`
--

INSERT INTO `actas_administrativas` (`ID`, `Fecha`, `Asunto`, `Funcionario`, `Departamento`) VALUES
(1, '2018-02-06', 'Prueba', 'PATRICIA PEREZ GALEANA', 'DOCUMENTACION'),
(2, '2018-02-06', 'Prueba 2', 'PATRICIA PEREZ GALEANA', 'PROTECCION');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actas_administrativas`
--
ALTER TABLE `actas_administrativas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actas_administrativas`
--
ALTER TABLE `actas_administrativas`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
