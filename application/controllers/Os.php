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
		$this->load->view('layout/datatablejs');
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
				'protocolo' => rand(5,100).date('dmYHis'),
				'nome_cliente' => $this->input->post('nome_cliente'),
				'nome_tecnico' => $this->input->post('nome_tecnico')
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
		
		$SQL = "SELECT codigo,produtosid as id,descricao,preco_venda as preco FROM sistema.produtos UNION SELECT codigo,servicosid,nome,preco FROM sistema.servicos";
		$query['produtos'] = $this->db->query($SQL)->result();
		
		$SQL2 = 'SELECT * FROM sistema.os_linhas where idos ='.$id;
		$query['linhas'] = $this->db->query($SQL2)->result();
		
		$this->load->view('layout/header', $query);
		$this->load->view('app/os/detalhes', $query);
		$this->load->view('layout/footer');
	}
	public function atualizar()
	{
		$uid =  $this->input->post('idos');
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
				'nome_cliente' => $this->input->post('nome_cliente'),
				'nome_tecnico' => $this->input->post('nome_tecnico')
			);
		$this->db->where('idos', $uid);
		if($this->db->update('os',$data)){
			redirect('os/detalhes/'.$uid);
		}
		
	}
	public function add_produto()
	{
			$osid = $this->input->post('idos');
			$data = array(
			    'idos' => $this->input->post('idos'),
				'descricao' => $this->input->post('descricao'),
                'quantidade' => $this->input->post('quantidade'),
                'preco' => $this->input->post('preco'),
			);
		
		if($this->db->insert('os_linhas',$data)){
			redirect('os/detalhes/'.$osid);
		}
		
	}
	public function delete_linha($id)
	
	{
		$this->db->where('idos_linhas', $id);
		$this->db->delete('os_linhas');
		echo 'Deleted successfully.';
	}
	
}
