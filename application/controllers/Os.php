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
		
		$SQL = "SELECT codigo,produtosid as id,descricao,preco_venda as preco,estoque , 'produto' as tipo FROM produtos WHERE estoque != 0 UNION SELECT codigo,servicosid,nome,preco,'S', 'serviço' as tipo FROM servicos";
		$query['produtos'] = $this->db->query($SQL)->result();
		
		$SQL2 = 'SELECT * FROM os_linhas where idos ='.$id;
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
			    'idos' => $osid,
				'idps' => $this->input->post('pid'),
				'descricao' => $this->input->post('descricao'),
                'quantidade' => $this->input->post('quantidade'),
                'preco' => $this->input->post('preco'),
			);
		
		$SQL = 'SELECT COUNT(idos_linhas) as linhas FROM os_linhas WHERE idos ='.$data['idos'].' and idps='.$data['idps'];
		$SQL_R = $this->db->query($SQL)->row_array();
		
		
		if($SQL_R['linhas'] >  0){
			
			$Q = 'SELECT idos_linhas FROM os_linhas WHERE idos = '.$data['idos'].' and idps='.$data['idps'];
			$Q2 = $this->db->query($Q)->row_array();
			$uid = $Q2['idos_linhas']; 
			
			$this->db->select('quantidade');
			$this->db->from('os_linhas');
			$this->db->where('idos_linhas',$uid);
			$quant = $this->db->get()->row()->quantidade;
			
			$data2 = array(
			    'idos' => $osid,
				'idps' => $this->input->post('pid'),
				'descricao' => $this->input->post('descricao'),
                'quantidade' => $quant + $this->input->post('quantidade'),
                'preco' => $this->input->post('preco'),
			);
			
		
			$this->db->where('idos_linhas', $uid);
			$this->db->update('os_linhas',$data2);
			
			
			$this->db->select('estoque');
			$this->db->from('produtos');
			$this->db->where('produtosid',$data2['idps']);
			$estoque = $this->db->get()->row()->estoque;
			
			$prd_estoque['estoque'] = $estoque - $data2['quantidade'];

			$this->db->where('produtosid', $data2['idps']);
			$this->db->update('produtos', $prd_estoque);
			
			$mov = array('tipo'=>'Saída',
						 'finalidade'=>'Foi utilizado na OS',
						 'id'=>$data2['idps'],
						 'valor'=>'-'.$data2['quantidade'],
						'relacionado'=>'OS',
						 'data'=> date('Y-m-d'),
						 'appid'=> $uid,
						'observacoes'=>'Alterado por: '.$this->session->nome);
			
			$this->db->insert('movimentacoes',$mov);
			
			redirect('os/detalhes/'.$osid);
			
		}else{
			$data = array(
			    'idos' => $osid,
				'idps' => $this->input->post('pid'),
				'descricao' => $this->input->post('descricao'),
                'quantidade' => $this->input->post('quantidade'),
                'preco' => $this->input->post('preco'),
			);
			
			$this->db->insert('os_linhas',$data);
			$uid = $this->db->insert_id();
			
			
			$this->db->select('estoque');
			$this->db->from('produtos');
			$this->db->where('produtosid',$data['idps']);
			$estoque = $this->db->get()->row()->estoque;
			
			$prd_estoque['estoque'] = $estoque - $data['quantidade'];

			$this->db->where('produtosid', $data['idps']);
			$this->db->update('produtos', $prd_estoque);
			
			$mov = array('tipo'=>'Saída',
						 'finalidade'=>'Foi utilizado na OS',
						 'id'=>$data['idps'],
						 'valor'=>'-'.$data['quantidade'],
						'relacionado'=>'OS',
						 'data'=> date('Y-m-d'),
						 'appid'=> $uid,
						'observacoes'=>'Alterado por: '.$this->session->nome);
			
			$this->db->insert('movimentacoes',$mov);
			redirect('os/detalhes/'.$osid);
		}
		
	}
	public function delete_linha($id)
	
	{
		$SQL = 'SELECT * FROM os_linhas WHERE idos_linhas='.$id;
		$SQL_R = $this->db->query($SQL)->row_array();
		
		$prd = $SQL_R['idps'];
		$estoque = $SQL_R['quantidade'];
		
		
		$this->db->select('estoque');
		$this->db->from('produtos');
		$this->db->where('produtosid',$prd);
		$est_atual = $this->db->get()->row()->estoque;
		
			
		$prd_estoque['estoque'] = $estoque + $est_atual;

		$this->db->where('produtosid', $prd);
		$this->db->update('produtos', $prd_estoque);
		
		$this->db->where('appid', $id);
		$this->db->delete('movimentacoes');
		
		$this->db->where('idos_linhas', $id);
		$this->db->delete('os_linhas');

		
		echo 'Deleted successfully.';
		
		
	}
	public function atualizar_status()
	{
			$uid =  $this->input->post('idos');
			$data['status'] = $this->input->post('status');
		
		$this->db->where('idos', $uid);
		if($this->db->update('os',$data)){
			redirect('os/detalhes/'.$uid);
		}
	}
	public function editar($id=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Editar OS';
		$this->db->where('idos', $id);
		$query['query'] = $this->db->get('os')->result();	
		$this->db->select('*');
		$query['clientes'] = $this->db->get('clientes')->result();
			
		$this->db->select('*');
		$query['admins'] = $this->db->get('admins')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/os/editar', $query);
		$this->load->view('layout/footer');
	}
}
