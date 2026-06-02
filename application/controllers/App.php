<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model', '', TRUE);
    }    
    
    public function index() {
        redirect('auth/entrar');
    }
    
    public function home() {
        $this->login_model->verifica_sessao();
        
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Dashboard';
        
        // 1. Fetch Open Service Orders (OS)
        $sql = "SELECT * FROM os WHERE status IN ('ABERTO','ORÇAMENTO', 'EM ANDAMENTO')";
        $query_sql = $this->db->query($sql);
        $query['OS'] = $query_sql->num_rows();  
        $query['query'] = $query_sql->result();
        
        // 2. Fetch Low Stock Products
        $sql_produtos = "SELECT * FROM produtos WHERE estoque_minimo >= estoque";
        $query_prod = $this->db->query($sql_produtos);
        $query['prod'] = $query_prod->result();
        $query['estoque_critico'] = $query_prod->num_rows();
        
        // 3. Fetch CRM KPI Summary
        $this->db->where('status', 'ABERTO');
        $query['crm_ativos'] = $this->db->count_all_results('crm_leads');
        
        $this->db->select_sum('valor');
        $this->db->where('status', 'ABERTO');
        $query['pipeline_total'] = $this->db->get('crm_leads')->row()->valor ?: 0.00;
        
        // 4. Fetch Top 5 High-Value CRM Opportunities
        $this->db->select('crm_leads.*, clientes.nome as nome_cliente, clientes.sobrenome as sobrenome_cliente');
        $this->db->join('clientes', 'clientes.clientesid = crm_leads.cliente_id');
        $this->db->where('status', 'ABERTO');
        $this->db->order_by('valor', 'DESC');
        $this->db->limit(5);
        $query['crm_top_deals'] = $this->db->get('crm_leads')->result();
        
        $this->load->view('layout/header', $query);
        $this->load->view('app/dashboard', $query);
        $this->load->view('layout/footer');
    }
}
