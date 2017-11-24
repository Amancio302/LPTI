<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafico extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	
	public function mostrar(){
		$graficos = $this->input->post('txt_grafs');
		$qtd = count($graficos);
		$scripts = 'window.onload = function () {';
		$i = 0;
		foreach($graficos as $grafico){
			
			echo $grafico.br();
			
			if($grafico == 11){
				$sala = '1 Informática Integrado';
				$id = '1InfoInt';
			}
			else if($grafico == 12){
				$sala = '2 Informática Integrado';
				$id = '2InfoInt';
			}
			else if($grafico == 13){
				$sala = '3 Informática Integrado';
				$id = '3InfoInt';
			}
			else if($grafico == 21){
				$sala = '1 Mecatrônica Integrado';
				$id = '1Mecaint';
			}
			else if($grafico == 22){
				$sala = '2 Mecatrônica Integrado';
				$id = '2MecaInt';
			}
			else if($grafico == 23){
				$sala = '3 Mecatrônica Integrado';
				$id = '3MecaInt';
			}
			else if($grafico == 31){
				$sala = '1 Edificações Integrado';;
				$id = '1EdifInt';
			}
			else if($grafico == 32){
				$sala = '2 Edificações Integrado';
				$id = '2EdifInt';
			}
			else if($grafico == 33){
				$sala = '3 Edificações Integrado';
				$id = '3EdifInt';
			}
			else if($grafico == 41){
				$sala = '1 Informática Subsequente';
				$id = '1InfoSub';
			}
			else if($grafico == 42){
				$sala = '2 Informática Subsequente';
				$id = '2InfoSub';
			}
			else if($grafico == 51){
				$sala = '1 Mecatrônica Subsequente';
				$id = '1MecaSub';
			}
			else if($grafico == 52){
				$sala = '2 Mecatrônica Subsequente';
				$id = '2MecaSub';
			}
			else if($grafico == 61){
				$sala = '1 Edificações Subsequente';
				$id = '1EdifSub';
			}
			else if($grafico == 62){
				$sala = '2 Edificações Subsequente';
				$id = '2EdifSub';
			}
			
			echo $sala . " - " . $id .br();
			$sql = 'SELECT MATERIA.NOME,
					AVG(NOTA.NOTA) AS "SOMA"
					FROM NOTA
					INNER JOIN MATERIA ON MATERIA.idMATERIA = NOTA.idMATERIA
					INNER JOIN ALUNO ON ALUNO.idALUNO = NOTA.idALUNO
					INNER JOIN TURMA_has_ALUNO ON TURMA_has_ALUNO.ALUNO_idALUNO = ALUNO.idALUNO
					WHERE TURMA_has_ALUNO.TURMA_idTURMA = '. $grafico . ' 
					GROUP BY MATERIA.NOME';
			$valor = $this->db->query($sql)->result();
			
			print_r($valor);
			echo br();
			$scripts .= 'var chart' . $i . ' = new CanvasJS.Chart("' . $id . '", {
			animationEnabled: true,
			
			title:{
				text: "Gráfico - ' . $sala . '"
			},
			axisX:{
				interval: 1
			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)",
				title: "Nota Média"
			},
			data: [{
				type: "bar",
				name: "notas",
				axisYType: "secondary",
				color: "#014D65",
				dataPoints: [';
			foreach($valor as $medias)
				$scripts.= '{ y: '. $medias->SOMA . ', label: "'. $medias->NOME .'"},';
			$scripts = substr($scripts, 0, -1);
			$scripts .= ']
					}]
				});';
			$data['script1'] = $scripts;
			$i++;
			
			echo $scripts .br() . 'identificador' . br();
			
			print_r($data['script1']);
			echo br();
		}
		
		for($j = --$i; $j >= 0; $j--)
			$data['script1'] .= ' chart' . $j . '.render();';
		
		$data['script1'] .= '}';
		
		$data['msg'] = '';
		$data['url'] = base_url();
		$data['modal'] = '';
		
		echo $data['script1'];
		
		$this->parser->parse('ajax', $data);
		$this->parser->parse('telaAdm', $data);
	}

}
