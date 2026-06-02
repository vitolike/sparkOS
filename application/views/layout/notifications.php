<?php
$notify_view = isset($notify_view) ? $notify_view : '';

$messages = [
    'clientes' => [
        'novo_sucesso' => ['success', 'fa-check-circle', 'Sucesso!', 'O novo cliente foi adicionado com sucesso.'],
        'sucesso_update' => ['success', 'fa-check-circle', 'Sucesso!', 'Cadastro do cliente atualizado com sucesso.'],
        'sucesso_del' => ['success', 'fa-trash-alt', 'Sucesso!', 'O cliente foi removido com sucesso do sistema.'],
        'erro' => ['danger', 'fa-exclamation-triangle', 'Erro!', 'Este e-mail já existe cadastrado no sistema.'],
    ],
    'os' => [
        'novo' => ['success', 'fa-check-circle', 'Sucesso!', 'A nova Ordem de Serviço foi gerada com sucesso.'],
        'update' => ['success', 'fa-check-circle', 'Sucesso!', 'Ordem de Serviço atualizada com sucesso.'],
        'deletar' => ['success', 'fa-trash-alt', 'Sucesso!', 'A Ordem de Serviço foi apagada com sucesso.'],
        'criado' => ['success', 'fa-check-circle', 'Sucesso!', 'Ordem de Serviço criada com sucesso.'],
        'atualizado' => ['success', 'fa-check-circle', 'Sucesso!', 'Ordem de Serviço atualizada com sucesso.'],
        'status' => ['success', 'fa-check-circle', 'Sucesso!', 'Status da Ordem de Serviço alterado com sucesso.'],
    ],
    'produtos' => [
        'novo' => ['success', 'fa-check-circle', 'Sucesso!', 'O novo produto foi cadastrado com sucesso.'],
        'update' => ['success', 'fa-check-circle', 'Sucesso!', 'Cadastro do produto atualizado com sucesso.'],
        'deletar' => ['success', 'fa-trash-alt', 'Sucesso!', 'O produto foi apagado com sucesso do sistema.'],
        'erro' => ['danger', 'fa-exclamation-triangle', 'Erro!', 'O arquivo de foto enviado não é suportado.'],
    ],
    'servicos' => [
        'novo' => ['success', 'fa-check-circle', 'Sucesso!', 'O novo serviço foi cadastrado com sucesso.'],
        'update' => ['success', 'fa-check-circle', 'Sucesso!', 'Cadastro do serviço atualizado com sucesso.'],
        'deletar' => ['success', 'fa-trash-alt', 'Sucesso!', 'O serviço foi apagado com sucesso do sistema.'],
    ],
    'admins' => [
        'adicionado' => ['success', 'fa-user-circle', 'Novo usuário!', 'adicionado com sucesso.'],
        'erro_email' => ['danger', 'fa-exclamation-triangle', 'Erro!', 'E-mail já existe cadastrado no sistema.'],
        'atualizado' => ['success', 'fa-user-circle', 'Usuário!', 'atualizado com sucesso.'],
    ],
    'automacoes' => [
        'sucesso_automacao' => ['success', 'fa-check-circle', 'Sucesso!', 'Nova regra de automação e workflow adicionada com sucesso.'],
        'sucesso_status' => ['success', 'fa-check-circle', 'Sucesso!', 'Status do fluxo de automação alterado.'],
    ],
    'contratos' => [
        'sucesso_contrato' => ['success', 'fa-check-circle', 'Sucesso!', 'Novo contrato ou proposta comercial cadastrado com sucesso.'],
        'sucesso_status' => ['success', 'fa-check-circle', 'Sucesso!', 'Status do contrato comercial atualizado.'],
        'sucesso_assinatura' => ['success', 'fa-check-circle', 'Sucesso!', 'Contrato assinado eletronicamente via token certificado digital.'],
    ],
    'marketing' => [
        'sucesso_campanha' => ['success', 'fa-check-circle', 'Sucesso!', 'Nova campanha de marketing e captação de leads registrada.'],
        'sucesso_status' => ['success', 'fa-check-circle', 'Sucesso!', 'Status da campanha comercial atualizado com sucesso.'],
    ],
    'helpdesk' => [
        'sucesso_ticket' => ['success', 'fa-check-circle', 'Sucesso!', 'Novo ticket de suporte aberto no Help Desk.'],
        'sucesso_resolvido' => ['success', 'fa-check-circle', 'Sucesso!', 'Ticket de suporte marcado como resolvido e encerrado.'],
        'sucesso_atendimento' => ['success', 'fa-check-circle', 'Sucesso!', 'Ticket atualizado para "Em Atendimento".'],
    ],
    'compliance' => [
        'sucesso_nova' => ['success', 'fa-check-circle', 'Sucesso!', 'Novo evento de conformidade e auditoria registrado com sucesso.'],
        'sucesso_resolvido' => ['success', 'fa-check-circle', 'Sucesso!', 'Evento de compliance resolvido. Níveis de risco operacional reduzidos.'],
        'sucesso_recalculo' => ['success', 'fa-check-circle', 'Sucesso!', 'Score de risco do usuário recalculado e ajustado com sucesso.'],
    ],
    'riscos' => [
        'novo' => ['success', 'fa-check-circle', 'Sucesso!', 'Registro adicionado com sucesso.'],
        'update' => ['success', 'fa-check-circle', 'Sucesso!', 'Registro atualizado com sucesso.'],
        'novo_sucesso' => ['success', 'fa-check-circle', 'Sucesso!', 'Registro adicionado com sucesso.'],
        'sucesso_update' => ['success', 'fa-check-circle', 'Sucesso!', 'Registro atualizado com sucesso.'],
        'deletar' => ['success', 'fa-trash-alt', 'Sucesso!', 'Registro removido com sucesso.'],
        'erro' => ['danger', 'fa-exclamation-triangle', 'Erro!', 'Erro ao processar a operação. Verifique os dados e tente novamente.'],
        'status' => ['success', 'fa-check-circle', 'Sucesso!', 'Status atualizado com sucesso.'],
        'resolvido' => ['success', 'fa-check-circle', 'Sucesso!', 'Incidente resolvido com sucesso.'],
        'valor_adicionado' => ['success', 'fa-chart-line', 'Sucesso!', 'Valor do KRI registrado com sucesso.'],
    ],
];

if (isset($msg) && isset($messages[$notify_view][$msg])):
    $type = $messages[$notify_view][$msg][0];
    $icon = $messages[$notify_view][$msg][1];
    $title = $messages[$notify_view][$msg][2];
    $message = $messages[$notify_view][$msg][3];
    $modern_class = $type === 'danger' ? 'alert-danger-modern' : 'alert-success-modern';
?>
    <div class="alert alert-modern <?= $modern_class; ?> alert-dismissible fade show mb-4" role="alert">
        <strong><i class="fas <?= $icon; ?>"></i>&nbsp; <?= $title; ?></strong> <?= $message; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: inherit; opacity: 0.7;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
