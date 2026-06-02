<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link" href="<?= base_url(); ?>checklists/lista"><i class="fas fa-check-double"></i> Checklists</a><a class="nav-link active" href="#"><i class="fas fa-play"></i> Executar: <?= $modelo->titulo; ?></a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<div class="my-3 p-4 rounded box-shadow"><h5 class="card-title mb-1"><i class="fas fa-play-circle mr-2 text-success"></i> <b>Executar Checklist: <?= $modelo->titulo; ?></b></h5></div>
<div class="p-4 rounded box-shadow" style="background: white;">
<form method="post" action="<?= base_url(); ?>checklists/salvar_execucao">
<input type="hidden" name="idchecklist" value="<?= $modelo->idchecklist; ?>">
<div class="row mb-4">
<div class="col-md-6"><div class="form-group"><label>Título da Execução</label><input type="text" class="form-control" name="titulo" value="Execução - <?= date('d/m/Y'); ?>" required></div></div>
<div class="col-md-3"><div class="form-group"><label>Cliente</label><select class="form-control" name="cliente_id"><option value="">Selecione</option><?php foreach ($clientes as $c): ?><option value="<?= $c->clientesid; ?>"><?= $c->nome; ?></option><?php endforeach; ?></select></div></div>
<div class="col-md-3"><div class="form-group"><label>Resultado</label><select class="form-control" name="resultado"><option value="APROVADO">Aprovado</option><option value="REPROVADO">Reprovado</option><option value="PARCIAL">Parcial</option></select></div></div>
</div>
<h6 class="mb-3"><i class="fas fa-list mr-2 text-primary"></i> Itens</h6>
<?php foreach ($itens as $i => $item): ?>
<div class="card mb-2 border"><div class="card-body py-3 px-4">
<div class="row align-items-center">
<div class="col-md-1 text-center"><span class="font-weight-bold text-primary"><?= $item->ordem; ?></span></div>
<div class="col-md-6"><span><?= $item->descricao; ?> <?= $item->obrigatorio ? '<span class="text-danger">*</span>' : ''; ?></span></div>
<div class="col-md-2 text-center">
<div class="custom-control custom-switch">
<input type="checkbox" class="custom-control-input" name="item_<?= $item->iditem; ?>" value="1" id="item_<?= $item->iditem; ?>" <?= $i == 0 ? 'checked' : ''; ?>>
<label class="custom-control-label" for="item_<?= $item->iditem; ?>">Conforme</label></div></div>
<div class="col-md-3"><input type="text" class="form-control form-control-sm" name="obs_<?= $item->iditem; ?>" placeholder="Observação"></div>
</div></div></div>
<?php endforeach; ?>
<div class="form-group mt-3"><label>Observações Gerais</label><textarea class="form-control" name="observacoes" rows="2"></textarea></div>
<button type="submit" class="btn btn-success btn-block py-3 mt-3"><i class="fas fa-save mr-2"></i> Finalizar Execução</button>
</form></div></div>
