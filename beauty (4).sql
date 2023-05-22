-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Maio-2023 às 00:53
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `beauty`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `id_Agendamento` int(10) UNSIGNED NOT NULL,
  `DataAgendamento` date NOT NULL,
  `HoraAgendamento` time NOT NULL,
  `SituacaoAgendamento` varchar(120) NOT NULL DEFAULT 'NOT NULL',
  `id_cliente` int(11) UNSIGNED NOT NULL,
  `id_Salao` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_Cliente` int(10) UNSIGNED NOT NULL,
  `CPF_cliente` varchar(14) NOT NULL,
  `NomeCliente` varchar(225) NOT NULL DEFAULT 'NOT NULL',
  `DadosCartaoCliente` varchar(160) NOT NULL DEFAULT 'NOT NULL',
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `ip` int(11) NOT NULL,
  `pais` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(155) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`ip`, `pais`, `cidade`, `cep`, `estado`) VALUES
(1, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id_Favoritos` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(11) UNSIGNED NOT NULL,
  `id_Salao` int(11) UNSIGNED NOT NULL,
  `id_Servico` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Celke - Matriz', '5550 Avenida Republica Argentina, Curitiba', -25.494970, -49.294357, 'EducaÃ§Ã£o'),
(2, 'Celke - Filial 1', '1610 Av. Carlos Gomes, Porto Alegre', -30.034855, -51.177143, 'EducaÃ§Ã£o'),
(3, 'Celke - Filial 2', '575 Avenida Paulista, SÃ£o Paulo', -23.568130, -46.649166, 'EducaÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_Pagto` int(10) UNSIGNED NOT NULL,
  `FormaPagto` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `ValidarPagto` tinyint(1) NOT NULL,
  `id_Salao` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE `profissional` (
  `id_Profissional` int(10) UNSIGNED NOT NULL,
  `NomeProfissional` varchar(225) NOT NULL DEFAULT 'NOT NULL',
  `FuncaoProfissional` varchar(160) NOT NULL DEFAULT 'NOT NULL',
  `id_Salao` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profissional`
--

INSERT INTO `profissional` (`id_Profissional`, `NomeProfissional`, `FuncaoProfissional`, `id_Salao`) VALUES
(1, 'marcio', 'cabelo unha maquiagem', 1),
(2, 'joao', 'cabelo unha maquiagem', 1),
(4, 'pedro', ' unha ', 1),
(5, 'joao 3', 'cabelo unha ', 3),
(6, 'Luana 3', ' unha ', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salao`
--

CREATE TABLE `salao` (
  `id_Salao` int(10) UNSIGNED NOT NULL,
  `CNPJ_Salao` varchar(18) NOT NULL DEFAULT 'NOT NULL',
  `NomeFantasiaSalao` varchar(120) NOT NULL DEFAULT 'NOT NULL',
  `DadosContaSalao` varchar(120) NOT NULL DEFAULT 'NOT NULL',
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `salao`
--

INSERT INTO `salao` (`id_Salao`, `CNPJ_Salao`, `NomeFantasiaSalao`, `DadosContaSalao`, `id_usuario`) VALUES
(1, '11.111.111/1111-11', 'heriwelton', 'NOT NULL', 0),
(2, '22.222.222/2222-22', 'heriwelton', 'NOT NULL', 0),
(3, '33.333.333/3333-33', 'salao2', 'NOT NULL', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_Servico` int(10) UNSIGNED NOT NULL,
  `TipoServico` varchar(120) NOT NULL,
  `ValorServico` double NOT NULL,
  `id_Pagto` int(11) UNSIGNED NOT NULL,
  `id_Profissional` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_Servico`, `TipoServico`, `ValorServico`, `id_Pagto`, `id_Profissional`) VALUES
(1, 'cabelo', 3, 0, 2),
(4, 'unha', 10, 0, 4),
(5, 'unha', 20, 0, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(10) UNSIGNED NOT NULL,
  `EnderecoUsuario` varchar(120) NOT NULL DEFAULT 'NOT NULL',
  `TelefoneUsuario` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `BairroUsuario` varchar(120) NOT NULL DEFAULT 'NOT NULL',
  `NumEdcUsuario` varchar(15) NOT NULL DEFAULT 'NOT NULL',
  `EmailUsuario` varchar(120) NOT NULL DEFAULT 'NOT NULL',
  `SenhaUsuario` varchar(60) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `EnderecoUsuario`, `TelefoneUsuario`, `BairroUsuario`, `NumEdcUsuario`, `EmailUsuario`, `SenhaUsuario`) VALUES
(1, 'NOT NULL', 'NOT NULL', 'NOT NULL', 'NOT NULL', 'heriwelton1@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'NOT NULL', 'NOT NULL', 'NOT NULL', 'NOT NULL', 'aa@123', '202cb962ac59075b964b07152d234b70'),
(3, 'NOT NULL', 'NOT NULL', 'NOT NULL', 'NOT NULL', 'teste@123', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id_Agendamento`),
  ADD KEY `FK_idcliente` (`id_cliente`) USING BTREE,
  ADD KEY `FK_idsalao` (`id_Salao`) USING BTREE;

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`ip`);

--
-- Índices para tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_Favoritos`),
  ADD KEY `Fk_idSalao` (`id_Salao`) USING BTREE,
  ADD KEY `Fk_idserviço` (`id_Servico`) USING BTREE,
  ADD KEY `FK_idcliente1` (`id_cliente`) USING BTREE;

--
-- Índices para tabela `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_Pagto`),
  ADD KEY `FK_id_salao1` (`id_Salao`) USING BTREE;

--
-- Índices para tabela `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`id_Profissional`),
  ADD KEY `Fk_idsalao3` (`id_Salao`) USING BTREE;

--
-- Índices para tabela `salao`
--
ALTER TABLE `salao`
  ADD PRIMARY KEY (`id_Salao`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_Servico`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id_Agendamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_Cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `ip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_Favoritos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_Pagto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `profissional`
--
ALTER TABLE `profissional`
  MODIFY `id_Profissional` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `salao`
--
ALTER TABLE `salao`
  MODIFY `id_Salao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_Servico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `FK_idCliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_idSalao` FOREIGN KEY (`id_Salao`) REFERENCES `salao` (`id_Salao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `FK_idCliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_idSalao1` FOREIGN KEY (`id_Salao`) REFERENCES `salao` (`id_Salao`),
  ADD CONSTRAINT `FK_idServico` FOREIGN KEY (`id_Servico`) REFERENCES `servico` (`id_Servico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `FK_idSalao2` FOREIGN KEY (`id_Salao`) REFERENCES `salao` (`id_Salao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `profissional`
--
ALTER TABLE `profissional`
  ADD CONSTRAINT `FK_idSalao3` FOREIGN KEY (`id_Salao`) REFERENCES `salao` (`id_Salao`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
