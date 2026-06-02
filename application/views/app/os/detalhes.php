    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link active" onclick="history.back()"><i class="fas fa-arrow-left"></i> Voltar</a>
            </nav>
        </div>
    </div>
    
    <main role="main" class="container">
        
        <!-- Main Details Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <div class="row align-items-center mb-4">
                <div class="col-md-6">
                    <h5 class="card-title mb-1">
                        <i class="fas fa-info-circle mr-2 text-pink" style="color: #ec4899;"></i>
                        <b>Detalhes da Ordem de Serviço</b>
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 13px;">Consulte e faça a gestão completa das informações desta OS.</p>
                </div>
                <div class="col-md-6 text-md-right mt-3 mt-md-0">
                    <div class="d-flex justify-content-md-end gap-2 flex-wrap">
                        <button type="button" class="btn btn-secondary mr-2"><i class="fas fa-print mr-1"></i> Imprimir</button>
                        <button type="button" class="btn btn-secondary mr-2"><i class="fas fa-cash-register mr-1"></i> Faturar</button>
                        <button type="button" class="btn btn-secondary mr-2" data-toggle="modal" data-target="#alterarstatus"><i class="fas fa-sync mr-1"></i> Alterar Status</button>
                        <a href="<?= base_url(); ?>os/editar/<?= $query[0]->idos; ?>" class="btn btn-primary"><i class="fas fa-pen mr-1"></i> Editar OS</a>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            
            <h5 class="card-title text-indigo mb-4" style="font-size: 16px; color: var(--primary-color);">
                <b>Protocolo: #<?= $query[0]->protocolo; ?></b>
            </h5>
            
            <form role="form">
                <!-- Section 1: Cliente e Técnico -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome_cliente">Cliente</label>
                        <input type="text" class="form-control" id="nome_cliente" value="<?= $query[0]->nome_cliente; ?>" readonly style="background-color: #f8fafc !important;">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome_tecnico">Técnico / Responsável</label>
                        <input type="text" class="form-control" id="nome_tecnico" value="<?= $query[0]->nome_tecnico; ?>" readonly style="background-color: #f8fafc !important;">
                    </div>
                </div>
                
                <!-- Section 2: Status, Datas e Garantia -->
                <div class="form-row mt-3">
                    <div class="form-group col-md-3">
                        <label for="status">Status</label>
                        <input type="text" class="form-control font-weight-bold" value="<?= $query[0]->status; ?>" readonly style="background-color: #f8fafc !important; color: var(--primary-color) !important;">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data_inicial">Data Inicial</label>
                        <input type="text" class="form-control" value="<?= $query[0]->data_inicial; ?>" readonly style="background-color: #f8fafc !important;">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data_final">Data Final</label>
                        <input type="text" class="form-control" value="<?= $query[0]->data_final; ?>" readonly style="background-color: #f8fafc !important;">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="garantia">Garantia (Dias)</label>
                        <input type="number" class="form-control" id="garantia" value="<?= $query[0]->garantia; ?>" readonly style="background-color: #f8fafc !important;">
                    </div>
                </div>
                
                <!-- Section 3: Descrição e Defeito -->
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="descricao">Descrição do Produto ou Serviço</label>
                        <textarea class="form-control" rows="4" readonly style="background-color: #f8fafc !important;"><?= $query[0]->descricao; ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="defeito">Defeito Reclamado / Constatado</label>
                        <textarea class="form-control" rows="4" readonly style="background-color: #f8fafc !important;"><?= $query[0]->defeito; ?></textarea>
                    </div>
                </div>
                
                <!-- Section 4: Obs e Laudo -->
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="observacoes">Observações Gerais</label>
                        <textarea class="form-control" rows="4" readonly style="background-color: #f8fafc !important;"><?= $query[0]->observacoes; ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="laudo_tecnico">Laudo Técnico Preliminar</label>
                        <textarea class="form-control" rows="4" readonly style="background-color: #f8fafc !important;"><?= $query[0]->laudo_tecnico; ?></textarea>
                    </div>
                </div>
            </form>
            
            <hr class="my-5">
            
            <!-- Items Table Section -->
            <div class="row align-items-center mb-4">
                <div class="col-md-9">
                    <h5 class="card-title mb-1" style="font-size: 16px;">
                        <b>Serviços Realizados e Produtos Utilizados</b>
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 13px;">Gerencie as linhas de serviços e peças vinculadas a esta OS.</p>
                </div>
                <div class="col-md-3 text-md-right mt-3 mt-md-0">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addproduto">
                        Adicionar Item <i class="fas fa-plus ml-1"></i>
                    </button>
                </div>
            </div>
            
            <div class="table-responsive mt-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Descrição</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor Unitário</th>
                            <th scope="col" class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <?php if(!$linhas){ ?>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center py-4">Nenhum item adicionado a esta Ordem de Serviço.</td>
                            </tr>
                        </tbody>
                    <?php } else { ?>
                        <tbody>
                            <?php foreach($linhas as $l) { ?>
                                <tr id="<?= $l->idos_linhas; ?>">  
                                    <td class="font-weight-bold"><?= $l->descricao; ?></td>
                                    <td><span class="badge badge-pill badge-warning" style="font-size: 12px;"><?= $l->quantidade; ?></span></td>
                                    <td class="font-weight-bold text-success">R$ <?= number_format((float)$l->preco, 2, ',', '.'); ?></td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-danger btn-sm remove py-1 px-3">
                                            <i class="far fa-trash-alt mr-1"></i> Remover
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </main>
    
    <!-- Modal Alterar Status -->
    <div class="modal fade" id="alterarstatus" tabindex="-1" role="dialog" aria-labelledby="alterarstatusTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alterarstatusTitle"><i class="fas fa-sync mr-2 text-primary"></i> Alterar Status da OS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" role="form" action="<?= base_url(); ?>os/atualizar_status">
                    <input type="hidden" value="<?= $query[0]->idos; ?>" name="idos" />
                    <div class="modal-body p-4">
                        <div class="form-group mb-0">
                            <label for="inputState">Selecione o Novo Status</label>
                            <select id="inputState" class="form-control" name="status" required>
                                <option value="ORÇAMENTO" <?= $query[0]->status=='ORÇAMENTO'?'selected':'' ?>>Orçamento</option>
                                <option value="ABERTO" <?= $query[0]->status=='ABERTO'?'selected':'' ?>>Aberto</option>
                                <option value="EM ANDAMENTO" <?= $query[0]->status=='EM ANDAMENTO'?'selected':'' ?>>Em Andamento</option>
                                <option value="FINALIZADO" <?= $query[0]->status=='FINALIZADO'?'selected':'' ?>>Finalizado</option>
                                <option value="CANCELADO" <?= $query[0]->status=='CANCELADO'?'selected':'' ?>>Cancelado</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Atualizar Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal Adicionar Produto/Serviço -->
    <div class="modal fade" id="addproduto" tabindex="-1" role="dialog" aria-labelledby="addprodutoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addprodutoTitle"><i class="fas fa-plus mr-2 text-primary"></i> Vincular Produto ou Peça</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Em Estoque</th>
                                    <th scope="col">Valor Unitário</th>
                                    <th scope="col" style="width: 150px;">Quantidade</th>
                                    <th scope="col" class="text-right">Ação</th>
                                </tr>
                            </thead>
                            <?php if(!$produtos){ ?>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center py-4">Nenhum produto disponível em estoque.</td>
                                    </tr>
                                </tbody>
                            <?php } else { ?>
                                <tbody>
                                    <?php foreach($produtos as $prod) { ?>
                                        <form method="post" role="form" action="<?= base_url(); ?>os/add_produto">
                                            <tr> 
                                                <input type="hidden" name="idos" value="<?= $query[0]->idos; ?>">
                                                <input type="hidden" name="pid" value="<?= $prod->id; ?>">
                                                <td class="font-weight-bold"><input type="text" readonly class="form-control-plaintext font-weight-bold" name="descricao" value="<?= $prod->descricao; ?>" style="background: transparent; border: none; padding: 0;"></td>
                                                <td><span class="badge badge-pill badge-warning"><?= $prod->estoque; ?> un</span></td>
                                                <td class="font-weight-bold text-success">R$ <?= number_format((float)$prod->preco, 2, ',', '.'); ?><input type="hidden" name="preco" value="<?= $prod->preco; ?>"></td>
                                                <td><input type="number" class="form-control py-1 px-2" name="quantidade" min="1" max="<?= $prod->estoque; ?>" placeholder="Qtd" required style="height: 36px !important;"></td>
                                                <td class="text-right">
                                                    <button type="submit" class="btn btn-success btn-sm py-1 px-3">
                                                        <i class="fas fa-plus-circle mr-1"></i> Vincular
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
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
    
    <script type="text/javascript">
        $(".remove").click(function(e){
            e.preventDefault();
            var id = $(this).parents("tr").attr("id");
            swal({
                title: "Excluir Item",
                text: "Deseja realmente remover este item desta Ordem de Serviço?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Sim, remover!",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo site_url('os/delete_linha/')?>"+id,
                        type: 'DELETE',
                        error: function() {
                            swal("Erro", "Ocorreu um erro ao excluir a linha, contate o administrador.", "error");
                        },
                        success: function(data) {
                            $("#"+id).remove();
                            swal("Removido!", "O item foi removido com sucesso.", "success");
                        }
                    });
                }
            });
        });
    </script>