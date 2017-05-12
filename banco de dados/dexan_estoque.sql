-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Maio-2017 às 23:02
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dexan_estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chapas`
--

CREATE TABLE `chapas` (
  `cod_material` int(11) NOT NULL,
  `cod_tipo_onda` int(11) NOT NULL,
  `cod_tipo_papelao` int(11) NOT NULL,
  `gramatura` float NOT NULL,
  `comprimento` float NOT NULL,
  `largura` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
--

CREATE TABLE `materiais` (
  `cod` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_onda`
--

CREATE TABLE `tipos_onda` (
  `cod` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `espessura` varchar(20) NOT NULL,
  `numondas_10cm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_onda`
--

INSERT INTO `tipos_onda` (`cod`, `tipo`, `espessura`, `numondas_10cm`) VALUES
(1, 'A', '4,5/5,0 mm', '11 a 13'),
(2, 'C', '3,5/4,0 mm', '13 a 15'),
(3, 'B', '2,5/3,0 mm', '16 a 18'),
(4, 'E', '1,2/1,5 mm', '31 a 38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_papelao`
--

CREATE TABLE `tipos_papelao` (
  `cod` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_papelao`
--

INSERT INTO `tipos_papelao` (`cod`, `tipo`) VALUES
(1, 'Face Simples'),
(2, 'Parede Simples'),
(3, 'Parede Dupla'),
(4, 'Parede Tripla');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `usuario`, `senha`, `tipo`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'chefeprod', 'c33367701511b4f6020ec61ded352059', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapas`
--
ALTER TABLE `chapas`
  ADD PRIMARY KEY (`cod_material`),
  ADD KEY `cod_tipo_onda` (`cod_tipo_onda`) USING BTREE,
  ADD KEY `cod_tipo_papelao` (`cod_tipo_papelao`) USING BTREE;

--
-- Indexes for table `materiais`
--
ALTER TABLE `materiais`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `tipos_onda`
--
ALTER TABLE `tipos_onda`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `tipos_papelao`
--
ALTER TABLE `tipos_papelao`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materiais`
--
ALTER TABLE `materiais`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tipos_onda`
--
ALTER TABLE `tipos_onda`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tipos_papelao`
--
ALTER TABLE `tipos_papelao`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `chapas`
--
ALTER TABLE `chapas`
  ADD CONSTRAINT `fk_cod_material` FOREIGN KEY (`cod_material`) REFERENCES `materiais` (`cod`),
  ADD CONSTRAINT `fk_cod_tipo_onda` FOREIGN KEY (`cod_tipo_onda`) REFERENCES `tipos_onda` (`cod`),
  ADD CONSTRAINT `fk_cod_tipo_papelao` FOREIGN KEY (`cod_tipo_papelao`) REFERENCES `tipos_papelao` (`cod`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
