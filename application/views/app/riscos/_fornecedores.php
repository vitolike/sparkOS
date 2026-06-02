<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-truck mr-2 text-primary"></i> Risco de Fornecedores e Terceiros</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddFornecedor"><i class="fas fa-plus mr-1"></i> Novo Fornecedor</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_fornecedores">
            <thead><tr><th>Nome</th><th>CNPJ</th><th>Categoria</th><th>Score</th><th>DD</th><th>Nível Risco</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($fornecedores as $f): ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 13px;"><?= $f->nome; ?></span></td>
                    <td style="font-size: 12px;"><?= $f->cnpj ?: '-'; ?></td>
                    <td style="font-size: 12px;"><?= $f->categoria ?: '-'; ?></td>
                    <td class="font-weight-bold"><?= $f->score_risco; ?></td>
                    <td style="font-size: 11px;"><?= $f->data_avaliacao ? date('d/m/Y', strtotime($f->data_avaliacao)) : '-'; ?></td>
                    <td><span class="badge badge-pill badge-risco-<?= $f->nivel_risco; ?>"><?= $f->nivel_risco; ?></span></td>
                    <td><span class="badge badge-pill badge-<?= $f->status == 'ATIVO' ? 'success' : 'secondary'; ?>" style="font-size: 9px;"><?= $f->status; ?></span></td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-primary py-1 px-2 btn-edit-fornecedor" data-id="<?= $f->idfornecedor; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_fornecedor/<?= $f->idfornecedor; ?>" class="btn btn-sm btn-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add/Edit -->
<div class="modal fade" id="modalAddFornecedor" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-truck mr-2 text-primary"></i> Novo Fornecedor</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_fornecedor">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Nome / Razão Social</label><input type="text" class="form-control" name="nome" required></div></div>
                        <div class="col-md-3"><div class="form-group"><label>CNPJ</label><input type="text" class="form-control" name="cnpj" placeholder="00.000.000/0001-00"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Categoria</label><input type="text" class="form-control" name="categoria" placeholder="Ex: Tecnologia"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><div class="form-group"><label>Score Risco (0-100)</label><input type="number" class="form-control" name="score_risco" min="0" max="100" value="0"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Nível Risco</label><select class="form-control" name="nivel_risco"><option value="BAIXO">Baixo</option><option value="MEDIO">Médio</option><option value="ALTO">Alto</option><option value="CRITICO">Crítico</option></select></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="ATIVO">Ativo</option><option value="EM_AVALIACAO">Em Avaliação</option><option value="BLOQUEADO">Bloqueado</option></select></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Risco</label><select class="form-control" name="idrisco"><option value="">Nenhum</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Data Avaliação</label><input type="date" class="form-control" name="data_avaliacao" value="<?= date('Y-m-d'); ?>"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Próxima Avaliação</label><input type="date" class="form-control" name="proxima_avaliacao"></div></div>
                    </div>
                    <div class="form-group"><label>Due Diligence / Observações</label><textarea class="form-control" name="due_diligence" rows="2"></textarea></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditFornecedor" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Fornecedor</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_fornecedor">
                <input type="hidden" name="idfornecedor" id="editf_idfornecedor">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Nome</label><input type="text" class="form-control" name="nome" id="editf_nome" required></div></div>
                        <div class="col-md-3"><div class="form-group"><label>CNPJ</label><input type="text" class="form-control" name="cnpj" id="editf_cnpj"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Categoria</label><input type="text" class="form-control" name="categoria" id="editf_categoria"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><div class="form-group"><label>Score</label><input type="number" class="form-control" name="score_risco" id="editf_score_risco"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Nível</label><select class="form-control" name="nivel_risco" id="editf_nivel_risco"><option value="BAIXO">Baixo</option><option value="MEDIO">Médio</option><option value="ALTO">Alto</option></select></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Status</label><select class="form-control" name="status" id="editf_status"><option value="ATIVO">Ativo</option><option value="EM_AVALIACAO">Em Avaliação</option></select></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Risco</label><select class="form-control" name="idrisco" id="editf_idrisco"><option value="">Nenhum</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Data Avaliação</label><input type="date" class="form-control" name="data_avaliacao" id="editf_data_avaliacao"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Próx. Avaliação</label><input type="date" class="form-control" name="proxima_avaliacao" id="editf_proxima_avaliacao"></div></div>
                    </div>
                    <div class="form-group"><label>Due Diligence</label><textarea class="form-control" name="due_diligence" id="editf_due_diligence" rows="2"></textarea></div>
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
    if (!$.fn.DataTable.isDataTable('#tbl_fornecedores')) {
        $('#tbl_fornecedores').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-edit-fornecedor').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_fornecedor/' + id, function(data) {
            $('#editf_idfornecedor').val(data.idfornecedor); $('#editf_nome').val(data.nome);
            $('#editf_cnpj').val(data.cnpj); $('#editf_categoria').val(data.categoria);
            $('#editf_score_risco').val(data.score_risco); $('#editf_nivel_risco').val(data.nivel_risco);
            $('#editf_status').val(data.status); $('#editf_idrisco').val(data.idrisco);
            if (data.data_avaliacao) $('#editf_data_avaliacao').val(data.data_avaliacao);
            if (data.proxima_avaliacao) $('#editf_proxima_avaliacao').val(data.proxima_avaliacao);
            $('#editf_due_diligence').val(data.due_diligence);
            $('#modalEditFornecedor').modal('show');
        });
    });
});
</script>
