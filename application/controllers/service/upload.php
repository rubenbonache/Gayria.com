<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upload extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->lang->load('admin', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url', 'number', 'custom'));
			$this->load->database();
			date_default_timezone_set('GMT');
	}

	function index()
	{	

	}

	function file()
	{
		$this->load->view('perfil_galeria_up');
	}

	function do_upload()
	{
		if($this->session->userdata('status') == 1)
			{
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '100000000';
				$config['max_width']  = '10240';
				$config['max_height']  = '7680';
				$config['file_name']  = time().'_'.md5($this->session->userdata('id'));

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_userdata($error);

					redirect('admin/videos/');
					//$this->load->view('admin/upload_success', $error);
					
				}
				else
				{
					if(!$_POST['titulo'])
					{
						$error = array('error' => $this->lang->line('no_title'));
						$this->session->set_userdata($error);
						redirect('admin/videos');
					}
					if(!$_POST['link'])
					{
						$error = array('error' => $this->lang->line('no_link'));
						$this->session->set_userdata($error);
						redirect('admin/videos');
					}
					$data = array('upload_data' => $this->upload->data());
					$this->session->set_userdata($data);
					$config['image_library'] = 'gd';
					$config['source_image']	= './upload/'.$data['upload_data']['file_name'];
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = 250;
					$config['height']	= 250;

					$this->load->library('image_lib', $config); 

					$this->image_lib->resize();

					$query = array(
									'id' 		=> '',
									'titulo' 	=> $_POST['titulo'],
									'link' 		=> $_POST['link'],
									'fecha' 	=> time(),
									'imagen'	=> 'thumb_'.$data['upload_data']['file_name']
									);
					$this->db->insert('videos', $query);

					
					redirect('admin/videos');
					//$this->load->view('service/upload_success', $data);
				}
			}
			else
			{
				redirect('admin/');
			}
	}

	function send_upload()
	{
		if($this->session->userdata('status'))
			{
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '100000000';
				$config['max_width']  = '10240';
				$config['max_height']  = '7680';
				$config['file_name']  = time().'_'.md5($this->session->userdata('id'));

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_userdata($error);

					redirect('service/upload/file/r');
					//$this->load->view('admin/upload_success', $error);
					
				}
				else
				{

					$data = array('upload_data' => $this->upload->data());
					$this->session->set_userdata($data);

					$config['image_library'] = 'gd2';
					$config['source_image']	= './upload/'.$data['upload_data']['file_name'];
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = 700;
					$config['height']	= 700;
					$config['x_axis'] = '25';
					$config['y_axis'] = '20';
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					
					$query = array(
									'id' 		=> '',
									'author' 	=> $this->session->userdata('id'),
									'fecha' 	=> time(),
									'path' 		=> $data['upload_data']['file_name'],
									'thumb'		=> 'thumb_'.$data['upload_data']['file_name'],
									'active'	=> '0'
									);
					$this->db->insert('galeria', $query); 
					activity_add($this->session->userdata('id'), '3');
					redirect('service/upload/file/crop');
					//$this->load->view('service/upload_success', $data);
				}
			}
			else
			{
				redirect('perfil');
			}
	}
}
?>