<?php

class kategori extends CI_Controller {
	
	public function __construct(){
			parent::__construct(true);
			$this->load->model('kategori_model');
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
		$this->load->model('kategori_model');
		$this->load->helpers('pagination');
		//$data['kategori'] = $this->kategori_model->show();
		$data['user'] = $this->headerprofil();
		
		
		$limit=2;
			$offset=($page-1) * $limit;
			$data['offset']=$offset;
			$data['kategori']=$this->kategori_model->get_list($offset, $limit);
			$data['page']=$page;
			$data['item_per_page']=$limit;
			$data['base_url']=base_url('index.php/kategori/index/');
			$data['total_item']=$this->kategori_model->get_count();
			
		$data['main_content'] = 'kategori/kategori';
		$data['message'] = null;
		$this->load->view('includes/template', $data);	
		
	}
	

	function buat() {
		$this->load->model('kategori_model');
		$data['kategori'] = $this->kategori_model->input();
	
		$data['message_error'] = true;
		$this->load->model('kategori_model');
		$data['kategori'] = $this->kategori_model->show();
		redirect('kategori/kategori');
		
	}
	
	function hapus($pemohon_id) {
		$this->load->model('kategori_model');
	    $this->kategori_model->hapus($pemohon_id);
		
		$this->index();
		redirect('kategori/kategori');
	}
	
}