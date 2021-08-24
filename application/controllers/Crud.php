<?php 

defined('BASEPATH') OR exit ('No direct script acess allowed');

class Crud extends MY_ControllerAdm{

	function __construct(){

		parent::__construct();
		$this->load->model('Crud_model','crud');




	}

	public function index(){

		$totalAdm = $this->crud->dadosHomePage(1);
		$totalAluno = $this->crud->dadosHomePage(3);
		$totalProfessor = $this->crud->dadosHomePage(2);
		$totalUsuarios = $totalAluno + $totalAdm + $totalProfessor;

		$dados = array(
			'titulo' =>'Boletim Escolar',
			'page' => "home",
			'descricao' => "Painel Administrativo",
			'totalAdm' => $totalAdm,
			'totalAluno' => $totalAluno,
			'totalProfessor' => $totalProfessor,
			'totalUsuarios' => $totalUsuarios
		);

		$this->template->views1('telas/administrador/home', $dados);

	}
///TELAS /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function listaAdmin(){

		$dados = array(
			'titulo' => 'Boletim Escolar',
			'page' => "listar",
			'descricao' => "Administradores",
		);

		$this->template->views1('telas/administrador/adminLista',$dados);

	}

	public function listaAluno(){

		$dados = array(
			'titulo' => 'CRUD &raquo; Listagem',
			'page' => "listar2",
			'descricao' => "Alunos",
		);
		$this->template->views2('telas/administrador/alunoLista',$dados);

	}

	public function listaProfessor(){

		$dados = array(
			'titulo' => 'CRUD &raquo; Listagem',
			'page' => "listar3",
			'descricao' => "Professores",
		);
		$this->template->views3('telas/administrador/professorLista',$dados);

	}

	public function listaClasse(){

		$dados = array(
			'titulo' => 'CRUD &raquo; Listagem',
			'page' => "classes",
			'descricao' => "Classes",
		);
		$this->template->views4('telas/administrador/classeLista',$dados);

	}
	public function listaDisciplina(){

		$dados = array(
			'titulo' => 'CRUD &raquo; Listagem',
			'page' => "disciplinas",
			'descricao' => "Disciplinas",
		);
		$this->template->views5('telas/administrador/disciplinaLista',$dados);

	}



/////LISTAR///////////////////////////////////////////////////////////////////////////////////////////////////////////


	public function listarUsuarios(){

		$nivel = 1;

		$resultado = $this->crud->selectAllUsuarios($nivel);

		echo json_encode($resultado);

		
	}

	public function listarProfessor(){
		
		$nivel = 2;

		$resultado = $this->crud->selectAllProfessores($nivel);
		
		echo json_encode($resultado);

		
	}

	public function listarAlunos(){

		$nivel = 3;

		$resultado = $this->crud->selectAllAlunos($nivel);

		echo json_encode($resultado);

		
	}

	public function listarClasses(){

		
		$resultado = $this->crud->selectAllClasses();

		echo json_encode($resultado);	
	
			
	}

	public function listarDisciplinas(){

		$resultado = $this->crud->selectAllDisciplinas();

		echo json_encode($resultado);
	}



////CADASTRAR ADM/////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function cadastrarAdm(){


		$retorno['msg'] = "";
		$sinal=false;

		$dados['nome_usuario'] = $this->input->post("nomeCadastrar");
		$dados['email_usuario'] = $this->input->post("emailCadastrar");
		$dados['senha_usuario'] = $this->input->post("senhaCadastrar");
		$repetirSenha['senha2'] = $this->input->post("senha2Cadastrar");
		$dados['nivel'] = 1;
		$dados['status'] = $this->input->post("statCadastrar");


		$email = $dados['email_usuario'];

		$emailExiste = $this->crud->verificarEmail($email);

		if($emailExiste){

			$retorno['ret'] = false;
			$retorno['msg'] .= '| O E-mail já está sendo utilizado |';
			$sinal = true;
		}

		if($dados['senha_usuario'] != $repetirSenha['senha2']){

			$retorno['ret'] = false;
			$retorno['msg'] .= '| As senhas digitadas não correspondem |';
			$sinal = true;

		}

		if($sinal){

			echo json_encode($retorno);
			exit;
		}

		$resultado = $this->crud->insertUsuario($dados);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Cadastro realizado com sucesso!!<br>';
			echo json_encode($retorno);

		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível realizar o cadastro!!<br>';
			echo json_encode($retorno);

		}

	}

/////EDITAR ADM///////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function editarAdm(){


		$retorno['msg'] = "";
		$sinal=false;

		$dados['id_usuario'] = $this->input->post('idEditar');
		$dados['nome_usuario'] = $this->input->post("nomeEditar");
		$dados['email_usuario'] = $this->input->post("emailEditar");
		$dados['senha_usuario'] = $this->input->post("senhaEditar");
		$repetirSenha['senha2'] = $this->input->post("senha2Editar");


		if($dados['senha_usuario'] != $repetirSenha['senha2']){

			$retorno['ret'] = false;
			$retorno['msg'] .= 'As senhas digitadas não correspondem | ';
			$sinal = true;

		}

		if($sinal){

			echo json_encode($retorno);
			exit;
		}

		$condicao = $dados['id_usuario'];

		$resultado = $this->crud->updateUsuario($dados,$condicao);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Edição realizada com sucesso!!<br>';
			echo json_encode($retorno);


		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível realizar a edição!!<br>';
			echo json_encode($retorno);

		}




	}

/////DESABILITAR ADM//////////////////////////////////////////////////////////////////////////////////////////////////////
	public function desabilitarAdm(){


		$retorno['msg'] = "";

		$condicao = $this->input->post('idDesativar');

		$resultado = $this->crud->deleteUsuario($condicao);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Usuário desabilitado com sucesso!!<br>';
			echo json_encode($retorno);

		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível desabilitar o usuário!!<br>';
			echo json_encode($retorno);

		}

	}



////CADASTRO ALUNO ///////////////////////////////////////////////////////////////////////////////////////////////////////

	public function cadastrarAluno(){


		$retorno['msg'] = "";
		$sinal=false;

		//DADOS//////////////////////////////////////////////////////////////////////
		$dados['nome_usuario'] = $this->input->post("nomeCadastrar");
		$dados['email_usuario'] = $this->input->post("emailCadastrar");
		$dados['senha_usuario'] = $this->input->post("senhaCadastrar");
		$dados['nivel'] = 3;
		$dados['status'] = 1;
		$repetirSenha['senha2'] = $this->input->post("senha2Cadastrar");
		$classe = $this->input->post("selectClasse");
	
		//VALIDAÇÃO DOS DADOS///////////////////////////////////////////////////////

		$email = $dados['email_usuario'];
		$emailExiste = $this->crud->verificarEmail($email);

		if($emailExiste){

			$retorno['ret'] = false;
			$retorno['msg'] .= '| O E-mail já está sendo utilizado |';
			$sinal = true;
		}
		if($dados['senha_usuario'] != $repetirSenha['senha2']){

			$retorno['ret'] = false;
			$retorno['msg'] .= '| As senhas digitadas não correspondem |';
			$sinal = true;

		}
		if($sinal){

			echo json_encode($retorno);
			exit;
		}

		//CADASTRO DOS DADOS NO BANCO////////////////////////////////////////////

		$resultado = $this->crud->insertAluno($dados,$classe);


		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Cadastro realizado com sucesso!!<br>';
			echo json_encode($retorno);

		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível realizar o cadastro!!<br>';
			echo json_encode($retorno);

		}

	}

/////EDITAR ALUNO///////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function editarAluno(){


		$retorno['msg'] = "";
		$sinal=false;

		$id = $this->input->post('idEditar');
		$dados['nome_usuario'] = $this->input->post("nomeEditar");
		$dados['email_usuario'] = $this->input->post("emailEditar");
		$dados['senha_usuario'] = $this->input->post("senhaEditar");
		$dados['nivel'] = 3;
		$dados['status'] = 1;
		$repetirSenha['senha2'] = $this->input->post("senha2Editar");
		$classe = $this->input->post("selectClasseEditar");


		if($dados['senha_usuario'] != $repetirSenha['senha2']){

			$retorno['ret'] = false;
			$retorno['msg'] .= 'As senhas digitadas não correspondem | ';
			$sinal = true;

		}

		if($sinal){

			echo json_encode($retorno);
			exit;
		}

		$resultado = $this->crud->updateAluno($dados,$classe,$id);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Edição realizada com sucesso!!<br>';
			echo json_encode($retorno);


		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível realizar a edição!!<br>';
			echo json_encode($retorno);

		}




	}

////DESABILITAR ALUNO//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function desabilitarAluno(){


		$retorno['msg'] = "";
		
		$condicao = $this->input->post('idDesativar');
		$dados['status'] = 0;

	
		$resultado = $this->crud->deleteUsuario($condicao);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Usuário desabilitado com sucesso!!<br>';
			echo json_encode($retorno);


		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível desabilitar o usuário!!<br>';
			echo json_encode($retorno);

		}




	}



///METODOS PARA EXPORTAR///////////////////////////////////////////////////////////////////////////////////////////////////

	public function exportarAdm(){

		$nivel = 1;

		$dados = array(
			'resultado' => $this->crud->selectAllUsuarios($nivel)
		);

		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=administradores.xls');
		$this->load->view('exportar/exportAdm', $dados);


	}
	public function exportarAluno(){

		$dados = array(
			'resultado' => $this->crud->selectAllAlunos()
		);

		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=alunos.xls');
		$this->load->view('exportar/exportAluno', $dados);

	}
	public function exportarProfessor(){

		$dados = array(
			'resultado' => $this->crud->selectAllProfessores()
		);

		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=professores.xls');
		$this->load->view('exportar/exportProfessor', $dados);


	}



////CADASTRAR PROFESSOR //////////////////////////////////////////////////////////////////////////////////////////////////
	public function cadastrarProfessor(){


		$retorno['msg'] = "";
		$sinal=false;

		$dados['nome_usuario'] = $this->input->post("nomeCadastrar");
		$dados['email_usuario'] = $this->input->post("emailCadastrar");
		$dados['senha_usuario'] = $this->input->post("senhaCadastrar");
		$repetirSenha['senha2'] = $this->input->post("senha2Cadastrar");
		$dados['nivel'] = 2;
		$dados['status'] = 1;


		$classe = $this->input->post("selectClasse");
		$disciplina = $this->input->post("selectDisc");
		$email = $dados['email_usuario'];
	

		$emailExiste = $this->crud->verificarEmail($email);

		if($emailExiste){

			$retorno['ret'] = false;
			$retorno['msg'] .= '| O E-mail já está sendo utilizado |';
			$sinal = true;
		}

		if($dados['senha_usuario'] != $repetirSenha['senha2']){

			$retorno['ret'] = false;
			$retorno['msg'] .= '| As senhas digitadas não correspondem |';
			$sinal = true;

		}

		if($sinal){

			echo json_encode($retorno);
			exit;
		}

		$resultado = $this->crud->insertProfessor($dados,$classe,$disciplina);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Cadastro realizado com sucesso!!<br>';
			echo json_encode($retorno);

		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível realizar o cadastro!!<br>';
			echo json_encode($retorno);

		}

	}

/////EDITAR PROFESSOR///////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function editarProfessor(){


		$retorno['msg'] = "";
		$sinal=false;

		$id = $this->input->post('idEditar');
		$dados['nome_usuario'] = $this->input->post("nomeEditar");
		$dados['email_usuario'] = $this->input->post("emailEditar");
		$dados['senha_usuario'] = $this->input->post("senhaEditar");
		$repetirSenha['senha2'] = $this->input->post("senha2Editar");
		$dados['status'] = 1;

		$dados2['id_disciplina'] = $this->input->post("selectDiscEditar");
		$dados2['id_classe'] = $this->input->post("selectClasseEditar");
		

		if($dados['senha_usuario'] != $repetirSenha['senha2']){

			$retorno['ret'] = false;
			$retorno['msg'] .= 'As senhas digitadas não correspondem | ';
			$sinal = true;

		}

		if($sinal){

			echo json_encode($retorno);
			exit;
		}


		$resultado = $this->crud->updateProfessor($dados, $dados2, $id);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Edição realizada com sucesso!!<br>';
			echo json_encode($retorno);


		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível realizar a edição!!<br>';
			echo json_encode($retorno);

		}




	}

////DESABILITAR PROFESSOR//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function desabilitarProfessor(){


		$retorno['msg'] = "";
		
		$condicao = $this->input->post('idDesativar');
		$dados['status'] = 0;

	
		$resultado = $this->crud->deleteUsuario($condicao);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Usuário desabilitado com sucesso!!<br>';
			echo json_encode($retorno);


		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível desabilitar o usuário!!<br>';
			echo json_encode($retorno);

		}




	}


////CADASTRO DISCIPLINA ///////////////////////////////////////////////////////////////////////////////////////////////////////

	public function cadastrarDisciplina(){

		$sinal=false;


		$retorno['msg'] = "";

		$dados['nome_disciplina'] = $this->input->post("nomeCadastrar");
		$dados['status'] = 1;


		$resultado = $this->crud->insertDisciplinas($dados);


		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Cadastro realizado com sucesso!!<br>';
			echo json_encode($retorno);

		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível realizar o cadastro!!<br>';
			echo json_encode($retorno);

		}

	}

	public function editarDisciplina(){


		$retorno['msg'] = "";

		$id = $this->input->post('idEditar');
		$dados['nome_disciplina'] = $this->input->post("nomeEditar");


		$resultado = $this->crud->updateDisciplinas($dados,$id);


		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Edição realizada com sucesso!!<br>';
			echo json_encode($retorno);

		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível realizar a edição!!<br>';
			echo json_encode($retorno);

		}

	}
	public function desabilitarDisciplina(){


		$retorno['msg'] = "";

		$condicao = $this->input->post('idDesativar');


		$resultado = $this->crud->delete($condicao);

		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Usuário desabilitado com sucesso!!<br>';
			echo json_encode($retorno);


		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível desabilitar o usuário!!<br>';
			echo json_encode($retorno);

		}




	}


	public function cadastrarClasse(){


		$retorno['msg'] = "";

		$dados['nome_classe'] = $this->input->post("nomeCadastrar");
		$dados['status'] = 1;


		$resultado = $this->crud->insertClasses($dados);


		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Cadastro realizado com sucesso!!<br>';
			echo json_encode($retorno);

		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível realizar o cadastro!!<br>';
			echo json_encode($retorno);

		}

	}

	public function editarClasse(){


		$retorno['msg'] = "";

		$id = $this->input->post('idEditar');
		$dados['nome_classe'] = $this->input->post("nomeEditar");


		$resultado = $this->crud->updateClasses($dados,$id);


		if($resultado){

			$retorno['ret'] = true;
			$retorno['msg'] = 'Edição realizada com sucesso!!<br>';
			echo json_encode($retorno);

		}else{

			$retorno['ret'] = false;
			$retorno['msg'] = 'Não foi possível realizar a edição!!<br>';
			echo json_encode($retorno);

		}

	}



}

?>