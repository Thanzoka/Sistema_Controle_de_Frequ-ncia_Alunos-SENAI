-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/10/2024 às 01:29
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_controle`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_a`
--

CREATE TABLE `cadastro_a` (
  `id_aluno` int(11) NOT NULL,
  `nome` longtext NOT NULL,
  `numero_matricula` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_e`
--

CREATE TABLE `cadastro_e` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` longtext NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `email_empresa` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_u`
--

CREATE TABLE `cadastro_u` (
  `id_usuario` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_u`
--

INSERT INTO `cadastro_u` (`id_usuario`, `name`, `usuario`, `cpf`, `email`, `password`) VALUES
(1, '', 'admin', '', '', 'admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `controle_faltas`
--

CREATE TABLE `controle_faltas` (
  `id_arquivo` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `justificativa`
--

CREATE TABLE `justificativa` (
  `id_justificativa` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `modalidade` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `curso_m` varchar(1000) NOT NULL,
  `doc` varchar(100) NOT NULL,
  `contratante` varchar(1000) NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  `obs` longtext NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `id_solicitacao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `modalidade` varchar(100) NOT NULL,
  `curso_m` varchar(100) NOT NULL,
  `documentos` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicita_ex`
--

CREATE TABLE `solicita_ex` (
  `id_exaluno` int(11) NOT NULL,
  `nome_ex_aluno` longtext NOT NULL,
  `data` date NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` longtext NOT NULL,
  `cidade` longtext NOT NULL,
  `estado` varchar(5) NOT NULL,
  `arquivo_frente` varchar(100) NOT NULL,
  `arquivo_verso` varchar(100) NOT NULL,
  `curso_realizou` longtext NOT NULL,
  `data_aprox` date NOT NULL,
  `documentos` varchar(100) NOT NULL,
  `rec` varchar(100) NOT NULL,
  `obs` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro_a`
--
ALTER TABLE `cadastro_a`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `matricula` (`numero_matricula`,`cpf`,`telefone`,`email`);

--
-- Índices de tabela `cadastro_e`
--
ALTER TABLE `cadastro_e`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `cnpj` (`cnpj`,`telefone`,`email_empresa`);

--
-- Índices de tabela `cadastro_u`
--
ALTER TABLE `cadastro_u`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `controle_faltas`
--
ALTER TABLE `controle_faltas`
  ADD PRIMARY KEY (`id_arquivo`);

--
-- Índices de tabela `justificativa`
--
ALTER TABLE `justificativa`
  ADD PRIMARY KEY (`id_justificativa`);

--
-- Índices de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`id_solicitacao`);

--
-- Índices de tabela `solicita_ex`
--
ALTER TABLE `solicita_ex`
  ADD PRIMARY KEY (`id_exaluno`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_a`
--
ALTER TABLE `cadastro_a`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_e`
--
ALTER TABLE `cadastro_e`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_u`
--
ALTER TABLE `cadastro_u`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `controle_faltas`
--
ALTER TABLE `controle_faltas`
  MODIFY `id_arquivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `justificativa`
--
ALTER TABLE `justificativa`
  MODIFY `id_justificativa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `solicita_ex`
--
ALTER TABLE `solicita_ex`
  MODIFY `id_exaluno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
