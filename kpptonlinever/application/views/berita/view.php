<div class="span9">
		<div class="row-fluid">
			<div class="span12">
				<div class="kepalasidebar">
					Lihat Berita
				</div>
				<div class="kontensisi">
					<div class="kontensidebar">
						<ul class="list">
							<?php
							echo '<h3>'.$berita_item['berita_judul'].'</h3>';
							echo $berita_item['berita_isi'];?>
							<br>
							Status:
						<?php 
							if($berita_item['berita_status']==0)
								echo "Terbit";
							else
								echo "Draf";
						?>
						
