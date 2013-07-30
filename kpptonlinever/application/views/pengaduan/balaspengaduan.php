<?php echo initialize_tinymce(); ?>				
	<div class="span9">
		<div class="row-fluid">
			<div class="span12">
			
				<div class="kepalasidebar">
					Balas Pengaduan
				</div>
				
				<div class="kontensisi">
					<div class="row-fluid">
						<!--Pengaduan-->
						<?php foreach($pengaduan as $data):?>
							<h4>id Pengadu</h4><hr>
								<?php echo $data->pengaduan_id; ?>
							<h4>Nama Pengadu</h4>
								<?php echo $data->pengaduan_nama; ?>
							<h4>Email Pengadu</h4>
								<?php echo $data->pengaduan_email; ?>
							<h4>Alamat Pengadu</h4>
								<?php echo $data->pengaduan_alamat; ?>
							<h4>Telepon Pengadu</h4>
								<?php echo $data->pengaduan_telp; ?>
							<h4>Tanggal Pengaduan</h4>
								<?php echo $data->pengaduan_tgl; ?>
							<h4>Pengaduan Status</h4>
								<?php echo $data->pengaduan_status; ?>
							<h4>Pengaduan Menjawab</h4>
								<?php echo $data->pengaduan_menjawab; ?>
							<h4>Isi Pengaduan</h4>
								<?php $isi = $data->pengaduan_isi; 
										$isi = word_limiter($isi, 5);
										echo $isi;
								?>
							<!--Area membalas-->
							<hr>							
							<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/pengaduan/submit_balas/<?php echo $data->pengaduan_id; ?>"method="post">
									<div>
										<h2>Balasan</h2>
										<p class="span12">
											<?php 
												$date=date('d-m-Y');
												echo '<h4>Tanggal	: </h4>'.$date.'</br>';
												
												$time=date('H:i:s');
												echo '<h4>Waktu	: </h4>'.$time;
											?>
										</p>
									</div>
									<br>
									<div>
										<textarea class="span12" placeholder="Isi" name="isi_balasan"></textarea>
									</div>	
									<br>
									<div class="help-block">
										<button type="submit" class="btn btn-primary" name="isi_balas" >Balas</button>
										<a type="button" class="btn btn-primary" href="<?php echo base_url(); ?>index.php/pengaduan">Batal</a>
									</div>
							</form>
						<?php endforeach; ?> 
								   
					</div>
				</div>
				
			</div>
		</div>
	</div>
		
