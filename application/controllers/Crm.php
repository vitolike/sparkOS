<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crm extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('login_model', '', TRUE);
    }    
    
    public function index() {
        redirect('crm/lista');
    }
    
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'CRM / Funil';
        $query['msg'] = $msg;
        
        // Fetch leads with client details
        $this->db->select('crm_leads.*, clientes.nome as nome_cliente, clientes.sobrenome as sobrenome_cliente');
        $this->db->join('clientes', 'clientes.clientesid = crm_leads.cliente_id');
        $this->db->order_by('crm_leads.criado_em', 'DESC');
        $query['leads'] = $this->db->get('crm_leads')->result();
        
        // Fetch all clients for the modal selection
        $query['clientes'] = $this->db->get('clientes')->result();
        
        // Pipeline summary values
        $this->db->select_sum('valor');
        $this->db->where('status', 'ABERTO');
        $query['pipeline_value'] = $this->db->get('crm_leads')->row()->valor ?: 0.00;
        
        $this->db->where('status', 'ABERTO');
        $query['active_leads'] = $this->db->count_all_results('crm_leads');
        
        $this->load->view('layout/header', $query);
        $this->load->view('app/crm/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    
    public function adicionar() {
        $this->login_model->verifica_sessao();
        
        $cliente_id = $this->input->post('cliente');
        $titulo = $this->input->post('titulo');
        $valor = $this->input->post('valor') ?: 0.00;
        $estagio = $this->input->post('estagio') ?: 'CONTATO';
        $data_proximo_contato = $this->input->post('data_proximo_contato') ?: null;
        $descricao = $this->input->post('descricao') ?: '';
        
        $data = array(
            'titulo' => $titulo,
            'cliente_id' => $cliente_id,
            'valor' => $valor,
            'estagio' => $estagio,
            'status' => 'ABERTO',
            'data_proximo_contato' => $data_proximo_contato,
            'descricao' => $descricao,
            'criado_em' => date('Y-m-d H:i:s')
        );
        
        if ($this->db->insert('crm_leads', $data)) {
            $crm_id = $this->db->insert_id();
            
            // Log creation in interaction timeline
            $log_data = array(
                'crm_id' => $crm_id,
                'tipo' => 'Nota',
                'descricao' => 'Oportunidade de negócio criada no funil pelo usuário: ' . $this->session->userdata('nome'),
                'data_interacao' => date('Y-m-d H:i:s'),
                'usuario' => $this->session->userdata('nome') ?: 'Sistema'
            );
            $this->db->insert('crm_interacoes', $log_data);
            
            redirect('crm/lista/sucesso_novo');
        } else {
            redirect('crm/lista/erro');
        }
    }
    
    public function detalhes($id = null) {
        $this->login_model->verifica_sessao();
        
        if (!$id) {
            redirect('crm/lista');
        }
        
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Detalhes do CRM';
        
        // Fetch lead by ID
        $this->db->select('crm_leads.*, clientes.nome as nome_cliente, clientes.sobrenome as sobrenome_cliente, clientes.email as email_cliente, clientes.telefone as telefone_cliente');
        $this->db->join('clientes', 'clientes.clientesid = crm_leads.cliente_id');
        $this->db->where('crm_leads.idcrm', $id);
        $lead = $this->db->get('crm_leads')->result();
        
        if (!$lead) {
            redirect('crm/lista');
        }
        
        $query['lead'] = $lead[0];
        
        // Fetch interactions (timeline logs)
        $this->db->where('crm_id', $id);
        $this->db->order_by('data_interacao', 'DESC');
        $query['interacoes'] = $this->db->get('crm_interacoes')->result();
        
        $this->load->view('layout/header', $query);
        $this->load->view('app/crm/detalhes', $query);
        $this->load->view('layout/footer');
    }
    
    public function atualizar() {
        $this->login_model->verifica_sessao();
        
        $idcrm = $this->input->post('idcrm');
        $titulo = $this->input->post('titulo');
        $valor = $this->input->post('valor') ?: 0.00;
        $data_proximo_contato = $this->input->post('data_proximo_contato') ?: null;
        $descricao = $this->input->post('descricao') ?: '';
        
        $data = array(
            'titulo' => $titulo,
            'valor' => $valor,
            'data_proximo_contato' => $data_proximo_contato,
            'descricao' => $descricao,
            'alterado_em' => date('Y-m-d H:i:s')
        );
        
        $this->db->where('idcrm', $idcrm);
        if ($this->db->update('crm_leads', $data)) {
            // Log detail updates
            $log_data = array(
                'crm_id' => $idcrm,
                'tipo' => 'Nota',
                'descricao' => 'Dados comerciais atualizados por: ' . $this->session->userdata('nome'),
                'data_interacao' => date('Y-m-d H:i:s'),
                'usuario' => $this->session->userdata('nome') ?: 'Sistema'
            );
            $this->db->insert('crm_interacoes', $log_data);
            
            redirect('crm/detalhes/' . $idcrm . '/sucesso_update');
        } else {
            redirect('crm/detalhes/' . $idcrm . '/erro');
        }
    }
    
    public function atualizar_status_estagio() {
        $this->login_model->verifica_sessao();
        
        $idcrm = $this->input->post('idcrm');
        $estagio = $this->input->post('estagio');
        $status = $this->input->post('status') ?: 'ABERTO';
        
        // Fetch current values to log changes
        $this->db->where('idcrm', $idcrm);
        $curr = $this->db->get('crm_leads')->row();
        
        $data = array(
            'estagio' => $estagio,
            'status' => $status,
            'alterado_em' => date('Y-m-d H:i:s')
        );
        
        $this->db->where('idcrm', $idcrm);
        if ($this->db->update('crm_leads', $data)) {
            
            // Build descriptive interaction log
            $desc = 'Estágio do negócio alterado de **' . $curr->estagio . '** para **' . $estagio . '**';
            if ($curr->status != $status) {
                $desc .= ' e status marcado como **' . ($status == 'GANHO' ? 'Ganho (Sucesso)' : ($status == 'PERDIDO' ? 'Perdido' : 'Em aberto')) . '**';
            }
            $desc .= ' pelo usuário: ' . $this->session->userdata('nome');
            
            $log_data = array(
                'crm_id' => $idcrm,
                'tipo' => 'Nota',
                'descricao' => $desc,
                'data_interacao' => date('Y-m-d H:i:s'),
                'usuario' => $this->session->userdata('nome') ?: 'Sistema'
            );
            $this->db->insert('crm_interacoes', $log_data);
            
            redirect('crm/detalhes/' . $idcrm . '/sucesso_status');
        } else {
            redirect('crm/detalhes/' . $idcrm . '/erro');
        }
    }
    
    public function add_interacao() {
        $this->login_model->verifica_sessao();
        
        $crm_id = $this->input->post('crm_id');
        $tipo = $this->input->post('tipo') ?: 'Nota';
        $descricao = $this->input->post('descricao');
        
        $data = array(
            'crm_id' => $crm_id,
            'tipo' => $tipo,
            'descricao' => $descricao,
            'data_interacao' => date('Y-m-d H:i:s'),
            'usuario' => $this->session->userdata('nome') ?: 'Usuário'
        );
        
        if ($this->db->insert('crm_interacoes', $data)) {
            // Update alterado_em in lead
            $this->db->where('idcrm', $crm_id);
            $this->db->update('crm_leads', array('alterado_em' => date('Y-m-d H:i:s')));
            
            redirect('crm/detalhes/' . $crm_id . '/sucesso_interacao');
        } else {
            redirect('crm/detalhes/' . $crm_id . '/erro_interacao');
        }
    }
    
    public function delete($id) {
        $this->login_model->verifica_sessao();
        
        $this->db->where('idcrm', $id);
        if ($this->db->delete('crm_leads')) {
            echo 'Deleted successfully.';
        } else {
            echo 'Error.';
        }
    }
}
