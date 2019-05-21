<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Os extends CI_Controller {

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
		$query['appname'] = 'Ordens de Serviço';
		$this->db->select('*');
		$query['query'] = $this->db->get('os')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/os/lista', $query);
		$this->load->view('layout/footer');
	}
	
		public function novo($id=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Nova OS';
			
		$this->db->select('*');
		$query['query'] = $this->db->get('clientes')->result();
			
		$this->db->select('*');
		$query['admins'] = $this->db->get('admins')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/os/novo', $query);
		$this->load->view('layout/footer');
	}
		
		public function adicionar()
	{
		
			$data = array(
			    'data_inicial' => $this->input->post('data_inicial'),
				'data_final' => $this->input->post('data_final'),
                'garantia' => $this->input->post('garantia'),
                'descricao' => $this->input->post('descricao'),
				'defeito' => $this->input->post('defeito'),
				'laudo_tecnico' => $this->input->post('laudo_tecnico'),
				'observacoes' => $this->input->post('observacoes'),
			    'cliente' => $this->input->post('cliente'),
				'tecnico' => $this->input->post('tecnico'),
				'status' => $this->input->post('status'),
				'protocolo' => rand('5').date('dmYHis')
			);
		
		if($this->db->insert('os',$data)){
			$osid = $this->db->insert_id();
			redirect('os/detalhes/'.$osid);
		}
		
	}
	public function delete($id)
	
	{
		$this->db->where('idos', $id);
		$this->db->delete('os');
		echo 'Deleted successfully.';
	}
	
	public function detalhes($id=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Detalhes da OS';
		$this->db->where('idos', $id);
		$query['query'] = $this->db->get('os')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/os/detalhes', $query);
		$this->load->view('layout/footer');
	}
	
}
