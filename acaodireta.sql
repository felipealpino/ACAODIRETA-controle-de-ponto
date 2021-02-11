-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Fev-2021 às 20:26
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradors`
--

CREATE TABLE `colaboradors` (
  `id` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `aniversario` date NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `colaboradors`
--

INSERT INTO `colaboradors` (`id`, `nome`, `email`, `senha`, `aniversario`, `token`) VALUES
(7, 'Felipe Gontijo', 'felipealpino1@gmail.com', '$2y$10$Tk5Y24n1z1kV3pLvbziC0umBmd.Gq4WyCB6SdnaM2XcEzcJaEx3tq', '2021-02-08', 'f11aa785822959961b21ca292ef0c646'),
(13, 'fulano de tal', 'fulanodemelo@gmail.com', '$2y$10$2K/yU4Ab/9Z8JSbBw4ju1u8gvKoFLTzxEOU3mPam7fz8ng8cu/FE6', '2021-02-04', '00530598ba6cb51150ca02eee891be98'),
(15, 'Jony Bravo', 'amJony@gmail.com', '$2y$10$Hk8AfPV8AM6DUe1yt/1rXe/OgxXxNcZxcfiMpMRPeCvKEXWQ9LNDu', '2000-01-12', '25073aad525fe0b848bfb79c5c0aeb0c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos`
--

CREATE TABLE `pontos` (
  `id` int(100) NOT NULL,
  `id_colaborador` int(100) NOT NULL,
  `started_at` datetime DEFAULT NULL,
  `finished_at` datetime DEFAULT NULL,
  `total_horas` float(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pontos`
--

INSERT INTO `pontos` (`id`, `id_colaborador`, `started_at`, `finished_at`, `total_horas`) VALUES
(7, 13, '2020-10-10 00:00:00', '2020-10-10 10:00:00', NULL),
(9, 7, '2021-02-10 17:06:18', '2021-02-10 17:10:40', NULL),
(12, 7, '2021-02-10 18:32:40', '2021-02-10 18:48:42', 0),
(16, 7, '2021-02-10 19:01:48', '2021-02-10 19:56:14', NULL),
(17, 15, '2021-02-10 19:24:02', '2021-02-10 19:56:35', NULL),
(18, 15, '2021-02-10 19:56:39', NULL, NULL),
(19, 7, '2021-02-10 19:57:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `senha`, `token`) VALUES
(1, 'usuario@teste.com', '$2y$10$8465lSgwzNLHK5Hx00FVTuOdOo9CqSKa.MxyshAHGxqVqgHatBn6.', 'f4392fc925ef25c98cb2d9c5789b40df'),
(2, 'usuario1@teste.com', '$2y$10$/GIcFYYGPbzWXMe19SNfXuwGIigc/Ajh0JPDiQemxLHrgUspsBOdO', '375297cc0a550dd34115d3b422960f8b'),
(3, 'usuario3@teste.com', '$2y$10$n6qSW5Cnqo1wtN/UOz8UNu91catsDqFz4DuU8rqNxMGpDcGZM.Upa', '3959a0398d0d4804229422fa5095a646');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `colaboradors`
--
ALTER TABLE `colaboradors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pontos`
--
ALTER TABLE `pontos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `colaboradors`
--
ALTER TABLE `colaboradors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `pontos`
--
ALTER TABLE `pontos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
