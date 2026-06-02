<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('login_model', '', TRUE);
    }    
    
    public function index() {
        redirect('marketing/lista');
    }
    
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Marketing / Campanhas';
        $query['msg'] = $msg;
        
        // Fetch all marketing campaigns
        $this->db->order_by('idcampanha', 'DESC');
        $query['campanhas'] = $this->db->get('marketing_campanhas')->result();
        
        // Calculate ROI metrics and totals
        $this->db->select_sum('investimento');
        $query['total_investido'] = $this->db->get('marketing_campanhas')->row()->investimento ?: 0.00;
        
        $this->db->select_sum('retorno');
        $query['total_retorno'] = $this->db->get('marketing_campanhas')->row()->retorno ?: 0.00;
        
        // Calculate average ROI percentage
        if ($query['total_investido'] > 0) {
            $query['avg_roi'] = round((($query['total_retorno'] - $query['total_investido']) / $query['total_investido']) * 100);
        } else {
            $query['avg_roi'] = 0;
        }
        
        $this->load->view('layout/header', $query);
        $this->load->view('app/marketing/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    
    public function adicionar() {
        $this->login_model->verifica_sessao();
        
        $nome = $this->input->post('nome');
        $origem = $this->input->post('origem') ?: 'Google';
        $investimento = $this->input->post('investimento') ?: 0.00;
        $retorno = $this->input->post('retorno') ?: 0.00;
        
        $data = array(
            'nome' => $nome,
            'origem' => $origem,
            'investimento' => $investimento,
            'retorno' => $retorno,
            'status' => 'ATIVA',
            'criado_em' => date('Y-m-d H:i:s')
        );
        
        if ($this->db->insert('marketing_campanhas', $data)) {
            redirect('marketing/lista/sucesso_campanha');
        } else {
            redirect('marketing/lista/erro');
        }
    }
    
    public function atualizar_status($id = null, $status = null) {
        $this->login_model->verifica_sessao();
        
        if (!$id || !$status) {
            redirect('marketing/lista');
        }
        
        $data = array('status' => urldecode($status));
        $this->db->where('idcampanha', $id);
        
        if ($this->db->update('marketing_campanhas', $data)) {
            redirect('marketing/lista/sucesso_status');
        } else {
            redirect('marketing/lista/erro');
        }
    }
}
