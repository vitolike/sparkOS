-- SparkOS Enterprise CRM Expansion Suite database migration

CREATE TABLE IF NOT EXISTS helpdesk_tickets (
    idticket INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    assunto VARCHAR(255) NOT NULL,
    prioridade VARCHAR(20) NOT NULL, -- 'BAIXA', 'MÉDIA', 'ALTA', 'URGENTE'
    sla_horas INT NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'ABERTO', -- 'ABERTO', 'EM ATENDIMENTO', 'RESOLVIDO'
    criado_em DATETIME NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(clientesid) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS marketing_campanhas (
    idcampanha INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    origem VARCHAR(50) NOT NULL, -- 'Google', 'Facebook', 'E-mail', 'Indicação'
    investimento DECIMAL(10,2) DEFAULT 0.00,
    retorno DECIMAL(10,2) DEFAULT 0.00,
    status VARCHAR(20) NOT NULL DEFAULT 'ATIVA', -- 'ATIVA', 'PAUSADA', 'CONCLUÍDA'
    criado_em DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS contratos (
    idcontrato INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    valor_mensal DECIMAL(10,2) DEFAULT 0.00,
    vigencia_meses INT NOT NULL,
    assinatura_eletronica VARCHAR(20) NOT NULL DEFAULT 'PENDENTE', -- 'PENDENTE', 'ASSINADO'
    status VARCHAR(20) NOT NULL DEFAULT 'ATIVO', -- 'ATIVO', 'EXPIRADO', 'RESCINDIDO'
    criado_em DATETIME NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(clientesid) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS automacoes (
    idautomacao INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    gatilho VARCHAR(255) NOT NULL,
    acao VARCHAR(255) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'ATIVO', -- 'ATIVO', 'INATIVO'
    execucoes INT DEFAULT 0,
    criado_em DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Seed Help Desk
INSERT INTO helpdesk_tickets (idticket, cliente_id, assunto, prioridade, sla_horas, status, criado_em)
SELECT 1, 1, 'Instabilidade intermitente no link de rede local', 'ALTA', 4, 'ABERTO', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM helpdesk_tickets WHERE idticket = 1);

INSERT INTO helpdesk_tickets (idticket, cliente_id, assunto, prioridade, sla_horas, status, criado_em)
SELECT 2, 2, 'Falha ao processar e emitir nota fiscal de serviço', 'URGENTE', 2, 'EM ATENDIMENTO', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM helpdesk_tickets WHERE idticket = 2);

-- Seed Marketing Campaigns
INSERT INTO marketing_campanhas (idcampanha, nome, origem, investimento, retorno, status, criado_em)
SELECT 1, 'Campanha Google Ads - Leads Infraestrutura 2026', 'Google', 1500.00, 7800.00, 'ATIVA', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM marketing_campanhas WHERE idcampanha = 1);

INSERT INTO marketing_campanhas (idcampanha, nome, origem, investimento, retorno, status, criado_em)
SELECT 2, 'Tráfego Pago Facebook - Captação de Contratos', 'Facebook', 2000.00, 4500.00, 'ATIVA', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM marketing_campanhas WHERE idcampanha = 2);

-- Seed Contracts
INSERT INTO contratos (idcontrato, cliente_id, titulo, valor_mensal, vigencia_meses, assinatura_eletronica, status, criado_em)
SELECT 1, 1, 'Locação e Monitoramento de Servidores Dedicados', 1200.00, 12, 'ASSINADO', 'ATIVO', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM contratos WHERE idcontrato = 1);

INSERT INTO contratos (idcontrato, cliente_id, titulo, valor_mensal, vigencia_meses, assinatura_eletronica, status, criado_em)
SELECT 2, 2, 'Contrato de Manutenção e Suporte Técnico Nivel 2', 800.00, 24, 'PENDENTE', 'ATIVO', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM contratos WHERE idcontrato = 2);

-- Seed Automations
INSERT INTO automacoes (idautomacao, nome, gatilho, acao, status, execucoes, criado_em)
SELECT 1, 'Alerta de Fechamento de Venda', 'Ao marcar lead como GANHO', 'Disparar mensagem no WhatsApp do cliente', 'ATIVO', 12, NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM automacoes WHERE idautomacao = 1);

INSERT INTO automacoes (idautomacao, nome, gatilho, acao, status, execucoes, criado_em)
SELECT 2, 'SLA de Suporte Crítico', 'Ao abrir ticket prioridade URGENTE', 'Enviar e-mail de alerta para o gerente de TI', 'ATIVO', 4, NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM automacoes WHERE idautomacao = 2);
