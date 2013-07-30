<?php

class Perijinan extends CI_Controller {
	
	public function __construct(){
		parent::__construct(true);
		$this->load->model('perijinan_model');
		$this->is_logged();
	}
		
	function is_logged()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('login/login');
		}
	}
	
	function headerprofil() {
		$this->load->model('profil_model');
		$data = $this->profil_model->show();
		
		return $data;
	}
	
	function index($page=1) {
		$data['user'] = $this->session->userdata('username');
	
		$this->load->model('perijinan_model');
		$this->load->helpers('pagination');
		$data['user'] = $this->headerprofil();
	
		$limit=5;
		$offset=($page-1) * $limit;
		$data['offset']=$offset;
		$data['perijinan']=$this->perijinan_model->get_list($offset, $limit);
		$data['page']=$page;
		$data['item_per_page']=$limit;
		$data['base_url']=base_url('index.php/perijinan/index/');
		$data['total_item']=$this->perijinan_model->get_count();
			
		$data['main_content'] = 'perijinan/perijinan';
		$data['message'] = null;
		$this->load->view('includes/template', $data);	
		
	}
	

	function perijinandetail($pemohon_id) {
		$data['user'] = $this->headerprofil();
		
		$this->load->model('perijinan_model');
		$data['perijinan'] = $this->perijinan_model->detail($pemohon_id);
		
		$data['main_content'] = 'perijinan/perijinandetail';
		$this->load->view('includes/template', $data);
		
	}
	

	function perijinanbaru() {
		$data['user'] = $this->headerprofil();
		
		$data['main_content'] = 'perijinan/perijinanbaru';
	
		$data['perijinan'] = $this->perijinan_model->jenis();
		$this->load->view('includes/template', $data);
		
	}
	
	function buat() {
		$this->load->model('perijinan_model');
		$data['perijinan'] = $this->perijinan_model->inputpendaftaran();
		$data['perijinan'] = $this->perijinan_model->inputperijinan();
		
		$data['message_error'] = true;
		$this->load->model('perijinan_model');
		$data['perijinan'] = $this->perijinan_model->show();
		$this->load->helper('text');
		
		$this->index();
	}
	
	function hapus($pemohon_id) {
		$this->load->model('perijinan_model');
	    $this->perijinan_model->hapus($pemohon_id);
		
		$this->index();
		redirect('perijinan');
	}
	
	function edit($perijinan_id) {
		$data['user'] = $this->headerprofil();
	
		$this->load->model('perijinan_model');
		$data['perijinan'] = $this->perijinan_model->edit($perijinan_id);
		
		$data['main_content'] = 'perijinan/edithalaman';
		$this->load->view('includes/template', $data);
	}
	
}