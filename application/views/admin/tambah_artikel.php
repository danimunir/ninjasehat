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
     <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin') ?>/plugins/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/admin/summernote/summernote-bs4.css';?>">

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
              <h3>Tambah Artikel</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('front/daftar_artikel') ?>">Daftar Artikel</a></li>
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
            <div class="card card-default">
              <div class="box-body">
                <!-- Tambah Testi Column -->
                <?php echo form_open_multipart(base_url("front/insert_artikel"), 'class="form-horizontal"', 'method="post"','enctype="multipart/form-data"');?>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-10">
                      <div class="row form-group">
                        <label class="control-label col-sm-4">Judul Artikel:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" required="" placeholder="Isi Yaa.." name="title">
                        </div>
                      </div>
                      <div class="row form-group">
                        <label class="control-label col-sm-4">Katagori</label>
                        <div class="col-sm-6">
                          <select class="form-control select2" name="category[]" multiple="multiple" data-placeholder="Pilih Kategori">
                            <?php foreach ($category->result_array() as $row ) : ?>
                            <option ><?php echo $row['category'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="row form-group">
                        <label class="control-label col-sm-4">Penulis:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" required="" placeholder="Isi Yaa.." name="author" >
                        </div>
                      </div>
                      <div class="row form-group">
                          <label class="control-label col-sm-4">Featured Image:</label>
                          <div class="col-sm-8">
                            <input type="file" class="form-control" required="" name="userfile">
                          </div>
                        </div>
                      <div class="row form-group">
                          <label class="control-label col-sm-4">Isi Artikel:</label>
                          <div class="col-sm-8">
                            <textarea id="summernote" name="contents"></textarea>
                            </textarea>
                          </div>
                        <div class="col-sm-12">
                          <a href="<?php echo base_url('front/daftar_artikel') ?>" class="btn btn-default pull-left">Kembali</a>
                          <button type="submit" class="btn btn-danger pull-right">Tambah Artikel</button>
                        </div>
                        <?php echo form_close();?>
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
            <!-- Select2 -->
            <script src="<?php echo base_url('assets/admin') ?>/plugins/select2/select2.full.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            <script>
              $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
                })
            </script>
            <script type="text/javascript" src="<?php echo base_url().'assets/admin/summernote/summernote-bs4.js';?>"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#summernote').summernote({
                        height: "300px",
                        callbacks: {
                            onImageUpload: function(image) {
                                uploadImage(image[0]);
                            },
                            onMediaDelete : function(target) {
                                deleteImage(target[0].src);
                            }
                        }
                    });
         
                    function uploadImage(image) {
                        var data = new FormData();
                        data.append("image", image);
                        $.ajax({
                            url: "<?php echo base_url('front/upload_image')?>",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: data,
                            type: "POST",
                            success: function(url) {
                                $('#summernote').summernote("insertImage", url);
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    }
         
                    function deleteImage(src) {
                        $.ajax({
                            data: {src : src},
                            type: "POST",
                            url: "<?php echo base_url('front/delete_image')?>",
                            cache: false,
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    }
         
                });
                 
            </script>
          </body>
        </html>