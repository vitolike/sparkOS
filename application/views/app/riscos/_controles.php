<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-shield-virus mr-2 text-primary"></i> Controles Mitigatórios</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddControle"><i class="fas fa-plus mr-1"></i> Novo Controle</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_controles">
            <thead><tr><th>Título</th><th>Risco Associado</th><th>Tipo</th><th>Efetividade</th><th>Frequência</th><th>Responsável</th><th>Revisão</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($controles as $c): ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 13px;"><?= $c->titulo; ?></span></td>
                    <td style="font-size: 12px;"><?= $c->risco_codigo ? ($c->risco_codigo . ' - ' . substr($c->risco_titulo, 0, 30)) : '-'; ?></td>
                    <td><span class="badge badge-pill badge-<?= $c->tipo == 'PREVENTIVO' ? 'info' : ($c->tipo == 'DETECTIVO' ? 'warning' : 'success'); ?>" style="font-size: 9px;"><?= $c->tipo; ?></span></td>
                    <td><span class="badge badge-pill <?= $c->efetividade == 'ALTA' ? 'badge-success' : ($c->efetividade == 'MEDIA' ? 'badge-warning' : 'badge-danger'); ?>" style="font-size: 9px;"><?= ucfirst(strtolower($c->efetividade)); ?></span></td>
                    <td style="font-size: 12px;"><?= $c->frequencia; ?></td>
                    <td style="font-size: 12px;"><?= $c->responsavel ?: '-'; ?></td>
                    <td style="font-size: 11px;"><?= $c->proxima_revisao ? date('d/m/Y', strtotime($c->proxima_revisao)) : '-'; ?></td>
                    <td><span class="badge badge-pill badge-<?= $c->status == 'ATIVO' ? 'success' : 'secondary'; ?>" style="font-size: 9px;"><?= $c->status; ?></span></td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-controle" data-id="<?= $c->idcontrole; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_controle/<?= $c->idcontrole; ?>" class="btn btn-sm btn-outline-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir este controle?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add Controle -->
<div class="modal fade" id="modalAddControle" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-shield-virus mr-2 text-primary"></i> Novo Controle</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_controle">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" required></div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><label>Risco Associado</label>
                                <select class="form-control" name="idrisco">
                                    <option value="">Nenhum</option>
                                    <?php foreach ($riscos_list as $r): ?>
                                        <option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?> - <?= substr($r->titulo, 0, 40); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="3"></textarea></div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group"><label>Tipo</label>
                                <select class="form-control" name="tipo">
                                    <option value="PREVENTIVO">Preventivo</option>
                                    <option value="DETECTIVO">Detectivo</option>
                                    <option value="CORRETIVO">Corretivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Efetividade</label>
                                <select class="form-control" name="efetividade">
                                    <option value="ALTA">Alta</option>
                                    <option value="MEDIA" selected>Média</option>
                                    <option value="BAIXA">Baixa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Frequência</label>
                                <select class="form-control" name="frequencia">
                                    <option value="CONTINUO">Contínuo</option>
                                    <option value="DIARIA">Diária</option>
                                    <option value="SEMANAL">Semanal</option>
                                    <option value="MENSAL">Mensal</option>
                                    <option value="TRIMESTRAL">Trimestral</option>
                                    <option value="ANUAL">Anual</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="ATIVO">Ativo</option>
                                    <option value="INATIVO">Inativo</option>
                                    <option value="EM_IMPLANTACAO">Em Implantação</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Data Implementação</label><input type="date" class="form-control" name="data_implementacao" value="<?= date('Y-m-d'); ?>"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Próxima Revisão</label><input type="date" class="form-control" name="proxima_revisao"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Controle</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Controle -->
<div class="modal fade" id="modalEditControle" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Controle</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_controle">
                <input type="hidden" name="idcontrole" id="editc_idcontrole">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" id="editc_titulo" required></div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><label>Risco</label>
                                <select class="form-control" name="idrisco" id="editc_idrisco">
                                    <option value="">Nenhum</option>
                                    <?php foreach ($riscos_list as $r): ?>
                                        <option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="editc_descricao" rows="3"></textarea></div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group"><label>Tipo</label>
                                <select class="form-control" name="tipo" id="editc_tipo">
                                    <option value="PREVENTIVO">Preventivo</option>
                                    <option value="DETECTIVO">Detectivo</option>
                                    <option value="CORRETIVO">Corretivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Efetividade</label>
                                <select class="form-control" name="efetividade" id="editc_efetividade">
                                    <option value="ALTA">Alta</option>
                                    <option value="MEDIA">Média</option>
                                    <option value="BAIXA">Baixa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Frequência</label>
                                <select class="form-control" name="frequencia" id="editc_frequencia">
                                    <option value="CONTINUO">Contínuo</option>
                                    <option value="DIARIA">Diária</option>
                                    <option value="SEMANAL">Semanal</option>
                                    <option value="MENSAL">Mensal</option>
                                    <option value="TRIMESTRAL">Trimestral</option>
                                    <option value="ANUAL">Anual</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"><label>Status</label>
                                <select class="form-control" name="status" id="editc_status">
                                    <option value="ATIVO">Ativo</option>
                                    <option value="INATIVO">Inativo</option>
                                    <option value="EM_IMPLANTACAO">Em Implantação</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel" id="editc_responsavel"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Implementação</label><input type="date" class="form-control" name="data_implementacao" id="editc_data_implementacao"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Revisão</label><input type="date" class="form-control" name="proxima_revisao" id="editc_proxima_revisao"></div></div>
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
    if (!$.fn.DataTable.isDataTable('#tbl_controles')) {
        $('#tbl_controles').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "order": [[0, 'desc']], "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-edit-controle').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_controle/' + id, function(data) {
            $('#editc_idcontrole').val(data.idcontrole);
            $('#editc_titulo').val(data.titulo);
            $('#editc_idrisco').val(data.idrisco);
            $('#editc_descricao').val(data.descricao);
            $('#editc_tipo').val(data.tipo);
            $('#editc_efetividade').val(data.efetividade);
            $('#editc_frequencia').val(data.frequencia);
            $('#editc_status').val(data.status);
            $('#editc_responsavel').val(data.responsavel);
            if (data.data_implementacao) $('#editc_data_implementacao').val(data.data_implementacao);
            if (data.proxima_revisao) $('#editc_proxima_revisao').val(data.proxima_revisao);
            $('#modalEditControle').modal('show');
        });
    });
});
</script>
