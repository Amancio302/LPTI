<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cadastro extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('login')){
				$this->load->view('login');
			}
		}

		public function cadastrar(){
			$data['url'] = base_url();
			$this->parser->parse('cadastro', $data);
		}

		public function cadastro(){
			$data['LOGIN'] = $this->input->post('txt_login');
			$data['SENHA'] = $this->input->post('txt_senha');
			$data['TIPO_USUARIO'] = $this->input->post('txt_tipo');
			$senha = $this->input->post('txt_confirmarsenha');
			if(!$this->db->where('LOGIN', $data['LOGIN'])){
			 $data['modal'] = "$(window).on('load',function(){
							  $('#erro-modal').modal('show');
							  });";
			 $data['url'] = base_url();
			 $this->parser->parse('cadastro', $data);
			}
			else if($data['SENHA'] == $senha){
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

		public function editar(){
			$data['USUARIO'] = $this->db->get('USUARIO')->result();
			$data['url'] = base_url();
			$this->parser->parse('editar', $data);
		}

		public function editor($id){
			$this->db->where('idUSUARIO', $id);
			$data['USUARIO'] = $this->db->get('USUARIO')->result();
			$data['url'] = base_url();
			$this->parser->parse('editor', $data);
		}

		public function excluir($id){
			$this->db->where('idUSUARIO', $id);
			if($this->db->delete('USUARIO')){
				redirect('Login/loginAsAdm');
			}
		}

		public function inicio(){
			$this->load->view('telaAdm');
		}
	}
