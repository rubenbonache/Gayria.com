<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class settings extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			//$this->load->library('session');
			$this->uri->segment(3);
		}
		
		function index()
		{
		}

		function lang()
		{
			$idioma = $this->uri->segment(3);
			//$this->session->set_userdata('idioma, '.$idioma);
		}
		
	}
?>
