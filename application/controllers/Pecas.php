<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pecas extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('pecas/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Peças';
        $query['msg'] = $msg;
        $this->db->select('pecas.*, pecas_categorias.nome as categoria_nome');
        $this->db->join('pecas_categorias', 'pecas_categorias.idcategoria = pecas.idcategoria', 'left');
        $this->db->order_by('pecas.idpeca', 'DESC');
        $query['pecas'] = $this->db->get('pecas')->result();
        $query['categorias'] = $this->db->get('pecas_categorias')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/pecas/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'codigo' => $this->input->post('codigo') ?: 'PEC-' . strtoupper(substr(uniqid(), -5)),
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'idcategoria' => $this->input->post('idcategoria'),
            'fabricante' => $this->input->post('fabricante'),
            'modelo_compativel' => $this->input->post('modelo_compativel'),
            'quantidade' => $this->input->post('quantidade') ?: 0,
            'quantidade_minima' => $this->input->post('quantidade_minima') ?: 0,
            'preco_custo' => $this->input->post('preco_custo') ?: 0,
            'preco_venda' => $this->input->post('preco_venda') ?: 0,
            'unidade' => $this->input->post('unidade') ?: 'un',
            'localizacao' => $this->input->post('localizacao'),
            'status' => $this->input->post('status') ?: 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        if ($this->db->insert('pecas', $data))
            redirect('pecas/lista/novo');
        else
            redirect('pecas/lista/erro');
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idpeca');
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'idcategoria' => $this->input->post('idcategoria'),
            'fabricante' => $this->input->post('fabricante'),
            'modelo_compativel' => $this->input->post('modelo_compativel'),
            'quantidade' => $this->input->post('quantidade'),
            'quantidade_minima' => $this->input->post('quantidade_minima'),
            'preco_custo' => $this->input->post('preco_custo'),
            'preco_venda' => $this->input->post('preco_venda'),
            'unidade' => $this->input->post('unidade'),
            'localizacao' => $this->input->post('localizacao'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idpeca', $id);
        if ($this->db->update('pecas', $data))
            redirect('pecas/lista/update');
        else
            redirect('pecas/lista/erro');
    }
    public function movimentar() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idpeca');
        $tipo = $this->input->post('tipo_mov');
        $qtd = $this->input->post('quantidade_mov');
        $this->db->where('idpeca', $id);
        $peca = $this->db->get('pecas')->row();
        $nova_qtd = $tipo == 'ENTRADA' ? $peca->quantidade + $qtd : max(0, $peca->quantidade - $qtd);
        $this->db->where('idpeca', $id);
        $this->db->update('pecas', array('quantidade' => $nova_qtd));
        redirect('pecas/lista/movimentado');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idpeca', $id);
        $this->db->delete('pecas');
        echo 'Deleted successfully.';
    }
    public function get($id) {
        $this->db->where('idpeca', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('pecas')->row());
    }
}
