-- MySQL dump 10.13  Distrib 5.7.44, for Linux (x86_64)
--
-- Host: localhost    Database: sistema
-- ------------------------------------------------------
-- Server version	5.7.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `obs` mediumtext,
  `status` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Victor Oliveira','15981312247','admin@admin.com','e10adc3949ba59abbe56e057f20f883e','',2,3);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_login`
--

DROP TABLE IF EXISTS `auth_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_login` (
  `idauth_login` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `usuario` text,
  `logs` longtext,
  PRIMARY KEY (`idauth_login`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_login`
--

LOCK TABLES `auth_login` WRITE;
/*!40000 ALTER TABLE `auth_login` DISABLE KEYS */;
INSERT INTO `auth_login` VALUES (1,'VISITANTE','2026-06-01 20:49:38','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(2,'VISITANTE','2026-06-01 20:49:44','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(3,'ERRO','2026-06-01 20:49:57','192.168.65.1','Algum mané admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(4,'VISITANTE','2026-06-01 20:49:57','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(5,'VISITANTE','2026-06-01 20:49:57','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(6,'ERRO','2026-06-01 20:50:34','192.168.65.1','Algum mané admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(7,'VISITANTE','2026-06-01 20:50:34','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(8,'ENTRADA','2026-06-01 20:51:02','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(9,'SAIDA','2026-06-01 20:52:22','192.168.65.1','Victor Oliveira','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(10,'VISITANTE','2026-06-01 20:52:22','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(11,'ENTRADA','2026-06-01 20:52:34','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(12,'SAIDA','2026-06-01 20:53:26','192.168.65.1','Victor Oliveira','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(13,'VISITANTE','2026-06-01 20:53:26','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(14,'VISITANTE','2026-06-01 20:53:28','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(15,'VISITANTE','2026-06-01 20:53:29','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(16,'VISITANTE','2026-06-01 20:53:36','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(17,'ENTRADA','2026-06-01 20:53:48','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(18,'SAIDA','2026-06-01 20:54:14','192.168.65.1','Victor Oliveira','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(19,'VISITANTE','2026-06-01 20:54:14','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(20,'ENTRADA','2026-06-01 20:54:30','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(21,'SAIDA','2026-06-01 20:55:22','192.168.65.1','Victor Oliveira','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(22,'VISITANTE','2026-06-01 20:55:22','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(23,'ENTRADA','2026-06-01 20:55:33','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(24,'SAIDA','2026-06-01 20:55:52','192.168.65.1','Victor Oliveira','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(25,'VISITANTE','2026-06-01 20:55:52','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(26,'ENTRADA','2026-06-01 20:56:38','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(27,'VISITANTE','2026-06-01 20:58:39','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(28,'ENTRADA','2026-06-01 20:59:04','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(29,'SAIDA','2026-06-01 21:00:17','192.168.65.1','Victor Oliveira','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(30,'VISITANTE','2026-06-01 21:00:17','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(31,'VISITANTE','2026-06-01 21:01:59','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(32,'ENTRADA','2026-06-01 21:02:08','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(33,'VISITANTE','2026-06-01 21:04:11','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(34,'ENTRADA','2026-06-01 21:04:20','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(35,'VISITANTE','2026-06-01 21:05:28','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(36,'ENTRADA','2026-06-01 21:05:36','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(37,'VISITANTE','2026-06-01 21:06:01','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(38,'ENTRADA','2026-06-01 21:06:08','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(39,'VISITANTE','2026-06-01 21:13:40','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(40,'SAIDA','2026-06-01 21:17:21','192.168.65.1','Victor Oliveira','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(41,'VISITANTE','2026-06-01 21:17:21','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(42,'VISITANTE','2026-06-01 21:17:41','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36'),(43,'ENTRADA','2026-06-01 21:17:50','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36'),(44,'VISITANTE','2026-06-01 21:19:06','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(45,'VISITANTE','2026-06-01 21:19:08','192.168.65.1','Alguem entrou','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15'),(46,'ENTRADA','2026-06-01 21:19:15','192.168.65.1','Victor Oliveira admin@admin.com','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Safari/605.1.15');
/*!40000 ALTER TABLE `auth_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `automacoes`
--

DROP TABLE IF EXISTS `automacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `automacoes` (
  `idautomacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `gatilho` varchar(255) NOT NULL,
  `acao` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ATIVO',
  `execucoes` int(11) DEFAULT '0',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idautomacao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automacoes`
--

LOCK TABLES `automacoes` WRITE;
/*!40000 ALTER TABLE `automacoes` DISABLE KEYS */;
INSERT INTO `automacoes` VALUES (1,'Alerta de Fechamento de Venda','Ao marcar lead como GANHO','Disparar mensagem no WhatsApp do cliente','ATIVO',12,'2026-06-02 00:34:01'),(2,'SLA de Suporte CrÃ­tico','Ao abrir ticket prioridade URGENTE','Enviar e-mail de alerta para o gerente de TI','ATIVO',4,'2026-06-02 00:34:01');
/*!40000 ALTER TABLE `automacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_anexos`
--

DROP TABLE IF EXISTS `cliente_anexos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_anexos` (
  `idanexo` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL DEFAULT 'Documento',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idanexo`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `cliente_anexos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`clientesid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_anexos`
--

LOCK TABLES `cliente_anexos` WRITE;
/*!40000 ALTER TABLE `cliente_anexos` DISABLE KEYS */;
INSERT INTO `cliente_anexos` VALUES (1,1,'cnpj_cartao_corporativo.pdf','/uploads/docs/cnpj_cartao_corporativo.pdf','Documento','2026-06-02 00:35:04');
/*!40000 ALTER TABLE `cliente_anexos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `clientesid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `endereco` longtext,
  `numero` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(10) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `log_alteracao` longtext,
  `log_criacao` longtext,
  `criado` datetime DEFAULT NULL,
  PRIMARY KEY (`clientesid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Carlos','Eduardo','carlos@empresa.com','(11) 98765-4321','Av. Paulista','1000','Bela Vista','Sáo Paulo','SP','12.345.678/0001-99','CNPJ','01311-000','Alterado dia 2026-06-01 21:11 Pelo usuário: Victor Oliveira',NULL,'2026-06-02 00:11:09'),(2,'Mariana','Silva','mariana@tech.io','(21) 99888-7766','Rua Visconde de PirajÃ¡','500','Ipanema','Rio de Janeiro','RJ','987.654.321-00','CPF','22410-003',NULL,NULL,'2026-06-02 00:11:09');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compliance_audits`
--

DROP TABLE IF EXISTS `compliance_audits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compliance_audits` (
  `idauditoria` int(11) NOT NULL AUTO_INCREMENT,
  `componente` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `severidade` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PENDENTE',
  `responsavel` varchar(100) NOT NULL,
  `data_registro` datetime NOT NULL,
  PRIMARY KEY (`idauditoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compliance_audits`
--

LOCK TABLES `compliance_audits` WRITE;
/*!40000 ALTER TABLE `compliance_audits` DISABLE KEYS */;
INSERT INTO `compliance_audits` VALUES (1,'AutenticaÃ§Ã£o','MÃºltiplas tentativas de login com falha vindas do IP 187.32.11.89.','CRÃTICO','RESOLVIDO','Admin','2026-06-02 00:26:26'),(2,'Backup & Integridade','VerificaÃ§Ã£o semanal de backups executada. Todos os pacotes validados.','BAIXO','RESOLVIDO','Sistema','2026-06-02 00:26:26'),(3,'PolÃ­ticas de Senha','Identificado usuÃ¡rio com senha padrÃ£o de fÃ¡brica. Necessita redefiniÃ§Ã£o obrigatÃ³ria.','MÃ‰DIO','RESOLVIDO','Auditor','2026-06-02 00:26:26');
/*!40000 ALTER TABLE `compliance_audits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos` (
  `idcontrato` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `valor_mensal` decimal(10,2) DEFAULT '0.00',
  `vigencia_meses` int(11) NOT NULL,
  `assinatura_eletronica` varchar(20) NOT NULL DEFAULT 'PENDENTE',
  `status` varchar(20) NOT NULL DEFAULT 'ATIVO',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idcontrato`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`clientesid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` VALUES (1,1,'LocaÃ§Ã£o e Monitoramento de Servidores Dedicados',1200.00,12,'ASSINADO','ATIVO','2026-06-02 00:34:01'),(2,2,'Contrato de ManutenÃ§Ã£o e Suporte TÃ©cnico Nivel 2',800.00,24,'PENDENTE','ATIVO','2026-06-02 00:34:01');
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_atividades`
--

DROP TABLE IF EXISTS `crm_atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_atividades` (
  `idatividade` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL DEFAULT 'Tarefa',
  `descricao` text,
  `data_agendada` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PENDENTE',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idatividade`),
  KEY `lead_id` (`lead_id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `crm_atividades_ibfk_1` FOREIGN KEY (`lead_id`) REFERENCES `crm_leads` (`idcrm`) ON DELETE SET NULL,
  CONSTRAINT `crm_atividades_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`clientesid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_atividades`
--

LOCK TABLES `crm_atividades` WRITE;
/*!40000 ALTER TABLE `crm_atividades` DISABLE KEYS */;
INSERT INTO `crm_atividades` VALUES (1,1,1,'ReuniÃ£o de Escopo TÃ©cnico da Infraestrutura','ReuniÃ£o','Alinhamento dos requisitos tÃ©cnicos para o setup dos servidores dedicados.','2026-06-04 00:35:04','PENDENTE','2026-06-02 00:35:04'),(2,2,2,'Follow-up da proposta comercial enviada','Follow-up','Ligar para validar se a proposta foi aprovada pela diretoria.','2026-06-03 00:35:04','PENDENTE','2026-06-02 00:35:04');
/*!40000 ALTER TABLE `crm_atividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_interacoes`
--

DROP TABLE IF EXISTS `crm_interacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_interacoes` (
  `idinteracao` int(11) NOT NULL AUTO_INCREMENT,
  `crm_id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `data_interacao` datetime NOT NULL,
  `usuario` varchar(100) NOT NULL,
  PRIMARY KEY (`idinteracao`),
  KEY `crm_id` (`crm_id`),
  CONSTRAINT `crm_interacoes_ibfk_1` FOREIGN KEY (`crm_id`) REFERENCES `crm_leads` (`idcrm`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_interacoes`
--

LOCK TABLES `crm_interacoes` WRITE;
/*!40000 ALTER TABLE `crm_interacoes` DISABLE KEYS */;
INSERT INTO `crm_interacoes` VALUES (1,1,'Telefone','Contato inicial feito por telefone. Cliente explicou a necessidade de servidores dedicados.','2026-05-30 00:11:09','Administrador'),(2,1,'E-mail','Proposta inicial e escopo tÃ©cnico enviados por e-mail para avaliaÃ§Ã£o comercial.','2026-06-01 00:11:09','Administrador'),(3,2,'ReuniÃ£o','ApresentaÃ§Ã£o remota do contrato de suporte corporativo com toda a equipe tÃ©cnica deles.','2026-05-31 00:11:09','Administrador'),(4,2,'Nota','Dados comerciais atualizados por: Victor Oliveira','2026-06-01 21:12:44','Victor Oliveira'),(5,1,'Nota','Dados comerciais atualizados por: Victor Oliveira','2026-06-01 21:29:58','Victor Oliveira');
/*!40000 ALTER TABLE `crm_interacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_leads`
--

DROP TABLE IF EXISTS `crm_leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_leads` (
  `idcrm` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT '0.00',
  `estagio` varchar(50) NOT NULL DEFAULT 'CONTATO',
  `status` varchar(20) NOT NULL DEFAULT 'ABERTO',
  `data_proximo_contato` date DEFAULT NULL,
  `descricao` text,
  `criado_em` datetime NOT NULL,
  `alterado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idcrm`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `crm_leads_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`clientesid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_leads`
--

LOCK TABLES `crm_leads` WRITE;
/*!40000 ALTER TABLE `crm_leads` DISABLE KEYS */;
INSERT INTO `crm_leads` VALUES (1,'Implantão de Servidores',1,15800.00,'PROPOSTA','ABERTO','2026-06-04','Cliente solicitou orÃ§amento detalhado para a infraestrutura de TI do escritÃ³rio local.','2026-06-02 00:11:09','2026-06-01 21:29:58'),(2,'Suporte Mensal Corporativo',2,3200.00,'NEGOCIACAO','ABERTO','2026-06-03','Alinhando os termos de SLA e horas inclusas na proposta de manutenÃ§Ã£o mensal.','2026-06-02 00:11:09','2026-06-01 21:12:44'),(3,'Auditoria de SeguranÃ§a de Rede',1,8500.00,'CONTATO','ABERTO','2026-06-07','Lead demonstrou interesse em auditoria de seguranÃ§a de rede apÃ³s evento de seguranÃ§a virtual.','2026-06-02 00:11:09',NULL);
/*!40000 ALTER TABLE `crm_leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `definicoes`
--

DROP TABLE IF EXISTS `definicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `definicoes` (
  `iddefinicoes` int(11) NOT NULL,
  `sysname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `nome_fantasia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddefinicoes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `definicoes`
--

LOCK TABLES `definicoes` WRITE;
/*!40000 ALTER TABLE `definicoes` DISABLE KEYS */;
INSERT INTO `definicoes` VALUES (0,'SparkOS','sparkos@gmail.com','1234568900123','SparkOS');
/*!40000 ALTER TABLE `definicoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financeiro_faturas`
--

DROP TABLE IF EXISTS `financeiro_faturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financeiro_faturas` (
  `idfatura` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `contrato_id` int(11) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `data_vencimento` date NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PENDENTE',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idfatura`),
  KEY `cliente_id` (`cliente_id`),
  KEY `contrato_id` (`contrato_id`),
  CONSTRAINT `financeiro_faturas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`clientesid`) ON DELETE CASCADE,
  CONSTRAINT `financeiro_faturas_ibfk_2` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`idcontrato`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financeiro_faturas`
--

LOCK TABLES `financeiro_faturas` WRITE;
/*!40000 ALTER TABLE `financeiro_faturas` DISABLE KEYS */;
INSERT INTO `financeiro_faturas` VALUES (1,1,1,1200.00,'2026-06-12',NULL,'PENDENTE','2026-06-02 00:35:04'),(2,2,2,800.00,'2026-05-28',NULL,'ATRASADO','2026-06-02 00:35:04');
/*!40000 ALTER TABLE `financeiro_faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `helpdesk_faq`
--

DROP TABLE IF EXISTS `helpdesk_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `helpdesk_faq` (
  `idfaq` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `categoria` varchar(100) NOT NULL DEFAULT 'Geral',
  `conteudo` text NOT NULL,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idfaq`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `helpdesk_faq`
--

LOCK TABLES `helpdesk_faq` WRITE;
/*!40000 ALTER TABLE `helpdesk_faq` DISABLE KEYS */;
INSERT INTO `helpdesk_faq` VALUES (1,'Como configurar as credenciais do seu e-mail corporativo','Geral','Para configurar seu e-mail corporativo, utilize o servidor SMTP smtp.sparkos.com.br na porta 587 utilizando SSL/TLS.','2026-06-02 00:35:04'),(2,'Procedimento operacional padrÃ£o em caso de instabilidade de rede','TÃ©cnico','Caso perceba oscilaÃ§Ãµes, verifique o gateway local 192.168.1.1 e faÃ§a um teste de ping externo para 8.8.8.8.','2026-06-02 00:35:04');
/*!40000 ALTER TABLE `helpdesk_faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `helpdesk_tickets`
--

DROP TABLE IF EXISTS `helpdesk_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `helpdesk_tickets` (
  `idticket` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `prioridade` varchar(20) NOT NULL,
  `sla_horas` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ABERTO',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idticket`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `helpdesk_tickets_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`clientesid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `helpdesk_tickets`
--

LOCK TABLES `helpdesk_tickets` WRITE;
/*!40000 ALTER TABLE `helpdesk_tickets` DISABLE KEYS */;
INSERT INTO `helpdesk_tickets` VALUES (1,1,'Instabilidade intermitente no link de rede local','ALTA',4,'ABERTO','2026-06-02 00:34:01'),(2,2,'Falha ao processar e emitir nota fiscal de serviÃ§o','URGENTE',2,'EM ATENDIMENTO','2026-06-02 00:34:01');
/*!40000 ALTER TABLE `helpdesk_tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marketing_campanhas`
--

DROP TABLE IF EXISTS `marketing_campanhas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marketing_campanhas` (
  `idcampanha` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `origem` varchar(50) NOT NULL,
  `investimento` decimal(10,2) DEFAULT '0.00',
  `retorno` decimal(10,2) DEFAULT '0.00',
  `status` varchar(20) NOT NULL DEFAULT 'ATIVA',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idcampanha`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketing_campanhas`
--

LOCK TABLES `marketing_campanhas` WRITE;
/*!40000 ALTER TABLE `marketing_campanhas` DISABLE KEYS */;
INSERT INTO `marketing_campanhas` VALUES (1,'Campanha Google Ads - Leads Infraestrutura 2026','Google',1500.00,7800.00,'ATIVA','2026-06-02 00:34:01'),(2,'TrÃ¡fego Pago Facebook - CaptaÃ§Ã£o de Contratos','Facebook',2000.00,4500.00,'ATIVA','2026-06-02 00:34:01');
/*!40000 ALTER TABLE `marketing_campanhas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimentacoes`
--

DROP TABLE IF EXISTS `movimentacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimentacoes` (
  `idmovimentacoes` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  `id` varchar(45) DEFAULT NULL,
  `finalidade` text,
  `observacoes` longtext,
  `valor` int(11) DEFAULT NULL,
  `relacionado` varchar(45) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `appid` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmovimentacoes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimentacoes`
--

LOCK TABLES `movimentacoes` WRITE;
/*!40000 ALTER TABLE `movimentacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimentacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `os`
--

DROP TABLE IF EXISTS `os`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `os` (
  `idos` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicial` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `garantia` varchar(45) DEFAULT NULL,
  `descricao` text,
  `defeito` text,
  `status` varchar(45) DEFAULT NULL,
  `observacoes` text,
  `laudo_tecnico` text,
  `valor_total` varchar(45) DEFAULT NULL,
  `cliente` varchar(300) DEFAULT NULL,
  `protocolo` varchar(30) DEFAULT NULL,
  `tecnico` varchar(45) DEFAULT NULL,
  `nome_cliente` text,
  `nome_tecnico` text,
  PRIMARY KEY (`idos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `os`
--

LOCK TABLES `os` WRITE;
/*!40000 ALTER TABLE `os` DISABLE KEYS */;
/*!40000 ALTER TABLE `os` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `os_linhas`
--

DROP TABLE IF EXISTS `os_linhas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `os_linhas` (
  `idos_linhas` int(11) NOT NULL AUTO_INCREMENT,
  `idos` int(11) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` varchar(45) DEFAULT NULL,
  `idps` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idos_linhas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `os_linhas`
--

LOCK TABLES `os_linhas` WRITE;
/*!40000 ALTER TABLE `os_linhas` DISABLE KEYS */;
/*!40000 ALTER TABLE `os_linhas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posvenda_nps`
--

DROP TABLE IF EXISTS `posvenda_nps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posvenda_nps` (
  `idnps` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `comentario` text,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idnps`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `posvenda_nps_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`clientesid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posvenda_nps`
--

LOCK TABLES `posvenda_nps` WRITE;
/*!40000 ALTER TABLE `posvenda_nps` DISABLE KEYS */;
INSERT INTO `posvenda_nps` VALUES (1,1,9,'Excelente atendimento inicial e suporte muito Ã¡gil para resolver problemas tÃ©cnicos.','2026-06-02 00:35:04'),(2,2,10,'A implantaÃ§Ã£o superou as expectativas. Ã“timo painel comercial.','2026-06-02 00:35:04');
/*!40000 ALTER TABLE `posvenda_nps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `produtosid` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) DEFAULT NULL,
  `unidade` varchar(10) DEFAULT NULL,
  `preco_compra` decimal(10,2) DEFAULT NULL,
  `preco_venda` decimal(10,2) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `estoque_minimo` int(11) DEFAULT NULL,
  `saida` tinyint(1) DEFAULT NULL,
  `entrada` tinyint(1) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `foto` longtext,
  `codigo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`produtosid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos`
--

DROP TABLE IF EXISTS `servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos` (
  `servicosid` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`servicosid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos`
--

LOCK TABLES `servicos` WRITE;
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_riscos`
--

DROP TABLE IF EXISTS `usuario_riscos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_riscos` (
  `idrisco` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `nivel_risco` int(11) DEFAULT '10',
  `motivo_risco` varchar(255) NOT NULL,
  `ultimo_evento` datetime NOT NULL,
  PRIMARY KEY (`idrisco`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `usuario_riscos_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`adminid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_riscos`
--

LOCK TABLES `usuario_riscos` WRITE;
/*!40000 ALTER TABLE `usuario_riscos` DISABLE KEYS */;
INSERT INTO `usuario_riscos` VALUES (1,1,15,'Incidente resolvido. Atividade operacional normalizada.','2026-06-02 00:32:34');
/*!40000 ALTER TABLE `usuario_riscos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedores_comissoes`
--

DROP TABLE IF EXISTS `vendedores_comissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendedores_comissoes` (
  `idcomissao` int(11) NOT NULL AUTO_INCREMENT,
  `vendedor_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL DEFAULT '0.00',
  `percentual` decimal(5,2) NOT NULL DEFAULT '5.00',
  `valor_comissao` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` varchar(20) NOT NULL DEFAULT 'A PAGAR',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idcomissao`),
  KEY `vendedor_id` (`vendedor_id`),
  KEY `lead_id` (`lead_id`),
  CONSTRAINT `vendedores_comissoes_ibfk_1` FOREIGN KEY (`vendedor_id`) REFERENCES `admins` (`adminid`) ON DELETE CASCADE,
  CONSTRAINT `vendedores_comissoes_ibfk_2` FOREIGN KEY (`lead_id`) REFERENCES `crm_leads` (`idcrm`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedores_comissoes`
--

LOCK TABLES `vendedores_comissoes` WRITE;
/*!40000 ALTER TABLE `vendedores_comissoes` DISABLE KEYS */;
INSERT INTO `vendedores_comissoes` VALUES (1,1,1,15000.00,5.00,750.00,'A PAGAR','2026-06-02 00:35:04');
/*!40000 ALTER TABLE `vendedores_comissoes` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `riscos_categorias`
--

DROP TABLE IF EXISTS `riscos_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cor` varchar(7) DEFAULT '#6366f1',
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_categorias`
--

LOCK TABLES `riscos_categorias` WRITE;
/*!40000 ALTER TABLE `riscos_categorias` DISABLE KEYS */;
INSERT INTO `riscos_categorias` VALUES (1,'Segurança da Informação','#ef4444'),(2,'Continuidade de Negócios','#f59e0b'),(3,'Compliance Regulatório','#6366f1'),(4,'Financeiro','#10b981'),(5,'Operacional','#8b5cf6'),(6,'Fornecedores','#ec4899'),(7,'Recursos Humanos','#14b8a6'),(8,'Reputação','#f97316');
/*!40000 ALTER TABLE `riscos_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_apetite`
--

DROP TABLE IF EXISTS `riscos_apetite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_apetite` (
  `idapetite` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) DEFAULT NULL,
  `nivel_aceitavel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idapetite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_apetite`
--

LOCK TABLES `riscos_apetite` WRITE;
/*!40000 ALTER TABLE `riscos_apetite` DISABLE KEYS */;
INSERT INTO `riscos_apetite` VALUES (1,'Segurança da Informação','BAIXO'),(2,'Continuidade de Negócios','BAIXO'),(3,'Compliance Regulatório','BAIXO'),(4,'Financeiro','MEDIO'),(5,'Operacional','MEDIO'),(6,'Fornecedores','ALTO'),(7,'Recursos Humanos','MEDIO'),(8,'Reputação','BAIXO');
/*!40000 ALTER TABLE `riscos_apetite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_riscos`
--

DROP TABLE IF EXISTS `riscos_riscos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_riscos` (
  `idrisco` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `idcategoria` int(11) DEFAULT NULL,
  `area_responsavel` varchar(255) DEFAULT NULL,
  `proprietario` varchar(255) DEFAULT NULL,
  `data_identificacao` date DEFAULT NULL,
  `probabilidade` int(11) DEFAULT NULL,
  `impacto` int(11) DEFAULT NULL,
  `score_automatico` int(11) DEFAULT NULL,
  `nivel_risco` varchar(20) DEFAULT NULL,
  `status` varchar(30) DEFAULT 'IDENTIFICADO',
  `criado_em` datetime DEFAULT NULL,
  `criado_por` varchar(255) DEFAULT NULL,
  `alterado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idrisco`),
  KEY `idcategoria` (`idcategoria`),
  CONSTRAINT `riscos_riscos_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `riscos_categorias` (`idcategoria`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_riscos`
--

LOCK TABLES `riscos_riscos` WRITE;
/*!40000 ALTER TABLE `riscos_riscos` DISABLE KEYS */;
INSERT INTO `riscos_riscos` VALUES (1,'RISK-001','Vazamento de dados sensíveis','Possibilidade de exposição não autorizada de dados de clientes e informações confidenciais.',1,'TI','João Silva','2026-01-15',4,5,20,'CRITICO','IDENTIFICADO',NOW(),'admin',NULL),(2,'RISK-002','Ataque ransomware','Risco de infecção por ransomware que pode criptografar dados críticos da empresa.',1,'TI','Maria Souza','2026-02-01',4,5,20,'CRITICO','IDENTIFICADO',NOW(),'admin',NULL),(3,'RISK-003','Falha em backup/restore','Procedimentos de backup não testados podem resultar em perda de dados durante incidentes.',1,'TI','João Silva','2026-01-20',3,5,15,'ALTO','MONITORANDO',NOW(),'admin',NULL),(4,'RISK-004','Interrupção de energia elétrica','Queda prolongada de energia pode paralisar operações e causar perda de dados.',2,'Infraestrutura','Pedro Alves','2026-03-01',3,4,12,'ALTO','IDENTIFICADO',NOW(),'admin',NULL),(5,'RISK-005','Descumprimento LGPD','Sanções por não conformidade com a Lei Geral de Proteção de Dados.',3,'Jurídico','Ana Costa','2026-01-10',3,5,15,'ALTO','MONITORANDO',NOW(),'admin',NULL);
/*!40000 ALTER TABLE `riscos_riscos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_controles`
--

DROP TABLE IF EXISTS `riscos_controles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_controles` (
  `idcontrole` int(11) NOT NULL AUTO_INCREMENT,
  `idrisco` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `tipo` varchar(20) DEFAULT 'PREVENTIVO',
  `efetividade` varchar(10) DEFAULT 'MEDIA',
  `frequencia` varchar(20) DEFAULT 'DIARIA',
  `responsavel` varchar(255) DEFAULT NULL,
  `evidencias` text,
  `status` varchar(20) DEFAULT 'ATIVO',
  `data_implementacao` date DEFAULT NULL,
  `proxima_revisao` date DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idcontrole`),
  KEY `idrisco` (`idrisco`),
  CONSTRAINT `riscos_controles_ibfk_1` FOREIGN KEY (`idrisco`) REFERENCES `riscos_riscos` (`idrisco`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_controles`
--

LOCK TABLES `riscos_controles` WRITE;
/*!40000 ALTER TABLE `riscos_controles` DISABLE KEYS */;
INSERT INTO `riscos_controles` VALUES (1,1,'Firewall e IDS/IPS','Firewall de última geração com sistema de detecção de intrusão.','PREVENTIVO','ALTA','CONTINUO','TI','Relatórios mensais de segurança','ATIVO','2026-01-20','2026-07-20',NOW()),(2,1,'Controle de acesso MFA','Autenticação multifator para todos os sistemas críticos.','PREVENTIVO','ALTA','CONTINUO','TI','Logs de autenticação','ATIVO','2026-02-01','2026-08-01',NOW()),(3,2,'Antivírus e EDR','Solução de proteção de endpoints com resposta a incidentes.','PREVENTIVO','MEDIA','CONTINUO','TI','Relatórios EDR','ATIVO','2026-02-15','2026-08-15',NOW()),(4,3,'Teste trimestral de backup','Procedimento de restore testado a cada 90 dias.','DETECTIVO','ALTA','TRIMESTRAL','TI','Relatórios de teste','ATIVO','2026-03-01','2026-06-01',NOW());
/*!40000 ALTER TABLE `riscos_controles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_planos_acao`
--

DROP TABLE IF EXISTS `riscos_planos_acao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_planos_acao` (
  `idplano` int(11) NOT NULL AUTO_INCREMENT,
  `idrisco` int(11) DEFAULT NULL,
  `idcontrole` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `tipo` varchar(20) DEFAULT 'CORRETIVA',
  `responsavel` varchar(255) DEFAULT NULL,
  `prazo` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'PENDENTE',
  `percentual` int(11) DEFAULT '0',
  `observacoes` text,
  `criado_em` datetime DEFAULT NULL,
  `concluido_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idplano`),
  KEY `idrisco` (`idrisco`),
  KEY `idcontrole` (`idcontrole`),
  CONSTRAINT `riscos_planos_acao_ibfk_1` FOREIGN KEY (`idrisco`) REFERENCES `riscos_riscos` (`idrisco`) ON DELETE SET NULL,
  CONSTRAINT `riscos_planos_acao_ibfk_2` FOREIGN KEY (`idcontrole`) REFERENCES `riscos_controles` (`idcontrole`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_planos_acao`
--

LOCK TABLES `riscos_planos_acao` WRITE;
/*!40000 ALTER TABLE `riscos_planos_acao` DISABLE KEYS */;
INSERT INTO `riscos_planos_acao` VALUES (1,1,2,'Implementar MFA para todos os usuários','Expandir autenticação multifator para todos os sistemas internos e externos.','CORRETIVA','João Silva','2026-06-30','EM ANDAMENTO',60,'Faltam sistemas legados',NOW(),NULL),(2,2,3,'Atualizar política de backups','Revisar e documentar política de backup incluindo periodicidade e responsabilidades.','PREVENTIVA','Maria Souza','2026-05-15','CONCLUIDO',100,'Política publicada',NOW(),NOW()),(3,5,NULL,'Adequação LGPD','Mapear dados pessoais e implementar medidas de privacidade.','CORRETIVA','Ana Costa','2026-09-30','PENDENTE',15,'Aguardando consultoria jurídica',NOW(),NULL);
/*!40000 ALTER TABLE `riscos_planos_acao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_kris`
--

DROP TABLE IF EXISTS `riscos_kris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_kris` (
  `idkri` int(11) NOT NULL AUTO_INCREMENT,
  `idrisco` int(11) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `unidade` varchar(10) DEFAULT '%',
  `valor_atual` decimal(10,2) DEFAULT '0.00',
  `limite_verde` decimal(10,2) DEFAULT '30.00',
  `limite_amarelo` decimal(10,2) DEFAULT '60.00',
  `limite_vermelho` decimal(10,2) DEFAULT '80.00',
  `periodicidade` varchar(20) DEFAULT 'MENSAL',
  `diretriz` varchar(20) DEFAULT 'MAIOR_MELHOR',
  `status` varchar(20) DEFAULT 'ATIVO',
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idkri`),
  KEY `idrisco` (`idrisco`),
  CONSTRAINT `riscos_kris_ibfk_1` FOREIGN KEY (`idrisco`) REFERENCES `riscos_riscos` (`idrisco`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_kris`
--

LOCK TABLES `riscos_kris` WRITE;
/*!40000 ALTER TABLE `riscos_kris` DISABLE KEYS */;
INSERT INTO `riscos_kris` VALUES (1,1,'Tentativas de invasão bloqueadas','Percentual de tentativas de invasão bloqueadas pelo firewall.','%',95.00,30.00,60.00,80.00,'MENSAL','MAIOR_MELHOR','ATIVO',NOW()),(2,1,'Taxa de autenticação MFA','Percentual de acessos utilizando MFA.','%',72.00,30.00,60.00,80.00,'MENSAL','MAIOR_MELHOR','ATIVO',NOW()),(3,3,'Tempo de recuperação (RTO)','Tempo médio de recuperação em horas após incidente.','h',28.00,12.00,24.00,48.00,'MENSAL','MENOR_MELHOR','ATIVO',NOW());
/*!40000 ALTER TABLE `riscos_kris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_kris_historico`
--

DROP TABLE IF EXISTS `riscos_kris_historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_kris_historico` (
  `idhistorico` int(11) NOT NULL AUTO_INCREMENT,
  `idkri` int(11) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data_registro` datetime DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idhistorico`),
  KEY `idkri` (`idkri`),
  CONSTRAINT `riscos_kris_historico_ibfk_1` FOREIGN KEY (`idkri`) REFERENCES `riscos_kris` (`idkri`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `riscos_incidentes`
--

DROP TABLE IF EXISTS `riscos_incidentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_incidentes` (
  `idincidente` int(11) NOT NULL AUTO_INCREMENT,
  `idrisco` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `causa_raiz` text,
  `impacto_financeiro` decimal(12,2) DEFAULT '0.00',
  `tipo` varchar(20) DEFAULT 'INCIDENTE',
  `severidade` varchar(10) DEFAULT 'MEDIO',
  `status` varchar(20) DEFAULT 'ABERTO',
  `evidencias` text,
  `licoes_aprendidas` text,
  `data_ocorrencia` datetime DEFAULT NULL,
  `data_resolucao` datetime DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  `criado_por` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idincidente`),
  KEY `idrisco` (`idrisco`),
  CONSTRAINT `riscos_incidentes_ibfk_1` FOREIGN KEY (`idrisco`) REFERENCES `riscos_riscos` (`idrisco`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_incidentes`
--

LOCK TABLES `riscos_incidentes` WRITE;
/*!40000 ALTER TABLE `riscos_incidentes` DISABLE KEYS */;
INSERT INTO `riscos_incidentes` VALUES (1,1,'Acesso não autorizado ao sistema CRM','Detectado acesso suspeito vindo de IP externo ao CRM da empresa.','Senha fraca de usuário terceirizado',0.00,'INCIDENTE','ALTO','RESOLVIDO','Logs de acesso','Revisar política de senhas e implementar MFA obrigatório','2026-04-10 14:30:00','2026-04-10 16:45:00',NOW(),'admin'),(2,2,'E-mail de phishing detectado','Funcionário recebeu e-mail fraudulento com aparência de comunicação interna.','Falta de treinamento em segurança',5000.00,'INCIDENTE','MEDIO','ABERTO','E-mail encaminhado','Iniciar campanha de conscientização','2026-05-20 09:15:00',NULL,NOW(),'admin');
/*!40000 ALTER TABLE `riscos_incidentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_compliance`
--

DROP TABLE IF EXISTS `riscos_compliance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_compliance` (
  `idcompliance` int(11) NOT NULL AUTO_INCREMENT,
  `idrisco` int(11) DEFAULT NULL,
  `regulamento` varchar(255) NOT NULL,
  `descricao` text,
  `obrigacao` text,
  `area_responsavel` varchar(255) DEFAULT NULL,
  `nivel_conformidade` int(11) DEFAULT '0',
  `ultima_avaliacao` date DEFAULT NULL,
  `proxima_avaliacao` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'MONITORANDO',
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idcompliance`),
  KEY `idrisco` (`idrisco`),
  CONSTRAINT `riscos_compliance_ibfk_1` FOREIGN KEY (`idrisco`) REFERENCES `riscos_riscos` (`idrisco`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_compliance`
--

LOCK TABLES `riscos_compliance` WRITE;
/*!40000 ALTER TABLE `riscos_compliance` DISABLE KEYS */;
INSERT INTO `riscos_compliance` VALUES (1,5,'Lei Geral de Proteção de Dados (LGPD)','Lei 13.709/2018 - Proteção de dados pessoais','Implementar DPO, mapear dados, adequar processos','Jurídico',65,'2026-03-15','2026-09-15','MONITORANDO',NOW());
/*!40000 ALTER TABLE `riscos_compliance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_auditoria`
--

DROP TABLE IF EXISTS `riscos_auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_auditoria` (
  `idauditoria` int(11) NOT NULL AUTO_INCREMENT,
  `idrisco` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `escopo` text,
  `tipo` varchar(20) DEFAULT 'INTERNA',
  `achados` text,
  `nao_conformidades` text,
  `recomendacoes` text,
  `status` varchar(20) DEFAULT 'PLANEJADA',
  `responsavel` varchar(255) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idauditoria`),
  KEY `idrisco` (`idrisco`),
  CONSTRAINT `riscos_auditoria_ibfk_1` FOREIGN KEY (`idrisco`) REFERENCES `riscos_riscos` (`idrisco`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_auditoria`
--

LOCK TABLES `riscos_auditoria` WRITE;
/*!40000 ALTER TABLE `riscos_auditoria` DISABLE KEYS */;
INSERT INTO `riscos_auditoria` VALUES (1,5,'Auditoria Interna LGPD','Avaliar conformidade com a LGPD em todos os departamentos.','INTERNA','Ausência de registro de tratamento de dados pessoais.','3 não conformidades identificadas','Criar política de privacidade e nomear DPO','EM ANDAMENTO','Ana Costa','2026-04-01','2026-04-30',NOW());
/*!40000 ALTER TABLE `riscos_auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_fornecedores`
--

DROP TABLE IF EXISTS `riscos_fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_fornecedores` (
  `idfornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `idrisco` int(11) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `nivel_risco` varchar(20) DEFAULT 'BAIXO',
  `score_risco` int(11) DEFAULT '0',
  `due_diligence` text,
  `data_avaliacao` date DEFAULT NULL,
  `proxima_avaliacao` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'ATIVO',
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idfornecedor`),
  KEY `idrisco` (`idrisco`),
  CONSTRAINT `riscos_fornecedores_ibfk_1` FOREIGN KEY (`idrisco`) REFERENCES `riscos_riscos` (`idrisco`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_fornecedores`
--

LOCK TABLES `riscos_fornecedores` WRITE;
/*!40000 ALTER TABLE `riscos_fornecedores` DISABLE KEYS */;
INSERT INTO `riscos_fornecedores` VALUES (1,1,'CloudTech Serviços Ltda','11.222.333/0001-44','Provedor de Nuvem','ALTO',72,'Due diligence concluída em jan/2026 - Certificações ISO 27001 vigentes','2026-01-15','2026-07-15','ATIVO',NOW());
/*!40000 ALTER TABLE `riscos_fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_bcp`
--

DROP TABLE IF EXISTS `riscos_bcp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_bcp` (
  `idbcp` int(11) NOT NULL AUTO_INCREMENT,
  `idrisco` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo` varchar(10) DEFAULT 'BIA',
  `descricao` text,
  `impacto_negocio` text,
  `mtd_horas` int(11) DEFAULT NULL,
  `rpo_horas` int(11) DEFAULT NULL,
  `rto_horas` int(11) DEFAULT NULL,
  `recursos_criticos` text,
  `plano_recuperacao` text,
  `responsavel` varchar(255) DEFAULT NULL,
  `ultimo_teste` date DEFAULT NULL,
  `proximo_teste` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'ATIVO',
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idbcp`),
  KEY `idrisco` (`idrisco`),
  CONSTRAINT `riscos_bcp_ibfk_1` FOREIGN KEY (`idrisco`) REFERENCES `riscos_riscos` (`idrisco`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_bcp`
--

LOCK TABLES `riscos_bcp` WRITE;
/*!40000 ALTER TABLE `riscos_bcp` DISABLE KEYS */;
INSERT INTO `riscos_bcp` VALUES (1,4,'BIA - Infraestrutura de TI','BIA','Análise de impacto nos negócios para infraestrutura crítica de TI.','Interrupção total das operações por mais de 24h',48,4,12,'Servidores, switches, firewall, nobreak','Ativar datacenter secundário em até 12h','Pedro Alves','2026-03-01','2026-09-01','ATIVO',NOW());
/*!40000 ALTER TABLE `riscos_bcp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_crises`
--

DROP TABLE IF EXISTS `riscos_crises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_crises` (
  `idcrise` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `tipo` varchar(20) DEFAULT 'OPERACIONAL',
  `nivel` varchar(10) DEFAULT 'MEDIO',
  `comite` text,
  `escalonamento` text,
  `comunicacao` text,
  `acoes_tomadas` text,
  `status` varchar(20) DEFAULT 'MONITORANDO',
  `data_inicio` datetime DEFAULT NULL,
  `data_fim` datetime DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idcrise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `riscos_comites`
--

DROP TABLE IF EXISTS `riscos_comites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_comites` (
  `idcomite` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `membros` text,
  `periodicidade` varchar(20) DEFAULT 'MENSAL',
  `status` varchar(20) DEFAULT 'ATIVO',
  `ultima_reuniao` date DEFAULT NULL,
  `proxima_reuniao` date DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idcomite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_comites`
--

LOCK TABLES `riscos_comites` WRITE;
/*!40000 ALTER TABLE `riscos_comites` DISABLE KEYS */;
INSERT INTO `riscos_comites` VALUES (1,'Comitê de Segurança da Informação','Comitê responsável pela governança de segurança da informação.','João Silva, Maria Souza, Ana Costa, Pedro Alves','MENSAL','ATIVO','2026-05-15','2026-06-15',NOW());
/*!40000 ALTER TABLE `riscos_comites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos_politicas`
--

DROP TABLE IF EXISTS `riscos_politicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos_politicas` (
  `idpolitica` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `versao` varchar(10) DEFAULT '1.0',
  `area` varchar(255) DEFAULT NULL,
  `responsavel` varchar(255) DEFAULT NULL,
  `data_aprovacao` date DEFAULT NULL,
  `data_revisao` date DEFAULT NULL,
  `conteudo` longtext,
  `status` varchar(20) DEFAULT 'APROVADA',
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idpolitica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos_politicas`
--

LOCK TABLES `riscos_politicas` WRITE;
/*!40000 ALTER TABLE `riscos_politicas` DISABLE KEYS */;
INSERT INTO `riscos_politicas` VALUES (1,'Política de Segurança da Informação','Diretrizes corporativas para segurança da informação e proteção de dados.','2.1','TI','João Silva','2026-01-10','2026-07-10','<p>Política completa de segurança da informação...</p>','APROVADA',NOW()),(2,'Política de Backup e Recuperação','Procedimentos para backup e recuperação de dados corporativos.','1.0','TI','Maria Souza','2026-03-01','2026-09-01','<p>Procedimentos de backup...</p>','APROVADA',NOW());
/*!40000 ALTER TABLE `riscos_politicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipamentos_categorias`
--

DROP TABLE IF EXISTS `equipamentos_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipamentos_categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `equipamentos_categorias` WRITE;
/*!40000 ALTER TABLE `equipamentos_categorias` DISABLE KEYS */;
INSERT INTO `equipamentos_categorias` VALUES (1,'Servidor','Servidores e infraestrutura de rede',NOW()),(2,'Workstation','Estações de trabalho e computadores',NOW()),(3,'Impressora','Impressoras e multifuncionais',NOW()),(4,'Rede','Switches, roteadores e access points',NOW()),(5,'Periférico','Teclados, mouses, monitores',NOW()),(6,'Outro','Outros equipamentos',NOW());
/*!40000 ALTER TABLE `equipamentos_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipamentos`
--

DROP TABLE IF EXISTS `equipamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipamentos` (
  `idequipamento` int(11) NOT NULL AUTO_INCREMENT,
  `clientesid` int(11) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `numero_serie` varchar(100) DEFAULT NULL,
  `patrimonio` varchar(50) DEFAULT NULL,
  `especificacoes` text,
  `data_instalacao` date DEFAULT NULL,
  `data_garantia` date DEFAULT NULL,
  `status` varchar(30) DEFAULT 'ATIVO',
  `observacoes` text,
  `criado_em` datetime NOT NULL,
  `alterado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idequipamento`),
  KEY `clientesid` (`clientesid`),
  KEY `idcategoria` (`idcategoria`),
  CONSTRAINT `equipamentos_ibfk_1` FOREIGN KEY (`clientesid`) REFERENCES `clientes` (`clientesid`) ON DELETE SET NULL,
  CONSTRAINT `equipamentos_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `equipamentos_categorias` (`idcategoria`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sla_acordos`
--

DROP TABLE IF EXISTS `sla_acordos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sla_acordos` (
  `idsla` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `tipo` varchar(30) DEFAULT 'INTERNO',
  `prioridade` varchar(20) DEFAULT 'MEDIA',
  `tempo_resposta_h` decimal(5,1) DEFAULT '4.0',
  `tempo_resolucao_h` decimal(5,1) DEFAULT '24.0',
  `horario_funcionamento` varchar(100) DEFAULT '08:00-18:00 Seg-Sex',
  `penalidades` text,
  `cliente_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'ATIVO',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idsla`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `sla_acordos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`clientesid`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sla_acordos` WRITE;
/*!40000 ALTER TABLE `sla_acordos` DISABLE KEYS */;
INSERT INTO `sla_acordos` VALUES (1,'SLA Premium - Suporte 4h','Atendimento prioritário com resposta em até 4 horas e resolução em 24 horas úteis.','EXTERNO','CRITICA',4.0,24.0,'24h Seg-Dom','Multa de 2% sobre o valor do contrato por hora excedente.',NULL,'ATIVO',NOW()),(2,'SLA Standard - Suporte 8h','Atendimento padrão com resposta em até 8 horas e resolução em 48 horas úteis.','EXTERNO','MEDIA',8.0,48.0,'08:00-18:00 Seg-Sex','Multa de 1% sobre o valor mensal por descumprimento.',NULL,'ATIVO',NOW()),(3,'SLA Interno TI','Acordo interno para manutenção de infraestrutura e suporte a funcionários.','INTERNO','ALTA',2.0,8.0,'08:00-20:00 Seg-Sáb','',NULL,'ATIVO',NOW());
/*!40000 ALTER TABLE `sla_acordos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda_eventos`
--

DROP TABLE IF EXISTS `agenda_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda_eventos` (
  `idevento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `tipo` varchar(50) DEFAULT 'VISITA_TECNICA',
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `os_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `equipamento_id` int(11) DEFAULT NULL,
  `local` varchar(255) DEFAULT NULL,
  `cor` varchar(7) DEFAULT '#6366f1',
  `status` varchar(20) DEFAULT 'AGENDADO',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idevento`),
  KEY `admin_id` (`admin_id`),
  KEY `os_id` (`os_id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `agenda_eventos_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`adminid`) ON DELETE SET NULL,
  CONSTRAINT `agenda_eventos_ibfk_2` FOREIGN KEY (`os_id`) REFERENCES `os` (`idos`) ON DELETE SET NULL,
  CONSTRAINT `agenda_eventos_ibfk_3` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`clientesid`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `checklists_modelos`
--

DROP TABLE IF EXISTS `checklists_modelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checklists_modelos` (
  `idchecklist` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `tipo` varchar(50) DEFAULT 'INSTALACAO',
  `status` varchar(20) DEFAULT 'ATIVO',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idchecklist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `checklists_modelos` WRITE;
/*!40000 ALTER TABLE `checklists_modelos` DISABLE KEYS */;
INSERT INTO `checklists_modelos` VALUES (1,'Instalação de Servidor','Checklist para instalação e configuração de novos servidores.','INSTALACAO','ATIVO',NOW()),(2,'Manutenção Preventiva','Checklist de manutenção preventiva mensal em equipamentos.','MANUTENCAO','ATIVO',NOW()),(3,'Vistoria Técnica','Checklist para vistoria técnica in loco.','VISTORIA','ATIVO',NOW());
/*!40000 ALTER TABLE `checklists_modelos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checklists_itens`
--

DROP TABLE IF EXISTS `checklists_itens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checklists_itens` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `idchecklist` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `ordem` int(11) DEFAULT '0',
  `obrigatorio` tinyint(1) DEFAULT '1',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`iditem`),
  KEY `idchecklist` (`idchecklist`),
  CONSTRAINT `checklists_itens_ibfk_1` FOREIGN KEY (`idchecklist`) REFERENCES `checklists_modelos` (`idchecklist`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `checklists_itens` WRITE;
/*!40000 ALTER TABLE `checklists_itens` DISABLE KEYS */;
INSERT INTO `checklists_itens` (`idchecklist`, `descricao`, `ordem`, `obrigatorio`, `criado_em`) VALUES (1,'Verificar especificações técnicas do servidor',1,1,NOW()),(1,'Instalar sistema operacional e atualizações',2,1,NOW()),(1,'Configurar rede e firewall',3,1,NOW()),(1,'Testar conectividade e serviços',4,1,NOW()),(1,'Documentar configurações realizadas',5,0,NOW()),(2,'Verificar temperatura e refrigeração',1,1,NOW()),(2,'Limpar filtros de ar e ventoinhas',2,1,NOW()),(2,'Verificar integridade de cabos',3,0,NOW()),(2,'Testar nobreak e estabilizador',4,1,NOW()),(2,'Executar backup de configuração',5,0,NOW());
/*!40000 ALTER TABLE `checklists_itens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checklists_execucoes`
--

DROP TABLE IF EXISTS `checklists_execucoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checklists_execucoes` (
  `idexecucao` int(11) NOT NULL AUTO_INCREMENT,
  `idchecklist` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `os_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `equipamento_id` int(11) DEFAULT NULL,
  `data_execucao` datetime DEFAULT NULL,
  `resultado` varchar(20) DEFAULT 'PENDENTE',
  `observacoes` text,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idexecucao`),
  KEY `idchecklist` (`idchecklist`),
  KEY `os_id` (`os_id`),
  CONSTRAINT `checklists_execucoes_ibfk_1` FOREIGN KEY (`idchecklist`) REFERENCES `checklists_modelos` (`idchecklist`) ON DELETE CASCADE,
  CONSTRAINT `checklists_execucoes_ibfk_2` FOREIGN KEY (`os_id`) REFERENCES `os` (`idos`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `checklists_respostas`
--

DROP TABLE IF EXISTS `checklists_respostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checklists_respostas` (
  `idresposta` int(11) NOT NULL AUTO_INCREMENT,
  `idexecucao` int(11) NOT NULL,
  `iditem` int(11) NOT NULL,
  `conforme` tinyint(1) DEFAULT NULL,
  `observacao` text,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idresposta`),
  KEY `idexecucao` (`idexecucao`),
  KEY `iditem` (`iditem`),
  CONSTRAINT `checklists_respostas_ibfk_1` FOREIGN KEY (`idexecucao`) REFERENCES `checklists_execucoes` (`idexecucao`) ON DELETE CASCADE,
  CONSTRAINT `checklists_respostas_ibfk_2` FOREIGN KEY (`iditem`) REFERENCES `checklists_itens` (`iditem`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estoques`
--

DROP TABLE IF EXISTS `estoques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estoques` (
  `idestoque` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `tipo` varchar(30) DEFAULT 'PRINCIPAL',
  `endereco` varchar(255) DEFAULT NULL,
  `responsavel` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'ATIVO',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idestoque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `estoques` WRITE;
/*!40000 ALTER TABLE `estoques` DISABLE KEYS */;
INSERT INTO `estoques` VALUES (1,'Estoque Principal','Armazém central da empresa','PRINCIPAL','Rua Principal, 100','Victor Oliveira','ATIVO',NOW());
/*!40000 ALTER TABLE `estoques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estoque_itens`
--

DROP TABLE IF EXISTS `estoque_itens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estoque_itens` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `idestoque` int(11) NOT NULL,
  `produtosid` int(11) NOT NULL,
  `quantidade` decimal(10,2) DEFAULT '0.00',
  `quantidade_minima` decimal(10,2) DEFAULT '0.00',
  `localizacao` varchar(100) DEFAULT NULL,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`iditem`),
  KEY `idestoque` (`idestoque`),
  KEY `produtosid` (`produtosid`),
  CONSTRAINT `estoque_itens_ibfk_1` FOREIGN KEY (`idestoque`) REFERENCES `estoques` (`idestoque`) ON DELETE CASCADE,
  CONSTRAINT `estoque_itens_ibfk_2` FOREIGN KEY (`produtosid`) REFERENCES `produtos` (`produtosid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pecas_categorias`
--

DROP TABLE IF EXISTS `pecas_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pecas_categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pecas_categorias` WRITE;
/*!40000 ALTER TABLE `pecas_categorias` DISABLE KEYS */;
INSERT INTO `pecas_categorias` VALUES (1,'Hardware',NOW()),(2,'Rede',NOW()),(3,'Elétrica',NOW()),(4,'Limpeza',NOW()),(5,'Ferramentas',NOW());
/*!40000 ALTER TABLE `pecas_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pecas`
--

DROP TABLE IF EXISTS `pecas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pecas` (
  `idpeca` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `idcategoria` int(11) DEFAULT NULL,
  `fabricante` varchar(100) DEFAULT NULL,
  `modelo_compativel` varchar(255) DEFAULT NULL,
  `quantidade` decimal(10,2) DEFAULT '0.00',
  `quantidade_minima` decimal(10,2) DEFAULT '0.00',
  `preco_custo` decimal(10,2) DEFAULT '0.00',
  `preco_venda` decimal(10,2) DEFAULT '0.00',
  `unidade` varchar(20) DEFAULT 'un',
  `localizacao` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'ATIVO',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idpeca`),
  KEY `idcategoria` (`idcategoria`),
  CONSTRAINT `pecas_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `pecas_categorias` (`idcategoria`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pecas` WRITE;
/*!40000 ALTER TABLE `pecas` DISABLE KEYS */;
INSERT INTO `pecas` (`codigo`, `nome`, `descricao`, `idcategoria`, `fabricante`, `quantidade`, `quantidade_minima`, `preco_custo`, `preco_venda`, `unidade`, `criado_em`) VALUES ('PEC-001','Fonte ATX 500W','Fonte de alimentação 500W real',1,'Corsair',10,3,149.90,249.90,'un',NOW()),('PEC-002','Cabo de Rede CAT6 3m','Cabo de rede blindado CAT6 3 metros',2,'Intelbras',50,10,8.50,19.90,'un',NOW()),('PEC-003','SSD 240GB SATA','SSD Kingston 240GB SATA III',1,'Kingston',15,5,179.90,279.90,'un',NOW()),('PEC-004','Pasta Térmica 5g','Pasta térmica para processadores',1,'Arctic',20,5,12.90,29.90,'un',NOW());
/*!40000 ALTER TABLE `pecas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orcamentos`
--

DROP TABLE IF EXISTS `orcamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orcamentos` (
  `idorcamento` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(30) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `clientesid` int(11) DEFAULT NULL,
  `descricao` text,
  `itens` longtext,
  `valor_total` decimal(10,2) DEFAULT '0.00',
  `desconto` decimal(10,2) DEFAULT '0.00',
  `valor_final` decimal(10,2) DEFAULT '0.00',
  `validade` date DEFAULT NULL,
  `status` varchar(30) DEFAULT 'RASCUNHO',
  `responsavel` varchar(100) DEFAULT NULL,
  `observacoes` text,
  `criado_em` datetime NOT NULL,
  `criado_por` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idorcamento`),
  KEY `clientesid` (`clientesid`),
  CONSTRAINT `orcamentos_ibfk_1` FOREIGN KEY (`clientesid`) REFERENCES `clientes` (`clientesid`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `faturamento_faturas`
--

DROP TABLE IF EXISTS `faturamento_faturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faturamento_faturas` (
  `idfatura` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(30) NOT NULL,
  `clientesid` int(11) DEFAULT NULL,
  `os_id` int(11) DEFAULT NULL,
  `contrato_id` int(11) DEFAULT NULL,
  `descricao` text,
  `valor` decimal(10,2) DEFAULT '0.00',
  `data_emissao` date DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `forma_pagamento` varchar(30) DEFAULT 'BOLETO',
  `status` varchar(20) DEFAULT 'PENDENTE',
  `observacoes` text,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idfatura`),
  KEY `clientesid` (`clientesid`),
  KEY `os_id` (`os_id`),
  CONSTRAINT `faturamento_faturas_ibfk_1` FOREIGN KEY (`clientesid`) REFERENCES `clientes` (`clientesid`) ON DELETE SET NULL,
  CONSTRAINT `faturamento_faturas_ibfk_2` FOREIGN KEY (`os_id`) REFERENCES `os` (`idos`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `custos_categorias`
--

DROP TABLE IF EXISTS `custos_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custos_categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `tipo_padrao` varchar(30) DEFAULT 'VARIAVEL',
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `custos_categorias` WRITE;
/*!40000 ALTER TABLE `custos_categorias` DISABLE KEYS */;
INSERT INTO `custos_categorias` VALUES (1,'Material de Escritório','VARIAVEL',NOW()),(2,'Ferramentas','VARIAVEL',NOW()),(3,'Transporte','VARIAVEL',NOW()),(4,'Aluguel','FIXO',NOW()),(5,'Energia','FIXO',NOW()),(6,'Software','FIXO',NOW()),(7,'Terceirizados','VARIAVEL',NOW()),(8,'Manutenção','VARIAVEL',NOW()),(9,'Marketing','VARIAVEL',NOW());
/*!40000 ALTER TABLE `custos_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custos_lancamentos`
--

DROP TABLE IF EXISTS `custos_lancamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custos_lancamentos` (
  `idcusto` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT 'VARIAVEL',
  `valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `data_ocorrencia` date DEFAULT NULL,
  `os_id` int(11) DEFAULT NULL,
  `fornecedor` varchar(100) DEFAULT NULL,
  `forma_pagamento` varchar(30) DEFAULT 'DINHEIRO',
  `status` varchar(20) DEFAULT 'PAGO',
  `observacoes` text,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`idcusto`),
  KEY `idcategoria` (`idcategoria`),
  KEY `os_id` (`os_id`),
  CONSTRAINT `custos_lancamentos_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `custos_categorias` (`idcategoria`) ON DELETE SET NULL,
  CONSTRAINT `custos_lancamentos_ibfk_2` FOREIGN KEY (`os_id`) REFERENCES `os` (`idos`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- NOVOS MÓDULOS sparkOS (Fiscal, Financeiro, Portal, Analytics)
--

-- 1. CONTAS A RECEBER

DROP TABLE IF EXISTS `contas_receber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contas_receber` (
  `idreceber` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(30) NOT NULL,
  `clientesid` int(11) DEFAULT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` decimal(10,2) DEFAULT '0.00',
  `data_vencimento` date DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `forma_pagamento` varchar(30) DEFAULT 'BOLETO',
  `valor_recebido` decimal(10,2) DEFAULT NULL,
  `juros` decimal(10,2) DEFAULT '0.00',
  `multa` decimal(10,2) DEFAULT '0.00',
  `status` varchar(20) DEFAULT 'PENDENTE',
  `observacoes` text,
  `criado_em` datetime DEFAULT NULL,
  `criado_por` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idreceber`),
  KEY `clientesid` (`clientesid`),
  CONSTRAINT `contas_receber_ibfk_1` FOREIGN KEY (`clientesid`) REFERENCES `clientes` (`clientesid`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO `contas_receber` VALUES (1,'REC-001',1,'Manutenção preventiva servidor - Junho',3500.00,'2026-06-15',NULL,'BOLETO',NULL,0.00,0.00,'PENDENTE','Aguardando vencimento',NOW(),'admin'),(2,'REC-002',2,'Instalação rede cabeada',5200.00,'2026-06-10','2026-06-08','PIX',5200.00,0.00,0.00,'PAGO','Pago antecipado',NOW(),'admin');

-- 2. CONCILIAÇÃO BANCÁRIA

DROP TABLE IF EXISTS `conciliacao_lancamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conciliacao_lancamentos` (
  `idlancamento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `tipo` varchar(20) DEFAULT 'RECEITA',
  `categoria` varchar(100) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT '0.00',
  `data_lancamento` date DEFAULT NULL,
  `data_conciliacao` date DEFAULT NULL,
  `conta_bancaria` varchar(100) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'PENDENTE',
  `observacoes` text,
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idlancamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- 3. FISCAL - CADASTRO

DROP TABLE IF EXISTS `fiscal_cadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fiscal_cadastro` (
  `idcadastro` int(11) NOT NULL AUTO_INCREMENT,
  `clientesid` int(11) DEFAULT NULL,
  `regime_tributario` varchar(30) DEFAULT 'SIMPLES_NACIONAL',
  `cnae` varchar(20) DEFAULT NULL,
  `inscricao_estadual` varchar(30) DEFAULT NULL,
  `inscricao_municipal` varchar(30) DEFAULT NULL,
  `aliquota_iss` decimal(5,2) DEFAULT '0.00',
  `aliquota_icms` decimal(5,2) DEFAULT '0.00',
  `observacoes` text,
  `criado_em` datetime DEFAULT NULL,
  `alterado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idcadastro`),
  KEY `clientesid` (`clientesid`),
  CONSTRAINT `fiscal_cadastro_ibfk_1` FOREIGN KEY (`clientesid`) REFERENCES `clientes` (`clientesid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- 4. FISCAL - TRIBUTAÇÃO

DROP TABLE IF EXISTS `fiscal_tributacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fiscal_tributacao` (
  `idtributo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `tipo` varchar(20) DEFAULT 'FEDERAL',
  `aliquota` decimal(5,2) DEFAULT '0.00',
  `base_calculo` varchar(100) DEFAULT NULL,
  `periodicidade` varchar(20) DEFAULT 'MENSAL',
  `status` varchar(20) DEFAULT 'ATIVO',
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idtributo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO `fiscal_tributacao` VALUES (1,'IRPJ','Imposto de Renda Pessoa Jurídica','IRPJ sobre o lucro real ou presumido.','FEDERAL',15.00,'Lucro tributável','TRIMESTRAL','ATIVO',NOW()),(2,'PIS','Programa de Integração Social','Contribuição para o PIS.','FEDERAL',1.65,'Faturamento','MENSAL','ATIVO',NOW()),(3,'COFINS','Contribuição para o Financiamento da Seguridade Social','COFINS cumulativo/não cumulativo.','FEDERAL',7.60,'Faturamento','MENSAL','ATIVO',NOW()),(4,'ISS','Imposto Sobre Serviços','ISS devido ao município.','MUNICIPAL',5.00,'Valor do serviço','MENSAL','ATIVO',NOW()),(5,'ICMS','Imposto sobre Circulação de Mercadorias','ICMS devido ao estado.','ESTADUAL',18.00,'Valor da mercadoria','MENSAL','ATIVO',NOW());

-- 5. FISCAL - NFS-e

DROP TABLE IF EXISTS `fiscal_nfse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fiscal_nfse` (
  `idnfse` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(30) NOT NULL,
  `clientesid` int(11) DEFAULT NULL,
  `os_id` int(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT '0.00',
  `data_emissao` date DEFAULT NULL,
  `data_competencia` date DEFAULT NULL,
  `servico_descricao` text,
  `aliquota_iss` decimal(5,2) DEFAULT '0.00',
  `valor_iss` decimal(10,2) DEFAULT '0.00',
  `numero_rps` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'RASCUNHO',
  `xml` longtext,
  `observacoes` text,
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idnfse`),
  KEY `clientesid` (`clientesid`),
  KEY `os_id` (`os_id`),
  CONSTRAINT `fiscal_nfse_ibfk_1` FOREIGN KEY (`clientesid`) REFERENCES `clientes` (`clientesid`) ON DELETE SET NULL,
  CONSTRAINT `fiscal_nfse_ibfk_2` FOREIGN KEY (`os_id`) REFERENCES `os` (`idos`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- 6. FISCAL - RETENÇÕES

DROP TABLE IF EXISTS `fiscal_retencoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fiscal_retencoes` (
  `idretencao` int(11) NOT NULL AUTO_INCREMENT,
  `clientesid` int(11) DEFAULT NULL,
  `nfse_id` int(11) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT 'PIS',
  `valor_base` decimal(10,2) DEFAULT '0.00',
  `aliquota` decimal(5,2) DEFAULT '0.00',
  `valor_retencao` decimal(10,2) DEFAULT '0.00',
  `data_retencao` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'PENDENTE',
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idretencao`),
  KEY `clientesid` (`clientesid`),
  KEY `nfse_id` (`nfse_id`),
  CONSTRAINT `fiscal_retencoes_ibfk_1` FOREIGN KEY (`clientesid`) REFERENCES `clientes` (`clientesid`) ON DELETE SET NULL,
  CONSTRAINT `fiscal_retencoes_ibfk_2` FOREIGN KEY (`nfse_id`) REFERENCES `fiscal_nfse` (`idnfse`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- 7. FISCAL - RELATÓRIOS FISCAIS

DROP TABLE IF EXISTS `fiscal_relatorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fiscal_relatorios` (
  `idrelatorio` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `tipo` varchar(50) DEFAULT 'OBRIGACAO',
  `periodo_inicio` date DEFAULT NULL,
  `periodo_fim` date DEFAULT NULL,
  `data_emissao` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT 'GERADO',
  `arquivo` varchar(255) DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idrelatorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- 8. PORTAL - ACESSOS

DROP TABLE IF EXISTS `portal_acessos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portal_acessos` (
  `idacesso` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL DEFAULT 'CLIENTE',
  `ref_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ultimo_acesso` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT 'ATIVO',
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idacesso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- 9. KPIs / METAS

DROP TABLE IF EXISTS `kpis_metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kpis_metas` (
  `idkpi` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `categoria` varchar(50) DEFAULT 'OPERACIONAL',
  `valor_meta` decimal(10,2) DEFAULT '0.00',
  `valor_atual` decimal(10,2) DEFAULT '0.00',
  `unidade` varchar(20) DEFAULT '%',
  `periodo` varchar(20) DEFAULT 'MENSAL',
  `responsavel` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'ATIVO',
  `criado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`idkpi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO `kpis_metas` VALUES (1,'OS Concluídas no Prazo','Percentual de ordens de serviço concluídas dentro do SLA.','OPERACIONAL',95.00,88.00,'%','MENSAL','Victor Oliveira','ATIVO',NOW()),(2,'Faturamento Mensal','Meta de faturamento bruto mensal.','FINANCEIRO',100000.00,78500.00,'R$','MENSAL','Admin','ATIVO',NOW()),(3,'Satisfação do Cliente','NPS - Net Promoter Score.','QUALIDADE',90.00,82.00,'pontos','MENSAL','Admin','ATIVO',NOW()),(4,'Tickets Resolvidos no Dia','Percentual de tickets helpdesk resolvidos em até 24h.','OPERACIONAL',90.00,75.00,'%','MENSAL','TI','ATIVO',NOW());

DROP TABLE IF EXISTS `kpis_historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kpis_historico` (
  `idhistorico` int(11) NOT NULL AUTO_INCREMENT,
  `idkpi` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data_registro` date DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idhistorico`),
  KEY `idkpi` (`idkpi`),
  CONSTRAINT `kpis_historico_ibfk_1` FOREIGN KEY (`idkpi`) REFERENCES `kpis_metas` (`idkpi`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-02  0:35:57
