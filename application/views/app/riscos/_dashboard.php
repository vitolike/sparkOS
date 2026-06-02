<!-- Metrics Row -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white;">
            <div class="d-flex align-items-center w-100">
                <div class="p-3 rounded-lg mr-3" style="background: rgba(99,102,241,0.08); color: #6366f1; border-radius: 12px;"><i class="fas fa-exclamation-triangle fa-lg"></i></div>
                <div>
                    <span class="text-muted d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">TOTAL DE RISCOS</span>
                    <div class="d-flex align-items-center">
                        <h3 class="font-weight-bold mb-0" style="font-size: 24px;"><?= $total_riscos; ?></h3>
                        <?php if ($total_altos > 0): ?>
                            <span class="badge badge-pill ml-2" style="background: rgba(239,68,68,0.1); color: #dc2626; font-size: 9px;"><?= $total_altos; ?> críticos</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white;">
            <div class="d-flex align-items-center w-100">
                <div class="p-3 rounded-lg mr-3" style="background: rgba(16,185,129,0.08); color: #059669; border-radius: 12px;"><i class="fas fa-shield-virus fa-lg"></i></div>
                <div>
                    <span class="text-muted d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">CONTROLES</span>
                    <h3 class="font-weight-bold mb-0" style="font-size: 24px;"><?= $total_controles; ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white;">
            <div class="d-flex align-items-center w-100">
                <div class="p-3 rounded-lg mr-3" style="background: rgba(245,158,11,0.08); color: #d97706; border-radius: 12px;"><i class="fas fa-tasks fa-lg"></i></div>
                <div>
                    <span class="text-muted d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">PLANOS PENDENTES</span>
                    <h3 class="font-weight-bold mb-0" style="font-size: 24px;"><?= $planos_pendentes; ?><small style="font-size: 12px; color: #94a3b8;">/<?= $total_planos; ?></small></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="p-3 rounded box-shadow h-100 d-flex align-items-center" style="background: white;">
            <div class="d-flex align-items-center w-100">
                <div class="p-3 rounded-lg mr-3" style="background: rgba(239,68,68,0.08); color: #dc2626; border-radius: 12px;"><i class="fas fa-bug fa-lg"></i></div>
                <div>
                    <span class="text-muted d-block" style="font-size: 10px; letter-spacing: 0.5px; font-weight: 600;">INCIDENTES EM ABERTO</span>
                    <h3 class="font-weight-bold mb-0" style="font-size: 24px;"><?= $incidentes_abertos; ?><small style="font-size: 12px; color: #94a3b8;">/<?= $total_incidentes; ?></small></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Heatmap -->
    <div class="col-md-7 mb-4">
        <div class="p-4 rounded box-shadow h-100" style="background: white;">
            <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                <i class="fas fa-fire mr-2 text-primary"></i> Matriz de Calor (Probabilidade x Impacto)
            </h6>
            <div class="table-responsive">
                <table class="table table-bordered text-center mb-0" style="min-width: 300px;">
                    <thead><tr><th style="width: 60px;"></th><th colspan="5" class="text-center" style="font-size: 12px;">Impacto</th></tr></thead>
                    <tbody>
                        <?php $niveis = ['Muito Baixo','Baixo','Médio','Alto','Muito Alto']; ?>
                        <?php for ($p = 5; $p >= 1; $p--): ?>
                            <tr>
                                <td style="font-size: 11px; font-weight: 500; vertical-align: middle; width: 60px;"><?= $niveis[$p-1]; ?></td>
                                <?php for ($i = 1; $i <= 5; $i++):
                                    $score = $p * $i;
                                    $cell_class = $score >= 15 ? 'bg-danger text-white' : ($score >= 9 ? 'bg-warning' : ($score >= 4 ? 'bg-info text-white' : 'bg-success text-white'));
                                    $found = 0;
                                    foreach ($heatmap as $h) {
                                        if ($h->probabilidade == $p && $h->impacto == $i) { $found = $h->total; break; }
                                    }
                                ?>
                                    <td class="heatmap-cell <?= $cell_class; ?>" style="opacity: <?= $found > 0 ? '1' : '0.4'; ?>;">
                                        <?= $found > 0 ? $found : '-'; ?>
                                    </td>
                                <?php endfor; ?>
                            </tr>
                        <?php endfor; ?>
                        <tr><td style="font-size: 11px;">Probabilidade</td><td colspan="5" style="font-size: 11px; color: #94a3b8;">1 (MB) → 5 (MA)</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Risks by Category -->
    <div class="col-md-5 mb-4">
        <div class="p-4 rounded box-shadow h-100" style="background: white;">
            <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                <i class="fas fa-chart-pie mr-2 text-primary"></i> Riscos por Categoria
            </h6>
            <?php foreach ($riscos_por_categoria as $cat): ?>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                        <span class="d-inline-block rounded-circle mr-2" style="width: 10px; height: 10px; background: <?= $cat->cor; ?>;"></span>
                        <span style="font-size: 13px;"><?= $cat->nome; ?></span>
                    </div>
                    <span class="font-weight-bold"><?= $cat->total; ?></span>
                </div>
                <div class="progress mb-3" style="height: 6px; border-radius: 10px; background: #f1f5f9;">
                    <div class="progress-bar" role="progressbar" style="width: <?= $total_riscos > 0 ? ($cat->total / $total_riscos * 100) : 0; ?>%; background: <?= $cat->cor; ?>; border-radius: 10px;"></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Risks -->
    <div class="col-md-6 mb-4">
        <div class="p-4 rounded box-shadow h-100" style="background: white;">
            <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                <i class="fas fa-clock mr-2 text-primary"></i> Riscos Recentes
            </h6>
            <?php if (count($recentes) > 0): ?>
                <?php foreach ($recentes as $r): ?>
                    <div class="d-flex align-items-center justify-content-between py-2 border-bottom" style="border-color: #f8fafc !important;">
                        <div>
                            <span class="font-weight-bold d-block" style="font-size: 13px;"><?= $r->codigo; ?> - <?= $r->titulo; ?></span>
                            <span class="text-muted" style="font-size: 11px;"><?= $r->area_responsavel ?: 'Sem responsável'; ?></span>
                        </div>
                        <span class="badge badge-pill badge-risco-<?= $r->nivel_risco; ?>"><?= $r->nivel_risco; ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted text-center py-4">Nenhum risco cadastrado.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Incidents -->
    <div class="col-md-6 mb-4">
        <div class="p-4 rounded box-shadow h-100" style="background: white;">
            <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                <i class="fas fa-history mr-2 text-primary"></i> Últimos Incidentes
            </h6>
            <?php if (count($incidentes_recentes) > 0): ?>
                <?php foreach ($incidentes_recentes as $inc): ?>
                    <div class="d-flex align-items-center justify-content-between py-2 border-bottom" style="border-color: #f8fafc !important;">
                        <div>
                            <span class="font-weight-bold d-block" style="font-size: 13px;"><?= $inc->titulo; ?></span>
                            <span class="text-muted" style="font-size: 11px;"><?= date('d/m/Y', strtotime($inc->data_ocorrencia)); ?></span>
                        </div>
                        <span class="badge badge-pill <?= $inc->severidade == 'ALTO' ? 'badge-danger' : ($inc->severidade == 'MEDIO' ? 'badge-warning' : 'badge-info'); ?>"><?= $inc->severidade; ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted text-center py-4">Nenhum incidente registrado.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row">
    <!-- Action Plans Status -->
    <div class="col-md-4 mb-4">
        <div class="p-4 rounded box-shadow h-100" style="background: white;">
            <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                <i class="fas fa-chart-bar mr-2 text-primary"></i> Status dos Planos de Ação
            </h6>
            <?php $planos_colors = ['PENDENTE' => '#f59e0b', 'EM_ANDAMENTO' => '#6366f1', 'CONCLUIDO' => '#10b981', 'CANCELADO' => '#ef4444']; ?>
            <?php foreach ($planos_status as $ps): ?>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span style="font-size: 13px;"><?= str_replace('_', ' ', $ps->status); ?></span>
                    <span class="font-weight-bold"><?= $ps->total; ?></span>
                </div>
            <?php endforeach; ?>
            <?php if (count($planos_status) == 0): ?>
                <p class="text-muted text-center py-3">Nenhum plano cadastrado.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Apettite Level -->
    <div class="col-md-4 mb-4">
        <div class="p-4 rounded box-shadow h-100" style="background: white;">
            <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                <i class="fas fa-balance-scale mr-2 text-primary"></i> Apetite a Risco
            </h6>
            <?php foreach ($apetite as $a): ?>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span style="font-size: 13px;"><?= $a->categoria; ?></span>
                    <span class="badge badge-pill badge-risco-<?= $a->nivel_aceitavel == 'MUITO_BAIXO' ? 'BAIXO' : ($a->nivel_aceitavel == 'BAIXO' ? 'BAIXO' : 'MEDIO'); ?>" style="font-size: 9px;"><?= $a->nivel_aceitavel; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- KRIs Status -->
    <div class="col-md-4 mb-4">
        <div class="p-4 rounded box-shadow h-100" style="background: white;">
            <h6 class="card-title" style="font-size: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 16px;">
                <i class="fas fa-chart-line mr-2 text-primary"></i> Indicadores de Risco (KRIs)
            </h6>
            <?php foreach ($kri_ativos as $k): ?>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span style="font-size: 12px; font-weight: 500;"><?= $k->nome; ?></span>
                        <span style="font-size: 12px; font-weight: 600; color: <?= $k->valor_atual >= $k->limite_vermelho ? '#dc2626' : ($k->valor_atual >= $k->limite_amarelo ? '#d97706' : '#059669'); ?>;"><?= $k->valor_atual . $k->unidade; ?></span>
                    </div>
                    <div class="progress" style="height: 6px; border-radius: 10px; background: #f1f5f9;">
                        <div class="progress-bar" role="progressbar" style="width: <?= min($k->valor_atual, 100); ?>%; background: <?= $k->valor_atual >= $k->limite_vermelho ? '#dc2626' : ($k->valor_atual >= $k->limite_amarelo ? '#d97706' : '#059669'); ?>; border-radius: 10px;"></div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (count($kri_ativos) == 0): ?>
                <p class="text-muted text-center py-3">Nenhum KRI cadastrado.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
