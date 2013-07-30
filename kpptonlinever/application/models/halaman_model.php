<?php

class Halaman_model extends CI_Model {

	function show() {
		$string = "SELECT * FROM halaman" ;
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
		
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$link = $this->input->post('link');
		$user = $this->session->userdata('username');
		
		$string = "INSERT INTO `halaman`(`user_id`, `hlm_judul`, `hlm_isi`, `hlm_link_nama`, `hlm_tgl`) 
					VALUES ((SELECT user_id FROM user WHERE username = '$user'), '$judul', '$isi', '$link', NOW());";
		$this->db->query($string);
	}
	
	function hapus($hlm_id) {
		$this->db->query("DELETE FROM halaman
							WHERE hlm_id = $hlm_id");
	}
	
	function get_list($offset, $limit){
		$this->db->limit($limit, $offset);
		$q=$this->db->get('halaman');
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
		$data=$this->db->get('halaman');
		return $data->num_rows();
	}
	
	function edit($hlm_id) {
		$string = "SELECT * FROM halaman
					WHERE hlm_id = $hlm_id" ;
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
	
	function update($hlm_id) {
		
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$link = $this->input->post('link');
		
		$string = "UPDATE halaman
					SET hlm_judul = '$judul',
						hlm_isi = '$isi',
						hlm_link_nama = '$link'
					WHERE hlm_id = $hlm_id";
		$this->db->query($string);
	}
	
}