<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compliance extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('login_model', '', TRUE);
    }    
    
    public function index() {
        redirect('compliance/lista');
    }
    
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Compliance & Riscos';
        $query['msg'] = $msg;
        
        // Fetch compliance audit events
        $this->db->order_by('data_registro', 'DESC');
        $query['audits'] = $this->db->get('compliance_audits')->result();
        
        // Fetch users and their risk scoring
        $this->db->select('usuario_riscos.*, admins.nome as nome_usuario, admins.email as email_usuario');
        $this->db->join('admins', 'admins.adminid = usuario_riscos.admin_id');
        $this->db->order_by('nivel_risco', 'DESC');
        $query['risks'] = $this->db->get('usuario_riscos')->result();
        
        // Calculate average risk score
        $this->db->select_avg('nivel_risco');
        $query['avg_risk'] = round($this->db->get('usuario_riscos')->row()->nivel_risco ?: 15);
        
        // Total open critical issues
        $this->db->where('status', 'PENDENTE');
        $query['pending_audits'] = $this->db->count_all_results('compliance_audits');
        
        $this->load->view('layout/header', $query);
        $this->load->view('app/compliance/lista', $query);
        $this->load->view('layout/footer');
    }
    
    public function add_auditoria() {
        $this->login_model->verifica_sessao();
        
        $componente = $this->input->post('componente');
        $descricao = $this->input->post('descricao');
        $severidade = $this->input->post('severidade');
        $responsavel = $this->session->userdata('nome') ?: 'Auditor';
        
        $data = array(
            'componente' => $componente,
            'descricao' => $descricao,
            'severidade' => $severidade,
            'status' => 'PENDENTE',
            'responsavel' => $responsavel,
            'data_registro' => date('Y-m-d H:i:s')
        );
        
        if ($this->db->insert('compliance_audits', $data)) {
            // Smart Threat-Reactivity: if severity is CRITICAL, bump admin risk level automatically
            if ($severidade === 'CRÍTICO') {
                $this->db->query("UPDATE usuario_riscos SET nivel_risco = LEAST(nivel_risco + 25, 100), motivo_risco = 'Tentativa suspeita ou atividade crítica de auditoria registrada.', ultimo_evento = NOW() WHERE admin_id = 1");
            } elseif ($severidade === 'MÉDIO') {
                $this->db->query("UPDATE usuario_riscos SET nivel_risco = LEAST(nivel_risco + 10, 100), motivo_risco = 'Evento de risco médio de conformidade registrado.', ultimo_evento = NOW() WHERE admin_id = 1");
            }
            
            redirect('compliance/lista/sucesso_nova');
        } else {
            redirect('compliance/lista/erro');
        }
    }
    
    public function resolver_auditoria($id = null) {
        $this->login_model->verifica_sessao();
        
        if (!$id) {
            redirect('compliance/lista');
        }
        
        $data = array('status' => 'RESOLVIDO');
        $this->db->where('idauditoria', $id);
        
        if ($this->db->update('compliance_audits', $data)) {
            // Revert threat-reactivity automatically upon resolving
            $this->db->query("UPDATE usuario_riscos SET nivel_risco = GREATEST(nivel_risco - 20, 15), motivo_risco = 'Incidente resolvido. Atividade operacional normalizada.', ultimo_evento = NOW() WHERE admin_id = 1");
            
            redirect('compliance/lista/sucesso_resolvido');
        } else {
            redirect('compliance/lista/erro');
        }
    }
    
    public function recalcular_risco() {
        $this->login_model->verifica_sessao();
        
        $admin_id = $this->input->post('admin_id');
        $nivel_risco = $this->input->post('nivel_risco') ?: 15;
        $motivo_risco = $this->input->post('motivo_risco') ?: 'Ajuste manual de auditoria operacional.';
        
        $data = array(
            'nivel_risco' => $nivel_risco,
            'motivo_risco' => $motivo_risco,
            'ultimo_evento' => date('Y-m-d H:i:s')
        );
        
        $this->db->where('admin_id', $admin_id);
        if ($this->db->update('usuario_riscos', $data)) {
            redirect('compliance/lista/sucesso_recalculo');
        } else {
            redirect('compliance/lista/erro');
        }
    }
}
