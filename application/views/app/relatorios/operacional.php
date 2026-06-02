<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link" href="<?= base_url(); ?>relatorios/lista"><i class="fas fa-chart-bar"></i> Relatórios</a><a class="nav-link active" href="#"><i class="fas fa-cogs"></i> Operacional</a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<div class="my-3 p-4 rounded box-shadow"><h5 class="card-title mb-1"><i class="fas fa-cogs mr-2 text-primary"></i> <b>Relatório Operacional</b></h5></div>
<div class="row mb-4">
<div class="col-md-3"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">TOTAL DE OS</span><h3 class="font-weight-bold mb-0"><?= $total_os; ?></h3></div></div>
<div class="col-md-3"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">OS ABERTAS</span><h3 class="font-weight-bold mb-0" style="color: #f59e0b;"><?= $os_abertas; ?></h3></div></div>
<div class="col-md-3"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">OS ESTE MÊS</span><h3 class="font-weight-bold mb-0" style="color: #6366f1;"><?= $os_mes; ?></h3></div></div>
<div class="col-md-3"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">CHAMADOS ABERTOS</span><h3 class="font-weight-bold mb-0" style="color: #ef4444;"><?= $chamados_abertos; ?> <small style="font-size: 12px; color: #94a3b8;">/<?= $total_chamados; ?></small></h3></div></div>
</div>
<div class="row">
<div class="col-md-4 mb-4"><div class="p-4 rounded box-shadow h-100" style="background: white;"><h6 class="card-title mb-3"><i class="fas fa-server mr-2 text-primary"></i> Equipamentos</h6><h2 class="font-weight-bold"><?= $total_equipamentos; ?></h2><p class="text-muted">Equipamentos cadastrados</p></div></div>
<div class="col-md-4 mb-4"><div class="p-4 rounded box-shadow h-100" style="background: white;"><h6 class="card-title mb-3"><i class="fas fa-users mr-2 text-primary"></i> Clientes</h6><h2 class="font-weight-bold"><?= $total_clientes; ?></h2><p class="text-muted">Clientes ativos no sistema</p></div></div>
<div class="col-md-4 mb-4"><div class="p-4 rounded box-shadow h-100" style="background: white;"><h6 class="card-title mb-3"><i class="fas fa-tasks mr-2 text-primary"></i> OS por Status</h6><?php foreach ($os_por_status as $os): ?><div class="d-flex justify-content-between mb-1"><span style="font-size: 12px;"><?= $os->status ?: 'Sem status'; ?></span><span class="font-weight-bold"><?= $os->total; ?></span></div><?php endforeach; ?></div></div>
</div>
<p class="text-muted text-center"><i class="fas fa-info-circle mr-1"></i> Relatório gerado em <?= date('d/m/Y H:i'); ?></p>
</div>
