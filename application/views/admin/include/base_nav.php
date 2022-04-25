<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3" action="<?php echo base_url('keluar/historyplat') ?>" method="post">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="kode" placeholder="Cari History Plat" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
 -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
          <a href="" data-toggle="modal" data-target="#exampleModal" class="dropdown-item">
            <i class="fa fa-info-circle"></i> About
          </a>
           <a href="<?php echo base_url('login/logout') ?>" class="dropdown-item">
            <i class="fa fa-sign-out"></i> Keluar
          </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fa fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('home') ?>" class="brand-link">
      <img src="<?php echo base_url().'assets/img/n.png'?>"
           alt="Parkir"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Ninja Sehat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url().$this->session->userdata('img_user'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nama_user'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('front') ?>" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('front/daftar_artikel') ?>" class="nav-link">
              <i class="nav-icon fa fa-fa fa-book  "></i>
              <p>Artikel</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('front/daftar_testimoni') ?>" class="nav-link">
              <i class="nav-icon fa fa-fa fa-comment  "></i>
              <p>List Kritik & Saran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('front/daftar_tentang') ?>" class="nav-link">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>Tentang</p>
            </a>
          </li>
          <?php if ($this->session->userdata('level') == '1') { ?>
          
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>