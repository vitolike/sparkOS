    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link active" href="<?= base_url(); ?>crm/lista"><i class="fas fa-filter"></i> CRM / Funil</a>
            </nav>
        </div>
    </div>
    
    <div role="main" class="container-fluid px-md-5">
        
        <!-- CRM Header and Global Metrics Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="card-title mb-1">
                        <i class="fas fa-filter mr-2 text-pink" style="color: #ec4899;"></i>
                        <b>Funil de Vendas & Oportunidades (CRM)</b>
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 13px;">Monitore e avance suas negociações comerciais por cada estágio do funil.</p>
                </div>
                <div class="col-md-6 text-md-right mt-3 mt-md-0">
                    <div class="d-inline-flex align-items-center mr-4 text-left">
                        <div class="mr-3">
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Valor do Pipeline</span>
                            <h4 class="font-weight-bold text-success mb-0" style="font-size: 20px;">R$ <?= number_format((float)$pipeline_value, 2, ',', '.'); ?></h4>
                        </div>
                        <div class="border-left pl-3" style="border-color: var(--border-color) !important;">
                            <span class="text-muted uppercase d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">Negócios Ativos</span>
                            <h4 class="font-weight-bold text-indigo mb-0" style="font-size: 20px; color: var(--primary-color);"><?= $active_leads; ?></h4>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#novaOportunidade">
                        <i class="fas fa-plus mr-1"></i> Nova Oportunidade
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Filter leads by stage -->
        <?php
        $contato_leads = array_filter($leads, function($l) { return $l->estagio == 'CONTATO'; });
        $qualificacao_leads = array_filter($leads, function($l) { return $l->estagio == 'QUALIFICACAO'; });
        $proposta_leads = array_filter($leads, function($l) { return $l->estagio == 'PROPOSTA'; });
        $negociacao_leads = array_filter($leads, function($l) { return $l->estagio == 'NEGOCIACAO'; });
        $fechado_leads = array_filter($leads, function($l) { return $l->estagio == 'FECHADO'; });
        ?>
        
        <!-- Kanban Funnel Board Row -->
        <div class="row mt-4" style="min-height: 500px; overflow-x: auto; flex-wrap: nowrap; padding-bottom: 20px;">
            
            <!-- Column 1: Contato Inicial -->
            <div class="col-md-2" style="min-width: 250px; flex: 1;">
                <div class="p-3 rounded-lg mb-3" style="background-color: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 12px;">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold" style="font-size: 13px; color: var(--text-main);"><i class="fas fa-bullhorn text-muted mr-1"></i> CONTATO INICIAL</span>
                        <span class="badge badge-pill badge-secondary text-dark font-weight-bold" style="background: #cbd5e1;"><?= count($contato_leads); ?></span>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3" style="gap: 12px;">
                    <?php if (empty($contato_leads)): ?>
                        <div class="text-center py-4 border rounded" style="border-style: dashed !important; border-color: #cbd5e1 !important; border-radius: 12px; background: white;">
                            <span class="text-muted" style="font-size: 12px;">Vazio</span>
                        </div>
                    <?php else: ?>
                        <?php foreach($contato_leads as $l): ?>
                            <?php $this->load->view('app/crm/card_lead', array('l' => $l)); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Column 2: Qualificação -->
            <div class="col-md-2" style="min-width: 250px; flex: 1;">
                <div class="p-3 rounded-lg mb-3" style="background-color: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 12px;">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold" style="font-size: 13px; color: var(--text-main);"><i class="fas fa-search-dollar text-muted mr-1"></i> QUALIFICAÇÃO</span>
                        <span class="badge badge-pill badge-secondary text-dark font-weight-bold" style="background: #cbd5e1;"><?= count($qualificacao_leads); ?></span>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3" style="gap: 12px;">
                    <?php if (empty($qualificacao_leads)): ?>
                        <div class="text-center py-4 border rounded" style="border-style: dashed !important; border-color: #cbd5e1 !important; border-radius: 12px; background: white;">
                            <span class="text-muted" style="font-size: 12px;">Vazio</span>
                        </div>
                    <?php else: ?>
                        <?php foreach($qualificacao_leads as $l): ?>
                            <?php $this->load->view('app/crm/card_lead', array('l' => $l)); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Column 3: Proposta -->
            <div class="col-md-2" style="min-width: 250px; flex: 1;">
                <div class="p-3 rounded-lg mb-3" style="background-color: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 12px;">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold" style="font-size: 13px; color: var(--text-main);"><i class="fas fa-file-contract text-muted mr-1"></i> PROPOSTA</span>
                        <span class="badge badge-pill badge-secondary text-dark font-weight-bold" style="background: #cbd5e1;"><?= count($proposta_leads); ?></span>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3" style="gap: 12px;">
                    <?php if (empty($proposta_leads)): ?>
                        <div class="text-center py-4 border rounded" style="border-style: dashed !important; border-color: #cbd5e1 !important; border-radius: 12px; background: white;">
                            <span class="text-muted" style="font-size: 12px;">Vazio</span>
                        </div>
                    <?php else: ?>
                        <?php foreach($proposta_leads as $l): ?>
                            <?php $this->load->view('app/crm/card_lead', array('l' => $l)); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Column 4: Negociação -->
            <div class="col-md-2" style="min-width: 250px; flex: 1;">
                <div class="p-3 rounded-lg mb-3" style="background-color: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 12px;">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold" style="font-size: 13px; color: var(--text-main);"><i class="fas fa-handshake text-muted mr-1"></i> NEGOCIAÇÃO</span>
                        <span class="badge badge-pill badge-secondary text-dark font-weight-bold" style="background: #cbd5e1;"><?= count($negociacao_leads); ?></span>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3" style="gap: 12px;">
                    <?php if (empty($negociacao_leads)): ?>
                        <div class="text-center py-4 border rounded" style="border-style: dashed !important; border-color: #cbd5e1 !important; border-radius: 12px; background: white;">
                            <span class="text-muted" style="font-size: 12px;">Vazio</span>
                        </div>
                    <?php else: ?>
                        <?php foreach($negociacao_leads as $l): ?>
                            <?php $this->load->view('app/crm/card_lead', array('l' => $l)); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Column 5: Fechado -->
            <div class="col-md-2" style="min-width: 250px; flex: 1;">
                <div class="p-3 rounded-lg mb-3" style="background-color: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 12px;">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold" style="font-size: 13px; color: var(--text-main);"><i class="fas fa-check-circle text-muted mr-1"></i> FECHADO</span>
                        <span class="badge badge-pill badge-secondary text-dark font-weight-bold" style="background: #cbd5e1;"><?= count($fechado_leads); ?></span>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3" style="gap: 12px;">
                    <?php if (empty($fechado_leads)): ?>
                        <div class="text-center py-4 border rounded" style="border-style: dashed !important; border-color: #cbd5e1 !important; border-radius: 12px; background: white;">
                            <span class="text-muted" style="font-size: 12px;">Vazio</span>
                        </div>
                    <?php else: ?>
                        <?php foreach($fechado_leads as $l): ?>
                            <?php $this->load->view('app/crm/card_lead', array('l' => $l)); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- Modal Criar Nova Oportunidade -->
    <div class="modal fade" id="novaOportunidade" tabindex="-1" role="dialog" aria-labelledby="novaOportunidadeTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novaOportunidadeTitle"><i class="fas fa-filter mr-2 text-primary"></i> Nova Oportunidade Comercial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" role="form" action="<?= base_url(); ?>crm/adicionar">
                    <div class="modal-body p-4">
                        
                        <div class="form-group">
                            <label for="titulo">Título do Negócio</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ex: Contrato Anual de Suporte, Implantação de Servidor..." required>
                        </div>
                        
                        <div class="form-row mt-3">
                            <!-- Cliente lookup field -->
                            <div class="form-group col-md-12">
                                <label for="nome_cliente">Cliente</label>
                                <div class="input-group">
                                    <input type="hidden" id="cliente" name="cliente" required>
                                    <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" readonly placeholder="Clique em Procurar para selecionar..." required style="background-color: #f8fafc !important; cursor: pointer;" data-toggle="modal" data-target="#procurarClientes">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#procurarClientes">
                                            <i class="fas fa-search mr-1"></i> Procurar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row mt-3">
                            <div class="form-group col-md-4">
                                <label for="valor">Valor do Negócio (R$)</label>
                                <input type="number" step="0.01" class="form-control" id="valor" name="valor" placeholder="0.00" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="estagio">Estágio Inicial</label>
                                <select id="estagio" class="form-control" name="estagio" required>
                                    <option value="CONTATO" selected>Contato Inicial</option>
                                    <option value="QUALIFICACAO">Qualificação</option>
                                    <option value="PROPOSTA">Proposta</option>
                                    <option value="NEGOCIACAO">Negociação</option>
                                    <option value="FECHADO">Fechado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="data_proximo_contato">Próximo Contato</label>
                                <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" id="data_proximo_contato" name="data_proximo_contato" placeholder="Selecione data...">
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="descricao">Detalhes / Escopo Inicial</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Resuma o escopo do projeto, exigências ou observações primárias..."></textarea>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar Oportunidade</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal Procurar Clientes para CRM -->
    <div class="modal fade" id="procurarClientes" tabindex="-1" role="dialog" aria-labelledby="procurarClientesTitle" aria-hidden="true" style="z-index: 10060;">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="procurarClientesTitle"><i class="fas fa-user-friends mr-2 text-primary"></i> Selecionar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover" id="clientes">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col" class="text-right">Ação</th>
                                </tr>
                            </thead>
                            <?php if(!$clientes){ ?>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center py-4">Nenhum cliente cadastrado no sistema.</td>
                                    </tr>
                                </tbody>
                            <?php } else { ?>
                                <tbody>
                                    <?php foreach($clientes as $c) { ?>
                                        <tr id="<?= $c->clientesid; ?>">  
                                            <td class="font-weight-bold"><?= $c->nome; ?> <?= $c->sobrenome; ?></td>
                                            <td><span class="badge badge-pill badge-warning"><?= $c->tipo_documento; ?></span> <code><?= $c->documento; ?></code></td>
                                            <td><?= $c->telefone; ?></td>
                                            <td><?= $c->cidade; ?> - <?= $c->uf; ?></td>
                                            <td class="text-right">
                                                <button type="button" class="btn btn-success btn-sm btn-select-cliente py-1 px-3" value="<?= $c->clientesid; ?>" data-dismiss="modal">
                                                    <i class="fas fa-check-square mr-1"></i> Selecionar
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Modal sub-level nesting focus corrections
        $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });

        $(".btn-select-cliente").on('click', function(){
            var id = this.value;
            document.getElementById('cliente').value = id;
            $.ajax({
                url: '<?php echo site_url('clientes/buscar/')?>'+id,
                dataType: 'json',
                success: function(resposta){
                    $("#nome_cliente").val(resposta.nome+' '+resposta.sobrenome);
                }
            });
        });

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

        if (!$.fn.DataTable.isDataTable( '#clientes' )) {
            $('#clientes').dataTable({
                "dom": 'Bfrtip',
                "info": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            });
        }
    </script>
