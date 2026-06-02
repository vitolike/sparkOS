    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link" onclick="history.back()"><i class="fas fa-arrow-left"></i> Voltar</a>
                <a class="nav-link active" href="#" data-toggle="modal" data-target="#modalNovoCliente">
                    <i class="fas fa-user-plus text-pink" style="color: #ec4899;"></i> Novo Cliente
                </a>
            </nav>
        </div>
    </div>

    <main role="main" class="container">
        <!-- Message Alerts -->
        <?php if ($msg == 'novo_sucesso'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle"></i>&nbsp; Sucesso!</strong> O novo cliente foi adicionado com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($msg == 'sucesso_update'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle"></i>&nbsp; Sucesso!</strong> Cadastro do cliente atualizado com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($msg == 'sucesso_del'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-trash-alt"></i>&nbsp; Sucesso!</strong> O cliente foi removido com sucesso do sistema.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Table Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <h6 class="card-title">
                <i class="fas fa-users mr-2 text-pink" style="color: #ec4899;"></i>
                <b>Gerenciamento de Clientes</b>
            </h6>
            <p class="text-muted mb-4" style="font-size: 13px;">Consulte, edite ou remova os clientes cadastrados em sua base.</p>
            
            <div class="table-responsive">
                <table class="table table-hover" id="tabela">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col" class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <?php if(!$query){ ?>
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="fas fa-users fa-3x mb-3 text-muted" style="opacity: 0.4;"></i>
                                    <p class="texto_pequeno mb-0">Nenhum cliente cadastrado no momento.</p>
                                </td>
                            </tr>
                        </tbody>
                    <?php } else { ?>
                        <tbody>
                            <?php foreach($query as $prop) { ?>
                                <tr id="<?= $prop->clientesid; ?>">  
                                    <td class="font-weight-bold"><?= $prop->nome; ?> <?= $prop->sobrenome; ?></td>
                                    <td>
                                        <span class="badge badge-pill badge-warning mr-1" style="font-size: 10px;"><?= $prop->tipo_documento; ?></span>
                                        <code><?= $prop->documento; ?></code>
                                    </td>
                                    <td><?= $prop->telefone; ?></td>
                                    <td><?= $prop->cidade; ?></td>
                                    <td class="font-weight-bold text-violet" style="color: #a78bfa;"><?= $prop->uf; ?></td>
                                    <td class="text-right">
                                        <a href="<?= base_url(); ?>clientes/editar_cliente/<?= $prop->clientesid; ?>" class="btn btn-success btn-sm py-1 px-2" style="padding: 6px 12px !important; margin-right: 4px;">
                                            <i class="fas fa-user-edit"></i>
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

    <!-- Modal Novo Cliente -->
    <div class="modal fade" id="modalNovoCliente" tabindex="-1" role="dialog" aria-labelledby="modalNovoClienteTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNovoClienteTitle">
                        <i class="fas fa-user-plus mr-2 text-pink" style="color: #ec4899;"></i> Cadastro de Cliente
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>clientes/add_clientes" class="p-3">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do cliente" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sobrenome">Sobrenome</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000">
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, Avenida, Logradouro">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="numero">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="123">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" required>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" required>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="uf">Estado</label>
                                <select id="uf" name="uf" class="form-control" required>
                                    <option value="" selected>Escolher...</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tipo_documento">Tipo Doc.</label>
                                <select id="tipo_documento" name="tipo_documento" class="form-control" required>
                                    <option value="" selected>Escolher...</option>
                                    <option value="CNPJ">CNPJ</option>
                                    <option value="CPF">CPF</option>
                                    <option value="PASSAPORTE">PASSAPORTE</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="documento">Número do Documento</label>
                                <input type="text" class="form-control" id="documento" name="documento" required placeholder="000.000.000-00">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-block py-3">
                            <i class="fas fa-save mr-2"></i> Salvar Cliente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Autocomplete and Delete Actions -->
    <script type="text/javascript">
        $("#cep").focusout(function(){
            $.ajax({
                url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/',
                dataType: 'json',
                success: function(resposta){
                    $("#endereco").val(resposta.logradouro);
                    $("#bairro").val(resposta.bairro);
                    $("#cidade").val(resposta.localidade);
                    $("#uf").val(resposta.uf);
                    $("#numero").focus();
                }
            });
        });

        $(".remove").click(function(){
            var id = $(this).parents("tr").attr("id");
            swal({
                title: "Apagar cliente",
                text: "Tem certeza que deseja remover este cliente? Esta ação não pode ser desfeita.",
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
                        url: "<?php echo site_url('clientes/delete/')?>"+id,
                        type: 'DELETE',
                        error: function() {
                            swal("Erro", "Ocorreu um erro ao apagar o cliente.", "error");
                        },
                        success: function(data) {
                            $("#"+id).remove();
                            swal("Apagado!", "O cliente foi apagado com sucesso.", "success");
                        }
                    });
                } else {
                    swal("Cancelado", "A remoção do cliente foi cancelada.", "error");
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