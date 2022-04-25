
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <link rel="shortcut icon" href="<?php echo base_url().'assets/images/tentang/n.png' ?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- css -->
  <?php $this->load->view('admin/include/base_css'); ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- navbar -->
<?php $this->load->view('admin/include/base_nav'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Dashboard
            </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $artikel->num_rows(); ?></h3>

                <p>List Artikel</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="<?php echo base_url('front/daftar_artikel') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $comment->num_rows(); ?></h3>
                <p>List Kritik Dan Saran</p>
              </div>
              <div class="icon">
                <i class="fa fa-comments"></i>
              </div>
              <a href="<?php echo base_url('front/daftar_testimoni') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
          <!-- ./col -->
        </div>
     </div>
  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  <?php $this->load->view('admin/include/base_footer'); ?>

</div>
<!-- ./wrapper -->

<!-- script -->
<?php $this->load->view('admin/include/base_js'); ?>
</body>
</html>
