<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <!-- Tambah Testi Column -->
				<br><br>
				<div class="container">
                <h3 class="promo-block-title">Kritik & Saran</h3>
				</div>
				<form class="form-horizontal" action="<?php echo base_url('home/tambah_kontak/kirim_kontak');?>" method="POST">
					<div class="form-group">
						<label class="control-label col-sm-6">Nama Anda:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" required="" name="name_testi">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-6">Email Anda:</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email_testi" required>
						</div>
					</div>		
					<div class="form-group">
						<label class="control-label col-sm-6">Kritik Dan Saran:</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="testi" required></textarea>
						</div>
					</div>
					<div class="form-group">
					<div class="col-sm-10">
					<button type="submit" value="Tambah Testi" class="btn btn-danger pull-right">Kirim</button>
					</div>
					</div>
				</form>
         <?php echo "<script>".$this->session->flashdata('message')."</script>"?>
		
