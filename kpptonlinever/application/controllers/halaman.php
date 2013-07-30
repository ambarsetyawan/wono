<?php

class Halaman extends CI_Controller {
	

	function __construct()
	{
		parent::__construct(true);
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
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->model('halaman_model');
		$this->load->library('pagination');
		$this->load->helper('pagination_helper');
		
		$limit=2;
		$offset=($page-1) * $limit;
		$data['offset']=$offset;
		$data['halaman']=$this->halaman_model->get_list($offset, $limit);
		$data['page']=$page;
		$data['item_per_page']=$limit;
		$data['base_url']=site_url('halaman/index');
		$data['total_item']=$this->halaman_model->get_count();
		
		$data['user'] = $this->headerprofil();
		//$data['halaman'] = $this->halaman_model->show();
		$this->load->helper('text');
		
	
		$data['main_content'] = 'halaman/halaman';
		$this->load->view('includes/template', $data);
	}
	
	function input() {
		$data['user'] = $this->headerprofil();
		$data['main_content'] = 'halaman/buathalaman';
		$this->load->view('includes/template', $data);
	}
	
	function buat() {
	
		$this->load->model('halaman_model');
		$data['halaman'] = $this->halaman_model->input();
		
		$this->load->model('halaman_model');
		$data['halaman'] = $this->halaman_model->show();
		$this->load->helper('text');
		
		$this->index();
	}
	
	function hapus($hlm_id) {
		$this->load->model('halaman_model');
		$this->halaman_model->hapus($hlm_id);
		
		$this->index();
		redirect('halaman');
	}
	
	function edit($hlm_id) {
		$data['user'] = $this->headerprofil();
	
		$this->load->model('halaman_model');
		$data['halaman'] = $this->halaman_model->edit($hlm_id);
		
		$data['main_content'] = 'halaman/edithalaman';
		$this->load->view('includes/template', $data);
	}
	
	function update($hlm_id) {
		$this->load->model('halaman_model');
		$data['halaman'] = $this->halaman_model->update($hlm_id);
		
		$this->index();
		redirect('halaman');
	}

}