<?php

class Home extends CI_Controller {
	
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
	
	function index() {
		$this->load->model('beranda_model');
		$data = $this->beranda_model->informasi();
		$data['kategori'] = $this->beranda_model->datakategori();
		$data['pengaduan_terbaru'] = $this->beranda_model->pengaduan_terbaru();
		
		$data['user'] = $this->headerprofil();
		
		$data['main_content'] = 'beranda/beranda';
		$this->load->view('includes/template', $data);
	}
	
	

	function load() {
		
		$this->load->model('beranda_model');
		$data = $this->beranda_model->informasi();
		$data['kategori'] = $this->beranda_model->datakategori();
		$data['pengaduan_terbaru'] = $this->beranda_model->pengaduan_terbaru();
		$data['main_content'] = 'beranda/beranda';
		
		return $data;
	}
	
	function inputberita() {
		$data['user'] = $this->headerprofil();
		$this->load->model('beranda_model');
		$this->beranda_model->tulis_berita();
		
		$data = $this->load();
		
		$data['berita_error'] = true;
		$this->load->view('includes/template', $data);
	}
	
	function tambahkategori() {
		$data['user'] = $this->headerprofil();
		$this->load->model('beranda_model');
		$this->beranda_model->tambah_kategori();
		
		$data = $this->load();
		
		$data['kategori_error'] = true;
		$this->load->view('includes/template', $data);
	}
	
	function balas($pengaduan_id) {
		
		$this->load->model('beranda_model');
		$this->beranda_model->balasan($pengaduan_id);
		
		$data = $this->load();
		$data['user'] = $this->headerprofil();
		$data['pengaduan_error'] = true;
		$this->load->view('includes/template', $data);
	}
	
	function unggah() {
		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = 'doc|docx|pdf';
		$config['file_name'] = $this->input->post('nama_dokumen');
				
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		
		$data = $this->upload->data();
				
		$this->load->model('beranda_model');
		$this->beranda_model->uploading();
		
		redirect('/home');
	}
	
	public function do_upload()
    {
        $this->load->library('upload');
		
        $image_upload_folder = FCPATH . '/assets/uploads';

        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }

        $this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'doc|docx|pdf',
            'max_size'      => 20480,
            'remove_space'  => TRUE,
            
        );

        $this->upload->initialize($this->upload_config);

        if (!$this->upload->do_upload()) {
            $upload_error = $this->upload->display_errors();
            //echo json_encode($upload_error);
			$data = $this->load();
		
			$data['unggah_error'] = $upload_error;
			$this->load->view('includes/template', $data);
        } else {
            //$file_info = $this->upload->data();
           // echo json_encode($file_info);
			$data = $this->upload->data();
			foreach($data as $item => $value):
				if($item == 'file_name')
				{
					$nama_file = $value;
				}
			endforeach;
			$data = $this->load();
			$this->load->model('beranda_model');
			$this->beranda_model->uploading($nama_file);
			$data['unggah_error'] = 'berhasil mengunggah';
			$this->load->view('includes/template', $data);
        }

    }
}