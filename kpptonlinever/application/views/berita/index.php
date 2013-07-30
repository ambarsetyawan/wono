<div class="span9">
	<div class="row-fluid">
		<div class="span12">
			<div class="kepalasidebar">
				Semua Berita
			</div>
			<div class="kontensisi">
				
					
						
							
								<div class="row-fluid breadcrumb span12">
									<div class="form-inline span6">
										<a href="<?php echo base_url(); ?>index.php/berita">Semua (<?php echo $jumlah_berita; ?>)</a><label>&nbsp;&nbsp;|</label>
										<a href="<?php echo base_url(); ?>index.php/berita/published">Publised (<?php echo $jumlah_berita_publish; ?>)</a><label>&nbsp;&nbsp;|</label>
										<a href="<?php echo base_url(); ?>index.php/berita/draf">Draf (<?php echo $jumlah_berita_draf; ?>)</a>
									</div>
									
									<div class="form-inline span6 pull-right">
										<form class="form-inline" action="<?php echo base_url(); ?>index.php/berita/cari" method="post">
											<input type="text" class="span10" placeholder="Cari" name="cari">
											<button type="submit" class="btn btn-primary">Cari</button>
										</form>
									</div>
								</div>
								<div class="row-fluid breadcrumb span12">
									<div class="form-inline">
										<select class="span2">
											<option>Aksi</option>
											<option>Ubah</option>
											<option>Hapus</option>
										</select >
										<button class="btn btn-primary">Ok</button>
										&nbsp;
										&nbsp;
										<select class="span2">
											<option>Tanggal</option>
											<option>Feb</option>
											<option>Mar</option>
										</select>
										<select class="span2">
											<option>Kategori</option>
											<option>Par</option>
											<option>Eko</option>
										</select>
										<button class="btn btn-primary">Filter</button>
									</div>
								</div>
								
								<br>
								<table class="table table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Judul</th>
											<th>Isi</th>
											<th>Kategori</th>
											<th>URL</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
										<div id="main">
										<?php if(count($user_list)>0):?>
											<?php $num=$offset;?>
											<?php foreach ($user_list as $berita_item): ?>
											<?php $num++;?>
											<tr>
												<td><?php echo $berita_item['berita_id']; ?></td>
												<td><?php $judul=$berita_item['berita_judul']; 
													$judul=word_limiter($judul,3);
													echo $judul;
													?>
												</td>
												<td><?php  $isi=$berita_item['berita_isi'];
													$isi=word_limiter($isi,3);
													echo $isi;
													?>	
												</td>
												
												<td>
												<?php foreach ($berita_kategori_id as $kate):?>
												<?php if ($berita_item['kategori_berita_id']==$kate->kategori_berita_id)
													{
													echo $kate->kategori_berita_nama;
													}
												?>
												<?php endforeach ?>
												</td>
												<td><?php echo $berita_item['berita_slug'] ?></td>
												<td>
													<?php 
														if($berita_item['berita_status']==0)
															echo "Terbit";
														else
															echo "Draf";
													?>
												</td>
												
												<td><a href="<?php echo base_url('index.php/berita/view/'.$berita_item['berita_slug']) ?>"><i class="icon-check"></i></a>
												<a href="<?php echo base_url('index.php/berita/edit/'.$berita_item['berita_id'])?>"><i class="icon-pencil"></i></a>
												<a href="#myModal<?php echo $berita_item['berita_id']; ?>" role="button" data-toggle="modal"><i class="icon-remove" ></i></a></td>
											</tr>
											<?php endforeach ?>
											<?php else: ?>
											<tr>
												<td colspan="4">No data</td>
											</tr>
										<?php endif;?>
										</div>
										</tr>
									</tbody>
								</table>
								<?php pagination($page, $item_per_page, $total_item, $base_url)?>
								<?php foreach ($user_list as $berita_item): ?>
								<div class="modal small hide fade" id="myModal<?php echo $berita_item['berita_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
										<h3 id="myModalLabel">Delete Confirmation</h3>
									</div>
									<div class="modal-body">
										<p class="error-text">Are you sure you want to delete the menu?</p>
									</div>
									<div class="modal-footer">
										<button  class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
										<a href="<?php echo base_url();?>index.php/berita/delete/<?php echo $berita_item['berita_id']?>" class="btn btn-danger" id="delete-button">Delete</a>
									</div>
								</div>
								<?php endforeach ?>
							
						
					
				
			</div>
		</div>
	</div>
</div>


							


