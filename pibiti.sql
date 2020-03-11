-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2020 at 09:06 AM
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
(4, 'ARTES / MÚSICA'),
(5, 'ASTRONOMIA / FÍSICA'),
(6, 'BIODIVERSIDADE'),
(7, 'BIOTECNOLOGIA'),
(8, 'CIÊNCIA DA COMPUTAÇÃO'),
(9, 'CIÊNCIA DE ALIMENTOS'),
(10, 'CIÊNCIA POLÍTICA E RELAÇÕES INTERNACIONAIS'),
(11, 'CIÊNCIAS AGRÁRIAS I'),
(12, 'CIÊNCIAS AMBIENTAIS'),
(13, 'CIÊNCIAS BIOLÓGICAS I'),
(14, 'CIÊNCIAS BIOLÓGICAS II'),
(15, 'CIÊNCIAS BIOLÓGICAS III'),
(16, 'CIÊNCIAS SOCIAIS APLICADAS I'),
(17, 'DIREITO'),
(18, 'ECONOMIA'),
(19, 'EDUCAÇÃO'),
(20, 'EDUCAÇÃO FÍSICA'),
(21, 'ENFERMAGEM'),
(22, 'ENGENHARIAS I'),
(23, 'ENGENHARIAS II'),
(24, 'ENGENHARIAS III'),
(25, 'ENGENHARIAS IV'),
(26, 'ENSINO'),
(27, 'FARMÁCIA'),
(28, 'FILOSOFIA/TEOLOGIA:subcomissão FILOSOFIA'),
(29, 'FILOSOFIA/TEOLOGIA:subcomissão TEOLOGIA'),
(30, 'GEOCIẼNCIAS'),
(31, 'GEOGRAFIA'),
(32, 'HISTÓRIA'),
(33, 'INTERDISCIPLINAR'),
(34, 'LETRAS / LINGUÍSTICA'),
(35, 'MATEMÁTICA / PROBABILIDADE E ESTATÍSTICA'),
(36, 'MATERIAIS'),
(37, 'MEDICINA I'),
(38, 'MEDICINA II'),
(39, 'MEDICINA III'),
(40, 'MEDICINA VETERINÁRIA'),
(41, 'NUTRIÇÃO'),
(42, 'ODONTOLOGIA'),
(43, 'PLANEJAMENTO URBANO E REGIONAL / DEMOGRAFIA'),
(44, 'PSICOLOGIA'),
(45, 'QUÍMICA'),
(46, 'SAÚDE COLETIVA'),
(47, 'SERVIÇO SOCIAL'),
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
(1, 'Caráter inovador, de acordo com Manual de Oslo (ver página do NIT) '),
(2, 'Potencial de geração de patente, ou cultivar, ou registro de software '),
(3, 'Potencial de transferência de tecnologia para o setor produtivo privado ou geração de negócios a partir de "spin-off" da academia '),
(4, 'Revisão Patentária / Busca de Anterioridade '),
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
(1, 'Com bolsa de produtividade em Desenvolvimento Tecnológico e Extensão Inovadora (DT) ou em Pesquisa', 5),
(2, 'Produção média acima de 1 artigo científico/ano em Qualis A nos últimos 3 anos', 4),
(3, 'Produção média entre 1 e 0,6 artigo científicos/ano em Qualis A nos últimos 3 anos', 3),
(4, 'Produção média acima de e 1,0 artigo cientí­fico/ano em Qualis A ou B nos últimos 3 anos ', 2),
(5, 'Produção média acima de 0,5 artigo científico/ano em Qualis A ou B, ou livro/capítulo de livro ', 1);

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
(1, 'Coordenado pelo proponente e financiado por agência de fomento ou empresa e caracterizado na Área de Desenvolvimento Tecnológico e Inovação', 5),
(2, 'Com participação do proponente como pesquisador/colaborador e financiado por agência de fomento ou empresa e caracterizado na Área de Desenvolvimento Tecnológico e Inovação', 4),
(3, 'Coordenado pelo proponente e financiado por agência de fomento, caracterizado como projeto de pesquisa básica que possua potencial para desenvolvimento de produtos ou processos inovadores', 3),
(4, 'Com participação do proponente como pesquisador/colaborador e financiado por agência de fomento, caracterizado como projeto de pesquisa básica que possua potencial para desenvolvimento de produtos ou processos inovadores', 2),
(5, 'Propostas sem comprovação de financiamento, mas com comprovação de infra-estrutura com capacidade instalada para execução do projeto', 1);

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
(1, 'Administração'),
(2, 'Agronomia'),
(3, 'Biomedicina'),
(4, 'Ciências Biológicas - Bacharelado'),
(5, 'Ciências Contábeis'),
(6, 'Ciência da Computação'),
(7, 'Comunicação Social'),
(8, 'Direito'),
(9, 'Economia'),
(10, 'Enfermagem'),
(11, 'Engenharia Civil'),
(12, 'Engenharia de Produção'),
(13, 'Engenharia Elétrica'),
(14, 'Engenharia Mecânica'),
(15, 'Engenharia Quí­mica'),
(16, 'Física - Bacharelado'),
(17, 'Geografia - Bacharelado'),
(18, 'LEA'),
(19, 'Medicina'),
(20, 'Medicina Veterinária'),
(21, 'Matemática - Bacharelado'),
(22, 'Química - Bacharelado'),
(23, 'Ciências Biológicas - Licenciatura'),
(24, 'Física - Licenciatura'),
(25, 'Geografia - Licenciatura'),
(26, 'Matemática - Licenciatura'),
(27, 'Química - Licenciatura'),
(28, 'Ciências Sociais'),
(29, 'Educação Fí­sica'),
(30, 'Filosofia'),
(31, 'História'),
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
(1, 'Com bolsa de produtividade em Desenvolvimento Tecnológico e Extensão Inovadora (DT) ou em Pesquisa (PQ), ou registro de um software, ou depósito de patentes, ou proteção de cultivares nos últimos 3 anos', 5),
(3, 'Produção média acima de 2 artigos cientí­ficos/ano em Qualis A nos últimos 3 anos', 4),
(4, 'Produção média entre 0,5 e 2,0 artigos científicos/ano em Qualis A nos últimos 3 anos', 3),
(5, 'Produção média abaixo de 0,5 artigo cientí­fico/ano em Qualis A, ou qualquer produção em Qualis B ou C, ou livro/capí­tulo de livro nos últimos 3 anos', 1);

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
(3, 'Departamento de Ciências Agrárias e Ambientais', 'DCAA'),
(4, 'Departamento de Administração e Ciências Contábeis', 'DCAC'),
(5, 'Departamento de Ciências Biológicas', 'DCB'),
(6, 'Departamento de Ciências Econômicas', 'DCEC'),
(7, 'Departamento de Ciências Exatas e Tecnológicas', 'DCET'),
(8, 'Departamento de Ciências da Educação', 'DCIE'),
(9, 'Departamento de Ciências da Saúde', 'DCS'),
(10, 'Departamento de Ciências Jurí­dicas', 'DCIJUR'),
(11, 'Departamento de Filosofia e Ciências Humanas', 'DFCH'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

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
(2, 'Ciências Exatas, da Terra e Engenharia', 'Exatas'),
(3, 'Ciências Humanas, Sociais Aplicadas e Linguí­stica, Letras e Artes', 'Humanas');

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
(2, 'Em avaliação'),
(3, 'Indeferido'),
(4, 'Sem avaliação'),
(5, 'Com 1 avaliação'),
(6, 'Com 2 avaliações'),
(7, 'Necessita 3 avaliação'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usu_id`, `type`, `ntry`, `usu_login`, `usu_senha`, `usu_data`, `teste`) VALUES
(31, 1, 0, 'admin', '445592c17d0076c0c235341c0f7ca75bb010bc82', '2020-03-11 12:03:26', 0);

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
