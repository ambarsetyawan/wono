<?php

class Unduh_model extends CI_Model {
	function get_list($offset, $limit){
		$this->db->limit($limit, $offset);
		$q=$this->db->get('unduhan');
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
	
	function get_count(){
		$data=$this->db->get('unduhan');
		return $data->num_rows();
	}
	
	function uploading($nama_file) {
		$nama = $this->input->post('nama_dokumen');
		$deskripsi = $this->input->post('deskripsi');
		$user = $this->session->userdata('username');
		
		$string = "INSERT INTO unduhan (unduhan_judul, unduhan_deskripsi, 
						unduhan_url, user_id) 
					VALUES ('$nama', '$deskripsi','$nama_file',(SELECT user_id FROM user WHERE username = '$user'))";
		$this->db->query($string);
	}
	
	function edit($unduhan_id) {
		$string = "SELECT * FROM unduhan
					WHERE unduhan_id = $unduhan_id" ;
					
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
	
	function update($unduhan_id) {
		
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');

		$string = "UPDATE unduhan
					SET unduhan_judul = '$judul',
						unduhan_deskripsi = '$deskripsi'
					WHERE unduhan_id = $unduhan_id";
		$this->db->query($string);
	}
	
	function hapus($unduhan_id) {
		$this->db->query("DELETE FROM unduhan
							WHERE unduhan_id = $unduhan_id");
	}
}