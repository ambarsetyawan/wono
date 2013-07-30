<?php
class Kategori_model extends CI_Model {

	function show(){
		$string = "SELECT * FROM kategori_berita";
		
		$q = $this->db->query($string);
			if($q->num_rows() > 0) {
				foreach($q->result() as $row){
					$data[] = $row;
				}
			}
			else {
				$data = null;
				echo 'Data tidak ditemukan';
			}
			
			return $data;	
	}
	function input() {
	
		$kategori_berita = $this->input->post('kategori_berita');
		
		$string = "INSERT INTO `kategori_berita`(`kategori_berita_id`, `kategori_berita_nama`)
			  VALUES ( null, '$kategori_berita');";
			  
		$this->db->query($string);
				
	
	}
	function hapus($kategori_berita_id){
			$this->db->query("DELETE FROM kategori_berita
					   WHERE kategori_berita.kategori_berita_id = $kategori_berita_id");
			
		}
	
	function get_count(){
			$data=$this->db->get('kategori_berita');
			return $data->num_rows();
		}
		function get_list($offset, $limit){
				$string = "SELECT *
							FROM kategori_berita
							LIMIT 
								$limit
							OFFSET
								$offset";
			
			$q = $this->db->query($string);
			if($q->num_rows() > 0) {
				foreach($q->result() as $row){
					$data[] = $row;
				}
			}
			else {
				$data = null;
				echo 'Data tidak ditemukan';
			}
			
			return $data;	
				
			}
}
?>