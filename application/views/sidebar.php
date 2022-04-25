<aside class="col-lg-4">
  <!-- Widget [Search Bar Widget]-->
  <div class="widget search">
    <header>
      <h3 class="h6">Search</h3>
    </header>
    <form action="<?php echo base_url('home/search/')?>" method="get" class="search-form">
      <div class="form-group">
        <input type="text" name="keyword" placeholder="Mau nyari apa hayo?">
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
  <!-- Widget [Tags Cloud Widget]-->
  <div class="widget tags" align="center">
    <h4 class="mt-4" align="center">Tentang</h4>
    <img style=" border-radius: 50%;" src="<?php echo base_url().'assets/img/fotokita.jpg'?>" alt="Ninja Sehat" width="150" height="150" class="rounded-circle shadow">
    <h4><a href="<?php echo base_url().'home/tentang' ?>">Ninja Sehat</a></h4>
    <p>Kelompok 3</p>
    <li class="list-inline-item"><a href="https://www.facebook.com/NinjaSehat-107201078626905" target="_blank"><i class="fa fa-facebook"></i></a></li>
    <li class="list-inline-item"><a href="https://twitter.com/ninjasehatk" target="_blank"><i class="fa fa-twitter"></i></a></li>
    <li class="list-inline-item"><a href="http://www.instagram.com/ninjasehat" target="_blank"><i class="fa fa-instagram"></i></a></li>
    <li class="list-inline-item"><a href="https://github.com/danimunir/ninjasehat_project-akhir.git" target="_blank"><i class="fa fa-github"></i></a></li>
    <li class="list-inline-item"><a href="https://www.youtube.com/channel/UC8ThW1lZr-6_BU0nD1dvxmw" target="_blank"><i class="fa fa-youtube"></i></a></li>
  </div>
</aside>
</div>
</div>