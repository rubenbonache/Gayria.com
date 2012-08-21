<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class download extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->library('session');
			/*$this->lang->load('download', $this->session->userdata('idioma'));*/
			$this->load->helper(array('form', 'url', 'number', 'custom'));
			$this->load->database();
	}

	function index()
	{

	}

	function id()
	{
		$sql = $this->db->query("SELECT * FROM videos WHERE id = '".$this->uri->segment(3)."'");
		foreach ($sql->result() as $item) {
			redirect($item->link);
		}
	}
}
?>