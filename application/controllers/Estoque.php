<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estoque extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('estoque/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Estoque';
        $query['msg'] = $msg;
        $this->db->select('estoques.*');
        $this->db->order_by('idestoque', 'DESC');
        $query['estoques'] = $this->db->get('estoques')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/estoque/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function itens($id, $msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'Estoque Itens';
        $query['msg'] = $msg;
        $this->db->where('idestoque', $id);
        $query['estoque'] = $this->db->get('estoques')->row();
        $this->db->select('estoque_itens.*, produtos.descricao as produto_nome, produtos.codigo as produto_codigo, produtos.preco_venda, produtos.preco_compra');
        $this->db->join('produtos', 'produtos.produtosid = estoque_itens.produtosid');
        $this->db->where('estoque_itens.idestoque', $id);
        $this->db->order_by('produtos.descricao', 'ASC');
        $query['itens'] = $this->db->get('estoque_itens')->result();
        $query['produtos'] = $this->db->get('produtos')->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/estoque/itens', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo') ?: 'PRINCIPAL',
            'endereco' => $this->input->post('endereco'),
            'responsavel' => $this->input->post('responsavel'),
            'status' => $this->input->post('status') ?: 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('estoques', $data);
        redirect('estoque/lista/novo');
    }
    public function add_item() {
        $this->login_model->verifica_sessao();
        $idestoque = $this->input->post('idestoque');
        $produtosid = $this->input->post('produtosid');
        $this->db->where('idestoque', $idestoque);
        $this->db->where('produtosid', $produtosid);
        $existing = $this->db->get('estoque_itens')->row();
        if ($existing) {
            $this->db->where('iditem', $existing->iditem);
            $this->db->update('estoque_itens', array(
                'quantidade' => $existing->quantidade + ($this->input->post('quantidade') ?: 1),
                'localizacao' => $this->input->post('localizacao')
            ));
        } else {
            $this->db->insert('estoque_itens', array(
                'idestoque' => $idestoque,
                'produtosid' => $produtosid,
                'quantidade' => $this->input->post('quantidade') ?: 1,
                'quantidade_minima' => $this->input->post('quantidade_minima') ?: 0,
                'localizacao' => $this->input->post('localizacao'),
                'criado_em' => date('Y-m-d H:i:s')
            ));
        }
        redirect('estoque/itens/' . $idestoque . '/item_adicionado');
    }
    public function update_item() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('iditem');
        $data = array(
            'quantidade' => $this->input->post('quantidade'),
            'quantidade_minima' => $this->input->post('quantidade_minima'),
            'localizacao' => $this->input->post('localizacao')
        );
        $this->db->where('iditem', $id);
        $item = $this->db->get('estoque_itens')->row();
        $this->db->where('iditem', $id);
        $this->db->update('estoque_itens', $data);
        redirect('estoque/itens/' . $item->idestoque . '/update');
    }
    public function delete_item($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('iditem', $id);
        $item = $this->db->get('estoque_itens')->row();
        $idestoque = $item->idestoque;
        $this->db->where('iditem', $id);
        $this->db->delete('estoque_itens');
        redirect('estoque/itens/' . $idestoque);
    }
    public function update() {
        $this->login_model->verifica_sessao();
        $id = $this->input->post('idestoque');
        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'tipo' => $this->input->post('tipo'),
            'endereco' => $this->input->post('endereco'),
            'responsavel' => $this->input->post('responsavel'),
            'status' => $this->input->post('status')
        );
        $this->db->where('idestoque', $id);
        $this->db->update('estoques', $data);
        redirect('estoque/lista/update');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idestoque', $id);
        $this->db->delete('estoques');
        echo 'Deleted successfully.';
    }
}
