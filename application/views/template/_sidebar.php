 <aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/AdminLTE/dist/img/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nome'); ?></p>
      </div>
    </div>
    
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      
      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('home'); ?>">

          <i class="glyphicon glyphicon-home"></i> <span>Página Inicial</span>
          <span class="pull-right-container">

          </span>
        </a>
      </li>
      <li <?php if ($page == 'listar' || $page == 'listar2' || $page =='listar3') {echo 'class="treeview active"';}
      else{
        echo "class='treeview'";
      } ?>>
        <a href="#">
         <i class="glyphicon glyphicon-user"></i> <span>Usuários do Sistema</span>
         <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li  <?php if ($page == 'listar') {echo 'class="active"';} ?> > 
          <a href="<?php echo base_url('listaAdmin'); ?>"><i class="fa fa-circle-o"></i> Administradores
          </a>
        </li>
        <li  <?php if ($page == 'listar2') {echo 'class="active"';} ?> > 
          <a href="<?php echo base_url('listaAluno'); ?>"><i class="fa fa-circle-o"></i> Alunos
          </a>
        </li>
        <li  <?php if ($page == 'listar3') {echo 'class="active"';} ?> > 
          <a href="<?php echo base_url('listaProfessor'); ?>"><i class="fa fa-circle-o"></i>Professores</a>
        </li>
      </ul>
    </li>
     <li <?php if ($page == 'classes') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('listaClasses'); ?>">

          <i class="glyphicon glyphicon-education"></i> <span>Classes</span>
          <span class="pull-right-container">

          </span>
        </a>
      </li>
      <li <?php if ($page == 'disciplinas') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('listaDisciplinas'); ?>">

          <i class="glyphicon glyphicon-th-list"></i> <span>Disciplinas</span>
          <span class="pull-right-container">

          </span>
        </a>
      </li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>
