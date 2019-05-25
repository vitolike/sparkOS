<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller {

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
		$query['appname'] = 'Serviços';
		$this->db->select('*');
		$query['query'] = $this->db->get('servicos')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/servicos/lista', $query);
		$this->load->view('layout/datatablejs');
		$this->load->view('layout/footer');
	}
		
		public function adicionar()
	{
		
			$data = array('codigo' =>rand(5,100).date('dmYHis'),
				'nome' => $this->input->post('nome'),
			    'descricao' => $this->input->post('descricao'),
				'preco' => $this->input->post('preco'));
		
		if($this->db->insert('servicos',$data)){
			redirect('servicos/lista/novo');
		}
		
	}
	public function delete($id)
	
	{
		$this->db->where('servicosid', $id);
		$this->db->delete('servicos');
		echo 'Deleted successfully.';
	}
	public function editar($id=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Dados do Serviço';
		$this->db->where('servicosid', $id);
		$query['query'] = $this->db->get('servicos')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/servicos/edit', $query);
		$this->load->view('layout/footer');
	}
	public function update()
	
	{	
		$uid =  $this->input->post('servicosid');
		 $data = array(
				'nome' => $this->input->post('nome'),
			    'descricao' => $this->input->post('descricao'),
				'preco' => $this->input->post('preco'));
		
		
		$this->db->where('servicosid', $uid);
		if($this->db->update('servicos', $data)){
			redirect('servicos/lista/update');
		}
		else{};
		
	}
}
