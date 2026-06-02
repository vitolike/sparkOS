<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orcamentos extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('orcamentos/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Orçamentos';
        $query['msg'] = $msg;
        $this->db->select('orcamentos.*, clientes.nome as cliente_nome');
        $this->db->join('clientes', 'clientes.clientesid = orcamentos.clientesid', 'left');
        $this->db->order_by('orcamentos.idorcamento', 'DESC');
        $query['orcamentos'] = $this->db->get('orcamentos')->result();
        $query['clientes'] = $this->db->get('clientes')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/orcamentos/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $itens_json = $this->input->post('itens_json');
        $itens = json_decode($itens_json, true);
        $valor_total = 0;
        if (is_array($itens)) {
            foreach ($itens as $item) {
                $valor_total += ($item['quantidade'] ?? 1) * ($item['valor'] ?? 0);
            }
        }
        $desconto = $this->input->post('desconto') ?: 0;
        $data = array(
            'codigo' => $this->input->post('codigo') ?: 'ORC-' . strtoupper(substr(uniqid(), -6)),
            'titulo' => $this->input->post('titulo'),
            'clientesid' => $this->input->post('clientesid'),
            'descricao' => $this->input->post('descricao'),
            'itens' => $itens_json,
            'valor_total' => $valor_total,
            'desconto' => $desconto,
            'valor_final' => $valor_total - $desconto,
            'validade' => $this->input->post('validade'),
            'status' => $this->input->post('status') ?: 'RASCUNHO',
            'responsavel' => $this->input->post('responsavel'),
            'observacoes' => $this->input->post('observacoes'),
            'criado_em' => date('Y-m-d H:i:s'),
            'criado_por' => $this->session->userdata('nome')
        );
        if ($this->db->insert('orcamentos', $data))
            redirect('orcamentos/lista/novo');
        else
            redirect('orcamentos/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idorcamento');
        $itens_json = $this->input->post('itens_json');
        $itens = json_decode($itens_json, true);
        $valor_total = 0;
        if (is_array($itens)) {
            foreach ($itens as $item) {
                $valor_total += ($item['quantidade'] ?? 1) * ($item['valor'] ?? 0);
            }
        }
        $desconto = $this->input->post('desconto') ?: 0;
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'titulo' => $this->input->post('titulo'),
            'clientesid' => $this->input->post('clientesid'),
            'descricao' => $this->input->post('descricao'),
            'itens' => $itens_json,
            'valor_total' => $valor_total,
            'desconto' => $desconto,
            'valor_final' => $valor_total - $desconto,
            'validade' => $this->input->post('validade'),
            'status' => $this->input->post('status'),
            'responsavel' => $this->input->post('responsavel'),
            'observacoes' => $this->input->post('observacoes')
        );
        $this->db->where('idorcamento', $id);
        if ($this->db->update('orcamentos', $data))
            redirect('orcamentos/lista/update');
        else
            redirect('orcamentos/lista/erro');
    }
    public function update_status($id, $status) {
        $this->login_model->verifica_sessao();
        $this->db->where('idorcamento', $id);
        $this->db->update('orcamentos', array('status' => $status));
        redirect('orcamentos/lista/status');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idorcamento', $id);
        $this->db->delete('orcamentos');
        echo 'Deleted successfully.';
    }
    public function get($id) {
        $this->db->where('idorcamento', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('orcamentos')->row());
    }
}
