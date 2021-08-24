<?php 


defined('BASEPATH') OR exit ('No direct script acess allowed');

class Aluno_model extends CI_Model{

	function __construct(){

		parent::__construct();

		$this->load->database();
	
	}

	public function listarBoletim($id){


		$this->db->select('*');
		$this->db->from('tb_aluno');
		$this->db->join('tb_classe', 'tb_classe.id_classe = tb_aluno.id_classe');
		$this->db->join('tb_nota', 'tb_nota.id_aluno = tb_aluno.id_aluno');
		$this->db->join('tb_disciplina', 'tb_disciplina.id_disciplina = tb_nota.id_disciplina');
		$this->db->where('tb_aluno.id_usuario', $id);
	

		return $this->db->get()->result();



	}



}







 ?>