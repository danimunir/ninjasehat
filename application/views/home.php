<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php require_once('header.php'); ?>
<!-- Hero Section-->
<section style="background: url(<?php echo base_url('assets/img/ninjasehat.jpg') ?>); background-size: cover; background-position: center center" class="hero">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<h1 class="promo-block-title">Ninja Sehat</h1>
				<p class="promo-block-text">Berisi tentang informasi kesehatan yang anda butuhkan</p>
			</div>
			</div><a href=".posts-listing" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<!-- Latest Posts -->
			<main class="posts-listing col-lg-8">
				<h1 class="text-lift col-md-8">
				Home 
				
				</h1>
				<hr>
				<div class="container">
					<div class="row">
						<!-- post -->
						<?php if(!empty($record)):?>
						<?php foreach($record as $row): ?>
						<div class="post col-xl-6">
							<div class="post-thumbnail"><a href="<?php echo base_url()?>home/read/<?php echo $row['ID']."/".strtolower($row['slug'])?>"><img src="<?php echo base_url().$row['featured_image'];?>" alt="..." width="300" height="300" ></a></div>
							<div class="post-details">
								<div class="post-meta d-flex justify-content-between">
									<div class="date meta-last"> <?php echo nama_hari($row['date']); ?>, <?php echo tgl_indo($row['date']);?></div>
								</div>
								<a href="<?php echo base_url()?>home/read/<?php echo $row['ID']."/".strtolower($row['slug'])?>">
								<h3 class="h4"><?php echo $row['title'];?></h3></a>
								<p class="text-muted"><a href="<?php echo base_url('home/katagori/'.$row['category'])?>">Katagori : <?php echo $row['category'];?></a></p>
								<div class="post-footer d-flex align-items-center"><a href="<?php echo base_url().'home/tentang' ?>" class="author d-flex align-items-center flex-wrap">
									<div class="avatar"><img src="<?php echo base_url().'assets/img/fotokita.jpg'?>" alt="..." class="img-fluid"></div>
									<div class="title"><span><?php echo $row['author'];?></span></div></a>
									<div class="date meta-last"><i class="icon-clock"></i> <?php echo time_since(strtotime($row['date'])) ?></div>
								</div>
							</div>
						</div>
						<?php endforeach;?>
						<?php endif;?>
						<!-- Pagination -->
						<nav aria-label="Page navigation example">
							<ul class="pagination pagination-template d-flex justify-content-center">
								<?php echo $pagination ;?>
							</ul>
						</nav>
					</div>
				</main>
				<?php echo "<script>".$this->session->flashdata('message')."</script>"?>
				<?php require_once('sidebar.php'); ?>
				<?php require_once('footer.php'); ?>