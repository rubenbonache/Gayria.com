<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class contacto extends CI_Controller 
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
			$this->load->library('email');

                    $config['protocol'] = 'sendmail';
                    $config['mailpath'] = '/usr/sbin/sendmail';
                    $config['charset'] = 'iso-8859-1';
                    $config['wordwrap'] = TRUE;

                    $this->email->initialize($config);
		}

		function index()
		{
			$this->load->view('header');
			$this->load->view('contacto');
			$this->load->view('footer');
		}
	}
?>