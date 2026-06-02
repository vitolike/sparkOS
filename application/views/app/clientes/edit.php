<div class="nav-scroller box-shadow mb-4">
<div class="container">
<nav class="nav nav-underline">
<a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
<a class="nav-link" href="<?= base_url(); ?>clientes/lista"><i class="fas fa-users"></i> Clientes</a>
<a class="nav-link active" href="#"><i class="fas fa-user"></i> Detalhes</a>
</nav></div></div>

<div role="main" class="container-fluid px-md-5">

<?php $c = $query[0];
$iniciais = strtoupper(substr($c->nome, 0, 1) . substr($c->sobrenome, 0, 1));
$cor_avatar = ['#6366f1','#10b981','#f59e0b','#ef4444','#8b5cf6','#ec4899','#14b8a6','#f97316'][abs(crc32($c->clientesid)) % 8];
$tipo_label = ['CNPJ'=>'warning','CPF'=>'info','PASSAPORTE'=>'secondary'];
$risk_cfg = ['CRITICO'=>['color'=>'#dc2626','bg'=>'#fef2f2','icon'=>'fa-skull-crossbones','label'=>'Crítico'],
             'ALTO'=>['color'=>'#f59e0b','bg'=>'#fffbeb','icon'=>'fa-exclamation-triangle','label'=>'Alto'],
             'MEDIO'=>['color'=>'#6366f1','bg'=>'#eef2ff','icon'=>'fa-exclamation-circle','label'=>'Médio'],
             'BAIXO'=>['color'=>'#10b981','bg'=>'#ecfdf5','icon'=>'fa-check-circle','label'=>'Baixo']];
$rc = $risk_cfg[$risk_level];
$doc_numero = $c->documento;
if ($c->tipo_documento == 'CNPJ' && strlen($doc_numero) >= 14)
    $doc_numero = substr($doc_numero,0,2).'.'.substr($doc_numero,2,3).'.'.substr($doc_numero,5,3).'/'.substr($doc_numero,8,4).'-'.substr($doc_numero,12,2);
elseif ($c->tipo_documento == 'CPF' && strlen($doc_numero) >= 11)
    $doc_numero = substr($doc_numero,0,3).'.'.substr($doc_numero,3,3).'.'.substr($doc_numero,6,3).'-'.substr($doc_numero,9,2);
?>

<div class="row mb-4">
<div class="col-md-12">
<div class="rounded box-shadow overflow-hidden" style="background: white;">
<div style="height: 100px; background: linear-gradient(135deg, <?= $cor_avatar; ?> 0%, <?= $cor_avatar; ?>bb 100%);"></div>
<div class="px-4 pb-4" style="margin-top: -45px;">
<div class="d-flex align-items-end justify-content-between flex-wrap">
<div class="d-flex align-items-end">
<div class="d-flex align-items-center justify-content-center rounded-circle border border-white shadow-sm font-weight-bold text-white" style="width: 90px; height: 90px; background: <?= $cor_avatar; ?>; font-size: 28px; border-width: 3px !important;"><?= $iniciais; ?></div>
<div class="ml-3 mb-1">
<h3 class="font-weight-bold mb-1"><?= $c->nome; ?> <?= $c->sobrenome; ?></h3>
<div class="d-flex align-items-center flex-wrap gap-2">
<span class="badge badge-pill badge-<?= $tipo_label[$c->tipo_documento] ?? 'secondary'; ?> mr-2" style="font-size: 10px;"><?= $c->tipo_documento; ?></span>
<code class="mr-3" style="font-size: 12px; color: #475569;"><?= $doc_numero; ?></code>
<span class="text-muted" style="font-size: 11px;"><i class="far fa-calendar-alt mr-1"></i> Desde <?= $c->criado ? date('d/m/Y', strtotime($c->criado)) : '-'; ?></span>
</div></div></div>
<button class="btn btn-primary btn-sm px-3 py-2 mb-1" data-toggle="modal" data-target="#modalEdit">
<i class="fas fa-edit mr-1"></i> Editar
</button>
</div></div></div></div></div>

<div class="row mb-4">
<div class="col-lg-9">
<div class="row">
<?php $metrica = function($icon, $label, $valor, $cor, $link) { echo '<div class="col-md-4 col-6 mb-3"><a href="'.$link.'" class="text-decoration-none"><div class="p-3 rounded box-shadow text-center h-100" style="background: white; transition: transform .15s;" onmouseover="this.style.transform=\'translateY(-2px)\'" onmouseout="this.style.transform=\'\'"><div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 40px; height: 40px; background: '.$cor.'15;"><i class="fas '.$icon.'" style="color: '.$cor.'; font-size: 16px;"></i></div><span class="text-muted d-block" style="font-size: 9px; letter-spacing: .5px;">'.$label.'</span><h5 class="font-weight-bold mb-0" style="color: '.$cor.';">'.$valor.'</h5></div></a></div>'; };
$metrica('fa-file-invoice','ORDENS DE SERVIÇO',$total_os,'#6366f1','javascript:;');
$metrica('fa-server','EQUIPAMENTOS',$total_equipamentos,'#10b981','javascript:;');
$metrica('fa-headset','TICKETS ABERTOS',$tickets_abertos,'#f59e0b','javascript:;');
$metrica('fa-file-invoice-dollar','ORÇAMENTOS',$total_orcamentos,'#8b5cf6','javascript:;');
$metrica('fa-credit-card','FATURAS VENCIDAS',$faturas_vencidas,'#ef4444','javascript:;');
$metrica('fa-shield-alt','GAR. VENCIDAS',$garantias_vencidas,'#ec4899','javascript:;');
?>
</div></div>

<div class="col-lg-3 mb-3">
<div class="p-4 rounded box-shadow h-100 d-flex flex-column align-items-center justify-content-center text-center" style="background: <?= $rc['bg']; ?>;">
<div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 56px; height: 56px; background: <?= $rc['color']; ?>20;"><i class="fas <?= $rc['icon']; ?>" style="color: <?= $rc['color']; ?>; font-size: 24px;"></i></div>
<h2 class="font-weight-bold mb-0" style="color: <?= $rc['color']; ?>; font-size: 32px;"><?= $risk_score; ?></h2>
<span class="font-weight-bold d-block" style="color: <?= $rc['color']; ?>; font-size: 13px;"><?= $rc['label']; ?></span>
<span class="text-muted d-block" style="font-size: 10px; margin-top: 2px;">Score de Risco</span>
<div class="w-100 mt-3" style="height: 4px; background: #e2e8f0; border-radius: 4px; overflow: hidden;">
<div style="width: <?= $risk_score; ?>%; height: 100%; background: <?= $rc['color']; ?>; border-radius: 4px; transition: width .6s;"></div>
</div>
<div class="w-100 mt-2 d-flex justify-content-between" style="font-size: 8px; color: #94a3b8;">
<span>0</span><span>25</span><span>50</span><span>75</span><span>100</span>
</div>
</div></div></div>

<div class="row">
<div class="col-md-4 mb-4">
<div class="p-4 rounded box-shadow h-100" style="background: white;">
<h6 class="mb-3 d-flex align-items-center" style="font-weight: 600; font-size: 13px; letter-spacing: .3px;"><span class="d-inline-flex align-items-center justify-content-center rounded mr-2" style="width: 28px; height: 28px; background: #6366f115;"><i class="fas fa-user-circle" style="font-size: 13px; color: #6366f1;"></i></span> Dados Pessoais</h6>
<table class="table table-sm table-borderless mb-0">
<tr><td class="text-muted py-1" style="font-size: 11px; width: 80px;">Nome</td><td class="py-1 font-weight-bold" style="font-size: 13px;"><?= $c->nome; ?> <?= $c->sobrenome; ?></td></tr>
<tr><td class="text-muted py-1" style="font-size: 11px;">Documento</td><td class="py-1" style="font-size: 12px;"><span class="badge badge-pill badge-<?= $tipo_label[$c->tipo_documento] ?? 'secondary'; ?> mr-1" style="font-size: 9px;"><?= $c->tipo_documento; ?></span> <?= $doc_numero; ?></td></tr>
<tr><td class="text-muted py-1" style="font-size: 11px;">Cadastro</td><td class="py-1" style="font-size: 12px;"><?= $c->criado ? date('d/m/Y H:i', strtotime($c->criado)) : '-'; ?></td></tr>
</table></div></div>

<div class="col-md-4 mb-4">
<div class="p-4 rounded box-shadow h-100" style="background: white;">
<h6 class="mb-3 d-flex align-items-center" style="font-weight: 600; font-size: 13px; letter-spacing: .3px;"><span class="d-inline-flex align-items-center justify-content-center rounded mr-2" style="width: 28px; height: 28px; background: #10b98115;"><i class="fas fa-phone-alt" style="font-size: 13px; color: #10b981;"></i></span> Contato</h6>
<table class="table table-sm table-borderless mb-0">
<tr><td class="text-muted py-1" style="font-size: 11px; width: 80px;">Telefone</td><td class="py-1 font-weight-bold" style="font-size: 13px;"><?= $c->telefone ?: '-'; ?></td></tr>
<tr><td class="text-muted py-1" style="font-size: 11px;">E-mail</td><td class="py-1" style="font-size: 12px;"><a href="mailto:<?= $c->email; ?>" class="text-primary" style="word-break: break-all;"><?= $c->email ?: '-'; ?></a></td></tr>
</table></div></div>

<div class="col-md-4 mb-4">
<div class="p-4 rounded box-shadow h-100" style="background: white;">
<h6 class="mb-3 d-flex align-items-center" style="font-weight: 600; font-size: 13px; letter-spacing: .3px;"><span class="d-inline-flex align-items-center justify-content-center rounded mr-2" style="width: 28px; height: 28px; background: #ef444415;"><i class="fas fa-map-marker-alt" style="font-size: 13px; color: #ef4444;"></i></span> Endereço</h6>
<table class="table table-sm table-borderless mb-0">
<tr><td class="text-muted py-1" style="font-size: 11px; width: 80px;">Logradouro</td><td class="py-1" style="font-size: 12px;"><?= $c->endereco ?: '-'; ?>, <?= $c->numero ?: 'S/N'; ?></td></tr>
<tr><td class="text-muted py-1" style="font-size: 11px;">Bairro</td><td class="py-1" style="font-size: 12px;"><?= $c->bairro ?: '-'; ?></td></tr>
<tr><td class="text-muted py-1" style="font-size: 11px;">Localidade</td><td class="py-1" style="font-size: 12px;"><?= $c->cidade ?: '-'; ?> <?= $c->uf ? '/ '.$c->uf : ''; ?> <?= $c->cep ? '— '.$c->cep : ''; ?></td></tr>
</table></div></div>
</div>

<div class="row mb-4">
<div class="col-12">
<div class="p-4 rounded box-shadow" style="background: white;">
<h6 class="mb-3 d-flex align-items-center" style="font-weight: 600; font-size: 13px; letter-spacing: .3px;">
<span class="d-inline-flex align-items-center justify-content-center rounded mr-2" style="width: 28px; height: 28px; background: <?= $rc['color']; ?>15;"><i class="fas <?= $rc['icon']; ?>" style="font-size: 13px; color: <?= $rc['color']; ?>;"></i></span>
Análise de Risco do Cliente</h6>
<div class="row">
<div class="col-md-3 col-6 mb-2">
<div class="d-flex align-items-center p-3 rounded" style="background: #f8fafc;">
<i class="fas fa-file-invoice mr-3" style="color: #6366f1; font-size: 20px; width: 24px; text-align: center;"></i>
<div><span class="text-muted d-block" style="font-size: 9px; letter-spacing: .3px;">OS EM ABERTO</span>
<span class="font-weight-bold" style="font-size: 18px; color: <?= $os_abertas > 2 ? '#dc2626' : '#6366f1'; ?>;"><?= $os_abertas; ?></span></div></div></div>
<div class="col-md-3 col-6 mb-2">
<div class="d-flex align-items-center p-3 rounded" style="background: #f8fafc;">
<i class="fas fa-headset mr-3" style="color: #f59e0b; font-size: 20px; width: 24px; text-align: center;"></i>
<div><span class="text-muted d-block" style="font-size: 9px; letter-spacing: .3px;">TICKETS ABERTOS</span>
<span class="font-weight-bold" style="font-size: 18px; color: <?= $tickets_abertos > 2 ? '#dc2626' : '#f59e0b'; ?>;"><?= $tickets_abertos; ?></span></div></div></div>
<div class="col-md-3 col-6 mb-2">
<div class="d-flex align-items-center p-3 rounded" style="background: #f8fafc;">
<i class="fas fa-credit-card mr-3" style="color: #ef4444; font-size: 20px; width: 24px; text-align: center;"></i>
<div><span class="text-muted d-block" style="font-size: 9px; letter-spacing: .3px;">FATURAS VENCIDAS</span>
<span class="font-weight-bold" style="font-size: 18px; color: <?= $faturas_vencidas > 0 ? '#dc2626' : '#10b981'; ?>;"><?= $faturas_vencidas; ?></span></div></div></div>
<div class="col-md-3 col-6 mb-2">
<div class="d-flex align-items-center p-3 rounded" style="background: #f8fafc;">
<i class="fas fa-shield-alt mr-3" style="color: #ec4899; font-size: 20px; width: 24px; text-align: center;"></i>
<div><span class="text-muted d-block" style="font-size: 9px; letter-spacing: .3px;">GAR. VENCIDAS</span>
<span class="font-weight-bold" style="font-size: 18px; color: <?= $garantias_vencidas > 0 ? '#dc2626' : '#10b981'; ?>;"><?= $garantias_vencidas; ?></span></div></div></div>
</div>
<div class="mt-3 d-flex align-items-center">
<span class="font-weight-bold mr-2" style="font-size: 11px;">Score:</span>
<div class="flex-grow-1 mr-3" style="height: 6px; background: #e2e8f0; border-radius: 6px; overflow: hidden; max-width: 300px;">
<div style="width: <?= $risk_score; ?>%; height: 100%; background: <?= $rc['color']; ?>; border-radius: 6px;"></div>
</div>
<span style="font-size: 12px; color: <?= $rc['color']; ?>;" class="font-weight-bold"><?= $risk_score; ?>/100 — <?= $rc['label']; ?></span>
</div>
</div></div></div>

<?php if ($c->log_criacao || $c->log_alteracao): ?>
<div class="row mb-4">
<div class="col-12">
<div class="p-3 rounded box-shadow" style="background: white;">
<h6 class="mb-2 d-flex align-items-center" style="font-weight: 600; font-size: 12px;"><i class="fas fa-history mr-2 text-muted"></i> Auditoria</h6>
<div class="d-flex flex-wrap">
<?php $logs = array_filter([$c->log_criacao, $c->log_alteracao]); foreach ($logs as $i => $log): ?>
<div class="d-flex align-items-center mr-4 mb-1"><span class="d-inline-flex align-items-center justify-content-center rounded-circle mr-2 flex-shrink-0" style="width: 22px; height: 22px; background: <?= $i == 0 ? '#10b98120' : '#f59e0b20'; ?>;"><i class="fas <?= $i == 0 ? 'fa-plus-circle' : 'fa-edit'; ?>" style="font-size: 10px; color: <?= $i == 0 ? '#10b981' : '#f59e0b'; ?>;"></i></span><span class="text-muted" style="font-size: 11px;"><?= $log; ?></span></div>
<?php endforeach; ?>
</div></div></div></div>
<?php endif; ?>

</div>

<div class="modal fade" id="modalEdit" tabindex="-1"><div class="modal-dialog modal-dialog-centered modal-lg"><div class="modal-content">
<div class="modal-header"><h5 class="modal-title"><i class="fas fa-user-edit mr-2 text-primary"></i> Editar Cliente</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
<form method="post" action="<?= base_url(); ?>clientes/upd_cliente"><input type="hidden" name="clientesid" value="<?= $c->clientesid; ?>">
<div class="modal-body p-4">
<div class="form-row">
<div class="form-group col-md-6"><label>Nome</label><input type="text" class="form-control" name="nome" value="<?= $c->nome; ?>" required></div>
<div class="form-group col-md-6"><label>Sobrenome</label><input type="text" class="form-control" name="sobrenome" value="<?= $c->sobrenome; ?>" required></div>
</div>
<div class="form-row">
<div class="form-group col-md-6"><label>E-mail</label><input type="email" class="form-control" name="email" value="<?= $c->email; ?>"></div>
<div class="form-group col-md-6"><label>Telefone</label><input type="text" class="form-control" name="telefone" value="<?= $c->telefone; ?>"></div>
</div>
<div class="form-row">
<div class="form-group col-md-3"><label>CEP</label><input type="text" class="form-control" name="cep" id="edit_cep" value="<?= $c->cep; ?>"></div>
<div class="form-group col-md-6"><label>Endereço</label><input type="text" class="form-control" name="endereco" id="edit_endereco" value="<?= $c->endereco; ?>"></div>
<div class="form-group col-md-3"><label>Número</label><input type="text" class="form-control" name="numero" value="<?= $c->numero; ?>"></div>
</div>
<div class="form-row">
<div class="form-group col-md-4"><label>Bairro</label><input type="text" class="form-control" name="bairro" value="<?= $c->bairro; ?>" required></div>
<div class="form-group col-md-4"><label>Cidade</label><input type="text" class="form-control" name="cidade" value="<?= $c->cidade; ?>" required></div>
<div class="form-group col-md-4"><label>Estado</label><select class="form-control" name="uf" required>
<option value="">Selecione</option>
<?php $ufs = ['AC'=>'Acre','AL'=>'Alagoas','AP'=>'Amapá','AM'=>'Amazonas','BA'=>'Bahia','CE'=>'Ceará','DF'=>'Distrito Federal','ES'=>'Espírito Santo','GO'=>'Goiás','MA'=>'Maranhão','MT'=>'Mato Grosso','MS'=>'Mato Grosso do Sul','MG'=>'Minas Gerais','PA'=>'Pará','PB'=>'Paraíba','PR'=>'Paraná','PE'=>'Pernambuco','PI'=>'Piauí','RJ'=>'Rio de Janeiro','RN'=>'Rio Grande do Norte','RS'=>'Rio Grande do Sul','RO'=>'Rondônia','RR'=>'Roraima','SC'=>'Santa Catarina','SP'=>'São Paulo','SE'=>'Sergipe','TO'=>'Tocantins'];
foreach ($ufs as $sigla => $nome_uf) { echo '<option value="'.$sigla.'" '.($c->uf==$sigla?'selected':'').'>'.$nome_uf.'</option>'; } ?>
</select></div>
</div>
<div class="form-row">
<div class="form-group col-md-4"><label>Tipo Documento</label><select class="form-control" name="tipo_documento" required>
<option value="CNPJ" <?= $c->tipo_documento=='CNPJ'?'selected':''; ?>>CNPJ</option>
<option value="CPF" <?= $c->tipo_documento=='CPF'?'selected':''; ?>>CPF</option>
<option value="PASSAPORTE" <?= $c->tipo_documento=='PASSAPORTE'?'selected':''; ?>>Passaporte</option>
</select></div>
<div class="form-group col-md-8"><label>Número do Documento</label><input type="text" class="form-control" name="documento" value="<?= $c->documento; ?>" required></div>
</div>
</div>
<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Salvar</button></div>
</form></div></div></div>

<script>
$("#edit_cep").focusout(function(){
    $.ajax({
        url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/',
        dataType: 'json',
        success: function(r){
            $("#edit_endereco").val(r.logradouro);
            $("#bairro").val(r.bairro);
            $("#cidade").val(r.cidade);
            $("#uf").val(r.uf);
            $("#numero").focus();
        }
    });
});
</script>
