				
				<div class="span9">
					<div class="row-fluid">
						<div class="span12">
							<div class="kepalasidebar">
								Kategori
							</div>
							<div class="kontensisi">
								<div class="row-fluid">
									<div class="span12">
										<div id="betaModal" class="modal hide fade">
												<div class="modal-header">
														<button class="close" data-dismiss="modal">x</button>
														<h3>Buat Kategori Berita</h3>
												</div>
												
												<div class="modal-body">
													<div class="row-fluid">
														<div class="span12">
																<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/kategori/buat" method="post">
																	<div>
																		<input class="span12" type="text" placeholder="Berita Kategori" name="kategori_berita">
																	</div>
																	<br>
																	<hr>
																	<div class="help-block">
																		<button type="submit"  class="btn btn-primary">Simpan</button>
																		<button type="submit" data-dismiss="modal" class="btn btn-primary">Batal</button>
																	</div>
																</form>
														</div>
													</div>
												</div>
										</div>
											<div class="kontensidebar">
												<ul class="list">
													
													
														<div class="row-fluid">
														<div class="span3 btn-toolbar" data-toggle="modal" href="#betaModal">
															<button class="btn btn-primary">Buat Kategori</button>
														</div>
														</div>
															<table class="table table-hover">
																<thead>
																
																	<tr>
																		<th>No</th>
																		<th>Nama</th>
																		
																		<th>Adegan</th>
																	</tr>
																</thead>
																<tbody>
																		<?php if(count($kategori)>0):?>
																			<?php $num=$offset;?>
																			<?php foreach($kategori as $data): 
																			?>
																		<?php $num++;?>
																	
																	<tr>
																		<td><?php echo $data->kategori_berita_id; ?></td>
																		<td><?php echo $data->kategori_berita_nama; ?></td>
																		<td>
																	
																		<a href="#myModal<?php echo $data->kategori_berita_id; ?>" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
																		</td>
																	</tr>
																	<?php endforeach; ?>
																	<?php else: ?>
																	<?php endif;?>
																	
																</tbody>
															</table>
														</div>
														
														<?php pagination($page, $item_per_page, $total_item, $base_url);?>
														<?php foreach ($kategori as $data): ?>
														<div class="modal small hide fade" id="myModal<?php echo $data->kategori_berita_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
																<h3 id="myModalLabel">Konfirmasi Hapus</h3>
															</div>
															<div class="modal-body">
																<p class="error-text">Apakah yakin dihapus?</p>
															</div>
															<div class="modal-footer">
																<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
																<a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/kategori/hapus/<?php echo $data->kategori_berita_id; ?>">Hapus</a>
															</div>
														</div>
														<?php endforeach; ?>
												</ul>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>