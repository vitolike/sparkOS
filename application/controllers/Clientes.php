<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        
		$this->load->model('login_model','',TRUE);

	}	

	
	public function index($id=null)
	
	{
		redirect('auth/entrar');
	}
	
	
	public function lista($id=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Clientes';
		$query['msg'] = $id;
		$this->db->select('*');
		$query['query'] = $this->db->get('clientes')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/clientes/lista', $query);
		$this->load->view('layout/footer');
	}
	
	public function add_clientes()
	
	{	
			
		$email = $this->input->post('email');
		$data = array(
			    'nome' => $this->input->post('nome'),
				'sobrenome' => $this->input->post('sobrenome'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
				'endereco' => $this->input->post('endereco'),
				'numero' => $this->input->post('numero'),
				'bairro' => $this->input->post('bairro'),
			    'cidade' => $this->input->post('cidade'),
			    'uf' => $this->input->post('uf'),
				'cep' => $this->input->post('cep'),
				'documento'  => $this->input->post('documento'),
				'tipo_documento'  => $this->input->post('tipo_documento'),
				'criado'  => date('Y-m-d H:i'),
				'log_criacao' => 'Criado em '.date('Y-m-d\TH:i:sP').' Pelo usuário: '.$this->session->nome
		);
		
		$this->db->where('email',$email);
		$query = $this->db->get('clientes');
		
		if($query->num_rows()>0){
			redirect('clientes/lista/erro');
			}
		else {
			$this->db->insert('clientes', $data);
			redirect('clientes/lista/novo_sucesso');
		};
		
	}
	
	public function editar_cliente($id=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Dados do Cliente';
		$this->db->where('clientesid', $id);
		$query['query'] = $this->db->get('clientes')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/clientes/edit', $query);
		$this->load->view('layout/footer');
	}
	
	public function upd_cliente()
	
	{	
		$uid =  $this->input->post('clientesid');
		 $data = array(
			    'nome' => $this->input->post('nome'),
				'sobrenome' => $this->input->post('sobrenome'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
				'endereco' => $this->input->post('endereco'),
				'numero' => $this->input->post('numero'),
				'bairro' => $this->input->post('bairro'),
			    'cidade' => $this->input->post('cidade'),
			    'uf' => $this->input->post('uf'),
				'cep' => $this->input->post('cep'),
				'documento'  => $this->input->post('documento'),
				'tipo_documento'  => $this->input->post('tipo_documento'),
				'log_alteracao' => 'Alterado dia '.date('Y-m-d H:i').' Pelo usuário: '.$this->session->nome
		);
		
		
		$this->db->where('clientesid', $uid);
		if($this->db->update('clientes', $data)){
			redirect('clientes/lista/sucesso_update');
		}
		else{};
		
	}
	public function delete($id)
	
	{
		$this->db->where('clientesid', $id);
		$this->db->delete('clientes');
		echo 'Deleted successfully.';
	}
	
}
