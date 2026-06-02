<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faturamento extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('faturamento/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Faturamento';
        $query['msg'] = $msg;
        $this->db->select('faturamento_faturas.*, clientes.nome as cliente_nome');
        $this->db->join('clientes', 'clientes.clientesid = faturamento_faturas.clientesid', 'left');
        $this->db->order_by('faturamento_faturas.idfatura', 'DESC');
        $query['faturas'] = $this->db->get('faturamento_faturas')->result();
        $query['clientes'] = $this->db->get('clientes')->result();
        $query['total_pendente'] = $this->db->query("SELECT COALESCE(SUM(valor),0) as total FROM faturamento_faturas WHERE status IN ('PENDENTE','ATRASADO')")->row()->total;
        $query['total_pago'] = $this->db->query("SELECT COALESCE(SUM(valor),0) as total FROM faturamento_faturas WHERE status = 'PAGO'")->row()->total;
        $this->load->view('layout/header', $query);
        $this->load->view('app/faturamento/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'codigo' => $this->input->post('codigo') ?: 'FAT-' . strtoupper(substr(uniqid(), -6)),
            'clientesid' => $this->input->post('clientesid'),
            'os_id' => $this->input->post('os_id'),
            'contrato_id' => $this->input->post('contrato_id'),
            'descricao' => $this->input->post('descricao'),
            'valor' => $this->input->post('valor') ?: 0,
            'data_emissao' => $this->input->post('data_emissao') ?: date('Y-m-d'),
            'data_vencimento' => $this->input->post('data_vencimento'),
            'forma_pagamento' => $this->input->post('forma_pagamento') ?: 'BOLETO',
            'status' => $this->input->post('status') ?: 'PENDENTE',
            'observacoes' => $this->input->post('observacoes'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('faturamento_faturas', $data))
            redirect('faturamento/lista/novo');
        else
            redirect('faturamento/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idfatura');
        $data = array(
            'clientesid' => $this->input->post('clientesid'),
            'os_id' => $this->input->post('os_id'),
            'descricao' => $this->input->post('descricao'),
            'valor' => $this->input->post('valor'),
            'data_emissao' => $this->input->post('data_emissao'),
            'data_vencimento' => $this->input->post('data_vencimento'),
            'data_pagamento' => $this->input->post('data_pagamento'),
            'forma_pagamento' => $this->input->post('forma_pagamento'),
            'status' => $this->input->post('status'),
            'observacoes' => $this->input->post('observacoes')
        );
        $this->db->where('idfatura', $id);
        if ($this->db->update('faturamento_faturas', $data))
            redirect('faturamento/lista/update');
        else
            redirect('faturamento/lista/erro');
    }
    public function baixar($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idfatura', $id);
        $this->db->update('faturamento_faturas', array(
            'status' => 'PAGO',
            'data_pagamento' => date('Y-m-d')
        ));
        redirect('faturamento/lista/baixado');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idfatura', $id);
        $this->db->delete('faturamento_faturas');
        echo 'Deleted successfully.';
    }
    public function get($id) {
        $this->db->where('idfatura', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('faturamento_faturas')->row());
    }
}
