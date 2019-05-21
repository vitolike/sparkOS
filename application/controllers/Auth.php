<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct() {
        parent::__construct();
        
		$this->load->model('login_model','',TRUE);

	}	
	public function index()
	{
		redirect('auth/entrar');
	}
	
	public function entrar($id=null)
	{
		
		$log = array(
			    'tipo' => 'VISITANTE',
				'data' => date('Y-m-d\TH:i:sP'),
				'ip' => $_SERVER['REMOTE_ADDR'],
				'usuario' => 'Alguem entrou',
				'logs' => $_SERVER['HTTP_USER_AGENT']);
				
		$this->db->insert('auth_login',$log);
		
		$query['msg'] = $id;
		$query['sysname'] =  $this->login_model->sysname();
		$this->load->view('login/login', $query);
		
				
	}
	
	
		public function logar()
	{
		$email = $this->input->post('email');
		$senha = md5($this->input->post('senha'));
		
		$this->db->where('email',$email);
		$this->db->where('senha',$senha);
		$data['admins'] = $this->db->get('admins')->result();
		
		if(count($data['admins']) == 1){
			$dados['nome'] = $data['admins'][0]->nome;
			$dados['id'] = $data['admins'][0]->adminid;
			$dados['logado'] = true;
			$this->session->set_userdata($dados);
			
			$log = array(
			    'tipo' => 'ENTRADA',
				'data' => date('Y-m-d\TH:i:sP'),
				'ip' => $_SERVER['REMOTE_ADDR'],
				'usuario' => $data['admins'][0]->nome.' '.$data['admins'][0]->email,
				'logs' => $_SERVER['HTTP_USER_AGENT']);
				
			$this->db->insert('auth_login',$log);
			
			redirect('app/home');
		}
		else{
			
			
			$log = array(
			    'tipo' => 'ERRO',
				'data' => date('Y-m-d\TH:i:sP'),
				'ip' => $_SERVER['REMOTE_ADDR'],
				'usuario' => 'Algum mané '.$email,
				'logs' => $_SERVER['HTTP_USER_AGENT']);
				
			$this->db->insert('auth_login',$log);
			
			redirect('auth/entrar/login_erro');
		}
		
	}
	public function sair()
	{
		$log = array(
			    'tipo' => 'SAIDA',
				'data' => date('Y-m-d\TH:i:sP'),
				'ip' => $_SERVER['REMOTE_ADDR'],
				'usuario' => $this->session->nome,
				'logs' => $_SERVER['HTTP_USER_AGENT']);
				
			$this->db->insert('auth_login',$log);
		$this->session->sess_destroy();
		redirect('auth/entrar/desconectado');
	}
}
