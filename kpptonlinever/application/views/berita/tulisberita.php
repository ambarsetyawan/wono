<?php echo initialize_tinymce();?>
	<div class="span9">
		<?php echo validation_errors(); ?>
		<?php echo form_open('berita/tulisberita') ?>
		<div class="row-fluid">
			<div class="span12">
				<div class="kepalasidebar">
					Tulis Berita
				</div>
				<div class="kontensisi">
					<div class="kontensidebar">
						<ul class="list">
							<form class="form-horizontal">
								<div>
									<input class="span12" type="text" name="berita_judul" placeholder="Judul">
								</div>
								<br>
								<div>
									<textarea class="span12" type="text" name="berita_isi" placeholder="Isi"></textarea>
								</div>
								<br>
								<div class="row-fluid">
									<div>
										<select class="span4" type="text" name="kategori_berita_id" placeholder="Isi">
										<?php foreach ($jenis_kategori as $datakategori):?>
											<option value="<?php echo $datakategori->kategori_berita_id; ?>"> <?php echo $datakategori->kategori_berita_nama;?></option>
										<?php endforeach; ?>
										</select>
									</div>
									<div>
										<select class="span4" type="text" name="berita_status" placeholder="Isi">
										<option value="0" selected="selected">Terbit</option>
										<option value="1">Draf</option>
										</select>
									</div>
								</div>
								<hr>
								<div class="help-block">
									<button type="submit" class="btn btn-primary">Batal</button>
									<input class="btn btn-primary pull-right" type="submit" name="submit" value="Simpan">
									
								</div>
							</form>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
