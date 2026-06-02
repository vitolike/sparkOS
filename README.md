# ⚡ SparkOS Enterprise — Sistema Integrado de CRM & ERP

**SparkOS Enterprise** é um cockpit gerencial moderno de alta fidelidade visual, construído sob a identidade estética **Light & Indigo Business** (SaaS de alta performance). Projetado para automatizar e otimizar processos de vendas, atendimento ao cliente, compliance corporativo, contratos de recorrência e ordens de serviço em um só lugar.

---

## 🎨 Design System & Experiência de Uso (UX)
* **Visual Premium Light**: Cores harmoniosas em tons de Indigo (`#6366f1`), ardósia escura (`#0f172a`) e fundos ultra-limpos em slate (`#f8fafc`).
* **Micro-Interações**: Cards com sombras dinâmicas elevados no hover, botões translúcidos e badges elegantes de status.
* **Máscaras Globais Inteligentes**: Formatação responsiva em tempo real para Telefone `(XX) XXXXX-XXXX`, CEP `XXXXX-XXX` e CPF/CNPJ dinâmico.
* **ViaCEP Inteligente**: Autopreenchimento de endereços em formulários com foco redirecionado automaticamente para o campo de número.
* **SaaS Datepicker Calendar**: Calendário jQuery UI inteiramente redesenhado com cantos arredondados, realce lilás para o dia atual e destaque Indigo.

---

## 💼 Os 16 Módulos Corporativos Implementados

### 1. Cadastro de Clientes (Contacts & Accounts)
- Controle completo de Pessoas Físicas e Jurídicas.
- Histórico de interações unificado e upload físico de documentos corporativos (`cliente_anexos`).
- Integração da API ViaCEP para validação e autocompletar de endereços.

### 2. Leads & Captação
- Captura de leads de alta conversão.
- Classificação por origem de aquisição (Google Ads, Facebook Ads, E-mail, Indicações).

### 3. Pipeline de Vendas (CRM)
- **Painel Kanban de 5 Estágios**: Contato Inicial, Qualificação, Proposta, Negociação e Fechado/Ganhos.
- Valor total do pipeline estimado exibido em tempo real e timeline (linha do tempo) histórica detalhada de interações por lead.

### 4. Atividades e Agenda
- Agendamento centralizado de compromissos técnicos e comerciais (`crm_atividades`).
- Controle de Tarefas, Reuniões, Ligações e Follow-ups integrados.

### 5. Atendimento ao Cliente (Help Desk)
- Abertura de Tickets com controle de criticidade (Baixa, Média, Alta, Urgente).
- **Controle Estrito de SLA**: Prazos de resolução automatizados (Urgente: 2 horas, Alta: 4 horas, etc.).
- Base de conhecimento técnica preventiva e FAQs (`helpdesk_faq`).

### 6. Comunicação & WhatsApp
- Registro de comunicações integradas por e-mail e mensagens de WhatsApp.

### 7. Marketing & Campanhas
- Lançamento de investimentos em tráfego pago.
- Consolidação de receita retornada e cálculo automático de ROI (Retorno sobre Investimento) por campanha.

### 8. Propostas e Contratos
- Gestão de vigência (meses), assinaturas e recorrência comercial.
- Simulação certificada de **Assinatura Eletrônica** de contratos nativa em lote.

### 9. Financeiro (Cobranças & Faturas)
- Acompanhamento de Receita Recorrente Mensal (**MRR**).
- Geração física de faturas corporativas (`financeiro_faturas`), faturas vencidas e status de recebimento.

### 10. Pós-venda & Customer Success
- Pesquisas de satisfação integradas de pós-venda.
- Medição e acompanhamento de **NPS (Net Promoter Score)** e feedback estruturado (`posvenda_nps`).

### 11. Automações & Workflows
- Mecanismo ativo de regras de negócios baseadas em gatilhos de eventos operacionais ("Quando cliente assinar contrato, disparar e-mail corporativo", etc.) com totalizador de execuções.

### 12. Relatórios e BI
- **Painel Executivo Unificado (Command Center)**: KPIs superiores com total de pipeline R$, ordens de serviço ativas, estoque baixo crítico e ranking das Top 5 oportunidades de maior valor.

### 13. Gestão Comercial (Comissões)
- Distribuição e controle de comissões por vendedor (`vendedores_comissoes`) com base em performance.

### 14. Catálogo de Produtos & Serviços
- Cadastro de itens com controle de estoque, alertas automáticos de estoque baixo crítico e preços de compra/venda.

### 15. Integrações & Webhooks
- Arquitetura com suporte para comunicação com WhatsApp Business, ViaCEP, Gateways de pagamento e logs gerais de conformidade.

### 16. Administração, Auditoria & Compliance
- Controle de contas de operadores técnicos.
- **Compliance & Riscos**: Painel de conformidade regulatória (Auditoria de incidentes LGPD e segurança de dados).
- **Risco Reativo de Ameaças**: Inteligência reativa que calcula scores de risco de acesso por usuário, elevando a pontuação diante de incidentes críticos e reduzindo automaticamente após a sua respectiva resolução.

---

## 🛠️ Infraestrutura e Docker Deployment

O sistema está totalmente dockerizado, utilizando o Apache e MySQL prontos para desenvolvimento local.

### Requisitos
* Docker
* Docker Compose

### Instalação Rápida

1. Clone o repositório em sua pasta de trabalho.
2. Inicie os contêineres Docker (o banco de dados será inicializado e semeado automaticamente com o [base.sql](file:///Users/victoroliveira/Documents/sparkOS/base.sql)):
   ```bash
   docker-compose up -d --build
   ```
3. Acesse a aplicação no seu navegador:
   ```text
   http://localhost
   ```

### Credenciais de Acesso Administrativo (Padrão)
* **Usuário**: `admin@admin.com`
* **Senha**: `123456`

---

## 🐳 Composição dos Contêineres
* **sparkos_web**: PHP 7.4 Apache (`rewrite` e overrides liberados por `.htaccess`, extensões `mysqli` e `pdo_mysql` ativas).
* **sparkos_db**: MySQL 5.7 (Mapeia a porta `3306` local e monta volumes persistentes de dados `sparkos_db_data`).
