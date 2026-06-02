<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Automacoes extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('login_model', '', TRUE);
    }    
    
    public function index() {
        redirect('automacoes/lista');
    }
    
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Automações & Workflows';
        $query['msg'] = $msg;
        
        // Fetch all workflows
        $this->db->order_by('idautomacao', 'DESC');
        $query['automacoes'] = $this->db->get('automacoes')->result();
        
        // Automation metrics
        $this->db->where('status', 'ATIVO');
        $query['active_rules'] = $this->db->count_all_results('automacoes');
        
        $this->db->select_sum('execucoes');
        $query['total_executions'] = $this->db->get('automacoes')->row()->execucoes ?: 0;
        
        $this->load->view('layout/header', $query);
        $this->load->view('app/automacoes/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    
    public function adicionar() {
        $this->login_model->verifica_sessao();
        
        $nome = $this->input->post('nome');
        $gatilho = $this->input->post('gatilho');
        $acao = $this->input->post('acao');
        
        $data = array(
            'nome' => $nome,
            'gatilho' => $gatilho,
            'acao' => $acao,
            'status' => 'ATIVO',
            'execucoes' => 0,
            'criado_em' => date('Y-m-d H:i:s')
        );
        
        if ($this->db->insert('automacoes', $data)) {
            redirect('automacoes/lista/sucesso_automacao');
        } else {
            redirect('automacoes/lista/erro');
        }
    }
    
    public function alternar_status($id = null) {
        $this->login_model->verifica_sessao();
        
        if (!$id) {
            redirect('automacoes/lista');
        }
        
        $this->db->where('idautomacao', $id);
        $curr = $this->db->get('automacoes')->row();
        
        if (!$curr) {
            redirect('automacoes/lista');
        }
        
        $new_status = ($curr->status === 'ATIVO') ? 'INATIVO' : 'ATIVO';
        
        $data = array('status' => $new_status);
        $this->db->where('idautomacao', $id);
        
        if ($this->db->update('automacoes', $data)) {
            redirect('automacoes/lista/sucesso_status');
        } else {
            redirect('automacoes/lista/erro');
        }
    }
}
