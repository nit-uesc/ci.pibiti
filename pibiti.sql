-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2018 at 09:25 AM
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
