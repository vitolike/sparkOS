<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link active" href="<?= base_url(); ?>checklists/lista"><i class="fas fa-check-double"></i> Checklists</a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>
<div class="my-3 p-4 rounded box-shadow"><div class="row align-items-center"><div class="col-md-6"><h5 class="card-title mb-1"><i class="fas fa-check-double mr-2 text-primary"></i> <b>Checklists</b></h5><p class="text-muted mb-0" style="font-size: 13px;">Modelos de checklist para inspeção e manutenção.</p></div><div class="col-md-6 text-md-right mt-3 mt-md-0"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus mr-1"></i> Novo Checklist</button></div></div></div>

<div class="row"><?php foreach ($modelos as $m): ?>
<div class="col-md-4 mb-4"><div class="p-4 rounded box-shadow h-100" style="background: white;">
<div class="d-flex justify-content-between align-items-start mb-3"><div><h6 class="font-weight-bold mb-1" style="font-size: 15px;"><?= $m->titulo; ?></h6><span class="badge badge-pill badge-info" style="font-size: 9px;"><?= $m->tipo; ?></span> <span class="text-muted" style="font-size: 11px;"><?= $m->total_itens; ?> itens</span></div></div>
<p class="text-muted" style="font-size: 12px;"><?= $m->descricao ?: ''; ?></p>
<div class="d-flex justify-content-between mt-3">
<a href="<?= base_url(); ?>checklists/modelo/<?= $m->idchecklist; ?>" class="btn btn-primary btn-sm py-1 px-3" style="font-size: 11px;"><i class="fas fa-list mr-1"></i> Gerenciar</a>
<a href="<?= base_url(); ?>checklists/executar/<?= $m->idchecklist; ?>" class="btn btn-success btn-sm py-1 px-3" style="font-size: 11px;"><i class="fas fa-play mr-1"></i> Executar</a>
</div></div></div><?php endforeach; ?></div></div>

<div class="modal fade" id="modalAdd" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-check-double mr-2 text-primary"></i> Novo Modelo de Checklist</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>checklists/adicionar"><div class="modal-body p-4">
<div class="form-group"><label>Título</label><input type="text" class="form-control" name="titulo" required></div>
<div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo"><option value="INSTALACAO">Instalação</option><option value="MANUTENCAO">Manutenção</option><option value="VISTORIA">Vistoria</option><option value="SEGURANCA">Segurança</option></select></div></div><div class="col-md-6"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="ATIVO">Ativo</option><option value="INATIVO">Inativo</option></select></div></div></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Salvar</button></div></form></div></div></div>
