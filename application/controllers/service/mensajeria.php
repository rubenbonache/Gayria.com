<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mensajeria extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->lang->load('admin', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url', 'number', 'custom', 'date'));
			$this->load->database();
			$this->load->model('perfil_queries', 'perfil');
			date_default_timezone_set('GMT');
	}

	function index()
	{

	}

	function nuevo()
	{
		if( ! $this->session->userdata('status'))
		{
			die('Necesita loguearse');
		}
		if($this->perfil->count_msg(mdate('%d%m%Y', time()))>="10" && $this->session->userdata('status')==2)
		{
			echo "Supero el limite de mensajes";
		}else
		{
			if($_POST){
				$this->perfil->send_msg();
				$this->load->view('perfil_mensajeria_new');
			}else
			{
				$this->load->view('perfil_mensajeria_new');
			}
		}
	}

	function responder()
	{
		if( ! $this->session->userdata('status'))
		{
			die('Necesita loguearse');
		}
		if($this->perfil->count_msg(mdate('%d%m%Y', time()))>="10" && $this->session->userdata('status')==2)
		{
			echo "Supero el limite de mensajes";
		}else
		{
			if($_POST){
				$this->perfil->send_msg();
				$this->load->view('perfil_mensajeria_new');
			}else
			{
				$this->load->view('perfil_mensajeria_new');
			}
		}
	}	
}
?>