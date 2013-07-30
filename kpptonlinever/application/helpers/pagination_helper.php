<?php
	function pagination($page, $item_per_page, $total_item, $base_url){
	echo '
		<div class="pagination">
			<ul>
		';
		$total_page=ceil($total_item/$item_per_page);
		if($page>1){
			echo '<li><a href="'.$base_url.'/'.($page-1).'">Prev</a></li>';
		}
		for($i=1;$i<=$total_page;$i++){
			if($i==$page){
				echo '<li><a href="'.$base_url.'/'.$i.'" style="background:white">'.$i.'</a></li>';
			}else{
				echo '<li><a href="'.$base_url.'/'.$i.'">'.$i.'</a></li>';
			}
		}
		if($page<$total_page){
			echo'<li><a href="'.$base_url.'/'.($page+1).'">Next</a></li>';
		}
		echo'
			</ul>
		</div>
		';
	}
?>