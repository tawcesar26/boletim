<?php 

defined('BASEPATH') OR exit ('No direct script acess allowed');

class Crud_model extends CI_Model{	

	function __construct(){

		parent::__construct();

		$this->load->database();

	}

	public function dadosHomePage($nivel){

		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->where('nivel', $nivel);

		$resultado = count($this->db->get('tb_usuario')->result());

		return $resultado;

	}

	public function selectAllUsuarios($nivel){

		$id = $this->session->userdata('id');

		$this->db->select("*");
		$this->db->where('status', 1);
		$this->db->where('nivel', $nivel);
		$this->db->where('id_usuario !=', $id);

		$this->db->order_by('nome_usuario', 'ASC');
		
		$resultado = $this->db->get('tb_usuario')->result();

		return $resultado;

	}

	public function selectAllClasses(){

		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->order_by('nome_classe', 'ASC');
		return $this->db->get('tb_classe')->result();
	}

	public function selectAllDisciplinas(){

		$this->db->select('*');
		$this->db->where('status =', 1);
		$this->db->order_by('nome_disciplina', 'ASC');
		return $this->db->get('tb_disciplina')->result();
	}
	
	public function verificarEmail($email){


		$this->db->select('*');
		$this->db->where('email_usuario', $email);
		return $this->db->get('tb_usuario')->result();


	}

	public function insertUsuario($dados){


		return $this->db->insert('tb_usuario', $dados);
		

	}

	public function updateUsuario($dados,$condicao){


		$this->db->where('id_usuario', $condicao);
		return $this->db->update('tb_usuario', $dados);
		
	}

	public function deleteUsuario($condicao){

		$this->db->set('status', 0);
		$this->db->where('id_usuario', $condicao);
		return $this->db->update('tb_usuario');
		

	}

	public function insertAluno($dados,$classe){


		$this->db->trans_start();

			$this->db->insert('tb_usuario',$dados);

			$id = $this->db->insert_id();

			$dados2 = array(

				'id_usuario'=> $id,
				'id_classe'=> $classe
			);

			$this->db->insert('tb_aluno',$dados2);

		
		return $this->db->trans_complete();
		

	}

	public function selectAllAlunos(){



		$this->db->select('*');
		$this->db->from('tb_usuario');
		$this->db->join('tb_aluno', 'tb_aluno.id_usuario = tb_usuario.id_usuario');
		$this->db->join('tb_classe','tb_classe.id_classe = tb_aluno.id_classe');
		$this->db->where('tb_usuario.status',1);
		$this->db->order_by('nome_usuario', 'ASC');

		return $this->db->get()->result();

	}

	public function updateAluno($dados,$classe,$id){


		$this->db->trans_start();	

			$this->db->where('id_usuario', $id);
			$this->db->update('tb_usuario',$dados);
			

			$dados2 = array(

				'id_classe'=> $classe
			);

			$this->db->where('id_usuario', $id);
			$this->db->update('tb_aluno',$dados2);
			

		
		return $this->db->trans_complete();
		

	}

	public function insertProfessor($dados,$classe,$disciplina){


		$this->db->trans_start();

			$this->db->insert('tb_usuario',$dados);

			$id = $this->db->insert_id();

			$dados2 = array(

				'id_usuario'=> $id,
				'id_classe'=> $classe,
				'id_disciplina'=> $disciplina,
				'status'=> 1
			);

			$this->db->insert('tb_professor',$dados2);

		
		return $this->db->trans_complete();
		

	}

	public function selectAllProfessores(){

		$this->db->select('*');
		$this->db->from('tb_usuario');
		$this->db->join('tb_professor', 'tb_usuario.id_usuario = tb_professor.id_usuario');
		$this->db->join('tb_classe','tb_classe.id_classe = tb_professor.id_classe');
		$this->db->join('tb_disciplina','tb_disciplina.id_disciplina = tb_professor.id_disciplina');
		$this->db->where('tb_usuario.status',1);
		$this->db->order_by('nome_usuario', 'ASC');

		return $this->db->get()->result();

	}

	public function updateProfessor($dados,$dados2,$id){



		$this->db->trans_start();	

			$this->db->where('id_usuario', $id);
			$this->db->update('tb_usuario',$dados);
			

			$this->db->where('id_usuario', $id);
			$this->db->update('tb_professor',$dados2);
			
		
		return $this->db->trans_complete();
		

	}

	
	public function insertDisciplinas($dados){

			return $this->db->insert('tb_disciplina', $dados);	

	}
	public function updateDisciplinas($dados,$id){

			$this->db->where('id_disciplina', $id);
			return $this->db->update('tb_disciplina', $dados);	

	}
	public function deleteDisciplina($condicao){

		$this->db->set('status', 0);
		$this->db->where('id_disciplina', $condicao);
		return $this->db->update('tb_disciplina');
		

	}

	
	public function insertClasses($dados){

			return $this->db->insert('tb_classe', $dados);	

	}
	public function updateClasses($dados,$id){

			$this->db->where('id_classe', $id);
			return $this->db->update('tb_classe', $dados);	

	}
	public function deleteClasses($condicao){

		$this->db->set('status', 0);
		$this->db->where('id_classe', $condicao);
		return $this->db->update('tb_classe');
		

	}

	


}