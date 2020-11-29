-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Nov-2020 às 15:55
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
-- Estrutura da tabela `candidaturas`
--

DROP TABLE IF EXISTS `candidaturas`;
CREATE TABLE IF NOT EXISTS `candidaturas` (
  `id_candidatura` int(11) NOT NULL AUTO_INCREMENT,
  `data_candidatura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_usuario_pf` int(11) NOT NULL,
  `fk_vaga` int(11) NOT NULL,
  `fk_id_usuario_pj` int(11) NOT NULL,
  PRIMARY KEY (`id_candidatura`),
  KEY `fk_do_pf` (`fk_usuario_pf`),
  KEY `fk_do_pj` (`fk_id_usuario_pj`),
  KEY `fk_das_vagas` (`fk_vaga`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `candidaturas`
--

INSERT INTO `candidaturas` (`id_candidatura`, `fk_usuario_pf`, `fk_vaga`, `fk_id_usuario_pj`) VALUES
(4, 16, 7, 11),
(5, 16, 10, 12),
(6, 17, 11, 11),
(7, 18, 10, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_vaga`
--

DROP TABLE IF EXISTS `categoria_vaga`;
CREATE TABLE IF NOT EXISTS `categoria_vaga` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(265) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria_vaga`
--

INSERT INTO `categoria_vaga` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Analista de Sistemas'),
(2, 'Logistica'),
(3, 'Serviços Gerais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_produto_c` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `data_compra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_compra`),
  KEY `fkdoproduto` (`fk_id_produto_c`),
  KEY `fk_id_da_pessoa` (`id_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculo`
--

DROP TABLE IF EXISTS `curriculo`;
CREATE TABLE IF NOT EXISTS `curriculo` (
  `id_curriculo` int(11) NOT NULL AUTO_INCREMENT,
  `dados` varchar(250) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `nacionalidade` varchar(80) NOT NULL,
  `telefone` varchar(35) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `deficiencia` varchar(65) NOT NULL,
  `msg_whats` varchar(5) NOT NULL,
  `estado_civil` varchar(25) NOT NULL,
  `data_nasc` date NOT NULL,
  `fk_id_pf` int(11) NOT NULL,
  `fk_categoria` int(11) NOT NULL,
  `foto` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_curriculo`),
  KEY `fk_id_pf` (`fk_id_pf`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curriculo`
--

INSERT INTO `curriculo` (`id_curriculo`, `dados`, `endereco`, `nacionalidade`, `telefone`, `sexo`, `deficiencia`, `msg_whats`, `estado_civil`, `data_nasc`, `fk_id_pf`, `fk_categoria`, `foto`) VALUES
(12, 'sudkgbasuidgausidguasgdugasuidas\r\ndasuidghasidguaisgdiuasgduafsuda\r\nsdasduayisgduyasgui', 'Avenida São Miguel N° 6420', 'Brasil', '11 98547-24214', 'Masculino', 'Não possuo', 'Sim', 'Casado(a)', '1997-08-20', 16, 0, 'fotos/2h7Ys9oWz7yEwLiobWwRkmh40zrxYHidplek1a6F.jpeg'),
(13, 'djkfbndkjsbfkbsdkfbiusdbfsd\r\nfsdfhsdufgisdbfisdbfiusgdb\r\nsdfjbsdhbfiugsdbfuibsd', 'Avenida São Miguel N° 6420', 'Brasil', '11 98949-49498', 'Feminino', 'Não possuo', 'Sim', 'Casado(a)', '2020-11-03', 17, 0, 'fotos/Wp0wGUL0EKYZ1LebR9mKxO5LkXXV7LM9udgf8GCd.jpeg'),
(15, 'askjhfkijsdfkuhsdifhiusdgfuiasdgbf\r\nsdafuisdhfiusdhfiusdhf', 'R. Barros Cassal, 196 - Itaquera, São Paulo - SP, 08210-180', 'Brasil', '11 98547-24214', 'Feminino', 'Não possuo', 'Sim', 'Solteiro(a)', '2020-11-03', 18, 0, 'fotos/uHc51CjgLvBDYOWfJ1XuDFYUi6142KmVSiKQlKQM.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pagamento`
--

DROP TABLE IF EXISTS `dados_pagamento`;
CREATE TABLE IF NOT EXISTS `dados_pagamento` (
  `id_dados_pg` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_user` int(11) NOT NULL,
  `nome_pessoa` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipo_pagamento` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `endereco` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cpf` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `celular` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dados_pg`),
  KEY `fk_do_usuario` (`fk_id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dados_pagamento`
--

INSERT INTO `dados_pagamento` (`id_dados_pg`, `fk_id_user`, `nome_pessoa`, `tipo_pagamento`, `endereco`, `cpf`, `estado`, `celular`) VALUES
(1, 58, 'Leonardo Magnon Martins', 'Boleto Bancario', 'Av. São Miguel N° 6420 Vila Norma', '654.984.984-86', 'São Paulo', '11 98134-4693'),
(2, 61, 'Stefany Gomes', 'Boleto Bancario', 'Av. São Miguel N° 6420 Vila Norma', '115.817.158-70', 'São Paulo', '11 88546-8748'),
(24, 59, 'DS-Vanilla', 'Boleto Bancario', 'Av. São Miguel N° 6420 Vila Norma', '46.846.848/6468-4', 'São Paulo', '11 98134-4693'),
(25, 58, 'Leonardo Magnon', 'Boleto Bancario', 'Av. São Miguel N° 6420 Vila Norma', '654.984.984-86', 'São Paulo', '11 98134-4693'),
(26, 58, 'Leonardo Magnon', 'Deposito em Conta', 'Av. São Miguel N° 6420 Vila Norma', '654.984.984-86', 'Rio de Janeiro', '11 98134-4693'),
(27, 60, 'Lojas  Americanas', 'Boleto Bancario', 'Av. São Miguel N° 6420 Vila Norma', '46.846.848/6468-8', 'São Paulo', '11 88546-8748');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `experiencias`
--

INSERT INTO `experiencias` (`id_exp`, `fk_id_curriculo_exp`, `nome_empresa`, `cargo`, `nivel_hirarquico`, `pais_exp`, `cidade_exp`, `nivel`, `desc_atividades`, `periodo`, `data_inicio`, `termino`) VALUES
(12, 12, 'RR Consents', 'Analista Senior', 'Analista', 'Brasil', 'São Paulo', 'Ensino Superior', 'jsdhuoifhsjfpjopifjksdjfposdhfoisdhjfuigsdofigsd\r\nfsdhuofhisdfiusdgifugsdgfisdguifgsdf\r\nsdfsudgfsig skfgsdfuihsdf sduyifgsdugvfiusdfn msdnfsd dsfiusdhfius', 'Manhã', '2019-08-30', '2022-02-18'),
(13, 13, 'RR Consents', 'Especialista em Logistica Geral', 'Especialista', 'Brasil', 'São Paulo', 'Curso Técnico', 'asdkjasbduohasbuidghuiasgdbas\r\ndasikujdgausigdiuasguidas\r\n[dasoidbgasuikdhiuashdiuashd', 'Noite', '2020-11-11', '2020-11-26'),
(14, 15, 'sdaushduahsuidhasui', 'asgdiuasgdugasuidguai', 'Auxiliar', 'Austrália', 'São Paulo', 'Curso Técnico', 'asdiuasduasgdiugasiudgiuasgduasdkjhaiu asohduahsuihduasihg', 'Tarde', '2020-11-24', '2020-11-25');

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
  `data_iniciof` date NOT NULL,
  `data_conclusao` date NOT NULL,
  `status` varchar(80) NOT NULL,
  `fk_curriculo` int(11) NOT NULL,
  PRIMARY KEY (`id_formacao`),
  KEY `fk_form` (`fk_curriculo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `formacao`
--

INSERT INTO `formacao` (`id_formacao`, `instituicao`, `pais`, `cidade`, `formacao`, `nivel`, `periodo`, `data_iniciof`, `data_conclusao`, `status`, `fk_curriculo`) VALUES
(12, 'Cruzeriro do Sul', 'Brasil', 'São Paulo', 'Analise e Desenvolvimento de Sistemas', 'Ensino Superior', 'Noite', '2018-08-20', '2020-01-04', 'Cursando', 12),
(13, 'Etec-Zona Leste', 'Brasil', 'São Paulo', 'Analise e Desenvolvimento de Sistemas', 'Curso Técnico', 'Noite', '2020-11-17', '2020-11-27', 'Completo', 13),
(14, 'sagdiuasgdiuagsiugiu', 'Brasil', 'São Paulo', 'asdyauysgduygasydguyas', 'Curso Técnico', 'Noite', '2020-11-03', '2020-11-17', 'Completo', 15);

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
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prod` varchar(100) NOT NULL,
  `preco` double NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `tipo_user` int(11) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `nome_prod`, `preco`, `descricao`, `tipo_user`) VALUES
(1, 'Acesso Premium PF 30 dias', 40.5, 'Acesso a vagas exclusivas só para usuarios \r\nPremium', 1),
(2, 'Acesso Premium PJ 30 dias', 60.5, 'Acesso Premium para ter acesso aos melhores\r\nfuncionarios e sem limite de postagens de vagas', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `redes_sociais`
--

INSERT INTO `redes_sociais` (`id_redes_sociais`, `fk_curriculo`, `link_linkedin`, `link_facebook`, `link_twitter`, `link_google`, `link_youtube`, `link_insta`, `link_blog`) VALUES
(12, 12, 'jeoewjoirjoewijroiwejoirjweoijroiwejoir', 'ewoijoiwejroiwejoirhweoihroiwehorihwoi', 'owiejroiweoirjweoirhoiwehroiwehoirhweoi', 'oewihrwehoirhweoihroiwehroihweoirhweoihroiwehorihweo', 'woeihroiewhofishdofihsdofhosidhfoisdhfoisdhfoisdho', 'woehfoihsoifdhosihdfoisdhofihs', 'sodhfoisdhfoihsdfhoisdhfoisdhofihsdofhoisdhoifhsio'),
(13, 13, 'sadasdasdas', 'asdjnsdjknasukjdnbjkasbdkjbqkjbqkwjhebiuqkwbdiuqw', 'owiejroiweoirjweoirhoiwehroiwehoirhweoi', 'qqjdoihqwhdiuwqhduqiduqiiuqqqqhquih', 'iauhdiuahsuidhasiudhaiushdiuashiuhasiud', 'woehfoihsoifdhosihdfoisdhofihs', 'sodhfoisdhfoihsdfhoisdhfoisdhofihsdofhoisdhoifhsio'),
(14, 15, 'sdklfhljksdnfuoisdbfuoibsdufboiusdb', 'skjfdoidfoihsdfoihsdhfoisdhfoisdjoifhsdsdkloifhsdih', 'sdiuashdiugasuidghuaisgdiuga', 'uishdagfuhgdugfiusdgfiugsdgfui', 'iuasdgfiugsdfuguisdgfuigsdfuigsdui', 'uigfuisgdufigsdufguisdgfuisdgui', 'iugsdugfuisdgfuigsdufigsdugfuisdg');

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `type`, `email`, `dias_premium`, `premium`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(58, '1', 'leonardo0089@outlook.com', 0, 0, NULL, '$2y$10$JIqNm4vDDf/q5xBU2XyQ4uYHrsFZznnltLA5hkEtT29f4DFfAUSyy', NULL, '2020-11-23 17:19:10', NULL),
(59, '2', 'ds_vanilla@gmail.com', 0, 0, NULL, '$2y$10$ou8iHEAgOicdw4p6Z3c7ge5JiXbSEzm10tqo/okVghMfavXZzOFcq', NULL, '2020-11-23 17:41:58', NULL),
(60, '2', 'americanas@gmail.com', 0, 0, NULL, '$2y$10$OfT2tyPhKT83UI6vpuXlkuLC/tQgjdzbMR0ydcDoiu3j8JLzNBupC', NULL, '2020-11-23 20:02:34', NULL),
(61, '1', 'nagidokuro@hotmail.com', 0, 0, NULL, '$2y$10$0HLzNz8faMT6H32eKFW6JewQ0.s9kBLUAQK2eQqv.e3Vw0dSyLZtO', NULL, '2020-11-24 01:42:29', NULL),
(62, '1', '123@123', 0, 0, NULL, '$2y$10$txi.btBx8/Q3/M68RbQ3bOFcqMTEyly0XLL8eBL27PsMWyVkxQEkq', NULL, '2020-11-26 22:09:54', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_pf`
--

DROP TABLE IF EXISTS `usuario_pf`;
CREATE TABLE IF NOT EXISTS `usuario_pf` (
  `nome_sobrenome` varchar(150) NOT NULL,
  `cpf` varchar(35) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cargo_desejado` varchar(100) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `fk_categoria` int(11) DEFAULT NULL,
  `id_pf` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_pf`),
  KEY `fk_id_user` (`fk_id_usuario`),
  KEY `fk_categorias_pf` (`fk_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_pf`
--

INSERT INTO `usuario_pf` (`nome_sobrenome`, `cpf`, `data_cadastro`, `cargo_desejado`, `fk_id_usuario`, `fk_categoria`, `id_pf`) VALUES
('leonardo Magnon', '654.684.684-68', '2020-11-23 17:19:10', 'Analista de Sistemas', 58, 1, 16),
('Stefany Gomes', '564.984.984-98', '2020-11-24 01:42:29', 'Logistica', 61, 2, 17),
('Debora Freire', '798.878.979-87', '2020-11-26 22:09:54', 'Analista de Sistemas', 62, 1, 18);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_pj`
--

INSERT INTO `usuario_pj` (`id_pj`, `fk_id_usuario`, `endereco`, `foto`, `estado`, `cidade`, `cep`, `cel`, `tel_fixo`, `tipo_contratacao`, `tipo_empresa`, `sobre_empresa`, `receb_prop`, `cnpj`, `nome_fantasia`) VALUES
(11, 59, 'Av São Miguel N° 6420', 'fotos/Jn6fQ5Ps7UbFUbVsjzWA7oSDdfyadFAAUY3bOBO2.jpeg', 'São Paulo', 'São Paulo', '48646-846', '11 98547-24214', '11 2654-684864', 'Efetivo - CLT', 'Microempresa (ME)', 'jkushfisodhfhsdfiiosdfiohsd sdfbsdfuibsdhfuoihsdfoihisodf sdfoisdhfshdjfihisodhfiosdifhiosdhfoihsdfhoisdhfoihsdfoihsdfiohsdfhoisdhfoihsdf sdofihjsdfjiosdhfoihsdhfiosdhfoihsdhfoisdhfoihsdhfiohsdfoihsodhfoisd fsodfihosdhfiosdhfoihsdfhsd foisdhfoihsdofs', 'Sim', '46.846.848/6468-4', 'DS-Vanilla'),
(12, 60, 'Av São Miguel N° 6420', 'fotos/VfdD4FKe6DJbC8AAMKtH6m6x4YgKKD0dLyE6uP3n.png', 'São Paulo', 'São Paulo', '48646-846', '11 87484-8948', '11 2654-684864', 'Efetivo - CLT', 'Microempresa (ME)', 'sadasdasdasdasdasd', 'Sim', '46.684.684.6846-84', 'Americanas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

DROP TABLE IF EXISTS `vagas`;
CREATE TABLE IF NOT EXISTS `vagas` (
  `id_nova_vaga` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_user_pj` int(11) NOT NULL,
  `data_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titulo_vaga` varchar(150) NOT NULL,
  `area_profissao` varchar(150) NOT NULL,
  `numero_vagas` int(11) NOT NULL,
  `local_trabalho` varchar(150) NOT NULL,
  `para_premium` varchar(10) NOT NULL,
  `oport_para` varchar(250) NOT NULL,
  `salario` double NOT NULL,
  `beneficios` text NOT NULL,
  `horario_trab` varchar(250) NOT NULL,
  `atividades` text NOT NULL,
  `pre_requisitos` text NOT NULL,
  `exigencias` text NOT NULL,
  `n_candidaturas` int(11) NOT NULL DEFAULT '0',
  `expira_em` int(11) NOT NULL,
  `fk_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_nova_vaga`),
  KEY `fk_vagas` (`fk_id_user_pj`),
  KEY `fk_categorias` (`fk_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id_nova_vaga`, `fk_id_user_pj`, `data_post`, `titulo_vaga`, `area_profissao`, `numero_vagas`, `local_trabalho`, `para_premium`, `oport_para`, `salario`, `beneficios`, `horario_trab`, `atividades`, `pre_requisitos`, `exigencias`, `n_candidaturas`, `expira_em`, `fk_categoria`) VALUES
(7, 11, '2020-11-23 18:13:23', 'Analista de Sistemas', 'TI - Informatica', 2, 'São Paulo', 'Nao', 'Tecnicos em Informatica', 3000, 'Auxilio Creche de: R$ 450,00\r\nVT - Vale Transporte\r\nVR - Vale Refeição\r\nVA - Vale Alimentação\r\nACAD - Vale Academia: R$ 550,00', '07:00 as 16:40', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classica', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampde', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classica', 1, 20, 1),
(8, 11, '2020-11-23 18:40:29', 'DBA', 'TI - Informatica', 12, 'São Paulo', 'Sim', 'Tecnicos em Informatica', 1200, 'sadçasjdliasoidjasopdaskopdjkas asoduhasoidhoaishdhashdoas dasuidhiuashduaishudhasiudhuiashdiahsi', '07:00 as 16:40', 'sdkjhasidgasiugduiasguidguaisgdiu iuashiuhgduasihdugasuiguiasgdugasuidg asuidiuasgdugsauigduasig iuhsgaudgas asiudhiuasg uasihdguasig', 'auisgduasdgyuasguidgauisgdia asdiygasdu', 'asdgasuhdguyasgduygasdgyuas', 0, 20, 1),
(9, 12, '2020-11-23 20:04:40', 'Petrolifera-Amazonense', 'Petroleo', 14, 'Rio de Janeiro', 'Nao', 'Petrolifero', 15000, 'ashgdiuhgasiudhuiashuidas\r\nasduagsuidgasgduaisgudgas\r\nasdahsjgdagyasgduas asuydgasduyas\r\nabasiudg', '07:00 as 16:40', 'sakdhgasuigduasgiud aiuskhduashiudhasiu\r\nasjhgdiuasgiudgasiugdiuas asikdgauisdghiuasguid\r\niuashgduasigd', 'asudhgasuigdasgiudgasiugda\r\nasoudhgasiugdugasuidgiuas asiugduasigdua asiugd\r\nasouijhdgiuasgiuasuid\r\nasvduyaisgd', 'asuidhasiuhd asduasihiudgasuida sasohdoasi\r\nasdhigasiudgas8iu', 0, 20, 3),
(10, 12, '2020-11-23 20:06:02', 'Analista de Sistemas - Senior', 'TI - Informatica', 1, 'Rio de Janeiro', 'Nao', 'Tecnicos em Informatica', 6500, 'asdkjuhasuijkdhausioh asouihduasihduashudi \r\nasjlkhduasih dsaoi hduoihasuoihdasui \r\nasoihdiu ayduias s', '07:00 as 16:40', 'sadakhsjgdiasjhduhasui dasoihduasi hdaso9d aso9\r\nauasgdiasgdhag siud yuasi dasi doashas\r\naskjdguaysgduyasgiu dasiu hduasi hd', 'asdjhasgduyasguydgasudguyasgdyugasud asihdg iuas gdias\r\n[asasouohdgiuashgdugasiudguyaisguydgasu das', 'asdjhasgdigasduaisg dasuidhgasuigd aso diuasgduaiksgiudasiudgasi i', 2, 20, 1),
(11, 11, '2020-11-24 01:50:09', 'Auxiliar operacional de logística', 'Logistica - Superior', 1, 'São Paulo', 'Nao', 'Logistica', 3000, 'Auxiliar operacional de logística', '07:00 as 16:40', 'Entregas e coletas de produtos diversos, em toda região da grande São Paulo, será necessário auxiliar o ajudante na carga e descarga de produtos.', 'Experiência: Na área de transportadora e conhecer a grande São Paulo', 'Escolaridade Mínima: Ensino Médio (2º Grau)', 1, 20, 2);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `candidaturas`
--
ALTER TABLE `candidaturas`
  ADD CONSTRAINT `fk_das_vagas` FOREIGN KEY (`fk_vaga`) REFERENCES `vagas` (`id_nova_vaga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_do_pf` FOREIGN KEY (`fk_usuario_pf`) REFERENCES `usuario_pf` (`id_pf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_do_pj` FOREIGN KEY (`fk_id_usuario_pj`) REFERENCES `usuario_pj` (`id_pj`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_id_da_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkdoproduto` FOREIGN KEY (`fk_id_produto_c`) REFERENCES `produto` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `curriculo`
--
ALTER TABLE `curriculo`
  ADD CONSTRAINT `fk_id_pf` FOREIGN KEY (`fk_id_pf`) REFERENCES `usuario_pf` (`id_pf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `dados_pagamento`
--
ALTER TABLE `dados_pagamento`
  ADD CONSTRAINT `fk_do_usuario` FOREIGN KEY (`fk_id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_categorias_pf` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria_vaga` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`fk_id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario_pj`
--
ALTER TABLE `usuario_pj`
  ADD CONSTRAINT `fk_pj_user` FOREIGN KEY (`fk_id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_categorias` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria_vaga` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vagas` FOREIGN KEY (`fk_id_user_pj`) REFERENCES `usuario_pj` (`id_pj`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
