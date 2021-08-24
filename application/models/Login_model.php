<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {


	public function loginUsuario($login, $senha) {

		$this->db->where('email_usuario', $login);
		$this->db->where('senha_usuario', $senha);
		$this->db->where('status', 1);


		return $this->db->get('tb_usuario')->result();

	}


   public function logout(){
		$this->session->unset_userdata("logado");
		redirect(base_url());
		
	}



	
}