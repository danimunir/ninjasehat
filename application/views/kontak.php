<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php require_once('header.php'); ?>
    
	<!-- Page Content -->
    <div class="container">

        <div class="row">
		    <!-- Blog Entries Column -->
            <div class="col-md-8">
<!-- 				<h1 class="page-header">Testimoni</h1>
 -->				<!-- <div class="alert alert-info" role="alert">
					
						<?php if(!empty($record)):?>
							<?php foreach($record as $row): ?>
								<p>Nama      :<?php echo $row['name_testi'];?></p>
								<p>Email     :<?php echo $row['email_testi'];?></p>
								<p>Testimoni :<?php echo $row['testi'];?></p>
								<hr>
							<?php endforeach;?>
						<?php endif;?>					

				</div>	 -->
				<?php require_once('tambah_kontak.php'); ?>					
            </div>
			
				
<?php require_once('sidebar.php'); ?>			
<?php require_once('footer.php'); ?>
