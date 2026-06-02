    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link active" href="<?= base_url(); ?>contratos/lista"><i class="fas fa-file-signature"></i> Propostas & Contratos</a>
            </nav>
        </div>
    </div>
    
    <div role="main" class="container-fluid px-md-5">
        
        <?php $this->load->view('layout/notifications', ['notify_view' => 'contratos']); ?>
        
        <!-- Contratos Header and Global Metrics Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="card-title mb-1">
                        <i class="fas fa-file-signature mr-2 text-pink" style="color: #4f46e5;"></i>
                        <b>Propostas & Gestão de Contratos</b>
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 13px;">Monitore propostas vigentes, acompanhe assinaturas eletrônicas e gerencie a receita recorrente (MRR).</p>
                </div>
                <div class="col-md-6 text-md-right mt-3 mt-md-0">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#novoContrato">
                        <i class="fas fa-plus mr-1"></i> Nova Proposta / Contrato
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Metrics Row -->
        <div class="row mb-4">
            <!-- Metric 1: MRR Recorrente -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(99, 102, 241, 0.08); color: #6366f1; border-radius: 12px;">
                            <i class="fas fa-sync fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Receita Recorrente Mensal (MRR)</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 20px;">R$ <?= number_format($total_mrr, 2, ',', '.'); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 2: Contratos Assinados -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(16, 185, 129, 0.08); color: #059669; border-radius: 12px;">
                            <i class="fas fa-file-contract fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Contratos Assinados</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 20px;"><?= $signed_contracts; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 3: Pendentes Assinatura -->
            <div class="col-md-4">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(245, 158, 11, 0.08); color: #d97706; border-radius: 12px;">
                            <i class="fas fa-clock fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Aguardando Assinatura</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 20px;"><?= $pending_contracts; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Table Column -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="p-4 rounded box-shadow" style="background: white !important;">
                    <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                        <i class="fas fa-file-alt mr-2 text-primary"></i> Relatórios de Contratos Ativos
                    </h6>
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabela_contratos">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Título do Contrato</th>
                                    <th scope="col">Valor Recorrente</th>
                                    <th scope="col">Vigência</th>
                                    <th scope="col">Assinatura Eletrônica</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($contratos as $c) { ?>
                                    <tr>
                                        <td><span class="font-weight-bold">#<?= $c->idcontrato; ?></span></td>
                                        <td>
                                            <span class="font-weight-bold text-dark d-block" style="font-size: 13.5px;"><?= $c->nome_cliente; ?> <?= $c->sobrenome_cliente; ?></span>
                                        </td>
                                        <td><span class="font-weight-bold text-dark"><?= $c->titulo; ?></span></td>
                                        <td><span class="font-weight-bold text-primary">R$ <?= number_format($c->valor_mensal, 2, ',', '.'); ?> <small class="text-muted">/ mês</small></span></td>
                                        <td><span class="text-dark font-weight-bold"><?= $c->vigencia_meses; ?> Meses</span></td>
                                        <td>
                                            <?php if ($c->assinatura_eletronica == 'ASSINADO'): ?>
                                                <span class="badge badge-pill badge-success" style="font-size: 10px;"><i class="fas fa-signature mr-1"></i> ASSINADO</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-warning" style="font-size: 10px;"><i class="fas fa-hourglass mr-1"></i> PENDENTE</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($c->status == 'ATIVO'): ?>
                                                <span class="badge badge-pill badge-success" style="font-size: 10px;">ATIVO</span>
                                            <?php elseif ($c->status == 'EXPIRADO'): ?>
                                                <span class="badge badge-pill badge-warning" style="font-size: 10px;">EXPIRADO</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-danger" style="font-size: 10px;">RESCINDIDO</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <a href="<?= base_url(); ?>contratos/detalhes/<?= $c->idcontrato; ?>" class="btn btn-info btn-sm py-1 px-2 mr-1" style="font-size: 11.5px !important; height: 28px !important;">
                                                <i class="fas fa-search mr-1"></i>
                                            </a>
                                            <?php if ($c->assinatura_eletronica == 'PENDENTE'): ?>
                                                <a href="<?= base_url(); ?>contratos/assinar/<?= $c->idcontrato; ?>" class="btn btn-primary btn-sm py-1 px-2 mr-1" style="font-size: 11.5px !important; height: 28px !important;">
                                                    <i class="fas fa-edit mr-1"></i> Assinar
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($c->status == 'ATIVO'): ?>
                                                <a href="<?= base_url(); ?>contratos/atualizar_status/<?= $c->idcontrato; ?>/RESCINDIDO" class="btn btn-secondary btn-sm py-1 px-2" style="font-size: 11.5px !important; height: 28px !important;">
                                                    <i class="fas fa-times mr-1"></i> Rescindir
                                                </a>
                                            <?php else: ?>
                                                <a href="<?= base_url(); ?>contratos/atualizar_status/<?= $c->idcontrato; ?>/ATIVO" class="btn btn-secondary btn-sm py-1 px-2" style="font-size: 11.5px !important; height: 28px !important;">
                                                    <i class="fas fa-play mr-1"></i> Reativar
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Novo Contrato -->
    <div class="modal fade" id="novoContrato" tabindex="-1" role="dialog" aria-labelledby="novoContratoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novoContratoTitle"><i class="fas fa-file-signature mr-2 text-primary"></i> Cadastrar Nova Proposta / Contrato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" role="form" action="<?= base_url(); ?>contratos/adicionar">
                    <div class="modal-body p-4">
                        
                        <div class="form-group">
                            <label for="cliente">Associar Cliente</label>
                            <select id="cliente" class="form-control" name="cliente" required>
                                <option value="" disabled selected>Selecione o Cliente do Contrato...</option>
                                <?php foreach($clientes as $c) { ?>
                                    <option value="<?= $c->clientesid; ?>"><?= $c->nome; ?> <?= $c->sobrenome; ?> (<?= $c->documento; ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="titulo">Título / Objeto do Contrato</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ex: Prestação de Suporte de Servidores Mensais" required>
                        </div>
                        
                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <label for="valor_mensal">Valor Mensal Recorrente (R$)</label>
                                <input type="number" step="0.01" class="form-control" id="valor_mensal" name="valor_mensal" placeholder="1200.00" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="vigencia_meses">Vigência Comercial</label>
                                <select id="vigencia_meses" class="form-control" name="vigencia_meses" required>
                                    <option value="6">6 Meses</option>
                                    <option value="12" selected>12 Meses</option>
                                    <option value="24">24 Meses</option>
                                    <option value="36">36 Meses</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Gerar Proposta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#tabela_contratos')) {
                $('#tabela_contratos').DataTable({
                    "dom": 'Bfrtip',
                    "info": true,
                    "searching": true,
                    "paging": true,
                    "pageLength": 10,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                    }
                });
            }
        });
    </script>
