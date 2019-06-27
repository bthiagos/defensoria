-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jun-2019 às 23:47
-- Versão do servidor: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defensoria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `idatendimento` int(11) NOT NULL,
  `nome_assistido` varchar(100) COLLATE utf8_bin NOT NULL,
  `cpf_assistido` int(11) NOT NULL,
  `sexo_assistido` varchar(45) COLLATE utf8_bin NOT NULL,
  `email_assistido` varchar(80) COLLATE utf8_bin NOT NULL,
  `estadocivil_assistido` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`idatendimento`, `nome_assistido`, `cpf_assistido`, `sexo_assistido`, `email_assistido`, `estadocivil_assistido`) VALUES
(1, 'Titi', 2147483647, 'masculino', 'titi@titi.oes', 'solteiro'),
(2, 'JoÃ£o PÃ© de FeijÃ£o', 2147483647, 'masculino', 'joaopedefeijao@joaope.com', 'Solteiro(a)'),
(3, 'Ana AmÃ©lia', 2147483647, 'masculino', 'ana@anamelia.com', 'Casado(a)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idestagiario` int(11) NOT NULL,
  `matricula` varchar(10) COLLATE utf8_bin NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `senha` varchar(35) COLLATE utf8_bin NOT NULL,
  `tipo_estagiario` varchar(50) COLLATE utf8_bin NOT NULL,
  `hora_estagiario` varchar(50) COLLATE utf8_bin NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idestagiario`, `matricula`, `nome`, `email`, `senha`, `tipo_estagiario`, `hora_estagiario`, `data_cadastro`) VALUES
(1, '12345', 'Thiago Bastos dos Santos', 'bthiagos@gmail.com', '2db0996b2ef1d2008d45379f785233eb', 'est_contratado', 'hora_est_contratado_1', '2019-06-26 19:02:37'),
(2, '54321', 'Gabriel Vieira', 'gabrielbdvieira@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'est_voluntario', 'hora_est_voluntario_1_2', '2019-06-26 19:02:57'),
(3, '11225', 'Paula Almeida Costa', 'paulaamc@amc.com', '202cb962ac59075b964b07152d234b70', 'est_contratado', 'seg a sex\r\n                                       ', '2019-06-27 17:48:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`idatendimento`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idestagiario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `idatendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idestagiario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
