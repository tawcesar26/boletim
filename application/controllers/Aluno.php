<?php 


defined('BASEPATH') OR exit ('No direct script acess allowed');



class Aluno extends MY_ControllerAluno{

	function __construct(){

		parent::__construct();
		$this->load->model('Aluno_model','crud');		


	}

	public function index(){

		$id = $this->session->userdata('id');

		$dados = array(

				'titulo' =>'Boletim Escolar',
				'page' => "home",
				'descricao' => "Painel do Aluno",

			);

		$dados['listaBoletim'] = $this->crud->listarBoletim($id);


		$this->load->view('telas/aluno/homeAluno', $dados);

	}

	public function exportarBoletim(){



		$id = $this->session->userdata('id');

		$dados = array(

				'titulo' =>'Boletim Escolar',
				'page' => "home",
				'descricao' => "Painel do Aluno",

			);

		$dados['listaBoletim'] = $this->crud->listarBoletim($id);

		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=boletim.xls');

		$this->load->view('exportar/exportBoletim', $dados);

	}





}



?>