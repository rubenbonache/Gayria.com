<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class delete extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			$this->lang->load('admin', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url', 'number', 'custom'));
			$this->load->database();
			$this->load->model('delete_queries', 'delete');
	}

	function index()
	{

	}

	function galeria()
	{
		if($this->session->userdata('status'))
		{
			$this->delete->remove_image($this->uri->segment(4));
		}
	}

	function mensajeria()
	{
		if($this->session->userdata('status'))
		{
			$this->delete->remove_msg();
		}		
	}
}

?>