<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link" href="<?= base_url(); ?>estoque/lista"><i class="fas fa-warehouse"></i> Estoque</a><a class="nav-link active" href="#"><i class="fas fa-boxes"></i> <?= $estoque->nome; ?></a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>
<div class="my-3 p-4 rounded box-shadow"><div class="row align-items-center"><div class="col-md-6"><h5 class="card-title mb-1"><i class="fas fa-boxes mr-2 text-primary"></i> <b><?= $estoque->nome; ?></b></h5><p class="text-muted mb-0" style="font-size: 13px;"><?= $estoque->descricao; ?></p></div><div class="col-md-6 text-md-right mt-3 mt-md-0"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddItem"><i class="fas fa-plus mr-1"></i> Adicionar Produto</button></div></div></div>
<div class="p-4 rounded box-shadow" style="background: white;">
<div class="table-responsive">
<table class="table table-hover" id="tbl_itens"><thead><tr><th>Código</th><th>Produto</th><th>Quantidade</th><th>Mínimo</th><th>Localização</th><th>Preço Custo</th><th>Preço Venda</th><th class="text-right">Ações</th></tr></thead>
<tbody><?php foreach ($itens as $item): ?><tr><td style="font-size: 12px;"><?= $item->produto_codigo ?: '-'; ?></td><td><span class="font-weight-bold" style="font-size: 13px;"><?= $item->produto_nome; ?></span></td><td><span class="font-weight-bold" style="font-size: 14px; color: <?= $item->quantidade <= $item->quantidade_minima ? '#dc2626' : '#059669'; ?>;"><?= $item->quantidade; ?></span></td><td style="font-size: 12px;"><?= $item->quantidade_minima; ?></td><td style="font-size: 12px;"><?= $item->localizacao ?: '-'; ?></td><td style="font-size: 12px;">R$ <?= number_format($item->preco_compra, 2, ',', '.'); ?></td><td style="font-size: 12px;">R$ <?= number_format($item->preco_venda, 2, ',', '.'); ?></td><td class="text-right"><button class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit" data-iditem="<?= $item->iditem; ?>" data-qtd="<?= $item->quantidade; ?>" data-min="<?= $item->quantidade_minima; ?>" data-loc="<?= $item->localizacao; ?>"><i class="fas fa-edit"></i></button><a href="<?= base_url(); ?>estoque/delete_item/<?= $item->iditem; ?>" class="btn btn-sm btn-outline-danger py-1 px-2" onclick="return confirm('Remover item do estoque?');"><i class="fas fa-trash"></i></a></td></tr><?php endforeach; ?></tbody></table></div></div></div>

<div class="modal fade" id="modalAddItem" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-plus mr-2 text-primary"></i> Adicionar Produto ao Estoque</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>estoque/add_item"><input type="hidden" name="idestoque" value="<?= $estoque->idestoque; ?>"><div class="modal-body p-4">
<div class="form-group"><label>Produto</label><select class="form-control" name="produtosid" required><option value="">Selecione</option><?php foreach ($produtos as $p): ?><option value="<?= $p->produtosid; ?>"><?= $p->codigo; ?> - <?= $p->descricao; ?></option><?php endforeach; ?></select></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Quantidade</label><input type="number" step="0.01" class="form-control" name="quantidade" value="1" required></div></div><div class="col-md-6"><div class="form-group"><label>Qtd. Mínima</label><input type="number" step="0.01" class="form-control" name="quantidade_minima" value="0"></div></div></div>
<div class="form-group"><label>Localização</label><input type="text" class="form-control" name="localizacao" placeholder="Ex: Corredor A, Prateleira 3"></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Adicionar</button></div></form></div></div></div>

<div class="modal fade" id="modalEditItem" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-edit mr-2 text-primary"></i> Editar Item</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>estoque/update_item"><input type="hidden" name="iditem" id="edit_iditem"><div class="modal-body p-4">
<div class="row"><div class="col-md-6"><div class="form-group"><label>Quantidade</label><input type="number" step="0.01" class="form-control" name="quantidade" id="edit_quantidade" required></div></div><div class="col-md-6"><div class="form-group"><label>Qtd. Mínima</label><input type="number" step="0.01" class="form-control" name="quantidade_minima" id="edit_quantidade_minima"></div></div></div>
<div class="form-group"><label>Localização</label><input type="text" class="form-control" name="localizacao" id="edit_localizacao"></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Atualizar</button></div></form></div></div></div>

<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('#tbl_itens')) $('#tbl_itens').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 15, "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
    $('.btn-edit').on('click', function() {
        $('#edit_iditem').val($(this).data('iditem'));
        $('#edit_quantidade').val($(this).data('qtd'));
        $('#edit_quantidade_minima').val($(this).data('min'));
        $('#edit_localizacao').val($(this).data('loc'));
        $('#modalEditItem').modal('show');
    });
});
</script>
