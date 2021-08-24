<?php 

class MY_ControllerAdm extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$logado = $this->session->userdata("logado");
		$nivel = $this->session->userdata("nivel");

		if ($logado == 0 || $nivel != 1){ 
			redirect(base_url('Login'));		
		}
				
	}
}

class MY_ControllerProfessor extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$logado = $this->session->userdata("logado");
		$nivel = $this->session->userdata("nivel");

		if ($logado == 0 || $nivel != 2){ 
			redirect(base_url('Login'));		
		}
				
	}
}
class MY_ControllerAluno extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$logado = $this->session->userdata("logado");
		$nivel = $this->session->userdata("nivel");

		if ($logado == 0 || $nivel != 3){ 
			redirect(base_url('Login'));		
		}
				
	}
}
