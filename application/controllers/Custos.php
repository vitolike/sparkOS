<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custos extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('custos/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Custos';
        $query['msg'] = $msg;
        $this->db->select('custos_lancamentos.*, custos_categorias.nome as categoria_nome');
        $this->db->join('custos_categorias', 'custos_categorias.idcategoria = custos_lancamentos.idcategoria', 'left');
        $this->db->order_by('custos_lancamentos.idcusto', 'DESC');
        $query['custos'] = $this->db->get('custos_lancamentos')->result();
        $query['categorias'] = $this->db->get('custos_categorias')->result();
        $query['total_mes'] = $this->db->query("SELECT COALESCE(SUM(valor),0) as total FROM custos_lancamentos WHERE MONTH(data_ocorrencia) = MONTH(CURDATE()) AND YEAR(data_ocorrencia) = YEAR(CURDATE())")->row()->total;
        $this->load->view('layout/header', $query);
        $this->load->view('app/custos/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'descricao' => $this->input->post('descricao'),
            'idcategoria' => $this->input->post('idcategoria'),
            'tipo' => $this->input->post('tipo') ?: 'VARIAVEL',
            'valor' => $this->input->post('valor') ?: 0,
            'data_ocorrencia' => $this->input->post('data_ocorrencia') ?: date('Y-m-d'),
            'os_id' => $this->input->post('os_id'),
            'fornecedor' => $this->input->post('fornecedor'),
            'forma_pagamento' => $this->input->post('forma_pagamento') ?: 'DINHEIRO',
            'status' => $this->input->post('status') ?: 'PAGO',
            'observacoes' => $this->input->post('observacoes'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('custos_lancamentos', $data))
            redirect('custos/lista/novo');
        else
            redirect('custos/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idcusto');
        $data = array(
            'descricao' => $this->input->post('descricao'),
            'idcategoria' => $this->input->post('idcategoria'),
            'tipo' => $this->input->post('tipo'),
            'valor' => $this->input->post('valor'),
            'data_ocorrencia' => $this->input->post('data_ocorrencia'),
            'os_id' => $this->input->post('os_id'),
            'fornecedor' => $this->input->post('fornecedor'),
            'forma_pagamento' => $this->input->post('forma_pagamento'),
            'status' => $this->input->post('status'),
            'observacoes' => $this->input->post('observacoes')
        );
        $this->db->where('idcusto', $id);
        if ($this->db->update('custos_lancamentos', $data))
            redirect('custos/lista/update');
        else
            redirect('custos/lista/erro');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idcusto', $id);
        $this->db->delete('custos_lancamentos');
        echo 'Deleted successfully.';
    }
    public function get($id) {
        $this->db->where('idcusto', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('custos_lancamentos')->row());
    }
}
