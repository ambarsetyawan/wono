<div class="span9">
	<div class="row-fluid">
		<div class="span12">
			<div class="kepalasidebar">
				Unggah
			</div>
			<div class="kontensisi">
				<div class="row-fluid">
					<div class="span12">
						<div class="kontensidebar">
							<?php if(!empty($unggah_error)) { ?>
								<div class="alert alert-success">
									<?php echo $unggah_error; ?>
								</div>
							<?php } ?>
							<ul class="list">
								<div>
									<a class="btn btn-primary" href=" <?php echo base_url(); ?>index.php/unduh/input " >Upload Dokumen</a>
								</div><br>
									<div>
										<?php if($unduhan != null) { ?>
											<table class="table table-hover">
												<thead>
													<tr>
														<th>No</th>
														<th>Judul</th>
														<th>Alamat Berkas</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($unduhan as $data): ?>
														<tr>
															<td><?php echo $data->unduhan_id; ?></td>
															<td><?php echo $data->unduhan_judul; ?></td>
															<td><?php echo $data->unduhan_url; ?></td>
															<td>
															<a href="<?php echo base_url(); ?>index.php/unduh/edit/<?php echo $data->unduhan_id; ?>" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
															<a href="#myModal<?php echo $data->unduhan_id; ?>" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
															</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
											<?php } else {
																echo '<div class="alert alert-error">
																			Belum ada data halaman
																		</div>';
															} ?>
										
										
											<?php if($unduhan != null) { ?>	
											<div>
												<?php pagination($page, $item_per_page, $total_item, $base_url)?>
											</div>
											<?php foreach($unduhan as $data): ?>
												<div class="modal small hide fade" id="myModal<?php echo $data->unduhan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
														<h3 id="myModalLabel">Konfirmasi Hapus</h3>
													</div>
													<div class="modal-body">
														<p class="error-text">Apakah yakin dihapus?</p>
													</div>
													<div class="modal-footer">
														<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
																		<a class="btn btn-primary"href="<?php echo base_url(); ?>index.php/unduh/hapus/<?php echo $data->unduhan_id; ?>">Hapus</a>
													</div>
												</div>
											<?php endforeach; ?>
										<?php } else {
													echo '<div class="alert alert-error">
																Belum ada data halaman
															</div>';
												} ?>
									</div>
								</ul>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>