<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kpis extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','',TRUE);
    }
    public function index() { redirect('kpis/lista'); }
    public function lista($msg = null) {
        $this->login_model->verifica_sessao();
        $query['sysname'] = $this->login_model->sysname();
        $query['appname'] = 'KPIs';
        $query['msg'] = $msg;
        $this->db->order_by('criado_em', 'DESC');
        $query['kpis'] = $this->db->get('kpis_metas')->result();
        $kpi_list = $this->db->get('kpis_metas')->result(); // second query but fine for now
        $query['kpis'] = $kpi_list;
        $query['historico'] = $this->db->query("SELECT h.*, k.nome as kpi_nome FROM kpis_historico h JOIN kpis_metas k ON k.idkpi = h.idkpi ORDER BY h.data_registro DESC LIMIT 20")->result();
        $this->load->view('layout/header', $query);
        $this->load->view('app/kpis/lista', $query);
        $this->load->view('layout/datatablejs');
        $this->load->view('layout/footer');
    }
    public function adicionar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'categoria' => $this->input->post('categoria') ?: 'OPERACIONAL',
            'valor_meta' => $this->input->post('valor_meta') ?: 0,
            'valor_atual' => $this->input->post('valor_atual') ?: 0,
            'unidade' => $this->input->post('unidade') ?: '%',
            'periodo' => $this->input->post('periodo') ?: 'MENSAL',
            'responsavel' => $this->input->post('responsavel'),
            'status' => $this->input->post('status') ?: 'ATIVO',
            'criado_em' => date('Y-m-d H:i:s')
        );
        $this->db->insert('kpis_metas', $data) ? redirect('kpis/lista/novo') : redirect('kpis/lista/erro');
    }
    public function registrar() {
        $this->login_model->verifica_sessao();
        $data = array(
            'idkpi' => $this->input->post('idkpi'),
            'valor' => $this->input->post('valor') ?: 0,
            'data_registro' => $this->input->post('data_registro') ?: date('Y-m-d'),
            'observacao' => $this->input->post('observacao')
        );
        $this->db->insert('kpis_historico', $data);
        $this->db->where('idkpi', $data['idkpi'])->update('kpis_metas', ['valor_atual' => $data['valor']]);
        redirect('kpis/lista/update');
    }
    public function delete($id) {
        $this->login_model->verifica_sessao();
        $this->db->where('idkpi', $id)->delete('kpis_metas');
        echo 'ok';
    }
    public function get($id) {
        $this->db->where('idkpi', $id);
        header('Content-Type: application/json');
        echo json_encode($this->db->get('kpis_metas')->row());
    }
}
