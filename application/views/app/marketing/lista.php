    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link active" href="<?= base_url(); ?>marketing/lista"><i class="fas fa-bullhorn"></i> Marketing / ROI</a>
            </nav>
        </div>
    </div>
    
    <div role="main" class="container-fluid px-md-5">
        
        <?php $this->load->view('layout/notifications', ['notify_view' => 'marketing']); ?>
        
        <!-- Marketing Header and Global Metrics Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="card-title mb-1">
                        <i class="fas fa-bullhorn mr-2 text-pink" style="color: #ec4899;"></i>
                        <b>Marketing & Retorno sobre Investimento (ROI)</b>
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 13px;">Monitore campanhas publicitárias de captação de leads, controle orçamentos investidos e analise o ROI de cada canal.</p>
                </div>
                <div class="col-md-6 text-md-right mt-3 mt-md-0">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#novaCampanha">
                        <i class="fas fa-plus mr-1"></i> Nova Campanha
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Metrics Row -->
        <div class="row mb-4">
            <!-- Metric 1: Total Investido -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(245, 158, 11, 0.08); color: #d97706; border-radius: 12px;">
                            <i class="fas fa-wallet fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Total Investido</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 20px;">R$ <?= number_format($total_investido, 2, ',', '.'); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 2: Total Retorno -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(16, 185, 129, 0.08); color: #059669; border-radius: 12px;">
                            <i class="fas fa-chart-line fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Retorno Comercial (Faturamento)</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 20px;">R$ <?= number_format($total_retorno, 2, ',', '.'); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 3: ROI Global -->
            <div class="col-md-4">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(99, 102, 241, 0.08); color: #6366f1; border-radius: 12px;">
                            <i class="fas fa-percentage fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Retorno Médio sobre Investimento (ROI)</span>
                            <h3 class="font-weight-bold mb-0" style="font-size: 20px; color: #6366f1;">+<?= $avg_roi; ?>% ROI</h3>
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
                        <i class="fas fa-chart-pie mr-2 text-primary"></i> Métricas Detalhadas por Campanha
                    </h6>
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabela_campanhas">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Campanha</th>
                                    <th scope="col">Origem</th>
                                    <th scope="col">Investimento</th>
                                    <th scope="col">Retorno Gerado</th>
                                    <th scope="col">ROI da Campanha</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($campanhas as $c) { 
                                    $campanha_roi = 0;
                                    if ($c->investimento > 0) {
                                        $campanha_roi = round((($c->retorno - $c->investimento) / $c->investimento) * 100);
                                    }
                                ?>
                                    <tr>
                                        <td><span class="font-weight-bold">#<?= $c->idcampanha; ?></span></td>
                                        <td><span class="font-weight-bold text-dark"><?= $c->nome; ?></span></td>
                                        <td>
                                            <?php if ($c->origem == 'Google'): ?>
                                                <span class="badge badge-pill badge-primary" style="background: rgba(99, 102, 241, 0.08) !important; color: #6366f1 !important; border: 1px solid rgba(99, 102, 241, 0.15);"><i class="fab fa-google mr-1"></i> Google</span>
                                            <?php elseif ($c->origem == 'Facebook'): ?>
                                                <span class="badge badge-pill badge-info" style="background: rgba(6, 182, 212, 0.08) !important; color: #0891b2 !important; border: 1px solid rgba(6, 182, 212, 0.15);"><i class="fab fa-facebook-f mr-1"></i> Facebook</span>
                                            <?php elseif ($c->origem == 'E-mail'): ?>
                                                <span class="badge badge-pill badge-secondary" style="background: #f1f5f9 !important; color: #64748b !important; border: 1px solid #e2e8f0;"><i class="far fa-envelope mr-1"></i> E-mail</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-warning" style="background: rgba(245, 158, 11, 0.08) !important; color: #d97706 !important; border: 1px solid rgba(245, 158, 11, 0.15);"><i class="fas fa-users mr-1"></i> Indicação</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><span class="font-weight-bold text-dark">R$ <?= number_format($c->investimento, 2, ',', '.'); ?></span></td>
                                        <td><span class="font-weight-bold text-success">R$ <?= number_format($c->retorno, 2, ',', '.'); ?></span></td>
                                        <td>
                                            <span class="font-weight-bold" style="color: <?= $campanha_roi >= 100 ? '#059669' : ($campanha_roi >= 0 ? '#6366f1' : '#dc2626'); ?>;">
                                                <?= $campanha_roi >= 0 ? '+' : ''; ?><?= $campanha_roi; ?>% ROI
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($c->status == 'ATIVA'): ?>
                                                <span class="badge badge-pill badge-success" style="font-size: 10px;">ATIVA</span>
                                            <?php elseif ($c->status == 'PAUSADA'): ?>
                                                <span class="badge badge-pill badge-warning" style="font-size: 10px;">PAUSADA</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-secondary" style="font-size: 10px;">CONCLUÍDA</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <?php if ($c->status == 'ATIVA'): ?>
                                                <a href="<?= base_url(); ?>marketing/atualizar_status/<?= $c->idcampanha; ?>/PAUSADA" class="btn btn-secondary btn-sm py-1 px-2 mr-1" style="font-size: 11.5px !important; height: 28px !important;">
                                                    <i class="fas fa-pause mr-1"></i> Pausar
                                                </a>
                                                <a href="<?= base_url(); ?>marketing/atualizar_status/<?= $c->idcampanha; ?>/CONCLUÍDA" class="btn btn-success btn-sm py-1 px-2" style="font-size: 11.5px !important; height: 28px !important;">
                                                    <i class="fas fa-check mr-1"></i> Concluir
                                                </a>
                                            <?php else: ?>
                                                <a href="<?= base_url(); ?>marketing/atualizar_status/<?= $c->idcampanha; ?>/ATIVA" class="btn btn-primary btn-sm py-1 px-2" style="font-size: 11.5px !important; height: 28px !important;">
                                                    <i class="fas fa-play mr-1"></i> Ativar
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
    
    <!-- Modal Cadastrar Nova Campanha -->
    <div class="modal fade" id="novaCampanha" tabindex="-1" role="dialog" aria-labelledby="novaCampanhaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novaCampanhaTitle"><i class="fas fa-bullhorn mr-2 text-primary"></i> Cadastrar Nova Campanha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" role="form" action="<?= base_url(); ?>marketing/adicionar">
                    <div class="modal-body p-4">
                        
                        <div class="form-group">
                            <label for="nome">Nome da Campanha</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Captação Contratos Google Ads Maio 2026" required>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="origem">Origem de Aquisição</label>
                            <select id="origem" class="form-control" name="origem" required>
                                <option value="Google" selected>Google Ads</option>
                                <option value="Facebook">Facebook Ads</option>
                                <option value="E-mail">E-mail Marketing</option>
                                <option value="Indicação">Indicação / Boca a boca</option>
                            </select>
                        </div>
                        
                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <label for="investimento">Investimento Inicial (R$)</label>
                                <input type="number" step="0.01" class="form-control" id="investimento" name="investimento" placeholder="1500.00" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="retorno">Retorno Gerado (R$)</label>
                                <input type="number" step="0.01" class="form-control" id="retorno" name="retorno" placeholder="4800.00" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#tabela_campanhas')) {
                $('#tabela_campanhas').DataTable({
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
