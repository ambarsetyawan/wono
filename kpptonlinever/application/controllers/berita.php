<?php
class berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->helper('pagination_helper');
		$this->load->helper('tinymce_helper');
		$this->load->helper('text_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
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
	
	
	public function index($page=1)
	{
		$data = $this->berita_model->jumlah_berita();
		$data['user'] = $this->headerprofil();
	
		$limit=5;
		$offset=($page-1) * $limit;
		$data['offset']=$offset;
		$data['user_list']=$this->berita_model->get_list($offset, $limit);
		$data['page']=$page;
		$data['item_per_page']=$limit;
		$data['base_url']=site_url('berita/index');
		$data['total_item']=$this->berita_model->get_count();
		$data['berita_kategori_id']=$this->berita_model->kategori_berita();
		
		$data['main_content'] = 'berita/index';
		$this->load->view('includes/template', $data);
		
	}
	
	function published($page=1) {
		$data = $this->berita_model->jumlah_berita();
		$data['user'] = $this->headerprofil();
	
		$limit=5;
		$offset=($page-1) * $limit;
		$data['offset']=$offset;
		$data['user_list']=$this->berita_model->get_list_published($offset, $limit);
		$data['page']=$page;
		$data['item_per_page']=$limit;
		$data['base_url']=site_url('berita/index');
		$data['total_item']=$this->berita_model->get_count();
		$data['berita_kategori_id']=$this->berita_model->kategori_berita();
		
		$data['main_content'] = 'berita/index';
		$this->load->view('includes/template', $data);
	}
	
	function draf($page=1) {
		$data = $this->berita_model->jumlah_berita();
		$data['user'] = $this->headerprofil();
	
		$limit=5;
		$offset=($page-1) * $limit;
		$data['offset']=$offset;
		$data['user_list']=$this->berita_model->get_list_draf($offset, $limit);
		$data['page']=$page;
		$data['item_per_page']=$limit;
		$data['base_url']=site_url('berita/index');
		$data['total_item']=$this->berita_model->get_count();
		$data['berita_kategori_id']=$this->berita_model->kategori_berita();
		
		$data['main_content'] = 'berita/index';
		$this->load->view('includes/template', $data);
	}
	
	function cari($page=1) {
		$data = $this->berita_model->jumlah_berita();
		$data['user'] = $this->headerprofil();
	
		$limit=5;
		$offset=($page-1) * $limit;
		$data['offset']=$offset;
		$data['user_list']=$this->berita_model->cari($offset, $limit);
		$data['page']=$page;
		$data['item_per_page']=$limit;
		$data['base_url']=site_url('berita/index');
		$data['total_item']=$this->berita_model->get_count();
		$data['berita_kategori_id']=$this->berita_model->kategori_berita();
		
		$data['main_content'] = 'berita/index';
		$this->load->view('includes/template', $data);
	}

	public function view($berita_slug)
	{
		$data['user'] = $this->headerprofil();
		
		$data['berita_item'] = $this->berita_model->get_berita($berita_slug);

		if (empty($data['berita_item']))
		{
			show_404();
		}

		$data['berita_judul'] = $data['berita_item']['berita_judul'];

		$data['main_content'] = 'berita/view';
		$this->load->view('includes/template', $data);
	}
	public function tulisberita()
	{
		$data['user'] = $this->headerprofil();
		
		$data['jenis_kategori']=$this->berita_model->kategori_berita();

		$this->form_validation->set_rules('berita_judul', 'berita_judul', 'required');
		$this->form_validation->set_rules('berita_isi', 'berita_isi', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$data['main_content'] = 'berita/tulisberita';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$this->berita_model->set_berita();
			
			redirect('berita/index');
			
		}
		
		
	}
	
	function edit($berita_id) {
		$data['user'] = $this->headerprofil();
		
		$this->load->model('berita_model');
		$data['berita'] = $this->berita_model->edit($berita_id);
		$data['jenis_kategori']=$this->berita_model->kategori_berita();
		if ($this->form_validation->run() === FALSE)
		{
			$data['main_content'] = 'berita/edit';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$this->berita_model->set_berita();
			
			redirect('berita/index');
			
		}
	}
	
	function update($berita_id) {
		$this->load->model('berita_model');
		$this->berita_model->update($berita_id);
		
		//$this->index();
		redirect('berita/index');
	}
	
	public function delete($berita_id){
		$this->berita_model->delete($berita_id);
		redirect('berita/index');
	}
	
}