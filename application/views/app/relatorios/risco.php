<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link" href="<?= base_url(); ?>relatorios/lista"><i class="fas fa-chart-bar"></i> Relatórios</a><a class="nav-link active" href="#"><i class="fas fa-shield-alt"></i> Riscos</a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<div class="my-3 p-4 rounded box-shadow"><h5 class="card-title mb-1"><i class="fas fa-shield-alt mr-2 text-danger"></i> <b>Relatório de Riscos Corporativos</b></h5></div>
<div class="row mb-4">
<div class="col-md-3"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">TOTAL DE RISCOS</span><h3 class="font-weight-bold mb-0"><?= $total_riscos; ?></h3></div></div>
<div class="col-md-3"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">RISCOS CRÍTICOS</span><h3 class="font-weight-bold mb-0" style="color: #dc2626;"><?= $riscos_criticos; ?></h3></div></div>
<div class="col-md-3"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">RISCOS ALTOS</span><h3 class="font-weight-bold mb-0" style="color: #f59e0b;"><?= $riscos_altos; ?></h3></div></div>
<div class="col-md-3"><div class="p-3 rounded box-shadow" style="background: white;"><span class="text-muted d-block" style="font-size: 10px;">PLANOS ATRASADOS</span><h3 class="font-weight-bold mb-0" style="color: #ef4444;"><?= $planos_atrasados; ?></h3></div></div>
</div>
<div class="row">
<div class="col-md-4 mb-4"><div class="p-4 rounded box-shadow h-100" style="background: white;"><h6 class="card-title mb-3"><i class="fas fa-fire mr-2 text-primary"></i> Incidentes no Mês</h6><h2 class="font-weight-bold"><?= $incidentes_mes; ?></h2><p class="text-muted">Incidentes registrados neste mês</p></div></div>
<div class="col-md-4 mb-4"><div class="p-4 rounded box-shadow h-100" style="background: white;"><h6 class="card-title mb-3"><i class="fas fa-layer-group mr-2 text-primary"></i> Riscos por Nível</h6><?php foreach ($riscos_por_nivel as $r): ?><div class="d-flex justify-content-between mb-1"><span style="font-size: 12px;"><?= $r->nivel_risco; ?></span><span class="font-weight-bold"><?= $r->total; ?></span></div><?php endforeach; ?></div></div>
<div class="col-md-4 mb-4"><div class="p-4 rounded box-shadow h-100" style="background: white;"><h6 class="card-title mb-3"><i class="fas fa-bug mr-2 text-primary"></i> Incidentes por Severidade</h6><?php foreach ($incidentes_por_severidade as $inc): ?><div class="d-flex justify-content-between mb-1"><span style="font-size: 12px;"><?= $inc->severidade ?: 'Sem severidade'; ?></span><span class="font-weight-bold"><?= $inc->total; ?></span></div><?php endforeach; ?></div></div>
</div>
<p class="text-muted text-center"><i class="fas fa-info-circle mr-1"></i> Relatório gerado em <?= date('d/m/Y H:i'); ?></p>
</div>
