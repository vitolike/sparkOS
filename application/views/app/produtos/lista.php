    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link" onclick="history.back()"><i class="fas fa-arrow-left"></i> Voltar</a>
                <a class="nav-link active" href="#" data-toggle="modal" data-target="#modalNovoProduto">
                    <i class="fas fa-box-open text-pink" style="color: #ec4899;"></i> Novo Produto
                </a>
            </nav>
        </div>
    </div>

    <main role="main" class="container">
        <!-- Message Alerts -->
        <?php if ($msg == 'novo'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle"></i>&nbsp; Sucesso!</strong> O novo produto foi cadastrado com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($msg == 'update'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle"></i>&nbsp; Sucesso!</strong> Cadastro do produto atualizado com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($msg == 'deletar'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-trash-alt"></i>&nbsp; Sucesso!</strong> O produto foi apagado com sucesso do sistema.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($msg == 'erro'): ?>
            <div class="alert alert-modern alert-danger-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-exclamation-triangle"></i>&nbsp; Erro!</strong> O arquivo de foto enviado não é suportado.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Table Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <h6 class="card-title">
                <i class="fas fa-box mr-2 text-pink" style="color: #ec4899;"></i>
                <b>Controle de Produtos</b>
            </h6>
            <p class="text-muted mb-4" style="font-size: 13px;">Monitore o estoque, preços de compra/venda e movimentações dos produtos.</p>
            
            <div class="table-responsive">
                <table class="table table-hover" id="produtos">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nome / Descrição</th>
                            <th scope="col">Quantidade em Estoque</th>
                            <th scope="col">Preço de Venda</th>
                            <th scope="col" class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <?php if(!$query){ ?>
                        <tbody>
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <i class="fas fa-box-open fa-3x mb-3 text-muted" style="opacity: 0.4;"></i>
                                    <p class="texto_pequeno mb-0">Nenhum produto cadastrado no momento.</p>
                                </td>
                            </tr>
                        </tbody>
                    <?php } else { ?>
                        <tbody>
                            <?php foreach($query as $prop) { ?>
                                <tr id="<?= $prop->produtosid; ?>">  
                                    <td style="width: 80px;">
                                        <?php if ($prop->foto == null): ?>
                                            <img src="<?= base_url(); ?>public/images/image.jpg" class="rounded" width="50" height="50" style="object-fit: cover;">
                                        <?php else: ?>
                                            <img src="<?= base_url(); ?>public/uploads/<?= $prop->foto; ?>" class="rounded" width="50" height="50" style="object-fit: cover;">
                                        <?php endif; ?>
                                    </td>
                                    <td class="font-weight-bold"><?= $prop->descricao; ?></td>
                                    <td>
                                        <span class="font-weight-bold" style="color: #ec4899;"><?= $prop->estoque; ?></span>
                                    </td>
                                    <td class="font-weight-bold text-violet" style="color: #a78bfa;">
                                        R$ <?= number_format($prop->preco_venda, 2, ',', '.'); ?>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-success btn-sm py-1 px-3" href="<?= base_url(); ?>produtos/editar/<?= $prop->produtosid; ?>" style="padding: 6px 12px !important; margin-right: 4px;">
                                                <i class="fas fa-search"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm remove py-1 px-3" style="padding: 6px 12px !important;">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal Novo Produto -->
    <div class="modal fade" id="modalNovoProduto" tabindex="-1" role="dialog" aria-labelledby="modalNovoProdutoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNovoProdutoTitle">
                        <i class="fas fa-barcode mr-2 text-pink" style="color: #ec4899;"></i> Cadastro de Produto
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data" action="<?= base_url(); ?>produtos/adicionar" class="p-3">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="descricao">Descrição / Nome do Produto</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Ex: Cabo HDMI 2m" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Tipo de Movimento</label>
                            <div class="form-row mt-2">
                                <div class="col-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" value="1" id="entrada" name="entrada" checked>
                                        <label class="custom-control-label text-muted" for="entrada">Permitir Entrada</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" value="1" id="saida" name="saida" checked>
                                        <label class="custom-control-label text-muted" for="saida">Permitir Saída</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <label for="preco_compra">Preço de Compra</label>
                                <input type="text" class="form-control" id="preco_compra" name="preco_compra" placeholder="0.00" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="preco_venda">Preço de Venda</label>
                                <input type="text" class="form-control" id="preco_venda" name="preco_venda" placeholder="0.00" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="estoque">Estoque Inicial</label>
                                <input type="number" class="form-control" id="estoque" name="estoque" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="estoque_minimo">Estoque Mínimo</label>
                                <input type="number" class="form-control" id="estoque_minimo" name="estoque_minimo" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="unidade">Unidade de Medida</label>
                            <select id="unidade" name="unidade" class="form-control">
                                <option value="Un" selected>Unidade (Un)</option>
                                <option value="Kg">Kilograma (Kg)</option>
                                <option value="Lt">Litro (Lt)</option>
                                <option value="Cx">Caixa (Cx)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer mt-2">
                        <button type="submit" class="btn btn-success btn-block py-3">
                            <i class="fas fa-plus mr-2"></i> Adicionar Produto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Actions and Scripts -->
    <script type="text/javascript">
        $(".remove").click(function(){
            var id = $(this).parents("tr").attr("id");
            swal({
                title: "Apagar Produto",
                text: "Tem certeza que deseja apagar este produto? Esta ação não pode ser desfeita.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Sim, apagar!",
                cancelButtonText: "Não, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo site_url('produtos/delete/')?>"+id,
                        type: 'DELETE',
                        error: function() {
                            swal("Erro", "Ocorreu um erro ao apagar o produto.", "error");
                        },
                        success: function(data) {
                            $("#"+id).remove();
                            swal("Apagado!", "Produto apagado com sucesso.", "success");
                        }
                    });
                } else {
                    swal("Cancelado", "A remoção do produto foi cancelada.", "error");
                }
            });
        });
    </script>
        
    <script>
    $(document).ready(function() {
        $('#produtos').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
             "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
            }
        });
    });
    </script>