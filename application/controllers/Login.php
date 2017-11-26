<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index(){
		$data['msg'] = '';
		$data['url'] = base_url();
		$data['modal'] = '';
		$this->parser->parse('login', $data);
	}

	public function efetuar_login(){
		$login['LOGIN'] = $this->input->post('txt_nome');
		$login['SENHA'] = sha1($this->input->post('txt_senha'));
		$data = $this->db->get_where('USUARIO', $login)->result_array();
		if(count($data) > 0){
			$array=array("login"=>true, "tipo"=>$data[0]['TIPO'], "bool"=>true, "id"=>$data[0]['idUSUARIO'], "nome" => $data[0]['LOGIN']);
			$this->session->set_userdata($array);
			if($data[0]['TIPO'] == 0)
				$this->loginAsAdm();
			else if($data[0]['TIPO'] == 4)
				$this->loginAsEst();
			else if($data[0]['TIPO'] == 5)
				$this->loginAsProf($data[0]['idUSUARIO']);
			else if($data[0]['TIPO']){
				$this->loginAsCoord($data[0]['TIPO']);
			}
		}
		else{
			$this->session->sess_destroy();
			$data['msg'] = 'Login ou Senha Inválidos';
			$data['url'] = base_url();
			$data['modal'] = "$(window).on('load',function(){
						  $('#login-modal').modal('show');
						  });";
			$this->parser->parse('login', $data);
		}
	}

	public function efetuar_logout(){
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('/');
	}

	public function loginAsAdm(){
		$this->load->library('session');
		$data['nome'] = $this->session->userdata('nome');
		$data['url'] = base_url();
		$data['modal'] = "";
		$sql = "SELECT MATERIA.NOME,
				AVG(NOTA.NOTA) AS 'SOMA'
				FROM NOTA
				INNER JOIN MATERIA ON MATERIA.idMATERIA = NOTA.idMATERIA
				GROUP BY MATERIA.NOME";
		$valor = $this->db->query($sql)->result();
					
		$data['script1'] = 'window.onload = function () {
		$("#1InfoInt").hide();
		$("#2InfoInt").hide();
		$("#3InfoInt").hide();
		$("#1MecaInt").hide();
		$("#2MecaInt").hide();
		$("#3MecaInt").hide();
		$("#1EdifInt").hide();
		$("#2EdifInt").hide();
		$("#3EdifInt").hide();
		$("#1InfoSub").hide();
		$("#2InfoSub").hide();
		$("#1MecaSub").hide();
		$("#2MecaSub").hide();
		$("#1EdifSub").hide();
		$("#2EdifSub").hide();
		var chart = new CanvasJS.Chart("Geral", {
			height: 300,
			animationEnabled: true,
			exportEnabled: true,
			zoomEnabled: true,
			
			title:{
				text:"Média Geral da Escola"
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
					$data['script1'] .= '{ y: '. $medias->SOMA . ', label: "'. $medias->NOME .'"},';
				$data['script1'] = substr($data['script1'], 0, -1);
				$data['script1'] .= ']
			}]
		});
			chart.render();
		}';
		$this->parser->parse('ajax', $data);
		$this->parser->parse('telaAdm', $data);
	}

	public function loginAsCoord($tipo){
		$this->load->library('session');
		$data['nome'] = $this->session->userdata('nome');
		$data['url'] = base_url();
		$data['Tipo'] = $tipo;
		$data['modal'] = "";
		if($tipo != 6){
		$sql = "SELECT MATERIA.NOME,
				AVG(NOTA.NOTA) AS 'SOMA'
				FROM NOTA
				INNER JOIN MATERIA ON MATERIA.idMATERIA = NOTA.idMATERIA
				INNER JOIN TURMA_has_ALUNO ON TURMA_has_ALUNO.ALUNO_idALUNO = NOTA.idALUNO
				INNER JOIN TURMA_has_MATERIA ON TURMA_has_MATERIA.TURMA_idTURMA = TURMA_has_ALUNO.TURMA_idTURMA
				WHERE TURMA_has_MATERIA.TURMA_idTURMA = " . $tipo . "1
				OR TURMA_has_MATERIA.TURMA_idTURMA = " . $tipo . "2
				OR TURMA_has_MATERIA.TURMA_idTURMA = " . $tipo . "3
				GROUP BY MATERIA.NOME";
		}
		else{
			$sql = "SELECT MATERIA.NOME,
				AVG(NOTA.NOTA) AS 'SOMA'
				FROM NOTA
				INNER JOIN MATERIA ON MATERIA.idMATERIA = NOTA.idMATERIA
				INNER JOIN TURMA_has_MATERIA ON TURMA_has_MATERIA.MATERIA_idMATERIA = NOTA.idMATERIA
				WHERE TURMA_has_MATERIA.MATERIA_idMATERIA = 11
				OR TURMA_has_MATERIA.MATERIA_idMATERIA = 12
				OR TURMA_has_MATERIA.MATERIA_idMATERIA = 13
				OR TURMA_has_MATERIA.MATERIA_idMATERIA = 21
				OR TURMA_has_MATERIA.MATERIA_idMATERIA = 22
				OR TURMA_has_MATERIA.MATERIA_idMATERIA = 23
				OR TURMA_has_MATERIA.MATERIA_idMATERIA = 31
				OR TURMA_has_MATERIA.MATERIA_idMATERIA = 32
				OR TURMA_has_MATERIA.MATERIA_idMATERIA = 33
				GROUP BY MATERIA.NOME";
		}
		$valor = $this->db->query($sql)->result();
		$scripts = 'window.onload = function () {
		
		var chart = new CanvasJS.Chart("Geral", {
			animationEnabled: true,
			exportEnabled: true,
			height: 300,
			
			title:{
				text:"Média Geral do Curso"
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
				dataPoints: [ ';
				foreach($valor as $medias)
					$scripts .= '{ y: '. $medias->SOMA . ', label: "'. $medias->NOME .'"},';
				$scripts = substr($scripts, 0, -1);
				$scripts .= ']
			}]
		});';
		
		$data['script1'] = $scripts;
		
		$data['script1'] .= 'chart.render();';
		
		$data['script1'] .= '}';
		
		$this->parser->parse('ajaxCoord', $data);
		$this->parser->parse('telaCoord', $data);
	}

	public function loginAsEst(){
		$this->load->library('session');
		$data['nome'] = $this->session->userdata('nome');
		$data['url'] = base_url();
		$data['modal'] = "";
		$this->parser->parse('ajaxEst', $data);
		$this->parser->parse('telaEst', $data);
	}
	
	public function loginAsProf($id){
		$data['idUSUARIO'] = $id;
		$this->load->library('session');
		$data['url'] = base_url();
		$this->parser->parse('ajaxProf', $data);
		$this->parser->parse('telaProf', $data);
		$data['tipo'] = $this->session->userdata('tipo');
	}
	
	public function telaInicial(){
		$tipo = $this->session->userdata('tipo');
		if($tipo == 0){
			$this->loginAsAdm();
		}
		else if($tipo == 4){
			$this->loginAsEst();
		}
		else if($tipo == 5){
			$this->loginAsProf($this->session->userdata('id'));
		}
		else{
			$this->loginAsCoord($tipo);
		}
	}
	
	public function alterarSenha(){
		$tipo = $this->session->userdata('tipo');
		$data['url'] = base_url();
		if($tipo == 0)
			$this->parser->parse('ajax', $data);
		if($tipo == 4)
			$this->parser->parse('ajaxEst', $data);
		if($tipo == 4)
			$this->parser->parse('ajaxProf', $data);
		else
			$this->parser->parse('ajaxCoord', $data);
		$this->parser->parse('mudaSenha', $data);
	}
	
	public function novaSenha(){
		$id = $this->session->userdata('id');
		$senha = $this->input->post('txt_senha');
		$this->db->select('*');
		$this->db->from('USUARIO');
		$this->db->where('USUARIO.idUSUARIO', $id);
		$this->db->where('USUARIO.SENHA', sha1($senha));
		$confirm = $this->db->get()->result();
		if(count($confirm) != 1){
			echo '<script type="text/javascript">alert("Senha inválida");
						location.href = "http://localhost/LPTI/Login/alterarSenha/";</script>';
		}
		else{
			$novaSenha = $this->input->post('txt_novasenha');
			if($novaSenha != $this->input->post('txt_confirmarnovasenha')){
				echo '<script type="text/javascript">alert("As senhas não são iguais");
						location.href = "http://localhost/LPTI/Login/alterarSenha/";</script>';
			}
			else if($novaSenha == ' ' or $novaSenha == ''){
				echo '<script type="text/javascript">alert("Senha em branco");
						location.href = "http://localhost/LPTI/Login/alterarSenha/";</script>';
			}
			else{
				$this->db->select('*');
				$this->db->from('USUARIO');
				$this->db->where('USUARIO.idUSUARIO', $id);
				$data['SENHA'] = sha1($novaSenha);
				if($this->db->update('USUARIO', $data)){
					echo '<script type="text/javascript">alert("Senha alterada com sucesso");
						location.href = "http://localhost/LPTI/Login/telaInicial/";</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Ocorreu um erro");
						location.href = "http://localhost/LPTI/Login/alterarSenha/";</script>';
				}
			}
		}
	}

}
