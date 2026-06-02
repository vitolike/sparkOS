<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('portal/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Portal';
        $query['msg'] = $msg;
        $query['acessos_cliente'] = $this->db->where('tipo', 'CLIENTE')->get('portal_acessos')->result();
        $query['acessos_tecnico'] = $this->db->where('tipo', 'TECNICO')->get('portal_acessos')->result();
        $query['clientes'] = $this->db->get('clientes')->result();
        $query['tecnicos'] = $this->db->get('admins')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/portal/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'tipo' => $this->input->post('tipo') ?: 'CLIENTE',
            'ref_id' => $this->input->post('ref_id'),
            'email' => $this->input->post('email'),
            'senha' => md5($this->input->post('senha')),
            'status' => $this->input->post('status') ?: 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('portal_acessos', $data) ? redirect('portal/lista/novo') : redirect('portal/lista/erro');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idacesso', $id)->delete('portal_acessos');
        echo 'ok';
    }
    public function get($id) {
        $this->db->where('idacesso', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('portal_acessos')->row());
    }
}
