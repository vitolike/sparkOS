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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-02  0:35:57
