<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('relatorios/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Relatórios';
        $query['msg'] = $msg;
        $this->load->view('layout/header', $query);
        $this->load->view('app/relatorios/lista', $query);
        $this->load->view('layout/footer');
    }
    public function financeiro() {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Relatório Financeiro';
        $query['faturas_pendentes'] = $this->db->query("SELECT COALESCE(SUM(valor),0) as total FROM faturamento_faturas WHERE status IN ('PENDENTE','ATRASADO')")->row()->total;
        $query['faturas_pagas'] = $this->db->query("SELECT COALESCE(SUM(valor),0) as total FROM faturamento_faturas WHERE status = 'PAGO'")->row()->total;
        $query['total_custos'] = $this->db->query("SELECT COALESCE(SUM(valor),0) as total FROM custos_lancamentos WHERE MONTH(data_ocorrencia) = MONTH(CURDATE()) AND YEAR(data_ocorrencia) = YEAR(CURDATE())")->row()->total;
        $query['total_orcamentos'] = $this->db->query("SELECT COALESCE(SUM(valor_final),0) as total FROM orcamentos WHERE status = 'APROVADO'")->row()->total;
        $query['faturas_por_mes'] = $this->db->query("SELECT DATE_FORMAT(data_emissao, '%Y-%m') as mes, SUM(valor) as total FROM faturamento_faturas GROUP BY mes ORDER BY mes DESC LIMIT 12")->result();
        $query['custos_por_categoria'] = $this->db->query("SELECT custos_categorias.nome, SUM(custos_lancamentos.valor) as total FROM custos_lancamentos LEFT JOIN custos_categorias ON custos_categorias.idcategoria = custos_lancamentos.idcategoria WHERE MONTH(custos_lancamentos.data_ocorrencia) = MONTH(CURDATE()) AND YEAR(custos_lancamentos.data_ocorrencia) = YEAR(CURDATE()) GROUP BY custos_lancamentos.idcategoria")->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/relatorios/financeiro', $query);
        $this->load->view('layout/footer');
    }
    public function operacional() {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Relatório Operacional';
        $query['total_os'] = $this->db->count_all('os');
        $query['os_abertas'] = $this->db->where('status', 'ABERTO')->or_where('status', 'EM ANDAMENTO')->count_all_results('os');
        $query['os_mes'] = $this->db->query("SELECT COUNT(*) as total FROM os WHERE MONTH(data_inicial) = MONTH(CURDATE()) AND YEAR(data_inicial) = YEAR(CURDATE())")->row()->total;
        $query['total_equipamentos'] = $this->db->count_all('equipamentos');
        $query['total_clientes'] = $this->db->count_all('clientes');
        $query['total_chamados'] = $this->db->count_all('helpdesk_tickets');
        $query['chamados_abertos'] = $this->db->query("SELECT COUNT(*) as total FROM helpdesk_tickets WHERE status != 'RESOLVIDO'")->row()->total;
        $query['os_por_status'] = $this->db->query("SELECT status, COUNT(*) as total FROM os GROUP BY status")->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/relatorios/operacional', $query);
        $this->load->view('layout/footer');
    }
    public function risco() {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Relatório de Riscos';
        $query['total_riscos'] = $this->db->count_all('riscos_riscos');
        $query['riscos_criticos'] = $this->db->where('nivel_risco', 'CRITICO')->count_all_results('riscos_riscos');
        $query['riscos_altos'] = $this->db->where('nivel_risco', 'ALTO')->count_all_results('riscos_riscos');
        $query['incidentes_mes'] = $this->db->query("SELECT COUNT(*) as total FROM riscos_incidentes WHERE MONTH(data_ocorrencia) = MONTH(CURDATE()) AND YEAR(data_ocorrencia) = YEAR(CURDATE())")->row()->total;
        $query['planos_atrasados'] = $this->db->query("SELECT COUNT(*) as total FROM riscos_planos_acao WHERE status NOT IN ('CONCLUIDO','CANCELADO') AND prazo < CURDATE()")->row()->total;
        $query['riscos_por_nivel'] = $this->db->query("SELECT nivel_risco, COUNT(*) as total FROM riscos_riscos GROUP BY nivel_risco")->result();
        $query['incidentes_por_severidade'] = $this->db->query("SELECT severidade, COUNT(*) as total FROM riscos_incidentes GROUP BY severidade")->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/relatorios/risco', $query);
        $this->load->view('layout/footer');
    }
}
