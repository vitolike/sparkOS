    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link active" href="<?= base_url(); ?>helpdesk/lista"><i class="fas fa-headset"></i> Help Desk / Tickets</a>
            </nav>
        </div>
    </div>
    
    <div role="main" class="container-fluid px-md-5">
        
        <?php $this->load->view('layout/notifications', ['notify_view' => 'helpdesk']); ?>
        
        <!-- Helpdesk Header and Global Metrics Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="card-title mb-1">
                        <i class="fas fa-headset mr-2 text-pink" style="color: #6366f1;"></i>
                        <b>Atendimento ao Cliente & Help Desk</b>
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 13px;">Gerencie solicitações de suporte técnico, monitore limites de SLA contratual e resolva incidentes.</p>
                </div>
                <div class="col-md-6 text-md-right mt-3 mt-md-0">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#novoTicket">
                        <i class="fas fa-plus mr-1"></i> Abrir Novo Ticket
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Metrics Row -->
        <div class="row mb-4">
            <!-- Metric 1: Open Tickets -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(245, 158, 11, 0.08); color: #d97706; border-radius: 12px;">
                            <i class="fas fa-folder-open fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Tickets Em Aberto</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;"><?= $open_tickets; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 2: In Progress -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(99, 102, 241, 0.08); color: #6366f1; border-radius: 12px;">
                            <i class="fas fa-spinner fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Em Atendimento</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;"><?= $in_progress_tickets; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 3: Resolved -->
            <div class="col-md-4">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(16, 185, 129, 0.08); color: #059669; border-radius: 12px;">
                            <i class="fas fa-check-double fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Incidentes Resolvidos</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;"><?= $resolved_tickets; ?></h3>
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
                        <i class="fas fa-list-alt mr-2 text-primary"></i> Linha do Tempo e Listagem Geral de Chamados
                    </h6>
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabela_tickets">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Assunto</th>
                                    <th scope="col">Prioridade</th>
                                    <th scope="col">SLA Alvo</th>
                                    <th scope="col">Abertura</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($tickets as $t) { ?>
                                    <tr>
                                        <td><span class="font-weight-bold">#<?= $t->idticket; ?></span></td>
                                        <td>
                                            <span class="font-weight-bold text-dark d-block" style="font-size: 13.5px;"><?= $t->nome_cliente; ?> <?= $t->sobrenome_cliente; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-dark font-weight-bold"><?= $t->assunto; ?></span>
                                        </td>
                                        <td>
                                            <?php if ($t->prioridade == 'URGENTE'): ?>
                                                <span class="badge badge-pill badge-danger" style="background: rgba(239, 68, 68, 0.08) !important; color: #dc2626 !important; border: 1px solid rgba(239, 68, 68, 0.15);">URGENTE</span>
                                            <?php elseif ($t->prioridade == 'ALTA'): ?>
                                                <span class="badge badge-pill badge-warning" style="background: rgba(245, 158, 11, 0.08) !important; color: #d97706 !important; border: 1px solid rgba(245, 158, 11, 0.15);">ALTA</span>
                                            <?php elseif ($t->prioridade == 'MÉDIA'): ?>
                                                <span class="badge badge-pill badge-primary" style="background: rgba(99, 102, 241, 0.08) !important; color: #6366f1 !important; border: 1px solid rgba(99, 102, 241, 0.15);">MÉDIA</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-secondary" style="background: #f1f5f9 !important; color: #64748b !important; border: 1px solid #e2e8f0;">BAIXA</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="font-weight-bold d-block text-dark" style="font-size: 13px;"><?= $t->sla_horas; ?> Horas</span>
                                            <?php if ($t->status !== 'RESOLVIDO'): ?>
                                                <span class="text-muted" style="font-size: 10px;"><i class="far fa-hourglass mr-1"></i>SLA Ativo</span>
                                            <?php else: ?>
                                                <span class="text-success" style="font-size: 10px;"><i class="fas fa-check-circle mr-1"></i>Cumprido</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="text-muted" style="font-size: 12.5px;"><i class="far fa-calendar-alt mr-1"></i><?= date('d/m/Y H:i', strtotime($t->criado_em)); ?></span>
                                        </td>
                                        <td>
                                            <?php if ($t->status == 'ABERTO'): ?>
                                                <span class="badge badge-pill badge-warning" style="font-size: 10px;">ABERTO</span>
                                            <?php elseif ($t->status == 'EM ATENDIMENTO'): ?>
                                                <span class="badge badge-pill badge-primary" style="font-size: 10px;">EM ATENDIMENTO</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-success" style="font-size: 10px;">RESOLVIDO</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <?php if ($t->status == 'ABERTO'): ?>
                                                <a href="<?= base_url(); ?>helpdesk/em_atendimento/<?= $t->idticket; ?>" class="btn btn-secondary btn-sm py-1 px-2 mr-1" style="font-size: 11.5px !important; height: 28px !important;">
                                                    <i class="fas fa-play mr-1"></i> Atender
                                                </a>
                                                <a href="<?= base_url(); ?>helpdesk/resolver/<?= $t->idticket; ?>" class="btn btn-success btn-sm py-1 px-2" style="font-size: 11.5px !important; height: 28px !important;">
                                                    <i class="fas fa-check mr-1"></i> Resolver
                                                </a>
                                            <?php elseif ($t->status == 'EM ATENDIMENTO'): ?>
                                                <a href="<?= base_url(); ?>helpdesk/resolver/<?= $t->idticket; ?>" class="btn btn-success btn-sm py-1 px-2" style="font-size: 11.5px !important; height: 28px !important;">
                                                    <i class="fas fa-check mr-1"></i> Resolver
                                                </a>
                                            <?php else: ?>
                                                <span class="text-success font-weight-bold" style="font-size: 12px;"><i class="fas fa-check-double mr-1"></i> Resolvido</span>
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
    
    <!-- Modal Abrir Novo Ticket -->
    <div class="modal fade" id="novoTicket" tabindex="-1" role="dialog" aria-labelledby="novoTicketTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novoTicketTitle"><i class="fas fa-headset mr-2 text-primary"></i> Abrir Ticket de Suporte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" role="form" action="<?= base_url(); ?>helpdesk/adicionar">
                    <div class="modal-body p-4">
                        
                        <div class="form-group">
                            <label for="cliente">Associar Cliente</label>
                            <select id="cliente" class="form-control" name="cliente" required>
                                <option value="" disabled selected>Selecione o Cliente do Chamado...</option>
                                <?php foreach($clientes as $c) { ?>
                                    <option value="<?= $c->clientesid; ?>"><?= $c->nome; ?> <?= $c->sobrenome; ?> (<?= $c->documento; ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="prioridade">Grau de Prioridade (SLA)</label>
                            <select id="prioridade" class="form-control" name="prioridade" required>
                                <option value="BAIXA">Baixa (SLA 24 Horas)</option>
                                <option value="MÉDIA" selected>Média (SLA 12 Horas)</option>
                                <option value="ALTA">Alta (SLA 4 Horas)</option>
                                <option value="URGENTE">Urgente (SLA 2 Horas)</option>
                            </select>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="assunto">Assunto / Descrição do Chamado</label>
                            <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Ex: Falha ao carregar relatórios financeiros no dashboard" required>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Abrir Chamado</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#tabela_tickets')) {
                $('#tabela_tickets').DataTable({
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
