<?php

class Doctrine_tools extends CI_Controller
{

    //Doctrine EntityManager
    public $em;

    function __construct()
    {
        parent::__construct();

        //Instantiate a Doctrine Entity Manager
        $this->em = $this->doctrine->em;
    }

    function index()
    {
        echo 'Doctrine: Atualizar estrutura do banco de dados.<br /><br />
		<form action="" method="POST">
		<input type="submit" name="action" value="Atualizar Banco"><br /><br />
                </form>';

        if ($this->input->post('action')) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            try {
                $tool = new \Doctrine\ORM\Tools\SchemaTool($this->em);

                $filter_exclude = [
                    'auth_user_autologin',
                    'auth_user_profiles',
                    'ci_sessions'
                ];

                $exclude_reg = '/^(?!(?:' . implode('|', $filter_exclude) . ')$).*$/';
                $this->doctrine->em->getConfiguration()->setFilterSchemaAssetsExpression($exclude_reg);

                $classes = array(
                    
                    $this->em->getClassMetadata('models\entidades\Entidade'),
                    $this->em->getClassMetadata('models\entidades\Aluno'),
                    $this->em->getClassMetadata('models\entidades\Classe'),
                    $this->em->getClassMetadata('models\entidades\Disciplina'),
                    $this->em->getClassMetadata('models\entidades\Perfil'),
                    $this->em->getClassMetadata('models\entidades\Professor'),
                    $this->em->getClassMetadata('models\entidades\Usuario'),

                );

                $tool->updateSchema($classes);

                $proxyFactory = $this->em->getProxyFactory();
                $metadatas = $this->em->getMetadataFactory()->getAllMetadata();
                $proxyFactory->generateProxyClasses($metadatas);


                $this->alimentarTabelaPerfil();
                $this->alimentarTabelaDisciplina();
                $this->alimentarTabelaClasse();
                $this->alimentarTabelaUsuario();

                echo 'Dados inseridos com sucesso!!';
            } catch (Exception $e) {
                print $e;
            }
        }
    }

    protected function alimentarTabelaPerfil()
    {
        $perfilBLL = new \models\bll\PerfilBLL();

        $perfis = $perfilBLL->buscarTodos();

        if (count($perfis) == 0) {
            $perfilAdmin = new \models\entidades\Perfil();
            $perfilAluno = new \models\entidades\Perfil();
            $perfilProfessor = new \models\entidades\Perfil();

            $perfilAdmin->setNome('admin');
            $perfilAluno->setNome('aluno');
            $perfilProfessor->setNome('professor');

            $this->doctrine->em->flush();

            echo '<br><br>' . 'Criou os perfis.' . '<br><br>';
        }
    }

    protected function alimentarTabelaDisciplina()
    {
        $disciplinaBLL = new \models\bll\DisciplinaBLL();

        $disciplinas = $disciplinaBLL->buscarTodos();

        if (count($disciplinas) == 0) {

            $disciplinaMatematica = new \models\entidades\Disciplina();
            $disciplinaPortuguês = new \models\entidades\Disciplina();
            $disciplinaBiologia = new \models\entidades\Disciplina();
            $disciplinaQuimica = new \models\entidades\Disciplina();
            $disciplinaFisica = new \models\entidades\Disciplina();

           
            $disciplinaMatematica->setNome('Matematica');
            $disciplinaPortuguês->setNome('Portugues');
            $disciplinaBiologia->setNome('Biologia');
            $disciplinaQuimica->setNome('Quimica');
            $disciplinaFisica->setNome('Fisica');
          

            $this->doctrine->em->flush();

            echo '<br><br>' . 'Criou as disciplinas.' . '<br><br>';
        }
    }

     protected function alimentarTabelaClasse()
    {
        $classeBLL = new \models\bll\ClasseBLL();

        $classes = $classeBLL->buscarTodos();

        if (count($classes) == 0) {

            $classe1Ano = new \models\entidades\Classe();
            $classe2Ano = new \models\entidades\Classe();
            $classe3Ano = new \models\entidades\Classe();
           
           
            $classe1Ano->setNome('1º Ano - Ensino Médio');
            $classe2Ano->setNome('2º Ano - Ensino Médio');
            $classe3Ano->setNome('3º Ano - Ensino Médio');

          
            $this->doctrine->em->flush();

            echo '<br><br>' . 'Criou as classes.' . '<br><br>';
        }
    }

    protected function alimentarTabelaUsuario()
    {
        $usuarioBLL = new \models\bll\UsuarioBLL();
        $perfilBLL = new \models\bll\PerfilBLL();

        $usuarios = $usuarioBLL->buscarTodos();

        if (count($usuarios) == 0) {
            $usuarioAdmin = new \models\entidades\Usuario();
            $usuarioAluno = new \models\entidades\Usuario();
            $usuarioProfessor = new \models\entidades\Usuario();

            $perfilAdmin = $perfilBLL->buscarUmPor(array('nome' => 'admin'));
            $perfilAluno = $perfilBLL->buscarUmPor(array('nome' => 'aluno'));
            $perfilProfessor = $perfilBLL->buscarUmPor(array('nome' => 'professor'));


            for($cont = 0; $cont <= 10; $cont++)
            {

                $usuarioAluno->setUsername('aluno'.'$cont');
                $usuarioAluno->setLogin('222.222.222-2'.'$cont');
                $usuarioAluno->setPassword(md5('senha123'));
                $usuarioAluno->setActive(true);
                $usuarioAluno->setPerfil($perfilAluno);

                $usuarioProfessor->setUsername('professor'.'$cont');
                $usuarioProfessor->setLogin('333.333.333-3'.'$cont');
                $usuarioProfessor->setPassword(md5('senha123'));
                $usuarioProfessor->setActive(true);
                $usuarioProfessor->setPerfil($perfilProfessor);

                $usuarioAdmin->setUsername('admin'.'$cont');
                $usuarioAdmin->setLogin('111.111.111-1'.'$cont');
                $usuarioAdmin->setPassword(md5('senha123'));
                $usuarioAdmin->setActive(true);
                $usuarioAdmin->setPerfil($perfilAdmin);

                $this->doctrine->em->flush();
            }

            echo 'Criou usuários admin e aluno para teste.' . '<br><br>';
        }
    }
}
