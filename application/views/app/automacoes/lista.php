    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link active" href="<?= base_url(); ?>automacoes/lista"><i class="fas fa-bolt"></i> Automações</a>
            </nav>
        </div>
    </div>
    
    <div role="main" class="container-fluid px-md-5">
        
        <?php $this->load->view('layout/notifications', ['notify_view' => 'automacoes']); ?>
        
        <!-- Automacoes Header and Global Metrics Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="card-title mb-1">
                        <i class="fas fa-bolt mr-2 text-pink" style="color: #6366f1;"></i>
                        <b>Automações de Negócio & Workflows</b>
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 13px;">Projete gatilhos de eventos, automatize a comunicação com clientes via WhatsApp/E-mail e crie regras de conformidade.</p>
                </div>
                <div class="col-md-6 text-md-right mt-3 mt-md-0">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#novaAutomacao">
                        <i class="fas fa-plus mr-1"></i> Nova Regra de Automação
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Metrics Row -->
        <div class="row mb-4">
            <!-- Metric 1: Active Rules -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(99, 102, 241, 0.08); color: #6366f1; border-radius: 12px;">
                            <i class="fas fa-toggle-on fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Workflows Ativos</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;"><?= $active_rules; ?> Regras</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 2: Total Executions -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(16, 185, 129, 0.08); color: #059669; border-radius: 12px;">
                            <i class="fas fa-cogs fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Execuções de Workflows</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;"><?= $total_executions; ?> Disparos</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 3: API Integration -->
            <div class="col-md-4">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(6, 182, 212, 0.08); color: #0891b2; border-radius: 12px;">
                            <i class="fas fa-network-wired fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Webhooks / APIs Conectadas</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;">4 Ativas</h3>
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
                        <i class="fas fa-code-branch mr-2 text-primary"></i> Motores de Automações Ativas
                    </h6>
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabela_automacoes">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome da Regra</th>
                                    <th scope="col">Gatilho de Evento</th>
                                    <th scope="col">Ação Automatizada</th>
                                    <th scope="col">Execuções</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($automacoes as $a) { ?>
                                    <tr>
                                        <td><span class="font-weight-bold">#<?= $a->idautomacao; ?></span></td>
                                        <td><span class="font-weight-bold text-dark"><?= $a->nome; ?></span></td>
                                        <td>
                                            <span class="badge badge-pill badge-primary" style="background: rgba(99, 102, 241, 0.08) !important; color: #6366f1 !important; border: 1px solid rgba(99, 102, 241, 0.15);"><i class="fas fa-bolt mr-1"></i> <?= $a->gatilho; ?></span>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-info" style="background: rgba(6, 182, 212, 0.08) !important; color: #0891b2 !important; border: 1px solid rgba(6, 182, 212, 0.15);"><i class="fas fa-arrow-right mr-1"></i> <?= $a->acao; ?></span>
                                        </td>
                                        <td><span class="font-weight-bold text-dark"><i class="fas fa-cog fa-spin text-muted mr-1"></i> <?= $a->execucoes; ?> disparos</span></td>
                                        <td>
                                            <?php if ($a->status == 'ATIVO'): ?>
                                                <span class="badge badge-pill badge-success" style="font-size: 10px;">ATIVO</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-secondary" style="font-size: 10px;">INATIVO</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <a href="<?= base_url(); ?>automacoes/alternar_status/<?= $a->idautomacao; ?>" class="btn btn-secondary btn-sm py-1 px-3" style="font-size: 11.5px !important; height: 28px !important;">
                                                <?php if ($a->status == 'ATIVO'): ?>
                                                    <i class="fas fa-power-off mr-1"></i> Desativar
                                                <?php else: ?>
                                                    <i class="fas fa-play mr-1"></i> Ativar
                                                <?php endif; ?>
                                            </a>
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
    
    <!-- Modal Nova Automacao -->
    <div class="modal fade" id="novaAutomacao" tabindex="-1" role="dialog" aria-labelledby="novaAutomacaoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novaAutomacaoTitle"><i class="fas fa-bolt mr-2 text-primary"></i> Criar Nova Regra de Automação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" role="form" action="<?= base_url(); ?>automacoes/adicionar">
                    <div class="modal-body p-4">
                        
                        <div class="form-group">
                            <label for="nome">Nome do Workflow</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Enviar e-mail de onboarding" required>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="gatilho">Gatilho (Quando ocorrer...)</label>
                            <select id="gatilho" class="form-control" name="gatilho" required>
                                <option value="Ao cadastrar novo cliente" selected>Ao cadastrar novo cliente</option>
                                <option value="Ao marcar lead como GANHO">Ao marcar lead como GANHO</option>
                                <option value="Ao finalizar ordem de serviço">Ao finalizar ordem de serviço</option>
                                <option value="Ao registrar fatura em atraso">Ao registrar fatura em atraso</option>
                                <option value="Ao assinar contrato comercial">Ao assinar contrato comercial</option>
                            </select>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="acao">Ação (Disparar automaticamente...)</label>
                            <select id="acao" class="form-control" name="acao" required>
                                <option value="Disparar e-mail com template personalizado" selected>Disparar e-mail com template personalizado</option>
                                <option value="Enviar mensagem no WhatsApp do cliente">Enviar mensagem no WhatsApp do cliente</option>
                                <option value="Enviar log de auditoria ao Compliance">Enviar log de auditoria ao Compliance</option>
                                <option value="Atualizar pipeline comercial no ERP">Atualizar pipeline comercial no ERP</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Ativar Workflow</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#tabela_automacoes')) {
                $('#tabela_automacoes').DataTable({
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
