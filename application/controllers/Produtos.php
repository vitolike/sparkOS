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
		$this->load->view('layout/datatablejs');
		$this->load->view('layout/footer');
	}
		
		public function adicionar()
	{
		
			
		$foto    = $_FILES['foto'];
    	$configuracao = array(
        'upload_path'   => realpath('./public/uploads'),
        'allowed_types' => 'gif|jpg|png',
		'file_name'     => md5($this->input->post('foto')),
		'max_size'      => '1000'
	   	);      
	    $this->load->library('upload');
	    $this->upload->initialize($configuracao);
			
			
			
		if ($this->upload->do_upload('foto')){
                        
	  		 $upload_data = $this->upload->data();
				  
			 $data = array(
							'descricao' => $this->input->post('descricao'),
							'entrada' => $this->input->post('entrada'),
							'saida' => $this->input->post('saida'),
							'preco_venda' => $this->input->post('preco_venda'),
							'preco_compra' => $this->input->post('preco_compra'),
							'unidade' => $this->input->post('unidade'),
							'estoque' => $this->input->post('estoque'),
							'estoque_minimo' => $this->input->post('estoque_minimo'),
							'foto' => $upload_data['file_name'],
							'criado'  => date('Y-m-d H:i'));
			
		

							if($this->db->insert('produtos',$data)){
								redirect('produtos/lista/novo');
							}
			  }else{
				  redirect('produtos/lista/erro');
				  
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
		
		$foto    = $_FILES['foto'];
    	$configuracao = array(
        'upload_path'   => realpath('./public/uploads'),
        'allowed_types' => 'gif|jpg|png',
		'file_name'     => md5($this->input->post('foto')),
		'max_size'      => '1000'
	   	);      
	    $this->load->library('upload');
	    $this->upload->initialize($configuracao);
			
//		var_dump($foto);
			
			  if ($this->upload->do_upload('foto')){
                        
				  		 $upload_data = $this->upload->data();
				  

					
					  			 $uid =  $this->input->post('produtosid');
								 $data = array(
										'descricao' => $this->input->post('descricao'),
										'entrada' => $this->input->post('entrada'),
										'saida' => $this->input->post('saida'),
										'preco_venda' => $this->input->post('preco_venda'),
										'preco_compra' => $this->input->post('preco_compra'),
										'unidade' => $this->input->post('unidade'),
										'estoque' => $this->input->post('estoque'),
									 	'foto' => $upload_data['file_name'],
										'estoque_minimo' => $this->input->post('estoque_minimo')
								);


								$this->db->where('produtosid', $uid);
								if($this->db->update('produtos', $data)){
									redirect('produtos/editar/'.$uid);
								}
			  }else{
				  redirect('produtos/lista/erro');
				  
			  }
		
	}
}
