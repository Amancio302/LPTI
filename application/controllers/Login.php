<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
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
			$array=array("login"=>true, "tipo"=>$data[0]['TIPO'], "bool"=>true);
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
		$data['url'] = base_url();
		$data['modal'] = "";
		$data['script1'] = 'window.onload = function () {
			
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			
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
				dataPoints: [
					{ y: 88.6, label: "Artes" },
					{ y: 79.1, label: "Biologia I" },
					{ y: 75.2, label: "Biologia II" },
					{ y: 96.2, label: "Filosofia" },
					{ y: 88.5, label: "História I" },
					{ y: 82.6, label: "História II" },
					{ y: 79.9, label: "História III" },
					{ y: 89.9, label: "Inglês I" },
					{ y: 88.0, label: "Inglês II" },
					{ y: 90.0, label: "Inglês III" },
					{ y: 65.4, label: "Português I" },
					{ y: 75.3, label: "Português II" },
					{ y: 77.6, label: "Postuguês III" },
					{ y: 85.1, label: "Física I" },
					{ y: 82.5, label: "Física II" },
					{ y: 79.9, label: "Física III" },
					{ y: 82.1, label: "Geografia I" },
					{ y: 77.7, label: "Geografia II" }
				]
			}]
		});
			chart.render();
		}';
		$this->parser->parse('ajax', $data);
		$this->parser->parse('telaAdm', $data);
	}

	public function loginAsCoord($tipo){
		$this->load->library('session');
		$data['url'] = base_url();
		$data['Tipo'] = $tipo;
		$data['modal'] = "";
		$data['script1'] = 'window.onload = function () {
			
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			
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
				dataPoints: [
					{ y: 88.6, label: "Artes" },
					{ y: 79.1, label: "Biologia I" },
					{ y: 75.2, label: "Biologia II" },
					{ y: 96.2, label: "Filosofia" },
					{ y: 88.5, label: "História I" },
					{ y: 82.6, label: "História II" },
					{ y: 79.9, label: "História III" },
					{ y: 89.9, label: "Inglês I" },
					{ y: 88.0, label: "Inglês II" },
					{ y: 90.0, label: "Inglês III" },
					{ y: 65.4, label: "Português I" },
					{ y: 75.3, label: "Português II" },
					{ y: 77.6, label: "Postuguês III" },
					{ y: 85.1, label: "Física I" },
					{ y: 82.5, label: "Física II" },
					{ y: 79.9, label: "Física III" },
					{ y: 82.1, label: "Geografia I" },
					{ y: 77.7, label: "Geografia II" }
				]
			}]
		});
			chart.render();
		}';
		$this->parser->parse('ajaxCoord', $data);
		$this->parser->parse('telaCoord', $data);
	}

	public function loginAsEst(){
		$this->load->library('session');
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
		$data['url'] = base_url();
		$data['Tipo'] = $tipo;
		$data['script'] = 'window.onload = function () {
			
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			
			title:{
				text:"Fortune 500 Companies by Country"
			},
			axisX:{
				interval: 1
			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)",
				title: "Number of Companies"
			},
			data: [{
				type: "bar",
				name: "companies",
				axisYType: "secondary",
				color: "#014D65",
				dataPoints: [
					{ y: 3, label: "Sweden" },
					{ y: 7, label: "Taiwan" },
					{ y: 5, label: "Russia" },
					{ y: 9, label: "Spain" },
					{ y: 7, label: "Brazil" },
					{ y: 7, label: "India" },
					{ y: 9, label: "Italy" },
					{ y: 8, label: "Australia" },
					{ y: 11, label: "Canada" },
					{ y: 15, label: "South Korea" },
					{ y: 12, label: "Netherlands" },
					{ y: 15, label: "Switzerland" },
					{ y: 25, label: "Britain" },
					{ y: 28, label: "Germany" },
					{ y: 29, label: "France" },
					{ y: 52, label: "Japan" },
					{ y: 103, label: "China" },
					{ y: 134, label: "US" }
				]
			}]
		});
			chart.render();
		}';
		if($tipo == 0){
			$this->parser->parse('ajax', $data);
			$this->parser->parse('telaAdm', $data);
		}
		else if($tipo == 4){
			$this->parser->parse('ajaxEst', $data);
			$this->parser->parse('telaEst', $data);			
		}
		else if($tipo == 5){
			$this->parser->parse('ajaxProf', $data);
			$this->parser->parse('telaProf', $data);
		}
		else{
			$this->parser->parse('ajaxCoord', $data);
			$this->parser->parse('telaCoord', $data);
		}
	}

}
