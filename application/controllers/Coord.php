<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Coord extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('login')){
					$this->load->view('login');
			}
		}	
		
		public function parametros(){
			$tipo = $this->session->userdata('tipo');
			$this->db->select('*');
			$this->db->from('PARAMETRO_DE_RISCO');
			$this->db->where('idPARAMETRO_DE_RISCO', $tipo);
			$data['PARAMETRO'] = $this->db->get()->result();
			$tipo = $tipo+3;
			$this->db->select('*');
			$this->db->from('PARAMETRO_DE_RISCO');
			$this->db->where('idPARAMETRO_DE_RISCO', $tipo);
			$data['PARAMETROS'] = $this->db->get()->result();
			$this->load->view('addParametro', $data);
		}
		
		public function parametro(){
			$tipo = $this->input->post('id');
			$data['FREQUENCIA'] = $this->input->post('txt_freq');
			$data['NOTA'] = $this->input->post('txt_nota');
			$this->db->where('idPARAMETRO_DE_RISCO', $tipo);
			$this->db->update('PARAMETRO_DE_RISCO', $data);
			if($tipo > 3)
				$tipo -= 3;
			redirect("Login/loginAsCoord/".$tipo);
		}
		
	}
