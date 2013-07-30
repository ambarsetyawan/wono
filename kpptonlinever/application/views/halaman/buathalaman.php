<?php echo initialize_tinymce(); ?>				
				<div class="span9">
					<div class="row-fluid">
						<div class="span12">
							<div class="kepalasidebar">
								Buat Halaman
							</div>
							<div class="kontensisi">
								<div class="row-fluid">
								    <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/halaman/buat" method="post">
										<div>
											<input class="span12" type="text" placeholder="Judul" name="judul">
										</div>
										<br>
										<div>
											<input class="span12" type="text" placeholder="URL" name="link">
										</div>
										<br>
										<div>
											<textarea class="span12" type="text" placeholder="Isi" name="isi"></textarea>
										</div>
										
										<hr>
										<div class="help-block">
											<button type="submit" data-dismiss="modal" class="btn btn-primary">Simpan</button>
											<button type="button" data-dismiss="modal" class="btn btn-primary" formaction="<?php echo base_url(); ?>index.php/halaman">Batal</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>	
	<br>
