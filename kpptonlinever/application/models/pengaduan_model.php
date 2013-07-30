<?php 
class Pengaduan_model extends CI_Model {

	
	function show()
	{
		$string = "SELECT *
					FROM pengaduan
					ORDER_BY pengaduan_menjawab";
					
		$q = $this->db->query($string);
		
		if($q->num_rows() > 0) {
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
		}
		else
		{
			$data = null;
			echo 'Data tidak ditemukan';
		}
			
		return $data;	
	}
	
	//menampilkan semua data pengaduan
	function detail($pengaduan_id)
	{
		$string = "SELECT *
					FROM pengaduan";
					
		$q = $this->db->query($string);
			
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
		}
		else
		{
			$data = null;
			echo 'Data tidak ditemukan';
		}
		
		return $data;
		
	}
	
	//menampilkan pengaduan yang sedang dibalas
	function detail_balas($pengaduan_id)
	{
		$string = "SELECT * 
					FROM pengaduan
					WHERE pengaduan_id = $pengaduan_id";
					
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
	
	//dapat jumlah baris
	function get_count()
	{
			$data=$this->db->get('pengaduan');
			return $data->num_rows();			
	}
	
	//dapat limit baris berdasarkan offset
	function get_list($offset, $limit)
	{
		$this->db->limit($limit, $offset);
		
		$q=$this->db->get('pengaduan');
		
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
		}
		else
		{
			$data = null;
			echo 'Data tidak ditemukan';
		}
		return $data;		
	}
	
	//klik tombol balas di form balaspengaduan
	function submit_balas($pengaduan_id)
	{
		$isi = $this->input->post('isi_balasan');
		
		$q = $this->db->query("SELECT pengaduan_nama, pengaduan_isi 
								FROM pengaduan 
								WHERE pengaduan_id = $pengaduan_id");
			
		foreach ($q->result() as $row)
		{
			$nama_pengadu = $row->pengaduan_nama;
			$isi_pengaduan = $row->pengaduan_isi;
		}
			
		$isi_pengaduan = '<blockquote>'.$nama_pengadu.' : '.$isi_pengaduan.'</blockquote>'.$isi;		
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
	
	function update($pengaduan_id)
	{
		$user_id = 0;
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$tanggal = $this->input->post('tanggal');
		$status = $this->input->post('status');
		$menjawab = $this->input->post('menjawab');
		
		$string = "UPDATE pengaduan
					SET pengaduan_nama = '$judul',
						pengaduan_email = '$email',
						pengaduan_alamat = '$alamat'
						pengaduan_tanggal = '$tanggal'
						pengaduan_status = '$status'
						pengaduan_menjawab = '$menjawab'
					WHERE pengaduan_id = $pengaduan_id";
		$this->db->query($string);
	}
	
	function hapus($pengaduan_id) 
	{
		$q = $this->db->query("SELECT pengaduan_status, pengaduan_menjawab 
								FROM pengaduan 
								WHERE pengaduan_id = $pengaduan_id");
			
		foreach ($q->result() as $row)
		{
			$pengaduan_status = $row->pengaduan_status;
			$pengaduan_menjawab = $row->pengaduan_menjawab;
		}
		
		if($pengaduan_status == 0 && $pengaduan_menjawab == 0) {
			$this->db->query("DELETE FROM pengaduan
							WHERE pengaduan_id = $pengaduan_id");
		}
		else if ($pengaduan_status == 1){
			$this->db->query("DELETE FROM pengaduan
							WHERE pengaduan_id = $pengaduan_id");
			$this->db->query("DELETE FROM pengaduan
							WHERE pengaduan_menjawab = $pengaduan_id");
		}
		else if ($pengaduan_status == 0 && $pengaduan_menjawab != 0) {
			$this->db->query("UPDATE pengaduan 
								SET pengaduan_status = 0
								WHERE pengaduan_id = $pengaduan_menjawab");
			
			$this->db->query("DELETE FROM pengaduan
							WHERE pengaduan_id = $pengaduan_id");
							
		}
		
		else if ($pengaduan_status == 1 && $pengaduan_menjawab != 0) {
			$this->db->query("DELETE FROM pengaduan
							WHERE pengaduan_id = $pengaduan_id");
			$this->db->query("DELETE FROM pengaduan
							WHERE pengaduan_menjawab = $pengaduan_id");
							
		}
		
	}
	
}
