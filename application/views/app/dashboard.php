    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link active" href="<?= base_url(); ?>app/home">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
                <a class="nav-link" href="<?= base_url(); ?>clientes/lista">
                    <i class="fas fa-users"></i> Clientes
                </a>
                <a class="nav-link" href="<?= base_url(); ?>crm/lista">
                    <i class="fas fa-filter"></i> CRM / Funil
                </a>
                <a class="nav-link" href="<?= base_url(); ?>os/lista">
                    <i class="fas fa-file-invoice"></i> Ordens de Serviço 
                    <?php if ($OS != null): ?>
                        <span class="badge badge-pill badge-danger ml-1"><?= $OS; ?></span>
                    <?php endif; ?>
                </a>
                <a class="nav-link" href="<?= base_url(); ?>produtos/lista">
                    <i class="fas fa-box-open"></i> Produtos
                </a>
                <a class="nav-link" href="<?= base_url(); ?>servicos/lista">
                    <i class="fas fa-tools"></i> Serviços
                </a>
            </nav>
        </div>
    </div>

    <main role="main" class="container-fluid px-md-5">
        
        <!-- Premium Welcoming Hero Card -->
        <div class="box-shadow mb-4 text-left position-relative overflow-hidden p-4 p-md-5" style="background: linear-gradient(135deg, rgba(99, 102, 241, 0.06), rgba(139, 92, 246, 0.04)) !important; border-radius: 20px !important;">
            <div class="position-relative" style="z-index: 2;">
                <h2 class="display-5 font-weight-bold mb-2" style="background: linear-gradient(to right, var(--primary-color), var(--primary-hover)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: -1px;">
                    Olá, bem-vindo de volta!
                </h2>
                <p class="lead text-muted mb-0" style="font-size: 15px;">
                    Acompanhe e controle suas ordens de serviço, níveis de estoque e metas comerciais do CRM a partir do seu cockpit digital.
                </p>
            </div>
            <!-- Decorative soft glowing orb in hero card -->
            <div style="position: absolute; right: -50px; top: -50px; width: 180px; height: 180px; background: rgba(99, 102, 241, 0.1); filter: blur(40px); border-radius: 50%; pointer-events: none;"></div>
        </div>

        <!-- 4-Column High-Impact KPI Metrics Row -->
        <div class="row mb-4">
            <!-- Metric 1: OS em Aberto -->
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(99, 102, 241, 0.08); color: var(--primary-color); border-radius: 12px;">
                            <i class="fas fa-file-invoice fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">OS em Aberto</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;"><?= $OS; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 2: Alertas de Estoque -->
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(245, 158, 11, 0.08); color: #d97706; border-radius: 12px;">
                            <i class="fas fa-exclamation-triangle fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Estoque Crítico</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;"><?= count($prod); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 3: Oportunidades Ativas -->
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(236, 72, 153, 0.08); color: #ec4899; border-radius: 12px;">
                            <i class="fas fa-filter fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Negócios Ativos (CRM)</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;"><?= $crm_ativos; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 4: Pipeline Total -->
            <div class="col-md-3">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(16, 185, 129, 0.08); color: #059669; border-radius: 12px;">
                            <i class="fas fa-handshake fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Pipeline Comercial</span>
                            <h3 class="font-weight-bold mb-0 text-success" style="font-size: 20px;">R$ <?= number_format((float)$pipeline_total, 2, ',', '.'); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            
            <!-- Left Side: OS & CRM top deals (col-lg-8) -->
            <div class="col-lg-8">
                
                <!-- Card 1: Ordens de Serviço em Aberto -->
                <div class="p-4 rounded box-shadow mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom" style="border-color: #f1f5f9 !important;">
                        <h6 class="card-title mb-0" style="border-bottom: none; padding-bottom: 0;">
                            <i class="fas fa-clipboard-list mr-2 text-pink" style="color: #ec4899;"></i>
                            <b>Ordens de Serviço em Aberto</b>
                        </h6>
                        <a href="<?= base_url(); ?>os/lista" class="text-muted font-weight-bold" style="font-size: 12px;">Ver tudo <i class="fas fa-chevron-right ml-1"></i></a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="OS_abertas">
                            <thead>
                                <tr>
                                    <th scope="col"># Prot.</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Responsável</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Data Final</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Ação</th>
                                </tr>
                            </thead>
                            <?php if(!$query){ ?>
                                <tbody>
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <i class="fas fa-check-circle fa-2x mb-3 text-muted" style="opacity: 0.5;"></i>
                                            <p class="texto_pequeno mb-0">Não há nenhuma ordem de serviço em aberto</p>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } else { ?>
                                <tbody>
                                    <?php foreach($query as $prop) { ?>
                                        <tr id="<?= $prop->idos; ?>"> 
                                            <td class="font-weight-bold">#<?= $prop->protocolo; ?></td>
                                            <td class="font-weight-bold"><?= $prop->nome_cliente; ?></td>
                                            <td><?= $prop->nome_tecnico; ?></td>
                                            <td style="max-width: 180px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= $prop->descricao; ?></td>
                                            <td><?= date('d/m/Y', strtotime($prop->data_final)); ?></td>
                                            <td>
                                                <span class="badge badge-pill badge-success"><?= $prop->status; ?></span>
                                            </td>
                                            <td class="text-right">
                                                <a href="<?= base_url(); ?>os/detalhes/<?= $prop->idos; ?>" class="btn btn-success btn-sm py-1 px-3">
                                                    Detalhes <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                
                <!-- Card 2: Negócios de Destaque no CRM (NEW!) -->
                <div class="p-4 rounded box-shadow mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom" style="border-color: #f1f5f9 !important;">
                        <h6 class="card-title mb-0" style="border-bottom: none; padding-bottom: 0;">
                            <i class="fas fa-filter mr-2 text-indigo" style="color: var(--primary-color);"></i>
                            <b>Oportunidades de Alto Valor (CRM)</b>
                        </h6>
                        <a href="<?= base_url(); ?>crm/lista" class="text-muted font-weight-bold" style="font-size: 12px;">Ir para o CRM <i class="fas fa-chevron-right ml-1"></i></a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="CRM_top">
                            <thead>
                                <tr>
                                    <th scope="col">Oportunidade</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Estágio</th>
                                    <th scope="col">Acompanhamento</th>
                                    <th scope="col" class="text-right">Ação</th>
                                </tr>
                            </thead>
                            <?php if(empty($crm_top_deals)){ ?>
                                <tbody>
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <i class="fas fa-funnel-dollar fa-2x mb-3 text-muted" style="opacity: 0.5;"></i>
                                            <p class="texto_pequeno mb-0">Nenhuma oportunidade comercial em negociação</p>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } else { ?>
                                <tbody>
                                    <?php foreach($crm_top_deals as $d) { ?>
                                        <tr id="crm-<?= $d->idcrm; ?>"> 
                                            <td class="font-weight-bold"><?= $d->titulo; ?></td>
                                            <td><?= $d->nome_cliente; ?> <?= $d->sobrenome_cliente; ?></td>
                                            <td class="font-weight-bold text-success">R$ <?= number_format((float)$d->valor, 2, ',', '.'); ?></td>
                                            <td>
                                                <span class="badge badge-pill badge-warning" style="background: rgba(99, 102, 241, 0.08) !important; color: var(--primary-color) !important; border: 1px solid rgba(99, 102, 241, 0.15);"><?= $d->estagio; ?></span>
                                            </td>
                                            <td>
                                                <?php if($d->data_proximo_contato): ?>
                                                    <span class="text-muted" style="font-size: 12px;"><i class="far fa-calendar-alt mr-1"></i><?= date('d/m/Y', strtotime($d->data_proximo_contato)); ?></span>
                                                <?php else: ?>
                                                    <span class="text-muted" style="font-size: 12px;">Não agendado</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-right">
                                                <a href="<?= base_url(); ?>crm/detalhes/<?= $d->idcrm; ?>" class="btn btn-primary btn-sm py-1 px-3">
                                                    Timeline <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                
            </div>

            <!-- Right Side: Stock Alerts & Quick CRM summary (col-lg-4) -->
            <div class="col-lg-4">
                
                <!-- Card 1: Alerta de Estoque -->
                <div class="p-4 rounded box-shadow mb-4">
                    <h6 class="card-title" style="border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                        <i class="fas fa-exclamation-triangle mr-2 text-violet" style="color: #a78bfa;"></i>
                        <b>Alerta de Estoque Crítico</b>
                    </h6>
                    
                    <div class="table-responsive">
                        <table class="table" id="produtos">
                            <thead>
                                <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Estoque</th>
                                    <th scope="col" class="text-right"></th>
                                </tr>
                            </thead>
                            <?php if(!$prod){ ?>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <i class="fas fa-box fa-2x mb-3 text-muted" style="opacity: 0.5;"></i>
                                            <p class="texto_pequeno mb-0">Nenhum produto em estoque baixo</p>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } else { ?>
                                <tbody>
                                    <?php foreach($prod as $p) { ?>
                                        <tr id="<?= $p->produtosid; ?>">  
                                            <td style="width: 50px;">
                                                <?php if ($p->foto == null): ?>
                                                    <img src="<?= base_url(); ?>public/images/image.jpg" class="rounded" width="36" height="36" style="object-fit: cover;">
                                                <?php else: ?>
                                                    <img src="<?= base_url(); ?>public/uploads/<?= $p->foto; ?>" class="rounded" width="36" height="36" style="object-fit: cover;">
                                                <?php endif; ?>
                                            </td>
                                            <td class="font-weight-bold" style="max-width: 110px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                <?= $p->descricao; ?>
                                            </td>
                                            <td>
                                                <span class="text-danger font-weight-bold" style="font-size: 13px;"><?= $p->estoque; ?></span>
                                                <span class="text-muted" style="font-size: 10px;">/<?= $p->estoque_minimo; ?></span>
                                            </td>
                                            <td class="text-right">
                                                <a href="<?= base_url(); ?>produtos/editar/<?= $p->produtosid; ?>" class="btn btn-secondary btn-sm py-1 px-2" style="height: 28px !important; padding: 2px 8px !important;">
                                                    <i class="fas fa-cog" style="font-size: 11px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                
                <!-- Card 2: Sumário de Pipeline Comercial (NEW!) -->
                <div class="p-4 rounded box-shadow mb-4">
                    <h6 class="card-title" style="border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                        <i class="fas fa-chart-pie mr-2 text-indigo" style="color: var(--primary-color);"></i>
                        <b>Resumo Comercial do CRM</b>
                    </h6>
                    
                    <div class="text-center py-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted" style="font-size: 13px;">Oportunidades em Aberto</span>
                            <span class="badge badge-pill badge-primary font-weight-bold" style="font-size: 12px; background: rgba(99, 102, 241, 0.1) !important; color: var(--primary-color) !important; border: 1px solid rgba(99, 102, 241, 0.15);"><?= $crm_ativos; ?> leads</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="text-muted" style="font-size: 13px;">Valor Estimado do Funil</span>
                            <span class="font-weight-bold text-success" style="font-size: 14px;">R$ <?= number_format((float)$pipeline_total, 2, ',', '.'); ?></span>
                        </div>
                        
                        <hr class="my-3" style="border-color: #f1f5f9 !important;">
                        
                        <a href="<?= base_url(); ?>crm/lista" class="btn btn-primary btn-block py-2 font-weight-bold" style="font-size: 13px;">
                            Acessar Funil de Vendas <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </main>

    <script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#OS_abertas')) {
            $('#OS_abertas').DataTable({
                "dom": 'Bfrtip',
                "info": false,
                "searching": false,
                "paging": true,
                "pageLength": 5,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            });
        }
        
        if (!$.fn.DataTable.isDataTable('#CRM_top')) {
            $('#CRM_top').DataTable({
                "dom": 'Bfrtip',
                "info": false,
                "searching": false,
                "paging": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            });
        }
        
        if (!$.fn.DataTable.isDataTable('#produtos')) {
            $('#produtos').DataTable({
                "dom": 'Bfrtip',
                "info": false,
                "searching": false,
                "paging": true,
                "pageLength": 5,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            });
        }
    });
    </script>
