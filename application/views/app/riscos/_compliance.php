<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-gavel mr-2 text-primary"></i> Gestão de Compliance Regulatório</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddCompliance"><i class="fas fa-plus mr-1"></i> Novo Registro</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_compliance">
            <thead><tr><th>Regulamento</th><th>Risco</th><th>Área</th><th>Conformidade</th><th>Últ. Aval.</th><th>Próx. Aval.</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($compliance as $c): ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 13px;"><?= $c->regulamento; ?></span></td>
                    <td style="font-size: 12px;"><?= $c->risco_titulo ? substr($c->risco_titulo, 0, 30) : '-'; ?></td>
                    <td style="font-size: 12px;"><?= $c->area_responsavel ?: '-'; ?></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="progress flex-grow-1 mr-2" style="height: 6px; border-radius: 10px; background: #f1f5f9; min-width: 50px;">
                                <div class="progress-bar" role="progressbar" style="width: <?= $c->nivel_conformidade; ?>%; background: <?= $c->nivel_conformidade >= 80 ? '#10b981' : ($c->nivel_conformidade >= 50 ? '#f59e0b' : '#ef4444'); ?>; border-radius: 10px;"></div>
                            </div>
                            <span class="font-weight-bold" style="font-size: 11px;"><?= $c->nivel_conformidade; ?>%</span>
                        </div>
                    </td>
                    <td style="font-size: 11px;"><?= $c->ultima_avaliacao ? date('d/m/Y', strtotime($c->ultima_avaliacao)) : '-'; ?></td>
                    <td style="font-size: 11px;"><?= $c->proxima_avaliacao ? date('d/m/Y', strtotime($c->proxima_avaliacao)) : '-'; ?></td>
                    <td><span class="badge badge-pill badge-<?= $c->status == 'CONFORME' ? 'success' : ($c->status == 'NAO_CONFORME' ? 'danger' : 'warning'); ?>" style="font-size: 9px;"><?= $c->status; ?></span></td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-primary py-1 px-2 btn-edit-compliance" data-id="<?= $c->idcompliance; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_compliance/<?= $c->idcompliance; ?>" class="btn btn-sm btn-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add/Edit -->
<div class="modal fade" id="modalAddCompliance" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-gavel mr-2 text-primary"></i> Novo Registro de Compliance</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_compliance">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Regulamento / Norma</label><input type="text" class="form-control" name="regulamento" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Área Responsável</label><input type="text" class="form-control" name="area_responsavel"></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
                    <div class="form-group"><label>Obrigações</label><textarea class="form-control" name="obrigacao" rows="2" placeholder="Liste as obrigações regulatórias..."></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Risco Associado</label><select class="form-control" name="idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Nível Conformidade (%)</label><input type="number" class="form-control" name="nivel_conformidade" min="0" max="100" value="0"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="MONITORANDO">Monitorando</option><option value="CONFORME">Conforme</option><option value="NAO_CONFORME">Não Conforme</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Última Avaliação</label><input type="date" class="form-control" name="ultima_avaliacao" value="<?= date('Y-m-d'); ?>"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Próxima Avaliação</label><input type="date" class="form-control" name="proxima_avaliacao"></div></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditCompliance" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Compliance</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_compliance">
                <input type="hidden" name="idcompliance" id="editcom_idcompliance">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Regulamento</label><input type="text" class="form-control" name="regulamento" id="editcom_regulamento" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Área</label><input type="text" class="form-control" name="area_responsavel" id="editcom_area_responsavel"></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="editcom_descricao" rows="2"></textarea></div>
                    <div class="form-group"><label>Obrigações</label><textarea class="form-control" name="obrigacao" id="editcom_obrigacao" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Risco</label><select class="form-control" name="idrisco" id="editcom_idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Conformidade (%)</label><input type="number" class="form-control" name="nivel_conformidade" id="editcom_nivel_conformidade" min="0" max="100"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status" id="editcom_status"><option value="MONITORANDO">Monitorando</option><option value="CONFORME">Conforme</option><option value="NAO_CONFORME">Não Conforme</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Últ. Avaliação</label><input type="date" class="form-control" name="ultima_avaliacao" id="editcom_ultima_avaliacao"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Próx. Avaliação</label><input type="date" class="form-control" name="proxima_avaliacao" id="editcom_proxima_avaliacao"></div></div>
                    </div>
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
    if (!$.fn.DataTable.isDataTable('#tbl_compliance')) {
        $('#tbl_compliance').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-edit-compliance').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_compliance/' + id, function(data) {
            $('#editcom_idcompliance').val(data.idcompliance);
            $('#editcom_regulamento').val(data.regulamento);
            $('#editcom_area_responsavel').val(data.area_responsavel);
            $('#editcom_descricao').val(data.descricao);
            $('#editcom_obrigacao').val(data.obrigacao);
            $('#editcom_idrisco').val(data.idrisco);
            $('#editcom_nivel_conformidade').val(data.nivel_conformidade);
            $('#editcom_status').val(data.status);
            if (data.ultima_avaliacao) $('#editcom_ultima_avaliacao').val(data.ultima_avaliacao);
            if (data.proxima_avaliacao) $('#editcom_proxima_avaliacao').val(data.proxima_avaliacao);
            $('#modalEditCompliance').modal('show');
        });
    });
});
</script>
