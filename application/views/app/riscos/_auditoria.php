<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-clipboard-check mr-2 text-primary"></i> Auditoria e Não Conformidades</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddAuditoria"><i class="fas fa-plus mr-1"></i> Nova Auditoria</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_auditoria">
            <thead><tr><th>Título</th><th>Tipo</th><th>Responsável</th><th>Período</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($auditorias as $a): ?>
                <tr>
                    <td>
                        <span class="font-weight-bold" style="font-size: 13px;"><?= $a->titulo; ?></span>
                        <?php if ($a->risco_titulo): ?>
                            <span class="d-block text-muted" style="font-size: 10px;">Risco: <?= substr($a->risco_titulo, 0, 40); ?></span>
                        <?php endif; ?>
                    </td>
                    <td><span class="badge badge-pill badge-<?= $a->tipo == 'INTERNA' ? 'info' : 'warning'; ?>" style="font-size: 9px;"><?= $a->tipo; ?></span></td>
                    <td style="font-size: 12px;"><?= $a->responsavel ?: '-'; ?></td>
                    <td style="font-size: 11px;">
                        <?php if ($a->data_inicio): ?><?= date('d/m/Y', strtotime($a->data_inicio)); ?><?php endif; ?>
                        <?php if ($a->data_fim): ?> → <?= date('d/m/Y', strtotime($a->data_fim)); ?><?php endif; ?>
                    </td>
                    <td><span class="badge badge-pill badge-<?= $a->status == 'CONCLUIDA' ? 'success' : ($a->status == 'EM_ANDAMENTO' ? 'primary' : ($a->status == 'PLANEJADA' ? 'info' : 'warning')); ?>" style="font-size: 9px;"><?= $a->status; ?></span></td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-auditoria" data-id="<?= $a->idauditoria; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_auditoria/<?= $a->idauditoria; ?>" class="btn btn-sm btn-outline-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add/Edit -->
<div class="modal fade" id="modalAddAuditoria" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-clipboard-check mr-2 text-primary"></i> Nova Auditoria</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_auditoria">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo"><option value="INTERNA">Interna</option><option value="EXTERNA">Externa</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Escopo</label><textarea class="form-control" name="escopo" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Risco Associado</label><select class="form-control" name="idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="PLANEJADA">Planejada</option><option value="EM_ANDAMENTO">Em Andamento</option><option value="CONCLUIDA">Concluída</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Data Início</label><input type="date" class="form-control" name="data_inicio" value="<?= date('Y-m-d'); ?>"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Data Fim</label><input type="date" class="form-control" name="data_fim"></div></div>
                    </div>
                    <div class="form-group"><label>Não Conformidades</label><textarea class="form-control" name="nao_conformidades" rows="2"></textarea></div>
                    <div class="form-group"><label>Recomendações</label><textarea class="form-control" name="recomendacoes" rows="2"></textarea></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditAuditoria" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Auditoria</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_auditoria">
                <input type="hidden" name="idauditoria" id="edita_idauditoria">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" id="edita_titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo" id="edita_tipo"><option value="INTERNA">Interna</option><option value="EXTERNA">Externa</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Escopo</label><textarea class="form-control" name="escopo" id="edita_escopo" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Risco</label><select class="form-control" name="idrisco" id="edita_idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel" id="edita_responsavel"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status" id="edita_status"><option value="PLANEJADA">Planejada</option><option value="EM_ANDAMENTO">Em Andamento</option><option value="CONCLUIDA">Concluída</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Data Início</label><input type="date" class="form-control" name="data_inicio" id="edita_data_inicio"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Data Fim</label><input type="date" class="form-control" name="data_fim" id="edita_data_fim"></div></div>
                    </div>
                    <div class="form-group"><label>Não Conformidades</label><textarea class="form-control" name="nao_conformidades" id="edita_nao_conformidades" rows="2"></textarea></div>
                    <div class="form-group"><label>Recomendações</label><textarea class="form-control" name="recomendacoes" id="edita_recomendacoes" rows="2"></textarea></div>
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
    if (!$.fn.DataTable.isDataTable('#tbl_auditoria')) {
        $('#tbl_auditoria').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-edit-auditoria').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_auditoria/' + id, function(data) {
            $('#edita_idauditoria').val(data.idauditoria);
            $('#edita_titulo').val(data.titulo); $('#edita_tipo').val(data.tipo);
            $('#edita_escopo').val(data.escopo); $('#edita_idrisco').val(data.idrisco);
            $('#edita_responsavel').val(data.responsavel); $('#edita_status').val(data.status);
            if (data.data_inicio) $('#edita_data_inicio').val(data.data_inicio);
            if (data.data_fim) $('#edita_data_fim').val(data.data_fim);
            $('#edita_nao_conformidades').val(data.nao_conformidades);
            $('#edita_recomendacoes').val(data.recomendacoes);
            $('#modalEditAuditoria').modal('show');
        });
    });
});
</script>
