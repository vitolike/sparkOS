<div class="card shadow-sm border-0 position-relative p-3" style="border-radius: 12px; background: white; border-left: 4px solid <?= $l->status == 'GANHO' ? 'var(--success-color)' : ($l->status == 'PERDIDO' ? 'var(--danger-color)' : 'var(--primary-color)') ?> !important; transition: all 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateY(-2px)';" onmouseout="this.style.transform='none';">
    
    <div class="d-flex align-items-start justify-content-between mb-2">
        <h6 class="font-weight-bold mb-0" style="font-size: 13.5px; color: var(--text-main); line-height: 1.4; max-width: 80%;">
            <?= $l->titulo; ?>
        </h6>
        <a href="<?= base_url(); ?>crm/detalhes/<?= $l->idcrm; ?>" class="text-indigo" style="color: var(--primary-color); z-index: 10;" title="Acessar Detalhes">
            <i class="fas fa-external-link-alt" style="font-size: 11px;"></i>
        </a>
    </div>
    
    <div class="text-muted d-flex align-items-center mb-2" style="font-size: 11.5px;">
        <i class="far fa-user mr-1 text-muted"></i>
        <span class="text-truncate" style="max-width: 90%;"><?= $l->nome_cliente; ?> <?= $l->sobrenome_cliente; ?></span>
    </div>
    
    <div class="d-flex align-items-center justify-content-between mt-2 pt-2 border-top" style="border-color: #f1f5f9 !important;">
        <span class="font-weight-bold text-success" style="font-size: 13px;">
            R$ <?= number_format((float)$l->valor, 2, ',', '.'); ?>
        </span>
        
        <?php if ($l->status == 'GANHO'): ?>
            <span class="badge badge-pill badge-success" style="font-size: 9px;">GANHO</span>
        <?php elseif ($l->status == 'PERDIDO'): ?>
            <span class="badge badge-pill badge-danger" style="font-size: 9px;">PERDIDO</span>
        <?php else: ?>
            <?php if ($l->data_proximo_contato): ?>
                <span class="text-muted" style="font-size: 10px;" title="Próximo contato">
                    <i class="far fa-calendar-alt mr-1"></i><?= date('d/m', strtotime($l->data_proximo_contato)); ?>
                </span>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    
    <!-- Stretched link for card clickability -->
    <a href="<?= base_url(); ?>crm/detalhes/<?= $l->idcrm; ?>" class="stretched-link" style="z-index: 1;"></a>
</div>
