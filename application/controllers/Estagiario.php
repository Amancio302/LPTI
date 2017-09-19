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
				redirect("Estagiario/aluCad");
			}
			
		}
		
		public function aluno2(){
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
				redirect("Estagiario/aEdit/".$dat['TURMA_idTURMA']."/".$dat['ANO']);
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
			$data['url'] = base_url();
			$this->db->select('MATERIA.idMATERIA, MATERIA.NOME, TURMA_has_MATERIA.TURMA_idTURMA, TURMA_has_MATERIA.MATERIA_idMATERIA, TURMA_has_MATERIA.ANO');
			$this->db->from('TURMA_has_MATERIA');
			$this->db->join('MATERIA', 'MATERIA.idMATERIA = TURMA_has_MATERIA.MATERIA_idMATERIA', 'right');
			$this->db->distinct();
			$this->db->where('TURMA_has_MATERIA.TURMA_idTURMA', $id);
			$this->db->where('TURMA_has_MATERIA.ANO', $ano);
			$data['materia'] = $this->db->get()->result();
			$this->parser->parse('notas', $data);
		}
		
		public function nota($id, $ano){
			$notas = explode(',', $this->input->post('txt_notas'));
			$materia = (string)$this->input->post('txt_materia');
			$bimestre = (string)$this->input->post('txt_bim');
			$this->db->select('TURMA_has_ALUNO.ALUNO_idALUNO, ALUNO.idALUNO, ALUNO.NOME');
			$this->db->from('TURMA_has_ALUNO');
			$this->db->join('ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO');
			$this->db->where('TURMA_idTURMA', $id);
			$this->db->order_by('ALUNO.NOME', 'ASC');
			$nomes = $this->db->get()->result();
			if(count($notas)==count($nomes)){
				foreach($notas as $x){
					foreach($x as $nota)
						$data['NOTA'] = $nota;
					foreach($nomes as $nome)
						$data['idALUNO'] = $nomes[0]->ALUNO_idALUNO;
					$data['idMATERIA'] = $materia;
					$data['BIMESTRE'] = $bimestre;
				}
				$this->db->insert('NOTA', $data);
				redirect('Estagiario/notEditar/'.$id.'/'.$ano);
			}
			else
				echo '<script type="text/javascript">alert("A quantidade de notas é diferente da quantidade de alunos");</script>';
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
		
		public function aExcluir($id, $turma, $ano){
			$this->db->where('TURMA_has_ALUNO.ALUNO_idALUNO', $id);
			$this->db->delete('TURMA_has_ALUNO');
			redirect("Estagiario/aEdit/".$turma."/".$ano);
		}
		
	}




//form_dropdown([$name = ''[, $options = array()[, $selected = array()[, $extra = '']]]])
