<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklists extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('checklists/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Checklists';
        $query['msg'] = $msg;
        $query['modelos'] = $this->db->order_by('idchecklist', 'DESC')->get('checklists_modelos')->result();
        foreach ($query['modelos'] as $m) {
            $this->db->where('idchecklist', $m->idchecklist);
            $m->total_itens = $this->db->count_all_results('checklists_itens');
        }
        $this->load->view('layout/header', $query);
        $this->load->view('app/checklists/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function modelo($id, $msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Checklist';
        $query['msg'] = $msg;
        $this->db->where('idchecklist', $id);
        $query['modelo'] = $this->db->get('checklists_modelos')->row();
        $this->db->where('idchecklist', $id);
        $this->db->order_by('ordem', 'ASC');
        $query['itens'] = $this->db->get('checklists_itens')->result();
        $this->db->where('idchecklist', $id);
        $this->db->order_by('idexecucao', 'DESC');
        $query['execucoes'] = $this->db->get('checklists_execucoes')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/checklists/modelo', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo') ?: 'INSTALACAO',
            'status' => $this->input->post('status') ?: 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('checklists_modelos', $data);
        redirect('checklists/lista/novo');
    }
    public function add_item() {
        $this->login_model->verifica_sessao();
        $data = array(
            'idchecklist' => $this->input->post('idchecklist'),
            'descricao' => $this->input->post('descricao'),
            'ordem' => $this->input->post('ordem') ?: 0,
            'obrigatorio' => $this->input->post('obrigatorio') ? 1 : 0,
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('checklists_itens', $data);
        redirect('checklists/modelo/' . $this->input->post('idchecklist') . '/item_adicionado');
    }
    public function delete_item($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('iditem', $id);
        $item = $this->db->get('checklists_itens')->row();
        $idchecklist = $item->idchecklist;
        $this->db->where('iditem', $id);
        $this->db->delete('checklists_itens');
        redirect('checklists/modelo/' . $idchecklist);
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idchecklist');
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idchecklist', $id);
        $this->db->update('checklists_modelos', $data);
        redirect('checklists/lista/update');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idchecklist', $id);
        $this->db->delete('checklists_modelos');
        echo 'Deleted successfully.';
    }
    public function executar($idchecklist) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Executar Checklist';
        $this->db->where('idchecklist', $idchecklist);
        $query['modelo'] = $this->db->get('checklists_modelos')->row();
        $this->db->where('idchecklist', $idchecklist);
        $this->db->order_by('ordem', 'ASC');
        $query['itens'] = $this->db->get('checklists_itens')->result();
        $this->db->order_by('nome', 'ASC');
        $query['clientes'] = $this->db->get('clientes')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/checklists/executar', $query);
        $this->load->view('layout/footer');
    }
    public function salvar_execucao() {
        $this->login_model->verifica_sessao();
        $idchecklist = $this->input->post('idchecklist');
        $exec = array(
            'idchecklist' => $idchecklist,
            'titulo' => $this->input->post('titulo'),
            'os_id' => $this->input->post('os_id'),
            'admin_id' => $this->session->userdata('adminid'),
            'cliente_id' => $this->input->post('cliente_id'),
            'data_execucao' => date('Y-m-d H:i:s'),
            'resultado' => $this->input->post('resultado') ?: 'PENDENTE',
            'observacoes' => $this->input->post('observacoes'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('checklists_execucoes', $exec);
        $idexecucao = $this->db->insert_id();
        $itens = $this->db->where('idchecklist', $idchecklist)->order_by('ordem', 'ASC')->get('checklists_itens')->result();
        foreach ($itens as $item) {
            $resp = array(
                'idexecucao' => $idexecucao,
                'iditem' => $item->iditem,
                'conforme' => $this->input->post('item_' . $item->iditem) ? 1 : 0,
                'observacao' => $this->input->post('obs_' . $item->iditem),
                'criado_em' => date('Y-m-d H:i:s')
            );
            $this->db->insert('checklists_respostas', $resp);
        }
        redirect('checklists/modelo/' . $idchecklist . '/executado');
    }
}
