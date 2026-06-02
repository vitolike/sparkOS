    <!-- Modernized Sub-navigation -->
    <div class="nav-scroller box-shadow mb-4">
        <div class="container">
            <nav class="nav nav-underline">
                <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
                <a class="nav-link" href="<?= base_url(); ?>contratos/lista"><i class="fas fa-file-signature"></i> Contratos</a>
                <a class="nav-link active" onclick="history.back()"><i class="fas fa-arrow-left"></i> Voltar</a>
            </nav>
        </div>
    </div>

    <main role="main" class="container">

        <?php if ($msg == 'sucesso_contrato'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle"></i>&nbsp; Sucesso!</strong> Novo contrato cadastrado com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($msg == 'sucesso_assinatura'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle"></i>&nbsp; Sucesso!</strong> Contrato assinado eletronicamente com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($msg == 'sucesso_status'): ?>
            <div class="alert alert-modern alert-success-modern alert-dismissible fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle"></i>&nbsp; Sucesso!</strong> Status do contrato atualizado com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Main Details Card -->
        <div class="my-3 p-4 rounded box-shadow">
            <div class="row align-items-center mb-4">
                <div class="col-md-6">
                    <h5 class="card-title mb-1">
                        <i class="fas fa-file-signature mr-2 text-pink" style="color: #ec4899;"></i>
                        <b>Detalhes do Contrato</b>
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 13px;">Informações completas da proposta ou contrato comercial.</p>
                </div>
                <div class="col-md-6 text-md-right mt-3 mt-md-0">
                    <div class="d-flex justify-content-md-end gap-2 flex-wrap">
                        <?php if ($contrato->assinatura_eletronica == 'PENDENTE'): ?>
                            <a href="<?= base_url(); ?>contratos/assinar/<?= $contrato->idcontrato; ?>" class="btn btn-primary mr-2">
                                <i class="fas fa-file-signature mr-1"></i> Assinar
                            </a>
                        <?php endif; ?>
                        <?php if ($contrato->status == 'ATIVO'): ?>
                            <a href="<?= base_url(); ?>contratos/atualizar_status/<?= $contrato->idcontrato; ?>/RESCINDIDO" class="btn btn-secondary mr-2">
                                <i class="fas fa-times mr-1"></i> Rescindir
                            </a>
                        <?php else: ?>
                            <a href="<?= base_url(); ?>contratos/atualizar_status/<?= $contrato->idcontrato; ?>/ATIVO" class="btn btn-success mr-2">
                                <i class="fas fa-play mr-1"></i> Reativar
                            </a>
                        <?php endif; ?>
                        <button type="button" class="btn btn-secondary" onclick="window.print()">
                            <i class="fas fa-print mr-1"></i> Imprimir
                        </button>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <?php
                $data_criacao = new DateTime($contrato->criado_em);
                $data_expiracao = clone $data_criacao;
                $data_expiracao->modify('+' . $contrato->vigencia_meses . ' months');
                $valor_total = (float)$contrato->valor_mensal * (int)$contrato->vigencia_meses;
            ?>

            <!-- Status Badges Row -->
            <div class="row mb-4">
                <div class="col-12">
                    <span class="badge badge-pill mr-2" style="font-size: 11px; padding: 6px 14px; background: <?= $contrato->assinatura_eletronica == 'ASSINADO' ? 'rgba(16, 185, 129, 0.1)' : 'rgba(245, 158, 11, 0.1)'; ?>; color: <?= $contrato->assinatura_eletronica == 'ASSINADO' ? '#059669' : '#d97706'; ?>; border: 1px solid <?= $contrato->assinatura_eletronica == 'ASSINADO' ? 'rgba(16, 185, 129, 0.2)' : 'rgba(245, 158, 11, 0.2)'; ?>;">
                        <i class="fas fa-signature mr-1"></i> <?= $contrato->assinatura_eletronica; ?>
                    </span>
                    <span class="badge badge-pill mr-2" style="font-size: 11px; padding: 6px 14px; background: <?= $contrato->status == 'ATIVO' ? 'rgba(16, 185, 129, 0.1)' : ($contrato->status == 'EXPIRADO' ? 'rgba(245, 158, 11, 0.1)' : 'rgba(239, 68, 68, 0.1)'); ?>; color: <?= $contrato->status == 'ATIVO' ? '#059669' : ($contrato->status == 'EXPIRADO' ? '#d97706' : '#dc2626'); ?>; border: 1px solid <?= $contrato->status == 'ATIVO' ? 'rgba(16, 185, 129, 0.2)' : ($contrato->status == 'EXPIRADO' ? 'rgba(245, 158, 11, 0.2)' : 'rgba(239, 68, 68, 0.2)'); ?>;">
                        <i class="fas fa-circle mr-1"></i> <?= $contrato->status; ?>
                    </span>
                    <span class="text-muted" style="font-size: 13px;">
                        <i class="far fa-calendar-alt mr-1"></i> Criado em <?= date('d/m/Y', strtotime($contrato->criado_em)); ?>
                    </span>
                </div>
            </div>

            <!-- Section 1: Cliente -->
            <h6 class="card-title" style="font-size: 14px; border-bottom: 1px solid var(--border-color); padding-bottom: 12px; margin-bottom: 20px;">
                <i class="fas fa-user mr-2 text-primary"></i> Dados do Cliente
            </h6>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Nome</label>
                    <input type="text" class="form-control" value="<?= $contrato->nome_cliente; ?> <?= $contrato->sobrenome_cliente; ?>" readonly style="background-color: #f8fafc !important;">
                </div>
                <div class="form-group col-md-4">
                    <label>E-mail</label>
                    <input type="text" class="form-control" value="<?= $contrato->email; ?>" readonly style="background-color: #f8fafc !important;">
                </div>
                <div class="form-group col-md-4">
                    <label>Telefone</label>
                    <input type="text" class="form-control" value="<?= $contrato->telefone; ?>" readonly style="background-color: #f8fafc !important;">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Documento</label>
                    <input type="text" class="form-control" value="<?= $contrato->tipo_documento; ?> <?= $contrato->documento; ?>" readonly style="background-color: #f8fafc !important;">
                </div>
            </div>

            <!-- Section 2: Contrato -->
            <h6 class="card-title mt-4" style="font-size: 14px; border-bottom: 1px solid var(--border-color); padding-bottom: 12px; margin-bottom: 20px;">
                <i class="fas fa-file-contract mr-2 text-primary"></i> Dados do Contrato
            </h6>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Título / Objeto</label>
                    <input type="text" class="form-control font-weight-bold" value="<?= $contrato->titulo; ?>" readonly style="background-color: #f8fafc !important;">
                </div>
                <div class="form-group col-md-4">
                    <label>ID do Contrato</label>
                    <input type="text" class="form-control" value="#<?= $contrato->idcontrato; ?>" readonly style="background-color: #f8fafc !important; color: var(--primary-color) !important; font-weight: 700;">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Valor Mensal (MRR)</label>
                    <input type="text" class="form-control font-weight-bold text-success" value="R$ <?= number_format((float)$contrato->valor_mensal, 2, ',', '.'); ?>" readonly style="background-color: #f8fafc !important; color: var(--success-color) !important; font-size: 18px;">
                </div>
                <div class="form-group col-md-3">
                    <label>Vigência</label>
                    <input type="text" class="form-control" value="<?= $contrato->vigencia_meses; ?> Meses" readonly style="background-color: #f8fafc !important;">
                </div>
                <div class="form-group col-md-3">
                    <label>Valor Total do Contrato</label>
                    <input type="text" class="form-control font-weight-bold" value="R$ <?= number_format($valor_total, 2, ',', '.'); ?>" readonly style="background-color: #f8fafc !important; color: var(--primary-color) !important; font-size: 18px;">
                </div>
                <div class="form-group col-md-3">
                    <label>Data de Expiração</label>
                    <input type="text" class="form-control" value="<?= $data_expiracao->format('d/m/Y'); ?>" readonly style="background-color: #f8fafc !important;">
                </div>
            </div>

            <?php if ($faturas): ?>
                <hr class="my-5">

                <!-- Section 3: Faturas -->
                <h6 class="card-title" style="font-size: 14px; border-bottom: 1px solid var(--border-color); padding-bottom: 12px; margin-bottom: 20px;">
                    <i class="fas fa-file-invoice-dollar mr-2 text-primary"></i> Faturas Vinculadas
                </h6>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"># Fatura</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Vencimento</th>
                                <th scope="col">Pagamento</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($faturas as $f): ?>
                                <tr>
                                    <td class="font-weight-bold">#<?= $f->idfatura; ?></td>
                                    <td class="font-weight-bold text-success">R$ <?= number_format((float)$f->valor, 2, ',', '.'); ?></td>
                                    <td><?= date('d/m/Y', strtotime($f->data_vencimento)); ?></td>
                                    <td><?= $f->data_pagamento ? date('d/m/Y', strtotime($f->data_pagamento)) : '<span class="text-muted">—</span>'; ?></td>
                                    <td>
                                        <?php if ($f->status == 'PAGO'): ?>
                                            <span class="badge badge-pill badge-success" style="font-size: 10px;">PAGO</span>
                                        <?php elseif ($f->status == 'ATRASADO'): ?>
                                            <span class="badge badge-pill badge-danger" style="font-size: 10px;">ATRASADO</span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-warning" style="font-size: 10px;"><?= $f->status; ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </main>
