<?php 

class Login_model extends CI_Model {

    public function verifica_sessao()
	{
		if( $this->session->userdata('logado') == false){
			redirect ('');
		}		
		   
	}
	public function sysname()
	{
		
		$this->db->where('iddefinicoes',0);	
		return $this->db->get('definicoes')->row()->sysname;
		   
	}
	
}