<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct() {
        parent::__construct();
        
		$this->load->model('login_model','',TRUE);

	}	
	public function index()
	{
		redirect('auth/entrar');
		
	}
	public function home()
	{
		
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Dashboard';
		$this->load->view('layout/header', $query);
		$this->load->view('app/dashboard');
		$this->load->view('layout/footer');
		
	}
}
