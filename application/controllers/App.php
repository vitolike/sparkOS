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
		$sql = "SELECT * FROM os WHERE status IN ('ABERTO','ORÇAMENTO', 'EM ANDAMENTO')";
		
		$sql_produtos = "SELECT * FROM produtos where estoque_minimo >= estoque";
		
		$query_sql = $this->db->query($sql);
		$query_prod = $this->db->query($sql_produtos);
		$query['OS'] = $query_sql->num_rows();  
		$query['query'] = $query_sql->result();
		$query['prod'] = $query_prod->result();
		
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Dashboard';
		$this->load->view('layout/header', $query);
		$this->load->view('app/dashboard', $query);
		$this->load->view('layout/footer');
		
	}
}
