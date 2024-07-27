-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jul-2024 às 20:46
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `luigi_pdo_mvc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bandeiras`
--

CREATE TABLE `bandeiras` (
  `id_band` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `imagem` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bandeiras`
--

INSERT INTO `bandeiras` (`id_band`, `nome`, `imagem`) VALUES
(1, 'Petrobras', 'petrobras_logo.png'),
(2, 'Shell', 'shell_logo.png'),
(3, 'Ipiranga', 'ipiranga_image.png'),
(4, 'Coqueiro', 'coqueiro_logo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postos`
--

CREATE TABLE `postos` (
  `id_posto` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `cep` varchar(250) NOT NULL,
  `cidade` varchar(250) NOT NULL,
  `cordX` decimal(11,8) NOT NULL,
  `cordY` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `postos`
--

INSERT INTO `postos` (`id_posto`, `nome`, `cnpj`, `endereco`, `cep`, `cidade`, `cordX`, `cordY`) VALUES
(1, 'Posto da Bento\r\n', '982365283675', 'Av. Bento Gonçalves, 3465', '96015-145', 'Pelotas', '23.34634560', '-34.34734456'),
(2, 'Posto Central', '12345678901234', 'Rua Principal, 1000', '90000-000', 'Porto Alegre', '-30.02770000', '-51.22870000'),
(3, 'Posto Norte', '56789012345678', 'Av. dos Estados, 3456', '90200-000', 'Porto Alegre', '-29.98760000', '-51.20340000'),
(4, 'Posto Sul', '23456789012345', 'Rua da Praia, 123', '94000-000', 'Canoas', '-29.91230000', '-51.18540000'),
(5, 'Posto Leste', '34567890123456', 'Av. Getúlio Vargas, 5678', '93000-000', 'São Leopoldo', '15.75460000', '-51.14970000'),
(6, 'Posto Oeste', '45678901234567', 'Rua das Flores, 910', '97000-000', 'Santa Maria', '-29.68670000', '-53.80660000'),
(7, 'Posto da Serra', '56789012345679', 'Av. Independência, 1122', '95000-000', 'Caxias do Sul', '-29.16840000', '-51.17920000'),
(8, 'Posto do Vale', '67890123456789', 'Rua Bento Gonçalves, 2345', '93000-000', 'Novo Hamburgo', '-29.67890000', '-51.12980000'),
(9, 'Posto da Fronteira', '78901234567890', 'Av. Brasil, 3456', '97500-000', 'Uruguaiana', '29.75430000', '-57.08870000'),
(10, 'Posto do Centro', '89012345678901', 'Rua das Andradas, 6789', '96020-000', 'Pelotas', '-31.77050000', '-52.34340000'),
(11, 'Posto do Litoral', '90123456789012', 'Av. Beira Mar, 9101', '95500-000', 'Tramandaí', '-29.98130000', '-50.13240000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `cpf` varchar(250) NOT NULL,
  `cidade` varchar(250) NOT NULL,
  `cep` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome`, `email`, `cpf`, `cidade`, `cep`) VALUES
(1, 'Rafael Gomes', 'rafaelgomes@gmail.com', '235.346.754-34', 'Pelotas', '95675-060'),
(2, 'Mariana Silva', 'marianasilva@gmail.com', '123.456.789-00', 'Porto Alegre', '90035-001'),
(3, 'Carlos Souza', 'carlossouza@hotmail.com', '234.567.890-12', 'Canoas', '92130-020'),
(4, 'Fernanda Almeida', 'fernanda.almeida@yahoo.com', '345.678.901-23', 'Novo Hamburgo', '93320-030'),
(5, 'Roberto Lima', 'roberto.lima@outlook.com', '456.789.012-34', 'São Leopoldo', '93010-040');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bandeiras`
--
ALTER TABLE `bandeiras`
  ADD PRIMARY KEY (`id_band`);

--
-- Índices para tabela `postos`
--
ALTER TABLE `postos`
  ADD PRIMARY KEY (`id_posto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bandeiras`
--
ALTER TABLE `bandeiras`
  MODIFY `id_band` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `postos`
--
ALTER TABLE `postos`
  MODIFY `id_posto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
