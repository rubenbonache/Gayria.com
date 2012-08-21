<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class perfiles extends CI_Controller 
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
			$this->load->view('perfiles');
			$this->load->view('footer');
		}

		function search()
		{
			$this->load->view('header');
			$this->load->view('perfiles_search');
			$this->load->view('footer');			
		}
	}
?>