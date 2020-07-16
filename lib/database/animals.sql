-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jul-2020 às 04:49
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste-ambplan`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `nome_animal` varchar(255) NOT NULL,
  `proprietario` varchar(255) NOT NULL,
  `cor_animal` varchar(55) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo_animal` varchar(10) NOT NULL,
  `porte_animal` varchar(10) NOT NULL,
  `pelagem_animal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animals`
--

INSERT INTO `animals` (`id`, `nome_animal`, `proprietario`, `cor_animal`, `idade`, `sexo_animal`, `porte_animal`, `pelagem_animal`) VALUES
(34, 'Bolota', 'Victor', 'Branco', 2, '1', '1', '1'),
(35, 'Bob', 'Pedro', 'preto ', 12, '1', '2', '2'),
(36, 'Bob', 'Pedro', 'preto ', 12, '1', '2', '2'),
(38, 'Lua', 'victor', 'Bege', 2, '2', '1', '1'),
(41, 'linda', 'Julia', 'branca', 0, '2', '3', '3'),
(42, 'Ninja', 'Henrique', 'preto', 10, '1', '3', '1'),
(50, 'Lua', 'victor', 'Preto', 1, '2', '1', '2'),
(52, 'rex', 'Lucas', 'Preto', 3, '1', '3', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
