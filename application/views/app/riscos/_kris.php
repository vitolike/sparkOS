<div class="p-4 rounded box-shadow" style="background: white;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="card-title mb-0" style="font-size: 15px;"><i class="fas fa-chart-line mr-2 text-primary"></i> Key Risk Indicators (KRIs)</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddKri"><i class="fas fa-plus mr-1"></i> Novo KRI</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tbl_kris">
            <thead><tr><th>Indicador</th><th>Risco</th><th>Valor Atual</th><th>Limites</th><th>Un.</th><th>Per.</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
            <tbody>
                <?php foreach ($kris as $k): ?>
                <?php $kri_color = $k->valor_atual >= $k->limite_vermelho ? '#dc2626' : ($k->valor_atual >= $k->limite_amarelo ? '#d97706' : '#059669'); ?>
                <tr>
                    <td><span class="font-weight-bold" style="font-size: 13px;"><?= $k->nome; ?></span></td>
                    <td style="font-size: 12px;"><?= $k->risco_codigo ?: '-'; ?></td>
                    <td><span class="font-weight-bold" style="font-size: 16px; color: <?= $kri_color; ?>;"><?= $k->valor_atual . $k->unidade; ?></span></td>
                    <td style="font-size: 11px;">
                        <span class="text-success">V: ≤<?= $k->limite_verde . $k->unidade; ?></span> |
                        <span class="text-warning">A: ≤<?= $k->limite_amarelo . $k->unidade; ?></span> |
                        <span class="text-danger">R: ><?= $k->limite_vermelho . $k->unidade; ?></span>
                    </td>
                    <td><?= $k->unidade; ?></td>
                    <td style="font-size: 11px;"><?= $k->periodicidade; ?></td>
                    <td><span class="badge badge-pill badge-<?= $k->status == 'ATIVO' ? 'success' : 'secondary'; ?>" style="font-size: 9px;"><?= $k->status; ?></span></td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-outline-success py-1 px-2 btn-add-kri-valor" data-id="<?= $k->idkri; ?>" data-nome="<?= $k->nome; ?>" style="font-size: 11px;" title="Registrar Valor"><i class="fas fa-plus-circle"></i></button>
                        <button class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-kri" data-id="<?= $k->idkri; ?>" style="font-size: 11px;"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url(); ?>riscos/delete_kri/<?= $k->idkri; ?>" class="btn btn-sm btn-outline-danger py-1 px-2" style="font-size: 11px;" onclick="return confirm('Excluir KRI?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add KRI -->
<div class="modal fade" id="modalAddKri" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-chart-line mr-2 text-primary"></i> Novo KRI</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_kri">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Nome do Indicador</label><input type="text" class="form-control" name="nome" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Risco Associado</label><select class="form-control" name="idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-3"><div class="form-group"><label>Unidade</label><select class="form-control" name="unidade"><option value="%">%</option><option value="un">un</option><option value="R$">R$</option><option value="h">h</option><option value="dias">dias</option></select></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Valor Atual</label><input type="number" step="0.01" class="form-control" name="valor_atual" value="0"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Periodicidade</label><select class="form-control" name="periodicidade"><option value="DIARIO">Diário</option><option value="SEMANAL">Semanal</option><option value="MENSAL" selected>Mensal</option><option value="TRIMESTRAL">Trimestral</option></select></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Diretriz</label><select class="form-control" name="diretriz"><option value="MAIOR_MELHOR">Maior é Melhor</option><option value="MENOR_MELHOR">Menor é Melhor</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Limite Verde (até)</label><input type="number" step="0.01" class="form-control" name="limite_verde" value="30"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Limite Amarelo (até)</label><input type="number" step="0.01" class="form-control" name="limite_amarelo" value="60"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Limite Vermelho (acima)</label><input type="number" step="0.01" class="form-control" name="limite_vermelho" value="80"></div></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar KRI</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Add KRI Value -->
<div class="modal fade" id="modalAddKriValor" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-plus-circle mr-2 text-success"></i> Registrar Valor do KRI</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/add_kri_valor">
                <input type="hidden" name="idkri" id="kri_valor_id">
                <div class="modal-body p-4">
                    <p><strong id="kri_valor_nome"></strong></p>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Valor</label><input type="number" step="0.01" class="form-control" name="valor" required></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Data/Hora</label><input type="datetime-local" class="form-control" name="data_registro" value="<?= date('Y-m-d\TH:i'); ?>"></div></div>
                    </div>
                    <div class="form-group"><label>Observação</label><input type="text" class="form-control" name="observacao"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit KRI -->
<div class="modal fade" id="modalEditKri" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar KRI</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form method="post" action="<?= base_url(); ?>riscos/update_kri">
                <input type="hidden" name="idkri" id="editk_idkri">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Nome</label><input type="text" class="form-control" name="nome" id="editk_nome" required></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Risco</label><select class="form-control" name="idrisco" id="editk_idrisco"><option value="">Nenhum</option><?php foreach ($riscos_list as $r): ?><option value="<?= $r->idrisco; ?>"><?= $r->codigo; ?></option><?php endforeach; ?></select></div></div>
                    </div>
                    <div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="editk_descricao" rows="2"></textarea></div>
                    <div class="row">
                        <div class="col-md-3"><div class="form-group"><label>Unidade</label><select class="form-control" name="unidade" id="editk_unidade"><option value="%">%</option><option value="un">un</option><option value="R$">R$</option><option value="h">h</option></select></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Valor Atual</label><input type="number" step="0.01" class="form-control" name="valor_atual" id="editk_valor_atual"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Periodicidade</label><select class="form-control" name="periodicidade" id="editk_periodicidade"><option value="DIARIO">Diário</option><option value="SEMANAL">Semanal</option><option value="MENSAL">Mensal</option><option value="TRIMESTRAL">Trimestral</option></select></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Diretriz</label><select class="form-control" name="diretriz" id="editk_diretriz"><option value="MAIOR_MELHOR">Maior é Melhor</option><option value="MENOR_MELHOR">Menor é Melhor</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Limite Verde</label><input type="number" step="0.01" class="form-control" name="limite_verde" id="editk_limite_verde"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Limite Amarelo</label><input type="number" step="0.01" class="form-control" name="limite_amarelo" id="editk_limite_amarelo"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Limite Vermelho</label><input type="number" step="0.01" class="form-control" name="limite_vermelho" id="editk_limite_vermelho"></div></div>
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
    if (!$.fn.DataTable.isDataTable('#tbl_kris')) {
        $('#tbl_kris').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 10, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    }
    $('.btn-add-kri-valor').on('click', function() {
        $('#kri_valor_id').val($(this).data('id'));
        $('#kri_valor_nome').text($(this).data('nome'));
        $('#modalAddKriValor').modal('show');
    });
    $('.btn-edit-kri').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>riscos/get_kri/' + id, function(data) {
            $('#editk_idkri').val(data.idkri);
            $('#editk_nome').val(data.nome);
            $('#editk_idrisco').val(data.idrisco);
            $('#editk_descricao').val(data.descricao);
            $('#editk_unidade').val(data.unidade);
            $('#editk_valor_atual').val(data.valor_atual);
            $('#editk_periodicidade').val(data.periodicidade);
            $('#editk_diretriz').val(data.diretriz);
            $('#editk_limite_verde').val(data.limite_verde);
            $('#editk_limite_amarelo').val(data.limite_amarelo);
            $('#editk_limite_vermelho').val(data.limite_vermelho);
            $('#modalEditKri').modal('show');
        });
    });
});
</script>
