<div class="span9">
	<!--Informasi-->
	<div id="informasi" class="span8" style="margin-bottom:20px;">
		<div class="kepalasidebar">
			Informasi
		</div>
		<div class="kontensisi">
		   <div class="row-fluid">
				<div class="span6">
				<strong><p style="margin-bottom:-10px;">Isi</p></strong>
				<hr>
					<table>
						<tr>
						<td>
							<strong><p><?php echo $jumlah_berita; ?></p></strong>
						</td>
						<td>
						<label><p> &nbsp <a href="<?php echo base_url(); ?>index.php/berita">Berita</a></p></label>
						</td>
						</tr>
						<tr>
						<td>
							<strong><p><?php echo $jumlah_halaman; ?></p></strong>
						</td>
						<td>
						<label><p> &nbsp <a href="<?php echo base_url(); ?>index.php/halaman">Halaman</a></p></label>
						</td>
						</tr>
						<tr>
						<tr>
						<td>
							<strong><p><?php echo $jumlah_kategori; ?></p></strong>
						</td>
						<td>
						<label><p> &nbsp <a href="<?php echo base_url(); ?>index.php/kategori">Kategori</a></p></label>
						</td>
						</tr>
						<tr>
					</table>
					
	
				</div>
				<div class="span6">
				<strong><p style="margin-bottom:-10px;">Pengaduan</p></strong>
				<hr>
					<table>
						<tr>
						<td>
							<strong><p><?php echo $jumlah_pengaduan_terbaru; ?></p></strong>
						</td>
						<td>
						<label><p> &nbsp <a href="<?php echo base_url(); ?>index.php/pengaduan/terbaru">Terbaru</a></p></label>
						</td>
						</tr>
						<tr>
						<td>
							<strong><p><?php echo $jumlah_pengaduan_terjawab; ?></p></strong>
						</td>
						<td>
						<label><p> &nbsp <a href="<?php echo base_url(); ?>index.php/pengaduan/terjawab">Terjawab</a></p></label>
						</td>
						</tr>
						<tr>
						<tr>
						<td>
							<strong><p><?php echo $jumlah_pengaduan; ?></p></strong>
						</td>
						<td>
						<label><p> &nbsp <a href="<?php echo base_url(); ?>index.php/pengaduan/semua">Total Pengaduan</a></p></label>
						</td>
						</tr>
						<tr>
					</table>
				</div>
				
				
		   </div>
		</div>
		<br>
		
		
		<div class="kepalasidebar">
								Pengaduan Terakhir
		</div>
		<div class="kontensisi">
			<?php if(!empty($pengaduan_error)) { ?>
			<div class="alert alert-success">
				Pengaduan telah terjawab
			</div>
			<?php } ?>
			<?php if($pengaduan_terbaru != null) {
			?>
			<table style="margin: 5px;" class="">
				<thead>
					<div style=(margin: 0px;) >
					<tr>
						<th>No&nbsp;&nbsp;&nbsp;</th>
						<th>Nama&nbsp;&nbsp;&nbsp;</th>
						<th>Isi</th>
					
					</tr>
					</div>
				</thead>
			</table>
			<?php 
				$no = 1;
				
				foreach($pengaduan_terbaru as $data): 
			?>
				<form class="" action="<?php echo base_url(); ?>index.php/home/balas/<?php echo $data->pengaduan_id; ?>" method="post">
					<table style="margin: 0;"  class="table fixed">
						<tbody>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data->pengaduan_nama; ?></td> 
								<td><?php echo $data->pengaduan_isi; ?></td>
							</tr>	
						</tbody>
					</table>
					<div>
						<div>
							<div class="row-fluid">
							<a class="accordion-toggle" data-toggle="collapse" href="#areamu<?php echo $no; ?>">
							
								&nbsp;<i class="icon-share"></i> Balas
																
							</a>
							<a class="accordion-toggle" href="#">
							
								<i class="icon-remove"></i> Hapus
																
							</a>
							</div>
						</div>
						<div id="areamu<?php echo $no; ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<textarea class="span12" name="balas"></textarea>
									
									<button type="submit" data-dismiss="modal" class="span3 pull-right btn btn-primary">Tambah</button>
								</div>
						</div>
					</div>
					
				</form>
			<?php
				$no++;					
				endforeach; }
				else
					echo "&nbsp;&nbsp;Pengaduan telah terjawab semua";
			?>
			
		</div>
	
	</div>
	<!--Tulis Berita Cepat-->
	<div class="span4">
		<div class="kepalasidebar">
			Tulis Berita Cepat
		</div>
		
		<div class="kontensisi">
			<?php if(!empty($berita_error)) { ?>
			<div class="alert alert-success">
				Berita telah ditambahkan
			</div>
			<?php } ?>
			<form class="" action="<?php echo base_url(); ?>index.php/home/inputberita" method="post">
				<input class="span12"type="text" placeholder="Judul" name="judul"><br>
				<select class="span12" name="berita_kategori">
				<option value="3" selected>- Kategori -</option>
					<?php foreach($kategori as $data): ?>
					<option value="<?php echo $data->kategori_berita_id; ?>"><?php echo $data->kategori_berita_nama; ?></option>
					<?php endforeach; ?>
				</select>
				<textarea class="span12"placeholder="Isi" name="isi"></textarea><br>
				<div align="right"><button type="submit" data-dismiss="modal" class="btn btn-primary">Simpan</button></div>
			</form>
		</div>
		<br>
		
		<div class="kepalasidebar">
			Unggah
		</div>
		<div class="kontensisi">
			<?php if(!empty($unggah_error)) { ?>
			<div class="alert alert-success">
				<?php echo $unggah_error; ?>
			</div>
			<?php } ?>
			<?php echo form_open_multipart('home/do_upload');?>
				<input class="span12"type="text" placeholder="Judul" name="nama_dokumen">
				<div>
					<input type="file" size = 10 name="userfile" class="btn btn-success" title='Browse File <i class="icon-file icon-white"></i>'/>
					<input type="submit" class= "btn btn-primary pull-right" value="Unggah"/>
				</div>

			</form>
		</div>
		<br>
		
		<div class="kepalasidebar">
			Kategori
		</div>
		<div class="kontensisi">
			<?php if(!empty($kategori_error)) { ?>
			<div class="alert alert-success">
				Kategori ditambahkan
			</div>
			<?php } ?>
			<form class="" action="<?php echo base_url(); ?>index.php/home/tambahkategori" method="post">
			<input class="span12"type="text" placeholder="Judul" name="tambah_kategori">
			
			<div align="right"><button type="submit" data-dismiss="modal" class="btn btn-primary">Tambah</button></div>
			</form>
		</div>
	</div>
</div>