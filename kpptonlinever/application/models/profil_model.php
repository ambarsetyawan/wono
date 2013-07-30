<?php

class Profil_model extends CI_Model {

	function show() {
		$user = $this->session->userdata('username');
			
		$q = $this->db->query("SELECT user_id FROM user WHERE username = '$user'");
			
		foreach ($q->result() as $row)
		{
		   $user_id = $row->user_id;
		}	
			
		$string = "SELECT profil_nama, profil_avatar 
						FROM  profil 
						WHERE user_id = $user_id";
						
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
}