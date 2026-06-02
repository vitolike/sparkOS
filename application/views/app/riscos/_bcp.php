<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-life-ring mr-2 text-primary"></i> Continuidade de Negócios (BCP)</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddBcp"><i class="fas fa-plus mr-1"></i> Novo Plano</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_bcp">
            <thead><tr><th>Título</th><th>Tipo</th><th>RTO</th><th>RPO</th><th>MTD</th><th>Resp.</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($bcp as $b): ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 13px;"><?= $b->titulo; ?></span></td>
                    <td><span class="badge badge-pill badge-info" style="font-size: 9px;"><?= $b->tipo; ?></span></td>
                    <td style="font-size: 12px;"><?= $b->rto_horas ? $b->rto_horas . 'h' : '-'; ?></td>
                    <td style="font-size: 12px;"><?= $b->rpo_horas ? $b->rpo_horas . 'h' : '-'; ?></td>
                    <td style="font-size: 12px;"><?= $b->mtd_horas ? $b->mtd_horas . 'h' : '-'; ?></td>
                    <td style="font-size: 12px;"><?= $b->responsavel ?: '-'; ?></td>
                    <td><span class="badge badge-pill badge-<?= $b->status == 'ATIVO' ? 'success' : 'warning'; ?>" style="font-size: 9px;"><?= $b->status; ?></span></td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-bcp" data-id="<?= $b->idbcp; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_bcp/<?= $b->idbcp; ?>" class="btn btn-sm btn-outline-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add/Edit -->
<div class="modal fade" id="modalAddBcp" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-life-ring mr-2 text-primary"></i> Novo Plano de Continuidade</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_bcp">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo"><option value="BIA">BIA</option><option value="BCP">BCP</option><option value="DRP">DRP</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
                    <div class="form-group"><label>Impacto no Negócio</label><textarea class="form-control" name="impacto_negocio" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>MTD (horas)</label><input type="number" class="form-control" name="mtd_horas" placeholder="Máx. Tempo Indisponível"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>RPO (horas)</label><input type="number" class="form-control" name="rpo_horas" placeholder="Perda de Dados Aceitável"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>RTO (horas)</label><input type="number" class="form-control" name="rto_horas" placeholder="Tempo Recuperação"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Risco Associado</label><select class="form-control" name="idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="ATIVO">Ativo</option><option value="REVISAO">Em Revisão</option><option value="DESATIVADO">Desativado</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Último Teste</label><input type="date" class="form-control" name="ultimo_teste"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Próximo Teste</label><input type="date" class="form-control" name="proximo_teste"></div></div>
                    </div>
                    <div class="form-group"><label>Recursos Críticos</label><textarea class="form-control" name="recursos_criticos" rows="2"></textarea></div>
                    <div class="form-group"><label>Plano de Recuperação</label><textarea class="form-control" name="plano_recuperacao" rows="3"></textarea></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditBcp" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar BCP</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_bcp">
                <input type="hidden" name="idbcp" id="editbcp_idbcp">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" id="editbcp_titulo" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo" id="editbcp_tipo"><option value="BIA">BIA</option><option value="BCP">BCP</option><option value="DRP">DRP</option></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="editbcp_descricao" rows="2"></textarea></div>
                    <div class="form-group"><label>Impacto</label><textarea class="form-control" name="impacto_negocio" id="editbcp_impacto_negocio" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>MTD (h)</label><input type="number" class="form-control" name="mtd_horas" id="editbcp_mtd_horas"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>RPO (h)</label><input type="number" class="form-control" name="rpo_horas" id="editbcp_rpo_horas"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>RTO (h)</label><input type="number" class="form-control" name="rto_horas" id="editbcp_rto_horas"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel" id="editbcp_responsavel"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Risco</label><select class="form-control" name="idrisco" id="editbcp_idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Status</label><select class="form-control" name="status" id="editbcp_status"><option value="ATIVO">Ativo</option><option value="REVISAO">Revisão</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Últ. Teste</label><input type="date" class="form-control" name="ultimo_teste" id="editbcp_ultimo_teste"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Próx. Teste</label><input type="date" class="form-control" name="proximo_teste" id="editbcp_proximo_teste"></div></div>
                    </div>
                    <div class="form-group"><label>Recursos Críticos</label><textarea class="form-control" name="recursos_criticos" id="editbcp_recursos_criticos" rows="2"></textarea></div>
                    <div class="form-group"><label>Plano Recuperação</label><textarea class="form-control" name="plano_recuperacao" id="editbcp_plano_recuperacao" rows="3"></textarea></div>
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
    if (!$.fn.DataTable.isDataTable('#tbl_bcp')) {
        $('#tbl_bcp').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-edit-bcp').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_bcp/' + id, function(data) {
            $('#editbcp_idbcp').val(data.idbcp); $('#editbcp_titulo').val(data.titulo);
            $('#editbcp_tipo').val(data.tipo); $('#editbcp_descricao').val(data.descricao);
            $('#editbcp_impacto_negocio').val(data.impacto_negocio);
            $('#editbcp_mtd_horas').val(data.mtd_horas); $('#editbcp_rpo_horas').val(data.rpo_horas);
            $('#editbcp_rto_horas').val(data.rto_horas); $('#editbcp_responsavel').val(data.responsavel);
            $('#editbcp_idrisco').val(data.idrisco); $('#editbcp_status').val(data.status);
            if (data.ultimo_teste) $('#editbcp_ultimo_teste').val(data.ultimo_teste);
            if (data.proximo_teste) $('#editbcp_proximo_teste').val(data.proximo_teste);
            $('#editbcp_recursos_criticos').val(data.recursos_criticos);
            $('#editbcp_plano_recuperacao').val(data.plano_recuperacao);
            $('#modalEditBcp').modal('show');
        });
    });
});
</script>
