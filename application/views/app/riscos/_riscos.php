<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-exclamation-triangle mr-2 text-primary"></i> Registro de Riscos</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddRisco"><i class="fas fa-plus mr-1"></i> Novo Risco</button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover" id="tbl_riscos">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Prob.</th>
                    <th>Imp.</th>
                    <th>Score</th>
                    <th>Nível</th>
                    <th>Responsável</th>
                    <th>Status</th>
                    <th class="text-right">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riscos as $r): ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 12px;"><?= $r->codigo; ?></span></td>
                    <td>
                        <span class="font-weight-bold d-block" style="font-size: 13px;"><?= $r->titulo; ?></span>
                        <span class="text-muted" style="font-size: 11px;"><?= substr($r->descricao, 0, 60) . (strlen($r->descricao) > 60 ? '...' : ''); ?></span>
                    </td>
                    <td><span class="badge badge-pill" style="background: <?= $r->categoria_cor ?: '#6366f1'; ?>20; color: <?= $r->categoria_cor ?: '#6366f1'; ?>; font-size: 9px;"><?= $r->categoria_nome ?: 'Sem categoria'; ?></span></td>
                    <td class="text-center"><?= $r->probabilidade; ?></td>
                    <td class="text-center"><?= $r->impacto; ?></td>
                    <td class="text-center font-weight-bold"><?= $r->score_automatico; ?></td>
                    <td><span class="badge badge-pill badge-risco-<?= $r->nivel_risco; ?>"><?= $r->nivel_risco; ?></span></td>
                    <td style="font-size: 12px;"><?= $r->area_responsavel ?: '-'; ?></td>
                    <td><span class="badge badge-pill badge-<?= $r->status == 'IDENTIFICADO' ? 'info' : ($r->status == 'EM_TRATAMENTO' ? 'warning' : ($r->status == 'MONITORANDO' ? 'primary' : 'success')); ?>" style="font-size: 9px;"><?= $r->status; ?></span></td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-risco" data-id="<?= $r->idrisco; ?>" style="font-size: 11px;" title="Editar"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_risco/<?= $r->idrisco; ?>" class="btn btn-sm btn-outline-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir este risco?');" title="Excluir"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add Risco -->
<div class="modal fade" id="modalAddRisco" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-exclamation-triangle mr-2 text-primary"></i> Novo Risco</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_risco">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label>Título do Risco</label><input type="text" class="form-control" name="titulo" required></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Código</label><input type="text" class="form-control" name="codigo" placeholder="Auto"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Categoria</label>
                                <select class="form-control" name="idcategoria">
                                    <option value="">Selecione</option>
                                    <?php foreach ($categorias as $c): ?>
                                        <option value="<?= $c->idcategoria; ?>"><?= $c->nome; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="3"></textarea></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group"><label>Probabilidade (1-5)</label>
                                <select class="form-control" name="probabilidade" required>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <option value="<?= $i; ?>" <?= $i == 2 ? 'selected' : ''; ?>><?= $i; ?> - <?= ['Muito Baixa','Baixa','Média','Alta','Muito Alta'][$i-1]; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><label>Impacto (1-5)</label>
                                <select class="form-control" name="impacto" required>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <option value="<?= $i; ?>" <?= $i == 3 ? 'selected' : ''; ?>><?= $i; ?> - <?= ['Muito Baixo','Baixo','Médio','Alto','Muito Alto'][$i-1]; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="IDENTIFICADO">Identificado</option>
                                    <option value="EM_TRATAMENTO">Em Tratamento</option>
                                    <option value="MONITORANDO">Monitorando</option>
                                    <option value="ACEITO">Aceito</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label>Área Responsável</label><input type="text" class="form-control" name="area_responsavel"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Proprietário do Risco</label><input type="text" class="form-control" name="proprietario"></div>
                        </div>
                    </div>
                    <div class="form-group"><label>Data de Identificação</label><input type="date" class="form-control" name="data_identificacao" value="<?= date('Y-m-d'); ?>"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Risco</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Risco -->
<div class="modal fade" id="modalEditRisco" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Risco</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_risco">
                <input type="hidden" name="idrisco" id="edit_idrisco">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" id="edit_titulo" required></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Código</label><input type="text" class="form-control" name="codigo" id="edit_codigo"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Categoria</label>
                                <select class="form-control" name="idcategoria" id="edit_idcategoria">
                                    <option value="">Selecione</option>
                                    <?php foreach ($categorias as $c): ?>
                                        <option value="<?= $c->idcategoria; ?>"><?= $c->nome; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="edit_descricao" rows="3"></textarea></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group"><label>Probabilidade</label>
                                <select class="form-control" name="probabilidade" id="edit_probabilidade" required>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><label>Impacto</label>
                                <select class="form-control" name="impacto" id="edit_impacto" required>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><label>Status</label>
                                <select class="form-control" name="status" id="edit_status">
                                    <option value="IDENTIFICADO">Identificado</option>
                                    <option value="EM_TRATAMENTO">Em Tratamento</option>
                                    <option value="MONITORANDO">Monitorando</option>
                                    <option value="ACEITO">Aceito</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label>Área Responsável</label><input type="text" class="form-control" name="area_responsavel" id="edit_area_responsavel"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Proprietário</label><input type="text" class="form-control" name="proprietario" id="edit_proprietario"></div>
                        </div>
                    </div>
                    <div class="form-group"><label>Data de Identificação</label><input type="date" class="form-control" name="data_identificacao" id="edit_data_identificacao"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar Risco</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('#tbl_riscos')) {
        $('#tbl_riscos').DataTable({
            "info": true, "searching": true, "paging": true, "pageLength": 15, "order": [[5, 'desc']],
            "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" }
        });
    }

    $('.btn-edit-risco').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_risco/' + id, function(data) {
            $('#edit_idrisco').val(data.idrisco);
            $('#edit_titulo').val(data.titulo);
            $('#edit_codigo').val(data.codigo);
            $('#edit_idcategoria').val(data.idcategoria);
            $('#edit_descricao').val(data.descricao);
            $('#edit_probabilidade').val(data.probabilidade);
            $('#edit_impacto').val(data.impacto);
            $('#edit_status').val(data.status);
            $('#edit_area_responsavel').val(data.area_responsavel);
            $('#edit_proprietario').val(data.proprietario);
            if (data.data_identificacao) $('#edit_data_identificacao').val(data.data_identificacao);
            $('#modalEditRisco').modal('show');
        });
    });
});
</script>
