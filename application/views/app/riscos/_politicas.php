<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-file-alt mr-2 text-primary"></i> Políticas e Normas</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddPolitica"><i class="fas fa-plus mr-1"></i> Nova Política</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_politicas">
            <thead><tr><th>Título</th><th>Versão</th><th>Área</th><th>Resp.</th><th>Aprovação</th><th>Revisão</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($politicas as $p): ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 13px;"><?= $p->titulo; ?></span></td>
                    <td><span class="badge badge-pill badge-secondary" style="font-size: 9px;">v<?= $p->versao; ?></span></td>
                    <td style="font-size: 12px;"><?= $p->area ?: '-'; ?></td>
                    <td style="font-size: 12px;"><?= $p->responsavel ?: '-'; ?></td>
                    <td style="font-size: 11px;"><?= $p->data_aprovacao ? date('d/m/Y', strtotime($p->data_aprovacao)) : '-'; ?></td>
                    <td style="font-size: 11px;"><?= $p->data_revisao ? date('d/m/Y', strtotime($p->data_revisao)) : '-'; ?></td>
                    <td><span class="badge badge-pill badge-<?= $p->status == 'APROVADA' ? 'success' : ($p->status == 'REVISAO' ? 'warning' : 'info'); ?>" style="font-size: 9px;"><?= $p->status; ?></span></td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-primary py-1 px-2 btn-edit-politica" data-id="<?= $p->idpolitica; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_politica/<?= $p->idpolitica; ?>" class="btn btn-sm btn-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add/Edit -->
<div class="modal fade" id="modalAddPolitica" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-file-alt mr-2 text-primary"></i> Nova Política</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_politica">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Versão</label><input type="text" class="form-control" name="versao" value="1.0"></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Área</label><input type="text" class="form-control" name="area" placeholder="Ex: Segurança"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="APROVADA">Aprovada</option><option value="REVISAO">Em Revisão</option><option value="RASCUNHO">Rascunho</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Data Aprovação</label><input type="date" class="form-control" name="data_aprovacao" value="<?= date('Y-m-d'); ?>"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Data Revisão</label><input type="date" class="form-control" name="data_revisao"></div></div>
                    </div>
                    <div class="form-group"><label>Conteúdo</label><textarea class="form-control" name="conteudo" rows="5" placeholder="Insira o conteúdo completo da política..."></textarea></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditPolitica" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Política</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_politica">
                <input type="hidden" name="idpolitica" id="editpl_idpolitica">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" id="editpl_titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Versão</label><input type="text" class="form-control" name="versao" id="editpl_versao"></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="editpl_descricao" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Área</label><input type="text" class="form-control" name="area" id="editpl_area"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel" id="editpl_responsavel"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status" id="editpl_status"><option value="APROVADA">Aprovada</option><option value="REVISAO">Em Revisão</option><option value="RASCUNHO">Rascunho</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Data Aprovação</label><input type="date" class="form-control" name="data_aprovacao" id="editpl_data_aprovacao"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Data Revisão</label><input type="date" class="form-control" name="data_revisao" id="editpl_data_revisao"></div></div>
                    </div>
                    <div class="form-group"><label>Conteúdo</label><textarea class="form-control" name="conteudo" id="editpl_conteudo" rows="5"></textarea></div>
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
    if (!$.fn.DataTable.isDataTable('#tbl_politicas')) {
        $('#tbl_politicas').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-edit-politica').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_politica/' + id, function(data) {
            $('#editpl_idpolitica').val(data.idpolitica); $('#editpl_titulo').val(data.titulo);
            $('#editpl_descricao').val(data.descricao); $('#editpl_versao').val(data.versao);
            $('#editpl_area').val(data.area); $('#editpl_responsavel').val(data.responsavel);
            $('#editpl_status').val(data.status);
            if (data.data_aprovacao) $('#editpl_data_aprovacao').val(data.data_aprovacao);
            if (data.data_revisao) $('#editpl_data_revisao').val(data.data_revisao);
            $('#editpl_conteudo').val(data.conteudo);
            $('#modalEditPolitica').modal('show');
        });
    });
});
</script>
