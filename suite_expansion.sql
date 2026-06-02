-- sparkOS CRM/ERP Advanced Enterprise Suite Expansion Tables

CREATE TABLE IF NOT EXISTS cliente_anexos (
    idanexo INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    nome_arquivo VARCHAR(255) NOT NULL,
    caminho VARCHAR(255) NOT NULL,
    tipo VARCHAR(50) NOT NULL DEFAULT 'Documento', -- 'Contrato', 'Documento', 'Identidade', 'Outros'
    criado_em DATETIME NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(clientesid) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS crm_atividades (
    idatividade INT AUTO_INCREMENT PRIMARY KEY,
    lead_id INT NULL,
    cliente_id INT NULL,
    titulo VARCHAR(255) NOT NULL,
    tipo VARCHAR(50) NOT NULL DEFAULT 'Tarefa', -- 'Tarefa', 'Reunião', 'Ligação', 'Follow-up'
    descricao TEXT NULL,
    data_agendada DATETIME NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'PENDENTE', -- 'PENDENTE', 'CONCLUÍDO'
    criado_em DATETIME NOT NULL,
    FOREIGN KEY (lead_id) REFERENCES crm_leads(idcrm) ON DELETE SET NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(clientesid) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS helpdesk_faq (
    idfaq INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    categoria VARCHAR(100) NOT NULL DEFAULT 'Geral', -- 'Geral', 'Financeiro', 'Técnico', 'Dúvidas'
    conteudo TEXT NOT NULL,
    criado_em DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS financeiro_faturas (
    idfatura INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    contrato_id INT NULL,
    valor DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    data_vencimento DATE NOT NULL,
    data_pagamento DATE NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'PENDENTE', -- 'PENDENTE', 'PAGO', 'ATRASADO'
    criado_em DATETIME NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(clientesid) ON DELETE CASCADE,
    FOREIGN KEY (contrato_id) REFERENCES contratos(idcontrato) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS vendedores_comissoes (
    idcomissao INT AUTO_INCREMENT PRIMARY KEY,
    vendedor_id INT NOT NULL,
    lead_id INT NOT NULL,
    valor_venda DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    percentual DECIMAL(5,2) NOT NULL DEFAULT 5.00,
    valor_comissao DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    status VARCHAR(20) NOT NULL DEFAULT 'A PAGAR', -- 'A PAGAR', 'PAGO'
    criado_em DATETIME NOT NULL,
    FOREIGN KEY (vendedor_id) REFERENCES admins(adminid) ON DELETE CASCADE,
    FOREIGN KEY (lead_id) REFERENCES crm_leads(idcrm) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS posvenda_nps (
    idnps INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    nota INT NOT NULL CHECK (nota >= 0 AND nota <= 10),
    comentario TEXT NULL,
    criado_em DATETIME NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(clientesid) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Seed Client Attachments
INSERT INTO cliente_anexos (idanexo, cliente_id, nome_arquivo, caminho, tipo, criado_em)
SELECT 1, 1, 'cnpj_cartao_corporativo.pdf', '/uploads/docs/cnpj_cartao_corporativo.pdf', 'Documento', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM cliente_anexos WHERE idanexo = 1);

-- Seed Calendar & Activities
INSERT INTO crm_atividades (idatividade, lead_id, cliente_id, titulo, tipo, descricao, data_agendada, status, criado_em)
SELECT 1, 1, 1, 'Reunião de Escopo Técnico da Infraestrutura', 'Reunião', 'Alinhamento dos requisitos técnicos para o setup dos servidores dedicados.', NOW() + INTERVAL 2 DAY, 'PENDENTE', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM crm_atividades WHERE idatividade = 1);

INSERT INTO crm_atividades (idatividade, lead_id, cliente_id, titulo, tipo, descricao, data_agendada, status, criado_em)
SELECT 2, 2, 2, 'Follow-up da proposta comercial enviada', 'Follow-up', 'Ligar para validar se a proposta foi aprovada pela diretoria.', NOW() + INTERVAL 1 DAY, 'PENDENTE', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM crm_atividades WHERE idatividade = 2);

-- Seed FAQ / Knowledge Base
INSERT INTO helpdesk_faq (idfaq, titulo, categoria, conteudo, criado_em)
SELECT 1, 'Como configurar as credenciais do seu e-mail corporativo', 'Geral', 'Para configurar seu e-mail corporativo, utilize o servidor SMTP smtp.sparkos.com.br na porta 587 utilizando SSL/TLS.', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM helpdesk_faq WHERE idfaq = 1);

INSERT INTO helpdesk_faq (idfaq, titulo, categoria, conteudo, criado_em)
SELECT 2, 'Procedimento operacional padrão em caso de instabilidade de rede', 'Técnico', 'Caso perceba oscilações, verifique o gateway local 192.168.1.1 e faça um teste de ping externo para 8.8.8.8.', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM helpdesk_faq WHERE idfaq = 2);

-- Seed Invoices & Billing
INSERT INTO financeiro_faturas (idfatura, cliente_id, contrato_id, valor, data_vencimento, data_pagamento, status, criado_em)
SELECT 1, 1, 1, 1200.00, CURDATE() + INTERVAL 10 DAY, NULL, 'PENDENTE', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM financeiro_faturas WHERE idfatura = 1);

INSERT INTO financeiro_faturas (idfatura, cliente_id, contrato_id, valor, data_vencimento, data_pagamento, status, criado_em)
SELECT 2, 2, 2, 800.00, CURDATE() - INTERVAL 5 DAY, NULL, 'ATRASADO', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM financeiro_faturas WHERE idfatura = 2);

-- Seed Sales Commissions
INSERT INTO vendedores_comissoes (idcomissao, vendedor_id, lead_id, valor_venda, percentual, valor_comissao, status, criado_em)
SELECT 1, 1, 1, 15000.00, 5.00, 750.00, 'A PAGAR', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM vendedores_comissoes WHERE idcomissao = 1);

-- Seed NPS Satisfaction Surveys
INSERT INTO posvenda_nps (idnps, cliente_id, nota, comentario, criado_em)
SELECT 1, 1, 9, 'Excelente atendimento inicial e suporte muito ágil para resolver problemas técnicos.', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM posvenda_nps WHERE idnps = 1);

INSERT INTO posvenda_nps (idnps, cliente_id, nota, comentario, criado_em)
SELECT 2, 2, 10, 'A implantação superou as expectativas. Ótimo painel comercial.', NOW()
FROM dual WHERE NOT EXISTS (SELECT 1 FROM posvenda_nps WHERE idnps = 2);
