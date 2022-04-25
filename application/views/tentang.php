<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php require_once('header.php'); ?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div align="center" class="col-md-8">
      <br><br><br>
      <h1 class="text" >
      Tentang
      </h1>
      <hr>
      <?php foreach ($tentang as $row) : ?>
      <img style=" border-radius: 50%;" src="<?php echo base_url().$row['img_tent']?>" alt="Ninja Sehat" width="200" height="200" class="rounded-circle shadow"><h1><?php echo $row['nama_tent']?></h1>
      <p><?php echo $row['desc_tent']?></p>
      <li class="list-inline-item"><a href="https://www.facebook.com/NinjaSehat-107201078626905" target="_blank"><i class="fa fa-facebook"></i></a></li>
      <li class="list-inline-item"><a href="https://twitter.com/ninjasehat" target="_blank"><i class="fa fa-twitter"></i></a></li>
      <li class="list-inline-item"><a href="http://www.instagram.com/ninjasehat" target="_blank"><i class="fa fa-instagram"></i></a></li>
      <li class="list-inline-item"><a href="https://github.com/danimunir/ninjasehat_project-akhir.git" target="_blank"><i class="fa fa-github"></i></a></li>
      <li class="list-inline-item"><a href="https://www.youtube.com/channel/UC8ThW1lZr-6_BU0nD1dvxmw" target="_blank"><i class="fa fa-youtube"></i></a></li>
      <!-- Pager -->
      <ul class="pager">
      </ul>
      <hr>
      Kami dari Universitas Bina Sarana Informatika Prodi Sistem Informasi Kelas 19.4A.11 Kelompok 3 telah 
      menyelesaikan Project Akhir Semester 4
      
    </div>
    <?php endforeach; ?>
    <aside class="col-lg-4">
      <!-- Widget [Search Bar Widget]-->
      <div class="widget search">
        <header>
          <h3 class="h6">Search</h3>
        </header>
        <form action="<?php echo base_url('home/search/')?>" method="get" class="search-form">
          <div class="form-group">
            <input type="text" name="keyword" placeholder="mau nyari apa hayo?">
            <button type="submit" class="submit"><i class="icon-search"></i></button>
          </div>
        </form>
      </div>
      <!-- Widget [Categories Widget]-->
      <div class="widget categories">
        <header>
          <h3 class="h6">Kategori</h3>
        </header>
       <?php foreach ($katagori as $row) : ?>
            <div class="item d-flex justify-content-between"><a href="<?php echo base_url('home/katagori/'.$row['category'])?>"><?php echo $row['category'] ?></a><span></span></div>
            <?php endforeach; ?>
      </div>
    </aside>
  </div>
  <div class="text1">
<div class="row row-cols-1 row-cols-md-3 g-4">		
	<div class="card mb-3" style="max-width: 540px; margin-top: 2.5em">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo base_url('assets/dani.jpg')?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-text">Nama : Dhani Munir Supriyadi <br>
			  Nim  &nbsp;&nbsp;: 19200852 <br>
			  Email : danimmunir1@gmail.com <br>
			  No. telp : 0895326168339 <br>
			  Instagram :  - @Dhani.pejuang 
        
			  <p style="margin-left: 110px; margin-top: 2px;"> - @munir.pejuang</p>
        LinkedIn : Dhani Munir Supriyadi https://www.linkedin.com/in/dhani-munir-supriyadi-5b5169235/
      </div>
    </div>
  </div>
</div>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo base_url('assets/doni.jpg')?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-text"> Nama : Dhoni Hanif Supriyadi <br>
			  Nim  &nbsp;&nbsp;: 19200851 <br>
			  Email : dhonihanif354@gmail.com <br>
			  No. telp : 0895326168335 <br>
			  Instagram :  @Killua_dhoni354 <br> <br>
        LinkedIn : Dhoni Hanif Supriyadi https://www.linkedin.com/in/dhoni-hanif-supriyadi-6a93971bb/

      </div>
    </div>
  </div>
</div>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo base_url('assets/wahyu.jpg')?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-text">Nama : Wahyu Nur Agustusanto <br>
			  Nim  &nbsp;&nbsp;: 19200827 <br>
			  Email : wahyunur988@gmail.com <br>
			  No. telp : 085215163415 <br>
			  Instagram :  @whyunra <br>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo base_url('assets/mutia.jpg')?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-text">Nama : Mutia Azhari Rahma <br>
			  Nim  &nbsp;&nbsp;: 19200303 <br>
			  Email : rahmamutiaazhari@gmail.com <br>
			  No. telp : 087873196331 <br>
			  Instagram :  @mutiaazharri <br>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo base_url('assets/asep.jpg')?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-text">Nama : Asep Burhan <br>
			  Nim &nbsp;&nbsp;: 19200610 <br>
			  Email : asepbukhori0711@gmail.com <br>
			  No. telp : 081386758525 <br>
			  Instagram :  @asp_07 <br>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php require_once('footer.php'); ?>