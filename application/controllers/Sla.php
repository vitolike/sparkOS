<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sla extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('sla/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'SLA';
        $query['msg'] = $msg;
        $this->db->select('sla_acordos.*, clientes.nome as cliente_nome');
        $this->db->join('clientes', 'clientes.clientesid = sla_acordos.cliente_id', 'left');
        $this->db->order_by('sla_acordos.idsla', 'DESC');
        $query['slas'] = $this->db->get('sla_acordos')->result();
        $query['clientes'] = $this->db->get('clientes')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/sla/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo') ?: 'INTERNO',
            'prioridade' => $this->input->post('prioridade') ?: 'MEDIA',
            'tempo_resposta_h' => $this->input->post('tempo_resposta_h') ?: 4,
            'tempo_resolucao_h' => $this->input->post('tempo_resolucao_h') ?: 24,
            'horario_funcionamento' => $this->input->post('horario_funcionamento'),
            'penalidades' => $this->input->post('penalidades'),
            'cliente_id' => $this->input->post('cliente_id'),
            'status' => $this->input->post('status') ?: 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('sla_acordos', $data))
            redirect('sla/lista/novo');
        else
            redirect('sla/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idsla');
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo'),
            'prioridade' => $this->input->post('prioridade'),
            'tempo_resposta_h' => $this->input->post('tempo_resposta_h'),
            'tempo_resolucao_h' => $this->input->post('tempo_resolucao_h'),
            'horario_funcionamento' => $this->input->post('horario_funcionamento'),
            'penalidades' => $this->input->post('penalidades'),
            'cliente_id' => $this->input->post('cliente_id'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idsla', $id);
        if ($this->db->update('sla_acordos', $data))
            redirect('sla/lista/update');
        else
            redirect('sla/lista/erro');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idsla', $id);
        $this->db->delete('sla_acordos');
        echo 'Deleted successfully.';
    }
    public function get($id) {
        $this->db->where('idsla', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('sla_acordos')->row());
    }
}
