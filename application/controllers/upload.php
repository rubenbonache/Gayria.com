<?php
	
	class Upload extends CI_Controller {
		
		function __construct()
			  {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
			  }
		
		function index()
			  {
		$this->load->view('upload_form', array('error' => ' ' ));
			  }
		
		function do_upload()
			  {
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$config['max_size']	= '1000000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
				  {
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('upload_form', $error);
				  }
		else
				  {
			$data = array('upload_data' => $this->upload->data());
			
			$this->load->view('upload_success', $data);
				  }
			  }
	}
	?>