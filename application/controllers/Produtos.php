<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	function __construct() {
        parent::__construct();
        
		$this->load->model('login_model','',TRUE);

	}	
	public function index()
	{
		redirect('auth/entrar');
	}
	public function lista($id=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['msg'] = $id;
		$query['appname'] = 'Produtos';
		$this->db->select('*');
		$query['query'] = $this->db->get('produtos')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/produtos/lista', $query);
		$this->load->view('layout/footer');
	}
		
		public function adicionar()
	{
		
			$data = array(
			    'descricao' => $this->input->post('descricao'),
				'entrada' => $this->input->post('entrada'),
                'saida' => $this->input->post('saida'),
                'preco_venda' => $this->input->post('preco_venda'),
				'preco_compra' => $this->input->post('preco_compra'),
				'unidade' => $this->input->post('unidade'),
				'estoque' => $this->input->post('estoque'),
			    'estoque_minimo' => $this->input->post('estoque_minimo'),
				'criado'  => date('Y-m-d H:i'));
		
		if($this->db->insert('produtos',$data)){
			redirect('produtos/lista/novo');
		}
		
	}
	public function delete($id)
	
	{
		$this->db->where('produtosid', $id);
		$this->db->delete('produtos');
		echo 'Deleted successfully.';
	}
	public function editar($id=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Dados do Produto';
		$this->db->where('produtosid', $id);
		$query['query'] = $this->db->get('produtos')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/produtos/edit', $query);
		$this->load->view('layout/footer');
	}
	public function update()
	
	{	
		$uid =  $this->input->post('produtosid');
		 $data = array(
			       'descricao' => $this->input->post('descricao'),
				'entrada' => $this->input->post('entrada'),
                'saida' => $this->input->post('saida'),
                'preco_venda' => $this->input->post('preco_venda'),
				'preco_compra' => $this->input->post('preco_compra'),
				'unidade' => $this->input->post('unidade'),
				'estoque' => $this->input->post('estoque'),
			    'estoque_minimo' => $this->input->post('estoque_minimo'),
				'criado'  => date('Y-m-d H:i')
		);
		
		
		$this->db->where('produtosid', $uid);
		if($this->db->update('produtos', $data)){
			redirect('produtos/lista/update');
		}
		else{};
		
	}
}
