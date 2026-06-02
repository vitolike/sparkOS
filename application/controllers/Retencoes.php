<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retencoes extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('retencoes/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Retenções';
        $query['msg'] = $msg;
        $this->db->select('fiscal_retencoes.*, clientes.nome as cliente_nome');
        $this->db->join('clientes', 'clientes.clientesid = fiscal_retencoes.clientesid', 'left');
        $this->db->order_by('fiscal_retencoes.idretencao', 'DESC');
        $query['retencoes'] = $this->db->get('fiscal_retencoes')->result();
        $query['clientes'] = $this->db->get('clientes')->result();
        $query['total_reter'] = $this->db->query("SELECT COALESCE(SUM(valor_retencao),0) as total FROM fiscal_retencoes WHERE status = 'PENDENTE'")->row()->total;
        $this->load->view('layout/header', $query);
        $this->load->view('app/retencoes/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'clientesid' => $this->input->post('clientesid'),
            'nfse_id' => $this->input->post('nfse_id'),
            'tipo' => $this->input->post('tipo') ?: 'PIS',
            'valor_base' => $this->input->post('valor_base') ?: 0,
            'aliquota' => $this->input->post('aliquota') ?: 0,
            'valor_retencao' => $this->input->post('valor_retencao') ?: 0,
            'data_retencao' => $this->input->post('data_retencao') ?: date('Y-m-d'),
            'status' => $this->input->post('status') ?: 'PENDENTE',
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('fiscal_retencoes', $data) ? redirect('retencoes/lista/novo') : redirect('retencoes/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idretencao');
        $data = array(
            'clientesid' => $this->input->post('clientesid'),
            'nfse_id' => $this->input->post('nfse_id'),
            'tipo' => $this->input->post('tipo'),
            'valor_base' => $this->input->post('valor_base'),
            'aliquota' => $this->input->post('aliquota'),
            'valor_retencao' => $this->input->post('valor_retencao'),
            'data_retencao' => $this->input->post('data_retencao'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idretencao', $id);
        $this->db->update('fiscal_retencoes', $data);
        redirect('retencoes/lista/update');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idretencao', $id)->delete('fiscal_retencoes');
        echo 'ok';
    }
    public function get($id) {
        $this->db->where('idretencao', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('fiscal_retencoes')->row());
    }
}
