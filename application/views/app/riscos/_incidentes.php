<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-bug mr-2 text-primary"></i> Registro de Incidentes</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddIncidente"><i class="fas fa-plus mr-1"></i> Novo Incidente</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_incidentes">
            <thead><tr><th>Título</th><th>Risco</th><th>Data</th><th>Severidade</th><th>Impacto</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($incidentes as $inc): ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 13px;"><?= $inc->titulo; ?></span></td>
                    <td style="font-size: 12px;"><?= $inc->risco_codigo ?: '-'; ?></td>
                    <td style="font-size: 11px;"><?= date('d/m/Y H:i', strtotime($inc->data_ocorrencia)); ?></td>
                    <td><span class="badge badge-pill <?= $inc->severidade == 'ALTO' ? 'badge-danger' : ($inc->severidade == 'MEDIO' ? 'badge-warning' : 'badge-info'); ?>" style="font-size: 9px;"><?= $inc->severidade; ?></span></td>
                    <td style="font-size: 12px;"><?= $inc->impacto_financeiro > 0 ? 'R$ ' . number_format($inc->impacto_financeiro, 2, ',', '.') : '-'; ?></td>
                    <td><span class="badge badge-pill badge-<?= $inc->status == 'ABERTO' ? 'danger' : ($inc->status == 'EM_ANALISE' ? 'warning' : 'success'); ?>" style="font-size: 9px;"><?= $inc->status; ?></span></td>
                    <td class="text-right">
                        <?php if ($inc->status != 'RESOLVIDO'): ?>
                            <a href="<?= base_url(); ?>riscos/resolver_incidente/<?= $inc->idincidente; ?>" class="btn btn-sm btn-outline-success py-1 px-2" style="font-size: 11px;" title="Resolver"><i class="fas fa-check"></i></a>
                        <?php endif; ?>
                        <button class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-incidente" data-id="<?= $inc->idincidente; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_incidente/<?= $inc->idincidente; ?>" class="btn btn-sm btn-outline-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add/Edit Incidente -->
<div class="modal fade" id="modalAddIncidente" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-bug mr-2 text-primary"></i> Novo Incidente</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_incidente">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo"><option value="INCIDENTE">Incidente</option><option value="QUASE_ACIDENTE">Quase Acidente</option><option value="PERDA">Perda</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="3"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Risco Associado</label><select class="form-control" name="idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Severidade</label><select class="form-control" name="severidade"><option value="BAIXO">Baixo</option><option value="MEDIO" selected>Médio</option><option value="ALTO">Alto</option></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Impacto Financeiro</label><input type="number" step="0.01" class="form-control" name="impacto_financeiro" value="0"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Data da Ocorrência</label><input type="datetime-local" class="form-control" name="data_ocorrencia" value="<?= date('Y-m-d\TH:i'); ?>"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="ABERTO">Aberto</option><option value="EM_ANALISE">Em Análise</option><option value="RESOLVIDO">Resolvido</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Causa Raiz</label><textarea class="form-control" name="causa_raiz" rows="2"></textarea></div>
                    <div class="form-group"><label>Lições Aprendidas</label><textarea class="form-control" name="licoes_aprendidas" rows="2"></textarea></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Incidente</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Incidente -->
<div class="modal fade" id="modalEditIncidente" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Incidente</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_incidente">
                <input type="hidden" name="idincidente" id="editi_idincidente">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" id="editi_titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo" id="editi_tipo"><option value="INCIDENTE">Incidente</option><option value="QUASE_ACIDENTE">Quase Acidente</option><option value="PERDA">Perda</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="editi_descricao" rows="3"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Risco</label><select class="form-control" name="idrisco" id="editi_idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Severidade</label><select class="form-control" name="severidade" id="editi_severidade"><option value="BAIXO">Baixo</option><option value="MEDIO">Médio</option><option value="ALTO">Alto</option></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Impacto Financeiro</label><input type="number" step="0.01" class="form-control" name="impacto_financeiro" id="editi_impacto_financeiro"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Data Ocorrência</label><input type="datetime-local" class="form-control" name="data_ocorrencia" id="editi_data_ocorrencia"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Status</label><select class="form-control" name="status" id="editi_status"><option value="ABERTO">Aberto</option><option value="EM_ANALISE">Em Análise</option><option value="RESOLVIDO">Resolvido</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Causa Raiz</label><textarea class="form-control" name="causa_raiz" id="editi_causa_raiz" rows="2"></textarea></div>
                    <div class="form-group"><label>Lições</label><textarea class="form-control" name="licoes_aprendidas" id="editi_licoes" rows="2"></textarea></div>
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
    if (!$.fn.DataTable.isDataTable('#tbl_incidentes')) {
        $('#tbl_incidentes').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "order": [[2, 'desc']], "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-edit-incidente').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_incidente/' + id, function(data) {
            $('#editi_idincidente').val(data.idincidente);
            $('#editi_titulo').val(data.titulo); $('#editi_tipo').val(data.tipo);
            $('#editi_descricao').val(data.descricao); $('#editi_idrisco').val(data.idrisco);
            $('#editi_severidade').val(data.severidade); $('#editi_impacto_financeiro').val(data.impacto_financeiro);
            $('#editi_status').val(data.status); $('#editi_causa_raiz').val(data.causa_raiz);
            $('#editi_licoes').val(data.licoes_aprendidas);
            if (data.data_ocorrencia) $('#editi_data_ocorrencia').val(data.data_ocorrencia.replace(' ', 'T'));
            $('#modalEditIncidente').modal('show');
        });
    });
});
</script>
