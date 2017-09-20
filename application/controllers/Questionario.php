<?php defined('BASEPATH') or exit('No direct script access allowed.');

    class Questionario extends CI_Controller {

        public function __construct() {
            parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('login')){
//				$this->load->view('login');
			}
        }

		public function index() {
			$data['msg'] = '';
			$data['modal'] = '';
			$data['url'] = base_url();
			$this->parser->parse('telaAdm', $data);
		}


		// Início de chamada de view
		
		
		public function v_cadastro() {
			$data['url'] = base_url();
			$this->parser->parse('Questionario/cadastro', $data);
		}
		
		
		public function v_listar() {
			$data['QUESTIONARIO'] = $this->db->get('QUESTIONARIO')->result();
			
			
			$data['url'] = base_url();
			$this->parser->parse('Questionario/listar', $data);
		}
		
		public function v_editar($id) {
			$this->db->where('idQUESTIONARIO', $id);
			$data['QUESTIONARIO'] = $this->db->get('QUESTIONARIO')->result();
			
			$this->db->where('idQUESTIONARIO', $id);
			$data['DIMENSAO'] = $this->db->get('DIMENSAO')->result();
			
			
			$data['url'] = base_url();
			
			$this->parser->parse('ajax', $data);
			$this->parser->parse('Questionario/editar', $data);
		}

		public function v_associar($id) {
			
			$this->db->select('CURSO.NOME, TURMA.SERIE, TURMA.idTURMA');
			$this->db->from('CURSO');
			$this->db->join('TURMA', 'CURSO.idCURSO=TURMA.idCURSO', 'inner');
			$this->db->distinct();
			$data['TURMA'] = $this->db->get()->result();
			
			$this->db->select('QUESTIONARIO.idQUESTIONARIO, QUESTIONARIO.NOME');
			$this->db->from('QUESTIONARIO');
			$this->db->where('idQUESTIONARIO', $id);
			$data['QUESTIONARIO'] = $this->db->get()->result();
			
			
			$data['url'] = base_url();
			$this->parser->parse('Questionario/associar', $data);
			
		}
		
		// Fim de chamada de view
		
		// Funções Frankestein©
		
		public function associacaoMUTQ($data) {

			$materia = $this->db->query("select MATERIA.idMATERIA FROM MATERIA INNER JOIN TURMA_has_MATERIA 
													ON TURMA_has_MATERIA.MATERIA_idMATERIA = MATERIA.idMATERIA 
													where TURMA_has_MATERIA.TURMA_idTURMA = " . $data['TURMA_idTURMA'])->result();
																			
			foreach ($materia as $m) {
				
				$usuario = $this->db->query("select MUT.USUARIO_idUSUARIO from MUT 
														INNER JOIN MATERIA ON MATERIA.idMATERIA = MUT.MATERIA_idMATERIA
														 where MUT.MATERIA_idMATERIA = " . $m->idMATERIA)->result();
														 
				foreach($usuario as $u) {
					
					$data['USUARIO_idUSUARIO'] = $u->USUARIO_idUSUARIO;
					$data['MATERIA_idMATERIA'] = $m->idMATERIA;
					
					$this->db->insert('MUT_has_QUESTIONARIO', $data);
									
				}
							
			}
															
		
		}	
		
		
		
		// Fim das funções Frankestein©	
		
		
		
		
		public function criar() {
		
			$data['NOME'] = $this->input->post('txt_nome');
			$this->db->insert('QUESTIONARIO', $data);
			$codigo = $this->db->query("SELECT idQUESTIONARIO from QUESTIONARIO ORDER BY idQUESTIONARIO desc limit 1")->result();
			
			foreach($codigo as $c) {
				$this->v_editar($c->idQUESTIONARIO);			
			}
			
			//$data['url'] = base_url();
			//$this->parser->parse('telaAdm', $data);
			

		}
        
        
        public function editarNome() {
		
			$idusu = $this->input->post('id');
			
			$data['NOME'] = $this->input->post('txt_nome');
			$this->db->where('idQUESTIONARIO', $idusu);
			
			$this->db->update('QUESTIONARIO', $data);

			$this->v_editar($idusu);

			
		}
		
		
		public function dimensao() {
		
			$idusu = $this->input->post('id');
			
			$data['idQUESTIONARIO'] = $idusu;
			$data['DESCRICAO'] = $this->input->post('txt_dimensao');
			$this->db->insert('DIMENSAO', $data);
			
			$this->v_editar($idusu);
		
			
		}
		
		public function excluir_dimensao($id) {
			
			
			
			$this->db->select('idDIMENSAO');
			$this->db->from('DIMENSAO');
			$this->db->where('idDIMENSAO', $id);
			
			if($this->db->delete('DIMENSAO')) {
				
				$data['url'] = base_url();
				$this->parser->parse('telaAdm', $data);
				redirect("Questionario/index");			
			
			} else {
				echo "Exclusão impossível";
			}
			
		}		
		
		
		public function inserirPergunta() {
		
			$idusu = $this->input->post('id');
			
		
			$data['PERGUNTA'] = $this->input->post('txt_pergunta');
		
			$item = $this->input->get_post('tipo');
			
			if(!empty($item)) {
				$qtd = count($item);
			}
			
			for ($i = 0; $i < $qtd; $i++) {
					print_r($item[$i]);
					$data['TIPO'] = $item[$i];
			}
			
			$item1 = $this->input->get_post('dimensao');
			
			if(!empty($item1)) {
				$qtd = count($item1);
			}
			
			for ($i = 0; $i < $qtd; $i++) {
					if(!empty($item1[$i])) {
						$data['idDIMENSAO'] = $item1[$i];
					}
			}
			
			$this->db->insert('PERGUNTA', $data);
			
			$this->v_editar($idusu);
		
	
			
		}
        
		public function associar() {
			
			$data['QUESTIONARIO_idQUESTIONARIO'] = $this->input->post('idQUESTIONARIO');
			$item = $this->input->get_post('turma');
			if(!empty($item)) {
				$qtd = count($item);
			}
			
			for ($i = 0; $i < $qtd; $i++) {
					if(!empty($item[$i])) {
						$data['TURMA_idTURMA'] = $item[$i];
						$this->db->insert('QUESTIONARIO_has_TURMA', $data);
						$this->associacaoMUTQ($data);		
					}
			}			
			
			
			
		}

		public function excluirPergunta($idQ, $idP) {
			
			$this->db->select('idPERGUNTA');
			$this->db->from('PERGUNTA');
			$this->db->where('idPERGUNTA', $idP);
			
			if($this->db->delete('PERGUNTA')) {
				$this->v_editar($idQ);
			} else {
				echo "Exclusão impossibilitada";
			}
			
		}


    }
