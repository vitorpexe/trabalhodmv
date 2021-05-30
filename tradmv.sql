-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2021 às 12:49
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tradmv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `city`
--

CREATE TABLE `city` (
  `idCity` int(11) NOT NULL,
  `nameCity` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `city`
--

INSERT INTO `city` (`idCity`, `nameCity`) VALUES
(1, 'sumare'),
(22, 'Campinas'),
(24, 'Hortolandia'),
(25, 'Nova Odessa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(13) NOT NULL,
  `nomeCliente` varchar(50) NOT NULL,
  `planoCliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nomeCliente`, `planoCliente`) VALUES
(1, 'Gilberto', 'plano simples'),
(2, 'julia', 'plano simples'),
(3, 'julia', 'plano simples'),
(4, 'daniel', 'plano mediano'),
(5, 'murilo', 'plano avançado'),
(6, 'murilo', 'plano avançado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `ID_COMPRA` int(11) NOT NULL,
  `DATA_COMPRA` datetime DEFAULT current_timestamp(),
  `TOTAL_PRECO` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`ID_COMPRA`, `DATA_COMPRA`, `TOTAL_PRECO`) VALUES
(1, '2021-04-27 22:08:04', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_produto`
--

CREATE TABLE `compra_produto` (
  `ID` int(11) NOT NULL,
  `FK_PRODUTO` int(11) NOT NULL,
  `FK_COMPRA` int(11) NOT NULL,
  `QTD_PRODUTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `compra_produto`
--

INSERT INTO `compra_produto` (`ID`, `FK_PRODUTO`, `FK_COMPRA`, `QTD_PRODUTO`) VALUES
(9, 2, 1, 1),
(10, 1, 1, 1),
(11, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logging`
--

CREATE TABLE `logging` (
  `idLogging` int(11) NOT NULL,
  `dateLogging` datetime NOT NULL,
  `level` varchar(100) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `fk_reg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logging`
--

INSERT INTO `logging` (`idLogging`, `dateLogging`, `level`, `msg`, `fk_reg`) VALUES
(9, '2021-04-29 11:39:42', 'INFO', 'Teste DB v1', 39),
(28, '2021-05-25 07:48:09', 'INFO', 'Executando a tarefa X...', 39),
(29, '2021-05-25 07:48:09', 'WARNING', 'Isto é um aviso.... a operação X pode falhar...', 39),
(30, '2021-05-25 07:48:09', 'ERROR', 'Isto é um erro. A operação X falhou', 39);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `ID_PRODUTO` int(11) NOT NULL,
  `NOME_PRODUTO` varchar(30) NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`ID_PRODUTO`, `NOME_PRODUTO`, `price`) VALUES
(1, 'PLANO SIMPLES', 10),
(2, 'PLANO MEDIANO', 50),
(3, 'PLANO AVANÇADO', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile_reg`
--

CREATE TABLE `profile_reg` (
  `idProfile` int(11) NOT NULL,
  `nameProfile` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profile_reg`
--

INSERT INTO `profile_reg` (`idProfile`, `nameProfile`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reg`
--

CREATE TABLE `reg` (
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(15) NOT NULL,
  `image` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `id` int(11) NOT NULL,
  `fk_idProfile` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reg`
--

INSERT INTO `reg` (`name`, `username`, `password`, `city`, `image`, `gender`, `id`, `fk_idProfile`) VALUES
('daniel', 'da', '123', 'londrina', 'image/da.jpeg', 'male', 39, 2),
('murilo', 'mu123', '123', 'Hortolandia', 'image/mu.jpeg', 'male', 40, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`idCity`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID_COMPRA`);

--
-- Índices para tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  ADD PRIMARY KEY (`ID`,`FK_PRODUTO`,`FK_COMPRA`),
  ADD KEY `FK_PRODUTO` (`FK_PRODUTO`),
  ADD KEY `FK_COMPRA` (`FK_COMPRA`);

--
-- Índices para tabela `logging`
--
ALTER TABLE `logging`
  ADD PRIMARY KEY (`idLogging`),
  ADD KEY `fk_reg` (`fk_reg`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID_PRODUTO`);

--
-- Índices para tabela `profile_reg`
--
ALTER TABLE `profile_reg`
  ADD PRIMARY KEY (`idProfile`);

--
-- Índices para tabela `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idProfile` (`fk_idProfile`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `city`
--
ALTER TABLE `city`
  MODIFY `idCity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `ID_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `logging`
--
ALTER TABLE `logging`
  MODIFY `idLogging` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `ID_PRODUTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `profile_reg`
--
ALTER TABLE `profile_reg`
  MODIFY `idProfile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  ADD CONSTRAINT `compra_produto_ibfk_1` FOREIGN KEY (`FK_PRODUTO`) REFERENCES `produto` (`ID_PRODUTO`),
  ADD CONSTRAINT `compra_produto_ibfk_2` FOREIGN KEY (`FK_COMPRA`) REFERENCES `compra` (`ID_COMPRA`);

--
-- Limitadores para a tabela `logging`
--
ALTER TABLE `logging`
  ADD CONSTRAINT `logging_ibfk_1` FOREIGN KEY (`fk_reg`) REFERENCES `reg` (`id`);

--
-- Limitadores para a tabela `reg`
--
ALTER TABLE `reg`
  ADD CONSTRAINT `reg_ibfk_1` FOREIGN KEY (`fk_idProfile`) REFERENCES `profile_reg` (`idProfile`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
