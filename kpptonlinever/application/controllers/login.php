<?php

class Login extends CI_Controller {

	
	function index() {
		$data['error'] = null;
		$this->load->view('login/login',$data);
	}
	
	function masuk() {
		$this->load->model('login_model');
		$query = $this->login_model->validasi();
		
		if($query)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			redirect('home');
		}
		else {
			$data['error'] = true;
			$this->load->view('login/login',$data);
		}
	}
	
	function logout()  
	{  
		$this->session->sess_destroy();  
		$this->index();  
		redirect('login/login');
	}  
}