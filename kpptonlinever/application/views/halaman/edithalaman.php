<?php echo initialize_tinymce(); ?>				
				<div class="span9">
					<div class="row-fluid">
						<div class="span12">
							<div class="kepalasidebar">
								Buat Halaman
							</div>
							<div class="kontensisi">
								<div class="row-fluid">
									<?php foreach($halaman as $data):?>
										<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/halaman/update/<?php echo $data->hlm_id; ?>" method="post">
											<div>
												<input class="span12" type="text" placeholder="Judul" name="judul" value="<?php echo $data->hlm_judul ?>">
											</div>
											<br>
											<div>
												<input class="span12" type="text" placeholder="URL" name="link" value="<?php echo $data->hlm_link_nama ?>">
											</div>
											<br>
											<div>
												<textarea class="span12" type="text" placeholder="Isi" name="isi" ><?php echo $data->hlm_isi ?></textarea>
											</div>
											
											<hr>
											<div class="help-block">
												<button type="submit" data-dismiss="modal" class="btn btn-primary">Simpan</button>
												<button type="button" data-dismiss="modal" class="btn btn-primary" formaction="<?php echo base_url(); ?>index.php/halaman">Batal</button>
											</div>
										</form>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>	
	<br>
