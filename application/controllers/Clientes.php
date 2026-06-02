<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
	
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
		$query['appname'] = 'Clientes';
		$query['msg'] = $id;
		$this->db->select('*');
		$query['query'] = $this->db->get('clientes')->result();
		$this->load->view('layout/header', $query);
		$this->load->view('app/clientes/lista', $query);
		$this->load->view('layout/datatablejs');
		$this->load->view('layout/footer');
	}
	
	public function add_clientes()
	
	{	
			
		$email = $this->input->post('email');
		$data = array(
			    'nome' => $this->input->post('nome'),
				'sobrenome' => $this->input->post('sobrenome'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
				'endereco' => $this->input->post('endereco'),
				'numero' => $this->input->post('numero'),
				'bairro' => $this->input->post('bairro'),
			    'cidade' => $this->input->post('cidade'),
			    'uf' => $this->input->post('uf'),
				'cep' => $this->input->post('cep'),
				'documento'  => $this->input->post('documento'),
				'tipo_documento'  => $this->input->post('tipo_documento'),
				'criado'  => date('Y-m-d H:i'),
				'log_criacao' => 'Criado em '.date('Y-m-d\TH:i:sP').' Pelo usuário: '.$this->session->nome
		);
		
		$this->db->where('email',$email);
		$query = $this->db->get('clientes');
		
		if($query->num_rows()>0){
			redirect('clientes/lista/erro');
			}
		else {
			$this->db->insert('clientes', $data);
			redirect('clientes/lista/novo_sucesso');
		};
		
	}
	
	public function editar_cliente($id=null)
	
	{
		$this->login_model->verifica_sessao();
		$query['sysname'] =  $this->login_model->sysname();
		$query['appname'] = 'Dados do Cliente';
		$this->db->where('clientesid', $id);
		$query['query'] = $this->db->get('clientes')->result();
		if (!$query['query']) { show_404(); }
		$cid = $query['query'][0]->clientesid;

		$query['total_equipamentos'] = $this->db->where('clientesid', $cid)->count_all_results('equipamentos');
		$query['total_tickets'] = $this->db->where('cliente_id', $cid)->count_all_results('helpdesk_tickets');
		$query['total_orcamentos'] = $this->db->where('clientesid', $cid)->count_all_results('orcamentos');
		$query['total_faturas'] = $this->db->where('clientesid', $cid)->count_all_results('faturamento_faturas');

		$nome = $query['query'][0]->nome;
		$query['total_os'] = $this->db->like('cliente', $nome, 'both')->count_all_results('os');
		$query['os_abertas'] = $this->db->like('cliente', $nome, 'both')->where_not_in('status', ['FINALIZADO', 'CANCELADO'])->count_all_results('os');
		$query['tickets_abertos'] = $this->db->where('cliente_id', $cid)->where('status !=', 'RESOLVIDO')->count_all_results('helpdesk_tickets');
		$query['faturas_vencidas'] = $this->db->where('clientesid', $cid)->where('status !=', 'PAGO')->where('data_vencimento <', date('Y-m-d'))->count_all_results('faturamento_faturas');
		$query['garantias_vencidas'] = $this->db->where('clientesid', $cid)->where('data_garantia IS NOT NULL', null, false)->where('data_garantia <', date('Y-m-d'))->count_all_results('equipamentos');

		$score = 0;
		if ($query['os_abertas'] > 3) $score += 30;
		elseif ($query['os_abertas'] > 1) $score += 15;
		if ($query['tickets_abertos'] > 3) $score += 25;
		elseif ($query['tickets_abertos'] > 1) $score += 12;
		if ($query['faturas_vencidas'] > 0) $score += 25;
		if ($query['garantias_vencidas'] > 2) $score += 20;
		elseif ($query['garantias_vencidas'] > 0) $score += 10;
		$query['risk_score'] = min($score, 100);
		if ($query['risk_score'] >= 60) $query['risk_level'] = 'CRITICO';
		elseif ($query['risk_score'] >= 35) $query['risk_level'] = 'ALTO';
		elseif ($query['risk_score'] >= 15) $query['risk_level'] = 'MEDIO';
		else $query['risk_level'] = 'BAIXO';

		$this->load->view('layout/header', $query);
		$this->load->view('app/clientes/edit', $query);
		$this->load->view('layout/footer');
	}
	
	public function upd_cliente()
	
	{	
		$uid =  $this->input->post('clientesid');
		 $data = array(
			    'nome' => $this->input->post('nome'),
				'sobrenome' => $this->input->post('sobrenome'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
				'endereco' => $this->input->post('endereco'),
				'numero' => $this->input->post('numero'),
				'bairro' => $this->input->post('bairro'),
			    'cidade' => $this->input->post('cidade'),
			    'uf' => $this->input->post('uf'),
				'cep' => $this->input->post('cep'),
				'documento'  => $this->input->post('documento'),
				'tipo_documento'  => $this->input->post('tipo_documento'),
				'log_alteracao' => 'Alterado dia '.date('Y-m-d H:i').' Pelo usuário: '.$this->session->nome
		);
		
		
		$this->db->where('clientesid', $uid);
		if($this->db->update('clientes', $data)){
			redirect('clientes/lista/sucesso_update');
		}
		else{};
		
	}
	public function delete($id)
	
	{
		$this->db->where('clientesid', $id);
		$this->db->delete('clientes');
		echo 'Deleted successfully.';
	}
	
	public function buscar($id)
	
	{

		$this->db->where('clientesid', $id);
		$query = $this->db->get('clientes')->result();
		
		$data = array('nome'=> $query[0]->nome,
					  'sobrenome' => $query[0]->sobrenome
					 );
		
		
			header('Content-Type: application/json');
	 		echo json_encode($data);
	}
}
