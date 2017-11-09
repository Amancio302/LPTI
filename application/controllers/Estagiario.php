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
            $this->parser->parse('ajaxEst', $data);
            $this->parser->parse('Estagiario/aluno', $data);
        }

        public function aluCadMassa(){
            $data['url'] = base_url();
            $this->parser->parse('ajaxEst', $data);
            $this->parser->parse('Estagiario/alunomassa', $data);
        }


        public function aluno(){
            $data['idALUNO'] = $this->input->post('txt_matricula');
            $data['NOME'] = $this->input->post('txt_nome');
            $dat['TURMA_idTURMA'] = $this->input->post('Turma');
            $dat['ALUNO_idALUNO'] = $data['idALUNO'];
            $dat['ANO'] = $this->input->post('txt_ano');
            $this->db->from('ALUNO');
            $this->db->where('ALUNO.idALUNO', $data['idALUNO']);
            $x = $this->db->get()->result();
            $x = count($x);
            if(($data['idALUNO'] <= 100000000000) or ($data['NOME'] == "") or ($dat['TURMA_idTURMA'] == "") or ($dat['ANO'] == "")){
                echo '<script type="text/javascript">alert("Matrícula inválida");
						location.href = "http://localhost/LPTI/Estagiario/aluCad/";</script>';
            }
            else if($x != 0){
				echo '<script type="text/javascript">alert("Essa matrícula já existe");
						location.href = "http://localhost/LPTI/Estagiario/aluCad/";</script>';
			}
            else{
                $da['modal'] = " ";
                $this->db->insert('ALUNO', $data);
                $this->db->insert('TURMA_has_ALUNO', $dat);
                redirect("Estagiario/aluCad");
            }

        }

        public function alunomassa(){
            $alunos = $this->input->post('txt_texto');
            $data['TURMA_idTURMA'] = $this->input->post('Turma');
            $data['ANO'] = $this->input->post('txt_ano');

            $aluno = explode(";", $alunos);

            foreach ($aluno as $a) {

                $divorcio = explode(":", $a);

                $dat['idALUNO'] = $divorcio[0];
                $dat['NOME'] = $divorcio[1];
                $data['ALUNO_idALUNO'] = $dat['idALUNO'];

                if(($dat['idALUNO'] <= 100000000000) or ($dat['NOME'] == "") or ($data['TURMA_idTURMA'] == "") or ($data['ANO'] == "")){
                    $da['modal'] = "$(window).on('load',function(){
                          $('#erro-modal').modal('show');
                          });";
                    $da['url'] = base_url();
                    $this->parser->parse('aluno', $da);
                }else{
                    $da['modal'] = " ";
                    $this->db->insert('ALUNO', $dat);
                    $this->db->insert('TURMA_has_ALUNO', $data);
                }
            }

            redirect("Login/loginAsEst");

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
            $this->parser->parse('ajaxEst', $data);
            $this->parser->parse('Estagiario/nota', $data);
        }

        public function notInsert($id, $ano){
            $data['url'] = base_url();
            $this->db->select('MATERIA.idMATERIA, MATERIA.NOME, TURMA_has_MATERIA.TURMA_idTURMA, TURMA_has_MATERIA.MATERIA_idMATERIA, TURMA_has_MATERIA.ANO');
            $this->db->from('TURMA_has_MATERIA');
            $this->db->join('MATERIA', 'MATERIA.idMATERIA = TURMA_has_MATERIA.MATERIA_idMATERIA', 'right');
            $this->db->distinct();
            $this->db->where('TURMA_has_MATERIA.TURMA_idTURMA', $id);
            $this->db->where('TURMA_has_MATERIA.ANO', $ano);
            $data['materia'] = $this->db->get()->result();
            if(count($data['materia']) == 0){
                echo '<script type="text/javascript">alert("Não há matérias cadastradas");</script>';
                $this->notCad();
            }
            else{
				$this->parser->parse('ajaxEst', $data);
                $this->parser->parse('Estagiario/notas', $data);
            }
        }

        public function nota($id, $ano){
            $notas = explode(':', $this->input->post('txt_notas'));
            for($i = 0; $i < count($notas); $i++)
				$notas[$i] = trim($notas[$i]);
            $materia = (string)$this->input->post('txt_materia');
            $bimestre = (string)$this->input->post('txt_bim');
            $this->db->select('TURMA_has_ALUNO.ALUNO_idALUNO, ALUNO.idALUNO, ALUNO.NOME');
            $this->db->from('TURMA_has_ALUNO');
            $this->db->join('ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO');
            $this->db->where('TURMA_idTURMA', $id);
            $this->db->order_by('ALUNO.NOME', 'ASC');
            $nomes = $this->db->get()->result();
            if((count($notas)-1)==count($nomes)){
                for($i = 0; $i<(count($notas)-1); $i++){
                    $data['NOTA'] = $notas[$i];
                    $data['idALUNO'] = $nomes[$i]->ALUNO_idALUNO;
                    $data['idMATERIA'] = $materia;
                    $data['BIMESTRE'] = $bimestre;
                    $this->db->insert('NOTA', $data);
                }
                redirect('Estagiario/notInsert/'.$id.'/'.$ano);
            }
            else{
                echo '<script type="text/javascript">alert("A quantidade de notas é diferente da quantidade de alunos");
						location.href = "http://localhost/LPTI/Estagiario/notInsert/' .$id . '/' . $ano. '";</script>';
            }
        }

        public function aluEdit(){
            $this->db->select('TURMA.idTURMA, TURMA.SERIE, TURMA_has_ALUNO.ANO, TURMA.idCURSO');
            $this->db->from('TURMA');
            $this->db->join('TURMA_has_ALUNO', 'TURMA.idTURMA = TURMA_has_ALUNO.TURMA_idTURMA', 'right');
            $this->db->distinct();
            $data['TURMA'] = $this->db->get()->result();
            $data['url'] = base_url();
            $this->parser->parse('ajaxEst', $data);
            $this->parser->parse('Estagiario/aEditar', $data);
        }

        public function aEdit($id, $ano){
            $this->db->select('TURMA_has_ALUNO.TURMA_idTURMA, TURMA_has_ALUNO.ALUNO_idALUNO, ALUNO.NOME, TURMA_has_ALUNO.TURMA_idTURMA, TURMA_has_ALUNO.ANO');
            $this->db->from('ALUNO');
            $this->db->join('TURMA_has_ALUNO', 'ALUNO.idALUNO = TURMA_has_ALUNO.ALUNO_idALUNO', 'inner');
            $this->db->where('TURMA_has_ALUNO.TURMA_idTURMA', $id);
            $this->db->where('TURMA_has_ALUNO.ANO', $ano);
            $data['TURMA_has_ALUNO'] = $this->db->get()->result();
            $data['url'] = base_url();
            $this->parser->parse('ajaxEst', $data);
            $this->parser->parse('Estagiario/aEditor', $data);
        }

        public function aExcluir($id, $turma, $ano){
            $this->db->where('TURMA_has_ALUNO.ALUNO_idALUNO', $id);
            $this->db->delete('TURMA_has_ALUNO');
            redirect("Estagiario/aEdit/".$turma."/".$ano);
        }

    public function freqCad(){
            $this->db->select('TURMA.idTURMA, TURMA.SERIE, TURMA_has_ALUNO.ANO, TURMA.idCURSO');
            $this->db->from('TURMA');
            $this->db->join('TURMA_has_ALUNO', 'TURMA.idTURMA = TURMA_has_ALUNO.TURMA_idTURMA', 'right');
            $this->db->distinct();
            $data['TURMA'] = $this->db->get()->result();
            $data['url'] = base_url();
            $this->parser->parse('ajaxEst', $data);
            $this->parser->parse('Estagiario/freq', $data);
        }

        public function freqInsert($id, $ano){
            $this->db->select('MATERIA.idMATERIA, MATERIA.NOME, TURMA_has_MATERIA.TURMA_idTURMA, TURMA_has_MATERIA.MATERIA_idMATERIA, TURMA_has_MATERIA.ANO');
            $this->db->from('TURMA_has_MATERIA');
            $this->db->join('MATERIA', 'MATERIA.idMATERIA = TURMA_has_MATERIA.MATERIA_idMATERIA', 'right');
            $this->db->distinct();
            $this->db->where('TURMA_has_MATERIA.TURMA_idTURMA', $id);
            $this->db->where('TURMA_has_MATERIA.ANO', $ano);
            $data['materia'] = $this->db->get()->result();
            $data['url'] = base_url();
            if(count($data['materia']) == 0){
                echo '<script type="text/javascript">alert("Não há matérias cadastradas");</script>';
                $this->freqCad();
            }
            else{
				$this->parser->parse('ajaxEst', $data);
				$this->parser->parse('Estagiario/freqs', $data);
			}
        }

        public function freq($id, $ano){
            $freq = explode(':', $this->input->post('txt_freq'));
            for($i = 0; $i < count($freq); $i++){
				$freq[$i] = trim($freq[$i]);
				echo $freq[$i] .br();
			}
            $materia = (string)$this->input->post('txt_materia');
            $bimestre = (string)$this->input->post('txt_bim');
            $this->db->select('TURMA_has_ALUNO.ALUNO_idALUNO, ALUNO.idALUNO, ALUNO.NOME');
            $this->db->from('TURMA_has_ALUNO');
            $this->db->join('ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO');
            $this->db->where('TURMA_has_ALUNO.TURMA_idTURMA', $id);
            $this->db->where('TURMA_has_ALUNO.ANO', $ano);
            $this->db->order_by('ALUNO.NOME', 'ASC');
            $nomes = $this->db->get()->result();
            for($i = 0; $i < count($nomes); $i++){
				echo $nomes[$i]->NOME .br();
			}
            if((count($freq)-1)==count($nomes)){
                for($i = 0; $i<(count($freq)-1); $i++){
                    $data['FALTAS'] = $freq[$i];
                    $data['idALUNO'] = $nomes[$i]->ALUNO_idALUNO;
                    $data['idMATERIA'] = $materia;
                    $data['BIMESTRE'] = $bimestre;
                    echo $this->db->insert('FREQUENCIA', $data);
                    echo $i.br();
                }
                redirect('Estagiario/freqInsert/'.$id.'/'.$ano);
            }
            else{
                echo '<script type="text/javascript">alert("A quantidade de freqências é diferente da quantidade de alunos");
						location.href = "http://localhost/LPTI/Estagiario/freqInsert/' .$id . '/' . $ano. '";</script>';
            }
    }

    public function notEdit(){
        $this->db->select('TURMA.idTURMA, TURMA.SERIE, TURMA_has_ALUNO.ANO, TURMA.idCURSO');
        $this->db->from('TURMA');
        $this->db->join('TURMA_has_ALUNO', 'TURMA.idTURMA = TURMA_has_ALUNO.TURMA_idTURMA', 'right');
        $this->db->distinct();
        $data['TURMA'] = $this->db->get()->result();
        $data['url'] = base_url();
        $this->parser->parse('ajaxEst', $data);
        $this->parser->parse('Estagiario/notEdit', $data);
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
        $data['id'] = $id;
        $data['ano'] = $ano;
        if(count($data['materia']) == 0){
            echo '<script type="text/javascript">alert("Não há matérias cadastradas");</script>';
            $this->notEdit();
        }
        else{
			$this->parser->parse('ajaxEst', $data);
            $this->parser->parse('Estagiario/notEditar', $data);
		}
    }

    public function notMatEditar($id, $ano){
        
        //SELECIONA ALUNO
        
        $this->db->select('ALUNO.NOME AS NOME_ALUNO, ALUNO.idALUNO, TURMA_has_ALUNO.ANO, TURMA.idCURSO, CURSO.idCURSO, TURMA.SERIE, TURMA.MODALIDADE, MODALIDADE.idMODALIDADE, MODALIDADE.MODALIDADE, CURSO.NOME AS NOME_CURSO, TURMA.idTURMA');
        $this->db->from('ALUNO');
        $this->db->join('TURMA_has_ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO', 'inner');
        $this->db->join('TURMA', 'TURMA.idTURMA = TURMA_has_ALUNO.TURMA_idTURMA', 'inner');
        $this->db->join('CURSO', 'CURSO.idCURSO = TURMA.idCURSO', 'inner');
        $this->db->join('MODALIDADE', 'CURSO.MODALIDADE = MODALIDADE.idMODALIDADE', 'inner');
        $ano = date("Y");
        $this->db->where('TURMA.idTURMA', $id);
        $this->db->where('TURMA_has_ALUNO.ANO', $ano);
        $data['TURMA_has_ALUNO'] = $this->db->get()->result();

        $data['url'] = base_url();
        $data['id'] = $id;
        $data['ano'] = $ano;

		//SELECIONA MATERIAS DA TURMA

        $this->db->select('TURMA_has_MATERIA.MATERIA_idMATERIA, TURMA_has_MATERIA.TURMA_idTURMA, MATERIA.idMATERIA, MATERIA.NOME');
        $this->db->from('MATERIA');
        $this->db->join('TURMA_has_MATERIA', 'TURMA_has_MATERIA.MATERIA_idMATERIA = MATERIA.idMATERIA', 'inner');
        $this->db->where('TURMA_has_MATERIA.TURMA_idTURMA', $id);
        $data['Materia'] = $this->db->get()->result();

        $materia = $this->input->post('txt_materia');
        
        //SELECIONA MATERIAS SELECIONADAS
        
        $this->db->select('MATERIA.NOME, MATERIA.idMATERIA');
        $this->db->from('MATERIA');
        $this->db->where('MATERIA.idMATERIA', $materia);
        $data['materia'] = $this->db->get()->result();

        $qtdAlunos = 0;
        foreach($data['TURMA_has_ALUNO'] as $band)
            $qtdAlunos++;
        $bimestre = $this->input->post('txt_bimestre');
        for($i = 0; $i < $qtdAlunos; $i++){
            $data['NOTAS'][$i] = 0;
            
            //SELECIONA AS NOTAS DAQUELA MATERIA NAQUELE BIMESTRE
            
            $this->db->select('NOTA.NOTA, ALUNO.idALUNO, MATERIA.idMATERIA, NOTA.BIMESTRE');
            $this->db->from('NOTA');
            $this->db->join('ALUNO', 'ALUNO.idALUNO = NOTA.idALUNO', 'inner');
            $this->db->join('TURMA_has_ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO', 'inner');
            $this->db->join('MATERIA', 'MATERIA.idMATERIA = NOTA.idMATERIA', 'inner');
            if($bimestre == 12){
				$where = "NOTA.BIMESTRE = 1 OR NOTA.BIMESTRE = 2";
				$this->db->where($where);
			}
			else if($bimestre == 34){
				$where = "NOTA.BIMESTRE = 3 OR NOTA.BIMESTRE = 4";
				$this->db->where($where);
			}
			else if($bimestre != 1234)
				$this->db->where('NOTA.BIMESTRE', $bimestre);
            $this->db->where('MATERIA.idMATERIA', $materia);
            $this->db->where('ALUNO.idALUNO', $data['TURMA_has_ALUNO'][$i]->idALUNO);
            $Notas = $this->db->get()->result();
            foreach($Notas as $band){
                $data['NOTAS'][$i] += $band->NOTA;
			}
        }
        $this->parser->parse('ajaxEst', $data);
        $this->parser->parse('Estagiario/editarNota', $data);
    }
    
    public function alterarNota($id, $ano, $materia, $serie, $curso, $modalidade, $turma){
		$data['url'] = base_url();
		
        $this->db->select('*');
        $this->db->from('ALUNO');
        $this->db->where('idALUNO', $id);
        $data['aluno'] = $this->db->get()->result();
        
        $data['ano'] = $ano;
        
        $data['turma'] = $serie . ' ' . $curso . ' ' . $modalidade;
        
        
        $this->db->select('MATERIA.NOME, MATERIA.idMATERIA');
        $this->db->from('MATERIA');
        $this->db->where('MATERIA.idMATERIA', $materia);
        $data['materia'] = $this->db->get()->result();
        
        $this->db->select('NOTA.idNOTA, NOTA.idALUNO, NOTA.idMATERIA, NOTA.NOTA, NOTA.BIMESTRE, TURMA_has_MATERIA.ANO, TURMA_has_MATERIA.TURMA_idTURMA');
		$this->db->from('NOTA');
		$this->db->join('TURMA_has_MATERIA', 'TURMA_has_MATERIA.MATERIA_idMATERIA = NOTA.idMATERIA', 'inner');
		$this->db->where('NOTA.idALUNO', $id);
		$this->db->where('NOTA.idMATERIA', $materia);$this->input->post('txt_freq');
		$this->db->where('TURMA_has_MATERIA.ANO', $ano);
		$this->db->where('TURMA_has_MATERIA.TURMA_idTURMA', $turma);
        $data['nota'] = $this->db->get()->result();
        $this->parser->parse('ajaxEst', $data);
        $this->parser->parse('Estagiario/alterarNota', $data);
		
	}
	
	public function alteraNotas(){
		$id = $this->input->post('txt_notaId');
		$data['idALUNO'] = $this->input->post('txt_aluno');
		$data['idMATERIA'] = $this->input->post('txt_materia');
		$data['NOTA'] = $this->input->post('txt_nota');
		$data['BIMESTRE'] = $this->input->post('txt_bim');
		$this->db->from('NOTA');
		$this->db->where('NOTA.idNOTA', $id);
		$this->db->update('NOTA', $data);
		redirect(base_url('login/loginAsEst'));
	}
	
	public function freqEdit(){
		$this->db->select('TURMA.idTURMA, TURMA.SERIE, TURMA_has_ALUNO.ANO, TURMA.idCURSO');
        $this->db->from('TURMA');
        $this->db->join('TURMA_has_ALUNO', 'TURMA.idTURMA = TURMA_has_ALUNO.TURMA_idTURMA', 'right');
        $this->db->distinct();
        $data['TURMA'] = $this->db->get()->result();
        $data['url'] = base_url();
        $this->parser->parse('ajaxEst', $data);
        $this->parser->parse('Estagiario/freqEdit', $data);
	}
	
	public function freqEditar($id, $ano){
        $data['url'] = base_url();
        $this->db->select('MATERIA.idMATERIA, MATERIA.NOME, TURMA_has_MATERIA.TURMA_idTURMA, TURMA_has_MATERIA.MATERIA_idMATERIA, TURMA_has_MATERIA.ANO');
        $this->db->from('TURMA_has_MATERIA');
        $this->db->join('MATERIA', 'MATERIA.idMATERIA = TURMA_has_MATERIA.MATERIA_idMATERIA', 'right');
        $this->db->distinct();
        $this->db->where('TURMA_has_MATERIA.TURMA_idTURMA', $id);
        $this->db->where('TURMA_has_MATERIA.ANO', $ano);
        $data['materia'] = $this->db->get()->result();
        $data['id'] = $id;
        $data['ano'] = $ano;
        if(count($data['materia']) == 0){
            echo '<script type="text/javascript">alert("Não há matérias cadastradas");</script>';
            $this->notEdit();
        }
        else{
			$this->parser->parse('ajaxEst', $data);
            $this->parser->parse('Estagiario/notEditar', $data);
		}
    }
    
    public function freqMatEditar($id, $ano){
        $this->db->select('ALUNO.NOME AS NOME_ALUNO, ALUNO.idALUNO, TURMA_has_ALUNO.ANO, TURMA.idCURSO, CURSO.idCURSO, TURMA.SERIE, TURMA.MODALIDADE, MODALIDADE.idMODALIDADE, MODALIDADE.MODALIDADE, CURSO.NOME AS NOME_CURSO, TURMA.idTURMA');
        $this->db->from('ALUNO');
        $this->db->join('TURMA_has_ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO', 'inner');
        $this->db->join('TURMA', 'TURMA.idTURMA = TURMA_has_ALUNO.TURMA_idTURMA', 'inner');
        $this->db->join('CURSO', 'CURSO.idCURSO = TURMA.idCURSO', 'inner');
        $this->db->join('MODALIDADE', 'CURSO.MODALIDADE = MODALIDADE.idMODALIDADE', 'inner');
        $ano = date("Y");
        $this->db->where('TURMA.idTURMA', $id);
        $this->db->where('TURMA_has_ALUNO.ANO', $ano);
        $data['TURMA_has_ALUNO'] = $this->db->get()->result();

        $data['url'] = base_url();
        $data['id'] = $id;
        $data['ano'] = $ano;

        $this->db->select('TURMA_has_MATERIA.MATERIA_idMATERIA, TURMA_has_MATERIA.TURMA_idTURMA, MATERIA.idMATERIA, MATERIA.NOME');
        $this->db->from('MATERIA');
        $this->db->join('TURMA_has_MATERIA', 'TURMA_has_MATERIA.MATERIA_idMATERIA = MATERIA.idMATERIA', 'inner');
        $this->db->where('TURMA_has_MATERIA.TURMA_idTURMA', $id);
        $data['Materia'] = $this->db->get()->result();

        $materia = $this->input->post('txt_materia');
        $this->db->select('MATERIA.NOME, MATERIA.idMATERIA');
        $this->db->from('MATERIA');
        $this->db->where('MATERIA.idMATERIA', $materia);
        $data['materia'] = $this->db->get()->result();

        $qtdAlunos = 0;
        foreach($data['TURMA_has_ALUNO'] as $band)
            $qtdAlunos++;
        $bimestre = $this->input->post('txt_bimestre');
        for($i = 0; $i < $qtdAlunos; $i++){
            $data['NOTAS'][$i] = 0;
            $this->db->select('FREQUENCIA.FALTAS, ALUNO.idALUNO, MATERIA.idMATERIA, FREQUENCIA.BIMESTRE');
            $this->db->from('FREQUENCIA');
            $this->db->join('ALUNO', 'ALUNO.idALUNO = NOTA.idALUNO', 'inner');
            $this->db->join('TURMA_has_ALUNO', 'TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO', 'inner');
            $this->db->join('MATERIA', 'MATERIA.idMATERIA = NOTA.idMATERIA', 'inner');
            $this->db->where('ALUNO.idALUNO', $data['TURMA_has_ALUNO'][$i]->idALUNO);
            $this->db->where('MATERIA.idMATERIA', $materia);
            if($bimestre == 12){
				$where = "FREQUENCIA.BIMESTRE = 1 OR FREQUENCIA.BIMESTRE = 2";
				$this->db->where($where);
			}
			else if($bimestre == 34){
				$where = "FREQUENCIA.BIMESTRE = 3 OR FREQUENCIA.BIMESTRE = 4";
				$this->db->where($where);
			}
			else if($bimestre != 1234)
				$this->db->where('FREQUENCIA.BIMESTRE', $bimestre);
            $Notas = $this->db->get()->result();
            foreach($Notas as $band)
                $data['FREQUENCIA'][$i] += $band->NOTA;
        }
        $this->parser->parse('ajaxEst', $data);
        $this->parser->parse('Estagiario/editarFreq', $data);
    }
    
    public function alterarFreq($id, $ano, $materia, $serie, $curso, $modalidade, $turma){
		$data['url'] = base_url();
		
        $this->db->select('*');
        $this->db->from('ALUNO');
        $this->db->where('idALUNO', $id);
        $data['aluno'] = $this->db->get()->result();
        
        $data['ano'] = $ano;
        
        $data['turma'] = $serie . ' ' . $curso . ' ' . $modalidade;
        
        
        $this->db->select('MATERIA.NOME, MATERIA.idMATERIA');
        $this->db->from('MATERIA');
        $this->db->where('MATERIA.idMATERIA', $materia);
        $data['materia'] = $this->db->get()->result();
        
        $this->db->select('FREQUENCIA.idFREQUENCIA, FREQUENCIA.idALUNO, FREQUENCIA.idMATERIA, FREQUENCIA.FALTAS, FREQUENCIA.BIMESTRE, TURMA_has_MATERIA.ANO, TURMA_has_MATERIA.TURMA_idTURMA');
		$this->db->from('FREQUENCIA');
		$this->db->join('TURMA_has_MATERIA', 'TURMA_has_MATERIA.MATERIA_idMATERIA = FREQUENCIA.idMATERIA', 'inner');
		$this->db->where('FREQUENCIA.idALUNO', $id);
		$this->db->where('FREQUENCIA.idMATERIA', $materia);$this->input->post('txt_freq');
		$this->db->where('TURMA_has_MATERIA.ANO', $ano);
		$this->db->where('TURMA_has_MATERIA.TURMA_idTURMA', $turma);
        $data['freq'] = $this->db->get()->result();
        $this->parser->parse('ajaxEst', $data);
        $this->parser->parse('Estagiario/alterarFreq', $data);
		
	}
}
