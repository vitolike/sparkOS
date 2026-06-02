<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipamentos extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('equipamentos/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Equipamentos';
        $query['msg'] = $msg;
        $this->db->select('equipamentos.*, clientes.nome as cliente_nome, equipamentos_categorias.nome as categoria_nome');
        $this->db->join('clientes', 'clientes.clientesid = equipamentos.clientesid', 'left');
        $this->db->join('equipamentos_categorias', 'equipamentos_categorias.idcategoria = equipamentos.idcategoria', 'left');
        $this->db->order_by('equipamentos.idequipamento', 'DESC');
        $query['equipamentos'] = $this->db->get('equipamentos')->result();
        $query['clientes'] = $this->db->get('clientes')->result();
        $query['categorias'] = $this->db->get('equipamentos_categorias')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/equipamentos/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'clientesid' => $this->input->post('clientesid'),
            'idcategoria' => $this->input->post('idcategoria'),
            'tipo' => $this->input->post('tipo'),
            'marca' => $this->input->post('marca'),
            'modelo' => $this->input->post('modelo'),
            'numero_serie' => $this->input->post('numero_serie'),
            'patrimonio' => $this->input->post('patrimonio'),
            'especificacoes' => $this->input->post('especificacoes'),
            'data_instalacao' => $this->input->post('data_instalacao'),
            'data_garantia' => $this->input->post('data_garantia'),
            'status' => $this->input->post('status') ?: 'ATIVO',
            'observacoes' => $this->input->post('observacoes'),
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('equipamentos', $data))
            redirect('equipamentos/lista/novo');
        else
            redirect('equipamentos/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idequipamento');
        $data = array(
            'clientesid' => $this->input->post('clientesid'),
            'idcategoria' => $this->input->post('idcategoria'),
            'tipo' => $this->input->post('tipo'),
            'marca' => $this->input->post('marca'),
            'modelo' => $this->input->post('modelo'),
            'numero_serie' => $this->input->post('numero_serie'),
            'patrimonio' => $this->input->post('patrimonio'),
            'especificacoes' => $this->input->post('especificacoes'),
            'data_instalacao' => $this->input->post('data_instalacao'),
            'data_garantia' => $this->input->post('data_garantia'),
            'status' => $this->input->post('status'),
            'observacoes' => $this->input->post('observacoes'),
            'alterado_em' => date('Y-m-d H:i:s')
        );
        $this->db->where('idequipamento', $id);
        if ($this->db->update('equipamentos', $data))
            redirect('equipamentos/lista/update');
        else
            redirect('equipamentos/lista/erro');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idequipamento', $id);
        $this->db->delete('equipamentos');
        echo 'Deleted successfully.';
    }
    public function get($id) {
        $this->db->where('idequipamento', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('equipamentos')->row());
    }
}
