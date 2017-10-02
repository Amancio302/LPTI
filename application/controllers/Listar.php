<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Listar extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            if(!$this->session->userdata('login')){
                    $this->load->view('login');
            }
        }

        public function listar($id, $curso, $mod){
			//Encontra os parâmetros de risco para aquela turma
			$this->db->select('*');
			$this->db->from('PARAMETRO_DE_RISCO');
			if($id != 0)
				$this->db->where('PARAMETRO_DE_RISCO.idTURMA', $id);
			else if(($mod != 0) and ($curso == 0)){
				$x = $this->db->like('PARAMETRO_DE_RISCO.idTURMA', $this->session->userdata('tipo'), 'after');
				if($mod ==1)
					$this->db->like('PARAMETRO_DE_RISCO.idTURMA', $x, 'after');
				else{
					$x += 3;
					$this->db->like('PARAMETRO_DE_RISCO.idTURMA', $x, 'after');
				}
			}
			else if($curso!= 0){
				$this->db->like('PARAMETRO_DE_RISCO.idTURMA', $curso, 'before');
			}
			$parametros = $this->db->get()->result();
			//Parâmetros de risco encontrados
			
			//Encontra os alunos para aquela turma
			$this->db->select('ALUNO.NOME AS NOME_ALUNO, ALUNO.idALUNO, TURMA_has_ALUNO.ANO, TURMA.idCURSO, CURSO.idCURSO, TURMA.SERIE, TURMA.MODALIDADE, MODALIDADE.idMODALIDADE, MODALIDADE.MODALIDADE, CURSO.NOME AS NOME_CURSO');
			$this->db->from('ALUNO');
			$this->db->join('TURMA_has_ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO', 'inner');
			$this->db->join('TURMA', 'TURMA.idTURMA = TURMA_has_ALUNO.TURMA_idTURMA', 'inner');
			$this->db->join('CURSO', 'CURSO.idCURSO = TURMA.idCURSO', 'inner');
			$this->db->join('MODALIDADE', 'CURSO.MODALIDADE = MODALIDADE.idMODALIDADE', 'inner');
			$ano = date("Y");
			if($id !=0)
				$this->db->where('TURMA.idTURMA', $id);
			else if($mod !=0 && $curso == 0)
				$this->db->where('CURSO.MODALIDADE', $mod);
			else if($curso != 0){
				$this->db->where('CURSO.MODALIDADE', $mod);
				$this->db->like('TURMA.idTURMA', $curso, 'after');
			}
			$this->db->where('TURMA_has_ALUNO.ANO', $ano);
			$data['TURMA_has_ALUNO'] = $this->db->get()->result();
			//Alunos encontrados
			
			foreach($data['TURMA_has_ALUNO'] as &$turma_has_aluno){
				//print_r($turma_has_aluno);
				//echo br();
				$turma_has_aluno->SITUACAO = 0;
				
				//Encontra todas as notas para aquele aluno
				$this->db->select('
									NOTA.NOTA, NOTA.idALUNO, TURMA_has_ALUNO.TURMA_idTURMA, 
									ALUNO.idALUNO, MATERIA.idMATERIA, NOTA.idNOTA, NOTA.BIMESTRE
								 ');
				$this->db->from('NOTA');
				$this->db->join('TURMA_has_ALUNO', 'NOTA.idALUNO = TURMA_has_ALUNO.ALUNO_idALUNO', 'inner');
				$this->db->join('ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO', 'inner');
				$this->db->join('MATERIA', 'MATERIA.idMATERIA = NOTA.idMATERIA', 'inner');
				$this->db->where('NOTA.idALUNO', $turma_has_aluno->idALUNO);
				$data['TURMA_has_NOTA'] = $this->db->get()->result();
				//Notas encontradas
				
				//Zerar o contador da soma
				foreach($data['TURMA_has_NOTA'] as $turma_has_nota){
					$soma[$turma_has_nota->idMATERIA][1] = 0;
					$media[$turma_has_nota->idMATERIA][1] = 0;
					$soma[$turma_has_nota->idMATERIA][2] = 0;
					$media[$turma_has_nota->idMATERIA][2] = 0;
					$soma[$turma_has_nota->idMATERIA][3] = 0;
					$media[$turma_has_nota->idMATERIA][3] = 0;
					$soma[$turma_has_nota->idMATERIA][4] = 0;
					$media[$turma_has_nota->idMATERIA][4] = 0;
				}
				//Contador zerado
				
				$bimestre = 0;
				
				//Soma as notas de mesma matéria
				foreach($data['TURMA_has_NOTA'] as &$turma_has_nota){
					$soma[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] += $turma_has_nota->NOTA;
					$media[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE]++;
				}
				//Notas somadas
				
				//Média das notas
				foreach($data['TURMA_has_NOTA'] as &$turma_has_nota){
					//echo "Soma:" . $soma[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] .br();
					$soma[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] /= $media[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE];
					//echo "Média: " . $media[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] . br();
					$media[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] = 1;
				}
				//Média feita
				//echo "Soma/Média: ".br();
				//print_r($soma);
				//echo br();
				
				foreach($parametros as &$parametro){
					$CONTADOR[1] = 0;
					$CONTADOR[2] = 0;
					$CONTADOR[3] = 0;
					$CONTADOR[4] = 0;
					
					//Checar se a soma é menor do que a nota mínima
					foreach($soma as &$somas){
						//echo "Somas: ".br();
						//print_r($somas);
						//echo br()."NOTA: ".$parametro->NOTA.br();
						if(($somas[4] != 0)and($somas[4] <= ($parametro->NOTA*20/100)))
							$CONTADOR[4]++;
						else if(($somas[3] != 0)and($somas[3] <= ($parametro->NOTA*20/100)))
							$CONTADOR[3]++;
						else if(($somas[2] != 0)and($somas[2] <= ($parametro->NOTA*30/100)))
							$CONTADOR[2]++;
						else if(($somas[1] != 0)and($somas[1] <= ($parametro->NOTA*20/100)))
							$CONTADOR[1]++;
					}
					//Soma checada
					
				}
				
				//Checar se as matérias com nota vermelha estão no limite
				if($CONTADOR[4] >= $parametro->MATERIAS){
					if($turma_has_aluno->SITUACAO == 0){
						$turma_has_aluno->SITUACAO = 'danger 4B';
					}    
				}
				else if($CONTADOR[3] >= $parametro->MATERIAS){
					if($turma_has_aluno->SITUACAO == 0){
						$turma_has_aluno->SITUACAO = 'danger 3B';
					}    
				}
				else if($CONTADOR[2] >= $parametro->MATERIAS){
					if($turma_has_aluno->SITUACAO == 0){
						$turma_has_aluno->SITUACAO = 'danger 2B';
					}    
				}
				else if($CONTADOR[1] >= $parametro->MATERIAS){
					if($turma_has_aluno->SITUACAO == 0){
						$turma_has_aluno->SITUACAO = 'danger 1B';
					}    
				}
				else
					$turma_has_aluno->SITUACAO = 'all-right';
					
				//echo "SITUACAO: " . $turma_has_aluno->SITUACAO .br();
				//Matérias checadas
			}
            $this->parser->parse("listar", $data);
        }

    }
