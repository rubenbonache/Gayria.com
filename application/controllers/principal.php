<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class principal extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library(array('session', 'user_agent'));
			$this->lang->load('principal', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url', 'custom', 'date', 'string'));
			$this->load->model('perfil_queries', 'perfil');
			$this->perfil->premium('comprobar');

		}
		
		function index()
		{
				$mobile = '';
				/*if($this->agent->is_mobile())
				{
					$mobile = "mobil/";
					if( ! $this->session->userdata('status'))
					{
						$this->load->view($mobile.'login');
						
					}else{
						$this->load->view($mobile.'principal');
					}
				}else
				{*/
				$this->load->view($mobile.'principal');
				/*}*/
		}
	
	}
?>