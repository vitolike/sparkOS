<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-users-cog mr-2 text-primary"></i> Comitês de Governança</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddComite"><i class="fas fa-plus mr-1"></i> Novo Comitê</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_comites">
            <thead><tr><th>Nome</th><th>Periodicidade</th><th>Membros</th><th>Últ. Reunião</th><th>Próx. Reunião</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($comites as $c): ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 13px;"><?= $c->nome; ?></span></td>
                    <td style="font-size: 12px;"><?= $c->periodicidade; ?></td>
                    <td style="font-size: 11px;"><?= substr($c->membros, 0, 40) . (strlen($c->membros) > 40 ? '...' : ''); ?></td>
                    <td style="font-size: 11px;"><?= $c->ultima_reuniao ? date('d/m/Y', strtotime($c->ultima_reuniao)) : '-'; ?></td>
                    <td style="font-size: 11px;"><?= $c->proxima_reuniao ? date('d/m/Y', strtotime($c->proxima_reuniao)) : '-'; ?></td>
                    <td><span class="badge badge-pill badge-<?= $c->status == 'ATIVO' ? 'success' : 'secondary'; ?>" style="font-size: 9px;"><?= $c->status; ?></span></td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-primary py-1 px-2 btn-edit-comite" data-id="<?= $c->idcomite; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_comite/<?= $c->idcomite; ?>" class="btn btn-sm btn-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add/Edit -->
<div class="modal fade" id="modalAddComite" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-users-cog mr-2 text-primary"></i> Novo Comitê</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_comite">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Nome do Comitê</label><input type="text" class="form-control" name="nome" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Periodicidade</label><select class="form-control" name="periodicidade"><option value="SEMANAL">Semanal</option><option value="QUINZENAL">Quinzenal</option><option value="MENSAL" selected>Mensal</option><option value="TRIMESTRAL">Trimestral</option><option value="ANUAL">Anual</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
                    <div class="form-group"><label>Membros</label><textarea class="form-control" name="membros" rows="2" placeholder="Liste os membros do comitê..."></textarea></div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Última Reunião</label><input type="date" class="form-control" name="ultima_reuniao"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Próxima Reunião</label><input type="date" class="form-control" name="proxima_reuniao"></div></div>
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

<div class="modal fade" id="modalEditComite" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Comitê</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_comite">
                <input type="hidden" name="idcomite" id="editcm_idcomite">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Nome</label><input type="text" class="form-control" name="nome" id="editcm_nome" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Periodicidade</label><select class="form-control" name="periodicidade" id="editcm_periodicidade"><option value="SEMANAL">Semanal</option><option value="MENSAL">Mensal</option><option value="TRIMESTRAL">Trimestral</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="editcm_descricao" rows="2"></textarea></div>
                    <div class="form-group"><label>Membros</label><textarea class="form-control" name="membros" id="editcm_membros" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Últ. Reunião</label><input type="date" class="form-control" name="ultima_reuniao" id="editcm_ultima_reuniao"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Próx. Reunião</label><input type="date" class="form-control" name="proxima_reuniao" id="editcm_proxima_reuniao"></div></div>
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
    if (!$.fn.DataTable.isDataTable('#tbl_comites')) {
        $('#tbl_comites').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-edit-comite').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_comite/' + id, function(data) {
            $('#editcm_idcomite').val(data.idcomite); $('#editcm_nome').val(data.nome);
            $('#editcm_descricao').val(data.descricao); $('#editcm_periodicidade').val(data.periodicidade);
            $('#editcm_membros').val(data.membros);
            if (data.ultima_reuniao) $('#editcm_ultima_reuniao').val(data.ultima_reuniao);
            if (data.proxima_reuniao) $('#editcm_proxima_reuniao').val(data.proxima_reuniao);
            $('#modalEditComite').modal('show');
        });
    });
});
</script>
