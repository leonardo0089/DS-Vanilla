-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Nov-2020 às 15:55
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ds-vanilla`
--
CREATE DATABASE IF NOT EXISTS `ds-vanilla` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ds-vanilla`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculo`
--

DROP TABLE IF EXISTS `curriculo`;
CREATE TABLE IF NOT EXISTS `curriculo` (
  `id_curriculo` int(11) NOT NULL AUTO_INCREMENT,
  `dados` varchar(250) NOT NULL,
  `nacionalidade` varchar(80) NOT NULL,
  `telefone` varchar(35) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `deficiencia` varchar(65) NOT NULL,
  `msg_whats` varchar(5) NOT NULL,
  `estado_civil` varchar(25) NOT NULL,
  `data_nasc` date NOT NULL,
  `fk_id_pf` int(11) NOT NULL,
  `foto` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_curriculo`),
  KEY `fk_id_pf` (`fk_id_pf`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curriculo`
--

INSERT INTO `curriculo` (`id_curriculo`, `dados`, `nacionalidade`, `telefone`, `sexo`, `deficiencia`, `msg_whats`, `estado_civil`, `data_nasc`, `fk_id_pf`, `foto`) VALUES
(10, 'asdasdasdasd', 'Brasil', '11 98547-24214', 'Feminino', 'Não possuo', 'Sim', 'Casado(a)', '2020-11-03', 9, 'fotos/SX9oDzS365JoKZlpTjtTUpI7bzc6HLmz91F1xGI6.jpeg'),
(11, 'asdkjlashduahsudhasuidhiuashduhasiudhuasihdiuhasuidhausihduaishdhasuidhuaishduhasiudhiuashui', 'Brasil', '11 87484-8948', 'Masculino', 'Não possuo', 'Sim', 'Casado(a)', '1997-08-20', 10, 'fotos/jnFWlDnbK9WgDD5ipqhn2RexcvHiCepUER510kit.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiencias`
--

DROP TABLE IF EXISTS `experiencias`;
CREATE TABLE IF NOT EXISTS `experiencias` (
  `id_exp` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_curriculo_exp` int(11) NOT NULL,
  `nome_empresa` varchar(150) NOT NULL,
  `cargo` varchar(120) NOT NULL,
  `nivel_hirarquico` varchar(120) NOT NULL,
  `pais_exp` varchar(60) NOT NULL,
  `cidade_exp` varchar(60) NOT NULL,
  `nivel` varchar(100) NOT NULL,
  `desc_atividades` varchar(200) NOT NULL,
  `periodo` varchar(80) NOT NULL,
  `data_inicio` date NOT NULL,
  `termino` date NOT NULL,
  PRIMARY KEY (`id_exp`),
  KEY `fk_exp` (`fk_id_curriculo_exp`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `experiencias`
--

INSERT INTO `experiencias` (`id_exp`, `fk_id_curriculo_exp`, `nome_empresa`, `cargo`, `nivel_hirarquico`, `pais_exp`, `cidade_exp`, `nivel`, `desc_atividades`, `periodo`, `data_inicio`, `termino`) VALUES
(10, 10, 'asdalsndlkasndlkanslk', 'Analista Senior', 'Operacional', 'Brasil', 'São Paulo', 'Curso Técnico', 'sdasdasdasdasdasdasdas', 'Noite', '2020-12-03', '2020-11-10'),
(11, 11, 'RR Consents', 'Analista Senior', 'Analista', 'Selecione o País', 'São Paulo', 'Ensino Superior', 'asdlashdikhjgsuidhgausidiuasgdugasiudgiuasd\r\nasdasoihduaishgduashuidhasuihd', 'Manhã', '2018-06-01', '2020-11-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

DROP TABLE IF EXISTS `formacao`;
CREATE TABLE IF NOT EXISTS `formacao` (
  `id_formacao` int(11) NOT NULL AUTO_INCREMENT,
  `instituicao` varchar(100) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `cidade` varchar(55) NOT NULL,
  `formacao` varchar(120) NOT NULL,
  `nivel` varchar(120) NOT NULL,
  `periodo` varchar(55) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_conclusao` date NOT NULL,
  `status` varchar(80) NOT NULL,
  `fk_curriculo` int(11) NOT NULL,
  PRIMARY KEY (`id_formacao`),
  KEY `fk_form` (`fk_curriculo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `formacao`
--

INSERT INTO `formacao` (`id_formacao`, `instituicao`, `pais`, `cidade`, `formacao`, `nivel`, `periodo`, `data_inicio`, `data_conclusao`, `status`, `fk_curriculo`) VALUES
(10, 'Cruzeriro do Sul', 'Brasil', 'Estados Unidos', 'Logistica', 'Ensino Superior', 'Noite', '2020-11-26', '2020-12-01', 'Completo', 10),
(11, 'Cruzeriro do Sul', 'Brasil', 'São Paulo', 'Analise e Desenvolvimento de Sistemas', 'Curso Técnico', 'Noite', '2019-05-10', '2020-11-27', 'Completo', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `redes_sociais`
--

DROP TABLE IF EXISTS `redes_sociais`;
CREATE TABLE IF NOT EXISTS `redes_sociais` (
  `id_redes_sociais` int(11) NOT NULL AUTO_INCREMENT,
  `fk_curriculo` int(11) NOT NULL,
  `link_linkedin` varchar(120) NOT NULL,
  `link_facebook` varchar(120) NOT NULL,
  `link_twitter` varchar(120) NOT NULL,
  `link_google` varchar(120) NOT NULL,
  `link_youtube` varchar(120) NOT NULL,
  `link_insta` varchar(120) NOT NULL,
  `link_blog` varchar(120) NOT NULL,
  PRIMARY KEY (`id_redes_sociais`),
  KEY `fk_id_curriculo` (`fk_curriculo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `redes_sociais`
--

INSERT INTO `redes_sociais` (`id_redes_sociais`, `fk_curriculo`, `link_linkedin`, `link_facebook`, `link_twitter`, `link_google`, `link_youtube`, `link_insta`, `link_blog`) VALUES
(10, 10, 'jeoewjoirjoewijroiwejoirjweoijroiwejoir', 'asdjnsdjknasukjdnbjkasbdkjbqkjbqkwjhebiuqkwbdiuqw', 'owiejroiweoirjweoirhoiwehroiwehoirhweoi', 'oewihrwehoirhweoihroiwehroihweoirhweoihroiwehorihweo', 'woeihroiewhofishdofihsdofhosidhfoisdhfoisdhfoisdho', 'woehfoihsoifdhosihdfoisdhofihs', 'sodhfoisdhfoihsdfhoisdhfoisdhofihsdofhoisdhoifhsio'),
(11, 11, 'jeoewjoirjoewijroiwejoirjweoijroiwejoir', 'ewoijoiwejroiwejoirhweoihroiwehorihwoi', 'owiejroiweoirjweoirhoiwehroiwehoirhweoi', 'oewihrwehoirhweoihroiwehroihweoirhweoihroiwehorihweo', 'woeihroiewhofishdofihsdofhosidhfoisdhfoisdhfoisdho', 'woehfoihsoifdhosihdfoisdhofihs', 'sodhfoisdhfoihsdfhoisdhfoisdhofihsdofhoisdhoifhsio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dias_premium` int(11) DEFAULT '0',
  `premium` int(11) DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `type`, `email`, `dias_premium`, `premium`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, '1', 'nagidokuro@hotmail.com', 0, 0, NULL, '$2y$10$ntl5K6B4pKLmPdLGO0YuN.fCwrwWnq.sZQ.MqTCdQ.V9u3Vezz5C2', NULL, '2020-11-12 15:52:40', NULL),
(12, '1', 'leo@ymail.com', 0, 0, NULL, '$2y$10$rnn4d49t385J1awRDgfitOIs6W3WWPo9YgJ3bgVVyUG/7/07wm1Ju', NULL, '2020-11-12 16:21:07', NULL),
(36, '2', 'ds_vanilla@gmail.com', 0, 0, NULL, '$2y$10$qYnDiCVlKXFvSPw.qlAIG.kqDhKEdUF4ml9x0Gij5M1XH4PQNMhTS', NULL, '2020-11-14 15:09:55', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_pf`
--

DROP TABLE IF EXISTS `usuario_pf`;
CREATE TABLE IF NOT EXISTS `usuario_pf` (
  `nome_sobrenome` varchar(150) NOT NULL,
  `cpf` varchar(35) NOT NULL,
  `data_cadastro` timestamp NOT NULL,
  `cargo_desejado` varchar(100) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL,
  `id_pf` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_pf`),
  KEY `fk_id_user` (`fk_id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_pf`
--

INSERT INTO `usuario_pf` (`nome_sobrenome`, `cpf`, `data_cadastro`, `cargo_desejado`, `fk_id_usuario`, `id_pf`) VALUES
('Stefany Gomes', '654.684.684-68', '2020-11-12 15:52:40', 'Logistica', 11, 9),
('leonardo Magnon', '879.456.498-48', '2020-11-12 16:21:07', 'Analista de Sistemas', 12, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_pj`
--

DROP TABLE IF EXISTS `usuario_pj`;
CREATE TABLE IF NOT EXISTS `usuario_pj` (
  `id_pj` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `endereco` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `foto` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `estado` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cidade` varchar(80) NOT NULL,
  `cep` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cel` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tel_fixo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tipo_contratacao` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tipo_empresa` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sobre_empresa` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `receb_prop` varchar(100) NOT NULL,
  `cnpj` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nome_fantasia` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_pj`),
  KEY `fk_pj_user` (`fk_id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_pj`
--

INSERT INTO `usuario_pj` (`id_pj`, `fk_id_usuario`, `endereco`, `foto`, `estado`, `cidade`, `cep`, `cel`, `tel_fixo`, `tipo_contratacao`, `tipo_empresa`, `sobre_empresa`, `receb_prop`, `cnpj`, `nome_fantasia`) VALUES
(8, 36, 'asdkjashdoashiudhaiusod', 'fotos/yMrE3WicVbiP6W5PN4ZpWXrUMjwOglpZtxneocHU.jpeg', 'São Paulo', 'sadasohdouasihidhasuoid', '54668-468', '11 98546-87468', '01 4684-68468', 'Efetivo - CLT', 'Empresa de Pequeno Porte (EPP)', '454464684684684', 'Sim', '54.654.684.6464-86', 'DS-Vanilla');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `curriculo`
--
ALTER TABLE `curriculo`
  ADD CONSTRAINT `fk_id_pf` FOREIGN KEY (`fk_id_pf`) REFERENCES `usuario_pf` (`id_pf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `fk_exp` FOREIGN KEY (`fk_id_curriculo_exp`) REFERENCES `curriculo` (`id_curriculo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `formacao`
--
ALTER TABLE `formacao`
  ADD CONSTRAINT `fk_form` FOREIGN KEY (`fk_curriculo`) REFERENCES `curriculo` (`id_curriculo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  ADD CONSTRAINT `fk_id_curriculo` FOREIGN KEY (`fk_curriculo`) REFERENCES `curriculo` (`id_curriculo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario_pf`
--
ALTER TABLE `usuario_pf`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`fk_id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario_pj`
--
ALTER TABLE `usuario_pj`
  ADD CONSTRAINT `fk_pj_user` FOREIGN KEY (`fk_id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
