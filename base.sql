-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2019 às 22:13
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `adminid` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `obs` mediumtext,
  `status` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`adminid`, `nome`, `telefone`, `email`, `senha`, `obs`, `status`, `tipo`) VALUES
(1, 'Victor Oliveira', '15981312247', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '', 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_login`
--

CREATE TABLE `auth_login` (
  `idauth_login` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `usuario` text,
  `logs` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `auth_login`
--

INSERT INTO `auth_login` (`idauth_login`, `tipo`, `data`, `ip`, `usuario`, `logs`) VALUES
(1, 'VISITANTE', '2019-05-21 19:12:57', '127.0.0.1', 'Alguem entrou', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0'),
(2, 'ENTRADA', '2019-05-21 19:13:00', '127.0.0.1', 'Victor Oliveira admin@admin.com', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0'),
(3, 'VISITANTE', '2019-05-21 20:07:27', '127.0.0.1', 'Alguem entrou', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0'),
(4, 'ENTRADA', '2019-05-21 20:07:29', '127.0.0.1', 'Victor Oliveira admin@admin.com', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `clientesid` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `endereco` longtext,
  `numero` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(10) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `log_alteracao` longtext,
  `log_criacao` longtext,
  `criado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`clientesid`, `nome`, `sobrenome`, `email`, `telefone`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `documento`, `tipo_documento`, `cep`, `log_alteracao`, `log_criacao`, `criado`) VALUES
(1, 'Victor Oliveira', 'Del', 'victor_oliveira@gmail.com', '123456789', 'Rua Coronel César Eugênio Piedade', '560', 'Jardim Itália', 'Itapetininga', 'SP', '156599853', 'CPF', '18201790', NULL, 'Criado em 2019-05-21T14:53:09+02:00 Pelo usuário: Victor Oliveira', '2019-05-21 14:53:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `definicoes`
--

CREATE TABLE `definicoes` (
  `iddefinicoes` int(11) NOT NULL,
  `sysname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `nome_fantasia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `definicoes`
--

INSERT INTO `definicoes` (`iddefinicoes`, `sysname`, `email`, `cnpj`, `nome_fantasia`) VALUES
(0, 'SparkOS', 'sparkos@gmail.com', '1234568900123', 'SparkOS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `idos` int(11) NOT NULL,
  `data_inicial` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `garantia` varchar(45) DEFAULT NULL,
  `descricao` text,
  `defeito` text,
  `status` varchar(45) DEFAULT NULL,
  `observacoes` text,
  `laudo_tecnico` text,
  `valor_total` varchar(45) DEFAULT NULL,
  `cliente` varchar(300) DEFAULT NULL,
  `protocolo` varchar(30) DEFAULT NULL,
  `tecnico` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `produtosid` int(11) NOT NULL,
  `descricao` varchar(80) DEFAULT NULL,
  `unidade` varchar(10) DEFAULT NULL,
  `preco_compra` decimal(10,2) DEFAULT NULL,
  `preco_venda` decimal(10,2) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `estoque_minimo` int(11) DEFAULT NULL,
  `saida` tinyint(1) DEFAULT NULL,
  `entrada` tinyint(1) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `foto` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `servicosid` int(11) NOT NULL,
  `codigo` int(11) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `auth_login`
--
ALTER TABLE `auth_login`
  ADD PRIMARY KEY (`idauth_login`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clientesid`);

--
-- Indexes for table `definicoes`
--
ALTER TABLE `definicoes`
  ADD PRIMARY KEY (`iddefinicoes`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`idos`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produtosid`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`servicosid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_login`
--
ALTER TABLE `auth_login`
  MODIFY `idauth_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clientesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `idos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produtosid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `servicosid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
