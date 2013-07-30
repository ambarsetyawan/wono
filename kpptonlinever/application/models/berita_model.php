<?php
class Berita_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	
	
	public function get_berita($berita_slug = FALSE)
	{
		if ($berita_slug === FALSE)
		{
			$query = $this->db->get('berita');
			return $query->result_array();
		}

		$query = $this->db->get_where('berita', array('berita_slug' => $berita_slug));
		return $query->row_array();
	}
	public function set_berita()
	{
		$this->load->helper('url');
		
		$berita_slug = url_title($this->input->post('berita_judul'), 'dash', TRUE);
		
		$berita_judul = $this->input->post('berita_judul');
		$berita_slug = $berita_slug;
		$berita_isi = $this->input->post('berita_isi');
		$berita_status = $this->input->post('berita_status');
		$kategori_berita_id = $this->input->post('kategori_berita_id');
			
		$string = "INSERT INTO `berita`(`berita_judul`, `berita_isi`, `berita_slug`,`kategori_berita_id`,`berita_status`, `berita_tgl`) 
								VALUES ('$berita_judul', '$berita_isi', '$berita_slug',$kategori_berita_id ,$berita_status,NOW());";
		

		$this->db->query($string);
	}
	
	function get_list($offset, $limit){
		$string = "SELECT * FROM berita LIMIT $limit OFFSET $offset";
		$q=$this->db->query($string);
		
		if($q->num_rows() > 0) {
			foreach($q->result() as $row){
				$data[] = $row;
			}
		}
		else {
			$data = null;
			echo 'Data tidak ditemukan';
		}
		return $q->result_array();
			
	}
	
	function get_list_published($offset, $limit){
		$string = "SELECT * FROM berita WHERE berita_status = 0 LIMIT $limit OFFSET $offset";
		$q=$this->db->query($string);
		
		if($q->num_rows() > 0) {
			foreach($q->result() as $row){
				$data[] = $row;
			}
		}
		else {
			$data = null;
			echo 'Data tidak ditemukan';
		}
		return $q->result_array();
			
	}
	
	function get_list_draf($offset, $limit){
		$string = "SELECT * FROM berita WHERE berita_status = 1 LIMIT $limit OFFSET $offset";
		$q=$this->db->query($string);
		
		if($q->num_rows() > 0) {
			foreach($q->result() as $row){
				$data[] = $row;
			}
		}
		else {
			$data = null;
			echo 'Data tidak ditemukan';
		}
		return $q->result_array();
			
	}
	
	function cari($offset, $limit){
		$cari = $this->input->post('cari');
		$string = "SELECT * FROM berita 
					WHERE berita_judul LIKE '%$cari%' OR 
						berita_isi LIKE '%$cari%'
					LIMIT $limit 
					OFFSET $offset";
		$q=$this->db->query($string);
		
		if($q->num_rows() > 0) {
			foreach($q->result() as $row){
				$data[] = $row;
			}
		}
		else {
			$data = null;
			echo 'Data tidak ditemukan';
		}
		return $q->result_array();
			
	}
	
	function get_count(){
		$data=$this->db->get('berita');
		return $data->num_rows();
	}
	
	
	function edit($berita_id) {
		$string = "SELECT * FROM berita
					WHERE berita_id=$berita_id" ;
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
	
	function update($berita_id) {
		
		$berita_judul = $this->input->post('berita_judul');
		$berita_isi = $this->input->post('berita_isi');
		$berita_slug = $this->input->post('berita_slug');
		
		$string = "UPDATE berita
					SET berita_judul = '$berita_judul',
						berita_isi = '$berita_isi',
						berita_slug = '$berita_slug'
					WHERE berita_id = $berita_id";
		$this->db->query($string);
	}
		
	public function delete($berita_id){
		
		$this->db->query("delete from berita where berita_id=$berita_id");
	}
	
	
	function kategori_berita(){
	
		$q=$this->db->get('kategori_berita');
			if($q->num_rows()>0){
				foreach($q->result() as $row){
					$data[]=$row;}
				}else{
					$data=null;
				}
			
		return $data;
	}
	
	function jumlah_berita() {
		// jumlah semua berita
		$q = $this->db->query("SELECT count(berita_id) as jumlah FROM berita");
			
		foreach ($q->result() as $row)
		{
		   $jumlah_berita = $row->jumlah;
		}
		
		$data['jumlah_berita'] = $jumlah_berita;
		
		// jumlah berita terpublish
		$q = $this->db->query("SELECT count(berita_id) as jumlah FROM berita WHERE berita_status = 0");
			
		foreach ($q->result() as $row)
		{
		   $jumlah_berita = $row->jumlah;
		}
		
		$data['jumlah_berita_publish'] = $jumlah_berita;
		
		// jumlah berita draf
		$q = $this->db->query("SELECT count(berita_id) as jumlah FROM berita WHERE berita_status = 1");
			
		foreach ($q->result() as $row)
		{
		   $jumlah_berita = $row->jumlah;
		}
		
		$data['jumlah_berita_draf'] = $jumlah_berita;
		
		return $data;
	}
	
	
}