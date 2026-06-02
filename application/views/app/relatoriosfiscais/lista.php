<div class="nav-scroller box-shadow mb-4"><div class="container"><nav class="nav nav-underline"><a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a><a class="nav-link active" href="<?= base_url(); ?>relatoriosfiscais/lista"><i class="fas fa-file-alt"></i> Relatórios Fiscais</a></nav></div></div>
<div role="main" class="container-fluid px-md-5">
<?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>
<div class="my-3 p-4 rounded box-shadow"><div class="row align-items-center"><div class="col-md-6"><h5 class="card-title mb-1"><i class="fas fa-file-alt mr-2 text-primary"></i> <b>Relatórios Fiscais</b></h5><p class="text-muted mb-0" style="font-size: 13px;">Obrigações acessórias e relatórios fiscais.</p></div><div class="col-md-6 text-md-right mt-3 mt-md-0"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalGerar"><i class="fas fa-play mr-1"></i> Gerar Relatório</button></div></div></div>
<div class="p-4 rounded box-shadow" style="background: white;">
<table class="table table-hover" id="tbl_relfisc"><thead><tr><th>Título</th><th>Tipo</th><th>Período</th><th>Emissão</th><th>Status</th></tr></thead>
<tbody><?php foreach ($relatorios as $r): ?><tr><td><span class="font-weight-bold" style="font-size: 13px;"><?= $r->titulo; ?></span></td><td><span class="badge badge-pill badge-info"><?= $r->tipo; ?></span></td><td style="font-size: 12px;"><?= $r->periodo_inicio && $r->periodo_fim ? date('d/m/Y', strtotime($r->periodo_inicio)).' — '.date('d/m/Y', strtotime($r->periodo_fim)) : '-'; ?></td><td style="font-size: 11px;"><?= $r->data_emissao ? date('d/m/Y H:i', strtotime($r->data_emissao)) : '-'; ?></td><td><span class="badge badge-pill badge-success"><?= $r->status; ?></span></td></tr><?php endforeach; ?></tbody></table></div></div>

<div class="modal fade" id="modalGerar" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="fas fa-play mr-2 text-primary"></i> Gerar Relatório Fiscal</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div><form method="post" action="<?= base_url(); ?>relatoriosfiscais/gerar"><div class="modal-body p-3">
<div class="form-group"><label>Tipo de Relatório</label><select class="form-control" name="tipo" required><option value="">Selecione</option><option value="OBRIGACAO">Obrigação Acessória</option><option value="APURACAO">Apuração de Tributos</option><option value="RECOLHIMENTO">Guia de Recolhimento</option><option value="SPED">SPED Fiscal</option><option value="PIS_COFINS">PIS/COFINS</option></select></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label>Período Início</label><input type="date" class="form-control" name="periodo_inicio" required></div></div><div class="col-md-6"><div class="form-group"><label>Período Fim</label><input type="date" class="form-control" name="periodo_fim" required></div></div></div>
</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Gerar</button></div></form></div></div></div>

<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('#tbl_relfisc')) $('#tbl_relfisc').DataTable({ "info": true, "searching": true, "paging": true, "pageLength": 15, "order": [[3, 'desc']], "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json" } });
});
</script>
