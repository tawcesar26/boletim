<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Boletim Online</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">

      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="../../index2.html" class="navbar-brand"><b>Boletim</b> Online</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>  
        
        <div class="pull-right">
          <a href="<?php echo base_url('Login/logout'); ?>" class="btn btn-info btn-flat">Sair</a>
      </div> 
  </nav>
</header>
<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
       <!--  <h1>
          Aluno
          <small>Versão 1.0</small>
      </h1> -->
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Notas Disponiveis </h3>
        </div>
        <div class="table-responsive">

           <div class="box-body">

            <table class="table table-hover table-bordered  table-striped">

                <tr>
                    <th colspan="3">Dados do Aluno</th>
                </tr>
                <tr>
                    <td><b>Nome: </b>Tawan Cesar Siqueira de Carvalho</td>
                </tr>
                <tr>
                    <td><b>E-mail: </b> tawcesar26@hotmail.com</td>
                </tr>
                <tr>
                    <td><b>Classe: </b>3º Ano - Ensino Médio</td>
                </tr>

            </table>

        </div>

        <div class="box-body">

            <table class="table table-hover table-bordered  table-striped">

                <tr>
                    <th>Disciplina</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Nota 4</th>
                    <th>Média</th>
                    <th>Situação</th>

                </tr>

                <?php foreach($listaBoletim as $lista){ ?>
                   <tr>   
                    <td><?php echo $lista->nome_disciplina ?></td>
                    <td><?php echo $lista->nota1  ?></td>
                    <td><?php echo $lista->nota2  ?></td>
                    <td><?php echo $lista->nota3  ?></td>
                    <td><?php echo $lista->nota4  ?></td>
                    <td><?php echo $lista->media  ?></td>
                    <td><?php echo ( $lista->media >= 7 ? "Aprovado" : "Reprovado" ); ?></td>
                </tr>  


            <?php } ?>

        </table>

    </div>
</div>

</div>
    <a href="<?php echo base_url('exportarBoletim'); ?>"> <button type="button" class="btn btn-sm btn-success mr-2"> Exportar Boletim</button></a>
</section>

<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Boletim</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2021 </strong> Todos os direitos reservados.
</div>
<!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->

</body>
</html>
