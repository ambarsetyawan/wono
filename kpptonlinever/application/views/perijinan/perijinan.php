				
				<div class="span9">
					<div class="row-fluid">
						<div class="span12">
							<div class="kepalasidebar">
								Pendaftaran Perijinan
							</div>
							<div class="kontensisi">
								<div class="row-fluid">
									<div class="span12">
										
											<div class="kontensidebar">
												<ul class="list">
														<div>
															<?php if($perijinan != null) { ?>
																<table class="table table-hover">
																	<thead>
																	
																		<tr>
																			<th>No</th>
																			<th>Nama</th>
																			
																			<th>Alamat Rumah</th>
																			<th>Telepon</th>
																			<th>Isi</th>
																			<th>Adegan</th>
																		</tr>
																	</thead>
																	
																	<tbody>
																	
			?>
																		<?php $num=$offset;?>
																		<?php foreach($perijinan as $data): ?>
																		<?php $num++;?>
																		
																		<tr>
																		
																			<td><?php echo $data->pemohon_id; ?></td>
																			<td><?php echo $data->pemohon_nama; ?></td>
																			
																			<td><?php echo $data->pemohon_alamat; ?></td>
																			<td><?php echo $data->pemohon_telp; ?></td>
																			<td><?php echo $data->perijinan_jenis_deskripsi; ?></td>
																			
																			<td>
																																			
																			<a class="btn-toolbar" href="perijinan/perijinandetail/<?php echo $data->pemohon_id; ?>"><i class="icon-edit"></i></a>
																			<a href="#myModal<?php echo $data->pemohon_id; ?>" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
																			</td>
																		</tr>
																		<?php endforeach; ?>
																	
																	
																	</tbody>
																	
																</table>
															<?php } else {
																	echo '<div class="alert alert-error">
																				Belum ada data perijinan
																			</div>';
																} ?>
														</div>
														
														
														<?php if($perijinan != null) { ?>
														<?php pagination($page, $item_per_page, $total_item, $base_url);?>
															<?php foreach ($perijinan as $data): ?>
															<div class="modal small hide fade" id="myModal<?php echo $data->pemohon_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
																	<h3 id="myModalLabel">Konfirmasi Hapus</h3>
																</div>
																<div class="modal-body">
																	<p class="error-text">Apakah yakin dihapus?</p>
																</div>
																<div class="modal-footer">
																	<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
																	<a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/perijinan/hapus/<?php echo $data->pemohon_id; ?>">Hapus</a>
																</div>
															</div>
															<?php endforeach; ?>
														<?php } ?>
												</ul>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>