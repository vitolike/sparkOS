<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tributacao extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('tributacao/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Tributação';
        $query['msg'] = $msg;
        $this->db->order_by('tipo, nome');
        $query['tributos'] = $this->db->get('fiscal_tributacao')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/tributacao/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo') ?: 'FEDERAL',
            'aliquota' => $this->input->post('aliquota') ?: 0,
            'base_calculo' => $this->input->post('base_calculo'),
            'periodicidade' => $this->input->post('periodicidade') ?: 'MENSAL',
            'status' => $this->input->post('status') ?: 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('fiscal_tributacao', $data) ? redirect('tributacao/lista/novo') : redirect('tributacao/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idtributo');
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo'),
            'aliquota' => $this->input->post('aliquota'),
            'base_calculo' => $this->input->post('base_calculo'),
            'periodicidade' => $this->input->post('periodicidade'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idtributo', $id);
        $this->db->update('fiscal_tributacao', $data);
        redirect('tributacao/lista/update');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idtributo', $id)->delete('fiscal_tributacao');
        echo 'ok';
    }
    public function get($id) {
        $this->db->where('idtributo', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('fiscal_tributacao')->row());
    }
}
