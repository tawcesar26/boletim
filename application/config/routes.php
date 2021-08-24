<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Login'; 
$route['sair'] = 'Login/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;




//VIEWS//////////////////////////////////////////////////////////////////////////////////////////////////
$route['home'] = 'Crud'; 
$route['homeProfessor'] = 'Professor';
$route['homeAluno'] = 'Aluno';
$route['listaAdmin'] = 'Crud/listaAdmin';
$route['listaAluno'] = 'Crud/listaAluno';
$route['listaProfessor'] = 'Crud/listaProfessor';
$route['listaClasses'] = 'Crud/listaClasse';
$route['listaDisciplinas'] = 'Crud/listaDisciplina';
$route['listaClassesProfessor'] = 'Professor/listaClassesProfessor';

//Rotas do Ajax
//AREA DO ADMINISTRADOR //////////////////////////////////////////////////////////////////////////////////
$route['cadastrarAdm']['post'] = 'Crud/cadastrarAdm';
$route['listarUsuarios'] = 'Crud/listarUsuarios';
$route['editarAdm']['post'] = 'Crud/editarAdm';
$route['desabilitarAdm']['post'] = 'Crud/desabilitarAdm';
$route['cadastrarAluno']['post'] = 'Crud/cadastrarAluno';
$route['listarAlunos']= 'Crud/listarAlunos';
$route['editarAluno']['post'] = 'Crud/editarAluno';
$route['desabilitarAluno']['post'] = 'Crud/desabilitarAluno';
$route['cadastrarProfessor']['post'] = 'Crud/cadastrarProfessor';
$route['listarProfessor']= 'Crud/listarProfessor';
$route['editarProfessor']['post'] = 'Crud/editarProfessor';
$route['desabilitarProfessor']['post'] = 'Crud/desabilitarProfessor';
$route['listarClasses'] = 'Crud/listarClasses';
$route['listarDisciplinas'] = 'Crud/listarDisciplinas';
$route['cadastrarDisciplina'] = 'Crud/cadastrarDisciplina';
$route['cadastrarClasse'] = 'Crud/cadastrarClasse';
$route['editarDisciplina'] = 'Crud/editarDisciplina';
$route['editarClasse'] = 'Crud/editarClasse';
$route['desabilitarDisciplina'] = 'Crud/desabilitarDisciplina';


//ÁREA DO PROFESSOR////////////////////////////////////////////////////////////////////////////////////////
$route['listaAlunosProfessor'] = 'Professor/listaAlunosProfessor';
$route['cadastrarNotas'] = 'Professor/cadastrarNotas';
$route['editarNotas'] = 'Professor/editarNotas';
$route['tabelaClasses'] = "Professor/tabelaClasses";
$route['tabelaAlunos'] = "Professor/tabelaAlunos";


//Exportar XLS/////////////////////////////////////////////////////////////////////////////////////////////
$route['exportarAdm'] = 'Crud/exportarAdm';
$route['exportarAluno'] = 'Crud/exportarAluno';
$route['exportarProfessor'] = 'Crud/exportarProfessor';

$route['exportarBoletim'] = 'Aluno/exportarBoletim';
