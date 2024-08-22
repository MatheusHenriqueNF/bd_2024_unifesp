-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/08/2024 às 04:41
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cd_banco_ivan`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `assinatura`
--

CREATE TABLE `assinatura` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_cliente` int(11) UNSIGNED DEFAULT NULL,
  `id_plano` int(11) UNSIGNED DEFAULT NULL,
  `data_assinatura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `assinatura`
--

INSERT INTO `assinatura` (`id`, `id_cliente`, `id_plano`, `data_assinatura`) VALUES
(1, 13, NULL, '2024-08-21'),
(3, 16, NULL, '2024-08-21'),
(4, 17, NULL, '2024-08-21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) UNSIGNED NOT NULL,
  `bairro` text DEFAULT NULL,
  `rua` text DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` text DEFAULT NULL,
  `cidade` text DEFAULT NULL,
  `id_informacao_pessoal` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id`, `bairro`, `rua`, `cep`, `numero`, `complemento`, `cidade`, `id_informacao_pessoal`) VALUES
(1, 'Atoa 1', 'Rua atoa 2', 1111111, 174, 'Casa', 'São Paulo', 3),
(6, 'Atoa 1', 'Rua atoa 1', 1, 174, 'Casa', 'São Paulo', 10),
(7, 'Atoa 1', 'Rua atoa 1', 1, 174, 'Casa', 'São Paulo', 11),
(8, 'Atoa 1', 'Rua atoa 1', 1, 174, 'Casa', 'São Paulo', 13),
(11, 'rtrt', 'ttr', 66, 44, 'rtrt', 'São Paulo', 16),
(12, 'Vila Baruel', 'trt', 1, 174, 'trt', 'São Paulo', 17);

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacao_pessoal`
--

CREATE TABLE `informacao_pessoal` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nasc` date NOT NULL,
  `genero` varchar(15) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `oculto` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `informacao_pessoal`
--

INSERT INTO `informacao_pessoal` (`id`, `nome`, `sobrenome`, `cpf`, `data_nasc`, `genero`, `telefone`, `email`, `senha`, `oculto`) VALUES
(3, 'cliente1', 'unif', '1', '2024-08-01', 'feminino', 1, 'cliente1@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(10, 'Tets2', 'Te', '01', '2024-07-30', 'masculino', 1, 'bologordo131@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(11, 'Tets2', 'Te', '01', '2024-07-30', 'masculino', 1, 'bologordo1311@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 1),
(13, 'Tets2', 'Te', '01', '2024-07-30', 'masculino', 1, 'bologordo13121@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(16, 'tt', 'fdf', '5', '2024-08-08', 'masculino', 77, 'hhghg@gmail.com', 'a87ff679a2f3e71d9181a67b7542122c', 1),
(17, 'User', 'Teste', '12', '2024-07-31', 'masculino', 1, 'user@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `plano`
--

CREATE TABLE `plano` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `plano`
--

INSERT INTO `plano` (`id`, `nome`, `valor`) VALUES
(1, 'Fit', 119.00),
(2, 'Uni', 129.90),
(3, 'Red', 139.90),
(4, 'UniPremium', 149.90);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `assinatura`
--
ALTER TABLE `assinatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_plano` (`id_plano`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_informacao_pessoal` (`id_informacao_pessoal`);

--
-- Índices de tabela `informacao_pessoal`
--
ALTER TABLE `informacao_pessoal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assinatura`
--
ALTER TABLE `assinatura`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `informacao_pessoal`
--
ALTER TABLE `informacao_pessoal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `plano`
--
ALTER TABLE `plano`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `assinatura`
--
ALTER TABLE `assinatura`
  ADD CONSTRAINT `assinatura_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `informacao_pessoal` (`id`),
  ADD CONSTRAINT `assinatura_ibfk_2` FOREIGN KEY (`id_plano`) REFERENCES `plano` (`id`);

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_informacao_pessoal`) REFERENCES `informacao_pessoal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
