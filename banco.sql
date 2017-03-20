-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: pibiti
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `area_capes`
--

DROP TABLE IF EXISTS `area_capes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_capes` (
  `area_capes_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_area` text NOT NULL,
  PRIMARY KEY (`area_capes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_capes`
--

LOCK TABLES `area_capes` WRITE;
/*!40000 ALTER TABLE `area_capes` DISABLE KEYS */;
INSERT INTO `area_capes` VALUES (1,'ADMINISTRAÇÃO , CIÊNCIAS CONTÁBEIS E TURISMO'),(2,'ANTROPOLOGIA / ARQUEOLOGIA'),(3,'ARQUITETURA E URBANISMO'),(4,'ARTES / MÚSICA'),(5,'ASTRONOMIA / FÍSICA'),(6,'BIODIVERSIDADE'),(7,'BIOTECNOLOGIA'),(8,'CIÊNCIA DA COMPUTAÇÃO'),(9,'CIÊNCIA DE ALIMENTOS'),(10,'CIÊNCIA POLÍTICA E RELAÇÕES INTERNACIONAIS'),(11,'CIÊNCIAS AGRÁRIAS I'),(12,'CIÊNCIAS AMBIENTAIS'),(13,'CIÊNCIAS BIOLÓGICAS I'),(14,'CIÊNCIAS BIOLÓGICAS II'),(15,'CIÊNCIAS BIOLÓGICAS III'),(16,'CIÊNCIAS SOCIAIS APLICADAS I'),(17,'DIREITO'),(18,'ECONOMIA'),(19,'EDUCAÇÃO'),(20,'EDUCAÇÃO FÍSICA'),(21,'ENFERMAGEM'),(22,'ENGENHARIAS I'),(23,'ENGENHARIAS II'),(24,'ENGENHARIAS III'),(25,'ENGENHARIAS IV'),(26,'ENSINO'),(27,'FARMÁCIA'),(28,'FILOSOFIA/TEOLOGIA:subcomissão FILOSOFIA'),(29,'FILOSOFIA/TEOLOGIA:subcomissão TEOLOGIA'),(30,'GEOCIÊNCIAS'),(31,'GEOGRAFIA'),(32,'HISTÓRIA'),(33,'INTERDISCIPLINAR'),(34,'LETRAS / LINGUÍSTICA'),(35,'MATEMÁTICA / PROBABILIDADE E ESTATÍSTICA'),(36,'MATERIAIS'),(37,'MEDICINA I'),(38,'MEDICINA II'),(39,'MEDICINA III'),(40,'MEDICINA VETERINÁRIA'),(41,'NUTRIÇÃO'),(42,'ODONTOLOGIA'),(43,'PLANEJAMENTO URBANO E REGIONAL / DEMOGRAFIA'),(44,'PSICOLOGIA'),(45,'QUÍMICA'),(46,'SAÚDE COLETIVA'),(47,'SERVIÇO SOCIAL'),(48,'SOCIOLOGIA'),(49,'ZOOTECNIA / RECURSOS PESQUEIROS');
/*!40000 ALTER TABLE `area_capes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao_externa`
--

DROP TABLE IF EXISTS `avaliacao_externa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao_externa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_projeto_id` int(11) NOT NULL,
  `FK_avaliador_id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_externa`
--

LOCK TABLES `avaliacao_externa` WRITE;
/*!40000 ALTER TABLE `avaliacao_externa` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_externa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao_externa_has_criterio_externo`
--

DROP TABLE IF EXISTS `avaliacao_externa_has_criterio_externo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao_externa_has_criterio_externo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_avaliacao_externa_id` int(11) NOT NULL DEFAULT '0',
  `FK_criterio_externo_id` int(11) NOT NULL DEFAULT '0',
  `pontuacao` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_externa_has_criterio_externo`
--

LOCK TABLES `avaliacao_externa_has_criterio_externo` WRITE;
/*!40000 ALTER TABLE `avaliacao_externa_has_criterio_externo` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_externa_has_criterio_externo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao_interna`
--

DROP TABLE IF EXISTS `avaliacao_interna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao_interna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_projeto_id` int(11) NOT NULL DEFAULT '0',
  `FK_avaliador_id` int(11) NOT NULL DEFAULT '0',
  `FK_criterio_projeto_id` tinyint(4) DEFAULT '0',
  `FK_criterio_orientador_id` tinyint(4) DEFAULT '0',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_avaliacao_interna_criterio_orientador` (`FK_criterio_orientador_id`),
  KEY `FK_avaliacao_interna_criterio_projeto` (`FK_criterio_projeto_id`),
  CONSTRAINT `FK_avaliacao_interna_criterio_orientador` FOREIGN KEY (`FK_criterio_orientador_id`) REFERENCES `criterio_orientador` (`id`),
  CONSTRAINT `FK_avaliacao_interna_criterio_projeto` FOREIGN KEY (`FK_criterio_projeto_id`) REFERENCES `criterio_projeto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_interna`
--

LOCK TABLES `avaliacao_interna` WRITE;
/*!40000 ALTER TABLE `avaliacao_interna` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_interna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliador`
--

DROP TABLE IF EXISTS `avaliador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_usuario_id` int(11) NOT NULL DEFAULT '0',
  `FK_tipo_avaliador_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliador`
--

LOCK TABLES `avaliador` WRITE;
/*!40000 ALTER TABLE `avaliador` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario_doc`
--

DROP TABLE IF EXISTS `comentario_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario_doc` (
  `comentario_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_doc_id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`comentario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario_doc`
--

LOCK TABLES `comentario_doc` WRITE;
/*!40000 ALTER TABLE `comentario_doc` DISABLE KEYS */;
INSERT INTO `comentario_doc` VALUES (11,29,'O projeto tem características de PIBIC, com potencial mais acadêmico que tecnológico.  Os planos de trabalho estão pobres.\r\n'),(12,28,'O projeto pode apoiar a IT com informações sobre o setor da agroindústria, mas, para ser enquadrado como inovação, deveria agregar algo efetivamente inovador, como um algoritmo específico.  \r\n'),(13,10,'O projeto está bem embasado, tendo sido feito um bom levantamento patentário.  O criação de vacinas deverá interessar ao mercado, se tiver sucesso.  Só há um plano de trabalho, aparentando ser muita atividade para só 1 bolsista.\r\n'),(14,31,'bbbbbbbbbbbbbb'),(15,5,'O projeto tem potencial mais didático que tecnológico.  Poderá se tornar comercial se for efetivamente utilizado na avaliação de adsorventes e habilitado para, por exemplo, otimizar estações reais.\r\nA revisão patentária foi pobre.\r\n'),(16,7,'O projeto pode apoiar a IT com informações sobre as competências da UESC, mas, para ser enquadrado como inovação, deveria agregar algo efetivamente inovador, como um algoritmo específico.  \r\n'),(17,27,'Projeto com bom potencial inovador.  É importante definir claramente se haverá um produto voltado ao mercado, como um software de avaliação da aplicação do RVA em determinada região.  \r\nO plano de trabalho está sem o cronograma.  \r\n'),(18,21,'Projeto com bom potencial inovador.   O código aberto limita a comercialização do produto.\r\n'),(19,15,'Projeto com bom potencial inovador.  \r\n'),(20,20,'O projeto tem características de varredura inicial, com visão ainda difusa sobre o produto final.  Mas o levantamento de patentes está muito bom.  O plano de trabalho está bem intenso e há risco de não cumprí-lo.\r\n'),(21,14,'O projeto é muito abrangente e pode ter dificuldade de ser realizado no prazo proposto.  A característica de Inovação Tecnológica não foi explicitada.  Os planos de trabalho devem ser diferenciados.\r\n'),(22,23,'O projeto será desenvolvido numa área com muitas patentes, devendo ser necessária uma avaliação mais criteriosa.   O plano de trabalho está bem intenso e há risco de não cumprí-lo.\r\n'),(23,24,'O projeto tem características de PIBIC, com potencial mais acadêmico que tecnológico.  Não há cunho de Inovação Tecnológica.\r\n'),(24,17,'Projeto com bom potencial inovador.  O plano de trabalho está com cronograma adequado.\r\n'),(25,32,'Projeto com bom potencial inovador.  O plano de trabalho está sem o cronograma.\r\n'),(26,18,'O projeto tem potencial mais didático que tecnológico.  Poderá se tornar comercial se for efetivamente utilizado na avaliação / otimizar estações reais.\r\nA revisão patentária foi pobre.\r\nPlano de Trabalho sem cronogramas.\r\n'),(27,11,'O projeto pode apoiar a IT com informações sobre as competências da UESC, mas, para ser enquadrado como inovação, deveria agregar algo efetivamente inovador, como um algoritmo específico.  \r\n\r\n\r\n');
/*!40000 ALTER TABLE `comentario_doc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criterio_externo`
--

DROP TABLE IF EXISTS `criterio_externo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criterio_externo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterio_externo`
--

LOCK TABLES `criterio_externo` WRITE;
/*!40000 ALTER TABLE `criterio_externo` DISABLE KEYS */;
INSERT INTO `criterio_externo` VALUES (1,'Caráter inovador, de acordo com Manual de Oslo (ver página do NIT) '),(2,'Potencial de geração de patente, ou cultivar, ou registro de software '),(3,'Potencial de transferência de tecnologia para o setor produtivo privado ou geração de negócios a partir de “spin-off” da academia '),(4,'Revisão Patentária / Busca de Anterioridade '),(5,'Plano de Trabalho do Bolsista ');
/*!40000 ALTER TABLE `criterio_externo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criterio_orientador`
--

DROP TABLE IF EXISTS `criterio_orientador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criterio_orientador` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL DEFAULT 'Não especificado',
  `pontuacao` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterio_orientador`
--

LOCK TABLES `criterio_orientador` WRITE;
/*!40000 ALTER TABLE `criterio_orientador` DISABLE KEYS */;
INSERT INTO `criterio_orientador` VALUES (1,'Com bolsa de produtividade em Desenvolvimento Tecnológico e Extensão Inovadora (DT) ou em Pesquisa (',5),(2,'Produção média acima de 1 artigo científico/ano em Qualis A nos últimos 3 anos',4),(3,'Produção média entre 1 e 0,6 artigo científicos/ano em Qualis A nos últimos 3 anos',3),(4,'Produção média acima de e 1,0 artigo científico/ano em Qualis A ou B nos últimos 3 anos ',2),(5,'Produção média acima de 0,5 artigo científico/ano em Qualis A ou B, ou livro/capítulo de livro nos ú',1);
/*!40000 ALTER TABLE `criterio_orientador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criterio_projeto`
--

DROP TABLE IF EXISTS `criterio_projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criterio_projeto` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(254) NOT NULL,
  `pontuacao` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterio_projeto`
--

LOCK TABLES `criterio_projeto` WRITE;
/*!40000 ALTER TABLE `criterio_projeto` DISABLE KEYS */;
INSERT INTO `criterio_projeto` VALUES (1,'Coordenado pelo proponente e financiado por agência de fomento ou empresa e caracterizado na área de Desenvolvimento Tecnológico e Inovação',5),(2,'Com participação do proponente como pesquisador/colaborador e financiado por agência de fomento ou empresa e caracterizado na área de Desenvolvimento Tecnológico e Inovação',4),(3,'Coordenado pelo proponente e financiado por agência de fomento, caracterizado como projeto de pesquisa básica que possua potencial para desenvolvimento de produtos ou processos inovadores',3),(4,'Com participação do proponente como pesquisador/colaborador e financiado por agência de fomento, caracterizado como projeto de pesquisa básica que possua potencial para desenvolvimento de produtos ou processos inovadores',2),(5,'Propostas sem comprovação de financiamento, mas com comprovação de infra-estrutura com capacidade instalada para execução do projeto',1);
/*!40000 ALTER TABLE `criterio_projeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `cur_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'Administração'),(2,'Agronomia'),(3,'Biomedicina'),(4,'Ciências Biológicas - Bacharelado'),(5,'Ciências Contábeis'),(6,'Ciência da Computação'),(7,'Comunicação Social'),(8,'Direito'),(9,'Economia'),(10,'Enfermagem'),(11,'Engenharia Civil'),(12,'Engenharia de Produção'),(13,'Engenharia Elétrica'),(14,'Engenharia Mecânica'),(15,'Engenharia Química'),(16,'Física - Bacharelado'),(17,'Geografia - Bacharelado'),(18,'LEA'),(19,'Medicina'),(20,'Medicina Veterinária'),(21,'Matemática - Bacharelado'),(22,'Química - Bacharelado'),(23,'Ciências Biológicas - Licenciatura'),(24,'Física - Licenciatura'),(25,'Geografia - Licenciatura'),(26,'Matemática - Licenciatura'),(27,'Química - Licenciatura'),(28,'Ciências Sociais'),(29,'Educação Física'),(30,'Filosofia'),(31,'História'),(32,'Letras'),(33,'Pedagogia');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dados_lattes`
--

DROP TABLE IF EXISTS `dados_lattes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dados_lattes` (
  `id_lattes` int(1) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(254) NOT NULL,
  `pontuacao` int(1) NOT NULL,
  PRIMARY KEY (`id_lattes`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dados_lattes`
--

LOCK TABLES `dados_lattes` WRITE;
/*!40000 ALTER TABLE `dados_lattes` DISABLE KEYS */;
INSERT INTO `dados_lattes` VALUES (1,'Com bolsa de produtividade em Desenvolvimento Tecnológico e Extensão Inovadora (DT) ou em Pesquisa (PQ), ou registro de um software, ou depósito de patentes, ou proteção de cultivares nos últimos 3 anos',5),(3,'Produção média acima de 2 artigos científicos/ano em Qualis A nos últimos 3 anos',4),(4,'Produção média entre 0,5 e 2,0 artigos científicos/ano em Qualis A nos últimos 3 anos',3),(5,'Produção média abaixo de 0,5 artigo científico/ano em Qualis A, ou qualquer produção em Qualis B ou C, ou livro/capítulo de livro nos últimos 3 anos',1);
/*!40000 ALTER TABLE `dados_lattes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_nome` varchar(255) NOT NULL,
  `dep_sigla` varchar(45) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (3,'Departamento de Ciências Agrárias e Ambientais','DCAA'),(4,'Departamento de Administração e Ciências Contábeis','DCAC'),(5,'Departamento de Ciências Biológicas','DCB'),(6,'Departamento de Ciências Econômicas','DCEC'),(7,'Departamento de Ciências Exatas e Tecnológicas','DCET'),(8,'Departamento de Ciências da Educação','DCIE'),(9,'Departamento de Ciências da Saúde','DCS'),(10,'Departamento de Ciências Jurídicas','DCIJUR'),(11,'Departamento de Filosofia e Ciências Humanas','DFCH'),(12,'Departamento de Letras e Artes','DLA');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente`
--

LOCK TABLES `docente` WRITE;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` VALUES (1,'Usuario De Teste','29857716415','12345678912','teste@gmail.com','12345678912','Professor','DE','Vingadores','irineu',10,'Doutorado',2,'1','11','Funk',2,'0000-00-00 00:00:00','2017-03-20 20:07:24');
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grande_area`
--

DROP TABLE IF EXISTS `grande_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grande_area` (
  `garea_id` int(11) NOT NULL AUTO_INCREMENT,
  `garea_nome` varchar(100) NOT NULL,
  `garea_sigla` varchar(45) NOT NULL,
  PRIMARY KEY (`garea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grande_area`
--

LOCK TABLES `grande_area` WRITE;
/*!40000 ALTER TABLE `grande_area` DISABLE KEYS */;
INSERT INTO `grande_area` VALUES (1,'Ciências da Vida (Ciências Biológicas, Ciências da Saúde e Ciências Agrárias)','Vida'),(2,'Ciências Exatas, da Terra e Engenharia','Exatas'),(3,'Ciências Humanas, Sociais Aplicadas e Linguística, Letras e Artes','Humanas');
/*!40000 ALTER TABLE `grande_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observacao`
--

DROP TABLE IF EXISTS `observacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `observacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_projeto_id` int(11) NOT NULL DEFAULT '0',
  `FK_avaliador_id` varchar(4096) NOT NULL DEFAULT '0',
  `texto` varchar(4096) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observacao`
--

LOCK TABLES `observacao` WRITE;
/*!40000 ALTER TABLE `observacao` DISABLE KEYS */;
INSERT INTO `observacao` VALUES (1,1,'2',''),(2,3,'2','');
/*!40000 ALTER TABLE `observacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plano_trabalho`
--

DROP TABLE IF EXISTS `plano_trabalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plano_trabalho` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plano_trabalho`
--

LOCK TABLES `plano_trabalho` WRITE;
/*!40000 ALTER TABLE `plano_trabalho` DISABLE KEYS */;
/*!40000 ALTER TABLE `plano_trabalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projeto`
--

DROP TABLE IF EXISTS `projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projeto` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto`
--

LOCK TABLES `projeto` WRITE;
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
INSERT INTO `projeto` VALUES (1,'MEU PROJETO','451bac6e2f8cb3f6358418f9d5a579fc.pdf',10,'2017-03-20 18:09:14','pdf.pdf','451bac6e2f8cb3f6358418f9d5a579fc','.pdf',1,'2016'),(2,'DAc','9aab565065598fa91fdcc568614a7249.pdf',16,'2017-03-20 19:00:43','SIMC.pdf','9aab565065598fa91fdcc568614a7249','.pdf',1,'2016'),(3,'DKDKKDKDKKD','c98f3c5eb3efd6abdffb6dbca1ff7714.pdf',16,'2017-03-20 19:00:53','SIMC.pdf','c98f3c5eb3efd6abdffb6dbca1ff7714','.pdf',1,'2016'),(4,'VISH','8d21fe96dfb989c4c96095643afa3c84.pdf',40,'2017-03-20 19:49:36','pdf.pdf','8d21fe96dfb989c4c96095643afa3c84','.pdf',1,'2016');
/*!40000 ALTER TABLE `projeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `stat_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Enviado'),(2,'Em avaliação'),(3,'Indeferido'),(4,'Sem avaliação'),(5,'Com 1 avaliação'),(6,'Com 2 avaliações'),(7,'Necessita 3 avaliação'),(8,'Aprovado'),(9,'Banco de reserva');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_avaliador`
--

DROP TABLE IF EXISTS `tipo_avaliador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_avaliador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_avaliador`
--

LOCK TABLES `tipo_avaliador` WRITE;
/*!40000 ALTER TABLE `tipo_avaliador` DISABLE KEYS */;
INSERT INTO `tipo_avaliador` VALUES (1,'Interno'),(2,'Externo');
/*!40000 ALTER TABLE `tipo_avaliador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_relatorio`
--

DROP TABLE IF EXISTS `tipo_relatorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_relatorio` (
  `tipo_rel_id` tinyint(10) NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  FULLTEXT KEY `descricao` (`descricao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_relatorio`
--

LOCK TABLES `tipo_relatorio` WRITE;
/*!40000 ALTER TABLE `tipo_relatorio` DISABLE KEYS */;
INSERT INTO `tipo_relatorio` VALUES (0,'PARCIAL'),(1,'FINAL');
/*!40000 ALTER TABLE `tipo_relatorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `titulacao`
--

DROP TABLE IF EXISTS `titulacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `titulacao` (
  `titu_id` int(11) NOT NULL AUTO_INCREMENT,
  `titu_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`titu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `titulacao`
--

LOCK TABLES `titulacao` WRITE;
/*!40000 ALTER TABLE `titulacao` DISABLE KEYS */;
INSERT INTO `titulacao` VALUES (1,'Mestrado'),(2,'Doutorado');
/*!40000 ALTER TABLE `titulacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '2',
  `ntry` int(1) NOT NULL DEFAULT '0',
  `usu_login` varchar(45) NOT NULL,
  `usu_senha` varchar(45) NOT NULL,
  `usu_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `teste` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,0,'admin','445592c17d0076c0c235341c0f7ca75bb010bc82','0000-00-00 00:00:00',0),(2,2,0,'usuario1','445592c17d0076c0c235341c0f7ca75bb010bc82','2017-03-20 20:07:24',0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-20 17:09:22
