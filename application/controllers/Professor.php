<?php defined('BASEPATH') or exit('No direct script access allowed.');

class Professor extends CI_Controller {
    
        public function __construct() {
            parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('login')){
//				$this->load->view('login');
			}
        }

		public function index() {
			$data['url'] = base_url();
			$this->parser->parse('telaProf', $data);
		}
		
		// Início de chamada de view

		public function v_listar($id) {

			$this->db->select('TURMA.idTURMA, TURMA.SERIE, CURSO.NOME');
			$this->db->from('TURMA');
			$this->db->join('CURSO', 'TURMA.idCURSO = CURSO.idCURSO', 'inner');
			$this->db->join('MUT', 'MUT.TURMA_idTURMA = TURMA.idTURMA', 'inner');
			$this->db->where('MUT.USUARIO_idUSUARIO', $id);
			$this->db->distinct();		
			$data['TURMA'] = $this->db->get()->result();

			$data['url'] = base_url();
			$data['idUSUARIO'] = $id;

			$this->parser->parse('Professor/listar', $data);
			
		}
		
		public function v_disciplina($idUSUARIO, $idTURMA) {

			$this->db->select('TURMA.SERIE, CURSO.NOME');
			$this->db->from('TURMA');
			$this->db->join('CURSO', 'CURSO.idCURSO = TURMA.idCURSO', 'inner');
			$this->db->where('TURMA.idTURMA', $idTURMA);
			$data['INN'] = $this->db->get()->result();



			$this->db->select('MUT.TURMA_idTURMA, MUT.MATERIA_idMATERIA, MATERIA.NOME');
			$this->db->from('MUT');
			$this->db->join('TURMA', 'TURMA.idTURMA = MUT.TURMA_idTURMA','inner');
			$this->db->join('MATERIA', 'MATERIA.idMATERIA = MUT.MATERIA_idMATERIA','inner');
			$this->db->where('MUT.USUARIO_idUSUARIO', $idUSUARIO);
			$this->db->where('MUT.TURMA_idTURMA', $idTURMA);
			
			$data['MATERIA'] = $this->db->get()->result();
			$data['idUSUARIO'] = $idUSUARIO;
			$data['idTURMA'] = $idTURMA;
				
			$data['url'] = base_url();
			$this->parser->parse('Professor/disciplina', $data);			
		}

		// Fim de chamada de view


}
