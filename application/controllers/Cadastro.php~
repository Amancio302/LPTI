<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cadastro extends CI_Controller {

		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('login')){
				$this->load->view('login');
			}
		}

		public function cadastrar(){
			$data['url'] = base_url();
			$x = $this->session->userdata('tipo');
			if($x == '0')
				$this->parser->parse('cadastro', $data);
			else
				$this->parser->parse('coordcadastro', $data);
		}

		public function cadastro(){
			$data['LOGIN'] = $this->input->post('txt_login');
			$data['SENHA'] = $this->input->post('txt_senha');
			$data['TIPO'] = $this->input->post('txt_tipo');
			$senha = $this->input->post('txt_confirmarsenha');
			if(!$this->db->where('LOGIN', $data['LOGIN'])){
			 $data['modal'] = "$(window).on('load',function(){
							  $('#erro-modal').modal('show');
							  });";
			 $data['url'] = base_url();
			 $this->parser->parse('cadastro', $data);
			}
			else{
				if(($data['SENHA'] == $senha)&&($senha != "")){
					$data['SENHA'] = sha1($data['SENHA']);
					$this->db->insert('USUARIO', $data);
					$data['url'] = base_url();
					$this->parser->parse('telaAdm', $data);
		}
		else{
			$data['modal'] = "$(window).on('load',function(){
							$('#erro-modal').modal('show');
							});";
		 $data['url'] = base_url();
		 $this->parser->parse('cadastro', $data);
		}
		}
	}

		public function editar(){
			$data['USUARIO'] = $this->db->get('USUARIO')->result();
			$data['url'] = base_url();
			$x = $this->session->userdata('tipo');
			if($x == '0')
				$this->parser->parse('editar', $data);
			else
				$this->parser->parse('coordeditar', $data);
		}

		public function editor($id){
			$this->db->where('idUSUARIO', $id);
			$data['USUARIO'] = $this->db->get('USUARIO')->result();
			$data['url'] = base_url();
			$this->parser->parse('editor', $data);
		}

		public function edit(){
			$data['LOGIN'] = $this->input->post('txt_login');
			$data['SENHA'] = $this->input->post('txt_senha');
			$data['TIPO'] = $this->input->post('txt_tipo');
			$idUSUARIO = $this->input->post('id');
			$senha = $this->input->post('txt_confirmarsenha');
			if(($data['SENHA'] == $senha)&&($senha != "")){
			$data['SENHA'] = sha1($data['SENHA']);
			$this->db->where('idUSUARIO', $idUSUARIO);
			$this->db->update('USUARIO', $data);
			$data['url'] = base_url();
			$this->parser->parse('telaAdm', $data);
		}
		else{
			$data['modal'] = "$(window).on('load',function(){
							$('#erro-modal').modal('show');
							});";
		$data['url'] = base_url();
		 $this->parser->parse('cadastro', $data);
		}
		}

		public function excluir($id){
			$this->db->where('USUARIO.idUSUARIO', $id);
			if($this->db->delete('USUARIO')){
				redirect('Login/loginAsAdm');
			}
		}

	public function confere($data, $senha, $idUSUARIO){
		if($data['SENHA'] == $senha){
			$data['SENHA'] = sha1($data['SENHA']);
			$this->db->where('idUSUARIO', $idUSUARIO);
			$this->db->update('USUARIO', $data);
			$data['url'] = base_url();
			$this->parser->parse('telaAdm', $data);
		}
		else{
			$data['modal'] = "$(window).on('load',function(){
							$('#erro-modal').modal('show');
							});";
		$data['url'] = base_url();
		 $this->parser->parse('cadastro', $data);
		}
	}
	
	public function addCurso(){
		$data['url'] = base_url();
		$this->parser->parse('addCurso', $data);
	}
	
	public function addCurso1(){
		$nome = $this->input->post('txt_curso');
		$int = $this->input->post('Int');
		$sub = $this->input->post('Sub');
		if($int != ''){
			$data['NOME'] = $nome." ".$int;
			if(!$this->db->where('NOME', $data['NOME'])){
				$this->db->insert('CURSO', $data);
			}
			else{
				$data['url'] = base_url();
				$data['modal'] = "$(window).on('load',function(){
							$('#erro-modal').modal('show');
							});";
			}
		}
		if($sub != ''){
			$data['NOME'] = $nome." ".$sub;
			if(!$this->db->where('NOME', $data['NOME'])){
				$this->db->insert('CURSO', $data);
			}
			else{
				$data['url'] = base_url();
				$data['modal'] = "$(window).on('load',function(){
							$('#erro-modal').modal('show');
							});";
			}
		}
		$data['url'] = base_url();
		$this->parser->parse('telaAdm', $data);
	}
}
