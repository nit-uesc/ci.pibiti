-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2018 at 09:23 AM
-- Server version: 5.5.37
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pibiti`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_capes`
--

CREATE TABLE IF NOT EXISTS `area_capes` (
  `area_capes_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_area` text NOT NULL,
  PRIMARY KEY (`area_capes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `area_capes`
--

INSERT INTO `area_capes` (`area_capes_id`, `nome_area`) VALUES
(1, 'ADMINISTRAÇÃO , CIÊNCIAS CONTÁBEIS E TURISMO'),
(2, 'ANTROPOLOGIA / ARQUEOLOGIA'),
(3, 'ARQUITETURA E URBANISMO'),
(4, 'ARTES / MÃšSICA'),
(5, 'ASTRONOMIA / FÃSICA'),
(6, 'BIODIVERSIDADE'),
(7, 'BIOTECNOLOGIA'),
(8, 'CIÃŠNCIA DA COMPUTAÃ‡ÃƒO'),
(9, 'CIÃŠNCIA DE ALIMENTOS'),
(10, 'CIÃŠNCIA POLÃTICA E RELAÃ‡Ã•ES INTERNACIONAIS'),
(11, 'CIÃŠNCIAS AGRÃRIAS I'),
(12, 'CIÃŠNCIAS AMBIENTAIS'),
(13, 'CIÃŠNCIAS BIOLÃ“GICAS I'),
(14, 'CIÃŠNCIAS BIOLÃ“GICAS II'),
(15, 'CIÃŠNCIAS BIOLÃ“GICAS III'),
(16, 'CIÃŠNCIAS SOCIAIS APLICADAS I'),
(17, 'DIREITO'),
(18, 'ECONOMIA'),
(19, 'EDUCAÃ‡ÃƒO'),
(20, 'EDUCAÃ‡ÃƒO FÃSICA'),
(21, 'ENFERMAGEM'),
(22, 'ENGENHARIAS I'),
(23, 'ENGENHARIAS II'),
(24, 'ENGENHARIAS III'),
(25, 'ENGENHARIAS IV'),
(26, 'ENSINO'),
(27, 'FARMÃCIA'),
(28, 'FILOSOFIA/TEOLOGIA:subcomissÃ£o FILOSOFIA'),
(29, 'FILOSOFIA/TEOLOGIA:subcomissÃ£o TEOLOGIA'),
(30, 'GEOCIÃŠNCIAS'),
(31, 'GEOGRAFIA'),
(32, 'HISTÃ“RIA'),
(33, 'INTERDISCIPLINAR'),
(34, 'LETRAS / LINGUÃSTICA'),
(35, 'MATEMÃTICA / PROBABILIDADE E ESTATÃSTICA'),
(36, 'MATERIAIS'),
(37, 'MEDICINA I'),
(38, 'MEDICINA II'),
(39, 'MEDICINA III'),
(40, 'MEDICINA VETERINÃRIA'),
(41, 'NUTRIÃ‡ÃƒO'),
(42, 'ODONTOLOGIA'),
(43, 'PLANEJAMENTO URBANO E REGIONAL / DEMOGRAFIA'),
(44, 'PSICOLOGIA'),
(45, 'QUÃMICA'),
(46, 'SAÃšDE COLETIVA'),
(47, 'SERVIÃ‡O SOCIAL'),
(48, 'SOCIOLOGIA'),
(49, 'ZOOTECNIA / RECURSOS PESQUEIROS');

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao_externa`
--

CREATE TABLE IF NOT EXISTS `avaliacao_externa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_projeto_id` int(11) NOT NULL,
  `FK_avaliador_id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `avaliacao_externa`
--

INSERT INTO `avaliacao_externa` (`id`, `FK_projeto_id`, `FK_avaliador_id`, `data`) VALUES
(1, 17, 6, '2017-06-13 20:28:19'),
(2, 21, 6, '2017-06-13 20:32:41'),
(3, 13, 6, '2017-06-13 20:36:56'),
(4, 22, 6, '2017-06-13 20:40:39'),
(5, 15, 6, '2017-06-13 20:44:09'),
(6, 10, 6, '2017-06-13 20:50:40'),
(7, 12, 6, '2017-06-13 20:54:45'),
(8, 23, 6, '2017-06-13 20:57:11'),
(9, 16, 6, '2017-06-13 21:00:44'),
(10, 11, 6, '2017-06-13 21:04:12'),
(11, 14, 6, '2017-06-13 21:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao_externa_has_criterio_externo`
--

CREATE TABLE IF NOT EXISTS `avaliacao_externa_has_criterio_externo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_avaliacao_externa_id` int(11) NOT NULL DEFAULT '0',
  `FK_criterio_externo_id` int(11) NOT NULL DEFAULT '0',
  `pontuacao` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `avaliacao_externa_has_criterio_externo`
--

INSERT INTO `avaliacao_externa_has_criterio_externo` (`id`, `FK_avaliacao_externa_id`, `FK_criterio_externo_id`, `pontuacao`) VALUES
(1, 1, 1, '1.50'),
(2, 1, 2, '1.50'),
(3, 1, 3, '1.50'),
(4, 1, 4, '1.70'),
(5, 1, 5, '1.90'),
(6, 2, 1, '1.90'),
(7, 2, 2, '1.00'),
(8, 2, 3, '2.00'),
(9, 2, 4, '2.00'),
(10, 2, 5, '2.00'),
(11, 3, 1, '1.70'),
(12, 3, 2, '2.00'),
(13, 3, 3, '2.00'),
(14, 3, 4, '2.00'),
(15, 3, 5, '2.00'),
(16, 4, 1, '1.30'),
(17, 4, 2, '1.00'),
(18, 4, 3, '1.00'),
(19, 4, 4, '1.50'),
(20, 4, 5, '1.50'),
(21, 5, 1, '0.50'),
(22, 5, 2, '1.30'),
(23, 5, 3, '1.50'),
(24, 5, 4, '1.30'),
(25, 5, 5, '1.50'),
(26, 6, 1, '1.00'),
(27, 6, 2, '1.00'),
(28, 6, 3, '1.00'),
(29, 6, 4, '2.00'),
(30, 6, 5, '1.00'),
(31, 7, 1, '1.00'),
(32, 7, 2, '1.50'),
(33, 7, 3, '0.50'),
(34, 7, 4, '0.00'),
(35, 7, 5, '1.00'),
(36, 8, 1, '2.00'),
(37, 8, 2, '1.00'),
(38, 8, 3, '2.00'),
(39, 8, 4, '1.50'),
(40, 8, 5, '2.00'),
(41, 9, 1, '2.00'),
(42, 9, 2, '1.00'),
(43, 9, 3, '2.00'),
(44, 9, 4, '1.50'),
(45, 9, 5, '2.00'),
(46, 10, 1, '2.00'),
(47, 10, 2, '1.00'),
(48, 10, 3, '2.00'),
(49, 10, 4, '1.50'),
(50, 10, 5, '2.00'),
(51, 11, 1, '1.00'),
(52, 11, 2, '1.00'),
(53, 11, 3, '1.50'),
(54, 11, 4, '1.50'),
(55, 11, 5, '1.50');

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao_interna`
--

CREATE TABLE IF NOT EXISTS `avaliacao_interna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_projeto_id` int(11) NOT NULL DEFAULT '0',
  `FK_avaliador_id` int(11) NOT NULL DEFAULT '0',
  `FK_criterio_projeto_id` tinyint(4) DEFAULT '0',
  `FK_criterio_orientador_id` tinyint(4) DEFAULT '0',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_avaliacao_interna_criterio_orientador` (`FK_criterio_orientador_id`),
  KEY `FK_avaliacao_interna_criterio_projeto` (`FK_criterio_projeto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `avaliacao_interna`
--

INSERT INTO `avaliacao_interna` (`id`, `FK_projeto_id`, `FK_avaliador_id`, `FK_criterio_projeto_id`, `FK_criterio_orientador_id`, `data`) VALUES
(1, 14, 3, 5, 5, '2017-05-29 17:44:14'),
(2, 23, 3, 5, 2, '2017-05-29 18:33:30'),
(3, 21, 3, 5, 5, '2017-06-07 13:11:56'),
(4, 22, 3, 5, 5, '2017-06-07 13:13:36'),
(5, 17, 3, 1, 5, '2017-06-07 13:14:42'),
(6, 13, 3, 5, 1, '2017-06-07 13:16:09'),
(7, 11, 3, 5, 4, '2017-06-07 13:24:08'),
(8, 12, 3, 5, 5, '2017-06-07 13:25:37'),
(9, 10, 3, 1, 4, '2017-06-07 13:28:56'),
(10, 15, 3, 5, 5, '2017-06-07 13:29:43'),
(11, 14, 4, 5, 5, '2017-06-07 17:29:43'),
(12, 23, 4, 5, 2, '2017-06-07 17:30:37'),
(13, 21, 4, 5, 5, '2017-06-07 17:31:38'),
(14, 22, 4, 5, 5, '2017-06-07 17:31:50'),
(15, 16, 4, 1, 1, '2017-06-07 17:33:03'),
(16, 17, 4, 1, 5, '2017-06-07 17:34:01'),
(17, 13, 4, 5, 1, '2017-06-07 17:34:32'),
(18, 11, 4, 5, 4, '2017-06-07 17:35:31'),
(19, 12, 4, 5, 5, '2017-06-07 17:35:54'),
(20, 10, 4, 1, 4, '2017-06-07 17:38:35'),
(21, 15, 4, 5, 5, '2017-06-07 17:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `avaliador`
--

CREATE TABLE IF NOT EXISTS `avaliador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_usuario_id` int(11) NOT NULL DEFAULT '0',
  `FK_tipo_avaliador_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `avaliador`
--

INSERT INTO `avaliador` (`id`, `FK_usuario_id`, `FK_tipo_avaliador_id`) VALUES
(1, 6, 1),
(2, 7, 1),
(3, 27, 1),
(4, 28, 1),
(5, 29, 1),
(6, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comentario_doc`
--

CREATE TABLE IF NOT EXISTS `comentario_doc` (
  `comentario_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_doc_id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`comentario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `comentario_doc`
--

INSERT INTO `comentario_doc` (`comentario_id`, `fk_doc_id`, `comentario`) VALUES
(11, 29, 'O projeto tem caracterÃ­sticas de PIBIC, com potencial mais acadÃªmico que tecnolÃ³gico.  Os planos de trabalho estÃ£o pobres.\n'),
(12, 28, 'O projeto pode apoiar a IT com informaÃ§Ãµes sobre o setor da agroindÃºstria, mas, para ser enquadrado como inovaÃ§Ã£o, deveria agregar algo efetivamente inovador, como um algoritmo especÃ­fico.  \n'),
(13, 10, 'O projeto estÃ¡ bem embasado, tendo sido feito um bom levantamento patentÃ¡rio.  O criaÃ§Ã£o de vacinas deverÃ¡ interessar ao mercado, se tiver sucesso.  SÃ³ hÃ¡ um plano de trabalho, aparentando ser muita atividade para sÃ³ 1 bolsista.\n'),
(14, 31, 'bbbbbbbbbbbbbb'),
(15, 5, 'O projeto tem potencial mais didÃ¡tico que tecnolÃ³gico.  PoderÃ¡ se tornar comercial se for efetivamente utilizado na avaliaÃ§Ã£o de adsorventes e habilitado para, por exemplo, otimizar estaÃ§Ãµes reais.\nA revisÃ£o patentÃ¡ria foi pobre.\n'),
(16, 7, 'O projeto pode apoiar a IT com informaÃ§Ãµes sobre as competÃªncias da UESC, mas, para ser enquadrado como inovaÃ§Ã£o, deveria agregar algo efetivamente inovador, como um algoritmo especÃ­fico.  \n'),
(17, 27, 'Projeto com bom potencial inovador.  Ã‰ importante definir claramente se haverÃ¡ um produto voltado ao mercado, como um software de avaliaÃ§Ã£o da aplicaÃ§Ã£o do RVA em determinada regiÃ£o.  \nO plano de trabalho estÃ¡ sem o cronograma.  \n'),
(18, 21, 'Projeto com bom potencial inovador.   O cÃ³digo aberto limita a comercializaÃ§Ã£o do produto.\n'),
(19, 15, 'Projeto com bom potencial inovador.  \r\n'),
(20, 20, 'O projeto tem caracterÃ­sticas de varredura inicial, com visÃ£o ainda difusa sobre o produto final.  Mas o levantamento de patentes estÃ¡ muito bom.  O plano de trabalho estÃ¡ bem intenso e hÃ¡ risco de nÃ£o cumprÃ­-lo.\n'),
(21, 14, 'O projeto Ã© muito abrangente e pode ter dificuldade de ser realizado no prazo proposto.  A caracterÃ­stica de InovaÃ§Ã£o TecnolÃ³gica nÃ£o foi explicitada.  Os planos de trabalho devem ser diferenciados.\n'),
(22, 23, 'O projeto serÃ¡ desenvolvido numa Ã¡rea com muitas patentes, devendo ser necessÃ¡ria uma avaliaÃ§Ã£o mais criteriosa.   O plano de trabalho estÃ¡ bem intenso e hÃ¡ risco de nÃ£o cumprÃ­-lo.\n'),
(23, 24, 'O projeto tem caracterÃ­sticas de PIBIC, com potencial mais acadÃªmico que tecnolÃ³gico.  NÃ£o hÃ¡ cunho de InovaÃ§Ã£o TecnolÃ³gica.\n'),
(24, 17, 'Projeto com bom potencial inovador.  O plano de trabalho estÃ¡ com cronograma adequado.\n'),
(25, 32, 'Projeto com bom potencial inovador.  O plano de trabalho estÃ¡ sem o cronograma.\n'),
(26, 18, 'O projeto tem potencial mais didÃ¡tico que tecnolÃ³gico.  PoderÃ¡ se tornar comercial se for efetivamente utilizado na avaliaÃ§Ã£o / otimizar estaÃ§Ãµes reais.\nA revisÃ£o patentÃ¡ria foi pobre.\nPlano de Trabalho sem cronogramas.\n'),
(27, 11, 'O projeto pode apoiar a IT com informaÃ§Ãµes sobre as competÃªncias da UESC, mas, para ser enquadrado como inovaÃ§Ã£o, deveria agregar algo efetivamente inovador, como um algoritmo especÃ­fico.  \n\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `criterio_externo`
--

CREATE TABLE IF NOT EXISTS `criterio_externo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `criterio_externo`
--

INSERT INTO `criterio_externo` (`id`, `descricao`) VALUES
(1, 'CarÃ¡ter inovador, de acordo com Manual de Oslo (ver pÃ¡gina do NIT) '),
(2, 'Potencial de geraÃ§Ã£o de patente, ou cultivar, ou registro de software '),
(3, 'Potencial de transferÃªncia de tecnologia para o setor produtivo privado ou geraÃ§Ã£o de negÃ³cios a partir de â€œspin-offâ€ da academia '),
(4, 'RevisÃ£o PatentÃ¡ria / Busca de Anterioridade '),
(5, 'Plano de Trabalho do Bolsista ');

-- --------------------------------------------------------

--
-- Table structure for table `criterio_orientador`
--

CREATE TABLE IF NOT EXISTS `criterio_orientador` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL DEFAULT 'NÃ£o especificado',
  `pontuacao` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=6 ;

--
-- Dumping data for table `criterio_orientador`
--

INSERT INTO `criterio_orientador` (`id`, `descricao`, `pontuacao`) VALUES
(1, 'Com bolsa de produtividade em Desenvolvimento TecnolÃ³gico e ExtensÃ£o Inovadora (DT) ou em Pesquisa', 5),
(2, 'ProduÃ§Ã£o mÃ©dia acima de 1 artigo cientÃ­fico/ano em Qualis A nos Ãºltimos 3 anos', 4),
(3, 'ProduÃ§Ã£o mÃ©dia entre 1 e 0,6 artigo cientÃ­ficos/ano em Qualis A nos Ãºltimos 3 anos', 3),
(4, 'ProduÃ§Ã£o mÃ©dia acima de e 1,0 artigo cientÃ­fico/ano em Qualis A ou B nos Ãºltimos 3 anos ', 2),
(5, 'ProduÃ§Ã£o mÃ©dia acima de 0,5 artigo cientÃ­fico/ano em Qualis A ou B, ou livro/capÃ­tulo de livro ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `criterio_projeto`
--

CREATE TABLE IF NOT EXISTS `criterio_projeto` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(254) NOT NULL,
  `pontuacao` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=6 ;

--
-- Dumping data for table `criterio_projeto`
--

INSERT INTO `criterio_projeto` (`id`, `descricao`, `pontuacao`) VALUES
(1, 'Coordenado pelo proponente e financiado por agÃªncia de fomento ou empresa e caracterizado na Ã¡rea de Desenvolvimento TecnolÃ³gico e InovaÃ§Ã£o', 5),
(2, 'Com participaÃ§Ã£o do proponente como pesquisador/colaborador e financiado por agÃªncia de fomento ou empresa e caracterizado na Ã¡rea de Desenvolvimento TecnolÃ³gico e InovaÃ§Ã£o', 4),
(3, 'Coordenado pelo proponente e financiado por agÃªncia de fomento, caracterizado como projeto de pesquisa bÃ¡sica que possua potencial para desenvolvimento de produtos ou processos inovadores', 3),
(4, 'Com participaÃ§Ã£o do proponente como pesquisador/colaborador e financiado por agÃªncia de fomento, caracterizado como projeto de pesquisa bÃ¡sica que possua potencial para desenvolvimento de produtos ou processos inovadores', 2),
(5, 'Propostas sem comprovaÃ§Ã£o de financiamento, mas com comprovaÃ§Ã£o de infra-estrutura com capacidade instalada para execuÃ§Ã£o do projeto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `cur_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`cur_id`, `cur_nome`) VALUES
(1, 'AdministraÃ§Ã£o'),
(2, 'Agronomia'),
(3, 'Biomedicina'),
(4, 'CiÃªncias BiolÃ³gicas - Bacharelado'),
(5, 'CiÃªncias ContÃ¡beis'),
(6, 'CiÃªncia da ComputaÃ§Ã£o'),
(7, 'ComunicaÃ§Ã£o Social'),
(8, 'Direito'),
(9, 'Economia'),
(10, 'Enfermagem'),
(11, 'Engenharia Civil'),
(12, 'Engenharia de ProduÃ§Ã£o'),
(13, 'Engenharia ElÃ©trica'),
(14, 'Engenharia MecÃ¢nica'),
(15, 'Engenharia QuÃ­mica'),
(16, 'FÃ­sica - Bacharelado'),
(17, 'Geografia - Bacharelado'),
(18, 'LEA'),
(19, 'Medicina'),
(20, 'Medicina VeterinÃ¡ria'),
(21, 'MatemÃ¡tica - Bacharelado'),
(22, 'QuÃ­mica - Bacharelado'),
(23, 'CiÃªncias BiolÃ³gicas - Licenciatura'),
(24, 'FÃ­sica - Licenciatura'),
(25, 'Geografia - Licenciatura'),
(26, 'MatemÃ¡tica - Licenciatura'),
(27, 'QuÃ­mica - Licenciatura'),
(28, 'CiÃªncias Sociais'),
(29, 'EducaÃ§Ã£o FÃ­sica'),
(30, 'Filosofia'),
(31, 'HistÃ³ria'),
(32, 'Letras'),
(33, 'Pedagogia');

-- --------------------------------------------------------

--
-- Table structure for table `dados_lattes`
--

CREATE TABLE IF NOT EXISTS `dados_lattes` (
  `id_lattes` int(1) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(254) NOT NULL,
  `pontuacao` int(1) NOT NULL,
  PRIMARY KEY (`id_lattes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dados_lattes`
--

INSERT INTO `dados_lattes` (`id_lattes`, `descricao`, `pontuacao`) VALUES
(1, 'Com bolsa de produtividade em Desenvolvimento TecnolÃ³gico e ExtensÃ£o Inovadora (DT) ou em Pesquisa (PQ), ou registro de um software, ou depÃ³sito de patentes, ou proteÃ§Ã£o de cultivares nos Ãºltimos 3 anos', 5),
(3, 'ProduÃ§Ã£o mÃ©dia acima de 2 artigos cientÃ­ficos/ano em Qualis A nos Ãºltimos 3 anos', 4),
(4, 'ProduÃ§Ã£o mÃ©dia entre 0,5 e 2,0 artigos cientÃ­ficos/ano em Qualis A nos Ãºltimos 3 anos', 3),
(5, 'ProduÃ§Ã£o mÃ©dia abaixo de 0,5 artigo cientÃ­fico/ano em Qualis A, ou qualquer produÃ§Ã£o em Qualis B ou C, ou livro/capÃ­tulo de livro nos Ãºltimos 3 anos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_nome` varchar(255) NOT NULL,
  `dep_sigla` varchar(45) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`dep_id`, `dep_nome`, `dep_sigla`) VALUES
(3, 'Departamento de CiÃªncias AgrÃ¡rias e Ambientais', 'DCAA'),
(4, 'Departamento de AdministraÃ§Ã£o e CiÃªncias ContÃ¡beis', 'DCAC'),
(5, 'Departamento de CiÃªncias BiolÃ³gicas', 'DCB'),
(6, 'Departamento de CiÃªncias EconÃ´micas', 'DCEC'),
(7, 'Departamento de CiÃªncias Exatas e TecnolÃ³gicas', 'DCET'),
(8, 'Departamento de CiÃªncias da EducaÃ§Ã£o', 'DCIE'),
(9, 'Departamento de CiÃªncias da SaÃºde', 'DCS'),
(10, 'Departamento de CiÃªncias JurÃ­dicas', 'DCIJUR'),
(11, 'Departamento de Filosofia e CiÃªncias Humanas', 'DFCH'),
(12, 'Departamento de Letras e Artes', 'DLA');

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_nome` varchar(100) NOT NULL,
  `doc_cpf` varchar(45) NOT NULL,
  `doc_rg` varchar(45) NOT NULL,
  `doc_email` varchar(45) NOT NULL,
  `doc_telefone` varchar(45) NOT NULL,
  `doc_cargo` varchar(100) NOT NULL,
  `doc_regime` varchar(45) NOT NULL,
  `doc_grupo_pesq` varchar(255) NOT NULL,
  `link_lattes` varchar(255) NOT NULL,
  `fk_dep_id` int(11) NOT NULL,
  `doc_titulacao` varchar(45) NOT NULL,
  `fk_garea_id` int(11) NOT NULL,
  `doc_capes1` varchar(255) NOT NULL,
  `doc_capes2` varchar(255) NOT NULL,
  `doc_cnpq` varchar(255) NOT NULL,
  `fk_usu_id` int(11) NOT NULL,
  `doc_data` datetime NOT NULL,
  `up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`doc_id`),
  KEY `doc` (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`doc_id`, `doc_nome`, `doc_cpf`, `doc_rg`, `doc_email`, `doc_telefone`, `doc_cargo`, `doc_regime`, `doc_grupo_pesq`, `link_lattes`, `fk_dep_id`, `doc_titulacao`, `fk_garea_id`, `doc_capes1`, `doc_capes2`, `doc_cnpq`, `fk_usu_id`, `doc_data`, `up`) VALUES
(8, 'Paola Pereira Das Neves Snoeck', '67858627520', '0547845650', 'paolasnoeck@gmail.com', '7336805406', 'Professor Titular', 'DE', 'Produção Animal', 'http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4707652A0', 3, 'Doutorado', 1, '40', '49', 'Reprodução Animal', 9, '0000-00-00 00:00:00', '2017-04-26 15:31:37'),
(9, 'EMERSON ANTÔNIO ROCHA MELO DE LUCENA', '76896480459', '1406877', 'lucenaemerson@yahoo.com.br', '73 3680-5032/99123-0543', 'Professor Adjunto', 'DE', 'http://dgp.cnpq.br/buscaoperacional/detalhegrupo.jsp?grupo=3631501JT0ALV2', 'http://lattes.cnpq.br/7319596342040469', 5, 'Doutorado', 1, '13', '33', 'Botânica', 10, '0000-00-00 00:00:00', '2017-04-26 19:47:48'),
(10, 'Ricardo Matos Santana', '58393900549', '02958800-66', 'ricmas@uesc.br', '73-98803-1716', 'Docente', 'DE', 'Núcleo de Estudo, Pesquisa e Extensão em Metodologias na Enfermagem - Nepemenf', 'http://lattes.cnpq.br/9385234501124106', 9, 'Doutorado', 1, '21', '46', '4.04.00.00-0 Enfermagem', 11, '0000-00-00 00:00:00', '2017-05-04 12:49:30'),
(11, 'Enio Antunes Rezende', '16726056877', '224555820', 'eniorezende@hotmail.com', '71991714477', 'Coordenador do NIT -UESC', 'DE', '-', 'http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4707332J0', 7, 'Doutorado', 2, '22', '1', 'Engenharia da Produção', 12, '0000-00-00 00:00:00', '2017-05-05 17:34:06'),
(12, 'Laura De Almeida', '02330079893', '16149664-7', 'prismaxe@gmail.com', '073981721927', 'Professora Adjunta no curso de LEA', 'DE', 'http://dgp.cnpq.br/dgp/espelhorh/4147029498997539', 'http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4127281H6', 12, 'Doutorado', 3, '33', '34', 'Letras, Linguística', 13, '0000-00-00 00:00:00', '2017-05-08 22:48:00'),
(13, 'Péricles De Lima Sobreira', '89897536434', '4243038-SSP/PE', 'pericles.sobreira@gmail.com', '7336805110', 'Processor', 'DE', 'http://dgp.cnpq.br/dgp/espelhorh/9783456845768459', 'http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4734396P8', 7, 'Doutorado', 2, '8', '25', 'Ciência da Computação', 14, '0000-00-00 00:00:00', '2017-05-09 12:24:52'),
(14, 'Jauberth Weyll Abijaude', '55302220563', '295129484', 'jauberth@gmail.com', '73 99113 3333', 'Professor Assistente', 'DE', 'http://dgp.cnpq.br/dgp/espelhorh/1281795173625067', 'http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4794005D8', 7, 'Mestrado', 2, '8', '25', 'Ciência da Computação', 15, '0000-00-00 00:00:00', '2017-05-09 17:17:25'),
(15, 'ANA PAULA TROVATTI UETANABARO', '84786787604', '233577063', 'aptuetanabaro@gmail.com', '(73) 36805190', 'Professor Adjunto B', 'DE', 'Micro-organismos e Biotecnologia', 'http://lattes.cnpq.br/3737108590720792', 5, 'Doutorado', 1, '7', '13', 'Ciências Biológicas', 16, '0000-00-00 00:00:00', '2017-05-10 12:28:28'),
(16, 'Álvaro Vinícius De Souza Coêlho', '623126695-87', '04782564 26', 'degas@uesc.br', '+55 73 991153436', 'Professor Adjunto', 'DE', 'dgp.cnpq.br/dgp/espelhogrupo/8618382355194719', 'http://lattes.cnpq.br/0191048428072248', 6, 'Doutorado', 2, '8', '1', 'Ciência da Comutação', 17, '0000-00-00 00:00:00', '2017-05-10 18:07:27'),
(17, 'Mauro De Paula Moreira', 'Bahia', '9032266331', 'mpmoreira@uesc.br', '73981404885', 'Professor Titular', 'DE', 'Estudos químicos, físicos e biológicos de compostos de interesse da indústria de alimentos', 'http://lattes.cnpq.br/8815201786989361', 7, 'Doutorado', 2, '23', '12', 'Tratamento de Águas de Abastecimento e Residuárias', 18, '0000-00-00 00:00:00', '2017-05-11 12:34:55'),
(18, 'Fábio Flores Lopes', '51628198087', '9033803389', 'fabiologo5@hotmail.com', '(73) 991342142', 'Professor', 'DE', 'Ictiologia', 'plataforma lattes.cnpq.br', 5, 'Doutorado', 1, '13', '13', 'Ictiologia', 19, '0000-00-00 00:00:00', '2017-05-11 13:29:58'),
(19, 'Fábio', '51628198087', '9033803389', 'fabiofloreslopes@gmail.com', '(73) 991342142', 'Professor', 'DE', 'Ictiologia', 'plataforma lattes.cnpq.br', 5, 'Doutorado', 1, '13', '13', 'Ictiologia', 20, '0000-00-00 00:00:00', '2017-05-11 13:33:51'),
(20, 'Gesil Amarante Segundo', 'Bahia', '422447064', 'gsamarante@uesc.br', '73988336112', 'Professor Adjunto B', 'DE', 'Propriedade Intelectual, Transferência de Tecnologia e Inovação Tecnológica', 'http://lattes.cnpq.br/2560106052820991', 7, 'Doutorado', 2, '1', '33', 'INTERDISCIPLINAR', 21, '0000-00-00 00:00:00', '2017-05-12 02:06:29'),
(21, 'Jorge Henrique De Oliveira Sales', '33405751268', '392915', 'jhosales@uesc.br', '36805563', 'Professor/pesquisador CNPq', 'DE', 'dgp.cnpq.br/dgp/espelhogrupo/5868936368692179', 'http://lattes.cnpq.br/9205464082942072', 7, 'Doutorado', 2, '5', '33', '1.01.04.00-3 Matemática Aplicada, 3.05.01.00-8 Fenômenos de Transporte', 22, '0000-00-00 00:00:00', '2017-05-12 13:16:51'),
(22, 'Fabio Da Conceição Cruz', '02503684556', '0873504321', 'fabiocruz28@yahoo.com.br', '7336805682', 'Professor', 'DE', 'Grupo de Pesquisas em Energias Renováveis e Eficiência Energética', 'http://lattes.cnpq.br/3432655102329328', 7, 'Mestrado', 2, '8', '25', 'Engenharia Elétrica', 23, '0000-00-00 00:00:00', '2017-05-12 13:49:25'),
(23, 'Maria Josefina Vervloet Fontes', '34037560500', '217678', 'josefinavervloetfontes@gmail.com', '73991355598', 'professor', '40h', '1. Desenvolvimento e Competitividade', 'http://lattes.cnpq.br/6424415622678540', 4, 'Doutorado', 3, '1', '1', '1. Grande área: Ciências Sociais Aplicadas / Área: Administração.', 24, '0000-00-00 00:00:00', '2017-05-15 19:16:14'),
(24, 'Leard De Oliveira Fernandes', '01756367531', '1152816063', 'lofernandes@uesc.br', '77988691957', 'Professor Assitente', 'DE', 'dgp.cnpq.br/dgp/espelhogrupo/9123939364326217', 'http://lattes.cnpq.br/2336053278435285', 7, 'Mestrado', 2, '8', '25', 'MULTIDISCIPLINAR', 25, '0000-00-00 00:00:00', '2017-05-16 17:27:08'),
(25, 'Paulo Eduardo Ambrósio', '13115811896', '18427035', 'peambrosio@uesc.br', '73-3680-5576', 'Professor Assistente', 'DE', 'Biologia Computacional e Reconhecimento de Padrões   (dgp.cnpq.br/dgp/espelhogrupo/7750750298957575)', 'http://lattes.cnpq.br/5034444360451621', 7, 'Doutorado', 2, '33', '25', 'Metodologia e Técnicas da Computação', 26, '0000-00-00 00:00:00', '2017-05-19 11:30:10'),
(26, 'Gesil Sampaio Amarante Segundo', '', '', 'gsamarante@uesc.br', '', '', '', '', '', 0, '', 0, '', '', '', 27, '0000-00-00 00:00:00', '2017-05-29 11:54:23'),
(27, 'Maria Josefina Vervloet Fontes', '', '', 'josefinavervloetfontes@gmail.com', '', '', '', '', '', 0, '', 0, '', '', '', 28, '0000-00-00 00:00:00', '2017-05-29 17:51:34'),
(28, 'Eduardo José dos Reis Nobre Junior', '', '', 'eduardo.reisnobre@gmail.com', '', '', '', '', '', 0, '', 0, '', '', '', 29, '0000-00-00 00:00:00', '2017-05-29 19:19:00'),
(29, 'Josealdo Tonholo', '', '', 'tonholo@gmail.com', '', '', '', '', '', 0, '', 0, '', '', '', 30, '0000-00-00 00:00:00', '2017-06-08 11:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `grande_area`
--

CREATE TABLE IF NOT EXISTS `grande_area` (
  `garea_id` int(11) NOT NULL AUTO_INCREMENT,
  `garea_nome` varchar(100) NOT NULL,
  `garea_sigla` varchar(45) NOT NULL,
  PRIMARY KEY (`garea_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `grande_area`
--

INSERT INTO `grande_area` (`garea_id`, `garea_nome`, `garea_sigla`) VALUES
(1, 'Ciências da Vida (Ciências Biológicas, Ciências da Saúde e Ciências Agrárias)', 'Vida'),
(2, 'CiÃªncias Exatas, da Terra e Engenharia', 'Exatas'),
(3, 'CiÃªncias Humanas, Sociais Aplicadas e LinguÃ­stica, Letras e Artes', 'Humanas');

-- --------------------------------------------------------

--
-- Table structure for table `observacao`
--

CREATE TABLE IF NOT EXISTS `observacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_projeto_id` int(11) NOT NULL DEFAULT '0',
  `FK_avaliador_id` varchar(4096) NOT NULL DEFAULT '0',
  `texto` varchar(4096) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `observacao`
--

INSERT INTO `observacao` (`id`, `FK_projeto_id`, `FK_avaliador_id`, `texto`) VALUES
(1, 1, '2', ''),
(2, 3, '2', ''),
(3, 17, '6', 'Projeto bem escrito, com literatura atualizada. Os autores, mesmo com as dificuldades de fazer levantamento patentário inerentes ao software, ainda assim conseguiram uma interessante análise de potencialidade de mercado. Projeto com elevada pontencialidade de geração de produto tecnológico. Recomendo aprovação.'),
(4, 21, '6', 'Projeto excelente. Muito bem construído e com aderência ao PROGRAMA PIBITI. O UESC 360 deve permitir a visualização de informações de competências tecnológicas com um viés mais contemporâneo e sintonizado com as tendências mundiais. O sistema deve ter aplicação imediata na própria instituição, mas tem potencial para ser propagado para instituições de conhecimento similares. Recomendo fortemente.\n'),
(5, 13, '6', 'Projeto excelente. Bem construído e com metodologia inteligente. Apesar de ser um projeto de nível computacional, prevê a análise de troca de calor, parâmetros cinéticos e termodinâmicos de um setor que é prioridade regional. O uso de ferramentas computacionais deve permitir uma proposta de geometria mais adequada à atividade técnica e ao menor consumo de energia. Recomendo FORTEMENTE.'),
(6, 22, '6', 'O Projeto está bem escrito do ponto de vista dos fundamentos e da técnica. Peca apenas pela prospecção de mercado e análise da concorrência, já que sistemas deste tipo são regularmente utilizados por empresas de energia, mesmo que baseado em outros fundamentos. Recomendo a aprovação.'),
(7, 15, '6', ''),
(8, 10, '6', 'Os planos de trabalho e o projeto são muito bem detalhados, com riqueza de informações sobre o objeto em questão. O projeto deve ser aprovado, mas alertamos ao orientador que deve focar mais num PRODUTO tecnológico, o que não fica claro no projeto. Da forma como foi apresentado, fica configurado projeto de PIBIC e não PIBITI. '),
(9, 12, '6', 'O projeto não tem configuração de PIBITI. Trata-se de uma investigação científica e não tecnológica, como apontado pelos autores,  "espera-se conseguir uma maior compreensão por parte dos integrantes em relação á tecnologia envolvida nos processos". Aspectos de mercado, revisão patentária, etc não foram considerados. Não recomendado.'),
(10, 23, '6', 'Projeto de temática contemporânea e intimamente relacionada à Inovação. A Certificação pelo CERNE é um processo árduo e deve ser desenvolvido pela própria equipe da incubadora e seus colaboradores, maiores conhecedores das potencialidades de negócios gerados e também  das dificuldades institucionais na operação deste habitat de inovação. Projeto bem construído e com méritos para aprovação.'),
(11, 16, '6', 'Um dos gargalos de operação dos NITs é a construção de um sistema de gestão sintonizados com as demais ferramentas utilizadas pela instituição. A conexão deste com sistemas e evidenciam competências, a exemplo do UESC 360, é uma virtude em favor da prospecção de oportunidades dentro e fora da instituição. O projeto é contemporâneo e intimamente relacionado com inovação. Recomendo fortemente.'),
(12, 11, '6', 'Projeto surpreendente, inovador e importante para maximizar a promoção da inovação e dos empreendimentos inovadores no âmbito das instituições e sistemas de inovação. Ferramenta estratégica para o posicionamento da empresa/instituição no ambiente de inovação.\nRecomendo fortemente. '),
(13, 14, '6', 'Projeto bem escrito e com potencial de sucesso. A revisão de mercado deixou a desejar, particularmente quanto aos produtos concorrentes. Entendemos que do ponto de vista pedagógico os autores devem apostar em gameficação e uso de aplicativos em dispositivos móveis, o que enriqueceria o interesse de mercado. Recomendo a aprovação.');

-- --------------------------------------------------------

--
-- Table structure for table `plano_trabalho`
--

CREATE TABLE IF NOT EXISTS `plano_trabalho` (
  `plano_id` int(11) NOT NULL AUTO_INCREMENT,
  `orig_name` varchar(255) NOT NULL,
  `raw_name` varchar(255) NOT NULL,
  `file_ext` varchar(10) NOT NULL,
  `plano_titulo` varchar(255) NOT NULL,
  `plano_arquivo` varchar(255) NOT NULL,
  `plano_ordem` int(11) NOT NULL,
  `plano_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_proj_id` int(11) NOT NULL,
  `fk_doc_id` int(11) NOT NULL,
  `ano` varchar(4) NOT NULL DEFAULT '2016',
  PRIMARY KEY (`plano_id`),
  KEY `fk_proj_id` (`fk_proj_id`),
  KEY `fk_doc_id` (`fk_doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `plano_trabalho`
--

INSERT INTO `plano_trabalho` (`plano_id`, `orig_name`, `raw_name`, `file_ext`, `plano_titulo`, `plano_arquivo`, `plano_ordem`, `plano_data`, `fk_proj_id`, `fk_doc_id`, `ano`) VALUES
(8, 'Plano_de_Trabalho_1_PIBIT_2017.pdf', 'e0b5d48143bd3d941fdd447ab6700f1f', '.pdf', 'Avaliar o efeito da adição de diferentes concentrações de DHA associado ao antioxidante Trolox® em diluidores de congelação de sêmen equino sobre a cinética espermática e integridade, estrutural e funcional, da membrana espermática após a descongelação', 'e0b5d48143bd3d941fdd447ab6700f1f.pdf', 1, '2017-04-26 15:40:11', 0, 8, '2016'),
(9, 'Plano_de_Trabalho_2_PIBIT_2017.pdf', 'd6f769c9995ea48664d5c9a0a205e628', '.pdf', 'Avaliar o efeito da adição de diferentes concentrações de DHA associado ao antioxidante Trolox® em diluidores de congelação de sêmen equino sobre a integridade do DNA, atividade mitocondrial e nível de peroxidação lipídica nas amostras após a descongelaçã', 'd6f769c9995ea48664d5c9a0a205e628.pdf', 2, '2017-04-26 15:40:46', 0, 8, '2016'),
(10, 'ANEXOII_pibitiPlano1_marcas.pdf', '6acb3aa22be2c95568541db2c6ec548d', '.pdf', 'Marcas e seus tratados com nomes estrangeiros', '6acb3aa22be2c95568541db2c6ec548d.pdf', 1, '2017-05-09 18:51:10', 0, 12, '2016'),
(11, 'ANEXOII_pibitiPlano2_tratados_patentes.pdf', '8841075d08f587b7cb8c6e6f6db6d4bd', '.pdf', 'Tratados e/ou patentes com nomes estrangeiros', '8841075d08f587b7cb8c6e6f6db6d4bd.pdf', 2, '2017-05-09 18:52:43', 0, 12, '2016'),
(12, 'Projeto_de_IT_-_Plano_de_Trabalho_-_1.pdf', 'f67ccdc15b1ee0e8124d9a9f40831b36', '.pdf', 'Estudo e otimização do processo de degradação de surfactantes através da fotocatálise heterogênea do sistema TiO2/UV', 'f67ccdc15b1ee0e8124d9a9f40831b36.pdf', 1, '2017-05-12 13:48:14', 0, 17, '2016'),
(13, 'Projeto_de_IT_Plano_de_Trabalho_-_2.pdf', '7d50922df3ad82639497baa3fed7f46c', '.pdf', 'Estudo e otimização do processo de degradação de surfactantes através da fotocatálise homogênea do sistema H2O2/UV', '7d50922df3ad82639497baa3fed7f46c.pdf', 2, '2017-05-12 13:49:13', 0, 17, '2016'),
(14, 'ANEXOII_1.pdf', '49c3fcb7dc1e148a23440f1467c54b19', '.pdf', 'Efeito do Fermentador Cilíndrico Rotativo sobre Amêndoa de Cacau', '49c3fcb7dc1e148a23440f1467c54b19.pdf', 1, '2017-05-12 16:28:49', 0, 21, '2016'),
(15, 'ANEXOII_2.pdf', '75016e9180c45f48c856f0b3f439def7', '.pdf', 'Simulando o Fermentador Cilíndrico Rotacional para o Cacau', '75016e9180c45f48c856f0b3f439def7.pdf', 2, '2017-05-12 16:32:40', 0, 21, '2016'),
(16, 'Plano_de_Trabalho_do_Bolsista_PIBITI-UESC_1.pdf', '12cc565d9df2406ffd9d02f66b5965e9', '.pdf', 'Programação do Jogo', '12cc565d9df2406ffd9d02f66b5965e9.pdf', 1, '2017-05-12 16:39:38', 0, 16, '2016'),
(17, 'Plano_de_Trabalho_do_Bolsista_PIBITI-UESC_2.pdf', '001280406b99a766c6047722463c234c', '.pdf', 'Adequação do Jogo às metodologias de ensino', '001280406b99a766c6047722463c234c.pdf', 1, '2017-05-12 16:40:32', 0, 16, '2016'),
(18, 'Plano_de_Trabalho_do_Bolsista_PIBITI-UESC_1.pdf', '0c51f27e819dfde63fd1932614382809', '.pdf', 'Programação do Jogo', '0c51f27e819dfde63fd1932614382809.pdf', 1, '2017-05-12 16:41:04', 0, 16, '2016'),
(19, 'Plano_de_Trabalho_do_Bolsista_PIBITI-UESC_2.pdf', 'aaaf0e4031931a5e2b90eb5908483087', '.pdf', 'Adequação do jogo às metodologias de ensino/aprendizagem de línguas', 'aaaf0e4031931a5e2b90eb5908483087.pdf', 2, '2017-05-12 16:41:57', 0, 16, '2016'),
(20, 'Plano_1.pdf', 'fd6ba8daaa517ba7a655aa3ff2cadb4d', '.pdf', 'Desenvolvimento do protoboard virtual', 'fd6ba8daaa517ba7a655aa3ff2cadb4d.pdf', 1, '2017-05-16 00:16:37', 0, 13, '2016'),
(21, 'Plano_2.pdf', '2f681e091f244df1688fed7f0f9e30ba', '.pdf', 'Virtualização de componentes de hardware e Integração do protoboard virtual à plataforma IoTalho', '2f681e091f244df1688fed7f0f9e30ba.pdf', 2, '2017-05-16 00:18:48', 0, 13, '2016'),
(22, 'ANEXOII_Plano_I_Gesil.pdf', 'f6a669dad3102863a4a71b2f03f9bfcc', '.pdf', 'Consolidação da ferramenta SIMC para diagnóstico de produção de CT&I', 'f6a669dad3102863a4a71b2f03f9bfcc.pdf', 1, '2017-05-17 03:25:35', 0, 20, '2016'),
(23, 'ANEXOII_Plano_II_Gesil.pdf', 'f1feab25b32fb1bdabf000ee962054c0', '.pdf', 'Consolidação da ferramenta SIMC para diagnóstico de produção de CT&I', 'f1feab25b32fb1bdabf000ee962054c0.pdf', 1, '2017-05-17 03:26:28', 0, 20, '2016'),
(24, 'ANEXOII_Plano_I_Gesil.pdf', '2f1296731f0aa4e2b71b44ceb070ab99', '.pdf', 'Consolidação da ferramenta SIMC para diagnóstico de produção de CT&I', '2f1296731f0aa4e2b71b44ceb070ab99.pdf', 1, '2017-05-17 03:27:31', 0, 20, '2016'),
(25, 'ANEXOII_Plano_II_Gesil.pdf', '59562de369d59a20061f583b2884e4dd', '.pdf', 'Atualização do SAPPI e integração do SISNIT.', '59562de369d59a20061f583b2884e4dd.pdf', 2, '2017-05-17 03:28:20', 0, 20, '2016'),
(26, 'ANEXOII_-_PLANO_I.pdf', 'b3e22f7d14d88b07e2640fc76bdc2d71', '.pdf', 'Construcao do Middleware', 'b3e22f7d14d88b07e2640fc76bdc2d71.pdf', 1, '2017-05-19 01:00:29', 0, 14, '2016'),
(27, 'ANEXOII_-_PLANO_II.pdf', '3d1a8059518e145b11292c44e3000b69', '.pdf', 'Análise e desenvolvimento do Sistema WEB', '3d1a8059518e145b11292c44e3000b69.pdf', 2, '2017-05-19 01:00:56', 0, 14, '2016'),
(28, 'ANEXOII_plano_uesc_360_a.pdf', 'c38ffbcbcd33a1220bf7c5cb54146714', '.pdf', 'Ações referentes ao banco de dados do UESC 360', 'c38ffbcbcd33a1220bf7c5cb54146714.pdf', 1, '2017-05-19 14:11:51', 0, 11, '2016'),
(29, 'ANEXOII_plano_uesc_360_b_(1).pdf', '4f12613078758b6d2ccdddf181ede27c', '.pdf', 'Ações referentes aos controladores do UESC 360', '4f12613078758b6d2ccdddf181ede27c.pdf', 2, '2017-05-19 14:12:38', 0, 11, '2016'),
(30, 'ANEXOII.pdf', 'f9b935988e6f92e30aad8f7ae2155d1e', '.pdf', 'Desenvolvimento de programa computacional para suporte na avaliação de potencial eólico', 'f9b935988e6f92e30aad8f7ae2155d1e.pdf', 2, '2017-05-19 20:44:48', 0, 22, '2016'),
(31, 'Plano_de_Trabalho__Broto_Incubadora.pdf', '20c40a4b54d19bb3c54ef74ab79359a2', '.pdf', 'Desenvolvimento de protocolos de gestão e monitoramento de processos de incubação de base biotecnológica', '20c40a4b54d19bb3c54ef74ab79359a2.pdf', 1, '2017-05-20 02:27:17', 0, 15, '2016'),
(32, 'ANEXO_II_Broto_Incubadora_II.pdf', '3dab90f39a8f0e2a3238db9f5e2c9db9', '.pdf', 'Atualização do software/sistema de gestão da Broto Incubadora de Biotecnologia: Sistema SAPIEm', '3dab90f39a8f0e2a3238db9f5e2c9db9.pdf', 2, '2017-05-20 02:51:34', 0, 15, '2016');

-- --------------------------------------------------------

--
-- Table structure for table `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `proj_id` int(11) NOT NULL AUTO_INCREMENT,
  `proj_titulo` varchar(255) NOT NULL,
  `proj_arquivo` varchar(255) NOT NULL,
  `fk_doc_id` int(11) NOT NULL,
  `proj_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orig_name` varchar(255) NOT NULL,
  `raw_name` varchar(255) NOT NULL,
  `file_ext` varchar(10) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  `ano` varchar(4) NOT NULL DEFAULT '2016',
  PRIMARY KEY (`proj_id`),
  KEY `fk_doc_id` (`fk_doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `projeto`
--

INSERT INTO `projeto` (`proj_id`, `proj_titulo`, `proj_arquivo`, `fk_doc_id`, `proj_data`, `orig_name`, `raw_name`, `file_ext`, `ativo`, `ano`) VALUES
(1, 'MEU PROJETO', '451bac6e2f8cb3f6358418f9d5a579fc.pdf', 10, '2017-03-20 18:09:14', 'pdf.pdf', '451bac6e2f8cb3f6358418f9d5a579fc', '.pdf', 1, '2016'),
(10, 'Efeito de diferentes concentrações de Ácido Docosahexaenoico associado ao Trolox® sobre a qualidade de espermatozoides equino criopreservados', 'bd4252ba500dab341f82da21f3503a32.pdf', 8, '2017-04-26 15:39:33', 'Projeto_PIBIT_2017-2018.pdf', 'bd4252ba500dab341f82da21f3503a32', '.pdf', 1, '2016'),
(11, 'Título do projeto Desdobramentos de nomes de marcas, patentes e seus tratados em língua estrangeira', 'e74743765f3186d0cda46db9a18750ad.pdf', 12, '2017-05-09 18:53:51', 'ANEXOI_ProjetoPIBITI.pdf', 'e74743765f3186d0cda46db9a18750ad', '.pdf', 1, '2016'),
(12, 'Estudo e otimização do processo de degradação fotoquímica de surfactantes através de processos oxidativos avançados', 'b6e2ecfc340b40ab38249d27aa052d51.pdf', 17, '2017-05-12 13:46:43', 'Projeto_de_-_IT_-_POAs_Surfactantes.pdf', 'b6e2ecfc340b40ab38249d27aa052d51', '.pdf', 1, '2016'),
(13, 'Automação de um Fermentador Cilíndrico para o Cacau', '2f096d3f89bcf3c9303b20b5d775a307.pdf', 21, '2017-05-12 16:24:47', 'ANEXOI_Sales.pdf', '2f096d3f89bcf3c9303b20b5d775a307', '.pdf', 1, '2016'),
(14, 'World School', '0a91dbc6bf79fcb42b6ea4e24fa9db71.pdf', 16, '2017-05-12 16:39:18', 'Formulário_de_Projeto_de_Pesquisa_PIBITI-UESC.pdf', '0a91dbc6bf79fcb42b6ea4e24fa9db71', '.pdf', 1, '2016'),
(15, 'Desenvolvimento de uma aplicação Web para design de circuitos eletrônicos', '36aee2c9eb1a5f376ad71f8769725919.pdf', 13, '2017-05-16 00:13:16', 'Projeto.pdf', '36aee2c9eb1a5f376ad71f8769725919', '.pdf', 1, '2016'),
(16, 'SISNIT – Sistema Integrado de Suporte ao Núcleo de Inovação Tecnológica', 'dbc7c3db3db788d636847a4d3794c0c1.pdf', 20, '2017-05-17 03:24:33', 'ANEXOIProjeto_PIBITI.pdf', 'dbc7c3db3db788d636847a4d3794c0c1', '.pdf', 1, '2016'),
(17, ' InventoryIoT (I2oT): uma plataforma de gerenciamento automatizado de inventário', '53139b5755b0c69597c1fe5169a44937.pdf', 14, '2017-05-19 00:55:06', 'ANEXOI.pdf', '53139b5755b0c69597c1fe5169a44937', '.pdf', 1, '2016'),
(18, 'Atualizações de interface e código da aplicação-web UESC 360º.  Novos usos e recursos voltados à transferência tecnológica no SLI do território sul da BAHIA Possui fomento externo', '739d79fbee6aa5a74beeeb3a98d9e58a.pdf', 11, '2017-05-19 13:28:11', 'ANEXOI_uesc360.pdf', '739d79fbee6aa5a74beeeb3a98d9e58a', '.pdf', 1, '2016'),
(19, 'Atualizações de interface e código da aplicação-web UESC 360º.  Novos usos e recursos voltados à transferência tecnológica no SLI do território sul da BAHIA ', '4c330765afc622ae2ad628b1442b29a5.pdf', 11, '2017-05-19 14:08:54', 'ANEXOI_uesc360.pdf', '4c330765afc622ae2ad628b1442b29a5', '.pdf', 1, '2016'),
(20, 'Banco de dados do UESC 360', '27b507025dd6615be111b35ba34aa5da.pdf', 11, '2017-05-19 14:09:38', 'ANEXOII_plano_uesc_360_a.pdf', '27b507025dd6615be111b35ba34aa5da', '.pdf', 1, '2016'),
(21, 'Atualizações de interface e código da aplicação-web UESC 360º. Novos usos e recursos voltados à transferência tecnológica no SLI do território sul da BAHIA', '8384066e0da53eea6548a7791abd12c7.pdf', 11, '2017-05-19 14:11:15', 'ANEXOI_uesc360.pdf', '8384066e0da53eea6548a7791abd12c7', '.pdf', 1, '2016'),
(22, 'Desenvolvimento de programa computacional para suporte na avaliação de potencial eólico', 'dd1222483cc1ea716ad99130691d6374.pdf', 22, '2017-05-19 20:46:00', 'ANEXOI.pdf', 'dd1222483cc1ea716ad99130691d6374', '.pdf', 1, '2016'),
(23, 'Modelo de gestão e monitoramento de processos de incubação de base biotecnológica: uma aplicação para a Broto Incubadora', '503e10e64cd18085420b647555a0bced.pdf', 15, '2017-05-20 02:00:27', 'Projeto_PIBITI__Broto_Incubadora.pdf', '503e10e64cd18085420b647555a0bced', '.pdf', 1, '2016');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `stat_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`stat_id`, `stat_nome`) VALUES
(1, 'Enviado'),
(2, 'Em avaliaÃ§Ã£o'),
(3, 'Indeferido'),
(4, 'Sem avaliaÃ§Ã£o'),
(5, 'Com 1 avaliaÃ§Ã£o'),
(6, 'Com 2 avaliaÃ§Ãµes'),
(7, 'Necessita 3 avaliaÃ§Ã£o'),
(8, 'Aprovado'),
(9, 'Banco de reserva');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_avaliador`
--

CREATE TABLE IF NOT EXISTS `tipo_avaliador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tipo_avaliador`
--

INSERT INTO `tipo_avaliador` (`id`, `nome`) VALUES
(1, 'Interno'),
(2, 'Externo');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_relatorio`
--

CREATE TABLE IF NOT EXISTS `tipo_relatorio` (
  `tipo_rel_id` tinyint(10) NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  FULLTEXT KEY `descricao` (`descricao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_relatorio`
--

INSERT INTO `tipo_relatorio` (`tipo_rel_id`, `descricao`) VALUES
(0, 'PARCIAL'),
(1, 'FINAL');

-- --------------------------------------------------------

--
-- Table structure for table `titulacao`
--

CREATE TABLE IF NOT EXISTS `titulacao` (
  `titu_id` int(11) NOT NULL AUTO_INCREMENT,
  `titu_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`titu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `titulacao`
--

INSERT INTO `titulacao` (`titu_id`, `titu_nome`) VALUES
(1, 'Mestrado'),
(2, 'Doutorado');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '2',
  `ntry` int(1) NOT NULL DEFAULT '0',
  `usu_login` varchar(45) NOT NULL,
  `usu_senha` varchar(45) NOT NULL,
  `usu_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `teste` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usu_id`, `type`, `ntry`, `usu_login`, `usu_senha`, `usu_data`, `teste`) VALUES
(1, 1, 1, 'admin', '7aa129f67fde68c6d88aa58b8b8c5c28eb7dd3a3', '0000-00-00 00:00:00', 0),
(8, 2, 0, 'azevedo1989', 'c063ae3dad578cc2241f9d6dfdc4d609ef36e062', '2017-04-24 19:39:27', 0),
(9, 2, 0, 'Paola Snoeck', 'fc37a1f0c8202244e1a68779ce090512c07ee060', '2017-04-26 15:31:37', 0),
(10, 2, 0, 'Earmlucena1', 'f6839ddf78d6d2fd24aca16d0f9f3f160fccc5a9', '2017-04-26 19:47:48', 0),
(11, 2, 0, 'ricmas', 'fc53a53a2459dfcc6b720844e2a3b53e8496c7a6', '2017-05-04 12:49:30', 0),
(12, 2, 0, 'earezende', 'c4d96ba850130744b77161569e25be60eb4e986b', '2017-05-05 17:34:06', 0),
(13, 2, 0, 'prismaxe@gmail.com', 'e03428c514c90a8552c01f2d09253da56caca8c3', '2017-05-08 22:48:00', 0),
(14, 2, 0, 'plsobreira', 'ce2990d31bc6dab5600905cdebc6ae9f639f0c65', '2017-05-09 12:24:52', 0),
(15, 2, 0, 'jauberth@gmail.com', 'e909ddfa7756a4b63def41c22d51eb3288477ecc', '2017-05-09 17:17:25', 0),
(16, 2, 0, 'aptuetanabaro', '1c70ac632a55f1ec12aaacaca4e9c2fe02820169', '2017-05-10 12:28:28', 0),
(17, 2, 0, 'degas', 'd34eacb9e9f3fab728daa0c08d2061faa4bf1a90', '2017-05-10 18:07:27', 0),
(18, 2, 0, 'mpmoreira', '360e25bae0e5041f0f471542f2997a628cd4bd60', '2017-05-11 12:34:55', 0),
(19, 2, 0, 'fabiologo5@hotmail.com', 'd94e448f35aa1505bf8c52be1e79b26819170790', '2017-05-11 13:29:58', 0),
(20, 2, 0, 'fabio', 'd94e448f35aa1505bf8c52be1e79b26819170790', '2017-05-11 13:33:51', 0),
(21, 2, 0, 'gesil', '7382d4515fa1ad2ed2bfeab55f6e933fb6700486', '2017-05-12 02:06:29', 0),
(22, 2, 0, 'Sales', '32abf9a3dabcc0917ed6c62bbfefaef0e31b226e', '2017-05-12 13:16:51', 0),
(23, 2, 0, 'fabiocruz', '245b4b1f131f5a5c06d8dcc30127be11afe77e4e', '2017-05-12 13:49:25', 0),
(24, 2, 0, 'josefinafontes', 'e8563e9b12d47f0748009416c10b2abf1210eca8', '2017-05-15 19:16:14', 0),
(25, 2, 0, 'leard', 'bbaeec2149c4161d2a4056d2f313f33beb6e9651', '2017-05-16 17:27:08', 0),
(26, 2, 0, 'peambrosio', 'ce9415510a40957bd9f4060182f29d08354f64ec', '2017-05-19 11:30:10', 0),
(27, 3, 1, 'gsamarante@uesc.br', 'fdc00bc88fc8b7ee6bdd6f1dd79db596bae07e96', '2017-05-29 11:54:23', 0),
(28, 3, 0, 'josefinavervloetfontes@gmail.com', 'ebae5bf28623f9d51b732c8f5e8fb42d3a657629', '2017-05-29 17:51:34', 0),
(30, 3, 0, 'tonholo@gmail.com', '639ca9d283474210b3c40d0acb234c53f9e39d86', '2017-06-08 11:37:33', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avaliacao_interna`
--
ALTER TABLE `avaliacao_interna`
  ADD CONSTRAINT `FK_avaliacao_interna_criterio_orientador` FOREIGN KEY (`FK_criterio_orientador_id`) REFERENCES `criterio_orientador` (`id`),
  ADD CONSTRAINT `FK_avaliacao_interna_criterio_projeto` FOREIGN KEY (`FK_criterio_projeto_id`) REFERENCES `criterio_projeto` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
