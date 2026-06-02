<!-- Sub-navigation Breadcrumb -->
<div class="nav-scroller box-shadow mb-4">
    <div class="container">
        <nav class="nav nav-underline">
            <a class="nav-link" href="<?= base_url(); ?>app/home"><i class="fas fa-home"></i> Dashboard</a>
            <a class="nav-link active" href="<?= base_url(); ?>riscos/lista/dashboard"><i class="fas fa-shield-alt"></i> Gestão de Riscos</a>
        </nav>
    </div>
</div>

<div role="main" class="container-fluid px-md-5">
    <?php $this->load->view('layout/notifications', ['notify_view' => 'riscos', 'msg' => $msg]); ?>

    <!-- Header -->
    <div class="my-3 p-4 rounded box-shadow">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="card-title mb-1">
                    <i class="fas fa-shield-alt mr-2" style="color: #6366f1;"></i>
                    <b>Gestão de Riscos Corporativos (GRC)</b>
                </h5>
                <p class="text-muted mb-0" style="font-size: 13px;">Framework integrado de riscos, controles, compliance, continuidade e governança.</p>
            </div>
            <div class="col-md-6 text-md-right mt-3 mt-md-0">
                <span class="text-muted mr-3" style="font-size: 12px;">
                    <i class="fas fa-database mr-1"></i> <?= $total_riscos; ?> riscos cadastrados
                </span>
            </div>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="mb-4">
        <ul class="nav nav-tabs flex-nowrap" style="overflow-x: auto; flex-wrap: nowrap; -webkit-overflow-scrolling: touch;">
            <li class="nav-item">
                <a class="nav-link <?= $section == 'dashboard' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/dashboard">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'riscos' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/riscos">
                    <i class="fas fa-exclamation-triangle"></i> Riscos <span class="badge badge-pill badge-secondary ml-1"><?= $total_riscos; ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'controles' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/controles">
                    <i class="fas fa-shield-virus"></i> Controles <span class="badge badge-pill badge-secondary ml-1"><?= $total_controles; ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'planos' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/planos">
                    <i class="fas fa-tasks"></i> Planos <span class="badge badge-pill badge-secondary ml-1"><?= $total_planos; ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'kris' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/kris">
                    <i class="fas fa-chart-line"></i> KRIs <span class="badge badge-pill badge-secondary ml-1"><?= $total_kris; ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'incidentes' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/incidentes">
                    <i class="fas fa-bug"></i> Incidentes <span class="badge badge-pill badge-secondary ml-1"><?= $total_incidentes; ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'compliance' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/compliance">
                    <i class="fas fa-gavel"></i> Compliance
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'auditoria' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/auditoria">
                    <i class="fas fa-clipboard-check"></i> Auditoria
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'fornecedores' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/fornecedores">
                    <i class="fas fa-truck"></i> Fornecedores
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'bcp' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/bcp">
                    <i class="fas fa-life-ring"></i> Continuidade
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'crises' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/crises">
                    <i class="fas fa-exclamation-circle"></i> Crises
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'comites' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/comites">
                    <i class="fas fa-users-cog"></i> Comitês
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $section == 'politicas' ? 'active' : ''; ?>" href="<?= base_url(); ?>riscos/lista/politicas">
                    <i class="fas fa-file-alt"></i> Políticas
                </a>
            </li>
        </ul>
    </div>

    <!-- Tab Content -->
    <?php
    $section_file = 'app/riscos/_' . $section;
    if (file_exists(VIEWPATH . $section_file . '.php')) {
        $this->load->view($section_file);
    } else {
        $this->load->view('app/riscos/_dashboard');
    }
    ?>
</div>

<style>
.nav-tabs .nav-link { font-size: 13px; padding: 10px 16px; white-space: nowrap; border: none; color: #64748b; font-weight: 500; }
.nav-tabs .nav-link:hover { color: #6366f1; background: rgba(99,102,241,0.04); }
.nav-tabs .nav-link.active { color: #6366f1; border-bottom: 2px solid #6366f1; background: transparent; }
.nav-tabs .nav-link .badge { font-size: 9px; vertical-align: middle; }
.badge-risco-CRITICO { background: rgba(239,68,68,0.12); color: #dc2626; }
.badge-risco-ALTO { background: rgba(245,158,11,0.12); color: #d97706; }
.badge-risco-MEDIO { background: rgba(99,102,241,0.12); color: #6366f1; }
.badge-risco-BAIXO { background: rgba(16,185,129,0.12); color: #059669; }
.heatmap-cell { width: 40px; height: 40px; text-align: center; font-size: 12px; font-weight: 600; border-radius: 4px; }
</style>

<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
