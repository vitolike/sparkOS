-- =====================================================
-- NOVOS MÓDULOS sparkOS (Fiscal, Financeiro, Portal, Analytics)
-- =====================================================

SET FOREIGN_KEY_CHECKS = 0;

-- 1. CONTAS A RECEBER
DROP TABLE IF EXISTS `contas_receber`;
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

INSERT INTO `contas_receber` VALUES (1,'REC-001',1,'Manutenção preventiva servidor - Junho',3500.00,'2026-06-15',NULL,'BOLETO',NULL,0.00,0.00,'PENDENTE','Aguardando vencimento',NOW(),'admin'),(2,'REC-002',2,'Instalação rede cabeada',5200.00,'2026-06-10','2026-06-08','PIX',5200.00,0.00,0.00,'PAGO','Pago antecipado',NOW(),'admin');

-- 2. CONCILIAÇÃO BANCÁRIA
DROP TABLE IF EXISTS `conciliacao_lancamentos`;
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

-- 3. FISCAL - CADASTRO
DROP TABLE IF EXISTS `fiscal_cadastro`;
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

-- 4. FISCAL - TRIBUTAÇÃO
DROP TABLE IF EXISTS `fiscal_tributacao`;
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

INSERT INTO `fiscal_tributacao` VALUES (1,'IRPJ','Imposto de Renda Pessoa Jurídica','IRPJ sobre o lucro real ou presumido.','FEDERAL',15.00,'Lucro tributável','TRIMESTRAL','ATIVO',NOW()),(2,'PIS','Programa de Integração Social','Contribuição para o PIS.','FEDERAL',1.65,'Faturamento','MENSAL','ATIVO',NOW()),(3,'COFINS','Contribuição para o Financiamento da Seguridade Social','COFINS cumulativo/não cumulativo.','FEDERAL',7.60,'Faturamento','MENSAL','ATIVO',NOW()),(4,'ISS','Imposto Sobre Serviços','ISS devido ao município.','MUNICIPAL',5.00,'Valor do serviço','MENSAL','ATIVO',NOW()),(5,'ICMS','Imposto sobre Circulação de Mercadorias','ICMS devido ao estado.','ESTADUAL',18.00,'Valor da mercadoria','MENSAL','ATIVO',NOW());

-- 5. FISCAL - NFS-e
DROP TABLE IF EXISTS `fiscal_nfse`;
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

-- 6. FISCAL - RETENÇÕES
DROP TABLE IF EXISTS `fiscal_retencoes`;
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

-- 7. FISCAL - RELATÓRIOS FISCAIS
DROP TABLE IF EXISTS `fiscal_relatorios`;
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

-- 8. PORTAL - ACESSOS
DROP TABLE IF EXISTS `portal_acessos`;
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

-- 9. KPIs / METAS
DROP TABLE IF EXISTS `kpis_metas`;
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

INSERT INTO `kpis_metas` VALUES (1,'OS Concluídas no Prazo','Percentual de ordens de serviço concluídas dentro do SLA.','OPERACIONAL',95.00,88.00,'%','MENSAL','Victor Oliveira','ATIVO',NOW()),(2,'Faturamento Mensal','Meta de faturamento bruto mensal.','FINANCEIRO',100000.00,78500.00,'R$','MENSAL','Admin','ATIVO',NOW()),(3,'Satisfação do Cliente','NPS - Net Promoter Score.','QUALIDADE',90.00,82.00,'pontos','MENSAL','Admin','ATIVO',NOW()),(4,'Tickets Resolvidos no Dia','Percentual de tickets helpdesk resolvidos em até 24h.','OPERACIONAL',90.00,75.00,'%','MENSAL','TI','ATIVO',NOW());

DROP TABLE IF EXISTS `kpis_historico`;
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

SET FOREIGN_KEY_CHECKS = 1;
