<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class register extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library(array('session', 'pagination'));
			$this->lang->load('admin', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url', 'custom', 'date', 'string'));
			$this->load->database();
			$this->load->model('register_queries', 'reg');
			//$this->perfil->premium('comprobar');
			
			

		}
		
		function index()
		{
			$this->load->view('header');
			$this->load->view('register');
			$this->load->view('footer');
		}

		function user()
		{
			$this->load->view('header');
			$this->load->view('register_user');
			$this->load->view('footer');
		}
		function pro()
		{
			$this->load->view('header');
			$this->load->view('register_pro');
			$this->load->view('footer');
		}
	}

?>