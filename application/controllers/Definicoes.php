<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Definicoes extends CI_Controller {

	function __construct() {
        parent::__construct();
        
		$this->load->model('login_model','',TRUE);

	}	
	public function index()
	{	
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Definições';
		$query['msg'] = null;
		$this->db->select('*');
		$query['query'] = $this->db->get('definicoes')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/definicoes/definicoes', $query);
		$this->load->view('layout/footer');
	}
	
	public function atualizado()
	{	
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Definições';
		$query['msg'] = 'atualizado';
		$this->db->select('*');
		$query['query'] = $this->db->get('definicoes')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/definicoes/definicoes', $query);
		$this->load->view('layout/footer');
	}
	
	
	public function salvar()
	
	{	
		$uid =  0;
		$data = array(
			    'sysname' => $this->input->post('sysname'),
				'email' => $this->input->post('email'),
                'cnpj' => $this->input->post('cnpj'),
			    'nome_fantasia' => $this->input->post('nome_fantasia')
		);
		
		$this->db->where('iddefinicoes', $uid);
		if($this->db->update('definicoes', $data)){
			redirect('definicoes/atualizado');
		}
		
	}
}
