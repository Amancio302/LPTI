<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Estagiario extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('login')){
					$this->load->view('login');
			}
		}	
		
		public function aluCad(){
			$data['url'] = base_url();
			$this->parser->parse('aluno', $data);
		}
		
		public function aluno(){
			$data['idALUNO'] = $this->input->post('txt_matricula');
			$data['NOME'] = $this->input->post('txt_nome');
			$dat['TURMA_idTURMA'] = $this->input->post('Turma');
			$dat['ALUNO_idALUNO'] = $data['idALUNO'];
			$dat['ANO'] = $this->input->post('txt_ano');
			if(($data['idALUNO'] <= 100000000000) or ($data['NOME'] == "") or ($dat['TURMA_idTURMA'] == "") or ($dat['ANO'] == "")){
				$da['modal'] = "$(window).on('load',function(){
							  $('#erro-modal').modal('show');
							  });";
				$da['url'] = base_url();
				$this->parser->parse('aluno', $da);
			}
			else{
				$da['modal'] = " ";
				$this->db->insert('ALUNO', $data);
				$this->db->insert('TURMA_has_ALUNO', $dat);
				redirect();
			}
			
		}
		
		public function notCad(){
			$this->db->select('TURMA.idTURMA, TURMA.SERIE, TURMA_has_ALUNO.ANO, TURMA.idCURSO');
			$this->db->from('TURMA');
			$this->db->join('TURMA_has_ALUNO', 'TURMA.idTURMA = TURMA_has_ALUNO.TURMA_idTURMA', 'right');
			$this->db->distinct();
			$data['TURMA'] = $this->db->get()->result();
			$data['url'] = base_url();
			$this->parser->parse('nota', $data);
		}
		
		public function notEditar($id, $ano){
			$this->db->select('TURMA_has_ALUNO.TURMA_idTURMA, TURMA_has_ALUNO.ALUNO_idALUNO, ALUNO.NOME, TURMA_has_ALUNO.TURMA_idTURMA, TURMA_has_ALUNO.ANO');
			$this->db->from('ALUNO');
			$this->db->join('TURMA_has_ALUNO', 'ALUNO.idALUNO = TURMA_has_ALUNO.ALUNO_idALUNO', 'inner');
			$this->db->where('TURMA_has_ALUNO.TURMA_idTURMA', $id);
			$this->db->where('TURMA_has_ALUNO.ANO', $ano);
			$data['TURMA_has_ALUNO'] = $this->db->get()->result();
			$data['url'] = base_url();
			$this->parser->parse('aEditor', $data);
		}
		
		public function nota(){
			$data['idALUNO'] = $this->input->post('txt_matricula');
			if(count($data['idALUNO']) != 12){
				$da['modal'] = "$(window).on('load',function(){
							  $('#erro-modal').modal('show');
							  });";
			}
			$da['modal'] = '';
			$da['url'] = base_url();
			$data['NOME'] = $this->input->post('txt_nome');
			$dat['TURMA_idTURMA'] = $this->input->post('Turma');
			$dat['ALUNO_idALUNO'] = $data['idALUNO'];
			$dat['ANO'] = $this->input->post('txt_ano');
			$this->db->insert('ALUNO', $data);
			$this->db->insert('TURMA_has_ALUNO', $dat);
			$this->parser->parse('aluno', $da);
		}
		
		public function aluEdit(){
			$this->db->select('TURMA.idTURMA, TURMA.SERIE, TURMA_has_ALUNO.ANO, TURMA.idCURSO');
			$this->db->from('TURMA');
			$this->db->join('TURMA_has_ALUNO', 'TURMA.idTURMA = TURMA_has_ALUNO.TURMA_idTURMA', 'right');
			$this->db->distinct();
			$data['TURMA'] = $this->db->get()->result();
			$data['url'] = base_url();
			$this->parser->parse('aEditar', $data);
		}
		
		public function aEdit($id, $ano){
			$this->db->select('TURMA_has_ALUNO.TURMA_idTURMA, TURMA_has_ALUNO.ALUNO_idALUNO, ALUNO.NOME, TURMA_has_ALUNO.TURMA_idTURMA, TURMA_has_ALUNO.ANO');
			$this->db->from('ALUNO');
			$this->db->join('TURMA_has_ALUNO', 'ALUNO.idALUNO = TURMA_has_ALUNO.ALUNO_idALUNO', 'inner');
			$this->db->where('TURMA_has_ALUNO.TURMA_idTURMA', $id);
			$this->db->where('TURMA_has_ALUNO.ANO', $ano);
			$data['TURMA_has_ALUNO'] = $this->db->get()->result();
			$data['url'] = base_url();
			$this->parser->parse('aEditor', $data);
		}
		
		public function aExcluir($id){
			$this->db->where('TURMA_has_ALUNO.ALUNO_idALUNO', $id);
			$this->db->delete('TURMA_has_ALUNO');
		}
		
	}




//form_dropdown([$name = ''[, $options = array()[, $selected = array()[, $extra = '']]]])
