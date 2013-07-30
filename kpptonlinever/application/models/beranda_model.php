<?php

class Beranda_model extends CI_Model {
	
	function informasi() {
		
		// Isi
			
			// jumlah berita
			$q = $this->db->query("SELECT count(berita_id) as jumlah FROM berita");
			
			foreach ($q->result() as $row)
			{
			   $jumlah_berita = $row->jumlah;
			}
			
			$data['jumlah_berita'] = $jumlah_berita;
			
			// jumlah halaman
			$q = $this->db->query("SELECT count(hlm_id) as jumlah FROM halaman");
			
			foreach ($q->result() as $row)
			{
			   $jumlah_halaman = $row->jumlah;
			}
			
			$data['jumlah_halaman'] = $jumlah_halaman;
			
			// jumlah kategori
			$q = $this->db->query("SELECT count(kategori_berita_id) as jumlah FROM kategori_berita");
			
			foreach ($q->result() as $row)
			{
			   $jumlah_kategori = $row->jumlah;
			}
			
			$data['jumlah_kategori'] = $jumlah_kategori;
			
		// Pengaduan
			// jumlah pengaduan terbaru
			$q = $this->db->query("SELECT count(pengaduan_id) as jumlah FROM pengaduan
									WHERE pengaduan_status = 0 AND pengaduan_menjawab = 0");
			
			foreach ($q->result() as $row)
			{
			   $jumlah_pengaduan_terbaru = $row->jumlah;
			}
			
			$data['jumlah_pengaduan_terbaru'] = $jumlah_pengaduan_terbaru;
			
			// jumlah pengaduan terjawab
			$q = $this->db->query("SELECT count(pengaduan_id) as jumlah FROM pengaduan
									WHERE pengaduan_status = 1");
			
			foreach ($q->result() as $row)
			{
			   $jumlah_pengaduan_terjawab = $row->jumlah;
			}
			
			$data['jumlah_pengaduan_terjawab'] = $jumlah_pengaduan_terjawab;
			
			// jumlah pengaduan
			$q = $this->db->query("SELECT count(pengaduan_id) as jumlah FROM pengaduan
									WHERE pengaduan_menjawab = 0");
			
			foreach ($q->result() as $row)
			{
			   $jumlah_pengaduan = $row->jumlah;
			}
			
			$data['jumlah_pengaduan'] = $jumlah_pengaduan;
			
		return $data;
	}
	
	function tulis_berita() {
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$kategori = $this->input->post('berita_kategori');
		
		$user = $this->session->userdata('username');
		
		
		$string = "INSERT INTO berita (user_id, kategori_berita_id, 
						berita_judul, berita_isi, berita_tgl) 
					VALUES ((SELECT user_id FROM user WHERE username = '$user'), 
						$kategori, '$judul', '$isi', NOW())";
					
		$this->db->query($string);
	}
	
	function pengaduan_terbaru() {
		$string = "SELECT * 
					FROM  pengaduan 
					WHERE pengaduan_status = 0 AND
						pengaduan_menjawab = 0
					ORDER BY pengaduan_tgl DESC 
					LIMIT 3";
					
		$q = $this->db->query($string);
		if($q->num_rows() > 0) {
			foreach($q->result() as $row){
				$data[] = $row;
			}

		}
		else {
			$data = null;
		}
		
		return $data;
	}
	
	function tambah_kategori() {
		$kategori = $this->input->post('tambah_kategori');
		
		$string = "INSERT INTO kategori_berita (kategori_berita_nama)
					VALUES ('$kategori')";
					
		$this->db->query($string);
	}
	
	function balasan($pengaduan_id) {
		$balas = $this->input->post('balas');
		
		$q = $this->db->query("SELECT pengaduan_nama, pengaduan_isi 
								FROM pengaduan 
								WHERE pengaduan_id = $pengaduan_id");
			
		foreach ($q->result() as $row)
		{
			$nama_pengadu = $row->pengaduan_nama;
			$isi = $row->pengaduan_isi;
		}
			
		$isi_pengaduan = '<blockquote>'.$nama_pengadu.' : '.$isi.'</blockquote>'.$balas;
		
		$string = "INSERT INTO pengaduan (`pengaduan_nama`, `pengaduan_email`, 
						`pengaduan_alamat`, `pengaduan_telp`, `pengaduan_isi`, 
						`pengaduan_tgl`, `pengaduan_status`, `pengaduan_menjawab`) 
					VALUES ('admin','admin@admin.com','alamat','088988888','$isi_pengaduan',
						NOW(), 0, $pengaduan_id)";
		
		$this->db->query($string);
		
		$string = "UPDATE pengaduan 
					SET pengaduan_status = 1
					WHERE pengaduan_id = $pengaduan_id";
		
		$this->db->query($string);
	}
	
	function uploading($nama_file) {
		$nama = $this->input->post('nama_dokumen');

		echo $nama_file;
		$user = $this->session->userdata('username');
		
		$string = "INSERT INTO unduhan (unduhan_judul, 
						unduhan_url, user_id) 
					VALUES ('$nama','$nama_file',(SELECT user_id FROM user WHERE username = '$user'))";
		$this->db->query($string);
	}
	
	function datakategori() {
		$q = $this->db->query("SELECT * FROM kategori_berita");
		
		if($q->num_rows() > 0) {
			foreach($q->result() as $row){
				$data[] = $row;
			}

		}
		else {
			$data = null;
		}
		
		return $data;
	}

}