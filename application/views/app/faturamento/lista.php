<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link active" href="<?= base_url(); ?>faturamento/lista"><i class="fas fa-file-invoice"></i> Faturamento</a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>
<div class="my-3 p-4 rounded box-shadow"><div class="row align-items-center"><div class="col-md-6"><h5 class="card-title mb-1"><i class="fas fa-file-invoice mr-2 text-primary"></i> <b>Faturamento</b></h5><p class="text-muted mb-0" style="font-size: 13px;">Gestão de faturas e recebimentos.</p></div><div class="col-md-6 text-md-right mt-3 mt-md-0"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus mr-1"></i> Nova Fatura</button></div></div></div>
<div class="row mb-4">
<div class="col-md-4"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">TOTAL A RECEBER</span><h3 class="font-weight-bold mb-0" style="color: #f59e0b;">R$ <?= number_format($total_pendente, 2, ',', '.'); ?></h3></div></div>
<div class="col-md-4"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">TOTAL RECEBIDO</span><h3 class="font-weight-bold mb-0" style="color: #059669;">R$ <?= number_format($total_pago, 2, ',', '.'); ?></h3></div></div>
<div class="col-md-4"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">TOTAL GERAL</span><h3 class="font-weight-bold mb-0">R$ <?= number_format($total_pendente + $total_pago, 2, ',', '.'); ?></h3></div></div>
</div>
<div class="p-4 rounded box-shadow" style="background: white;">
<div class="table-responsive">
<table class="table table-hover" id="tbl_faturas"><thead><tr><th>Fatura</th><th>Cliente</th><th>Descrição</th><th>Emissão</th><th>Vencto</th><th>Valor</th><th>Forma</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
<tbody><?php foreach ($faturas as $f): ?><tr><td style="font-size: 12px;"><?= $f->codigo; ?></td><td style="font-size: 12px;"><?= $f->cliente_nome ?: '-'; ?></td><td style="font-size: 12px;"><?= substr($f->descricao, 0, 30); ?></td><td style="font-size: 11px;"><?= $f->data_emissao ? date('d/m/Y', strtotime($f->data_emissao)) : '-'; ?></td><td style="font-size: 11px; <?= $f->status == 'ATRASADO' ? 'color: #dc2626; font-weight: bold;' : ''; ?>"><?= $f->data_vencimento ? date('d/m/Y', strtotime($f->data_vencimento)) : '-'; ?></td><td class="font-weight-bold">R$ <?= number_format($f->valor, 2, ',', '.'); ?></td><td style="font-size: 11px;"><?= $f->forma_pagamento; ?></td><td><span class="badge badge-pill badge-<?= $f->status == 'PAGO' ? 'success' : ($f->status == 'ATRASADO' ? 'danger' : ($f->status == 'PENDENTE' ? 'warning' : 'secondary')); ?>"><?= $f->status; ?></span></td><td class="text-right">
<?php if ($f->status != 'PAGO'): ?><a href="<?= base_url(); ?>faturamento/baixar/<?= $f->idfatura; ?>" class="btn btn-sm btn-success py-1 px-2" title="Baixar"><i class="fas fa-check"></i></a><?php endif; ?>
<button class="btn btn-sm btn-primary py-1 px-2 btn-edit" data-id="<?= $f->idfatura; ?>"><i class="fas fa-edit"></i></button>
<a href="<?= base_url(); ?>faturamento/delete/<?= $f->idfatura; ?>" class="btn btn-sm btn-danger py-1 px-2" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a>
</td></tr><?php endforeach; ?></tbody></table></div></div></div>

<div class="modal fade" id="modalAdd" tabindex="-1"><div class="modal-dialog modal-lg modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-file-invoice mr-2 text-primary"></i> Nova Fatura</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>faturamento/adicionar"><div class="modal-body p-4">
<div class="row"><div class="col-md-6"><div class="form-group"><label>Cliente</label><select class="form-control" name="clientesid" required><option value="">Selecione</option><?php foreach ($clientes as $c): ?><option value="<?= $c->clientesid; ?>"><?= $c->nome; ?></option><?php endforeach; ?></select></div></div><div class="col-md-3"><div class="form-group"><label>Código</label><input type="text" class="form-control" name="codigo" placeholder="Auto"></div></div><div class="col-md-3"><div class="form-group"><label>Valor</label><input type="number" step="0.01" class="form-control" name="valor" required></div></div></div>
<div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
<div class="row"><div class="col-md-4"><div class="form-group"><label>Emissão</label><input type="date" class="form-control" name="data_emissao" value="<?= date('Y-m-d'); ?>"></div></div><div class="col-md-4"><div class="form-group"><label>Vencimento</label><input type="date" class="form-control" name="data_vencimento" required></div></div><div class="col-md-4"><div class="form-group"><label>Forma Pagamento</label><select class="form-control" name="forma_pagamento"><option value="BOLETO">Boleto</option><option value="PIX">Pix</option><option value="CARTAO">Cartão</option><option value="TRANSFERENCIA">Transferência</option><option value="DINHEIRO">Dinheiro</option></select></div></div></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="PENDENTE">Pendente</option><option value="PAGO">Pago</option><option value="CANCELADO">Cancelado</option></select></div></div></div>
<div class="form-group"><label>Observações</label><textarea class="form-control" name="observacoes" rows="2"></textarea></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Salvar</button></div></form></div></div></div>

<div class="modal fade" id="modalEdit" tabindex="-1"><div class="modal-dialog modal-lg modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Fatura</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>faturamento/update"><input type="hidden" name="idfatura" id="edit_id"><div class="modal-body p-4">
<div class="row"><div class="col-md-6"><div class="form-group"><label>Cliente</label><select class="form-control" name="clientesid" id="edit_clientesid" required><option value="">Selecione</option><?php foreach ($clientes as $c): ?><option value="<?= $c->clientesid; ?>"><?= $c->nome; ?></option><?php endforeach; ?></select></div></div><div class="col-md-3"><div class="form-group"><label>Valor</label><input type="number" step="0.01" class="form-control" name="valor" id="edit_valor" required></div></div><div class="col-md-3"><div class="form-group"><label>Forma</label><select class="form-control" name="forma_pagamento" id="edit_forma_pagamento"><option value="BOLETO">Boleto</option><option value="PIX">Pix</option><option value="CARTAO">Cartão</option></select></div></div></div>
<div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" id="edit_descricao" rows="2"></textarea></div>
<div class="row"><div class="col-md-4"><div class="form-group"><label>Emissão</label><input type="date" class="form-control" name="data_emissao" id="edit_data_emissao"></div></div><div class="col-md-4"><div class="form-group"><label>Vencimento</label><input type="date" class="form-control" name="data_vencimento" id="edit_data_vencimento"></div></div><div class="col-md-4"><div class="form-group"><label>Pagamento</label><input type="date" class="form-control" name="data_pagamento" id="edit_data_pagamento"></div></div></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Status</label><select class="form-control" name="status" id="edit_status"><option value="PENDENTE">Pendente</option><option value="PAGO">Pago</option><option value="CANCELADO">Cancelado</option></select></div></div></div>
<div class="form-group"><label>Observações</label><textarea class="form-control" name="observacoes" id="edit_observacoes" rows="2"></textarea></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Atualizar</button></div></form></div></div></div>

<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('#tbl_faturas')) $('#tbl_faturas').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 15, "order": [[3, 'desc']], "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    $('.btn-edit').on('click', function() {
        var id = $(this).data('id');
        $.getJSON('<?= base_url(); ?>faturamento/get/' + id, function(data) {
            $('#edit_id').val(data.idfatura); $('#edit_clientesid').val(data.clientesid);
            $('#edit_valor').val(data.valor); $('#edit_forma_pagamento').val(data.forma_pagamento);
            $('#edit_descricao').val(data.descricao); $('#edit_status').val(data.status);
            if (data.data_emissao) $('#edit_data_emissao').val(data.data_emissao);
            if (data.data_vencimento) $('#edit_data_vencimento').val(data.data_vencimento);
            if (data.data_pagamento) $('#edit_data_pagamento').val(data.data_pagamento);
            $('#edit_observacoes').val(data.observacoes);
            $('#modalEdit').modal('show');
        });
    });
});
</script>
