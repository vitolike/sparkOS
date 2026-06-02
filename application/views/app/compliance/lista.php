    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link active" href="<?= base_url(); ?>compliance/lista"><i class="fas fa-shield-alt"></i> Compliance & Riscos</a>
            </nav>
        </div>
    </div>
    
    <div role="main" class="container-fluid px-md-5">
        
        <?php $this->load->view('layout/notifications', ['notify_view' => 'compliance']); ?>
        
        <!-- CRM Header and Global Metrics Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="card-title mb-1">
                        <i class="fas fa-shield-alt mr-2 text-pink" style="color: #ec4899;"></i>
                        <b>Conformidade de Conformidade, Segurança e Riscos (CRM)</b>
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 13px;">Monitore incidentes de conformidade, auditorias internas e scores de riscos de acessos de usuários.</p>
                </div>
                <div class="col-md-6 text-md-right mt-3 mt-md-0">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#novaAuditoria">
                        <i class="fas fa-plus mr-1"></i> Nova Auditoria / Incidente
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Metrics Row -->
        <div class="row mb-4">
            <!-- Metric 1: Risco Medio -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: <?= $avg_risk > 50 ? 'rgba(239, 68, 68, 0.08)' : ($avg_risk > 30 ? 'rgba(245, 158, 11, 0.08)' : 'rgba(16, 185, 129, 0.08)'); ?>; color: <?= $avg_risk > 50 ? '#dc2626' : ($avg_risk > 30 ? '#d97706' : '#059669'); ?>; border-radius: 12px;">
                            <i class="fas fa-tachometer-alt fa-lg"></i>
                        </div>
                        <div class="w-100">
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Índice Global de Risco</span>
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="font-weight-bold mb-0" style="font-size: 22px; color: <?= $avg_risk > 50 ? '#dc2626' : ($avg_risk > 30 ? '#d97706' : '#059669'); ?>;"><?= $avg_risk; ?>%</h3>
                                <span class="badge badge-pill font-weight-bold" style="font-size: 9px; background: <?= $avg_risk > 50 ? 'rgba(239, 68, 68, 0.1)' : ($avg_risk > 30 ? 'rgba(245, 158, 11, 0.1)' : 'rgba(16, 185, 129, 0.1)'); ?>; color: <?= $avg_risk > 50 ? '#dc2626' : ($avg_risk > 30 ? '#d97706' : '#059669'); ?>;">
                                    <?= $avg_risk > 50 ? 'ALTO' : ($avg_risk > 30 ? 'MODERADO' : 'SEGURO'); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 2: Incidentes Pendentes -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(239, 68, 68, 0.08); color: var(--danger-color); border-radius: 12px;">
                            <i class="fas fa-exclamation-circle fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Incidentes Pendentes</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;"><?= $pending_audits; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Metric 3: Total Verificações -->
            <div class="col-md-4">
                <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white !important;">
                    <div class="d-flex align-items-center w-100">
                        <div class="p-3 rounded-lg mr-3" style="background: rgba(99, 102, 241, 0.08); color: var(--primary-color); border-radius: 12px;">
                            <i class="fas fa-clipboard-check fa-lg"></i>
                        </div>
                        <div>
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Auditorias Registradas</span>
                            <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 22px;"><?= count($audits); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Left Column: User Risks List (col-md-5) -->
            <div class="col-md-5 mb-4">
                <div class="p-4 rounded box-shadow h-100" style="background: white !important;">
                    <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                        <i class="fas fa-user-shield mr-2 text-primary"></i> Score de Riscos de Acesso de Usuários
                    </h6>
                    <p class="text-muted mb-4" style="font-size: 12.5px;">Abaixo estão os operadores ativos do sistema e seus níveis individuais de risco calculado.</p>
                    
                    <div class="d-flex flex-column" style="gap: 20px;">
                        <?php foreach($risks as $r) { ?>
                            <div class="p-3 rounded-lg border" style="border-radius: 12px; border-color: #e2e8f0 !important;">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div>
                                        <span class="font-weight-bold text-dark d-block" style="font-size: 13.5px;"><?= $r->nome_usuario; ?></span>
                                        <span class="text-muted" style="font-size: 11px;"><?= $r->email_usuario; ?></span>
                                    </div>
                                    <span class="font-weight-bold" style="font-size: 16px; color: <?= $r->nivel_risco > 50 ? '#dc2626' : ($r->nivel_risco > 30 ? '#d97706' : '#059669'); ?>;">
                                        <?= $r->nivel_risco; ?>% Risco
                                    </span>
                                </div>
                                
                                <!-- Risk Progress Bar -->
                                <div class="progress mb-3" style="height: 8px; border-radius: 30px; background: #e2e8f0;">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $r->nivel_risco; ?>%; border-radius: 30px; background-color: <?= $r->nivel_risco > 50 ? '#dc2626' : ($r->nivel_risco > 30 ? '#d97706' : '#059669'); ?>;"></div>
                                </div>
                                
                                <div class="text-muted border-top pt-2 mt-2" style="font-size: 12px; border-color: #f1f5f9 !important;">
                                    <strong>Último Evento:</strong> <?= $r->motivo_risco; ?>
                                    <span class="d-block text-right mt-1" style="font-size: 10px; opacity: 0.8;"><i class="far fa-clock mr-1"></i><?= date('d/m/Y H:i', strtotime($r->ultimo_evento)); ?></span>
                                </div>
                                
                                <div class="mt-3 text-right">
                                    <button class="btn btn-secondary btn-sm py-1 px-2 btn-recalc" data-toggle="modal" data-target="#modalRecalcRisk" data-admin="<?= $r->admin_id; ?>" data-nome="<?= $r->nome_usuario; ?>" data-risco="<?= $r->nivel_risco; ?>" data-motivo="<?= $r->motivo_risco; ?>" style="font-size: 11.5px !important; height: 28px !important; line-height: 1 !important;">
                                        <i class="fas fa-calculator mr-1"></i> Reajustar Risco
                                    </button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
            <!-- Right Column: Compliance Audits Log (col-md-7) -->
            <div class="col-md-7 mb-4">
                <div class="p-4 rounded box-shadow h-100" style="background: white !important;">
                    <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                        <i class="fas fa-clipboard-check mr-2 text-primary"></i> Incidentes e Auditoria de Conformidade
                    </h6>
                    <p class="text-muted mb-4" style="font-size: 12.5px;">Registro de conformidade de infraestrutura, segurança de dados e acessos de segurança.</p>
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabela_compliance">
                            <thead>
                                <tr>
                                    <th scope="col">Componente</th>
                                    <th scope="col">Severidade</th>
                                    <th scope="col">Responsável</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($audits as $a) { ?>
                                    <tr id="audit-<?= $a->idauditoria; ?>">
                                        <td class="font-weight-bold">
                                            <?= $a->componente; ?>
                                            <span class="d-block text-muted" style="font-size: 11.5px; font-weight: normal; margin-top: 4px;"><?= $a->descricao; ?></span>
                                            <span class="d-block text-muted" style="font-size: 10px; font-weight: normal; opacity: 0.8; margin-top: 2px;"><i class="far fa-clock mr-1"></i><?= date('d/m/Y H:i', strtotime($a->data_registro)); ?></span>
                                        </td>
                                        <td>
                                            <?php if ($a->severidade == 'CRÍTICO'): ?>
                                                <span class="badge badge-pill badge-danger">CRÍTICO</span>
                                            <?php elseif ($a->severidade == 'MÉDIO'): ?>
                                                <span class="badge badge-pill badge-warning" style="background: rgba(245, 158, 11, 0.08) !important; color: #d97706 !important; border: 1px solid rgba(245, 158, 11, 0.15);">MÉDIO</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-success" style="background: rgba(99, 102, 241, 0.08) !important; color: var(--primary-color) !important; border: 1px solid rgba(99, 102, 241, 0.15);">BAIXO</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><span class="text-muted" style="font-size: 12.5px; font-weight: 500;"><?= $a->responsavel; ?></span></td>
                                        <td>
                                            <?php if ($a->status == 'PENDENTE'): ?>
                                                <span class="badge badge-pill badge-warning" style="font-size: 10px;">PENDENTE</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-success" style="font-size: 10px;">RESOLVIDO</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <?php if ($a->status == 'PENDENTE'): ?>
                                                <a href="<?= base_url(); ?>compliance/resolver_auditoria/<?= $a->idauditoria; ?>" class="btn btn-success btn-sm py-1 px-3">
                                                    <i class="fas fa-check mr-1"></i> Resolver
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted" style="font-size: 12px; font-weight: 500;"><i class="fas fa-check-double text-success mr-1"></i> Ok</span>
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
    
    <!-- Modal Registrar Nova Auditoria/Incidente -->
    <div class="modal fade" id="novaAuditoria" tabindex="-1" role="dialog" aria-labelledby="novaAuditoriaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novaAuditoriaTitle"><i class="fas fa-shield-alt mr-2 text-primary"></i> Registrar Evento de Conformidade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" role="form" action="<?= base_url(); ?>compliance/add_auditoria">
                    <div class="modal-body p-4">
                        
                        <div class="form-group">
                            <label for="componente">Componente / Infraestrutura</label>
                            <select id="componente" class="form-control" name="componente" required>
                                <option value="Autenticação" selected>Segurança & Autenticação</option>
                                <option value="Políticas de Senha">Políticas de Senha & Credenciais</option>
                                <option value="Backup & Integridade">Backup de Banco de Dados & Sincronia</option>
                                <option value="Permissões de Acesso">Acessos Comerciais & Privilégios</option>
                                <option value="Conformidade LGPD">Conformidade Legal & Privacidade (LGPD)</option>
                            </select>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="severidade">Nível de Severidade</label>
                            <select id="severidade" class="form-control" name="severidade" required>
                                <option value="BAIXO">Baixo (Conformidade padrão/Informacional)</option>
                                <option value="MÉDIO" selected>Médio (Risco preventivo/Aviso de conformidade)</option>
                                <option value="CRÍTICO">Crítico (Tentativa de acesso ilegal/Incidente)</option>
                            </select>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="descricao">Detalhes da Auditoria / Ocorrência</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="4" placeholder="Descreva de forma detalhada o incidente de segurança, alteração ou conformidade técnica constatada..." required></textarea>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar Evento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal Reajustar Risco do Usuário -->
    <div class="modal fade" id="modalRecalcRisk" tabindex="-1" role="dialog" aria-labelledby="recalcRiskTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recalcRiskTitle"><i class="fas fa-calculator mr-2 text-primary"></i> Reajustar Score de Risco</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" role="form" action="<?= base_url(); ?>compliance/recalcular_risco">
                    <input type="hidden" id="recalc_admin_id" name="admin_id">
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label>Operador Selecionado</label>
                            <input type="text" class="form-control" id="recalc_nome" readonly style="background-color: #f8fafc !important;">
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="nivel_risco">Novo Nível de Risco (%)</label>
                            <input type="number" min="0" max="100" class="form-control" id="nivel_risco" name="nivel_risco" placeholder="15" required>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="motivo_risco">Justificativa do Reajuste</label>
                            <input type="text" class="form-control" id="motivo_risco" name="motivo_risco" placeholder="Ex: Auditoria operacional concluída. Score redefinido." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Atualizar Score</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        // Modal input prefill bindings
        $(document).on('click', '.btn-recalc', function () {
            var adminId = $(this).data('admin');
            var nome = $(this).data('nome');
            var risco = $(this).data('risco');
            var motivo = $(this).data('motivo');
            
            $("#recalc_admin_id").val(adminId);
            $("#recalc_nome").val(nome);
            $("#nivel_risco").val(risco);
            $("#motivo_risco").val(motivo);
        });

        if (!$.fn.DataTable.isDataTable('#tabela_compliance')) {
            $('#tabela_compliance').DataTable({
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
    </script>
