<!DOCTYPE html>
<div class="span9">
	<div class="row-fluid">
		<div class="span12">
		
			<div class="kepalasidebar">
				Layanan Pengaduan
			</div>
			
			<div class="kontensidebar">
				<ul class="list">
				
				<div>
				<?php if($pengaduan != null) { ?>
					<table class="table table-hover">
					
						<thead>
							<tr>
								<th>No</th>
								<th>id Pengadu</th>
								<th>Nama</th>
								<th>Email</th>
								
								<th>Tanggal</th>
								
								<th>Isi</th>
								<th>Action</th>																						
							</tr>
						</thead>
						
						<tbody>
							<?php 
								$no = $offset + 1;
								foreach($pengaduan as $data): 
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data->pengaduan_id; ?></td>
								<td><?php echo $data->pengaduan_nama; ?></td>
								<td><?php echo $data->pengaduan_email; ?></td>
								
								<td><?php echo $data->pengaduan_tgl; ?></td>
								
								<td><?php $isi = $data->pengaduan_isi; 
										$isi = word_limiter($isi,10);
										echo $isi;
									?></td>
								<td>
									<a href="<?php echo base_url();?>index.php/pengaduan/balas/<?php echo $data->pengaduan_id; ?>" role="button" data-toggle="modal" method="post"><i class="icon-share"></i></a>
									<a href="#myModal<?php echo $data->pengaduan_id;?>"  role="button" data-toggle="modal"><i class="icon-remove"></i></a>
								</td>
							</tr>
													
							<!--popup konfirmasi hapus-->
							<div class="modal small hide fade" id="myModal<?php echo $data->pengaduan_id;?>" method="post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
									<a type="button" class="close" data-dismiss="modal" aria-hidden="true">x</a>
									<h3 id="myModalLabel">Konfirmasi Hapus</h3>
								</div>
							<div class="modal-body">
								<p class="error-text">Apakah yakin dihapus?</p>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn" data-dismiss="modal" aria-hidden="true" >Batal</button>
								<a type="button" href="<?php echo base_url();?>index.php/pengaduan/hapus/<?php echo $data->pengaduan_id; ?>" class="btn btn-danger" >Hapus</a>
							</div>
							</div>
							
							<?php 
								$no++;
								endforeach; 
							?>
						</tbody>
					</table>
				<?php } else {
					echo '<div class="alert alert-error">
								Tidak ada pengaduan
							</div>';
				} ?>
				</div>
				
				<?php pagination($page, $item_per_page, $total_item, $base_url)?>
				
					
				</ul>
			</div>			
							
		</div>
	</div>
</div>
		