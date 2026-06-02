<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RelatoriosFiscais extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('relatoriosfiscais/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Relatórios Fiscais';
        $query['msg'] = $msg;
        $this->db->order_by('idrelatorio', 'DESC');
        $query['relatorios'] = $this->db->get('fiscal_relatorios')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/relatoriosfiscais/lista', $query);
        $this->load->view('layout/footer');
    }
    public function gerar() {
        $this->login_model->verifica_sessao();
        $tipo = $this->input->post('tipo');
        $data = array(
            'titulo' => 'Relatório ' . $tipo . ' - ' . date('d/m/Y'),
            'tipo' => $tipo,
            'periodo_inicio' => $this->input->post('periodo_inicio'),
            'periodo_fim' => $this->input->post('periodo_fim'),
            'data_emissao' => date('Y-m-d H:i:s'),
            'status' => 'GERADO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('fiscal_relatorios', $data);
        redirect('relatoriosfiscais/lista/novo');
    }
}
