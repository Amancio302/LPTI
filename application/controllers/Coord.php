<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Coord extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('login')){
					$this->load->view('login');
			}
		}	
		
		public function parametros($script = 0){
			$data['url'] = base_url();
			$tipo = $this->session->userdata('tipo') * 10;
			
			$tipos = $tipo + 5;
			
			$this->db->select('*');
			$this->db->from('PARAMETRO_DE_RISCO');
			$where = "PARAMETRO_DE_RISCO.idTURMA > ". $tipo . ' AND idTURMA < ' . $tipos;
			
			$this->db->where($where);
			$data['PARAMETRO'] = $this->db->get()->result();
			
			$tipo += 30;
			
			$tipos += 30;
			
			$this->db->select('*');
			$this->db->from('PARAMETRO_DE_RISCO');
			$where = "PARAMETRO_DE_RISCO.idTURMA > ". $tipo . ' AND idTURMA < ' . $tipos;
			
			$this->db->where($where);
			$data['PARAMETROS'] = $this->db->get()->result();
			$dat['Tipo'] = $this->session->userdata('tipo');
			$this->parser->parse('ajaxCoord', $dat);
			$this->parser->parse('Coordenador/addParametro', $data);
		}
		
		public function parametro(){
			/*$tipo = $this->input->post('id');
			$data['FREQUENCIA'] = $this->input->post('txt_freq');
			$data['NOTA'] = $this->input->post('txt_nota');
			$this->db->where('idPARAMETRO_DE_RISCO', $tipo);
			$this->db->update('PARAMETRO_DE_RISCO', $data);
			*/
			redirect(base_url('Coord/parametros'));
		}
		
		public function criarParametro($tipo){
			$data['url'] = base_url();
			$data['Tipo'] = $tipo;
			$dat['Tipo'] = $this->session->userdata('tipo');
			$this->parser->parse('ajaxCoord', $dat);
			$this->parser->parse('Coordenador/insereParametro', $data);
		}
		
		public function insereParametro(){
			$data['NOTA'] = $this->input->post('txt_nota');
			$data['FREQUENCIA'] = $this->input->post('txt_freq');
			$data['MATERIAS'] = $this->input->post('txt_materias');
			$mod = $this->input->post('txt_mod');
			$tipo = $this->input->post('txt_tipo');
			if($tipo == 6){
				$turmas = array('11', '12', '13', '21', '22', '23', '31', '32', '33');
				foreach($turmas as $turma){
					$data['idTURMA'] = $turma;
					$this->db->insert('PARAMETRO_DE_RISCO', $data);
				}
			}
			else{
				if($mod == 1){
					$turmas = array($tipo. '1', $tipo. '2', $tipo. '3');
				}
				else{
					$tipos = $tipo+3;
					$turmas = array($tipos. '1', $tipos. '2', $tipos. '3');
				}
				foreach($turmas as $turma){
					$data['idTURMA'] = $turma;
					$this->db->insert('PARAMETRO_DE_RISCO', $data);
				}
			}
			$data['url'] = base_url();
			$data['Tipo'] = $this->session->userdata('tipo');
			$this->parser->parse('ajaxCoord', $data);
			$this->parser->parse('telaCoord', $data);
		}
		
		public function editarParametro($id){
			$this->db->select('*');
			$this->db->from('PARAMETRO_DE_RISCO');
			$this->db->where('PARAMETRO_DE_RISCO.idPARAMETRO_DE_RISCO', $id);
			$data['PARAMETRO'] = $this->db->get()->result();
			$data['url'] = base_url();
			$data['Tipo'] = $this->session->userdata('tipo');
			$this->parser->parse('ajaxCoord', $data);
			$this->parser->parse('Coordenador/editarParametro', $data);
		}
		
		public function editaParametro(){
			$data['NOTA'] = $this->input->post('txt_nota');
			$data['FREQUENCIA'] = $this->input->post('txt_freq');
			$data['MATERIAS'] = $this->input->post('txt_materias');
			$id = $this->input->post('txt_id');
			$this->db->select('*');
			$this->db->from('PARAMETRO_DE_RISCO');
			$this->db->where('PARAMETRO_DE_RISCO.idPARAMETRO_DE_RISCO', $id);
			$this->db->update('PARAMETRO_DE_RISCO', $data);
			redirect(base_url('coord/parametros/1'));
		}	
	}
