<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class chaperos extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library(array('session','pagination'));
			$this->lang->load('admin', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url', 'custom', 'date'));
			$this->load->database();
			$this->load->model('perfil_queries', 'perfil');
			$this->perfil->premium('comprobar');
		}

		function index()
		{
			$this->load->view('header');
			$this->load->view('chaperos');
			$this->load->view('footer');
		}

		function item()
		{
			$query = $this->db->get_where('usuarios', array('id' => $this->uri->segment(3)));
					foreach ($query->result() as $item) 
					{

						$this->load->view('header');
						$this->load->view('perfil', $item);
						$this->load->view('footer');
					}
		}

		function search()
		{
			$this->load->view('header');
			$this->load->view('chaperos_search');
			$this->load->view('footer');			
		}
	}
?>