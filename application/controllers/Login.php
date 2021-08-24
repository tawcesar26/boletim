<?php

defined('BASEPATH') OR exit ('No direct script acess allowed');

class Login extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Login_model','login');

    }

    public function index()
    {

        $this->load->view('login');

    }

    public function logar(){

        $usuario = $this->input->post("email");
        $senha = $this->input->post("senha");
        $data = false;


        $data = $this->login->loginUsuario($usuario,$senha);

            if ($data) {
                $session = array(
                    'id' => $data[0]->id_usuario,
                    'nome' => $data[0]->nome_usuario,
                    'nivel' => $data[0]->nivel,
                    'logado' => 1
                );
                $this->session->set_userdata($session);
                $nivel = $this->session->userdata('nivel');

                if($nivel === '1'){

                    redirect('Crud');

                }else if($nivel === '2'){

                    redirect('Professor');

                }else{

                   redirect('Aluno');

                }

                
            } else {
                $dados['erro'] = "Usuário e/ou Senha incorretos!";
                $this->load->view("login", $dados);
            }



    }

    public function logout(){
        $this->session->unset_userdata("logado");
        redirect(base_url());
        
    }   
}