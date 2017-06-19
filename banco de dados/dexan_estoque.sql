-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Jun-2017 às 19:54
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

--
-- Extraindo dados da tabela `chapas`
--

INSERT INTO `chapas` (`cod_material`, `cod_tipo_onda`, `cod_tipo_papelao`, `gramatura`, `comprimento`, `largura`) VALUES
(5, 1, 1, 10, 9, 1),
(6, 1, 1, 10, 10, 1),
(11, 1, 1, 10, 30, 30),
(14, 3, 3, 1, 2, 3),
(16, 1, 1, 1, 1, 1),
(17, 3, 2, 100, 10, 4),
(18, 2, 2, 100, 10, 4),
(19, 1, 2, 100, 10, 4),
(20, 1, 1, 10, 3, 6),
(21, 1, 1, 4, 30, 6),
(22, 1, 1, 4, 30, 90),
(23, 1, 1, 100, 2, 4),
(24, 4, 1, 100, 3, 4),
(25, 4, 3, 100, 3, 4),
(26, 2, 3, 100, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
--

CREATE TABLE `materiais` (
  `cod` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materiais`
--

INSERT INTO `materiais` (`cod`, `quantidade`) VALUES
(5, 0),
(6, 0),
(7, 25),
(10, 1076),
(11, 2),
(12, 81),
(13, 18),
(14, 37),
(16, 1),
(17, 417),
(18, 381),
(19, 435),
(20, 2),
(21, 39),
(22, 12),
(23, 22),
(24, 36),
(25, 4),
(26, 6),
(27, 1300),
(28, 1320);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais_secundarios`
--

CREATE TABLE `materiais_secundarios` (
  `cod_material` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materiais_secundarios`
--

INSERT INTO `materiais_secundarios` (`cod_material`, `descricao`) VALUES
(10, 'GRAMPOS PARA PAPELÃƒO'),
(12, 'FITA ADESIVA'),
(13, 'COLA INDUSTRIAL'),
(27, 'FOLHA SULFITE A4'),
(28, 'GRAMPO 19MM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicoes`
--

CREATE TABLE `requisicoes` (
  `cod` int(11) NOT NULL,
  `data` date NOT NULL,
  `observacao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `requisicoes`
--

INSERT INTO `requisicoes` (`cod`, `data`, `observacao`) VALUES
(28, '2017-06-19', 'Favor manter atenÃƒÂ§ÃƒÂ£o para possÃƒÂ­veis amassados nas chapas.'),
(29, '2017-06-19', ''),
(30, '2017-06-19', 'Folhas reservadas para impressÃƒÂ£o de requisiÃƒÂ§ÃƒÂµes'),
(31, '2017-06-14', 'Favor nÃƒÂ£o reinserir sobras no estoque');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicoes_materiais`
--

CREATE TABLE `requisicoes_materiais` (
  `cod_requisicao` int(11) NOT NULL,
  `cod_material` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `requisicoes_materiais`
--

INSERT INTO `requisicoes_materiais` (`cod_requisicao`, `cod_material`, `quantidade`) VALUES
(28, 10, 500),
(28, 13, 10),
(28, 25, 25),
(28, 26, 40),
(29, 11, 20),
(29, 20, 35),
(29, 28, 100),
(30, 27, 200),
(31, 13, 5),
(31, 25, 20),
(31, 28, 80);

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
-- Indexes for table `materiais_secundarios`
--
ALTER TABLE `materiais_secundarios`
  ADD PRIMARY KEY (`cod_material`),
  ADD KEY `cod_material` (`cod_material`);

--
-- Indexes for table `requisicoes`
--
ALTER TABLE `requisicoes`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `requisicoes_materiais`
--
ALTER TABLE `requisicoes_materiais`
  ADD PRIMARY KEY (`cod_requisicao`,`cod_material`) USING BTREE,
  ADD KEY `fk_cod_material_requisicoes` (`cod_material`);

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
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `requisicoes`
--
ALTER TABLE `requisicoes`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tipos_onda`
--
ALTER TABLE `tipos_onda`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipos_papelao`
--
ALTER TABLE `tipos_papelao`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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

--
-- Limitadores para a tabela `materiais_secundarios`
--
ALTER TABLE `materiais_secundarios`
  ADD CONSTRAINT `fk_cod_material_matsec` FOREIGN KEY (`cod_material`) REFERENCES `materiais` (`cod`);

--
-- Limitadores para a tabela `requisicoes_materiais`
--
ALTER TABLE `requisicoes_materiais`
  ADD CONSTRAINT `fk_cod_material_requisicoes` FOREIGN KEY (`cod_material`) REFERENCES `materiais` (`cod`),
  ADD CONSTRAINT `fk_cod_requisicao` FOREIGN KEY (`cod_requisicao`) REFERENCES `requisicoes` (`cod`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
