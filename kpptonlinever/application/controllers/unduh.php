<?php

class Unduh extends CI_Controller {
	

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
		$this->load->model('unduh_model');
		$this->load->library('pagination');
		$this->load->helper('pagination_helper');
		
		$limit=5;
		$offset=($page-1) * $limit;
		$data['offset']=$offset;
		$data['unduhan']=$this->unduh_model->get_list($offset, $limit);
		$data['page']=$page;
		$data['item_per_page']=$limit;
		$data['base_url']=site_url('unduh/index');
		$data['total_item']=$this->unduh_model->get_count();
		
		$data['user'] = $this->headerprofil();
		//$data['halaman'] = $this->halaman_model->show();
		$this->load->helper('text');
		
	
		$data['main_content'] = 'unduh/unduh';
		$this->load->view('includes/template', $data);
	}
	
	function input() {
		$data['user'] = $this->headerprofil();
		
		$data['main_content'] = 'unduh/buatunduh';
		$this->load->view('includes/template', $data);
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
			$data['user'] = $this->headerprofil();			
			$data['unggah_error'] = $upload_error;
			$data['main_content'] = 'unduh/buatunduh';
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
			
			$this->load->model('unduh_model');
			$this->unduh_model->uploading($nama_file);
			$data['user'] = $this->headerprofil();
			$this->index();
			
        }

    }
	
	function edit($unduhan_id) {
		$data['user'] = $this->headerprofil();
	
		$this->load->model('unduh_model');
		$data['unduhan'] = $this->unduh_model->edit($unduhan_id);
		
		$data['main_content'] = 'unduh/editunduh';
		$this->load->view('includes/template', $data);
	}
	
	function update($unduhan_id) {
		$this->load->model('unduh_model');
		$data['unduhan'] = $this->unduh_model->update($unduhan_id);
		
		$this->index();
		redirect('unduh');
	}
	
	function hapus($unduhan_id) {
		$this->load->model('unduh_model');
		$this->unduh_model->hapus($unduhan_id);
		
		$this->index();
		redirect('unduh');
	}
	
}