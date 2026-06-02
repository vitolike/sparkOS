    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link active" href="<?= base_url(); ?>crm/lista"><i class="fas fa-filter"></i> CRM / Funil</a>
                <a class="nav-link" onclick="history.back()"><i class="fas fa-arrow-left"></i> Voltar</a>
            </nav>
        </div>
    </div>
    
    <main role="main" class="container-fluid px-md-5">
        
        <!-- Metrics and Lead Info Top Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="card-title mb-1">
                        <i class="fas fa-filter mr-2 text-pink" style="color: #ec4899;"></i>
                        <b>Oportunidade Comercial: <?= $lead->titulo; ?></b>
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 13px;">
                        Cliente: <span class="font-weight-bold text-dark"><?= $lead->nome_cliente; ?> <?= $lead->sobrenome_cliente; ?></span> 
                        | Criado em: <span class="font-weight-bold text-dark"><?= date('d/m/Y H:i', strtotime($lead->criado_em)); ?></span>
                    </p>
                </div>
                <div class="col-md-4 text-md-right mt-3 mt-md-0">
                    <span class="text-muted uppercase mr-2" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Status Atual</span>
                    <?php if ($lead->status == 'GANHO'): ?>
                        <span class="badge badge-pill badge-success py-2 px-3" style="font-size: 11px;">GANHO (SUCESSO)</span>
                    <?php elseif ($lead->status == 'PERDIDO'): ?>
                        <span class="badge badge-pill badge-danger py-2 px-3" style="font-size: 11px;">PERDIDO</span>
                    <?php else: ?>
                        <span class="badge badge-pill badge-warning py-2 px-3" style="font-size: 11px;">EM ABERTO</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            
            <!-- Left Column: Deal progression and fields (col-md-5) -->
            <div class="col-md-5 mb-4">
                
                <!-- Card 1: Progresso e Estágio -->
                <div class="p-4 rounded box-shadow mb-4">
                    <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                        <i class="fas fa-tasks mr-2 text-primary"></i> Progresso no Funil
                    </h6>
                    
                    <form method="post" role="form" action="<?= base_url(); ?>crm/atualizar_status_estagio">
                        <input type="hidden" name="idcrm" value="<?= $lead->idcrm; ?>">
                        
                        <div class="form-group">
                            <label for="estagio">Estágio do Funil</label>
                            <select id="estagio" class="form-control" name="estagio" required>
                                <option value="CONTATO" <?= $lead->estagio == 'CONTATO' ? 'selected' : ''; ?>>Contato Inicial</option>
                                <option value="QUALIFICACAO" <?= $lead->estagio == 'QUALIFICACAO' ? 'selected' : ''; ?>>Qualificação</option>
                                <option value="PROPOSTA" <?= $lead->estagio == 'PROPOSTA' ? 'selected' : ''; ?>>Proposta</option>
                                <option value="NEGOCIACAO" <?= $lead->estagio == 'NEGOCIACAO' ? 'selected' : ''; ?>>Negociação</option>
                                <option value="FECHADO" <?= $lead->estagio == 'FECHADO' ? 'selected' : ''; ?>>Fechado</option>
                            </select>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="status">Resultado do Negócio</label>
                            <select id="status" class="form-control" name="status" required>
                                <option value="ABERTO" <?= $lead->status == 'ABERTO' ? 'selected' : ''; ?>>Em Aberto (Negociando)</option>
                                <option value="GANHO" <?= $lead->status == 'GANHO' ? 'selected' : ''; ?>>Ganho (Contrato Fechado!)</option>
                                <option value="PERDIDO" <?= $lead->status == 'PERDIDO' ? 'selected' : ''; ?>>Perdido (Negócio Cancelado)</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block mt-4 py-2 font-weight-bold">
                            <i class="fas fa-save mr-1"></i> Atualizar Progresso
                        </button>
                    </form>
                </div>
                
                <!-- Card 2: Dados Comerciais -->
                <div class="p-4 rounded box-shadow">
                    <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                        <i class="fas fa-file-invoice-dollar mr-2 text-primary"></i> Informações Comerciais
                    </h6>
                    
                    <form method="post" role="form" action="<?= base_url(); ?>crm/atualizar">
                        <input type="hidden" name="idcrm" value="<?= $lead->idcrm; ?>">
                        
                        <div class="form-group">
                            <label for="titulo">Título do Negócio</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $lead->titulo; ?>" required>
                        </div>
                        
                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <label for="valor">Valor do Negócio (R$)</label>
                                <input type="number" step="0.01" class="form-control" id="valor" name="valor" value="<?= $lead->valor; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data_proximo_contato">Próximo Contato</label>
                                <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" id="data_proximo_contato" name="data_proximo_contato" value="<?= $lead->data_proximo_contato; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="descricao">Escopo / Descrição Geral</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="4" placeholder="Explicar o projeto..."><?= $lead->descricao; ?></textarea>
                        </div>
                        
                        <div class="mt-4 pt-2 border-top" style="border-color: #f1f5f9 !important;">
                            <label class="uppercase d-block mb-1" style="font-size: 10px; font-weight: 600;">Dados de Contato do Cliente</label>
                            <div class="text-muted" style="font-size: 13px; line-height: 1.6;">
                                <div><i class="far fa-envelope mr-2"></i><?= $lead->email_cliente ?: 'Sem e-mail'; ?></div>
                                <div><i class="fas fa-phone mr-2"></i><?= $lead->telefone_cliente ?: 'Sem telefone'; ?></div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-secondary btn-block mt-4 py-2 font-weight-bold" style="background: white !important; border: 1px solid #cbd5e1 !important; color: var(--text-main) !important;">
                            <i class="fas fa-edit mr-1"></i> Salvar Detalhes
                        </button>
                    </form>
                </div>
                
            </div>
            
            <!-- Right Column: Timeline Interativa (col-md-7) -->
            <div class="col-md-7 mb-4">
                <div class="p-4 rounded box-shadow" style="background: white !important;">
                    <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                        <i class="fas fa-history mr-2 text-primary"></i> Linha do Tempo e Acompanhamento (Timeline)
                    </h6>
                    
                    <!-- Form to add follow-up interaction -->
                    <form method="post" role="form" action="<?= base_url(); ?>crm/add_interacao" class="p-3 mb-4 rounded-lg" style="background-color: #f8fafc; border: 1px solid #cbd5e1; border-radius: 12px;">
                        <input type="hidden" name="crm_id" value="<?= $lead->idcrm; ?>">
                        <span class="font-weight-bold d-block mb-3" style="font-size: 12px; color: var(--text-main);"><i class="fas fa-comment-medical mr-1 text-primary"></i> REGISTRAR NOVA INTERAÇÃO</span>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tipo">Meio / Tipo</label>
                                <select id="tipo" class="form-control py-1" name="tipo" required style="height: 38px !important; font-size: 13px !important; padding: 6px 12px !important;">
                                    <option value="Nota" selected>Nota / Observação</option>
                                    <option value="Telefone">Ligação Telefônica</option>
                                    <option value="E-mail">E-mail Enviado</option>
                                    <option value="Reunião">Reunião / Conversa</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="interacao_desc">Notas da Interação</label>
                                <input type="text" class="form-control" id="interacao_desc" name="descricao" placeholder="O que foi conversado ou observado..." required style="height: 38px !important; font-size: 13px !important;">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary py-1 px-3" style="font-size: 12px !important; height: 32px !important; line-height: 1 !important; padding-top: 0 !important; padding-bottom: 0 !important;">
                                Registrar Contato
                            </button>
                        </div>
                    </form>
                    
                    <!-- Activity Stream Timeline -->
                    <div class="timeline mt-4" style="position: relative; padding-left: 24px; border-left: 2px solid #e2e8f0; margin-left: 12px;">
                        
                        <?php if (empty($interacoes)): ?>
                            <div class="text-center py-4">
                                <p class="text-muted mb-0" style="font-size: 13px;">Nenhuma interação registrada ainda.</p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($interacoes as $i): ?>
                                <div class="timeline-item mb-4" style="position: relative;">
                                    <!-- Timeline Node bullet and icon -->
                                    <span class="timeline-badge d-flex align-items-center justify-content-center" style="position: absolute; left: -36px; top: 0; width: 24px; height: 24px; border-radius: 50%; background: white; border: 2px solid var(--primary-color); z-index: 2; font-size: 11px; color: var(--primary-color);">
                                        <?php if ($i->tipo == 'Telefone'): ?>
                                            <i class="fas fa-phone-alt" style="font-size: 9px;"></i>
                                        <?php elseif ($i->tipo == 'E-mail'): ?>
                                            <i class="far fa-envelope" style="font-size: 9px;"></i>
                                        <?php elseif ($i->tipo == 'Reunião'): ?>
                                            <i class="fas fa-users" style="font-size: 9px;"></i>
                                        <?php else: ?>
                                            <i class="far fa-comment" style="font-size: 9px;"></i>
                                        <?php endif; ?>
                                    </span>
                                    
                                    <!-- Interaction bubble card -->
                                    <div class="p-3 border rounded shadow-none" style="border-radius: 12px; border-color: #e2e8f0 !important; background: white;">
                                        <div class="d-flex align-items-center justify-content-between mb-2 pb-1 border-bottom" style="border-color: #f1f5f9 !important;">
                                            <span class="badge badge-pill badge-warning" style="font-size: 10px; background: rgba(99, 102, 241, 0.08) !important; color: var(--primary-color) !important; border: 1px solid rgba(99, 102, 241, 0.15);"><?= $i->tipo; ?></span>
                                            <span class="text-muted" style="font-size: 11px;">
                                                <i class="far fa-clock mr-1"></i><?= date('d/m/Y H:i', strtotime($i->data_interacao)); ?> 
                                                | <i class="far fa-user ml-1 mr-1"></i><?= $i->usuario; ?>
                                            </span>
                                        </div>
                                        <p class="mb-0 text-dark" style="font-size: 13px; line-height: 1.5; font-weight: 400;">
                                            <?= $i->descricao; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
    </main>
    
    <script>
        $(function() {
            $( "#data_proximo_contato" ).datepicker({
                dateFormat: 'yy/mm/dd',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
            });
        });
    </script>
