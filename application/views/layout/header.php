<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $sysname . ' - ' . $appname; ?></title>
    
    <!-- Google Fonts: Outfit -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/fontawesome-all.css" />
    <link rel="stylesheet" type="text/css" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/app.css">
    
    <!-- Scripts (Safe head loading for legacy view compatibility) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>public/js/qrcode.js"></script>
</head>
<body class="bg-app">

    <!-- Topbar (Sticky Header) -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container-fluid px-4">
            <!-- Sidebar Toggle Hamburger -->
            <button class="navbar-toggle-btn mr-3" id="sidebarToggleBtn" type="button">
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- Brand Logo -->
            <a class="navbar-brand logo d-flex align-items-center" href="<?= base_url(); ?>app/home">
                <i class="fab fa-codepen mr-2" style="font-size: 24px;"></i>
                <span class="font-weight-bold" style="letter-spacing: -0.5px;"><?= $sysname; ?></span>
            </a>
            
            <!-- Right Actions -->
            <div class="ml-auto d-flex align-items-center">
                <button class="action-icon-btn mr-3" data-toggle="modal" data-target="#system-info" title="Sobre o sistema">
                    <i class="fas fa-info-circle"></i>
                </button>
                <a class="btn-logout" href="<?= base_url(); ?>auth/sair">
                    <i class="fas fa-sign-out-alt"></i> Sair
                </a>
            </div>
        </div>
    </nav>

    <!-- Slide-out Sidebar Panel Drawer -->
    <div class="app-sidebar" id="appSidebar">
        <div class="sidebar-header d-flex align-items-center justify-content-between p-4">
            <span class="sidebar-title">Menu Principal</span>
            <button class="close-sidebar-btn" id="closeSidebarBtn">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu px-3">
            <a class="menu-item <?= $appname == 'Dashboard' ? 'active' : ''; ?>" href="<?= base_url(); ?>app/home">
                <i class="fas fa-th-large"></i> Dashboard
            </a>

            <div class="menu-section-label">CRM</div>
            <a class="menu-item <?= $appname == 'Clientes' ? 'active' : ''; ?>" href="<?= base_url(); ?>clientes/lista">
                <i class="fas fa-users"></i> Clientes
            </a>
            <a class="menu-item <?= $appname == 'CRM / Funil' ? 'active' : ''; ?>" href="<?= base_url(); ?>crm/lista">
                <i class="fas fa-filter"></i> CRM / Funil
            </a>
            <a class="menu-item <?= $appname == 'Marketing / Campanhas' ? 'active' : ''; ?>" href="<?= base_url(); ?>marketing/lista">
                <i class="fas fa-bullhorn"></i> Marketing / ROI
            </a>
            <a class="menu-item <?= $appname == 'Propostas & Contratos' ? 'active' : ''; ?>" href="<?= base_url(); ?>contratos/lista">
                <i class="fas fa-file-signature"></i> Propostas & Contratos
            </a>
            <a class="menu-item <?= $appname == 'Help Desk / Tickets' ? 'active' : ''; ?>" href="<?= base_url(); ?>helpdesk/lista">
                <i class="fas fa-headset"></i> Help Desk / Tickets
            </a>
            <a class="menu-item <?= $appname == 'Automações & Workflows' ? 'active' : ''; ?>" href="<?= base_url(); ?>automacoes/lista">
                <i class="fas fa-bolt"></i> Automações / Workflows
            </a>
            <a class="menu-item <?= $appname == 'Gestão de Riscos' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/dashboard">
                <i class="fas fa-shield-alt"></i> Gestão de Riscos (GRC)
            </a>

            <div class="menu-section-label">Operação</div>
            <a class="menu-item <?= $appname == 'Ordens de Serviço' ? 'active' : ''; ?>" href="<?= base_url(); ?>os/lista">
                <i class="fas fa-file-invoice"></i> Ordens de Serviço
            </a>
            <a class="menu-item <?= $appname == 'Produtos' ? 'active' : ''; ?>" href="<?= base_url(); ?>produtos/lista">
                <i class="fas fa-box-open"></i> Produtos
            </a>
            <a class="menu-item <?= $appname == 'Serviços' ? 'active' : ''; ?>" href="<?= base_url(); ?>servicos/lista">
                <i class="fas fa-tools"></i> Serviços
            </a>
            <a class="menu-item <?= $appname == 'Equipamentos' ? 'active' : ''; ?>" href="<?= base_url(); ?>equipamentos/lista">
                <i class="fas fa-server"></i> Equipamentos
            </a>
            <a class="menu-item <?= $appname == 'SLA' ? 'active' : ''; ?>" href="<?= base_url(); ?>sla/lista">
                <i class="fas fa-clock"></i> SLA / Acordos
            </a>
            <a class="menu-item <?= $appname == 'Agenda' ? 'active' : ''; ?>" href="<?= base_url(); ?>agenda/lista">
                <i class="fas fa-calendar-alt"></i> Agenda
            </a>
            <a class="menu-item <?= $appname == 'Checklists' ? 'active' : ''; ?>" href="<?= base_url(); ?>checklists/lista">
                <i class="fas fa-tasks"></i> Checklists
            </a>

            <div class="menu-section-label">Logística</div>
            <a class="menu-item <?= $appname == 'Estoque' ? 'active' : ''; ?>" href="<?= base_url(); ?>estoque/lista">
                <i class="fas fa-warehouse"></i> Estoque
            </a>
            <a class="menu-item <?= $appname == 'Peças' ? 'active' : ''; ?>" href="<?= base_url(); ?>pecas/lista">
                <i class="fas fa-cogs"></i> Peças
            </a>

            <div class="menu-section-label">Financeiro</div>
            <a class="menu-item <?= $appname == 'Orçamentos' ? 'active' : ''; ?>" href="<?= base_url(); ?>orcamentos/lista">
                <i class="fas fa-file-invoice-dollar"></i> Orçamentos
            </a>
            <a class="menu-item <?= $appname == 'Faturamento' ? 'active' : ''; ?>" href="<?= base_url(); ?>faturamento/lista">
                <i class="fas fa-credit-card"></i> Faturamento
            </a>
            <a class="menu-item <?= $appname == 'Custos' ? 'active' : ''; ?>" href="<?= base_url(); ?>custos/lista">
                <i class="fas fa-coins"></i> Custos
            </a>
            <a class="menu-item <?= $appname == 'Contas a Receber' ? 'active' : ''; ?>" href="<?= base_url(); ?>contasareceber/lista">
                <i class="fas fa-hand-holding-usd"></i> Contas a Receber
            </a>
            <a class="menu-item <?= $appname == 'Conciliação' ? 'active' : ''; ?>" href="<?= base_url(); ?>conciliacao/lista">
                <i class="fas fa-balance-scale"></i> Conciliação Bancária
            </a>

            <div class="menu-section-label">Fiscal</div>
            <a class="menu-item <?= $appname == 'Cadastro Fiscal' ? 'active' : ''; ?>" href="<?= base_url(); ?>cadastrofiscal/lista">
                <i class="fas fa-id-card"></i> Cadastro Fiscal
            </a>
            <a class="menu-item <?= $appname == 'Tributação' ? 'active' : ''; ?>" href="<?= base_url(); ?>tributacao/lista">
                <i class="fas fa-calculator"></i> Tributação
            </a>
            <a class="menu-item <?= $appname == 'NFS-e' ? 'active' : ''; ?>" href="<?= base_url(); ?>nfse/lista">
                <i class="fas fa-file-invoice"></i> NFS-e
            </a>
            <a class="menu-item <?= $appname == 'Retenções' ? 'active' : ''; ?>" href="<?= base_url(); ?>retencoes/lista">
                <i class="fas fa-handcuffs"></i> Retenções
            </a>
            <a class="menu-item <?= $appname == 'Relatórios Fiscais' ? 'active' : ''; ?>" href="<?= base_url(); ?>relatoriosfiscais/lista">
                <i class="fas fa-file-alt"></i> Relatórios Fiscais
            </a>

            <div class="menu-section-label">Portal</div>
            <a class="menu-item <?= $appname == 'Portal' ? 'active' : ''; ?>" href="<?= base_url(); ?>portal/lista">
                <i class="fas fa-globe"></i> Portal de Acessos
            </a>

            <div class="menu-section-label">Analytics</div>
            <a class="menu-item <?= $appname == 'KPIs' ? 'active' : ''; ?>" href="<?= base_url(); ?>kpis/lista">
                <i class="fas fa-chart-line"></i> KPIs / Metas
            </a>
            <a class="menu-item <?= $appname == 'Relatórios' ? 'active' : ''; ?>" href="<?= base_url(); ?>relatorios/lista">
                <i class="fas fa-chart-bar"></i> Relatórios
            </a>

            <div class="menu-divider my-3"></div>

            <a class="menu-item <?= $appname == 'Definições' ? 'active' : ''; ?>" href="<?= base_url(); ?>definicoes">
                <i class="fas fa-cogs"></i> Definições
            </a>
            <a class="menu-item <?= $appname == 'Administradores' ? 'active' : ''; ?>" href="<?= base_url(); ?>admins/lista">
                <i class="fas fa-user-cog"></i> Usuários / Técnicos
            </a>
        </div>
    </div>

    <!-- Sidebar Overlay Backdrop -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Wrapper of Dashboard Panel Content -->
    <div class="app-content-wrapper">

    <!-- Modal Sobre o Sistema -->
    <div class="modal fade" id="system-info" tabindex="-1" role="dialog" aria-labelledby="systemInfoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="systemInfoTitle"><i class="fas fa-info-circle mr-2 text-primary"></i> Sobre o sistema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <p class="mb-3"> <?php echo (ENVIRONMENT === 'development') ? '<strong>Versão do Framework:</strong> ' . CI_VERSION : '' ?></p>
                    <p class="mb-3"><strong>Chave do Produto:</strong> <code><?php echo $this->config->item('key_id'); ?></code></p>
                    <p class="mb-3"><strong>Versão do Sistema:</strong> <span class="badge badge-pill badge-success"><?php echo $this->config->item('sys_ver'); ?></span></p>
                    <hr class="my-3" style="border-color: var(--border-color);">
                    <p class="text-muted mb-0" style="font-size: 13px;">
                        Criado por Victor Oliveira. Código Aberto (disponível no <a href="https://github.com/vitolike/sparkOS" target="_blank" class="font-weight-bold">GitHub</a>).
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-block py-2" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>