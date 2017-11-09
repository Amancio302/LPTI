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
			if($x == '0'){
				$this->parser->parse('ajax', $data);
				$this->parser->parse('cadastro', $data);
			}
			else{
				$dat['Tipo'] = $this->session->userdata('tipo');
				$this->parser->parse('ajaxCoord', $dat);
				$this->parser->parse('Coordenador/coordcadastro', $data);
			}
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
			 $dat['Tipo'] = $this->session->userdata('tipo');
			 if($dat['Tipo'] == 0)
				$this->parser->parse('ajax', $data);
			else
				$this->parser->parse('ajaxCoord', $dat);
			$this->parser->parse('cadastro', $data);
			}
			else{
				if(($data['SENHA'] == $senha)&&($senha != "")){
					$data['SENHA'] = sha1($data['SENHA']);
					$this->db->insert('USUARIO', $data);
					$data['url'] = base_url();
					$dat['Tipo'] = $this->session->userdata('tipo');
					if($dat['Tipo'] == 0){
						$this->parser->parse('ajax', $data);
						$this->parser->parse('telaAdm', $data);
					}
					else{
						$this->parser->parse('ajaxCoord', $dat);
						$this->parser->parse('telaCoord', $data);
					}
				}
				else{
					$data['modal'] = "$(window).on('load',function(){
									$('#erro-modal').modal('show');
									});";
				 $data['url'] = base_url();
				 $dat['Tipo'] = $this->session->userdata('tipo');
				if($dat['Tipo'] == 0)
					$this->parser->parse('ajax', $data);
				else
					$this->parser->parse('ajaxCoord', $dat);
				$this->parser->parse('cadastro', $data);
				}
			}
		}
		
		public function cadastroCoord(){
			$data['LOGIN'] = $this->input->post('txt_login');
			$data['SENHA'] = $this->input->post('txt_senha');
			$data['TIPO'] = $this->input->post('txt_tipo');
			$senha = $this->input->post('txt_confirmarsenha');
			if(!$this->db->where('LOGIN', $data['LOGIN'])){
			 $data['modal'] = "$(window).on('load',function(){
							  $('#erro-modal').modal('show');
							  });";
			 $data['url'] = base_url();
			 $dat['Tipo'] = $this->session->userdata('tipo');
			 $this->parser->parse('ajaxCoord', $dat);
			 $this->parser->parse('Coordenador/coordcadastro', $data);
			}
			else{
				if(($data['SENHA'] == $senha)&&($senha != "")){
					$data['SENHA'] = sha1($data['SENHA']);
					$this->db->insert('USUARIO', $data);
					$data['url'] = base_url();
					redirect(base_url('login/loginAsCoord/'.$this->session->userdata('tipo')));
				}
				else{
					$data['modal'] = "$(window).on('load',function(){
									$('#erro-modal').modal('show');
									});";
				 $data['url'] = base_url();
				$dat['Tipo'] = $this->session->userdata('tipo');
			 $this->parser->parse('ajaxCoord', $dat);
				 $this->parser->parse('Coordenador/coordcadastro', $data);
				}
			}
		}

		public function editar(){
			$data['USUARIO'] = $this->db->get('USUARIO')->result();
			$data['url'] = base_url();
			$dat['Tipo'] = $this->session->userdata('tipo');
			if($dat['Tipo'] == '0'){
			 $this->parser->parse('ajax', $data);
				$this->parser->parse('editar', $data);
			}
			else{
				$dat['Tipo'] = $this->session->userdata('tipo');
			 $this->parser->parse('ajaxCoord', $dat);
				$this->parser->parse('Coordenador/coordeditar', $data);
			}
		}

		public function editor($id){
			$this->db->where('idUSUARIO', $id);
			$data['USUARIO'] = $this->db->get('USUARIO')->result();
			$data['url'] = base_url();
			$x = $this->session->userdata('tipo');
			if($x == '0'){
				$this->parser->parse('ajax', $data);
				$this->parser->parse('editor', $data);
			}
			else{
				$dat['Tipo'] = $this->session->userdata('tipo');
				$this->parser->parse('ajaxCoord', $dat);
				$this->parser->parse('Coordenador/coordEditor', $data);
			}
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
			$this->parser->parse('ajax', $data);
			$this->parser->parse('telaAdm', $data);
		}
		else{
			$data['modal'] = "$(window).on('load',function(){
							$('#erro-modal').modal('show');
							});";
		$data['url'] = base_url();
		$this->parser->parse('ajaxCoord');
		$this->parser->parse('cadastro', $data);
		}
		}

		public function excluir($id){
			$this->db->where('USUARIO.idUSUARIO', $id);
			if($this->db->delete('USUARIO')){
				if($tipo = $this->session->userdata('tipo') == 0)
					redirect('Login/loginAsAdm');
				else
					redirect(base_url('login/loginAsCoord/'.$this->session->userdata('tipo')));
			}
		}

	public function confere($data, $senha, $idUSUARIO){
		if($data['SENHA'] == $senha){
			$data['SENHA'] = sha1($data['SENHA']);
			$this->db->where('idUSUARIO', $idUSUARIO);
			$this->db->update('USUARIO', $data);
			$data['url'] = base_url();
			$this->parser->parse('ajax', $data);
			$this->parser->parse('telaAdm', $data);
		}
		else{
			$data['modal'] = "$(window).on('load',function(){
							$('#erro-modal').modal('show');
							});";
		$data['url'] = base_url();
		$this->parser->parse('ajax', $data);
		$this->parser->parse('cadastro', $data);
		}
	}
}
