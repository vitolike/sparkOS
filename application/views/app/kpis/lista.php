<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link active" href="<?= base_url(); ?>kpis/lista"><i class="fas fa-chart-line"></i> KPIs</a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>
<div class="my-3 p-4 rounded box-shadow"><div class="row align-items-center"><div class="col-md-6"><h5 class="card-title mb-1"><i class="fas fa-chart-line mr-2 text-primary"></i> <b>KPIs e Metas</b></h5><p class="text-muted mb-0" style="font-size: 13px;">Indicadores-chave de performance e metas.</p></div><div class="col-md-6 text-md-right mt-3 mt-md-0"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus mr-1"></i> Nova Meta</button></div></div></div>

<div class="row mb-4">
<?php foreach ($kpis as $k): $pct = $k->valor_meta > 0 ? min(round($k->valor_atual / $k->valor_meta * 100), 100) : 0; $cor = $pct >= 80 ? '#10b981' : ($pct >= 50 ? '#f59e0b' : '#ef4444'); ?>
<div class="col-md-3 col-6 mb-3"><div class="p-3 rounded box-shadow h-100" style="background: white;">
<div class="d-flex justify-content-between align-items-start mb-2"><div><span class="text-muted d-block" style="font-size: 9px; letter-spacing: .3px;"><?= $k->categoria; ?></span><h6 class="font-weight-bold mb-0" style="font-size: 14px;"><?= $k->nome; ?></h6></div><span class="font-weight-bold" style="font-size: 22px; color: <?= $cor; ?>;"><?= $k->unidade == 'R$' ? 'R$' : ''; ?><?= number_format($k->valor_atual, $k->unidade == '%' ? 0 : 2, ',', '.'); ?><small style="font-size: 11px; color: #94a3b8;">/<?= $k->unidade == 'R$' ? 'R$' : ''; ?><?= number_format($k->valor_meta, $k->unidade == '%' ? 0 : 2, ',', '.'); ?></small></span></div>
<div style="height: 6px; background: #e2e8f0; border-radius: 6px; overflow: hidden;"><div style="width: <?= $pct; ?>%; height: 100%; background: <?= $cor; ?>; border-radius: 6px;"></div></div>
<div class="d-flex justify-content-between mt-1"><span style="font-size: 10px; color: #94a3b8;"><?= $k->responsavel ?: '-'; ?></span><span style="font-size: 10px; font-weight: 600; color: <?= $cor; ?>;"><?= $pct; ?>%</span></div>
<div class="mt-2"><button class="btn btn-sm btn-outline-primary py-0 px-2 btn-registrar" style="font-size: 10px;" data-id="<?= $k->idkpi; ?>" data-nome="<?= $k->nome; ?>"><i class="fas fa-pen mr-1"></i> Registrar</button></div></div></div>
<?php endforeach; ?>
</div>

<div class="p-4 rounded box-shadow" style="background: white;">
<h6 class="mb-3"><i class="fas fa-history mr-2 text-muted"></i> Últimos Registros</h6>
<div class="table-responsive"><table class="table table-sm"><thead><tr><th>KPI</th><th>Valor</th><th>Data</th><th>Observação</th></tr></thead>
<tbody><?php foreach ($historico as $h): ?><tr><td style="font-size: 12px;"><?= $h->kpi_nome; ?></td><td class="font-weight-bold"><?= $h->valor; ?></td><td style="font-size: 11px;"><?= $h->data_registro ? date('d/m/Y', strtotime($h->data_registro)) : '-'; ?></td><td style="font-size: 12px;"><?= $h->observacao ?: '-'; ?></td></tr><?php endforeach; ?></tbody></table></div></div></div>

<div class="modal fade" id="modalAdd" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-plus mr-2 text-primary"></i> Nova Meta/KPI</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>kpis/adicionar"><div class="modal-body p-3">
<div class="form-group"><label>Nome do Indicador</label><input type="text" class="form-control" name="nome" required></div>
<div class="form-group"><label>Descrição</label><textarea class="form-control" name="descricao" rows="2"></textarea></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Categoria</label><select class="form-control" name="categoria"><option value="OPERACIONAL">Operacional</option><option value="FINANCEIRO">Financeiro</option><option value="QUALIDADE">Qualidade</option><option value="COMERCIAL">Comercial</option></select></div></div><div class="col-md-6"><div class="form-group"><label>Unidade</label><select class="form-control" name="unidade"><option value="%">%</option><option value="R$">R$</option><option value="un">Unidades</option><option value="h">Horas</option><option value="pontos">Pontos</option></select></div></div></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Valor Meta</label><input type="number" step="0.01" class="form-control" name="valor_meta"></div></div><div class="col-md-6"><div class="form-group"><label>Valor Atual</label><input type="number" step="0.01" class="form-control" name="valor_atual"></div></div></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Periodicidade</label><select class="form-control" name="periodo"><option value="MENSAL">Mensal</option><option value="TRIMESTRAL">Trimestral</option><option value="ANUAL">Anual</option></select></div></div><div class="col-md-6"><div class="form-group"><label>Responsável</label><input type="text" class="form-control" name="responsavel"></div></div></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Salvar</button></div></form></div></div></div>

<div class="modal fade" id="modalRegistrar" tabindex="-1"><div class="modal-dialog modal-dialog-centered modal-sm"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Registrar Valor</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>kpis/registrar"><input type="hidden" name="idkpi" id="reg_id"><div class="modal-body p-3">
<p id="reg_nome" class="text-muted" style="font-size: 13px;"></p>
<div class="form-group"><label>Valor</label><input type="number" step="0.01" class="form-control" name="valor" required></div>
<div class="form-group"><label>Data</label><input type="date" class="form-control" name="data_registro" value="<?= date('Y-m-d'); ?>"></div>
<div class="form-group"><label>Observação</label><input type="text" class="form-control" name="observacao"></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Registrar</button></div></form></div></div></div>

<script>
$(document).ready(function() {
    $('.btn-registrar').on('click', function() {
        $('#reg_id').val($(this).data('id')); $('#reg_nome').text($(this).data('nome'));
        $('#modalRegistrar').modal('show');
    });
});
</script>
