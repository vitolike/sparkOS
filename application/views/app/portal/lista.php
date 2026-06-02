<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link active" href="<?= base_url(); ?>portal/lista"><i class="fas fa-globe"></i> Portal</a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>
<div class="my-3 p-4 rounded box-shadow"><div class="row align-items-center"><div class="col-md-6"><h5 class="card-title mb-1"><i class="fas fa-globe mr-2 text-primary"></i> <b>Portal de Acesso</b></h5><p class="text-muted mb-0" style="font-size: 13px;">Gerenciamento de acessos ao portal do cliente e técnico.</p></div><div class="col-md-6 text-md-right mt-3 mt-md-0"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus mr-1"></i> Novo Acesso</button></div></div></div>

<div class="row">
<div class="col-md-6 mb-4"><div class="p-4 rounded box-shadow h-100" style="background: white;">
<h6 class="mb-3"><i class="fas fa-user mr-2 text-primary"></i> Acessos de Clientes</h6>
<div class="table-responsive"><table class="table table-sm"><thead><tr><th>Cliente</th><th>Email</th><th>Último Acesso</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
<tbody><?php foreach ($acessos_cliente as $a): ?><tr><td style="font-size: 12px;"><?= $a->ref_id; ?> <span class="text-muted">(ID)</span></td><td style="font-size: 12px;"><?= $a->email; ?></td><td style="font-size: 11px;"><?= $a->ultimo_acesso ? date('d/m/Y H:i', strtotime($a->ultimo_acesso)) : '-'; ?></td><td><span class="badge badge-pill badge-<?= $a->status == 'ATIVO' ? 'success' : 'secondary'; ?>"><?= $a->status; ?></span></td><td class="text-right"><a href="<?= base_url(); ?>portal/delete/<?= $a->idacesso; ?>" class="btn btn-sm btn-danger py-1 px-2" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a></td></tr><?php endforeach; ?></tbody></table></div></div></div>

<div class="col-md-6 mb-4"><div class="p-4 rounded box-shadow h-100" style="background: white;">
<h6 class="mb-3"><i class="fas fa-user-cog mr-2 text-warning"></i> Acessos de Técnicos</h6>
<div class="table-responsive"><table class="table table-sm"><thead><tr><th>Técnico</th><th>Email</th><th>Último Acesso</th><th>Status</th><th class="text-right">Ações</th></tr></thead>
<tbody><?php foreach ($acessos_tecnico as $a): ?><tr><td style="font-size: 12px;"><?= $a->ref_id; ?> <span class="text-muted">(ID)</span></td><td style="font-size: 12px;"><?= $a->email; ?></td><td style="font-size: 11px;"><?= $a->ultimo_acesso ? date('d/m/Y H:i', strtotime($a->ultimo_acesso)) : '-'; ?></td><td><span class="badge badge-pill badge-<?= $a->status == 'ATIVO' ? 'success' : 'secondary'; ?>"><?= $a->status; ?></span></td><td class="text-right"><a href="<?= base_url(); ?>portal/delete/<?= $a->idacesso; ?>" class="btn btn-sm btn-danger py-1 px-2" onclick="return confirm('Excluir?');"><i class="fas fa-trash"></i></a></td></tr><?php endforeach; ?></tbody></table></div></div></div>
</div></div>

<div class="modal fade" id="modalAdd" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-plus mr-2 text-primary"></i> Novo Acesso ao Portal</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>portal/adicionar"><div class="modal-body p-3">
<div class="form-group"><label>Tipo</label><select class="form-control" name="tipo" id="tipo_acesso"><option value="CLIENTE">Cliente</option><option value="TECNICO">Técnico</option></select></div>
<div class="form-group" id="grupo_cliente"><label>Cliente</label><select class="form-control" name="ref_id"><option value="">Selecione</option><?php foreach ($clientes as $cl): ?><option value="<?= $cl->clientesid; ?>"><?= $cl->nome; ?></option><?php endforeach; ?></select></div>
<div class="form-group" id="grupo_tecnico" style="display:none;"><label>Técnico</label><select class="form-control" name="ref_id"><option value="">Selecione</option><?php foreach ($tecnicos as $t): ?><option value="<?= $t->adminid; ?>"><?= $t->nome; ?></option><?php endforeach; ?></select></div>
<div class="form-group"><label>E-mail de Acesso</label><input type="email" class="form-control" name="email" required></div>
<div class="form-group"><label>Senha</label><input type="password" class="form-control" name="senha" required></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Salvar</button></div></form></div></div></div>

<script>
$('#tipo_acesso').on('change', function() {
    if ($(this).val() == 'CLIENTE') { $('#grupo_cliente').show(); $('#grupo_tecnico').hide(); }
    else { $('#grupo_cliente').hide(); $('#grupo_tecnico').show(); }
});
</script>
