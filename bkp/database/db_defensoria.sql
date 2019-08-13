-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 05:58 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_defensoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_do_direito`
--

CREATE TABLE `area_do_direito` (
  `ID_DIREITO` int(30) NOT NULL,
  `NOME_DIREITO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `area_subdireito`
--

CREATE TABLE `area_subdireito` (
  `ID_SUBDIREITO` int(200) NOT NULL,
  `NOME_SUBDIREITO` varchar(300) NOT NULL,
  `ID_DIREITO` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assistido`
--

CREATE TABLE `assistido` (
  `RG_ASS` int(9) DEFAULT NULL,
  `NOME_ASS` int(100) NOT NULL,
  `EMAIL_ASS` int(40) NOT NULL,
  `TELEFONE_ASS` int(14) NOT NULL,
  `SEXO` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `atendimento`
--

CREATE TABLE `atendimento` (
  `ID_ATENDIMENTO` int(225) NOT NULL,
  `MAT_FUNC` int(5) NOT NULL,
  `RG_ASS` int(9) NOT NULL,
  `ID_DIR` int(10) NOT NULL,
  `PRIORIDADE_ATENDIMENTO` varchar(10) NOT NULL,
  `COMENTARIO_ATENDIMENTO` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `MAT_FUNC` int(5) DEFAULT NULL,
  `ID_TIPO_FUNC` int(1) DEFAULT NULL,
  `NOME_FUNC` varchar(100) NOT NULL,
  `SENHA_FUNC` varchar(50) NOT NULL,
  `HORA_EXPEDIENTE_FUNC` datetime NOT NULL,
  `INSTITUICAO_FUNC` varchar(40) NOT NULL,
  `DATA_CADASTRO_FUNC` datetime NOT NULL,
  `RG_FUNC` int(9) NOT NULL,
  `CPF_FUNC` int(11) NOT NULL,
  `EMAIL_FUNC` varchar(100) NOT NULL,
  `MATRICULA_INST_FUNC` int(10) NOT NULL,
  `ENDERECO_FUNC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_funcionario`
--

CREATE TABLE `tipo_funcionario` (
  `ID_TIPO_FUNC` int(11) NOT NULL,
  `CARGO_FUNC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`ID_ATENDIMENTO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `ID_ATENDIMENTO` int(225) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
