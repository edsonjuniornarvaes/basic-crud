-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2019 às 07:29
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_social`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_fisica`
--

CREATE TABLE `pessoa_fisica` (
  `id_pessoa` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `sexo` char(2) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `celular` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa_fisica`
--

INSERT INTO `pessoa_fisica` (`id_pessoa`, `cpf`, `nome`, `rg`, `sexo`, `dt_nascimento`, `endereco`, `telefone`, `celular`) VALUES
(1, '04663048978', 'Edson Junior Andrade Narvaes', '123456789', 'M', '1997-09-25', '0', '', '44997253874'),
(5, '03115779038', 'Usuário teste 1', '', 'M', '1992-10-01', '0', '44998759875', '66879855687');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_juridica`
--

CREATE TABLE `pessoa_juridica` (
  `id_pessoa` int(11) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `inscricao_estadual` varchar(12) NOT NULL,
  `dt_fundacao` date NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `celular` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa_juridica`
--

INSERT INTO `pessoa_juridica` (`id_pessoa`, `cnpj`, `razao_social`, `nome_fantasia`, `inscricao_estadual`, `dt_fundacao`, `endereco`, `telefone`, `celular`) VALUES
(1, '64700342000105', 'LOJA DO JOZE COMERCIO DE CALCADOS LTDA', 'Loja do José', '978.78468-20', '1992-05-01', 'teste 1', '58585858', '(44) 99969-855'),
(7, '90300729000176', 'Jurídica 1', 'Jurídica', '45878785', '1991-08-01', 'teste 2', '44598775', '36598898');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- Índices para tabela `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
