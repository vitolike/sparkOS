    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link" onclick="history.back()"><i class="fas fa-arrow-left"></i> Voltar</a>
                <a class="nav-link active" href="<?= base_url(); ?>os/novo">
                    <i class="fas fa-plus-circle text-pink" style="color: #ec4899;"></i> Nova Ordem de Serviço
                </a>
            </nav>
        </div>
    </div>

    <main role="main" class="container">
        <!-- Message Alerts -->
        <?php if ($msg == 'novo'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle"></i>&nbsp; Sucesso!</strong> A nova Ordem de Serviço foi gerada com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($msg == 'update'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle"></i>&nbsp; Sucesso!</strong> Ordem de Serviço atualizada com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($msg == 'deletar'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-trash-alt"></i>&nbsp; Sucesso!</strong> A Ordem de Serviço foi apagada com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Table Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <h6 class="card-title">
                <i class="fas fa-file-invoice mr-2 text-pink" style="color: #ec4899;"></i>
                <b>Gerenciamento de Ordens de Serviço</b>
            </h6>
            <p class="text-muted mb-4" style="font-size: 13px;">Monitore, crie relatórios e acompanhe o andamento de todas as ordens de serviço abertas ou concluídas.</p>
            
            <div class="table-responsive">
                <table class="table table-hover" id="OS">
                    <thead>
                        <tr>
                            <th scope="col"># Protocolo</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Data Inicial</th>
                            <th scope="col">Data Final</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <?php if(!$query){ ?>
                        <tbody>
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="fas fa-file-invoice fa-3x mb-3 text-muted" style="opacity: 0.4;"></i>
                                    <p class="texto_pequeno mb-0">Nenhuma ordem de serviço cadastrada.</p>
                                </td>
                            </tr>
                        </tbody>
                    <?php } else { ?>
                        <tbody>
                            <?php foreach($query as $prop) { ?>
                                <tr id="<?= $prop->idos; ?>"> 
                                    <td class="font-weight-bold">#<?= $prop->protocolo; ?></td>
                                    <td><?= $prop->nome_cliente; ?></td>
                                    <td><?= $prop->nome_tecnico; ?></td>
                                    <td><?= date('d/m/Y', strtotime($prop->data_inicial)); ?></td>
                                    <td><?= date('d/m/Y', strtotime($prop->data_final)); ?></td>
                                    <td>
                                        <?php if ($prop->status == 'FINALIZADO'): ?>
                                            <span class="badge badge-pill badge-warning">FINALIZADO</span>
                                        <?php elseif ($prop->status == 'CANCELADO'): ?>
                                            <span class="badge badge-pill badge-danger">CANCELADO</span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-success"><?= $prop->status; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-success btn-sm py-1 px-3" href="<?= base_url(); ?>os/detalhes/<?= $prop->idos; ?>" style="padding: 6px 12px !important; margin-right: 4px;">
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

    <!-- Actions and Scripts -->
    <script type="text/javascript">
        $(".remove").click(function(){
            var id = $(this).parents("tr").attr("id");
            swal({
                title: "Apagar OS",
                text: "Tem certeza que deseja apagar esta Ordem de Serviço? Esta ação não pode ser desfeita.",
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
                        url: "<?php echo site_url('os/delete/')?>"+id,
                        type: 'DELETE',
                        error: function() {
                            swal("Erro", "Ocorreu um erro ao apagar a Ordem de Serviço.", "error");
                        },
                        success: function(data) {
                            $("#"+id).remove();
                            swal("Apagado!", "Ordem de Serviço apagada com sucesso.", "success");
                        }
                    });
                } else {
                    swal("Cancelado", "A remoção da Ordem de Serviço foi cancelada.", "error");
                }
            });
        });
    </script>
    <script>
    $(document).ready(function() {
        $('#OS').DataTable({
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