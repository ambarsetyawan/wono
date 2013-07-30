<?php 
class Pengaduan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
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
	
	function index($page=1) 
	{
		$data['user'] = $this->headerprofil();
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->model('pengaduan_model');
		$this->load->helper('pagination_helper');
		
		$limit= 5;
		$offset=($page-1) * $limit;
		$data['offset']=$offset;
		$data['pengaduan']=$this->pengaduan_model->get_list($offset, $limit);
		$data['page']=$page;
		$data['item_per_page']=$limit;
		$data['base_url']=site_url('pengaduan/index');
		$data['total_item']=$this->pengaduan_model->get_count();
		
		
		//$data['pengaduan'] = $this->pengaduan_model->show();
		$this->load->helper('text');
		
	
		$data['main_content'] = 'pengaduan/pengaduan';
		$this->load->view('includes/template', $data);
	}
	
	function detail($pengaduan_id) 
	{
		$data['user'] = $this->headerprofil();
		$this->load->model('pengaduan_model');
		$data['pengaduan'] = $this->pengaduan_model->detail($pengaduan_id);
		
		$this->load->helper('text');
		
		$data['main_content'] = 'pengaduan/pengaduan';
		$data['message'] = null;
		
		$this->load->view('includes/template', $data);
		
		redirect('/pengaduan');	
	}
	
	//merujuk ke halaman balaspengaduan
	function balas($pengaduan_id)
	{		
		$data['user'] = $this->headerprofil();
		$this->load->model('pengaduan_model');
		$data['pengaduan'] = $this->pengaduan_model->detail_balas($pengaduan_id);
		
		$this->load->helper('text');
		
		$data['main_content'] = 'pengaduan/balaspengaduan';
		
		$this->load->view('includes/template', $data);
	}
	
	//merujuk ke tombol balaspengaduan
	function submit_balas($pengaduan_id)
	{		
		$this->load->model('pengaduan_model');
		$data['pengaduan'] = $this->pengaduan_model->submit_balas($pengaduan_id);
		
		$this->load->helper('text');

		//$this->index();
	}

		
	function update($pengaduan_id)
	{
		$this->load->model('pengaduan_model');
		$data['pengaduan'] = $this->pengaduan_model->update($pengaduan_id);
		
		$this->index();
		redirect('/pengaduan');
	}
	
	function hapus($pengaduan_id)
	{
		$this->load->model('pengaduan_model');
		$data['pengaduan'] = $this->pengaduan_model->hapus($pengaduan_id);
		
		$this->index();
		redirect('/pengaduan');
	}
}
