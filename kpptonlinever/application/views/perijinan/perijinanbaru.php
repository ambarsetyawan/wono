
				
				<div class="span9">
					<div class="row-fluid">
						<div class="span12">
							<div class="kepalasidebar">
								Pendaftaran Perijinan
							</div>
							<div class="kontensisi">
								<div class="row-fluid">
								<?php if(!empty($message_error)){?>
								    <div class="alert alert-success">
									Data berhasil tersimpan!
									<?php }?>
									</div>
									<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/perijinan/buat" method="post">
																<div class="control-group">
																	<label class="control-label">No Identitas</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="KTP/SIM" name="no_identitas">
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Masa Berlaku Identitas</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="17 Desember 2013" name="masa_berlaku" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Nama</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Tejo Samudra" name="nama" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Tempat</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Yogyakarta" name="tempat" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Tanggal Lahir</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="17 Desember 2013" name="tanggal_lahir" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Alamat</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Purwokinanti PA Yogyakarta" name="alamat" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Kabupaten</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Pakualaman" name="kabupaten" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Kecamatan</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Purwokinanti" name="kecamatan" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Desa</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Pakualaman" name="desa" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Dukuh</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Pakualaman" name="dukuh" >
																	</div>
																</div>
																
																<div class="control-group">
																	<label class="control-label">Telepon</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="0274" name="telepon" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Handphone</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="0899" name="hape" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Jenis Perizinan</label>
																	<div class="controls">
																		<select name="jenis_perijinan">
																		<?php foreach($perijinan as $data): ?>
																			 <option  value="<?php echo $data->perijinan_jenis_id; ?>"><?php echo $data->perijinan_jenis_deskripsi; ?></option>
																		<?php endforeach; ?>
																		</select>
																	</div>
																</div>
																
																<div class="control-group">
																	<label class="control-label">Status Perijinan</label>
																	<div class="controls">
																	
																	
																			<input type="radio" name="status" value="0">Baru<br>
																			<input type="radio" name="status" value="1">Perpanjangan
																		
																	
																	</div>
																</div>
																
																<div class="control-group">
																	<label class="control-label">Keadaan </label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="layak" name="keadaan" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Tahun Berlaku </label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="2013" name="tahun_berlaku" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Table Mapping</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="terjangakau" name="tabel_mapping" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Perijinan skPerjanjangan.</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Surat ket. No. xxxx" name="skperpanjangan" >
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label"></label>
																	<div class="controls">
																	<button class="btn btn-primary" >Simpan</button>
																	</div>
																</div>
																
														</form>
	
															<br>														
														
								</div>
							</div>
						</div>
					</div>
				</div>