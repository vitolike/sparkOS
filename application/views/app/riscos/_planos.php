<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-tasks mr-2 text-primary"></i> Planos de Ação</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddPlano"><i class="fas fa-plus mr-1"></i> Novo Plano</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_planos">
            <thead><tr><th>Título</th><th>Risco</th><th>Tipo</th><th>Responsável</th><th>Prazo</th><th>%</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($planos as $p): ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 13px;"><?= $p->titulo; ?></span></td>
                    <td style="font-size: 12px;"><?= $p->risco_codigo ? "$p->risco_codigo" : '-'; ?></td>
                    <td><span class="badge badge-pill badge-info" style="font-size: 9px;"><?= $p->tipo; ?></span></td>
                    <td style="font-size: 12px;"><?= $p->responsavel ?: '-'; ?></td>
                    <td style="font-size: 11px;"><?= $p->prazo ? date('d/m/Y', strtotime($p->prazo)) : '-'; ?></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <span class="font-weight-bold mr-2" style="font-size: 12px;"><?= $p->percentual; ?>%</span>
                            <div class="progress flex-grow-1" style="height: 6px; border-radius: 10px; background: #f1f5f9; min-width: 60px;">
                                <div class="progress-bar" role="progressbar" style="width: <?= $p->percentual; ?>%; background: <?= $p->percentual == 100 ? '#10b981' : '#6366f1'; ?>; border-radius: 10px;"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-<?= $p->status == 'CONCLUIDO' ? 'success' : ($p->status == 'EM_ANDAMENTO' ? 'primary' : ($p->status == 'CANCELADO' ? 'danger' : 'warning')); ?>" style="font-size: 9px;"><?= str_replace('_', ' ', $p->status); ?></span>
                    </td>
                    <td class="text-right">
                        <a href="<?= base_url(); ?>riscos/update_plano_status/<?= $p->idplano; ?>/EM_ANDAMENTO" class="btn btn-sm btn-primary py-1 px-2" style="font-size: 11px;" title="Iniciar"><i class="fas fa-play"></i></a>
                        <a href="<?= base_url(); ?>riscos/update_plano_status/<?= $p->idplano; ?>/CONCLUIDO" class="btn btn-sm btn-success py-1 px-2" style="font-size: 11px;" title="Concluir"><i class="fas fa-check"></i></a>
                        <button class="btn btn-sm btn-info py-1 px-2 btn-edit-plano" data-id="<?= $p->idplano; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_plano/<?= $p->idplano; ?>" class="btn btn-sm btn-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add Plano -->
<div class="modal fade" id="modalAddPlano" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-tasks mr-2 text-primary"></i> Novo Plano de Ação</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_plano">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo"><option value="CORRETIVA">Corretiva</option><option value="PREVENTIVA">Preventiva</option><option value="MELHORIA">Melhoria</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group"><label>Risco Associado</label>
                                <select class="form-control" name="idrisco">
                                    <option value="">Nenhum</option>
                                    <?php foreach ($riscos_list as $r): ?>
                                        <option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4"><div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Prazo</label><input type="date" class="form-control" name="prazo"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="PENDENTE">Pendente</option><option value="EM_ANDAMENTO">Em Andamento</option><option value="CONCLUIDO">Concluído</option></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>% Conclusão</label><input type="number" class="form-control" name="percentual" min="0" max="100" value="0"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Controle</label><select class="form-control" name="idcontrole"><option value="">Nenhum</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Observações</label><textarea class="form-control" name="observacoes" rows="2"></textarea></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Plano</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Plano -->
<div class="modal fade" id="modalEditPlano" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Plano</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_plano">
                <input type="hidden" name="idplano" id="editp_idplano">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" id="editp_titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo" id="editp_tipo"><option value="CORRETIVA">Corretiva</option><option value="PREVENTIVA">Preventiva</option><option value="MELHORIA">Melhoria</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="editp_descricao" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Risco</label><select class="form-control" name="idrisco" id="editp_idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel" id="editp_responsavel"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Prazo</label><input type="date" class="form-control" name="prazo" id="editp_prazo"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status" id="editp_status"><option value="PENDENTE">Pendente</option><option value="EM_ANDAMENTO">Em Andamento</option><option value="CONCLUIDO">Concluído</option><option value="CANCELADO">Cancelado</option></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>%</label><input type="number" class="form-control" name="percentual" id="editp_percentual" min="0" max="100"></div></div>
                    </div>
                    <div class="form-group"><label>Observações</label><textarea class="form-control" name="observacoes" id="editp_observacoes" rows="2"></textarea></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('#tbl_planos')) {
        $('#tbl_planos').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-edit-plano').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_plano/' + id, function(data) {
            $('#editp_idplano').val(data.idplano);
            $('#editp_titulo').val(data.titulo);
            $('#editp_descricao').val(data.descricao);
            $('#editp_tipo').val(data.tipo);
            $('#editp_idrisco').val(data.idrisco);
            $('#editp_responsavel').val(data.responsavel);
            if (data.prazo) $('#editp_prazo').val(data.prazo);
            $('#editp_status').val(data.status);
            $('#editp_percentual').val(data.percentual);
            $('#editp_observacoes').val(data.observacoes);
            $('#modalEditPlano').modal('show');
        });
    });
});
</script>
