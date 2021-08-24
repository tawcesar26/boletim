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
        <a href="<?php echo base_url('homeProfessor'); ?>">

          <i class="glyphicon glyphicon-home"></i> <span>Página Inicial</span>
          <span class="pull-right-container">

          </span>
        </a>
      </li>
      <li <?php if ($page == 'listaClasses') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('listaClassesProfessor'); ?>">

          <i class="glyphicon glyphicon-home"></i> <span>Minhas Classes</span>
          <span class="pull-right-container">

          </span>
        </a>
      </li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>
