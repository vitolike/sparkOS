<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContasAReceber extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('contasareceber/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Contas a Receber';
        $query['msg'] = $msg;
        $this->db->select('contas_receber.*, clientes.nome as cliente_nome');
        $this->db->join('clientes', 'clientes.clientesid = contas_receber.clientesid', 'left');
        $this->db->order_by('contas_receber.idreceber', 'DESC');
        $query['receber'] = $this->db->get('contas_receber')->result();
        $query['clientes'] = $this->db->get('clientes')->result();
        $query['total_pendente'] = $this->db->query("SELECT COALESCE(SUM(valor),0) as total FROM contas_receber WHERE status IN ('PENDENTE','ATRASADO')")->row()->total;
        $query['total_recebido'] = $this->db->query("SELECT COALESCE(SUM(valor_recebido),0) as total FROM contas_receber WHERE status = 'PAGO'")->row()->total;
        $this->load->view('layout/header', $query);
        $this->load->view('app/contasareceber/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'clientesid' => $this->input->post('clientesid'),
            'descricao' => $this->input->post('descricao'),
            'valor' => $this->input->post('valor') ?: 0,
            'data_vencimento' => $this->input->post('data_vencimento'),
            'forma_pagamento' => $this->input->post('forma_pagamento') ?: 'BOLETO',
            'status' => $this->input->post('status') ?: 'PENDENTE',
            'observacoes' => $this->input->post('observacoes'),
            'criado_em' => date('Y-m-d H:i:s'),
            'criado_por' => $this->session->nome
        );
        $this->db->insert('contas_receber', $data) ? redirect('contasareceber/lista/novo') : redirect('contasareceber/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idreceber');
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'clientesid' => $this->input->post('clientesid'),
            'descricao' => $this->input->post('descricao'),
            'valor' => $this->input->post('valor'),
            'data_vencimento' => $this->input->post('data_vencimento'),
            'data_pagamento' => $this->input->post('data_pagamento'),
            'forma_pagamento' => $this->input->post('forma_pagamento'),
            'valor_recebido' => $this->input->post('valor_recebido'),
            'juros' => $this->input->post('juros') ?: 0,
            'multa' => $this->input->post('multa') ?: 0,
            'status' => $this->input->post('status'),
            'observacoes' => $this->input->post('observacoes')
        );
        $this->db->where('idreceber', $id);
        $this->db->update('contas_receber', $data);
        redirect('contasareceber/lista/update');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idreceber', $id)->delete('contas_receber');
        echo 'ok';
    }
    public function get($id) {
        $this->db->where('idreceber', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('contas_receber')->row());
    }
    public function baixar($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idreceber', $id)->update('contas_receber', ['status' => 'PAGO', 'data_pagamento' => date('Y-m-d')]);
        redirect('contasareceber/lista/update');
    }
}
