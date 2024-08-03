-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Ago-2024 às 03:13
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
-- Banco de dados: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bandeiras`
--

CREATE TABLE `bandeiras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bandeiras`
--

INSERT INTO `bandeiras` (`id`, `nome`, `imagem`, `created_at`, `updated_at`) VALUES
(1, 'Petrobras', 'petrobras_logo.png', '2024-08-03 00:33:54', '2024-08-03 00:33:54'),
(2, 'Shell', 'shell_logo.png', '2024-08-03 00:33:54', '2024-08-03 00:33:54'),
(3, 'Ipiranga', 'ipiranga_image.png', '2024-08-03 00:33:54', '2024-08-03 00:33:54'),
(4, 'Coqueiro', 'coqueiro_logo.png', '2024-08-03 00:33:54', '2024-08-03 00:33:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_02_180144_create_postos_table', 1),
(5, '2024_08_02_180152_create_usuarios_table', 1),
(6, '2024_08_02_180159_create_bandeiras_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postos`
--

CREATE TABLE `postos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cordX` decimal(8,2) NOT NULL,
  `cordY` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `postos`
--

INSERT INTO `postos` (`id`, `nome`, `cnpj`, `endereco`, `cep`, `cidade`, `cordX`, `cordY`, `created_at`, `updated_at`) VALUES
(1, 'Posto da Bento\r\n', '982365283675', 'Av. Bento Gonçalves, 3465', '96015-145', 'Pelotas', '23.35', '-34.35', '2024-08-03 00:31:27', '2024-08-03 00:31:27'),
(2, 'Posto Central', '12345678901234', 'Rua Principal, 1000', '90000-000', 'Porto Alegre', '-30.03', '-51.23', '2024-08-03 00:31:27', '2024-08-03 00:31:27'),
(3, 'Posto Norte', '56789012345678', 'Av. dos Estados, 3456', '90200-000', 'Porto Alegre', '-29.99', '-51.20', '2024-08-03 00:31:27', '2024-08-03 00:31:27'),
(4, 'Posto Sul', '23456789012345', 'Rua da Praia, 123', '94000-000', 'Canoas', '-29.91', '-51.19', '2024-08-03 00:31:27', '2024-08-03 00:31:27'),
(5, 'Posto Leste', '34567890123456', 'Av. Getúlio Vargas, 5678', '93000-000', 'São Leopoldo', '15.75', '-51.15', '2024-08-03 00:31:27', '2024-08-03 00:31:27'),
(6, 'Posto Oeste', '45678901234567', 'Rua das Flores, 910', '97000-000', 'Santa Maria', '-29.69', '-53.81', '2024-08-03 00:31:27', '2024-08-03 00:31:27'),
(7, 'Posto da Serra', '56789012345679', 'Av. Independência, 1122', '95000-000', 'Caxias do Sul', '-29.17', '-51.18', '2024-08-03 00:31:27', '2024-08-03 00:31:27'),
(8, 'Posto do Vale', '67890123456789', 'Rua Bento Gonçalves, 2345', '93000-000', 'Novo Hamburgo', '-29.68', '-51.13', '2024-08-03 00:31:27', '2024-08-03 00:31:27'),
(9, 'Posto da Fronteira', '78901234567890', 'Av. Brasil, 3456', '97500-000', 'Uruguaiana', '29.75', '-57.09', '2024-08-03 00:31:27', '2024-08-03 00:31:27'),
(10, 'Posto do Centro', '89012345678901', 'Rua das Andradas, 6789', '96020-000', 'Pelotas', '-31.77', '-52.34', '2024-08-03 00:31:27', '2024-08-03 00:31:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('C2WiD17ZAxd6mWf7EnRbcXtsS8IsjuN7MyQYmkCt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1YwTVJMc0d6V2NLejN0eG8xZUo1U0FQQ3BpbVlmNUt2OXpMUmJIZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c3Vhcmlvcy8zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1722647526);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `cidade`, `cep`, `created_at`, `updated_at`) VALUES
(1, 'Rafael Gomes', 'rafaelgomes@gmail.com', '235.346.754-34', 'Pelotas', '95675-060', '2024-08-03 00:32:53', '2024-08-03 00:32:53'),
(2, 'Mariana Silva', 'marianasilva@gmail.com', '123.456.789-00', 'Porto Alegre', '90035-001', '2024-08-03 00:32:53', '2024-08-03 00:32:53'),
(3, 'Carlos Souza', 'carlossouza@hotmail.com', '234.567.890-12', 'Canoas', '92130-020', '2024-08-03 00:32:53', '2024-08-03 00:32:53'),
(4, 'Fernanda Almeida', 'fernanda.almeida@yahoo.com', '345.678.901-23', 'Novo Hamburgo', '93320-030', '2024-08-03 00:32:53', '2024-08-03 00:32:53'),
(5, 'Roberto Lima', 'roberto.lima@outlook.com', '456.789.012-34', 'São Leopoldo', '93010-040', '2024-08-03 00:32:53', '2024-08-03 00:32:53');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bandeiras`
--
ALTER TABLE `bandeiras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices para tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `postos`
--
ALTER TABLE `postos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bandeiras`
--
ALTER TABLE `bandeiras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `postos`
--
ALTER TABLE `postos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
