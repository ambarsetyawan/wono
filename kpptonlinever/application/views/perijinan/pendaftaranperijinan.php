<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SIM Pelayanan KPPT</title>
		<link rel="shortcut icon" href="#" type="image/x-icon" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</head>
	
	<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</a>
			<img class="brand logonav"src="assets/img/logo.png">	 			
			<a class="brand" href="#">SIM Pelayanan KPPT</a>
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
					<a href="ubahpengguna.php" ><i class="icon-wrench icon-white"></i> Ubah Pengguna</a>
					</li>
					<li class="dropdown">
					<a href="keluar.php" ><i class="icon-user icon-white"></i> Keluar</a>
					</li>
				</ul>
			</div>			 
			</div>
		</div>
	</div>
				
	<div class="container marginhead">
		<div class="row-fluid">
				<div class="span3">
					<ul class="nav nav-tabs nav-stacked">
						<li><a href="index.php"><i class="icon-home"></i> Beranda</a></li>
						<li><a href="pendaftaranperijinan.php"><i class="icon-file"></i> Pendaftaran Perijinan</a></li>
						<li><a href="layananpengaduan.php"><i class="icon-bullhorn"></i> Layanan Pengaduan</a></li>
						<li><a href="beritaterkini.php"><i class="icon-th-list"></i> Berita</a></li>
						<li><a href="kategori.php"><i class="icon-tag"></i> Kategori</a></li>
						<li><a href="halaman.php"><i class="icon-align-justify"></i> Halaman</a></li>
						<li><a href="galeri.php"><i class="icon-picture"></i> Galeri</a></li>
						<li><a href="unduh.php"><i class="icon-download-alt"></i> Berkas Unduh</a></li>
					</ul>
				</div>
				
				<div class="span9">
					<div class="row-fluid">
						<div class="span12">
							<div class="kepalasidebar">
								Pendaftaran Perijinan
							</div>
							<div class="kontensisi">
								<div class="row-fluid">
									<div class="span12">
											<div id="betaModal" class="modal hide fade">
												<div class="modal-header">
														<button class="close" data-dismiss="modal">x</button>
														<h3>Detail Pemohon</h3>
												</div>
												<div class="modal-body">
													
													<div class="span12">
															<form class="form-horizontal">
																<div class="control-group">
																	<label class="control-label">No Identitas</label>
																	<div class="controls">
																	<input class="span9"type="text" placeholder="KTP/SIM" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Masa Berlaku Identitas</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="17 Desember 2013" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Nama</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Tejo Samudra" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Tempat</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Yogyakarta" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Tanggal Lahir</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="17 Desember 2013" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Alamat</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Purwokinanti PA Yogyakarta" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Kabupaten</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Pakualaman" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Kecamatan</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Purwokinanti" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Desa</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Pakualaman" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Dukuh</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Pakualaman" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Desa</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Kewarganegaraan</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="Palestina" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Telepon</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="0274" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Handphone</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="0899" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Jenis Perizinan</label>
																	<div class="controls">
																	<input class="span9" type="text" placeholder="HO" disabled>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Isi Perijinan</label>
																	<div class="controls">
																	<textarea class="span9" type="text" placeholder="0899" disabled></textarea>
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label">Unduh Perijinan</label>
																	<div class="controls">
																	<button class="btn btn-warning">PDF</button>
																	<button class="btn btn-success">XLS</button>
																	</div>
																</div>
																
														</form>														
													</div>
													
												</div>
											</div>
											<div class="kontensidebar">
												<ul class="list">
														<div>
															<table class="table table-hover">
																<thead>
																	<tr>
																		<th>No</th>
																		<th>Nama</th>
																		<th>Email</th>
																		<th>Alamat Rumah</th>
																		<th>Telepon</th>
																		<th>Isi</th>
																		<th>Action</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>1</td>
																		<td>Umar</td>
																		<td>umar@umar.com</td>
																		<td>Jogja</td>
																		<td>123</td>
																		<td>Tes</td>
																		<td>													
																		<a class="btn-toolbar" data-toggle="modal" href="#betaModal"><i class="icon-edit"></i></a>
																		<a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
																		</td>
																	</tr>
																	
																</tbody>
															</table>
														</div>
														<div class="pagination">
															<ul>
																<li><a href="#">Prev</a></li>
																<li><a href="#">1</a></li>
																<li><a href="#">2</a></li>
																<li><a href="#">3</a></li>
																<li><a href="#">4</a></li>
																<li><a href="#">Next</a></li>
															</ul>
														</div>
														<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
																<h3 id="myModalLabel">Konfirmasi Hapus</h3>
															</div>
															<div class="modal-body">
																<p class="error-text">Apakah yakin dihapus?</p>
															</div>
															<div class="modal-footer">
																<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
																<button class="btn btn-danger" data-dismiss="modal">Hapus</button>
															</div>
														</div>
												</ul>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>	
	<br>
	<div class="footer navbar-fixed-bottom">
		Developed by <a href="http://ptcodecon.com/">Tim PKL Komsi Codecon</a>
	</div>
	</body>
</html>