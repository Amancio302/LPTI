<?php

    class Materia extends CI_Controller {


        public function __construct() {
            parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('login')){
//				$this->load->view('login');
			}
        }

		public function index() {
			$data['url'] = base_url();
			$this->parser->parse('telaAdm', $data);
		}

		
		// Início de chamada de view



		public function v_cadastrar_materias(){
			$data['TURMA'] = $this->db->get('TURMA')->result();
			$data['url'] = base_url();
			$this->parser->parse('Materia/cadastro_materias', $data);
		}

		public function cadastro_materias(){
			$data['NOME'] = $this->input->post('txt_materia');
			$data['QTD_AULAS'] = $this->input->post('txt_qtd');
			$this->db->insert('MATERIA', $data);
			
			$data['url'] = base_url();
			$this->parser->parse('telaAdm', $data);
		}
		
		
		public function v_listar_materias(){
			$data['MATERIA'] = $this->db->get('MATERIA')->result();
			$data['url'] = base_url();
			$this->parser->parse('Materia/listar_materias', $data);
		}
		
		public function v_editar($id) {
			$this->db->where('idMATERIA', $id);
			$data['MATERIA'] = $this->db->get('MATERIA')->result();
			$data['url'] = base_url();
			$this->parser->parse('Materia/editar_materias', $data);
		}
		
		public function v_associar_materias() {
			$data['MATERIA'] = $this->db->get('MATERIA')->result();
			
			$data['url'] = base_url();
			$this->parser->parse('Materia/listar_materiasII', $data);
		}
		
		public function v_associar($id) {
			$this->db->where('idMATERIA', $id);
			$data['MATERIA'] = $this->db->get('MATERIA')->result();
			$data['url'] = base_url();
			$this->parser->parse('Materia/associar_materias', $data);
		}
		
		// Fim de chamada de view
		
		
		
		public function editar() {

			$data['NOME'] = $this->input->post('txt_nome');
			$data['QTD_AULAS'] = $this->input->post('txt_qtd');

			$this->db->where('idMATERIA', $this->input->post('idMATERIA'));

			$this->db->update('MATERIA', $data);
			$data['url'] = base_url();
			$this->parser->parse('telaAdm', $data);
		}
		
		
		public function associar() {
			
			$data['MATERIA_idMATERIA'] = $this->input->post('idMATERIA');
			$data['ANO'] = $this->input->post('txt_ano');
			$item = $this->input->get_post('turma');
			if(!empty($item)) {
				$qtd = count($item);
			}
			
			for ($i = 0; $i < $qtd; $i++) {
					if(!empty($item[$i])) {
						$data['TURMA_idTURMA'] = $item[$i];
						$this->db->insert('TURMA_has_MATERIA', $data);
					}
			}
			
			$data['url'] = base_url();
			$this->parser->parse('telaAdm', $data);
			
		}
		
		


    }
