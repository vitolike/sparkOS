<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link active" href="<?= base_url(); ?>orcamentos/lista"><i class="fas fa-file-invoice-dollar"></i> Orçamentos</a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>
<div class="my-3 p-4 rounded box-shadow"><div class="row align-items-center"><div class="col-md-6"><h5 class="card-title mb-1"><i class="fas fa-file-invoice-dollar mr-2 text-primary"></i> <b>Orçamentos e Propostas</b></h5></div><div class="col-md-6 text-md-right mt-3 mt-md-0"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus mr-1"></i> Novo Orçamento</button></div></div></div>
<div class="p-4 rounded box-shadow" style="background: white;">
<div class="table-responsive">
<table class="table table-hover" id="tbl_orcamentos"><thead><tr><th>Código</th><th>Título</th><th>Cliente</th><th>Valor</th><th>Desconto</th><th>Total</th><th>Validade</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
<tbody><?php foreach ($orcamentos as $o): ?><tr><td style="font-size: 12px;"><?= $o->codigo; ?></td><td><span class="font-weight-bold" style="font-size: 13px;"><?= $o->titulo; ?></span></td><td style="font-size: 12px;"><?= $o->cliente_nome ?: '-'; ?></td><td style="font-size: 12px;">R$ <?= number_format($o->valor_total, 2, ',', '.'); ?></td><td style="font-size: 12px;">R$ <?= number_format($o->desconto, 2, ',', '.'); ?></td><td class="font-weight-bold" style="font-size: 14px;">R$ <?= number_format($o->valor_final, 2, ',', '.'); ?></td><td style="font-size: 11px;"><?= $o->validade ? date('d/m/Y', strtotime($o->validade)) : '-'; ?></td><td><span class="badge badge-pill badge-<?= $o->status == 'APROVADO' ? 'success' : ($o->status == 'ENVIADO' ? 'info' : ($o->status == 'REJEITADO' ? 'danger' : ($o->status == 'EXPIRADO' ? 'secondary' : 'warning'))); ?>"><?= $o->status; ?></span></td><td class="text-right">
<?php if ($o->status == 'RASCUNHO'): ?><a href="<?= base_url(); ?>orcamentos/update_status/<?= $o->idorcamento; ?>/ENVIADO" class="btn btn-sm btn-outline-info py-1 px-2" title="Enviar"><i class="fas fa-paper-plane"></i></a><?php endif; ?>
<?php if ($o->status == 'ENVIADO'): ?><a href="<?= base_url(); ?>orcamentos/update_status/<?= $o->idorcamento; ?>/APROVADO" class="btn btn-sm btn-outline-success py-1 px-2" title="Aprovar"><i class="fas fa-check"></i></a><?php endif; ?>
<button class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit" data-id="<?= $o->idorcamento; ?>"><i class="fas fa-edit"></i></button>
<a href="<?= base_url(); ?>orcamentos/delete/<?= $o->idorcamento; ?>" class="btn btn-sm btn-outline-danger py-1 px-2" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
</td></tr><?php endforeach; ?></tbody></table></div></div></div>

<div class="modal fade" id="modalAdd" tabindex="-1"><div class="modal-dialog modal-lg modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-file-invoice-dollar mr-2 text-primary"></i> Novo Orçamento</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>orcamentos/adicionar"><div class="modal-body p-4">
<div class="row"><div class="col-md-6"><div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" required></div></div><div class="col-md-3"><div class="form-group"><label>Código</label><input type="text" class="form-control" name="codigo" placeholder="Auto"></div></div><div class="col-md-3"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="RASCUNHO">Rascunho</option><option value="ENVIADO">Enviado</option><option value="APROVADO">Aprovado</option></select></div></div></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Cliente</label><select class="form-control" name="clientesid"><option value="">Selecione</option><?php foreach ($clientes as $c): ?><option value="<?= $c->clientesid; ?>"><?= $c->nome; ?></option><?php endforeach; ?></select></div></div><div class="col-md-3"><div class="form-group"><label>Validade</label><input type="date" class="form-control" name="validade"></div></div><div class="col-md-3"><div class="form-group"><label>Desconto (R$)</label><input type="number" step="0.01" class="form-control" name="desconto" value="0"></div></div></div>
<div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
<h6 class="mb-2">Itens</h6>
<div id="itens-container"><div class="row item-row mb-2"><div class="col-md-6"><input type="text" class="form-control form-control-sm" name="item_desc_0" placeholder="Descrição"></div><div class="col-md-2"><input type="number" class="form-control form-control-sm item-qtd" name="item_qtd_0" value="1" min="1"></div><div class="col-md-2"><input type="number" step="0.01" class="form-control form-control-sm item-valor" name="item_val_0" placeholder="Valor" value="0"></div><div class="col-md-2"><button type="button" class="btn btn-success btn-sm btn-add-item"><i class="fas fa-plus"></i></button></div></div></div>
<input type="hidden" name="itens_json" id="itens_json" value="[]">
<div class="row mt-2"><div class="col-md-8"></div><div class="col-md-4 text-right"><strong>Total: R$ <span id="preview_total">0,00</span></strong></div></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Salvar</button></div></form></div></div></div>

<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('#tbl_orcamentos')) $('#tbl_orcamentos').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 15, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    var itemIdx = 1;
    $(document).on('click', '.btn-add-item', function() {
        var html = '<div class="row item-row mb-2"><div class="col-md-6"><input type="text" class="form-control form-control-sm" name="item_desc_'+itemIdx+'" placeholder="Descrição"></div><div class="col-md-2"><input type="number" class="form-control form-control-sm item-qtd" name="item_qtd_'+itemIdx+'" value="1" min="1"></div><div class="col-md-2"><input type="number" step="0.01" class="form-control form-control-sm item-valor" name="item_val_'+itemIdx+'" placeholder="Valor"></div><div class="col-md-2"><button type="button" class="btn btn-danger btn-sm btn-remove-item"><i class="fas fa-times"></i></button></div></div>';
        $('#itens-container').append(html); itemIdx++;
    });
    $(document).on('click', '.btn-remove-item', function() { $(this).closest('.item-row').remove(); recalcular(); });
    $(document).on('input', '.item-qtd, .item-valor', function() { recalcular(); });
    function recalcular() {
        var itens = []; var total = 0;
        $('.item-row').each(function() {
            var desc = $(this).find('input[name^="item_desc_"]').val();
            var qtd = parseFloat($(this).find('.item-qtd').val()) || 1;
            var val = parseFloat($(this).find('.item-valor').val()) || 0;
            if (desc) { itens.push({descricao: desc, quantidade: qtd, valor: val}); total += qtd * val; }
        });
        $('#itens_json').val(JSON.stringify(itens));
        $('#preview_total').text(total.toFixed(2).replace('.', ','));
    }
});
</script>
