-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Set-2022 às 12:01
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemabd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(45) DEFAULT NULL,
  `apelido` varchar(45) DEFAULT NULL,
  `nome_usuario` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `contacto` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `apelido`, `nome_usuario`, `senha`, `contacto`, `endereco`) VALUES
(100, 'Alexandre Montes', 'Amaral', NULL, NULL, '874983200', 'Av. Eduardo Mondlane, Sagrada'),
(101, 'Mondlane Alex', 'Grimaldo', NULL, NULL, '824398578', 'Bairro Aquima'),
(102, 'Marcio Gentil', 'Sabonete', NULL, NULL, '848050394', 'Rua de Franca'),
(103, 'Lucas Bucuanhane', 'Chirrime', NULL, NULL, '850923190', 'Avenida 7 de Setembro '),
(104, 'Alvaro', 'Morata', NULL, NULL, '828402075', 'Av. Mao Tse-Tung'),
(105, 'Belmonte', 'Fascinado', NULL, NULL, '876537983', 'Avenida Marginal'),
(106, 'Manuel', 'Mundo', 'manuel', '12', '87906589', 'Av. Mao Tse-Tung');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomenda`
--

CREATE TABLE `encomenda` (
  `id_encomenda` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `data_entrega` date DEFAULT NULL,
  `local_entrega` varchar(45) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `encomenda`
--

INSERT INTO `encomenda` (`id_encomenda`, `id_cliente`, `id_produto`, `data_entrega`, `local_entrega`, `status`) VALUES
(7, 100, 1002, '2022-07-26', 'Bairro Novo', 'Pendente'),
(8, 105, 1001, '2022-07-27', '  Hotel Elite', 'Pendente'),
(10, 104, 1002, '2022-07-22', 'Mesquita do Brandao', 'Entregue'),
(11, 101, 1003, '2022-07-20', 'Bairro Villapita', 'Perdida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(45) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `genero` varchar(40) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `contacto` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `data_nascimento`, `genero`, `endereco`, `contacto`, `email`) VALUES
(100, 'Rafa Silva', '1993-05-17', 'Masculino', 'Centro HistÃ³rico de Albufeira', '857309839', 'RSilva@gmail,com'),
(101, 'David Neres Campo', '1993-03-03', 'Masculino', 'Av. Mao Tse-Tung', '876288989', 'DNCampos@gmail.com'),
(102, 'Nicola Otamendi', '1988-02-12', 'Masculino', 'Av. Eduardo Mondlane', '84090394', 'Ota@gmail,com'),
(103, 'Beatriz Cameirao', '1999-05-19', 'Femenino', 'Francisco Manhanga', '864982984', 'Bcameirao@gmail.com'),
(104, 'Adel Taarabt', '1989-11-15', 'Masculino', 'Chamanculo', '829309323', 'Adel@gmail.com'),
(105, 'Andreia Faria', '1993-09-07', 'Femenino', 'Av. Marginal', '878981231', 'andreiafaria43@gmail.com'),
(106, 'Ivandro Soares', '1999-12-25', 'Masculino', 'Rua Monte Neve', '842785952', 'ivandrosoares62@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `id_parceiro` int(11) NOT NULL,
  `nome_parceiro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contacto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id_parceiro`, `nome_parceiro`, `cidade`, `endereco`, `email`, `contacto`) VALUES
(111, 'Adila Sabores  e Aroma', 'Quelimane', 'Av. Acordos de Lusaka', 'adila@gmail.com', '859830139'),
(112, 'Casa Das Frutas', 'Quelimane', 'Av. Julius Nherere', 'frutas@gmailcom', '848585480'),
(113, 'Frango A Rony', 'Quelimane', 'Av. Samuel Magaia', 'FranRony@gmail.com', '84 880 0881'),
(114, 'Restaurante Cafuro', 'Quelimane', 'Avenida Marginal', 'cafuro@gmail.com', '827717890');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(45) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `validade` varchar(30) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `id_parceiro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `preco`, `validade`, `quantidade`, `categoria`, `id_parceiro`) VALUES
(1001, 'Peixe Pedra', 300, '', 15, 'Peixes e Mariscos', 112),
(1002, '1/2 de Frango Assado ', 300, '', NULL, 'Prato do dia', 113),
(1003, 'Hamburger Completo ', 400, '', NULL, 'Carnes e Assados', 113);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `nivel_acesso` varchar(30) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `senha`, `nivel_acesso`, `id_funcionario`) VALUES
(100, 'Rafa', '5ecc4aa302d527a68a6538d72190310d', 'Gerente', 101),
(102, 'David', '837c144709d9347ba5c8960fb5166ab2', 'Atendente', 101),
(103, 'beatriz', '0f9f4eed19e683244ad9c28b74bfbb75', 'Administrador', 103),
(107, 'ivandro', 'ivandro', 'Administrador', 106),
(108, NULL, '', NULL, NULL),
(109, 'kiki', '0d61130a6dd5eea85c2c5facfe1c15a7', 'Gerente', NULL),
(110, 'lololo', '80ef61a9478f668711adb7df30543230', 'Atendente', 103);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `encomenda`
--
ALTER TABLE `encomenda`
  ADD PRIMARY KEY (`id_encomenda`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `parceiro`
--
ALTER TABLE `parceiro`
  ADD PRIMARY KEY (`id_parceiro`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_parceiro` (`id_parceiro`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nome_usuario` (`nome_usuario`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `encomenda`
--
ALTER TABLE `encomenda`
  MODIFY `id_encomenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `id_parceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD CONSTRAINT `encomenda_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `encomenda_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `encomenda_ibfk_3` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `encomenda_ibfk_4` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_parceiro`) REFERENCES `parceiro` (`id_parceiro`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
