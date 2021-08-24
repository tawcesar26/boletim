<?php

defined('BASEPATH') OR exit ('No direct script acess allowed');

class Professor extends MY_ControllerProfessor{

	function __construct(){

		parent::__construct();
		$this->load->model('Professor_model','crud');		


	}

	public function index(){

	$dados = array(
			'titulo' =>'Boletim Escolar',
			'page' => "home",
			'descricao' => "Painel do Professor",

		);

		$this->template->view_professor('telas/professor/homeProfessor', $dados);

	}

	public function listaClassesProfessor(){

		$dados = array(
			'titulo' => 'Boletim Escolar',
			'page' => "listaClasses",
			'descricao' => "Minhas Classes",
		);

		$this->template->view_professor('telas/professor/classesLista',$dados);

	}
	public function listaAlunosProfessor(){

		$dados = array(
			'titulo' => 'Boletim Escolar',
			'page' => "listaClasses",
			'descricao' => "Boletins",
		);

		$this->template->view_professor('telas/professor/gerenciarAlunos',$dados);

	}

	public function tabelaClasses(){

		$id = $this->session->userdata('id');

		$resultado = $this->crud->selectAllClasses($id);

		echo json_encode($resultado);



	}
	public function tabelaAlunos(){

		$id = $this->session->userdata('id');

		$resultado = $this->crud->selectAllAlunos($id);
		
		echo json_encode($resultado);

	}

	public function cadastrarNotas(){

		$retorno['msg'] = "";
		$sinal = false;

		
		$dados['nota1'] = $this->input->post('nota1');
		$dados['nota2'] = $this->input->post('nota2');
		$dados['nota3'] = $this->input->post('nota3');
		$dados['nota4'] = $this->input->post('nota4');
		$dados['media'] = ($dados['nota1'] + $dados['nota2']+$dados['nota3']+$dados['nota4'])/4;
		$dados['id_disciplina'] = $this->input->post('disciplinaAluno');
		$dados['id_aluno'] = $this->input->post('idAluno');
		

		$resultado = $this->crud->insertNotas($dados);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Boletim gerado com sucesso!!<br>';
			echo json_encode($retorno);


		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível gerar o boletim!!<br>';
			echo json_encode($retorno);

		}

	}

	public function editarNotas(){

		$retorno['msg'] = "";
		$sinal = false;

		
		$dados['nota1'] = $this->input->post('nota1Editar');
		$dados['nota2'] = $this->input->post('nota2Editar');
		$dados['nota3'] = $this->input->post('nota3Editar');
		$dados['nota4'] = $this->input->post('nota4Editar');
		$dados['media'] = ($dados['nota1'] + $dados['nota2']+$dados['nota3']+$dados['nota4'])/4;

		$id= $this->input->post('idNota');
		

		$resultado = $this->crud->updatetNotas($dados,$id);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Boletim editado com sucesso!!<br>';
			echo json_encode($retorno);


		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível editar o boletim!!<br>';
			echo json_encode($retorno);

		}

	}


}