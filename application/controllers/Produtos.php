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
		
		public function adicionar(){	
		$data = array('codigo' =>rand(5,100).date('dmYHis'),	
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
			$pid = $this->db->insert_id();
			
			$mov = array('tipo'=>'Entrada',
						 'id'=>$pid,
						 'finalidade'=>'Produto criado',
						 'valor'=>$data['estoque'],
						'relacionado'=>'Produtos',
						 'data'=> date('Y-m-d'),
						'observacoes'=>'Alterado por: '.$this->session->nome);
			
			$this->db->insert('movimentacoes',$mov);
			
			
			redirect('produtos/editar/'.$pid.'/novo');
		}
	}
	public function update(){
		
		$uid =  $this->input->post('produtosid');
		$data = array('descricao' => $this->input->post('descricao'),
				'entrada' => $this->input->post('entrada'),
				'saida' => $this->input->post('saida'),
				'preco_venda' => $this->input->post('preco_venda'),
				'preco_compra' => $this->input->post('preco_compra'),
				'unidade' => $this->input->post('unidade'),
				'estoque_minimo' => $this->input->post('estoque_minimo'));


		$this->db->where('produtosid', $uid);
		
		if($this->db->update('produtos', $data)){	
		redirect('produtos/editar/'.$uid.'/update/');}
		
	}
	public function delete($id)
	
	{
		$this->db->where('produtosid', $id);
		$this->db->delete('produtos');
		echo 'Deleted successfully.';
	}
	public function editar($id=null,$mid=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Dados do Produto';
		$query['msg'] = $mid;
		$this->db->where('produtosid', $id);
		$query['query'] = $this->db->get('produtos')->result();
		
		$this->db->select('*');
	    $this->db->from('movimentacoes');
		$this->db->where('id',$id);
		$query['mov'] = $this->db->get()->result();
		
		
		$this->load->view('layout/header', $query);
		$this->load->view('app/produtos/edit', $query);
		$this->load->view('layout/footer');
	}
	public function update_foto()
	
	{	
		
		$foto    = $_FILES['foto'];
    	$configuracao = array(
        'upload_path'   => realpath('./public/uploads'),
        'allowed_types' => 'gif|jpg|png|jpeg',
		'file_name'     => md5($this->input->post('foto')),
		'max_size'      => '10000000'
	   	);      
	    $this->load->library('upload');
	    $this->upload->initialize($configuracao);
			
//		var_dump($foto);
			
		if ($this->upload->do_upload('foto')){
                        
			$upload_data = $this->upload->data();
				  

					
			$uid =  $this->input->post('produtosid');
			$data = array('foto' => $upload_data['file_name']);


			$this->db->where('produtosid', $uid);
			
			  if($this->db->update('produtos', $data)){
									redirect('produtos/editar/'.$uid.'/update');
								}
			  }else{
				  redirect('produtos/lista/erro');
				  
			  }
		
	}
	public function add_estoque()
	
	{
		$uid =  $this->input->post('produtosid');
		
		$novo = $this->input->post('adicionar_mais');
		
	    $this->db->select('estoque');
	    $this->db->from('produtos');
		$this->db->where('produtosid',$uid);
        $estoque = $this->db->get()->row()->estoque;
		
		$data['produtosid'] = $uid;
		$data['estoque'] = $estoque + $novo;

		$this->db->where('produtosid', $uid);
		
		if($this->db->update('produtos', $data)){
			
		$mov = array('tipo'=>'Entrada',
					 'finalidade'=>'Foi adicionado estoque',
					 'id'=>$uid,
					 'valor'=>$novo,
			   		'relacionado'=>'Produtos',
					 'data'=> date('Y-m-d'),
					'observacoes'=>'Alterado por: '.$this->session->nome);
			
		$this->db->insert('movimentacoes',$mov);	
		redirect('produtos/editar/'.$uid.'/update/');}
	}
	
	public function imprimir_qrcode($id=null)
	{
		$this->db->where('produtosid', $id);
		$query['query'] = $this->db->get('produtos')->result();
		$this->load->view('app/produtos/imprimir_qrcode', $query);
		
	}
	public function imprimir_code39($id=null)
	{
		$this->db->where('produtosid', $id);
		$query['query'] = $this->db->get('produtos')->result();
		$this->load->view('app/produtos/imprimir_code39', $query);
		
	}
}
