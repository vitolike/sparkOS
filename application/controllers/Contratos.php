<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contratos extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('login_model', '', TRUE);
    }    
    
    public function index() {
        redirect('contratos/lista');
    }
    
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Propostas & Contratos';
        $query['msg'] = $msg;
        
        // Fetch contracts with client details
        $this->db->select('contratos.*, clientes.nome as nome_cliente, clientes.sobrenome as sobrenome_cliente');
        $this->db->join('clientes', 'clientes.clientesid = contratos.cliente_id');
        $this->db->order_by('contratos.criado_em', 'DESC');
        $query['contratos'] = $this->db->get('contratos')->result();
        
        // Fetch all clients for contract selection
        $query['clientes'] = $this->db->get('clientes')->result();
        
        // MRR (Monthly Recurring Revenue) calculations
        $this->db->select_sum('valor_mensal');
        $this->db->where('status', 'ATIVO');
        $query['total_mrr'] = $this->db->get('contratos')->row()->valor_mensal ?: 0.00;
        
        // Contract signatures count
        $this->db->where('assinatura_eletronica', 'ASSINADO');
        $query['signed_contracts'] = $this->db->count_all_results('contratos');
        
        $this->db->where('assinatura_eletronica', 'PENDENTE');
        $query['pending_contracts'] = $this->db->count_all_results('contratos');
        
        $this->load->view('layout/header', $query);
        $this->load->view('app/contratos/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    
    public function adicionar() {
        $this->login_model->verifica_sessao();
        
        $cliente_id = $this->input->post('cliente');
        $titulo = $this->input->post('titulo');
        $valor_mensal = $this->input->post('valor_mensal') ?: 0.00;
        $vigencia_meses = $this->input->post('vigencia_meses') ?: 12;
        
        $data = array(
            'cliente_id' => $cliente_id,
            'titulo' => $titulo,
            'valor_mensal' => $valor_mensal,
            'vigencia_meses' => $vigencia_meses,
            'assinatura_eletronica' => 'PENDENTE',
            'status' => 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        
        if ($this->db->insert('contratos', $data)) {
            $insert_id = $this->db->insert_id();
            redirect('contratos/detalhes/'.$insert_id.'/sucesso_contrato');
        } else {
            redirect('contratos/lista/erro');
        }
    }
    
    public function assinar($id = null) {
        $this->login_model->verifica_sessao();
        
        if (!$id) {
            redirect('contratos/lista');
        }
        
        $data = array('assinatura_eletronica' => 'ASSINADO');
        $this->db->where('idcontrato', $id);
        
        if ($this->db->update('contratos', $data)) {
            // Trigger automatic execution workflow audit
            $this->db->query("UPDATE automacoes SET execucoes = execucoes + 1 WHERE gatilho LIKE '%GANHO%' OR gatilho LIKE '%Venda%'");
            
            redirect('contratos/detalhes/'.$id.'/sucesso_assinatura');
        } else {
            redirect('contratos/lista/erro');
        }
    }
    
    public function detalhes($id = null, $msg = null) {
        $this->login_model->verifica_sessao();

        if (!$id) {
            redirect('contratos/lista');
        }

        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Detalhes do Contrato';
        $query['msg'] = $msg;

        $this->db->select('contratos.*, clientes.nome as nome_cliente, clientes.sobrenome as sobrenome_cliente, clientes.email, clientes.telefone, clientes.documento, clientes.tipo_documento');
        $this->db->join('clientes', 'clientes.clientesid = contratos.cliente_id');
        $this->db->where('idcontrato', $id);
        $query['contrato'] = $this->db->get('contratos')->row();

        if (!$query['contrato']) {
            redirect('contratos/lista');
        }

        $this->db->where('contrato_id', $id);
        $this->db->order_by('data_vencimento', 'DESC');
        $query['faturas'] = $this->db->get('financeiro_faturas')->result();

        $this->load->view('layout/header', $query);
        $this->load->view('app/contratos/detalhes', $query);
        $this->load->view('layout/footer');
    }

    public function atualizar_status($id = null, $status = null) {
        $this->login_model->verifica_sessao();
        
        if (!$id || !$status) {
            redirect('contratos/lista');
        }
        
        $data = array('status' => urldecode($status));
        $this->db->where('idcontrato', $id);
        
        if ($this->db->update('contratos', $data)) {
            redirect('contratos/detalhes/'.$id.'/sucesso_status');
        } else {
            redirect('contratos/lista/erro');
        }
    }
}
