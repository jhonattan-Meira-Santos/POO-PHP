-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Fev-2023 às 14:45
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `idworks`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ramais`
--

CREATE TABLE `ramais` (
  `id` int(12) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `ip` text DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `dataRegistro` datetime DEFAULT NULL,
  `dataAlteracao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ramais`
--

INSERT INTO `ramais` (`id`, `nome`, `ip`, `status`, `numero`, `dataRegistro`, `dataAlteracao`) VALUES
(1, '7000/7000 ', ' 181.219.125.7', 'OK', 42367, '2023-02-12 20:07:01', NULL),
(2, '7001/7001', '181.219.125.7', 'OK', 42368, '2023-02-12 20:07:01', NULL),
(3, '7004/7002', '(Unspecified)', 'UNKNOWN', 0, '2023-02-12 20:07:01', NULL),
(4, '7003/7003', '(Unspecified)', 'UNKNOWN', 0, '2023-02-12 20:07:01', NULL),
(5, '7002/7004', '181.219.125.7', 'OK', 42369, '2023-02-12 20:07:22', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ramais`
--
ALTER TABLE `ramais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ramais`
--
ALTER TABLE `ramais`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
