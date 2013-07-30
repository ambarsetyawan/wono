<?php echo initialize_tinymce();?>
	<div class="span9">
		<div class="row-fluid">
			<div class="span12">
				<div class="kepalasidebar">
					Ubah Berita
				</div>
				<div class="kontensisi">
					<div class="kontensidebar">
						<ul class="list">
						<?php foreach($berita as $data):?>
							<form class="form-horizontal" action="<?php echo base_url(); ?>berita/update/<?php echo $data->berita_id; ?>" method="post">
								<div>
									<input class="span12" type="text" name="berita_judul" placeholder="Judul" value="<?php echo $data->berita_judul ?>" >
								</div>
								<br>
								<div>
									<textarea class="span12" type="text" name="berita_isi" placeholder="Isi" ><?php echo $data->berita_isi ?></textarea>
								</div>
								</br>
								<div class="row-fluid">
								<div>
								
									<select class="span4" type="text" name="kategori_berita_id" placeholder="Isi">
									<?php foreach ($jenis_kategori as $datakategori):?>
										<option value="<?php echo $datakategori->kategori_berita_id; ?>"> <?php echo $datakategori->kategori_berita_nama;?></option>
									<?php endforeach; ?>
									</select>
									
								</div>
								<br>
								<div>
									<select class="span4" type="text" name="berita_status" placeholder="Isi">
									<option value="0" selected="selected">Terbit</option>
									<option value="1">Draf</option>
									</select>
								</div>
								</div>
								<br>
								<div>
									<input class="span12" type="text" name="berita_slug" placeholder="Judul" value="<?php echo $data->berita_slug ?>" >
								</div>
								<hr>
								<div class="help-block ">
									<button type="submit" data-dismiss="modal" class="btn btn-primary">Simpan</button>
									<button type="button" data-dismiss="modal" class="btn btn-primary" formaction="<?php echo base_url(); ?>edit">Batal</button>
								</div>
							</form>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
