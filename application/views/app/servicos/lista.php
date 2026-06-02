    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link" onclick="history.back()"><i class="fas fa-arrow-left"></i> Voltar</a>
                <a class="nav-link active" href="#" data-toggle="modal" data-target="#modalNovoServico">
                    <i class="fas fa-screwdriver text-pink" style="color: #ec4899;"></i> Novo Serviço
                </a>
            </nav>
        </div>
    </div>

    <main role="main" class="container">
        <?php $this->load->view('layout/notifications', ['notify_view' => 'servicos']); ?>

        <!-- Table Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <h6 class="card-title">
                <i class="fas fa-tools mr-2 text-pink" style="color: #ec4899;"></i>
                <b>Tabela de Serviços</b>
            </h6>
            <p class="text-muted mb-4" style="font-size: 13px;">Consulte e organize o catálogo de serviços prestados por sua empresa.</p>
            
            <div class="table-responsive">
                <table class="table table-hover" id="tabela">
                    <thead>
                        <tr>
                            <th scope="col">Serviço / Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Preço do Serviço</th>
                            <th scope="col" class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <?php if(!$query){ ?>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <i class="fas fa-tools fa-3x mb-3 text-muted" style="opacity: 0.4;"></i>
                                    <p class="texto_pequeno mb-0">Nenhum serviço cadastrado no momento.</p>
                                </td>
                            </tr>
                        </tbody>
                    <?php } else { ?>
                        <tbody>
                            <?php foreach($query as $prop) { ?>
                                <tr id="<?= $prop->servicosid; ?>">  
                                    <td class="font-weight-bold"><?= $prop->nome; ?></td>
                                    <td class="text-muted" style="max-width: 320px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= $prop->descricao; ?></td>
                                    <td class="font-weight-bold text-violet" style="color: #a78bfa;">
                                        R$ <?= number_format($prop->preco, 2, ',', '.'); ?>
                                    </td>
                                    <td class="text-right">
                                        <a href="<?= base_url(); ?>servicos/editar/<?= $prop->servicosid; ?>" class="btn btn-success btn-sm py-1 px-2" style="padding: 6px 12px !important; margin-right: 4px;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm remove py-1 px-2" style="padding: 6px 12px !important;">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>  
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal Novo Serviço -->
    <div class="modal fade" id="modalNovoServico" tabindex="-1" role="dialog" aria-labelledby="modalNovoServicoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNovoServicoTitle">
                        <i class="fas fa-tools mr-2 text-pink" style="color: #ec4899;"></i> Cadastro de Serviço
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>servicos/adicionar" class="p-3">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nome">Nome do Serviço</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Formatação de PC" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="descricao">Descrição Completa</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descreva os detalhes do serviço...">
                        </div>

                        <div class="form-group">
                            <label for="preco">Preço Cobrado</label>
                            <input type="text" class="form-control" id="preco" name="preco" placeholder="0.00" required>
                        </div>
                    </div>
                    <div class="modal-footer mt-2">
                        <button type="submit" class="btn btn-success btn-block py-3">
                            <i class="fas fa-plus mr-2"></i> Adicionar Serviço
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
                title: "Apagar Serviço",
                text: "Tem certeza que deseja apagar este serviço? Esta ação não pode ser desfeita.",
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
                        url: "<?php echo site_url('servicos/delete/')?>"+id,
                        type: 'DELETE',
                        error: function() {
                            swal("Erro", "Ocorreu um erro ao apagar o serviço.", "error");
                        },
                        success: function(data) {
                            $("#"+id).remove();
                            swal("Apagado!", "Serviço apagado com sucesso.", "success");
                        }
                    });
                } else {
                    swal("Cancelado", "A remoção do serviço foi cancelada.", "error");
                }
            });
        });
    </script>
        
    <script>
    $(document).ready(function() {
        $('#tabela').DataTable({
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