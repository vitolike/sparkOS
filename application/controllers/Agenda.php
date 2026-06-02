<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('agenda/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Agenda';
        $query['msg'] = $msg;
        $this->db->select('agenda_eventos.*, admins.nome as tecnico_nome, clientes.nome as cliente_nome');
        $this->db->join('admins', 'admins.adminid = agenda_eventos.admin_id', 'left');
        $this->db->join('clientes', 'clientes.clientesid = agenda_eventos.cliente_id', 'left');
        $this->db->order_by('agenda_eventos.data_inicio', 'DESC');
        $query['eventos'] = $this->db->get('agenda_eventos')->result();
        $query['tecnicos'] = $this->db->get('admins')->result();
        $query['clientes'] = $this->db->get('clientes')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/agenda/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo') ?: 'VISITA_TECNICA',
            'data_inicio' => $this->input->post('data_inicio'),
            'data_fim' => $this->input->post('data_fim'),
            'admin_id' => $this->input->post('admin_id'),
            'os_id' => $this->input->post('os_id'),
            'cliente_id' => $this->input->post('cliente_id'),
            'local' => $this->input->post('local'),
            'cor' => $this->input->post('cor') ?: '#6366f1',
            'status' => $this->input->post('status') ?: 'AGENDADO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('agenda_eventos', $data))
            redirect('agenda/lista/novo');
        else
            redirect('agenda/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idevento');
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo'),
            'data_inicio' => $this->input->post('data_inicio'),
            'data_fim' => $this->input->post('data_fim'),
            'admin_id' => $this->input->post('admin_id'),
            'os_id' => $this->input->post('os_id'),
            'cliente_id' => $this->input->post('cliente_id'),
            'local' => $this->input->post('local'),
            'cor' => $this->input->post('cor'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idevento', $id);
        if ($this->db->update('agenda_eventos', $data))
            redirect('agenda/lista/update');
        else
            redirect('agenda/lista/erro');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idevento', $id);
        $this->db->delete('agenda_eventos');
        echo 'Deleted successfully.';
    }
    public function get($id) {
        $this->db->where('idevento', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('agenda_eventos')->row());
    }
    public function eventos_json() {
        $this->db->select('agenda_eventos.*, admins.nome as tecnico_nome');
        $this->db->join('admins', 'admins.adminid = agenda_eventos.admin_id', 'left');
        $query['eventos'] = $this->db->get('agenda_eventos')->result();
        header('Content-Type: application/json');
        echo json_encode($query);
    }
}
