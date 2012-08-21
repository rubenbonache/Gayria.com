<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class favorito extends CI_Controller {

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

	function add()
	{
		if($this->session->userdata('status'))
		{
			if(isSet($_POST['id']))
			{
				$id_company = $this->input->post('id');
				$this->db->query("INSERT INTO friend(iduser,idfriend) VALUES('".$this->session->userdata('id')."','$id_company')") or die(mysql_error());
			}
		}
	}

	function del()
	{
		if($this->session->userdata('status'))
		{
			if(isSet($_POST['id']))
			{
				$id_company = $this->input->post('id');
				$this->db->query("DELETE FROM friend WHERE iduser='".$this->session->userdata('id')."' AND idfriend='$id_company'") or die(mysql_error());
			}
		}	
	}
}
?>