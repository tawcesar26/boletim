<?php 

defined('BASEPATH') OR exit ('No direct script acess allowed');

class Professor_model extends CI_Model{

	function __construct(){

		parent::__construct();

		$this->load->database();


	}

	public function selectAllClasses($id){


		$this->db->select('*');
		$this->db->from('tb_professor');
		$this->db->join('tb_classe', 'tb_professor.id_classe = tb_classe.id_classe');
		$this->db->join('tb_disciplina', 'tb_professor.id_disciplina = tb_disciplina.id_disciplina');
		
		$this->db->where('id_usuario', $id);

		return $this->db->get()->result();


	}

	public function selectAllAlunos($id){


		$this->db->select('tb_aluno.id_aluno,tb_usuario.nome_usuario,tb_classe.nome_classe,tb_disciplina.nome_disciplina,tb_aluno.id_classe,tb_professor.id_disciplina,id_nota,tb_aluno.id_usuario,media,nota1,nota2,nota3,nota4');
		$this->db->from('tb_usuario');
		$this->db->join('tb_aluno', 'tb_aluno.id_usuario = tb_usuario.id_usuario');
		$this->db->join('tb_classe', 'tb_classe.id_classe = tb_aluno.id_classe');
		$this->db->join('tb_professor','tb_professor.id_classe = tb_aluno.id_classe');
		$this->db->join('tb_disciplina','tb_professor.id_disciplina = tb_disciplina.id_disciplina');
		$this->db->join('tb_nota','tb_nota.id_aluno = tb_aluno.id_aluno AND tb_nota.id_disciplina = tb_disciplina.id_disciplina','left');
		$this->db->where('tb_professor.id_usuario', $id);

		return $this->db->get()->result();

	

	}

	public function insertNotas($dados){

		
		return $this->db->insert('tb_nota', $dados);

	}

	public function updatetNotas($dados,$id){


		$this->db->where('id_nota',$id);
		return $this->db->update('tb_nota', $dados);

	}


}

 ?>