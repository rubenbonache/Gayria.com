<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class settings extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->uri->segment(3);
			$this->load->helper(array('form', 'url'));
			$this->load->database();
		}
		
		function index()
		{
			
		}

		function lang()
		{
			if($this->uri->segment(3) == TRUE)
			{
				$idioma = $this->uri->segment(3);
				$referer = $this->uri->segment(4);
				$this->session->set_userdata('idioma', $idioma);

				redirect($this->uri->slash_segment(4).$this->uri->slash_segment(5).$this->uri->slash_segment(6));
			}else
			{
				redirect($this->uri->slash_segment(4).$this->uri->slash_segment(5).$this->uri->slash_segment(6));
			}
		}

		function set_img()
		{
			if($this->session->userdata('status'))
			{
				$this->load->model('perfil_queries', 'perfil');
				$this->perfil->set_img();
				redirect('perfil/me/galeria');
			}
		}
		
	}
?>
