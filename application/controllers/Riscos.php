<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riscos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model', '', TRUE);
    }

    public function index() {
        redirect('riscos/lista/dashboard');
    }

    public function lista($section = 'dashboard', $msg = null) {
        $this->login_model->verifica_sessao();

        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Gestão de Riscos';
        $query['section'] = $section;
        $query['msg'] = $msg;

        // Always load categories
        $query['categorias'] = $this->db->get('riscos_categorias')->result();

        // Summary counts for all sections
        $query['total_riscos'] = $this->db->count_all('riscos_riscos');
        $query['total_altos'] = $this->db->where('nivel_risco', 'ALTO')->or_where('nivel_risco', 'CRITICO')->count_all_results('riscos_riscos');
        $query['total_controles'] = $this->db->count_all('riscos_controles');
        $query['total_planos'] = $this->db->count_all('riscos_planos_acao');
        $query['planos_pendentes'] = $this->db->where('status', 'PENDENTE')->count_all_results('riscos_planos_acao');
        $query['total_kris'] = $this->db->count_all('riscos_kris');
        $query['kris_alerta'] = $this->db->where('status', 'ALERTA')->count_all_results('riscos_kris');
        $query['total_incidentes'] = $this->db->count_all('riscos_incidentes');
        $query['incidentes_abertos'] = $this->db->where('status', 'ABERTO')->count_all_results('riscos_incidentes');
        $query['total_fornecedores'] = $this->db->count_all('riscos_fornecedores');
        $query['fornecedores_risco'] = $this->db->where('nivel_risco', 'ALTO')->or_where('nivel_risco', 'CRITICO')->count_all_results('riscos_fornecedores');

        // Load data for the active section
        switch ($section) {
            case 'riscos':
                $this->db->select('riscos_riscos.*, riscos_categorias.nome as categoria_nome, riscos_categorias.cor as categoria_cor');
                $this->db->join('riscos_categorias', 'riscos_categorias.idcategoria = riscos_riscos.idcategoria', 'left');
                $this->db->order_by('riscos_riscos.idrisco', 'DESC');
                $query['riscos'] = $this->db->get('riscos_riscos')->result();
                break;

            case 'controles':
                $this->db->select('riscos_controles.*, riscos_riscos.titulo as risco_titulo, riscos_riscos.codigo as risco_codigo');
                $this->db->join('riscos_riscos', 'riscos_riscos.idrisco = riscos_controles.idrisco', 'left');
                $this->db->order_by('riscos_controles.idcontrole', 'DESC');
                $query['controles'] = $this->db->get('riscos_controles')->result();
                $query['riscos_list'] = $this->db->get('riscos_riscos')->result();
                break;

            case 'planos':
                $this->db->select('riscos_planos_acao.*, riscos_riscos.titulo as risco_titulo, riscos_riscos.codigo as risco_codigo');
                $this->db->join('riscos_riscos', 'riscos_riscos.idrisco = riscos_planos_acao.idrisco', 'left');
                $this->db->order_by('riscos_planos_acao.idplano', 'DESC');
                $query['planos'] = $this->db->get('riscos_planos_acao')->result();
                $query['riscos_list'] = $this->db->get('riscos_riscos')->result();
                $query['controles_list'] = $this->db->get('riscos_controles')->result();
                break;

            case 'kris':
                $this->db->select('riscos_kris.*, riscos_riscos.titulo as risco_titulo, riscos_riscos.codigo as risco_codigo');
                $this->db->join('riscos_riscos', 'riscos_riscos.idrisco = riscos_kris.idrisco', 'left');
                $this->db->order_by('riscos_kris.idkri', 'DESC');
                $query['kris'] = $this->db->get('riscos_kris')->result();
                $query['riscos_list'] = $this->db->get('riscos_riscos')->result();
                break;

            case 'incidentes':
                $this->db->select('riscos_incidentes.*, riscos_riscos.titulo as risco_titulo, riscos_riscos.codigo as risco_codigo');
                $this->db->join('riscos_riscos', 'riscos_riscos.idrisco = riscos_incidentes.idrisco', 'left');
                $this->db->order_by('riscos_incidentes.idincidente', 'DESC');
                $query['incidentes'] = $this->db->get('riscos_incidentes')->result();
                $query['riscos_list'] = $this->db->get('riscos_riscos')->result();
                break;

            case 'compliance':
                $this->db->select('riscos_compliance.*, riscos_riscos.titulo as risco_titulo');
                $this->db->join('riscos_riscos', 'riscos_riscos.idrisco = riscos_compliance.idrisco', 'left');
                $this->db->order_by('riscos_compliance.idcompliance', 'DESC');
                $query['compliance'] = $this->db->get('riscos_compliance')->result();
                $query['riscos_list'] = $this->db->get('riscos_riscos')->result();
                break;

            case 'auditoria':
                $this->db->select('riscos_auditoria.*, riscos_riscos.titulo as risco_titulo');
                $this->db->join('riscos_riscos', 'riscos_riscos.idrisco = riscos_auditoria.idrisco', 'left');
                $this->db->order_by('riscos_auditoria.idauditoria', 'DESC');
                $query['auditorias'] = $this->db->get('riscos_auditoria')->result();
                $query['riscos_list'] = $this->db->get('riscos_riscos')->result();
                break;

            case 'fornecedores':
                $this->db->order_by('idfornecedor', 'DESC');
                $query['fornecedores'] = $this->db->get('riscos_fornecedores')->result();
                break;

            case 'bcp':
                $this->db->select('riscos_bcp.*, riscos_riscos.titulo as risco_titulo');
                $this->db->join('riscos_riscos', 'riscos_riscos.idrisco = riscos_bcp.idrisco', 'left');
                $this->db->order_by('riscos_bcp.idbcp', 'DESC');
                $query['bcp'] = $this->db->get('riscos_bcp')->result();
                $query['riscos_list'] = $this->db->get('riscos_riscos')->result();
                break;

            case 'crises':
                $this->db->order_by('idcrise', 'DESC');
                $query['crises'] = $this->db->get('riscos_crises')->result();
                break;

            case 'comites':
                $this->db->order_by('idcomite', 'DESC');
                $query['comites'] = $this->db->get('riscos_comites')->result();
                break;

            case 'politicas':
                $this->db->order_by('idpolitica', 'DESC');
                $query['politicas'] = $this->db->get('riscos_politicas')->result();
                break;

            default: // dashboard
                // Heatmap data: count risks by probability x impact
                $query['heatmap'] = $this->db->query("
                    SELECT probabilidade, impacto, COUNT(*) as total
                    FROM riscos_riscos GROUP BY probabilidade, impacto
                ")->result();

                // Recent risks
                $this->db->order_by('idrisco', 'DESC');
                $this->db->limit(5);
                $query['recentes'] = $this->db->get('riscos_riscos')->result();

                // Risks by status
                $query['status_riscos'] = $this->db->query("
                    SELECT status, COUNT(*) as total FROM riscos_riscos GROUP BY status
                ")->result();

                // Risks by category
                $query['riscos_por_categoria'] = $this->db->query("
                    SELECT riscos_categorias.nome, riscos_categorias.cor, COUNT(riscos_riscos.idrisco) as total
                    FROM riscos_categorias LEFT JOIN riscos_riscos ON riscos_categorias.idcategoria = riscos_riscos.idcategoria
                    GROUP BY riscos_categorias.idcategoria
                ")->result();

                // Recent incidents
                $this->db->order_by('idincidente', 'DESC');
                $this->db->limit(5);
                $query['incidentes_recentes'] = $this->db->get('riscos_incidentes')->result();

                // Apettite levels
                $query['apetite'] = $this->db->get('riscos_apetite')->result();

                // Planos status
                $query['planos_status'] = $this->db->query("
                    SELECT status, COUNT(*) as total FROM riscos_planos_acao GROUP BY status
                ")->result();

                // KRIs ativos
                $query['kri_ativos'] = $this->db->get('riscos_kris')->result();
                break;
        }

        $this->load->view('layout/header', $query);
        $this->load->view('app/riscos/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }

    // ========================
    // RISCO CRUD
    // ========================
    private function calcular_nivel($prob, $impacto) {
        $score = $prob * $impacto;
        if ($score >= 15) return 'CRITICO';
        if ($score >= 9) return 'ALTO';
        if ($score >= 4) return 'MEDIO';
        return 'BAIXO';
    }

    public function add_risco() {
        $this->login_model->verifica_sessao();
        $prob = $this->input->post('probabilidade');
        $imp = $this->input->post('impacto');
        $data = array(
            'codigo' => $this->input->post('codigo') ?: 'RISK-' . strtoupper(substr(uniqid(), -6)),
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'idcategoria' => $this->input->post('idcategoria'),
            'area_responsavel' => $this->input->post('area_responsavel'),
            'proprietario' => $this->input->post('proprietario'),
            'data_identificacao' => $this->input->post('data_identificacao') ?: date('Y-m-d'),
            'probabilidade' => $prob,
            'impacto' => $imp,
            'score_automatico' => $prob * $imp,
            'nivel_risco' => $this->calcular_nivel($prob, $imp),
            'status' => $this->input->post('status') ?: 'IDENTIFICADO',
            'criado_em' => date('Y-m-d H:i:s'),
            'criado_por' => $this->session->userdata('nome')
        );
        if ($this->db->insert('riscos_riscos', $data))
            redirect('riscos/lista/riscos/novo');
        else
            redirect('riscos/lista/riscos/erro');
    }

    public function update_risco() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idrisco');
        $prob = $this->input->post('probabilidade');
        $imp = $this->input->post('impacto');
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'idcategoria' => $this->input->post('idcategoria'),
            'area_responsavel' => $this->input->post('area_responsavel'),
            'proprietario' => $this->input->post('proprietario'),
            'data_identificacao' => $this->input->post('data_identificacao'),
            'probabilidade' => $prob,
            'impacto' => $imp,
            'score_automatico' => $prob * $imp,
            'nivel_risco' => $this->calcular_nivel($prob, $imp),
            'status' => $this->input->post('status'),
            'alterado_em' => date('Y-m-d H:i:s')
        );
        $this->db->where('idrisco', $id);
        if ($this->db->update('riscos_riscos', $data))
            redirect('riscos/lista/riscos/update');
        else
            redirect('riscos/lista/riscos/erro');
    }

    public function delete_risco($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idrisco', $id);
        $this->db->delete('riscos_riscos');
        echo 'Deleted successfully.';
    }

    public function get_risco($id) {
        $this->db->where('idrisco', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_riscos')->row());
    }

    // ========================
    // CONTROLE CRUD
    // ========================
    public function add_controle() {
        $this->login_model->verifica_sessao();
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo') ?: 'PREVENTIVO',
            'efetividade' => $this->input->post('efetividade') ?: 'MEDIA',
            'frequencia' => $this->input->post('frequencia') ?: 'DIARIA',
            'responsavel' => $this->input->post('responsavel'),
            'evidencias' => $this->input->post('evidencias'),
            'status' => $this->input->post('status') ?: 'ATIVO',
            'data_implementacao' => $this->input->post('data_implementacao') ?: date('Y-m-d'),
            'proxima_revisao' => $this->input->post('proxima_revisao'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('riscos_controles', $data))
            redirect('riscos/lista/controles/novo');
        else
            redirect('riscos/lista/controles/erro');
    }

    public function update_controle() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idcontrole');
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo'),
            'efetividade' => $this->input->post('efetividade'),
            'frequencia' => $this->input->post('frequencia'),
            'responsavel' => $this->input->post('responsavel'),
            'evidencias' => $this->input->post('evidencias'),
            'status' => $this->input->post('status'),
            'data_implementacao' => $this->input->post('data_implementacao'),
            'proxima_revisao' => $this->input->post('proxima_revisao')
        );
        $this->db->where('idcontrole', $id);
        if ($this->db->update('riscos_controles', $data))
            redirect('riscos/lista/controles/update');
        else
            redirect('riscos/lista/controles/erro');
    }

    public function delete_controle($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idcontrole', $id);
        $this->db->delete('riscos_controles');
        echo 'Deleted successfully.';
    }

    public function get_controle($id) {
        $this->db->where('idcontrole', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_controles')->row());
    }

    // ========================
    // PLANO DE AÇÃO CRUD
    // ========================
    public function add_plano() {
        $this->login_model->verifica_sessao();
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'idcontrole' => $this->input->post('idcontrole') ?: null,
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo') ?: 'CORRETIVA',
            'responsavel' => $this->input->post('responsavel'),
            'prazo' => $this->input->post('prazo'),
            'status' => $this->input->post('status') ?: 'PENDENTE',
            'percentual' => $this->input->post('percentual') ?: 0,
            'observacoes' => $this->input->post('observacoes'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('riscos_planos_acao', $data))
            redirect('riscos/lista/planos/novo');
        else
            redirect('riscos/lista/planos/erro');
    }

    public function update_plano() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idplano');
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'idcontrole' => $this->input->post('idcontrole') ?: null,
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo'),
            'responsavel' => $this->input->post('responsavel'),
            'prazo' => $this->input->post('prazo'),
            'status' => $this->input->post('status'),
            'percentual' => $this->input->post('percentual') ?: 0,
            'observacoes' => $this->input->post('observacoes'),
            'concluido_em' => $this->input->post('status') == 'CONCLUIDO' ? date('Y-m-d H:i:s') : null
        );
        $this->db->where('idplano', $id);
        if ($this->db->update('riscos_planos_acao', $data))
            redirect('riscos/lista/planos/update');
        else
            redirect('riscos/lista/planos/erro');
    }

    public function update_plano_status($id, $status) {
        $this->login_model->verifica_sessao();
        $data = array('status' => $status);
        if ($status == 'CONCLUIDO') $data['concluido_em'] = date('Y-m-d H:i:s');
        $this->db->where('idplano', $id);
        $this->db->update('riscos_planos_acao', $data);
        redirect('riscos/lista/planos/status');
    }

    public function delete_plano($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idplano', $id);
        $this->db->delete('riscos_planos_acao');
        echo 'Deleted successfully.';
    }

    public function get_plano($id) {
        $this->db->where('idplano', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_planos_acao')->row());
    }

    // ========================
    // KRI CRUD
    // ========================
    public function add_kri() {
        $this->login_model->verifica_sessao();
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'unidade' => $this->input->post('unidade') ?: '%',
            'valor_atual' => $this->input->post('valor_atual') ?: 0,
            'limite_verde' => $this->input->post('limite_verde') ?: 30,
            'limite_amarelo' => $this->input->post('limite_amarelo') ?: 60,
            'limite_vermelho' => $this->input->post('limite_vermelho') ?: 80,
            'periodicidade' => $this->input->post('periodicidade') ?: 'MENSAL',
            'diretriz' => $this->input->post('diretriz') ?: 'MAIOR_MELHOR',
            'status' => $this->input->post('status') ?: 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('riscos_kris', $data))
            redirect('riscos/lista/kris/novo');
        else
            redirect('riscos/lista/kris/erro');
    }

    public function update_kri() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idkri');
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'unidade' => $this->input->post('unidade'),
            'valor_atual' => $this->input->post('valor_atual') ?: 0,
            'limite_verde' => $this->input->post('limite_verde') ?: 30,
            'limite_amarelo' => $this->input->post('limite_amarelo') ?: 60,
            'limite_vermelho' => $this->input->post('limite_vermelho') ?: 80,
            'periodicidade' => $this->input->post('periodicidade'),
            'diretriz' => $this->input->post('diretriz'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idkri', $id);
        if ($this->db->update('riscos_kris', $data))
            redirect('riscos/lista/kris/update');
        else
            redirect('riscos/lista/kris/erro');
    }

    public function delete_kri($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idkri', $id);
        $this->db->delete('riscos_kris');
        echo 'Deleted successfully.';
    }

    public function get_kri($id) {
        $this->db->where('idkri', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_kris')->row());
    }

    public function add_kri_valor() {
        $this->login_model->verifica_sessao();
        $idkri = $this->input->post('idkri');
        $valor = $this->input->post('valor');
        $data = array(
            'idkri' => $idkri,
            'valor' => $valor,
            'data_registro' => $this->input->post('data_registro') ?: date('Y-m-d H:i:s'),
            'observacao' => $this->input->post('observacao')
        );
        if ($this->db->insert('riscos_kris_historico', $data)) {
            $this->db->where('idkri', $idkri);
            $this->db->update('riscos_kris', array('valor_atual' => $valor));
            redirect('riscos/lista/kris/valor_adicionado');
        } else {
            redirect('riscos/lista/kris/erro');
        }
    }

    public function get_kri_historico($idkri) {
        $this->db->where('idkri', $idkri);
        $this->db->order_by('data_registro', 'ASC');
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_kris_historico')->result());
    }

    // ========================
    // INCIDENTE CRUD
    // ========================
    public function add_incidente() {
        $this->login_model->verifica_sessao();
        $data = array(
            'idrisco' => $this->input->post('idrisco') ?: null,
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'causa_raiz' => $this->input->post('causa_raiz'),
            'impacto_financeiro' => $this->input->post('impacto_financeiro') ?: 0,
            'tipo' => $this->input->post('tipo') ?: 'INCIDENTE',
            'severidade' => $this->input->post('severidade') ?: 'MEDIO',
            'status' => $this->input->post('status') ?: 'ABERTO',
            'evidencias' => $this->input->post('evidencias'),
            'licoes_aprendidas' => $this->input->post('licoes_aprendidas'),
            'data_ocorrencia' => $this->input->post('data_ocorrencia') ?: date('Y-m-d H:i:s'),
            'criado_em' => date('Y-m-d H:i:s'),
            'criado_por' => $this->session->userdata('nome')
        );
        if ($this->db->insert('riscos_incidentes', $data))
            redirect('riscos/lista/incidentes/novo');
        else
            redirect('riscos/lista/incidentes/erro');
    }

    public function update_incidente() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idincidente');
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'causa_raiz' => $this->input->post('causa_raiz'),
            'impacto_financeiro' => $this->input->post('impacto_financeiro') ?: 0,
            'tipo' => $this->input->post('tipo'),
            'severidade' => $this->input->post('severidade'),
            'status' => $this->input->post('status'),
            'evidencias' => $this->input->post('evidencias'),
            'licoes_aprendidas' => $this->input->post('licoes_aprendidas'),
            'data_ocorrencia' => $this->input->post('data_ocorrencia'),
            'data_resolucao' => $this->input->post('status') == 'RESOLVIDO' ? date('Y-m-d H:i:s') : null
        );
        $this->db->where('idincidente', $id);
        if ($this->db->update('riscos_incidentes', $data))
            redirect('riscos/lista/incidentes/update');
        else
            redirect('riscos/lista/incidentes/erro');
    }

    public function resolver_incidente($id) {
        $this->login_model->verifica_sessao();
        $data = array('status' => 'RESOLVIDO', 'data_resolucao' => date('Y-m-d H:i:s'));
        $this->db->where('idincidente', $id);
        $this->db->update('riscos_incidentes', $data);
        redirect('riscos/lista/incidentes/resolvido');
    }

    public function delete_incidente($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idincidente', $id);
        $this->db->delete('riscos_incidentes');
        echo 'Deleted successfully.';
    }

    public function get_incidente($id) {
        $this->db->where('idincidente', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_incidentes')->row());
    }

    // ========================
    // COMPLIANCE CRUD
    // ========================
    public function add_compliance() {
        $this->login_model->verifica_sessao();
        $data = array(
            'idrisco' => $this->input->post('idrisco') ?: null,
            'regulamento' => $this->input->post('regulamento'),
            'descricao' => $this->input->post('descricao'),
            'obrigacao' => $this->input->post('obrigacao'),
            'area_responsavel' => $this->input->post('area_responsavel'),
            'nivel_conformidade' => $this->input->post('nivel_conformidade') ?: 0,
            'ultima_avaliacao' => $this->input->post('ultima_avaliacao') ?: date('Y-m-d'),
            'proxima_avaliacao' => $this->input->post('proxima_avaliacao'),
            'status' => $this->input->post('status') ?: 'MONITORANDO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('riscos_compliance', $data))
            redirect('riscos/lista/compliance/novo');
        else
            redirect('riscos/lista/compliance/erro');
    }

    public function update_compliance() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idcompliance');
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'regulamento' => $this->input->post('regulamento'),
            'descricao' => $this->input->post('descricao'),
            'obrigacao' => $this->input->post('obrigacao'),
            'area_responsavel' => $this->input->post('area_responsavel'),
            'nivel_conformidade' => $this->input->post('nivel_conformidade') ?: 0,
            'ultima_avaliacao' => $this->input->post('ultima_avaliacao'),
            'proxima_avaliacao' => $this->input->post('proxima_avaliacao'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idcompliance', $id);
        if ($this->db->update('riscos_compliance', $data))
            redirect('riscos/lista/compliance/update');
        else
            redirect('riscos/lista/compliance/erro');
    }

    public function delete_compliance($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idcompliance', $id);
        $this->db->delete('riscos_compliance');
        echo 'Deleted successfully.';
    }

    public function get_compliance($id) {
        $this->db->where('idcompliance', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_compliance')->row());
    }

    // ========================
    // AUDITORIA CRUD
    // ========================
    public function add_auditoria() {
        $this->login_model->verifica_sessao();
        $data = array(
            'idrisco' => $this->input->post('idrisco') ?: null,
            'titulo' => $this->input->post('titulo'),
            'escopo' => $this->input->post('escopo'),
            'tipo' => $this->input->post('tipo') ?: 'INTERNA',
            'achados' => $this->input->post('achados'),
            'nao_conformidades' => $this->input->post('nao_conformidades'),
            'recomendacoes' => $this->input->post('recomendacoes'),
            'status' => $this->input->post('status') ?: 'PLANEJADA',
            'responsavel' => $this->input->post('responsavel'),
            'data_inicio' => $this->input->post('data_inicio'),
            'data_fim' => $this->input->post('data_fim'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('riscos_auditoria', $data))
            redirect('riscos/lista/auditoria/novo');
        else
            redirect('riscos/lista/auditoria/erro');
    }

    public function update_auditoria() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idauditoria');
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'titulo' => $this->input->post('titulo'),
            'escopo' => $this->input->post('escopo'),
            'tipo' => $this->input->post('tipo'),
            'achados' => $this->input->post('achados'),
            'nao_conformidades' => $this->input->post('nao_conformidades'),
            'recomendacoes' => $this->input->post('recomendacoes'),
            'status' => $this->input->post('status'),
            'responsavel' => $this->input->post('responsavel'),
            'data_inicio' => $this->input->post('data_inicio'),
            'data_fim' => $this->input->post('data_fim')
        );
        $this->db->where('idauditoria', $id);
        if ($this->db->update('riscos_auditoria', $data))
            redirect('riscos/lista/auditoria/update');
        else
            redirect('riscos/lista/auditoria/erro');
    }

    public function delete_auditoria($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idauditoria', $id);
        $this->db->delete('riscos_auditoria');
        echo 'Deleted successfully.';
    }

    public function get_auditoria($id) {
        $this->db->where('idauditoria', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_auditoria')->row());
    }

    // ========================
    // FORNECEDOR CRUD
    // ========================
    public function add_fornecedor() {
        $this->login_model->verifica_sessao();
        $data = array(
            'idrisco' => $this->input->post('idrisco') ?: null,
            'nome' => $this->input->post('nome'),
            'cnpj' => $this->input->post('cnpj'),
            'categoria' => $this->input->post('categoria'),
            'nivel_risco' => $this->input->post('nivel_risco') ?: 'BAIXO',
            'score_risco' => $this->input->post('score_risco') ?: 0,
            'due_diligence' => $this->input->post('due_diligence'),
            'data_avaliacao' => $this->input->post('data_avaliacao') ?: date('Y-m-d'),
            'proxima_avaliacao' => $this->input->post('proxima_avaliacao'),
            'status' => $this->input->post('status') ?: 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('riscos_fornecedores', $data))
            redirect('riscos/lista/fornecedores/novo');
        else
            redirect('riscos/lista/fornecedores/erro');
    }

    public function update_fornecedor() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idfornecedor');
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'nome' => $this->input->post('nome'),
            'cnpj' => $this->input->post('cnpj'),
            'categoria' => $this->input->post('categoria'),
            'nivel_risco' => $this->input->post('nivel_risco'),
            'score_risco' => $this->input->post('score_risco') ?: 0,
            'due_diligence' => $this->input->post('due_diligence'),
            'data_avaliacao' => $this->input->post('data_avaliacao'),
            'proxima_avaliacao' => $this->input->post('proxima_avaliacao'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idfornecedor', $id);
        if ($this->db->update('riscos_fornecedores', $data))
            redirect('riscos/lista/fornecedores/update');
        else
            redirect('riscos/lista/fornecedores/erro');
    }

    public function delete_fornecedor($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idfornecedor', $id);
        $this->db->delete('riscos_fornecedores');
        echo 'Deleted successfully.';
    }

    public function get_fornecedor($id) {
        $this->db->where('idfornecedor', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_fornecedores')->row());
    }

    // ========================
    // BCP CRUD
    // ========================
    public function add_bcp() {
        $this->login_model->verifica_sessao();
        $data = array(
            'idrisco' => $this->input->post('idrisco') ?: null,
            'titulo' => $this->input->post('titulo'),
            'tipo' => $this->input->post('tipo') ?: 'BIA',
            'descricao' => $this->input->post('descricao'),
            'impacto_negocio' => $this->input->post('impacto_negocio'),
            'mtd_horas' => $this->input->post('mtd_horas'),
            'rpo_horas' => $this->input->post('rpo_horas'),
            'rto_horas' => $this->input->post('rto_horas'),
            'recursos_criticos' => $this->input->post('recursos_criticos'),
            'plano_recuperacao' => $this->input->post('plano_recuperacao'),
            'responsavel' => $this->input->post('responsavel'),
            'ultimo_teste' => $this->input->post('ultimo_teste'),
            'proximo_teste' => $this->input->post('proximo_teste'),
            'status' => $this->input->post('status') ?: 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('riscos_bcp', $data))
            redirect('riscos/lista/bcp/novo');
        else
            redirect('riscos/lista/bcp/erro');
    }

    public function update_bcp() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idbcp');
        $data = array(
            'idrisco' => $this->input->post('idrisco'),
            'titulo' => $this->input->post('titulo'),
            'tipo' => $this->input->post('tipo'),
            'descricao' => $this->input->post('descricao'),
            'impacto_negocio' => $this->input->post('impacto_negocio'),
            'mtd_horas' => $this->input->post('mtd_horas'),
            'rpo_horas' => $this->input->post('rpo_horas'),
            'rto_horas' => $this->input->post('rto_horas'),
            'recursos_criticos' => $this->input->post('recursos_criticos'),
            'plano_recuperacao' => $this->input->post('plano_recuperacao'),
            'responsavel' => $this->input->post('responsavel'),
            'ultimo_teste' => $this->input->post('ultimo_teste'),
            'proximo_teste' => $this->input->post('proximo_teste'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idbcp', $id);
        if ($this->db->update('riscos_bcp', $data))
            redirect('riscos/lista/bcp/update');
        else
            redirect('riscos/lista/bcp/erro');
    }

    public function delete_bcp($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idbcp', $id);
        $this->db->delete('riscos_bcp');
        echo 'Deleted successfully.';
    }

    public function get_bcp($id) {
        $this->db->where('idbcp', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_bcp')->row());
    }

    // ========================
    // CRISE CRUD
    // ========================
    public function add_crise() {
        $this->login_model->verifica_sessao();
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo') ?: 'OPERACIONAL',
            'nivel' => $this->input->post('nivel') ?: 'MEDIO',
            'comite' => $this->input->post('comite'),
            'escalonamento' => $this->input->post('escalonamento'),
            'comunicacao' => $this->input->post('comunicacao'),
            'acoes_tomadas' => $this->input->post('acoes_tomadas'),
            'status' => $this->input->post('status') ?: 'MONITORANDO',
            'data_inicio' => $this->input->post('data_inicio') ?: date('Y-m-d H:i:s'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('riscos_crises', $data))
            redirect('riscos/lista/crises/novo');
        else
            redirect('riscos/lista/crises/erro');
    }

    public function update_crise() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idcrise');
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo'),
            'nivel' => $this->input->post('nivel'),
            'comite' => $this->input->post('comite'),
            'escalonamento' => $this->input->post('escalonamento'),
            'comunicacao' => $this->input->post('comunicacao'),
            'acoes_tomadas' => $this->input->post('acoes_tomadas'),
            'status' => $this->input->post('status'),
            'data_inicio' => $this->input->post('data_inicio'),
            'data_fim' => $this->input->post('status') == 'RESOLVIDO' ? date('Y-m-d H:i:s') : null
        );
        $this->db->where('idcrise', $id);
        if ($this->db->update('riscos_crises', $data))
            redirect('riscos/lista/crises/update');
        else
            redirect('riscos/lista/crises/erro');
    }

    public function delete_crise($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idcrise', $id);
        $this->db->delete('riscos_crises');
        echo 'Deleted successfully.';
    }

    public function get_crise($id) {
        $this->db->where('idcrise', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_crises')->row());
    }

    // ========================
    // COMITÊ CRUD
    // ========================
    public function add_comite() {
        $this->login_model->verifica_sessao();
        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'membros' => $this->input->post('membros'),
            'periodicidade' => $this->input->post('periodicidade') ?: 'MENSAL',
            'status' => $this->input->post('status') ?: 'ATIVO',
            'ultima_reuniao' => $this->input->post('ultima_reuniao'),
            'proxima_reuniao' => $this->input->post('proxima_reuniao'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('riscos_comites', $data))
            redirect('riscos/lista/comites/novo');
        else
            redirect('riscos/lista/comites/erro');
    }

    public function update_comite() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idcomite');
        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'membros' => $this->input->post('membros'),
            'periodicidade' => $this->input->post('periodicidade'),
            'status' => $this->input->post('status'),
            'ultima_reuniao' => $this->input->post('ultima_reuniao'),
            'proxima_reuniao' => $this->input->post('proxima_reuniao')
        );
        $this->db->where('idcomite', $id);
        if ($this->db->update('riscos_comites', $data))
            redirect('riscos/lista/comites/update');
        else
            redirect('riscos/lista/comites/erro');
    }

    public function delete_comite($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idcomite', $id);
        $this->db->delete('riscos_comites');
        echo 'Deleted successfully.';
    }

    public function get_comite($id) {
        $this->db->where('idcomite', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_comites')->row());
    }

    // ========================
    // POLÍTICA CRUD
    // ========================
    public function add_politica() {
        $this->login_model->verifica_sessao();
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'versao' => $this->input->post('versao') ?: '1.0',
            'area' => $this->input->post('area'),
            'responsavel' => $this->input->post('responsavel'),
            'data_aprovacao' => $this->input->post('data_aprovacao') ?: date('Y-m-d'),
            'data_revisao' => $this->input->post('data_revisao'),
            'conteudo' => $this->input->post('conteudo'),
            'status' => $this->input->post('status') ?: 'APROVADA',
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('riscos_politicas', $data))
            redirect('riscos/lista/politicas/novo');
        else
            redirect('riscos/lista/politicas/erro');
    }

    public function update_politica() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idpolitica');
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'versao' => $this->input->post('versao'),
            'area' => $this->input->post('area'),
            'responsavel' => $this->input->post('responsavel'),
            'data_aprovacao' => $this->input->post('data_aprovacao'),
            'data_revisao' => $this->input->post('data_revisao'),
            'conteudo' => $this->input->post('conteudo'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idpolitica', $id);
        if ($this->db->update('riscos_politicas', $data))
            redirect('riscos/lista/politicas/update');
        else
            redirect('riscos/lista/politicas/erro');
    }

    public function delete_politica($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idpolitica', $id);
        $this->db->delete('riscos_politicas');
        echo 'Deleted successfully.';
    }

    public function get_politica($id) {
        $this->db->where('idpolitica', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('riscos_politicas')->row());
    }
}
