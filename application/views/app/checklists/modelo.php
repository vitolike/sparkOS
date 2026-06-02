<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link active" href="<?= base_url(); ?>checklists/lista"><i class="fas fa-check-double"></i> Checklist: <?= $modelo->titulo; ?></a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>
<div class="my-3 p-4 rounded box-shadow"><div class="row align-items-center"><div class="col-md-6"><h5 class="card-title mb-1"><i class="fas fa-check-double mr-2 text-primary"></i> <b><?= $modelo->titulo; ?></b></h5><p class="text-muted mb-0" style="font-size: 13px;"><?= $modelo->descricao; ?></p></div><div class="col-md-6 text-md-right"><a href="<?= base_url(); ?>checklists/executar/<?= $modelo->idchecklist; ?>" class="btn btn-success btn-sm"><i class="fas fa-play mr-1"></i> Executar</a></div></div></div>

<div class="row">
<div class="col-md-6 mb-4"><div class="p-4 rounded box-shadow" style="background: white;">
<h6 class="card-title mb-3"><i class="fas fa-list mr-2 text-primary"></i> Itens do Checklist</h6>
<table class="table table-sm"><thead><tr><th>#</th><th>Item</th><th>Obrig.</th><th>Ações</th></tr></thead>
<tbody><?php foreach ($itens as $i => $item): ?><tr><td><?= $item->ordem; ?></td><td><?= $item->descricao; ?></td><td><?= $item->obrigatorio ? '<span class="text-danger">Sim</span>' : '<span class="text-muted">Não</span>'; ?></td><td><a href="<?= base_url(); ?>checklists/delete_item/<?= $item->iditem; ?>" class="btn btn-sm btn-danger py-0 px-1" onclick="return confirm('Excluir item?');"><i class="fas fa-trash"></i></a></td></tr><?php endforeach; ?></tbody></table>
<button class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#modalAddItem"><i class="fas fa-plus mr-1"></i> Adicionar Item</button>
</div></div>

<div class="col-md-6 mb-4"><div class="p-4 rounded box-shadow" style="background: white;">
<h6 class="card-title mb-3"><i class="fas fa-history mr-2 text-primary"></i> Execuções</h6>
<?php if (count($execucoes) > 0): ?>
<div class="table-responsive"><table class="table table-sm"><thead><tr><th>Data</th><th>Resultado</th><th>Técnico</th></tr></thead>
<tbody><?php foreach ($execucoes as $ex): ?><tr><td><?= date('d/m/Y H:i', strtotime($ex->data_execucao)); ?></td><td><span class="badge badge-pill badge-<?= $ex->resultado == 'APROVADO' ? 'success' : ($ex->resultado == 'REPROVADO' ? 'danger' : 'warning'); ?>"><?= $ex->resultado; ?></span></td><td><?= $ex->admin_id; ?></td></tr><?php endforeach; ?></tbody></table></div>
<?php else: ?><p class="text-muted text-center py-3">Nenhuma execução registrada.</p><?php endif; ?>
</div></div></div></div>

<div class="modal fade" id="modalAddItem" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-plus mr-2 text-primary"></i> Adicionar Item</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>checklists/add_item"><input type="hidden" name="idchecklist" value="<?= $modelo->idchecklist; ?>">
<div class="modal-body p-4">
<div class="form-group"><label>Descrição do Item</label><input type="text" class="form-control" name="descricao" required></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Ordem</label><input type="number" class="form-control" name="ordem" value="<?= count($itens) + 1; ?>"></div></div>
<div class="col-md-6"><div class="form-check mt-4"><input type="checkbox" class="form-check-input" name="obrigatorio" value="1" checked id="ckObrig"><label class="form-check-label" for="ckObrig">Obrigatório</label></div></div></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Adicionar</button></div></form></div></div></div>
