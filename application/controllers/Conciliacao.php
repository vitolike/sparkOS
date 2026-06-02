<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conciliacao extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('conciliacao/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Conciliação';
        $query['msg'] = $msg;
        $this->db->order_by('idlancamento', 'DESC');
        $query['lancamentos'] = $this->db->get('conciliacao_lancamentos')->result();
        $query['total_pendente'] = $this->db->query("SELECT COALESCE(SUM(valor),0) as total FROM conciliacao_lancamentos WHERE status = 'PENDENTE'")->row()->total;
        $query['total_conciliado'] = $this->db->query("SELECT COALESCE(SUM(valor),0) as total FROM conciliacao_lancamentos WHERE status = 'CONCILIADO'")->row()->total;
        $this->load->view('layout/header', $query);
        $this->load->view('app/conciliacao/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo') ?: 'RECEITA',
            'categoria' => $this->input->post('categoria'),
            'valor' => $this->input->post('valor') ?: 0,
            'data_lancamento' => $this->input->post('data_lancamento') ?: date('Y-m-d'),
            'conta_bancaria' => $this->input->post('conta_bancaria'),
            'documento' => $this->input->post('documento'),
            'status' => $this->input->post('status') ?: 'PENDENTE',
            'observacoes' => $this->input->post('observacoes'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('conciliacao_lancamentos', $data) ? redirect('conciliacao/lista/novo') : redirect('conciliacao/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idlancamento');
        $data = array(
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo'),
            'categoria' => $this->input->post('categoria'),
            'valor' => $this->input->post('valor'),
            'data_lancamento' => $this->input->post('data_lancamento'),
            'data_conciliacao' => $this->input->post('data_conciliacao'),
            'conta_bancaria' => $this->input->post('conta_bancaria'),
            'documento' => $this->input->post('documento'),
            'status' => $this->input->post('status'),
            'observacoes' => $this->input->post('observacoes')
        );
        $this->db->where('idlancamento', $id);
        $this->db->update('conciliacao_lancamentos', $data);
        redirect('conciliacao/lista/update');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idlancamento', $id)->delete('conciliacao_lancamentos');
        echo 'ok';
    }
    public function get($id) {
        $this->db->where('idlancamento', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('conciliacao_lancamentos')->row());
    }
    public function conciliar($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idlancamento', $id)->update('conciliacao_lancamentos', ['status' => 'CONCILIADO', 'data_conciliacao' => date('Y-m-d')]);
        redirect('conciliacao/lista/update');
    }
}
