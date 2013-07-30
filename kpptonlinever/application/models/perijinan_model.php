<?php
class Perijinan_model extends CI_Model {

	
		function show() {
			$string = "SELECT pemohon_id,
							pemohon_nama,
							pemohon_no_ktp,
							pemohon_tgl_lhr,
							masa_berlaku_ktp,
							pemohon_tempat_lhr,
							pemohon_alamat,
							pemohon_kab,
							pemohon_kec,
							pemohon_desa,
							pemohon_pedukuhan,
							pemohon_telp,
							pemohon_hp,
							perijinan.perijinan_id,
							perijinan_ket,
							perijinan_nama,
							perijinan_jenis_deskripsi
						FROM pendaftaran_perijinan,
							perijinan,
							perijinan_jenis
						WHERE
							pendaftaran_perijinan.perijinan_id = perijinan.perijinan_id AND
							perijinan.perijinan_jenis_id = perijinan_jenis.perijinan_jenis_id";
			
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
		
		
		function detail($pemohon_id) {
			$string = "SELECT pemohon_id,
							pemohon_nama,
							pemohon_no_ktp,
							pemohon_tgl_lhr,
							masa_berlaku_ktp,
							pemohon_tempat_lhr,
							pemohon_alamat,
							pemohon_kab,
							pemohon_kec,
							pemohon_desa,
							pemohon_pedukuhan,
							pemohon_telp,
							pemohon_hp,
							perijinan.perijinan_id,
							perijinan_ket,
							perijinan_nama,
							perijinan_jenis_deskripsi
						FROM pendaftaran_perijinan,
							perijinan,
							perijinan_jenis
						WHERE
							pendaftaran_perijinan.perijinan_id = perijinan.perijinan_id AND
							perijinan.perijinan_jenis_id = perijinan_jenis.perijinan_jenis_id AND
							pendaftaran_perijinan.pemohon_id = $pemohon_id";
			
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
		
		function hapus($pemohon_id){
			$this->db->query("DELETE FROM pendaftaran_perijinan
					   WHERE pendaftaran_perijinan.pemohon_id = $pemohon_id");
			
			
		}
		
		function inputpendaftaran() {
		$nama = $this->input->post('nama');
		$no_identitas = $this->input->post('no_identitas');
		$masa_berlaku = $this->input->post('masa_berlaku');
		$tempat = $this->input->post('tempat');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');
		$kabupaten = $this->input->post('kabupaten');
		$kecamatan = $this->input->post('kecamatan');
		$desa = $this->input->post('desa');
		$dukuh = $this->input->post('dukuh');
		$telepon = $this->input->post('telepon');
		$hape = $this->input->post('hape');
		$jenis_perijinan = $this->input->post('jenis_perijinan');
		
		
		
		$string = "INSERT INTO `pendaftaran_perijinan` (`pemohon_id`, `pemohon_nama`, `pemohon_no_ktp`,
					`pemohon_tgl_lhr`, `masa_berlaku_ktp`, `pemohon_tempat_lhr`, `pemohon_alamat`, `pemohon_kab`,
					`pemohon_kec`, `pemohon_desa`, `pemohon_pedukuhan`, `pemohon_telp`, `pemohon_hp`,`perijinan_jenis_id`) 
				   VALUES (null, '$nama', '$no_identitas', '$tanggal_lahir', '$masa_berlaku', '$tempat', '$alamat', '$kabupaten',
				   '$kecamatan', '$desa', '$dukuh', '$telepon', '$hape', '$jenis_perijinan');";
		
		
	 $this->db->query($string);
			
		
	}
	
	function inputperijinan () {
	
		$jenis_perijinan = $this->input->post('jenis_perijinan');
		$isi_perijinan = $this->input->post('isi_perijinan');
		$status = $this->input->post('status');
		$keadaan= $this->input->post('keadaan');
		$table_mapping = $this->input->post('table_mapping');
		$skperpanjangan = $this->input->post('skperpanjangan');
		$tahun_berlaku = $this->input->post('tahun_berlaku');
	$string = "INSERT INTO `perijinan` (`perijinan_id`,`user_id`,`perijinan_status`, `perijinan_tahun_berlaku`, `perijinan_ket`,
			  `perijinan_survey`, `perijinan_table_mapping`, `perijinan_skperpanjangan`)
			  VALUES ( null, '$status',null, '$tahun_berlaku', '$isi_perijinan', '$keadaan', '$table_mapping', '$skperpanjangan');";
			  
	$this->db->query($string);
				
	
	}
		
		
		function get_count(){
			$data=$this->db->get('pendaftaran_perijinan');
			return $data->num_rows();
		}
		function get_list($offset, $limit){
				$string = "SELECT pemohon_id,
							pemohon_nama,
							pemohon_no_ktp,
							pemohon_tgl_lhr,
							masa_berlaku_ktp,
							pemohon_tempat_lhr,
							pemohon_alamat,
							pemohon_kab,
							pemohon_kec,
							pemohon_desa,
							pemohon_pedukuhan,
							pemohon_telp,
							pemohon_hp,
							perijinan.perijinan_id,
							perijinan_ket,
							perijinan_nama,
							perijinan_jenis_deskripsi
						FROM pendaftaran_perijinan,
							perijinan,
							perijinan_jenis
						WHERE
							pendaftaran_perijinan.perijinan_id = perijinan.perijinan_id AND
							perijinan.perijinan_jenis_id = perijinan_jenis.perijinan_jenis_id
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
	
	
	function jenis(){
		
	$string = "SELECT perijinan_jenis_id, perijinan_jenis_deskripsi FROM perijinan_jenis";
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