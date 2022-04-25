<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php require_once('header.php'); ?>
<!-- Page Content -->
<div class="container">
	<div class="row">
		<!-- Latest Posts -->
		<main class="posts-listing col-lg-8">
			<h1 class="text-lift col-md-8">
			Ninja Sehat
			
			</h1>
			<hr>
			<div class="container">
				<div class="row">
					<!-- post -->
					<?php if(!empty($record)):?>
					<?php foreach($record as $row): ?>
					<div class="post col-xl-6">
						<div class="post-thumbnail"><a href="<?php echo base_url()?>home/read/<?php echo $row['ID']."/".strtolower($row['slug'])?>"><img src="<?php echo base_url().$row['featured_image'];?>" alt="..." class="img-fluid" width="500" height="400" ></a></div>
						<div class="post-details">
							<div class="post-meta d-flex justify-content-between">
								<div class="date meta-last"> <?php echo nama_hari($row['date']); ?>, <?php echo tgl_indo($row['date']);?></div>
							</div>
							<div class="category"><a href="<?php echo base_url('home/katagori/'.$row['category'])?>">Katagori : <?php echo $row['category'];?></a></div><br>
							<a href="<?php echo base_url()?>home/read/<?php echo $row['ID']."/".strtolower($row['slug'])?>">
							<h3 class="h4"><?php echo $row['title'];?></h3></a>
							<p class="text-muted"><a href="<?php echo base_url('home/katagori/'.$row['category'])?>">Katagori : <?php echo $row['category'];?></a></p>
							<div class="post-footer d-flex align-items-center"><a href="<?php echo base_url().'home/tentang' ?>" class="author d-flex align-items-center flex-wrap">
								<div class="avatar"><img src="<?php echo base_url().'assets/img/fotokita.jpg'?>" alt="..." class="img-fluid"></div>
								<div class="title"><span><?php echo $row['author'];?></span></div></a>
								<div class="date"><i class="icon-clock"></i> <?php echo time_since(strtotime($row['date'])) ?></div>
								<div class="comments meta-last"><i class="icon-comment"></i><?php $komentar = $this->Post_model->read_komen($row['ID']); echo count($komentar)?></div>
							</div>
						</div>
					</div>
					<?php endforeach;?>
					<?php endif;?>
				</div>
				<!-- Pagination -->
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-template d-flex justify-content-center">
						<li class="page-item"> </li>
					</ul>
				</nav>
			</div>
		</main>
		<?php require_once('sidebar.php'); ?>
		<?php require_once('footer.php'); ?>