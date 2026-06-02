<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link active" href="<?= base_url(); ?>estoque/lista"><i class="fas fa-warehouse"></i> Estoque</a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>
<div class="my-3 p-4 rounded box-shadow"><div class="row align-items-center"><div class="col-md-6"><h5 class="card-title mb-1"><i class="fas fa-warehouse mr-2 text-primary"></i> <b>Gestão de Estoque</b></h5><p class="text-muted mb-0" style="font-size: 13px;">Almoxarifados e controle de inventário.</p></div><div class="col-md-6 text-md-right mt-3 mt-md-0"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus mr-1"></i> Novo Almoxarifado</button></div></div></div>
<div class="row"><?php foreach ($estoques as $e): ?>
<div class="col-md-4 mb-4"><div class="p-4 rounded box-shadow h-100" style="background: white;">
<div class="d-flex align-items-center mb-3"><div class="p-3 rounded-lg mr-3" style="background: rgba(99,102,241,0.08); color: #6366f1; border-radius: 12px;"><i class="fas fa-warehouse fa-lg"></i></div><div><h6 class="font-weight-bold mb-0"><?= $e->nome; ?></h6><span class="text-muted" style="font-size: 11px;"><?= $e->tipo; ?></span></div></div>
<p class="text-muted" style="font-size: 12px;"><?= $e->descricao ?: ''; ?></p>
<a href="<?= base_url(); ?>estoque/itens/<?= $e->idestoque; ?>" class="btn btn-primary btn-sm btn-block"><i class="fas fa-boxes mr-1"></i> Ver Itens</a>
</div></div><?php endforeach; ?></div></div>

<div class="modal fade" id="modalAdd" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-warehouse mr-2 text-primary"></i> Novo Almoxarifado</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>estoque/adicionar"><div class="modal-body p-4">
<div class="form-group"><label>Nome</label><input type="text" class="form-control" name="nome" required></div>
<div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Tipo</label><select class="form-control" name="tipo"><option value="PRINCIPAL">Principal</option><option value="SECUNDARIO">Secundário</option><option value="TERCEIRO">Terceiro</option></select></div></div><div class="col-md-6"><div class="form-group"><label>Status</label><select class="form-control" name="status"><option value="ATIVO">Ativo</option><option value="INATIVO">Inativo</option></select></div></div></div>
<div class="form-group"><label>Endereço</label><input type="text" class="form-control" name="endereco"></div>
<div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel"></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Salvar</button></div></form></div></div></div>
