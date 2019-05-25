<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {
	
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
		$query['appname'] = 'Editar definições';
		$query['msg'] = $id;
		$this->db->select('*');
		$query['query'] = $this->db->get('admins')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/admins/lista', $query);
		$this->load->view('layout/footer');
	}
	
	
	
	
	public function editar($id=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Editar definições';
		$this->db->where('adminid', $id);
		$query['query'] = $this->db->get('admins')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/admins/edit', $query);
		$this->load->view('layout/footer');
	}
	
	public function adicionar()
	
	{	
			
		$email = $this->input->post('email');
		$data = array(
			    'nome' => $this->input->post('nome'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
                'senha' => md5($this->input->post('senha')),
			    'status' => $this->input->post('status'),
			    'obs' => $this->input->post('obs'),
				'tipo'  => $this->input->post('tipo')
		);
		
		$this->db->where('email',$email);
		$query = $this->db->get('admins');
		
		if($query->num_rows()>0){
			redirect('admins/lista/erro_email');
			}
		else {
			$this->db->insert('admins', $data);
			redirect('admins/lista/adicionado');
		};
		
	}
	public function atualizar()
	
	{	
		$uid =  $this->input->post('adminid');
		$email = $this->input->post('email');
		 $data = array(
			    'nome' => $this->input->post('nome'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
			    'status' => $this->input->post('status'),
			    'obs' => $this->input->post('obs'),
				'tipo'  => $this->input->post('tipo')
		);
		
		
		$this->db->where('adminid', $uid);
		if($this->db->update('admins', $data)){
			redirect('admins/lista/atualizado');
		}
		else{};
		
	}
	
	public function atualizar_senha()
	
	{	
		$uid =  $this->input->post('adminid');
		 $data = array(
			    'senha' =>  md5($this->input->post('senha_nova'))

		);
		
		
		$this->db->where('adminid', $uid);
		if($this->db->update('admins', $data)){
			redirect('admins/lista/atualizado');
		}
		else{};
		
	}
	
	public function delete($id=null)
	
	{
		$this->db->where('adminid', $id);
		$this->db->delete('admins');
		echo 'Deleted successfully.';
	}
	public function buscar($id)
	
	{

		$this->db->where('adminid', $id);
		$query = $this->db->get('admins')->result();
		
		$data = array('nome'=> $query[0]->nome);
		
		
			header('Content-Type: application/json');
	 		echo json_encode($data);
	}
	
}
