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
									<?php echo form_open_multipart('unduh/do_upload');?>
										<div>
											<input class="span12" type="text" placeholder="Judul" name="nama_dokumen">
										</div>
										<br>
										<div>
											<textarea class="span12" type="text" placeholder="Deskripsi" name="deskripsi"></textarea>
										</div>
										<br>
										<div>
											<input type="file" size = 10 name="userfile" class="btn btn-success"><i class="icon-white icon-upload"></i></button>
										</div>
										<br>
										<hr>
										<div class="help-block">
											<input type="submit" class= "btn btn-primary" value="Unggah"/>
											<a type="button" class="btn btn-primary" href="<?php base_url(); ?>" >Batal</a>
										</div>
									</form>
								</ul>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>