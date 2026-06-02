<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helpdesk extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('login_model', '', TRUE);
    }    
    
    public function index() {
        redirect('helpdesk/lista');
    }
    
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Help Desk / Tickets';
        $query['msg'] = $msg;
        
        // Fetch tickets with client details
        $this->db->select('helpdesk_tickets.*, clientes.nome as nome_cliente, clientes.sobrenome as sobrenome_cliente');
        $this->db->join('clientes', 'clientes.clientesid = helpdesk_tickets.cliente_id');
        $this->db->order_by('helpdesk_tickets.criado_em', 'DESC');
        $query['tickets'] = $this->db->get('helpdesk_tickets')->result();
        
        // Fetch all clients for ticket creation dropdown
        $query['clientes'] = $this->db->get('clientes')->result();
        
        // SLA compliance KPIs
        $this->db->where('status', 'ABERTO');
        $query['open_tickets'] = $this->db->count_all_results('helpdesk_tickets');
        
        $this->db->where('status', 'EM ATENDIMENTO');
        $query['in_progress_tickets'] = $this->db->count_all_results('helpdesk_tickets');
        
        $this->db->where('status', 'RESOLVIDO');
        $query['resolved_tickets'] = $this->db->count_all_results('helpdesk_tickets');
        
        $this->load->view('layout/header', $query);
        $this->load->view('app/helpdesk/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    
    public function adicionar() {
        $this->login_model->verifica_sessao();
        
        $cliente_id = $this->input->post('cliente');
        $assunto = $this->input->post('assunto');
        $prioridade = $this->input->post('prioridade') ?: 'MÉDIA';
        
        // Automatically determine SLA hours depending on priority
        $sla_horas = 24;
        if ($prioridade === 'URGENTE') {
            $sla_horas = 2;
        } elseif ($prioridade === 'ALTA') {
            $sla_horas = 4;
        } elseif ($prioridade === 'MÉDIA') {
            $sla_horas = 12;
        }
        
        $data = array(
            'cliente_id' => $cliente_id,
            'assunto' => $assunto,
            'prioridade' => $prioridade,
            'sla_horas' => $sla_horas,
            'status' => 'ABERTO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        
        if ($this->db->insert('helpdesk_tickets', $data)) {
            // Trigger Compliance Audit integration for critical escalation
            if ($prioridade === 'URGENTE') {
                $audit_data = array(
                    'componente' => 'Help Desk',
                    'descricao' => 'Escalação Crítica de Suporte: ' . $assunto . ' (Prioridade URGENTE - SLA ' . $sla_horas . 'h)',
                    'severidade' => 'MÉDIO',
                    'status' => 'PENDENTE',
                    'responsavel' => 'Sistema de Atendimento',
                    'data_registro' => date('Y-m-d H:i:s')
                );
                $this->db->insert('compliance_audits', $audit_data);
                
                // Real-time threat/risk reactive impact: elevate admin risk
                $this->db->query("UPDATE usuario_riscos SET nivel_risco = LEAST(nivel_risco + 8, 100), motivo_risco = 'Escalação crítica de suporte em andamento.', ultimo_evento = NOW() WHERE admin_id = 1");
            }
            
            redirect('helpdesk/lista/sucesso_ticket');
        } else {
            redirect('helpdesk/lista/erro');
        }
    }
    
    public function resolver($id = null) {
        $this->login_model->verifica_sessao();
        
        if (!$id) {
            redirect('helpdesk/lista');
        }
        
        $this->db->where('idticket', $id);
        $ticket = $this->db->get('helpdesk_tickets')->row();
        
        $data = array('status' => 'RESOLVIDO');
        $this->db->where('idticket', $id);
        
        if ($this->db->update('helpdesk_tickets', $data)) {
            // If it was urgent, normalise admin risk score back slightly
            if ($ticket && $ticket->prioridade === 'URGENTE') {
                $this->db->query("UPDATE usuario_riscos SET nivel_risco = GREATEST(nivel_risco - 5, 15), motivo_risco = 'SLA crítico de atendimento normalizado.', ultimo_evento = NOW() WHERE admin_id = 1");
            }
            
            redirect('helpdesk/lista/sucesso_resolvido');
        } else {
            redirect('helpdesk/lista/erro');
        }
    }
    
    public function em_atendimento($id = null) {
        $this->login_model->verifica_sessao();
        
        if (!$id) {
            redirect('helpdesk/lista');
        }
        
        $data = array('status' => 'EM ATENDIMENTO');
        $this->db->where('idticket', $id);
        
        if ($this->db->update('helpdesk_tickets', $data)) {
            redirect('helpdesk/lista/sucesso_atendimento');
        } else {
            redirect('helpdesk/lista/erro');
        }
    }
}
