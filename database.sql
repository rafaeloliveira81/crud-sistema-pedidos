-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 23, 2021 at 01:04 PM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal-log
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coletek`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clientes`
--

CREATE TABLE `Clientes` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Itens_Pedido`
--

CREATE TABLE `Itens_Pedido` (
  `codigo` int(11) NOT NULL,
  `cod_pedido` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `unitario` decimal(15,2) NOT NULL,
  `quantidade` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Pedidos`
--

CREATE TABLE `Pedidos` (
  `codigo` int(11) NOT NULL,
  `data` date NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `total` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Produtos`
--

CREATE TABLE `Produtos` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `preco` decimal(15,2) NOT NULL,
  `unidade` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `cpf_unico` (`cpf`);

--
-- Indexes for table `Itens_Pedido`
--
ALTER TABLE `Itens_Pedido`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_item_pedido` (`cod_pedido`),
  ADD KEY `fk_item_produto` (`cod_produto`);

--
-- Indexes for table `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_pedido_cliente` (`cod_cliente`);

--
-- Indexes for table `Produtos`
--
ALTER TABLE `Produtos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Itens_Pedido`
--
ALTER TABLE `Itens_Pedido`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pedidos`
--
ALTER TABLE `Pedidos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Produtos`
--
ALTER TABLE `Produtos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Itens_Pedido`
--
ALTER TABLE `Itens_Pedido`
  ADD CONSTRAINT `fk_item_pedido` FOREIGN KEY (`cod_pedido`) REFERENCES `Pedidos` (`codigo`),
  ADD CONSTRAINT `fk_item_produto` FOREIGN KEY (`cod_produto`) REFERENCES `Produtos` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`cod_cliente`) REFERENCES `Clientes` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
