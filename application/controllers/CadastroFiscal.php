<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastroFiscal extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('cadastrofiscal/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Cadastro Fiscal';
        $query['msg'] = $msg;
        $this->db->select('fiscal_cadastro.*, clientes.nome as cliente_nome, clientes.documento');
        $this->db->join('clientes', 'clientes.clientesid = fiscal_cadastro.clientesid', 'right');
        $this->db->order_by('clientes.nome');
        $query['cadastros'] = $this->db->get('fiscal_cadastro')->result();
        $query['clientes'] = $this->db->get('clientes')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/cadastrofiscal/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'clientesid' => $this->input->post('clientesid'),
            'regime_tributario' => $this->input->post('regime_tributario') ?: 'SIMPLES_NACIONAL',
            'cnae' => $this->input->post('cnae'),
            'inscricao_estadual' => $this->input->post('inscricao_estadual'),
            'inscricao_municipal' => $this->input->post('inscricao_municipal'),
            'aliquota_iss' => $this->input->post('aliquota_iss') ?: 0,
            'aliquota_icms' => $this->input->post('aliquota_icms') ?: 0,
            'observacoes' => $this->input->post('observacoes'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('fiscal_cadastro', $data) ? redirect('cadastrofiscal/lista/novo') : redirect('cadastrofiscal/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idcadastro');
        $data = array(
            'clientesid' => $this->input->post('clientesid'),
            'regime_tributario' => $this->input->post('regime_tributario'),
            'cnae' => $this->input->post('cnae'),
            'inscricao_estadual' => $this->input->post('inscricao_estadual'),
            'inscricao_municipal' => $this->input->post('inscricao_municipal'),
            'aliquota_iss' => $this->input->post('aliquota_iss'),
            'aliquota_icms' => $this->input->post('aliquota_icms'),
            'observacoes' => $this->input->post('observacoes'),
            'alterado_em' => date('Y-m-d H:i:s')
        );
        $this->db->where('idcadastro', $id);
        $this->db->update('fiscal_cadastro', $data);
        redirect('cadastrofiscal/lista/update');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idcadastro', $id)->delete('fiscal_cadastro');
        echo 'ok';
    }
    public function get($id) {
        $this->db->where('idcadastro', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('fiscal_cadastro')->row());
    }
}
