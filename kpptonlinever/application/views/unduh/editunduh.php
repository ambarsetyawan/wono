<div class="span9">
	<div class="row-fluid">
		<div class="span12">
			<div class="kepalasidebar">
				Ubah Ungguh
			</div>
			<div class="kontensisi">
				<div class="row-fluid">
					<div class="span12">
						
							<div class="kontensidebar">
								<ul class="list">
								<?php foreach($unduhan as $data):?>
									<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/unduh/update/<?php echo $data->unduhan_id; ?>" method="post">
										<div>
											<input class="span12" type="text" placeholder="Judul" name="judul" value="<?php echo $data->unduhan_judul ?>">
										</div>
										<br>
										<div>
											<textarea class="span12" type="text" placeholder="Deskripsi" name="deskripsi" ><?php echo $data->unduhan_deskripsi ?>></textarea>
										</div>
								
										<br>
										<hr>
										<div class="help-block">
											<button type="submit" data-dismiss="modal" class="btn btn-primary">Simpan</button>
												<button type="button" data-dismiss="modal" class="btn btn-primary" formaction="<?php echo base_url(); ?>index.php/unduh">Batal</button>
										</div>
									</form>
									<?php endforeach; ?>
								</ul>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>