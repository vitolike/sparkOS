    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link active" onclick="history.back()"><i class="fas fa-arrow-left"></i> Voltar</a>
            </nav>
        </div>
    </div>
    
    <div role="main" class="container">
        
        <!-- Main Form Container -->
        <div class="my-3 p-4 rounded box-shadow">
            <h5 class="card-title">
                <i class="fas fa-plus-circle mr-2 text-pink" style="color: #ec4899;"></i>
                <b>Abertura de Ordem de Serviço</b>
            </h5>
            <p class="text-muted mb-4" style="font-size: 13px;">Preencha os dados do cliente, técnico responsável e as descrições técnicas da OS.</p>
            
            <form method="post" role="form" action="<?= base_url(); ?>os/adicionar">
                
                <!-- Section 1: Cliente & Responsavel -->
                <div class="form-row">
                    <!-- Cliente lookup field -->
                    <div class="form-group col-md-6">
                        <label for="nome_cliente">Cliente</label>
                        <div class="input-group">
                            <input type="hidden" id="cliente" name="cliente">
                            <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" readonly placeholder="Clique em Procurar..." required style="background-color: #f8fafc !important; cursor: pointer;" data-toggle="modal" data-target="#procurarClientes">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#procurarClientes">
                                    <i class="fas fa-search mr-1"></i> Procurar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Técnico lookup field -->
                    <div class="form-group col-md-6">
                        <label for="nome_tecnico">Técnico / Responsável</label>
                        <div class="input-group">
                            <input type="hidden" id="tecnico" name="tecnico" required>
                            <input type="text" class="form-control" id="nome_tecnico" name="nome_tecnico" readonly placeholder="Clique em Procurar..." required style="background-color: #f8fafc !important; cursor: pointer;" data-toggle="modal" data-target="#procurarTecnico">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#procurarTecnico">
                                    <i class="fas fa-search mr-1"></i> Procurar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Section 2: Status, Datas, Garantia -->
                <div class="form-row mt-3">
                    <div class="form-group col-md-3">
                        <label for="inputState">Status da OS</label>
                        <select id="inputState" class="form-control" name="status" required>
                            <option value="" selected>Escolha...</option>
                            <option value="ORÇAMENTO">Orçamento</option>
                            <option value="ABERTO">Aberto</option>
                            <option value="EM ANDAMENTO">Em Andamento</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data_inicial">Data Inicial</label>
                        <input type="text" class="form-control" data-provide="datepicker" value="<?= date('Y-m-d') ?>" data-date-format="DD-MM-YYYY" id="data_inicial" name="data_inicial" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data_final">Data de Entrega / Final</label>
                        <input type="text" class="form-control" data-provide="datepicker" data-date-format="DD-MM-YYYY" id="data_final" name="data_final" required>
                    </div>
                    
                    <!-- Garantia input with quick pill selectors -->
                    <div class="form-group col-md-3">
                        <label for="garantia">Garantia (Dias)</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="garantia" name="garantia" max="999" placeholder="0" maxlength="3">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary py-2 px-3" value="15" id="btn_garantia" style="font-size: 12px; font-weight: 600;">15d</button>
                                <button type="button" class="btn btn-secondary py-2 px-3" value="30" id="btn_garantia1" style="font-size: 12px; font-weight: 600;">30d</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Section 3: Descricao e Defeitos -->
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="descricao">Descrição do Produto ou Serviço</label>
                        <textarea class="form-control" name="descricao" rows="4" placeholder="Descreva o equipamento ou escopo do serviço..." required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="defeito">Defeito Reclamado / Constatado</label>
                        <textarea class="form-control" name="defeito" rows="4" placeholder="Sintomas informados pelo cliente..." required></textarea>
                    </div>
                </div>
                
                <!-- Section 4: Obs e Laudo -->
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="observacoes">Observações Gerais</label>
                        <textarea class="form-control" name="observacoes" rows="4" placeholder="Observações internas importantes..." required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="laudo_tecnico">Laudo Técnico Preliminar</label>
                        <textarea class="form-control" name="laudo_tecnico" rows="4" placeholder="Diagnóstico do especialista ou laudo preliminar..." required></textarea>
                    </div>
                </div>
                
                <!-- Submit Action Block -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary btn-block py-3 font-weight-bold" style="font-size: 16px; letter-spacing: 0.5px;">
                        Avançar e Continuar <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
		
    <!-- Modal Procurar Clientes -->
    <div class="modal fade" id="procurarClientes" tabindex="-1" role="dialog" aria-labelledby="procurarClientesTitle" aria-hidden="true">
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
                            <?php if(!$query){ ?>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center py-4">Nenhum cliente cadastrado no sistema.</td>
                                    </tr>
                                </tbody>
                            <?php } else { ?>
                                <tbody>
                                    <?php foreach($query as $prop) { ?>
                                        <tr id="<?= $prop->clientesid; ?>">  
                                            <td class="font-weight-bold"><?= $prop->nome; ?> <?= $prop->sobrenome; ?></td>
                                            <td><span class="badge badge-pill badge-warning"><?= $prop->tipo_documento; ?></span> <code><?= $prop->documento; ?></code></td>
                                            <td><?= $prop->telefone; ?></td>
                                            <td><?= $prop->cidade; ?> - <?= $prop->uf; ?></td>
                                            <td class="text-right">
                                                <button type="button" class="btn btn-success btn-sm btn-select-cliente py-1 px-3" value="<?= $prop->clientesid; ?>" data-dismiss="modal">
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
		
    <!-- Modal Procurar Técnicos -->
    <div class="modal fade" id="procurarTecnico" tabindex="-1" role="dialog" aria-labelledby="procurarTecnicoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="procurarTecnicoTitle"><i class="fas fa-user-cog mr-2 text-primary"></i> Selecionar Técnico / Responsável</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover" id="tecnicos">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-right">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($admins as $a) { ?>
                                    <tr id="<?= $a->adminid; ?>">   
                                        <td class="font-weight-bold"><?= $a->nome; ?></td>
                                        <td><?= $a->telefone; ?></td>
                                        <td><?= $a->email; ?></td>
                                        <td>
                                            <?php if ($a->status == 1): ?>
                                                <span class="badge badge-pill badge-danger">Desativado</span>
                                            <?php elseif ($a->status == 3): ?>
                                                <span class="badge badge-pill badge-danger">Bloqueado</span>
                                            <?php elseif($a->status == 2): ?>
                                                <span class="badge badge-pill badge-success">Ativo</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <button type="button" class="btn btn-success btn-sm btn-select-admin py-1 px-3" value="<?= $a->adminid; ?>" data-dismiss="modal">
                                                <i class="fas fa-check-square mr-1"></i> Selecionar
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
	
    <!-- Actions and Scripts -->
    <script>
        document.getElementById('btn_garantia').addEventListener('click', function(){
            document.getElementById('garantia').value = this.value;
        });
        document.getElementById('btn_garantia1').addEventListener('click', function(){
            document.getElementById('garantia').value = this.value;
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

        $(".btn-select-admin").on('click', function(){
            var id = this.value;
            document.getElementById('tecnico').value = id;
            $.ajax({
                url: '<?php echo site_url('admins/buscar/')?>'+id,
                dataType: 'json',
                success: function(resposta){
                    $("#nome_tecnico").val(resposta.nome);
                }
            });
        });
    </script>

    <script>
        $(function() {
            $( "#data_inicial" ).datepicker({
                dateFormat: 'yy/mm/dd',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
            });
            $( "#data_final" ).datepicker({
                dateFormat: 'yy/mm/dd',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
            });
        });
    </script>
    <script>
        if (!$.fn.DataTable.isDataTable( '#clientes' )) {
            $('#clientes').dataTable({
                "dom": 'Bfrtip',
                "info": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            });
        }
        if (!$.fn.DataTable.isDataTable( '#tecnicos' )) {
            $('#tecnicos').dataTable({
                "dom": 'Bfrtip',
                "info": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            });
        }
    </script>