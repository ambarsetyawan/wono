				
				<div class="span9">
					<div class="row-fluid">
							<div class="span12">
											<div class="kepalasidebar">
												<h3>Detail Pemohon</h3>
											</div>	<div class="kontensisi">
														<div class="row-fluid">
														<form class="form-horizontal" >
																<?php foreach($perijinan as $p): ?>
 																<div class="control-group">
																	<label class="control-label">No Identitas</label>
																	
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_no_ktp; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Masa Berlaku Identitas</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->masa_berlaku_ktp; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Nama</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_nama; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Tempat</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_tempat_lhr; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Tanggal Lahir</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_tgl_lhr; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Alamat</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_alamat; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Kabupaten</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_kab; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Kecamatan</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_kec; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Desa</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_desa; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Dukuh</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_pedukuhan; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Telepon</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_telp; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Handphone</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->pemohon_hp; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Jenis Perizinan</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->perijinan_nama; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Isi Perijinan</label>
																	<div class="controls">
																	<label style="color:black; padding:6px 0 0 0px;"><?php echo $p->perijinan_ket; ?></label>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Unduh Perijinan</label>
																	<div class="controls">
																	<button class="btn btn-warning">PDF</button>
																	<button class="btn btn-success">XLS</button>
																	</div>
																</div>
														<?php endforeach;?>
														</form>	
																									
													</div>
											</div>
											</div>
											</div>
											</div>
											</div>
											
											
		</div>		