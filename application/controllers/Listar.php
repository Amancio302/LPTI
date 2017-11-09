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
			$this->db->order_by('PARAMETRO_DE_RISCO.NOTA', 'ASC');
			$nota = $this->db->get()->result();
			
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
			$this->db->order_by('PARAMETRO_DE_RISCO.NOTA', 'ASC');
			$freq = $this->db->get()->result();
			
			$parametros['NOTA'] = $nota[0];
			$parametros['FREQUENCIA'] = $freq[0];
			
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
				
				//Encontrar todas as frequencias para aquele aluno
				$this->db->select('
									FREQUENCIA.FALTAS, FREQUENCIA.idALUNO, TURMA_has_ALUNO.TURMA_idTURMA, 
									ALUNO.idALUNO, MATERIA.idMATERIA, FREQUENCIA.idFREQUENCIA, FREQUENCIA.BIMESTRE
								 ');
				$this->db->from('FREQUENCIA');
				$this->db->join('TURMA_has_ALUNO', 'FREQUENCIA.idALUNO = TURMA_has_ALUNO.ALUNO_idALUNO', 'inner');
				$this->db->join('ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO', 'inner');
				$this->db->join('MATERIA', 'MATERIA.idMATERIA = FREQUENCIA.idMATERIA', 'inner');
				$this->db->where('FREQUENCIA.idALUNO', $turma_has_aluno->idALUNO);
				$data['TURMA_has_FREQUENCIA'] = $this->db->get()->result();
				//Frequencias encontrados
				
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
				
				foreach($data['TURMA_has_FREQUENCIA'] as $turma_has_frequencia){
					$somaFreq[$turma_has_frequencia->idMATERIA][1] = 0;
					$mediaFreq[$turma_has_frequencia->idMATERIA][1] = 0;
					$somaFreq[$turma_has_frequencia->idMATERIA][2] = 0;
					$mediaFreq[$turma_has_frequencia->idMATERIA][2] = 0;
					$somaFreq[$turma_has_frequencia->idMATERIA][3] = 0;
					$mediaFreq[$turma_has_frequencia->idMATERIA][3] = 0;
					$somaFreq[$turma_has_frequencia->idMATERIA][4] = 0;
					$mediaFreq[$turma_has_frequencia->idMATERIA][4] = 0;
				}
				//Contador zerado
				
				$bimestre = 0;
				
				//Soma as notas de mesma matéria
				foreach($data['TURMA_has_NOTA'] as &$turma_has_nota){
					$soma[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] += $turma_has_nota->NOTA;
					$media[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE]++;
				}
				//Notas somadas
				
				//Soma as frequencias de mesma materia
				foreach($data['TURMA_has_FREQUENCIA'] as &$turma_has_frequencia){
					$somaFreq[$turma_has_frequencia->idMATERIA][$turma_has_frequencia->BIMESTRE] += $turma_has_frequencia->FALTAS;
					$mediaFreq[$turma_has_frequencia->idMATERIA][$turma_has_frequencia->BIMESTRE]++;
				}
				//Frequencias somadas
				
				//Média das notas
				foreach($data['TURMA_has_NOTA'] as &$turma_has_nota){
					//echo "Soma:" . $soma[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] .br();
					$soma[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] /= $media[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE];
					//echo "Média: " . $media[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] . br();
					$media[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] = 1;
				}
				
				//Média feita
				
				//Média das frequencias
				foreach($data['TURMA_has_FREQUENCIA'] as &$turma_has_frequencia){
					//echo "Soma:" . $soma[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] .br();
					$somaFreq[$turma_has_frequencia->idMATERIA][$turma_has_frequencia->BIMESTRE] /= $mediaFreq[$turma_has_frequencia->idMATERIA][$turma_has_frequencia->BIMESTRE];
					//echo "Média: " . $media[$turma_has_nota->idMATERIA][$turma_has_nota->BIMESTRE] . br();
					$mediaFreq[$turma_has_frequencia->idMATERIA][$turma_has_frequencia->BIMESTRE] = 1;
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
						if(($somas[4] != 0)and($somas[4] <= ($parametro->NOTA*30/100)))
							$CONTADOR[4]++;
						else if(($somas[3] != 0)and($somas[3] <= ($parametro->NOTA*20/100)))
							$CONTADOR[3]++;
						else if(($somas[2] != 0)and($somas[2] <= ($parametro->NOTA*30/100)))
							$CONTADOR[2]++;
						else if(($somas[1] != 0)and($somas[1] <= ($parametro->NOTA*20/100))){
							$CONTADOR[1]++;
							//echo 'Add nota'.br();
						}
					}
					//Soma checada
					
					//Checar se a frequencia é menor do que a frequencia mínima
					foreach($somaFreq as &$somas){
						//echo "Somas: ".br();
						//print_r($somas);
						//echo br()."NOTA: ".$parametro->NOTA.br();
						if(($somas[4] != 0)and($somas[4] <= ($parametro->FREQUENCIA)))
							$CONTADOR[4]++;
						else if(($somas[3] != 0)and($somas[3] <= ($parametro->FREQUENCIA)))
							$CONTADOR[3]++;
						else if(($somas[2] != 0)and($somas[2] <= ($parametro->FREQUENCIA)))
							$CONTADOR[2]++;
						else if(($somas[1] != 0)and($somas[1] <= ($parametro->FREQUENCIA))){
							$CONTADOR[1]++;
							//echo 'Add freq'.br();
						}
					}
					//echo "Soma notas: ".br();
					//print_r($soma);
					//echo br();
					//echo "Parametro Nota: " . $parametro->NOTA .br();
					//echo "Soma freq: ".br();
					//print_r($soma);
					//echo br();
					//echo "Parametro Freq: " . $parametro->NOTA .br();
					//echo br().'CONTADOR: ';
					//print_r($CONTADOR);
					//echo br();
					//Frequencia checada
					
				}
				
				//Checar se as matérias com nota vermelha estão no limite
				//print_r($CONTADOR);
				//echo br();
				
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
			$dat['Tipo'] = $this->session->userdata('tipo');
			if($this->session->userdata('tipo') == 0)
				$this->parser->parse('ajax', $data);
			else
				$this->parser->parse('ajaxCoord', $dat);
            $this->parser->parse("listar", $data);
        }
        
        public function alunoChamada($id){
			$data['Tipo'] = $this->session->userdata('tipo');
			$data['url'] = base_url();
			//Seleciona o aluno
			
			$this->db->select('ALUNO.idALUNO, ALUNO.NOME AS ALUNO_NOME, TURMA.idTURMA, TURMA.SERIE, CURSO.NOME AS CURSO_NOME, CURSO.MODALIDADE');
			$this->db->from('ALUNO');
			$this->db->join('TURMA_has_ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO', 'inner');
			$this->db->join('TURMA', 'TURMA.idTURMA = TURMA_has_ALUNO.TURMA_idTURMA', 'inner');
			$this->db->join('CURSO', 'CURSO.idCURSO = TURMA.idCURSO', 'inner');
			$this->db->where('ALUNO.idALUNO', $id);
			$aluno = $this->db->get()->result();
			
			//Aluno selecionado
			
			//Seleciona as materias
			
			$this->db->select('MATERIA.idMATERIA, MATERIA.NOME, TURMA_has_MATERIA.TURMA_idTURMA, TURMA_has_MATERIA.MATERIA_idMATERIA, TURMA_has_MATERIA.ANO');
			$this->db->from('MATERIA');
			$this->db->join('TURMA_has_MATERIA', 'TURMA_has_MATERIA.MATERIA_idMATERIA = MATERIA.idMATERIA', 'inner');
			$this->db->where('TURMA_has_MATERIA.TURMA_idTURMA', $aluno[0]->idTURMA);
			$data['materias'] = $this->db->get()->result();
			//Materias selecionadas
			
			foreach($data['materias'] as $materia){
				$somaNot[$materia->idMATERIA][1] = 0;
				$somaNot[$materia->idMATERIA][2] = 0;
				$somaNot[$materia->idMATERIA][3] = 0;
				$somaNot[$materia->idMATERIA][4] = 0;
				$somaFre[$materia->idMATERIA][1] = 0;
				$somaFre[$materia->idMATERIA][2] = 0;
				$somaFre[$materia->idMATERIA][3] = 0;
				$somaFre[$materia->idMATERIA][4] = 0;
			}
			
			//Selecionar as notas
			
				$this->db->select('NOTA.idALUNO, NOTA.idMATERIA, NOTA.NOTA, NOTA.BIMESTRE');
				$this->db->from('NOTA');
				$this->db->where('NOTA.idALUNO', $aluno[0]->idALUNO);
				$notas = $this->db->get()->result();
				
			//Notas selecionadas
			
			
			//Soma das notas
			
			foreach($notas as $nota){
				$somaNot[$nota->idMATERIA][$nota->BIMESTRE] += $nota->NOTA;
			}
			$i=0;
			foreach($somaNot as $soma)
				$somaNota[$i] = $soma;
			
			//Notas somadas
			
			//Selecionar as frequencias
			
			$this->db->select('FREQUENCIA.idALUNO, FREQUENCIA.idMATERIA, FREQUENCIA.FALTAS, FREQUENCIA.BIMESTRE');
			$this->db->from('FREQUENCIA');
			$this->db->where('FREQUENCIA.idALUNO', $aluno[0]->idALUNO);
			$frequencias = $this->db->get()->result();
			
			//Frequencias selecionadas
			
			//Somar as frequencias
			
			foreach($frequencias as $frequencia){
				$somaFre[$frequencia->idMATERIA][$frequencia->BIMESTRE] += $frequencia->FALTAS;
			}
			$i=0;
			foreach($somaFre as $soma)
				$somaFreq[$i] = $soma;
			
			//Frequencias somadas
			
			$this->db->select('PARAMETRO_DE_RISCO.NOTA, PARAMETRO_DE_RISCO.idTURMA');
			$this->db->from('PARAMETRO_DE_RISCO');
			$this->db->where('PARAMETRO_DE_RISCO.idTURMA', $aluno[0]->idTURMA);
			$this->db->order_by('PARAMETRO_DE_RISCO.NOTA', 'ASC');
			$parametroNota = $this->db->get()->result();
			
			$this->db->select('PARAMETRO_DE_RISCO.FREQUENCIA, PARAMETRO_DE_RISCO.idTURMA');
			$this->db->from('PARAMETRO_DE_RISCO');
			$this->db->where('PARAMETRO_DE_RISCO.idTURMA', $aluno[0]->idTURMA);
			$this->db->order_by('PARAMETRO_DE_RISCO.FREQUENCIA', 'ASC');
			$parametroFreq = $this->db->get()->result();
			
			//print_r($aluno[0]);
			
			$data['aluno_nome'] = $aluno[0]->ALUNO_NOME;
			$data['matricula'] = $aluno[0]->idALUNO;
			$data['serie'] = $aluno[0]->SERIE;
			$data['curso_nome'] = $aluno[0]->CURSO_NOME;
			if($aluno[0]->MODALIDADE == 1)
				$data['modalidade'] = 'Integrado';
			else
				$data['modalidade'] = 'Modalidade';
			
			$i = 0;
			//echo "Teste: ".br();
			//print_r($somaNota);
			echo br();
			foreach($somaNota as $somaNotas){
				$data['notas'][$i] = $somaNotas;
				if($somaNotas <= $parametroNota[0]->NOTA)
					$data['situacao'][$i] = 'danger';
				else
					$data['situacao'][$i] = 'all-right';
				$i++;
			}
			
			foreach($somaFreq as $somaFreqs){
				$data['freq'] = $somaFreqs;
				if($somaFreqs <= $parametroFreq[0]->FREQUENCIA)
					$data['situacao'][$i] = 'danger';
				else
					$data['situacao'][$i] = 'all-right';
				$i++;
			}
			
		//	print_r($data['aluno']);
	//		echo br();
//			print_r($data['materias']);
			//echo br()." vc: ";
		//	print_r($data['notas']);
	//		echo br();
//			print_r($data['freq']);
			//echo br();
			//print_r($data['situacao']);
			//echo br();
			
			$data['aluno'] = null;
			
			if($this->session->userdata('tipo') == 0){
				$this->parser->parse('ajax', $data);
				$this->parser->parse('mostraAlunoRoot', $data);
			}
			else{
				$data['tipo'] = $this->session->userdata('tipo');
				$this->parser->parse('ajaxCoord', $data);
				$this->parser->parse('mostraAluno', $data);
			}
		}

    }
