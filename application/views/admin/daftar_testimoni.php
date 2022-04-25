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
  <link rel="stylesheet" href="<?php echo base_url('assets/admin') ?>/plugins/datatables/dataTables.bootstrap4.min.css">
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
            <!-- aasdsa -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('front/daftar_artikel') ?>">List Testimoni</a></li>
            </ol>
          </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title">List Testimoni</h3>
                  </div>
                  <!-- /.card-header -->
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Testimoni</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($record)):?>
                  <?php foreach($record as $row):?>
                  <tr>
                    <td><?php echo $row['name_testi'];?></td>
                    <td><?php echo $row['email_testi'];?></td>
                    <td><?php echo $row['testi'];?></td>
                    <td align="center">
                    <a href="<?php echo base_url('front/deletetesti/'.$row['testi_id'])?>" onclick="return confirm('yakin?');" ><span class="label label-danger">Hapus</span></a>
                    </td>
                  </tr>
                  <?php endforeach;?>
                  <?php endif;?>
                </tbody>
                    </table>
                  </div>
                  <!-- /.card -->
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
<script src="<?php echo base_url('assets/admin') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url('assets/admin') ?>/plugins/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- page script -->
      <script>
        $(function () {
          $("#example1").DataTable();
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
          });
        });
      </script>
</body>
</html>
