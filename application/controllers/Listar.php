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

            /*SELECT * FROM `ALUNO`
INNER JOIN TURMA_has_ALUNO ON ALUNO.idALUNO = TURMA_has_ALUNO.ALUNO_idALUNO
INNER JOIN TURMA ON TURMA_has_ALUNO.TURMA_idTURMA = TURMA.idTURMA
INNER JOIN CURSO ON TURMA.idCURSO = CURSO.idCURSO
INNER JOIN MODALIDADE ON CURSO.MODALIDADE = MODALIDADE.idMODALIDADE*/

            $this->db->select('ALUNO.SITUACAO, ALUNO.NOME AS NOME_ALUNO, ALUNO.idALUNO, TURMA_has_ALUNO.ANO, TURMA.idCURSO, CURSO.idCURSO, TURMA.SERIE, TURMA.MODALIDADE, MODALIDADE.idMODALIDADE, MODALIDADE.MODALIDADE, CURSO.NOME AS NOME_CURSO');
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
                $this->db->like('TURMA.idTURMA', $curso);
			}
            $this->db->where('TURMA_has_ALUNO.ANO', $ano);
            $data['TURMA_has_ALUNO'] = $this->db->get()->result();
            $data['modal'] = "";
            $data['url'] = base_url();
            $this->parser->parse("listar", $data);

        }

    }
