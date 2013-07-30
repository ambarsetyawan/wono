				<div class="span9">
					<div class="row-fluid">
						<div class="span12">
							<div class="kepalasidebar">
								Halaman
							</div>
							<div class="kontensisi">
								<div class="row-fluid">
									<div class="span12">
											
											<div class="kontensidebar">
												<ul class="list">
												    <div>
														<a class="btn btn-primary" href=" <?php echo base_url(); ?>index.php/halaman/input " >Buat Halaman</a>
													</div><br>
														<div>
															<?php if($halaman != null) { ?>
																<table class="table table-hover">
																	<thead>
																		<tr>
																			<th>No</th>
																			<th>Judul</th>
																			<th>URL</th>
																			<th>Isi</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php foreach($halaman as $data): ?>
																			<tr>
																				<td><?php echo $data->hlm_id; ?></td>
																				<td><?php echo $data->hlm_judul; ?></td>
																				<td><?php echo $data->hlm_link_nama; ?></td>
																				<td><?php $isi = $data->hlm_isi; 
																						$isi = word_limiter($isi,5);
																						echo $isi;
																					?></td>
																				<td>
																				&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>index.php/halaman/edit/<?php echo $data->hlm_id; ?>" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
																				<a href="#myModal<?php echo $data->hlm_id; ?>" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
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
															<?php if($halaman != null) { ?>	
															<div>
																<?php pagination($page, $item_per_page, $total_item, $base_url)?>
															</div>
															<?php foreach($halaman as $data): ?>
																<div class="modal small hide fade" id="myModal<?php echo $data->hlm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
																		<h3 id="myModalLabel">Konfirmasi Hapus</h3>
																	</div>
																	<div class="modal-body">
																		<p class="error-text">Apakah yakin dihapus?</p>
																	</div>
																	<div class="modal-footer">
																		<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
																		<a class="btn btn-primary"href="<?php echo base_url(); ?>index.php/halaman/hapus/<?php echo $data->hlm_id; ?>">Hapus</a>
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
				</div>
		</div>
	</div>	
	<br>
	