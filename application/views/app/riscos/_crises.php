<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-exclamation-circle mr-2 text-primary"></i> Gestão de Crises</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddCrise"><i class="fas fa-plus mr-1"></i> Nova Crise</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_crises">
            <thead><tr><th>Título</th><th>Tipo</th><th>Nível</th><th>Data Início</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($crises as $c): ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 13px;"><?= $c->titulo; ?></span></td>
                    <td><span class="badge badge-pill badge-info" style="font-size: 9px;"><?= $c->tipo; ?></span></td>
                    <td><span class="badge badge-pill badge-<?= $c->nivel == 'ALTO' ? 'danger' : ($c->nivel == 'MEDIO' ? 'warning' : 'info'); ?>" style="font-size: 9px;"><?= $c->nivel; ?></span></td>
                    <td style="font-size: 11px;"><?= date('d/m/Y H:i', strtotime($c->data_inicio)); ?></td>
                    <td><span class="badge badge-pill badge-<?= $c->status == 'RESOLVIDO' ? 'success' : ($c->status == 'EM_ANDAMENTO' ? 'danger' : 'warning'); ?>" style="font-size: 9px;"><?= $c->status; ?></span></td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-primary py-1 px-2 btn-edit-crise" data-id="<?= $c->idcrise; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_crise/<?= $c->idcrise; ?>" class="btn btn-sm btn-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add/Edit -->
<div class="modal fade" id="modalAddCrise" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-exclamation-circle mr-2 text-primary"></i> Nova Crise</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_crise">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo"><option value="OPERACIONAL">Operacional</option><option value="REPUTACIONAL">Reputacional</option><option value="FINANCEIRO">Financeiro</option><option value="CIBERNETICO">Cibernético</option><option value="AMBIENTAL">Ambiental</option><option value="LEGAL">Legal</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="3"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Nível</label><select class="form-control" name="nivel"><option value="BAIXO">Baixo</option><option value="MEDIO" selected>Médio</option><option value="ALTO">Alto</option></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="MONITORANDO">Monitorando</option><option value="EM_ANDAMENTO">Em Andamento</option><option value="RESOLVIDO">Resolvido</option></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Data Início</label><input type="datetime-local" class="form-control" name="data_inicio" value="<?= date('Y-m-d\TH:i'); ?>"></div></div>
                    </div>
                    <div class="form-group"><label>Comitê de Crise</label><input type="text" class="form-control" name="comite" placeholder="Membros do comité"></div>
                    <div class="form-group"><label>Escalonamento</label><textarea class="form-control" name="escalonamento" rows="2" placeholder="Procedimento de escalonamento..."></textarea></div>
                    <div class="form-group"><label>Plano de Comunicação</label><textarea class="form-control" name="comunicacao" rows="2" placeholder="Stakeholders, canais, mensagens..."></textarea></div>
                    <div class="form-group"><label>Ações Tomadas</label><textarea class="form-control" name="acoes_tomadas" rows="2"></textarea></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditCrise" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Crise</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_crise">
                <input type="hidden" name="idcrise" id="editcr_idcrise">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" id="editcr_titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo" id="editcr_tipo"><option value="OPERACIONAL">Operacional</option><option value="REPUTACIONAL">Reputacional</option><option value="CIBERNETICO">Cibernético</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="editcr_descricao" rows="3"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Nível</label><select class="form-control" name="nivel" id="editcr_nivel"><option value="BAIXO">Baixo</option><option value="MEDIO">Médio</option><option value="ALTO">Alto</option></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status" id="editcr_status"><option value="MONITORANDO">Monitorando</option><option value="EM_ANDAMENTO">Em Andamento</option><option value="RESOLVIDO">Resolvido</option></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Data Início</label><input type="datetime-local" class="form-control" name="data_inicio" id="editcr_data_inicio"></div></div>
                    </div>
                    <div class="form-group"><label>Comitê</label><input type="text" class="form-control" name="comite" id="editcr_comite"></div>
                    <div class="form-group"><label>Escalonamento</label><textarea class="form-control" name="escalonamento" id="editcr_escalonamento" rows="2"></textarea></div>
                    <div class="form-group"><label>Comunicação</label><textarea class="form-control" name="comunicacao" id="editcr_comunicacao" rows="2"></textarea></div>
                    <div class="form-group"><label>Ações</label><textarea class="form-control" name="acoes_tomadas" id="editcr_acoes_tomadas" rows="2"></textarea></div>
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
    if (!$.fn.DataTable.isDataTable('#tbl_crises')) {
        $('#tbl_crises').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-edit-crise').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_crise/' + id, function(data) {
            $('#editcr_idcrise').val(data.idcrise); $('#editcr_titulo').val(data.titulo);
            $('#editcr_tipo').val(data.tipo); $('#editcr_descricao').val(data.descricao);
            $('#editcr_nivel').val(data.nivel); $('#editcr_status').val(data.status);
            if (data.data_inicio) $('#editcr_data_inicio').val(data.data_inicio.replace(' ', 'T'));
            $('#editcr_comite').val(data.comite); $('#editcr_escalonamento').val(data.escalonamento);
            $('#editcr_comunicacao').val(data.comunicacao); $('#editcr_acoes_tomadas').val(data.acoes_tomadas);
            $('#modalEditCrise').modal('show');
        });
    });
});
</script>
