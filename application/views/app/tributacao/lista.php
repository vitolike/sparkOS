<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link active" href="<?= base_url(); ?>tributacao/lista"><i class="fas fa-balance-scale"></i> Tributação</a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>
<div class="my-3 p-4 rounded box-shadow"><div class="row align-items-center"><div class="col-md-6"><h5 class="card-title mb-1"><i class="fas fa-balance-scale mr-2 text-primary"></i> <b>Tributação</b></h5><p class="text-muted mb-0" style="font-size: 13px;">Cadastro de tributos, alíquotas e obrigações fiscais.</p></div><div class="col-md-6 text-md-right mt-3 mt-md-0"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus mr-1"></i> Novo Tributo</button></div></div></div>
<div class="p-4 rounded box-shadow" style="background: white;">
<table class="table table-hover" id="tbl_tributos"><thead><tr><th>Código</th><th>Nome</th><th>Tipo</th><th>Alíquota</th><th>Base de Cálculo</th><th>Periodicidade</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
<tbody><?php foreach ($tributos as $t): ?><tr><td><code><?= $t->codigo ?: '-'; ?></code></td><td><span class="font-weight-bold" style="font-size: 13px;"><?= $t->nome; ?></span></td><td><span class="badge badge-pill badge-<?= $t->tipo == 'FEDERAL' ? 'info' : ($t->tipo == 'ESTADUAL' ? 'warning' : 'success'); ?>"><?= $t->tipo; ?></span></td><td class="font-weight-bold"><?= number_format($t->aliquota, 2); ?>%</td><td style="font-size: 12px;"><?= $t->base_calculo ?: '-'; ?></td><td style="font-size: 12px;"><?= ucfirst(strtolower($t->periodicidade)); ?></td><td><span class="badge badge-pill badge-<?= $t->status == 'ATIVO' ? 'success' : 'secondary'; ?>"><?= $t->status; ?></span></td><td class="text-right"><button class="btn btn-sm btn-primary py-1 px-2 btn-edit" data-id="<?= $t->idtributo; ?>"><i class="fas fa-edit"></i></button><a href="<?= base_url(); ?>tributacao/delete/<?= $t->idtributo; ?>" class="btn btn-sm btn-danger py-1 px-2" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a></td></tr><?php endforeach; ?></tbody></table></div></div>

<div class="modal fade" id="modalAdd" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-plus mr-2 text-primary"></i> Novo Tributo</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>tributacao/adicionar"><div class="modal-body p-3">
<div class="row"><div class="col-md-4"><div class="form-group"><label>Código</label><input type="text" class="form-control" name="codigo"></div></div><div class="col-md-8"><div class="form-group"><label>Nome</label><input type="text" class="form-control" name="nome" required></div></div></div>
<div class="form-group"><label>Descrição</label><input type="text" class="form-control" name="descricao"></div>
<div class="row"><div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo"><option value="FEDERAL">Federal</option><option value="ESTADUAL">Estadual</option><option value="MUNICIPAL">Municipal</option></select></div></div><div class="col-md-4"><div class="form-group"><label>Alíquota (%)</label><input type="number" step="0.01" class="form-control" name="aliquota"></div></div><div class="col-md-4"><div class="form-group"><label>Periodicidade</label><select class="form-control" name="periodicidade"><option value="MENSAL">Mensal</option><option value="TRIMESTRAL">Trimestral</option><option value="ANUAL">Anual</option></select></div></div></div>
<div class="form-group"><label>Base de Cálculo</label><input type="text" class="form-control" name="base_calculo"></div>
<div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="ATIVO">Ativo</option><option value="INATIVO">Inativo</option></select></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Salvar</button></div></form></div></div></div>

<div class="modal fade" id="modalEdit" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Tributo</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>tributacao/update"><input type="hidden" name="idtributo" id="edit_id"><div class="modal-body p-3">
<div class="row"><div class="col-md-4"><div class="form-group"><label>Código</label><input type="text" class="form-control" name="codigo" id="edit_codigo"></div></div><div class="col-md-8"><div class="form-group"><label>Nome</label><input type="text" class="form-control" name="nome" id="edit_nome" required></div></div></div>
<div class="form-group"><label>Descrição</label><input type="text" class="form-control" name="descricao" id="edit_descricao"></div>
<div class="row"><div class="col-md-4"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo" id="edit_tipo"><option value="FEDERAL">Federal</option><option value="ESTADUAL">Estadual</option><option value="MUNICIPAL">Municipal</option></select></div></div><div class="col-md-4"><div class="form-group"><label>Alíquota</label><input type="number" step="0.01" class="form-control" name="aliquota" id="edit_aliquota"></div></div><div class="col-md-4"><div class="form-group"><label>Periodicidade</label><select class="form-control" name="periodicidade" id="edit_periodicidade"><option value="MENSAL">Mensal</option><option value="TRIMESTRAL">Trimestral</option><option value="ANUAL">Anual</option></select></div></div></div>
<div class="form-group"><label>Base de Cálculo</label><input type="text" class="form-control" name="base_calculo" id="edit_base_calculo"></div>
<div class="form-group"><label>Status</label><select class="form-control" name="status" id="edit_status"><option value="ATIVO">Ativo</option><option value="INATIVO">Inativo</option></select></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Atualizar</button></div></form></div></div></div>

<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('#tbl_tributos')) $('#tbl_tributos').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 15, "order": [[1, 'asc']], "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    $('.btn-edit').on('click', function() {
        $.getJSON('<?= base_url(); ?>tributacao/get/' + $(this).data('id'), function(data) {
            $('#edit_id').val(data.idtributo); $('#edit_codigo').val(data.codigo); $('#edit_nome').val(data.nome);
            $('#edit_descricao').val(data.descricao); $('#edit_tipo').val(data.tipo); $('#edit_aliquota').val(data.aliquota);
            $('#edit_periodicidade').val(data.periodicidade); $('#edit_base_calculo').val(data.base_calculo);
            $('#edit_status').val(data.status);
            $('#modalEdit').modal('show');
        });
    });
});
</script>
