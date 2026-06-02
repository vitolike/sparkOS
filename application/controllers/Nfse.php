<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nfse extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('nfse/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'NFS-e';
        $query['msg'] = $msg;
        $this->db->select('fiscal_nfse.*, clientes.nome as cliente_nome');
        $this->db->join('clientes', 'clientes.clientesid = fiscal_nfse.clientesid', 'left');
        $this->db->order_by('fiscal_nfse.idnfse', 'DESC');
        $query['notas'] = $this->db->get('fiscal_nfse')->result();
        $query['clientes'] = $this->db->get('clientes')->result();
        $query['total_emitido'] = $this->db->query("SELECT COALESCE(SUM(valor),0) as total FROM fiscal_nfse WHERE status = 'EMITIDA'")->row()->total;
        $this->load->view('layout/header', $query);
        $this->load->view('app/nfse/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $valor = $this->input->post('valor') ?: 0;
        $aliq_iss = $this->input->post('aliquota_iss') ?: 0;
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'clientesid' => $this->input->post('clientesid'),
            'os_id' => $this->input->post('os_id'),
            'valor' => $valor,
            'data_emissao' => $this->input->post('data_emissao') ?: date('Y-m-d'),
            'data_competencia' => $this->input->post('data_competencia') ?: date('Y-m-d'),
            'servico_descricao' => $this->input->post('servico_descricao'),
            'aliquota_iss' => $aliq_iss,
            'valor_iss' => $valor * $aliq_iss / 100,
            'numero_rps' => $this->input->post('numero_rps'),
            'status' => $this->input->post('status') ?: 'RASCUNHO',
            'observacoes' => $this->input->post('observacoes'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('fiscal_nfse', $data) ? redirect('nfse/lista/novo') : redirect('nfse/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idnfse');
        $valor = $this->input->post('valor') ?: 0;
        $aliq_iss = $this->input->post('aliquota_iss') ?: 0;
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'clientesid' => $this->input->post('clientesid'),
            'os_id' => $this->input->post('os_id'),
            'valor' => $valor,
            'data_emissao' => $this->input->post('data_emissao'),
            'data_competencia' => $this->input->post('data_competencia'),
            'servico_descricao' => $this->input->post('servico_descricao'),
            'aliquota_iss' => $aliq_iss,
            'valor_iss' => $valor * $aliq_iss / 100,
            'numero_rps' => $this->input->post('numero_rps'),
            'status' => $this->input->post('status'),
            'observacoes' => $this->input->post('observacoes')
        );
        $this->db->where('idnfse', $id);
        $this->db->update('fiscal_nfse', $data);
        redirect('nfse/lista/update');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idnfse', $id)->delete('fiscal_nfse');
        echo 'ok';
    }
    public function get($id) {
        $this->db->select('fiscal_nfse.*, clientes.nome as cliente_nome');
        $this->db->join('clientes', 'clientes.clientesid = fiscal_nfse.clientesid', 'left');
        $this->db->where('idnfse', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('fiscal_nfse')->row());
    }
}
